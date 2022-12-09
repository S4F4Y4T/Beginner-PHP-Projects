<?php include"inc/header.php"; ?>
<?php include"inc/sidebar.php"; ?> 
        <div class="grid_10">
	<?php if(isset($_GET['msgid'])){
			$msgid = $_GET['msgid'];
	}?>	
            <div class="box round first grid">
                <h2>View Message</h2>
                <div class="block"> 
				
				<?php
					if($_SERVER['REQUEST_METHOD'] == 'POST'){
							echo "<script>window.location='inbox.php';</script>";
						}
				?>
				<?php $query = "select * from tbl_contact where id = '$msgid'";
					  $result = $db->select($query);
					  if($result){
						  while($value = $result->fetch_assoc()){
				
				?>
				
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" readonly value="<?php echo $value['name'];?>" class="medium" />
                            </td>
                        </tr>
						
						<tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="text" readonly value="<?php echo $value['email'];?>" class="medium" />
                            </td>
                        </tr>
                     

                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Body</label>
                            </td>
                            <td>
                                <textarea name="body" readonly class="tinymce"><?php echo $value['message'];?></textarea>
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="OK" />
                            </td>
                        </tr>
                    </table>
                    </form>
					  <?php } }?>
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
