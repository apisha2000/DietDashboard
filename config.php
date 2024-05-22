<?php
// Database configuration settings
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');  // Default XAMPP MySQL username
define('DB_PASSWORD', '');      // Default XAMPP MySQL password (none)
define('DB_DATABASE', 'diet_dashboard_db'); // Your database name

// Create database connection
$connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>
