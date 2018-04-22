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
    
    <link rel="stylesheet" href="bootstrap/bootstrat_joke.min.css">
    <link rel="stylesheet" href="css/homeStylejoke.css">
    <script src="js/homepage.js"></script>
  </head>
  
  <body>
    <header>
      <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
          <div class="row" id="alpha">
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
      <a class="navbar-brand" href="index.php">RateAClub</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon" id="bravo"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <button class="btn btn-primary my-2" type="button" id="login-button" onClick=toggleLogin()>
			<?php
				if (isset($_SESSION['username']))
					echo 'Hi ' . $_SESSION['username'] . ', Logout?';
				else
					echo 'Login/Create Account';
			?>
		<span class="sr-only">(current)</span></a>
          </li>
        </ul>
        <form class="form-inline mt-2 mt-md-0" id="charlie">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" id="sub" type="submit">Search</button>
        </form>
      </div>
    </nav>
    <div class="login-container" id="login-container" style="display:none;">  <!-- added -->
      <form class="my-log login-form" action="PHP/login.php" method="POST">
        <div class="my-log login-top">
          <p id="alpha">Username</p>
          <input type="text" name="user_name" />
        </div>
        <div class="my-log login-mid-top">
          <p id="delta">Password</p>
          <input type="password" name="pass_word" />
        </div>
        <div class="my-log login-mid-mid">
          <input type="Submit" value="Login" />
        </div>
        <input class="lgbutton" type="button" value="Logout" onclick="window.location.href='http://www.rateaclub.org'"/>
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
      
      <!--<div class="my-log login-mid-bottom">
        <p>Forgot Password?
      </div>

      <div class="my-log login-bottom">
        <p id="create">Create Account</p>
      </div>-->
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

      <section class="jumbotron text-center">
        <div class="container" id="charlie">
          <p>
            <a href="findClub.php" class="btn btn-primary my-2" id="echo">Find Club</a>
            <a href="findSchool.php" class="btn btn-primary my-2" id="bravo">Find School</a>
            <a href="addClub.php" class="btn btn-primary my-2" id="foxtrot">Add Club</a>
            <a href="addSchool.php" class="btn btn-primary my-2" id="hotel">Add School</a>
          </p>
        </div>
      </section>

      <div class="album py-5 bg-light" id="back">
        <div class="container">

          <div class="row">
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <div class="card-body">
                  <div class="list-container" id="hotel">
                    <div class="list-header" id="help-header">
                      <h5 id="help">Help</h5>
                    </div>
                    <ul>
                      <li><a href="webhelp.html">Contacts for website help</a></li>
                      <li id="alpha"><a href="ticket.php">Submit a help ticket</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <div class="card-body" id="card-back">
                  <div class="list-container">
                    <div class="list-header">
                      <h5 id="foxtrot">TOP 10 OVERALL RATED CLUBS</h5>
                    </div>
                    <ol>
                      <li id="alpha">Placeholder 1</li>
                      <li id="bravo">Placeholder 2</li>
                      <li id="charlie">Placeholder 3</li>
                      <li id="delta">Placeholder 4</li>
                      <li id="echo">Placeholder 5</li>
                      <li id="foxtrot">Placeholder 6</li>
                      <li id="golf">Placeholder 7</li>
                      <li id="hotel">Placeholder 8</li>
                      <li id="indigo">Placeholder 9</li>
                      <li id="juliet">Placeholder 10</li>
                        <?php
                            /*$sql = "SELECT clubs.club_name, clubs.avg_club_rating, colleges.name FROM clubs INNER JOIN colleges ON clubs.collegeID=colleges.collegeID ORDER BY avg_club_rating LIMIT 10";
                            $result = $dbc->query($sql);
                            if($result) {
                            echo "query failed";
                            }
                            if($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<li>". $row["clubs.club_name"]. " &#9 ". $row["colleges.name"]. " &#9 " . $row["clubs.avg_club_rating"]. "</li>";
                                }
                            else {
                                    echo "Not found.";
                                }*/
                        ?>
                    </ol>
                  </div>
                  
                  <div class="list-container">
                    <div class="list-header">
                      <h5>TOP 10 RATED SCHOOLS BY CLUB</h5>
                    </div>
                    <ol>
                      <li id="juliet">Placeholder 1</li>
                      <li id="indigo">Placeholder 2</li>
                      <li id="hotel">Placeholder 3</li>
                      <li id="golf">Placeholder 4</li>
                      <li id="foxtrot">Placeholder 5</li>
                      <li id="echo">Placeholder 6</li>
                      <li id="delta">Placeholder 7</li>
                      <li id="charlie">Placeholder 8</li>
                      <li id="bravo">Placeholder 9</li>
                      <li id="alpha">Placeholder 10</li>
                    </ol>
                  </div>
                  
                  <!--<div class="list-container">
                    <div class="list-header">
                      <h5>TOP 5 OVERALL RATED CLUBS BY SCHOOL</h5>
                    </div>
                    <ol>
                      <li>Placeholder 1</li>
                      <li>Placeholder 2</li>
                      <li>Placeholder 3</li>
                      <li>Placeholder 4</li>
                      <li>Placeholder 5</li>
                    </ol>
                  </div>-->
                </div>
              </div>
            </div>
            <!--<div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text">Box3</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text">Box4</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text">Box5</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text">Box6</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text">Box7</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text">Box8</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text">Box9</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>-->
            </div>
          </div>
        </div>
      </div>

  <iframe width="420" height="315"
src="https://www.youtube.com/embed/ZZ5LpwO-An4?autoplay=1">
</iframe>
<iframe width="420" height="315"
src="https://www.youtube.com/embed/BBGEG21CGo0?autoplay=1">
</iframe>
<iframe width="420" height="315"
src="https://www.youtube.com/embed/QH2-TGUlwu4?autoplay=1">
</iframe>

    </main>

    <footer class="text-muted" id="juliet">
      <div class="container">
        <p class="float-right">
          <a id="charlie" href="#">Back to top</a>
        </p>
        <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
        <p>New to Bootstrap? <a href="../../">Visit the homepage</a> or read our <a href="../../getting-started/">getting started guide</a>.</p>
      </div>
    </footer>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="bootstrap/bootstrap.min.js"></script>
  </body>
</html>
