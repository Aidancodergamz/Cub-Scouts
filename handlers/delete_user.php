<?php
session_start();

if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
    header('Location: login.php');
    exit;
}

include '../includes/header.php';
include '../config/config.php';

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);

    if ($stmt->execute()) {
        header('Location: ../messages/user_deleted.php?message=User+deleted+successfully');
        exit;
    } else {
        header('Location: ../public/admin/users.php?message=Error+deleting+user');
        exit;
    }
}
?>
