<?php

    // include the config file
    require("../includes/config.php");
    
    if($_SESSION["id"] == 7)
        $_SESSION["id"] = 8;
    else
        $_SESSION["id"] = 7;
        
    redirect("stream.php");

?>
