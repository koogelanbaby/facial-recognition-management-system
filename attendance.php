<?php 
    $cmd = "python face.py";
    shell_exec($cmd);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Attendantce</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="slidepanel/slidebar.css">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="slidepanel/slidepanels.js"></script>
    <?php include "slidepanel/slide.php" ?>
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
            top: 20%;
            left: 50%;
            width: 100%;
            text-align: center;
            transform: translate(-50%, -50%);
            font-size: 50px;
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
            top: 50%;
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
        }

        .btn1:hover {
            background-color: #3267FD;
        }

    </style>

</head>

<body>
    <form method="post" action="add.php">
        <div id="main">
            <nav class="navbar">
                <a class="navbar-brand" href="#">University of Greenwich</a>
                <button class="btn btn-light"><a href="Logout.php">LOG OUT</a></button>
            </nav>
            <br>
            <h1>Attendance</h1>
            <div class="contain">
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="StudentID" placeholder="Enter Your ID" required>
                </div>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="SubjectID" placeholder="Enter Subject ID" required>
                </div>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="LectureID" placeholder="Enter LectureID" required>
                </div>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="SubjectName" placeholder="Enter the Subject Name" required>
                </div>
                <input type="submit" class="btn1" name="submit" value="Save">
            </div>
        </div>
    </form>
</body>

</html>
