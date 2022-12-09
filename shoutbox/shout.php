<?php
include "database.php";
class shout{
	public $db;
	public function __construct(){
	$this->db = new database();
	}
	public function data(){
		$query = "SELECT * FROM tbl_shout";
		$result =  $this->db->read($query);
		return $result;
	}
	public function insert($data){
		$name  = mysqli_real_escape_string($this->db->link, $data['name']);
		$shout = mysqli_real_escape_string($this->db->link, $data['shout']);
		date_default_timezone_set('asia/dhaka');
		$time = date('h:i:s', time());
		
		$query = "INSERT INTO tbl_shout(name, shout, time) VALUES('$name', '$shout', '$time')";
		$this->db->insert($query);
		header("location:index.php");
		
	}
}
?>