</div>
<div class="side-cont template">
    <div class="side">
       <h2>Category</h2>
       <p> <ul>
        <?php $query = "select * from tbl_cat";
            $result = $db->select($query);
            if($result){
            while($value = $result->fetch_assoc()){
        ?>
	   <li>
	   <a href="category.php?id=<?= $value['id']; ?>"><?= $value['name']; ?></a>
	   </li>
		<?php }} ?>
	   </ul></p>
    </div></div>
	
	

	
	
    <div class="side">
 <div class="side-cont template">
    <div class="side">
	
       <h2>Posts</h2>
        <p> <ul>
            <?php $query = "select * from tbl_post";
                    $result = $db->select($query);
                    if($result){
                        while($value = $result->fetch_assoc()){
                    ?>
                    <li>
                        <a href="post.php?id=<?= $value['id']; ?>"><?= $value['title']; ?></a>
                    </li>
                <?php }} ?>
        </ul></p>
		
   
</div>
    </div>
</div>