<?php 
	if(isset($_COOKIE['id']) && isset($_COOKIE['password']) && isset($_COOKIE['designation'])=='Librarian'){
		echo "
<html>
   <head>
	  <title>SVP | Librarian</title>
	  <link href='img/favicon.ico' rel='shortcut icon' type='image/x-icon' />
	  <meta name='viewport' content='width=device-width, initial-scale=1.0'/>
	  <link rel='stylesheet' href='mdl/material.min.css'>
      <script src='mdl/material.min.js'></script>     
	  <link rel='stylesheet' href='mdl/materialicons.css'>
	  <link rel='stylesheet' href='materialize/css/materialize.min.css' media='screen,projection'>
	  <script type='text/javascript' src='JQuery/jquery-2.1.1.min.js'></script>
      <script type='text/javascript' src='materialize/js/materialize.min.js'></script>
	  <script type='text/javascript' src='public/javascript/zebra_datepicker.js'></script>
	  <link rel='stylesheet' href='public/css/default.css' type='text/css'>
	  <script src='sweetalert/sweetalert.min.js'></script>
	  <link rel='stylesheet' type='text/css' href='sweetalert/sweetalert.css'>
   </head>
<body style='background: #bdbdbd url(\"img/img2.jpg\");' class='conatiner'>
<script>
function searchname(tbl,searchname) {
  var input, filter, table, tr, td, i;
  input = document.getElementById(searchname);
  filter = input.value.toUpperCase();
  table = document.getElementById(tbl);
  tr = table.getElementsByTagName('tr');
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName('td')[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = '';
      } else {
        tr[i].style.display = 'none';
      }
    }       
  }
}
</script>
<script>
function searchbook() {
  var input, filter, table, tr, td, i;
  input = document.getElementById('mySearchBook');
  filter = input.value.toUpperCase();
  table = document.getElementById('eCardHere');
  tr = table.getElementsByTagName('tr');
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName('td')[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = '';
      } else {
        tr[i].style.display = 'none';
      }
    }       
  }
}
</script>
<script>
function sortTable(n,tb) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById(tb);
  switching = true;
  //Set the sorting direction to ascending:
  dir = 'asc'; 
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.getElementsByTagName('TR');
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName('TD')[n];
      y = rows[i + 1].getElementsByTagName('TD')[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == 'asc') {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == 'desc') {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++; 
    } else {
      if (switchcount == 0 && dir == 'asc') {
        dir = 'desc';
        switching = true;
      }
    }
  }
}
</script>
<script>

 //Browser Support Code
 function registerStudent(){	
	var ajaxRequest;  // The variable that makes Ajax possible!
               
	try {
		// Opera 8.0+, Firefox, Safari
		ajaxRequest = new XMLHttpRequest();
		}catch (e){
				// Internet Explorer Browsers
				try {
					ajaxRequest = new ActiveXObject('Msxml2.XMLHTTP');
					}catch (e) {
							try{
								ajaxRequest = new ActiveXObject('Microsoft.XMLHTTP');
							}catch (e){
								// Something went wrong
								alert('Your browser broke!');
								return 
								false;
							}
						}
					}
               
					// Create a function that will receive data 
					// sent from the server and will update
					// div section in the same page.
					
					
ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			var ajaxDisplay = document.getElementById('notifyStudent');
			ajaxDisplay.innerHTML = ajaxRequest.responseText;
			document.getElementById('clearRegisterStudentForm').click();
			}
}
               
					// Now get the value from user and pass it to
					// server script.
					
	var firstName = document.getElementById('first_name').value;
	var lastName = document.getElementById('last_name').value;
	var email = document.getElementById('email').value;
	var textarea1 = document.getElementById('textarea1').value;
	var joiningYear = document.getElementById('joining_year').value;
	var dob = document.getElementById('dob').value;
	var rollNumber = document.getElementById('roll_number').value;
	var branch = document.getElementById('branch').value;
	var sem = document.getElementById('sem').value;
	var gender = getRadioValue('gender');
	var id = document.getElementById('id').value;

	var total_error_fields_register_student = 'Please Enter Valid : ';
	var flag = true;
	if(firstName == ''){
		total_error_fields_register_student = total_error_fields_register_student+'First Name, ';
		flag = false;
	}

	if(lastName == ''){
		total_error_fields_register_student = total_error_fields_register_student+'Last Name, ';
		flag = false;
	}
	if(email == ''){
		total_error_fields_register_student = total_error_fields_register_student+'Email, ';
		flag = false;
	}
	if(textarea1 == ''){
		total_error_fields_register_student = total_error_fields_register_student+'Address, ';
		flag = false;
	}	
	if(joiningYear == ''){
		total_error_fields_register_student = total_error_fields_register_student+'Joining Year, ';
		flag = false;
	}
	if(dob == ''){
		total_error_fields_register_student = total_error_fields_register_student+'D-O-B, ';
		flag = false;
	}	
	if(rollNumber == ''){
		total_error_fields_register_student = total_error_fields_register_student+'Roll Number, ';
		flag = false;
	}
	if(branch == ''){
		total_error_fields_register_student = total_error_fields_register_student+'Branch, ';
		flag = false;
	}

	if(sem == ''){
		total_error_fields_register_student = total_error_fields_register_student+'Sem, ';
		flag = false;
	}
	if(id == ''){
		total_error_fields_register_student = total_error_fields_register_student+'ID, ';
		flag = false;
	}

	if(!flag){
		document.getElementById('notifyStudent').innerHTML = '';
		document.getElementById('wrongFieldsRegisterStudents').innerHTML = total_error_fields_register_student;
		exit(0);
	}
	
	document.getElementById('wrongFieldsRegisterStudents').innerHTML = '';
	Materialize.toast('Registering Student...!', 1000, 'rounded');

	var queryString = '?first_name=' + firstName +'&'+'last_name=' + lastName + '&' + 'email=' + email +'&'+'address=' + textarea1 +'&'+'joining_year=' + joiningYear +'&'+'roll_number=' + rollNumber+'&'+'branch=' + branch +'&'+'sem=' + sem+'&'+'gender=' + gender+'&'+'dob=' + dob +'&'+'id=' + id;
            
	ajaxRequest.open('POST','register_student.php' + queryString, true);
	ajaxRequest.send(null); 

}

</script>
<script>

 //Browser Support Code
 function registerStaff(){	
	var ajaxRequest;  // The variable that makes Ajax possible!
               
	try {
		// Opera 8.0+, Firefox, Safari
		ajaxRequest = new XMLHttpRequest();
		}catch (e){
				// Internet Explorer Browsers
				try {
					ajaxRequest = new ActiveXObject('Msxml2.XMLHTTP');
					}catch (e) {
							try{
								ajaxRequest = new ActiveXObject('Microsoft.XMLHTTP');
							}catch (e){
								// Something went wrong
								alert('Your browser broke!');
								return 
								false;
							}
						}
					}
               
					// Create a function that will receive data 
					// sent from the server and will update
					// div section in the same page.
					
					
ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			var ajaxDisplay = document.getElementById('notifyStaff');
			ajaxDisplay.innerHTML = ajaxRequest.responseText;
			document.getElementById('clearRegisterStaffForm').click();
			}
}
               
					// Now get the value from user and pass it to
					// server script.
					
	var staffFirstName = document.getElementById('staff_first_name').value;
	var staffLastName = document.getElementById('staff_last_name').value;
	var staffTextarea1 = document.getElementById('staff_textarea1').value;
	var staffJoiningYear = document.getElementById('staff_joining_year').value;
	var staffBranch = document.getElementById('staff_branch').value;
	var staffDesignation = document.getElementById('staff_designation').value;
	var staffGender = getRadioValue('staff_gender');
	var staffId = document.getElementById('staff_id').value;

	var total_error_fields_register_staff = 'Please Enter Valid : ';
	var flag = true;
	if(staffFirstName == ''){
		total_error_fields_register_staff = total_error_fields_register_staff+'First Name, ';
		flag = false;
	}
	if(staffLastName == ''){
		total_error_fields_register_staff = total_error_fields_register_staff+'Last Name, ';
		flag = false;
	}
	if(staffTextarea1 == ''){
		total_error_fields_register_staff = total_error_fields_register_staff+'Address, ';
		flag = false;
	}	
	if(staffJoiningYear == ''){
		total_error_fields_register_staff = total_error_fields_register_staff+'Joining Year, ';
		flag = false;
	}
	if(staffBranch == ''){
		total_error_fields_register_staff = total_error_fields_register_staff+'Branch, ';
		flag = false;
	}

	if(staffDesignation== ''){
		total_error_fields_register_staff = total_error_fields_register_staff+'Designation, ';
		flag = false;
	}
	if(staffId == ''){
		total_error_fields_register_staff = total_error_fields_register_staff+'ID, ';
		flag = false;
	}

	if(!flag){
		document.getElementById('notifyStaff').innerHTML = '';
		document.getElementById('wrongFieldsRegisterStaff').innerHTML = total_error_fields_register_staff;
		exit(0);
	}
	
	document.getElementById('wrongFieldsRegisterStaff').innerHTML = '';
	Materialize.toast('Registering Staff...!', 1000, 'rounded');

	var queryString = '?staff_first_name=' + staffFirstName +'&'+'staff_last_name=' + staffLastName + '&' +'staff_address=' + staffTextarea1 +'&'+'staff_joining_year=' + staffJoiningYear +'&'+'staff_branch=' + staffBranch +'&'+'staff_designation=' + staffDesignation+'&'+'staff_gender=' + staffGender+'&'+'staff_id=' + staffId;
            
	ajaxRequest.open('POST','register_staff.php' + queryString, true);
	ajaxRequest.send(null); 

}

