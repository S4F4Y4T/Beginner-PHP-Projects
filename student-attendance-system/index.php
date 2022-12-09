<?php include"inc/header.php"; ?>
<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$attend = $_POST['attend'];
		$curr_date = date('Y-m-d');
		$insertattendance = $stu->insertattendance($curr_date,$attend);
	}
?>


<div class="panel panel-default">
	<div class="panel-heading">
		<h2>
			<a href="addstudent.php" class="btn btn-success">Add Student</a>
			<a href="viewstudent.php" class="btn btn-info pull-right">View</a>
		</h2>
	</div>
	<div class="well text-center">
		<h3><strong>Date:</strong> <?php echo $curr_date;?></h3>
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
					$get_student = $stu->getstudent();
					if($get_student){
					$i = 0;
						while($value = $get_student->fetch_assoc()){
					$i++;
				?>
				<tr>
					<td><?php echo $i;?></td>
					<td><?php echo $value['name'];?></td>
					<td><?php echo $value['roll'];?></td>
					<td><input type="radio" name="attend[<?php echo $value['roll']; ?>]" value="present">P
					<input type="radio" name="attend[<?php echo $value['roll']; ?>]" value="absent">A</td>
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