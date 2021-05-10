<?php 

  session_start();

  require 'Database.php';
  require 'errorcheck.php';
  $_SESSION['LectureID']=$id;
  if(isset($_POST['update'])) {

    $oldpass = clean($_POST['oldpass']);
    $newpass = clean($_POST['newpass']);
    $confirmpass = clean($_POST['confirmpass']);
    //$decryp = md5($oldpass);
    $query = "SELECT Password FROM admin WHERE Password = '$oldpass'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0) {
       //$encrpass=md5($newpass);
      if($newpass == $confirmpass) {

        $query = "UPDATE admin SET Password = '$newpass' WHERE adminID='$id'";

        if($result = mysqli_query($conn, $query)) {

          $_SESSION['prompt'] = "Password updated.";
          $_SESSION['Password'] = $newpass;
         header("location:HomePage.php");
          exit;

        } else {

          die("Error with the query");

        }

      } else {

        $_SESSION['errprompt'] = "The new passwords you entered doesn't match.";;

      }

    } else {

      $_SESSION['errprompt'] = "You've entered a wrong old password.";

    }

  }

  

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Change Password</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">

</head>

<body>

    <section>

        <div class="container">
            <strong class="title">Change Password</strong>
        </div>


        <div class="edit-form box-left clearfix">

            <?php 
        if(isset($_SESSION['errprompt'])) {
          showError();
        }
      ?>

            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">


                <div class="form-group">
                    <label for="oldpass">Old Password</label>
                    <input type="password" class="form-control" name="oldpass" placeholder="Old Password" required>
                </div>


                <div class="form-group">
                    <label for="newpass">New Password</label>
                    <input type="password" class="form-control" name="newpass" placeholder="New Password" required>
                </div>

                <div class="form-group">
                    <label for="confirmpass">Confirm Password</label>
                    <input type="password" class="form-control" name="confirmpass" placeholder="Confirm Password" required>
                </div>

                <div class="form-footer">
                    <a href="HomePage.php">Go back</a>
                    <input class="btn btn-primary" type="submit" name="update" value="Update Password">
                </div>


            </form>
        </div>

    </section>


</body>

</html>
