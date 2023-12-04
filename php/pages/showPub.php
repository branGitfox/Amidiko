<?php

session_start();
require '../class/UserActions.php';
require '../class/PostActions.php';
require '../class/PubActions.php';

$pub = new PubActions();
echo $pub->showPubById($pub->getPubId())['user_name'];
echo $pub->showPubById($pub->getPubId())['pub_desc'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/voirannonce.css">
    <title>Amidiko | Job</title>
</head>

<body>
    <div class="container">
        <div class="info-container">
            <p class="infos">Par
                <?= $pub->showPubById($pub->getPubId())['user_name'] ?>
            </p>
        </div>
    </div>
</body>

</html>