<?php include"inc/header.php"; ?>
<?php include"inc/sidebar.php"; ?> 
        <div class="grid_10">
		 <?php
		 if(isset($_GET['viewid'])){
			 $viewid = $_GET['viewid'];
		 } ?>
            <div class="box round first grid">
                <h2>Add New Post</h2>
                <div class="block"> 
				<?php 
				    if($_SERVER['REQUEST_METHOD'] == 'POST'){
					echo"<script>window.location='userlist.php';</script>";
				}?>
				
				<?php
					$query = "select * from tbl_user where id='$viewid' ";
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
                                <input type="text" readonly value="<?php echo $value['user']; ?>" class="medium" />
                            </td>
                        </tr>
						<tr> 
						
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Ok" />
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
