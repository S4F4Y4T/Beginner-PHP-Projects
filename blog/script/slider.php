<div class="slidersection templete clear">


		
        <div id="slider">
		<?php
			$query = "select * from tbl_slider";
			$result = $db->select($query);
			if($result){
				while($value = $result->fetch_assoc()){
		?>
		  <a href="#"><img src="admin/<?php echo $value['image'];?>" alt="<?php echo $value['title'];?>" title="<?php echo $value['title'];?>" /></a>
			<?php } } ?>
			</div>
</div>