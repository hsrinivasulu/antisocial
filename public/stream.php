<?php

    // include the config file
    require("../includes/config.php");
    
    if($_SERVER["REQUEST_METHOD"] == "GET")
    {
        $posts = getStream($_SESSION["id"]);
        
        if($posts === false)
            render("stream_view.php", ["title" => "stream", "id" => $_SESSION["id"]]);
        else
           render("stream_view.php", ["title" => "stream", "id" => $_SESSION["id"], "posts" => $posts]);  
    }
    
    else if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty($_POST["text"]))
        {
            $posts = getStream($_SESSION["id"]);
            if($posts === false)
                render("stream_view.php", ["title" => "stream", "id" => $_SESSION["id"], "err_str" => "You may not make a blank post"]);
            else
               render("stream_view.php", ["title" => "stream", "id" => $_SESSION["id"], "posts" => $posts, "err_str" => "You may not make a blank post"]);
            exit;
        }
        
        $text = filter($_POST["text"]);
        $public = (empty($_POST["public"]))? FALSE:TRUE;
        $poster_id = $_SESSION["id"];
        
        query("INSERT INTO `posts` (text, public, poster_id) VALUES(?, ?, ?)", $text, $public, $poster_id);
        
        redirect("stream.php");
    }

?>
