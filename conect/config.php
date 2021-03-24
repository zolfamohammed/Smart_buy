<?php
$username="root";
$localhost="localhost";
$password="";
$con= mysql_connect($localhost , $username , $password);
$db_select ="smart_buy";
$select= mysql_select_db($db_select);

if(!$con){
	die("you are not connected").mysql_error();
}

	if(!$select){
		die("you are not connected").mysql_error();
		}

?>