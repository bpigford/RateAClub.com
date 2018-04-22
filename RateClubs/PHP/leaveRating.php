<?php
session_start();
// Check if logged in
if(isset($_SESSION["username"])) {
    require_once('DBconnect.php');
    $username = $_SESSION["username"];
    $userid = $_SESSION["userId"];

    $clubid = $_SESSION['club_id'];

		//Check if rating has been left
		if(empty($_POST['star-rating'])) {
            $_SESSION['alert'] = "You must leave a rating.";
            header('Location: ../club.php?club='.$_SESSION['club']. '&school=' . $_SESSION['school']);
            exit();
        }
        else {


            //NEED TO VERIFY HAVEN'T LEFT PREVIOUS RATING
            $query = "SELECT rating FROM Feedback WHERE user_id = " . $userid . " AND club_id = " . $clubid.";";
            echo $query;

            $response = $dbc->query($query);
            if($response == false)
                echo "select previous ratings failed";

            if($response->num_rows > 0) {
                $update = "UPDATE Feedback SET rating = " . $_POST['star-rating'] . ", comment = '" . $_POST['comment'] . "' WHERE user_id=" . $userid . " AND club_id=" . $clubid.";";

                $updateresponse = $dbc->query($update);
                if($updateresponse == false) {
                    echo "failed to update comment";
                }
                else {

                    $sql = "SELECT SUM(rating) as sumRating, COUNT(rating) as totalRatings FROM Feedback WHERE club_id = ". $clubid.";";
                    $result = $dbc->query($sql);

                    if($result == false) {
                        echo "failed to retrieve the rating info";
                    }
                    if($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $avg = $row["sumRating"] / $row["totalRatings"];
                        $sql2 = "UPDATE Clubs SET club_avg_rating = " . $avg . " WHERE club_id = " . $clubid;
                        $result2 = $dbc->query($sql2);
                        if($result2 == false)
                            echo "failed to update average";
                    }
                    //header('Location: ../club.php?club='.$_SESSION['club']. '&school=' . $_SESSION['school']);
                    //exit();
                }
            }
            else {
                $set = "INSERT INTO Feedback (rating, comment, club_id, user_id, college_id) VALUES (" .$_POST['star-rating'] .", '".$_POST['comment']."', ". $clubid.", ".$userid.", ".$_SESSION['schoolId'].");";

                $setResponse = $dbc->query($set);
                if($setResponse == false)
                    echo "failed to leave new comment";
                else {
                    $sql = "SELECT SUM(rating) as sumRating, COUNT(rating) as totalRatings FROM Feedback WHERE club_id = ". $clubid.";";
                    $result = $dbc->query($sql);

                    if($result == false) {
                        echo "failed to retrieve the rating info";
                    }
                    if($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $avg = $row["sumRating"] / $row["totalRatings"];
                        $sql2 = "UPDATE Clubs SET club_avg_rating = " . $avg . " WHERE club_id = " . $clubid;
                        $result2 = $dbc->query($sql2);
                        if($result2 == false)
                            echo "failed to update average";
                    }
                    //old place here
                }
            }
            $getSchoolAverage = "SELECT SUM(rating) as sumRating, COUNT(rating) as totalRatings FROM Feedback WHERE college_id = ".$_SESSION['schoolId']." AND rating > 0;";
            $getResponse = $dbc->query($getSchoolAverage);
            if($getResponse == false) {
                $_SESSION['alert'] = $getSchoolAverage;
            }
            if($getResponse->num_rows > 0) {
                $row = $getResponse->fetch_assoc();
                $schoolAvg = $row['sumRating'] / $row['totalRatings'];
                $updateSchoolAverage = "UPDATE Colleges SET college_avg_rating = ".$schoolAvg." WHERE college_id = ".$_SESSION['schoolId'].";";
                $updateResponse = $dbc->query($updateSchoolAverage);
                if($updateResponse == false) {
                    $_SESSION['alert'] = $updateSchoolAverage. "failed";
                }
                //$_SESSION['alert'] = $updateSchoolAverage;
            }
            else {
                $_SESSION['alert'] = "returned 0 rows ". $getSchoolAverage . ".";
            }

            header('Location: ../club.php?club='.$_SESSION['club']. '&school=' . $_SESSION['school']);
            exit();
        }
	}
else {
    $_SESSION['alert'] = "You must be logged in to leave a rating!";
    header('Location: ../club.php?club='.$_SESSION['club']. '&school=' . $_SESSION['school']);
    exit();
}
