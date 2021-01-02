<?php
//on inclu notre page config
include "config.php";
//requète de suppression d'une tâche
$query = $pdo->prepare
(
    'DELETE
    FROM products
    WHERE Id = ?'
);

$query->execute(array($_POST['Id']) );
//redirection vers index
header('Location: index.php');
exit();