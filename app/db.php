<?php
$conn = new mysqli("localhost", "labuser", "labpass123", "sqli_lab");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

