<?php
	session_start();
?>
<!DOCTYPE html>
	<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Madeleine's</title>
	<link rel="stylesheet" href="../style/base.css" media="screen">
	<link rel="stylesheet" href="../style/signin.css" media="screen">
	<link rel="stylesheet" href="../style/form.css" media="screen">
	<link rel="stylesheet" href="../style/printbase.css" media="print">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Italianno">
	<!-- <script src="../javascript/signin.js"></script> <!--Positioning?--> 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script>
	<!--
		$.noConflict();
	//-->
	</script>
	<script src="../javascript/backtop.js"></script>
</head>

<body>
<?php
	if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
		echo '<ul class="err">';
		foreach($_SESSION['ERRMSG_ARR'] as $msg) {
			echo '<li>',$msg,'</li>'; 
		}
		echo '</ul>';
		unset($_SESSION['ERRMSG_ARR']);
	}
?>
	<?php include 'header.php'; ?>
    <main id ="main">
		<img id="printlogo" src="../images/whitelogo.png" alt="print logo" width="374" height="168">
		<a href="#" class="backup fa fa-chevron-circle-up fa-5x"></a>
		<div id="wrapper">
			<div id="leftcol">
				<h2>
					Sign in
				</h2>
				<form id="login" action="login.php" method="post" onsubmit="return validLogin()">
					<fieldset>
						<ul>
							<li>
								<label for="txtUsername">
									Username <span class="required">*</span><br>
								</label>
								<input 
									type="text" 
									name="txtUsername" 
									id="txtUsername" 
									placeholder="Username"
									onblur="warnInvalidUsername('txtUsername')">
							</li>
							<li id="errUsername" class="errorMessage"></li>
							<li>
								<label for="txtPassword">
									<br>Password <span class="required">*</span><br>
								</label>
								<input 
									type="password" 
									name="txtPassword" 
									id="txtPassword"
									placeholder="********">
							</li>
							<li>
								<input 
									class="submit" 
									type="submit" 
									name="login"
									accesskey="L"							
									value="Login">
							</li>
									
						<li id="floatRight">
							<br> Remember me 
							<input 
								type="checkbox" 
								id="chkRemember" 
								name="chkRemember">
						</li>		
						<li id="errLogin"></li>
						</ul>
					</fieldset>
				</form>
			</div>
			<div id="rightcol">
				<h2>
					Create a new account
				</h2>
				<form id="signIn" action="register.php" method="post" onsubmit="return validSignup()">	
					<fieldset>
						<ul>
							<li>
								<label for="txtFirstName">
									First Name <span class="required">*</span><br>
								</label>
								<input  
									type="text" 
									name="txtFirstName" 
									id="txtFirstName" 
									placeholder="Your first name"
									onblur="warnInvalidFirstName('txtFirstName')">
							</li>
							<li id="errFirstName" class="errorMessage"></li>
							<li>
								<label for="txtLastName">
									<br>Last Name <span class="required">*</span><br>
								</label>
								<input  
									type="text" 
									name="txtLastName" 
									id="txtLastName" 
									placeholder="Your last name"
									onblur="warnInvalidLastName('txtLastName')">
							</li>
							<li id="errLastName" class="errorMessage"></li>
							<li>
								<label for="txtNewUser">
									<br>Username <span class="required">*</span><br>
								</label>
								<input  
									type="text" 
									name="txtNewUser" 
									id="txtNewUser" 
									placeholder="Username"
									onblur="warnInvalidNewUser('txtNewUser')">
							</li>
							<li id="errNewUser" class="errorMessage"></li>
							<li>	
								<label for="txtNewPassword">
									<br>Password <span class="required">*</span><br>
								</label>
								<input  
									type="password" 
									name="txtNewPassword" 
									id="txtNewPassword" 
									placeholder="********"
									onblur="warnInvalidPassword('txtNewPassword')">
							</li>
							<li id="errPassword" class="errorMessage"></li>
							<li>	
								<label for="txtVerify">
									<br>Verify Password <span class="required">*</span><br>
								</label>
								<input 
									type="password" 
									name="txtVerify" 
									id="txtVerify" 
									placeholder="********"
									onblur="verifyMatchingPassword('txtVerify')">
							</li>
							<li id="errVerify" class="errorMessage"></li>
							<!--O <li>									
								<label for="txtEmail">
									<br>E-mail <span class="required">*</span><br>
								</label>
								<input  
									type="text" 
									name="txtEmail" 
									id="txtEmail" 
									placeholder="name@domain.com"
									onblur="warnInvalidEmail('txtEmail')">
							</li>
							<li id="errEmail" class="errorMessage"></li> -->
							<li>
								<input 
									type="submit" 
									class="submit" 
									name="submit"
									accesskey="S"
									value="Submit">
							</li>
							<li id="errSignUp"></li>
						</ul>
					</fieldset>
				</form>	
			</div>
		</div>
	</main>	
	<?php include 'footer.php'; ?>
</body>

</html>

