<!--
Author: Tamara Jennings
Creation Date: February 23, 2019
Capstone: Academic Progress Tracker for Athletics
Filename: loginForm.php
Purpose: allow user to log in to their account
-->
<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<?php
     session_start();
     require_once("head.html");
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title>PHP Form page</title>
    </head>

    <?php
        if(isset($_SESSION['email'])){
            echo"<script type= \"text/javascript\">window.alert('You are already logged in.');</script>";
	    if($_SESSION['accessLvl'] == 1) {
                echo"<meta http-equiv=\"refresh\" content=\"0; url=./CoachHome.php\" />";
	    }
	    else {
                echo"<meta http-equiv=\"refresh\" content=\"0; url=./PlayerHome.php\" />";
	    }

        }
        else {
	  
            include('./dbconn.php');
            db_connect();

            // Query to get account information
            $cquery = "SELECT Email, Password FROM LoginInfo
            WHERE Email = '{$_POST['Email']}' AND Password = '{$_POST['Passwd']}'";
            $cresult = mysqli_query($connection,$cquery);
            $checkquery = mysqli_num_rows($cresult);

            // If there is not a match
            if($checkquery == 0) {
                echo "The information you entered does not match our records. Click <a href = \"login.php\">here<a> to retry";
            }

            // If there is a match
            else {
                // Get Access Level from database and set it as a sesstion variable
                $accessLvlquery = "SELECT AccessLvl FROM LoginInfo
                WHERE Email = '{$_POST['Email']}'";
                $accessLvlresult = mysqli_query($connection, $accessLvlquery);
                $accessLvlrows = mysqli_num_rows($accessLvlresult);
                $accessLvlID = get_mysqli_result($accessLvlresult, $accessLvlrows, "AccessLvl");

  
                // Set session variables
  	         $_SESSION['email'] = $_POST['Email'];
                 $_SESSION['accessLvl'] = $accessLvlID;
	 
                 if($_SESSION['accessLvl'] == 1) {

                     $namequery = "SELECT Fname FROM Coach WHERE Email = '{$_POST['Email']}'";
		     $nameresult = mysqli_query($connection, $namequery);
		     $namerows = mysqli_num_rows($nameresult);
		     $name = get_mysqli_result($nameresult, $namerows, "Fname");

                     $_SESSION['name'] = $name;

//                     echo '<p><a href = "CoachHome.php">Go to Coach Page</a></p>';
                     echo"<script type= \"text/javascript\">window.alert('Successful Coach Login');</script>";
                     echo"<meta http-equiv=\"refresh\" content=\"0; url=./CoachHome.php\" />";

                 }
                 else { 
		     $namequery = "SELECT Fname FROM Player WHERE Email = '{$_POST['Email']}'";
		     $nameresult = mysqli_query($connection, $namequery);
		     $namerows = mysqli_num_rows($nameresult);
		     $name = get_mysqli_result($nameresult, $namerows, "Fname");

                     $_SESSION['name'] = $name;

 		   //                     echo '<p><a href = "login.php">Go to Player Page</a></p>';
                     echo"<script type= \"text/javascript\">window.alert('Successful Player Login');</script>";
		     echo"<meta http-equiv=\"refresh\" content=\"0; url=./PlayerHome.php\" />";

                 }
             }
	
    db_close();
}

require_once("footer.html");

?>

<!--end loginForm.php-->



