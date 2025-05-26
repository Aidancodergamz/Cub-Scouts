<?php
include '../includes/header.php';
include '../config/config.php'; 

if ($_SESSION['user_type'] !== 'admin') {
    die("Access denied.");
}

$scout_id = $_POST['scout_id'];
$badge_id = $_POST['badge_id'];
$admin_id = $_SESSION['user_id'];

$stmt = $conn->prepare("INSERT INTO user_badges (user_id, badge_id, awarded_by) VALUES (?, ?, ?)");
$stmt->bind_param("iii", $scout_id, $badge_id, $admin_id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/nav.css">
    <link rel="stylesheet" href="../assets/css/badge-awards.css">
    <title>Document</title>
</head>
<body>
    <div class="award-badge">
    <?php 
        if ($stmt->execute()) {
    echo "Badge awarded successfully!";
} else {
    echo "Error awarding badge: " . $stmt->error;
}
$stmt->close();
exit();
    ?>
    </div>
</body>
</html>