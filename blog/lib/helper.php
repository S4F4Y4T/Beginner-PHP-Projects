<?php 
class helper{
	public function format($date){
		return date('F J, Y, g:i:a', strtotime($date));
	}
	
	public function read($text, $limit = 400){
		$text = substr($text, 0 , $limit);
		$text = substr($text, 0 , strrpos($text, ' '));
		$text = $text."....";
		return $text;
	}
	
	public function validation($data){
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
}


?>