<?php

if(isset($_POST['submit'])) {

    include_once 'App/Helpers/validation.php';

    $username = validate_input($_POST['username']);
    $password = validate_input($_POST['password']);

    $conn = new Controller();
    $conn->login_user($username, $password);

}

?>


<div class="col-md-6 col-md-offset-3">
<form action="" method="post" class="form-signin">
    <h2 class="form-signin-heading">Please sign in</h2>
    	<label for="username" class="sr-only">Username</label>
    		<input type="text" id="username" name="username" class="form-control" placeholder="Enter username" required autofocus>
    	<label for="password" class="sr-only">Password</label>
    		<input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
    <div class="checkbox">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
    <hr>
    <a class="btn btn-lg btn-primary btn-block" href="index.php?o=register">Register</a>
</form>
</div>