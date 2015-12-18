<?php
    
    // include config file
    require("../includes/config.php");
    
    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("register_form.php", ["title" => "register"]);
    }
    
    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        filter("hi////");
        broncos();
        
        if (empty($_POST["fname"]) || empty($_POST["lname"]) || empty($_POST["password"]) || empty($_POST["email"]))
            errorBS("register_form.php", "register", "One or more of these fields are empty. Please fill up all fields");
        
        if ((!preg_match("/^[a-z ,.'-]+$/i", $_POST["fname"])) || (!preg_match("/^[a-z ,.'-]+$/i", $_POST["lname"])))
            errorBS("register_form.php", "register", "Names cannot contain special characters apart from hyphens and apostrophes.");
            
        // declare variables
        $password = filter($_POST["password"]);
        $email = filter($_POST["email"]);
        $gender = filter($_POST["gender"]);
        $fname = name_sanitize(filter($_POST["fname"]));
        $lname = name_sanitize(filter($_POST["lname"]));
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            errorBS("register_form.php", "register", "Please enter a valid email address");
        
        $email_query = array_filer(query("SELECT * from `users` WHERE `email` = ?", $email));
        
        if (!empty($email_query))
            errorBS("register_form.php", "register", "Email ID already exists");
            
        // we're done, let's wrap up by registering the user and logging him in
        
        query("INSERT into `users` (fname, lname, hash, email, gender) VALUES(?, ?, ?, ?, ?)", $fname, $lname, crypt($password), $email, $gender);
        $_SESSION["id"] = query("SELECT LAST_INSERT_ID() AS id")[0]["id"];
        
        // let's get to the STREAM BABY!
        redirect("stream.php");
        
    }
    
?>
