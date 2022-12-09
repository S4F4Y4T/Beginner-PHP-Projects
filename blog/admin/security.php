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
				$security = $fm->validation($_POST['security']);
				
				$security = mysqli_real_escape_string($db->link,$security);
				
				$query = "select * from tbl_user where recovery ='$security'";
				$result = $db->select($query);
				if($result != false){
					while($value = $result->fetch_assoc()){
					session::init();
			        session::set("login", true);
					session::set("user", $value['user']);
					session::set("userid",$value['id']);
					session::set("userrole",$value['role']);
					header("Location: changepass.php");
					
				 }}else{
					echo "Security Key Is Not Valid";
				
				} 
				}
			 
		?>
	
	
		<form action="" method="post">
			<h1>Security Code</h1>
			<?php ?>
			<div>
				<input type="text" placeholder="Enter Your Recovery Key" name="security"/>
			</div>
			
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		
		<div class="button">
			<a href="#">Safayat</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>
