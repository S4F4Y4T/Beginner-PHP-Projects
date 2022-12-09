<?php include"inc/header.php"; ?>
<?php include"inc/sidebar.php"; ?> 
        <div class="grid_10">
		<?php if(isset($_GET['viewid'])){
			$id = $_GET['viewid'];
		}?>
            <div class="box round first grid">
                <h2>View Post</h2>
                <div class="block"> 
				<?php
					if($_SERVER['REQUEST_METHOD'] == 'POST'){
							echo "<script>window.location='postlist.php';</script>";
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
                                <input type="text" readonly name="title" value="<?php echo $svalue['title'];?>" class="medium" />
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
								<img src="upload/<?php echo $svalue['image'];?>" height="80px" width="200px"><br>
                            
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea readonly name="body" class="tinymce">
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
                                <input type="text" readonly name="tag" value="<?php echo $svalue['tags'];?>" class="medium" />
                            </td>
                        </tr>
						<tr>
                            <td>
                                <label>Author</label>
                            </td>
                            <td>
                                <input type="text" readonly name="author" value="<?php echo $svalue['author'];?>" class="medium" />
                            </td>
							
                        </tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Ok" />
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
