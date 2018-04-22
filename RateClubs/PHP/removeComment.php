<?php
session_start();
require_once('DBconnect.php');
$delete = "DELETE FROM Feedback WHERE com_id = " . $_POST['comId'].";";
$deleted = $dbc->query($delete);
if($deleted == false) {
    $_SESSION['alert'] = "Failed to delete comment: " .$delete;
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
        if($schoolAvg >= 0) {
            $updateSchoolAverage = "UPDATE Clubs SET club_avg_rating = " . $schoolAvg . " WHERE club_id = " . $_SESSION['club_id'] . ";";
        }
        else {
            $updateSchoolAverage = "UPDATE Clubs SET club_avg_rating = 0 WHERE club_id = " . $_SESSION['club_id'] . ";";
        }
            $updateResponse = $dbc->query($updateSchoolAverage);
            if ($updateResponse == false) {
                $_SESSION['alert'] = $updateSchoolAverage . "failed";
            }

        //$_SESSION['alert'] = $updateSchoolAverage;
    }
    else {
        $_SESSION['alert'] = "returned 0 rows ". $getSchoolAverage . ".";
    }
}

header('Location: ../club.php?club='.$_SESSION['club']. '&school=' . $_SESSION['school']);
exit();