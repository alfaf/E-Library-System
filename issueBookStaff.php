<?php
   
   $dbhost = "localhost";
   $dbuser = "root";
   $dbpass = "";
   $dbname = "elib";
   
   //Connect to MySQL Server
   mysql_connect($dbhost, $dbuser, $dbpass);
   
   //Select Database
   mysql_select_db($dbname) or die(mysql_error());

   $book_id_s = $_REQUEST['book_id_s'];
   $register_id_s = $_REQUEST['register_number_s'];
   
		$query2 = "SELECT * FROM `staff` WHERE `id` = '$register_id_s'";
		$display_string = "";
		//build query
		$query = "SELECT * FROM `books` WHERE `book_id` = '$book_id_s' AND `state`<>3";
   
		$qry_result2 = mysql_query($query2) or die(mysql_error());

		if(mysql_num_rows($qry_result2) > 0){

		//Execute query
			$qry_result = mysql_query($query) or die(mysql_error());	
		
			if(mysql_num_rows($qry_result) > 0){
					$display_string .="	<thead>			
								<tr>
									<th data-field='name'>Name of Book</th>
									<th data-field='id'>Book ID</th>
									<th data-field='siiidate'>Issued Date</th>
									<th data-field='srrrdate'>Return Date</th>
								</tr></thead><tbody>";
					$rdt = date('Y-m-d', strtotime('+7 days'));
					$dt = date('Y-m-d');

				// Insert a new row in the table for each person returned
					while($row = mysql_fetch_array($qry_result)) {

						$display_string .= "<tr id='item1' style='color:rgb(38, 166, 154)'></span>";
						$display_string .= "<td class='badge'>$row[book_title]</td>";
						$display_string .= "<td class='badge'>$book_id_s</td>";
						$display_string .= "<td class='badge'>$dt</td>";
						$display_string .= "<td class='badge'><input type='date' value='$rdt' min='$dt' class='datepicker validate' name='rdt' id='srdt' required></td>";
						$display_string .= "<td class='badge'><input type='button' value='Issue' onclick=issueS($book_id_s,'$register_id_s') id='bakee' class='btn tiny'/></span></td>";
						$display_string .= "<td class='badge' colspan='4'><center><center><input type='button' value='Clear' onclick=clearIssueBookStaffDetails() class='btn'/></center></td>";
						$display_string .= "</tr>";

					
					}			
						$display_string .= "</tbody>";
						echo $display_string;
   
			}else{
				$display_string .= "<tr id='item1' style='color:rgb(38, 166, 154)'></span>";
				$display_string .= "<td class='badge' colspan='4'>No Books Found / Reserved</td>";
				$display_string .= "</tr></tbody>";

				echo $display_string;
			}
		}else{
				$display_string .= "<tr id='item1' style='color:rgb(38, 166, 154)'></span>";
				$display_string .= "<td class='badge' colspan='4'>Staff ID Not Found</td>";
				$display_string .= "</tr></tbody>";

				echo $display_string;
			}

?>