<?php
session_start();

//on instancie nos deux class
include 'class/Database.class.php';
include 'class/User.class.php';

//si on ne récupère pas un id dans l'url
if(array_key_exists('id', $_GET) == false){
     //on redirige vers login
     header('Location: login.php');
     exit();
}

//on récupère l'id et l'email ds l'url
$id = $_GET['id'];
$mail = $_GET['mail'];
//si quelque chose est posté
if(!empty($_POST)){
    //si les deux password rentrés dans le formulaire sont les mm
   if($_POST['psw1'] === $_POST['psw2']){
        //on instancie notre class user
        $user = new User();
        //on appel la fonction de modif avec les bons arguments!
         $user->modifyPassword($_POST['psw1'], $id, $mail);
   }
       
}
    
    
    
$template = "changePassword";
include 'layout.phtml';

?>