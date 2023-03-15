<?php

/*
 *  It is an independent script for creating Database and Table for task.
 *  In terminal run "php createDBscript.php".
 */

// Database connection details
$host = "localhost";
$username = "root";
$password = "root";

// Connect to MySQL server
$conn = mysqli_connect($host, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS julia_task_one";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully\n";
} else {
    echo "Error creating database: " . mysqli_error($conn) . "\n";
}

// Select database
mysqli_select_db($conn, "julia_task_one");

// Create table
$sql = "CREATE TABLE IF NOT EXISTS pages (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    friendly VARCHAR(255) NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT
)";
if (mysqli_query($conn, $sql)) {
    echo "Table created successfully\n";
} else {
    echo "Error creating table: " . mysqli_error($conn) . "\n";
}

// Close connection
mysqli_close($conn);
?>
