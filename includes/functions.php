<?php

    /**
     * Code 'borrowed' from CS50
     *
     */
    
    
    /**
     * Facilitates debugging by dumping contents of variable
     * to browser.
     */
    function dump($variable)
    {
        require("../templates/dump.php");
        exit;
    }

    /**
     * Logs out current user, if any.  Based on Example #1 at
     * http://us.php.net/manual/en/function.session-destroy.php.
     */
    function logout()
    {
        // unset any session variables
        $_SESSION = [];

        // expire cookie
        if (!empty($_COOKIE[session_name()]))
        {
            setcookie(session_name(), "", time() - 42000);
        }

        // destroy session
        session_destroy();
    }

    /**
     * Executes SQL statement, possibly with parameters, returning
     * an array of all rows in result set or false on (non-fatal) error.
     */
    function query(/* $sql [, ... ] */)
    {
        // SQL statement
        $sql = func_get_arg(0);

        // parameters, if any
        $parameters = array_slice(func_get_args(), 1);

        // try to connect to database
        static $handle;
        if (!isset($handle))
        {
            try
            {
                // connect to database
                $handle = new PDO("mysql:dbname=" . DATABASE . ";host=" . SERVER, USERNAME, PASSWORD);

                // ensure that PDO::prepare returns false when passed invalid SQL
                $handle->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); 
            }
            catch (Exception $e)
            {
                // trigger (big, orange) error
                trigger_error($e->getMessage(), E_USER_ERROR);
                exit;
            }
        }

        // prepare SQL statement
        $statement = $handle->prepare($sql);
        if ($statement === false)
        {
            // trigger (big, orange) error
            trigger_error($handle->errorInfo()[2], E_USER_ERROR);
            exit;
        }

        // execute SQL statement
        $results = $statement->execute($parameters);

        // return result set's rows, if any
        if ($results !== false)
        {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        else
        {
            return false;
        }
    }

    /**
     * Redirects user to destination, which can be
     * a URL or a relative path on the local host.
     *
     * Because this function outputs an HTTP header, it
     * must be called before caller outputs any HTML.
     */
    function redirect($destination)
    {
        // handle URL
        if (preg_match("/^https?:\/\//", $destination))
        {
            header("Location: " . $destination);
        }

        // handle absolute path
        else if (preg_match("/^\//", $destination))
        {
            $protocol = (isset($_SERVER["HTTPS"])) ? "https" : "http";
            $host = $_SERVER["HTTP_HOST"];
            header("Location: $protocol://$host$destination");
        }

        // handle relative path
        else
        {
            // adapted from http://www.php.net/header
            $protocol = (isset($_SERVER["HTTPS"])) ? "https" : "http";
            $host = $_SERVER["HTTP_HOST"];
            $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
            header("Location: $protocol://$host$path/$destination");
        }

        // exit immediately since we're redirecting anyway
        exit;
    }

    /**
     * Renders template, passing in values.
     */
    function render($template, $values = [])
    {
        // if template exists, render it
        if (file_exists("../templates/$template"))
        {
            // extract variables into local scope
            extract($values);

            // render header
            require("../templates/header.php");
            
            // render navbar
            require("../templates/navbar.php");

            // render template
            require("../templates/$template");

            // render footer
            require("../templates/footer.php");
        }

        // else err
        else
        {
            trigger_error("Invalid template: $template", E_USER_ERROR);
        }
    }
    
    // my functions
    
    function filter($input) 
    {
        return htmlspecialchars(stripslashes(trim($input)));
    }
    
    function activate($name)
    {
        if($_SERVER["PHP_SELF"] == "/" . $name . ".php")
            return "class = \"active\"";
        else
            return "";
    }
    
    function errorBS($filename, $title, $err_str)
    {
        render($filename, ["title" => $title, "err_str" => $err_str]);
        exit;
    }
    
    // get functions
    
    function getUser($id = NULL)
    {
        if($id == NULL)
            $id = $_SESSION["id"];
        
        $data = array_filter(query("SELECT * FROM `users` where id = ?", $id));
        if (empty($data))
            return false;
        else 
            return $data[0];
    }
    
    function getFriendList($id = NULL)
    {
        if($id == NULL)
            $id = $_SESSION["id"];
        
        $data = array_filter(query("SELECT * FROM `friends` where id_sent = ? OR id_received = ?", $id, $id));
        if (empty($data))
            return false;
        else
        {
            $numbers = [];
            $counter = 0;
            
            foreach($data as $row)
            {
                if ($id = $row["id_sent"])
                    $numbers[$counter] = $row["id_received"];
                else
                    $numbers[$counter] = $row["id_sent"];
            }
            
            return $numbers;
        }
    }
    
    function getStream($id = NULL)
    {
        if($id == NULL)
            $id = $_SESSION["id"];
        
        $data = array_filter(query("SELECT * FROM `posts"));
        
        if (empty($data))
            return false;
        else
        {
            $posts = [];
            $counter = 0;
            // $friends = getFriendList($id);
            
            foreach($data as $row)
            {
                if ($row["public"] == TRUE || /* in_array($row["poster_id"], $friends) || */ $row["poster_id"] = $id)
                {
                   $posts[$counter] = $row;
                   $counter++; 
                }
            }
            return $posts;
        }
    }
    
    function getPosts($id = NULL)
    {
        if($id == NULL)
            $id = $_SESSION["id"];
            
        // checking if it's for the user or for a friend
        
        if ($id = $_SESSION["id"] || isFriend($id, $_SESSION["id"])) 
            $data = array_filter(query("SELECT * FROM `posts` WHERE `poster_id` = ?", $id));
        else
            $data = array_filter(query("SELECT * FROM `posts` WHERE `poster_id` = ? AND `PUBLIC` = FALSE", $id)); 
        
        if (empty($data))
            return false;
        else
            return $data;
    }
    
    function isFriend($user_id, $current_id = NULL)
    {
        if($current_id == NULL)
            $current_id = $_SESSION["id"];
            
        $friend_list = getFriendList($current_id);
        
        if($friendlist === FALSE)
            return false;
        else
        {
            if(in_array($user_id, $friend_list))
                return true;
            else
                return false;
                
        }
    }
    
    function getReqs($id = NULL)
    {
        if($id == NULL)
            $id = $_SESSION["id"];
        
        $reqs = array_filter(query("SLECT * FROM `friend_reqs` WHERE `receiver_id` = ?", $id));
        
        if(empty($reqs))
            return false;
        else
            return $reqs;
    }
    
    function getName($id = NULL)
    {
        if($id == NULL)
            $id = $_SESSION["id"];
        
        $user = getUser($id);
        
        if ($id !== false)
        {
            $name = $user["first_name"] . " " . $user["last_name"]; 
            return $name;
        }
        else
            return false;
    }
    
    /*
    function email($id, $subject, $message)
    {
        // NOTE: This code was written using the help of online resources
        $mailer = new PHPMailer(); 
        $mailer->IsSMTP(); 
        $mailer->SMTPDebug = 0; 
        $mailer->SMTPAuth = true;
        
        // settings for GMail obtained from StackOverflow 
        $mailer->SMTPSecure = 'ssl'; 
        $mailer->Host = "smtp.gmail.com";
        $mailer->Port = 465;
        $mailer->IsHTML(true);
        
        $mailer->Username = EMAIL_ID;
        $mailer->Password = EMAIL_PWD;
        $mailer->SetFrom(EMAIL_ID);
        
        $mailer->Subject = $subject;
        $mailer->Body = $message;
        $mailer->AddAddress($id);
        
        return($mailer->Send());
    }
    */
    

?>
