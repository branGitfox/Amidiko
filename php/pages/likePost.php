<?php 
session_start();
require '../class/UserActions.php';
require '../class/PostActions.php';
$like = new PostActions();
$like->likeActions();
header('location:'.$_SERVER['HTTP_REFERER']);
