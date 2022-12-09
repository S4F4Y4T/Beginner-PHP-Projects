<?php include"inc/header.php"?>

		<?php
			$per_page = 3;
			if(isset($_GET['page'])){
				$page = $_GET['page'];
			}else{
				$page = 1;
			}
			$algo = ($page - 1)*$per_page;
		?>

        <?php
			$query = "select * from tbl_post limit $algo,$per_page";
			$post  = $db->select($query);
			if($post){
				while($result = $post->fetch_assoc()){
		?>

    <div class="justifypost">

    <h2><a class="title" href="post.php?id=<?php echo $result['id'];?>"><?php echo $result['title'];?></a></h2>
	<h4><?php echo $fm->format($result['date']);?>,By <span class="author"><?php echo $result['author'];?></span></h4>
<br>
    <img src="admin/upload/<?php echo $result['image'];?>">

    <p><?php echo $fm->read($result['body']);?></p>
     <div class="read"><a href="post.php?id=<?php echo $result['id'];?>"> Read More</a></div>
	 <br>
    </div>


			<?php } ?>
<!--pagination-->
	<?php
		$query = "select * from tbl_post";
		$result = $db->select($query);
		$all   = mysqli_num_rows($result);
		$pages = ceil($all/$per_page);
	?>
		<span class='pagination'><a href='index.php?page=1'>First Page</a>

        <?php
            for($i=1; $i <=$pages; $i++){
                echo "<a href='index.php?page=$i'>$i</a>";
            }
        ?>
        <a href='index.php?page=<?php echo $pages?>'>Last Page</a></span>

        <!--pagination-->
    <?php }  ?>

<?php include"inc/side.php"?>
<?php include"inc/footer.php"?>