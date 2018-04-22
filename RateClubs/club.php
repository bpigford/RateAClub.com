<!DOCTYPE html>
<?php
//echo 'php header';
session_start();
if($_SESSION['alert'] != 'blank') {
    $alert = $_SESSION['alert'];
    echo "<script type='text/javascript'>alert('$alert');</script>";
    $_SESSION['alert'] = 'blank';
}
//print_r($_SESSION);
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/clubStyle.css">
    <link rel="stylesheet" href="css/homeStyle.css">
    <script src="js/homepage.js"></script>
    <script src="js/club.js"></script>
  </head>
  
  <body>
    <header>

      <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
          <div class="row">
            <div class="col-sm-8 col-md-7 py-4">
              <h4 class="text-white">About</h4>
              <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
            </div>
            <div class="col-sm-4 offset-md-1 py-4">
              <h4 class="text-white">Contact</h4>
              <ul class="list-unstyled">
                <li><a href="#" class="text-white">Follow on Twitter</a></li>
                <li><a href="#" class="text-white">Like on Facebook</a></li>
                <li><a href="#" class="text-white">Email me</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4" id="topbar">
       
       <div class="the-div-with-no-name" style="height:100px;">
       <div class="left">
          <a href="index.php"><img src="images/rate_logo.png"  class="navbar-brand logo-image" style="position:absolute;top:5px;left:3%;min-width:150px;max-height:95px;"></img></a>
        </div>
        
        <div class="right">
      <button class="btn btn-primary my-2 right-btn" type="button" id="login-button" onClick=toggleLogin() style="position:absolute;top:30px;right:2%;font-size:1.35vw;" value=
            <?php
			      	if (isset($_SESSION['username']))
					      echo 'Hi ' . $_SESSION['username'] . ', Logout?';
				      else
					      echo 'Login/Create Account';
			      ?>
         >
			<?php
				if (isset($_SESSION['username']))
					echo 'Hi ' . $_SESSION['username'] . ', Logout?';
				else
					echo 'Login/Create Account';
            ?></button>
       </div>
        
      <div class="center">
      <?php
         if (isset($_SESSION['username']))
           echo '<button class="btn btn-primary my-2" type="button" id="login-button-2" onclick=window.location.href="account.php" style="position:absolute;top:30px;left:38%;font-size:1.35vw">Account Managment</button>';
       ?> 
       </div>
   
       
     </div>
          
	</div>
    </nav>
    <!--<div id="top-link-bar">
      <a class="top-link" href="#">Submit a help ticket</a>
      <a class="top-link" href="#">Contacts for website help</a>
      <a class="top-link" href="#">FAQ</a>
    </div>-->
   
 <div class="login-container" id="login-container" style="display:none;">  <!-- added -->
      <form class="my-log login-form" action="PHP/login.php" method="POST">
        <div class="my-log login-top">
          <p>Username</p>
          <input type="text" name="user_name" />
        </div>
        <div class="my-log login-mid-top">
          <p>Password</p>
          <input type="password" name="pass_word" />
        </div>
        <div class="my-log login-mid-mid">
          <input type="Submit" class="button-b" value="Login" />
        </div>
        <div class="my-log login-mid-bottom">
         <!--<a href="forgotPass.php" title="Forgot Password">Forgot Password?</a><br /><br/>
        </div>-->
      </form>
      <div class="my-log login-bottom">
        <form action="createUser.php" method="POST">
          <button type="button" class="button-b" onClick=submit()>Create User</button>
        </form>
      </div>
	  </div> <!-- added -->
	
  
  
 </div>
    </header>

    <main role="main">

      <section class="jumbotron text-center">
        <div class="container">
          <p>
            <div class="contact-container">
              <h4>Contact Info:</h4>
              <p>Email: <!--placeholder@somewhere.edu-->
                <?php
                    require_once('PHP/DBconnect.php');
                    $getSchoolId = "SELECT college_id FROM Colleges WHERE college_name = '" . $_GET['school'] . "';";
                    $schoolIdResponse = $dbc->query($getSchoolId);
                    
                    $reply = $schoolIdResponse->fetch_array();
                    $schoolId = $reply['college_id'];
                    $_SESSION['schoolId'] = $schoolId;
                    $getClubInfo = "SELECT * FROM Clubs WHERE club_name = '". $_GET['club'] . "' AND college_id = ". $schoolId . ";";
                    $infoResponse = $dbc->query($getClubInfo);
                    $infoReply = $infoResponse->fetch_array();
                    echo $infoReply['contact_email'];
                    $_SESSION['club_id'] = $infoReply['club_id'];

                    $_SESSION['club'] = $_GET['club'];
                    $_SESSION['school'] = $_GET['school'];
                ?>
              </p>
            </div>
            <div class="club-container">
              <h4><!--School Placeholder-->
                <?php
                  //echo $_GET['school'];
                  echo '<a href="school.php?school='.str_replace(' ', '+', $_GET['school']).'">'.$_GET['school'].'</a>';
                ?>
              </h4>
              <h4><!--Club Placeholder-->
                <?php
                  echo $_GET['club'];
                ?>
              </h4>
            </div>
            <div class="star-container">
              <h4>Overall Rating</h4>
              <?php
                 require_once('PHP/DBconnect.php');
                 $collId = "SELECT college_id FROM Colleges WHERE college_name = '" . $_GET['school'] . "';";
                 $collIdResp = $dbc->query($collId);
                 
                 //print_r($collIdResp);
                 if($collIdResp == false) {
                   echo "query didn't return";
                 }
                 else {
                   while($row = $collIdResp->fetch_assoc()) {
                     $collIdVal = $row["college_id"];
                   }
                 }
                 
                 $getRating = "SELECT club_avg_rating FROM Clubs WHERE club_name = '" . $_GET['club'] . "' AND college_id = '" . $collIdVal . "';";
                 $clubRatResp = $dbc->query($getRating);
                 if($clubRatResp == false)
                   echo "query didn't return";
                 else {
                   while($row = $clubRatResp->fetch_assoc()) {
                     $clubRatVal = $row["club_avg_rating"];
                   }
                 }
                 
                 $star = "<img class=\"overall-rate\" src=\"images/star_full.png\"></img>";
                 $starHalf = "<img class=\"overall-rate\" src=\"images/star_half.png\"></img>";
                 $starNone = "<img class=\"overall-rate\" src=\"images/star_empty.png\"></img>";
                 
                 switch ($clubRatVal)
                 {
                     case 0:
                         echo $starNone . $starNone . $starNone . $starNone . $starNone;
                         break;
                   case 1:
                     echo $star . $starNone . $starNone . $starNone . $starNone;
                     break;
                   case 2:
                     echo $star . $star . $starNone . $starNone . $starNone;
                     break;
                   case 3:
                     echo $star . $star . $star . $starNone . $starNone;
                     break;
                   case 4:
                     echo $star . $star . $star . $star . $starNone;
                     break;
                   case 5:
                     echo $star . $star . $star . $star . $star;
                     break;
                 } 
                 
              ?>
            </div>
          </p>
        </div>
      </section>

      <div class="bodyDiv">
                  <div class="info-container" style="width:30%;float:right;margin-right:7%;margin-top:20px;">
                    <div class="list-header">
                      <h5>Club Information</h5>
                    </div>
                    <div class="info-div">
                    <?php
                      if(isset($_SESSION[admin]) && $_SESSION[admin] && $_SESSION['myCollege'] == $collIdVal)
                      {
                        echo '<form action="editClub.php" method="POST">'; 
                        //echo "<a href=\"editClub.php\" class=\"btn btn-primary my-2\">Edit Club Info</a>";
                        echo '<input type="submit" class="button-b" value="Edit Club Info"/>';
                        echo '<input type="hidden" name="email" value="'.$infoReply['contact_email'].'"/>';
                        echo '<input type="hidden" name="time" value="'.$infoReply['meet_time'].'"/>';
                        echo '<input type="hidden" name="location" value="'.$infoReply['meet_loc'].'"/>';
                        echo '<input type="hidden" name="desc" value="'.$infoReply['club_desc'].'"/>';
                        echo '<input type="hidden" name="advisor" value="'.$infoReply['advisor_name'].'"/>';
                        echo '</form>';
                      }
                    ?>
                      <p><!--Information Placeholder-->
                        <?php
                            echo "<strong>Meeting Location: </strong>" . $infoReply['meet_loc'] . "<br/><br/>";
                            echo "<strong>Meeting Time: </strong>" . $infoReply['meet_time'] . "<br/><br/>";
                            echo "<strong>Club Description: </strong>" . $infoReply['club_desc'] . "<br/><br/>";
                            echo "<strong>Club Advisor: </strong>" . $infoReply['advisor_name'] . "<br/>";
                        ?>
                      </p>
                    </div>
                  </div>
                <div class="card-body" id="card-back" style="display: inline-block;width: 55%;margin-left: 5%;">
                  <div class="comment-background" id="comment-id">
                    <div class="comment-header">
                      <h5>RATINGS AND COMMENTS</h5>
                    </div>
                    <div class="rate-div">
                      <a class="btn btn-primary my-2" id="rate-btn" onclick=toggleRate() style="color:white;">Rate This Club</a>
                    </div>
                    <div style="overflow-y:scroll; height:400px;">
                        <?php
                            $getComments = "SELECT * FROM Feedback WHERE club_id = " . $infoReply['club_id'] . ";";
                            $commentReply = $dbc->query($getComments);
                            if($commentReply == false) {
                                echo "failed";
                            }
                            while($row = $commentReply->fetch_array()) {

                                echo '<div class="comment">';
                                echo '<div class="star-div">';
                                //echo '<p>' . $row['rating'] . '</p>';
                                $star = "<img class=\"comment-rate\" src=\"images/star_full.png\"></img>";
                                $starHalf = "<img class=\"comment-rate\" src=\"images/star_half.png\"></img>";
                                $starNone = "<img class=\"comment-rate\" src=\"images/star_empty.png\"></img>";
                                switch ($row['rating'])
                                {
                                  case 1:
                                    echo $star . $starNone . $starNone . $starNone . $starNone;
                                    break;
                                  case 2:
                                    echo $star . $star . $starNone . $starNone . $starNone;
                                    break;
                                  case 3:
                                    echo $star . $star . $star . $starNone . $starNone;
                                    break;
                                  case 4:
                                    echo $star . $star . $star . $star . $starNone;
                                    break;
                                  case 5:
                                    echo $star . $star . $star . $star . $star;
                                    break;
                                } 
                                //print_r($row);
                                echo '</div>';
                                echo '<div class="comment-text">';
                                echo '<p>' . $row['comment'] . '</p>';
                                
                                $getUserId = "SELECT user_id FROM Users WHERE username = '" . $_SESSION['username'] . "';";
                                $userId = $dbc->query($getUserId);
                                
                                if($userId == false)
                                  echo "failed";
                                else
                                  $user = $userId->fetch_array();
                                
                                if ($row['user_id'] == $user['user_id'])
                                  echo '<button class="comment-btn button-b" onclick="toggleEditComment('.$row['com_id'].',\''.$row['comment'].'\')">Edit</button>';
                                if(isset($_SESSION[admin]) && $_SESSION[admin] && $_SESSION['myCollege'] == $collIdVal)
                                {
                                  echo '<form action="PHP/removeComment.php" method="POST">';
                                  echo '<input type="hidden" name="comId" value='.$row['com_id'].' />';
                                  echo '<input type="Submit" class="button-b" value="Delete" />';
                                  echo '</form>';
                                  //echo '<a href=removeComment.php>Delete</a>';
                                }
                                 
                                echo '</div>';
                                echo '</div>';
                            }
                        ?>
                  </div>
              </div>
              
              <?php
                echo '<div class="edit-comment-container" id="edit-comment-container" style="display:none;">';
                echo '<form class="my-log new-comment-form" action="PHP/editRating.php" method="POST">';
                echo '<div class="my-log login-top">';
                echo '<p>Rating</p>';
                echo '<img class="new-comment-star" id="star-1e" src="images/star_empty.png" onmouseover="hovere(this);" onmouseout="unhovere(this);" onclick="clickStare(this);" />';
                echo '<img class="new-comment-star" id="star-2e" src="images/star_empty.png" onmouseover="hovere(this);" onmouseout="unhovere(this);" onclick="clickStare(this);" />';
                echo '<img class="new-comment-star" id="star-3e" src="images/star_empty.png" onmouseover="hovere(this);" onmouseout="unhovere(this);" onclick="clickStare(this);" />';
                echo '<img class="new-comment-star" id="star-4e" src="images/star_empty.png" onmouseover="hovere(this);" onmouseout="unhovere(this);" onclick="clickStare(this);" />';
                echo '<img class="new-comment-star" id="star-5e" src="images/star_empty.png" onmouseover="hovere(this);" onmouseout="unhovere(this);" onclick="clickStare(this);" />';
                echo '<input name="star-ratinge" type="text" id="star-ratinge" value=0 style="display:none;"></input>';
                echo '</div>';
                echo '<div class="my-log login-mid-top">';
                echo '<p>Comment</p>';
                echo '<textarea name="commente" id="commente"></textarea>';
                echo '</div>';
                echo '<div class="my-log login-mid-mid">';
                echo '<input type="hidden" id="comIdE" name="comIdE" value='.$row['com_id'].'/>';
                echo '<input type="Submit" class="button-b" value="Edit Rating" />';
                echo '</div>';
                echo '</form>';
                echo '</div>';
              ?>
              
              
              <div class="new-comment-container" id="new-comment-container" style="display:none;">
              <form class="my-log new-comment-form" action="PHP/leaveRating.php" method="POST">
                <div class="my-log login-top">
                  <p>Rating</p>
                  <img class="new-comment-star" id="star-1" src="images/star_empty.png" onmouseover="hover(this);" onmouseout="unhover(this);" onclick="clickStar(this);" />
                  <img class="new-comment-star" id="star-2" src="images/star_empty.png" onmouseover="hover(this);" onmouseout="unhover(this);" onclick="clickStar(this);" />
                  <img class="new-comment-star" id="star-3" src="images/star_empty.png" onmouseover="hover(this);" onmouseout="unhover(this);" onclick="clickStar(this);" />
                  <img class="new-comment-star" id="star-4" src="images/star_empty.png" onmouseover="hover(this);" onmouseout="unhover(this);" onclick="clickStar(this);" />
                  <img class="new-comment-star" id="star-5" src="images/star_empty.png" onmouseover="hover(this);" onmouseout="unhover(this);" onclick="clickStar(this);" />
                  <input name="star-rating" type="text" id="star-rating" style="display:none;"></input>
                </div>
                <div class="my-log login-mid-top">
                  <p>Comment</p>
                  <textarea name="comment"></textarea>
                </div>
                <div class="my-log login-mid-mid">
                  <input type="Submit" class="button-b" value="Create Rating" />
                </div>
              </form>
        	    </div>
            </div>
            </div>
      </div>

    </main>

    <footer class="text-muted" style="padding-top:20px;padding-bottom:20px;">
      <div style="width:50%;margin:auto;align:center;">
        <p style="padding-top:20px;margin:auto;width:100%;align:center;">2018 Bridgewater College</p>
      </div>
      <div style="width:50%;margin:auto;align:center;">
        <a href="faq.php" style="padding-top:20px;margin:auto;width:100%;align:center;">FAQ</a>
      </div>
</footer>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="bootstrap/bootstrap.min.js"></script>
  </body>
</html>
