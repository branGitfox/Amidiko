<?php 
session_start();
require '../class/UserActions.php';
require '../class/PostActions.php';
require '../class/Security.php';
$secu = new Security('logIn');
$secu->security();
$user = new UserActions();
$category = new PostActions();
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
            <div class="return-icon"><a href="logEd"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
              </svg></a></div>
            <h2><?= $category->checkNewFormPost() ?></h2>
            <div class="profil-container">
                <a href=""><img src="./php/Admin/user_images/<?= $userImage['user_image']?>" alt=""></a>   
            </div>
        </nav>
        <form method="post" enctype="multipart/form-data">
            <?php if(!empty($category->success())):?>
            <div class="error"><?= $category->success()?></div>
            <?php endif?>
                
            <label for="category">Quel genre d'article vous voulez vendre?</label>
            <select name="articles" id="category">
                <?php foreach($category->listOfCategory() as $category):?>
                <option value=<?= $category['categorie_name']?>><?= $category['categorie_name']?></option>
                    <?php endforeach ?>
            </select>
            <label for="informations">Description de votre article (prix, taille, stockage, etc)</label>
            <textarea name="post_desc" id="informations" cols="30" rows="10" required></textarea>
            <label for="localisation">localisation</label>
            <input type="text" id="localisation" placeholder="Entrez votre Ville ou votre Adresse..." name="post_loc" required>
            <label for="phone">Telephone</label>
            <input type="text" id="phone" placeholder="Entrez votre Numero ou vos Numero en separant par / " name="post_phone" required>
            <label for="img1">Image 1</label>
            <input type="file" id="img1" name="post_img1" required>
            <label for="img2">Image 2</label>
            <input type="file" id="img2" name="post_img2" required>
            <h2 class="Facultatif">Facultatif</h2>
            <label for="whatsapp">Numero Whatsapp</label>
            <input type="text" name="post_whatsapp" id="whatsapp" placeholder="Entrez le Numero de votre compte Whatsapp...">
            <label for="facebook">Facebook</label>
            <input type="text" id="facebook" placeholder="Entrez le nom de votre compte Facebook..." name="post_facebook">
            <input type="submit" value="Vendre" id="vendre" name="envoyer">
    </div>
    <script src="./assets/js/vendre.js"></script>
</body>
</html>