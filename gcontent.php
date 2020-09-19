



	<?php
				session_start();
				include "groupConnect.php";
				mysqli_report (MYSQLI_REPORT_STRICT);
				
				try
				{
				$connect=new mysqli($host, $db_user, $db_password, $db_name);
				if($connect->connect_errno!=0)
				{
					Throw new Exception(mysqli_connect_errno());
				}
					else
					{					
						
						
					$gname=$_POST['groupName'];
					$mySql=("SELECT tgroup.id, tgroup.user, tgroup.gname, tgroup.date, tgroup.text, imggroup.id, imggroup.user, imggroup.gname, imggroup.date, imggroup.imgname, imggroup.imgfile, mp3group.id, mp3group.user, mp3group.gname, mp3group.date, mp3group.mp3name, mp3group.mp3file, videogroup.id, videogroup.user, videogroup.gname, videogroup.date, videogroup.videoname, videogroup.videofile FROM tgroup, imggroup, mp3group, videogroup WHERE 
					tgroup.id=imggroup.id AND tgroup.user=imggroup.user AND tgroup.gname=imggroup.gname AND tgroup.date=imggroup.date AND tgroup.id=mp3group.id AND tgroup.user=mp3group.user AND tgroup.gname=mp3group.gname AND tgroup.date=mp3group.date AND tgroup.id=videogroup.id AND tgroup.user=videogroup.user AND tgroup.gname=videogroup.gname AND tgroup.date=videogroup.date AND imggroup.id=mp3group.id AND imggroup.user=mp3group.user AND imggroup.gname=mp3group.gname AND imggroup.date=mp3group.date AND mp3group.id=videogroup.id AND mp3group.user=videogroup.user AND mp3group.gname=videogroup.gname AND mp3group.date=videogroup.date AND tgroup.gname='$gname' ORDER BY tgroup.date DESC");
					$polaczMySql= $connect -> query($mySql);
									
									while($row=$polaczMySql -> fetch_assoc())
									{
										
							echo			"<div class='groupFace'>";
							echo				"<div class='top-bar'>";
							echo					"<div class='gDate'>".$row['date'];
							echo					"</div>";
							echo					"<div class='gName'><form method='get' action='newUser.php'><input type='hidden' name='user' value='".$_SESSION['user']."' /><input type='hidden' name='profilowy' value='".$row['user']."' /><input type='submit' name='profileUserSubmit' value='".$row['user']."' /></form>";

							echo					"</div>";
							echo					"<div class='gMusic'>";
														if($row['mp3file']==true)
														{
							echo					"<audio controls><source src='".$row['mp3file']."' type='audio/mpeg'>
														<source src='".$row['mp3file']."' type='audio/ogg'></audio>";						
														}
							echo					"</div>";
							echo				"</div>";
							echo			"<div class='bottom-bar'>";
							echo					"<div class='gText'>".$row['text'];
							echo				"</div>";
							echo					"<div class='gImage'>";
														if($row['imgfile']==true)
														{
							echo					"<img src='{$row['imgfile']}' width='200' height='300'>";	
														
														}
														
							echo					"</div>";
							echo					"<div class='gVideo'>";
														if($row['videofile']==true)
														{
							echo					$row['videoname']."<br />";
							echo					"<video width='400' height='300' controls><source src='{$row['videofile']}' type='video/webm' >
														<source src='{$row['videofile']}' type='video/mp4'></video>";
														}
							echo					"</div>";
							echo				"</div>";
							echo			"</div>";
							echo	"<div class='contentSpace'>";
							echo	"</div>";

									}		
					}
	
				}
				Catch (Exception $e)
				{
					echo "<span style='color: red;'>Błąd połączenia witryny z serwerem, Pozdrawiam</span>";
				}			
					

					?>