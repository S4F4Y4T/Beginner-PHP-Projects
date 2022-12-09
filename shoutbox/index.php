<?php
include "shout.php";
$shout = new shout();
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>php shoutbox</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="wrapper clr">
	<header class="header clr">
	    PHP OOP SHOUT BOX
			</header>
		<section class="content clr">
                <div class="box clr">
			        <ul>
					<?php
						$getdata = $shout->data();
						if($getdata && !empty($getdata)){
							while($row = $getdata->fetch_assoc()){
						
					?>
						<li><span><?php echo $row['time']; ?></span> - <b><?php echo $row['name']; ?></b> <?php echo $row['shout']; ?></li> 
					 
						<?php } } ?>
					</ul>
				</div>
<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$shout = $shout->insert($_POST);
	}

?>
				<div class="form clr">
					<form action="" method="POST">
						<table>
							<tr>
								<td>Name</td>
								<td>:</td>
								<td><input type="text" name="name" placeholder="Input Your Name"></td>
							</tr>
							<tr>
								<td>Shout</td>
								<td>:</td>
								<td><input type="text" name="shout" placeholder="Input Your Shout"></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td><input type="submit" name="submit" value="submit"></td>
							</tr>
						</table>
					</form>
				</div>
		</section>	
		<footer class="footer clr">
			&copy 2017 Safayat Mahmud Rayan
			</footer>
	</div>
</body>
</html>
