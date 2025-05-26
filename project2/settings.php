<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "deha_db"; 

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Failed to connect to database: " . mysqli_connect_error());
}
?>
