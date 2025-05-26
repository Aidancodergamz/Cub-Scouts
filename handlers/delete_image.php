<?php
include "../includes/header.php";
include "../config/config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'admin') {
    $image_path = $_POST['image_path'];

    $stmt = $conn->prepare("DELETE FROM images WHERE image_path = ?");
    $stmt->bind_param("s", $image_path);
    $stmt->execute();

    if (file_exists($image_path)) {
        unlink($image_path);
    }

    exit();
} else {
    http_response_code(403);
    echo "Unauthorized";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/nav.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Document</title>
</head>
<body>
  
</body>
</html>
