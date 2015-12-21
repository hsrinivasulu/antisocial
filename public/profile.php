<?php

    // include the config file
    require("../includes/config.php");
    
    $id = (empty($_GET["id"]))? $_SESSION["id"]: $_GET["id"];
    
?>
