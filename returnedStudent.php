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
	$fine = $_REQUEST['fine'];

	$dt = date('Y-m-d');

	$qry_result = mysql_query("UPDATE `books` SET `state`=0,`status`='',`dates`='0000-00-00',`return_date`='0000-00-00' WHERE `book_id` = '$book_id' AND `status` ='$register_id';")or die('unabfffle to query');

	$qry_result2 = mysql_query("UPDATE `users` SET `amount`=`amount`+$fine,`total_books`=`total_books`-1 WHERE `id` = '$register_id';")or die('unabfffle to query');

	$q =  mysql_query("SELECT `state` FROM `ecard` WHERE `id`='$register_id' AND `book_id`='$book_id' AND `state`<>0");
	$row = mysql_fetch_array($q);


	$qry_result3 = mysql_query("UPDATE `ecard` SET `returned`='$dt',`fine`=`fine`+'$fine',`state`=0 WHERE `id`='$register_id' AND `book_id`='$book_id' AND `state`='$row[state]';")or die('unable to query');
	

	if(!$qry_result){
		echo $book_id;
		echo $register_id;
	}

?>
