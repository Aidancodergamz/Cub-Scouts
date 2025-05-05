<?php
    include 'config/config.php';
    include 'includes/header.php';
// signup.php
// Handle form submission (basic version, no database yet)
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $role = $_POST["user_type"];

    // For now, just output the values (in real use, you'd validate & save to DB)
    echo "<p>Signed up with:</p>";
    echo "Email: $email<br>";
    echo "Username: $username<br>";
    echo "Role: $role<br>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>
<div class="register-container">
        <h2 class="register-title">Create an Account</h2>
        <form method="POST" action="handlers/register_process.php" class="register-form">
            <label for="email" class="register-label">Email:</label>
            <input type="email" name="email" id="email" class="register-input" required>

            <label for="username" class="register-label">Username:</label>
            <input type="text" name="username" id="username" class="register-input" required>

            <label for="password" class="register-label">Password:</label>
            <input type="password" name="password" id="password" class="register-input" required>

            <label for="confirm_password" class="register-label">Confirm Password:</label>
            <input type="password" name="confirm_password" id="confirm_password" class="register-input" required>

            <label for="user_type" class="register-label">I am a:</label>
            <select name="user_type" id="user_type" class="register-select" required>
                <option value="">--Select--</option>
                <option value="parent">Parent</option>
                <option value="scout">Scout</option>
            </select>

            <button type="submit" class="register-button">Register</button>
        </form>
    </div>
</body>
</html>
