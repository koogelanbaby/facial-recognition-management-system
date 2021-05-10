<?php
require_once('Database.php');
//-===== posts count ======-
$sql="SELECT StudentID,StudentName FROM studentinformation";
$res=$conn->prepare($sql);
$res->bind_result($pid,$pname);
$res->execute();
$res->store_result();
$pcnt=$res->num_rows();
//-===== category count ======-

$sql1="SELECT attenID FROM attendance";
$res1=$conn->prepare($sql1);
$res1->bind_result($cid);
$res1->execute();
$res1->store_result();
$ccnt=$res1->num_rows();  

//-===== users count ======-

$sql2="SELECT LectureID FROM lecture";
$res2=$conn->prepare($sql2);
$res2->bind_result($uid);
$res2->execute();
$res2->store_result();
$ucnt=$res2->num_rows();

 $query = "SELECT CoursName, count(*) as number FROM studentinformation GROUP BY CoursName";  
 $result = mysqli_query($conn, $query);

 $query1 = "SELECT name, count(*) as number FROM attendance GROUP BY name";  
 $results = mysqli_query($conn, $query1);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>HomePage</title>
    <?php require("slidepanel/slide.php");?>
    <link rel="stylesheet" href="slidepanel/slidebar.css">
    <script type="text/javascript" src="slidepanel/slidepanels.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="icons.css">
    <script type="text/javascript" src="icons.js"></script>
    <link rel="stylesheet" href="dash.css">
</head>


<body>
    <div class="action">
        <div class="profile" onclick="iconToggle()">
            <img src="userimg/img.jpg">
        </div>
        <div class="icon">
            <ul>
                <li><img src="userimg/user.png"><a href="#">My Profile</a></li>
                <li><img src="userimg/log-out.png"><a href="Admin.php">LogOut</a></li>
            </ul>
        </div>

    </div>
    <div id="main">
        <h2>DASHBOARD</h2>
        <div class="dash">
            <div class="frame">
                <span id="fhead">
                    <h3><span><i class="material-icons">groups</i><span class="icon-text">&nbsp;&nbsp;&nbsp;&nbsp;STUDENTS</span></h3>
                </span>
                <span id="count"><?php echo $pcnt; ?></span>
            </div>
            <div class="frame">
                <span id="fhead">
                    <h3><span><i class="material-icons">menu_book</i><span class="icon-text">&nbsp;&nbsp;&nbsp;&nbsp;ATTENDANCE</span></h3>
                </span>
                <span id="count"><?php echo $ccnt; ?></span>
            </div>
            <div class="frame">
                <span id="fhead">
                    <h3><span><i class="material-icons">school</i><span class="icon-text">&nbsp;&nbsp;&nbsp;&nbsp;LECTURE</span></h3>
                </span>
                <span id="count"><?php echo $ucnt; ?></span>
            </div>
        </div>
        <h2>REPORT</h2>
        <div class="chart">
            <div style="width:900px;">
                <div id="piechart" style="width: 900px; height: 500px;"></div>
                <div id="piechart1" style="width: 900px; height: 500px;"></div>
            </div>
        </div>
    </div>
</body>

</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['CoursName', 'Number'],
            <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["CoursName"]."', ".$row["number"]."],";  
                          }  
                          ?>
        ]);
        var options = {
            title: 'Total Students Count',
            //is3D:true,  
            pieHole: 0.4
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
    };

</script>
<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data1 = google.visualization.arrayToDataTable([
            ['name', 'Numbers'],
            <?php  
                          while($row = mysqli_fetch_array($results))  
                          {  
                               echo "['".$row["name"]."', ".$row["number"]."],";  
                          }  
                          ?>
        ]);
        var options1 = {
            title: 'Total attendance Count',
            //is3D:true,
            pieHole: 0.4
        };
        var chart1 = new google.visualization.PieChart(document.getElementById('piechart1'));
        chart1.draw(data1, options1);
    }

</script>
