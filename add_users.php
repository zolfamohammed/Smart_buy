<?php
	include 'conect/config.php';
	$error='';
	if(isset($_REQUEST['save'])){
		$first_name=$_REQUEST['first_name'];
		$last_name=$_REQUEST['last_name'];
		$login_name=$_REQUEST['login_name'];
		$user_email=$_REQUEST['user_email'];
		$user_country=$_REQUEST['user_country'];
		$password=$_REQUEST['password'];
		$user_type=$_REQUEST['user_type'];
		
		$query=mysql_query("select * from users where login_name='$login_name'");
		if(mysql_num_rows($query)>0){
			$error="The Login Name alredy Used Pleas Chose Anther On ";
		}else{
	
		if($first_name== NULL || $last_name==NULL || $login_name==NULL || $user_email==NULL || $user_country==NULL || $password==NULL || $user_type==NULL ){
		 	$error="Please Enter All The Information ";	
		}else{
			$sql="insert into users(login_name,first_name,last_name,user_email,user_country,passowrd,user_type)values('$login_name','$first_name','$last_name','$user_email','$user_country','$password','$user_type')";
			$res=mysql_query($sql);
		
			if($res){
				echo "<script> window.alert('record added');</script>";
			}
			else
				print mysql_error();
		}}
	}
		
		
?>
<?php
include('menu.php');
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/add_style.css" />
    </head>
    <div class="table">
     <div style="color:#F00;"><?php echo $error; ?></div>
    <br/>
    <form method="post" enctype="multipart/form-data">
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
                <div class="col-25"><label>User Type</label></div>
  				<div class="col-75"><select  name="user_type" >
                						<option value="Subscriber">choos option..</option>
                						<option value="Admin">Admin</option>
                                        <option value="Subscriber">Subscriber</option>
                					</select>
                </div>
         </div>
         <div class="row">
               <input type="submit" name="save" value="save">
              
          </div>
    </form>
    </div>
</html>