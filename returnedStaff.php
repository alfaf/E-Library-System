<?php 

   $dbhost = "localhost";
   $dbuser = "root";
   $dbpass = "";
   $dbname = "elib";
   
   //Connect to MySQL Server
   mysql_connect($dbhost, $dbuser, $dbpass);
   
   //Select Database
   mysql_select_db($dbname) or die(mysql_error());
	
	$book_id = $_REQUEST['rbookid'];
	$register_id = $_REQUEST['rregid'];

	$dt = date('Y-m-d');

	$qry_result = mysql_query("UPDATE `books` SET `state`=0,`status`='',`dates`='0000-00-00',`return_date`='0000-00-00' WHERE `book_id` = '$book_id' AND `status` ='$register_id';")or die('unabfffle to query');

	$qry_result2 = mysql_query("UPDATE `staff` SET `total_books`=`total_books`-1 WHERE `id` = '$register_id';")or die('unabfffle to query');
	

	if(!$qry_result){
		echo $book_id;
		echo $register_id;
	}

?>
