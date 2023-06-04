<?php

include "connect.php";

// Create connection with databasse
$conn = createConnectionToMySql();

// Create Users table in database if not already exists
createUsersTable($conn);

if (isset($_POST['login'])){
    login($conn);
}else if(isset($_POST['register'])){
    register($conn);
}

// Close the database connection
$conn->close();


// Create Users Table If not already exists
function createUsersTable($conn){
    $sql = "CREATE TABLE IF NOT EXISTS users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30) NOT NULL,
        email VARCHAR(30) NOT NULL,
        password VARCHAR(30) NOT NULL
        )";
   
    $stmt = $conn->prepare($sql);
    
    try{
        $stmt->execute();
    }catch(PDOException $e){
    }

}

// User registration
function register($conn) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $conn->real_escape_string($_POST['password']);


    // Hash the password (for security)
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert user data into the database
    // $sql = "INSERT INTO users (username, email, password) VALUES ('$name', '$email', '$hashedPassword')";

    $sql = "INSERT INTO users (username, email, password) VALUES ('$name', '$email', '$password')";

    if ($conn->query($sql) === true) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
}


// User login
function login($conn){

    $email = $_POST['email'];
    $password = $_POST['password'];

    echo $password;
    // Retrieve user data from the database
    $sql = "SELECT * FROM users WHERE email = '$email'";

    $result = $conn->query($sql);

    if ($result->num_rows === 1) {

        $row = $result->fetch_assoc();
        $hashedPassword = $row['password'];

        // Verify the entered password with the hashed password
        if ($password === $hashedPassword) {
            echo "Login successful!";
        } else {
            echo "Incorrect password!";
        }

    } else {
        echo "User not found!";
    }
}
?>

<!-- HTML form for registration -->
<form method="POST" action="">
    <input type="text" name="name" placeholder="Name" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <input type="submit" name="register" value="Register">
</form>

<!-- HTML form for login -->
<form method="POST" action="">
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <input type="submit" name="login" value="Login">
</form>
