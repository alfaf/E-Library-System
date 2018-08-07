<?php
   
   $dbhost = "localhost";
   $dbuser = "root";
   $dbpass = "";
   $dbname = "elib";
   
   //Connect to MySQL Server
   mysql_connect($dbhost, $dbuser, $dbpass);
   
   //Select Database
   mysql_select_db($dbname) or die(mysql_error());
   
   
		//build query
		$query = "SELECT * FROM `books` WHERE `state` = 1";
   
		//Execute query
		$qry_result = mysql_query($query) or die(mysql_error());	

		
		if(mysql_num_rows($qry_result) > 0){
				$i=1;
				
				// Insert a new row in the table for each person returned
				while($row = mysql_fetch_array($qry_result)) {
					$newID = 'new'.$i;                                                                                                                               
					$indeterminatecheckboxIDa = 'indeterminate-checkboxa'.$i;
					$indeterminatecheckboxIDb = 'indeterminate-checkboxb'.$i;

					$display_string = "<script></script>";
					$display_string .= "<a href='#!' class='collection-item'>";
					$display_string .= "<span class='new badge' id='$newID'></span>";
					$display_string .= "<span class='badge'>$row[dates]&nbsp;&nbsp;&nbsp;</span>";
					$display_string .= "<span class='badge'>$row[status]&nbsp;&nbsp;&nbsp;</span>";
					$display_string .= "<span><input type='button' class='tiny btn' value='Accept' id='$indeterminatecheckboxIDa' onclick=readyToIssueBook($row[book_id],'$indeterminatecheckboxIDa','$indeterminatecheckboxIDb');>";
					$display_string .= "&nbsp;<span><input type='button' class='tiny btn' value='Discard' id='$indeterminatecheckboxIDb' onclick=discard($row[book_id],'$row[status]','$indeterminatecheckboxIDa','$indeterminatecheckboxIDb');>";
					$display_string .= "<label for='$indeterminatecheckboxIDa'>&nbsp;</label></span>$row[book_title]</a>";
					echo $display_string;

					$i++;

				}
   
		}else{
			echo "<center><h4 style='margin-left:7%;margin-right:7%;'>No Reservation Found</h></center>";
		}

?>