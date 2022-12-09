<?php
  class database{
	  private $host = "localhost";
	  private $user = "user";
	  private $pass = "skidie1337";
	  private $name = "login";
	  public $pdo;
	  
	  public function __construct(){
	    if(!isset($this->pdo)){
			try{
				$link = new PDO("mysql:host=".$this->host."; dbname=".$this->name, $this->user, $this->pass);
				$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		        $link->exec("SET CHARACTER SET utf8");
				$this->pdo = $link;
			}
			catch(PDOException $e){
				die("failed to connect with database".$e->getmessage());
			}
		}	
	  }
  }
?>
