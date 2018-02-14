<?php
require_once('DBconnect.php');

$sql = "SELECT clubs.club_name, clubs.avg_club_rating, colleges.name FROM clubs INNER JOIN colleges ON clubs.collegeID=colleges.collegeID ORDER BY avg_club_rating LIMIT 10";

$result = $dbc->query($sql);

if($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		echo "<li>". $row["clubs.club_name"]. " &#9 ". $row["colleges.name"]. " &#9 " . $row["clubs.avg_club_rating"]. "</li>";
	}
else {
	echo "Not found.";
}

$dbc->close();
?>

