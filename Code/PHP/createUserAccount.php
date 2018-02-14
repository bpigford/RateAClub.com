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
        $data_missing = array();
        if(empty($_POST['f_name'])) {
		echo 'no first<br>';
            array_push($data_missing, 'First Name');
        }
        else {
            $f_name = trim($_POST['f_name']);
        }
        
        if(empty($_POST['l_name'])) {
		echo 'no last<br>';
            array_push($data_missing, 'Last Name');
        }
        else {
            $l_name = trim($_POST['l_name']);
        }
        
        if (empty($_POST['email']))
        {
            echo 'no email<br>';
            array_push($data_missing, 'Email');
        }
	else if(!preg_match("/@./", $_POST['email']) {
		echo 'invalid email format<br>';
		array_push($data_missing, 'Email');
	}
        else {
            $email = trim($_POST['email']);
        }
        
        if(empty($_POST['username'])) {
		echo 'no username<br>';
            array_push($data_missing, 'Username');
        }
        else {
            $username = trim($_POST['username']);
        }
        
		$pword = $_POST['password'];
        if(empty($_POST['password'])) {
		echo 'no pass<br>';
            array_push($data_missing, 'Password');
        }
		else if(strlen($pword) < 8) {
		echo 'pass too short<br>';
			array_push($data_missing, 'Password');
		}
		else if(!preg_match("/A-Z/", $pword)) {
		echo 'no capital letter found in password<br>';
			array_push($data_missing, 'Password');
		}
		else if(!preg_match("/0-9/", $pword)) {
		echo 'no number found in password<br>';	
			array_push($data_missing, 'Password');
		}
		else if(!preg_match("/!@#$%^&*?+-=_/", $pword)) {
		echo 'no special character found in password<br>';
			array_push($data_missing, 'Password');
		}
        else {
            $password = trim($_POST['password']);
        }
        
        if(empty($_POST['college'])) {
            //1 will be a empty base case and used for anyone who doesn't enter a school since it can be null or maybe it can just be null idk
            $collegeID = NULL;
		    echo 'no college<br>';
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
                    $collegeID = NULL;
                }
            }
            else {
                echo 'response failed<br/>';
            }
		echo 'college id = ' . $collegeID . '<br>';
        }
	// TODO something wrong below this point
        if(empty($data_missing)) {
            echo 'made it to insert<br/>';

            $query2 = "INSERT INTO Users (email, password, username, f_name, l_name, admin, college_id) VALUES ('" . $email . "', '" . $password . "', '".
                $username. "', '" . $f_name. "', '". $l_name. "', 1, " . $collegeID . ");";
            $response2 = $dbc->query($query2);
            if($response2) {
                if($dbc->affected_rows == 1) {
                    session_start();
                    $_SESSION["username"] = $username;
                }
                else {
                    echo 'No returned rows which I think means failed to insert<br/>';
                }
            }
            else {
                echo 'response 2 failed <br/>';
                $ok2 = false;
            }



            //was supposed to stop sql injection but lets get it working first
            //$query2 = "INSERT INTO Users (email, password, username, f_name, l_name, admin, college_id) VALUES (?, ?, ?, ?, ?, NULL, ?)";
            //$stmt = mysqli_prepare($dbc, $query2);
            /*"ssssssi" sets what type of data can be sent in that spot
             * i = integers
             * d = doubles
             * b = blobs
             * s = literally everything else
             */
           /* mysqli_stmt_bind_param($stmt, "ssssssi", $email, $password, $username, $f_name, $l_name, NULL, $collegeID);
            mysqli_stmt_execute($stmt);
            $affected_rows = mysqli_stmt_affected_rows($stmt);
            if($affected_rows == 1) {
                echo 'Account Created';
            }
            else {
                echo 'Error Occured<br />';
                echo mysqli_error();
            }
            mysqli_stmt_close($stmt);
            mysqli_close($dbc);
           */
        }
        else {
            $ok2 = false;
            echo 'You need to enter the following information<br />';
            foreach($data_missing as $missing) {
                echo $missing + "<br />";
            }
        }
    mysqli_close($dbc);
        if($ok2) {
            header('Location: ../index.php');
            exit();
        }
    //}
?>
