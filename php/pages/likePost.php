<?php 
session_start();
require '../class/UserActions.php';
require '../class/PostActions.php';
require '../class/Security.php';
$security = new Security('../logIn');
$security->security();
$like = new PostActions();
$like->likeActions();
header('location:'.$_SERVER['HTTP_REFERER']);
