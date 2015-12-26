<?php

    // include the config file
    require("../includes/config.php");
    
    if($_SERVER["REQUEST_METHOD"] == "GET")
    {
        $id = $_SESSION["id"];
        if(isset($_GET["id"]))
            $id = $_GET["id"];
            
        $user = getUser($id);
        
        // TODO: Create a proper solution to the problem of idiots navigating to ids that don't exist
        if ($user === FALSE)
            redirect("stream.php");
            
        $posts = getPosts($id);
        
        if ($posts !== FALSE)
            render("profile_view.php", ["title" => getName($id), "id" => $id, "user" => $user, "posts" => $posts]);
        else
           render("profile_view.php", ["title" => getName($id), "id" => $id, "user" => $user]); 
           
   }
   
   else if ($_SERVER["REQUEST_METHOD"] == "POST")
   {    
        if(empty($_POST["id"]))
            redirect("stream.php");
        
        $id = filter($_POST["id"]);
        $user = getUser($id);
        
        // TODO: Create a proper solution to the problem of idiots navigating to ids that don't exist
        if ($user === FALSE)
            redirect("stream.php");
        
        switch(checkReqStatus($id))
        {
            case 3:
                // TODO: Put in dat request
                query("INSERT INTO `friend_reqs` (`sender_id`, `receiver_id`) VALUES (?, ?)", $_SESSION["id"], $id);
                break;
        }
        
        redirect("profile.php?id=". $id);
   }
?>
