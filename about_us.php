<?php

session_start();

        $publication = new Publication();   // function ok
        //on appel sa fonction d'ajout
        $products = $publication->Vuepublication(); // function ok

$template = "about_us";
include 'layout.phtml';

?>