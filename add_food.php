<?php
require_once '../includes/config.php';  // Ensure this path is correct

// Check if the request is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $food_name = $_POST['food_name'];
    $fat = $_POST['fat'];
    $carbs = $_POST['carbs'];
    $protein = $_POST['protein'];

    // Prepare an SQL statement to avoid SQL injection
    $stmt = $connection->prepare("INSERT INTO foods (name, fat, carbs, protein) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sddd", $food_name, $fat, $carbs, $protein);
    
    // Execute the statement
    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => $stmt->error]);
    }
    
    // Close statement and connection
    $stmt->close();
    $connection->close();
}
?>
