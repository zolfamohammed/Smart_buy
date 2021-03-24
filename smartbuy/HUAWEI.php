<?php
include "../conect/config.php";
$sql="select * from product_info";
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

<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
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
                        <div class="section_title text-center">HUAWEI</div>

					</div>
				</div>
				<div class="row page_nav_row">
					<div class="col">
						<div class="page_nav">
							<ul class="d-flex flex-row align-items-start justify-content-center">
								<li><a href="index.php">Home Page </a></li>
								<li><a href="cisco.php">CISCO</a></li>
								<li><a href="juniper.php">JUNIPER</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="row products_row">
                 <?php
					 	
                        while($row= mysql_fetch_array($res)){
							if($row['product_company']=='HUAWEI'){ 
                 ?>

					
				<!-- Product -->
					<div class="col-xl-4 col-md-6">
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
										<div class="rating_r rating_r_4 home_item_rating"></div>
										<div class="product_price text-right"><span>$<?=$row['product_price'];?></span></div>
									</div>
								</div>
								<div class="product_buttons">
									<div class="text-right d-flex flex-row align-items-start justify-content-start">
										<div class="product_button product_fav text-center d-flex flex-column align-items-center justify-content-center">
											<div><div><img src="images/heart_2.svg" class="svg" alt=""><div>+</div></div></div>
										</div>
										<div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
											<div><div><img src="images/cart.svg" class="svg" alt=""><div>+</div></div></div>
										</div>
									</div>
								</div>
							</div>
						</div>
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