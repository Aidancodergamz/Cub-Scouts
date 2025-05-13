<?php
include 'includes/header.php';
include "config/config.php";

// Check if user_type is set in the session
if (isset($_SESSION['user_type'])) {
    $user_type = $_SESSION['user_type'];
} else {
    $user_type = null; // Or you can redirect to login or set a default
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
                echo '</div>';
            }
        } else {
            echo "<p>No images uploaded yet.</p>";
        }
        ?>
    </div>

    <!-- Gallery Upload Section -->
    <?php if ($user_type === 'admin' || $user_type === 'parent'): ?>
    <div class="gallery-upload-section">
        <form action="handlers/image_upload.php" method="post" enctype="multipart/form-data">
            <label for="imageUpload">Upload an image:</label>
            <input type="file" name="image" id="imageUpload" accept="image/*" required>
            <button type="submit">Upload</button>
        </form>
    </div>
    <?php endif; ?>

</body>
</html>
