<?php
require_once '../includes/config.php';  // Ensure this path is correct

header('Content-Type: application/json');

// Connect to the database
$connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

// Check connection
if ($connection->connect_error) {
    echo json_encode(['error' => 'Database connection failed']);
    exit;
}

// Fetch foods from the database
$result = $connection->query("SELECT * FROM foods");
if ($result) {
    $foods = [];
    while ($row = $result->fetch_assoc()) {
        $foods[] = $row;
    }
    echo json_encode($foods);
} else {
    echo json_encode(['error' => 'Failed to fetch foods']);
}

$connection->close();
?>
