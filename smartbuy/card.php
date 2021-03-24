

<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM product_info WHERE product_id='" . $_GET["product_id"] . "'");
			$itemArray = array($productByCode[0]["product_id"]=>array('product_name'=>$productByCode[0]["product_name"], 'product_id'=>$productByCode[0]["product_id"], 'quantity'=>$_POST["quantity"], 'product_price'=>$productByCode[0]["product_price"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["product_id"],$_SESSION["cart_item"])) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["product_id"] == $k)
								$_SESSION["cart_item"][$k]["quantity"] = $_POST["quantity"];
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["product_id"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>
<HTML>
<HEAD>


  
		

<body>
<div class="container">    
  <div class="row">
    <div class="col-lg-offset-1 col-lg-3 col-sm-offset-1 col-sm-3 col-md-offset-1 col-md-3">
    
    </div>
  </div>
<TITLE>Simple PHP Shopping Cart</TITLE>
<style>
bady{background-color:#ad0000}
</style>
</HEAD>
<body>
    <div id="maincon">
<div id="shopping-cart">
<div class="txt-heading">Shopping Cart <a id="btnEmpty" href="card.php?action=empty">Empty Cart</a></div>
<?php
if(isset($_SESSION["cart_item"])){
    $item_total = 0;
?>	
    <div id="tables">
<table cellpadding="10" cellspacing="10" align="CENTER">
<tbody>
<tr  class="tr">
<th><strong>Name</strong></th>
<th><strong>product id</strong></th>
<th><strong>Quantity</strong></th>
<th><strong>Price</strong></th>
<th><strong>Action</strong></th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
		?>
				<tr>
				<td ><strong><?php echo $item["product_name"]; ?></strong></td>
				<td><?php echo $item["product_id"]; ?></td>
				<td><?php echo $item["quantity"]; ?></td>
				<td align=right><?php echo "$".$item["product_price"]; ?></td>
				<td><a href="card.php?action=remove&product_id=<?php echo $item["product_id"]; ?>" class="btnRemoveAction">Remove Item</a></td>
				</tr>
				<?php
        $item_total += ($item["product_price"]*$item["quantity"]);
		}
		?>

<tr>
<td colspan="5" align=right><strong>Total:</strong> <?php echo "$".$item_total; ?></td>
</tr>
</tbody>
</table>		
  <?php
}
?>
        </div>
        </div>
        </div>
        </div>
</body>
</div>
<!--<div id="product-grid">
	<div class="txt-heading">Products</div>
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM product_info ORDER BY id ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
			<form method="post" action="card.php?action=add&code=<?php echo $product_array[$key]["product_id"]; ?>">
			
			<div><strong><?php echo $product_array[$key]["product_name"]; ?></strong></div>
			<div class="product-price"><?php echo "$".$product_array[$key]["product_price"]; ?></div>
			<div><input type="text" name="quantity" value="1" size="2" /><input type="submit" value="Add to cart" class="btnAddAction" /></div>
			</form>
		</div>
	<?php
			}
	}
	?>
	
    </div></div>
	-->
	
</BODY>
</HTML>




