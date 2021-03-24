<?php
ini_set("display_errors","off");
include "conect/config.php";
if($_REQUEST['search']){
	 $search=$_REQUEST['search'];
	 $sql="select * from users where login_name like'".$search."%' OR first_name like'".$search."%' OR last_name like'".$search."%' OR user_id like'".$search."%' OR user_country like '".$search."%'";
	
	}else{
$sql="select * from users";
	}
$res = mysql_query($sql);
if (isset($_REQUEST['delete']))
{
	
	$arraydelete=$_REQUEST['checkdelete'];
	foreach ($arraydelete as $user_id)
	{
		$deletesql="delete from users where user_id=".$user_id;
		$deleteres=mysql_query($deletesql);
	}
	header("location:del_users.php");
}
?>
<html>
    <head>
    	<link rel="stylesheet" type="text/css" href="css/table_style.css" />
    </head>
    <body>
		<?php
        include('menu.php');
        ?>
        <div class="product_table">
            <form method="post">
            		<div align="center">
        				<table align="center">
               				 <tr>
               	 				<td><input type="text" name="search" /></td>
                    			<td><input type="submit" name="submit" value="search" /></td>
                			</tr>
          				</table>
      
                    <br />
                    </div>
                    <table border="2" align="center" id="product">
                        <tr>
                            <th>User ID</th>
                            <th>Login Name</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>User Email</th>
                            <th>User Country</th>
                            <th>Password</th>
                            <th>User Type</th>
                            <th>Delete User</th>
                        </tr>
                            <?php
                            while($row= mysql_fetch_array($res)){ 
                            ?>
                        <tr>
                            <td><?=$row['user_id'];?></td>
                            <td><?=$row['login_name'];?></td>
                            <td><?=$row['first_name'];?></td>
                            <td><?=$row['last_name'];?></td>
                            <td><?=$row['user_email'];?></td>
                            <td><?=$row['user_country'];?></td>
                            <td><?=$row['passowrd'];?></td>
                            <td><?=$row['user_type'];?></td>
                            <td><input type="checkbox" name="checkdelete[]" value="<?=$row['user_id'];?>" /></td>
                        </tr>
                            <?php
                                } ?>
                         <tr>
                            <td colspan=8></td>
                            <td><input type="submit" name="delete" value="Delete" /></td>
                         </tr>
                    </table>
              </form>
          </div>
    </body>
</html>