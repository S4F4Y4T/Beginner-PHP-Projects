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
<?php if(isset($_GET['delid'])){
		$id = $_GET['delid'];
		
		
		$delquery = "delete from tbl_page where id='$id'";
		$deldata = $db->deleted($delquery);
		if($deldata){
			echo "<script>alert('data deleted successfully');</script>";
			echo "<script>window.location = 'addpage.php';</script>";
		}
}?>