<?php
session_start();
require '../class/UserActions.php';
require '../class/PostActions.php';
$userImageProfil = new UserActions();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/emplois.css">
    <title>Emplois</title>
</head>

<body>
    <div class="container">
        <nav>
            <div class="return-icon"><a href=""><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                        fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                    </svg></a></div>
            <h2>Vendre</h2>
            <div class="profil-container">
                <a href=""><img src="./php/Admin/user_images/<?=$userImageProfil->getUseImageprofil($_SESSION['user']['user_id'])['user_image']?>" alt=""></a>
            </div>
        </nav>
        <section class="create-job">
            <h2>Creer un emplois</h2>
            <form action="">
                <label for="title">Le titre de votre emploi</label>
                <input type="text" id="title">
                <label for="critere">Le critere de votre emploi</label>
                <textarea name="" id="critere" cols="30" rows="10"
                    placeholder="Entrez le critere de votre emploi ici..."></textarea>
                <input type="submit" name="" id="vendre" value="Creer">
            </form>
        </section>
    </div>
    <script src="./assets/js/emplois.js"></script>
</body>

</html>