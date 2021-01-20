<?php
session_start();

include'class/Database.class.php';
include'class/Publication.class.php';

if(empty($_POST)){
	
	$publication = new Publication();   // function ok
        //on appel sa fonction d'ajout
    $products = $publication->Vuepublication(); // function ok
	
}

$template = 'index';
include 'layout.phtml';

?>