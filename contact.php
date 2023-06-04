<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./style/style.css" />
</head>
<body>
    <div class="height__screen bg__img">
        <div class="darken__mask"></div>
        <nav>
            <a href='index.php'>RECIPES</a>
            <div>
                <a href="contact.php">Contact</a>
                <?php 
                session_start();
                // check login status
                if(isset($_SESSION["isLogedIn"]) && $_SESSION["isLogedIn"] == true){
                    echo "<a href='recepies.php'>Recepies</a>";
                    echo "<a href='logout.php'>Logout</a>";
                }else{
                    echo "<a href='login.php'>Login</a>";
                    echo "<a href='register.php'>Register</a>";
                }
                ?>
            </div>
        </nav>
        <div class="main__content" style="z-index: 10;">
            <h1>Contact Us</h1>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25157.21213208765!2d-100.87639520996892!3d37.985261218671575!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8709ee192f0ad66d%3A0x98205acce71ef74e!2sPapa%20Johns%20Pizza!5e0!3m2!1sen!2s!4v1685886016753!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <div>
                <a href="https://www.facebook.com" target="_blank"><img src="./assets/icons/facebook.png" width='50'/></a>
                <a href="https://www.instagram.com" target="_blank"><img src="./assets/icons/instagram.png" width='50'/></a>
                <a href="https://www.twitter.com" target="_blank"><img src="./assets/icons/twitter.png" width='50'/></a>
            </div>
            <p>Call Us At : +0123456789</p>
        </div>
    </div>
</body>
</html>