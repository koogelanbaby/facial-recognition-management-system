<?php

include 'Database.php';
session_start();
         
 $username = $_POST['ID'];
$password = $_POST['Password'];

      
 
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($conn, $username);  
        $password = mysqli_real_escape_string($conn, $password);  
        $decryp = md5($password);
        $sql = "select *from lecture where LectureID = '$username' and Password = '$decryp'";  
        $result = mysqli_query($conn, $sql); 
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            header("Location: Home.php");  
        }  
        else{  
            echo "<h1>Failed To Login Username or Password Incorrect.</h1>";  
        }     
?>
