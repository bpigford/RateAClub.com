<?php
	require_once('DBconnect.php');
	
	$collegequery = "SELECT college_name FROM Colleges WHERE college_name LIKE '%" . $_POST['collegesearch'] . "%'";
	$collegelist = $dbc->query($collegequery);
	
	if($collegelist->num_rows > 0) {
        $x = 1;
		echo '<div class="result-div" style="overflow-y:scroll; height:400px;">';
		echo '<table class="main-table">';
		echo '<tr class="table-head-row"><th>College</th><th>Rating</th>';
		while($row = $collegelist->fetch_assoc()) {
			echo "<tr class=\"";
			if ($x % 2 == 0)
				echo "even\"";
			else
				echo "odd\"";
			echo " onclick=\"document.location = 'club.php?club=".str_replace(' ', '+', $row['club_name'])."&school=".str_replace(' ', '+', $row['college_name'])."';\"><td class=\"rankData\">" . $x++ . ".</td><td>". $row["club_name"]. "</td><td>". $row["college_name"]. "</td><td>";
                                    
			$star = "<img class=\"overall-rate\" src=\"images/star_full.png\"></img>";
			$starHalf = "<img class=\"overall-rate\" src=\"images/star_half.png\"></img>";
			$starNone = "<img class=\"overall-rate\" src=\"images/star_empty.png\"></img>";
			switch ($row["club_avg_rating"])
			{
			    case 1:
					echo $star . $starNone . $starNone . $starNone . $starNone;
					break;
				case 2:
					echo $star . $star . $starNone . $starNone . $starNone;
					break;
				case 3:
					echo $star . $star . $star . $starNone . $starNone;
					break;
				case 4:
					echo $star . $star . $star . $star . $starNone;
					break;
				case 5:
					echo $star . $star . $star . $star . $star;
					break;
			} 
				echo " </td></tr>";
				//echo '</a>';
		}
		echo '</table>';
		echo '</div>';
	}
	else {
		echo "Not found.";
	}
?>
