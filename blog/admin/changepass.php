<?php include "../lib/session.php";
	  session::checksession();
	  
?>
<?php include "../lib/database.php";
      include "../lib/config.php";
	  include "../lib/helper.php"
  ?>
<?php
	$db = new database();
	$fm = new helper();
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title> Admin</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
    <link href="css/table/demo_page.css" rel="stylesheet" type="text/css" />
    <!-- BEGIN: load jquery -->
    <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.mouse.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.sortable.min.js" type="text/javascript"></script>
    <script src="js/table/jquery.dataTables.min.js" type="text/javascript"></script>
    <!-- END: load jquery -->
    <script type="text/javascript" src="js/table/table.js"></script>
    <script src="js/setup.js" type="text/javascript"></script>
	 <script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
		    setSidebarHeight();
        });
    </script>

</head>

            <div class="cbox round cfirst grid">
                <h2>Change Password</h2>
                <div class="block"> 
				<?php 
					$id = session::get("userid");
				    if($_SERVER['REQUEST_METHOD'] == 'POST'){
					$password = $_POST['password'];
					$username = $_POST['username'];
					$password = mysqli_real_escape_string($db->link,$password);
					$username = mysqli_real_escape_string($db->link,$username);
				
					$query = "update tbl_user set
							  user = '$username',
							  pass ='$password'
							  where id='$id'";
					$update = $db->update($query);
					if($update){
						header("Location: index.php");
					}else{
						echo"There Was A Problem";
					}
					
				}?>
				
				
                 <form action="" method="post">
                    <table class="form">					
                        
						<tr> 
						<tr><td>
                                <label>Username:</label>
                            </td>
                            <td>
                                <input type="text" name="username"  class="medium" />
                            </td>
                        </tr>
						<tr><td>
                                <label>Password:</label>
                            </td>
                            <td>
                                <input type="text" name="password"  class="medium" />
                            </td>
                        </tr>
						<tr> <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        
       <?php include"inc/footer.php"; ?> 
	   

