<?php
	
	session_start ();
	
	if(!isset ($_SESSION['zalogowany']))
	{
		header('Location: index.php');
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
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="style.css" rel="stylesheet" type="text/css" />
	<link href='https://fonts.googleapis.com/css?family=Lato:400,700&display=swap&subset=latin-ext' rel='stylesheet' type 'text/css'>
		<link href="in.css" rel="stylesheet" type="text/css" />
		<link href="lista.css" rel="stylesheet" type="text/css" />
		
		<script type="text/javascript" src="timer.js"></script>
		
		
		
		<style>
			.progress-bar
			{
				height: 25px;
				width: 200px;
				border: 2px dotted #fff;
			}
			.progress-bar-fill
			{
				height: 100%;
				width: 0%;
				background-color: green;
				display: flex;
				align-items: center;
				transition: width 0.25s;
			}


		
		</style>
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
	<div class="naviname">Niconnect edu</div>
</div>

			<div class="facelook">
				<form class="form" id="uploadForm">
					<p>
					<label for="thisText">Insert Text</label>
					<input type="text" name="myText" id="thisText">
					</p>
					<p>
					<label for="inpFile">Insert Data</label>
					<input type="file" name="inpFile" id="inpFile">
					</p>
					<input type="submit" value="Insert"/>
				</form>
				<div class="progress-bar" id="progressBar">
					<div class="progress-bar-fill"><span class="progress-bar-text">0%</span></div>
					
			</div><br/><br/>
					<div id="formDisplay"></div>
					
			<script>
			const uploadForm = document.getElementById("uploadForm");
			const inpFile = document.getElementById("inpFile");
			const thisText = document.getElementById("thisText");
			
			const progressBarFill = document.querySelector("#progressBar > .progress-bar-fill");
			const progressBarText = progressBarFill.querySelector(".progress-bar-text");
			
				uploadForm.addEventListener("submit", uploadFile);
				function uploadFile (e) {
					e.preventDefault();
					
						var xttp = new XMLHttpRequest();
						xttp.onreadystatechange=function(){
							if(this.readyState==4 && this.status==200){
								var formDisplay=document.getElementById("formDisplay").innerHTML=this;
							}
						};
						xttp.open("POST", "uploadEdu.php", true);
						xttp.upload.addEventListener("progress", e => {
							const percent = e.lengthComputable ? (e.loaded / e.total)* 100 : 0;
							progressBarFill.style.width = percent.toFixed(2) + "%";
							progressBarText.textContent = percent.toFixed(2) + "%";
						});
						xttp.send(new FormData(uploadForm));
				}
				
			
			</script>
			</div>




	<div class="space">
	</div>
			<div class="facelook">
				<form id="theForm">
					<p>
					<label for="theText">Insert Text</label>
					<input type="text" name="myText" value="some text" id="theText">
					</p><p>
					<label for="theFile">Insert Data</label>
					<input type="file" name="myFile" id="theFile">
					</p><p>
					<label for="theMusic">Insert Data</label>
					<input type="file" name="myMusic" id="theMusic">
					</p><p>
					<label for="theVideo">Insert Data</label>
					<input type="file" name="myVideo" id="theVideo">
					</p><br/><br/>
					<button>Insert</button>
				</form>
					<div id="dymyy"></div>
			</div>
			<script>
				window.addEventListener('load', function(){
					const text = document.getElementById("theText");
					const file1 = {
						dom : document.getElementById("theFile"),
						binary : null
					};
					const file2 = {
						dom : document.getElementById("theMusic"),
						binary : null
					};
					const file3 = {
						dom : document.getElementById("theVideo"),
						binary : null
					};
					
						const reader = new FileReader();
						reader.addEventListener("load", function(){
							file1.binary = reader.result;

						});
							//if file is selected at page load, read it
							if(file1.dom.files[0]){
								reader.readAsBinaryString(file1.dom.files[0]);
							}

							
							//if not, read the file once the user selects it
							file1.dom.addEventListener("change", function(){
								if(reader.readyState === FileReader.LOADING){
									reader.abort();
								}
								reader.readAsBinaryString(file1.dom.files[0]);
							});
							
							if(file2.dom.files[0]){
								reader.readAsBinaryString(file2.dom.files[0]);
							}

							
							//if not, read the file once the user selects it
							file2.dom.addEventListener("change", function(){
								if(reader.readyState === FileReader.LOADING){
									reader.abort();
								}
								reader.readAsBinaryString(file2.dom.files[0]);
							});
							
							if(file3.dom.files[0]){
								reader.readAsBinaryString(file3.dom.files[0]);
							}

							
							//if not, read the file once the user selects it
							file3.dom.addEventListener("change", function(){
								if(reader.readyState === FileReader.LOADING){
									reader.abort();
								}
								reader.readAsBinaryString(file3.dom.files[0]);
							});
							
																								
								//the main function
								function sendData(){
									//if file is selected, wait for reader to read it but if it's not selected, delay the execution of the function
									if(!file1.binary && file1.dom.files.length > 0){
										setTimeout(sendData, 10);
										return;
									}

																											

									//to create multipart form, create ajax
										const xhr = new XMLHttpRequest();
											
											//create separator to define each part of the request
											const boundary = "blob";
											
												//store the body of request as the string
												let data = "";
												
													//So if user has selected the file - start a new part in body's request
													if(file1.dom.files[0]){
														data += "--" + boundary + "\r\n";
														
														//Describe it as a form data
														data += 'content-disposition: form-data; '
														
														//Define the name of the form data
														+ 'name="' + file1.dom.name + '"; '
														
														//Provide the real name of this file data
														+ 'filename="' + file1.dom.files[0].name + '"\r\n';
														
														//And mime type of this file
														data += 'Content-Type: ' + file1.dom.files[0].type + '\r\n';
														
														//Create the blank line between the metadata and the data
														data += '\r\n';
														
															//Append the binary data to the body's request
															data += file1.binary + '\r\n';
													}
													
				// file2 - music									
													//So if user has selected the file2 - start a new part in body's request
													if(file2.dom.files[0]){
														data += "--" + boundary + "\r\n";
														
														//Describe it as a form data
														data += 'content-disposition: form-data; '
														
														//Define the name of the form data
														+ 'name="' + file2.dom.name + '";'
														
														//Provide the real name of this file data
														+ 'filename="' + file2.dom.files[0].name + '"\r\n';
														
														//And mime type of this file
														data += 'Content-Type:' + file2.dom.files[0].type + '\r\n';
														
														//Create the blank line between the metadata and the data
														data += '\r\n';
														
															//Append the binary data to the body's request
															data += file2.binary + '\r\n';
													}		

					// file3 - video										
													//So if user has selected the file3 - start a new part in body's request
													if(file3.dom.files[0]){
														data += "--" + boundary + "\r\n";
														
														//Describe it as a form data
														data += 'content-disposition: form-data; '
														
														//Define the name of the form data
														+ 'name="' + file3.dom.name + '";'
														
														//Provide the real name of this file data
														+ 'filename="' + file3.dom.files[0].name + '"\r\n';
														
														//And mime type of this file
														data += 'Content-Type:' + file3.dom.files[0].type + '\r\n';
														
														//Create the blank line between the metadata and the data
														data += '\r\n';
														
															//Append the binary data to the body's request
															data += file3.binary + '\r\n';
													}

													

														//A part of text data - start a new part in body's request
														data += "--" + boundary + "\r\n";
														
														//Define it as a form data and name it 
														data += 'content-disposition: form-data; name="' + text.name + '"\r\n';
														
														//Create the blank line between metadata and the data
														data += '\r\n';
															
															//Append the text data to body's request
															data += text.value + "\r\n";
															
																//Close the body's request
																data += "--" + boundary + "--";
																
																	//Define what should happen on succes
																	xhr.addEventListener('load', function(event){
																		alert("Data has been uploaded to the request and response loaded.");
																		var dymyy=document.getElementById("dymyy").innerHTML=this.response;
																	
																	});
																	
																	//Define what should happen on error
																	xhr.addEventListener('error', function(event){
																		alert("There was something wrong");
																	});
																	
																	//Set up the request
																	xhr.open("POST", "eduRequest.php", true);
																	
																	//add required http header to handle multipart of data
																	xhr.setRequestHeader('Content-type', 'multipart/form-data; boundary='+boundary);
																	
																	//Send it as the request
																	xhr.send(data);
																	var dymyy=document.getElementById("dymyy").innerHTML="Loading...";
								}
									//Access this form
									const form = document.getElementById("theForm");
									form.addEventListener('submit', function(event){
										event.preventDefault();
										sendData();
									});
						
				});
			
			</script>
	<div class="space">
	</div>			
			<div class="facelook">
				<p><div id="dymy"></div></p>
				<form>
				<input type="hidden" id='uid' value="<?php echo $_SESSION['user'];?>">
				<button id="userNick">Button</button>
				</form>
	
			</div>
			<script>
						var przycisk = document.querySelector("#userNick");
						przycisk.addEventListener("click", dymic, false);
						
							function dymic(e){
								e.preventDefault();
								var uid=document.getElementById("uid").value;
								var http = new XMLHttpRequest();
								http.onreadystatechange = function(){
									if(this.readyState == 4 && this.status == 200){
										document.getElementById("dymy").innerHTML = this.responseText;
									}
								};
								http.open("GET", "data.php?uid="+uid, true);
								http.send();
							}
			</script>
	<div class="space">
	</div>
			<div class="facelook">
			<?php
			include "reminder.php";
			
			$uname=$_SESSION['user'];
			echo	"<form method='POST' action='".reminder()."'>
						<input type='hidden' name='user' value='$uname'>
						<input type='date' name='reminder' >
						<input type='time' name='time' ><br>
						<input type='text' name='info' placeholder=' .Remind me' >
						<input type='submit' name='reminderSubmit' value='Insert' >
						</form>";
			?>
			</div>
	<div class="space">
	</div>		
			<div class="facelook">
	<p> That is new object, user is allowed to create list by javaScript. It's simple but toDo list could let me show the main points of this language.</p>
			If web is reloading, every data goes away.
			<h1 style='font-size: 22px; color: #303030;'> Organiser </h1>
				<form class='add-todo-form'>
					<input type="text" class="add-todo-input">
					<button type="submit" class="add-todo-btn">Add ToDo</button>
					
					<ul id="todo-list">
					
					</ul>
					<script src="todo.js"></script>
					
				</form>
			</div>
	<div class="space">
	</div>			
			<div class="facelook">
			<p>Insert your phone number</p>
			<?php
		include "zapisz.php";
		
	function setCode($polaczenie)
	{
		if(isset($_POST['editCode']))
				{
					$id = $_POST['id'];
					$edate = $_POST['edate'];
					$number = $_POST['number'];
					
					$sql = "UPDATE uzytkownik SET cphone='$number' WHERE id='$id'";
					$polacz = $polaczenie->query($sql);	
					
				}
				
	}	
			
			
					$id=$_SESSION['id'];
echo	"<form method='POST' action='".setCode($polaczenie)."'>
		<div class='oedit'>
			<input type='hidden' name='id' value='$id'>
			<input type='hidden' name='edate' value='".date('Y-m-d H:i:s')."'>
			<input type='number' name='number' placeholder='Phone number' >
		</div><br />
		<input type='submit' name='editCode' value='Code' />
		</form>";
		
											echo "<div class='etresc'>";
include "details.php";
											
											$number = $row['cphone'];

											$uname=$_SESSION['user'];
											echo	"<div class='otresci'>Your Phone Number <br />".$row['cphone']."</div><br />";

											echo "</div>";
											echo "<p>AlfaCode Number: [0-9] [A-J] </p>";

													$check = strlen($number);
													if (($check >=9) AND ($check<=10))

													{
														$array = str_split($number);
														$n="0";
														if($array['0']==$n) echo "A";
														if($array['0']==$n+1) echo "B";
														if($array['0']==$n+2) echo "C";
														if($array['0']==$n+3) echo "D";														
														if($array['0']==$n+4) echo "E";														
														if($array['0']==$n+5) echo "F";
														if($array['0']==$n+6) echo "G";														
														if($array['0']==$n+7) echo "H";														
														if($array['0']==$n+8) echo "I";														
														if($array['0']==$n+9) echo "J";		
														
															if($array['1']==$n) echo "A";
															if($array['1']==$n+1) echo "B";
															if($array['1']==$n+2) echo "C";
															if($array['1']==$n+3) echo "D";														
															if($array['1']==$n+4) echo "E";														
															if($array['1']==$n+5) echo "F";
															if($array['1']==$n+6) echo "G";														
															if($array['1']==$n+7) echo "H";														
															if($array['1']==$n+8) echo "I";														
															if($array['1']==$n+9) echo "J";	

																if($array['2']==$n) echo "A";
																if($array['2']==$n+1) echo "B";
																if($array['2']==$n+2) echo "C";
																if($array['2']==$n+3) echo "D";														
																if($array['2']==$n+4) echo "E";														
																if($array['2']==$n+5) echo "F";
																if($array['2']==$n+6) echo "G";														
																if($array['2']==$n+7) echo "H";														
																if($array['2']==$n+8) echo "I";														
																if($array['2']==$n+9) echo "J";	
																												
																	if($array['3']==$n) echo "A";
																	if($array['3']==$n+1) echo "B";
																	if($array['3']==$n+2) echo "C";
																	if($array['3']==$n+3) echo "D";														
																	if($array['3']==$n+4) echo "E";														
																	if($array['3']==$n+5) echo "F";
																	if($array['3']==$n+6) echo "G";														
																	if($array['3']==$n+7) echo "H";														
																	if($array['3']==$n+8) echo "I";														
																	if($array['3']==$n+9) echo "J";	
														
																		if($array['4']==$n) echo "A";
																		if($array['4']==$n+1) echo "B";
																		if($array['4']==$n+2) echo "C";
																		if($array['4']==$n+3) echo "D";														
																		if($array['4']==$n+4) echo "E";														
																		if($array['4']==$n+5) echo "F";
																		if($array['4']==$n+6) echo "G";														
																		if($array['4']==$n+7) echo "H";														
																		if($array['4']==$n+8) echo "I";														
																		if($array['4']==$n+9) echo "J";	
																												
																		if($array['5']==$n) echo "A";
																		if($array['5']==$n+1) echo "B";
																		if($array['5']==$n+2) echo "C";
																		if($array['5']==$n+3) echo "D";														
																		if($array['5']==$n+4) echo "E";														
																		if($array['5']==$n+5) echo "F";
																		if($array['5']==$n+6) echo "G";														
																		if($array['5']==$n+7) echo "H";														
																		if($array['5']==$n+8) echo "I";														
																		if($array['5']==$n+9) echo "J";	
																																										
																			if($array['6']==$n) echo "A";
																			if($array['6']==$n+1) echo "B";
																			if($array['6']==$n+2) echo "C";
																			if($array['6']==$n+3) echo "D";														
																			if($array['6']==$n+4) echo "E";														
																			if($array['6']==$n+5) echo "F";
																			if($array['6']==$n+6) echo "G";														
																			if($array['6']==$n+7) echo "H";														
																			if($array['6']==$n+8) echo "I";														
																			if($array['6']==$n+9) echo "J";	
																																										
																				if($array['7']==$n) echo "A";
																				if($array['7']==$n+1) echo "B";
																				if($array['7']==$n+2) echo "C";
																				if($array['7']==$n+3) echo "D";														
																				if($array['7']==$n+4) echo "E";														
																				if($array['7']==$n+5) echo "F";
																				if($array['7']==$n+6) echo "G";														
																				if($array['7']==$n+7) echo "H";														
																				if($array['7']==$n+8) echo "I";														
																				if($array['7']==$n+9) echo "J";	
																																										
																					if($array['8']==$n) echo "A";
																					if($array['8']==$n+1) echo "B";
																					if($array['8']==$n+2) echo "C";
																					if($array['8']==$n+3) echo "D";														
																					if($array['8']==$n+4) echo "E";														
																					if($array['8']==$n+5) echo "F";
																					if($array['8']==$n+6) echo "G";														
																					if($array['8']==$n+7) echo "H";														
																					if($array['8']==$n+8) echo "I";														
																					if($array['8']==$n+9) echo "J";	
																					
																					if($check==10)
																					{
																					if($array['9']==$n) echo "A";
																					if($array['9']==$n+1) echo "B";
																					if($array['9']==$n+2) echo "C";
																					if($array['9']==$n+3) echo "D";														
																					if($array['9']==$n+4) echo "E";														
																					if($array['9']==$n+5) echo "F";
																					if($array['9']==$n+6) echo "G";														
																					if($array['9']==$n+7) echo "H";														
																					if($array['9']==$n+8) echo "I";														
																					if($array['9']==$n+9) echo "J";																								
																					}
																																									

													}
													else
													{
														echo "Insert correct Phone Number";
													}

		?>
			
			</div>
	<div class="space">
	</div>
			<div class="facelook">
			That what I need is a knowledge. I have Idea to make groups but I make mistakes, I do not know where it is, how to find it, how to find that knowledge. Leave it on a moment.
			<p>I need to wake up with Python. I found idea to create some funtcion to code users numbers. Alfabet has 26 eng, 32 polish.
			I know how to make it as php. Started with Python few days ago and I need to learn it. It is similar leanguage but can I send text by the method post or get like a php. I am not sure.
			In a Crazy Salads I found the solution how to make it in a cofe napkins but I am not sure can I use POST, I hope there is something similar.
			
			</div>
	<div class="space">
	</div>		
			<div class="facelook">
			<p>Let's try to think. Single user for every profil means. If user gonna click on the name of other user then send him into some page, where database will show him some kind of database of other user.</p> Select id, his name, his database to able to share and echo them on page for example name it alien.php. submit has to send his id with method get this time.
			<p>If not, $user = $_SESSION['id'] user in the session logged in will click on his name then send him into normal profile.php alowed to edit his database.</p> That make's sense and its simple I need to be focus on.
			
			</div>
	<div class="space">
	</div>				
			<div class="facelook">
			At first the main thing is strategy, couse I cannot make it in the same page, this in just a frontend. I need single page for edit options. I copy all the things to create one page to edit form as eprofile.php. Alright, there is one submit to edit all the things. It is not perfect, because all of the fields have to be edit together but leter I will find the solution.
			</div>
	<div class="space">
	</div>	
			<div class="facelook">
			<p>I have created for the single user's profile and i can see that I have lots functions to create for that, lots of fun, all of them need single file, single database but technicly i can make that, its simple in my project. <p>At first info about the user, plus on the bottom as not nessecery but simple to create is a list of the user's details. That should I make as a start of all of this.</p>
			<p>The links, the goups, list of users, function date reminder and favorite apps take after this first part.</p>
			</div>
	<div class="space">
	</div>
			<div class="facelook">
			<p>I've created posting with all nessecery css styles, all what is behind it and yestesday i've got very important idea that Niconnect needs to create groups.
			Users should's see the posts from every user. Users should see the posts what they would expect to see, well from users from their single groups.
			That is simple and I should let them do that, same for me.</p> 
			<p>One user create the group, that creat's one row in my database. 
			Tabels need have id of the groups, name of the group, names of the users or id of the users from register's database and one cal for name of the administrator. There should be able to connect only me so also one cal for my account. Thats is clearly, after all it's possibly to add moderator but I do not want it.</p>
			Then shortly, my php system put him into database as a admin of the group. Users from the same group will be able to watch posts published by their group.
			That is simple, I need to create the new marks for that thing.
			</div>
	<div class="space">
	</div>
			<div class="facelook">
			
				<p>Create the message</p>
					<div class="posting">
					
					<?php
					include "posterconn.php";
					include "poster.php";
								$uname=$_SESSION['user'];
					echo	"<form method='POST' action='".setComments($conn)."'>
								<input type='hidden' name='uid' value='$uname'>
								<input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
								<textarea name='message' rows='5' placeholder=' .Here'></textarea><br>
								<input type='submit' name='ideaSubmit' value='Publish' />
								</form>";

					?>
					</div>
			</div>
			
			<div class="posters">
				<?php
				getComments($conn);
				?>
				
				<div class="facelook">
				What has changed in css, that now there is something wrong. Database cannot take the insert and I don't know why.
				I need to undestrand what is going on with that poster. The point is: It must be simple. Where is that fault.<br />
				I got it, couse I closed the connection before everything could happen. Let's make have fun to create everything what I needed cancel to get some knowledge.<br />
				I've been good, in loosing time. Crazy but now I know, lets do the poster.<br />
				Now by the session I could put name of user into the base, as his own message, great.<br />
				Still I have good time, because the fauld has been fixed so fast, very well.
				<p>Every page needs, for every apps the new database. The one is working, that's simple. I'll do that.</p>
				After that, main css: Make background-color between posts and class two and between every posts.
				</div>
	<div class="space">
	</div>			
				<div class="facelook">
				<p>Yes, already i've done that. This is a ready message to my Database and it's working.</p>
				Now with a simple css, so time to finish it and add that's all into The every part of Niconnect's.<br />
				The point is that need to be input textarea, couse normal text is complitly different.<br /><br /><br />


				</div>
	<div class="space">
	</div>
					<div class="facelook">
						
						
						<p>The message</p>

						
						How to make the Post message, that should save itself while user press the submit. <br />That should be a simple. <br />
						Need try to insert that kind of message into my database, start with something small without css yet.

						
						
						<br /> <br />
						
						<input type="text" name="napis" />
						<input type="submit" name="send" value="Send" />
						<?php
						$napis=$_POST['napis'];
						if(isset($_POST['napis']))
						{
							echo $napis;
						}
						?>
						
					</div>
	<div class="space">
	</div>			
				<div class="facelook">
			<p>I've tried to create just a simple function to count every id.</p>
			<p>I could't find the knowledge how to make that.</p><p>Well I prepared that list of the users, this is it:</p>
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
								while($ilu_ich=$result->fetch_assoc())
								{
									echo $ilu_ich['id'].". The Name: ".$ilu_ich['user']."<br />";
								}
							}
							else 
							{
								echo "No users";
							}
						$db_edu->close();
					?>
					<p style="text-align:right;">That's the point: leter.</p>

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
					closeListBtn.addEventListener("click", hideOff);

					function hideOff(e){
						e.preventDefault;
						document.body.classList.remove("hiddenOn");
						marks.style.display = "block";
						closeListBtn.style.display = "none";
						two.style.width = "52%";
					}
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
										<form method='get' action='accountSettings.php'><input type='hidden' name='uid' value='<?php echo $_SESSION['user']; ?>'><input type='submit' id='accountProfileSubmit' name='accountPageSubmit' value='Account Settings'></form>
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