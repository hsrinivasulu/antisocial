<form action="register.php" method="post">
     <div class="form-group row">
        <div class="col-md-6">
          <input class="form-control" type="text" placeholder="First Name" name="fname"/>
        </div>
        <div class="col-md-6">
            <input class="form-control" type="text" placeholder="Last Name" name="lname"/>
        </div>
    </div>
    <div class="form-group">
        <input class="form-control" type="email" placeholder="Email Address" name="email"/>
    </div>
    <div class="form-group">
      <input class="form-control" type="password" placeholder="Password" name="password"/>
    </div>
    <div class="form-group">
        
    </div>
    <div class="form-group">
        Gender: 
        <label class="radio-inline"><input type="radio" name="gender" value="m" checked>Male</label>
        <label class="radio-inline"><input type="radio" name="gender" value="f">Female</label>
        <label class="radio-inline"><input type="radio" name="gender" value="n">Non Binary</label>
        <label class="radio-inline"><input type="radio" name="gender" value="d">Do not wish to state</label>
    </div>
    <div class="form-group">
        <input class = "btn btn-primary" type="submit" value="Register"/>
    </div>
</form>
