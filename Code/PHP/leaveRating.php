<?php
	// Check if logged in
	if(isset($_SESSION["username"])) {
		$username = $_SESSION["username"];
		$userid = $_SESSION["userId"];
		$clubid = .....;
		
		//Check if rating has been left
		if(empty($_POST['rating'])) {
			$error1 = "You must leave a rating!";
			echo "<script type='text/javascript'>alert('$error1');</script>";
		}
		else {
			require_once('DBconnect.php');
			
			//NEED TO VERIFY HAVEN'T LEFT PREVIOUS RATING
			$query = "SELECT rating FROM Feedback WHERE user_id=" . $userid . " AND club_id=" . $clubid;
			$response = mysqli_query($dbc, $query);
			
			if($response->num_rows > 0) {
				$update = "UPDATE Feedback SET rating=" . $_POST['rating'] . ", comment=" . $_POST['comment'] . ", suggestion=" . $_POST['suggestion'] . " WHERE user_id=" . $userid . " AND club_id=" . $clubid;
				mysqli_query($dbc, $update);
			}
			else {
				$set = "INSERT INTO Feedback (club_id, comment, rating, suggestion, user_id) VALUES (" . $clubid . ", " . $_POST['comment'] . ", " . $_POST['rating'] . ", " . $_POST['suggestion'] . ", " . $userid . ")";
				mysqli_query($dbc, $set);
			}
		}
	}
	else {
		$error2 = "You must be logged in to leave a rating!";
		echo "<script type='text/javascript'>alert('$error2');</script>";
	}
?>