<?php
	error_reporting(0);
	include"config.php";
	include"database.php";
	
class student{
	private $db;
	
	public function __construct(){
		$this->db = new database();
	}
	public function getstudent(){
		$query = "select * from tbl_student";
		$result = $this->db->select($query);
		return $result;
	}
	public function insertstu($name = "default",$roll = "69"){
		$name = mysqli_real_escape_string($this->db->link,$name);
		$roll = mysqli_real_escape_string($this->db->link,$roll);

		if($name == ''){
			$msg = "<div class='alert alert-danger'><strong>Error!</strong>Field Must Not Be Empty</div>";
			return $msg;
		}else{
			$insertquery = "insert into tbl_student(name,roll) values('$name','$roll')";
			$insertresult = $this->db->insert($insertquery);
			$curr_date = date('Y-m-d');
			$insertattend = "insert into tbl_attend(roll,attend,att_time) values('$roll','','$curr_date')";
			$insertresult = $this->db->insert($insertattend);
			
			if($insertresult){
				$msg = "<div class='alert alert-success'><strong>Success!</strong>Data Inserted Successfully</div>";
				echo $msg;
			}else{
				$msg = "<div class='alert alert-danger'><strong>Error!</strong>Field Must Not Be Empty</div>";
			echo $msg;
			}
			
		}
	}
	public function insertattendance($curr_date,$attend = array()){
		$query = "select distinct att_time from tbl_attend";
		$result = $this->db->select($query);
		if($result){
			while($value = $result->fetch_assoc()){
				$att_date = $value['att_time'];
			}
		}
		
		foreach($attend as $attn_key => $attn_value){
			if($attn_value == 'present'){
				$stu_query = "insert into tbl_attend(roll,attend,att_time) values('$attn_key','present',now())";
				$stu_result = $this->db->insert($stu_query);
			}else{
				$stu_query = "insert into tbl_attend(roll,attend,att_time) values('$attn_key','absent',now())";
				$stu_result = $this->db->insert($stu_query);
			}
		}
		if($stu_result){
					$msg = "<div class='alert alert-success'><strong>Success!</strong>Attendance Data Inserted</div>";
					echo $msg;
				}else{
					$msg = "<div class='alert alert-danger'><strong>Error!</strong>Attendance Not 
					Inserted</div>";
					return $msg;
				}
		
	}
	public function get_date(){
		$query = "select distinct att_time from tbl_attend";
		$result = $this->db->select($query);
		if($result){
			return $result;
		}
	}
	public function getattend($dt){
		$query = "select tbl_student.name,tbl_attend.*
				  from tbl_student inner join tbl_attend
				  on tbl_student.roll = tbl_attend.roll
				  where att_time = '$dt'";
		$result = $this->db->select($query);
		if($result){
			return $result;
		}
	}
	public function updateattend($dt,$attend = array()){
		foreach($attend as $attn_key => $attn_value){
			if($attn_value == 'present'){
				$update_query = "update tbl_attend set
								 attend = 'present'
								 where roll='".$attn_key."' and att_time='".$dt."'";
				$update_result = $this->db->update($update_query);
			}else{
				$update_query = "update tbl_attend set
								 attend = 'absent'
								 where roll='".$attn_key."' and att_time='".$dt."'";
				$update_result = $this->db->update($update_query);
			}
		}
		if($update_result){
					$msg = "<div class='alert alert-success'><strong>Success!</strong>Attendance Data Updated</div>";
					echo $msg;
				}else{
					$msg = "<div class='alert alert-danger'><strong>Error!</strong>Attendance Not 
					Updated</div>";
					echo $msg;
				}
	}
	
}
?>
