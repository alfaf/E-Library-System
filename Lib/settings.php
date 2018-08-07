<?php 
	if(isset($_COOKIE['id']) && isset($_COOKIE['password'])){

	$username="root";$dbpassword="";$database="elib";

	$con = mysql_connect('localhost',$username,$dbpassword);
	mysql_select_db($database) or die( "Unable to select database");

	$query = "SELECT * FROM `users` WHERE `id`='".$_COOKIE['id']."'";
	$result = mysql_query($query);
	
	$data = array();

	$row = mysql_fetch_array($result);

		echo "
<html>
   <head>
   	  <title>SVP | Settings</title>
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
	  <script src='sweetalert/sweetalert.min.js'></script>
	  <link rel='stylesheet' type='text/css' href='sweetalert/sweetalert.css'>
   </head>
<body  style='background: #bdbdbd url(\"img/8.jpg\") no-repeat fixed center;'>

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

</script>
<script>
              //Browser Support Code
            function changePassword(){

					var newpsa = document.getElementById('newPasswordA').value;
					var newpsb = document.getElementById('newPasswordB').value;

					var total_error_fields_change_password = 'Please Enter Valid : ';
					var flag = true;
					if(newpsa == ''){
						total_error_fields_change_password = total_error_fields_change_password+'Password 1, ';
						flag = false;
					}
					if(newpsb == ''){
						total_error_fields_change_password = total_error_fields_change_password+'Password 2, ';
						flag = false;
					}
					
					if(flag){
						if(newpsa.localeCompare(newpsb)){
							total_error_fields_change_password = 'Password Mismatch, Try Again!';
							flag = false;
						}
					}

					if(!flag){
						document.getElementById('changePasswordHere').innerHTML = '';
						document.getElementById('wrongFieldsChangePassword').innerHTML = total_error_fields_change_password;
						exit(0);
					}

	
					document.getElementById('wrongFieldsChangePassword').innerHTML = '';

				 swal({   title: 'Are you sure?',   
             text: 'Do you want to change your password?',   
             type: 'warning',   
             showCancelButton: true,   
             confirmButtonColor: '#DD6B55',   
             confirmButtonText: 'Yes, change it!',   
             cancelButtonText: 'No, cancel please!',   
             closeOnConfirm: false,   
             closeOnCancel: false }, 
             function(isConfirm){   
                 if (isConfirm) {   
					var ajaxRequest;  // The variable that makes Ajax possible!
               
					try {
						// Opera 8.0+, Firefox, Safari
						ajaxRequest = new XMLHttpRequest();
					}catch (e) {
						// Internet Explorer Browsers
						 try {
							ajaxRequest = new ActiveXObject('Msxml2.XMLHTTP');
						}catch (e) {
							try{
								ajaxRequest = new ActiveXObject('Microsoft.XMLHTTP');
							}catch (e){
								// Something went wrong
								alert('Your browser broke!');
							 return false;
							}
						}
					}
               
					// Create a function that will receive data 
					// sent from the server and will update
					// div section in the same page.
					
					ajaxRequest.onreadystatechange = function(){
						if(ajaxRequest.readyState == 4){
							var ajaxDisplay = document.getElementById('changePasswordHere');
							ajaxDisplay.innerHTML = ajaxRequest.responseText;
							document.getElementById('clearChangePasswordForm').click();
							if(ajaxRequest.responseText == 'Please Login and try again later!'){
								swal('Cancelled', 'Please Login and try again later!', 'error');
							}
						}
					}
               
					// Now get the value from user and pass it to
					// server script.

					Materialize.toast('Changing Password...!', 500, 'rounded');

					var queryString = '?new_password_a=' + newpsa + '&new_password_b=' + newpsb;

					ajaxRequest.open('POST', 'changePassword.php' + queryString, true);
					ajaxRequest.send(null); 

				swal('Changed!!', 'Your password has been changed.', 'success');
					} 
                 else {
                     swal('Cancelled', 'Your password is not changed', 'error');
					 exit(0);   } 
            });
				}

</script>

	 <div class='mdl-layout mdl-js-layout mdl-layout--fixed-header'>
		<header class='mdl-layout__header'>
			<div class='mdl-layout__header-row'>
				<!-- Title -->
				<a href='#' class='brand-logo' style='padding-left:32%;'><span style='color:white' class='mdl-layout-title mdl-js-ripple-effect'>COLLEGE LIBRARY MANANGEMENT SYSTEM</span></a>
			</div>
		</header>
	     
  <form name='changepasswordform'>
	<div id='profile'  class='col s12 z-depth-5 card-panel white lighten-1' style='margin-left:8%;margin-right:8%;'>
		<BR>
		<div class='row'>
			<label for='profile' data-error='wrong' data-success='right'><h2>Change Password</h2></label>
		</div>
      <div class='row' style='padding-left:2em;'>
        <div class='col s12'>
          <div class='input-field'>
            <input id='newPasswordA' type='password' class='validate' required>
            <label for='newPasswordA' data-error='wrong' data-success='right'>Enter new password</label>
          </div>
        </div>
      </div>
      <div class='row' style='padding-left:2em;'>
        <div class='col s12'>
          <div class='input-field'>
            <input id='newPasswordB' type='password' class='validate' required>
            <label for='newPasswordB' data-error='wrong'>Re-enter new password</label>
          </div>
        </div>
      </div>
	  <div class='row' style='padding-left:2em;'>
        <div class='input-field col s12'>
		  <input type='button' value='Submit' id='submitChangePassword' onclick=changePassword(); class='btn'>
		  <input type='reset' value='Reset' id='clearChangePasswordForm' class='btn' />
        </div>
	 </div>
    </form>
	<div class='row'>
		<div class='col s12'>			
			<label for='wrong_fileds_add_book' id='wrongFieldsChangePassword' style='color:red;'></label>
		</div>
	</div>
	
	<div class='row' id='changePasswordHere'>

	</div>

	</div>
</body>
</html>";
}else{
	header('Location: auth.php');	
}
?>