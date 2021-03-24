<?php
include("../login/include/checklog.php");
	
include "../conect/config.php";
$sql="select * from product_info ORDER BY product_id ASC";
$res = mysql_query($sql);
?>
<?php


				$editsql="select * from sitsetting ";
				$editres=mysql_query($editsql);
				$editrow=mysql_fetch_array($editres);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?=$editrow['site_name'];?></title>
<meta charset="utf-8">

<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
</head>
<body>

		<?php
		include('menu.php');
		?>

		<!-- Home -->

		
			
		<!-- Products -->

		<div class="products">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 offset-lg-3">
						<br>
						<div class="section_title text-center">Sm@rt $Buy</div>
					</div>
				</div>
				<div class="row page_nav_row">
					<div class="col">
						<div class="page_nav">
							<ul class="d-flex flex-row align-items-start justify-content-center">
								<li><a href="index.php">Home Page </a></li>
								<li><a href="cisco.php">CISCO</a></li>
								<li><a href="HUAWEI.php">HUAWEI</a></li>
								<li><a href="juniper.php">JUNIPER</a></li>
							</ul>
						</div>
					</div>
				</div>
				
                <div class="row products_row">
			
				
					 <?php
					    if(mysql_num_rows($res) > 0)
							{
                        while($row= mysql_fetch_array($res)){ 
                      ?>


					
					<!-- Product -->
					<div class="col-xl-4 col-md-6">
                     <form method="post" action="cart.php?action=add&product_id=<?php echo $row["product_id"]; ?>">
						<div class="product">
							<div class="product_image"><img src="../images/<?=$row['product_photo'];?>"/></div>
							<div class="product_content">
								<div class="product_info d-flex flex-row align-items-start justify-content-start">
									<div>
										<div>
											<div class="product_name"><a href="product.php?product_id=<?=$row['product_id'];?>"><?=$row['product_name'];?> </a></div>
											<div class="product_category">In <a href="category.html"><?=$row['product_company'];?></a></div>
										</div>
									</div>
									<div class="ml-auto text-right">
										<div class="rating_r rating_r_4 home_item_rating"><?=$row['product_type'];?></div>
										<div class="product_price text-right"><span>$<?=$row['product_price'];?></span></div> <input style="text-align:center;" type="text" name="quantity"  value="1"> 
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
	outline: none; background: transparent;" name="add" type="submit"  ><img src="images/cart.svg" class="svg" alt=""><div class="cart_add">+</div></button></div></div>
										</div>
									</div>
								</div>
							</div>
						</div>
                        </form>
					</div>

                 <?php
                  } }?>
                  
               
            	
				<div class="row load_more_row">
					<div class="col">
                    
						<div class="button load_more ml-auto mr-auto"><a href="#">load more</a></div>
					</div>
				</div>
			</div>
		</div>




		<!-- Boxes -->

		<div class="boxes">
			<div class="container">
				
		</div>

		<!-- Features -->

		<div class="features">
			<div class="container">
				<div class="row">
					
					<!-- Feature -->
					<div class="col-lg-4 feature_col">
						<div class="feature d-flex flex-row align-items-start justify-content-start">
							<div class="feature_left">
								<div class="feature_icon"><img src="images/icon_1.svg" alt=""></div>
							</div>
							<div class="feature_right d-flex flex-column align-items-start justify-content-center">
								<div class="feature_title">Fast Secure Payments</div>
							</div>
						</div>
					</div>

					<!-- Feature -->
					<div class="col-lg-4 feature_col">
						<div class="feature d-flex flex-row align-items-start justify-content-start">
							<div class="feature_left">
								<div class="feature_icon ml-auto mr-auto"><img src="images/icon_2.svg" alt=""></div>
							</div>
							<div class="feature_right d-flex flex-column align-items-start justify-content-center">
								<div class="feature_title">Premium Products</div>
							</div>
						</div>
					</div>

					<!-- Feature -->
					<div class="col-lg-4 feature_col">
						<div class="feature d-flex flex-row align-items-start justify-content-start">
							<div class="feature_left">
								<div class="feature_icon"><img src="images/icon_3.svg" alt=""></div>
							</div>
							<div class="feature_right d-flex flex-column align-items-start justify-content-center">
								<div class="feature_title">Free Delivery</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>

		<?php
		include('footer.php');
		?>
	</div>
		
</div>


<script src="styles/bootstrap-4.1.2/popper.js"></script>
<script src="styles/bootstrap-4.1.2/bootstrap.min.js"></script>

</body>
</html>