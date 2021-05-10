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
    <title><?php echo $fetch_info['StudentName'] ?> | Home</title>
    <?php include "slidepanel/slide.php" ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="slidepanel/slidebar.css">
    <script type="text/javascript" src="slidepanel/slidepanels.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
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

        .mySlides {
            display: none;
        }

        img {
            vertical-align: middle;
            box-shadow: 5px 10px black;
        }

        /* Slideshow container */
        .slideshow-container {
            max-width: 1000px;
            position: relative;
            margin: auto;
        }

        /* The dots/bullets/indicators */
        .dot {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }

        .active {
            background-color: #717171;
        }

        /* Fading animation */
        .fade {
            -webkit-animation-name: fade;
            -webkit-animation-duration: 1.5s;
            animation-name: fade;
            animation-duration: 1.5s;
        }

        @-webkit-keyframes fade {
            from {
                opacity: .4
            }

            to {
                opacity: 1
            }
        }

        @keyframes fade {
            from {
                opacity: .4
            }

            to {
                opacity: 1
            }
        }

        /* On smaller screens, decrease text size */
        @media only screen and (max-width: 300px) {
            .text {
                font-size: 11px
            }

        }

    </style>
</head>

<body>
    <div id="main">
        <nav class="navbar">
            <a class="navbar-brand" href="#">University of Greenwich</a>
            <button class="btn btn-light"><a href="Logout.php">LOGOUT</a></button>
        </nav>
        <br><br>
        <div class="slideshow-container">
            <div class="mySlides fade">
                <img src="img/slide1.jpg" style="width:100%">
            </div>
            <div class="mySlides fade">
                <img src="img/slide2.jpg" style="width:100%">
            </div>
            <div class="mySlides fade">
                <img src="img/slide3.jpg" style="width:100%">
            </div>
            <div class="mySlides fade">
                <img src="img/slide4.jpg" style="width:100%">
            </div>
            <div class="mySlides fade">
                <img src="img/slide5.jpg" style="width:100%">
            </div>
        </div>
        <br>
        <div style="text-align:center">
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>
        <h1>Welcome, <?php echo $fetch_info['StudentName'] ?></h1>
    </div>
    <script>
        var slideIndex = 0;
        showSlides();

        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
            setTimeout(showSlides, 2000); // Change image every 2 seconds
        }

    </script>
</body>

</html>
