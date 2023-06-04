<?php
// start the session
session_start();

// destroy all data present in session
session_destroy();

redirectLogin();

// redirect to login page
function redirectLogin(){
    header("Location: /recepies/login.php");
    exit;
}

?>