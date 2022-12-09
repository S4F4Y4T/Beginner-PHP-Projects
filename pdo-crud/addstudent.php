<?php
    error_reporting(0);
	include"lib/session.php";
	include"inc/header.php";
	include"lib/database.php";
	$db = new database();
?>
<?php
	session::init();
	$msg = session::get('msg');
	if($msg){
		echo "<h2 class='alert alert-info text-center'>".$msg."</h2>";
	}
	session::unsets();
?>
<div class="panel panel-default">
 <div class="panel-heading">
	<h2>Add Student
		<div class="pull-right">
			<a href="index.php" class="btn btn-success">Back</a>
	</h2>
 </div>
 <div class="panel-body">
    <form action="lib/process.php" method="post">
		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" name="name" class="form-control" id="name" />
			<label for="email">Email</label>
			<input type="text" name="email" class="form-control" id="name" />
			<label for="phone">Phone</label>
			<input name="phone" class="form-control" id="phone" style="margin-bottom: 4px;" type="text">
			<input type="hidden" name="action" value="add">
			<input type="submit" name="submit" value="Add Student" class="btn btn-primary">
		</div>
	</form>
 </div>
<?php include"inc/footer.php";?>