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
	<link rel="stylesheet" href="../style/contact.css" media="screen">
	<link rel="stylesheet" href="../style/form.css" media="screen">
	<link rel="stylesheet" href="../style/printbase.css" media="print">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="../javascript/contact.js"></script>	
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
		<div id="wrapper">
			<div id="leftcol">
				<h1>
					Location
				</h1>
				<div id="map"><img src="../images/map.png" alt="map" width="303" height="302"></div>
				<div id="location">
					1234 Bakery Lane
					<br>Vancouver, British Columbia
					<br>Canada V8W 5K9
				</div>
			</div>
			<div id="rightcol">
				<h1>
					Feedback
				</h1>
				<form name="contact" action="http://webdevfoundations.net/scripts/formdemo.asp" method="post" onsubmit="return validFeedback()">
					<fieldset>
						<legend class="emptyLegend"></legend>
						<ul>
							<li>
								<label for="txtName">
									Name <span class="required">*</span><br>
								</label>
								<input 
									type="text" 
									id="txtName" 
									name="txtName" 
									placeholder="Name"
									onblur="warnInvalidName('txtName')">
							</li>
							<li id="errName" class="errorMessage"></li>
							<li>
								<label for="txtEmail">
									<br>Email <span class="required">*</span><br>
								</label>
								<input 
									type="text" 
									id="txtEmail" 
									name="txtEmail" 
									placeholder="name@domain.com"
									onblur="warnInvalidEmail('txtEmail')">
							</li>
							<li id="errEmail" class="errorMessage"></li>
							<li>
								<label for="taFeedback">
									<br>Feedback <span class="required">*</span><br>
								</label>
								<textarea 
									name="taFeedback" 
									id="taFeedback" 
									placeholder="Enter your comments here."
									cols="41" 
									rows="4"></textarea>
							</li>
							<li>
								<input 
									type="submit"
									class="submit"
									name="submit"
									value="Submit">
							</li>
							<li id="errFeedback"></li>
						</ul>
					</fieldset>
				</form>
			</div>
		</div>
	</main>
	<?php include 'footer.php'; ?>
</body>
</html>












