<?php include"inc/header.php";
	  include 'lib/user.php';
	  session::chksession();
?>
<?php
	if(isset($_GET['id'])){
		$usrid = (int)$_GET['id'];
	}
	
?>
		
		 <div class="panel panel-default">
		 <div class="panel-heading">
		 <h2>User Profile <span class="pull-right"><strong><a href="index.php" class="btn btn-primary">Back</a></strong></h2></span>
		 </div>
		  <div class="panel-body">
		      <div style="max-width:600px; margin:0 auto;">
			  
			  <?php
	$user 	  = new user();
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])){
		 $update = $user->updtusr($usrid, $_POST);
	 }
	$userdata = $user->updtuser($usrid);
	if($userdata){
		
	
?>
<?php
				if(isset($update)){
					echo $update;
				}
			  ?>
		   <form action="" method="post">
		        <div class="form-group">
				    <label for="name">Your Name </label>
					     <input type="text" name="name" id="name" class="form-control" value="<?php echo $userdata->name; ?>">
				</div>

				<div class="form-group">
				    <label for="username">User Name</label>
					     <input type="text" name="username" id="username" class="form-control" value="<?php echo $userdata->username; ?>">
				</div>
				
				<div class="form-group">
				    <label for="email">Email Address </label>
					     <input type="text" name="email" id="email" class="form-control" value="<?php echo $userdata->email; ?>">
				</div>
				<?php
					$sesid = session::get("id");
					if($usrid == $sesid){
				?>
			
				<button type="submit" name="update" class="btn btn-success">Update</button>
				<a href="changepass.php?id=<?php echo $usrid; ?>" type="submit" name="changepass" class="btn btn-info" >Change Password</a>
					<?php } ?> 	   
		   </form>
	<?php } ?>
		 </div>
	   </div>
	   </div>
<?php include"inc/footer.php";?>	 