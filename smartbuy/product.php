<?php
include("../login/include/checklog.php");
	
include "../conect/config.php";

?>
<?php


				$editsql="select * from sitsetting ";
				$editres=mysql_query($editsql);
				$editrow=mysql_fetch_array($editres);
 ?>
 <?php 
 if($_REQUEST['product_id']){
			$product_id=$_REQUEST['product_id'];
			$sql="select * from product_info where product_id=".$product_id;
			$res=mysql_query($sql);
			 if(mysql_num_rows($res) > 0){
			$row=mysql_fetch_array($res);
			 }
		}

 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$editrow['site_name'];?></title>
</head>

<body>
<div >
	<?php
		include('menu.php');
	?>
     


					
					<!-- Product -->
                    <br />
                    <br />
                    <br />
                    <br />
				
						<div class="product">
                        <form method="post" action="cart.php?action=add&product_id=<?php echo $row["product_id"]; ?>">
							<div class="product_image"><img src="../images/<?=$row['product_photo'];?>"/><div class="descr_pro">
                    	<?=$row['product_description'];?>
                    </div></div>
							<div class="product_content">
                            
								<div class="product_info d-flex flex-row align-items-start justify-content-start">
									<div>
										<div>
											<div class="product_name"><a href="product.php"><?=$row['product_name'];?> </a></div>
											<div class="product_category">In <a href="category.html"><?=$row['product_company'];?></a></div>
										</div>
									</div>
									<div class="ml-auto text-right">
										<div class="rating_r rating_r_4 home_item_rating"><?=$row['product_type'];?></div>
										<div class="product_price text-right"><span>$<?=$row['product_price'];?></span></div>
                                        
                                        <input style="text-align:center;" type="text" name="quantity"  value="1"> 
									</div>
								</div>
								<div class="product_buttons">
									<div class="text-right d-flex flex-row align-items-start justify-content-start">
										<div class="product_button product_fav text-center d-flex flex-column align-items-center justify-content-center">
											<div><div><img src="images/heart_2.svg" class="svg" alt=""><div>+</div></div></div>
										</div>
										<div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
                                         <input type="hidden" name="hidden_name" value="<?php echo $row["product_name"]; ?>">
                                            <input type="hidden" name="hidden_price" value="<?php echo $row["product_price"]; ?>">
											<div><div><button style="border: none;
	outline: none; background: transparent;" name="add" type="submit"  ><img src="images/cart.svg" class="svg" alt=""><div class="cart_add">+</div></button>
											</div></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					
                    
                    

</form>
 </div>               
</body>
</html>