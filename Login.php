<?php
require_once "DbSettings.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="loginsheets.css" />
    <title>Sign in & Sign up Form</title>
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form method="Post" action="#" class="sign-in-form">
                    <h2 class="title">Sign in</h2>
                    <?php
                    if(count($errors) > 0){
                        ?>
                    <div class="Alert">
                        <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                    </div>
                    <?php
                    }
                    ?>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="email" placeholder="Email" name="Email" id="Email" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="Password" id="Password" required />
                    </div>
                    <div class="link forget-pass text-left"><a href="forgotpass.php">Forgot password!!</a></div>
                    <input type="submit" value="Login" id="login" name="login" class="btn solid" onclick="correct()" />
                </form>
                <form method="Post" action="DbSettings.php" class="sign-up-form">
                    <h2 class="title">Sign up</h2>
                    <?php
                    if(count($errors) > 0){
                        ?>
                    <div class="Alert">
                        <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                    </div>
                    <?php
                    }
                    ?>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Username" id="Username" name="Username" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Age" id="Age" name="Age" required />
                    </div>
                    <div class="input-fieldGen">
                        <i class="fas fa-venus-mars"></i>
                        <select name="Gender" id="Gender" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" placeholder="Email" id="Email" name="Email" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-map-marker-alt"></i>
                        <input type="text" placeholder="Address" id="Address" name="Address" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-birthday-cake"></i>
                        <input type="Date" placeholder="DOB" id="DOB" name="DOB" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" id="Password" name="Password" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-book-open"></i>
                        <input type="text" placeholder="CoursName" id="CoursName" name="CoursName" required />
                    </div>
                    <input type="submit" class="btn" name="Register" value="Register" onclick="correct()" />
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Are you ready to enroll ?</h3>
                    <p>
                        We invite our new students to enroll them self into the portal and explore
                        them selfs.
                    </p>
                    <button class="btn transparent" id="sign-up-btn">
                        Sign up
                    </button>
                </div>
                <img src="img/logins.svg" class="image" alt="" />
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>Welcome !</h3>
                    <p>
                        This is our University portal Where the students can register them selfs with the university and use the portal for study purposes.
                    </p>
                    <button class="btn transparent" id="sign-in-btn">
                        Sign in
                    </button>
                </div>
                <img src="img/regs.svg" class="image" alt="" />
            </div>
        </div>
    </div>

    <script src="app.js"></script>
</body>

</html>
