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
<?php if(!session::get('userrole')=='0'){?>
		<script>window.location="userlist.php";</script>
<?php } ?>
<?php if(isset($_GET['deluser'])){
		$id = $_GET['deluser'];
		
		$delquery = "delete from tbl_user where id='$id'";
		$deldata = $db->deleted($delquery);
		if($deldata){
			echo "<script>alert('data deleted successfully');</script>";
			echo "<script>window.location = 'userlist.php';</script>";
		}
}?>