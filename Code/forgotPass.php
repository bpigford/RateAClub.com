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

      <script src="js/homepage.js"></script>
      <script src="js/changePassword.js"></script>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/homeStyle.css">

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
      <a href="index.php"><img src="images/rate_logo.png"  class="navbar-brand logo-image"></img></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <button class="btn btn-primary my-2" type="button" id="login-button" onClick=toggleLogin() value=
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
		<span class="sr-only">(current)</span></a>
          </li>
        </ul>
 
   <?php
     if (isset($_SESSION['username']))
       echo '<button class="btn btn-primary my-2" type="button" id="login-button-2" onclick=window.location.href="account.php">Account Managment</button>';
   ?>
   
         <form class="form-inline mt-2 mt-md-0" id="search-bar" action="search.php" method="POST">
          <input class="form-control mr-sm-2" name="search" type="text" placeholder="Search" aria-label="Search"></input>
          <button class="btn btn-outline-success my-2 my-sm-0" id="sub" type="submit">Search</button>
        </form>
	</div>
    </nav>
    <div id="top-link-bar">
      <a class="top-link" href="#">Submit a help ticket</a>
      <a class="top-link" href="#">Contacts for website help</a>
      <a class="top-link" href="#">FAQ</a>
    </div>
   
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
          <input type="Submit" value="Login" />
        </div>
        <div class="my-log login-mid-bottom">
           <a href="forgotPass.php" title="Forgot Password">Forgot Password?</a><br /><br/>
        </div>
      </form>
      <div class="my-log login-bottom">
        <form action="createUser.php" method="POST">
          <button type="button" onClick=submit()>Create User</button>
        </form>
      </div>
	  </div> <!-- added -->
	
  
  
 </div>
      
    </div>
    </header>

    <main role="main">

      <div class="album py-5 bg-light" id="back">
        <div class="container">

            <div class="row">
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <div class="card-body form-container">
                  <form class="school-form" action="PHP/forgotPassfunction.php" method="POST">
                    <div class="my-log login-top">
					<p>Forgot Password?<p>
					<body>
						Enter your Username and Email to change your password.
					</body>
					<p>Username</p>
					<input type="text" name="username" id="username"/>
					</div>
					<div class="my-log login-mid-top">
                      <p>Email</p>
                      <input type="text" name="email" id="email"/>
                    </div>
                    <div class="my-log login-mid-mid">
                      <p>New Password</p>
                      <input type="text" name="newPassword1" id="newPassword1"/>
                    </div>
                    <div class="my-log login-mid-bottom">
                      <p>Confirm Password</p>
                      <input type="text" name="newPassword2" id="newPassword2"/>
                    </div>
                      <div class="my-log login-bottom">
                          <button type="button" onClick="validate()">Change Password</button>
                      </div>
                  </form>
                    <div class="error-message" id="error-msg" style="display: none;">
                        <p>Password and Confirm Password do not match</p>
                    </div>
                    <div class="error-message" id="error-msg2" style="display: none;">
                        <p>No Username entered</p>
                    </div>
                    <div class="error-message" id="error-msg3" style="display: none;">
                        <p>No Email entered</p>
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

    <footer class="text-muted">
      <div class="container">
        <p style="padding-top:20px;">2018 Bridgewater College</p>
      </div>
    </footer>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="bootstrap/bootstrap.min.js"></script>
  </body>
</html>