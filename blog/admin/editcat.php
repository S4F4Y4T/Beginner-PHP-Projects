<?php include"inc/header.php";
	  include"inc/sidebar.php";
?>

<?php if(isset($_GET['catid'])){
		$catid = $_GET['catid'];
}?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Category</h2>
               <div class="block copyblock"> 
			   
			    <?php
					if($_SERVER['REQUEST_METHOD'] == 'POST'){
						$name = $_POST['name'];
						$name = mysqli_real_escape_string($db->link,$name);
						
						if(empty($name)){
							echo"Field Must Not Be Empty";
						}else{
							$query = "update tbl_cat
									  set
									  name = '$name'
									  where id = '$catid'";
							$result = $db->update($query);
							if($result){
								echo"Category updated SuccessFully";
							}else{
								echo"There Was Problem";
							}
						}
					}
				?>
				<?php
					$query = "select * from tbl_cat where id = '$catid'";
					$result = $db->select($query);
					if($result){
						while($value = $result->fetch_assoc()){
					
				?>
			   
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="name" value="<?php echo $value['name']; ?>" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
					<?php } } ?>
                </div>
            </div>
        </div>
        <?php include"inc/footer.php";?>
