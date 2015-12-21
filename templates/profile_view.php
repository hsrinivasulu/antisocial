<div class="container" style="padding-top: 60px; padding-bottom: 40px;">
    <div class="row">
        <div class="col-md-4">
        
            <div class="well well-lg">
                <center>
                    <h2><?= getName($id)?>.</h2><br/>
                    <?= gender_str($user["gender"]) ?><br/>
                    <?= $user["email"] ?><br/><br/>  
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
