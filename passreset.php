<?php require_once "Dbsettings.php"; ?>
<?php
if($_SESSION['info'] == false){
    header('Location: Login.php');  
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="otpsheet.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="signin-signup">
                <?php 
            if(isset($_SESSION['info'])){
                ?>
                <div class="alert alert-success text-center">
                    <?php echo $_SESSION['info']; ?>
                </div>
                <?php
            }
            ?>
                <form action="Login.php" method="POST">
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="login-now" value="Login Now">
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
