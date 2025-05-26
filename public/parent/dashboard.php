<?php

    include 'includes/header.php';   
    include 'config/config.php';     

    if (!isset($_SESSION['username'])) {
        die("You need to log in first.");
    }

    $username = $_SESSION['username'];

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username);  
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (!$result || mysqli_num_rows($result) === 0) {
        die("User not found.");
    }

    $user = mysqli_fetch_assoc($result);

    if ($user['user_type'] !== 'parent') {
        die("You are not authorized to access this page.");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard - <?= htmlspecialchars($user['username']) ?></title>
  <link rel="stylesheet" href="assets/css/scout-dash.css" />
</head>
<body>
  <div class="container">
    <header>
      <h1>Obanshire Cub Scouts</h1>
      <h2>Welcome, <?= htmlspecialchars($user['username']) ?>!</h2>
    </header>

    <section>
      <h3>Profile Details</h3>
      <p><strong>First Name:</strong> <?= htmlspecialchars($user['first_name']) ?></p>
      <p><strong>Surname:</strong> <?= htmlspecialchars($user['surname']) ?></p>
      <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
      <p><strong>User Type:</strong> <?= htmlspecialchars($user['user_type']) ?></p>
    </section>
  </div>
</body>
</html>
