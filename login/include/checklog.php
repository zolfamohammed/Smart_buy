 <?php include("db.php");?>
<?php session_start();?>
<?php
	if(isset($_POST['login'])){
		$username=$_POST['username'];
		$password=$_POST['password'];
		$username= mysql_real_escape_string($username);
		$password= mysql_real_escape_string($password);
		$username=htmlspecialchars($_POST['username']);
		$password=htmlspecialchars($_POST['password']);
		
		$query ="SELECT * FROM users WHERE login_name = '{$username}'";
		$sql=mysql_query($query);
		
		while($row=mysql_fetch_array($sql)){
			$user_id = $row['user_id'];
			$user_name = $row['login_name'];
			$user_password = $row['passowrd'];
			$user_type = $row['user_type'];
			
		}
		if($username !== $user_name && $password !== $user_password){
			header("location:../login.php");
		}
		elseif($username == $user_name && $password == $user_password){
			$_SESSION['username']=$user_name;
			$_SESSION['password']=$user_password ;
			$_SESSION['user_type']=$user_type;
			
			
			
			header("location:../../index.php");
		}
		else{
			header("location:../login.php");
			}
	}
?>
 