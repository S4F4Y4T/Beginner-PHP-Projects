<?php
   include_once 'session.php';
   include 'database.php';
   
   class user{
	   private $db;
	   public function __construct(){
		   $this->db = new database();
	   }
	   
	   public function userRegistation($data){
		   $name 		= $data['name'];
		   $username 	= $data['username'];
		   $email 		= $data['email'];
		   $password 	= md5($data['password']);
		   
		    $chkmail = $this->mailchk($email); 
		   
		   if($name == "" OR $username == "" OR $email == "" OR $password == ""){
			   $msg = "<div class='alert alert-danger'><strong>ERROR!</strong> Field Must Not Be Empty</div>";
			   return $msg;
		   }
		   if(strlen($username) < 3){
			   $msg = "<div class='alert alert-danger'><strong>ERROR!</strong> Username is too short</div>";
			   return $msg;
		   }
		   if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
			   $msg = "<div class='alert alert-danger'><strong>ERROR!</strong> Email Is NOt Valid</div>";
			   return $msg;
		   }
		   if($chkmail == true){
			   $msg = "<div class='alert alert-danger'><strong>ERROR!</strong> This Email Already Exist</div>";
			   return $msg;
		   }
		   
			$sql = "INSERT INTO login_tbl (name, username, email, password) VALUES(:name, :username, :email, :password)";
			$query = $this->db->pdo->prepare($sql);
			$query->bindvalue(':name', $name);
			$query->bindvalue(':username', $username);
			$query->bindvalue(':email', $email);
			$query->bindvalue(':password', $password);
			$result = $query->execute();
			if($result){
				$msg = "<div class='alert alert-success'><strong>success!</strong> THank You You Have Been Registerd</div>";
			   return $msg;
			}else{
				$msg = "<div class='alert alert-danger'><strong>ERROR!</strong> There Have a Problem</div>";
			   return $msg;
			}
			
		   
		   }
		     public function mailchk($email){
			   $sql = "SELECT email FROM login_tbl WHERE email = :email";
			   $query = $this->db->pdo->prepare($sql);
			   $query->bindvalue(':email', $email);
			   $query->execute();
			   if($query->rowcount() > 0){
				   return true;
			   }else{
				   return false;
			   }
		   }
		   public function getlogin($email, $password){
			   $sql = "SELECT * FROM login_tbl WHERE email = :email AND password = :password LIMIT 1";
			   $query = $this->db->pdo->prepare($sql);
			   $query->bindvalue(':email', $email);
			   $query->bindvalue(':password', $password);
			   $query->execute();
			   $result = $query->fetch(PDO::FETCH_OBJ);
			   return $result;
		   }
		   public function usrlogin($data){
			   $email 		= $data['email'];
			   $password 	= md5($data['password']);
		   
		    $chkmail = $this->mailchk($email); 
		   
		   if($email == "" OR $password == ""){
			   $msg = "<div class='alert alert-danger'><strong>ERROR!</strong> Field Must Not Be Empty</div>";
			   return $msg;
		   }
		    if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
			   $msg = "<div class='alert alert-danger'><strong>ERROR!</strong> Email Is NOt Valid</div>";
			   return $msg;
		   }
		   if($chkmail == false){
			   $msg = "<div class='alert alert-danger'><strong>ERROR!</strong> This Email Doesn't Exist</div>";
			   return $msg;
		   }
		   $value = $this->getlogin($email, $password);
		   
		   if($value){
			   session::init();
			   session::set("login", true);
			   session::set("id", $value->id);
			   session::set("name", $value->name);
			   session::set("username", $value->username);
			   session::set("loginmsg", "<div class='alert alert-success'><strong>SUCCESS!</strong> You Are Logged In</div>");
			   header("Location: index.php");
		   }else{
			   $msg = "<div class='alert alert-danger'><strong>ERROR!</strong> Data Not Found</div>";
			   return $msg;
		   }
		   
		   }
		   public function getuser(){
			   $sql = "SELECT * FROM login_tbl ORDER BY id DESC";
			   $query = $this->db->pdo->prepare($sql);
			   $query->execute();
			   $result = $query->fetchall();
			   return $result;
			   
		   }
		  public function updtuser($id){
			   $sql = "SELECT * FROM login_tbl WHERE id = :id LIMIT 1";
			   $query = $this->db->pdo->prepare($sql);
			   $query->bindvalue(':id',$id);
			   $query->execute();
			   $result = $query->fetch(PDO::FETCH_OBJ);
			   return $result;
		  }
		  public function updtusr($id, $data){
			   $name 		= $data['name'];
		   $username 	= $data['username'];
		   $email 		= $data['email'];
		    
		   
		   if($name == "" OR $username == "" OR $email == "" ){
			   $msg = "<div class='alert alert-danger'><strong>ERROR!</strong> Field Must Not Be Empty</div>";
			   return $msg;
		   }
		   if(strlen($username) < 3){
			   $msg = "<div class='alert alert-danger'><strong>ERROR!</strong> Username is too short</div>";
			   return $msg;
		   }
		   if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
			   $msg = "<div class='alert alert-danger'><strong>ERROR!</strong> Email Is NOt Valid</div>";
			   return $msg;
		   }
		  
		   
			$sql = "UPDATE login_tbl set
					name     = :name,
					username = :username,
					email    = :email
					WHERE id = :id";
			$query = $this->db->pdo->prepare($sql);
			$query->bindvalue(':name', $name);
			$query->bindvalue(':username', $username);
			$query->bindvalue(':email', $email);
			$query->bindvalue(':id', $id);
			$result = $query->execute();
			if($result){
				$msg = "<div class='alert alert-success'><strong>success!</strong> Data Updated Successfully</div>";
			   return $msg;
			}else{
				$msg = "<div class='alert alert-danger'><strong>ERROR!</strong> There Have a Problem</div>";
			   return $msg;
			}
		  }
		  private function chkpass($id, $old_pass){
			  $password = md5($old_pass);
			  $sql = "SELECT password FROM login_tbl WHERE id = :id AND password = :password";
			   $query = $this->db->pdo->prepare($sql);
			   $query->bindvalue(':id', $id);
			   $query->bindvalue(':password', $password);
			   $query->execute();
			   if($query->rowcount() > 0){
				   return true;
			   }else{
				   return false;
			   }
		  }
		  public function updatepassword($id, $data){
			  $old_pass = $data['old_pass'];
			  $new_pass = $data['password'];
			  $chk_pass = $this->chkpass($id, $old_pass);
			  
			  if($old_pass == "" or $new_pass == ""){
				  $msg = "<div class='alert alert-danger'><strong>ERROR!</strong> Field Must Not Be Empty</div>";
			   return $msg;
			  }
			  if($chk_pass == false){
				  $msg = "<div class='alert alert-danger'><strong>ERROR!</strong> Old Password Doesnt Exist</div>";
			   return $msg;
			  }
			  if(strlen($new_pass) < 6){
				  $msg = "<div class='alert alert-danger'><strong>ERROR!</strong> Password Is Too Short</div>";
			   return $msg;
			  }
			  $password = md5($new_pass);
			  $sql = "UPDATE login_tbl set
					password     = :password
					WHERE id = :id";
			$query = $this->db->pdo->prepare($sql);
			$query->bindvalue(':password', $password);
			$query->bindvalue(':id', $id);
			$result = $query->execute();
			if($result){
				$msg = "<div class='alert alert-success'><strong>success!</strong> Password Updated Successfully</div>";
			   return $msg;
			}else{
				$msg = "<div class='alert alert-danger'><strong>ERROR!</strong> There Have a Problem</div>";
			   return $msg;
			}
		  }
	   
   }
?>