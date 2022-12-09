<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 
	include"lib/student.php";
	$stu = new student();
	$curr_date = date('Y-m-d');   
?>

<!DOCTYPE html>
<html>
<head>
	<title>Attendance Management System</title>
	<link rel="stylesheet" type="text/css" href="script/min.css">
</head>
<body>
	<div class="container">
		<div class="well text-center">
			<h2>Attendance Management System</h2>
		</div>
