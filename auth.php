<?php
	$id = $_POST['id'];
	$password = $_POST['password'];

	$username="root";$dbpassword="";$database="elib";

	$con = mysql_connect('localhost',$username,$dbpassword);
	mysql_select_db($database) or die( "Unable to select database");

	$query = "SELECT * FROM users WHERE id='".$id."' AND password='".$password."'";
	$result = mysql_query($query);
	
	if(mysql_num_rows($result) != 0){
		while($row = mysql_fetch_array($result)){
			switch($row['type']){
				case 'S':	header('Location: studentHome.php');
							setCookie('id',$row['id']);
							setCookie('password',$row['password']);
							break;

				case 'L':	header('Location: libHome.php');
							setCookie('id',$row['id']);
							setCookie('password',$row['password']);
							break;							
			}
		}	
	}else{
		header('Location: index.php');				
	}	
	
	mysql_close($con);
?>

