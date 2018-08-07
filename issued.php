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

	$dt = date('Y-m-d');

	$qry_result = mysql_query("UPDATE `books` SET `status`='$register_id', `state`=3, `dates`='$dt', `return_date`='$rdt' WHERE `book_id` = $book_id")or die('unabfffle to query');

	$qry_result2 = mysql_query("UPDATE `users` SET `total_books`=`total_books`+1 WHERE `id`='$register_id';")or die('unable to query');

	$q =  mysql_query("SELECT `total_books` FROM `users` WHERE `id`='$register_id'");
	$row = mysql_fetch_array($q);

	$qry_result2 = mysql_query("INSERT INTO `ecard`(`id`,`book_id`,`issue_date`,`return_date`,`state`)VALUES('$register_id','$book_id','$dt','$rdt','$row[total_books]');")or die('unable to query');

	if(!$qry_result)
		echo "error";

?>
