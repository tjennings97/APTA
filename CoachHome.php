<!--
Author: Tamara Jennings
Creation Date: February 23, 2019
Capstone: Academic Progress Tracker for Athletics
Filename: CoachHome.php
Purpose: Home page for coaches
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
?>

<div>
	<!--Notifications: right side of page-->
	<div class='box'>
		<h2>Hello, <?php echo"<script type=\"text/javascript\">document.write(name)</script>"; ?>!</h2>
		<p>Here's your dashboard. </p>
		<div style = "border: 2px solid black; width: 100%; height: 40%">
			<h4 style= "font-style: italic">Notifications</h4>
		</div>
	</div>
	<!--Menu: left side of page-->
	<div class='box1'>
		<br/><br/>
		<!--<img class='bear' src = "bear2.jpg" alt = "bear logo">-->
		<button class ='button' type="button" onclick="">Home</button>
		<button class ='button' type="button" onclick="window.location.href='showPlayers.php'">Players</button>
		<button class ='button' type="button" onclick="alert('Hello world!')">Reports</button>
		<button class ='button' type="button" onclick="alert('Hello world!')">Messages</button>
		<button class ='button' type="button" onclick="alert('Hello world!')">Requests</button>
		<button class ='button' type="button" onclick="window.location.href='logout.php'">Logout</button>
	</div>
</div>

<?php require_once("footer.html");?>

<!--end CoachHome.php-->
