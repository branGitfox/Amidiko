<?php 
require '../class/UserActions.php';
session_start();
$user = new UserActions();
$userImage = $user->getUseImageprofil($_SESSION['user']['user_id']);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/vendre.css">
    <title>vendre</title>
</head>
<body>
    <div class="container">
        <nav>
            <div class="return-icon"><a href=""><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
              </svg></a></div>
            <h2><?=$_SESSION['user']['user_id']?></h2>
            <div class="profil-container">
                <a href=""><img src="./php/Admin/user_images/<?= $userImage['user_image']?>" alt=""></a>   
            </div>
        </nav>
        <form action="">
            <label for="category">Quel genre d'article vous voulez vendre?</label>
            <select name="article" id="category">
                <option value="">Materiel Informatique</option>
                <option value="">Vestimentaire</option>
                <option value="">autres</option>
            </select>
            <label for="informations">Description de votre article (prix, taille, stockage, etc)</label>
            <textarea name="" id="informations" cols="30" rows="10"></textarea>
            <label for="localisation">localisation</label>
            <input type="text" id="localisation" placeholder="Entrez votre Ville ou votre Adresse...">
            <label for="phone">Telephone</label>
            <input type="text" id="phone" placeholder="Entrez votre Numero ou vos Numero en separant par / ">
            <label for="img1">Image 1</label>
            <input type="file" id="img1">
            <label for="img2">Image 2</label>
            <input type="file" id="img2">
            <h2 class="Facultatif">Facultatif</h2>
            <label for="whatsapp">Numero Whatsapp</label>
            <input type="text" name="" id="whatsapp" placeholder="Entrez le Numero de votre compte Whatsapp...">
            <label for="facebook">Facebook</label>
            <input type="text" id="facebook" placeholder="Entrez le nom de votre compte Facebook...">
            <input type="submit" value="Vendre" id="vendre">
    </div>
    <script src="../assets/js/vendre.js"></script>
</body>
</html>