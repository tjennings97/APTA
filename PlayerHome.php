<!--
Author: Tamara Jennings
Creation Date: February 23, 2019
Capstone: Academic Progress Tracker for Athletics
Filename: PlayerHome.php
Purpose: Home page for players
-->
<?php
     session_start();
if(isset($_SESSION['email'])) {
    echo"<script type= \"text/javascript\"></script>";
    if($_SESSION['accessLvl'] != 2) {
        echo"<script type= \"text/javascript\">window.alert('You do not have the correct permissions for this page.');</script>";
	echo"<meta http-equiv=\"refresh\" content=\"0; url=./logout.php\" />";
    }
    echo"<script type=\"text/javascript\">var name= \"{$_SESSION['name']}\"</script>";
}
else {
    echo"<script type= \"text/javascript\">window.alert('You are not logged in.');</script>";
    echo"<meta http-equiv=\"refresh\" content=\"0; url=./logout.php\" />";

}
require_once("head.html");
?>

<div>
    <!--right side of page-->
    <div class='box'>
        <br/><br/>
        <!--<img class='bear' src = "bear2.jpg" alt = "bear logo">-->
        <button class ='button' type="button" onclick="alert('Hello world!')">Home</button>
        <p></p>
        <button class ='button' type="button" onclick="alert('Hello world!')">Classes</button>
        <button class ='button' type="button" onclick="alert('Hello world!')">Assignments</button>
        <button class ='button' type="button" onclick="alert('Hello world!')">Messages</button>
        <button class ='button' type="button" onclick="window.location.href='logout.php'">Logout</button>

    </div>
 <!--left side of page-->
    <div class='box'>
  <h2>Hello, <?php echo"<script type=\"text/javascript\">document.write(name)</script>"; ?>!</h2>
        <p>Here's your dashboard. </p>
        <div style = "border: 2px solid black; width: 75%; height: 40%">
            <h4 style= "font-style: italic">Notifications</h4>
        </div>
    </div>
</div>

   <?php require_once("footer.html");?>

<!--end PlayerHome.php-->