</script>
<script>
function getRadioValue(theRadioGroup)
{
    var elements = document.getElementsByName(theRadioGroup);
    for (var i = 0, l = elements.length; i < l; i++)
    {
        if (elements[i].checked)
        {
            return elements[i].value;
        }
    }
}
</script>
<script>

 //Browser Support Code
 function storeBook(){

	var ajaxRequest;  // The variable that makes Ajax possible!
               
	try {
		// Opera 8.0+, Firefox, Safari
		ajaxRequest = new XMLHttpRequest();
		}catch (e){
				// Internet Explorer Browsers
				try {
					ajaxRequest = new ActiveXObject('Msxml2.XMLHTTP');
					}catch (e) {
							try{
								ajaxRequest = new ActiveXObject('Microsoft.XMLHTTP');
							}catch (e){
								// Something went wrong
								alert('Your browser broke!');
								return 
								false;
							}
						}
					}
               
					// Create a function that will receive data 
					// sent from the server and will update
					// div section in the same page.
					
					
ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			var ajaxDisplay = document.getElementById('notifyBook');
			ajaxDisplay.innerHTML = ajaxRequest.responseText;

			document.getElementById('clearAddBookForm').click();
			document.getElementById('total_book').value = '0';
			}
}
               
					// Now get the value from user and pass it to
					// server script.
					
	var title = document.getElementById('title').value;
	var author = document.getElementById('author').value;
	var pages = document.getElementById('pages').value;
	var bookBranch = document.getElementById('book_branch').value;
	var bookSem = document.getElementById('book_sem').value;
	var descri = document.getElementById('description').value;
	var totalBook = document.getElementById('total_book').value;
	var bidAll = $('.chips').material_chip('data');
	var bid='';
	for(i=0;i<totalBook;i++){
		bid += bidAll[i].tag+':';
	}
	var total_error_fields_add_book = 'Please Enter Valid : ';
	var flag = true;

	if(title == ''){
		total_error_fields_add_book = total_error_fields_add_book+'Title, ';
		flag = false;
	}
	if(author == ''){
		total_error_fields_add_book = total_error_fields_add_book+'Author, ';
		flag = false;
	}
	if(pages == ''){
		total_error_fields_add_book = total_error_fields_add_book+'Pages, ';
		flag = false;
	}
	if(bookBranch == ''){
		total_error_fields_add_book = total_error_fields_add_book+'Branch, ';
		flag = false;
	}
	if(bookSem == ''){
		total_error_fields_add_book = total_error_fields_add_book+'Sem, ';
		flag = false;
	}
	if(descri == ''){
		total_error_fields_add_book = total_error_fields_add_book+'Description, ';
		flag = false;
	}
	if(bid == ''){
		total_error_fields_add_book = total_error_fields_add_book+'Book ID, ';
		flag = false;
	}


	if(!flag){
		document.getElementById('notifyBook').innerHTML = '';
		document.getElementById('wrongFieldsAddBook').innerHTML = total_error_fields_add_book;
		exit(0);
	}

	document.getElementById('wrongFieldsAddBook').innerHTML = '';
	Materialize.toast('Storing Book...!', 1000, 'rounded');

	var queryString = '?book_title=' + title +'&'+'book_author=' + author+'&'+'book_pages=' + pages+ '&' + 'book_branch=' + bookBranch+'&'+'book_sem=' + bookSem +'&'+'description=' + descri+'&'+'book_id=' + bid+'&'+'total_book=' + totalBook;
            
	ajaxRequest.open('POST','store_book.php' + queryString, true);
	ajaxRequest.send(null); 

}

</script>
<script>
  $(document).ready(function() {
$('.chips').material_chip({
    placeholder: '+ID',
    secondaryPlaceholder: 'Enter Book ID',});

$('.chips').on('chip.add', function(e, chip){
	var bla = $('#total_book').val();
	bla++;
   $('#total_book').attr('value', bla);
 });
 $('.chips').on('chip.delete', function(e, chip){
	var bla = $('#total_book').val();
	bla--;
   $('#total_book').attr('value', bla);
 });

$('input.datepicker').Zebra_DatePicker();
$('#dob').data('Zebra_DatePicker');

	$('select').material_select();

	$('#indeterminate-checkbox').click(function(){
		$('#new').hide();
		$('#itemBadge').text('delete_forever');
    });

	$('#itemBadge').click(function(){
		$('#item').remove();
    });

	$('input#password').characterCounter();
  });

   $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
  $('select').material_select('destroy'); 
  function validateAddBookForm(){
	var form = document.getElementById('#addBookForm');
	return true;
  }

  function validateRegisterStudentForm(){
	var form = document.getElementById('#registerStudentForm');
	return true;
  }

</script>
<script>
              //Browser Support Code
            function issueBook(){
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
							if(ajaxRequest.responseText != 2){
								var ajaxDisplay = document.getElementById('issueBookHere');
								ajaxDisplay.innerHTML = ajaxRequest.responseText;
							}else{
								Materialize.toast('Cannot Borrow More than 2 Books..!', 2000, 'rounded');
							}
						}
					}
               
					// Now get the value from user and pass it to
					// server script.
					
					var bookId = document.getElementById('book_id').value;
					var registerId = document.getElementById('register_id').value;

					var total_error_fields_issue_book_student = 'Please Enter Valid : ';
					var flag = true;

					if(bookId == ''){
						total_error_fields_issue_book_student = total_error_fields_issue_book_student+'Book ID, ';
						flag = false;
					}
					if(registerId  == ''){
						total_error_fields_issue_book_student = total_error_fields_issue_book_student+'Student ID, ';
						flag = false;
					}

					if(!flag){
						document.getElementById('issueBookHere').innerHTML = '';
						document.getElementById('wrongFieldsIssueBookStudent').innerHTML = total_error_fields_issue_book_student;
						exit(0);
					}
					
					Materialize.toast('Issuing Book...!', 500, 'rounded');
					document.getElementById('wrongFieldsIssueBookStudent').innerHTML = '';


					
					var queryString = '?book_id=' + bookId + '&register_number=' + registerId;
            
					ajaxRequest.open('POST', 'issueBookStudent.php' + queryString, true);
					ajaxRequest.send(null); 
				}

</script>
<script>
              //Browser Support Code
            function issueBookStaff(){
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

								var ajaxDisplay = document.getElementById('issueBookStaffHere');
								ajaxDisplay.innerHTML = ajaxRequest.responseText;
						}
					}
               
					// Now get the value from user and pass it to
					// server script.
					
					var bookId = document.getElementById('book_id_s').value;
					var registerId = document.getElementById('register_id_s').value;

					
					var total_error_fields_issue_book_staff = 'Please Enter Valid : ';
					var flag = true;

					if(bookId == ''){
						total_error_fields_issue_book_staff = total_error_fields_issue_book_staff+'Book ID, ';
						flag = false;
					}
					if(registerId  == ''){
						total_error_fields_issue_book_staff = total_error_fields_issue_book_staff+'Staff ID, ';
						flag = false;
					}

					if(!flag){
						document.getElementById('issueBookStaffHere').innerHTML = '';
						document.getElementById('wrongFieldsIssueBookStaff').innerHTML = total_error_fields_issue_book_staff;
						exit(0);
					}
					
					Materialize.toast('Issuing Book...!', 500, 'rounded');
					document.getElementById('wrongFieldsIssueBookStaff').innerHTML = '';
					
					var queryString = '?book_id_s=' + bookId + '&register_number_s=' + registerId;
            
					ajaxRequest.open('POST', 'issueBookStaff.php' + queryString, true);
					ajaxRequest.send(null); 
				}

