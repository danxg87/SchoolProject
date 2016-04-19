<?php

$servername = "localhost";
$username = "root";
$password = "dgeorge";
$dbname = "ordering";

// Create connection
mysql_connect($servername, $username, $password) or die("Can't connect to DB"); 
mysql_select_db($dbname) or die("Can't use the DB");
//$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
//if ($conn->connect_error) {
  //  die("Connection failed: " . $conn->connect_error);
//}
//echo "Connected successfully";
?>
