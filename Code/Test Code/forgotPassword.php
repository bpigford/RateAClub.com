<?php 
include("/PHP/DBconnect.php"); 
include("/PHP/dbfunction.php");

$show = 'emailForm';

if ($_SESSION['lock'] == true && (mktime() > $_SESSION['lastTime'] + 800))
{
	$_SESSION['lock'] = false;
	$_SESSION['bc'] = 0;
}

if (isset($_POST['step']) && $_SESSION['lock'] != true)
{
	switch($_POST['step'])
	{
		case 1:
			$result = checkEmail($_POST['username'],$_POST['email']);
			if ($result['status'] == false )
			{
				$error = true;
				$show = 'userNotFound';
			} else {
				$error = false;
				$show = 'secform';
				$securityUser = $result['userID'];
			}
		break;
		case 2:
			
			if ($_POST['userID'] != "" && $_POST['answer'] != "")
			{
				$result = checkSecAnswer($_POST['userID'],$_POST['answer']);
				if ($result == true)
				{
					
					$error = false;
					$show = 'success';
					$passwordMessage = sendPasswordEmail($_POST['userID']);
					$_SESSION['bc'] = 0;
				} else {
					
					$error = true;
					$show = 'secform';
					$securityUser = $_POST['userID'];
					$_SESSION['bc']++;
				}
			} else {
				$error = true;
				$show = 'secform';
			}
		break;
	}
}
if ($_SESSION['bc'] >= 3)
{
	$show = 'speedLimit';
	$_SESSION['lock'] = true;
	$_SESSION['lastTime'] = '' ? mktime() : $_SESSION['lastTime'];
}
?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Password Recovery</title>
	<link href="../assets/css/styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="header"></div>
<div id="page">
	<?php if ($show == 'emailForm') { ?>
	<h2>Password Recovery</h2>
    <p>Here you may recover your password with the fields below.</p>
    <?php if ($error == true) { ?><span class="error">You must enter either a username or password to continue.</span><?php } ?>
    <form action="<?= $DB_HOST['PHP_SELF']; ?>" method="post">
        <div class="fieldGroup"><label for="username">Username</label><div class="field"><input type="text" name="username" id="username" value="" maxlength="20"></div></div>
        <div class="fieldGroup"><label>- OR -</label></div>
        <div class="fieldGroup"><label for="email">Email</label><div class="field"><input type="text" name="email" id="email" value="" maxlength="255"></div></div>
        <input type="hidden" name="step" value="1" />
        <div class="fieldGroup"><input type="submit" value="Submit" style="margin-left: 150px;" /></div>
        <div class="clear"></div>
    </form>
    
	<?php } elseif ($show == 'secform') { ?>
	<h2>Recover Password</h2>
    <p>Please answer the security question below:</p>
    
	<?php if ($error == true) { ?><span class="error">You must anwser the security question.</span><?php } ?>
    
	<form action="<?= $DB_HOST['PHP_SELF']; ?>" method="post">
        <div class="fieldGroup"><label>Question</label><div class="field"><?= getSecQuestion($securityUser); ?></div></div>
        <div class="fieldGroup"><label for="answer">Answer</label><div class="field"><input type="text" name="answer" id="answer" value="" maxlength="255"></div></div>
        <input type="hidden" name="step" value="2" />
        <input type="hidden" name="userID" value="<?= $securityUser; ?>" />
        <div class="fieldGroup"><input type="submit" value="Submit" style="margin-left: 150px;" /></div>
        <div class="clear"></div>
    </form>
    <?php } elseif ($show == 'userNotFound') { ?>
   
   <h2>Recover Password</h2>
    <p>The username or email you entered was not found.</p>
   
   <?php } elseif ($show == 'success') { ?>
    
	<h2>Recover Password</h2>
    <p>You should have received an email <strong></strong><br /><br /><a href="login.php">Return</a> to the login page. </p>
    <p>This is the message that would appear in the email</p>
    
	<div class="message"><?= $passwordMessage;?></div>
    <?php } elseif ($show == 'speedLimit') { ?>
		<h2>Error</h2>
		<p>You have answered the security question wrong. </p>
		<br /><br />
		<a href="login.php">Return</a> to the login page. </p>
    <?php } ?>
</div>
</body>
</html>
<?php
	ob_flush();
	$mySQL->close();
?>
