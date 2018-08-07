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
	$rdt = $_REQUEST['return_date'];
	//$temp_password = $_REQUEST['tp'];

	$dt = date('Y-m-d');

	$qry_result2 = mysql_query("UPDATE `books` SET `state`=3, `dates`='$dt', `return_date`='$rdt',`status` = '$register_id' WHERE `book_id` = $book_id")or die('unabfffle to query');

	$qry_result = mysql_query("UPDATE `staff` SET `total_books`=`total_books`+1 WHERE `id` = '$register_id'")or die('unabfffle to query');

	if(!$qry_result2)
		echo "error";

?>
