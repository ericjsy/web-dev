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
	<link rel="stylesheet" href="../style/catering.css" media="screen">
	<link rel="stylesheet" href="../style/form.css" media="screen">
	<link rel="stylesheet" href="../style/printbase.css" media="print">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="../javascript/catering.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Italianno">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script>
	<!--
		$.noConflict();
	//-->
	</script>
	<script src="../javascript/backtop.js"></script>
	
	<!-- Widgets -->
	
	<!-- Datepicker -->
	<link rel="stylesheet" href="../widgets/datepicker/jquery-ui.css">
	<script src="../widgets/datepicker/external/jquery/jquery.js"></script>
	<script src="../widgets/datepicker/jquery-ui.js"></script>
	
	<!-- Wickedpicker -->
	<link rel="stylesheet" href="../widgets/wickedpicker/stylesheets/wickedpicker.css">
	<script src="../widgets/wickedpicker/src/wickedpicker.js"></script>
</head>

<body>
	<?php include 'header.php'; ?>
	<!--main content here-->
	<main id="main">
		<img id="printlogo" src="../images/whitelogo.png" alt="print logo" width="374" height="168">	
		<div id="wrapper">
			<div id="catinfo">
				<h1>Catering Form</h1>
				<p>
					We can accommodate all types of functions that require sweets! Please provide at least 2 weeks notice and a minimum of 50 guests and a maximum of 250 guests. 
				<br><br>All fields marked with an <span class="required">*</span> are required.
				</p>
			</div>
			<form id="cateringForm" action="http://webdevfoundations.net/scripts/formdemo.asp" method="post" onsubmit="return validCatering()">
				<fieldset>
					<legend class="emptyLegend"></legend>
					<h2>
						Contact Information
					</h2>
					<ul>
						<li>
							<label for="txtFirstName">
								First Name<span class="required">*</span><br>
							</label>
							<input 
								type="text" 
								id="txtFirstName" 
								name="txtFirstName" 
								placeholder="First name"
								onblur="warnInvalidName('txtFirstName')">
						</li>
						<li id="errFirstName" class="errorMessage"></li>
						<li>
							<label for="txtLastName">
								<br>Last Name <span class="required">*</span><br>
							</label>
							<input 
								type="text" 
								id="txtLastName" 
								name="txtLastName" 
								placeholder="Last name"
								onblur="warnInvalidName('txtLastName')">
						</li>
						<li id="errLastName" class="errorMessage"></li>
						<li>
							<label for="txtPhone_0">
								<br>Contact Number <span class="required">*</span>
							</label>
							<br><input 
								type="text" 
								class="tel"
								id="txtPhone_0"
								name="txtPhone_0" 
								placeholder="###"
								onblur="warnInvalidPhone('txtPhone_0', 'txtPhone_1', 'txtPhone_2')"> <label for="txtPhone_1">-</label>
							<input 
								type="text" 
								class="tel" 
								id="txtPhone_1"
								name="txtPhone_1" 
								placeholder="###"
								onblur="warnInvalidPhone('txtPhone_0', 'txtPhone_1', 'txtPhone_2')"> <label for="txtPhone_2">-</label>
							<input 
								type="text" 
								class="tel" 
								id="txtPhone_2"
								name="txtPhone_2" 
								placeholder="####"
								onblur="warnInvalidPhone('txtPhone_0', 'txtPhone_1', 'txtPhone_2')">
						</li>
						<li id="errPhone" class="errorMessage"></li>
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
					</ul>
				</fieldset>
				<fieldset>
					<legend class="emptyLegend"></legend>
					<h2>
						Event Information
					</h2>
					<ul>
						<li>
							<label for="txtOrganization">
								Organization<br>
							</label>
							<input 
								type="text" 
								id="txtOrganization" 
								name="txtOrganization" 
								placeholder="Organization">
						</li>
						<li>
							<label for="txtAddress">
								<br>Address <span class="required">*</span><br>
							</label>
							<input 
								type="text" 
								id="txtAddress" 
								name="txtAddress" 
								placeholder="Address"
								onblur="warnInvalidAddress('txtAddress')">
						</li>
						<li id="errAddress" class="errorMessage"></li>
						<li>
							<label for="txtDate">
								<br>Date of Event <span class="required">*</span><br>
							</label>
							<input 
								type="text" 
								id="txtDate" 
								name="txtDate"
								placeholder="MM/DD/YYYY"
								onchange="warnInvalidDate('txtDate')">
						</li>
						<li id="errDate" class="errorMessage"></li>
						<li>
							<label for="txtStartTime">
								<br>Start Time of Event <span class="required">*</span><br>
							</label>
							<input 
								type="text" 
								id="txtStartTime" 
								name="txtStartTime"
								placeholder="H : MM TT"
								onchange="warnInvalidStartTime()">
						</li>
						<li id="errStartTime" class="errorMessage"></li>
						<li>
							<label for="txtEndTime">
								<br>End Time of Event <span class="required">*</span><br>
							</label>
							<input 
								type="text" 
								id="txtEndTime" 
								name="txtEndTime"
								placeholder="H : MM TT"
								onchange="warnInvalidEndTime()">
						</li>
						<li id="errEndTime" class="errorMessage"></li>
					</ul>
				</fieldset>
				<fieldset>
					<legend class="emptyLegend"></legend>
					<h2>
						Order Form
					</h2>
					<ul>
						<li>
							<label for="lstFunction">
								Type of Function <span class="required">*</span><br>
							</label>
							<input 
								type="text" 
								id="lstFunction" 
								name="lstFunction" 
								placeholder="Function"
								list="functions"
								onblur="warnInvalidName('lstFunction')">
									<datalist id="functions">
										<option value="Birthday">
										<option value="Corporate">
										<option value="Social">
										<option value="Wedding">
									</datalist>
						</li>
						<li id="errFunction" class="errorMessage"></li>
						<li>
							<label for="txtGuests">
								<br>Number of Guests <span class="required">*</span><br>
							</label>
							<input 
								type="text" 
								id="txtGuests" 
								name="txtGuests" 
								placeholder="Number of Guests"
								onblur="warnInvalidGuests('txtGuests')">
						</li>
						<li id="errGuests" class="errorMessage"></li>
						<li>
							<div id="desired">
								<br>Desired Product(s):<br>
								<table>
									<tr>
										<td>
											<label for="chkBrownies">Brownies</label>
										</td>
										<td>
											<input 
												type="checkbox" 
												id="chkBrownies" 
												name="chkBrownies" 
												value="yes">
										</td>
										<td>
											<label for="chkCakes">Cakes</label>
										</td>
										<td>
											<input 
												type="checkbox" 
												id="chkCakes" 
												name="chkCakes" 
												value="yes">
										</td>
										<td>
											<label for="chkCookies">Cookies</label>
										</td>
										<td>
											<input 
												type="checkbox" 
												id="chkCookies" 
												name="chkCookies" 
												value="yes">
										</td>
									</tr>
									<tr>
										<td>
											<label for="chkCupcakes">Cupcakes</label>
										</td>
										<td>
											<input 
												type="checkbox" 
												id="chkCupcakes" 
												name="chkCupcakes" 
												value="yes">
										</td>
										<td>
											<label for="chkDonuts">Donuts</label>
										</td>
										<td>
											<input 
												type="checkbox" 
												id="chkDonuts" 
												name="chkDonuts" 
												value="yes">
										</td>
										<td>
											<label for="chkMacarons">Macarons</label>
										</td>
										<td>
											<input 
												type="checkbox" 
												id="chkMacarons" 
												name="chkMacarons" 
												value="yes">
										</td>
								</table>
							</div>
						</li>
						<li>
							<label for="taAllergies">
								<br>Dietary Restrictions<br>
							</label>
							<textarea 
								id="taAllergies" 
								name="taAllergies" 
								placeholder="Enter your allergies here."
								cols="41" 
								rows="4"></textarea>
						</li>
						<li>
							<label for="taComments">
							<br>Additional Information<br>
							</label>
							<textarea 
								id="taComments" 
								name="taComments" 
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
						<li id="errCatering" class="errorMessage"></li>
					</ul>
				</fieldset>
			</form>
		</div>
		<!--leave the id="top" somewhere so we have a back to top link-->
		<a href="#" class="backup fa fa-chevron-circle-up fa-5x"><span class="emptyLink">Back to Top</span></a>
	</main>
	<?php include 'footer.php'; ?>

	<!-- Widgets -->
	<script>
	<!--
	var $j = jQuery.noConflict();
	
	$j( function() {
		$j( "#txtDate" ).datepicker();
	} );
	
	$j('#txtStartTime').wickedpicker();
	$j('#txtEndTime').wickedpicker();
	//-->
	</script>
	
</body>

</html>













