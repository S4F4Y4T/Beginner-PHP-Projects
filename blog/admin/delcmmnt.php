<?php include "../lib/session.php";
	  session::checksession();
	  
?>
<?php include "../lib/database.php";
      include "../lib/config.php";
	  include "../lib/helper.php"
  ?>
<?php
	$db = new database();
	$fm = new helper();
?>
<?php
	if(isset($_GET['delid'])){
		$id = $_GET['delid'];
		$query = "delete from tbl_cmmnt where id ='$id'";
		$result = $db->deleted($query);
		if($result){
			echo"<script>alert('Data Deleted Successfully');</script>";
			echo"<script>window.location='comment.php';</script>";
		}
	}
?>