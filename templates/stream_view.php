<?php

    if(isset($err_str))
    {
        echo("<div  style=\"position:fixed; width: 100%;\"><div class=\"alert alert-warning fade in\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Error:</strong> " . $err_str . " </div></div>");
    }
?>
<div class="container" style="padding-top: 60px; padding-bottom: 40px;">
    <div class="col-md-5">
        <div class = "well well-lg" >
            <form role="form" action="stream.php" method="POST">
                <div class="form-group">
                    <textarea class="form-control" placeholder="What's on your mind?" name="text" rows=5></textarea>
                </div>
                <div class="checkbox">
                  <label><input type="checkbox" name="public" value="true">Public?</label>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Post  <span class="glyphicon glyphicon-pencil"></span></button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-7">
        <?php
            if(empty($posts))
                echo("<center>No posts for us to show yet :( <br/>Perhaps try adding more friends?</center>");
            else
                foreach($posts as $post)
                {
                    $poster_id = $post["poster_id"];
                    $text = $post["text"];
                    $timestamp = $post["timestamp"];
        ?>
        <!-- Put the post html here -->
        <div class="well" style="margin-bottom: 20px;">
            <a href="profile.php?id=<?= $poster_id ?>"><?= getName($poster_id); ?></a> <span style="color: grey;"><small><?= $timestamp ?></small></span>
            <br/>
            <?= $text?>
        </div>
        <?php
                }?>       
    </div>
</div>

