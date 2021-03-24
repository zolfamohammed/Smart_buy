<?php
	include 'include/db.php';
	$error='';
	$errors=array();
	if(isset($_REQUEST['save'])){
		$first_name=$_REQUEST['first_name'];
		$last_name=$_REQUEST['last_name'];
		$login_name=$_REQUEST['login_name'];
		$user_email=$_REQUEST['user_email'];
		$user_country=$_REQUEST['user_country'];
		$password=$_REQUEST['password'];
		$password_1=$_REQUEST['password_1'];
		$user_type=$_REQUEST['user_type'];
		
		$first_name= mysql_real_escape_string($first_name);
		$last_name= mysql_real_escape_string($last_name);
		$login_name= mysql_real_escape_string($login_name);
		$user_email= mysql_real_escape_string($user_email);
		$user_country= mysql_real_escape_string($user_country);
		$password= mysql_real_escape_string($password);
		$password_1= mysql_real_escape_string($password_1);
		$user_type= mysql_real_escape_string($user_type);
		
		
		
		$first_name= htmlspecialchars($first_name);
		$last_name= htmlspecialchars($last_name);
		$login_name= htmlspecialchars($login_name);
		$user_email= htmlspecialchars($user_email);
		$user_country= htmlspecialchars($user_country);
		$password= htmlspecialchars($password);
		$password_1= htmlspecialchars($password_1);
		$user_type= htmlspecialchars($user_type);
		$query=mysql_query("select * from users where login_name='$login_name'");
		if(mysql_num_rows($query)>0){
			$error="The Login Name alredy Used Pleas Chose Anther On ";
		}else{
		if($first_name== NULL || $last_name==NULL || $login_name==NULL || $user_email==NULL || $user_country==NULL || $password==NULL || $user_type==NULL  || $password_1==NULL ){
			$error="Please Enter All The Information ";
		 	
		}elseif($password !== $password_1){
			$error="two passowrd do not match ";
				
			}else{
			$sql="insert into users(login_name,first_name,last_name,user_email,user_country,passowrd,user_type)values('$login_name','$first_name','$last_name','$user_email','$user_country','$password','$user_type')";
			$res=mysql_query($sql);
		
			if($res){
				
				header("location:login.php");
			}
			else
				print mysql_error();
		} }
		
	}
		
		
?>
<?php session_start();?>
<?php


				$editsql="select * from sitsetting ";
				$editres=mysql_query($editsql);
				$editrow=mysql_fetch_array($editres);
 ?>
<html>
    <head>
    	<link rel="stylesheet" href="../fontawesome-free-5.6.3-web/css/all.min.css" />
        <link rel="stylesheet" type="text/css" href="../css/add_style.css" />
         <title><?=$editrow['site_name'];?></title>
    </head>
    
    <div class="table">
    <div style="color:#F00;"><?php echo $error; ?></div>
    <br/>
    <form method="post" enctype="multipart/form-data" >
        <div class="row">
                <div class="col-25"><label>First Name</label></div>
                <div class="col-75"><input type="text" name="first_name" placeholder="Enter Your First name.."/></div>
        </div>
        <div class="row">
                <div class="col-25"><label>Last Name</label></div>
                <div class="col-75"><input type="text" name="last_name" placeholder="Enter Your Last name.."/></div>
        </div>
        <div class="row">
                <div class="col-25"><label>Login Name</label></div>
                <div class="col-75"><input type="text" name="login_name" placeholder="Enter Your Login name.."/></div>
        </div>
        <div class="row">
                <div class="col-25"><label>Email</label></div>
                <div class="col-75"><input type="email" name="user_email" placeholder="Enter Your Email.."/></div>
        </div>
        <div class="row">
                <div class="col-25"><label>Country</label></div>
               		<div class="col-75">
                        <select name="user_country" >
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
                <div class="col-75"><input type="password" name="password" placeholder="Enter The Password.." /></div>
         </div>
         <div class="row">
                <div class="col-25"><label>confirm password</label></div>
                <div class="col-75"><input type="password" name="password_1" placeholder="Enter The Password.." /></div>
         </div>
         <div class="row">
               
  				<div class="col-75"><input type="hidden"  value="Subscriber" name="user_type"  />
                						
                                       
                </div>
         </div>
         <div class="row">
               <input type="submit" name="save" value="save">
              
          </div>
           <a href="login.php"><i class="far fa-arrow-alt-circle-left" style="font-size:25px;color:#000"></i></a>
    </form>
    </div>
  
</html>