<?php
require_once '../templates/header.php';
require_once '../libs/helpers.php';
$user = auth();
?>

<div class="bg-light p-5 border rounded">
    <h1>Welcome to My App</h1>
    <p>You are logged in as <u><?= $user['name'] ?></u></p>
</div>

<?php require_once '../templates/footer.php'; ?>