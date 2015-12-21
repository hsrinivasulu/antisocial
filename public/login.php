<?php

    // include the config file
    require("../includes/config.php");
    
    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("login_form.php", ["title" => "Log In"]);
    }
    
    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $email = filter($_POST["email"]);
        $password = filter($_POST["password"]);
        
        // retrieve data from database
        $rows = query("SELECT * from `users` where email = ?", $email);
        $rows = array_filter($rows);
        
        if(empty($rows))
        {
            render("login_form.php", ["title" => "Log In", "err_str" => "Email address does not match that of any preexisting account."]);
            exit;
        }
        
        $hash = $rows[0]["hash"];
        
        if(!(crypt($password, $hash) == $hash))
        {
            render("login_form.php", ["title" => "Log In", "err_str" => "Incorrect Email ID/Password combination."]);
            exit;
        }
        
        // at this point, you would have invariably satisfied all the requirements for logging in, so we might as well log in the user
        
        $user = $rows[0];
        $_SESSION["id"] = $user["id"];
        
        redirect("stream.php");
    }

?>