</script>
<script>
              //Browser Support Code
            function issue(bid,rid){
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
								document.getElementById('bake').innerHTML = 'Issued';
								document.getElementById('bake').setAttribute('disabled','disabled');
								Materialize.toast('Issued..!', 1000, 'rounded');
								
								document.getElementById('clearIssueBookForm').click();

						}
					}
               
					// Now get the value from user and pass it to
					// server script.
					var rdt = document.getElementById('srdt').value;

					var queryString = '?bookid=' + bid + '&regid=' + rid+ '&return_date=' + rdt;

					ajaxRequest.open('POST', 'issued.php' + queryString, true);
					ajaxRequest.send(null); 
				}

</script>
<script>
              //Browser Support Code
            function issueS(bid,rid){
					Materialize.toast('Issuing Book...!', 500, 'rounded');
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
							document.getElementById('bakee').innerHTML = 'Issued';
							document.getElementById('bakee').setAttribute('disabled','disabled');
							Materialize.toast('Issued..!', 1000, 'rounded');
							//var ajaxDisplay = document.getElementById('issueBookStaffHere');
							//ajaxDisplay.innerHTML = ajaxRequest.responseText;

							document.getElementById('clearIssueBookStaffForm').click();
						}
					}
               
					// Now get the value from user and pass it to
					// server script.
					var rdt = document.getElementById('srdt').value;

					var queryString = '?bookid=' + bid + '&regid=' + rid+ '&return_date=' + rdt;

					ajaxRequest.open('POST', 'issuedS.php' + queryString, true);
					ajaxRequest.send(null); 
				}

</script>
<script>
              //Browser Support Code
            function renewBookStudent(){
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
								var ajaxDisplay = document.getElementById('renewBookStudentHere');
								ajaxDisplay.innerHTML = ajaxRequest.responseText;
						}
					}
               
					// Now get the value from user and pass it to
					// server script.
					
					var bookIdr = document.getElementById('rn_book_id').value;
					var registerIdr = document.getElementById('rn_register_id').value;

					var total_error_fields_issue_renew_book_student = 'Please Enter Valid : ';
					var flag = true;

					if(bookIdr == ''){
						total_error_fields_issue_renew_book_student = total_error_fields_issue_renew_book_student+'Book ID, ';
						flag = false;
					}
					if(registerIdr  == ''){
						total_error_fields_issue_renew_book_student = total_error_fields_issue_renew_book_student+'Student ID, ';
						flag = false;
					}

					if(!flag){
						document.getElementById('renewBookStudentHere').innerHTML = '';
						document.getElementById('wrongFieldsRenewBookStudent').innerHTML = total_error_fields_issue_renew_book_student;
						exit(0);
					}
					
					Materialize.toast('Searching Book...!', 500, 'rounded');
					document.getElementById('wrongFieldsRenewBookStudent').innerHTML = '';


					
					var queryString = '?book_id=' + bookIdr + '&register_number=' + registerIdr;
            
					ajaxRequest.open('POST', 'renewBookStudent.php' + queryString, true);
					ajaxRequest.send(null); 
				}

</script>
<script>
              //Browser Support Code
            function renewStudent(renbid,renrid,renfine){
					Materialize.toast('Returning Book...!', 500, 'rounded');
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
							Materialize.toast('Renewed..!', 1000, 'rounded');

							document.getElementById('renbake').setAttribute('disabled','disabled');

						}
					}
               
					// Now get the value from user and pass it to
					// server script.
					
					var rendate = document.getElementById('rensrdt').value;
					
					var queryString = '?bookid=' + renbid + '&regid=' + renrid + '&fine=' + renfine+ '&returndate=' + rendate;

					ajaxRequest.open('POST', 'renewStudent.php' + queryString, true);
					ajaxRequest.send(null); 
				}

</script>
<script>
              //Browser Support Code
            function renewBookStaff(){
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
								var ajaxDisplay = document.getElementById('renewBookStaffHere');
								ajaxDisplay.innerHTML = ajaxRequest.responseText;
						}
					}
               
					// Now get the value from user and pass it to
					// server script.
					
					var st_bookIdr = document.getElementById('s_rn_book_id').value;
					var st_registerIdr = document.getElementById('s_rn_register_id').value;

					var total_error_fields_issue_renew_book = 'Please Enter Valid : ';
					var flag = true;

					if(st_bookIdr == ''){
						total_error_fields_issue_renew_book = total_error_fields_issue_renew_book+'Book ID, ';
						flag = false;
					}
					if(st_registerIdr  == ''){
						total_error_fields_issue_renew_book = total_error_fields_issue_renew_book+'Student ID, ';
						flag = false;
					}

					if(!flag){
						document.getElementById('renewBookStaffHere').innerHTML = '';
						document.getElementById('wrongFieldsRenewBookStaff').innerHTML = total_error_fields_issue_renew_book;
						exit(0);
					}
					
					Materialize.toast('Searching Book...!', 500, 'rounded');
					document.getElementById('wrongFieldsRenewBookStaff').innerHTML = '';


					
					var queryString = '?book_id=' + st_bookIdr + '&register_number=' + st_registerIdr;
            
					ajaxRequest.open('POST', 'renewBookStaff.php' + queryString, true);
					ajaxRequest.send(null); 
				}

</script>
<script>
              //Browser Support Code
            function renewStaff(renbid,renrid){
					Materialize.toast('Returning Book...!', 500, 'rounded');
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
							Materialize.toast('Renewed..!', 1000, 'rounded');

							document.getElementById('renbake').setAttribute('disabled','disabled');

						}
					}
               
					// Now get the value from user and pass it to
					// server script.
					
					var rendate = document.getElementById('rensrdt').value;
					
					var queryString = '?bookid=' + renbid + '&regid=' + renrid + '&returndate=' + rendate;

					ajaxRequest.open('POST', 'renewStaff.php' + queryString, true);
					ajaxRequest.send(null); 
				}

</script>
<script>
              //Browser Support Code
            function returnBookStudent(){
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
							var ajaxDisplay = document.getElementById('returnBookStudentHere');
							ajaxDisplay.innerHTML = ajaxRequest.responseText;
						}
					}
               
					// Now get the value from user and pass it to
					// server script.
					
					var bookId = document.getElementById('r_book_id').value;
					var registerId = document.getElementById('r_register_id').value;
					//var tempPassword = document.getElementById('r_temp_password').value;

					var total_error_fields_return_book_student = 'Please Enter Valid : ';
					var flag = true;
					if(bookId == ''){
						total_error_fields_return_book_student = total_error_fields_return_book_student+'Book ID, ';
						flag = false;
					}
					if(registerId  == ''){
						total_error_fields_return_book_student = total_error_fields_return_book_student+'Register ID, ';
						flag = false;
					}

					if(!flag){
						document.getElementById('returnBookStudentHere').innerHTML = '';
						document.getElementById('wrongFieldsReturnBookStudent').innerHTML = total_error_fields_return_book_student;
						exit(0);
					}
	
					document.getElementById('wrongFieldsReturnBookStaff').innerHTML = '';
					Materialize.toast('Returning Book...!', 500, 'rounded');
					
					var queryString = '?r_book_id=' + bookId + '&r_register_number=' + registerId;
            
					ajaxRequest.open('POST', 'returnBookStudent.php' + queryString, true);
					ajaxRequest.send(null); 
				}

</script>
<script>
              //Browser Support Code
            function returnedStudent(rbid,rrid,fine){
					Materialize.toast('Returning Book...!', 500, 'rounded');
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
							Materialize.toast('Returned..!', 1000, 'rounded');

							document.getElementById('fish').setAttribute('disabled','disabled');

							document.getElementById('clearReturnBookForm').click();
						}
					}
               
					// Now get the value from user and pass it to
					// server script.

					var queryString = '?rbookid=' + rbid + '&rregid=' + rrid + '&fine=' + fine;

					ajaxRequest.open('POST', 'returnedStudent.php' + queryString, true);
					ajaxRequest.send(null); 
				}

