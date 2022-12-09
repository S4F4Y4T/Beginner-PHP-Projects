<?php include"inc/header.php"; ?>
<?php include"inc/sidebar.php"; ?> 
        <div class="grid_10">
            <div class="box round first grid">
			    <h2>Post List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="5%">No.</th>
							<th width="15%">Post Title</th>
							<th width="15%">Description</th>
							<th width="10%">Category</th>
							<th width="10%">Image</th>
							<th width="10%">Author</th>
							<th width="10%">Tags</th>
							<th width="10%">Date</th>
							<th width="15%">Action</th>
						</tr>
					</thead>
					<?php
				$query = "select tbl_post.*,tbl_cat.name from tbl_post inner join tbl_cat
						  on tbl_post.cat = tbl_cat.id order by tbl_post.title desc";
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
							<td><?php echo $fm->read($value['body'], 50);?></td>
							<td><?php echo $value['name'];?></td>
							<td><img src="upload/<?php echo $value['image'];?>" height="40px" width="60px">
							<td><?php echo $value['author'];?></td>
							<td><?php echo $value['tags'];?></td>
							<td><?php echo $fm->format($value['date']);?></td>
							
							<td>
							<a href="viewpost.php?viewid=<?php echo $value['id'];?>">view</a> 
							<?php if(session::get("userid") == $value['UserId']){?>
							||<a href="editpost.php?editid=<?php echo $value['id'];?>">Edit</a>
							<?php } ?>
							<?php if(session::get("userid") == $value['UserId'] || session::get("userrole") == '0'){?>
							|| <a onclick="return confirm('Are You Sure To Delete');" href="delpost.php?delid=<?php echo $value['id'];?>">Delete</a>
							</td>
							<?php  }?>
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