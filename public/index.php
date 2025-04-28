<?php 
include "includes/header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <section class="hero">
        <div class="hero-text">
            <h1>Welcome to Obanshire Cub Scouts!</h1>
            <p>Your adventure starts here.</p>
            <a href="<?= ROOT_DIR ?>about" class="btn">Learn More</a>
        </div>
    </section>

    <section class="intro">
        <div class="container">
            <h2>About Us</h2>
            <p>Obanshire Cub Scouts is a community-based scouting group for children aged 8 to 10. We aim to provide young people with exciting and educational activities to help them build confidence, leadership skills, and lifelong friendships.</p>
            <a href="<?= ROOT_DIR ?>about" class="btn">Read More</a>
        </div>
    </section>

    <section class="activities">
        <div class="container">
            <h2>What We Do</h2>
            <p>From hiking and camping to team-building activities and charity work, our Cubs get involved in a wide range of exciting experiences.</p>
            <a href="<?= ROOT_DIR ?>activities" class="btn">Explore Activities</a>
        </div>
    </section>
    
</body>
</html>