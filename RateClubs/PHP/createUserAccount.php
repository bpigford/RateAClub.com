<?php
  //require_once('DBconnect.php');
    DEFINE ('DB_USER', 'RateTeam');
    DEFINE ('DB_PASSWORD', 'Test1');
    DEFINE ('DB_HOST', 'localhost');
    DEFINE ('DB_NAME', 'RateAClubDB');

    $ok2 = true;
    $dbc = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
    OR die('Could not connect to MySQL: ' . mysqli_connect_error());
    //if(isset($_POST['submit']))
    //{
    session_start();
        $data_missing = array();
        if(empty($_POST['f_name'])) {
		    //echo 'no first<br>';
            array_push($data_missing, 'First Name');
            $_SESSION['alert'] = 'No first name entered';
            header('Location: ../createUser.php');
            exit();
        }
        else {
            $f_name = trim($_POST['f_name']);
        }
        
        if(empty($_POST['l_name'])) {
		    //echo 'no last<br>';
            array_push($data_missing, 'Last Name');
            $_SESSION['alert'] = 'No last name entered';
            header('Location: ../createUser.php');
            exit();
        }
        else {
            $l_name = trim($_POST['l_name']);
        }
        
        if (empty($_POST['email']))
        {
            //echo 'no email<br>';
            array_push($data_missing, 'Email');
            $_SESSION['alert'] = 'No email entered';
            header('Location: ../createUser.php');
            exit();
        }
        else {
            $emailTest = trim($_POST['email']);
            $emailquery = "SELECT email FROM Users WHERE email = '" . $emailTest ."';";
            $emailreponse = $dbc->query($emailquery);
            if($dbc->affected_rows == 0) {
                $email = trim($_POST['email']);
            }
            else {
                //echo 'Email taken. Choose another<br/>';
                array_push($data_missing, 'Email');
                //$ok2 = false;
                $_SESSION['alert'] = 'Email taken. Choose another';
                header('Location: ../createUser.php');
                exit();
            }
        }
        
        if(empty($_POST['username'])) {
		    //echo 'no username<br>';
            array_push($data_missing, 'Username');
            $_SESSION['alert'] = 'No username entered';
            header('Location: ../createUser.php');
            exit();
        }
        else {

            $query = "SELECT username FROM Users WHERE username = '" . trim($_POST['username']) ."'";
            $response = $dbc->query($query);
            if($dbc->affected_rows == 0) {
                //no duplicate names found
                $username = trim($_POST['username']);
            }
            else {
                //echo 'Username taken. Choose another<br/>';
                array_push($data_missing, 'Username');
                //$ok2 = false;
                $_SESSION['alert'] = 'Username taken. Choose another';
                header('Location: ../createUser.php');
                exit();
            }
        }

        $pword = $_POST['password'];
        if(empty($_POST['password'])) {
		    //echo 'no pass<br>';
            array_push($data_missing, 'Password');
            $_SESSION['alert'] = 'No password entered';
            header('Location: ../createUser.php');
            exit();

        }
        else if(strlen($pword) < 8) {
            //echo 'pass too short<br>';
            array_push($data_missing, 'Password');
            //$ok2 = false;
            $_SESSION['alert'] = 'Password too short';
            header('Location: ../createUser.php');
            exit();
        }
        else if(preg_match("/[A-Z]/", $pword) == 0) {
            //echo 'no capital letter found in password<br>';
            //echo $pword;
            array_push($data_missing, 'Password');
            //$ok2 = false;
            $_SESSION['alert'] = 'No capital letter found in password';
            header('Location: ../createUser.php');
            exit();
        }
        else if(preg_match("/[0-9]/", $pword)== 0) {
            //echo 'no number found in password<br>';
            array_push($data_missing, 'Password');
            //$ok2 = false;
            $_SESSION['alert'] = 'No number found in password';
            header('Location: ../createUser.php');
            exit();
        }
        else if(preg_match("/[\!\@\#\$\%\^\&\*\?\+\-\=\_]/", $pword) == 0) {
            //echo 'no special character found in password<br>';
            array_push($data_missing, 'Password');
            //$ok2 = false;
            $_SESSION['alert'] = 'No special character found in password';
            header('Location: ../createUser.php');
            exit();
        }
        else {
            $password = trim($_POST['password']);
        }
        
        if(empty($_POST['college'])) {
            //11 will be a empty base case and used for anyone who doesn't enter a school since it can be null or maybe it can just be null idk
            $collegeID = 11;
		    //echo 'no college<br>';
        }
        else {
            $collegeName = $_POST['college'];
            $query1 = "SELECT college_id FROM Colleges WHERE college_name = '" . $collegeName . "';";
            $response1 = $dbc->query($query1);
            //if query executes properly
            if($response1) {
                $arr1 = $response1->fetch_array();

                if($dbc->affected_rows == 1) {
                    $collegeID = $arr1['college_id'];
                }
                else {
                    $collegeID = 12;
                }
            }
            else {
                echo 'response failed<br/>';
                $_SESSION['alert'] = 'Failed to get the colleges';
                header('Location: ../createUser.php');
                exit();
            }
		echo 'college id = ' . $collegeID . '<br>';
        }

        if(empty($data_missing)) {
            echo 'made it to insert<br/>';

            $query2 = "INSERT INTO Users (email, password, username, f_name, l_name, admin, college_id) VALUES ('" . $email . "', '" . $password . "', '".
                $username. "', '" . $f_name. "', '". $l_name. "', 0, " . $collegeID . ");";
            $response2 = $dbc->query($query2);
            if($response2) {
                if($dbc->affected_rows == 1) {
                    $getId = "SELECT user_id FROM Users WHERE username = '". $username."';";
                    echo $getId;
                    $idReply = $dbc->query($getId);
                    echo "made it past query</br>";
                    if($idReply == false)
                    {
                        echo "something broke";
                    }
                    //$userId = $idReply['user_id'];
                    //echo $userId;

                    while($row = $idReply->fetch_array()) {
                        echo "made it into the while";
                        $userId = $row['user_id'];
                        echo $userId;
                    }



                    $_SESSION["username"] = $username;
                    $_SESSION["admin"] = false;
                    $_SESSION["myCollege"] = $collegeID;
                    if($userId != null) {
                        $_SESSION['userId'] = $userId;
                    }

                    $calculateNumUsers = "SELECT COUNT(college_id) as numUsers FROM Users WHERE college_id = ".$collegeID.";";
                    $calculateResponse = $dbc->query($calculateNumUsers);
                    if($calculateResponse == false) {
                        $ok2 = false;
                        echo "calculating the number of users failed";
                    }
                    else {
                        $num = $calculateResponse->fetch_array();
                        $updateNumUsers = "UPDATE Colleges SET num_users = " . $num['numUsers'] ." WHERE college_id = " . $collegeID.";";
                        $updateResponse = $dbc->query($updateNumUsers);
                        if($updateResponse == false) {
                            $ok2 = false;
                            echo "failed to update number of users";
                        }
                    }

                }
                else {
                    echo 'No returned rows which I think means failed to insert<br/>';
                }
            }
            else {
                echo 'response 2 failed <br/>';
                $ok2 = false;
            }
        }
        /*else {
            $ok2 = false;
            echo 'You need to enter the following information<br />';
            foreach($data_missing as $missing) {
                echo $missing + "<br />";
            }
        }*/
    mysqli_close($dbc);
        //if($ok2) {
            header('Location: ../index.php');
            exit();
        //}
    //}
?>
