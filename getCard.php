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
   $stud_id = $_REQUEST['stud_id'];
   
		// Escape User Input to help prevent SQL Injection
		$stud_id = mysql_real_escape_string($stud_id);
   
   
		//build query
		$query = "SELECT * FROM `ecard` WHERE `id` = '$stud_id'";
   
		//Execute query
		$qry_result = mysql_query($query) or die(mysql_error());	
		
		$total_entry = mysql_num_rows($qry_result);
		
		if(mysql_num_rows($qry_result) > 0){
				$display_string ="<caption><center><label><input type='text' class='col s2' id='mySearchBook' onkeyup='searchbook()' placeholder='Search for Book IDs..' title='Type in a name'><label>ID : $stud_id</label><BR>;<BR><BR><h5 class='col s10 pull-s1'>Total Record(s) Found $total_entry </h5></label></center></caption>";
				$display_string .="<thead>							
									<tr>
										<th data-field='name'><i class='material-icons prefix' onclick=sortTable(0,'eCardHere') style='cursor:pointer'>import_export</i>Register Number</th>
										<th data-field='sem'><i class='material-icons prefix' onclick=sortTable(1,'eCardHere') style='cursor:pointer'>import_export</i>Book ID</th>
										<th data-field='branch'><i class='material-icons prefix' onclick=sortTable(2,'eCardHere') style='cursor:pointer'>import_export</i>Issued Date</th>
										<th data-field='roll_number'><i class='material-icons prefix' onclick=sortTable(3,'eCardHere') style='cursor:pointer'>import_export</i>Return Date</th>
										<th data-field='email'><i class='material-icons prefix' onclick=sortTable(4,'eCardHere') style='cursor:pointer'>import_export</i>Returned</th>
										<th data-field='id'><i class='material-icons prefix' onclick=sortTable(5,'eCardHere') style='cursor:pointer'>import_export</i>Fine(Rs.)</th>
									</tr>
									</thead><tbody>";
				// Insert a new row in the table for each person returned
				while($row = mysql_fetch_array($qry_result)) {

					$display_string .= "<tr id='item1' style='color:rgb(38, 166, 154)'></span>";
					$display_string .= "<td></span>$row[id]</td>";
					$display_string .= "<td class='badge'>$row[book_id]</td>";
					$display_string .= "<td class='badge'>$row[issue_date]</td>";
					$display_string .= "<td class='badge'>$row[return_date]</td>";
					$display_string .= "<td class='badge'>$row[returned]</td>";
					$display_string .= "<td class='badge'>$row[fine]</td>";
					$display_string .= "</tr>";
					
					
				}
				$display_string .= "</tbody>";

				echo $display_string;
   
		}else{
			echo "<label><center><h5 style='margin-left:7%;margin-right:7%;'>No Record(s) Found</h5></center></label>";
		}

?>