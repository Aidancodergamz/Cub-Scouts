<?php
include '../config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
    $image = $_FILES['image'];
    $imageName = basename($image['name']);
    $imageTmpName = $image['tmp_name'];
    $imageSize = $image['size'];
    $imageError = $image['error'];

    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    $imageType = mime_content_type($imageTmpName);

    $uploadDirectory = __DIR__ . '/../public/assets/uploads/';
    $filePath = $uploadDirectory . $imageName;

    if ($imageError !== UPLOAD_ERR_OK) {
        die("Error uploading the image.");
    }

    if (!in_array($imageType, $allowedTypes)) {
        die("Only JPEG, PNG, and GIF images are allowed.");
    }

    if ($imageSize > 5 * 1024 * 1024) {
        die("File size is too large. Maximum size is 5MB.");
    }

    if (move_uploaded_file($imageTmpName, $filePath)) {

        $imagePath = 'public/assets/uploads/' . $imageName;

        $stmt = $conn->prepare("INSERT INTO images (image_name, image_path) VALUES (?, ?)");
        $stmt->bind_param("ss", $imageName, $imagePath);
        $stmt->execute();
        $stmt->close();

        echo "Image uploaded successfully.";
    } else {
        echo "Failed to move the uploaded file.";
    }
} else {
    echo "No file uploaded.";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/nav.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
