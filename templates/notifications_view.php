<div class="container" style="padding-top: 60px; padding-bottom: 40px;">
    <table class="table table-hover">
        <tr>
            <th colspan=3>Friend Requests</th>
        </tr>
    <?php
        if (!isset($requests))
            echo("<tr><td colspan=3><center>No requests yet :(</center></tr>");
        else
        {
            foreach($requests as $request)
            {
    ?>
            <tr>
                <td><center><a href = "profile.php?id=<?= $request["sender_id"] ?>"><?= getName($request["sender_id"]); ?></a></center></td>
                <td><center><?= $request["timestamp"] ?></center></td>
                <td>
                    <center>
                    <form action="notifications.php" method="post">
                        <div class="btn-group">
                            <input style="display:none;" name="sender_id" value="<?= $request["sender_id"] ?>"/>
                            <button type="submit" name="action" value="accept" class="btn btn-success btn-xs">Accept <span class="glyphicon glyphicon-plus"></span></button>
                            <button type="submit" name="action" value="decline" class="btn btn-danger btn-xs">Decline <span class="glyphicon glyphicon-minus"></span></button>
                        </div>
                    </form>
                    </center>
                </td>
            </tr>
    <?php
            }
        }?>
    </table>
</div>

