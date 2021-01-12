<?php
//on inclu notre page config
include "config.php";
//requète de récupération des tâches
$query = $pdo->prepare
(
    'SELECT
        *
    FROM products
    ORDER BY ProductDate'
);

$query->execute();
$products = $query->fetchAll(PDO::FETCH_ASSOC);

//on crée une variable qui stock la date

//


$now = date_create();

include 'index.phtml';