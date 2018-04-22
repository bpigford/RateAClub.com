<?php
//opens a connection to the database this needs to be called when needed
DEFINE ('DB_USER', 'RateTeam');
DEFINE ('DB_PASSWORD', 'Test1');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'RateAClubDB');
//DEFINE ('pass', 'mysql';
//DEFINE ('db', 'recoverpassword');
$dbc = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)//, pass, db
OR die('Could not connect to MySQL: ' . mysqli_connect_error());


?>
