﻿<?php
	
	session_start ();
	
	if(!isset ($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit ();
	}
									include "reminder.php";
		
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
		<link href="edytor.css" rel="stylesheet" type="text/css" />
		
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
</div><?php			
		
		
											echo "<div class='etresc'>";
include "details.php";
											echo	"<div class='otresci'>Urodziny: ".$row['urodziny']."</div><br />";
											echo	"<div class='otresci'>Gender: ".$row['gender']."</div><br />";
											echo	"<div class='otresci'>Pasja: ".$row['passion']."</div><br />";
											echo	"<div class='otresci'>City: ".$row['city']."</div><br />";
											

											echo "</div>";
											
		include "zapisz.php";
		
	function setEdytor($polaczenie)
	{
		if(isset($_POST['editSubmit']))
				{
					$id = $_POST['id'];
					$edate = $_POST['edate'];
					$gen = $_POST['gen'];
					$uro = $_POST['uro'];
					$passion = $_POST['passion'];
					$city = $_POST['city'];
					
					$sql = "UPDATE uzytkownik SET urodziny='$uro', gender='$gen', passion='$passion', city='$city' WHERE id='$id'";
					$polacz = $polaczenie->query($sql);
					header("Location: profile.php");
				}
	}	
										echo "<div class='eedit'>";
										
					$id=$_SESSION['id'];
echo	"<form method='POST' action='".setEdytor($polaczenie)."'>
		<div class='oedit'>
			<input type='hidden' name='id' value='$id'>
			<input type='hidden' name='edate' value='".date('Y-m-d H:i:s')."'>
			<textarea name='uro' rows='5' placeholder=' .Here'></textarea>
			</div><br />
		<div class='oedit'>
		
			<label><input type='radio' name='gen' value='M'>Male</label>
			<label><input type='radio' name='gen' value='F'>Female</label>
			</div><br />
		<div class='oedit'>	
			<textarea name='passion' rows='5' placeholder=' .Here'></textarea>
			</div><br />
		<div class='oedit'>	
			<textarea name='city' rows='5' placeholder=' .Here'></textarea>
		</div><br />
		<input type='submit' name='editSubmit' value='Save' />
		</form>"; 
										echo	"</div>";
		?>
		</div>
		<div class="three">
				
				<div class="profile">
					<button id='profileWindowButton' style='color: #303030; text-align: justify;'><?php echo $_SESSION['user']."'s profile"; ?></button>
						<div class="profileWindow">
							<div class="smallPhoto">
									<?php
									
									 getSmallPhoto($conn); ?>
							</div>
							<div class="uidDetails">
							
										<div id="profileNickUid"><?php echo $_SESSION['user']; ?></div>
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