<?php 
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "elib";
   
   //Connect to MySQL Server
   mysql_connect($dbhost, $dbuser, $dbpass);
   
   //Select Database
   mysql_select_db($dbname) or die(mysql_error());


	$student_id = $_REQUEST['student_id'];
	$fine_amount = $_REQUEST['fine_amount'];

	$student_id = mysql_real_escape_string($student_id);
	$fine_amount = mysql_real_escape_string($fine_amount);

	$dates = date("Y/m/d");
	
	$qry_result1 = mysql_query("SELECT * FROM `users` WHERE `id`='$student_id' AND `amount` > 0;")or die('unable to query');
	
	if(mysql_num_rows($qry_result1) > 0){
				$qry_result = mysql_query("UPDATE `users` SET `amount`=`amount`-$fine_amount, `paid_date` = '$dates' WHERE id='$student_id';")or die("<center><h6 style='margin-left:7%;margin-right:7%;'>Please Enter Valid Amount</h6></center>");

				$string_display="<center id='fineDetails'>";
				$string_display.="<h5>Paid Successfully</h5><BR>";
				$string_display.="<label>ID : $student_id</label><BR>";
				$string_display.="<label>Paid Amount : $fine_amount</label><BR>";
				$string_display.="<label>date : $dates</label><BR>";
				$string_display.="<input type='button' class='btn' value='Clear' onclick=document.getElementById('fineDetails').innerHTML='';>";
				$string_display.="</center>";
				
				echo $string_display;
	}else echo "<center><h4 style='margin-left:7%;margin-right:7%;'>No Pending Amount of $student_id</h4></center>";

?>
