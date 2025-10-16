<?php
require_once '../templates/header.php';
require_once '../libs/helpers.php';
auth();

// cari data user berdasarkan id
$id = $_GET['id'] ?? null;

if (!$id || $id == 1) {
    header('Location: /users.php');
    die;
}

$result = getAll('users', "id = $id");
$user = mysqli_fetch_assoc($result);
?>

<h1>Edit User</h1>
<hr>
<div class="card">
    <div class="card-body">
        <form action="update.php" method="POST">
            <input type="hidden" name="id" value="<?= $user['id'] ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input value="<?= $user['name'] ?>" type="text" class="form-control" id="name" placeholder="Enter name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input value="<?= $user['email'] ?>" disabled type="email" class="form-control" id="email"
                    placeholder="Enter email">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/users.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>

<?php require_once '../templates/footer.php'; ?>