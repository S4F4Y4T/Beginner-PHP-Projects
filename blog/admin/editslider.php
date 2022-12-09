<?php include"inc/header.php"; ?>
<?php include"inc/sidebar.php"; ?> 
<?php if(isset($_GET['sliderid'])){
			$id = $_GET['sliderid'];
		}?>
		
	

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Post</h2>
                <div class="block"> 
				
				<?php
					if($_SERVER['REQUEST_METHOD'] == 'POST'){
						$title = mysqli_real_escape_string($db->link,$_POST['title']);
						
						$file_name  = $_FILES['image']['name'];
						$file_size  = $_FILES['image']['size'];
						$file_temp  = $_FILES['image']['tmp_name'];
						
						$div = explode('.', $file_name);
						$file_ext = strtolower(end($div));
						$unique = substr(md5(time()), 0, 10).'.'.$file_ext;
						$upload = "upload/".$unique;
						
						if(!empty($file_name)){
						
						move_uploaded_file($file_temp,$upload);
						
						$query = "update tbl_slider
								  set
								  title = '$title',
								  image = '$upload'
								  where id = '$id'";
						$update = $db->update($query);
						if($update){
							echo"Data Update Successfully";
						}else{
							echo"there was a problem";
						} }else{
							$query = "update tbl_slider
								  set
								  title = '$title'
								  where id = '$id'";
						$update = $db->update($query);
						if($update){
							echo"Data update Successfully";
						}else{
							echo"there was a problem";
						}
						}
						
						
					}
				?>
				<?php
					$query = "select * from tbl_slider where id='$id'";
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
                                <label>Upload Image</label>
                            </td>
                            <td>
								<img src="<?php echo $svalue['image'];?>" height="80px" width="200px"><br>
                                <input type="file" name="image" />
                            </td>
                        </tr>
						<tr>
                            <td></td>
							
                            <td>
                                <input type="submit" name="submit" Value="save" />
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
