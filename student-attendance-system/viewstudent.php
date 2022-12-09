<?php include"inc/header.php"; ?>
<div class="panel panel-default">
	<div class="panel-heading">
		<h2>
			<a href="addstudent.php" class="btn btn-success">Add Student</a>
			<a href="index.php" class="btn btn-info pull-right">Take Attandance</a>
		</h2>
	</div>
	<div class="well text-center">
		<h3><strong>Date:</strong> <?php echo $curr_date;?></h3>
	</div>
	<div class="panel-body">
		<form action="" method="post">
			<table class="table table-striped">
				<tr>
					<th width="30%">Serial No.</th>
					<th width="50%">Date</th>
					<th width="20%">Action</th>
				</tr>
				<?php
					$get_date = $stu->get_date();
					if($get_date){
					$i = 0;
						while($value = $get_date->fetch_assoc()){
					$i++;
				?>
				<tr>
					<td><?php echo $i;?></td>
					<td><?php echo $value['att_time'];?></td>
					<td><a class="btn btn-primary" href="student_view.php?dt=<?php echo $value['att_time'];?>">View</td>
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