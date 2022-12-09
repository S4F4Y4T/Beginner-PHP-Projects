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
	if(isset($_GET['catid'])){
		$catid = $_GET['catid'];
		$query = "delete from tbl_cat where id = '$catid'";
		$result = $db->deleted($query);
		if($result){
			echo"<script>alert('Data Deleted Successfully');</script>";
			echo"<script>window.location='catlist.php';</script>";
		}else{
			echo"Category Not Deleted";
		}
	}
?>