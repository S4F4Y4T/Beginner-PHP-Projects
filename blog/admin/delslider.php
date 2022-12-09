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
}?>
<?php $query = "select * from tbl_slider where id='$id'";
	  $result = $db->select($query);
	  if($result){
		  while($value = $result->fetch_assoc()){
			  $img = $value['image'];
			  unlink($img);
		  }
	  }
	  $delquery = "delete from tbl_slider where id='$id'";
	  $delresult = $db->deleted($delquery);
	  if($delresult){
		  echo"<script>alert('Data Deleted Successfully');</script>";
		  echo"<script>window.location='sliderlist.php';</script>";
	  }else{
		  echo"There Was A Problem";
	  }
?>