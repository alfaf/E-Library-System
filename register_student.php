<?php 
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "elib";
   
   //Connect to MySQL Server
   mysql_connect($dbhost, $dbuser, $dbpass);
   
   //Select Database
   mysql_select_db($dbname) or die(mysql_error());


	$first_name = $_REQUEST['first_name'];
	$last_name = $_REQUEST['last_name'];
	$email = $_REQUEST['email'];
	$address = $_REQUEST['address'];
	$dob = $_REQUEST['dob'];
	$roll_number = $_REQUEST['roll_number'];
	$branch = $_REQUEST['branch'];
	$sem = $_REQUEST['sem'];
	$gender = $_REQUEST['gender'];
	$joining_year = $_REQUEST['joining_year'];
	$id = $_REQUEST['id'];;

	$first_name = mysql_real_escape_string($first_name);
	$last_name = mysql_real_escape_string($last_name);
	$email = mysql_real_escape_string($email);
	$address = mysql_real_escape_string($address);
	$dob = mysql_real_escape_string($dob);
	$roll_number = mysql_real_escape_string($roll_number);
	$branch = mysql_real_escape_string($branch);
	$sem = mysql_real_escape_string($sem);
	$gender = mysql_real_escape_string($gender);
	$joining_year = mysql_real_escape_string($joining_year);
	$id = mysql_real_escape_string($id);

	$qry_result = mysql_query("INSERT INTO `users`(`first_name`, `last_name`, `email`,`address`,`dob`,`roll_number`,`branch`,`sem`,`gender`,`id`,`joining_year`) VALUES('".$first_name."','".$last_name."','".$email."','".$address."','".$dob."','".$roll_number."','".$branch."','".$sem."','".$gender."','".$id."','".$joining_year."');");

	if($qry_result){
				$display_string ="<caption><center><label><h5>Student Account Created Succesfully</h5></label></center></caption>
								<thead>							
									<tr>
										<th data-field='name'>Name</th>
										<th data-field='email'>Email</th>
										<th data-field='address'>Address</th>
										<th data-field='dob'>DOB</th>
										<th data-field='roll_number'>Roll Number</th>
										<th data-field='branch'>Branch</th>
										<th data-field='sem'>Sem</th>
										<th data-field='gender'>Gender</th>
										<th data-field='id'>Register Number</th>
										<th data-field='Joining_year'>Joining Year</th>
									</tr>
									</thead><tbody>";
					$display_string .= "<tr id='item1' style='color:rgb(38, 166, 154)'></span>";
					$display_string .= "<td></span>$first_name&nbsp;$last_name</td>";
					$display_string .= "<td class='badge'>$email</td>";
					$display_string .= "<td class='badge'>$address</td>";
					$display_string .= "<td class='badge'>$dob</td>";
					$display_string .= "<td class='badge'>$roll_number</td>";
					$display_string .= "<td class='badge'>$branch</td>";
					$display_string .= "<td class='badge'>$sem</td>";
					$display_string .= "<td class='badge'>$gender</td>";
					$display_string .= "<td class='badge'>$id</td>";
					$display_string .= "<td class='badge'>$joining_year</td></tr></tbody>";
					$display_string .= "<center><BR><input type='button' value='Clear' onclick='clearStudentDetails()' class='btn'/></center><BR>";

					echo $display_string ;
	}else{
		echo "<center><h4 style='margin-left:7%;margin-right:7%;'>$id Account Already exists!</h4></center>";
	}
?>
