<?php 
    session_start();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    define('ROOT_DIR', '/Cub-Scouts/');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/nav.css">
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="assets/css/contact.css">
    <title>Document</title>
</head>
<body>
    <?php include "navigation.php"; ?>
    <script src="<?= ROOT_DIR ?>assets/js/hamburger.js"></script>
</body>
</html>
