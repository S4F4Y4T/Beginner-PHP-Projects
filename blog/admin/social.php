<?php include"inc/header.php"; ?>
<?php include"inc/sidebar.php"; ?> 
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Social Media</h2>
                <div class="block"> 
					<?php
						if($_SERVER['REQUEST_METHOD'] == 'POST'){
							$facebook = mysqli_real_escape_string($db->link,$_POST['facebook']);
							$linkdin = mysqli_real_escape_string($db->link,$_POST['linkdin']);
							$google = mysqli_real_escape_string($db->link,$_POST['google']);
							$twitter = mysqli_real_escape_string($db->link,$_POST['twitter']);

							$query = "update tbl_social set
									  facebook = '$facebook',
									  linkdin  = '$linkdin',
									  google   =  '$google',
									  twitter  = '$twitter'
									  where id='1'";
							$sresult = $db->update($query);
							if($sresult){
								echo"data updated successfully";
							}else{
								echo"there was a problem";
							}

						}
					?>
					<?php
						$query = "select * from tbl_social where id = '1'";
						$result = $db->select($query);
						if($result){
							while($value = $result->fetch_assoc()){
					?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Facebook</label>
                            </td>
                            <td>
                                <input type="text" name="facebook" value="<?php echo $value['facebook'];?>" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Twitter</label>
                            </td>
                            <td>
                                <input type="text" name="linkdin" value="<?php echo $value['linkdin'];?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>LinkedIn</label>
                            </td>
                            <td>
                                <input type="text" name="google" value="<?php echo $value['google'];?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>Google Plus</label>
                            </td>
                            <td>
                                <input type="text" name="twitter" value="<?php echo $value['twitter'];?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td></td>
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