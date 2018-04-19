<?php
//opens a connection to the database this needs to be called when needed
DEFINE ('DB_USER', 'RateTeam');
DEFINE ('DB_PASSWORD', 'RateAClub1');
DEFINE ('DB_HOST', 'www.rateaclub.org');
DEFINE ('DB_NAME', 'RateAClubDB');

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to MySQL: ' . mysqli_connect_error());
?>
