<?php

    // include the config file
    require("../includes/config.php");
    
    $posts = getStream($_SESSION["id"]);
    
    if($posts === false)
        render("stream_view.php", ["title" => "stream", "id" => $_SESSION["id"]]);
    else
       render("stream_view.php", ["title" => "stream", "id" => $_SESSION["id"], "posts" => $posts]); 

?>
