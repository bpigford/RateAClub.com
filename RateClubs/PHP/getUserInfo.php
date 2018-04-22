<?php
require_once('connectDB.php');//this is the file path to the connection script
//Create a query for the database
$query = "SELECT * FROM Users WHERE username = "; // Insert variable name somehow
$response = @mysqli_query($dbc, $query);
//If the query executed properly can return 0 rows and still enter if statement
if($response) {
	//whatever you need it to do with the returned rows

	//example

	//mysqli_fetch_array will return a row of data from the query until there is no more data avaiable
	while($row = mysqli_fetch_array($response)) {
		echo $row['f_name'];
	}
}

//Close connection to Database as we techinically should
mysqli_close($dbc);
?>