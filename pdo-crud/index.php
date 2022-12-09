<?php 
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
	session::set("msg", NULL);
?>
  <div class="panel panel-default">
    <div class="panel-heading">	
		<h2>Student List
			<div class="pull-right">
				<a href="addstudent.php" class="btn btn-success">Add Student</a>
		</h2>
	</div>
	</div>
	<div class="panel-body">
		<table class="table table-striped">
			<tr>
				<th>Serial</th>
				<th>Name</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Action</th>
			</tr>
		<?php
			$table = "student";
			$order = array('order' => 'id DESC');
			$select = array('select' => 'name');
			$where  = array(
						'where' => array('id' => '1' , 'email' => 'safayat@gmail.com'),
						'return_type' => 'single'
			);
			$limit = array('start' => '1','limit' => '2');
			
			$student = $db->select($table,$order);
			if(!empty($student)){
				$i = 0;
				foreach($student as $data){
				$i++;
		?>
			<tr>
			    <td><?php echo $i; ?></td>
				<td><?php echo $data['name']; ?></td>
				<td><?php echo $data['email']; ?></td>
				<td><?php echo $data['phone']; ?></td>
				<td>
					<a href="editstudent.php?action=edit&id=<?php echo $data['id']; ?>" class="btn btn-info">Edit</a>
					<a onclick="return confirm('Are You Sure To Delete')" href="lib/process.php?action=delete&id=<?php echo $data['id']; ?>" class="btn btn-danger">Delete</a>
				</td>
			</tr>
			<?php }  }?>
		</table>
	</div>

<?php include"inc/footer.php";?>