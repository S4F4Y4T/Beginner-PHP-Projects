<?php
	$filepath = realpath(dirname(__FILE__));
	include_once $filepath.'/../lib/session.php';
	session::init();
?>
<!DOCTYPE html>
<html>
  <head>
     <title>Login Register System</title>
	 
	 <link rel="stylesheet" href="inc/min.css">
  </head>
  <?php
	if(isset($_GET['action']) && $_GET['action'] == "logout" ){
		session::destroy();
	}
  ?>
  
  <body>
	  <div class="container">
		 <nav class="navbar navbar-default">
		    <div class="container-fluid">
			    <div class="navbar-header">
			        <a class="navbar-brand" href="index.php">
			                     Login Register System
			</a>
			</div>
			  <ul class="nav navbar-nav pull-right">
				
				
				
					<?php
			
	$id = session::get("id");
	$usrlogin = session::get("login");
	if($usrlogin == true){
	
?>
					
						<li><a href="index.php">Home</a></li>
						<li><a href="profile.php?id= <?php echo $id; ?>">Profile</a></li>
						<li><a href="?action=logout">Logout</a></li>
					
	<?php } else { ?>
				<li><a href="login.php">Login</a></li>
				<li><a href="register.php">Register</a></li>
	<?php } ?>		
               </ul>			
			</div>
		 </nav>