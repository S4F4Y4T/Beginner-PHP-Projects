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
				
		$query = "select * from tbl_post where id='$id'";
		$result = $db->select($query);
		if($result){
			while($value = $result->fetch_assoc()){ 
			$delimg = $value['image'];
				unlink($delimg);
			}}
		$delquery = "delete from tbl_post where id='$id'";
		$deldata = $db->deleted($delquery);
		if($deldata){
			echo "<script>alert('data deleted successfully');</script>";
			echo "<script>window.location = 'postlist.php';</script>";
		}
						}
?>