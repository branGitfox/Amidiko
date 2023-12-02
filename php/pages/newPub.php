<?php
session_start();    
require '../class/UserActions.php';
require '../class/PostActions.php';
require '../class/PubActions.php';
$userProfil = new UserActions();
$pubs = new PubActions();
$pubs->checkPubForm();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/annonce.css">
    <title>Annonce</title>
</head>
<body>
    <div class="container">
        <nav>
            <div class="return-icon"><a href="logEd"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
              </svg></a></div>
            <h2>Annoncer</h2>
            <div class="profil-container">
                <a href=""><img src="./php/Admin/user_images/<?=$userProfil->getUseImageprofil($userProfil->currentUserId())['user_image']?>" alt=""></a>
            </div>
        </nav>
        <form  method="post">
            <?php if(!empty($pubs->success())) :?>
                <div class="error"><?= $pubs->success()?></div>
                <?php endif ?>
            <label for="informations">Ecrire votre annonce ici</label>
            <textarea name="pub_desc" id="informations" cols="30" rows="10" placeholder="tapez votre texte ici" required></textarea>
            <input type="submit" value="annoncer" id="vendre" name="envoyer">
    </div>
    <script src="./assets/js/annonce.js"></script>
</body>
</html>

