

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<title>Niconnect.com</title>
	
	<meta name="description" content="Niconnect edu" />
	<meta name="keywords" content="niconnect, connect, connection" />
	<link href="style.css" rel="stylesheet" type="text/css" />
	<link href='https://fonts.googleapis.com/css?family=Lato:400,700&display=swap&subset=latin-ext' rel='stylesheet' type 'text/css'>
		<link href="inputlog.css" rel="stylesheet" type="text/css" />
		<link href="lista.css" rel="stylesheet" type="text/css" />
		
		<script type="text/javascript" src="timer.js"></script>
</head>

<body onload="odlicz();">
	<div class="main">
		<div class="one">
<div class="marks">
				<div class="olista">
				
						<div class='thisBar'>
							<div class='nameBar'>
							The List Bar
							</div>
							
							<div class='nickbox'>
								<ul class='ulClass'>
								<div class='nick'><?php echo $user['user']; ?></div>
									<li class='liClass'><?php echo "<form method='get' action='user.php'><input type='hidden' name='profilowy' value='".$user['user']."' /><input type='submit' name='profileSubmit' value='Profile' /></form>"; ?></li>
									<li class='liClass'><?php echo "<form method='get' action='pocket.php'><input type='hidden' name='pocket' value='".$user['user']."'><input type='submit' name='pocketSubmit' value='Pocket' /></form>"; ?></li>
									<li class='liClass'><?php echo "<form method='get' action='message.php'><input type='hidden' name='logged' value='$uname' /><input type='hidden' name='listuname' value='".$user['user']."' /><input type='submit' name='messageSubmit' value='Message' /></form>"; ?></li>
								</ul>
							</div>
						</div>
						
				
				
				
				
				
				
				</div>
</div>
		</div>
		<div class="two">
		
		<div class="wodnica"><img src=".jpg" ></div>
		
					<div class="textlog">Log in or Create Your Account
					</div>
				<div class="log">
					<div class="zaloguj">
				<form action="zaloguj.php" method="post">
						<div class="ologin">Your login:
								<input type="text" name="login"/>
						</div>
						<div class="opassword">Your password:
							<input type="password" name="haslo"/>
						</div>
						<br /><br /><br /><br /><br />
						<input type="submit" value="Log in"/>
				</form>
						<div class="ologerror">
						<?php
						if (isset ($_SESSION['blad']))
						{
							echo $_SESSION['blad'];
						}
						?>
						</div>
						<div class="reginfo">
						<p>Don't you have The Account yet? Well, Take your chance:</p>
						<p><a class="regsend" href="register.php" style="font-size: 17px;">Create it now</a></p>
						</div>
					</div>
				</div>
		</div>
		<div class="three">
				
				<div class="profile">
					<button id='profileWindowButton' style='color: #303030; text-align: justify;'><?php echo $_SESSION['user']."'s profile"; ?></button>
						<div class="profileWindow">
							<div class="smallPhoto">
									<?php
									include "newProfileConn.php";
									include "uploadProfile.php";
									 getSmallPhoto($conn); ?>
							</div>
							<div class="uidDetails">
							
										<div id="profileNickUid"><?php echo $uname; ?></div>
									<div class="profilePageForm">
									<?php
			echo					"<form method='get' action='newProfile.php'>
											<input type='hidden' name='uid' value='".$_SESSION['user']."'>
											<input type='hidden' name='profilowy' value='".$_SESSION['user']."'>
											<input type='hidden' name='user' value='".$_SESSION['user']."'>
											<input type='submit' name='profilePageSubmit' id='profilePageSubmit' value='Profile'>
										</form>";
									?>
									</div>
									<div class="pocketProfile">
										<form method='get' action='epocket.php'><input type='hidden' name='pocket' value='<?php echo $uname; ?>'><input type='submit' id='pocketProfileSubmit' name='pocketPageSubmit' value='Pocket' /></form>
									</div>
									<div class='messagesProfile'>
										<form method='get' action='messagesPage.php'><input type='hidden' name='uid' value='<?php echo $uname; ?>'><input type='submit' id='messagesProfileSubmit' name='messagesPageSubmit' value='Messages'></form>
									</div>
									<div class='accountSettings'>
										<form method='get' action='accountSettings.php'><input type='hidden' name='uid' value='<?php echo $uname; ?>'><input type='submit' id='accountProfileSubmit' name='accountPageSubmit' value='Account Settings'></form>
									</div>
							
							</div>
							
							
							
							<button id="profileCloseWindowButton">X</button>
						</div>
									
				</div>
											<script src="main.js"></script>						
				<div class="email"><?php
				echo "<b> E-mail: </b>". $_SESSION['email']; echo ' [<a href="logout.php" style="color: blue">Log out</a>]';
				?>
				<logo>
				</div>
				<div class="niconnect"><a class="logo" href="index.php">Niconnect</a>
						<link href='https://fonts.googleapis.com/css?family=Signika&display=swap&subset=latin-ext' rel='stylesheet' type "text/css">
				</div>
				</logo>
				<div class="apps">
						<b><div id="timerjs"></div></b>	
						<div class='oreminder'><?php getReminder(); ?></div>
				</div>
				<div class="footer1">&copy;Nicolai.edu 2019
				</div>
		</div>
								<div class="clear">
								</div>
	</div>
</body>
</html>