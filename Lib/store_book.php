<?php 
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "elib";
   
   //Connect to MySQL Server
   mysql_connect($dbhost, $dbuser, $dbpass);
   
   //Select Database
   mysql_select_db($dbname) or die(mysql_error());

	$book_title = $_REQUEST['book_title'];
	$book_author = $_REQUEST['book_author'];
	$book_pages = $_REQUEST['book_pages'];
	$book_branch = $_REQUEST['book_branch'];
	$book_sem = $_REQUEST['book_sem'];
	$description = $_REQUEST['description'];
	$book_id = $_REQUEST['book_id'];
	$total_book = $_REQUEST['total_book'];

	$book_title = mysql_real_escape_string($book_title);
	$book_author = mysql_real_escape_string($book_author);
	$book_pages = mysql_real_escape_string($book_pages);
	$book_branch = mysql_real_escape_string($book_branch);
	$book_sem = mysql_real_escape_string($book_sem);
	$description = mysql_real_escape_string($description);
	$book_id = mysql_real_escape_string($book_id);
	$book_id = substr($book_id, 0, -1);
	$total_book = mysql_real_escape_string($total_book);

	$ids = explode(':',$book_id,$total_book);
	$failsIDS ="";
	$failsIDSFlag=false;
	$addedIDS = "";
	$addedIDSFlag=false;

	for($i=0;$i<$total_book;$i++){
		$ids[$i] = preg_replace('/\s/', '', $ids[$i]);
		if($ids[$i] != ""){
	//Execute query
	$qry_result = mysql_query("INSERT INTO `books`(`book_title`, `book_author`, `book_pages`, `book_branch`,`book_sem`,`book_id`,`description`,`state`) VALUES('".$book_title."','".$book_author."','".$book_pages."','".$book_branch."','".$book_sem."','".$ids[$i]."','".$description."',0);");
	
		if($qry_result){
					$addedIDS =	$addedIDS."<br>".$ids[$i];
					$addedIDSFlag=true;
		}else{
			$failsIDS = $failsIDS.", ".$ids[$i];
			$failsIDSFlag=true;
		}

	}
	}	
	if($addedIDSFlag){
	$addedIDS = substr($addedIDS, 4);
		echo "<caption><center><label><h5>Book Added Succesfully</h5></label></center></caption>
				<thead>							
				<tr>
					<th data-field='name'>Title</th>
					<th data-field='author'>Author</th>
					<th data-field='sem'>Sem</th>
					<th data-field='branch'>Branch</th>
					<th data-field='pages'>Pages</th>
					<th data-field='id'>ID</th>
					<th data-field='description'>Description</th>
				</tr>
			</thead><tbody>";
	$display_string = "<tr id='item1' style='color:rgb(38, 166, 154)'></span>";
						$display_string .= "<td></span>$book_title</td>";
						$display_string .= "<td class='badge'>$book_author</td>";
						$display_string .= "<td class='badge'>$book_sem</td>";
						$display_string .= "<td class='badge'>$book_branch</td>";
						$display_string .= "<td class='badge'>$book_pages</td>";
						$display_string .= "<td class='badge'>$addedIDS</td>";
						$display_string .= "<td class='badge' width='35%'>$description</td></tr>";
						echo $display_string;
	}
	
	if($failsIDSFlag){
			$failsIDS = substr($failsIDS, 1);
			echo "<tr><td colspan='7'><center><h6 style='margin-left:7%;margin-right:7%;'>$failsIDS Book ID already Exists!</h6></center><td></tr></tbody>";
	}
	
	echo "<center><BR><input type='button' value='Clear' onclick='clearBookDetails()' class='btn'/></center><BR>";
?>
