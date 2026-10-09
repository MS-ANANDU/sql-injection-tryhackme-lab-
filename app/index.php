<?php
include 'db.php';
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // VULNERABLE: raw string concatenation, no sanitization
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $message = "Login successful! Welcome, " . $row['username'] . " (role: " . $row['role'] . ")";
    } else {
        $message = "Login failed.";
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>SQLi Lab - Login</title></head>
<body>
    <h2>Challenge 1: Login Bypass</h2>
    <form method="POST">
        Username: <input type="text" name="username"><br><br>
        Password: <input type="password" name="password"><br><br>
        <input type="submit" value="Login">
    </form>
    <p><strong><?php echo $message; ?></strong></p>
</body>
</html>
