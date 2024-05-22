<?php
session_start();

require_once '../includes/functions.php';
$connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}


$error = '';

// Handle login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    // Check if username and password are set
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        if (checkLogin($username, $password)) {
            header("Location: dashboard.php");
            exit;
        } else {
            $error = 'Invalid username or password.';
        }
    } else {
        $error = 'Please enter both username and password.';
    }
}


// Handle signup
if (isset($_POST['signup'])) {
    $username = trim($_POST['new_username']);
    $password = trim($_POST['new_password']);
    $confirm_password = trim($_POST['confirm_password']);

    if ($password != $confirm_password) {
        $error = 'Passwords do not match.';
    } else {
        if (registerUser($username, $password, $connection)) {
            $error = 'Registration successful, please log in.';
        } else {
            $error = 'Username is already taken.';
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login and Signup</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script src="../js/script.js"></script>
    <style>button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        margin-top: 10px;
    }

    button:hover {
        background-color: #45a049;
    }
    body {
  background-image: url('1.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
header {
            background-color: #003366;
            color: #ffffff;
            padding: 10px;
            }
            


   </style>
</head>
<body>
    <header><center>
    <h1 style="background-color:#4CAF50">Apisha's Diet Dashboard</h1></center>
</header>
    <hr>

<marquee><h2 style="color:#4CAF50">welcome! to my diet dashboard</h2> </marquee>
    <button onclick="showLogin()">Login</button>&nbsp;
    <button onclick="showSignup()">Signup</button>

    <div id="login-form" style="display:none;">
        <h2>Login</h2>
        <form action="index.php" method="post">
            Username: <input type="text" name="username" required><br>
            Password: <input type="password" name="password" required><br>
            <input type="submit" name="login" value="Login">
        </form>
    </div>
    
    <div id="signup-form" style="display:none;">
        <h2>Signup</h2>
        <form action="index.php" method="post">
            Username: <input type="text" name="new_username" required><br>
            Password: <input type="password" name="new_password" required><br>
            Confirm Password: <input type="password" name="confirm_password" required><br>
            <input type="submit" name="signup" value="Signup">
        </form>
    </div>

    <div><?php echo $error; ?></div>
                  

    <script>
        function showLogin() {
            document.getElementById('login-form').style.display = 'block';
            document.getElementById('signup-form').style.display = 'none';
        }

        function showSignup() {
            document.getElementById('login-form').style.display = 'none';
            document.getElementById('signup-form').style.display = 'block';
        }
    </script>
    

</body>
</html>
