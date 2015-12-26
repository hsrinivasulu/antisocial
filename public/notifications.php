<?php

    // include the config file
    require("../includes/config.php");
    
    if($_SERVER["REQUEST_METHOD"] == "GET")
    {
        $requests = array_filter(query("SELECT * FROM `friend_reqs` WHERE `receiver_id` = ?", $_SESSION["id"]));
        
        if (empty($requests))
            render("notifications_view.php", ["title" => "notifications"]);
        else
            render("notifications_view.php", ["title" => "notifications", "requests" => $requests]);
            
        exit;
    }
    
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {  
        // TODO: Better douchebag handling?
        if(empty($_POST["sender_id"]) || empty($_POST["action"]))
            redirect("notifications.php");
        
        $receiver_id = $_SESSION["id"];
        $sender_id =  filter($_POST["sender_id"]);
        $action = filter($_POST["action"]);
        
        // Let's authenticate whether the request actually exists
        
        $records = array_filter(query("SELECT * FROM `friend_reqs` WHERE `sender_id` = ? AND `receiver_id` = ?", $sender_id, $receiver_id));
        
        // TODO: More douchebag handling
        if(empty($records))
            redirect("notifications.php");
        
        // TODO: Using request_id is sorta unnecessary but prevents any accidental deletions. TBD   
        $request_id = $records[0]["id"];
        
        // Delete first, then check whether the action was an accept
        query("DELETE FROM `friend_reqs` WHERE `request_id` = ?", $request_id);
        
        if ($action = "accept")
        {
            query("INSERT INTO `friends` (`sender_id`, `receiver_id`, `freq_id`) VALUES (?, ?, ?)", $sender_id, $receiver_id, $request_id);
            redirect("notifications.php");
        }
        else
        {
            redirect("notifications.php");
        }
    }
       
?>
