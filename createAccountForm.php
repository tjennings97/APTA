<!--
Author: Tamara Jennings
Creation Date: February 24, 2019
Capstone: Academic Progress Tracker for Athletics
Filename: createAccountForm.php
Purpose: check if player is in DB; if not, send to DB
-->
<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<?php
	session_start();
	require_once("head.html");
?>    

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<body>

	<?php
		include('./dbconn.php');
		db_connect();

		// Check that email is not already in the Player table
		$confirm1query = "SELECT Email FROM Player WHERE Email = '{$_POST['Email']}';";
		$confirm1result = mysqli_query($connection,$confirm1query);
		$confirm1rows = mysqli_num_rows($confirm1result);

		// Check that email is not already in the LoginInfo table
		$confirm2query = "SELECT Email FROM LoginInfo WHERE Email = '{$_POST['Email']}'";
		$confirm2result = mysqli_query($connection,$confirm2query);
		$confirm2rows = mysqli_num_rows($confirm2result);

		
		// If there are no matches
		if($confirm1rows == 0 && $confirm2rows == 0)
		{
			$accessLevel = 2; // Player Access Level is always 2
			
			// Insert user information into LoginInfo
			$cquery = "INSERT INTO LoginInfo (Email, Password, AccessLvl)
			VALUES ('{$_POST['Email']}', '{$_POST['Passwd']}', $accessLevel)";
			$cresult = mysqli_query($connection, $cquery);

			// Check that information is in the database
			$checkquery = "SELECT Email FROM LoginInfo WHERE Email = '{$_POST['Email']}'";
			$checkresult = mysqli_query($connection,$checkquery);
			$numCheck = mysqli_num_rows($checkresult);
    
			// If info isn't in LoginInfo
			if($numCheck == 0){
				echo "alert('Not in LoginInfo.');";
			}  

			// If info IS in db
			else
			{
				echo "alert('in LoginInfo.');";
				
			}

			// Insert user information into Player
			if ($_POST['Jersey'] == "") {
				$cquery = "INSERT INTO Player (Fname, Lname, Email)
				VALUES ('{$_POST['FirstName']}', '{$_POST['LastName']}', '{$_POST['Email']}')";
			}
			else {
				$cquery = "INSERT INTO Player (Fname, Lname, Jersey, Email)
				VALUES ('{$_POST['FirstName']}', '{$_POST['LastName']}', 
				'{$_POST['Jersey']}', '{$_POST['Email']}')";
			}
			$cresult = mysqli_query($connection, $cquery);

			// Check that information is in the database
			$checkquery = "SELECT Email FROM LoginInfo WHERE Email = '{$_POST['Email']}'";
			$checkresult = mysqli_query($connection,$checkquery);
			$numCheck = mysqli_num_rows($checkresult);
    
			// If info isn't in LoginInfo
			if($numCheck == 0){
				echo "alert('Not in Player.');";
			}  

			// If info IS in db
			else
			{
				echo "alert('in Player.');";
			}

		}

		else
		{
		echo "There is already an account with the email: {$_POST['Email']}. 
		Click <a href=\"CreatePlayer.php\">here</a> to return to the Create Player page.";

		}
/*
$delete = "DELETE FROM Player Where Email = '{$_POST['Email']}'";
$dresult = mysqli_query($connection, $delete);

$checkresult = mysqli_query($connection,$confirmquery);
$numCheck = mysqli_num_rows($checkresult);
echo"$numCheck**";
*/
    require_once("footer.html");

?>
