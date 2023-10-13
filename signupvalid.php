<?php

require_once "Database.class.php";

// Create connection
$conn = Database::DB_connect();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from the form
    $username = $_POST["username"];
    $phonenumber = $_POST["phone"];
    $email = $_POST["email"];
    $password = $_POST['password'];
}

// Check connection

$sql = "INSERT INTO users (id, username, mobilenumber, email, password) VALUES (NULL, '$username', '$phonenumber', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully <a href= login.php>login here</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
