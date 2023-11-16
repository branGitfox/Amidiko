<?php  
require '../class/UserActions.php';
require '../class/PostActions.php';
$post = new PostActions();
var_dump($post->getPostById($post->getPostId()));
