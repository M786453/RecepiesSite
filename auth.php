<?php

include "connect.php";

// Create connection with databasse
$conn = createConnectionToMySql();

// Create Users table in database if not already exists
createUsersTable($conn);

$status = ""; //variable to store login status

if (isset($_POST['login'])){
    $status = login($conn);
}else if(isset($_POST['register'])){
    $status = register($conn);
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

    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $conn->real_escape_string($_POST['password']);

     // Retrieve user data from the database
     $sql = "SELECT * FROM users WHERE username = '$name' OR email = '$email'";

     $result = $conn->query($sql);
 
     if ($result->num_rows > 0) {
        return "Username/Email already exists.";
     }

    $sql = "INSERT INTO users (username, email, password) VALUES ('$name', '$email', '$password')";

    if ($conn->query($sql) === true) {
        return "Registration successful!";
    } else {
        return "Error: " . $sql . "<br>" . $conn->error;
    }
    
}


// User login
function login($conn){

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Retrieve user data from the database
    $sql = "SELECT * FROM users WHERE username = '$username'";

    $result = $conn->query($sql);

    if ($result->num_rows === 1) {

        $row = $result->fetch_assoc();
        $storedPassword = $row['password'];

        // Verify the entered password with the hashed password
        if ($password === $storedPassword) {
            return "Login successful!";
        } else {
            return "Incorrect password!";
        }

    } else {
        return "User not found!";
    }
}
?>
