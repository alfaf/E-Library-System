<?php
   
   $dbhost = "localhost";
   $dbuser = "root";
   $dbpass = "";
   $dbname = "elib";
   
   //Connect to MySQL Server
   mysql_connect($dbhost, $dbuser, $dbpass);
   
   //Select Database
   mysql_select_db($dbname) or die(mysql_error());

      // Retrieve data from Query String
   $staff_branch = $_REQUEST['staff_branch'];
   $staff_desg = $_REQUEST['staff_desg'];
   
		// Escape User Input to help prevent SQL Injection
		$staff_branch = mysql_real_escape_string($staff_branch);
		$staff_desg = mysql_real_escape_string($staff_desg);
   
   
		//build query
		$query = "SELECT * FROM `staff` WHERE `branch` = '$staff_branch' AND `designation` = '$staff_desg'";
   
		//Execute query
		$qry_result = mysql_query($query) or die(mysql_error());	
		
		$total_staff = mysql_num_rows($qry_result);
		
		if(mysql_num_rows($qry_result) > 0){
				$display_string ="<caption><center><label><input type='text' class='col s2' id='mySearchNameStaff' onkeyup=searchname('findStaffHere','mySearchNameStaff') placeholder='Search for names..' title='Type in a name'><BR><BR><h5 class='col s10 pull-s1'>Total Staff(s) Found $total_staff </h5></label></center></caption>";
				$display_string .="<thead>							
									<tr>
										<th data-field='name'><i class='material-icons prefix' onclick=sortTable(0,'findStaffHere') style='cursor:pointer'>import_export</i>Name</th>
										<th data-field='sem'><i class='material-icons prefix' onclick=sortTable(1,'findStaffHere') style='cursor:pointer'>import_export</i>Address</th>
										<th data-field='branch'><i class='material-icons prefix' onclick=sortTable(2,'findStaffHere') style='cursor:pointer'>import_export</i>Branch</th>
										<th data-field='roll_number'><i class='material-icons prefix' onclick=sortTable(3,'findStaffHere') style='cursor:pointer'>import_export</i>Designation</th>
										<th data-field='email'><i class='material-icons prefix' onclick=sortTable(4,'findStaffHere') style='cursor:pointer'>import_export</i>Gender</th>
										<th data-field='id'><i class='material-icons prefix' onclick=sortTable(5,'findStaffHere') style='cursor:pointer'>import_export</i>ID</th>
										<th data-field='id'><i class='material-icons prefix' onclick=sortTable(6,'findStaffHere') style='cursor:pointer'>import_export</i>Joining Year</th>
									</tr>
									</thead><tbody>";
				// Insert a new row in the table for each person returned
				while($row = mysql_fetch_array($qry_result)) {

					$display_string .= "<tr id='item1' style='color:rgb(38, 166, 154)'></span>";
					$display_string .= "<td></span>$row[first_name]&nbsp;$row[last_name]</td>";
					$display_string .= "<td class='badge'>$row[address]</td>";
					$display_string .= "<td class='badge'>$row[branch]</td>";
					$display_string .= "<td class='badge'>$row[designation]</td>";
					$display_string .= "<td class='badge'>$row[gender]</td>";
					$display_string .= "<td class='badge'>$row[id]</td>";
					$display_string .= "<td class='badge'>$row[joining_year]</td>";
					$display_string .= "<td><input type='button' value='Delete Staff' onclick=deletedStaff('$row[id]'); id='$row[id]deleteButton' class='btn' /></td>";
					$display_string .= "</tr>";
					
					
				}
				$display_string .= "</tbody>";

				echo $display_string;
   
		}else{
			echo "<label><center><h5 style='margin-left:7%;margin-right:7%;'>No Staff Found</h5></center></label>";
		}

?>