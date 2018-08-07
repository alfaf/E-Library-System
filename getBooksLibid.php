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
   $search_id = $_REQUEST['search_id'];
    $type = $_REQUEST['type'];
   
		// Escape User Input to help prevent SQL Injection
		$type = mysql_real_escape_string($type);
   
   
	if($type == 6){
				$query = "SELECT * FROM `books` WHERE `book_title` LIKE '%$search_id%'";
				echo "<div class='row'>
		<p>
			<input  class='with-gap' onclick='getBookLibid(6)' name='sortbooks' type='radio' id='all' value='A' checked required />
			<label for='all'>All</label>

			<input class='with-gap' onclick='getBookLibid(3)' name='sortbooks' type='radio' id='reserved' value='R' required />
			<label for='reserved'>Reserved</label>

			<input class='with-gap' onclick='getBookLibid(0)' name='sortbooks' type='radio' id='free' value='F' required />
			<label for='free'>Free</label>
		</p>
	</div>";}

	if($type == 3){
				$query = "SELECT * FROM `books` WHERE `book_title` LIKE '%$search_id%' AND `state`='3'";
				echo "<div class='row'>
		<p>
			<input  class='with-gap' onclick='getBookLibid(6)' name='sortbooks' type='radio' id='all' value='A' required />
			<label for='all'>All</label>

			<input class='with-gap' onclick='getBookLibid(3)' name='sortbooks' type='radio' id='reserved' value='R' checked required />
			<label for='reserved'>Reserved</label>

			<input class='with-gap' onclick='getBookLibid(0)' name='sortbooks' type='radio' id='free' value='F' required />
			<label for='free'>Free</label>
		</p>
	</div>";}

	if($type == 0){
				$query = "SELECT * FROM `books` WHERE `book_title` LIKE '%$search_id%' AND `state`='0'";
				echo "<div class='row'>
		<p>
			<input  class='with-gap' onclick='getBookLibid(6)' name='sortbooks' type='radio' id='all' value='A' required />
			<label for='all'>All</label>

			<input class='with-gap' onclick='getBookLibid(3)' name='sortbooks' type='radio' id='reserved' value='R' required />
			<label for='reserved'>Reserved</label>

			<input class='with-gap' onclick='getBookLibid(0)' name='sortbooks' type='radio' id='free' value='F' checked required />
			<label for='free'>Free</label>
		</p>
	</div>";}
				 
  
   if(is_numeric($search_id))
	$query = "SELECT * FROM `books` WHERE `book_id` = '$search_id'";
   
		// Escape User Input to help prevent SQL Injection
		$search_id = mysql_real_escape_string($search_id);

		//Execute query
		$qry_result = mysql_query($query) or die(mysql_error());
   
		if(mysql_num_rows($qry_result) > 0){

				$display_string ="<center><h4 style='margin-left:7%;margin-right:7%;'>Total Book(s) Found - ".mysql_num_rows($qry_result)."</h4></center>";

				// Insert a new row in the table for each person returned
				while($row = mysql_fetch_array($qry_result)) {
					if($row['state'] > 0){
						$status = "Reserved ( $row[status] )";
						$opts = "<span class='card-title activator grey-text text-darken-4'><i class='material-icons'>book</i>$row[book_title]<i									class='material-icons right'>arrow_drop_down_circle</i></span><p class='right bbk' id='$row[book_id]'>$status</p>";
					}else{
						$status = "Free";
						$opts ="<span class='card-title activator grey-text text-darken-4'><i class='material-icons'>book</i>$row[book_title]<i									class='material-icons right'>arrow_drop_down_circle</i></span><p class='right bbk' id='$row[book_id]'>$status</p>";
					}

					$display_string .= "<div class='row' style='margin-left:7%;margin-right:7%;'>";
					$display_string .= "<div class='card'>";
					$display_string .= "<div class='card-content #4db6ac teal lighten-2'>";
					$display_string .= $opts; 
					$display_string .= "<p>Author : $row[book_author]</p>";
					$display_string .= "<p>Book ID : $row[book_id]</p>";
					$display_string .= "<p>Pages : $row[book_pages]</p>";
					$display_string .= "<p>Branch : $row[book_branch]</p>";
					$display_string .= "<p>Sem : $row[book_sem]</p>";
					$display_string .= "</div>";
					$display_string .= "<div class='card-reveal #ce93d8 purple lighten-3'>";
					$display_string .= "<span class='card-title grey-text text-darken-4'><i class='material-icons'>book</i>$row[book_title]<i class='material-icons										right'>close</i></span>";
					$display_string .= "<p>$row[description]</p>";
					$display_string .= "<input type='button' value='Delete Book' onclick='deletedBook($row[book_id]);' id='$row[book_id]deleteButton' class='btn' />";
					$display_string .= "</div>";
					$display_string .= "</div>";
					$display_string .= "</div>";
				}
   
			echo $display_string;
		}else{
			echo "<center><h4 style='margin-left:7%;margin-right:7%;'>No Books Found</h4></center>";
		}

?>