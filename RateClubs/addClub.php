<!DOCTYPE html>
<?php
//echo 'php header';
session_start();
if(isset($_SESSION['alert'])&&$_SESSION['alert'] != 'blank') {
    $alert = $_SESSION['alert'];
    echo "<script type='text/javascript'>alert('$alert');</script>";
    $_SESSION['alert'] = 'blank';
}
else
    $_SESSION['alert'] = 'blank';
//print_r($_SESSION);
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

      <script src="js/homepage.js"></script>
      <script src="js/addClub.js"></script>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/homeStyle.css">
    <link rel="stylesheet" href="css/clubStyle.css">

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


      <div class="bodyDiv">
                  <div class="comment-background" style="width:45%;margin:auto;padding-top:25px;padding-bottom:25px;">
                  
                    <form action="PHP/insertClub.php" id="addClub-form" method="POST" style="margin-left:10%;margin-right:10%;">
                        <?php
                        require_once("PHP/DBconnect.php");
                        $getschool = "SELECT college_name FROM Colleges WHERE college_id = " . $_SESSION['myCollege'].";";
                        $getSchoolResponse = $dbc->query($getschool);

                        if($getSchoolResponse == false) {
                            echo "failed to find your college";
                        }
                        else {
                            $row = $getSchoolResponse->fetch_array();
                            echo "<h5>School: " . $row['college_name']."</h5>";
                        }
                        ?>
                        <h5>* = Required Field</h5>

                      <h5>Club Name*</h5>
                      <input class="field" type="text" name="clubName" id="clubName"/>
                      <h5>Contact Email*</h5>
                      <input class="field" type="text" name="clubEmail" id="clubEmail"/>
                      <h5>Meeting Time</h5>
                        <input class="field" type="text" name="meetTime" />
                      <h5>Meeting Location</h5>
                        <input class="field" type="text" name="meetLoc" />
                      <h5>Club Description*</h5>
                      <textarea class="field" type="text" name="clubDesc" id="clubDesc" rows=5></textarea>
                      <h5>Advisor Name</h5>
                        <input class="field" type="text" name="advisorName" />

                        <button type="button" class="button-b" onClick="validate()">Submit</button>

                    </form>
                      <div class="error-message" id="error-msg" style="display: none;">
                          <p>No Club Name entered.</p>
                      </div>
                      <div class="error-message" id="error-msg2" style="display: none;">
                          <p>No Contact email entered.</p>
                      </div>
                      <div class="error-message" id="error-msg3" style="display: none;">
                          <p>No Club Description entered.</p>
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
