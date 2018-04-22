<?php


session_start();
require_once('DBconnect.php');
//$emailChangeOk = true;
$emailTest = trim($_POST['newEmail']);
$emailQuery = "SELECT email FROM Users WHERE email = '" . $emailTest ."';";
$emailResponse = $dbc->query($emailQuery);
if($dbc->affected_rows == 0) {
    $newEmail = trim($_POST['newEmail']);
    $emailChange = "UPDATE Users SET email = '" . $newEmail . "' WHERE user_id = " . $_SESSION['userId'] . ";";
    $emailChangeReply = $dbc->query($emailChange);
    if ($emailChangeReply) {
        //echo "email changed";
        $_SESSION['alert'] = 'Email changed';
        $_SESSION['userEmail'] = $newEmail;
    } else {
        //$emailChangeOk = false;
        //echo "failed to change email";
        $_SESSION['alert'] = 'failed to change email';
    }
}
else {
    $_SESSION['alert'] = 'Email taken. Choose another';
    //echo 'Email taken. Choose another<br/>';
    //$emailChangeOk = false;
}

//if($emailChangeOk) {
    header('Location: ../account.php');
    exit();
//}