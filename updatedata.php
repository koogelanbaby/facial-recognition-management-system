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
    $lname=mysqli_real_escape_string($conn,$_POST['name']);
    $age=mysqli_real_escape_string($conn,$_POST['age']);
    $gen=mysqli_real_escape_string($conn,$_POST['gender']);
    $email=mysqli_real_escape_string($conn,$_POST['mail']);
    $ad=mysqli_real_escape_string($conn,$_POST['address']);
    $dob=mysqli_real_escape_string($conn,$_POST['dob']);
    $cours=mysqli_real_escape_string($conn,$_POST['cname']);
    $sql = "UPDATE studentinformation SET StudentName='$lname', Age='$age', Gender='$gen', Email='$email', Address='$ad', DateOfBirth='$dob', CoursName='$cours' WHERE StudentID='$id'";   

if (mysqli_query($conn, $sql)) {
  echo "<script> alert('Your Info Updated.Thank You'); </script>";
    header("Location: Profile.php");
} else {
  echo "<script> alert('Failed to update'); </script>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
<!--UPDATE studentinformation SET StudentName='Shela A/P Ramu', Age='25', Gender='Female', Email='shela2203', Address='Kampung Baru, One Condo,540011 Wilayah Persekutuan', DateOfBirth='1996-03-03', CoursName='Business Administration' WHERE StudentID='000029'-->
