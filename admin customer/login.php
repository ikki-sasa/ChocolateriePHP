<?php

session_start();
//on inclut nos classes
include 'class/Database.class.php';
include 'class/User.class.php';

//si quelque chose est posté
if(!empty($_POST)){
    //on instancie notre classe user
    $user = new User();
    //on appel sa fonction de connexion
    $user->connectUser($_POST);
}

$template = 'login';
include 'layout.phtml';

?>