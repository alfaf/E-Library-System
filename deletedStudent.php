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
   $ss_id = $_REQUEST['ssid'];
   
		// Escape User Input to help prevent SQL Injection
	$ss_id = mysql_real_escape_string($ss_id);
   
   
   
		//build query
		$query = "DELETE FROM `users` WHERE `id` = '$ss_id' AND `total_books`<=0";
   
		//Execute query
		$qry_result = mysql_query($query) or die(mysql_error());	
		
		if(mysql_affected_rows()<=0){
			echo "11";
		}

?>