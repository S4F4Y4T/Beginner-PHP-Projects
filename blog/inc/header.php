<?php include"lib/database.php";?>
<?php include"lib/config.php";?>
<?php include"lib/helper.php"?>
<?php $db = new database(); ?>
<?php $fm = new helper();?>


<!DOCTYPE HTML>
<html>

<head>

     <title>blog site</title>
     
     <link rel="stylesheet" type="text/css" href="css/blog.css">

</head>

<html>

	<head>

	   <title>GET THE BEST BLOG</title>

       <link rel="stylesheet" type="text/css" href="css/blog.css">   
	
	</head>

	<body background="<img src='image/background.png'>">
    <div class="social-secx">
        <?php
            $query = "select * from tbl_social where id = '1'";
            $result = $db->select($query);
            if($result){
            while($value = $result->fetch_assoc()){
        ?>
		     <a href="<?php echo $value['facebook'];?>"><img src="admin/upload/facebook.png" alt="logo"style="height:35px;width:35px;"></a>
             <a href="<?php echo $value['twitter'];?>"><img src="admin/upload/twitter.png" alt="logo"style="height:35px;width:35px;"></a>
             <a href="<?php echo $value['google'];?>"><img src="admin/upload/google.png" alt="logo"style="height:35px;width:35px;"></a>
             <a href="<?php echo $value['linkdin'];?>"><img src="admin/upload/linked.png" alt="logo" style="height:35px;width:35px;"></a>
        <?php }} ?>
     </div>
	<div class="template">
 
    <header class="head-sec template">
        
        <div id="logo-sec">
            <?php
            $query = "select * from tbl_title where id = '1'";
            $result = $db->select($query);
            if($result){
            while($value = $result->fetch_assoc()){
            ?>
           <img src="admin/upload/<?php echo $value['logo'];?>">
           <h2><?php echo $value['title'];?></h2>
           <p><?php echo $value['slogan'];?></p>
            <?php }} ?>
        </div>
		<div id="social-sec">
		<form action="search.php" method="get">
		<input type="text" name="search" placeholder="search your keyword"> 
		<input type="submit" name="submit" value="search">    
		</form>
        </div>
		
    </header>

    <nav class="nav-sec template">

            <ul>
               <li><a href="index.php">HOME</a></li>
                <?php $query = "select * from tbl_page";
                $result = $db->select($query);
                if($result){
                    while($value = $result->fetch_assoc()){
                        ?>
                        <li><a href="page.php?pageid=<?php echo $value['id'];?>"><?php echo $value['name'];?></a></li>
                    <?php } } ?>
               <li><a href="contact.php">CONTACT</a></li>
            </ul>

    </nav>

    <div class="cont-sec template">
	 <div class="main-cont template">