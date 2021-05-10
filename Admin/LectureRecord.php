<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student Record</title>
</head>

<?php 
    //setting tthe data to be extracted from database
	include 'Database.php';
    session_start();
	$limit = isset($_POST["limit-records"]) ? $_POST["limit-records"] : 10;
	$page = isset($_GET['page']) ? $_GET['page'] : 1;
	$start = ($page - 1) * $limit;
	$result = $conn->query("SELECT * FROM lecture LIMIT $start, $limit");
	$students = $result->fetch_all(MYSQLI_ASSOC);

	$result1 = $conn->query("SELECT count(LectureName) AS LectureName FROM lecture");
	$studCount = $result1->fetch_all(MYSQLI_ASSOC);
	$total = $studCount[0]['LectureName'];
	$pages = ceil( $total / $limit );

	$Previous = $page - 1;
	$Next = $page + 1;

 ?>
<! -- html layout for pagination -->
    <html>


    <head>
        <?php include "slidepanel/slide.php" ?>
        <link rel="stylesheet" type="text/css" href="../library/css/bootstrap.min.css" />
        <script type="text/javascript" src="../library/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="slidepanel/slidepanels.js"></script>
        <link rel="stylesheet" href="slidepanel/slidebar.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <style>
            .transparent li {
                list-style: none;
                display: inline;
            }

            .transparent li a {
                text-decoration: none;
                padding: 10px 15px;
                font-size: 24px;
                color: black;
                display: inline-block;
                text-align: center;
                letter-spacing: 1px;
                transition: all .5s ease-in;

            }

            .transparent li a:hover {
                background-color: crimson;
            }

            .transparent {
                position: absolute;
                left: 780px;
            }

            .view {
                background-color: #27ae60;
                font-style: italic;
                font-size: 15px;
                color: aliceblue;
                border: none;
                padding: 10px 15px;
            }

            .dlt {
                background-color: #e74c3c;
                font-style: italic;
                font-size: 15px;
                color: aliceblue;
                border: none;
                padding: 10px 15px;
            }

        </style>
    </head>

    <body>
        <div id="main">
            <h2>Student Record</h2>
            <! -- creating table -->
                <input class="form-control" id="input" type="text" placeholder="Search.."><br>
                <div style="height: 600px; overflow-y: auto;">
                    <table id="" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>LectureID</th>
                                <th>LectureName</th>
                                <th>Email</th>
                                <th>View</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody id="queryTable">
                            <?php foreach($students as $student) :  ?>
                            <tr>
                                <td><?= $student['LectureID']; ?></td>
                                <td><?= $student['LectureName']; ?></td>
                                <td><?= $student['Email']; ?></td>
                                <td><a href="LectureRecord.php?getinfo=<?= $student ['LectureID']; ?>"><button class="view">View</button></a></td>
                                <td><a href="LectureRecord.php?deletedata=<?= $student ['LectureID']; ?>"><button class="dlt">Delete</button></a></td>
                            </tr>
                            <?php endforeach; 
                        
                                if (isset($_GET['getinfo'])) {
                                $_SESSION['getinfo'] = $_GET['getinfo'];
                                echo "<script> location.replace('InfoList.php'); </script>";
                                }
                            if (isset($_GET['deletedata'])) {
                            $_SESSION['deletedata'] = $_GET['deletedata'];
                            $name = $_SESSION['deletedata'];


                            $sql = "DELETE FROM lecture WHERE LectureID = $name;";
                            mysqli_query($conn, $sql);
                            echo "<script> alert('Account Deleted successfully'); </script>";
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
                <br>
                <div class="container well">
                    <div class="row">
                        <div class="transparent">
                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    <li>
                                        <a href="StudentRecord.php?page=<?= $Previous; ?>" aria-label="Previous">
                                            <span aria-hidden="true">&laquo; Previous</span>
                                        </a>
                                    </li>
                                    <?php for($i = 1; $i<= $pages; $i++) : ?>
                                    <li><a href="LectureRecord.php?page=<?= $i; ?>"><?= $i; ?></a></li>
                                    <?php endfor; ?>
                                    <li>
                                        <a href="LectureRecord.php?page=<?= $Next; ?>" aria-label="Next">
                                            <span aria-hidden="true">Next &raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#limit-records").change(function() {
                    $('form').submit();
                })
            })

            $(document).ready(function() {
                $("#input").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#queryTable tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });

        </script>

    </body>

    </html>
