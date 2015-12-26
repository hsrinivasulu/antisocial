<div class="container" style="padding-top: 60px; padding-bottom: 40px;">
    <div class="row">
        <div class="col-md-4">
        
            <div class="well well-lg">
                <center>
                    <h2><?= getName($id)?>.</h2><br/>
                    <?php
                        switch (checkReqStatus($id))
                        {
                            case 0:
                                echo("<form action=\"profile.php\" method=\"post\"><button type=\"submit\" name=\"id\" value=\"". $id ."\" class=\"btn btn-danger\">Unfriend <span class=\"glyphicon glyphicon-minus\"></button><br/></form>");
                                break;
                            
                            case 1:
                                echo("<a href=\"notifications.php\" class=\"btn btn-info\" role=\"button\">Respond to Request <span class=\"glyphicon glyphicon-plus\"></span></a><br/>");
                                break;
                                
                            case 2:
                                echo("<button type=\"button\" class=\"btn btn-success disabled\">Request Sent <span class=\"glyphicon glyphicon-plus\"></button><br/>");
                                break;
                                
                            case 3:
                                echo("<form action=\"profile.php\" method=\"post\"><button type=\"submit\" name=\"id\" value=\"". $id ."\" class=\"btn btn-success\">Add Friend <span class=\"glyphicon glyphicon-plus\"></button><br/></form>");
                                break;
                        }
                    ?>
                <br/>
                    <span class="glyphicon glyphicon-user"></span> <?= gender_str($user["gender"]) ?><br/>
                    <span class="glyphicon glyphicon-envelope"></span> <?= $user["email"] ?><br/><br/>  
                </center>
            </div>
            
            <?-- friendlist ?>
            <?php 
                $friends = getFriendList($id);
                if ($friends !== FALSE) 
                {
            ?>
            
            <div class="well well-lg">
                <h2>Friends.</h2><br/>
                
                <ol style="list-style: none;">
                
                <?php
                    foreach($friends as $friend)
                    {
                        echo("<li><a href=\"profile.php?id=" . $friend  . "\">". getName($friend) ."</a></li>");
                    }
                ?>
                
                </ol>
            </div>
            <?php
                }?> 
                
        </div>
        <div class="col-md-8">
            <?php
                if(empty($posts))
                    echo("<center>There are no posts to show :(</center>");
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
</div>
