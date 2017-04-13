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
	<meta charset="utf-8">
	<title>Madeleine's</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
	<link rel="stylesheet" href="../style/base.css" media="screen">
	<link rel="stylesheet" href="../style/useraccount.css" media="screen">
	<link rel="stylesheet" href="../style/printbase.css" media="print">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
	<!--main content here-->
	<main id="main">
		<img id="printlogo" src="../images/whitelogo.png" alt="print logo" width="374" height="168">
		<div class="uinfo">
			<div class="leftcol">
				<div class="userinfo">
					<img src="../images/user.png" alt="Your picture" width="200" height="200">
					<h2>John Doe</h2><hr>
				</div>
				<div class="foods">
					<div id="allergies">
						<p>Allergies</p><br>
						<img src="../images/icons/peanut.png" alt="Peanut" width="35" height="35">
						<img src="../images/icons/egg.png" alt="Egg" width="35" height="35">
						<img src="../images/icons/milk.png" alt="Milk" width="35"	height="35">
					</div>
					<table id="likes">
						<caption>Favourites</caption>
						<tr>
							<td><img src="../images/products/cakes3.jpg" alt="Cakes" width="110" height="110"></td>
							<td><img src="../images/products/brownies2.jpg" alt="Brownies" width="110" height="110"></td>
							<td><img src="../images/products/donut2.jpg" alt="Donut" width="110" height="110"></td>
						</tr>
						<tr>
							<td>Cakes</td>
							<td>Brownies</td>
							<td>Donut</td>
						</tr>
					</table>
				</div>
			</div>
			<div class="rightcol">
				<div class="accinfo">
					<h1> Account info</h1>
					<div id="email">
						<p> E-mail: desserts@madeleine.ca 
						<!-- <button class="change">Change E-mail</button> -->
						</p>
					</div>
					<div class="clear"></div>
					<br>
					<div id="password">
						<p>Password: ********
							<!-- <button class="change">Change password</button> -->
						</p>
					</div>
					<div class="clear"></div>
					<br>
					<div class="orders">
						<div id="previous">
							Previous pastries
							<div class="clear"></div>
							<br>
							<img src="../images/products/cakes3.jpg" alt="Strawberry Cake" width="150" height="112">
							<img src="../images/products/cakes2.jpg" alt="Chocolate Tart" width="150" height="112">
							<img src="../images/products/cupcakes2.jpg" alt="Chocolate Cupcake" width="150" height="112">
							<img src="../images/products/cupcakes.jpg" alt="Lime Cupcake" width="150" height="112">
						</div>
					</div>
				</div>
			</div>
		</div>
		<a href="#" class="backup fa fa-chevron-circle-up fa-5x"><span class="emptyLink">Back to Top</span></a>
	</main>
	<?php include 'footer.php'; ?>
</body>

</html>