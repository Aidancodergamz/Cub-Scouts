<?php

$hn = "localhost";
$un = "root";
$pw = "";
$db = "cub_scouts";

$conn = new mysqli($hn, $un, $pw, $db);

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
} else {
    // echo "Connection Successful!";
}

?>