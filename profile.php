<?php 
	if(isset($_COOKIE['id']) && isset($_COOKIE['password'])){

	$username="root";$dbpassword="";$database="elib";

	$con = mysql_connect('localhost',$username,$dbpassword);
	mysql_select_db($database) or die( "Unable to select database");

		echo "
<html>
   <head>
   	  <title>SVP | Profile</title>
	  <link href='img/favicon.ico' rel='shortcut icon' type='image/x-icon' />
	  <meta name='viewport' content='width=device-width, initial-scale=1.0'/>   
	  <link rel='stylesheet' href='mdl/material.min.css'>
      <script src='mdl/material.min.js'></script>
	  <link rel='stylesheet' href='mdl/materialicons.css'>
	  <link rel='stylesheet' href='materialize/css/materialize.min.css' media='screen,projection'>
	  <script type='text/javascript' src='JQuery/jquery-2.1.1.min.js'></script>
      <script type='text/javascript' src='materialize/js/materialize.min.js'></script>	  
	  <script src='Js/angular.min.js'></script>
	  <script src='Js/angular-route.min.js'></script>    
   </head>
<body style='background: #bdbdbd url(\"img/8.jpg\") no-repeat fixed center;'>

<script>
  $(document).ready(function() {
    $('select').material_select();
    $('.tooltipped').tooltip({delay: 50});
	Materialize.showStaggeredList('.collection');
	$('.button-collapse').sideNav({
      menuWidth: 300, // Default is 240
      closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
    }
  );
  $('.collapsible').collapsible();
  });

  $('select').material_select('destroy'); 
  $('input.autocomplete').autocomplete({ data: { 'Apple': null, 'Microsoft': null, 'Google': 'google.com' } });

</script>

	 <div class='mdl-layout mdl-js-layout mdl-layout--fixed-header'>
		<header class='mdl-layout__header'>
			<div class='mdl-layout__header-row'>
				<!-- Title -->
				<a href='#' class='brand-logo' style='padding-left:32%;'><span style='color:white' class='mdl-layout-title mdl-js-ripple-effect'>COLLEGE LIBRARY MANANGEMENT SYSTEM</span></a>
			</div>
		</header>
 
  ";
	if(isset($_COOKIE['designation'])){		
		$query = "SELECT * FROM `admin` WHERE `id`='$_COOKIE[id]'";
		$qry_result = mysql_query($query);
		$row = mysql_fetch_array($qry_result);
				echo "<div id='profile'  class='col s12 z-depth-5 card-panel white lighten-1' style='margin-left:8%;margin-right:8%;'
		<BR>
		<div class='row'>
			<label for='profile' data-error='wrong' data-success='right'><h2>Profile</h3></label>
		</div>
		<div class='row' style='padding-left:2em;'>
			<label for='profile' data-error='wrong' data-success='right'><h6>NAME : $row[first_name]&nbsp;$row[last_name]</h6></label>
		</div>
		<div class='row' style='padding-left:2em;'>
			<label for='profile' data-error='wrong' data-success='right'><h6>ADDRESS : $row[address]</h6></label>
		</div>
		<div class='row' style='padding-left:2em;'>
			<label for='profile' data-error='wrong' data-success='right'><h6>GENDER : $row[gender]</h6></label>
		</div>

		<div class='row' style='padding-left:2em;'>
			<label for='profile' data-error='wrong' data-success='right'><h6>DESIGNATION : $row[designation]</h6></label>
		</div>
		<div class='row' style='padding-left:2em;'>
			<label for='profile' data-error='wrong' data-success='right'><h6>JOINING YEAR : $row[joining_year]</h6></label>
		</div>

	</div>
</body>
</html>";
	}else{
		$query = "SELECT * FROM `users` WHERE `id`='$_COOKIE[id]'";
		$qry_result = mysql_query($query);
		$row = mysql_fetch_array($qry_result);
		echo "<div id='profile'  class='col s12 z-depth-5 card-panel white lighten-1' style='margin-left:8%;margin-right:8%;'
		<BR>
		<div class='row'>
			<label for='profile' data-error='wrong' data-success='right'><h2>Profile</h3></label>
		</div>
		<div class='row' style='padding-left:2em;'>
			<label for='profile' data-error='wrong' data-success='right'><h6>NAME : $row[first_name]&nbsp;$row[last_name]</h6></label>
		</div>
		<div class='row' style='padding-left:2em;'>
			<label for='profile' data-error='wrong' data-success='right'><h6>EMAIL : $row[email]</h6></label>
		</div>
		<div class='row' style='padding-left:2em;'>
			<label for='profile' data-error='wrong' data-success='right'><h6>ADDRESS : $row[address]</h6></label>
		</div>
		<div class='row' style='padding-left:2em;'>
			<label for='profile' data-error='wrong' data-success='right'><h6>D.O.B : $row[dob]</h6></label>
		</div>
		<div class='row' style='padding-left:2em;'>
			<label for='profile' data-error='wrong' data-success='right'><h6>GENDER : $row[gender]</h6></label>
		</div>
		<div class='row' style='padding-left:2em;'>
			<label for='profile' data-error='wrong' data-success='right'><h6>BRANCH : $row[branch]</h6></label>
		</div>
		<div class='row' style='padding-left:2em;'>
			<label for='profile' data-error='wrong' data-success='right'><h6>SEM : $row[sem]</h6></label>
		</div>
		<div class='row' style='padding-left:2em;'>
			<label for='profile' data-error='wrong' data-success='right'><h6>ROLL NUMBER : $row[roll_number]</h6></label>
		</div>
		<div class='row' style='padding-left:2em;'>
			<label for='profile' data-error='wrong' data-success='right'><h6>JOINING YEAR : $row[joining_year]</h6></label>
		</div>

	</div>
</body>
</html>";

	}

}else{
	header('Location: auth.php');	
}
?>