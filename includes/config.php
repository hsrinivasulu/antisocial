<?php

    /**
     * code 'borrowed' from CS50
     */

    // display errors, warnings, and notices
    ini_set("display_errors", true);
    error_reporting(E_ALL);

    // requirements
    require("constants.php");
    require("functions.php");
    // require("../PHPMailer-master/PHPMailerAutoload.php");

    // enable sessions
    session_start();

    // require authentication for all pages except /login.php, /logout.php, and /register.php
    
    if (!in_array($_SERVER["PHP_SELF"], ["/login.php", "/index.php", "/register.php", "/test.php"]))
    {
        if (empty($_SESSION["id"]))
        {
            redirect("login.php");
        }
    }
    else if (in_array($_SERVER["PHP_SELF"], ["/login.php", "/index.php", "/register.php"]))
    {
        if (!empty($_SESSION["id"]))
        {
            redirect("stream.php");
        }
    }
    

?>
