<?php

$sv = "localhost";
$database = "bd_proyecto";
$username = "root";
$password = "josue";
// Create connection
$conn = mysqli_connect($sv, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$conn2 = mysqli_connect($sv, $username, $password, $database);
// Check connection
if (!$conn2) {
    die("Connection failed: " . mysqli_connect_error());
}

$conn3 = mysqli_connect($sv, $username, $password, $database);
// Check connection
if (!$conn3) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
