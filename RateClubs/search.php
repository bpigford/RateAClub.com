<!DOCTYPE html>
<?php
	//echo 'php header';
	session_start();
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
          <p>Forgot Password?</p>
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
      <!--<div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
          <a href="#" class="navbar-brand d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
            <strong>Album</strong>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>-->
    </header>

    <main role="main">

      <div class="album py-5 bg-light" id="back">
        <div class="container">

          <div class="row">
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <div class="card-body" id="card-back">
                  <div class="list-container">
                    <div class="list-header main-header">
                      <h5 class="main-table-head-text">TOP 10 OVERALL RATED CLUBS</h5>
                    </div>
	<?php
	$xmlDoc = new DOMDocument();
	$xmlDoc -> load("url.xml");
	
	$x = $xmlDoc -> getElementsByTagName('link');
	$q= $_GET["q"];

	if (strlen($q) > 0) {
		$hint = "";
	for($i = 0; $i < ($x -> length); $i++) {
		$y = $x -> item($i) -> getElementsByTagName('title');
		$z = $x -> item($i) -> getElementsByTagName('url');
	if ($y -> item(0) -> nodeType == 1) {

	if (stristr($y -> item(0) -> childNodes -> item(0) -> nodeValue,$q)) {
	if ($hint == "") {
		$hint = "<a href = '" . 
		$z -> item(0) -> childNodes -> item(0) -> nodeValue . 
		"' target='_blank' > " . 
		$y -> item(0) -> childNodes -> item(0) -> nodeValue . "</a>";
	} else {
		$hint = $hint . "<br /><a href='" . 
		$z -> item(0) -> childNodes -> item(0) -> nodeValue . 
		"' target='_blank'>" . 
		$y -> item(0) -> childNodes -> item(0) -> nodeValue . "</a>";
					}
				}
			}
		}
	}

	if ($hint == "") {
		$response = "no suggestion";
	} else {
		$response = $hint;
	}
	echo $response;	
                            require_once('PHP/DBconnect.php');
                            $searchSchools = "SELECT * FROM Colleges WHERE college_name = '" .$_POST['search']."';";
                            $searchSchoolsResponse = $dbc->query($searchSchools);
                            if($searchSchoolsResponse == false) {
                                echo "finding schools failed";
                            }
                            else {

                            }
                            $getTopRatedClubs = "SELECT club_name, club_avg_rating FROM Clubs WHERE club_name = '".$_POST['search']."' ORDER BY club_name DESC;";
                            $topClubs = $dbc->query($getTopRatedClubs);

                            if($topClubs == false) {
                            echo "query didn't return";
                            }
                            
                            if($topClubs->num_rows > 0) {
                                $x = 1;
                                echo '<div class="result-div" style="overflow-y:scroll; height:400px;">';
                                echo '<table class="main-table">';
                                echo '<tr class="table-head-row"><th>Organization</th><th>Rating</th>';
                                while($row = $topClubs->fetch_assoc()) {
                                    echo "<tr class=\"";
                                    if ($x % 2 == 0)
                                      echo "even\"";
                                    else
                                      echo "odd\"";
                                    echo " onclick=\"document.location = 'club.php?club=".str_replace(' ', '+', $row['club_name'])."&school=".str_replace(' ', '+', $row['college_name'])."';\"><td class=\"rankData\">" . $x++ . ".</td><td>". $row["club_name"]. "</td><td>". $row["college_name"]. "</td><td>";
                                    
                                    $star = "<img class=\"overall-rate\" src=\"images/star_full.png\"></img>";
                                    $starHalf = "<img class=\"overall-rate\" src=\"images/star_half.png\"></img>";
                                    $starNone = "<img class=\"overall-rate\" src=\"images/star_empty.png\"></img>";
                                    switch ($row["club_avg_rating"])
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
                                     echo " </td></tr>";
                                    //echo '</a>';
                                }
                                echo '</table>';
                                echo '</div>';
                            }
                            else {
                                    echo "Not found.";
                                }
                        ?>
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
