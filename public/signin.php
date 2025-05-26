<?php
include('includes/header.php');
include('config/config.php');  

$error = '';  

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {

        if (password_verify($password, $user['password'])) {

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['user_type'] = $user['user_type'];

            // Redirect to home or dashboard
            header("Location: /Cub-Scouts/");
            exit;
        } else {
            $error = "Incorrect password!";
        }
    } else {
        $error = "Username not found!";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/sign-in.css">
    <title>Document</title>
</head>
<body>
    <div class="sign-in-container">
    <div class="sign-in-login-box">
        <h2>Sign In</h2>
        <?php if ($error): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>

        <form class="sign-in-form" method="POST" action="/Cub-Scouts/sign_in">
            <div class="sign-in-form-group">
                <label for="username">Username</label>
                <input type="text" name="username" required>
            </div>

            <div class="sign-in-form-group">
                <label for="password">Password</label>
                <input type="password" name="password" required>
            </div>

            <button type="submit" class="btn">Sign In</button>
        </form>
    </div>
</div>
</body>
</html>