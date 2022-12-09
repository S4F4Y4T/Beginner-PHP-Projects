<?php
 include"session.php";
 include"database.php";
 $db = new database();
 $table = "student";
 session::init();
 
 if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){
	 if($_REQUEST['action'] == 'add'){
		 $studentdata = array(
		 'name'  => $_POST['name'],
		 'email' => $_POST['email'],
		 'phone' => $_POST['phone']
		 );
		 
	$insert = $db->insert($table,$studentdata);
	if(!empty($insert)){
		$msg = "Data Inserted Successfully";
	}else{
		$msg = "Data Not Inserted";
	 }
	 
	 session::set("msg",$msg);
	 $url = "../addstudent.php";
	 header("Location: ".$url);
	}elseif($_REQUEST['action'] == 'edit'){
		$id = $_POST['id'];
		$editdata = array(
			'name'  => $_POST['name'],
			'email' => $_POST['email'],
			'phone' => $_POST['phone']
		);
		$table = "student";
		$cond = array('id' => $id);
		$update = $db->update($table,$editdata,$cond);
		if(!empty($update)){
			$msg = "Data Updated Successfully";
		}else{
			$msg = "Data Not Updated";
		}
		session::set("msg",$msg);
		$url = '../editstudent.php';
		header("Location: ".$url);
	}elseif($_REQUEST['action'] == 'delete'){
		$id = $_GET['id'];
		$table = "student";
		$cond = array('id' => $id);
		$delete = $db->deleted($table,$cond);
		if($delete){
			$msg = "Data Deleted Successfully";
		}else{
			$msg = "Data Not Deleted";
		}
		session::set("msg",$msg);
		$url = '../index.php';
		header("Location: ".$url);
	}
 }


?>