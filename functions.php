<?php
require 'config.php';

// Function to check login
function checkLogin($username, $password) {
    global $connection;
    $sql = "SELECT id, password FROM users WHERE username = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($id, $hashed_password);
    if ($stmt->fetch() && password_verify($password, $hashed_password)) {
        // Start the session and set session variables
        session_start();
        $_SESSION['user_id'] = $id;
        $_SESSION['username'] = $username;
        return true;
    }
    return false;
}
function registerUser($username, $password, $connection) {
    // Check if the username already exists
    $stmt = $connection->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->close();
        return false; // Username already exists
    }

    // If username does not exist, proceed with registration
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $connection->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $hashedPassword);
    $result = $stmt->execute();
    $stmt->close();

    return $result; // Return true if registration was successful
}

?>
