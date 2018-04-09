<?php

$servername = "localhost";
$username = "root";
$password = "saiddirex";
$dbname="anonymat";
$db = mysqli_connect($servername, $username, $password,$dbname);

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
?>