<!DOCTYPE HTML>
<html lang= "en"/>
	<head>
		<meta charset="utf-8" />
	</head>
	<body>
		
		<form method="post" action="addClub.php">
			<input type="hidden" name="submitted" value="true">	
			Club Name: <input type="text" name="club name"><br>
			Email: <input type="text" name="email"><br>
			club description: <input type="text" name="club desc"><br>
			<form action="upload.php" method="post" enctype="multipart/form-data">
				Select image to upload:
				<input type="file" name="fileToUpload" id="fileToUpload"><br>
				<input type="submit" value="Upload Image" name="insertImg">
			</form>
			<form action="upload.php" method="post" enctype="multipart/form-data">
				Select video to upload:
				<input type="file" name="fileToUpload" id="fileToUpload"><br>
				<input type="submit" value="Upload video" name="insertVid">
			</form>
			club video link: <input type="text" name="video"><br>
			club president: <input type="text" name="club president"><br>
			club meeting times: <input type="text" name="meeting times"><br>
			club meeting location: <input type="text" name="meeting location"><br>
			club tags: <input type="text" name="tags"><br>
			
			<input type="submit" name="insert" value="add new club"/>
			
				
		</form>
			<?php
				if(isset($_POST['submitted'])) {
					require_once('PHP/DBconnect.php');
					$name = $_POST['club name'];
					$email = $_POST['email'];
					$desc = $_POST['club desc'];
					$image = $_POST['image'];
					$videoLink = $_POST['video'];
					$president = $_POST['club president'];
					$meetingTime = $_POST['meeting time'];
					$meetingLoc = $_POST('meeting location');
					$insert = "INSERT into club (club_name, club_desc, contact_email, pres_name, meet_time, meet_loc, image_path, video_path) 
						VALUE ('$name', '$desc', '$email', '$president', '$meetingTime', '$meetingLoc' '$image', '$videoLink');";
				
					if(!mysqli_query($dbc, $insert)){
						die('error inserting new record');
					}	
				
				}
			
				echo $_POST["club name"];
				echo $_POST["email"];
				echo $_POST["club desc"];
				echo $_POST["image"];
				echo $_POST["video"];
				echo $_POST["club president"];
				echo $_POST["meeting time"];
				echo $_POST("meeting location");
				echo $_POST["tags"];
			?>
		
	</body>
</html>