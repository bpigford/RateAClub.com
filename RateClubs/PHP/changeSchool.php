<?php

session_start();
require_once('DBconnect.php');

$schoolChangeOk = true;
$schoolChange = "UPDATE Users SET college_id = " . $_POST['newSchool'] . " WHERE user_id = " . $_SESSION['userId'].";";

$schoolChangeReply = $dbc->query($schoolChange);

if ($schoolChangeReply) {
    //echo "success";
    $_SESSION['myCollege'] = $_POST['newSchool'];
    $_SESSION['alert'] = 'School changed successfully';
}
else {
    //$schoolChangeOk = false;
    //echo "failed to change school";
    $_SESSION['alert'] = 'Failed to change school';
}

$calculateNumUsers = "SELECT COUNT(college_id) as numUsers FROM Users WHERE college_id = ".$_POST['newSchool'].";";
$calculateResponse = $dbc->query($calculateNumUsers);

if($calculateResponse == false) {
    //$schoolChangeOk = false;
    //echo "calculating the number of users failed";
    $_SESSION['alert'] = 'Calculating the number of users failed';
}
else {
    $num = $calculateResponse->fetch_array();
    $updateNumUsers = "UPDATE Colleges SET num_users = " . $num['numUsers'] . " WHERE college_id = " . $_POST['newSchool'] . ";";
    $updateResponse = $dbc->query($updateNumUsers);
    if ($updateResponse == false) {
        //$schoolChangeOk = false;
        //echo "failed to update number of users";
        $_SESSION['alert'] = 'Failed to update number of users';
    }
}

//if($schoolChangeOk) {
    header('Location: ../account.php');
    exit();
//}