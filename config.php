<?php
$host = "148.72.232.182";
$user= "tkchelliah";
$password = "TKCthaththa@1882";
$database = "tkchelliah_";

// Create connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>