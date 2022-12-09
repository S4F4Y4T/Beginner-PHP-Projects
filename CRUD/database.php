<?php
class database{
	public $host  = db_host;
	public $user  = db_user;
	public $pass  = db_pass;
	public $name  = db_name;
	
	public $link;
	public $error;
	
	public function __construct(){
		$this->connect();
	}
	public function connect(){
		$this->link = new mysqli($this->host, $this->user, $this->pass, $this->name);
		if(!$this->link){
			$this->error = "connection failed".$this->link->connect_error;
			return false;
		}
	}
	//read data
	public function read($query){
		$result = $this->link->query($query) or die ($this->link->error.__LINE__);
		if($result->num_rows > 0){
			return $result;
		} else {
			return false;
		}
	}
	//insert data
	public function insert($query){
		$insert = $this->link->query($query) or die ($this->link->error.__LINE__);
		if($insert){
			header("Location: index.php?msg=".urlencode('Data Insert Succesfully'));
			exit();
	} else {
		die ("Error:(".$this->link->errorno.")".$this->link->error);
	}
	}
	//update data
	public function update($query){
		$update = $this->link->query($query) or die ($this->link0->error.__LINE__);
		if($update){
			header("Location: index.php?msg=".urlencode('Data Update Succesfully'));
			exit();
		} else {
			die("Error:(".$this->link->errorno.")".$this->link->error);
		}
	}
	//delete data
	public function delete($query){
		$delete = $this->link->query($query) or die ($this->link0->error.__LINE__);
		if($delete){
			header("Location: index.php?msg=".urlencode('Data Deleted Succesfully'));
			exit();
		} else {
			die("Error:(".$this->link->errorno.")".$this->link->error);
		}
	}
}


?>