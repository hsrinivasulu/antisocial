<?php

    if(isset($err_str))
    {
        echo("<div  style=\"position:fixed; width: 100%;\"><div class=\"alert alert-warning fade in\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Error:</strong> " . $err_str . " </div></div>");
    }
?>
<div class="container" style="padding-top: 60px;">
    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4 well well-lg">
            <h2>Sign up</h2><br/>
            <form action="register.php" method="post">
                <div class="form-group">
                    <input class ="form-control" type="text" name="email" placeholder="Email"/>
                </div> 
                <div class="form-group">
                    <input class ="form-control" type="password" name="password" placeholder="Password"/>
                </div>
                <div class="form-group">
                    <input class = "btn btn-primary" type="submit" value="Log in"/>
                </div>
            </form><br/>
            <a href="login.php">Sign in if you already have an account</a><br/><br/>
        </div>
        <div class="col-md-4">
        </div>
    </div>
</div>
