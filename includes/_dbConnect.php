<?php
// creating params
$servername = "localhost";
$username = "root";
$password = "";
$database = "i-notes";

// creating connection
$conn = mysqli_connect($servername, $username, $password, $database);

// checking connection
if (!$conn) {
    die("Sorry we are failed to connect" . mysqli_connect_error());
}

?>