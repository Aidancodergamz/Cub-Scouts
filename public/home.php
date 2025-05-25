<?php 
    include "includes/header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/home.css">
    <title>Welcome to Obanshire Cub Scouts</title>
</head>
<body>
    
    <section class="home-hero">
    <video autoplay muted loop playsinline class="hero-video">
        <source src="assets/video/stock_video.mp4" type="video/mp4" />
        Your browser does not support the video tag.
    </video>
    <div class="home-hero-overlay"></div>
    <div class="home-hero-text">
        <h1>Welcome to Obanshire Cub Scouts!</h1>
        <p>Your adventure starts here!</p>
    </div>
</section>


    <section class="home-intro">
        <div class="home-container home-flex-row">
            <div class="home-image">
                <img src="assets/images/scouts_walk.jpg" alt="Cub Scouts Group">
            </div>
            <div class="home-text">
                <h2>About Us</h2>
                <p>Obanshire Cub Scouts is a community-based scouting group for children aged 6 to 12. We aim to provide young people with exciting and educational activities to help them build confidence, leadership skills, and lifelong friendships.</p>
                <a href="<?= ROOT_DIR ?>about" class="home-btn">Read More</a>
            </div>
        </div>
    </section>

    <section class="home-activities">
        <div class="home-container home-flex-row-reverse">
            <div class="home-image">
                <img src="assets/images/what_we_do.jpg" alt="Scouting Activities">
            </div>
            <div class="home-text">
                <h2>Get Involved as a Helper</h2>
                <p>We always welcome the support of parents and helpers at Obanshire Cub Scouts! Whether it's assisting with activities, leading games, or helping with events, your involvement makes a huge difference. If you're interested in lending a hand, please click below to find out the requirements.</p>
                <a href="<?= ROOT_DIR ?>info" class="home-btn">More Information</a>
            </div>
        </div>
    </section>
    
</body>
</html>
