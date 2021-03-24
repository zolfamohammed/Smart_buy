<?php
	include 'conect/config.php';
	
		if($_REQUEST['product_id']){
			$product_id=$_REQUEST['product_id'];
			$editsql="select * from product_info where product_id=".$product_id;
			$editres=mysql_query($editsql);
			$editrow=mysql_fetch_array($editres);
			
		}
		if (isset($_REQUEST['update'])) {
			$product_id=$_REQUEST['product_id'];
			$product_name=$_REQUEST['product_name'];
			$product_company=$_REQUEST['product_company'];
			$product_type=$_REQUEST['product_type'];
			$product_price=$_REQUEST['product_price'];
			$product_description=$_REQUEST['product_description'];
			$product_photo=$_FILES['product_photo']['name'];
			
			if($product_photo==""){
				$updatesql="update product_info set product_name='$product_name',product_company='$product_company', product_type='$product_type', 	product_price='$product_price', product_description='$product_description' where product_id=".$product_id;
				$updateres=mysql_query($updatesql);
				if($updateres){
						header("location:edit_product.php");
					}
					else
						print mysql_error();
				}else{
					
					$updatesql="update product_info set product_name='$product_name',product_company='$product_company', product_type='$product_type', product_price='$product_price', product_description='$product_description', product_photo='$product_photo' where product_id=".$product_id;
					$updateres=mysql_query($updatesql);
					move_uploaded_file($_FILES['product_photo']['tmp_name'],"images/".$product_photo);
					if($updateres){
						header("location:edit_product.php");
					}
					else
						print mysql_error();
				}
		}
?>
<html>
    <head>
    	<link rel="stylesheet" type="text/css" href="css/add_style.css" />
    </head>
    <body>
		<?php
        include('menu.php');
        ?>
        <div class="table">
            <form method="post" enctype="multipart/form-data">
                
                    <input type="hidden" name="product_id" value="<?=$editrow['product_id'];?>">
                    	<div class="row">
                            <div class="col-25"><label>Product Name</label></div>
                            <div class="col-75"><input type="text" name="product_name" value="<?=$editrow['product_name'];?>"></div>
                    	</div>
                        <div class="row">
                            <div class="col-25"><label>Product company</label></div>
                             <div class="col-75"><select name="product_company" >
                             			<option ><?=$editrow['product_company'];?></option>
                                        <option >CISCO</option>
                                        <option >HUAWEI</option>
                                        <option >JUNIPER</option>
                                        </select>
                    	</div>
                        <div class="row">
                            <div class="col-25"><label>Product Type</label></div>
                            <div class="col-75"><select name="product_type" >
                            			<option ><?=$editrow['product_type'];?></option>
                                        <option>Router</option>
                                        <option>Switch</option>
                                        <option>Bridge</option>
                                        </select></div>
                    	</div>
                        <div class="row">
                            <div class="col-25"><label>Product Price</label></div>
                            <div class="col-75"><input type="text" name="product_price" value="<?=$editrow['product_price'];?>"></div>
                        </div>
                        <div class="row">
                            <div class="col-25"><label>Product Photo</label></div>
                            <div class="col-75"><input type="file" name="product_photo" />
                            <img src="images/<?=$editrow['product_photo'];?>" height="50px" width="100px"/></div>
                         </div>
                         <div class="row">
                            <div class="col-25"><label>Product Description</label></div>
                            <div class="col-75"><textarea name="product_description" rows="15">
                            <?=$editrow['product_description'];?>
                            </textarea></div>
                        </div>
                        <div class="row">
                         <input type="submit" name="update" value="Update">
                       </div>
            </form>
        </div>
    </body>
</html>