<?php
$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "empinfodata";

$conn = mysqli_connect($servername, $username, $password,$dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";
?>