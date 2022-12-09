<?php include 'inc/header.php';
      include 'lib/user.php';
	  session::chksession();
?>
<?php
$loginmsg = session::get("loginmsg");
if(isset($loginmsg)){
	echo $loginmsg;
}
session::set("loginmsg", NULL);
?>
		
		 <div class="panel panel-default">
		 <div class="panel-heading">
		 <h2>User List <span class="pull-right">Welcome<strong> 
			<?php 
				$username = session::get("username");
				if(isset($username)){
					echo $username;
				}
			?>
		 </strong></h2></span>
		 </div>
		 <div class="panel-body">
		 <table class="table table-striped">
		    <tr>
			   <th>Serial</th>
			   <th>Name</th>
			   <th>Username</th>
			   <th>Email</th>
			   <th>action</th>
			</tr>
			<?php
				$user 		= new user();
				$userdata 	= $user->getuser();
				if($userdata){
					$i = 0;
					foreach($userdata as $data){
					$i++;
			?>
			<tr>
			  <td><?php echo $i; ?></td>
			  <td><?php echo $data['name']; ?></td>
			  <td><?php echo $data['username']; ?></td>
			  <td><?php echo $data['email']; ?></td>
			  <td><a class="btn btn-primary" href="profile.php?id=<?php echo $data['id']; ?>">view</a></td>
			</tr>
				<?php } } else { ?>
				<tr><td colspan="5"><h2>No Data FOund</h2></td></tr>
				<?php }?>
		</table>
		 </div>
		 </div>
	  
<?php include"inc/footer.php";?>	 