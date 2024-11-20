<?php 

// FOR ONLINE HOSTING
// $servername = "sql6.freemysqlhosting.net";
// $username = "sql6704396";
// $password = "8Uv31JNRcD";
// $dbname = "sql6704396";

/// FOR LOCALHOST
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommerce_system";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}