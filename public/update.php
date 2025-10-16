<?php
require_once '../libs/helpers.php';
auth();
// tangkap data dari form
$id = $_POST['id'] ?? null;
$name = $_POST['name'] ?? null;

$sql = "UPDATE users SET name = '$name' WHERE id = $id";
mysqli_query($conn, $sql);
header('Location: /users.php');
