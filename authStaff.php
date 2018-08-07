<?php
	$id_staff = $_REQUEST['id_staff'];
	$password_staff = $_REQUEST['password_staff'];

   $dbhost = "localhost";
   $dbuser = "root";
   $dbpass = "";
   $dbname = "elib";
   
   //Connect to MySQL Server
    $con =mysql_connect($dbhost, $dbuser, $dbpass);
   
   //Select Database
   mysql_select_db($dbname) or die(mysql_error());

	$query = "SELECT * FROM `admin` WHERE `id`='$id_staff' AND `password`='$password_staff'";
	$result = mysql_query($query);
	
	if(mysql_num_rows($result) > 0){
		while($row = mysql_fetch_array($result)){
			switch($row['designation']){
				case 'Librarian':	setCookie('id',$row['id']);
									setCookie('password',$row['password']);
									setCookie('designation',$row['designation']);
									echo "1";
									break;	
				
				default :	echo "Wrong ID or Password, Try Again!";
			}
		}	
	}else{
		echo "Wrong ID or Password, Try Again!";			
	}	
	
	mysql_close($con);

?>

