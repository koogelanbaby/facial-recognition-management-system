<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['Search'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `studentinformation` WHERE CONCAT(`StudentName`, `Age`, `Gender`, `Email`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `studentinformation`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "university_of_greenwich");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>PHP HTML TABLE DATA SEARCH</title>
        <style>
            table,tr,th,td
            {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        
        <form action="index.php" method="post">
            <input type="text" id="Search" name="Search" placeholder="Value To Search"><br><br>
            <input type="submit" name="search" value="Filter"><br><br>
            
            <table>
                <tr>
                    <th>Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Age</th>
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['StudentName'];?></td>
                    <td><?php echo $row['Age'];?></td>
                    <td><?php echo $row['Gender'];?></td>
                    <td><?php echo $row['Email'];?></td>
                </tr>
                <?php endwhile;?>
            </table>
        </form>
        
    </body>
</html>







