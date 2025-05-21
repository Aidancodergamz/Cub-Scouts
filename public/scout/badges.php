<?php

include 'config/config.php';
include 'includes/header.php';

// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Check if scout ID is passed via GET parameter and is numeric
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $scout_id = (int)$_GET['id'];
} else {
    // Otherwise use logged-in user's ID (scout viewing own badges)
    $scout_id = $_SESSION['user_id'];
}

// Prepare and fetch badges for this user
$stmt = $conn->prepare("
    SELECT b.name, b.description, b.image_path, ub.awarded_at
    FROM user_badges ub
    JOIN badges b ON ub.badge_id = b.id
    WHERE ub.user_id = ?
");
$stmt->bind_param("i", $scout_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>My Badges</title>
    <link rel="stylesheet" href="assets/css/scout-badges.css" />
</head>
<body>
    <h1>Current Badges</h1>

    <?php if ($result->num_rows > 0): ?>
        <div class="badges-container">
            <?php while ($badge = $result->fetch_assoc()): ?>
                <div class="badge-card">
                    <img class="badge-image" src="<?= htmlspecialchars($badge['image_path']) ?>" alt="<?= htmlspecialchars($badge['name']) ?>" />
                    <h3 class="badge-title"><?= htmlspecialchars($badge['name']) ?></h3>
                    <p class="badge-description"><?= htmlspecialchars($badge['description']) ?></p>
                    <small class="badge-awarded-date">Awarded on: <?= date('d M Y', strtotime($badge['awarded_at'])) ?></small>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else: ?>
        <p>This scout has not earned any badges yet.</p>
    <?php endif; ?>

</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
