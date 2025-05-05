<?php
// Include database connection and config file
include '../config/config.php';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get form data
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $username = htmlspecialchars($_POST["username"]);
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $role = $_POST["user_type"];

    //Check that passwords are the same
    if ($password !== $confirm_password) {
        echo "Passwords must match, please check password";
        exit;
    }

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format!";
        exit;
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if email or username already exists in the database
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? OR username = ?");
    $stmt->execute([$email, $username]);
    $existing_user = $stmt->fetch();

    if ($existing_user) {
        echo "Email or username already taken!";
        exit;
    }

    // Insert user into the database
    $stmt = $conn->prepare("INSERT INTO users (email, username, password, user_type) VALUES (?, ?, ?, ?)");
    $stmt->execute([$email, $username, $hashed_password, $role]);

    // Redirect to a success page or display a success message
    // echo "Registration successful!";
    header("Location: /Cub-Scouts/success");  // Redirect to the base URL
    exit;

}
?>
