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
	<link rel="stylesheet" href="../style/aboutus.css" media="screen">
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
		<a href="#" class="backup fa fa-chevron-circle-up fa-5x"><span class="emptyLink">Back to Top</span></a>
		<img id="printlogo" src="../images/whitelogo.png" alt="print logo" width="374" height="168">
		<div>
			<h1>Welcome to Madeleine's!</h1>
		</div>	
		<div class="boxes">
			<div class="box1">
				<div class="text1">
					<h2>Our Philosophy</h2>
					<p class="philosophy">
						Baking with passion! That is how we started the business. We make our products with love and an eye for detail - baked to perfection.
					</p><br>
					<p class="philosophy">We treat our freshly baked breads, cookies, and cakes meticulously with top quality ingredients: the freshest, finest, and ripest to ensure you have exceptional flavor every bite.
					</p>
				</div>
			</div>
			<!--<hr>-->
			<div class="box2">
				<div class="text1">
					<h2>Our History</h2>
					<p class="philosophy"> 
						In 2007, Ryan and Eric unveiled Madeleine's by opening its doors to the Vancouver market at 1234 Bakery Lane. Ryan is a third generation baker, and his grandfather operated a bakery in Vancouver since 1925.
					</p><br>
					<p class="philosophy">Eric worked as a technical consultant for a bakery ingredient company before opening Madeleine's Bakery. 
					</p>
				</div>
				
			</div>
			
			<div class="box3">
				<div class= "text1">
					<h3>Meet our Chefs</h3>
					<p class="philosophy">
						Neda grew up in Iran, around a family that loved to cook. She ran a small bakery in Iran, and she moved to Canada in 2005. 
						Finally, she joined the successful Madeleine's in 2008.
					</p><br>
					<p class="philosophy">In 2000, Elizabeth completed her baking apprenticeship at Accent on Pastries in downtown Langley and went on to work in a number of Vancouver restaurants and bakeries before joining this team.
					</p>
				</div>
			</div>
		</div>
	</main>
	<?php include 'footer.php'; ?>
</body>

</html>



