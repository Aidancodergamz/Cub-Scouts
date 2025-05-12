<?php 
    include "includes/header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Obanshire Cub Scouts</title>
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
        <div class="container flex-row">
            <div class="image">
                <img src="assets/images/scouts_walk.jpg" alt="Cub Scouts Group" style="width:100%; max-width:400px; height:auto;">
            </div>
            <div class="text">
                <h2>About Us</h2>
                <p>Obanshire Cub Scouts is a community-based scouting group for children aged 6 to 12. We aim to provide young people with exciting and educational activities to help them build confidence, leadership skills, and lifelong friendships.</p>
                <a href="<?= ROOT_DIR ?>about" class="btn">Read More</a>
            </div>
        </div>
    </section>

    <section class="activities">
        <div class="container flex-row-reverse">
            <div class="image">
                <img src="assets/images/what_we_do.jpg" alt="Scouting Activities" style="width:100%; max-width:400px; height:auto;">
            </div>
            <div class="text">
                <h2>What We Do</h2>
                <p>From hiking and camping to team-building activities and charity work, our Cubs get involved in a wide range of exciting experiences.</p>
                <a href="<?= ROOT_DIR ?>games" class="btn">Explore Activities</a>
            </div>
        </div>
    </section>
    
</body>
</html>
