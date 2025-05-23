<?php
session_start();
include "../config/config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'admin') {
    $image_path = $_POST['image_path'];

    // Delete from database
    $stmt = $conn->prepare("DELETE FROM images WHERE image_path = ?");
    $stmt->bind_param("s", $image_path);
    $stmt->execute();

    // Delete file from server
    if (file_exists($image_path)) {
        unlink($image_path);
    }

    header("Location: ../public/gallery.php");

    exit();
} else {
    http_response_code(403);
    echo "Unauthorized";
}
