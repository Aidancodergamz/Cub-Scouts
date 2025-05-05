<?php

$hn = "localhost";
$un = "root";
$pw = "";
$db = "cub_scouts";

// Create database connection
$conn = new mysqli($hn, $un, $pw, $db);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
} else {
    // echo "Connection Successful!";
}

?>