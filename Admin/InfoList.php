<?php include_once'Database.php';  
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>UpdatePage</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
            text-align: center;
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

        .info {
            position: absolute;
            left: 750px;
        }

    </style>
</head>


<body>
    <?php
if (isset($_SESSION['getinfo'])) {
    
    $studid = $_SESSION['getinfo'];
    $sql_fetch = "SELECT * FROM lecture WHERE LectureID='".$studid."';";
    $result = mysqli_query($conn, $sql_fetch);
    if($result){
      $student = $result->fetch_array(); 
      $_SESSION['id'] = $student["LectureID"];
      $_SESSION['Name'] = $student["LectureName"];
      $_SESSION['email'] = $student["Email"];
    }
}
?>
    <div id="main">
        <br><br><br>
        <h2>Student Information</h2>
        <form action="updatesetting.php" method="post">
            <div class="info">
                <input type="text" name="id" value="<?php echo $_SESSION['id'] ?>" disabled /><br><br>
                <input type="text" name="LectureName" value="<?php echo $_SESSION['Name'] ?>" /><br><br>
                <input type="email" name="Email" value="<?php echo $_SESSION['email'] ?>" /><br><br>
                <input type="submit" name="update" class="btn" value="Update" />
            </div>
        </form>
    </div>
</body>

</html>
