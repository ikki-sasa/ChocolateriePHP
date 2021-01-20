<?php

session_start();

//on inclu nos deux classes
include 'class/Database.class.php';
include 'class/User.class.php';
//si quelque chose est posté
if(!empty($_POST)){
    //on instancie la classe user
    $user = new User();
    //on appel la fonction de renvoi de mail pour le password
    $test = $user->sendMailForChangePassword($_POST['email']);
    var_dump($test);
}   

$template = 'forgotPassword';
include 'layout.phtml';

?>