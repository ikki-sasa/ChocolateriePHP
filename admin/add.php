<?php

//on inclu notre page config
include "config.php";

$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["imagechoco"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

move_uploaded_file($_FILES["imagechoco"]["tmp_name"], $target_file);

if ($_FILES["imagechoco"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}





//requète d'insertion d'une tâche
$query = $pdo->prepare
(
    'INSERT INTO products(Name, Content, ProductDate, Photos)
    VALUES(?, ?, ?, ?)'
);
$query->execute([$_POST['productname'], $_POST['description'], $_POST['date'], $target_file ]);

//redirection vers l'index
header('Location: index.php');
exit();


