<?php include"inc/header.php"; ?>
<?php include"inc/sidebar.php"; ?> 

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					
					<?php
						$query = "select * from tbl_cat order by id desc";
						$result = $db->select($query);
						if($result){
							$i=0;
							while($value = $result->fetch_assoc()){
								$i++;
					?>
					
					<tbody>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $value['name']; ?></td>
							<td><a href="editcat.php?catid=<?php echo $value['id']; ?>">Edit</a> || <a onclick="return confirm('Are You Sure To Delete')" href="delcat.php?catid=<?php echo $value['id']; ?>">Delete</a></td>
						</tr>
					</tbody>
					<?php } }?>
				</table>
               </div>
            </div>
        </div>
        <?php include"inc/footer.php"; ?> 
		
		<script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
			setSidebarHeight();


        });
    </script>