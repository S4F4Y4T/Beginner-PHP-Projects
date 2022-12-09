<?php include"inc/header.php"?>
<div class="main-cont template">
	<?php 
		if(isset($_GET['pageid'])){
			$id = $_GET['pageid'];
		}
	?>

	<?php 
		$query = "select * from tbl_page where id = '$id'";
		$result = $db->select($query);
		if($result){
			while($value = $result->fetch_assoc()){
	?>
    
    <div class="justify">
		<h2><?php echo $value['name'];?></h2>
    
<br>
   

    <p><?php echo $value['body'];?></p>
     
	 <br>
    </div>

		<?php } } ?>		

 </div>

<?php include"inc/side.php"?>									
<?php include"inc/footer.php"?>	

