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
    <title>Subjects</title>
    <link rel="stylesheet" href="btnsstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="slidepanel/slidebar.css">
    <script type="text/javascript" src="slidepanel/slidepanels.js"></script>
    <?php include "slidepanel/slide.php" ?>
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
            top: 10.6%;
            left: 55%;
            width: 100%;
            text-align: center;
            transform: translate(-50%, -50%);
            font-size: 35px;
            font-weight: 600;
        }

    </style>
</head>

<body>

    <form action="studnote.php" method="POST" autocomplete="off">
        <div id="main">
            <nav class="navbar">
                <a class="navbar-brand" href="#">University of Greenwich</a>
                <button class="btn btn-light"><a href="Logout.php">LOG OUT</a></button>
            </nav>
            <h1>SUBJECT</h1>
            <div class="container">
                <button class="btn btn1">Andriod Studio: COMP 16641</button>
                <button class="btn btn1">Enterprise Web Development COMP 16640</button>
                <button class="btn btn1">Interaction Design COMP 16639</button>
                <button class="btn btn1">Project COMP 14412</button>
            </div>
        </div>
    </form>
</body>

</html>
