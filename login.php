<!--
Author: Tamara Jennings
Creation Date: February 23, 2019
Capstone: Academic Progress Tracker for Athletics
Filename: login.php
Purpose: Form to login
-->
<?php 
	session_start();
	require_once("head.html");
	require_once("loginFunctions.html");
?>

<div>
	<!--right side of page-->
	<div class='floating'>
		<img class='bear' src = "bear2.jpg" alt = "bear logo">
	</div>
	<!--left side of page-->
	<div class='floating'>
		<h2>Welcome!</h2>
		<p>Please sign in below.</p>

		<table class = "no-border">
		<!--login form-->
		<form method = "post"
		action = "loginForm.php"
		onsubmit = "return checkLogin();"
		onreset = "return clearLoginForm();">

		<input type = "hidden" name = "TO"
		value = "tjenn300&#64;live.kutztown.edu"/>
		<input type = "hidden" name = "SUBJECT" value = "Create Account"/>

		<tr>
			<td class="no-border">
				<span id = "Email_label">Email Address:</span></td>
			<td class="no-border">
				<input type = "text" name = "Email" size = "25"
				maxlength = "30" id = "Email"/><br/>
			</td>
		</tr>
		<tr>
			<td class="no-border">
				<span id = "Passwd_label">Password:</span>
			</td>
			<td class="no-border">
				<input type = "password" name = "Passwd" size = "25"
				maxlength = "30" id = "Passwd"/><br/>
			</td>
		</tr>
 		</table>

		<p><input class='coolButton' type = "submit" name = "submit" value = "Login"/>
		<input class='coolButton' type = "reset" value = "Clear"/></p>

		</form>

	</div>
</div>

<?php require_once("footer.html");?>

<!--end login.php-->
