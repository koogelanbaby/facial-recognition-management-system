<?php

include 'Database.php';
session_start();
         
 $username = $_POST['Username'];
$password = $_POST['Password'];
      
 
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($conn, $username);  
        $password = mysqli_real_escape_string($conn, $password);  
      
        $sql = "select *from admin where Name = '$username' and Password = '$password'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            header("Location: HomePage.php"); 
        }  
        else{  
             echo "<script> alert('Failed to Login ID or Password Error'); </script>" . mysqli_error($conn);   
        }     
?>
