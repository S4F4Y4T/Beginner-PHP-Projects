<?php include 'inc/header.php';
      include 'lib/user.php';
?>
<?php
	 $user = new user();
	 if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])){
		 $usrRegi = $user->userRegistation($_POST);
	 }
?>

		 
	<div class="panel panel-default">
		<div class="panel-heading">
		    <h2>User Registation </h2>
		</div>
		   <div class="panel-body">
		      <div style="max-width:600px; margin:0 auto;">
		   <?php
		  if(isset($usrRegi)){
			  echo $usrRegi;
		  }
		  ?>
		   <form action="" method="post">
		        <div class="form-group">
				    <label for="name">Your Name </label>
					     <input type="text" name="name" id="name" class="form-control">
				</div>
				
				<div class="form-group">
				    <label for="username">User Name</label>
					     <input type="text" name="username" id="username" class="form-control">
				</div>
				
				<div class="form-group">
				    <label for="email">Email Address </label>
					     <input type="text" name="email" id="email" class="form-control">
				</div>
				
				<div class="form-group">
				    <label for="password">Password </label>
					 <input type="password" name="password" id="password" class="form-control">
				</div>
				<button type="submit" name="register" class="btn btn-success">Submit</button>
		   </form>
		 </div>
	   </div>
	   </div>
<?php include"inc/footer.php";?>	 