<?php include"inc/header.php";
	  include 'lib/user.php';
	  session::chksession();
?>
<?php
	if(isset($_GET['id'])){
		$usrid = (int)$_GET['id'];
		$sesid = session::get("id");
		if($usrid != $sesid){
			header("location:index.php");
		}
	}
	
?>
		
		 <div class="panel panel-default">
		 <div class="panel-heading">
		 <h2>Change Password <span class="pull-right"><strong><a href="profile.php?id=<?php echo $usrid; ?>" class="btn btn-primary">Back</a></strong></h2></span>
		 </div>
		  <div class="panel-body">
		      <div style="max-width:600px; margin:0 auto;">
			  
			  <?php
	$user 	  = new user();
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updatepass'])){
		 $updatepass = $user->updatepassword($usrid, $_POST);
	 }
	
		
	
?>
<?php
				if(isset($updatepass)){
					echo $updatepass;
				}
			  ?>
		   <form action="" method="post">
		        <div class="form-group">
				    <label for="old_pass">Old Password </label>
					     <input type="password" name="old_pass" id="old_pass" class="form-control" >
				</div>

				<div class="form-group">
				    <label for="password">New password</label>
					     <input type="password" name="password" id="password" class="form-control">
				</div>
				
				
				<?php
					$sesid = session::get("id");
					if($usrid == $sesid){
				?>
			
				<button type="submit" name="updatepass" class="btn btn-success">Update</button>
 	   
		   </form>
	<?php } ?>
		 </div>
	   </div>
	   </div>
<?php include"inc/footer.php";?>	 