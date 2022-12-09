<?php
 class database{
	 private $hostdb = "localhost";
	 private $userdb = "user";
	 private $passdb = "skidie1337";
	 private $namedb = "pdo_student";
	 private $pdo;
	 
	 public function __construct(){
		 if(!$this->pdo){
			 try{
				$link = new PDO("mysql:host=".$this->hostdb.";dbname=".$this->namedb,$this->userdb,$this->passdb);
				$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$link->exec("SET CHARACTER SET utf8");
				$this->pdo = $link;
			 }catch(PDOException $e){
				 die("Failed To Connect Database ".$e->getmessage());
			 }
		 }
	 }
	 
	 
	 //Read Data
	 /* $sql = "SELECT * FROM tablename WHERE id=:id AND name=:name ORDER BY id DESC LIMIT 3,2";
	    $query = $this->pdo->prepare($sql);
		$query->bindValue("$key",'3');
		$read = $query->execute();
	*/
	public function select($table,$data = array()){
		$sql = "SELECT ";
		$sql .= array_key_exists("select" , $data)?$data['select']:'*';
		$sql .= " FROM ".$table;
		if(array_key_exists("where",$data)){
			$sql .= " WHERE ";
			$i = 0;
			foreach($data['where'] as $key => $val){
				$add = ($i > 0)?' AND ':'';
				$sql .= "$add"."$key=:$key";
				$i++;
			}
		}
		if(array_key_exists("order",$data)){
			$sql .= " ORDER BY ".$data['order'];
		}
		if(array_key_exists("start",$data) && array_key_exists("limit",$data)){
			$sql .= " LIMIT ".$data['start'].','.$data['limit'];
		}
		$query = $this->pdo->prepare($sql);
		if(array_key_exists("where",$data)){
			foreach($data['where'] as $key => $val){
				$query->bindValue(":$key",$val);
			}
		}
		$query->execute();
		if(array_key_exists("return_type",$data)){
			switch($data['return_type']){
				case 'count':
					$value = $query->rowCount();
					break;
					
					case 'single':
					$value = $query->fetch(PDO::FETCH_ASSOC);
					break;
					
					default:
					$value = '';
					break;
		} }else{
				if($query->rowCount() > 0){
					$value = $query->fetchAll();
				}
			}
			return !empty($value)?$value:false;
	}
	
	//insert data
	/* $sql = "INSERT INTO tablename(name,email,pass) VALUES(:name,:email,:pass)";
	   $query = $this->pdo->prepare($sql);
	   $query->bindValue("name","safayat");
	   $query->bindValue("email","safu@gmail.com");
	   $query->bindValue("pass","123");
	   $insert = $query->execute();
	*/
	public function insert($table,$data){
		if(!empty($data) && is_array($data)){
			$key = implode(',',array_keys($data));
			$value = ':'.implode(', :',array_keys($data));
			$sql = "INSERT INTO ".$table."(".$key.") VALUES(".$value.")";
			$query = $this->pdo->prepare($sql);
			
			foreach($data as $key => $val){
				$query->bindValue(":$key",$val);
			}
			$insert = $query->execute();
			if(!empty($insert)){
				return $insert;
			}else{
				return false;
			}
		}else{
				return false;
			}
	}
	
	//update data
	/* $sql = "UPDATE tablename SET name=:name,email=:email,pass=:pass WHERE id=:id";
	   $query = $this->pdo->prepare($sql);
	   $query->bindValue("name","safayat");
	   $query->bindValue("email","safu@gmail.com");
	   $query->bindValue("pass","123");
	   $query->bindValue("id","1");
	   $insert = $query->execute();
	*/
	public function update($table,$data,$cond){
		if(!empty($data) && is_array($data)){
			$keyvalue = '';
			$wherecond = '';
			$i = 0;
			foreach($data as $key => $val){
				$add = ($i > 0)?' , ':'';
				$keyvalue .= "$add"."$key=:$key";
				$i++;
			}
			
			if(!empty($cond) && is_array($cond)){
				$wherecond .= " WHERE ";
				$i = 0;
				foreach($cond as $key => $val){
					$add = ($i > 0)?' AND ':'';
					$wherecond .= "$add"."$key=:$key";
					$i++;
				}
			}
			
			$sql = "UPDATE ".$table." SET ".$keyvalue.$wherecond;
			$query = $this->pdo->prepare($sql);
			
			foreach($data as $key => $val){
				$query->bindValue(":$key",$val);
			}
			
			foreach($cond as $key => $val){
				$query->bindValue(":$key",$val);
			}
			$update = $query->execute();
			return $update?$query->rowCount():false;
		
		}else{
			return false;
		}
	}
	
	//Delete Data
	/* $sql = "DELETE FROM tablename WHERE id=:id";
	   $query = $this->pdo->prepare($sql);
	   $query->bindValue("id","2");
	   $delete = $query->execute();
	*/
	public function deleted($table,$cond){
		
		if(!empty($cond) && is_array($cond)){
				$wherecond = '';
				$wherecond .= " WHERE ";
				$i = 0;
				foreach($cond as $key => $val){
					$add = ($i > 0)?' AND ':'';
					$wherecond .= "$add"."$key='".$val."'";
					
					$i++;
				}
			}
		$sql = "DELETE FROM ".$table.$wherecond;
		$deleted = $this->pdo->exec($sql);
		/*$query = $this->pdo->prepare($sql);
		foreach($cond as $key => $val){
				$query->bindValue(":$key",$val);
			}
		$deleted = $query->execute();*/
		return $deleted?true:false;
	}
 }
?>
