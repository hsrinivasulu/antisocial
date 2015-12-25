<?php

    if(!isset($err_str))
        $err_str = "You must be logged in to view that page";
    echo("<div  style=\"position:fixed; width: 100%;\"><div class=\"alert alert-warning fade in\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Error:</strong> " . $err_str . " </div></div>");
    
?>
<div class="container" style="padding-top: 60px;">
    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4 well well-lg">
            <h2>Sign in</h2><br/>
            <form action="login.php" method="post">
                <div class="form-group">
                    <input class ="form-control" type="text" name="email" placeholder="Email"/>
                </div> 
                <div class="form-group">
                    <input class ="form-control" type="password" name="password" placeholder="Password"/>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Sign in <span class="glyphicon glyphicon-log-in"></span></button>
                </div>
            </form><br/>
            <a href="#">Forgot your password?</a><br/>
            <a href="register.php">Sign up for a new account</a><br/><br/>
        </div>
        <div class="col-md-4">
        </div>
    </div>
</div>
