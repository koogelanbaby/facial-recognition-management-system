<?php
session_start();
require "Database.php";
$email = "";
$user = "";
$errors = array();

if(isset($_POST["Register"])){
    $user=mysqli_real_escape_string($conn, $_POST['Username']);
    $age=mysqli_real_escape_string($conn, $_POST['Age']);
    $gen=mysqli_real_escape_string($conn, $_POST['Gender']);
    $email=mysqli_real_escape_string($conn, $_POST['Email']);
    $ad=mysqli_real_escape_string($conn, $_POST['Address']);
    $dob=mysqli_real_escape_string($conn, $_POST['DOB']);
    $pass=mysqli_real_escape_string($conn, $_POST['Password']);
    $cw=mysqli_real_escape_string($conn, $_POST['CoursName']);
    
    
    $email_check = "SELECT * FROM studentinformation WHERE Email ='$email'";
    $res = mysqli_query($conn,$email_check);
    if(mysqli_num_rows($res)>0){
        $errors['Email'] = "Email address is taken!";
    }
    if(count($errors) === 0){
        $encrpass=md5($pass);
        $code= rand(999999,111111);
        $status ="NotVerified";
        $insert_data = "INSERT INTO studentinformation (StudentName, Age, Gender, Email, Address, DateOfBirth, Password, CoursName, StatusOfAccount, AccountVer) VALUES ('$user','$age','$gen','$email','$ad','$dob','$encrpass','$cw','$status','$code')"; 
        
        $data_check = mysqli_query($conn,$insert_data);
        if($data_check){
            $subject = "Email Confirmation code";
            $message = "Your Code: '$code'";
            $sender = "From: scrummasteruog@gmail.com";
            if(mail($email,$subject,$message,$sender)){
                $info="A Verification code is Send to the mail-$email";
                $_SESSION['info']=$info;
                $_SESSION['Email']=$email;
                $_SESSION['Password']=$pass;
                header('location: OtpForm.php');
                exit();
            }else{
                $errors['otp-error'] = 'Failed to send code!';
            }
        }else{
            $errors['db-error']= "Data not inserted";
        }
    }
}


//user verification code submit button
if(isset($_POST['check'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($conn, $_POST['otp']);
        $check_code = "SELECT * FROM studentinformation WHERE AccountVer = $otp_code";
        $code_res = mysqli_query($conn, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['AccountVer'];
            $email = $fetch_data['Email'];
            $code = 0;
            $status = 'verified';
            $update_otp = "UPDATE studentinformation SET AccountVer = $code, StatusOfAccount = '$status' WHERE AccountVer = $fetch_code";
            $update_res = mysqli_query($conn, $update_otp);
            if($update_res){                   //sending value to another page
                $_SESSION['StudentID'] = $id;
                $_SESSION['StudentName'] = $user;
                $_SESSION['Age'] = $age;
                $_SESSION['Gender'] = $gender;
                $_SESSION['Email'] = $email;
                $_SESSION['Address'] = $address;
                $_SESSION['DateOfBirth'] = $dob;
                $_SESSION['CoursName'] = $cours;
                $_SESSION['StatusOfAccount'] = $astatus;
                header('location: studpage.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while updating code!";
            }
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

//if user click login button
        if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($conn, $_POST['Email']);
        $pass = mysqli_real_escape_string($conn, $_POST['Password']);
        $check_email = "SELECT * FROM studentinformation WHERE Email = '$email'";
        $res = mysqli_query($conn, $check_email);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $new_password=$_POST['Password'];
            if(md5($new_password)==md5($pass)){
                $_SESSION['Email'] = $email;
                $status = $fetch['StatusOfAccount'];
                if($status == 'verified'){
                  $_SESSION['Email'] = $email;
                  $_SESSION['Password'] = $pass;
                    header('location: studpage.php');
                }else{
                    $info = "It's look like you haven't still verify your email - $email";
                    $_SESSION['info'] = $info;
                    header('location: OtpForm.php');
                }
            }else{
                $errors['Email'] = "Incorrect email or password!";
            }
        }else{
            $errors['Email'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
        }
    }


///if user click continue button in forgot password form
    if(isset($_POST['check-email'])){
        $email = mysqli_real_escape_string($conn, $_POST['Email']);
        $check_email = "SELECT * FROM studentinformation WHERE Email='$email'";
        $run_sql = mysqli_query($conn, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(999999, 111111);
            $insert_code = "UPDATE studentinformation SET AccountVer = $code WHERE Email = '$email'";
            $run_query =  mysqli_query($conn, $insert_code);
            if($run_query){
                $subject = "Password Reset Code";
                $message = "Your password reset code is: " .$code;
                $sender = "From: scrummasteruog@gmail.com";
                if(mail($email, $subject, $message, $sender)){
                    $info = "We've sent a passwrod reset otp to your email - $email";
                    $_SESSION['info'] = $info;
                    $_SESSION['Email'] = $email;
                    header('location: changecode.php');
                    exit();
                }else{
                    $errors['otp-error'] = "Failed while sending code!";
                }
            }else{
                $errors['db-error'] = "Something went wrong!";
            }
        }else{
            $errors['Email'] = "This email address does not exist!";
        }
    }

    //if user click check reset otp button
    if(isset($_POST['check-reset-otp'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($conn, $_POST['otp']);
        $check_code = "SELECT * FROM studentinformation WHERE AccountVer = $otp_code";
        $code_res = mysqli_query($conn, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['Email'];
            $_SESSION['Email'] = $email;
            $info = "Please create a new password that you don't use on any other site.";
            $_SESSION['info'] = $info;
            header('location: updatepass.php');
            exit();
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

    //if user click change password button
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($conn, $_POST['Password']);
        if($password !== $password){
            $errors['Password'] = "Confirm password not matched!";
        }else{
            $code = 0;
            $email = $_SESSION['Email']; //getting this email using session
            $encrpass=md5($pass);
            $update_pass = "UPDATE studentinformation SET AccountVer = $code, Password = '$encrpass' WHERE Email = '$email'";
            $run_query = mysqli_query($conn, $update_pass);
            if($run_query){
                $info = "Your password changed. Now you can login with your new password.";
                $_SESSION['info'] = $info;
                header('Location: passreset.php');
            }else{
                $errors['db-error'] = "Failed to change your password!";
            }
        }
    }
    
   //if login now button click
    if(isset($_POST['login-now'])){
        header('Location: Login.php');
    }

?>
