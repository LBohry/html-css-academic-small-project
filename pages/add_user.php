<?php
require "database.php";

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO users (username, email, password, date) VALUES (?, ?, ?, NOW())";
$stmt= $pdo->prepare($sql);
$stmt->execute([$username, $email, $password]);

header("Location: admin.php"); 
?>
