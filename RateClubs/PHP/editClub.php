<?php
    session_start();
    $okcheck = true;
    //if(isset($_POST['submitted'])) {
    require_once('DBconnect.php');
    $clubName = $_POST['clubName'];
    $clubEmail = $_POST['clubEmail'];
    $clubDesc = $_POST['clubDesc'];
    //$image = NULL;//$_POST['image'];
    //$videoLink = NULL;//$_POST['video'];
    $advisor = $_POST['advisorName'];
    $meetingTime = $_POST['meetTime'];
    $meetingLoc = $_POST['meetLoc'];
    $school = $_SESSION['myCollege'];

    $update = "UPDATE Clubs SET club_name='".$clubName."', club_desc = '".$clubDesc."', contact_email = '". $clubEmail."', advisor_name = '".$advisor.
        "', meet_time = ".$meetingTime.", meet_loc = ".$meetingLoc." WHERE club_id = ".$SESSION['club_id'].";";
    echo $update;
    $updated = $dbc->query($update);
    if($updated == false) {
        //echo "Update failed for some reason";
        $_SESSION['alert'] = 'Club changes failed';
        header('Location: ../club.php?club='.$_SESSION['club']. '&school=' . $_SESSION['school']);
        exit();
        //$okcheck = false;
    }

    //if($okcheck == true) {
        //should probably go back to the club page
        header('Location: ../club.php?club='.$_SESSION['club']. '&school=' . $_SESSION['school']);
        exit();
    //}
    //}
?>