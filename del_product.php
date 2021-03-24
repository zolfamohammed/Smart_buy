<?php
ini_set("display_errors","off"); 
include "conect/config.php";
if($_REQUEST['search']){
	 $search=$_REQUEST['search'];
	 $sql="select * from product_info where product_name like'".$search."%' OR product_type like'".$search."%' OR product_company like'".$search."%' OR product_id like'".$search."%'";
	
	}else{
$sql="select * from product_info";
	}

$res = mysql_query($sql);
if (isset($_REQUEST['delete']))
{
	
	$arraydelete=$_REQUEST['checkdelete'];
	foreach ($arraydelete as $product_id)
	{
		$deletesql="delete from product_info where product_id=".$product_id;
		$deleteres=mysql_query($deletesql);
	}
	header("location:del_product.php");
}
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/table_style.css" />
</head>
<body>
<?php
include('menu.php');
?>

<div class="product_table">
<form method="post">
			<div align="center">
        	<table align="center">
                <tr>
                	<td><input type="text" name="search" /></td>
                    <td><input type="submit" name="submit" value="search" /></td>
                </tr>
            </table>
      
			<br />
			</div>
    	<table border="2" align="center" id="product">
            <tr>
            	<th> Product Id</th>
                <th>Product Name</th>
                <th>Product company</th>
                <th>Product Type</th>
                <th>Product Price</th>
                <th>Product Description</th>
                <th>Product Photo</th>
                <th>Delete Product</th>
            </tr>
            	<?php
				while($row= mysql_fetch_array($res)){ 
				?>
            <tr>
            	<td><?=$row['product_id'];?></td>
                <td><?=$row['product_name'];?></td>
                <td><?=$row['product_company'];?></td>
                <td><?=$row['product_type'];?></td>
                <td><?=$row['product_price'];?></td>
                <td><?=$row['product_description'];?></td>
                <td><img src="images/<?=$row['product_photo'];?>" height="100px" width="100px"/></td>
                <td><input type="checkbox" name="checkdelete[]" value="<?=$row['product_id'];?>" /></td>
            </tr>
				<?php
                    } ?>
             <tr>
             	<td colspan=7></td>
                <td class="submit"><input type="submit" name="delete" value="Delete" /></td>
             </tr>
        </table>
  </form>
</div >
</body>
</html>