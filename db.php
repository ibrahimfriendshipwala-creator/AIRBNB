<?php
$host = "localhost";
$dbname = "dbxfogvu6cuhd6";
$username = "udg55r6gw7kdk";
$password = "mehagkamqn56";

// Create database connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