</script>
<script>
              //Browser Support Code
            function returnBookStaff(){
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
							var ajaxDisplay = document.getElementById('returnBookStaffHere');
							ajaxDisplay.innerHTML = ajaxRequest.responseText;
						}
					}
               
					// Now get the value from user and pass it to
					// server script.
					
					var st_bookId = document.getElementById('s_r_book_id').value;
					var st_registerId = document.getElementById('s_r_register_id').value;

					var total_error_fields_return_book_staff = 'Please Enter Valid : ';
					var flag = true;
					if(st_bookId == ''){
						total_error_fields_return_book_staff = total_error_fields_return_book_staff+'Book ID, ';
						flag = false;
					}
					if(st_registerId  == ''){
						total_error_fields_return_book_staff = total_error_fields_return_book_staff+'Register ID, ';
						flag = false;
					}

					if(!flag){
						document.getElementById('returnBookStaffHere').innerHTML = '';
						document.getElementById('wrongFieldsReturnBookStaff').innerHTML = total_error_fields_return_book_staff;
						exit(0);
					}
	
					document.getElementById('wrongFieldsReturnBookStaff').innerHTML = '';
					Materialize.toast('Returning Book...!', 500, 'rounded');
					
					var queryString = '?r_book_id=' + st_bookId + '&r_register_number=' + st_registerId;
            
					ajaxRequest.open('POST', 'returnBookStaff.php' + queryString, true);
					ajaxRequest.send(null); 
				}

</script>
<script>
              //Browser Support Code
            function returnedStaff(rbid,rrid,fine){
					Materialize.toast('Returning Book...!', 500, 'rounded');
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
							Materialize.toast('Returned..!', 1000, 'rounded');

							document.getElementById('fish').setAttribute('disabled','disabled');

							document.getElementById('clearReturnBookStaffForm').click();
						}
					}
               
					// Now get the value from user and pass it to
					// server script.

					var queryString = '?rbookid=' + rbid + '&rregid=' + rrid;

					ajaxRequest.open('POST', 'returnedStaff.php' + queryString, true);
					ajaxRequest.send(null); 
				}

</script>
<script>
              //Browser Support Code
            function deleteBook(){
					Materialize.toast('Searching Book...!', 500, 'rounded');
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
							var ajaxDisplay = document.getElementById('deleteBookHere');
							ajaxDisplay.innerHTML = ajaxRequest.responseText;
						}
					}
               
					// Now get the value from user and pass it to
					// server script.

					var dbookId = document.getElementById('d_book_id').value;

					var queryString = '?dbookid=' + dbookId;

					ajaxRequest.open('POST', 'deleteBook.php' + queryString, true);
					ajaxRequest.send(null); 
				}

</script>
<script>
              //Browser Support Code
            function deletedBook(dbid){
					 swal({   title: 'Are you sure?',   
             text: 'You will not be able to recover this Book!',   
             type: 'warning',   
             showCancelButton: true,   
             confirmButtonColor: '#DD6B55',   
             confirmButtonText: 'Yes, delete it!',   
             cancelButtonText: 'No, cancel please!',   
             closeOnConfirm: false,   
             closeOnCancel: false }, 
             function(isConfirm){   
                 if (isConfirm) {     
                     Materialize.toast('Deleting Book...!', 500, 'rounded');
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
							if(ajaxRequest.responseText != 9){
								Materialize.toast('Deleted..!', 1000, 'rounded');
								document.getElementById(dbid+'deleteButton').setAttribute('disabled','disabled');
								swal('Deleted!', 'Book has been deleted.', 'success');
							}else{
								swal('Cancelled', 'Book is reserved, Cannot be deleted!', 'error');
							}
						}
					}
               
					// Now get the value from user and pass it to
					// server script.

					var queryString = '?ddbookid=' + dbid;

					ajaxRequest.open('POST', 'deletedBook.php' + queryString, true);
					ajaxRequest.send(null);
					} 
                 else {
                     swal('Cancelled', 'Book is safe', 'error');
					 exit(0);   } 
            });
					
				}

</script>
<script>
              //Browser Support Code
            function deletedStudent(sbid){
					 swal({   title: 'Are you sure?',   
             text: 'You will not be able to recover this Student Account!',   
             type: 'warning',   
             showCancelButton: true,   
             confirmButtonColor: '#DD6B55',   
             confirmButtonText: 'Yes, delete it!',   
             cancelButtonText: 'No, cancel please!',   
             closeOnConfirm: false,   
             closeOnCancel: false }, 
             function(isConfirm){   
                 if (isConfirm) {  
			  Materialize.toast('Removing Student Account...!', 500, 'rounded');
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
							if(ajaxRequest.responseText != 11){
								Materialize.toast('Removed..!', 1000, 'rounded');
								document.getElementById(sbid+'deleteButton').setAttribute('disabled','disabled');
								swal('Removed!', 'Student Account has been deleted.', 'success');
							}else{
								swal('Cancelled', 'Book return is pending, Cannot delete!', 'error');
							}
						}
					}
               
					// Now get the value from user and pass it to
					// server script.

					var queryString = '?ssid=' + sbid;

					ajaxRequest.open('POST', 'deletedStudent.php' + queryString, true);
					ajaxRequest.send(null);

					} 
                 else {
                     swal('Cancelled', 'Student Account is safe', 'error');
					 exit(0);   } 
            });
					
				}

</script>
<script>
              //Browser Support Code
            function deletedStaff(ssbid){
					 swal({   title: 'Are you sure?',   
             text: 'You will not be able to recover this Student Account!',   
             type: 'warning',   
             showCancelButton: true,   
             confirmButtonColor: '#DD6B55',   
             confirmButtonText: 'Yes, delete it!',   
             cancelButtonText: 'No, cancel please!',   
             closeOnConfirm: false,   
             closeOnCancel: false }, 
             function(isConfirm){   
                 if (isConfirm) {  
			  Materialize.toast('Removing Staff Account...!', 500, 'rounded');
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
							if(ajaxRequest.responseText != 12){
								Materialize.toast('Removed..!', 1000, 'rounded');
								document.getElementById(ssbid+'deleteButton').setAttribute('disabled','disabled');
								swal('Removed!', 'Staff Account has been deleted.', 'success');
							}else{
								swal('Cancelled', 'Book return is pending, Cannot delete!', 'error');
							}
						}
					}
               
					// Now get the value from user and pass it to
					// server script.

					var queryString = '?ssid=' + ssbid;

					ajaxRequest.open('POST', 'deletedStaff.php' + queryString, true);
					ajaxRequest.send(null);

					} 
                 else {
                     swal('Cancelled', 'Student Account is safe', 'error');
					 exit(0);   } 
            });
					
				}

</script>
<script>
//Browser Support Code
            function getBookLibid(type){
					Materialize.toast('Searching...!', 1000, 'rounded')
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
							var ajaxDisplay = document.getElementById('noSearch');
							ajaxDisplay.innerHTML = '';

							var ajaxDisplay = document.getElementById('displayBooksHere');
							ajaxDisplay.innerHTML = ajaxRequest.responseText;
						}
					}
               
					// Now get the value from user and pass it to
					// server script.
					
					var searchid = document.getElementById('searchid').value;
					
					var queryString = '?search_id=' + searchid+'&type='+type;
            
					ajaxRequest.open('POST', 'getBooksLibid.php' + queryString, true);
					ajaxRequest.send(null); 
				}

</script>
<script>
//Browser Support Code
            function findStudent(){
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
							var ajaxDisplay = document.getElementById('findStudentHere');
							ajaxDisplay.innerHTML = ajaxRequest.responseText;
						}
					}
               
					// Now get the value from user and pass it to
					// server script.
					
					var studbranch = document.getElementById('stud_branch').value;
					var studsem = document.getElementById('stud_sem').value;

					var total_error_fields_find_student = 'Please Enter Valid : ';
					var flag = true;
					
					if(studbranch == ''){
						total_error_fields_find_student = total_error_fields_find_student+'Branch, ';
						flag = false;
					}

					if(studsem == ''){
						total_error_fields_find_student = total_error_fields_find_student+'Sem, ';
						flag = false;
					}

					
					if(!flag){
						document.getElementById('findStudentHere').innerHTML = '';
						document.getElementById('wrongFieldsFindStudent').innerHTML = total_error_fields_find_student;
						exit(0);
					}
					
					Materialize.toast('Searching...!', 1000, 'rounded');
					document.getElementById('wrongFieldsFindStudent').innerHTML = '';
					
					var queryString = '?stud_branch=' + studbranch + '&stud_sem=' + studsem;
            
					ajaxRequest.open('POST', 'findStudent.php' + queryString, true);
					ajaxRequest.send(null); 
				}

