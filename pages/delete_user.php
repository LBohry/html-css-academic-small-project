<?php
require "database.php";

$id = $_GET['id'];

$sql = "DELETE FROM users WHERE id = ?";
$stmt= $pdo->prepare($sql);
$stmt->execute([$id]);

header("Location: admin.php"); 
?>
