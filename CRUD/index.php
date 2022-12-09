<?php include "inc/header.php";
      include "define.php";
	  include "database.php";
 ?>
 <?php
    $db    = new database();
    $query = "SELECT * FROM tbl_user";
	$read  = $db->read($query);
 ?>
	<?php
		if(isset($_GET['msg'])){
			echo "<span style='color:green'>".$_GET['msg']."</span>";
		}
	?>
	<?php if(isset($_GET['id'])){
		$id     = $_GET['id'];		
		$query  = "DELETE FROM tbl_user WHERE id=$id";
	$delete = $db->delete($query);}
	?>
 
 <table class="tbl">
    <tr>
	  <th>Serial</th>
	  <th>Name</th>
	  <th>Email</th>
	  <th>Skill</th>
	  <th>Action</th>
    </tr>
	<?php if($read){?>
	<?php $i=0; while($row = $read->fetch_assoc()){?>  
	<tr>
	  <td><?php echo $i++; ?></td>
	  <td><?php echo $row['name']; ?></td>
	  <td><?php echo $row['email']; ?></td>
	  <td><?php echo $row['skill']; ?></td>
	  <td>
	  <a href="update.php?id=<?php echo urlencode($row['id']);?>">Edit ||
	  <a onClick="return confirm('Are You Sure Want To Delete')" href="index.php?id=<?php echo urlencode($row['id']);?>">Delete
	  </td>
	</tr>
	<?php } ?>
	<?php } else {?>
	<p>Data Insert Succesfully</p>
	<?php } ?>
 </table>
 <a href="create.php">Create</a>
<?php include "inc/footer.php"; ?>	