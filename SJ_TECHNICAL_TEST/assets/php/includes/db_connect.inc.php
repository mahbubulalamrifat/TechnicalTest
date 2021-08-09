<?php

$dbServerName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbName = "sjtest";

$conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);

if (mysqli_connect_errno()) {
  echo "Failed to connect to Server: " . mysqli_connect_error();
  exit();
}
// if (!$conn) {
//   die("Connection failed: " . mysqli_connect_error());
//   exit();
// }
// echo "Connected Successfully.";

// 
