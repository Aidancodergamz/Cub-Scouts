<?php
session_start();


    include 'config/config.php';

// Check if user is an admin
if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'admin') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Get the message from POST data
        $message = $_POST['message'];

        if (empty($message)) {
            echo "Message cannot be empty!";
        } else {
            // Escape input to prevent SQL injection
            $message = $conn->real_escape_string($message);
            $posted_by = $_SESSION['username']; // Assume session contains username

            // Insert the message into the database
            $sql = "INSERT INTO newsfeed (message, posted_by, is_admin_post) VALUES ('$message', '$posted_by', TRUE)";
            
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
} else {
    echo "You are not authorized to post messages.";
}
?>
