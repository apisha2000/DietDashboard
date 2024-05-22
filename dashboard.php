<?php
session_start();
// Redirect to login page if not logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

require_once '../includes/config.php'; // Ensure the path to your config file is correct

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/dashboard.css"> <!-- Adjust path as needed -->
    <script src="../js/dashboard.js"></script>
</head>
<body>
    <header>
        <div class="logo"><img src="logo.png" height="100" width="100"></div>
        <div class="date-time"><?php echo date("Y-m-d H:i:s"); ?></div>
    </header>
    <div class="container">
        <aside>
            <ul>
                <li onclick="showContent('chart')">Chart</li>
                <li onclick="showContent('today')">Today</li>
                <li onclick="showContent('foodList')">Food List</li>
            </ul>
        </aside>
        <section id="content">
            
        </section>
    </div>
    <footer>
        © All rights reserved, 2023
    </footer>
</body>
</html>
