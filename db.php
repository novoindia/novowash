<?php
$servername = "localhost";
$username = "motofixi_novo";
$password = "C@rwash123";
$dbname   ="motofixi_novo";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

?>

