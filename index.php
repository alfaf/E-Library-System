<?php 
	if(isset($_COOKIE['id']) && isset($_COOKIE['password'])){
		header('Location: logout.php');	
	}else{
		echo "
<html>
   <head>
   	  <title>SVP | Login</title>
	  <link href='img/favicon.ico' rel='shortcut icon' type='image/x-icon' />
	  <meta name='viewport' content='width=device-width, initial-scale=1.0'/>
	  <link rel='stylesheet' href='mdl/material.min.css'>
      <script src='mdl/material.min.js'></script>     
	  <link rel='stylesheet' href='mdl/materialicons.css'>
	  <link rel='stylesheet' href='materialize/css/materialize.min.css' media='screen,projection'>
	  <script type='text/javascript' src='JQuery/jquery-2.1.1.min.js'></script>
      <script type='text/javascript' src='materialize/js/materialize.min.js'></script>
	  <link rel='stylesheet' href='animate/animate.min.css'>
   </head>
<body style='background: #bdbdbd url(\"img/img3.jpg\");'>
<script>
$(document).ready(function(){
    $('#loginbutton').click(function() {
		document.getElementById('logintab').setAttribute('style', 'visibility: display;position: relative; z-index: 10;');
		document.getElementById('logintab').setAttribute('class', 'col z-depth-5 card-panel white lighten-1 animated zoomInDown');
    });

	 $('#cancelbutton').click(function() {
		document.getElementById('logintab').setAttribute('class', 'col z-depth-5 card-panel white lighten-1 animated rotateOut');
		window.setTimeout( function(){
                document.getElementById('logintab').setAttribute('style', 'visibility: hidden;position: relative; z-index: 10');
            }, 500);   
		document.getElementById('errorStaffHere').innerHTML = '';
		document.getElementById('idStaff').value = '';
		document.getElementById('passwordStaff').value = '';
    });

	$('.slider').slider();
});
</script>
<script>
              //Browser Support Code
            function loginStaff(){
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
							if(ajaxRequest.responseText == 1){
								window.location.href='libHome.php';								
							}else{							
								var ajaxDisplay = document.getElementById('errorStaffHere');
								ajaxDisplay.innerHTML = ajaxRequest.responseText;
							}
						}
					}
               
					// Now get the value from user and pass it to
					// server script.
					
					var idStaff = document.getElementById('idStaff').value;
					var passwordStaff = document.getElementById('passwordStaff').value;
					
					var total_error_fields_login_staff = 'Please Enter Valid : ';
					var flag = true;

					if(idStaff == ''){
						total_error_fields_login_staff = total_error_fields_login_staff+'ID, ';
						flag = false;
					}
					
					if(passwordStaff == ''){
						total_error_fields_login_staff = total_error_fields_login_staff+'Password, ';
						flag = false;
					}

					if(!flag){
						document.getElementById('errorStaffHere').innerHTML = total_error_fields_login_staff;
						exit(0);
					}
					
					var queryString = '?id_staff=' + idStaff + '&password_staff=' + passwordStaff;
            
					ajaxRequest.open('POST', 'authStaff.php' + queryString, true);
					ajaxRequest.send(null); 
				}

</script>

   <div class='mdl-layout mdl-js-layout mdl-layout--fixed-header'>
  <nav>
    <div class='nav-wrapper'>
      <a href='#' class='brand-logo' style='padding-left:25%;'>SHREE VIDYADHIRAJ POLYTECHNIC E-LIBRARY</a>
	  <ul id='nav-mobile' style='padding:1em;' class='right hide-on-med-and-down'>
        <li><a id='loginbutton' class='btn'>Login</a></li>
      </ul>
    </div>
  </nav>
<BR><BR><BR><BR><BR>

  <div class='slider' style='position: absolute; z-index: 9;'>
    <ul class='slides'>
      <li>
        <img src='img/img1.jpg'> 
        <div class='caption center-align'><BR><BR><BR>
          <h3>Discover! Connect! Inspire!</h3>
          <h5 class='light grey-text text-lighten-3'>Don't judge a book by its cover.</h5>
        </div>
      </li>
      <li>
        <img src='img/img1.jpg'> 
        <div class='caption left-align'><BR><BR><BR>
          <h3>Discover! Connect! Inspire!</h3>
          <h5 class='light grey-text text-lighten-3'>Books connect people to people.</h5>
        </div>
      </li>
      <li>
        <img src='img/img1.jpg'> 
        <div class='caption right-align'><BR><BR><BR>
          <h3>Discover! Connect! Inspire!</h3>
          <h5 class='light grey-text text-lighten-3'>A library is not a luxury but one of the necessities of life.</h5>
        </div>
      </li>
      <li>
        <img src='img/img1.jpg'>
        <div class='caption center-align'><BR><BR><BR>
          <h3>Discover! Connect! Inspire!</h3>
          <h5 class='light grey-text text-lighten-3'>Books connect people to learning.</h5>
        </div>
      </li>
    </ul>
  </div>

 <div class='row'>
	  <div id='logintab' style='visibility: hidden;'>
		<form>
		 <center><label for='last_name'><h3 class='col'>LOGIN</h3></label></center>
		 <div class='row input-field col s11'>
			<label class='active' for='idStaff'>Username</label>
			<input id='idStaff' type='text' class='validate c6' name='idStaff'>
        </div>
		 <div class='row input-field col s11'>
			<label class='active' for='passwordStaff'>Password</label>
			<input id='passwordStaff' type='password' class='validate' name='passwordStaff'>
        </div><BR>
		<center>
		<div class='row input-field col s11'>
			<button type='button' class=' modal-action modal-close waves-effect waves-green btn' onclick='loginStaff()' style='padding-left:3em;padding-right:3em'>Login</button>
			<button type='button' class=' modal-action modal-close waves-effect waves-green btn' style='padding-left:3em;padding-right:3em' id='cancelbutton'>Cancel</button>
			<label class='active' id='errorStaffHere' style='color: red;'></label>
        </div>	
		</center>
		</form>
	  </div>
    </div>


</body>
</html>";	
	}
?>