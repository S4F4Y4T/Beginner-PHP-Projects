<?php 

include"inc/header.php";
include"lib/database.php";
$db = new database();
include"lib/session.php";
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
	<h2>Edit Student
		<div class="pull-right">
			<a href="index.php" class="btn btn-success">Back</a>
	</h2>
 </div>
            
			<?php
			$id = '';
			if(isset($_GET['id'])){
				 $id .= $_GET['id'];
			}
				$table = "student";
				$where  = array(
						'where' => array('id' => $id),
						'return_type' => 'single'
					); 
				$getdata = $db->select($table,$where);
				if($getdata){
			?>
 <div class="panel-body">
    <form action="lib/process.php" method="post">
		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" name="name" value="<?php echo $getdata['name']; ?>" class="form-control" id="name" />
			<label for="email">Email</label>
			<input type="text" name="email" value="<?php echo $getdata['email']; ?>" class="form-control" id="name" />
			<label for="phone">Phone</label>
			<input name="phone" class="form-control" value="<?php echo $getdata['phone']; ?>"id="phone" style="margin-bottom: 4px;" type="text">
			<input type="hidden" name="id" value="<?php echo $getdata['id']; ?>">
			<input type="hidden" name="action" value="edit">
			<input type="submit" name="submit" value="Edit Student" class="btn btn-primary">
		</div>
	</form>
				<?php } ?>
 </div>
<?php include"inc/footer.php";?>