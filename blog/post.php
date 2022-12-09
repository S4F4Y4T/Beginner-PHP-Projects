<?php include"inc/header.php"?>

	<?php
	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}else{$id = 1;}
	?>
    
    <div class="justify">
<?php
		$query = "select * from tbl_post where id = $id";
		$post  = $db->select($query);
		if($post){
			while($result = $post->fetch_assoc()){
	?>
    <h2><a class="title" href="post.php?id=<?php echo $result['id'];?>"><?php echo $result['title'];?></a></h2>
	<h4><?php echo $fm->format($result['date']);?>,By <span class="author"><?php echo $result['author'];?></span></h4>
<br>
    <img src="admin/upload/<?php echo $result['image'];?>">

    <p><?php echo $result['body'];?></p>
     
	 <br>
    </div>

			<div class="justifypost">	
			<h2>Related Post</h2>	
		<?php
			$catid = $result['cat'];
			$queryr = "select * from tbl_post where cat = '$catid'";
			$postr  = $db->select($queryr);
			if($postr){
				while($rresult = $postr->fetch_assoc()){
		?>

			<a href="post.php?id=<?php echo $rresult['id'];?>"><img src="admin/upload/<?php echo $rresult['image'];?>"></a>
			
		<?php }}?>
			<?php }}?>

		</div>



<?php include"inc/side.php"?>									
<?php include"inc/footer.php"?>	

