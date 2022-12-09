<?php
include "config.php";
class database{
	public $host = db_host;
	public $user = db_user;
	public $pass = db_pass;
	public $name = db_name;
	
	public $link;
	public $error;
	
	public function __construct(){
		$this->connect();
	}
	public function connect(){
		$this->link = new mysqli($this->host, $this->user, $this->pass, $this->name);
		if(!$this->link){
			$this->error = "connect failed".$this->link->connect_error;
			return false;
		}
	}
	public function read($query){
		$result = $this->link->query($query) or die($this->link->error.__LINE__);
		if($result->num_rows > 0){
			return $result;
		}else{
			return false;
		}
	}
	public function insert($query){
		$result = $this->link->query($query) or die($this->link->error.__LINE__);
		if($result){
			return $result;
		}else{
			return false;
		}
	}
}

?>