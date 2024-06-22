<?php
session_start();
include('db.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Welcome, <?php echo $_SESSION['username']; ?></h1>
        <a class="logout" href="logout.php">Logout</a>
        <h2>All Users</h2>
        <ul>
            <?php while ($user = $result->fetch_assoc()): ?>
                <li <?php if ($user['id'] == $_SESSION['user_id']) echo 'style="font-weight: bold;"'; ?>>
                    <?php echo $user['username']; ?>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>
</body>
</html>
