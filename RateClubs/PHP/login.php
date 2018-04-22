<?php
    	//require_once('DBconnect.php');
	DEFINE ('DB_USER', 'RateTeam');
	DEFINE ('DB_PASSWORD', 'Test1');
	DEFINE ('DB_HOST', 'localhost');
	DEFINE ('DB_NAME', 'RateAClubDB');

	$ok = true;
	$dbc = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
	OR die('Could not connect to MySQL: ' . mysqli_connect_error());
	//echo 'connected<br>';

    session_start();
    	//if(isset($_POST['login'])) {
        $data_missing = array();

        if(empty($_POST['user_name'])) {
            $data_missing[] = 'User name';
		    $ok = false;
            //echo 'no username<br>';
            $_SESSION['alert'] = 'No username';
            header('Location: ../index.php');
            exit();
        }
        else {
            $user_name = $_POST['user_name'];
            //echo 'user: ' . $user_name . '<br>';
        }

        if(empty($_POST['pass_word'])) {
            $data_missing[] = 'Pass Word';
		    //$ok = false;
            //echo 'no password<br>';
            $_SESSION['alert'] = 'No password';
            header('Location: ../index.php');
            exit();
        }
        else {
            $pass_word = trim($_POST['pass_word']);
            //echo 'password: ' . $pass_word . '<br>';
        }


        if(empty($data_missing)) {
            $query = "SELECT * FROM Users WHERE username = '" . $user_name . "';";
            $response = $dbc->query($query);
            

            if($response) {
                $arr = $response->fetch_array();
                //print_r($arr);
                if($dbc->affected_rows == 1) {
                    $db_password = $arr['password'];
                    //echo 'db_pass: ' . $db_password . '<br>';
                    if($db_password == $pass_word) {



                        $_SESSION["username"] = $user_name;
                        $_SESSION["myCollege"] = $arr['college_id'];
                        $_SESSION['userId'] = $arr['user_id'];
                        $_SESSION['userEmail'] = $arr['email'];

                        if($arr['admin'] == 1) {
                            $_SESSION["admin"] = true;
                        }

                    }
                    else {

                        //echo 'Invalid Password entered<br />';
                        $_SESSION['alert'] = 'Invalid Password entered';
		                //$ok = false;
                    }
                }
                else {

                    //echo 'Invalid username Entered<br />';
                    $_SESSION['alert'] = "Invalid username entered";
		            //$ok = false;
                }
            }
            else {
                echo 'Error Occurred<br />';
                echo $dbc->error;
		        $ok = false;
            }

        }
    //}
    	mysqli_close($dbc);

	//if ($ok) {
        header('Location: ../index.php');
        exit();
    //}
?>
