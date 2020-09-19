<?php
	
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
	
	<title>Niconnect.uk</title>
	
	<meta name="description" content="Niconnect edu" />
	<meta name="keywords" content="Niconnect, connect, connection, Niconnection" />
	<link href="style.css" rel="stylesheet" type="text/css" />
	<link href='https://fonts.googleapis.com/css?family=Lato:400,700&display=swap&subset=latin-ext' rel='stylesheet' type 'text/css'>
		<link href="in.css" rel="stylesheet" type="text/css" />
		<link href="newProfileCss.css" rel="stylesheet" type="text/css" />
		
		<script type="text/javascript" src="timer.js"></script>
</head>

<body onload="odlicz();">
	<div class="main">
		<div class="one" id="one">

			<div class="marks" id="marks">
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
															echo "<div class='e-search'>I cannot find this User.</div>";
														}													
												}
												
											}
								$db_edu->close();
	echo	"</div>"
				?>
				
				
			</div>
		<button id="hidder"><-</button>
		</div>
		
		<div class="two" id="two">
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

								

			</div>
			<div id="ajaxNotForm"></div>
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
	<div class="naviname" style='margin-left: 10px;'>Niconnection</div>
</div>
			<div class="oPoster">
			<?php
					include "posterconn.php";
					include "poster.php";
					
	echo	"<div class='add-box-poster'>";
	echo	"<div class='add-poster'>";
				
					$uname=$_SESSION['user'];
	echo		"<form method='POST' enctype='multipart/form-data' action='".setComments($conn)."'>
						<input type='hidden' name='uid' value='$uname'>
						<input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
						<textarea name='poster' placeholder=' .Post the news'></textarea>
					<div class='posterSubmit'>
						<input type='submit' name='posterSubmit' value='Publish'>
					</div>						
				</div>
					<div class='add-file'>
					<div class='add-file1-img'>
						<input type='file' id='add-file1-img' name='add-file1-img' accept='image/*'>
						<label for='add-file1-img'>Choose the Picture</label>
					</div>
					<div class='add-file2-mp3'>
						<input type='file' id='add-file2-mp3' name='add-file2-mp3' accept='audio/*'>
						<label for='add-file2-mp3'>Choose the Music</label>
					</div>
					<div class='add-file3-video'>
						<input type='file' id='add-file3-video' name='add-file3-video' accept='video/*'>
						<label for='add-file3-video'>Choose the Video</label>
					</div>
					</div>

					</form>";
	echo	"</div>";
				?>
			</div>

		<div class="posters" id="getComments">


		</div>
			<script>
					let addimgFile = document.querySelector(".add-file1-img");
					let addmp3File = document.querySelector(".add-file2-mp3");
					let addvideoFile = document.querySelector(".add-file3-video");
					
						addimgFile.addEventListener("click", () =>{
							addimgFile.style.color="#efefef";
							
						});
						addmp3File.addEventListener("click", () =>{
							addmp3File.style.color="#efefef";
						});
						addvideoFile.addEventListener("click", () =>{
							addvideoFile.style.color="#efefef";
						});
				
				var http = new XMLHttpRequest();
				http.onreadystatechange=function(){
					if(this.readyState==4 && this.status==200){
						var getComments = document.getElementById("getComments").innerHTML=this.responseText;
					}
				};
				http.open("GET", "getComments.php", true);
				http.send();
				
				
				
			</script>
			<div class="posters">	
				<div class="facelook">
				<?php
				echo "<p> Ciao ". $_SESSION['user']. " in Niconnect.com, Your choice to take a sit.</p>". "Make a voice even if here that make a noise.";
				?>
				
				</div>
		<div class="space">
		</div>			
				<div class="facelook">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>Curabitur vitae felis quam. Etiam eu metus sollicitudin, tincidunt est eget, accumsan nulla. Quisque quam ipsum, vehicula in sem et, finibus finibus lorem. Curabitur quis eleifend sapien. Suspendisse sed ullamcorper justo, non sagittis eros. In elementum id justo vitae placerat. Maecenas at scelerisque diam, vel eleifend arcu. Integer at tempor ante, ac porta magna. Vestibulum eu tellus eleifend, posuere magna eu, dictum mi.
				<p style="text-align: right;">Thank you <a href="https://lipsum.com" style="color: green">Lorem</a> for <a href="https://lipsum.com" style="color: green">Ipsum</a></p>
				</div>
		<div class="space">
		</div>			
				<div class="facelook">
				The knowledge I have to take from around me. That means the first posted message in a webside. How is that possible &#x1F633;
				<p>Login vs. Log In, Logout vs. Log Out</p>
				<p>I have had this conversation with so many people, that I thought maybe a short post was in order. There is a difference in using these each as two words or as one and it is quite specific. So, to clear up any confusion, here is a simple way to remember which to use.</p>
				&#176;	When using log in, it is being used as a verb showing an action, telling someone to take action: go log in.<br />
				&#176;	When using login, it is being used as a noun or adjective indicating a place or destination: go to the login page.<br />
				<p>The same thing with log out vs. logout.</p>
				<p style="text-align: right;">Taken from <a href="https://whitelightconcepts.com/login-vs-log-in-logout-vs-log-out/" style="color: green">https://whitelightconcepts.com</a></p>
				</div>
			</div>
		</div>
			<script>
				var hidderBtn = document.querySelector("#hidder");
				hidderBtn.addEventListener("click", hidder);
				function hidder(){
					var one= document.getElementById("one");
						var marks =document.getElementById("marks");
					var two= document.getElementById("two");
					
					marks.style.display = "none";
					one.style.transition = "1.0s width";
					two.style.width = "71%";
					two.style.transition = "1.0s width";			
					
					
					
					var closeListBtn = document.createElement("button");
					closeListBtn.innerHTML = "->";
					closeListBtn.classList.add("closeListBtn");
					closeListBtn.style.background= "#efefef";
					document.body.appendChild(closeListBtn);
					
					document.body.classList.add("hiddenOn");
					closeListBtn.addEventListener("click", (e) => {
						e.preventDefault;
						document.body.classList.remove("hiddenOn");
						marks.style.display = "block";
						closeListBtn.style.display = "none";
						two.style.width = "52%";
						
					});

				}
				
			
			</script>
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
										<form method='get' action='messagesPage.php'><input type='hidden' name='uid' value='<?php echo $uname; ?>'><input type='submit' id='messagesProfileSubmit' name='messagesPageSubmit' value='Mail Box'></form>
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