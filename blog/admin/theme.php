<?php include"inc/header.php";
	  include"inc/sidebar.php";
?>

<?php if(isset($_GET['catid'])){
		$catid = $_GET['catid'];
}?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Theme</h2>
               <div class="block copyblock"> 
			   
			    <?php
					if($_SERVER['REQUEST_METHOD'] == 'POST'){
						$theme = $_POST['theme'];
						$theme = mysqli_real_escape_string($db->link,$theme);
						
						
						$query = "update tbl_theme
									  set
									  theme = '$theme'
									  where id = '1'";
							$result = $db->update($query);
							if($result){
								echo"Theme updated SuccessFully";
							}else{
								echo"Theme Was Problem";
							}
					}
				?>
				<?php
					$query = "select * from tbl_theme where id = '1'";
					$result = $db->select($query);
					if($result){
						while($value = $result->fetch_assoc()){
					
				?>
			   
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                               <input <?php if($value['theme'] == "default"){ echo"checked";}?> type="radio" name="theme" value="default" />default
                            </td>
                        </tr>
						<tr>
                            <td>
                                <input <?php if($value['theme'] == "green"){ echo"checked";}?> type="radio" name="theme" value="green" />Green
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Change" />
                            </td>
                        </tr>
                    </table>
                    </form>
					<?php } } ?>
                </div>
            </div>
        </div>
        <?php include"inc/footer.php";?>
