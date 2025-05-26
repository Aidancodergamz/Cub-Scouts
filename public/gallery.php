<?php
include(__DIR__ . '/../includes/header.php');
include(__DIR__ . '/../config/config.php');

if (isset($_SESSION['user_type'])) {
    $user_type = $_SESSION['user_type'];
} else {
    $user_type = null; 
}

$query = "SELECT image_name, image_path FROM images";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="assets/css/gallery.css">
    <title>Gallery</title>
</head>
<body>
    <div class="gallery-grid">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="gallery-item">';
                echo '<img src="' . $row['image_path'] . '" alt="' . htmlspecialchars($row['image_name']) . '">';

            if ($user_type === 'admin') {
                echo '<form method="POST" action="handlers/delete_image.php" class="delete-form" onsubmit="return confirm(\'Are you sure you want to delete this image?\');">';
                echo '<input type="hidden" name="image_path" value="' . htmlspecialchars($row['image_path']) . '">';
                echo '<button type="submit" class="delete-button">&times;</button>';
                echo '</form>';
    }

    echo '</div>';
}

        } else {
            echo "<p>No images uploaded yet.</p>";
        }
        ?>
    </div>

    <?php if ($user_type === 'admin'):?>
    <div class="gallery-upload-section">
        <form action="handlers/image_upload.php" method="post" enctype="multipart/form-data">
            <label for="imageUpload">Upload an image:</label>
            <input type="file" name="image" id="imageUpload" accept="image/*" required>
            <button type="submit">Upload</button>
        </form>
    </div>
    <?php endif; ?>

    <script src="assets/js/gallery.js"></script>

</body>
</html>
