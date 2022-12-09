<?php include"inc/header.php"; ?>
<?php include"inc/sidebar.php"; ?> 
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Copyright Text</h2>
                <div class="block copyblock"> 
				<?php 
					if($_SERVER['REQUEST_METHOD'] == 'POST'){
						$copy = mysqli_real_escape_string($db->link,$_POST['copyright']);
						
						$squery = "update tbl_copy set
								   copy = '$copy' where id = '1'";
						$sresult = $db->update($squery);
						if($sresult){
							echo "data updated successfully";
						}else{
							echo "there was a problem";
						}
					}
				?>
				<?php 
					$query = "select * from tbl_copy where id = '1'";
					$result = $db->select($query);
					if($result){
						while($value = $result->fetch_assoc()){
				?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $value['copy'];?>" name="copyright" class="large" />
                            </td>
                        </tr>
						
						 <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
					<?php } }?>
                </div>
            </div>
        </div>
        <?php include"inc/footer.php"; ?> 
