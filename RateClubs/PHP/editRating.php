<?php
session_start();
require_once('DBconnect.php');
$edit = "UPDATE Feedback SET rating = ".$_POST['star-ratinge'].", comment = '".$_POST['commente']."' WHERE com_id = ".$_POST['comIdE'].";";
$edited = $dbc->query($edit);
if($edited == false) {
    $_SESSION['alert'] = "Failed to edit comment: " .str_replace("'", '', $edit);
}
else {
    $getSchoolAverage = "SELECT SUM(rating) as sumRating, COUNT(rating) as totalRatings FROM Feedback WHERE club_id = ".$_SESSION['club_id']." AND rating > 0;";
    $getResponse = $dbc->query($getSchoolAverage);
    if($getResponse == false) {
        $_SESSION['alert'] = $getSchoolAverage;
    }
    if($getResponse->num_rows > 0) {
        $row = $getResponse->fetch_array();
        $schoolAvg = $row['sumRating'] / $row['totalRatings'];
        $updateSchoolAverage = "UPDATE Clubs SET club_avg_rating = ".$schoolAvg." WHERE club_id = ".$_SESSION['club_id'].";";
        $updateResponse = $dbc->query($updateSchoolAverage);
        if($updateResponse == false) {
            $_SESSION['alert'] = $updateSchoolAverage. "failed";
        }

        //$_SESSION['alert'] = $updateSchoolAverage;
    }
    else {
        $_SESSION['alert'] = "returned 0 rows ". $getSchoolAverage . ".";
    }
}

header('Location: ../club.php?club='.$_SESSION['club']. '&school=' . $_SESSION['school']);
exit();