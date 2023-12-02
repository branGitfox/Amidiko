<?php 

session_start();
require '../class/UserActions.php';
require '../class/PostActions.php';
require '../class/PubActions.php';

$pub = new PubActions();
echo $pub->showPubById($pub->getPubId())['user_name'];
echo $pub->showPubById($pub->getPubId())['pub_desc'];