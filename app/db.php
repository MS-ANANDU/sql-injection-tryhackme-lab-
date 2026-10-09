<?php
// Replace with your own local database credentials
$conn = new mysqli("localhost", "labuser", "YOUR_DB_PASSWORD_HERE", "sqli_lab");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

