<?php
$servername = "localhost";
$username = "root";
$password = ""; // XAMPP default root password is empty
$dbname = "user_crud";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}
echo "✅ Connected successfully to database: $dbname";
?>
