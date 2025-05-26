<?php

include 'config/config.php';
include 'includes/header.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'parent') {
    echo "Access denied.";
    exit;
}

$parent_id = $_SESSION['user_id'];
$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $availability = $conn->real_escape_string($_POST['availability']);
    $training_completed = isset($_POST['training_completed']) ? 1 : 0;
    $training_date = $_POST['training_date'] ? $_POST['training_date'] : null;

    $check = $conn->prepare("SELECT parent_id FROM parent_details WHERE parent_id = ?");
    $check->bind_param("i", $parent_id);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        $stmt = $conn->prepare("UPDATE parent_details SET availability = ?, training_completed = ?, training_date = ? WHERE parent_id = ?");
        $stmt->bind_param("sisi", $availability, $training_completed, $training_date, $parent_id);
        $message = "Details updated successfully!";
    } else {
        $stmt = $conn->prepare("INSERT INTO parent_details (parent_id, availability, training_completed, training_date) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isis", $parent_id, $availability, $training_completed, $training_date);
        $message = "Details saved successfully!";
    }

    $stmt->execute();
    $stmt->close();
    $check->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/parent_details.css">
    <title>Parent Availability and Training</title>
</head>
<body>
    <h2>Submit Your Availability and Training Details</h2>

    <?php if ($message): ?>
        <p><strong><?= htmlspecialchars($message) ?></strong></p>
    <?php endif; ?>

    <form method="POST" action="">
        <label for="availability">Availability:</label>
        <textarea name="availability" required></textarea>

        <label>
            <input type="checkbox" name="training_completed" value="1">
            Training Completed
        </label>

        <label for="training_date">Training Date (if completed):</label>
        <input type="date" name="training_date">

        <button type="submit">Save Details</button>
    </form>
</body>
</html>
