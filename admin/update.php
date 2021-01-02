<?php
//on inclu notre page config
include 'config.php';
//requète de modification d'une tâche
$query = $pdo->prepare
        (
            '
            UPDATE products SET Name=? ,Content=? ,ProductDate=? WHERE Id = ?
            '
        );
    $query->execute( [$_POST['productname'], $_POST['description'], $_POST['date'], $_POST['postId']] );    
//redirection vers index
header('Location: index.php');
exit();