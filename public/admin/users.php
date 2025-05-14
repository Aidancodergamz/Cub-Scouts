<?php

    if (!isset($_SESSION['user_type']) === 'admin') {
        header('Location: login.php');
        exit;
    }

    include 'includes/header.php';
    include 'config/config.php';


$sql = "SELECT id, username, email, user_type FROM users ORDER BY id ASC";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
</head>
<body>
  <div class="admin-container">
    <h1 class="admin-title">Cub Scout Members</h1>

    <div class="admin-table-wrapper">
      <table class="admin-table">
        <thead>
          <tr>
            <th>ID</th>
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
                <td data-label="Username"><?= htmlspecialchars($user['username']) ?></td>
                <td data-label="Email"><?= htmlspecialchars($user['email']) ?></td>
                <td data-label="Role"><?= htmlspecialchars($user['user_type']) ?></td>

                <td data-label="Actions">
                <a href="edit-user.php?id=<?= $user['id'] ?>" class="btn-edit">Edit</a>
                <a href="handlers/delete_user.php?id=<?= $user['id'] ?>" class="btn-delete" onclick="return confirm('Are you sure?')">Delete</a>
                </td>

              </tr>
            <?php endwhile; ?>
          <?php else: ?>
            <tr>
              <td colspan="4" class="no-users">No users found.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
