<?php
    require_once('DBconnect.php');

    if(isset($_POST['login'])) {
        $data_missing = array();

        if(empty($_POST['user_name'])) {
            $data_missing[] = 'User name';
        }
        else {
            $user_name = $_POST['user_name'];
        }

        if(empty($_POST['pass_word'])) {
            $data_missing[] = 'Pass Word';

        }
        else {
            $pass_word = trim($_POST['pass_word']);
        }


        if(empty($data_missing)) {
            $query = "SELECT password FROM Users WHERE username=" + $user_name;
            $response = mysqli_query($dbc, $query);
            if($response) {
                if(mysqli_affected_rows == 1) {
                    $db_password = mysqli_fetch_field();
                    if($db_password == $pass_word) {
                        //TODO actually get everything from the user table and store it into a session
                        $cookie_name = "user";
                        $cookie_value = $user_name;
                        setcookie($cookie_name, $cookie_value);

                        //Checks to make sure the cookie was set 
                        if(!isset($_COOKIE[$cookie_name])) {
                            echo "Cookie named '" . $cookie_name . "' is not set!";
                        } else {
                            echo "Cookie '" . $cookie_name . "' is set!<br>";
                            echo "Value is: " . $_COOKIE[$cookie_name];
                        }


                        //Create a session this lasts until the webpage is closed
                        session_start();
                        $_SESSION["username"] = $user_name;

                    }
                    else {
                        //Todo set up the message thingy
                        echo 'Invalid Password entered<br />';
                    }
                }
                else {
                    //Todo set up the message thingy
                    echo 'Invalid username Entered<br />';
                }
            }
            echo 'Error Occurred<br />';
            echo mysqli_error();

        }
        else {
            echo'You have forgotten to enter some data<br />';
            foreach($data_missing as $missing) {
                echo $missing + "<br />";
            }
        }
    }
    mysqli_close($dbc);
?>