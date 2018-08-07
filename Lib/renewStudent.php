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
	$fine = $_REQUEST['fine'];
	$returndate = $_REQUEST['returndate'];

	$dt = date('Y-m-d');

	$qry_result2 = mysql_query("UPDATE `users` SET `amount`=`amount`+$fine WHERE `id` = '$register_id';")or die('unabfffle to query');

	$qry_result4 = mysql_query("UPDATE `books` SET `return_date`='$returndate' WHERE `book_id` = '$book_id';")or die('unabfffle to query');

	$q =  mysql_query("SELECT `state` FROM `ecard` WHERE `id`='$register_id' AND `book_id`='$book_id' AND `state`<>0");
	$row = mysql_fetch_array($q);


	$qry_result3 = mysql_query("UPDATE `ecard` SET `return_date`='$returndate',`fine`=`fine`+$fine WHERE `id`='$register_id' AND `book_id`='$book_id' AND `state`='$row[state]';")or die('unable to query');

	if(!$qry_result){
		echo $book_id;
		echo $register_id;
	}

?>
