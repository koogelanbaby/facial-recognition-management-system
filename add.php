<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "university_of_greenwich";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

    $sname=mysqli_real_escape_string($conn,$_POST['SubjectName']);
    $lecture=mysqli_real_escape_string($conn,$_POST['LectureID']);
    $subject=mysqli_real_escape_string($conn,$_POST['SubjectID']);
    $id=mysqli_real_escape_string($conn,$_POST['StudentID']);
    $sql = "UPDATE attendance SET lectureID='$lecture', subjectID='$subject', subjectName='$sname' WHERE attenID=$id";   

if (mysqli_query($conn, $sql)) {
  echo "<script> alert('Attendance Taken'); </script>";
} else {
  echo "<script> alert('Failed to take Attendance'); </script>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
