<?php

include 'config/config.php';  // adjust path if needed
include 'includes/header.php';

// Only allow admins to access
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
    echo "Access denied.";
    exit;
}

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "Invalid user ID.";
    exit;
}

$user_id = (int)$_GET['id'];

// Fetch user data
$sql = "SELECT id, first_name, surname, username, email, user_type FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows !== 1) {
    echo "User not found.";
    exit;
}

$user = $result->fetch_assoc();

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize & validate inputs
    $first_name = trim($_POST['first_name']);
    $surname = trim($_POST['surname']);
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $user_type = trim($_POST['user_type']);

    if (!$first_name || !$surname || !$username || !$email || !$user_type) {
        $error = "Please fill in all fields.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email address.";
    } else {
        // Update user
        $update_sql = "UPDATE users SET first_name=?, surname=?, username=?, email=?, user_type=? WHERE id=?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("sssssi", $first_name, $surname, $username, $email, $user_type, $user_id);

        if ($update_stmt->execute()) {
            $success = "User updated successfully.";
            // Refresh user data
            $user['first_name'] = $first_name;
            $user['surname'] = $surname;
            $user['username'] = $username;
            $user['email'] = $email;
            $user['user_type'] = $user_type;
        } else {
            $error = "Failed to update user.";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="assets/css/edit_user.css">
<title>Edit User</title>
</head>
<body>

<h1>Edit User: <?= htmlspecialchars($user_id) ?></h1>

<?php if ($error): ?>
    <div class="message error"><?= htmlspecialchars($error) ?></div>
<?php endif; ?>

<?php if ($success): ?>
    <div class="message success"><?= htmlspecialchars($success) ?></div>
<?php endif; ?>

<form method="post" action="" class="edit-user-form">
    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name" value="<?= htmlspecialchars($user['first_name']) ?>" required />

    <label for="surname">Surname:</label>
    <input type="text" id="surname" name="surname" value="<?= htmlspecialchars($user['surname']) ?>" required />

    <label for="username">Username:</label>
    <input type="text" id="username" name="username" value="<?= htmlspecialchars($user['username']) ?>" required />

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required />

    <label for="user_type">User Type:</label>
    <select id="user_type" name="user_type" required>
        <option value="parent" <?= $user['user_type'] === 'parent' ? 'selected' : '' ?>>parent</option>
        <option value="admin" <?= $user['user_type'] === 'admin' ? 'selected' : '' ?>>admin</option>
        <option value="scout" <?= $user['user_type'] === 'scout' ? 'selected' : '' ?>>scout</option>
        <!-- Add other roles as needed -->
    </select>

    <button type="submit" class="btn">Update User</button>
</form>

<a href="users">Back to Users List</a>

</body>
</html>
