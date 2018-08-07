<?php 
if(isset($_COOKIE['id'])){
	$new_password_a = $_REQUEST['new_password_a'];
	$new_password_b = $_REQUEST['new_password_b'];

	if($new_password_a == $new_password_b){

		$username="root";$dbpassword="";$database="elib";

		$con = mysql_connect('localhost',$username,$dbpassword);
		mysql_select_db($database) or die( "Unable to select database");

		$qry_result = mysql_query("UPDATE `admin` SET `password`='$new_password_a' WHERE `id`='$_COOKIE[id]';")or die('unable to query');

		if($qry_result)
			echo "<center><h5 style='margin-left:7%;margin-right:7%;'>Your new password : $new_password_a</h5></center>";
		else
			echo "<center><h5 style='margin-left:7%;margin-right:7%;'>Couldn't change the password, Try Again!</h5></center>";
	}else{
		echo "<center><h6 style='margin-left:7%;margin-right:7%;'>Password mismatch, Try Again!</h6></center>";
	}
}else{
	echo "Please Login and try again later!";
}

?>
