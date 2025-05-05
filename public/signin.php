<?php
include('includes/header.php');
include('config/config.php');  // mysqli connection

$error = '';  // Default error is empty

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user input
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // Prepare the SQL query to prevent SQL Injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        // Check if the password is correct
        if (password_verify($password, $user['password'])) {
            // Success: Set session variables
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

<div class="container">
    <div class="login-box">
        <h2>Sign In</h2>
        <!-- Display error message if set -->
        <?php if ($error): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>

        <!-- Sign In form -->
        <form method="POST" action="/Cub-Scouts/sign_in">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" required>
            </div>

            <button type="submit" class="btn">Sign In</button>
        </form>
    </div>
</div>
