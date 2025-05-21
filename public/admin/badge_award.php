<?php
include 'includes/header.php';
include 'config/config.php'; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Award Badges</title>
    <link rel="stylesheet" href="assets/css/badge-awards.css" />
</head>
<body>

<form method="POST" action="handlers/badge_award.php">
    <label for="scout_id">Select Scout:</label>
    <select name="scout_id" required>
        <?php
        $scouts = $conn->query("SELECT id, first_name, surname FROM users WHERE user_type = 'scout'");
        while ($scout = $scouts->fetch_assoc()) {
            echo "<option value='{$scout['id']}'>{$scout['first_name']} {$scout['surname']}</option>";
        }
        ?>
    </select>

    <label for="badge_id">Select Badge:</label>
    <select name="badge_id" required>
        <?php
        $badges = $conn->query("SELECT id, name FROM badges");
        while ($badge = $badges->fetch_assoc()) {
            echo "<option value='{$badge['id']}'>{$badge['name']}</option>";
        }
        ?>
    </select>

    <input type="submit" value="Award Badge">
</form>


</body>
</html>
