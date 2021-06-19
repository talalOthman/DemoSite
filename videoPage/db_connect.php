<?php
$servername = "localhost";
$username = "omaga";
$password = "omar25";
$dbname = "VideoPage";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>