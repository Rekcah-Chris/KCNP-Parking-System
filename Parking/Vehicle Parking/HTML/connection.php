<?php

// Establishing connection to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "parking_db";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Checking if connection was successful
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


?>