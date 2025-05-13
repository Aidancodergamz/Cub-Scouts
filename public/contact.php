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
</body>
</html>