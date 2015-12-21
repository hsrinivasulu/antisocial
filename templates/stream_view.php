<div class="container" style="padding-top: 40px; padding-top: 40px;">
    <div class="col-md-8">
        <?php
            if(!isset($posts))
                echo("No posts for us to show yet :( <br/>Perhaps try adding more friends?");
            else
                foreach($posts as $post)
                {
                    $poster_id = $post["poster_id"];
                    $text = $post["text"];
        ?>
        <!-- Put the post html here -->
        <div class="well" style="margin-bottom: 20px;">
            <a href="profile.php?id=<?= $poster_id ?>"><?= getName($poster_id); ?></a><br/>
            <?= $text?>
        </div>
        <?php
                }?>       
    </div>
    <div class="col-md-4">
    </div>
</div>
