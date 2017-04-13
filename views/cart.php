<?php
	include 'functions.php';
	require_once('config.php');
	session_start();

	// Connect to server and select database.
	($GLOBALS["___mysqli_ston"] = mysqli_connect(DB_HOST,  DB_USER,  DB_PASSWORD))or die("cannot connect, error: ".((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
	((bool)mysqli_query($GLOBALS["___mysqli_ston"], "USE " . constant('DB_DATABASE')))or die("cannot select DB, error: ".((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
	$tbl_name="topic"; // Table name // CHANGE ME
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Madeleine's</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
	<link rel="stylesheet" href="../style/base.css" media="screen">
	<link rel="stylesheet" href="../style/cart.css" media="screen">
	<link rel="stylesheet" href="../style/printbase.css" media="print">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
	<script src="../javascript/cart.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Italianno">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script>
	<!--
		$.noConflict();
	//-->
	</script>
	<script src="../javascript/backtop.js"></script>
</head>

<body>
	<?php include 'header.php'; ?>
	<main id="main">
		<a href="#" class="backup fa fa-chevron-circle-up fa-5x"><span class="emptyLink">Back to Top</span></a>
		<img id="printlogo" src="../images/whitelogo.png" alt="print logo" width="374" height="168">
		<form class="cart" action="checkout.php" method="post" onsubmit="return validCart(txtQuantity1, txtQuantity2, txtQuantity3, txtQuantity4)">
		
		<div id="leftcont">
		<h1> Your cart </h1>
			<table>
				<tr>
					<th class="flex2">Item</th>
					<th class="flex1">Unit Price</th>
					<th class="flex1">Quantity (1-100)</th>
					<th class="flex1">Unit Subtotal</th>
				</tr>
				<tr> 
					<td class="flex2" id="img1"><img src="../images/products/cakes3.jpg" alt="cake3"><label for="txtQuantity1" class="emptyLink"><span class="prodname">Strawberry Cake</span></label></td>
					<td class="flex1" id="unitp1">$1.00</td>
					<td class="flex1" id="qty1"><input id="txtQuantity1" type="text" name="txtQuantity1" onblur="onBlur()"></td>
					<td class="flex1" id="unitst1">$0.00</td>
				</tr>
				<tr> 
					<td class="flex2" id="img2"><img src="../images/products/cakes2.jpg" alt="cake2"><label for="txtQuantity2" class="emptyLink"><span class="prodname">Fluff Cake</span></label></td>
					<td class="flex1" id="unitp2">$2.00</td>
					<td class="flex1" id="qty2"><input id="txtQuantity2" type="text" name="txtQuantity2" onblur="onBlur()"></td>
					<td class="flex1" id="unitst2">$0.00</td>
				</tr>
				<tr> 
					<td class="flex2" id="img3"><img src="../images/products/brownies2.jpg" alt="brownies2"><label for="txtQuantity3" class="emptyLink"><span class="prodname">Brown Cookie</span></label></td>
					<td class="flex1" id="unitp3">$5.00</td>
					<td class="flex1" id="qty3"><input id="txtQuantity3" type="text" name="txtQuantity3" onblur="onBlur()"></td>
					<td class="flex1" id="unitst3">$0.00</td>
				</tr>
				<tr> 
					<td class="flex2" id="img4"><img src="../images/products/cupcakes3.jpg" alt="cupcake3"><label for="txtQuantity4" class="emptyLink"><span class="prodname">Vanilla Cupcake</span></label></td>
					<td class="flex1" id="unitp4">$10.00</td>
					<td class="flex1" id="qty4"><input id="txtQuantity4" type="text" name="txtQuantity4" onblur="onBlur()"></td>
					<td class="flex1" id="unitst4">$0.00</td>
				</tr>
			</table>
		</div>
		<div id="rightcont">
			<div id="checkout">
				<div id="receipt">Your receipt </div>
				<div class="extraspace"></div>
				<div id="order">
					<p><span class="leftside">Subtotal:</span><span class="rightside" id="txtSubtotal">$0.00</span></p>
					<p><span class="leftside">Tax: </span><span class="rightside" id="txtTax">$0.00</span></p>
					<p><span class="leftside">Pickup time: </span><span class="rightside" id="txtPickup"> Apr. 18th 2017 </span></p>				
					<p><span class="leftside">Total: </span><span class="rightside" id="txtTotal">$0.00</span></p>
					<div><span id="errCart" class="errorMessage">&nbsp;</span></div>
				</div>
				<div class="finalize">
					<input id="submit" type="submit" value="CHECKOUT">
				</div>
			</div>
		</div>
		</form>
		<div class="clear"></div>
	</main>
	<?php include 'footer.php'; ?>
</body>
</html>
