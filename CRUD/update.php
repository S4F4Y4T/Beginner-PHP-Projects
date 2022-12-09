<?php include "inc/header.php";
      include "define.php";
	  include "database.php";
 ?>
 
 <?php
    $id    = $_GET['id'];
    $db    = new database();
	$query = "SELECT * FROM tbl_user WHERE id=$id";
	$read  = $db->read($query)->fetch_assoc();
	
    if(isset($_POST['submit'])){
		$name   = mysqli_real_escape_string($db->link, $_POST['name']);
		$email  = mysqli_real_escape_string($db->link, $_POST['email']);
		$skill  = mysqli_real_escape_string($db->link, $_POST['skill']);
		if($name == '' || $email == '' || $skill == ''){
			$error = "Field Must Not Be Empty";
		} else {
		$query  = "UPDATE tbl_user
		SET
		name  = '$name',
		email = '$email',
		skill = '$skill'
		WHERE id=$id;
		";
		$update = $db->update($query);
		}
	}
 
 ?>
 <?php if(isset($_POST['delete'])){
	 $query  = "DELETE FROM tbl_user WHERE id=$id";
	 $delete = $db->delete($query); 
 }?>
 <?PHP if(isset($error)){
	 echo "<span style='color:red'>".$error."</span>";
 }?>
 
	<form action="" method="post">
	<table>
	   <tr>
		  <td>Name:</td>
		  <td><input type="text" name="name" value="<?php echo $read['name']; ?>"></td>
	   </tr>
	   <tr>
		  <td>Email:</td>
		  <td><input type="text" name="email" value="<?php echo $read['email']; ?>"></td>
	   </tr>
	   <tr>
		  <td>Skill</td>
		  <td><input type="text" name="skill" value="<?php echo $read['skill']; ?>"></td>
	   </tr>
	   <tr>
		  <td></td>
		  <td>
		  <input type="submit" name="submit" value="Submit">
		  <input type="reset" value="clean">
		  <input onClick="return confirm('Are You Sure Want To delete')" type="submit" name="delete" value="Delete">
		  </td>
	   </tr> 
	</table>
	</form> 
  <a href="index.php">GO BACK</a>
<?php include "inc/footer.php"; ?>	
<?php include "inc/footer.php"; ?>	