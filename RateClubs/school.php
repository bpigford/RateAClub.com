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

    <section class="jumbotron text-center">
        <div class="container">
          <p>
            <?php
                //echo "<img class=\"schoolInfo image\" src=\"https://www.bridgewater.edu/images/bridgewater-eagles-logo.png\">";
                echo '<div class="contact-container" style="background-color:transparent;"><img src="/images/school_logo/'.str_replace(' ', '_', $_GET['school']).'.png" style="width:80%;"></div>';
                echo "<div id=\"school\" class=\"schoolInfo\">".$_GET['school']."</div>";
                //echo "<img class=\"schoolInfo image\" src=\"https://upload.wikimedia.org/wikipedia/commons/3/31/Bridgewater-college-seal.png\">";
            ?>
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
                 
                 $getRating = "SELECT college_avg_rating FROM Colleges WHERE college_name = '" . $_GET['school'] . "';";
                 $collegeRatResp = $dbc->query($getRating);
                 if($collegeRatResp == false)
                   echo "query didn't return";
                 else {
                   while($row = $collegeRatResp->fetch_assoc()) {
                     $collegeRatVal = $row["college_avg_rating"];
                   }
                 }
                 
                 $star = "<img class=\"overall-rate\" src=\"images/star_full.png\"></img>";
                 $starHalf = "<img class=\"overall-rate\" src=\"images/star_half.png\"></img>";
                 $starNone = "<img class=\"overall-rate\" src=\"images/star_empty.png\"></img>";
                 
                 switch ($collegeRatVal)
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
                      <h5>School Information</h5>
                    </div>
                    <div class="info-div">
                      <p><!--Information Placeholder-->
                        <?php
                          require_once('PHP/DBconnect.php');
                            $getData = "SELECT num_users, num_clubs, phone_num FROM Colleges WHERE college_name = '".$_GET['school']."';";
                            $data = $dbc->query($getData);
                            $row = $data->fetch_assoc();
                            echo "Number of Users: ".$row['num_users']."<br/>";
                            echo "Number of Clubs: ".$row['num_clubs']."<br/>";
                            echo "Phone Number: ".$row['phone_num']."<br/>";
                        ?>
                      </p>
                    </div>
                  </div>
                        <div class="card-body" id="card-back"  style="display: inline-block;width: 55%;margin-left: 5%;">
                            <div class="list-header main-header">
                                    <h5 class="main-table-head-text">ALL CLUBS</h5>
                                </div>
                    <div class="media-div">
                      <!--<table>Media Placeholder-->
                        <?php
                          require_once('PHP/DBconnect.php');
                            $getCollId = "SELECT college_id FROM Colleges WHERE college_name = \"".$_GET['school']."\";";
                            $id = $dbc->query($getCollId);
                            $row = $id->fetch_assoc();
                            $getTopRatedClubs = "SELECT Clubs.club_name, Clubs.club_avg_rating FROM Clubs WHERE Clubs.college_id = \"".$row['college_id']."\";";
                            $clubs = $dbc->query($getTopRatedClubs);
                            
                            if($clubs->num_rows > 0) {
                                    $x = 1;
                                    echo '<table class="main-table">';
                                    echo '<tr class="table-head-row"><th>School</th><th>Rating</th>';
                                    while($row = $clubs->fetch_assoc()) {
                                        //echo "<li> ". $row["club_name"]. " &#9 ". $row["college_name"]. " &#9 " . $row["club_avg_rating"]. " </li>";
                                        //echo "<a href=\"club.php?club=".str_replace(' ', '+', $row['club_name'])."&school=".str_replace(' ', '+', $row['college_name'])."\">";
                                        echo "<tr class=\"";
                                        if ($x % 2 == 0)
                                            echo "even\"";
                                        else
                                            echo "odd\"";

                                        echo " onclick=\"document.location = 'club.php?club=".str_replace(' ', '+', $row['club_name'])."&school=".str_replace(' ', '+', $_GET['school'])."';\"><td class=\"rankData\">". $row["club_name"]. "</td><td>";
                                        $x++;

                                        $star = "<img class=\"overall-rate\" src=\"images/star_full.png\"></img>";
                                        $starHalf = "<img class=\"overall-rate\" src=\"images/star_half.png\"></img>";
                                        $starNone = "<img class=\"overall-rate\" src=\"images/star_empty.png\"></img>";
                                        switch ($row["club_avg_rating"])
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
                                        echo " </td></tr>";
                                        echo '</a>';
                                    }
                                    echo '</table>';
                                }
                                else {
                                    echo "Not found.";
                                }
                            /*echo "<tr><th>Club Name</th><th>Overall Rating</th></tr>";
                            while ($row = $clubs->fetch_assoc())
                            {
                              echo "<tr><td>".$row['club_name']."</td><td>".$row['club_avg_rating']."</td></tr>";
                            }*/
                        ?>
                      <!--</table>-->

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
<script>'undefined'=== typeof _trfq || (window._trfq = []);'undefined'=== typeof _trfd && (window._trfd=[]),_trfd.push({'tccl.baseHost':'secureserver.net'}),_trfd.push({'ap':'cpsh'},{'server':'p3plcpnl0567'}) // Monitoring performance to make your website faster. If you want to opt-out, please contact web hosting support.
</script>
<script src='https://img1.wsimg.com/tcc/tcc_l.combined.1.0.6.min.js'></script>
</html>
