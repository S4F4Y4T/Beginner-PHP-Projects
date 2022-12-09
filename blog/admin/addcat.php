<?php include"inc/header.php";
	  include"inc/sidebar.php";
?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
			   
			    <?php
					if($_SERVER['REQUEST_METHOD'] == 'POST'){
						$name = $_POST['name'];
						$name = mysqli_real_escape_string($db->link,$name);
						
						if(empty($name)){
							echo"Field Must Not Be Empty";
						}else{
							$query = "insert into tbl_cat(name) values('$name')";
							$result = $db->insert($query);
							if($result){
								echo"Category Added SuccessFully";
							}else{
								echo"There Was Problem";
							}
						}
					}
				?>
			   
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="name" placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
        <?php include"inc/footer.php";?>
