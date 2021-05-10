<?php include 'Notes.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="slidepanel/slidebar.css">
    <script type="text/javascript" src="slidepanel/slidepanels.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Notes Upload</title>
</head>
<?php require("slidepanel/slide.php");?>

<body>
    <div id="main">
        <div class="container">
            <div class="row">
                <form action="Updownfile.php" method="post" enctype="multipart/form-data">
                    <h3>Upload File</h3>
                    <input type="file" name="myfile"> <br>
                    <button type="submit" name="save">upload</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
