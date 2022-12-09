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
							<th>User Name</th>
							<th>User Comment</th>
							<th>Action</th>
						</tr>
					</thead>
					
					<?php
						$query = "select * from tbl_cmmnt order by id desc";
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
							<td><?php echo $value['body']; ?></td>
							<td><a onclick="return confirm('Are You Sure To Delete')" href="delcmmnt.php?delid=<?php echo $value['id']; ?>">Delete</a></td>
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