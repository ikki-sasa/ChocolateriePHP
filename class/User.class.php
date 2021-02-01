<?php

class User {

    //ajout d'un utilisateur dans la bdd
	public function addUser($post) {
	    
	    //on hash le password
		$hashPwd = $this->hashPassword($post['psw']);
	    //on instancie notre objet database
		$database = new Database();
	    //on fait notre requète sql
	    $database->executeSql('INSERT INTO 
								users(email, psw, firstName, lastName, age, role) 
							   VALUES 
							   (?, ?, ?, ?, ?, "user")',  

								[ 
									$post['email'], 
									$hashPwd, 
									$post['firstName'], 
									$post['lastName'], 
									$post['age'] 
								]);

	    //redirection vers index ou login
	    header('Location: login.php');
		exit();
	}
	
	//connexion d'un utilisateur
	public function connectUser($post) {
	    //on instancie notre objet database
	    $database = new Database();
	    //on fait notre requète de récup de l'utilisateur en fonction du mail qu'il a rentré
	    $user = $database->queryOne('SELECT * FROM users WHERE email =?', [ $post['email'] ]);
	    //var_dump($user);
	    //si les login et password sont bon (attention password crypté dans la bdd)
	    if( $user !== false && $this->verifyPassword($post['psw'], $user['psw']) === true ) {
	        //on crée notre $_SESSION
	        $_SESSION['id'] = $user['id'];
			$_SESSION['email'] = $user['email'];
			$_SESSION['firstName'] = $user['firstName'];
			$_SESSION['lastName'] = $user['lastName'];
			$_SESSION['age'] = $user['age'];
			$_SESSION['role'] = $user['role'];
		//redirection vers la page d'accueil 
		header('Location: index.php');
		exit();
	    } 
	}
	
	private function hashPassword($password)
    {

        $salt = '$2y$11$'.substr(bin2hex(openssl_random_pseudo_bytes(32)), 0, 22);

        return crypt($password, $salt);
    }
    
    private function verifyPassword($password, $hashedPassword)
	{
		return crypt($password, $hashedPassword) == $hashedPassword;
	}
	
	public function sendMailForChangePassword($email) {
	    
	     //on instancie notre objet database
		$database = new Database();
	    //on fait notre requète de récup de l'utilisateur via son mail
	    $user = $database->queryOne('SELECT * FROM users WHERE email =?', [ $email ]);
	    //si il existe
	    if ($user !== false) {
	        //on va créer un message qui sera un lien cliquable (on devra concaténer et glisser l'id et l'email du client dans le href (souvenirs bon de commandes))
	        $message = 'Cliquez sur le lien :<a href="changePassword.php?id='.$user['id'].'&mail='.$user['email'].'">cliquez ici</a>';
	        //https://changePassword.php?id=1&mail=mail@gmail.com
	        //le ? nous permet d'indiquer qu'on rajoute des infos à notre url (datas) et le & nous permet de séparer les deux infos pour les infos multiples ici en gros c'est ajoute la donnée id et mail
	        // attention on envoie toujours l'url de change sur un mail !!!!!!! (function mail() de php)
	        mail($user['email'], 'change password', $message);
	        //mail(destinataire, sujet, le contenu)
			// ça c'est mal !!!!!!!!!!!
			//header('Location: changePassword.php?id='.$user['psw'].'&mail='.$user['email']);
	        //on sort de la page
	        exit();
	        //on retourne 'yes'
	        return 'yes';
	    }else{ 
	   //sinon on retourne 'no'     
			return 'no';
	   }
	}
	
	public function modifyPassword($password, $id, $email) {
		
		//on hash le password
		$hashPwd = $this->hashPassword($password);
		//on instancie database
		$database = new Database();
		//on fait notre requète de modification dans notre bdd
		$database->executeSql('UPDATE users SET psw = ? WHERE psw = ? AND id = ? AND email = ?', [ $hashPwd, $id, $email ]);
		//on redirige vers le login
		header('Location: login.php');
		exit();
	}	
}