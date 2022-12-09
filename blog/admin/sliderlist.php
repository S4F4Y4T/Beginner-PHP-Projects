<?php include"inc/header.php"; ?>
<?php include"inc/sidebar.php"; ?> 
        <div class="grid_10">
            <div class="box round first grid">
			    <h2>slider List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th >No.</th>
							<th >Post Title</th>
							<th>Image</th>
							<th >Action</th>
						</tr>
					</thead>
					<?php
				$query = "select * from tbl_slider";
				$result = $db->select($query);
				if($result){
					$i=0;
					while($value = $result->fetch_assoc()){
					$i++;
			        ?>
					<tbody>
						<tr class="odd gradeX">
							<td><?php $i;?></td>
							<td><?php echo $value['title'];?></td>
							<td><img src="<?php echo $value['image'];?>" height="40px" width="60px">
							<td>
							<a href="editslider.php?sliderid=<?php echo $value['id'];?>">Edit</a>
							
							|| <a onclick="return confirm('Are You Sure To Delete');" href="delslider.php?delid=<?php echo $value['id'];?>">Delete</a>
							</td>
						</tr>
						
					</tbody>
				<?php } }?>
				</table>
	
               </div>
            </div>
        </div>
     
	<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
			setSidebarHeight();
        });
    </script>
    <?php include"inc/footer.php"; ?> 