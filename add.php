<?php

//on inclu notre page config
include "class/Database.class.php";
include "class/Publication.class.php";

//si quelque chose est posté
if(!empty($_POST)){
     //si une photo est posté   
    if(!empty($_FILES)){
    //dossier où l'on va stocker notre image
    $dossier = '../uploads';
    //retourne l'url de notre chemin (exemple: /index.phtml)
    $fichier = basename($_FILES['imagechoco']['name']);
    //on va limiter sa taille
    $taille_maxi = 5000000;
    //on récupère la taille de notre fichier.
    $taille = filesize($_FILES['imagechoco']['tmp_name']);
    //On fait un tableau contenant les extensions autorisées.
    //Comme il s'agit d'un avatar pour l'exemple, on ne prend que des extensions d'images.
    $extensions = ['.png', '.gif', '.jpg', '.jpeg'];
    // récupère la partie de la chaine à partir du dernier . pour connaître l'extension avec strrchr.
    $extension = strrchr($_FILES['imagechoco']['name'], '.'); 
    //Début des vérifications de sécurité...
  
    if($taille>$taille_maxi)//si la taille du fichier est supérieur à la taille max demandée ERREUR
    {
         $erreur = 'Le fichier est trop gros...';
    }
    if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
    {
         //On formate le nom du fichier ici...
         //On remplace les lettres accentutées par les non accentuées dans $fichier avec strtr
        //Et on récupère le résultat dans la variablefichier
         $fichier = strtr($fichier, 
              'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
              'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
        
        //En dessous, il y a l'expression régulière qui remplace tout ce qui n'est pas une lettre non accentuées ou un chiffre
        //dans $fichier par un tiret "-" et qui place le résultat dans $fichier. REGEX
         $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
         if(move_uploaded_file($_FILES['imagechoco']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
         {
            $fileName = $_FILES['imagechoco']['name'];
         }
        //  else //Sinon (la fonction renvoie une photo).
        //  {
        //     $fileName = "no-photo.png";
        //  }
         
        $publication = new Publication();
        $publication->addpublication(
                        $fileName,                 
                        $_POST['ProductDate'], 
                        $_POST['Name'], 
                        $_POST['Content'],
                        $_POST['Photos']
                );
    }
    else
    {
         echo $erreur;
    }
    
}
  


  }  






// $target_dir = "../uploads/";
// $target_file = $target_dir . basename($_FILES["imagechoco"]["name"]);
// $uploadOk = 1;
// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// move_uploaded_file($_FILES["imagechoco"]["tmp_name"], $target_file);

// if ($_FILES["imagechoco"]["size"] > 500000) {
//   echo "Sorry, your file is too large.";
//   $uploadOk = 0;
// }

// Allow certain file formats
// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
// && $imageFileType != "gif" ) {
//   echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//   $uploadOk = 0;
// }


//requète d'insertion d'une tâche
// $query = $pdo->prepare
// (
//     'INSERT INTO products(Name, Content, ProductDate, Photos)
//     VALUES(?, ?, ?, ?)'
// );
// $query->execute([$_POST['productname'], $_POST['description'], $_POST['date'], $target_file ]);

//redirection vers l'index
$template = 'index';
include 'layout.phtml';
// exit();