<?php
class database{
		public $host = host;
		public $user = username;
		public $pass = password;
		public $dbname = dbname;
		
		public $link;
		public $error;
		
		public function __construct(){
			$this->connect();
		}
		public function connect(){
			$this->link = new mysqli($this->host,$this->user,$this->pass,$this->dbname);
			if(!$this->link){
				$this->error = "Connection Failed".$this->link->connect_error;
			}
		}
		//read data
		public function select($query){
			$result = $this->link->query($query) or die($this->link->error.__LINE__);
			if($result->num_rows > 0){
				return $result;
			}else{
				return false;
			}
		}
		//insert data
		public function insert($query){
			$insert = $this->link->query($query) or die($this->link->error.__LINE__);
			if($insert){
				return $insert;
			}else{
				return false;
			}
		}
		//update data
		public function update($query){
			$update = $this->link->query($query) or die($this->link->error.__LINE__);
			if($update){
				return $update;
			}else{
				return false;
			}
		}
		//deleted data
		public function deleted($query){
			$deleted = $this->link->query($query) or die($this->link->error.__LINE__);
			if($deleted){
				return $deleted;
			}else{
				return false;
			}
		}
	}
?>
