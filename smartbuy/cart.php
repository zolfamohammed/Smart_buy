<?php 
session_start();
include "../conect/config.php";

if(isset($_POST["add"]))
{
	if(isset($_SESSION["cart"]))
	{
		$item_array_id = array_column($_SESSION["cart"], "product_id");
		if(!in_array($_GET["product_id"], $item_array_id))
		{
			$count = count($_SESSION["cart"]);
			$item_array = array(
			'product_id' => $_GET["product_id"],
			'item_name' => $_POST["hidden_name"],
			'product_price' => $_POST["hidden_price"],
			'item_quantity' => $_POST["quantity"]
			);
			$_SESSION["cart"][$count] = $item_array;
			echo '<script>window.location="cart.php"</script>';
		}
		else
		{
			echo '<script>alert("Products already added to cart")</script>';
			echo '<script>window.location="cart.php"</script>';
		}
	}
	else
	{
		$item_array = array(
		'product_id' => $_GET["product_id"],
		'item_name' => $_POST["hidden_name"],
		'product_price' => $_POST["hidden_price"],
		'item_quantity' => $_POST["quantity"]
		);
		$_SESSION["cart"][0] = $item_array;
	}
}
if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["cart"] as $keys => $values)
		{
			if($values["product_id"] == $_GET["product_id"])
			{
				unset($_SESSION["cart"][$keys]);
				echo '<script>alert("Product has been removed")</script>';
				echo '<script>window.location="index.php"</script>';
			}
		}
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/table_style.css" />
<title>Untitled Document</title>
<style>
 .home a:hover{
	 color:#2fce98;
 	 
	 }
 .home a{ text-decoration:none;
        color:#000;}
	 
</style>
</head>

<body>

	<br />
    <br />
	<br />
    <br />
	<h2 align="center" class="home"><a href="index.php"> Shopping Cart</a> </h2>
    <?php
	$query = "SELECT * FROM product_info ORDER BY product_id ASC";
	$result = mysql_query($query);
	
	?>
    
    <div class="product_table" align="center">
    <table id="product" align="center">
    <tr>
    <th width="40%">Product Name</th>
    <th width="10%">Quantity</th>
    <th width="20%">Price Details</th>
    <th width="15%">Order Total</th>
    <th width="5%">Action</th>
    <th>BUY</th>
    </tr>
    <?php
	if(!empty($_SESSION["cart"]))
	{
		$total = 0;
		foreach($_SESSION["cart"] as $keys => $values)
		{
			?>
            <tr>
            <td><?php echo $values["item_name"]; ?></td>
            <td><?php echo $values["item_quantity"] ?></td>
            <td>$ <?php echo $values["product_price"]; ?></td>
            <td>$ <?php echo number_format($values["item_quantity"] * $values["product_price"], 2); ?></td>
            <td><a href="cart.php?action=delete&product_id=<?php echo $values["product_id"]; ?>"><span>Remove</span></a></td>
            <td><a href="buy.php">buy</a></td>
            </tr>
            <?php 
			$total = $total + ($values["item_quantity"] * $values["product_price"]);
		}
		?>
        <tr>
        <td colspan="4" align="right">Total</td>
        <td align="right">$ <?php echo number_format($total, 2); ?></td>
        <td><a href="buy.php">buy</a></td>
        </tr>
        <?php
	}
	?>
    </table>
    </div>
      
                   
                  
    
</body>
</html>