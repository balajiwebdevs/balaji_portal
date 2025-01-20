<?php
$conn =mysqli_connect("localhost","root","","portal_balaji");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    // echo "connect failed";
}
// echo "Connected successfully";

 ?>