<?php include"inc/header.php";
	  include"inc/sidebar.php";
?>
<?php if(!session::get('userrole')=='0'){?>
		<script>window.location="userlist.php";</script>
<?php } ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
			   
			    <?php
					if($_SERVER['REQUEST_METHOD'] == 'POST'){
						$username = $_POST['username'];
						$password = $_POST['password'];
						$email = $_POST['email'];
						$role = $_POST['role'];
					
						
						
						$username = mysqli_real_escape_string($db->link,$username);
						$password = mysqli_real_escape_string($db->link,$password);
						$email = mysqli_real_escape_string($db->link,$email);
					
						if($username == '' || $password == '' || $email == ''){
							echo"Field Must Not Be Empty";
						}elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
							echo"Email Is Not valid";
						}else{
							$mailquery = "select email from tbl_user where email = '$email'";
						    $mailcheck = $db->select($mailquery);
							if($mailcheck){
								echo"Email Already Exist";
							}else{
							$query = "insert into tbl_user(user,pass,email,role) values('$username','$password','$email','$role')";
							$result = $db->insert($query); 
							if($result){
								echo"User Added SuccessFully";
							}else{
								echo"There Was Problem";
							}
							}
						
						}
					}
				?>
			   
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
							<td>
                                <label>User Name</label>
                            </td>
                            <td>
                                <input type="text" name="username" placeholder="Enter User Name..." class="medium" />
                            </td>
                        </tr>
						<tr>
							<td>
                                <label>User Password</label>
                            </td>
                            <td>
                                <input type="text" name="password" placeholder="Enter User password..." class="medium" />
                            </td>
                        </tr>
						<tr>
							<td>
                                <label>User Email</label>
                            </td>
                            <td>
                                <input type="text" name="email" placeholder="Enter User email..." class="medium" />
                            </td>
                        </tr>
						<tr>
							<td>
                                <label>User Role</label>
                            </td>
                            <td>
                                <select name="role">
								<option>User Role</option>
								<option value="0">Admin</option>
								<option value="0">Author</option>
								<option value="0">Editor</option>
								<option value="0">User</option>
                            </td>
                        </tr>
						
						<tr> <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
        <?php include"inc/footer.php";?>
