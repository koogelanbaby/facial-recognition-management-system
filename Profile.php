<?php require_once "Dbsettings.php"; ?>
<?php 
$email = $_SESSION['Email'];
$password = $_SESSION['Password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM studentinformation WHERE Email = '$email'";
    $run_Sql = mysqli_query($conn, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['StatusOfAccount'];
        $code = $fetch_info['AccountVer'];
        if($status == "verified"){
            if($code != 0){
                header('Location: changecode.php');
            }
        }else{
            header('Location: OtpForm.php');
        }
    }
}else{
    header('Location: Login.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Profile</title>
    <meta charset="UTF-8">
    <?php include "slidepanel/slide.php" ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="slidepanel/slidebar.css">
    <script type="text/javascript" src="slidepanel/slidepanels.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');

        body {
            background-color: white;
        }

        nav {
            padding-left: 100px !important;
            padding-right: 100px !important;
            background: #0079FF;
            font-family: 'Poppins', sans-serif;
        }

        nav a.navbar-brand {
            color: #fff;
            font-size: 30px !important;
            font-weight: 500;
        }

        button a {
            color: #3169B1;
            font-weight: 500;

        }

        button a:hover {
            text-decoration: none;
        }

        h1 {
            position: absolute;
            top: 11%;
            left: 50%;
            width: 100%;
            text-align: center;
            transform: translate(-50%, -50%);
            font-size: 35px;
            font-weight: 600;
        }

        .input-field {
            max-width: 390px;
            width: 100%;
            background-color: #f0f0f0;
            margin: 10px 0;
            height: 55px;
            border-radius: 55px;
            display: grid;
            grid-template-columns: 15% 85%;
            padding: 0 0.4rem;
            position: relative;
        }

        .input-field i {
            text-align: center;
            line-height: 55px;
            color: #acacac;
            transition: 0.5s;
            font-size: 1.1rem;
        }

        .input-field input {
            background: none;
            outline: none;
            border: none;
            line-height: 1;
            font-weight: 600;
            font-size: 1.1rem;
            color: #333;
        }

        .input-field input::placeholder {
            color: #aaa;
            font-weight: 500;
        }

        .input-fieldGen {
            max-width: 230px;
            width: 100%;
            margin: 10px 0;
            position: relative;
            right: 10%;
            grid-template-columns: 20% 75%;
            display: grid;
            padding: 0 0.4rem;
        }

        .input-fieldGen select {
            background: #f0f0f0;
            padding: 0 0.4rem;
            width: 200%;
            height: 55px;
            border-radius: 55px;
            border: none;
            outline: none;
        }

        .input-fieldGen i {
            text-align: center;
            line-height: 55px;
            color: #acacac;
            transition: 0.5s;
            font-size: 1.1rem;
        }

        .input-fieldGen input {
            background: none;
            outline: none;
            border: none;
            line-height: 1;
            font-weight: 600;
            font-size: 1.1rem;
            color: #333;
        }

        .input-fieldGen input::placeholder {
            color: #aaa;
            font-weight: 500;

        }

        .contain {
            position: absolute;
            top: 55%;
            transform: translate(-50%, -50%);
            left: 50%;
            width: 20%;
            transition: 1s 0.7s ease-in-out;
            display: grid;
            grid-template-columns: 1fr;
            z-index: 5;
        }

        .btn1 {
            width: 150px;
            background-color: #2980b9;
            border: none;
            outline: none;
            height: 49px;
            border-radius: 49px;
            color: #fff;
            text-transform: uppercase;
            font-weight: 600;
            margin: 10px 0;
            cursor: pointer;
            transition: 0.5s;
            align-content: center;
        }

        .btn1:hover {
            background-color: #3267FD;
        }

    </style>

</head>

<body>
    <form action="" method="post">
        <div id="main">
            <h1>User Information</h1>
            <nav class="navbar">
                <a class="navbar-brand" href="#">University of Greenwich</a>
                <button class="btn btn-light"><a href="Logout.php">LOGOUT</a></button>
            </nav>
            <br>
            <div class="contain">
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="id" value="<?php echo $fetch_info['StudentID'] ?>" disabled>
                </div>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="name" value="<?php echo $fetch_info['StudentName'] ?>" required disabled>
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="text" name="age" value="<?php echo $fetch_info['Age'] ?>" required disabled>
                </div>
                <div class="input-field">
                    <i class="fas fa-venus-mars"></i>
                    <input type="text" name="gender" value="<?php echo $fetch_info['Gender'] ?>" required disabled>
                </div>
                <div class="input-field">
                    <i class="fas fa-mail-bulk"></i>
                    <input type="text" name="mail" value="<?php echo $fetch_info['Email'] ?>" required disabled>
                </div>
                <div class="input-field">
                    <i class="far fa-address-card"></i>
                    <input type="text" name="address" value="<?php echo $fetch_info['Address'] ?>" required disabled>
                </div>
                <div class="input-field">
                    <i class="fas fa-birthday-cake"></i>
                    <input type="date" name="dob" value="<?php echo $fetch_info['DateOfBirth'] ?>" required disabled>
                </div>
                <div class="input-field">
                    <i class="fas fa-book-open"></i>
                    <input type="text" name="cname" value="<?php echo $fetch_info['CoursName'] ?>" required disabled>
                </div>
                <div class="input-field">
                    <i class="fas fa-user-check"></i>
                    <input type="text" name="name" value="<?php echo $fetch_info['StatusOfAccount'] ?>" required disabled>
                </div>
            </div>
        </div>
    </form>
</body>

</html>
