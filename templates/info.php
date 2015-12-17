<div class = "jumbotron">
    <div class="container">
        <h1><?= WEBNAME ?></h1>
        <p>The social networking website meant for those who don't like socialising in real life.</p>
    </div>
</div>
<div class="container">
    <div class= "row">
        <div class= "col-md-6">
            <h2>Create an account</h2>
            <form role="form" class="row" action="register.php" method="post">
                <div class ="col-md-10">
                    <div class="form-group row">
                        <div class="col-md-6">
                          <input class="form-control" type="text" placeholder="First Name" name="firstname"/>
                        </div>
                        <div class="col-md-6">
                            <input class="form-control" type="text" placeholder="Last Name" name="lastname"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="email" placeholder="Email Address" name="email"/>
                    </div>
                    <div class="form-group">
                      <input class="form-control" type="password" placeholder="Password" name="password"/>
                    </div>
                    <div class="form-group">
                        <label class="radio-inline"><input type="radio" name="gender" value="m" checked>Male</label>
                        <label class="radio-inline"><input type="radio" name="gender" value="f">Female</label>
                        <label class="radio-inline"><input type="radio" name="gender" value="n">Non Binary</label>
                        <label class="radio-inline"><input type="radio" name="gender" value="d">Do not wish to state</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class ="col-md-2">
                </div>
            </form>
        </div>
        <div class= "col-md-6">
            <h2>What's all this about?</h2>
            <p>Written using <a href="http;//getbootstrap.com">Bootstrap</a> and <a href="php.org">PHP</a>, <?= WEBNAME ?> is a social networking website that's so horrid that it induces one to switch off one's computer, cancel one's internet subscription, and go <a href="http://reddit.com/r/outside">outside</a> once in a while.</p>
            <h2>Lorem Ipsum</h2>
            <p>Aenean id tortor vel erat dignissim convallis. Suspendisse a libero est. Nullam pellentesque semper nisi, ac ultricies ligula ultrices venenatis. Aenean porta ligula a nulla sagittis, sed egestas ligula suscipit. Integer gravida cursus imperdiet. Maecenas consectetur, velit id rutrum euismod, nibh nulla sagittis erat, sed finibus risus tellus sit amet.</p>  
        </div>
    </div>
</div>
