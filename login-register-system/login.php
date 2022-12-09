<?php include 'inc/header.php';
      include 'lib/user.php';
	  session::chklogin();
?>
<?php
	 $user = new user();
	 if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
		 $usrlogin = $user->usrlogin($_POST);
	 }
?>
		 
	<div class="panel panel-default">
		<div class="panel-heading">
		    <h2>User Login </h2>
		</div>
		   <div class="panel-body">
		      <div style="max-width:600px; margin:0 auto;">
			  
			  <?php
		  if(isset($usrlogin)){
			  echo $usrlogin;
		  }
		  ?>
			  
		   <form action="" method="post">
		        <div class="form-group">
				    <label for="email">Email Address </label>
					     <input type="text" name="email" id="email" class="form-control">
				</div>
				
				<div class="form-group">
				    <label for="password">Password </label>
					 <input type="password" name="password" id="password" class="form-control">
				</div>
				<button type="submit" name="login" class="btn btn-success">Login</button>
		   </form>
		 </div>
	   </div>
	   </div>
	   
<?php include"inc/footer.php";?>	 