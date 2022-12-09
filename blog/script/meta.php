<?php 
		if(isset($_GET['pageid'])){
			$id = $_GET['pageid'];
			
		$query = "select * from tbl_page where id = '$id'";
		$result = $db->select($query);
		if($result){
			while($value = $result->fetch_assoc()){
	?>
	<title><?php echo $value['name'];?>-<?php echo TITLE;?></title>
		<?php } } }elseif(isset($_GET['id'])){
			if(isset($_GET['id'])){
				$postid = $_GET['id'];
				$postquery = "select * from tbl_post where id = '$postid'";
				$postresult = $db->select($postquery);
				if($postresult){
					while($pvalue = $postresult->fetch_assoc()){
						?>
						<title><?php echo $pvalue['title'];?>-<?php echo TITLE;?></title>
				<?php	}
				}
			}
		}else{?>
			<title> <?php echo $fm->title();?>-<?php echo TITLE;?> </title>
		<?php } ?>
	
	<meta name="language" content="English">
	<meta name="description" content="It is a website about education">
	
		<?php 
		if(isset($_GET['pageid'])){
			$id = $_GET['pageid'];
			
		$query = "select * from tbl_page where id = '$id'";
		$result = $db->select($query);
		if($result){
			while($value = $result->fetch_assoc()){
	?>
	<meta name="keywords" content="<?php echo $value['name']; ?>">
		<?php } } }elseif(isset($_GET['id'])){
			if(isset($_GET['id'])){
				$postid = $_GET['id'];
				$postquery = "select * from tbl_post where id = '$postid'";
				$postresult = $db->select($postquery);
				if($postresult){
					while($pvalue = $postresult->fetch_assoc()){
						?>
						<meta name="keywords" content="<?php echo $pvalue['tags']; ?>">
				<?php	}
				}
			}
		}else{?>
			<meta name="keywords" content="<?php echo KEYWORD; ?>">
		<?php } ?>	
			
	<meta name="author" content="Delowar">