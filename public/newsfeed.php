<?php
    include 'includes/header.php';
    include 'config/config.php';

$sql = "SELECT * FROM newsfeed ORDER BY timestamp DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='newsfeed-post'>";
        echo "<h3>" . htmlspecialchars($row['posted_by']) . " - " . date('F j, Y, g:i a', strtotime($row['timestamp'])) . "</h3>";
        echo "<p>" . htmlspecialchars($row['message']) . "</p>";
        echo "</div>";
    }
} else {
    echo "No posts yet.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/newsfeed.css">
</head>
<body>
    <?php
    
    if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'admin') {
    
    ?>
    <form method="POST" action="postnews">
        <textarea name="message" placeholder="Enter your message..." required></textarea><br>
        <button type="submit">Post</button>
    </form>
    <?php
    } else {
        // echo "You are not authorized to post messages.";
    }
?>
</body>
</html>



