<?php include"inc/header.php"?>
<div class="main-cont template">
	
	<?php
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$name = mysqli_real_escape_string($db->link,$_POST['name']);
			$email = mysqli_real_escape_string($db->link,$_POST['email']);
			$message = mysqli_real_escape_string($db->link,$_POST['message']);
			
			if($name == '' || $email == '' || $message == ''){
				echo "field Must Not Be Empty";
			}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				echo"invalid email address";
			}else{
				$query = "insert into tbl_contact(name,email,message) values('$name','$email','$message')";
				$result = $db->insert($query);
				if($result){
					echo"Message Sent";
				}else{
					echo"Ther Was A Problem";
				}
			}
		}
	?>
	
    
    <div class="justify">
		<h2>Contact Us</h2>
    
    <br>
   
	<form action="" method="post">
		<table>
			<tr>
				<td class="td">Name:</td>
				<td ><input type="name" placeholder="Your Name..." name="name"></td>
			</tr>
			<tr>
				<td class="td">Email:</td>
				<td><input type="name" placeholder="Your Email..." name="email"></td>
			</tr>
			<tr>
				<td class="td">Message:</td>
				<td><input type="name" class="message" name="message"><text</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit" value="Sent"></td>
			</tr>
		</table>
    </form>
	<br>
    </div>
		

 </div>

<?php include"inc/side.php"?>									
<?php include"inc/footer.php"?>	

