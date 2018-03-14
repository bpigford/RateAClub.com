<?php
require_once('DBconnect.php');

$sql = "SELECT SUM(rating) as sumRating, COUNT(rating) as totalRatings FROM feedback WHERE club_id = ". $input;

$result = $dbc->query($sql);

if($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	$avg = $row["sumRating"] / $row["totalRatings"];

	$sql2 = "UPDATE Clubs SET club_avg_rating = ". $avg . " WHERE club_id = ". $input;
	
	$result2 = $dbc->query($sql2);
?>