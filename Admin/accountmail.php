<?php
require "Database.php";

$errors = array();

if(isset($_POST["submit"])){
$user=mysqli_real_escape_string($conn, $_POST['Name']);
$id=mysqli_real_escape_string($conn, $_POST['ID']);
$mail=mysqli_real_escape_string($conn, $_POST['Email']);
$pass=mysqli_real_escape_string($conn, $_POST['Password']);
//$encrpass=password_hash($pass,PASSWORD_DEFAULT);
    $encrpass=md5($pass);
 //error message for duplication of data   
$id_check = "SELECT * FROM lecture WHERE LectureID ='$id'";
    $res = mysqli_query($conn,$id_check);
    if(mysqli_num_rows($res)>0){
        echo "<script> alert('Lecture ID is taken!.'); </script>" . mysqli_error($conn);  
    }    

//inserting data and sending email
$sql = "INSERT INTO lecture (LectureID, LectureName, Email, Password) VALUES ('$id','$user','$mail','$encrpass')";
$insert_check = mysqli_query($conn,$sql);
if($insert_check){
    
    $name = $_POST['Name'];
    $visitor_email = $_POST['Email'];
    $message =$_POST['ID'];
    $message1 =$_POST['Password'];

    $email_from = 'scrummasteruog@gmail.com';
    $email_subject = "Lecture Account Created";
    $email_body = "User Name: $name.\n".
                    "User Email: $visitor_email.\n".
                        "User account ID: $message.\n User account Password: $message1.\n";

    $headers = "From:$email_from\r\n";
    $headers .= "Reply-To: $visitor_email \r\n";
    mail($mail,$email_subject,$email_body,$headers);
    echo "<script> alert('Account Created and Mail Sent.'); </script>";
      header("Location: CreateLecture.php");
}
else{
    echo "<script> alert('Failed to send message.'); </script>" . mysqli_error($conn);
}
    

}

?>
