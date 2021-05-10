<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "university_of_greenwich";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
session_start();
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
    $id=$_SESSION['id'];
    $lname=mysqli_real_escape_string($conn,$_POST['LectureName']);
    $email=mysqli_real_escape_string($conn,$_POST['Email']);
    $sql = "UPDATE lecture SET LectureName='$lname', Email='$email' WHERE LectureID=$id";   

if (mysqli_query($conn, $sql)) {
  echo "<script> alert('Updated The Information'); </script>";
    header("Location: InfoList.php");
} else {
  echo "<script> alert('Failed to update'); </script>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
