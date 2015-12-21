<?php

    // include the config file
    require("../includes/config.php");
    
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
    
?>
