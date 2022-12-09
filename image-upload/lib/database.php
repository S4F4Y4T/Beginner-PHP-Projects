<?php
class database{
	public $host   = db_host;
	public $user   = db_user;
	public $pass   = db_pass;
	public $dbname = db_name;
	
	public $link;
	public $error;
	
	public function __construct(){
		$this->connect();
	}
	private function connect(){
		$this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
		if(!$this->link){
			$this->error = "connection fail".$this->link->connect_error;
		}
	}
	
	//insert data 
	public function insert($data){
		$insert = $this->link->query($data) or die ($this->link->error.__LINE__);
		if($insert){
			return $insert;
		}else{
			return false;
		}
	}
	//select data 
	public function select($data){
		$select = $this->link->query($data) or die ($this->link->error.__LINE____);
		if($select){
			return $select;
		}else{
			return false;
		}
	}
	//delete data 
	public function delete($data){
		$delete = $this->link->query($data) or die ($this->link->error.__LINE____);
		if($delete){
			return $delete;
		}else{
			return false;
		}
	}
}

?>