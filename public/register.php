<?php
    include 'config/config.php';
    include 'includes/header.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $first_name = $_POST["first_name"];
    $surname = $_POST["surname"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $role = $_POST["user_type"];
    
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./assets/css/register.css">
    <title>Register</title>
</head>
<body>
<div class="register-container">
        <h2 class="register-title">Create an Account</h2>
        <form method="POST" action="handlers/register_process.php" class="register-form">
            <label for="first_name" class="register-label">First Name:</label>
            <input type="text" name="first_name" id="first_name" class="register-input" required>
            
            <label for="surname" class="register-label">Surname:</label>
            <input type="surname" name="surname" id="surname" class="register-input" required>

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
