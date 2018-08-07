<?php 
$id = $_COOKIE['id'];
$password = $_COOKIE['password'];
$designation = $_COOKIE['designation'];

	if(isset($id) && isset($password)){
		setCookie('id','');
		setCookie('password','');
		setCookie('designation','');
		header('Location: index.php');	
	}else{
		header('Location: index.php');	
}
?>