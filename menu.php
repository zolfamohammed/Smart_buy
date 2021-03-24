<?php 
	include("login/include/checklog.php");
	include("conect/config.php");
	
	if(isset($_SESSION['user_type'])){
		if($_SESSION['user_type'] == 'Subscriber'){
			header("location:smartbuy/index.php");
			
		 }
		
	}elseif(isset($_SESSION['user_type'])){
		if($_SESSION['user_type'] !== 'admin' ){
			
			header("location:login/login.php");
		}
			
	}else{header("location:login/login.php");}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <link rel="stylesheet" href="fontawesome-free-5.6.3-web/css/all.min.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Smart_Buy</title>
    </head>
    
    <body>
        <nav class="menu">
            <ul>
                <li><a href="adminprofile.php" class="menu_link"><?php echo $_SESSION['username'];?> <i class="fas fa-user"></i></a></li>	
                <li><a href="login/logout.php" class="menu_link">LOG OUT <i class="fas fa-power-off"></i></a></li>
               
            </ul>    
            
            <ul id="rmenu">
                <li><a href="index.php" class="menu_link"> HOME <i class="fas fa-home"></i></a></li>
                <li><a href="#" class="menu_link">PRODUCT <i class='fas fa-angle-down' style='font-size:20px;color:#fff'></i></a>
            
                    <div class="subcontact">
                      <div class="submenu">
                       <ul>
                         <li><a href="add_product.php">Add Product</a></li>
                         <li><a href="edit_product.php">Update Product</a></li>
                         <li><a href="del_product.php">Delete Product</a></li>
                       </ul>
                      </div>
                    </div>
                    </li>
                    <li><a href="#" class="menu_link">USERS <i class='fas fa-angle-down' style='font-size:20px;color:#fff'></i></a>
                    <div class="subcontact">
                      <div class="submenu">
                       <ul>
                         <li><a href="add_users.php"> Add Users</a></li>
                         <li><a href="edit_users.php"> Update Users</a></li>
                         <li><a href="del_users.php"> Delete Users</a></li>
                       </ul>
                      </div>
                    </div>
           		 </li>
                 <li><a href="setting.php" class="menu_link">SETTING</a></li>
            	<li><a href="#" class="menu_link">PURCHASES</a></li>
            
            </ul>
        </nav>
    </body>
</html>