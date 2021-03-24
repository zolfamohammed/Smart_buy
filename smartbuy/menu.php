<?php 
session_start();	
include "../conect/config.php";?>
<?php
ini_set("display_errors","off");


if($_REQUEST['search']){
	 $search=$_REQUEST['search'];
	 $sql="select * from product_info where product_name like'".$search."%' OR product_type like'".$search."%' OR product_company like'".$search."%' OR product_id like'".$search."%'";
	
	}else{
$sql="select * from product_info";
	}
$res = mysql_query($sql);
 ?>
 <?php
	

				$editsql="select * from sitsetting ";
				$editres=mysql_query($editsql);
				$editrow=mysql_fetch_array($editres);
 ?>
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="../fontawesome-free-5.6.3-web/css/all.min.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$editrow['site_name'];?></title>
</head>

<body>


<!-- Menu -->



	
	
</div>

<div class="super_container">

	<!-- Header -->

	<header class="header">
		<div class="header_overlay"></div>
		<div class="header_content d-flex flex-row align-items-center justify-content-start">
			<div class="logo">
				<a href="cart.php">
					<div class="d-flex flex-row align-items-center justify-content-start">
						<div><img src="images/logo_1.png" alt=""></div>
                        
						<div>CART </div>
					</div>
				</a>	
			</div>
			
			
			<div class="header_right d-flex flex-row align-items-center justify-content-start ml-auto">
				<!-- Search -->
				<div class="header_search">
					<form  method="post" id="menu_search_form" class="menu_search_form">
						<input type="text" name="search" class="search_input" placeholder="Search Item" required />
						<button class="header_search_button" name="submit"><img src="images/search.png" alt=""></button>
					</form>
				</div>
				<!-- User -->
                <?php if(isset($_SESSION['username'])){
					?>
				<div class="user"><a href="profile.php"><div><img src="images/user.svg" alt="https://www.flaticon.com/authors/freepik"><div>1</div></div></a></div>
               <div class="user"> <a href="logout.php" ><i class="fas fa-power-off" style="font-size:20px;color:#000 "></i></a></div>
				<?php }else{?>
                <div class="user"><a href="../login/login.php"><div><img src="images/user.svg" alt="https://www.flaticon.com/authors/freepik"></div></a></div>
                <?php }?>
				<!-- Cart -->
				<div class="cart"><a href="#"><div><img class="svg" src="images/cart.svg" alt="https://www.flaticon.com/authors/freepik"></div></a></div>
				<!-- Phone -->
				<div class="header_phone d-flex flex-row align-items-center justify-content-start">
					<div><div><a href="contact.php"><img src="images/phone.svg" alt="https://www.flaticon.com/authors/freepik"></a></div></div>
					<div>+967 775554845</div>
				</div>
			</div>
		</div>
	</header>

	<div class="super_container_inner">
		<div class="super_overlay"></div>
        
</body>
</html>
