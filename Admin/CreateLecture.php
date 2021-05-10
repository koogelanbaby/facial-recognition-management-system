<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Lecture Account</title>
    <?php include "slidepanel/slide.php" ?>
    <link rel="stylesheet" type="text/css" href="../library/css/bootstrap.min.css" />
    <script type="text/javascript" src="../library/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="slidepanel/slidepanels.js"></script>
    <link rel="stylesheet" href="slidepanel/slidebar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');

        input {
            width: 600px;
            border: none;
            outline: none;
            border-bottom: 1px solid black;
            color: bold black;
            font-size: 18px;
            margin-bottom: 16px;
            background: transparent;
            font-family: 'Poppins', sans-serif;
        }

        h2 {
            font-size: 2em;
            color: darkblue;
        }

        form .btn {
            background: #8e44ad;
            border-color: transparent;
            color: #fff;
            font-size: 20px;
            font-weight: bold;
            letter-spacing: 2px;
            height: 50px;
            margin-top: 20px;
        }

        .cont {
            position: absolute;
            top: 150px;
            right: 550px;
        }

    </style>

</head>

<body>
    <form action="accountmail.php" method="post">
        <div class="cont">
            <div id="main">
                <h2>Create Lecture Account</h2>
                <input type="text" name="Name" placeholder="Enter Name" required /><br>
                <input type="text" name="ID" placeholder="Enter ID" required /><br>
                <input type="email" name="Email" placeholder="Enter Email" required /><br>
                <input type="password" name="Password" placeholder="Enter Password" required /><br>
                <input type="submit" value="Create" name="submit" class="btn" />
            </div>
        </div>
    </form>
</body>

</html>
