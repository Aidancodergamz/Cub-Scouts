<?php

include '../config/config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $first_name = $_POST["first_name"];
    $surname = $_POST["surname"];
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $username = htmlspecialchars($_POST["username"]);
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $user_type = $_POST["user_type"]; 

    if ($password !== $confirm_password) {
        echo "Passwords must match, please check password";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format!";
        exit;
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? OR username = ?");
    $stmt->execute([$email, $username]);
    $existing_user = $stmt->fetch();

    if ($existing_user) {
        echo "Email or username already taken!";
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO users (first_name, surname, email, username, password, user_type) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$first_name, $surname, $email, $username, $hashed_password, $user_type]);
    $user_id = $conn->insert_id; 


    if ($user_type === 'scout') {
        $link_code = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, 8);

        $stmt2 = $conn->prepare("INSERT INTO scouts (user_id, first_name, surname, link_code) VALUES (?, ?, ?, ?)");
        $stmt2->execute([$user_id, $first_name, $surname, $link_code]);
    }

    header("Location: /Cub-Scouts/success");
    exit;
}
?>
