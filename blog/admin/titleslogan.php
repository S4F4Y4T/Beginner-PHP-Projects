<?php include"inc/header.php"; ?>
<?php include"inc/sidebar.php"; ?> 
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add Site Title</h2>
                <div class="block"> 
				
				<?php
					if($_SERVER['REQUEST_METHOD'] == 'POST'){
						$title = mysqli_real_escape_string($db->link,$_POST['title']);
						$slogan = mysqli_real_escape_string($db->link,$_POST['slogan']);
						
						
						$file_name  = $_FILES['image']['name'];
						$file_size  = $_FILES['image']['size'];
						$file_temp  = $_FILES['image']['tmp_name'];

                        $div = explode('.', $file_name);
                        $file_ext = strtolower(end($div));
                        $unique = substr(md5(time()), 0, 10).'.'.$file_ext;
                        $upload = $unique;

                        if(!empty($file_name)){
						
						move_uploaded_file($file_temp,'upload/'.$upload);
						
						$query = "update tbl_title
								  set
								  title = '$title',
								  slogan  = '$slogan',
								  logo = '$upload'
								  where id = '1'";
						$update = $db->update($query);
						if($update){
							echo"Data update Successfully";
						}else{
							echo"there was a problem";
						} }else{
							$query = "update tbl_title
								  set
								  title = '$title',
								  slogan  = '$slogan'
								  where id = '1'";
						$update = $db->update($query);
						if($update){
							echo"Data updated Successfully";
						}else{
							echo"there was a problem";
						}
						}
						
						
					}
				?>
				<?php
					$query = "select * from tbl_title where id='1'";
					$result = $db->select($query);
					if($result){
						while($svalue = $result->fetch_assoc()){
				?>
				
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name="title" value="<?php echo $svalue['title'];?>" class="medium" />
                            </td>
                        </tr>
						<tr>
                            <td>
                                <label>slogan</label>
                            </td>
                            <td>
                                <input type="text" name="slogan" value="<?php echo $svalue['slogan'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Upload Logo</label>
                            </td>
                            <td>
								<img src="upload/<?php echo $svalue['logo'];?>" height="80px" width="200px"><br>
                                <input type="file" name="image" />
                            </td>
                        </tr>
						
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
					<?php }} ?>
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
