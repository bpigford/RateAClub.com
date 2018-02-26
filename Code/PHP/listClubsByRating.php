<?php

require_once('DBconnect.php');

echo "made it to list clubs";

//THIS STATEMENT HAS BEEN TESTED AND WORKS
//$sql = "SELECT Clubs.club_name, Clubs.club_avg_rating, Colleges.college_name FROM Clubs INNER JOIN Colleges ON Clubs.college_id=Colleges.college_id ORDER BY club_avg_rating DESC LIMIT 10";

//$sql = "SELECT * FROM clubs";

$dbc = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)

    OR die('Could not connect to MySQL: ' . mysqli_connect_error());

$emailquery = "SELECT * FROM clubs;";

$emailreponse = $dbc->query($emailquery);

print_r($emailresponse);



// TODO, none of this is currently working





/*$result = $dbc->query($sql);

echo 'printing';

print_r($result);

echo 'printed';

if($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {

        echo "<li>". $row["clubs.club_name"]. " &#9 ". $row["colleges.name"]. " &#9 " . $row["clubs.avg_club_rating"]. "</li>";

    }

else {

        echo "Not found.";

    }

    $dbc->close();*/

?>
