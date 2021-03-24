<?php
		include 'conect/config.php';
		$error='';
		if($_REQUEST['user_id']){
			$user_id=$_REQUEST['user_id'];
			$editsql="select * from users where user_id=".$user_id;
			$editres=mysql_query($editsql);
			$editrow=mysql_fetch_array($editres);
			
		}
		if (isset($_REQUEST['update'])) {
			$user_id=$_REQUEST['user_id'];
			$first_name=$_REQUEST['first_name'];
			$last_name=$_REQUEST['last_name'];
			$login_name=$_REQUEST['login_name'];
			$user_email=$_REQUEST['user_email'];
			$user_country=$_REQUEST['user_country'];
			$password=$_REQUEST['password'];
			$user_type=$_REQUEST['user_type'];
			
			$query=mysql_query("select * from users where login_name='$login_name'");
			if(mysql_num_rows($query)>0){
				$updatesql="update users set first_name='$first_name', last_name='$last_name', 	user_email='$user_email', user_country='$user_country', passowrd='$password', user_type='$user_type' where user_id=".$user_id;
				$updateres=mysql_query($updatesql);
				if($updateres){
						header("location:edit_users.php");
				}
				else
					print mysql_error();
				
			}else{
			
			if($first_name== NULL || $last_name==NULL || $login_name==NULL || $user_email==NULL || $user_country==NULL || $password==NULL || $user_type==NULL ){
		 	$error="Please Enter All The Information ";
			}else{
			
				$updatesql="update users set first_name='$first_name', last_name='$last_name', 	login_name='$login_name', 	user_email='$user_email', user_country='$user_country', passowrd='$password', user_type='$user_type' where user_id=".$user_id;
				$updateres=mysql_query($updatesql);
				if($updateres){
						header("location:edit_users.php");
				}
				else
					print mysql_error();
		}}
		}
?>
<html>
    <head>
    	<link rel="stylesheet" type="text/css" href="css/add_style.css" />
    </head>
    <body>
        <?php
        include('menu.php');
        ?>
        <div class="table">
        <div style="color:#F00;"><?php echo $error; ?></div>
     	<br/>
        <form method="post" enctype="multipart/form-data">
           
            <input type="hidden" name="product_id" value="<?=$editrow['user_id'];?>">
                <div class="row">
                    <div class="col-25"><label>First Name</label></div>
                    <div class="col-75"><input type="text" name="first_name" value="<?=$editrow['first_name'];?>"></div>
               </div>
               <div class="row">
                    <div class="col-25"><label>Last Name</label></div>
                    <div class="col-75"><input type="text" name="last_name" value="<?=$editrow['last_name'];?>"></div>
                </div>
                <div class="row">
                    <div class="col-25"><label>Login Name</label></div>
                    <div class="col-75"><input type="text" name="login_name" value="<?=$editrow['login_name'];?>"></div>
                </div>
                <div class="row">
                    <div class="col-25"><label>Email</label></div>
                    <div class="col-75"><input type="email" name="user_email" value="<?=$editrow['user_email'];?>" /></div>
               </div>
               <div class="row">
                
             
               <div class="col-25"><label>Country</label></div>
                        <div class="col-75">
                            <select name="user_country" value="<?=$editrow['user_country'];?>">
                           		<option value="egypt">egypt</option>
                                <option value="landon" >landon</option>
                                <option value="palestin" >palestin</option>
                                <option value="syria" >syria</option>
                                <option value="yemen" >yemen</option>
                            </select>
                        </div>
                </div>
                <div class="row">
                    <div class="col-25"><label>password</label></div>
                    <div class="col-75"><input type="password" name="password" value="<?=$editrow['passowrd'];?>" /></div>
                </div>
                <div class="row">
                    <div class="col-25"><label>User Type</label></div>
  				<div class="col-75"><select  name="user_type" >
                						<option ><?=$editrow['user_type'];?></option>
                						<option value="Admin">Admin</option>
                                        <option value="Subscriber">Subscriber</option>
                					</select>
                </div>
                <div class="row">
                    
                        <input type="submit" name="update" value="Update">
                    
                </div>
                <a href="edit_users.php"><i class="far fa-arrow-alt-circle-left" style="font-size:25px;color:#000"></i></a>
        </form>
        </div>
        </body>
</html>