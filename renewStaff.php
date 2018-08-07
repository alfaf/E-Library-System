<?php 

   $dbhost = "localhost";
   $dbuser = "root";
   $dbpass = "";
   $dbname = "elib";
   
   //Connect to MySQL Server
   mysql_connect($dbhost, $dbuser, $dbpass);
   
   //Select Database
   mysql_select_db($dbname) or die(mysql_error());
	
	$book_id = $_REQUEST['bookid'];
	$register_id = $_REQUEST['regid'];
	$returndate = $_REQUEST['returndate'];

	$dt = date('Y-m-d');

	$qry_result4 = mysql_query("UPDATE `books` SET `return_date`='$returndate' WHERE `book_id` = '$book_id';")or die('unabfffle to query');

	if(!$qry_result){
		echo $book_id;
		echo $register_id;
	}

?>
