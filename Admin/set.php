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
    $sname=mysqli_real_escape_string($conn,$_POST['StudentName']);
    $age=mysqli_real_escape_string($conn,$_POST['Age']);
    $gen=mysqli_real_escape_string($conn,$_POST['Gender']);
    $email=mysqli_real_escape_string($conn,$_POST['Email']);
    $address=mysqli_real_escape_string($conn,$_POST['Address']);
    $dob=mysqli_real_escape_string($conn,$_POST['DateOfBirth']);
    $cours=mysqli_real_escape_string($conn,$_POST['CoursName']);
    $sql = "UPDATE studentinformation SET StudentName='$sname', Age='$age', Gender='$gen', Email='$email', Address='$address', DateOfBirth='$dob', CoursName='$cours' WHERE StudentID=$id";   

if (mysqli_query($conn, $sql)) {
  echo "<script> alert('Updated The Information'); </script>";
    header("Location: Update.php");
} else {
  echo "<script> alert('Failed to update'); </script>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
