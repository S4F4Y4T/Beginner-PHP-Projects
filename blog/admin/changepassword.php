<?php include"inc/header.php"; ?>
<?php include"inc/sidebar.php"; ?> 
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Change Password</h2>
                <div class="block"> 
				<?php $id = session::get("userid");?>
					<?php 
						if($_SERVER['REQUEST_METHOD'] == 'POST'){
						$old = $_POST['old'];
						$new = $_POST['new'];
						
						$old = mysqli_real_escape_string($db->link,$old);
						$new = mysqli_real_escape_string($db->link,$new);
						
						$selectquery = "select pass from tbl_user where pass = '$old'and id ='$id'";
						$selectresult = $db->select($selectquery);
						if($selectresult){
							while($selectvalue = $selectresult->fetch_assoc()){
							$newquery = "update tbl_user set
										 pass = '$new'
										 where id = '$id'";
							$newresult = $db->update($newquery);
							if($newresult){
								echo"Password Updated Successfully";
							}else{
								echo"There was A Problem";
							}
						} }else{echo"Old Password Is Not Correnct";}
					}?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Old Password</label>
                            </td>
                            <td>
                                <input type="password" placeholder="Enter Old Password..."  name="old" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>New Password</label>
                            </td>
                            <td>
                                <input type="password" placeholder="Enter New Password..." name="new" class="medium" />
                            </td>
                        </tr>
						 
						
						 <tr>
                            <td>
                            </td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
       <?php include"inc/footer.php"; ?> 
