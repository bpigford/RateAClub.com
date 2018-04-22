<!DOCTYPE html>
<?php
	//echo 'php header';
	session_start();
    if(isset($_SESSION['alert'])&&$_SESSION['alert'] != 'blank') {
        $alert = $_SESSION['alert'];
        echo "<script type='text/javascript'>alert('$alert');</script>";
        $_SESSION['alert'] = 'blank';
    }
    else {
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
            <?php
            require_once('PHP/DBconnect.php');
                echo $_SESSION['username'];
                echo '<br/>';
                echo $_SESSION['userEmail'];
                echo '<br/>';

                $getSchoolName = "SELECT college_name FROM Colleges WHERE college_id = " . $_SESSION['myCollege'] .";";
                $schoolNameResponse = $dbc->query($getSchoolName);

                if($schoolNameResponse == false) {
                    echo "something broke";
                }
                $infoReply = $schoolNameResponse->fetch_array();
                echo $infoReply['college_name'];

                if($_SESSION['admin']) {
                    echo '<br/>';
                    echo 'You are an admin for your school.';
                }

            ?>
          </p>
        </div>
      </section>

      <div class="album py-5 bg-light" id="back">
        <div class="container">

            <div class="row">
            
                <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <div class="card-body">
                  <div class="info-container">
                    <div class="list-header">
                      <h5>Actions</h5>
                    </div>
                    <div class="info-div">
                      <?php
                      //echo isset($_SESSION['admin']);
                        if( ($_SESSION['admin'] == false))
                          echo '<p><a href="changeSchool.php">Change School</a></p>';
                      ?>
                      <p><a href="changePassword.php">Change Password</a></p>
                      <p><a href="changeEmail.php">Change Email</a></p>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <div class="card-body" id="card-back">
                            <div class="list-header">
                      <h5>All Comments</h5>
                    </div>
                    <div class="media-div" style="overflow-y:scroll; height:400px;">
                      <table>
                        <?php
                          require_once('PHP/DBconnect.php');
                          $getComments = "SELECT Feedback.rating, Feedback.comment, Clubs.club_name FROM Feedback INNER JOIN Clubs ON Feedback.club_id = Clubs.club_id WHERE Feedback.user_id = ".$_SESSION['userId'].";";
                            //$getComments = "SELECT * FROM Feedback WHERE user_id = " . $_SESSION['userId'] . ";";
                            $commentReply = $dbc->query($getComments);
                            if($commentReply == false) {
                                echo "inner join failed";
                            }
                            while($row = $commentReply->fetch_array()) {
                                /*$getClub = "SELECT club_name FROM Clubs WHERE club_id = " . $row['club_id'] . ";";
                                $getClubReply = $dbc->query($getComments);
                                if($getClubReply == false) {
                                    $_SESSION['alert'] = "getting the club for the comment failed";
                                    header('Location: account.php');
                                    exit();
                                }
                                $club = $getClubReply->fetch_array();*/


                                echo '<div class="comment">';
                                echo '<div class="comment-text">';
                                echo '<p>' . $row['club_name'] . '</p>';
                                echo '</div>';
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
                                echo '</div>';
                                echo '<div class="comment-text">';
                                echo '<p>' . $row['comment'] . '<br/></p>';
                                //echo "<a href=\"editComment.php\">Edit</a>";
                                if ($row['user_id'] == $user['user_id'])
                                  echo '<button class="comment-btn button-b" onclick="toggleEditComment('.$row['com_id'].',\''.$row['comment'].'\')">Edit</button>';
                                  
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
                                echo '<input type="Submit" value="Edit Rating" />';
                                echo '</div>';
                                echo '</form>';
                                echo '</div>';
                                
                                if(isset($_SESSION[admin]) && $_SESSION[admin])
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
                      </table>
                    </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
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
