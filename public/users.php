<?php
require_once '../templates/header.php';
require_once '../libs/helpers.php';
auth();

$search = $_GET['search'] ?? '';
$result = getAll('users', " (name LIKE '%$search%' OR email LIKE '%$search%') AND role != 1 ");
?>

<h1>Users</h1>
<hr>
<div class="card">
    <div class="card-body">
        <form action="" class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search..." name="search" value="<?= $search ?>">
            <button class="btn-primary btn" type="submit">
                <i class="bi bi-search"></i>
            </button>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- buat baris sebanyak jumlah data -->
                <!-- awal baris -->
                <?php
                $i = 1;
                while ($user = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $user['name'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td>
                            <a href="/edit.php?id=<?= $user['id'] ?>" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <a href="/delete.php?id=<?= $user['id'] ?>" onclick="confirm('Are you sure?')" class="btn btn-sm btn-danger">
                                <i class="bi bi-x"></i>
                            </a>
                        </td>
                    </tr>
                <?php
                }
                ?>
                <!-- akhir baris -->
            </tbody>
        </table>
    </div>
</div>

<?php require_once '../templates/footer.php'; ?>