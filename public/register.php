
<div class="row centered-form">
<div class="col-md-6 col-md-offset-3">
	<div class="panel panel-default">
		<div class="panel-heading">
	    		<h3 class="panel-title">Please register here</h3>
	 			</div>
	 			<div class="panel-body">
	    		<form action="" method="post">
	    			<div class="form-group">
	    				<input type="text" name="username" id="username" class="form-control input-sm" placeholder="Enter username">
	    			</div>

	    			<div class="row">
	    				<div class="col-xs-6 col-sm-6 col-md-6">
	    					<div class="form-group">
	    						<input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
	    					</div>
	    				</div>
	    				<div class="col-xs-6 col-sm-6 col-md-6">
	    					<div class="form-group">
	    						<input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-sm" placeholder="Confirm Password">
	    					</div>
	    				</div>
	    			</div>
	    			
	    			<input type="submit" value="Register" name="submit" class="btn btn-info btn-block">
	    		
	    		</form>
	    	</div>
		</div>
	</div>
</div>

<?php

if(isset($_POST['submit'])) {

	include_once 'App/Helpers/validation.php';

    $username = validate_input($_POST['username']);
    $password = validate_input($_POST['password']);
    $password_confirm = validate_input($_POST['password_confirmation']);

    $conn = new Controller();
    $conn->register_user($username, $password, $password_confirm);

} else {

	echo "<div class='col-md-6 col-md-offset-3'>
             <p>If you already have account you may login <a href='index.php?o=login'>here</a></p>
          </div>";
}

?>