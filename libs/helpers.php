<?php
$conn = mysqli_connect("localhost", "root", "", "for_learning");

function getAll($table, $where = null)
{
    global $conn;
    $sql = "SELECT * FROM $table";
    if ($where) {
        $sql .= " WHERE $where";
    }
    $result = mysqli_query($conn, $sql);
    return $result;
}

function auth()
{
    session_start();
    if (isset($_SESSION['user'])) {
        $result = getAll('users', "id = " . $_SESSION['user']);
        $user = mysqli_fetch_assoc($result);
        if ($user['role'] != 1) {
            header('Location: /login.php');
            die;
        }
        return $user;
    } else {
        header('Location: /login.php');
        die;
    }
}

function guest()
{
    session_start();
    if (isset($_SESSION['user'])) {
        header('Location: /index.php');
        die;
    }
}
