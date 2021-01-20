<?php
session_start();
//on inclut nos classes
include 'class/Database.class.php';
include 'class/User.class.php';

//si quelque chose est posté
if(!empty($_POST)){
        //var_dump($_POST);
        //on instancie notre classe user
    	$user = new User();
        //on appel sa fonction d'ajout
        $user->addUser($_POST);
    
}   

$template = 'register';
include 'layout.phtml';
?>