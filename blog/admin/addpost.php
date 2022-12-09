<?php include"inc/header.php"; ?>
<?php include"inc/sidebar.php"; ?> 
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Post</h2>
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
						$upload = $unique;
						
						move_uploaded_file($file_temp,'upload/'.$upload);
						
						$query = "insert into tbl_post(cat,title,body,image,author,tags,UserId) values('$category','$title','$body','$upload','$author','$tag','$user')";
						$insert = $db->insert($query);
						if($insert){
							echo"Data Inserted Successfully";
						}else{
							echo"there was a problem";
						}
						
						
					}
				?>

				
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name="title" placeholder="Enter Post Title..." class="medium" />
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
                                    <option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option>
								  <?php } } ?>
								   </select>
                            </td>
                        </tr>
                   
                    
                      
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <input type="file" name="image" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea name="body" class="tinymce"></textarea>
                            </td>
                        </tr>
						<tr>
						<tr>
                            <td>
                                <label>Tags</label>
                            </td>
                            <td>
                                <input type="text" name="tag" placeholder="Enter Tags..." class="medium" />
                            </td>
                        </tr>
						<tr>
                            <td>
                                <label>Author</label>
                            </td>
                            <td>
                                <input type="text" name="author" placeholder="Enter Author Name..." class="medium" />
                            </td>
							<td>
                                <input type="hidden" name="user" value="1" class="medium" />
                            </td>
                        </tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
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