</script>
<script>
//Browser Support Code
            function findStaff(){
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
							var ajaxDisplay = document.getElementById('findStaffHere');
							ajaxDisplay.innerHTML = ajaxRequest.responseText;
						}
					}
               
					// Now get the value from user and pass it to
					// server script.
					
					var staffbranch = document.getElementById('s_staff_branch').value;
					var staffdesg = document.getElementById('s_staff_desg').value;

					var total_error_fields_find_staff = 'Please Enter Valid : ';
					var flag = true;
					
					if(staffbranch == ''){
						total_error_fields_find_staff = total_error_fields_find_staff+'Branch, ';
						flag = false;
					}

					if(staffdesg == ''){
						total_error_fields_find_staff = total_error_fields_find_staff+'Designation, ';
						flag = false;
					}

					
					if(!flag){
						document.getElementById('findStaffHere').innerHTML = '';
						document.getElementById('wrongFieldsFindStaff').innerHTML = total_error_fields_find_staff;
						exit(0);
					}
					
					Materialize.toast('Searching...!', 1000, 'rounded');
					document.getElementById('wrongFieldsFindStaff').innerHTML = '';
					
					var queryString = '?staff_branch=' + staffbranch + '&staff_desg=' + staffdesg;
            
					ajaxRequest.open('POST', 'findStaff.php' + queryString, true);
					ajaxRequest.send(null); 
				}

</script>
<script>
              //Browser Support Code
            function payFine(){
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
							var ajaxDisplay = document.getElementById('payFineHere');
							ajaxDisplay.innerHTML = ajaxRequest.responseText;
						}
					}
               
					// Now get the value from user and pass it to
					// server script.
					
					var studentId = document.getElementById('studentId').value;
					var fineAmount = document.getElementById('fineAmount').value;

					var total_error_fields_issue_pay_fine = 'Please Enter Valid : ';
					var flag = true;

					if(studentId == ''){
						total_error_fields_issue_pay_fine = total_error_fields_issue_pay_fine+'Student ID, ';
						flag = false;
					}
					if(fineAmount  == ''){
						total_error_fields_issue_pay_fine = total_error_fields_issue_pay_fine+'Amount, ';
						flag = false;
					}				


					if(!flag){
						document.getElementById('payFineHere').innerHTML = '';
						document.getElementById('wrongFieldsPayFine').innerHTML = total_error_fields_issue_pay_fine;
						exit(0);
					}
					
					Materialize.toast('Paying...!', 500, 'rounded');
					document.getElementById('wrongFieldsPayFine').innerHTML = '';


					
					var queryString = '?student_id=' + studentId + '&fine_amount=' + fineAmount;
            
					ajaxRequest.open('POST', 'payFine.php' + queryString, true);
					ajaxRequest.send(null); 
				}

</script>
<script>
//Browser Support Code
            function getecard(){
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
							var ajaxDisplay = document.getElementById('eCardHere');
							ajaxDisplay.innerHTML = ajaxRequest.responseText;
						}
					}
               
					// Now get the value from user and pass it to
					// server script.
					
					var stud_id = document.getElementById('esid').value;

					var total_error_fields_get_card = 'Please Enter Valid : ';
					var flag = true;
					
					if(stud_id == ''){
						total_error_fields_get_card = total_error_fields_get_card+'Register ID';
						flag = false;
					}


					
					if(!flag){
						document.getElementById('eCardHere').innerHTML = '';
						document.getElementById('wrongFieldsGetCard').innerHTML = total_error_fields_get_card;
						exit(0);
					}
					
					Materialize.toast('Searching...!', 1000, 'rounded');
					document.getElementById('wrongFieldsGetCard').innerHTML = '';
					
					var queryString = '?stud_id=' + stud_id;
            
					ajaxRequest.open('POST', 'getCard.php' + queryString, true);
					ajaxRequest.send(null); 
				}

</script>
<script>
	function clearStudentDetails(){
		document.getElementById('wrongFieldsRegisterStudents').innerHTML = '';
		document.getElementById('notifyStudent').innerHTML='';
	}
</script>
<script>
	function clearStaffDetails(){
		document.getElementById('wrongFieldsRegisterStaff').innerHTML = '';
		document.getElementById('notifyStaff').innerHTML='';
	}
</script>
<script>
	function clearBookDetails(){
		document.getElementById('notifyBook').innerHTML='';
		document.getElementById('wrongFieldsAddBook').innerHTML = '';
	}
</script>
<script>
	function clearIssueBookStudentDetails(){
		document.getElementById('issueBookHere').innerHTML='';
		document.getElementById('wrongFieldsIssueBookStudent').innerHTML = '';
	}
</script>
<script>
	function clearIssueBookStudent(){
		document.getElementById('wrongFieldsIssueBookStudent').innerHTML = '';
	}
</script>
<script>
	function clearIssueBookStaff(){
		document.getElementById('wrongFieldsIssueBookStaff').innerHTML = '';
	}
</script>
<script>
	function clearIssueBookStaffDetails(){
		document.getElementById('issueBookStaffHere').innerHTML='';
		document.getElementById('wrongFieldsIssueBookStaff').innerHTML = '';
	}
</script>
<script>
	function clearPayFineForm(){
		document.getElementById('PayFineHere').innerHTML='';
		document.getElementById('wrongFieldsPayFine').innerHTML = '';
	}
</script>
<script>
	function clearReturnBookStudentDetails(){
		document.getElementById('returnBookStudentHere').innerHTML='';
	}
</script>
<script>
	function clearReturnBookStaffDetails(){
		document.getElementById('returnBookStaffHere').innerHTML='';
	}
</script>
<script>
	function cleargetecard(){
		document.getElementById('eCardHere').innerHTML='';
		document.getElementById('wrongFieldsGetCard').innerHTML = '';
		document.getElementById('esid').value = '';
	}
</script>
<script>
	function clearRenewBookStudentForm(){
		document.getElementById('renewBookStudentHere').innerHTML='';
		document.getElementById('wrongFieldsRenewBookStudent').innerHTML = '';
		document.getElementById('rn_book_id').value = '';
		document.getElementById('rn_register_id').value = '';
	}
</script>
<script>
	function clearRenewBookStaffForm(){
		document.getElementById('renewBookStaffHere').innerHTML='';
		document.getElementById('wrongFieldsRenewBookStaff').innerHTML = '';
		document.getElementById('s_rn_book_id').value = '';
		document.getElementById('s_rn_register_id').value = '';
	}
