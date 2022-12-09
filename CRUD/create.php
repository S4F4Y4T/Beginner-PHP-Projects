<?php include "inc/header.php";
      include "define.php";
	  include "database.php";
 ?>
 
 <?php
    $db = new database();
    if(isset($_POST['submit'])){
		$name   = mysqli_real_escape_string($db->link, $_POST['name']);
		$email  = mysqli_real_escape_string($db->link, $_POST['email']);
		$skill  = mysqli_real_escape_string($db->link, $_POST['skill']);
		if($name == '' || $email == '' || $skill == ''){
			$error = "Field Must Not Be Empty";
		} else {
		$query  = "INSERT INTO tbl_user(name, email, skill) values('$name', '$email', '$skill')";
		$insert = $db->insert($query);
		}
	}
 
 ?>
 <?PHP if(isset($error)){
	 echo "<span style='color:red'>".$error."</span>";
 }?>
 
	<form action="" method="post">
	<table>
	   <tr>
		  <td>Name:</td>
		  <td><input type="text" name="name" placeholder="Inter Your name"></td>
	   </tr>
	   <tr>
		  <td>Email:</td>
		  <td><input type="text" name="email" placeholder="Inter Your email"></td>
	   </tr>
	   <tr>
		  <td>Skill</td>
		  <td><input type="text" name="skill" placeholder="Inter Your Skill"></td>
	   </tr>
	   <tr>
		  <td></td>
		  <td>
		  <input type="submit" name="submit" value="Submit">
		  <input type="reset" value="clean">
		  </td>
	   </tr> 
	</table>
	</form> 
  <a href="index.php">GO BACK</a>
<?php include "inc/footer.php"; ?>	