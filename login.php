<?php include 'auth.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./style/style.css" />
</head>
<body>
    <main class="height__screen bg__img">
        <div class="darken__mask"></div>
        <nav>
            <a href="index.html">RECIPES</a>
            <div>
                <a href="contact.html">Contact</a>
                <a href="login.html">Login</a>
                <a href="register.html">Register</a>
            </div>
        </nav>
        <form class="custom__form" method="POST" action="">
            <h2>Login</h2>
            <input type="text" name="username" placeholder="Username"/>
            <input type="password" name="password" placeholder="Password"/>
            <button type="submit" name="login" value="Login">Login</button>
            <p>Don't have an account? <a href="register.html">Register</a></p>
            <p><?php echo $status; ?></p>
        </form>
    </main>
</body>
</html>