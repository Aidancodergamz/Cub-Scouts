<?php

include 'config/config.php';
include 'includes/header.php';

// Check if user is an admin
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'admin') {
    echo "Access denied.";
    exit;
}

// Fetch parent details with names
$sql = "SELECT u.username, u.first_name, u.surname, u.email, pd.availability, pd.training_completed, pd.training_date
        FROM users u
        JOIN parent_details pd ON u.id = pd.parent_id
        WHERE u.user_type = 'parent'";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/view_parent_details.css">
    <title>View Parent Details</title>
</head>

<body>
    <h2>Parent Availability & Training Records</h2>

    <?php if ($result->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>First Name</th>
                    <th>Surname</th>
                    <th>Email</th>
                    <th>Availability</th>
                    <th>Training Completed</th>
                    <th>Training Date</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['username']) ?></td>
                        <td><?= htmlspecialchars($row['first_name']) ?></td>
                        <td><?= htmlspecialchars($row['surname']) ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                        <td><?= nl2br(htmlspecialchars($row['availability'])) ?></td>
                        <td><?= $row['training_completed'] ? 'Yes' : 'No' ?></td>
                        <td><?= $row['training_date'] ? htmlspecialchars($row['training_date']) : 'N/A' ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No parent records found.</p>
    <?php endif; ?>

    <?php $conn->close(); ?>
</body>
</html>
