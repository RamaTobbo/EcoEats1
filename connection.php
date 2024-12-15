<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "ecoeats";


$conn = mysqli_connect($servername, $username, $password, $database);
if ($conn->connect_error) {
    die('Unable to connect: ' . $conn->connect_error);
}