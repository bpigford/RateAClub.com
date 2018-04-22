	<?php
    session_start();
        $okcheck = true;
        //if(isset($_POST['submitted'])) {
        require_once('DBconnect.php');
        $clubName = $_POST['clubName'];
        $clubEmail = $_POST['clubEmail'];
        $clubDesc = $_POST['clubDesc'];
        //$image = NULL;//$_POST['image'];
        //$videoLink = NULL;//$_POST['video'];
        $advisor = $_POST['advisorName'];
        $meetingTime = $_POST['meetTime'];
        $meetingLoc = $_POST['meetLoc'];
        $school = $_SESSION['myCollege'];


        //code to see if the club already exists

        $check = "SELECT * FROM Clubs WHERE college_id = ".$school." AND club_name = '". $clubName."';";
        $checked = $dbc->query($check);
        if($checked == false) {
            $_SESSION['alert'] = "failed to check if club already exists";
        }
        else{
            if($checked->num_rows > 0) {
                $_SESSION['alert'] = "Club already exists.";
            }
            else {

                $insert = "INSERT into Clubs (club_name, club_desc, contact_email, advisor_name, meet_time, meet_loc, image_path, video_path, college_id, club_avg_rating) 
	  				VALUES ('" .$clubName . "', '". $clubDesc . "', '" . $clubEmail . "', '" . $advisor . "', '" . $meetingTime . "', '" . $meetingLoc . "', NULL, NULL, ".$school.", 0);";

                echo $insert;
                $inserted = $dbc->query($insert);
                if($inserted == false) {
                    //echo "Insert failed for some reason";
                    //$okcheck = false;
                    $_SESSION['alert'] = 'Club not created';
                    header('Location: ../addClub.php');
                    exit();
                }
                else {
                    $_SESSION['alert'] = 'Club added';
                }
                /*$(document).ready(function(){
             $('#insertImg').click(function(){
                  var image_name = $('#fileToUpload').val();
                  if(image_name == '')
                  {
                       alert("Please Select Image");
                       return false;
                  }
                  else
                  {
                       var extension = $('#fileToUpload').val().split('.').pop().toLowerCase();
                       if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
                       {
                            alert('Invalid Image File');
                            $('#fileToUpload').val('');
                            return false;
                       }
                  }
             });  */



                $calculateNumClubs = "SELECT COUNT(college_id) as numClubs FROM Clubs WHERE college_id = ".$school.";";
                $calculateResponse = $dbc->query($calculateNumClubs);
                if($calculateResponse == false) {
                    $okcheck = false;
                    echo "calculating the number of clubs failed";
                }
                else {
                    $num = $calculateResponse->fetch_array();
                    $updateNumClubs = "UPDATE Colleges SET num_clubs = " . $num['numClubs'] . " WHERE college_id = " . $school . ";";
                    $updateResponse = $dbc->query($updateNumClubs);
                    if ($updateResponse == false) {
                        $ok2 = false;
                        echo "failed to update number of clubs";
                    }
                }
            }
        }
            header('Location: ../addClub.php');
            exit();
    ?>