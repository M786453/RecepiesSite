<?php

include "connect.php";

// Start user session
session_start();

// check login status
if(isset($_SESSION["isLogedIn"]) && $_SESSION["isLogedIn"] == true){
    // If user is already logedIn redirect to recepies page.
    redirectRecepies();
}

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
        password VARCHAR(40) NOT NULL
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


    if($name == "" || $email == "" || $password == ""){
        return "Atleast one input is empty.";
    }

     // Retrieve user data from the database
     $sql = "SELECT * FROM users WHERE username = '$name' OR email = '$email'";

     $result = $conn->query($sql);
 
     if ($result->num_rows > 0) {
        return "Username/Email already exists.";
     }

     $hashedPassword = md5($password);

    $sql = "INSERT INTO users (username, email, password) VALUES ('$name', '$email', '$hashedPassword')";

    if ($conn->query($sql) === true) {
        // return "Registration successful!";
        // Log User registration 
        file_put_contents('log.txt', $name." is registered with email '".$email."' at ".date('Y-m-d H:i:s').".\n", FILE_APPEND);
        // redirect user to login page
        header("Location: /recepies/login.php");
        exit;
    } else {
        return "Error: " . $sql . "<br>" . $conn->error;
    }
    
}


// User login
function login($conn){

    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username == "" || $password == ""){
        return "Username/Password is empty.";
    }


    // Retrieve user data from the database
    $sql = "SELECT * FROM users WHERE username = '$username'";

    $result = $conn->query($sql);

    if ($result->num_rows === 1) {

        $row = $result->fetch_assoc();
        $storedPassword = $row['password'];
        // Verify the entered password with the hashed password
        if (md5($password) === $storedPassword) {
            // return "Login successful!";
            // Log User registration 
            file_put_contents('log.txt', $username." is logged in at ".date('Y-m-d H:i:s').".\n", FILE_APPEND);
            // redirect user to recepies page
            $_SESSION["isLogedIn"] = true;
            $_SESSION['username'] = $username;
            redirectRecepies();
        } else {
            return "Incorrect password!";
        }

    } else {
        return "User not found!";
    }
}


// redirect to recepies page
function redirectRecepies(){
    header("Location: ./recepies.php");
    exit;
}
?>
