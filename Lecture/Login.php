<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="adstyle.css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
    <title>Lecture Login Form</title>
</head>

<body>
    <div class="">
        <form method="post" action="adlogset.php" class="Admin-Login-form">
            <h2 class="title">Lecture Login <i class="fas fa-user"></i></h2>
            <div class="input-field">
                <input type="text" placeholder="Enter ID" name="ID" required />
                <input type="password" placeholder="Password" name="Password" required />
            </div>
            <input class="btn solid" type="submit" name="Login" value="Login">
        </form>
    </div>
</body>
