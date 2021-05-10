<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Contact</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="contacts.css">
</head>

<body>
    <form action="mail.php" method="post">
        <section>
            <div class="container">
                <header>
                    <img src="img/unilogo.png" alt="" class="unilogo">
                    <ul>
                        <li><a href="FrontPage.php">Home</a></li>
                        <li><a href="Login.php">Login</a></li>
                        <li><a href="About%20Us.php">About</a></li>
                        <li><a href="#" class="stay">Contact</a></li>
                    </ul>
                </header>
                <div class="cont">
                    <h2>Contact Us</h2>
                    <input type="text" name="name" placeholder="Your Name" required>
                    <br>
                    <input type="email" name="Email" placeholder="Enter Your Email" required>
                    <br>
                    <textarea name="message" id="message" cols="30" rows="10" placeholder="Message" required></textarea><br>
                    <input type="submit" class="text" value="Send">

                </div>
                <p style="color:darkblue">Contact Number: +44 20 8331 8000<br /><br />
                    Email: scrummasteruog@gmail.com<br /><br />
                    Address: Old Royal Naval College,
                    Park Row,Greenwich,
                    London SE10 9LS,
                    United Kingdom</p>

                <ul class="social">
                    <li><a href="https://www.facebook.com/pg/uniofgreenwich/about/?ref=page_internal"><img src="img/face.png"></a></li>
                    <li><a href="https://twitter.com/UniofGreenwich"><img src="img/twit.png"></a></li>
                    <li><a href="https://www.instagram.com/uniofgreenwich/"><img src="img/insta.png"></a></li>
                </ul>
            </div>
        </section>
    </form>
</body>

</html>
