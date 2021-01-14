<?php

session_start();

//si on ne recupère pas notre session

    //redirection vers login ou index

$template = "info";
include 'layout.phtml';

?>