</script>
	 <div class='mdl-layout mdl-js-layout mdl-layout--fixed-header'>
		<header class='mdl-layout__header'>
			<div class='mdl-layout__header-row'>
				<!-- Title -->
				<a href='#' class='brand-logo' style='padding-left:30%;'><span style='color:white' class='mdl-layout-title mdl-js-ripple-effect'>SHREE VIDYADHIRAJ POLYTECHNIC E-LIBRARY</span></a>
			</div>
		</header>
	     <div class='mdl-layout__drawer'>
         <span class='mdl-layout-title'>Menu</span>
         <nav class='mdl-navigation'><BR>
            <a class='mdl-navigation__link' href='profile.php' target='_blank'><i class='material-icons prefix'>book</i>Profile</a>
            <a class='mdl-navigation__link' href='settings.php' target='_blank'><i class='material-icons prefix'>settings</i>Change Password</a>
			<a class='mdl-navigation__link' href='logout.php'><i class='material-icons prefix'>flight_takeoff</i>Logout</a>  
         </nav>
      </div>
   <nav class='nav-extended'>
    <div class='nav-wrapper'>
      <ul class='tabs tabs-transparent'>
        <li class='tab'><a class='active' href='#homeTab'>Home</a></li>
        <li class='tab'><a href='#register'>Register User</a></li>
		<li class='tab'><a href='#addDeleteBookTab'>Add Book</a></li>
		<li class='tab'><a href='#issueBook'>Issue Book</a></li>
		<li class='tab'><a href='#renewBookTab'>Renew Book</a></li>
        <li class='tab'><a href='#returnBook'>Return Book</a></li>
		<li class='tab'><a href='#payFineTab'>Pay Fine</a></li>
		<li class='tab'><a href='#findBookTab'>Find Book</a></li>
		<li class='tab'><a href='#searchTab'>Find Users</a></li>
		<li class='tab'><a href='#eCardTab'>E-Card</a></li>
      </ul>
    </div>
  </nav> 

  <div id='register' class='col s12 z-depth-5 card-panel white lighten-1' style='margin-left:5%;margin-right:5%;'>
  <div class='card-tabs'>
      <ul class='tabs tabs-fixed-width'>
        <li class='tab'><a class='active' href='#registerStudentTab'>Student Registration</a></li>
        <li class='tab'><a href='#registerStaffTab'>Staff Registration</a></li>
      </ul>
    </div>
    <div class='card-content'>
       <div id='registerStudentTab' class='col s12 white lighten-1' style='margin-left:4%;margin-right:4%;'>
  <div class='row'>
	<div class='row'>
		<h3>Enter Details - Student</h3>
	</div>
    <form class='col s12' id='RegisterStudentForm'>
      <div class='row'>
        <div class='input-field col s6'>
          <i class='material-icons prefix'>account_circle</i>
		  <input id='first_name' type='text' class='validate' name='first_name' required>
          <label for='first_name'>First Name</label>
        </div>
        <div class='input-field col s6'>
          <input id='last_name' type='text' class='validate' name='last_name' required>
          <label for='last_name'>Last Name</label>
        </div>
      </div>
      <div class='row'>
		<div class='input-field col s6'>
		  <i class='material-icons prefix'>vpn_key</i>
          <input id='id' type='text' class='validate' name='id' required>
          <label for='id'>Register Number</label>
        </div>
      </div>
      <div class='row'>
        <div class='input-field col s12'>
		  <i class='material-icons prefix'>email</i>
          <input id='email' type='email' class='validate' name='email' required>
          <label for='emai'>Email</label>
        </div>
		<div class='row'>
       <div class='input-field col s12'>
         <i class='material-icons prefix'>home</i></span><textarea id='textarea1' class='materialize-textarea validate' name='address' required></textarea>
         <label for='textarea1'>Address</label>
       </div>
     </div>
      </div>
	  	   <div class='row'>
        <div class='col s12'>
          <i class='material-icons prefix'>event</i>
          <div class='input-field inline'>
            <input id='joining_year' type='text' class='validate' name='joining_year' required>
            <label for='joining_year'>Joining Year</label>
          </div>
        </div>
      </div>
	  <div class='row' style='padding-left:0.7em'>
		<label for='date' style='color:#212121;font-size:1em'>Date of Birth : </label>
		<input type='date' class='datepicker validate' name='dob' id='dob' required>
	  </div>
      <div class='row'>
        <div class='col s12'>
          <label for='roll_number' style='color:#212121;font-size:1em'>Enter Roll No. :</label>
          <div class='input-field inline'>
            <input id='roll_number' type='text' class='validate' name='roll_number' required>
            <label for='roll_number'>Roll Number</label>
          </div>
        </div>
      </div>
	   <div class='row'>
		 <div class='input-field col s12'>
			<select name='branch' id='branch' required>
				<option value='' disabled selected>Choose your option</option>
				<option value='CS'>Computer Science & Engineering</option>
				<option value='CE'>Civil Engineering</option>
				<option value='EC'>Electronics Engineering</option>
				<option value='AT'>Automobile Engineering</option>
				<option value='ME'>Mechanical Engineering</option>
			</select>
			<label style='font-size:1em'>Branch</label>
		</div>
	 </div>
	 <div class='row'>
		<div class='input-field col s12'>
			<select name='sem' id='sem' required>
				<option value='' disabled selected>Choose your option</option>
				<option value='1'>1</option>
				<option value='2'>2</option>
				<option value='3'>3</option>
				<option value='4'>4</option>
				<option value='5'>5</option>
				<option value='6'>6</option>
			</select>
			<label style='font-size:1em'>Sem</label>
		</div>
	</div>
	<div class='row'>

		<label for='test1 test2'>Gender</label>
		<p>
			<input  class='with-gap' name='gender' type='radio' id='genderm' value='M' checked required />
			<label for='genderm'>Male</label>
		</p>
		<p>
			<input class='with-gap' name='gender' type='radio' id='genderf' value='F' required />
			<label for='genderf'>Female</label>
		</p>
	</div>
	<div class='row'>
       <div class='input-field col s12'>
		 <input type='button' value='Submit' onclick='registerStudent()' class='btn'>
		 <input type='reset' value='Reset' id='clearRegisterStudentForm' class='btn' />
       </div>
	</div>
    </form>
	<div class='row'>
        <div class='col s12'>			
			<label for='wrong_fileds_register_student' id='wrongFieldsRegisterStudents' style='color:red;'></label>
        </div>
	</div>
	<table  id='notifyStudent' class='striped'>

	</table>
  </div>
  </div>



          <div id='registerStaffTab' class='col s12 white lighten-1' style='margin-left:4%;margin-right:4%;'>
<div class='row'>
	<div class='row'>
		<h3>Enter Details - Staff</h3>
	</div>
    <form class='col s12' id='RegisterStaffForm'>
      <div class='row'>
        <div class='input-field col s6'>
          <i class='material-icons prefix'>account_circle</i>
		  <input id='staff_first_name' type='text' class='validate' name='staff_first_name' required>
          <label for='staff_first_name'>First Name</label>
        </div>
        <div class='input-field col s6'>
          <input id='staff_last_name' type='text' class='validate' name='staff_last_name' required>
          <label for='staff_last_name'>Last Name</label>
        </div>
      </div>
      <div class='row'>
		  <div class='input-field col s6'>
		    <i class='material-icons prefix'>vpn_key</i>
			<input id='staff_id' type='text' class='validate' name='staff_id' required>
			<label for='staff_id'>Staff ID</label>
        </div>
      </div>
      <div class='row'>
		<div class='row'>
       <div class='input-field col s12'>
         <i class='material-icons prefix'>home</i></span><textarea id='staff_textarea1' class='materialize-textarea validate' name='staff_address' required></textarea>
         <label for='staff_textarea1'>Address</label>
       </div>
     </div>
      </div>
	   <div class='row'>
        <div class='col s12'>
          <label for='staff_' style='color:#212121;font-size:1em'>Enter Joining Year :</label>
          <div class='input-field inline'>
            <input id='staff_joining_year' type='text' class='validate' name='staff_joining_year' required>
            <label for='staff_joining_year' data-error='wrong' data-success='right'>Joining Year</label>
          </div>
        </div>
      </div>
	   <div class='row'>
		 <div class='input-field col s12'>
			<select name='staff_branch' id='staff_branch' required>
				<option value='' disabled selected>Choose your option</option>
				<option value='CS'>Computer Science & Engineering</option>
				<option value='CE'>Civil Engineering</option>
				<option value='EC'>Electronics Engineering</option>
				<option value='AT'>Automobile Engineering</option>
				<option value='ME'>Mechanical Engineering</option>
				<option value='MS'>Mathematics and Science</option>
			</select>
			<label style='color:font-size:1em'>Branch</label>
		</div>
	 </div>
	 <div class='row'>
		<div class='input-field col s12'>
			<select name='staff_designation' id='staff_designation' required>
				<option value='' disabled selected>Choose your option</option>
				<option value='Lecturer'>Lecturer</option>
				<option value='LabInstructor'>Lab Instructor</option>
				<option value='HOD'>H.O.D</option>
			</select>
			<label style='font-size:1em'>Designation</label>
		</div>
	</div>
	<div class='row'>
		<label for='test1 test2'>Gender</label>
		<p>
			<input class='with-gap' name='staff_gender' type='radio' id='staff_genderm' value='M' checked required />
			<label for='staff_genderm'>Male</label>
		</p>
		<p>
			<input class='with-gap' name='staff_gender' type='radio' id='staff_genderf' value='F' required />
			<label for='staff_genderf'>Female</label>
		</p>
	</div>
	<div class='row'>
       <div class='input-field col s12'>
		 <input type='button' value='Submit' onclick='registerStaff()' class='btn'>
		 <input type='reset' value='Reset' id='clearRegisterStaffForm' class='btn' />
       </div>
	</div>
    </form>
	<div class='row'>
        <div class='col s12'>			
			<label for='wrong_fileds_register_student' id='wrongFieldsRegisterStaff' style='color:red;'></label>
        </div>
	</div>
	<table  id='notifyStaff' class='striped'>

	</table>
  </div>
  </div>
 </div>
    </div>

	<div id='addDeleteBookTab' class='col s12 z-depth-5 card-panel white lighten-1' style='margin-left:7%;margin-right:7%;'>
		<div class='row'>
			<h3>Enter Details</h3>
		</div>
		<form name='addBookForm' id='addBook'>
			<div class='row'>
				<div class='input-field col s12'>
					<i class='material-icons prefix'>book</i>
					<input id='title' type='text' class='validate' name='book_title' required>
					<label for='title'>Book Title</label>
				</div>
			</div>
			<div class='row'>
				<div class='input-field col s12'>
					<i class='material-icons prefix'>record_voice_over</i>
					<input id='author' type='text' class='validate' name='book_author' required>
					<label for='author'>Book Author</label>
				</div>
			</div>
			<div class='row'>
				<div class='input-field col s12'>
					<i class='material-icons prefix'>recent_actors</i>
					<input id='pages' type='text' class='validate' name='book_pages' required>
					<label for='pages'>Book Pages</label>
				</div>
			</div>
			<div class='row'>
				<div class='input-field col s12'>
					<i class='material-icons prefix'>assignment_ind</i></span><textarea id='description' class='materialize-textarea validate' name='address' required></textarea>
				<label for='textarea1'>Description</label>
				</div>
			</div>
			<div class='row' style='padding-left:1.5em;'>
				<div class='chips input-field col s10' id='chipsBox'>
					<input type='text' class='validate' id='bookId' required>
				</div>
				<div class='input-field col s2'>
					<input disabled value='0' id='total_book' type='text' class='validate'>
					<label for='total_book'>Total Books</label>
				</div>
			</div>
			<div class='row' style='padding-left:0.7em;'>
				<div class='input-field col s12'>
					<select name='book_branch' id='book_branch' required>
						<option value='' disabled selected>Choose your option</option>
						<option value='cs'>Computer Science & Engineering</option>
						<option value='ce'>Civil Engineering</option>
						<option value='ec'>Electronics Engineering</option>
						<option value='at'>Automobile Engineering</option>
						<option value='me'>Mechanical Engineering</option>
						<option value='ms'>Mathematics and Science</option>
					</select>
					<label style='font-size:1em'>Branch</label>
				</div>
			</div>
			<div class='row' style='padding-left:0.7em;'>
				<div class='input-field col s12'>
					<select name='book_sem' id='book_sem' required>
						<option value='' disabled selected>Choose your option</option>
						<option value='1'>1</option>
						<option value='2'>2</option>
						<option value='3'>3</option>
						<option value='4'>4</option>
						<option value='5'>5</option>
						<option value='6'>6</option>
					</select>
					<label style='font-size:1em'>Sem</label>
				</div>
				<input type='button' value='Submit' onclick='storeBook()' class='btn'>
				<input type='reset' value='Reset' id='clearAddBookForm' class='btn' />
			</div>
		</form>
		<div class='row'>
         <div class='col s12'>			
			<label for='wrong_fileds_add_book' id='wrongFieldsAddBook' style='color:red;'></label>
         </div>
		</div>
		<table id='notifyBook' class='striped' style='width:100%'>

		</table>
