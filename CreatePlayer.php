<!--
Author: Tamara Jennings
Creation Date: February 24, 2019
Capstone: Academic Progress Tracker for Athletics
Filename: createPlayer.php
Purpose: create player form to send to database
-->
<?php
	session_start();
	// if session is started
	if(isset($_SESSION['email']) && isset($_SESSION['email'])) {
    		echo"<script type= \"text/javascript\"></script>";
      		
		// if not Coach access level
        	if($_SESSION['accessLvl'] != 1) {
			// redirect to logout to clear session
			echo"<script type= \"text/javascript\">window.alert('You do not have the correct permissions for this page.');</script>";
			echo"<meta http-equiv=\"refresh\" content=\"0; url=./logout.php\" />";
        	}  
		
		// Correct access level
		echo"<script type=\"text/javascript\">var name= \"{$_SESSION['name']}\"</script>";
		include('./dbconn.php');
		db_connect();
	}

	// session is not started
	else {
		// redirect to logout with empty session variables
        	echo"<script type= \"text/javascript\">window.alert('You are not logged in.');</script>";
        	echo"<meta http-equiv=\"refresh\" content=\"0; url=./logout.php\" />";
	}
	require_once("head.html");
	require_once("createAccountFunctions.html");
?>

<div>
	<!--right side of page-->
	<div class='box'>
		<h2>Create Player</h2>
		<p>Fields marked with (*) are required.</p>
		<div style = "width: 100%;">
			<table class="no-border" width = "100%">
			<form method = "post"
			action = "createAccountForm.php"
			onsubmit = "return checkCreateAccount();"
			onreset = "return clearCreateAccountForm();">

			<input type = "hidden" name = "TO" value = "tjenn300&#64;live.kutztown.edu"/>
			<input type = "hidden" name = "SUBJECT" value = "Create Account"/>

			<tr><td class="no-border" width = "30%">      
				<span id = "FirstName_label">*First Name:</span>
			</td><td class="no-border">
				<input type = "text" name = "FirstName" size = "30"
				maxlength = "20" id = "FirstName"/><br/>
			</td></tr>

			<tr><td class="no-border">
				<span id = "LastName_label">*Last Name:</span>
			</td><td class="no-border">
				<input type = "text" name = "LastName" size = "30"
				maxlength = "25" id = "LastName"/><br/>
			</td></tr>

			<tr><td class="no-border">
				<span id = "Jersey_label">Jersey:</span>
			</td><td class="no-border">
				<input type = "text" name = "Jersey" size = "1"
				maxlength = "2" id = "Jersey"/><br/>
			</td></tr>      

			<tr><td class="no-border">
				<span id = "Email_label">*Email Address:</span>
			</td><td class="no-border">
				<input type = "text" name = "Email" size = "30"
				maxlength = "50" id = "Email"/><br/>
			</td></tr> 

			<tr><td class="no-border">
				<span id = "Passwd_label">*Password (at least 8 characters):</span>
			</td><td class="no-border">
				<input type = "password" name = "Passwd" size = "30"
				maxlength = "15" id = "Passwd"/><br/>
			</td></tr>      

			</table>
			<p>
				<input type = "submit" name = "submit" value = "Create Account"/>
				<input type = "reset" value = "Clear"/></p>
      
     			</form>

		</div>
	</div>

	<!--left side of page-->
		<div class='box1'>
			<br/><br/>
			<!--<img class='bear' src = "bear2.jpg" alt = "bear logo">-->
			<button class ='button' type="button" onclick="window.location.href='CoachHome.php'">Home</button>
			<button class ='button' type="button" onclick="window.location.href='showPlayers.php'">Players</button>
			<button class ='button' type="button" onclick="alert('Hello world!')">Reports</button>
			<button class ='button' type="button" onclick="alert('Hello world!')">Messages</button>
			<button class ='button' type="button" onclick="alert('Hello world!')">Requests</button>
			<button class ='button' type="button" onclick="window.location.href='logout.php'">Logout</button>
		</div>
	</div>


<?php require_once("footer.html");?>

<!--end CreatePlayer.php-->
