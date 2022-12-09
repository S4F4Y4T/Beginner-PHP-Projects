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
							$to = mysqli_real_escape_string($db->link,$_POST['to']);
							$from = mysqli_real_escape_string($db->link,$_POST['from']);
							$subject = mysqli_real_escape_string($db->link,$_POST['subject']);
							$message = mysqli_real_escape_string($db->link,$_POST['message']);
							
							if(!filter_var($from,FILTER_VALIDATE_EMAIL)){
								echo"Email Not Valid";
							}else{
							$sendmail = mail($to,$subject,$message,$from);
							if($sendmail){
								echo "Message Sent Successfully";
							}
							}
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
                                <label>TO</label>
                            </td>
                            <td>
                                <input type="text" name="to" readonly value="<?php echo $value['email'];?>" class="medium" />
                            </td>
                        </tr>
						
						<tr>
                            <td>
                                <label>From</label>
                            </td>
                            <td>
                                <input type="text" name="from" placeholder="Enter Your Mail" class="medium" />
                            </td>
                        </tr>
                     <tr>
                            <td>
                                <label>Subject</label>
                            </td>
                            <td>
                                <input type="text" name="subject" placeholder="Enter Your Subject" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Body</label>
                            </td>
                            <td>
                                <textarea name="message" placeholder="Enter Your Message" class="tinymce"></textarea>
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
