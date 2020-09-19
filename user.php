<?php
	
	session_start ();
	
	if(!isset ($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit ();
	}
				include "reminder.php";
		
		if($_GET['profilowy'] == $_SESSION['user'])
		{
			header ('Location: profile.php');
			exit ();
		}
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<title>Niconnect.com</title>
	
	<meta name="description" content="Niconnect edu" />
	<meta name="keywords" content="Niconnect, connect, connection, Niconnection" />
	<link href="style.css" rel="stylesheet" type="text/css" />
	<link href='https://fonts.googleapis.com/css?family=Lato:400,700&display=swap&subset=latin-ext' rel='stylesheet' type 'text/css'>
		<link href="in.css" rel="stylesheet" type="text/css" />
		<link href="profile.css" rel="stylesheet" type="text/css" />
		
		<script type="text/javascript" src="timer.js"></script>
</head>

<body onload="odlicz();">
	<div class="main">
		<div class="one">

			<div class="marks">
				<div class="olista">

						
						<?php
					require_once "connect.php";
										
					$db_edu = new mysqli($host, $db_user, $db_password, $db_name);
						if($db_edu->connect_error)
							{
								die("connection failed: ".$db_edu->connect_error);
							}
							$find=('SELECT id, user FROM uzytkownik');
							$result=$db_edu->query($find);
								if($result->num_rows!==0)
									{
										$uname = $_SESSION['user'];
										

	echo						"<div class='nameBar'>";
	echo						"<b>The List Bar</b>";
	echo						"</div>";										
										while($user=$result->fetch_assoc())
										{
											if($user['id'] <10) 
											{
												$user['id'] = "0".$user['id'];
											}
	echo					"<div class='thisBar'>";
	echo						"<div class='nickbox'>";
	echo							"<ul class='ulClass'>";
	echo							"<div class='nick'><a href='#' style='color: #303030;'>".$user['user']."</a></div>";
	echo								"<li class='liClass'><form method='get' action='newUser.php'><input type='hidden' name='user' value='".$_SESSION['user']."' /><input type='hidden' name='profilowy' value='".$user['user']."' /><input type='submit' name='profileSubmit' value='Profile' /></form></li>";
	echo								"<li class='liClass'><form method='get' action='pocket.php'><input type='hidden' name='pocket' value='".$user['user']."'><input type='submit' name='pocketSubmit' value='Pocket' /></form></li>";
	echo								"<li class='liClass'><form method='get' action='message.php'><input type='hidden' name='logged' value='$uname' /><input type='hidden' name='listuname' value='".$user['user']."' /><input type='submit' name='messageSubmit' value='Message' /></form></li>";
	echo							"</ul>";
	echo						"</div>";
	echo					"</div>";

				
				
				

										}
									}
									else 
									{
										echo "No users";
									}
						echo	"</div>";
						echo	"<div class='search'>";
								
								echo 	"<form method='post'>
											<input type='text' name='searching' placeholder=' .Nickname'>
											<input type='submit' name='find' value='Search' />
											</form>";
											
											if(isset($_POST['find']))
											{
												$look = $_POST['searching'];
												$search = ("SELECT user FROM uzytkownik WHERE user LIKE '%$look%' LIMIT 4");
												$result= $db_edu -> query ($search);
												
												if (ctype_alnum ($look)==true)
												{
													$policz= $result -> num_rows;
													if ($policz>0)
													{
														while ($selected = $result-> fetch_assoc())
														{
	echo						"<div class='nickbox'>";
	echo							"<ul class='ulClass'>";
	echo							"<div class='nick'><a href='#' style='color: #303030;'>".$selected['user']."</a></div>";
	echo								"<li class='liClass'><form method='get' action='newUser.php'><input type='hidden' name='user' value='".$selected['user']."' /><input type='hidden' name='profilowy' value='".$user['user']."' /><input type='submit' name='profileSubmit' value='Profile' /></form></li>";
	echo								"<li class='liClass'><form method='get' action='pocket.php'><input type='hidden' name='pocket' value='".$selected['user']."'><input type='submit' name='pocketSubmit' value='Pocket' /></form></li>";
	echo								"<li class='liClass'><form method='get' action='message.php'><input type='hidden' name='logged' value='$uname' /><input type='hidden' name='listuname' value='".$selected['user']."' /><input type='submit' name='messageSubmit' value='Message' /></form></li>";
	echo							"</ul>";
	echo						"</div>";
														}
													}
														else
														{
															echo "No Users";
														}													
												}
												
											}
								$db_edu->close();
	echo	"</div>"
				?>
				
				
			</div>
		</div>
		<div class="two">
			<div class="navigator">
				<div class="home"><form method='GET' action='index.php'><input type='submit' name='home' value='Home' /></form>
				</div>
				<div class="niconnection"><form method='GET' action='niconnection.php'><input type='submit' name='niconnection' value='Niconnection' /></form>
				</div>
				<div class="edu"><form method='GET' action='edu.php'><input type='submit' name='edu' value='Niconnect edu' /></form>
				</div>
			<?php
			$uname=$_SESSION['user'];
		echo	"<div class='navigroup'>
					<form method='GET' action='gmenu.php'>
					<input type='hidden' name='uid' value='$uname'>
					<input type='hidden' name='user' value='$uname'>
					<input type='submit' name='gmenuSubmit' value='The Group'>
					</form>
					</div>";
			?>		

							<form method='get' action='messagesPage.php'>
							<input type='hidden' name='uid' value='<?php echo $_SESSION['user']; ?>'>
							<input type='hidden' name='user' value='<?php echo $_SESSION['user']; ?>'>
							<input type='hidden' name='profilowy' value='<?php echo $_SESSION['user']; ?>'>
							<input type='submit' id='notSubmit' name='notSubmit' value='Notifications'>
							</form>
			</div>
<div class="navispace">
		<?php
		include "single.php";
		?>
	<div class="naviname"><?php echo $row['user']."'s profile";?></div>
</div>			
<?php
		include "single.php";
?>		
			<div class="faceprofile">
				<div class="fhalf">
					<div class="oinfo">
						<div class="linfo">Info
						</div>
						<div class="pinfo"><?php 
include "single.php";
											echo $row['description'];

						?>
						
						</div>
					</div>
					<div class="odane"><p>The Main Section</p>
					<?php
include "single.php";
											echo "E-mail: ".$row['email']."<br />";
											echo "User : ".$row['user']."<br />";
											//echo "Phone number: ".$row['phone'];
											//echo "Language".$row['language'];
		

					?>
					</div>
					<div class="oglist">Groups
					<?php

					?>
					</div>
					<div class="olinks">Links
					<?php

					?>					
					</div>
				</div>
				<div class="shalf">
					<div class="oulist">The users list
					<?php

					?>					
					</div>
					<div class="oudetails"><p>Details </p>
<?php
include "single.php";
											echo	"Birthday: ".$row['urodziny']."<br />";
											echo	"Gender: ".$row['gender']."<br />";
											echo	"Passion: ".$row['passion']."<br />";
											echo	"City: ".$row['city']."<br />";
											echo	"Register's date: ".$row['datereg']."<br />";

									
					?>																
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