<?php
	include 'conect/config.php';
	if(isset($_REQUEST['save'])){
		$product_name=$_REQUEST['product_name'];
		$product_company=$_REQUEST['product_company'];
		$product_type=$_REQUEST['product_type'];
		$product_price=$_REQUEST['product_price'];
		$product_description=$_REQUEST['product_description'];
		$product_photo=$_FILES['product_photo']['name'];
		
		if($product_name== NULL || $product_company==NULL || $product_type==NULL || $product_price==NULL || $product_description==NULL || $product_photo==NULL ){
		 echo '<script> alert("Please Enter All The Information ");</script>';	
			}else{
		$sql="insert into product_info(product_name, product_company, product_type, product_price, product_description, product_photo)values('$product_name','$product_company', '$product_type','$product_price','$product_description','$product_photo')";
		$res=mysql_query($sql);
		move_uploaded_file($_FILES['product_photo']['tmp_name'],"images/".$product_photo);
		
		if($res){
			echo "<script> window.alert('record added');</script>";
		}
		else
			print mysql_error();
			}
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
        <form method="post" enctype="multipart/form-data">
            <div class="row">
                 <div class="col-25">   <label>Product Name</label></div>
                 <div class="col-75"><input type="text" name="product_name" placeholder="Enter The Product Name.."/></div>
             </div>
             <div class="row">  
                   <div class="col-25"> <label>Product company</label></div>
                    <div class="col-75"><select name="product_company" >
                                        <option>CISCO</option>
                                        <option>HUAWEI</option>
                                        <option>JUNIPER</option>
                                        </select>
                    </div>
              </div>
              <div class="row">  
                   <div class="col-25"> <label>Product Type</label></div>
                    <div class="col-75"><select name="product_type" >
                                        <option>Router</option>
                                        <option>Switch</option>
                                        <option>Bridge</option>
                                        </select>
                    </div>
              </div>
              <div class="row">  
                    <div class="col-25"><label>Product Price</label></div>
                   <div class="col-75"> <input type="text" name="product_price" placeholder="Enter The Product Price.."/></div>
               </div>
               <div class="row"> 
                    <div class="col-25"><label>Product Photo</label></div>
                    <div class="col-75"><input type="file" name="product_photo" /></div>
                </div>
                <div class="row">
                   <div class="col-25"> <label>Product Description</label></div>
                    <div class="col-75"><textarea name="product_description"  rows="15" placeholder="Enter The Product description.."></textarea></div>
                  </div>
                  <div class="row">  
                    <input type="submit" name="save" value="save">
                  </div>
          
        </form>
    </div>
</html>