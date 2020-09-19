<?php
	
	session_start ();
	
	if(!isset ($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit ();
	}
			
									include "newProfileConn.php";
									include "uploadProfile.php";
									include "reminder.php";				
		if($_GET['profilowy'] == $_SESSION['user'])
		{
			header ('Location: newProfile.php');
			exit ();
		}
		
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<title>Niconnect.uk</title>
	
	<meta name="description" content="Niconnect edu" />
	<meta name="keywords" content="Niconnect, connect, connection, Niconnection" />
	<link href="style.css" rel="stylesheet" type="text/css" />
	<link href='https://fonts.googleapis.com/css?family=Lato:400,700&display=swap&subset=latin-ext' rel='stylesheet' type 'text/css'>
		<link href="in.css" rel="stylesheet" type="text/css" />
		<link href="profile.css" rel="stylesheet" type="text/css" />
		<link href="newProfileCss.css" rel="stylesheet" type="text/css" />
		<link href="chat.css" rel="stylesheet" type="text/css" />

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
			

								<div id="ajaxNotForm"></div>

			</div>
							<script>
								var xhr = new XMLHttpRequest();
								xhr.onreadystatechange= function(){
									if(this.readyState==4 && this.status==200){
										var ajaxNotForm = document.getElementById("ajaxNotForm").innerHTML=this.responseText;
									}
								};
								xhr.open("GET", "ajaxNotForm.php", true);
								xhr.send();
							</script>
<div class="navispace">
	<div class="naviname">User's Profile</div>
</div>						

			<div class='profileBox'>
				
				<div class='personalNickProfile'><?php echo $_GET['profilowy']; ?>
				</div>
				<div class='personalPicture'>
				<?php echo "<div class='getPicture'>"; getPersonalPicture($conn); echo "</div>";?>

					
					</div>

				
				<div class='personalPhoto'>
					<?php
					getPersonalPhoto($conn);
					?>
				</div>
				<div class='personalText' id='personalText'>

					<div class='personalTextField'>
						<br>
						<p><?php getDescription($conn); ?></p>
					</div>
						<div class='navList'>
							<form><input type="hidden" id="uid" value="<?php echo $_GET['profilowy'];?>"><button id='infoBtn'>Details</button></form>
							<button id='gListBtn'>Groups</button>
							<button id='fListBtn' name='fListBtn'>Friends</button>	
						
							
						</div>
							<?php
			echo		"<form method='post' action='".setSubscribeAsk($conn)."'>
								<input type='hidden' name='uid' value='".$_GET['profilowy']."'>
								<input type='hidden' name='user' value='".$_SESSION['user']."'>
								<input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
								<input type='submit' name='friendSubmit' id='friendSubmit' value='Subscribe'>
							</form>";
							?>	
						<div class="infoPersonal">
							<div class="detPersonalNames">
								<p>Language</p>
								<p>City/town</p>
								<p>Birth's day</p>
								<p>Passions</p>
								<p>E-mail</p>
								<p>Url</p>
							</div>
							<div id="getPersonalAjaxInfo">
							</div>
						</div>

						<div class="gListPersonal">
							<p><?php
											include 'groupconn.php';										
											include 'group.php';		
							ulistPersonal($gconn);
							?></p>
						</div>
						
						<div class='fListPersonal'>
							<p><?php getFriendList($conn); ?></p>
						</div>
						
						<script>
							var infoBtn=document.querySelector("#infoBtn");

								infoBtn.addEventListener("click", function(ev){
									document.body.classList.remove("gListOpen");
									document.body.classList.remove("fListOpen");
									document.body.classList.add("infoOpen");
								}, false);
								infoBtn.addEventListener("click", getPersonalInfo);
							function getPersonalInfo(e){
								e.preventDefault();
								var uid=document.getElementById("uid").value;
								var http=new XMLHttpRequest();
								http.onreadystatechange=function(){
									if(this.readyState==4 && this.status==200){
										document.getElementById("getPersonalAjaxInfo").innerHTML=this.responseText;
									}
								}
								http.open("GET", "infopersonal.php?uid="+uid, true);
								http.send();
							}
								
								
							var gListBtn=document.querySelector("#gListBtn");			
								gListBtn.addEventListener("click", function(ev){
									document.body.classList.remove("infoOpen");
									document.body.classList.remove("fListOpen");
									document.body.classList.add("gListOpen");									
								}, false);
							var fListBtn=document.querySelector("#fListBtn");
								fListBtn.addEventListener("click", function(ev){
									document.body.classList.remove("infoOpen");
									document.body.classList.remove("gListOpen");
									document.body.classList.add("fListOpen");
								},false);
							
							
						
						</script>
						
				</div>
					
				<div class='personalGallery'>
				<div class='personalNickGallery'>The gallery of <?php echo $_GET['profilowy']; ?>
				</div>
					<div class='picturesNav'>
					</div>
					<div class='musicNav'>
					</div>
					<div class='videoNav'>
					</div>
				
			
				</div>
			</div>


					<script src="newProfile.js"></script>
			
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
								<form method='get' action='newProfile.php'>
									<input type='hidden' name='uid' value='<?php echo $_SESSION['user']; ?>'>
									<input type='hidden' name='profilowy' value='<?php echo $_SESSION['user']; ?>'>
									<input type='hidden' name='user' value='<?php echo $_SESSION['user']; ?>'>
									<input type='submit' name='profilePageSubmit' id='profilePageSubmit' value='Profile'/>
								</form>
							</div>
							<div class="pocketProfile">
								<form method='get' action='epocket.php'><input type='hidden' name='pocket' value='<?php echo $uname; ?>'><input type='submit' id='pocketProfileSubmit' name='pocketPageSubmit' value='Pocket' /></form>
							</div>
							<div class='messagesProfile'>
								<form method='get' action='messagesPage.php'>
									<input type='hidden' name='uid' value='<?php echo $_SESSION['user']; ?>'>
									<input type='hidden' name='profilowy' value='<?php echo $_SESSION['user']; ?>'>
									<input type='hidden' name='user' value='<?php echo $_SESSION['user']; ?>'>								
								<input type='submit' id='messagesProfileSubmit' name='messagesPageSubmit' value='Mail Box'></form>
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