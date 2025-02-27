<?php
$servername = "localhost";
$username = "root"; // Default username for MySQL
$password = ""; // Default password for MySQL (empty for XAMPP)
$dbname = "housing_db"; // Name of the database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
