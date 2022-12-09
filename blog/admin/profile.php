<?php include"inc/header.php"; ?>
<?php include"inc/sidebar.php"; ?> 
        <div class="grid_10">
		 <?php
		 $id = session::get('userid');
		 $role = session::get('userrole'); ?>
            <div class="box round first grid">
                <h2>Update Profile</h2>
                <div class="block"> 
				<?php 
				    if($_SERVER['REQUEST_METHOD'] == 'POST'){
					$username = $_POST['username'];
					$password = $_POST['password'];
					$username = mysqli_real_escape_string($db->link,$username);
					$password = mysqli_real_escape_string($db->link,$password);
					
					
					$query = "update tbl_user set
							  user ='$username',
							  pass ='$password'
							  where id='$id' and role='$role'";
					$result = $db->update($query);
					if($result){
						echo"Data Updated SuccessFully";
					}else{
						echo"There Was A Problem";
					}
				}?>
				
				<?php
					$query = "select * from tbl_user where id='$id' and role='$role'";
					$result = $db->select($query);
					if($result){
						while($value = $result->fetch_assoc()){
				?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
						<td>
                                <label>User Name:</label>
                            </td>
                            <td>
                                <input type="text" name="username" value="<?php echo $value['user']; ?>" class="medium" />
                            </td>
                        </tr>
						<tr> 
						<tr><td>
                                <label>Password:</label>
                            </td>
                            <td>
                                <input type="text" name="password" value="<?php echo $value['pass']; ?>" class="medium" />
                            </td>
                        </tr>
						<tr> <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
					<?php } } ?>
                </div>
            </div>
        </div>
       <?php include"inc/footer.php"; ?> 
	   
	   <!-- Load TinyMCE -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
