<?php
header('Content-Type: application/json');
include("database.php");
$errors = array();
$sql = "SELECT username, email, password, date FROM users";
$stmt = $pdo->query($sql);

$users = [];
while ($row = $stmt->fetch())
{
    $users[] = $row;
}

echo json_encode($users);
?>
