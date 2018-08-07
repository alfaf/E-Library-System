<?php
   
   $dbhost = "localhost";
   $dbuser = "root";
   $dbpass = "";
   $dbname = "elib";
   
   //Connect to MySQL Server
   mysql_connect($dbhost, $dbuser, $dbpass);
   
   //Select Database
   mysql_select_db($dbname) or die(mysql_error());

   $book_id = $_REQUEST['book_id'];
   $register_id = $_REQUEST['register_number'];
   
		$query2 = "SELECT * FROM `staff` WHERE `id` = '$register_id'";
		$display_string = "";
		//build query
		$query = "SELECT * FROM `books` WHERE `status` = '$register_id' AND `book_id` = '$book_id' AND `state` = 3;";
   
		$qry_result2 = mysql_query($query2) or die(mysql_error());

		if(mysql_num_rows($qry_result2) > 0){

		//Execute query
			$qry_result = mysql_query($query) or die(mysql_error());	

		
			if(mysql_num_rows($qry_result) > 0){
				$display_string .="	<thead>			
								<tr>
									<th data-field='name'>Name of Book</th>
									<th data-field='id'>Book ID</th>
									<th data-field='siidate'>Issued Date</th>
									<th data-field='siidate'>Return Date</th>
									<th data-field='siidate'>Fine(Rs.)</th>
									<th data-field='srrdate'>Extended Date</th>
								</tr></thead><tbody>";

				$dates = new DateTime();
				$mindate = date('Y-m-d', strtotime('+1 days'));
				$fine = 0;

				// Insert a new row in the table for each person returned
					while($row = mysql_fetch_array($qry_result)) {
						$date = new DateTime($row['return_date']);

						$display_string .= "<tr id='item1' style='color:rgb(38, 166, 154)'></span>";
						$display_string .= "<td class='badge'></span>&nbsp;&nbsp;$row[book_title]</li></td>";
						$display_string .= "<td class='badge'>$book_id</td>";
						$display_string .= "<td class='badge'>$row[dates]</td>";
						$display_string .= "<td class='badge'>$row[return_date]</td>";
						$display_string .= "<td class='badge'>$fine</td>";
						$display_string .= "<td class='badge'><input type='date' value='$mindate' class='datepicker validate' name='rensrdt' id='rensrdt' required></td>";
						$display_string .= "<td class='badge' colspan='4'><center><center><input type='button' value='Renew' onclick=renewStaff($book_id,'$register_id') id='renbake' class='btn tiny'/></td>";
						$display_string .= "<td><input type='button' value='Clear' onclick=clearRenewBookStaffForm() class='btn'/></center></td>";
						$display_string .= "</tr>";

					
					}			
						$display_string .= "</tbody>";
						echo $display_string;
   
				}else{
					$display_string .= "<tr id='item1' style='color:rgb(38, 166, 154)'></span>";
					$display_string .= "<td class='badge' colspan='4'>No Books Found</td>";
					$display_string .= "</tr></tbody>";

					echo $display_string;
				}
		}else{

					$display_string .= "<tr id='item1' style='color:rgb(38, 166, 154)'></span>";
					$display_string .= "<td class='badge' colspan='4'>Register ID Not Found</td>";
					$display_string .= "</tr></tbody>";

					echo $display_string;
			}

?>