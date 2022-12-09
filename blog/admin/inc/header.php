<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "../lib/session.php";
session::init();
?>
<?php include "../lib/database.php";
include "../lib/config.php";
include "../lib/helper.php"
?>
<?php
$db = new database();
$fm = new helper();

?>

<!DOCTYPE html>
<html>
  <head>
     <title>Admin Panel</title>
	 
	 <link rel="stylesheet" href="inc/min.css">
  </head>
  
  
  <body>
	  <div class="container">
		 <nav class="navbar navbar-default">
		    <div class="container-fluid">
			    <div class="navbar-header">
			        <a class="navbar-brand" href="index.php">
			                     Admin Panel
			</a>
			</div>
			  <ul class="nav navbar-nav pull-right"></ul>
			</div>
		 </nav>
