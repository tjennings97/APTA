<!--
Author: Tamara Jennings
Creation Date: February 23, 2019
Capstone: Academic Progress Tracker for Athletics
Filename: showPlayers.php
Purpose: list players' information
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
	<!--right side of page-->
	<div class='box'>
		<h2>Players</h2>
		
		<button class="coolButton" type="button" onclick="window.location.href='CreatePlayer.php'">Add Player</button>
		<br/><br/>

		<div style = "width: 100%;">
			<table width = "100%">
				<tr style = "background-color: #CEC7BF">
					<td><strong>#</strong></td>
					<td><strong>First</strong></td>
					<td><strong>Last</strong></td>
					<td><strong>Email</strong></td>
					
				</tr>

			<?php
				$playerquery = "SELECT Fname, Lname, Jersey, Email
				FROM Player ORDER BY Jersey";
				$playerresult = mysqli_query($connection, $playerquery);
				$playerrows = mysqli_num_rows($playerresult);
				
				for($i=0; $i<$playerrows; $i++)
				{
					$jersey = get_mysqli_result($playerresult, $i, "Jersey");
					$fname = get_mysqli_result($playerresult, $i, "Fname");
					$lname = get_mysqli_result($playerresult, $i, "Lname");
					$email = get_mysqli_result($playerresult, $i, "Email");

					echo '<tr>';
					echo "<td>$jersey</td>";
					echo "<td>$fname</td>";
					echo "<td>$lname</td>";
					echo "<td>$email</td>";
					echo "</tr>\n";


				} // end for
				db_close();
					
			?>
			</table>
		</div>
	</div>

	<!--left side of page-->
	<div class='box1'>
		<br/><br/>
		<!--<img class='bear' src = "bear2.jpg" alt = "bear logo">-->
		<button class ='button' type="button" onclick="window.location.href='CoachHome.php'">Home</button>
		<button class ='button' type="button" onclick="">Players</button>
		<button class ='button' type="button" onclick="alert('Hello world!')">Reports</button>
		<button class ='button' type="button" onclick="alert('Hello world!')">Messages</button>
		<button class ='button' type="button" onclick="alert('Hello world!')">Requests</button>
		<button class ='button' type="button" onclick="window.location.href='logout.php'">Logout</button>
	</div>
</div>

<?php require_once("footer.html");?>

<!--end showPlayers.php-->
