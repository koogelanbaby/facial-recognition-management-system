<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "university_of_greenwich";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if($conn->connect_error){
    die("connection error");
}
?>
