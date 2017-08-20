<?php
  	ob_start();
  	require_once('includes/load.php');
  	if($session->isUserLoggedIn(true)){
  		redirect('home.php', false);
  	}
?>

<div class="login-page">
    
    <div class="text-center">
    	<h1>Welcome</h1>
       	<p>Sign in to start your session</p>
    </div>
     
	<?php echo display_msg($msg); ?>
      
	<form method="post" action="auth.php" class="clearfix">
    	
    	<div class="form-group">
        	<label for="username" class="control-label">Username</label>
        	<input type="name" class="form-control" name="username" placeholder="Username">
        </div>
        
        <div class="form-group">
        	<label for="password" class="control-label">Password</label>
            <input type="password" name= "password" class="form-control" placeholder="Password">
        </div>
        
        <div class="form-group">
            <button type="submit" class="btn btn-info  pull-right">Login</button>
        </div>
    
    </form>

</div>

<?php include_once('layouts/header.php'); ?>
<style>
 body { 
     background: url(back.jpg) no-repeat center center fixed; 
     -webkit-background-size: cover;
     -moz-background-size: cover;
     -o-background-size: cover;
     background-size: cover;
   }
</style>