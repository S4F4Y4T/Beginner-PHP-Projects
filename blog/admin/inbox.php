<?php include"inc/header.php"; ?>
<?php include"inc/sidebar.php"; ?> 
        <div class="grid_10">
		<?php if(isset($_GET['seenid'])){
			$seenid = $_GET['seenid'];
			
			$query = "update tbl_contact set
					  status = '1'
					  where id='$seenid'";
			$result = $db->update($query);
			if($result){
				echo"Message Move To SeenBox";
			}
		}?>
            <div class="box round first grid">
                <h2>Inbox</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Message</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<?php $query = "select * from tbl_contact where status = '0' order by id desc";
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
							<td><?php echo $value['email']; ?></td>
							<td><?php echo $value['message']; ?></td>
							<td><?php echo $value['date']; ?></td>
							<td><a href="viewmsg.php?msgid=<?php echo $value['id'];?>">View</a> || <a href="replaymsg.php?msgid=<?php echo $value['id'];?>">Reply</a> || 
							<a href="?seenid=<?php echo $value['id'];?>">Seen</td>
						</tr>
					</tbody>
						  <?php }}?>
				</table>
               </div>
            </div>
						  
						  <div class="box round first grid">
                <h2>Seen Box</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Message</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<?php $query = "select * from tbl_contact where status = '1' order by id desc";
						  $result = $db->select($query);
						  if($result){
							  $i=0;
							  while($value = $result->fetch_assoc()){
								$i++;
					?>
					<?php if(isset($_GET['delid'])){
						$id = $_GET['delid'];

						$delquery = "delete from tbl_contact where id='$id'";
						$deldata = $db->deleted($delquery);
						if($deldata){
							echo "deleted";
		}
}?>
					<tbody>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $value['name']; ?></td>
							<td><?php echo $value['email']; ?></td>
							<td><?php echo $value['message']; ?></td>
							<td><?php echo $value['date']; ?></td>
							<td> <a onclick="return confirm('Are You Sure To Delete');" href="?delid=<?php echo $value['id'];?>">Delete</td>
						</tr>
					</tbody>
						  <?php } } ?>
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