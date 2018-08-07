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
   $stud_branch = $_REQUEST['stud_branch'];
   $stud_sem = $_REQUEST['stud_sem'];
   
		// Escape User Input to help prevent SQL Injection
		$stud_branch = mysql_real_escape_string($stud_branch);
		$stud_sem = mysql_real_escape_string($stud_sem);
   
   
		//build query
		$query = "SELECT * FROM `users` WHERE `branch` = '$stud_branch' AND `sem` = '$stud_sem'";
   
		//Execute query
		$qry_result = mysql_query($query) or die(mysql_error());	
		
		$total_stud = mysql_num_rows($qry_result);
		
		if(mysql_num_rows($qry_result) > 0){
				$display_string ="<caption><center><label><input type='text' class='col s2' id='mySearchNameStudent' onkeyup=searchname('findStudentHere','mySearchNameStudent') placeholder='Search for names..' title='Type in a name'><BR><BR><h5 class='col s10 pull-s1'>Total Student(s) Found $total_stud </h5></label></center></caption>";
				$display_string .="<thead>							
									<tr>
										<th data-field='name'><i class='material-icons prefix' onclick=sortTable(0,'findStudentHere') style='cursor:pointer'>import_export</i>Name</th>
										<th data-field='sem'><i class='material-icons prefix' onclick=sortTable(1,'findStudentHere') style='cursor:pointer'>import_export</i>Sem</th>
										<th data-field='branch'><i class='material-icons prefix' onclick=sortTable(2,'findStudentHere') style='cursor:pointer'>import_export</i>Branch</th>
										<th data-field='roll_number'><i class='material-icons prefix' onclick=sortTable(3,'findStudentHere') style='cursor:pointer'>import_export</i>Roll Number</th>
										<th data-field='email'><i class='material-icons prefix' onclick=sortTable(4,'findStudentHere') style='cursor:pointer'>import_export</i>Email</th>
										<th data-field='id'><i class='material-icons prefix' onclick=sortTable(5,'findStudentHere') style='cursor:pointer'>import_export</i>ID</th>
										<th data-field='id'><i class='material-icons prefix' onclick=sortTable(6,'findStudentHere') style='cursor:pointer'>import_export</i>Fine(Rs.)</th>
									</tr>
									</thead><tbody>";
				// Insert a new row in the table for each person returned
				while($row = mysql_fetch_array($qry_result)) {

					$display_string .= "<tr id='item1' style='color:rgb(38, 166, 154)'></span>";
					$display_string .= "<td></span>$row[first_name]&nbsp;$row[last_name]</td>";
					$display_string .= "<td class='badge'>$row[sem]</td>";
					$display_string .= "<td class='badge'>$row[branch]</td>";
					$display_string .= "<td class='badge'>$row[roll_number]</td>";
					$display_string .= "<td class='badge'>$row[email]</td>";
					$display_string .= "<td class='badge'>$row[id]</td>";
					$display_string .= "<td class='badge'>$row[amount]</td>";
					$display_string .= "<td><input type='button' value='Delete Student' onclick=deletedStudent('$row[id]'); id='$row[id]deleteButton' class='btn' /></td>";
					$display_string .= "</tr>";
					
					
				}
				$display_string .= "</tbody>";

				echo $display_string;
   
		}else{
			echo "<label><center><h5 style='margin-left:7%;margin-right:7%;'>No Students Found</h5></center></label>";
		}

?>