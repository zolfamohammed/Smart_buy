<?php 
session_start();	
include "conect/config.php";
if(isset($_SESSION['username'])){
$user_name=$_SESSION['username'];
$sql="select * from users where login_name='{$user_name}'";
$res=mysql_query($sql);	
while($row=mysql_fetch_array($res)){
	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="fontawesome-free-5.6.3-web/css/all.min.css" />
	<link rel="stylesheet" type="text/css" href="css/add_style.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
	<div>
    <h1 align="center" style="margin-top:3%;">Your Profil</h1>
    </div>
	 <div class="table" style="margin-top:3%;">
        
        <form method="post" enctype="multipart/form-data">
           
            <input type="hidden" name="product_id" value="<?=$row['user_id'];?>">
                <div class="row">
                    <div class="col-25"><label>First Name</label></div>
                    <div class="col-75"><input type="text" name="first_name" value="<?=$row['first_name'];?>"></div>
               </div>
               <div class="row">
                    <div class="col-25"><label>Last Name</label></div>
                    <div class="col-75"><input type="text" name="last_name" value="<?=$row['last_name'];?>"></div>
                </div>
                <div class="row">
                    <div class="col-25"><label>Login Name</label></div>
                    <div class="col-75"><input type="text" name="login_name" value="<?=$row['login_name'];?>"></div>
                </div>
                <div class="row">
                    <div class="col-25"><label>Email</label></div>
                    <div class="col-75"><input type="email" name="user_email" value="<?=$row['user_email'];?>" /></div>
               </div>
               <div class="row">
                
             
               <div class="col-25"><label>Country</label></div>
                        <div class="col-75">
                            <select name="user_country" value="<?=$row['user_country'];?>">
                                <option value="<?=$row['user_country'];?>"><?=$row['user_country'];?></option>
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
                    <div class="col-75"><input type="password" name="password" value="<?=$row['passowrd'];?>" /></div>
                </div>
                <div class="row">
                <div class="col-25"><label>User Type</label></div>
  				<div class="col-75"><select  name="user_type" >
                						<option value="<?=$row['user_type'];?>"><?=$row['user_type'];?></option>
                						<option value="Admin">Admin</option>
                                        <option value="Subscriber">Subscriber</option>
                					</select>
                </div>
        	    </div>
                
                <div class="row">
                    
                        <input type="submit" name="update" value="Update Profile">
                    
                </div>
                <?php }}?>
                <a href="index.php"><i class="far fa-arrow-alt-circle-left" style="font-size:25px;color:#000"></i></a>
        </form>
        
        </div>
</body>
</html>
<?php
if (isset($_REQUEST['update'])) {
			
			$first_name=$_REQUEST['first_name'];
			$last_name=$_REQUEST['last_name'];
			$login_name=$_REQUEST['login_name'];
			$user_email=$_REQUEST['user_email'];
			$user_country=$_REQUEST['user_country'];
			$password=$_REQUEST['password'];
			$password_1=$_REQUEST['password_1'];
			$user_type=$_REQUEST['user_type'];
			
			if($first_name== NULL || $last_name==NULL || $login_name==NULL || $user_email==NULL || $user_country==NULL || $password==NULL || $user_type==NULL  ){
		 	echo '<script> alert("Please Enter All The Information ");</script>';	
		}elseif($login_name !== $user_name){
			$updatesql="update users set first_name='$first_name', last_name='$last_name', 	login_name='$login_name', 	user_email='$user_email', user_country='$user_country', passowrd='$password', user_type='$user_type' where login_name='{$user_name}'";
				$updateres=mysql_query($updatesql);
			  header("location:login/login.php");
			}else{
			
				$updatesql="update users set first_name='$first_name', last_name='$last_name', 	login_name='$login_name', 	user_email='$user_email', user_country='$user_country', passowrd='$password', user_type='$user_type' where login_name='{$user_name}'";
				$updateres=mysql_query($updatesql);
				if($updateres){
						header("location:adminprofile.php");
					}
					else
						print mysql_error();
		}
		}
?>