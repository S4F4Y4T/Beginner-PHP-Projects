<?php include"inc/header.php"; ?>
<?php include"inc/sidebar.php"; ?> 

<?php if(isset($_GET['editid'])){
			$id = $_GET['editid'];
		}?>
		
	

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Edit Post</h2>
                <div class="block"> 
				
				<?php
					if($_SERVER['REQUEST_METHOD'] == 'POST'){
						$title = mysqli_real_escape_string($db->link,$_POST['title']);
						$category = mysqli_real_escape_string($db->link,$_POST['category']);
						$body = mysqli_real_escape_string($db->link,$_POST['body']);
						$tag = mysqli_real_escape_string($db->link,$_POST['tag']);
						$author = mysqli_real_escape_string($db->link,$_POST['author']);
						$user = mysqli_real_escape_string($db->link,$_POST['user']);
						
						$file_name  = $_FILES['image']['name'];
						$file_size  = $_FILES['image']['size'];
						$file_temp  = $_FILES['image']['tmp_name'];
						
						$div = explode('.', $file_name);
						$file_ext = strtolower(end($div));
						$unique = substr(md5(time()), 0, 10).'.'.$file_ext;
						$upload = "upload/".$unique;
						
						if(!empty($file_name)){
						
						move_uploaded_file($file_temp,$upload);
						
						$query = "update tbl_post
								  set
								  cat = '$category',
								  title = '$title',
								  body  = '$body',
								  image = '$upload',
								  author = '$author',
								  tags = '$tag',
								  UserId = '$user'
								  where id = '$id'";
						$update = $db->update($query);
						if($update){
							echo"Data update Successfully";
						}else{
							echo"there was a problem";
						} }else{
							$query = "update tbl_post
								  set
								  cat = '$category',
								  title = '$title',
								  body  = '$body',
								  author = '$author',
								  tags = '$tag',
								  UserId = '$user'
								  where id = '$id'";
						$insert = $db->insert($query);
						if($insert){
							echo"Data Inserted Successfully";
						}else{
							echo"there was a problem";
						}
						}
						
						
					}
				?>
				<?php
					$query = "select * from tbl_post where id='$id'";
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
                                <label>Category</label>
                            </td>
                            <td>
							<select id="select" name="category">
								    <option>Select Category</option>
							<?php $query = "select * from tbl_cat";
								  $result = $db->select($query);
								  if($result){
									  while($value = $result->fetch_assoc()){
							?>
                                    <option <?php if($value['id'] == $svalue['cat']){?> selected="selected" <?php } ?> value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option>
								  <?php } } ?>
								   </select>
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
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea name="body" class="tinymce">
									<?php echo $svalue['body'];?>
								</textarea>
                            </td>
                        </tr>
						<tr>
						<tr>
                            <td>
                                <label>Tags</label>
                            </td>
                            <td>
                                <input type="text" name="tag" value="<?php echo $svalue['tags'];?>" class="medium" />
                            </td>
                        </tr>
						<tr>
                            <td>
                                <label>Author</label>
                            </td>
                            <td>
                                <input type="text" name="author" value="<?php echo $svalue['author'];?>" class="medium" />
                            </td>
							<td>
                                <input type="hidden" name="user" value="<?php echo session::get('userid') ;?>" class="medium" />
                            </td>
                        </tr>
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
