<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="style.css">
	
	
<?php $query = "select * from tbl_theme where id='1'";
	  $result = $db->select($query);
	  if($result){
		  while($value = $result->fetch_assoc()){
			  if($value['theme'] == 'default'){
				  include"theme/default.css";
			  }else{
				  include"theme/green.css";
			  }
		  }
	  }
?>
	