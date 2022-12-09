<?php include"inc/header.php"; ?>
<?php include"inc/sidebar.php"; ?> 
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add Slider</h2>
                <div class="block"> 
				
				<?php if($_SERVER['REQUEST_METHOD'] == 'POST'){
					$title = $_POST['title'];
					$title = mysqli_real_escape_string($db->link,$title);
					
					$file_name = $_FILES['image']['name'];
					$tmp_name = $_FILES['image']['tmp_name'];
					
					$div = explode('.',$file_name);
					$file_ext = strtolower(end($div));
					$unique_name = substr(md5(time()),0,10).'.'.$file_ext;
					$upload = "upload/".$unique_name;
					
					move_uploaded_file($tmp_name,$upload);
					
					$query = "insert into tbl_slider(title,image) values('$title','$upload')";
					$result = $db->insert($query);
					if($result){
						echo"Data Inserted Successfully";
					}else{
						echo"There Was A Problem";
					}
				}?>
				

				
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
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <input type="file" name="image" />
                            </td>
                        </tr>
                        
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
