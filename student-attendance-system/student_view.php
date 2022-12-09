<?php include"inc/header.php"; ?>
<?php
	$dt = $_GET['dt'];
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$attend = $_POST['attend'];
		$updateattend = $stu->updateattend($dt,$attend);
	}
?>


<div class="panel panel-default">
	<div class="panel-heading">
		<h2>
			<a href="addstudent.php" class="btn btn-success">Add Student</a>
			<a href="viewstudent.php" class="btn btn-info pull-right">Back</a>
		</h2>
	</div>
	<div class="well text-center">
		<h3><strong>Date:</strong> <?php echo $dt;?></h3>
	</div>
	<div class="panel-body">
		<form action="" method="post">
			<table class="table table-striped">
				<tr>
					<th width="25%">Serial No.</th>
					<th width="25%">Student Name</th>
					<th width="25%">Student Roll</th>
					<th width="25%">Attendance</th>
				</tr>
				<?php
					$get_attend = $stu->getattend($dt);
					if($get_attend){
					$i = 0;
						while($value = $get_attend->fetch_assoc()){
					$i++;
				?>
				<tr>
					<td><?php echo $i;?></td>
					<td><?php echo $value['name'];?></td>
					<td><?php echo $value['roll'];?></td>
					<td><input type="radio" name="attend[<?php echo $value['roll']; ?>]" value="present" <?php if($value['attend'] == 'present'){echo "checked";}?>>P
					<input type="radio" name="attend[<?php echo $value['roll']; ?>]" value="absent"<?php if($value['attend'] == 'absent'){echo "checked";}?>>A</td>
				</tr>
				<?php } } ?>
				<tr>
					<td colspan="4">
					<input class="btn btn-primary" type="submit" name="submit" value="submit"> 
					</td>
				</tr>
		</table>
	</form>
	</div>
</div>
<?php include"inc/footer.php";?>		