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
    <link rel="stylesheet" href="css/homeStyle.css">
    <link rel="stylesheet" href="css/clubStyle.css">
    <script src="js/homepage.js"></script>
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

                                <h3 style="margin-bottom:15px;">Frequently Asked Questions</h3>
                                <p>How do I create an account?</p>
                                <ul>
                                  <li>Click the "Login/Create Account" button at the top/middle of the website.</li>
                                  <li>In the drop down box click "Create User"</li>
                                  <li>In the new page, fill in each field (password must be at least 8 characters in length and contain at least one uppercase, one lowercase, and a special character)</li>
                                  <li>Click "Submit"</li>
                                </ul>
                                <p>How do I change my password?</p>
                                <ul>
                                  <li>Log in to your account</li>
                                  <li>From the homepage click "Account Management"</li>
                                  <li>From the account management page select "Change Password"</li>
                                  <li>Enter your current password under "Current Password:"</li>
                                  <li>Enter your desired new password in the middle field (password must be at least 8 characters in length and contain at least one uppercase, one lowercase, and a special character)</li>
                                  <li>Click "Submit"</li>
                                </ul>
                                <p>How do I change my email?</p>
                                <ul>
                                  <li>Log in to your account</li>
                                  <li>From the homepage click "Account Management"</li>
                                  <li>From the account management page select "Change Email"</li>
                                  <li>Enter your desired new email under "New Email"</li>
                                  <li>Click "Change Email"</li>
                                </ul>
                                <p>How do I leave a comment/rating?</p>
                                <ul>
                                  <li>Log in to your account</li>
                                  <li>Select the club you wish to leave a comment/rating on from the "Club Directory" page</li>
                                  <li>Click "Rate This Club"</li>
                                  <li>You can either leave a starred rating without a comment or leave both a starred rating and a comment</li>
                                  <li>Click "Create Rating"</li>
                                </ul>
                                <p>How do I edit/delete a comment/rating I've left?</p>
                                <ul>
                                  <li>Log in to your account</li>
                                  <li>Select the club you left a comment/rating on from the "Club Directory" page or from the "account Management" page</li>
                                  <li>Find the comment/rating you wish to edit and select "edit"</li>
                                  <li>Make any changes desired</li>
                                  <li>Click "Edit Rating"</li>
                                  <li>*Note* only Admins may delete a comment/rating and only for the school(s) they are Admins over</li>
                                </ul>
                                <p>How do I find my school?</p>
                                <ul>
                                  <li>From the homepage click "School Directory"</li>
                                  <li>Either scroll and find your school or type part or all of your school's name in the "Search Schools" field</li>
                                  <li>Click "Search"</li>
                                </ul>
                                <p>How do I find a certain club?</p>
                                <ul>
                                  <li>From the homepage click "Club Directory"</li>
                                  <li>Either scroll and find your club or type part or all of your club's name in the "Search Clubs" field</li>
                                  <li>Click "Search"</li>
                                </ul>
                                <p>How to add a club (if user is an Admin):</p>
                                <ul>
                                  <li>From the homepage click on "Add Club"</li>
                                  <li>On the next page fill in each field to the best of your ability (filling in the required fields annotated by "*")</li>
                                  <li>Click "Submit"</li>
                                </ul>
                                
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
