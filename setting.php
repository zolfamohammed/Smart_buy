<?php 
include 'conect/config.php';
$editsql="select * from sitsetting ";
			$editres=mysql_query($editsql);
			$editrow=mysql_fetch_array($editres);
if (isset($_REQUEST['update'])) {
			$site_name=$_REQUEST['site_name'];
			$site_link=$_REQUEST['site_link'];
			$site_state=$_REQUEST['site_state'];
			$mess_close=$_REQUEST['mess_close'];
			$site_dis=$_REQUEST['site_dis'];
			
			
		
				$updatesql="update sitsetting set site_name='$site_name', site_link='$site_link', site_state='$site_state', 	mess_close='$mess_close', site_dis='$site_dis'";
				$updateres=mysql_query($updatesql);
				if($updateres){
						header("location:setting.php");
					}
					else
						print mysql_error();
		
		}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <link rel="stylesheet" type="text/css" href="css/add_style.css" />
        <title><?=$editrow['site_name'];?></title>
        
    </head>
    <body>
    <?php
	include('menu.php');
	?>
    <div class="table">
    <form method="post" enctype="multipart/form-data">
        <div class="row">
                <div class="col-25"><label>Site Name</label></div>
                <div class="col-75"><input type="text" name="site_name" value="<?=$editrow['site_name'];?>" /></div>
        </div>
        <div class="row">
                <div class="col-25"><label>Site Link</label></div>
                <div class="col-75"><input type="text" name="site_link" value="<?=$editrow['site_link'];?>"/></div>
        </div>
        <div class="row">
                <div class="col-25"><label>Site State</label></div>
                <div class="col-75"><select name="site_state" >
                		<option value="<?=$editrow['site_state'];?>"><?=$editrow['site_state'];?></option>
                        <option value="open">open</option>
                        <option value="close" >close</option>
                        
                        </select>
                        </div>
        </div>
        <div class="row">
                    <div class="col-25"><label>Message Close</label></div>
                    <div class="col-75"><textarea name="mess_close" ><?=$editrow['mess_close'];?></textarea></div>
        </div>
        <div class="row">
                    <div class="col-25"><label>Site Description</label></div>
                    <div class="col-75"><textarea name="site_dis" ><?=$editrow['site_dis'];?></textarea></div>
        </div>
        
        
         <div class="row">
               <input type="submit" name="update" value="Update">
              
          </div>
    </form>
    </div>
    </body>
    </html>