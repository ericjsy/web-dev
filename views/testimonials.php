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
	<link rel="stylesheet" href="../style/testimonials.css">
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
		<h1>
			Reviews
		</h1>
		<div class="boxes">
			<div class="box1">
				<div class="text1">
					<h2>Jen Graziano Mangano; West Vancouver</h2>
					<p class="text"><q>Thanks for creating this beautiful cake for my daughter's birthday!
						It's gorgeous! Thanks so much for the detailed cookies.</q>
					</p>
				</div>
			</div>
			<div class="box2">
				<div class="text1">
					<h2>Yezlul and Mchel; Vancouver</h2>
					<p class="text"><q>Best. Cake. Ever!!! Madeleine's created my vision better than I even envisioned it! 
						Unbelievable! Excellent customer service. Efficient, Professional & Patient.</q>
					</p>
				</div>
			</div>
			<div class="box3">
				<div class="text1">
					<h2>Megan & Chris; New Westminster</h2>
			
					<p class="text"><q>The cake you made for our wedding was even more beautiful than we imagined, 
								and needless to say it tasted excellent too. Thank you for making our dream come true.</q></p>
				</div>
			</div>
		</div>
	</main>
	<?php include 'footer.php'; ?>
</body>

</html>