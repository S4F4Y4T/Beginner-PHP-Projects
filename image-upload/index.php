<!doctype html>
<html>
	<head>
		<title>upload image file</title>
		<style>
		    *{margin:0}
		    body{font-family:verdana;}
			.upload{margin:0 auto; background:#ddd; width:900px}
			.header, .footer{padding:5px;height:80px;background:#444; color:#fff; text-align:center;display:block;margin:20;}
			.header h2, .footer h2{font-size:16; margin-top:20px;}
			.main{padding:20px;min-height:500px; font-size:16px;padding:20px;}
			.myform{width:500px;text-align:center; margin:0 auto; padding:20px; border:1px solid #444; display:block;}
			input[type="submit"],input[type="file"]{cursor:pointer;}
			.success{color:green; margin:10px; weight:bold;}
			.error{color:red; margin:10px; weight:bold;}
		</style>
	</head>
	<body>
		<div class="upload">
			<section class="header">
			<h2>uploading image file with php</h2>
			</section>
			<section class="main">
			
<?php
include 'lib/config.php';
include 'lib/database.php';
	
	$db = new database();
?>	
			
			
				<div class="myform">
				 <?php
					if($_SERVER["REQUEST_METHOD"] == "POST"){
						$permited  = array('JPG','jpg','jpeg','png','gif');
					    $file_name = $_FILES['image']['name'];
						$file_size = $_FILES['image']['size'];
						$file_tmp  = $_FILES['image']['tmp_name'];
						$div 		    = explode('.',$file_name);
						$file_ext       = strtolower(end($div)); 
						echo $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
						$uploaded_image = "upload/".$unique_image;
						if(empty($file_name)){
							echo "<span class='error'>please select an image</span>";
						}elseif(in_array($file_ext, $permited) === false){
							echo "<span class='error'>You Can Upload Only".implode(',' , $permited)."</span>";
						}else{
						$move = move_uploaded_file($file_tmp, $uploaded_image);
						$query  = "INSERT INTO img_upld(image) VALUES('$uploaded_image')";
						$insertdata= $db->insert($query);
						if($move){
							echo "<span class='success'>image upload succesfully</span>";
						}else{
							echo "<span class='error'>image not uploaded</span>";
						}
						}
					}
				 ?>
					<form action="" method="post" enctype="multipart/form-data">
						<table>
							<tr>
								<td>select Image</td>
								<td><input type="file" name="image"></td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" name="submit" value="upload"></td>
							</tr>
						</table>
					</form>
						 <table width="100%">
							<tr>
								<th width ="30%">serial</th>
								<th width ="30%">Images</th>
								<th width ="30%">Action</th>
							</tr>
							<?php
								if(isset($_GET['del'])){
									$id = $_GET['del'];
									
									$getquery = "select * from img_upld where id = '$id'";
									$delimg   = $db->select($getquery);
									if($delimg){
										while($row = $delimg->fetch_assoc()){
											$getimg = $row['image'];
											unlink($getimg);
										}
									}
									
									$query  = "delete from img_upld where id = '$id'";
									$delimg = $db->delete($query); 
									if($delimg){
									echo "<span class='success'>image Deleted succesfully</span>";
						}else{
							echo "<span class='error'>image not Deleted</span>";
						}	
									}
							
								
							?>
							<?php
						$query  = "select * from img_upld";
						$getimage  = $db->select($query);
						if($getimage){
							 $i = 0;
							while($result = $getimage->fetch_assoc()){
								$i++;
							
						 ?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><img src="<?php echo $result['image'];?>" height="80px" width="100px"></td>
								<td><a href=?del=<?php echo $result['id']; ?>>Delete</a></td>
							</tr>
							<?php } } ?>
						 </table>
				</div>
			</section>
			<section class="footer">
				<h2>&copy 2017 all reserve by S4F4Y4T</h2>
			</section>
		</div>
	</body>
</html>