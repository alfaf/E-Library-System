<?php
   
   $dbhost = "localhost";
   $dbuser = "root";
   $dbpass = "";
   $dbname = "elib";
   
   //Connect to MySQL Server
   mysql_connect($dbhost, $dbuser, $dbpass);
   
   //Select Database
   mysql_select_db($dbname) or die(mysql_error());

      // Retrieve data from Query String
   $d_book_id = $_REQUEST['ddbookid'];
   
		// Escape User Input to help prevent SQL Injection
	$d_book_id = mysql_real_escape_string($d_book_id);
   
   
   
		//build query
		$query = "DELETE FROM `books` WHERE `book_id` = $d_book_id AND `state`<>3";
   
		//Execute query
		$qry_result = mysql_query($query);

		if(mysql_affected_rows()<=0){
			echo "9";
		}
		



?>