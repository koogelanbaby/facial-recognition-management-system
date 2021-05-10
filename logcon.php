<?php 
session_start();
require "Database.php";
//if user click login button
    if(isset($_POST['Login'])){
        $email = mysqli_real_escape_string($conn, $_POST['Email']);
        $password = mysqli_real_escape_string($conn, $_POST['Password']);
        $check_email = "SELECT * FROM studentinformation WHERE Email = '$email'";
        $res = mysqli_query($conn, $check_email);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['Password'];
            if(password_verify($password, $fetch_pass)){
                $_SESSION['Email'] = $email;
                $status = $fetch['StatusOfAccount'];
                if($status == 'verified'){
                  $_SESSION['Email'] = $email;
                  $_SESSION['Password'] = $password;
                    header('location: HomePage.php');
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
        $run_sql = mysqli_query($con, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(999999, 111111);
            $insert_code = "UPDATE studentinformation SET CodePass = $code WHERE Email = '$email'";
            $run_query =  mysqli_query($conn, $insert_code);
            if($run_query){
                $subject = "Password Reset Code";
                $message = "Your password reset code is" .$code;
                $sender = "From: dane.daon@gmail.com.com";
                if(mail($email, $subject, $message, $sender)){
                    $info = "We've sent a passwrod reset otp to your email - $email";
                    $_SESSION['info'] = $info;
                    $_SESSION['Email'] = $email;
                    header('location: reset-code.php');
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
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM studentinformation WHERE CodePass = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['Email'];
            $_SESSION['Email'] = $email;
            $info = "Please create a new password that you don't use on any other site.";
            $_SESSION['info'] = $info;
            header('location: new-password.php');
            exit();
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

    //if user click change password button
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($con, $_POST['Password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
        if($password !== $cpassword){
            $errors['Password'] = "Confirm password not matched!";
        }else{
            $code = 0;
            $email = $_SESSION['Email']; //getting this email using session
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE studentinformation SET CodePass = $code, Password = '$encpass' WHERE Email = '$email'";
            $run_query = mysqli_query($con, $update_pass);
            if($run_query){
                $info = "Your password changed. Now you can login with your new password.";
                $_SESSION['info'] = $info;
                header('Location: password-changed.php');
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
