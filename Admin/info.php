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
</head>


<body>
    <div id="main">
        <h2>Attendance Record</h2>
        <div style="height: 600px; overflow-y: auto;">
            <table id="" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>StudentName</th>
                        <th>TimeIn</th>
                        <th>LectureID</th>
                        <th>SubjectID</th>
                        <th>SubjectName</th>
                    </tr>
                </thead>
                <?php
                 $stud=$_SESSION['showinfo'];
                 $sql_fetch = "SELECT * FROM attendance WHERE name= '$stud' ORDER BY attenID ASC";
                 $result = mysqli_query($conn, $sql_fetch);
                 while ($row = $result->fetch_assoc()):;
                 ?>
                <tbody>
                    <tr>
                        <td><?php echo $row['attenID'] ?></td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['time'] ?></td>
                        <td><?php echo $row['lectureID'] ?></td>
                        <td><?php echo $row['subjectID'] ?></td>
                        <td><?php echo $row['subjectname'] ?></td>
                    </tr>
                </tbody>
                <?php endwhile;?>
            </table>
        </div>
    </div>
</body>

</html>
