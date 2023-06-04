<?php

// create database connection
function createConnectionToMySql(){
    
    include "conf.php";
    
    try {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB);
        
        if($conn->connect_error){
            die("Connected Failed." . $conn.connect_error);
        }

        echo "Connected to database successfully.";

        return $conn;
    } catch(Exception $e) {
        die("Connection failed: " . $e->getMessage());
    }

}

?>