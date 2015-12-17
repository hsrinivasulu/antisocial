<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <!-- responsive button -->
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><?= WEBNAME ?></a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
    
      <?php if (isset($_SESSION["id"])) {?>
      <div>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="stream.php">stream</a></li>
            <li><a href="profile.php">profile</a></li>
            <li><a href="notifications.php">notifications</a></li> 
            <li><a href="logout.php">log out</a></li> 
          </ul>
      </div>
      <?php }
      else  {?>
      <form class="navbar-form navbar-right" action="login.php" method="post">
        <div class="form-group">
          <input type="text" placeholder="Email" name="email" class="form-control">
        </div>
        <div class="form-group">
          <input type="password" placeholder="Password" name="password" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Sign in</button>
      </form>
      <?php }?>
    </div><!--/.navbar-collapse -->
  </div>
</nav>

<!-- end -->
</div>
<!-- navbar compensation -->
<div id = "middle">
    <div style="display: block; height: 50px; width: 100%;" ></div>


