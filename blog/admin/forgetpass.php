<?php include "../lib/session.php";
	  session::init();
?>
<?php include "../lib/database.php";
      include "../lib/config.php";
	  include "../lib/helper.php"
  ?>
<?php
	$db = new database();
	$fm = new helper();
?>


<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
	
		<?php
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$email = $fm->validation($_POST['email']);
				
				$email = mysqli_real_escape_string($db->link,$email);
				
				
				
				$query = "select * from tbl_user where email = '$email' limit 1";
				$result = $db->select($query);
				if($result != false){
					 while($value = $result->fetch_assoc()){
						$userid = $value['id'];
						$user = $value['user'];
					}
					$text = substr($email,0,3);
					$rand = rand(22222,3333);
					$digit = "$text$rand";
					
					$update = "update tbl_user set
							   recovery = '$digit'
							   where id = '$userid'";
					$updt = $db->update($update);
					if($updt){
						$to = "$email";
						$from = "safayat@gmail.com";
						$header = "From: $from\n";
						$headers .= 'MIME-Version: 1.0' . "\r\n";
						$headers .= 'Content-type: text\html; charset=iso-8859-1' . "\r\n";
						$subjects = "Your password";
						$message = "Your Recovery Digit Is.$digit.Submit It To Change Your Password";
						$mail = mail($to,$subjects,$message,$headers);
						header("Location:security.php");
					}
				} 
			}
				
			 
		?>
	
	
		<form action="" method="post">
			<h1>Password Recovery</h1>
			<?php ?>
			<div>
				<input type="text" placeholder="Enter Your Email" required="" name="email"/>
			</div>
			
			<div>
				<input type="submit" value="Send" />
			</div>
		</form><!-- form -->
		
		<div class="button">
			<a href="login.php">Login</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>