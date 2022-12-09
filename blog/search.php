<?php include"inc/header.php"?>

<?php

	if(isset($_GET['search'])){
		$search = $_GET['search'];
	}

	
		$query = "select * from tbl_post where title like '%$search%' or body like '%$search%'";
		$postc  = $db->select($query);
		if($postc){
			while($resultc = $postc->fetch_assoc()){
	?>
    <div class="justifypost">

    <h2><a class="title" href="post.php?id=<?php echo $resultc['id'];?>"><?php echo $resultc['title'];?></a></h2>
	<h4><?php echo $fm->format($resultc['date']);?>,By <span class="author"><?php echo $resultc['author'];?></span></h4>
<br>
    <img src="admin/upload/<?php echo $resultc['image'];?>">

    <p><?php echo $fm->read($resultc['body']);?></p>
     <div class="read"><a href="post.php?id=<?php echo $resultc['id'];?>"> Read More</a></div>
	 <br>
    </div>
		<?php }} else{echo "your search query not found";}?>



<?php include"inc/side.php"?>
<?php include"inc/footer.php"?>	