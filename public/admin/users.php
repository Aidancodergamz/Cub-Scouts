<?php
include 'includes/header.php';
include 'config/config.php';

if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
    header('Location: login.php');
    exit;
}

$sql = "SELECT id, first_name, surname, username, email, user_type FROM users ORDER BY id ASC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Manage Users</title>
    <link rel="stylesheet" href="styles.css"> <!-- Optional CSS -->
</head>
<body>
    <div class="admin-container">
        <h1 class="admin-title">Cub Scout Members</h1>
        <p>View Parent/Helper details <a href="about_parents">here</a>.</p>

        <div class="admin-table-wrapper">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Surname</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($result) > 0): ?>
                        <?php while ($user = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td data-label="ID"><?= htmlspecialchars($user['id']) ?></td>
                                <td data-label="First Name"><?= htmlspecialchars($user['first_name']) ?></td>
                                <td data-label="Surname"><?= htmlspecialchars($user['surname']) ?></td>
                                <td data-label="Username"><?= htmlspecialchars($user['username']) ?></td>
                                <td data-label="Email"><?= htmlspecialchars($user['email']) ?></td>
                                <td data-label="Role"><?= htmlspecialchars($user['user_type']) ?></td>
                                <td data-label="Actions">
                                    <!-- Edit Button -->
                                    <a href="edit_user?id=<?= $user['id'] ?>" class="btn-edit">Edit</a>

                                    <!-- Delete Button -->
                                    <form action="delete_user" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                        <input type="hidden" name="id" value="<?= $user['id'] ?>" />
                                        <button type="submit" class="btn-delete">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="no-users">No users found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
