<?php session_start();?>
<?php 
	$_SESSION['username']= NULL;
	header("location:login.php");
?>