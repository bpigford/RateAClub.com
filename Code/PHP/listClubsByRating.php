<?php
require_once('DBconnect.php');

$sql = "SELECT club_name, avg_club_rating FROM clubs ORDER BY avg_club_rating LIMIT 10";

$result = $dbc->query($sql);

if($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		echo "<li>". $row["club_name"]. " &#9 ". $row["avg_club_rating"]. "</li>";
	}
else {
	echo "Not found.";
}

$dbc->close();
?>

