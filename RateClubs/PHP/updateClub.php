<?php
session_start();
$okcheck = true;
//if(isset($_POST['submitted'])) {
require_once('DBconnect.php');
$clubEmail = $_POST['clubEmail'];
$clubDesc = $_POST['clubDesc'];
//$image = NULL;//$_POST['image'];
//$videoLink = NULL;//$_POST['video'];
$advisor = $_POST['advisorName'];
$meetingTime = $_POST['meetTime'];
$meetingLoc = $_POST['meetLoc'];

$update = "UPDATE Clubs SET contact_email = '". $clubEmail ."', club_desc = '" . $clubDesc ."', advisor_name = '" . $advisor ."', meet_time = '".
    $meetingTime . "', meet_loc = '" . $meetingLoc ."' WHERE club_id = " . $_SESSION['club_id'];

$updated = $dbc->query($update);
if($updated == false) {
    //echo "Insert failed for some reason";
    //$okcheck = false;
    $_SESSION['alert'] = 'Club not updated';

}
header('Location: ../club.php?club='.$_SESSION['club']. '&school=' . $_SESSION['school']);
exit();