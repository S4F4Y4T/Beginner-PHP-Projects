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
							<th>User Password</th>
							<th>User Role</th>
							<th>Action</th>
						</tr>
					</thead>
					
					<?php
						$query = "select * from tbl_user order by id desc";
						$result = $db->select($query);
						if($result){
							$i=0;
							while($value = $result->fetch_assoc()){
								$i++;
					?>
					
					<tbody>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $value['user']; ?></td>
							<td><?php echo $value['pass']; ?></td>
							<td><?php if($value['role'] == '0'){
								echo"Admin";
							}elseif($value['role'] == '1'){
								echo"Author";
							}elseif($value['role'] == '2'){
								echo"Editor";
							}else{
								echo"User";
							}?></td>
							<td><a href="viewuser.php?viewid=<?php echo $value['id']; ?>">View</a> ||
							<?php if(session::get('userrole')=='0'){ ;?>
							 <a onclick="return confirm('Are You Sure To Delete')" href="deluser.php?deluser=<?php echo $value['id']; ?>">Delete</a></td>
							<?php } ?>
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