<?php

// $host = "localhost";
// $dbname = "cleanblogdatabase";
// $user = "root";
// $pass = " ";
// $conn = new PDO("mysql:host=$host; dbname=$dbname", $user, $pass);

// if ($conn == true) {
//     echo "connected";
// } else {
//     echo "not worked";
// }

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "cleanblogdatabase";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

// if (!$conn) {
//     die("Connectioned failed:" . mysqli_connect_error());
// } else {
//     echo "good job";
// }
