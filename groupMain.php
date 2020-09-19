<?php
	
	session_start ();
				
	if(!isset ($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit ();
	}
	require_once "groupCheck.php"; //Checking if user is in database or not really 
			
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
		<link href="groupMain.css" rel="stylesheet" type="text/css" />
		<link href="group.css" rel="stylesheet" type="text/css" />
		
		<script type="text/javascript" src="timer.js"></script>
</head>

<body onload="odlicz();">
	<div class="main">
		<div class="gone">

			<div class="gmarks">
				<div class="golista">

						
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
	echo						"<b>Members</b>";
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
		<div class="groupNav">
			<p style='margin-left: 10px;'><?php echo $_GET['gname'];?></p>
			<button id="overViewNav">OVERVIEW</button>
			<button id="gchatNav">FORUM</button>
			<button id="gGalleryNav">GALLERY</button>
			<button id="gPlannerNav">PLANNER</button>
			<button id="gPropertyNav">PROPERTIES</button>
			
				<div id="ajaxNotForm"></div>
			
		</div>
							<script>
							//mailBox
								var xhr = new XMLHttpRequest();
								xhr.onreadystatechange= function(){
									if(this.readyState==4 && this.status==200){
										var ajaxNotForm = document.getElementById("ajaxNotForm").innerHTML=this.responseText;
									}
								};
								xhr.open("GET", "ajaxNotForm.php", true);
								xhr.send();
								
							</script>		
		<div class="gtwo">
					<input type="hidden" id="uid" value='<?php echo $_GET['uid'];?>'>
					<input type="hidden" id="user" value='<?php echo $_GET['user'];?>'>
					<input type="hidden" id="gname" value='<?php echo $_GET['gname'];?>'>
					<script>
					//main values
						var uid=document.getElementById("uid").value;
						var user=document.getElementById("user").value;
						var gname=document.getElementById("gname").value;					
					</script>
				<div class='overView' id='overView'>
					<p>DAILY NEWS</p>
					<div class="groupLogo"></div>
					<div class="dailyBox" id="dailyBox">
					
					
					</div>
					<div class="groupNote">
					<p style='text-align: center; font-size: 16px;'>Description</p>
					</div>
							<div class="groupChat"></div>
					<div class="gDiary">
					<p style='text-align: center; font-size: 16px;'>Events</p>
					</div>
				</div>
					<script>
								
														//repeat dailyBox
														window.addEventListener('load', rDailyBox);
														function rDailyBox(){
														var dailyXhr= new XMLHttpRequest();
														dailyXhr.onreadystatechange= function(){
															if(this.readyState==4 && this.status==200){
																var dailyBox=document.getElementById("dailyBox").innerHTML=this.responseText;
															}
														};
														dailyXhr.open("GET", "dailyGroupChat.php?gname="+gname, true);
														dailyXhr.send();
														}
					</script>

				<div class="ajaxForumField" id="ajaxForumField">
				
			<div class="groupbox">
			<input type="hidden" name="groupName" id="groupName" value='<?php echo $_GET['gname'];?>'>
					<div class='gpost' id='gpost'>
					</div>
					
						<?php
			include 'groupConnect.php';			
			mysqli_report(MYSQLI_REPORT_STRICT);
			
			try
			{
				$gconnect=new mysqli($host, $db_user, $db_password, $db_name);
				if($gconnect->connect_errno!=0)
				{
					Throw new Exception(mysqli_connect_errno());
				}
				else
				{
						$user=$_GET['user'];
						$gname= $_GET['gname'];
						$uname= $_SESSION['user'];
							$sqlTextUid= ("SELECT uid FROM users WHERE (gname='$gname') AND (uid='$uname')");
							$polacz_uid=$gconnect->query($sqlTextUid);
								$count_uid=$polacz_uid -> num_rows;
							$sqlTextUser= ("SELECT user FROM users WHERE (gname='$gname') AND (user='$uname')");
							$polacz_user=$gconnect->query($sqlTextUser);
								$count_user=$polacz_user -> num_rows;
									if(($count_uid>0) OR ($count_user>0))
									{
											include "group.php";	
											echo	"<div class='add-box-content'>";
											echo	"<div class='add-content'>";
						?>
										<form id='groupContentForm'>
														<input type='hidden' name='user' id='userChat' value='<?php echo $_GET['user'];?>'>
														<input type='hidden' name='tdate' id='tdate' value='<?php echo date('Y-m-d h:i:s');?>'>
														<input type='hidden' name='gname' id='gnameChat' value='<?php echo $_GET['gname'];?>'>
														<textarea name='tgroup' id='tgroup' placeholder=' .Post the news'></textarea>
															<div class='tgroupSubmit'>
														<input type='submit' name='tgroupSubmit' id='tgroupSubmit' value='Publish'>
															</div>
														</div>														
															<div class='add-file'>
															<div class='add-file1-img'>
																<input type='file' name='group-file1-img' id='group-file1-img' accept='image/*'>
																<label for='group-file1-img'>Choose the Picture</label>
															</div>
															<div class='add-file2-mp3'>
																<input type='file' name='group-file2-mp3' id='group-file2-mp3' accept='audio/*'>
																<label for='group-file2-mp3'>Choose the Music</label>
															</div>
															<div class='add-file3-video'>
																<input type='file' name='group-file3-video' id='group-file3-video' accept='video/*'>
																<label for='group-file3-video'>Choose the Video</label>
															</div>
															</div>
										</form>
										<div class="groupProgressBar" id="groupProgressBar">
											<div class="groupProgress-fill">
											<span class="groupProgress-text">0%</span></div>
										</div>
						<?php
											echo	"</div>";

									}
										else
										{
											echo	"You are not allowed to create a post in this group";
										}
				}
			}
				Catch (Exception $e)
				{
					echo "<span style='color: red;'>Błąd połączenia witryny z serwerem, Pozdrawiam</span>";
				}			
							?>			
							
			</div>

				</div>
				
				<div class="gGallery" id="gGallery"></div>
				<div class="gPlanner" id="gPlanner"></div>
				<div class="gProperty" id="gProperty"></div>
				
		</div>
			<script>
			
								//forum
								var gchatNav=document.querySelector("#gchatNav");
								gchatNav.addEventListener("click", showChat);
								
								function showChat(e) {
								e.preventDefault();
								var xhr = new XMLHttpRequest();
								xhr.onreadystatechange=function(){
									if(this.readyState==4 && this.status== 200){
												overViewNav.style.color="#303030";
												document.body.classList.add("overViewClose");
												document.body.classList.remove("gGalleryOpen");
												document.body.classList.remove("gPlannerOpen");
												document.body.classList.remove("gPropertyOpen");
												document.body.classList.add("ajaxForumFieldOpen");

										var gpost= document.getElementById("gpost").innerHTML=this.responseText;
												
									}
								};
								xhr.open("POST", "gForum.php", true);
								xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
								xhr.send("gname="+gname);			
												setTimeout(showChat, 5000);
								}
	
								
									// forum submit post to saveChat.php

			const uploadForm = document.getElementById("groupContentForm");
			const groupFile1Img = document.getElementById("group-file1-img");
			const groupFile2Mp3 = document.getElementById("group-file2-mp3");
			const groupFile3Video = document.getElementById("group-file3-video");
			const tgroup = document.getElementById("tgroup");
			const userChat = document.getElementById("userChat");
			const tdate = document.getElementById("tdate");
			const gnameChat = document.getElementById("gnameChat");
			
			const progressBarFill = document.querySelector("#groupProgressBar > .groupProgress-fill");
			const progressBarText = progressBarFill.querySelector(".groupProgress-text");
			
				uploadForm.addEventListener("submit", uploadFile);
				function uploadFile (e) {
					e.preventDefault();
					
						var xttp = new XMLHttpRequest();
						xttp.onreadystatechange=function(){
							if(this.readyState==4 && this.status==200){
								var formDisplay=document.getElementById("formDisplay").innerHTML=userChat.value+groupFile1Img.value;
							}
						};
						xttp.open("POST", "saveChat.php", true);
						xttp.upload.addEventListener("progress", e => {
							const percent = e.lengthComputable ? (e.loaded / e.total)* 100 : 0;
							progressBarFill.style.width = percent.toFixed(2) + "%";
							progressBarText.textContent = percent.toFixed(2) + "%";
						});
						xttp.send(new FormData(uploadForm));
				}

										//gGallery
										var gGalleryNav=document.querySelector("#gGalleryNav");
										gGalleryNav.addEventListener("click", ajaxGallery);
										
											function ajaxGallery(e){
												e.preventDefault();
												var xhrGallery=new XMLHttpRequest();
												xhrGallery.onreadystatechange=function(){
													if(this.readyState==4 && this.status==200){
														overViewNav.style.color="#303030";
														document.body.classList.add("overViewClose");
														document.body.classList.remove("ajaxForumFieldOpen");
														document.body.classList.remove("gPlannerOpen");
														document.body.classList.remove("gPropertyOpen");
														document.body.classList.add("gGalleryOpen");
														var gGallery=document.getElementById("gGallery").innerHTML=this.responseText;
													}
												};
												xhrGallery.open("GET", "gGallery.php?uid="+uid+"&user="+user+"&gname="+gname, true);
												xhrGallery.send();
											}
												//gPlanner
												var gPlannerNav=document.querySelector("#gPlannerNav");
												gPlannerNav.addEventListener("click", ajaxPlanner);
												
													function ajaxPlanner(e){
														e.preventDefault();
														var xhrPlanner=new XMLHttpRequest();
														xhrPlanner.onreadystatechange=function(){
															if(this.readyState==4 && this.status==200){
																overViewNav.style.color="#303030";
																document.body.classList.add("overViewClose");
																document.body.classList.remove("ajaxForumFieldOpen");
																document.body.classList.remove("gGalleryOpen");
																document.body.classList.remove("gPropertyOpen");
																document.body.classList.add("gPlannerOpen");
																var gPlanner=document.getElementById("gPlanner").innerHTML=this.responseText;
															}
														};
														xhrPlanner.open("GET", "gPlanner.php?uid="+uid+"&user="+user+"&gname="+gname, true);
														xhrPlanner.send();
													}
														//gProperty
														var gPropertyNav=document.querySelector("#gPropertyNav");
														gPropertyNav.addEventListener("click", ajaxProperty);
														
															function ajaxProperty(e){
																e.preventDefault();
																var xhrProperty=new XMLHttpRequest();
																xhrProperty.onreadystatechange=function(){
																	if(this.readyState==4 && this.status==200){
																		overViewNav.style.color="#303030";
																		document.body.classList.add("overViewClose");
																		document.body.classList.remove("ajaxForumFieldOpen");
																		document.body.classList.remove("gGalleryOpen");
																		document.body.classList.remove("gPlannerOpen");
																		document.body.classList.add("gPropertyOpen");
																		var gProperty=document.getElementById("gProperty").innerHTML=this.responseText;
																	}
																};
																xhrProperty.open("GET", "gProperty.php?uid="+uid+"&user="+user+"&gname="+gname, true);
																xhrProperty.send();
															}
										
														//show/hide
																						
														var overViewNav=document.querySelector("#overViewNav");
														overViewNav.addEventListener("click", function(e){
															overViewNav.style.color="#49c500";
															document.body.classList.remove("overViewClose");
															document.body.classList.remove("ajaxForumFieldOpen");
															document.body.classList.remove("gGalleryOpen");
															document.body.classList.remove("gPlannerOpen");
															document.body.classList.remove("gPropertyOpen");
															
														// dailyBox
														var dailyXhr= new XMLHttpRequest();
														dailyXhr.onreadystatechange= function(){
															if(this.readyState==4 && this.status==200){
																var dailyBox=document.getElementById("dailyBox").innerHTML=this.responseText;
															}
														};
														dailyXhr.open("GET", "dailyGroupChat.php?gname="+gname, true);
														dailyXhr.send();
														
														}, false);															

			</script>
		<div class="gthree">
				
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