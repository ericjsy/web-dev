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
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
	<link rel="stylesheet" href="../style/index.css" media="screen">
	<link rel="stylesheet" href="../style/printbase.css" media="print">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script>
	<!--
		$.noConflict();
	//-->
	</script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Italianno">	
	<script src="../javascript/backtop.js"></script>
	<link rel="stylesheet" href="../style/base.css" media="screen">
</head>

<body>
	<?php include 'header.php'; ?>
	<!--main content here-->
	<main id="main">
		<img id="printlogo" src="../images/whitelogo.png" alt="print logo" width="374" height="168">
		<a href="#" class="backup fa fa-chevron-circle-up fa-5x"></a>
		<div id="slideshow">
			<div class="w3-display-container">
			  <img class="mySlides" src="../images/slideshow/cupcakes.jpg" alt="Cupcake Slideshow" width="2048" height="961">
			  <img class="mySlides" src="../images/slideshow/fruitcake.jpg" alt="Fruitcake Slideshow" width="2048" height="961">
			  <img class="mySlides" src="../images/slideshow/macarons.jpg" alt="Macarons Slideshow" width="2048" height="961">
			  <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
				<div id="goleft" class="w3-left w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;</div>
				<div id="goright" class="w3-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>
				<span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span>
				<span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
				<span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span>
			  </div>
			</div>
		</div>
		<script src="../javascript/index.js"></script>
		
		<div id="content">
			<div class="subBanner">
				<div class="leftbox">
					<div class="promos"><p>Latest Event</p></div>
					<img id="epic1" src="../images/eventslices.jpg" alt="slice">
					<div class="overlay">
						<div class="text">
							<h2>
								Happy Valentines Day!
							</h2>
							<time datetime="2017-02-14">
								February 14, 2017
							</time>
							<p>
								It's that wonderful time of the year again!
							</p>
							<p>
								 We want to help you celebrate over some delicious desserts! Visit out products page and enjoy a 20% discount on <strong>all</strong> items at check-out.
							</p>
						</div>
					</div>
				</div>
				<div class="midbox">
					<div class="promos"><p>Dessert Sales</p></div>
					<img id="epic2" src="../images/eventcups.jpg" alt="cupcakes">
					<div class="overlay">
						<div class="text">
							<h2>
								Macaron Week!
							</h2>
							<time datetime="2017-03-22">
								March 22, 2017
							</time>	
							<p>
								Our macaron selection continues to grow as we experiment with seasonal flavors. We have just updated our current selection, so be sure to visit our products page! We are selling <strong>all</strong> macarons at 25% discount!
							</p>
						</div>
					</div>
				</div>
				<div class="rightbox">
					<div class="promos"><p>Special Events</p></div>
					<img id="epic3" src="../images/eventcakes.jpg" alt="cakes">
					<div class="overlay">	
						<div class="text">
							<h2>
								10th Anniversary!
							</h2>
							<time datetime="2017-01-30">
								January 30, 2017
							</time>
							<p>
								Madeleine's is celebrating its 10th Anniversary! We would like to show our appreciation by giving 20% discount to everyone! 
							</p>
							<p>
								Thank you Vancouver for your continued support!
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<?php include 'footer.php'; ?>
</body>

</html>