<?php 

$conn = new PDO('mysql:host=127.0.0.1;dbname=live;', 'root', '');
$query = $conn->prepare('UPDATE users SET nom = ? WHERE id= 1');
$query->execute([$_POST['name']]);

$query2 = $conn->prepare('SELECT nom FROM users WHERE id = 1');
$query2->execute();
$data = $query2->fetch();


echo $data['nom']; 

