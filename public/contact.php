<?php 
    include "includes/header.php";
?>

<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./assets/css/contact.css">
  <title>Contact Obanshire Cub Scouts</title>
</head>
<body>
  <div class="contact-container">
    <h2 class="contact-h2">Contact Us</h2>
    <p class="intro">Are you a parent or carer interested in getting your child involved with the Obanshire Cub Scouts? If so, We'd love to hear from you. Please get in touch with us below!</p>
    <form action="/Cub-Scouts/contact_message" method="POST">
      <label for="name">Name</label>
      <input type="text" id="name" name="name" required />

      <label for="email">Email</label>
      <input type="email" id="email" name="email" required />

      <label for="phone">Phone</label>
      <input type="tel" id="phone" name="phone" required />

      <label for="message">Message</label>
      <textarea id="message" name="message" required></textarea>

      <button type="submit">Submit</button>
    </form>
  </div>

  <div class="map-section">
    <h2>Our Location:</h2>
    <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d592.7251380858518!2d-5.473204071421964!3d56.41446174020067!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNTbCsDI0JzUyLjEiTiA1wrAyOCcyMS4yIlc!5e1!3m2!1sen!2suk!4v1748860851147!5m2!1sen!2suk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>

</body>
</html>