<!--
 // Author: Tamara Jennings
 // Creation Date: February 23, 2019
 // Capstone: Academic Progress Tracker for Athletics
 // Filename: dbconn.php
 // Purpose: establish a connection to the database
-->

<?php

	$connection;

	// function name: db_connect
	// description: connect to softball DB
	// parameters: none
	// return: none
	function db_connect() {
		$DB_NAME = "SOFTBALL";
		$DB_HOST = "localhost";
		$DB_USER = "tjenn300";
		$DB_PASS = "chuZat6a";

		// global keyword required to make variable have global scope
		global $connection;

		$connection = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME)
		or die("Cannot connect to $DB_HOST as $DB_USER:" . mysqli_error($connection));
	}  // end function db_connect

	// function name: db_close
	// description: close connection to softball DB
	// parameters: none
	// return: none
	function db_close() {
		global $connection;
		mysqli_close($connection);
	}  // end function db_close

	// function name: get_my_sqli_results
	// description: replacement for mysql_result
	// parameters: result: result of mysql query
	//  number: specifies field offset. must be between 0 and number of rows -1
	//  field: 
	// return: the specified field from the resulting row
	// note: mysql_data_seek & mysql_fetch_assoc comments came from w3schools.com
	function get_mysqli_result($result, $number, $field) {
		mysqli_data_seek($result, $number); // adjusts the result pointer to an arbitrary row in the result-set
		$row = mysqli_fetch_assoc($result); // fetches a result row as an associative array
		return $row[$field];
	} //end function get_my_sqli_results
?>

<!--end dbconn.php-->
