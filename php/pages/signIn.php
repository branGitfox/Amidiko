<?php 
declare(strict_types= 1);
require '../class/UserActions.php';
$user = new UserActions();
$user->checkForm();
if(!empty($user->success())){
    header('location:logIn');
}

$user_name=isset($_POST['user_name'])?htmlentities(htmlspecialchars($_POST['user_name'])):null;
$user_firstname=isset($_POST['user_firstname'])?htmlentities(htmlspecialchars($_POST['user_name'])):null;
$user_email=isset($_POST['user_email'])?htmlentities(htmlspecialchars($_POST['user_email'])):null;
$user_password=isset($_POST['user_password'])?htmlentities(htmlspecialchars($_POST['user_name'])):null;
$user_sexe=isset($_POST['user_sexe'])?htmlentities(htmlspecialchars($_POST['user_sexe'])):null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/inscription.css">
    <title>Inscription</title>
</head>
<body>
    <div class="container">
        <h2>Inscription</h2>
        <?php if(!empty($user->error())):?>
            <div class="error">
                <?= $user->error() ?>
            </div>
            <?php endif ?>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="name">Nom</label>
            <input type="text" id="name" required placeholder="Entrez votre Nom"  name="user_name"  value="<?=$user_name?>" >
            <label for="firstname" id="firstname">Prenom</label>
            <input type="text" id="firstname" required placeholder="Entrez votre Prenom" name="user_firstname" value="<?=$user_firstname?>">
            <label for="email">Email</label>
            <input type="email" id="email" required placeholder="Entrez votre Email" name="user_email" value="<?=$user_email?>">
            <label for="password">Mot de passe</label>
            <input type="password" id="password" required placeholder="Entrez votre Mot de passe" name="user_password" value="<?=$user_password?>">
            <svg class="open" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
              </svg>
              <svg class="close" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16">
                <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z"/>
                <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z"/>
                <path d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z"/>
              </svg>
            <div class="radio-container">
                <label for="men">Homme</label>            
                <input type="radio" name="user_sexe" value="homme" class="radio" id="men" <?php if($user_sexe == 'homme'):?> checked <?php endif ?>>
                <label for="women">Femme</label>
                <input type="radio" name="user_sexe" value="femme" class="radio"  id="women" <?php if($user_sexe == 'femme'):?> checked <?php endif ?>>
            </div>
            <label for="picture">Photo de Profil</label>
            <input type="file" id="picture" name="user_image">
            <input type="submit" value="s'inscire" id="signIn" name="envoyer">
            <div class="already">
                <p>Deja inscrit? <a href="logIn">Se connecter</a></p>
            </div>
        </form>
    </div>
    <script src="./assets/js/inscription.js"></script>
</body>
</html>