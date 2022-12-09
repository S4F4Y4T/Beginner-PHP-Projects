<?php include"inc/header.php";?>
	<?php
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$name = $_POST['name'];
			$roll = $_POST['roll'];
			
			$insertdata = $stu->insertstu($name,$roll);
	}?>
	<?php if(isset($insertdata)){
			echo $insertdata;
	}?>
	
	<div class="panel panel-default">
	<div class="panel-heading">
		<h2>
			<a href="addstudent.php" class="btn btn-success">Add Student</a>
			<a href="index.php" class="btn btn-info pull-right">Back</a>
		</h2>
	</div>
	<div class="panel-body">
		<form action="" method="POST">
			<div class="form-group">
				<label for="name">Name</label>
				<input class="form-control medium" name="name" style="width: 480px;height: 45px;" type="text">
			</div>
			<div class="form-group">
				<label for="roll">Roll</label>
				<input class="form-control medium" name="roll" style="width: 480px;height: 45px;" type="text">
			</div>
			<div class="form-group">
				<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
			</div>
		</form>
	</div>
</div>
<?php include"inc/footer.php";?>	
