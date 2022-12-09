<?php include"inc/header.php"; ?>
<?php include"inc/sidebar.php"; ?> 
<?php if(isset($_GET['pageid'])){
		$pageid = $_GET['pageid'];
}?>
<style>
.delete a {
	border: 1px solid #ddd;
	color: #444;
	font-size: 20px;
	padding: 2px 10px;
	background: #dddddd;
	text-decoration: none;
}

</style>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Page</h2>
                <div class="block"> 
				<?php if($_SERVER['REQUEST_METHOD']  == 'POST'){
					$name = mysqli_real_escape_string($db->link,$_POST['name']);
					$body = mysqli_real_escape_string($db->link,$_POST['body']);
					
					$query = "update tbl_page set
							  name = '$name',
							  body =  '$body'
							  where id = '$pageid'";
					$result = $db->update($query);
					if($result){
						echo"data updated successfully";
					}
				}?>
				
				<?php
					$query = "select * from tbl_page where id='$pageid'";
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
                                <input type="text" name="name" value="<?php echo $value['name'];?>" class="medium" />
                            </td>
                        </tr>
                     

                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Body</label>
                            </td>
                            <td>
                                <textarea name="body" class="tinymce">
								<?php echo $value['body'];?>
								</textarea>
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
						<span class="delete"><a href="delpage.php?delid=<?php echo $value['id'];?>">Delete</span>
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
