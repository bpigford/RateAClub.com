<?php
session_start();
require_once('DBconnect.php');

$getCurrentPassword = "SELECT password FROM Users WHERE user_id = " .$_SESSION['userId']. ";";
$currentPasswordReply = $dbc->query($getCurrentPassword);
if($currentPasswordReply == false)
{
    //echo "failed to get current password";
    $_SESSION['alert'] = 'failed to get current password';
}
else {
    $curPasswordInfo = $currentPasswordReply->fetch_assoc();
    $curPassword = $curPasswordInfo['password'];
    if($curPassword != $_POST['currentPassword']) {
        $_SESSION['alert'] = 'Incorrect password entered';
        header('Location: ../changePassword.php');
        exit();
    }
    else {
        $passChangeOk = true;
        $newPword = $_POST['newPassword1'];

        if($newPword != $_POST['newPassword2']) {
            //echo "passwords don't match";
            $_SESSION['alert'] ="Passwords don't match";
            header('Location: ../changePassword.php');
            exit();
        }
        if(empty($_POST['newPassword1'])) {
            //echo 'no pass<br>';
            //array_push($data_missing, 'Password');
            $_SESSION['alert'] = 'No password entered';
            header('Location: ../changePassword.php');
            exit();

        }
        else if(strlen($newPword) < 8) {
            /*echo 'pass too short<br>';
            array_push($data_missing, 'Password');
            $ok2 = false;*/
            $_SESSION['alert'] = 'Password too short';
            header('Location: ../changePassword.php');
            exit();
        }
        else if(preg_match("/[A-Z]/", $newPword) == 0) {
            /*echo 'no capital letter found in password<br>';
            echo $pword;
            array_push($data_missing, 'Password');
            $ok2 = false;*/
            $_SESSION['alert'] = 'No capital letter found in password';
            header('Location: ../changePassword.php');
            exit();
        }
        else if(preg_match("/[0-9]/", $newPword)== 0) {
            /*echo 'no number found in password<br>';
            array_push($data_missing, 'Password');
            $ok2 = false;*/
            $_SESSION['alert'] = 'No number found in password';
            header('Location: ../changePassword.php');
            exit();
        }
        else if(preg_match("/[\!\@\#\$\%\^\&\*\?\+\-\=\_]/", $newPword) == 0) {
            /*echo 'no special character found in password<br>';
            array_push($data_missing, 'Password');
            $ok2 = false;*/
            $_SESSION['alert'] = 'No special character found in password';
            header('Location: ../changePassword.php');
            exit();
        }
        else {
            $newpassword = trim($_POST['newPassword1']);
        }

        if($newpassword != null) {
            $passChange = "UPDATE Users SET password = '" . $newpassword . "' WHERE user_id = " . $_SESSION['userId'] . ";";
            $passChangeReply = $dbc->query($passChange);
            if ($passChangeReply) {
                //echo "password Changed";
                $_SESSION['alert'] = 'Password changed';
            }
            else {
                //$passChangeOk = false;
                //echo "failed to change password";
                $_SESSION['alert'] = 'Failed to change password';
            }

            //if ($passChangeOk) {
                header('Location: ../account.php');
                exit();
            //}
        }
        else {
            //echo "new password equals null";
            $_SESSION['alert'] = 'New password equals null';

        }
    }

}
header('Location: ../changePassword.php');
exit();
