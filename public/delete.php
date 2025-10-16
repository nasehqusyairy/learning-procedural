<?php
require_once '../libs/helpers.php';
auth();

// tangkap id dari url
$id = $_GET['id'] ?? null;
if (!$id || $id == 1) {
    header('Location: /users.php');
    die;
}

$sql = "DELETE FROM users WHERE id = $id";
mysqli_query($conn, $sql);
header('Location: /users.php');
