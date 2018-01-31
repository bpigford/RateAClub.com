<?php
require_once('DBconnect.php');

    if(isset($_POST['submit'])){
        $data_missing = array();
        if(empty($_POST['f_name'])) {
            $data_missing[] = 'First Name';

        }
        else {
            $f_name = trim($_POST['f_name']);
        }

        if(empty($_POST['l_name'])) {
            $data_missing[] = 'Last Name';

        }
        else {
            $l_name = trim($_POST['l_name']);
        }

        if(empty($_POST['email'])) {
            $data_missing[] = 'Email';

        }
        else {
            $email = trim($_POST['email']);
        }

        if(empty($_POST['username'])) {
            $data_missing[] = 'Username';

        }
        else {
            $username = trim($_POST['username']);
        }

        if(empty($_POST['password'])) {
            $data_missing[] = 'Password';

        }
        else {
            $password = trim($_POST['password']);
        }

        if(empty($_POST['college'])) {
            //1 will be a empty base case and used for anyone who doesn't enter a school since it can be null or maybe it can just be null idk
            $collegeID = NULL;

        }
        else {
            $collegeName = $_POST['college'];
            $query1 = "SELECT college_id FROM Colleges WHERE name=" + $collegeName;
            $response = @mysqli_query($dbc, $query1);
            //if query executes properly
            if($response) {
                $collegeID = mysqli_fetch_field($response);
            }
            else {
                $collegeID = NULL;
            }
        }

        if(empty($data_missing)) {
            $query2 = "INSERT INTO Users (email, password, username, f_name, l_name, admin, college_id) VALUES (?, ?, ?, ?, ?, NULL, ?)";
            $stmt = mysqli_prepare($dbc, $query2);

            /*"ssssssi" sets what type of data can be sent in that spot
             * i = integers
             * d = doubles
             * b = blobs
             * s = literally everything else
             */

            mysqli_stmt_bind_param($stmt, "ssssssi", $email, $password, $username, $f_name, $l_name, NULL, $collegeID);
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
        }
        else {
            echo 'You need to enter the following information<br />';
            foreach($data_missing as $missing) {
                echo $missing + "<br />";
            }
        }

    }

?>