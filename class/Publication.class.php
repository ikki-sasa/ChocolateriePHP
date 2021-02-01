<?php

class Publication {
	

		
	    public function Vuepublication() {
	    //on instancie notre objet database
		$database = new Database();
	    //on fait notre requète sql
	   $products = $database->query('SELECT
        *
              FROM products
             ORDER BY ProductDate');
	   //on return le resulta dans la variale products
			
		$now = date_create();
		
			
	    return $products;
	}
		
		// function a retaffer
	public function addpublication($ProductDate,$Name,$Content,$Photos) {
        //on instancie notre objet database
        $database = new Database();
        //on fait notre requète sql
        $database->executeSql('
        INSERT INTO 
        products(ProductDate,Name,Content,Photos)
        VALUES 
        (?,?,?,?)', [$ProductDate,$Name,$Content,$Photos]);
        //redirection 
        header('Location: info.php');
        exit();	
	}


// public function addpublication($Name,$Content,$ProductDate,$Photos){
		  

// $database = new Database();

// //requète d'insertion d'une tâche
//  $database->executeSql
// (
//     'INSERT INTO products(Name, Content, ProductDate, Photos)
// 	                                                                                    --   ne fonctionne pas
//     VALUES(?, ?, ?, ?)'[$Name,$Content,$ProductDate,$Photos]
// );		  
		  
// 	}
	
	
	/*
	 public function Updatepublication(){
	
	

	$query = $pdo->prepare
        (
            '
            UPDATE products SET Name=? ,Content=? ,ProductDate=? WHERE Id = ?                      ne fonctionne pas
            '
        );
    $query->execute( [$_POST['productname'], $_POST['description'], $_POST['date'], $_POST['postId']] );    
             //redirection vers index
           header('Location: index.php');
           exit();
	
	
	
	 }
	*/
	
	
	 public function Renovepublication($id) {
	
	$database = new Database();
	
	$database->executeSql
(
    'DELETE
    FROM products
    WHERE Id = ?',[$id]
);

//redirection vers index
header('Location: info.php');
exit();
	
	
}	
	
 }
	
	
	
	
	
	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	