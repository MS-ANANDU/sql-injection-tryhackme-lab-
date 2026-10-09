<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db.php';
$results = [];

if (isset($_GET['q'])) {
    $q = $_GET['q'];
    $query = "SELECT title, content FROM articles WHERE title LIKE '%$q%'";
    $result = $conn->query($query);
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $results[] = $row;
        }
    } else {
        $error = $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>SQLi Lab - Search</title></head>
<body>
    <h2>Challenge 2: UNION-Based Extraction</h2>
    <form method="GET">
        Search articles: <input type="text" name="q">
        <input type="submit" value="Search">
    </form>

    <?php if (isset($error)): ?>
        <p style="color:red;">SQL Error: <?php echo $error; ?></p>
    <?php endif; ?>

    <?php foreach ($results as $r): ?>
        <div>
            <h3><?php echo htmlspecialchars($r['title'] ?? '', ENT_QUOTES); ?></h3>
            <p><?php echo htmlspecialchars($r['content'] ?? '', ENT_QUOTES); ?></p>
        </div>
    <?php endforeach; ?>
</body>
</html>