</div>

  <div id='issueBook' class='col s12 z-depth-5 card-panel white lighten-1' style='margin-left:7%;margin-right:7%;'>
<div class='card-tabs'>
      <ul class='tabs tabs-fixed-width'>
        <li class='tab'><a class='active' href='#issueStudent'>Student Issue</a></li>
        <li class='tab'><a href='#issueStaff'>Staff Issue</a></li>
      </ul>
    </div>
    <div class='card-content'>
      <div id='issueStudent'>
	  
  	<div class='row'>
		<h4>Student Issue</h4>
    </div>
	<form name='issueBookForm'>
	 <div class='row'>
        <div class='input-field col s4'>
          <i class='material-icons prefix'>account_circle</i>
		  <input id='register_id' type='text' class='validate' name='register_id' required>
          <label for='register_id'>Register Number</label>
        </div>
        <div class='input-field col s4'>
		 <i class='material-icons prefix'>book</i>
          <input id='book_id' type='text' class='validate' name='book_id' required>
          <label for='book_id'>Book ID</label>
        </div>
      </div>
	  <input type='button' value='Submit' onclick='issueBook();' class='btn' />
	  <input type='reset' value='Reset' id='clearIssueBookForm' onclick=clearIssueBookStudent() class='btn' />
	  </form>
	  	<div class='row'>
         <div class='col s12'>			
			<label for='wrong_fileds_issueBook_student' id='wrongFieldsIssueBookStudent' style='color:red;'></label>
         </div>
		</div>
		<div class='row'>
			<table id='issueBookHere'>

			</table>
		</div>
	  </div>

      <div id='issueStaff'>
	  <div class='row'>
		<h4>Staff Issue</h4>
    </div>
	<form name='issueBookStaffForm'>
	 <div class='row'>
        <div class='input-field col s4'>
          <i class='material-icons prefix'>account_circle</i>
		  <input id='register_id_s' type='text' class='validate' name='register_id_s' required>
          <label for='register_id_s'>Staff ID</label>
        </div>
        <div class='input-field col s4'>
		 <i class='material-icons prefix'>book</i>
          <input id='book_id_s' type='text' class='validate' name='book_id_s' required>
          <label for='book_id_s'>Book ID</label>
        </div>
      </div>
	  <input type='button' value='Submit' onclick='issueBookStaff();' class='btn' />
	  <input type='reset' value='Reset' id='clearIssueBookStaffForm' onclick=clearIssueBookStaff() class='btn' />
	  </form>
	  	<div class='row'>
         <div class='col s12'>			
			<label for='wrong_fileds_issueBook_staff' id='wrongFieldsIssueBookStaff' style='color:red;'></label>
         </div>
		</div>
		<div class='row'>
			<table class='collection'  id='issueBookStaffHere'>

			</table>
		</div>
	  </div>
    </div>
  </div>
  <div id='returnBook' class='col s12 z-depth-5 card-panel white lighten-1' style='margin-left:7%;margin-right:7%;'>
	<div class='card-tabs'>
      <ul class='tabs tabs-fixed-width'>
        <li class='tab'><a class='active' href='#returnBookStudent'>Return Student</a></li>
        <li class='tab'><a href='#returnBookStaff'>Return Staff</a></li>
      </ul>
    </div>
    <div class='card-content'>
		<div id='returnBookStudent'>
  			<div class='row'>
				<h3>Enter Details</h3>
			</div>
			<form name='returnBookStudentForm'>
				<div class='row'>
					<div class='input-field col s4'>
						<i class='material-icons prefix'>account_circle</i>
						<input id='r_register_id' type='text' class='validate' name='r_register_id' required>
						<label for='r_register_id'>Register Number</label>
					</div>
					<div class='input-field col s4'>
						<i class='material-icons prefix'>book</i>
						<input id='r_book_id' type='text' class='validate' name='r_book_id' required>
						<label for='r_book_id'>Book ID</label>
					</div>
					<input type='button' value='Submit' onclick='returnBookStudent();' class='btn' />
					<input type='reset' value='Reset' id='clearReturnBookStudentForm' class='btn' />
				</div>
			</form>
	  		<div class='row'>
				<div class='col s12'>			
					<label for='wrong_fileds_add_book' id='wrongFieldsReturnBookStudent' style='color:red;'></label>
				</div>
			</div>
			<div class='row'>
				<table class='collection'  id='returnBookStudentHere'>

				</table>
			</div>
		</div>

		<div id='returnBookStaff'>
  			<div class='row'>
				<h3>Enter Details</h3>
			</div>
			<form name='returnBookStaffForm'>
				<div class='row'>
					<div class='input-field col s4'>
						<i class='material-icons prefix'>account_circle</i>
						<input id='s_r_register_id' type='text' class='validate' name='s_r_register_id' required>
						<label for='s_r_register_id'>Staff ID</label>
					</div>
					<div class='input-field col s4'>
						<i class='material-icons prefix'>book</i>
						<input id='s_r_book_id' type='text' class='validate' name='s_r_book_id' required>
						<label for='s_r_book_id'>Book ID</label>
					</div>
					<input type='button' value='Submit' onclick='returnBookStaff();' class='btn' />
					<input type='reset' value='Reset' id='clearReturnBookStaffForm' class='btn' />
				</div>
			</form>
	  		<div class='row'>
				<div class='col s12'>			
					<label for='wrong_fileds_add_book' id='wrongFieldsReturnBookStaff' style='color:red;'></label>
				</div>
			</div>
			<div class='row'>
				<table class='collection'  id='returnBookStaffHere'>

				</table>
			</div>
		</div>

		</div>
		</div>

   	<div id='findBookTab' class='col s12 z-depth-5 card-panel white lighten-1' style='margin-left:7%;margin-right:7%;'>
	<BR>
		<div class='row'>
			<form name='mySearchForm'>
				<div class='row'>
					<div class='input-field col s10'>
						<input id='searchid' type='text' class='validate' required>
						<label for='searchid'><i class='material-icons'>search</i>&nbsp;&nbsp;Search Book Name / ID</label>
					</div>
					<input type='button' value='Submit' onclick='getBookLibid(6)' class='btn tooltipped' data-position='bottom' data-delay='50' data-tooltip='Submit With Blank Value To Get All Books' id='searchBook'/>
				</div>
			</form>
		</div>
		<center><h4 style='margin-left:7%;margin-right:7%;' id='noSearch'>No Searches Yet</h4></center>
		<div id='displayBooksHere' class='row'>

		</div>
	</div>


 <div id='searchTab' class='col s12 z-depth-5 card-panel white lighten-1' style='margin-left:7%;margin-right:7%;'>
	<div class='card-tabs'>
      <ul class='tabs tabs-fixed-width'>
        <li class='tab'><a class='active' href='#searchStudentTab'>Find Student</a></li>
        <li class='tab'><a href='#searchStaffTab'>Find Staff</a></li>
      </ul>
	 </div>
		<div class='row'>
			<h4>Enter Details</h4>
		</div>
	 <div class='card-content'>
	     <div id='searchStudentTab' class='col s12 white lighten-1' style='margin-left:4%;margin-right:4%;'>
	<form name='searchStudentForm'>
			<div class='row'>
				<div class='input-field col s6'>
					<select name='stud_branch' id='stud_branch' required>
						<option value='' disabled selected>Choose your option</option>
						<option value='cs'>Computer Science & Engineering</option>
						<option value='ce'>Civil Engineering</option>
						<option value='ec'>Electronics Engineering</option>
						<option value='at'>Automobile Engineering</option>
						<option value='me'>Mechanical Engineering</option>
						<option value='MS'>Mathematics and Science</option>
					</select>
					<label>Branch</label>
				</div>
				<div class='input-field col s6'>
					<select name='stud_sem' id='stud_sem' required>
						<option value='' disabled selected>Choose your option</option>
						<option value='1'>1</option>
						<option value='2'>2</option>
						<option value='3'>3</option>
						<option value='4'>4</option>
						<option value='5'>5</option>
						<option value='6'>6</option>
					</select>
					<label>Sem</label>
				</div>
				<input type='button' value='Submit' onclick='findStudent()' class='btn' id='searchBook'/>
			</div>
		</form>
			<div class='row'>
				<div class='col s12'>			
					<label for='wrongFieldsFindStudent' id='wrongFieldsFindStudent' style='color:red;'></label>
				</div>
			</div>
		<div class='row'>
			<table  id='findStudentHere' class='striped'>

			</table>
		</div>
  </div>

  	     <div id='searchStaffTab' class='col s12 white lighten-1' style='margin-left:4%;margin-right:4%;'>
	<form name='searchStudentForm'>
			<div class='row'>
				<div class='input-field col s6'>
					<select name='s_staff_branch' id='s_staff_branch' required>
						<option value='' disabled selected>Choose your option</option>
						<option value='CS'>Computer Science & Engineering</option>
						<option value='CE'>Civil Engineering</option>
						<option value='EC'>Electronics Engineering</option>
						<option value='AT'>Automobile Engineering</option>
						<option value='ME'>Mechanical Engineering</option>
						<option value='MS'>Mathematics and Science</option>
					</select>
					<label>Branch</label>
				</div>
				<div class='input-field col s6'>
					<select name='s_staff_desg' id='s_staff_desg' required>
						<option value='' disabled selected>Choose your option</option>
						<option value='Lecturer'>Lecturer</option>
						<option value='LabInstructor'>Lab Instructor</option>
						<option value='HOD'>H.O.D</option>
					</select>
					<label>Designation</label>
				</div>
				<input type='button' value='Submit' onclick='findStaff()' class='btn'/>
			</div>
		</form>
			<div class='row'>
				<div class='col s12'>			
					<label for='wrongFieldsFindStaff' id='wrongFieldsFindStaff' style='color:red;'></label>
				</div>
			</div>
		<div class='row'>
			<table  id='findStaffHere' class='striped'>

			</table>
		</div>
  </div>

     </div>
  </div>

   	<div id='eCardTab' class='col s12 z-depth-5 card-panel white lighten-1' style='margin-left:7%;margin-right:7%;'>
	<BR>
		<div class='row'>
			<form name='eCardTForm'>
				<div class='row'>
					<div class='input-field col s12'>
						<input id='esid' type='text' class='validate' required>
						<label for='esid'><i class='material-icons'>search</i>Register ID</label>
					</div>
					<input type='button' value='Submit' onclick=getecard() class='btn'/>
					<input type='button' value='Clear' onclick=cleargetecard() class='btn'/>
				</div>
			</form>
			<div class='row'>
				<div class='col s12'>			
					<label for='wrong_fileds_get_card' id='wrongFieldsGetCard' style='color:red;'></label>
				</div>
			</div>
		</div>
		<table  id='eCardHere' class='striped'>

		</table>
	</div>

    <div id='payFineTab' class='col s12 z-depth-5 card-panel white lighten-1' style='margin-left:7%;margin-right:7%;'>
  	<div class='row'>
		<h3>Enter Details</h3>
    </div>
	<form name='payFineForm'>
	 <div class='row'>
        <div class='input-field col s4'>
		 <i class='material-icons prefix'>account_circle</i>
          <input id='studentId' type='text' class='validate' name='student_id' required>
          <label for='student_id'>Register Number</label>
        </div>
		 <div class='input-field col s4'>
		 <i class='material-icons prefix'>account_balance_wallet</i>
          <input id='fineAmount' type='text' class='validate' name='fine_amount' required>
          <label for='fine_amount'>Amount (Rupees)</label>
        </div>
      
		<input type='button' value='Submit' onclick='payFine();' class='btn' />
		<input type='reset' value='Reset' class='btn' id='clearPayFineForm' onclick=clearPayFineForm() />
	
	  </form>
	  <div class='row'>
         <div class='col s12'>			
			<label for='wrong_fileds_pay_fine' id='wrongFieldsPayFine' style='color:red;'></label>
         </div>
	  </div>
	  </div>
		<div class='row'>
			<ul class='collection'  id='payFineHere'>

			</ul>
		</div>
  </div> 
 
  <div id='renewBookTab' class='col s12 z-depth-5 card-panel white lighten-1' style='margin-left:7%;margin-right:7%;'>
	<div class='card-tabs'>
      <ul class='tabs tabs-fixed-width'>
        <li class='tab'><a class='active' href='#renewBookStudentTab'>Renew Student</a></li>
        <li class='tab'><a href='#renewBookStaffTab'>Renew Staff</a></li>
      </ul>
    </div>
    <div class='card-content'>
   
   <div id='renewBookStudentTab'>
  	<div class='row'>
		<h3>Enter Details</h3>
    </div>
	<form name='returnBookForm'>
	 <div class='row'>
        <div class='input-field col s4'>
          <i class='material-icons prefix'>account_circle</i>
		  <input id='rn_register_id' type='text' class='validate' name='rn_register_id' required>
          <label for='rn_register_id'>Register Number</label>
        </div>
        <div class='input-field col s4'>
		 <i class='material-icons prefix'>book</i>
          <input id='rn_book_id' type='text' class='validate' name='rn_book_id' required>
          <label for='rn_book_id'>Book ID</label>
        </div>
	  <input type='button' value='Submit' onclick=renewBookStudent(); class='btn' />
	  <input type='reset' value='Reset' id='clearRenewBookStudentForm' class='btn' />
	  </form>
	  	<div class='row'>
			<div class='col s12'>			
				<label for='wrong_fileds_renew_book' id='wrongFieldsRenewBookStudent' style='color:red;'></label>
			</div>
		</div>
	  </div>
		<div class='row'>
			<table class='collection'  id='renewBookStudentHere'>

			</table>
		</div>
  </div>
     <div id='renewBookStaffTab'>
  	<div class='row'>
		<h3>Enter Details</h3>
    </div>
	<form name='returnBookStaffForm'>
	 <div class='row'>
        <div class='input-field col s4'>
          <i class='material-icons prefix'>account_circle</i>
		  <input id='s_rn_register_id' type='text' class='validate' name='s_rn_register_id' required>
          <label for='s_rn_register_id'>Staff ID</label>
        </div>
        <div class='input-field col s4'>
		 <i class='material-icons prefix'>book</i>
          <input id='s_rn_book_id' type='text' class='validate' name='s_rn_book_id' required>
          <label for='s_rn_book_id'>Book ID</label>
        </div>
	  <input type='button' value='Submit' onclick=renewBookStaff(); class='btn' />
	  <input type='reset' value='Reset' id='clearRenewBookStaffForm' class='btn' />
	  </form>
	  	<div class='row'>
			<div class='col s12'>			
				<label for='wrong_fileds_renew_book' id='wrongFieldsRenewBookStaff' style='color:red;'></label>
			</div>
		</div>
	  </div>
		<div class='row'>
			<table class='collection'  id='renewBookStaffHere'>

			</table>
		</div>
  </div>

    </div>
  </div>   

</body>
</html>";
}else{
	header('Location: index.php');	
}
?>