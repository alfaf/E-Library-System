<?php
   
   $dbhost = "localhost";
   $dbuser = "root";
   $dbpass = "";
   $dbname = "elib";
   
   //Connect to MySQL Server
   mysql_connect($dbhost, $dbuser, $dbpass);
   
   //Select Database
   mysql_select_db($dbname) or die(mysql_error());

   $book_id = $_REQUEST['r_book_id'];
   $register_id = $_REQUEST['r_register_number'];
   
		$query2 = "SELECT * FROM `staff` WHERE `id` = '$register_id'";
		//build query
		$query = "SELECT * FROM `books` WHERE `status` = '$register_id' AND `book_id` = '$book_id' AND `state` = 3;";
		$display_string = "";
		//Execute query
		$qry_result2 = mysql_query($query2) or die(mysql_error());
		if(mysql_num_rows($qry_result2) > 0){
		$qry_result = mysql_query($query) or die(mysql_error());	
		
		
		if(mysql_num_rows($qry_result) > 0){
			$display_string .="	<thead>			
							<tr>
								<th data-field='name'>Name of Book</th>
								<th data-field='id'>Book ID</th>
								<th data-field='rnum'>Register Number</th>
								<th data-field='iiidate'>Issued Date</th>
								<th data-field='rrrdate'>Return Date</th>
							</tr></thead><tbody>";

			$dates = new DateTime();
			$fine = 0;

				// Insert a new row in the table for each person returned
				while($row = mysql_fetch_array($qry_result)) {
					$date = new DateTime($row['return_date']);


					$display_string .= "<tr id='item1' style='color:rgb(38, 166, 154)'></span>";
					$display_string .= "<td class='badge'></span>$row[book_title]</td>";
					$display_string .= "<td>$book_id</td>";
					$display_string .= "<td class='badge'>$register_id</td>";
					$display_string .= "<td class='badge'>$row[dates]</td>";
					$display_string .= "<td class='badge'>$row[return_date]</td>";
					$display_string .= "<td class='badge' colspan='4'><input type='button' value='Return' onclick=returnedStaff($book_id,'$register_id') id='fish' class='btn tiny'/></td>";
					$display_string .= "<td><input type='button' value='Clear' onclick=clearReturnBookStaffDetails() class='btn'/></td>";
					$display_string .= "</tr>";

					
				}									
				$display_string .= "</tbody>";

				echo $display_string;
   
		}else{
			$display_string .= "<tr id='item1' style='color:rgb(38, 166, 154)'></span>";
			$display_string .= "<td class='badge' colspan='4'>No Books Found</td>";
			$display_string .= "</tr>";

			echo $display_string;
		}
		}else{

					$display_string .= "<tr id='item1' style='color:rgb(38, 166, 154)'></span>";
					$display_string .= "<td class='badge' colspan='4'>Register ID Not Found</td>";
					$display_string .= "</tr></tbody>";

					echo $display_string;
			}


?>