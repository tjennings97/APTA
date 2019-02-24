<!--
Author: Tamara Jennings
Creation Date: February 23, 2019
Capstone: Academic Progress Tracker for Athletics
Filename: loginout.php
Purpose: logout of session and clear session variables
-->


<?php

session_start();

if(isset($_SESSION['email']))
  {
    //    print 'Session is set';
    $_SESSION['email'] = '';
    $_SESSION['accessLvl'] = 0;
    session_destroy();

  }

define('TITLE', 'Logout');
include("head.html");

print"You are logged out. Click <a href = \"login.php\">here</a> to return to the login page.";
include("footer.html");
?>
