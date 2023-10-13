<?php
require_once "Database.class.php";
// Start the session
session_start();

// Database connection details
// Create connection
$conn = Database::DB_connect();
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Escape user inputs for security
$name = $conn->real_escape_string($_POST['name']);
$password = $conn->real_escape_string($_POST['password']);

// Attempt to locate user in database
$sql = "SELECT * FROM users WHERE username = '$name' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_name'] = $row['name'];
        header("Location: dashboard.php");
    }
} else {
    echo "Incorrect Username or Password!!!";
}
$conn->close();
?>
