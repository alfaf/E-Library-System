<?php 
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "elib";
   
   //Connect to MySQL Server
   mysql_connect($dbhost, $dbuser, $dbpass);
   
   //Select Database
   mysql_select_db($dbname) or die(mysql_error());


	$staff_first_name = $_REQUEST['staff_first_name'];
	$staff_last_name = $_REQUEST['staff_last_name'];
	$staff_address = $_REQUEST['staff_address'];
	$staff_branch = $_REQUEST['staff_branch'];
	$staff_designation = $_REQUEST['staff_designation'];
	$staff_gender = $_REQUEST['staff_gender'];
	$staff_joining_year = $_REQUEST['staff_joining_year'];
	$staff_id = $_REQUEST['staff_id'];;

	$staff_first_name = mysql_real_escape_string($staff_first_name);
	$staff_last_name = mysql_real_escape_string($staff_last_name);
	$staff_address = mysql_real_escape_string($staff_address);
	$staff_branch = mysql_real_escape_string($staff_branch);
	$staff_designation = mysql_real_escape_string($staff_designation);
	$staff_gender = mysql_real_escape_string($staff_gender);
	$staff_joining_year = mysql_real_escape_string($staff_joining_year);
	$staff_id = mysql_real_escape_string($staff_id);

	$qry_result = mysql_query("INSERT INTO `staff`(`first_name`, `last_name`,`address`,`branch`,`designation`,`gender`,`id`,`joining_year`) VALUES('".$staff_first_name."','".$staff_last_name."','".$staff_address."','".$staff_branch."','".$staff_designation."','".$staff_gender."','".$staff_id."','".$staff_joining_year."');");

	if($qry_result){
				$display_string ="<caption><center><label><h5>Staff Account Created Succesfully</h5></label></center></caption>
								<thead>							
									<tr>
										<th data-field='name'>Name</th>
										<th data-field='address'>Address</th>
										<th data-field='branch'>Branch</th>
										<th data-field='designation'>Designation</th>
										<th data-field='gender'>Gender</th>
										<th data-field='id'>ID</th>
										<th data-field='joining_year'>Joining Year</th>
									</tr>
									</thead><tbody>";
					$display_string .= "<tr id='item1' style='color:rgb(38, 166, 154)'></span>";
					$display_string .= "<td></span>$staff_first_name&nbsp;$staff_last_name</td>";
					$display_string .= "<td class='badge'>$staff_address</td>";
					$display_string .= "<td class='badge'>$staff_branch</td>";
					$display_string .= "<td class='badge'>$staff_designation</td>";
					$display_string .= "<td class='badge'>$staff_gender</td>";
					$display_string .= "<td class='badge'>$staff_id</td>";
					$display_string .= "<td class='badge'>$staff_joining_year</tr></tbody>";
					$display_string .= "<center><BR><input type='button' value='Clear' onclick='clearStaffDetails()' class='btn'/></center><BR>";

					echo $display_string ;
	}else{
		echo "<center><h4 style='margin-left:7%;margin-right:7%;'>$staff_id Account Already exists!</h4></center>";
	}
?>
