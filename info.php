<?php

session_start();

include'class/Database.class.php';
include'class/Publication.class.php';


 if(empty($_POST)){
                    //fonction select bdd
	 
        $publication = new Publication();   //ok
        //on appel sa fonction d'ajout
        $products = $publication->Vuepublication(); //ok
		
	    //$products=$publication->Updatepublication();     ne fonctionne pas
	 
     //   $publication->addpublication( $_POST['Name'],$_POST['Content'],$_POST['ProductDate'],$_POST['Photos'] );  ne fonctionne pas 
	 
 }else{
	     //Fonction sup
	
	 $publication = new Publication();   //ok
	 
	 $publication->Renovepublication($_POST['Id']); //ok
	 
	  
 
    };




$template = "info";
include 'layout.phtml';

?>