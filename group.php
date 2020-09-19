<?php
		
	function setGroup($gconn)
	{
		if(isset($_POST['groupSubmit']))
		{
			$ok = true;
			$uid=$_POST['uid'];
			$date=$_POST['date'];
			$gname=$_POST['gname'];
			
			// remember the post
			$_SESSION['fr_gname']=$gname;
			
			// poprawność nazwy
			if((strlen($gname)<4) || (strlen($gname)>22))
			{
				$ok = false;
				$_SESSION['e_gname']="Group's name can be created by 4-22 signs";
			}
				if (ctype_alnum ($gname)==false)
				{
					$ok=false;
					$_SESSION['e_gname']="Use only letters and numbers";
				}
			
			// istnienie nazwy w bazie
							
				$sql= ("SELECT gname FROM users WHERE gname='$gname'");
				$polacz=$gconn->query($sql);
				$ile_takich_grup=$polacz->num_rows;
							
					if($ile_takich_grup>0)
					{
							$ok=false;
							$_SESSION['e_gname']="This group's name has been created already";
					}
			// wszystko ok
			if($ok==true)
			{
				$sql=("INSERT INTO users (uid, date, gname) VALUES ('$uid', '$date', '$gname')");
				$polacz=	$gconn -> query ($sql);
			}
		}
	}
	function ulistPersonal($gconn)
	{
			$uid = $_GET['profilowy'];
			$user = $_GET['profilowy'];
			$sql=("SELECT gname FROM users WHERE (user = '$user') OR (uid='$uid')");
			$polacz = $gconn ->query ($sql);
			
			$count=$polacz->num_rows;
			if($count>0)
			{
				while($row =$polacz -> fetch_assoc())
				{
					$gname=$row['gname'];
					echo	"<div class='olistaPersonal'>";
					echo	"<form method='get' action='grupa.php'>
								<input type='hidden' name='uid' value='$uid'>
								<input type='hidden' name='user' value='$user'>
								<input type='submit' name='gname' value='$gname'>
								</form>";
								//ilu userow, ile postów
						$num=("SELECT user FROM users WHERE (gname='$gname')");
						$polacz2=$gconn -> query($num);
						$policz=$polacz2 -> num_rows;
						echo	"Users: ".$policz.", ";
						$num2=("SELECT text FROM tgroup WHERE (gname='$gname')");
						$polacz3=$gconn -> query($num2);
							
						$policz2=$polacz3 -> num_rows;
						echo	$policz2." post's";						
					echo	"</div>";				
				}
			}
				else
				{
					echo "No groups on the list.";
				}
						
	}
	function ulistPrivPersonal($gconn)
	{
			$uid = $_SESSION['user'];
			$user = $_SESSION['user'];
			$sql=("SELECT gname FROM users WHERE (user = '$user') OR (uid='$uid')");
			$polacz = $gconn ->query ($sql);
			
			$count=$polacz->num_rows;
			if($count>0)
			{
				while($row =$polacz -> fetch_assoc())
				{
					$gname=$row['gname'];
					echo	"<div class='olistaPersonal'>";
					echo	"<form method='get' action='grupa.php'>
								<input type='hidden' name='uid' value='$uid'>
								<input type='hidden' name='user' value='$user'>
								<input type='submit' name='gname' value='$gname'>
								</form>";
								//ilu userow, ile postów
						$num=("SELECT user FROM users WHERE (gname='$gname')");
						$polacz2=$gconn -> query($num);
						$policz=$polacz2 -> num_rows;
						echo	"Users: ".$policz.", ";
						$num2=("SELECT text FROM tgroup WHERE (gname='$gname')");
						$polacz3=$gconn -> query($num2);
							
						$policz2=$polacz3 -> num_rows;
						echo	$policz2." post's";						
					echo	"</div>";				
				}
			}
				else
				{
					echo "No groups on the list.";
				}
						
	}
	function ulistGroups($gconn)
	{
			$uname = $_SESSION['user'];
			$user = $_SESSION['user'];
			$sql=("SELECT gname FROM users WHERE (user = '$uname') OR (uid='$uname')");
			$polacz = $gconn ->query ($sql);
				while($row =$polacz -> fetch_assoc())
				{
					$gname=$row['gname'];
					echo	"<div class='olistaGroup'>";
					echo	"<form method='get' action='groupMain.php'>
								<input type='hidden' name='uid' value='$uname'>
								<input type='hidden' name='user' value='$uname'>
								<input type='submit' name='gname' value='$gname'>
								</form>";
								//ilu userow, ile postów
						$num=("SELECT user FROM users WHERE (gname='$gname')");
						$polacz2=$gconn -> query($num);
						$policz=$polacz2 -> num_rows;
						echo	"Users: ".$policz.", ";
						$num2=("SELECT text FROM tgroup WHERE (gname='$gname')");
						$polacz3=$gconn -> query($num2);
							
						$policz2=$polacz3 -> num_rows;
						echo	$policz2." post's";
						$bsql=("SELECT * FROM photo WHERE gname='$gname'");
						$polaczBackground = $gconn ->query ($bsql);
						$check = $polaczBackground -> num_rows;
									echo	"<div class='listaBackgroud'>";
												if($check ==0)
											{
												echo "<img class='listBackgroud' src='photo/none.jpg'>";
											}								
												else
									while($tlo=$polaczBackground->fetch_assoc())
									{
										if($check >0)
										{
												echo	"<img class='listBackgroud' src='{$tlo['file']}'>";
										}					
									}
								echo	"</div>";		
				
					echo	"</div>";

				}
				
	}
	function adminGroups($gconn)
	{
			$uname = $_SESSION['user'];
			$user = $_SESSION['user'];
			$sql=("SELECT gname FROM users WHERE uid = '$uname'");
			$polacz = $gconn ->query ($sql);
				while($row =$polacz -> fetch_assoc())
				{
					$gname=$row['gname'];
					echo	"<div class='olistaGroup'>";
					echo	"<form method='get' action='groupMain.php'>
								<input type='hidden' name='uid' value='$uname'>
								<input type='hidden' name='user' value='$uname'>
								<input type='submit' name='gname' value='$gname'>
								</form>";

					echo	"<form method='get' action='gsettings.php'>
								<input type='hidden' name='uid' value='$uname'>
								<input type='hidden' name='gname' value='$gname'>
								<input type='submit' name='adminSubmit' value='Settings'>
								</form>";
						$bsql=("SELECT * FROM photo WHERE gname='$gname'");
						$polaczBackground = $gconn ->query ($bsql);
						$check = $polaczBackground -> num_rows;
									echo	"<div class='listaBackgroud'>";
												if($check ==0)
											{
												echo "<img class='listBackgroud' src='photo/none.jpg' >";
											}								
												else
									while($tlo=$polaczBackground->fetch_assoc())
									{
										if($check >0)
										{
												echo	"<img class='listBackgroud' src='{$tlo['file']}' >";
										}					
									}
								echo	"<hr />";									
								echo	"</div>";									
								
					echo	"</div>";
				}
				
				
	}
	function tgetGroups($gconn)
	{
		if(isset($_GET['gname']))
		{
				$uid = $_GET['uid'];
				$gname= $_GET['gname'];
				$sql=("SELECT text, user, tdate FROM gtext WHERE gname = '$gname' ORDER BY tdate DESC");
				$polacz = $gconn -> query($sql);
				
				while ($row = $polacz -> fetch_assoc())
				{
					echo "<div class='add-user-date'>";
					echo "<div class='add-user'>";
				echo $row['user'];
					echo "</div>";
					echo "<div class='add-date'>";
					if($row['tdate']>0)
					{
						echo $row['tdate']."<br />";
					}
					echo "</div>";
					echo "</div>";
					echo "<div class='add-text'>";
				echo $row['text']."<br />";
					echo "</div>";
				}
		}

	}
	function tsetGroups($gconn)
	{
		if(isset($_POST['tgroupSubmit']))
		{
			$user=$_POST['upost'];
			$gname=$_POST['gname'];
			$tdate=$_POST['tdate'];
			$tgroup= filter_var($_POST['tgroup'], FILTER_SANITIZE_STRING);

			$sql = ("INSERT INTO gtext (user, gname, tdate, text) VALUES ('$user', '$gname', '$tdate', '$tgroup')");
			$polacz = $gconn ->query ($sql);

			
		}
	}

	function joinGroup($gconn)
	{
		if(isset($_POST['joinSubmit']))
		{
			$user=$_POST['user'];
			$gname=$_POST['gname'];
			$uid=$_POST['user'];
			$join=true;
			
				$sql= ("SELECT gname, user FROM users WHERE (gname='$gname') AND ((user='$user') OR (uid='$uid'))");
				$polacz=$gconn->query($sql);
				$ile_takich_grup=$polacz->num_rows;
							
					if($ile_takich_grup>0)
					{
							$join=false;
					}
					$sql2=("SELECT uid FROM users WHERE (gname='$gname') AND (uid='$uid')");
					$polacz2=$gconn->query($sql2);
					$ile_takich_userow=$polacz->num_rows;
					if($ile_takich_userow != 0)
					{
						$join = false;
					}

					if($join == true)
					{
						$sql3 = ("INSERT INTO users (user, gname) VALUES ('$user', '$gname')");
						$polacz3 = $gconn ->query ($sql3);
						$_SESSION['dolaczony'] = true;
					}
		}
	}
	function listaGroups($gconn)
	{
			$uname = $_SESSION['user'];
			$user=$_GET['user'];
			$uid=$_GET['uid'];
			$sql=("SELECT gname, user, uid FROM users");
			$polacz = $gconn ->query ($sql);
				while($row =$polacz -> fetch_assoc())
				{
					$gname=$row['gname'];
					$uid=$_GET['uid'];
					$user=$_GET['user'];
						$checking = ("SELECT uid FROM users WHERE (gname='$gname') AND (uid='$uid')");
						$polacz_checking = $gconn ->query($checking);
						$ilu_takich_uid = $polacz_checking -> num_rows;
						
						$checking2 = ("SELECT user FROM users WHERE (gname='$gname') AND (user='$user')");
						$polacz_checking2 = $gconn ->query($checking2);
						$ilu_takich_user = $polacz_checking2 -> num_rows;
									if(($ilu_takich_uid == 0) && ($ilu_takich_user == 0) && (strlen($row['uid'])>2))
									{
										echo	"<div class='olistaGroup'>";
											
											$uname=$_SESSION['user'];
											$sql = "SELECT * FROM users WHERE (gname='$gname') AND (uid='$uname' OR user='$uname')";
											$polacz = $gconn -> query($sql);
											$count = $polacz -> num_rows;
																	if($count === 0)
																		{
																			echo	"<form method='get' action='gnl.php'>
																							<input type='hidden' name='uid' value='$uid'>
																							<input type='hidden' name='user' value='$user'>
																							<input type='submit' name='gname' value='$gname'>
																							</form>";
																		}
																			else
																			{
																				echo	"<form method='get' action='groupMain.php'>
																							<input type='hidden' name='uid' value='$uid'>
																							<input type='hidden' name='user' value='$user'>
																							<input type='submit' name='gname' value='$gname'>
																							</form>";
																			}
												
												

														echo	"<form method='post' action='".joinGroup($gconn)."'>
																	<input type='hidden' name='user' value='$user'>
																	<input type='hidden' name='gname' value='$gname'>
																	<input type='submit' name='joinSubmit' value='Join Here'>
																	</form>";										
										

													
										$bsql=("SELECT * FROM photo WHERE gname='$gname'");
										$polaczBackground = $gconn ->query ($bsql);
										$check = $polaczBackground -> num_rows;
													echo	"<div class='listaBackgroud'>";
																if($check ==0)
															{
																echo "<img class='listBackgroud' src='photo/none.jpg' >";
															}								
																else
													while($tlo=$polaczBackground->fetch_assoc())
													{
														if($check >0)
														{
																echo	"<img class='listBackgroud' src='{$tlo['file']}' >";
														}					
													}
												echo	"<hr />";
												echo	"</div>";	

										echo	"</div>";
										echo	"<br />";
									}
				}
		
	
	}
	function guserList($gconn)
	{
		$gname= $_GET['gname'];
		
		$sql = ("SELECT user, gname FROM users WHERE gname='$gname'");
		$polacz= $gconn -> query($sql);
				
				while($row = $polacz -> fetch_assoc())
				{
					if(strlen($row['user'])>0)
					{
						echo	"<div class='guser'>";
						echo	$checked=$row['user'];
						echo	", "; 
								
								//liczba postów użytkownika
						$num=("SELECT gname, text, user FROM gtext WHERE (gname='$gname') AND (user ='$checked')");
						$polacz2=$gconn -> query($num);
						if($polacz2>0){
							$policz=$polacz2 -> num_rows;
							echo	$policz;
						}
							else
							{
								echo "0";
							}
						
						echo	"</div>";

						
								echo	"<br />";
					}
				}

	}
	function setGroupbg($gconn)
	{
		if(isset($_POST['groupbgSubmit']))
		{
			$gname=$_POST['gname'];
			$uid=$_POST['uid'];
			$file=$_FILES['file'];
			$fileName=$_FILES['file']['name'];
			$fileTmpName=$_FILES['file']['tmp_name'];
			$fileSize=$_FILES['file']['size'];
			$fileError=$_FILES['file']['error'];
			$fileType=$_FILES['file']['type'];
			
				$fileExt= explode('.', $fileName);
				$fileActualExt = strtolower(end($fileExt));
				$allowed= array('jpg', 'jpeg', 'png', 'pdf');
					
					if(in_array($fileActualExt, $allowed))
					{
						if($fileError === 0)
						{
							if($fileSize < 500000)
							{
								$fileNameNew = uniqid('', true).".".$fileActualExt;
								$fileDestination = 'uploads/'.$fileNameNew;
								move_uploaded_file($fileTmpName, $fileDestination);
								$sql=("INSERT INTO bgimage (gname, uid, bgname, bgfile) VALUES ('$gname', '$uid', '$fileName', '$fileTmpName')");
								$polacz=$gconn->query($sql);

							}
								else
								{
									echo	"Your file is too big [Max=500mb]";
								}
						}
							else
							{
								echo	"There was an error uploading your file";
							}
					}
						else
						{
							echo	"You cannot upload files of this type";
						}
			
			
		}
	}
	function getImage($gconn)
	{

					$uname=$_GET['uid'];
					$gname=$_GET['gname'];
					
						$sql=("SELECT bgname FROM bgimage WHERE (uid='$uname') AND (gname='$gname')");
						$polacz=$gconn->query($sql);
						while ($row=$polacz->fetch_assoc())
						{
							echo	"<img src='uploads/'.'".$row['bgname']."'>";
						}

	}
	function video($gconn)
	{
			if(isset($_POST['videoSubmit']))
			{			
			$target_direction = "uploads/";
			$target_file = $target_direction . basename($_FILES['videofile']["name"]);
			
				$uploadOk = 1;
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			

				$check=getimagesize($_FILES['videofile']["tmp_name"]);
				if ($check !== false)
				{
					echo	"File is an image".$check['mime'].".";
					$uploadOk = 1;
				}
					else
					{
						echo	"File is not an image";
						$uploadOk = 0;
					}
					
					if(file_exists($target_file))
					{
						echo	"File is already exists in database";
						$uploadOk = 0;
					}

					if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType != 'gif')
					{
						"Accept only JPG, JPEG, PNG and GIF type";
						$uploadOk = 0;
					}
					
				if ($uploadOk == 0)
				{
					echo	"Your file was not uploaded";
				}
					else
					{
						//upload correct file
						if (move_uploaded_file($_FILES['videofile']["tmp_name"],$target_file))
						{
							echo	"File: ". basename($_FILES['videofile']["name"])."has been uploaded correctly";
							
						}
							else
							{
								echo	"There was an error to upload ".basename($_FILES['videofile']["name"]);
							}
						
					}
				
				
			}
	}
	// off działa ale tylko ze zdjeciem
	function music($gconn)
	{
		if(isset($_POST['musicSubmit']))
		{
			$target_direction="music/";
			$target_file=$target_direction . basename($_FILES['musicfile']["name"]);
			
			$uploadOk=1;
			$imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			
				$check= getimagesize($_FILES['musicfile']["tmp_name"]);
				if($check !== false)
				{
					echo	"File is an image".$check['mime'].".";
					$uploadOk=1;
				}
					else
					{
						echo	"Uploading file is not an image";
						$uploadOk=0;
					}
					
				if(file_exists($target_file))
				{
					echo	"Uploading file already exists in database";
					$uploadOk=0;
				}
				
				if($_FILES['musicfile']["size"] > 500000)
				{
					echo	"Uploading file is too big";
				}
				

						
						if($uploadOk==0)
						{
							echo	"Your file has not been uploaded";
						}
							else
							{
								if(move_uploaded_file($_FILES['musicfile']["tmp_name"], $target_file))
								{
									echo	"<div class='fileError'>Your file :".basename($_FILES['musicfile']["name"]). "has been uploaded correctly</div>";
								}
									else	
									{
										echo	"There was an error to upload file correctly";
									}
							}
				
		}
	}
	// off
	function gmusic($gconn)
	{
		if(isset($_POST['mSubmit']))
		{
			$newFileName=$_POST['filename'];
			if($_POST['filename'])
			{
				$newFileName = "music";
			}
				else
				{
					$newFileName= strtolower(str_replace(" ", "-", $newFileName));
				}
			$user=$_POST['user'];				
			$gname=$_POST['gname'];
			
				$file= $_FILES['musicfile'];
				print_r($file);
		}
	}
	function gmuzyka()
	{
		if(isset($_POST['musicSubmit']) && ($_POST['musicSubmit']=="Insert"))
		{
			$uploaddir='auploads/';
			$audio_path=$uploaddir. basename($_FILES["musicfile"]["name"]);
			
				if(move_uploaded_file($_FILES['musicfile']['tmp_name'], $audio_path))
				{
					echo	"Uploaded succesfully";
				}
		}		
	}

	function setAudio($gconn)
	{
			if(isset($_POST['musicSubmit']))
			{			
			$target_direction = "uploads/";
			$target_file = $target_direction. basename($_FILES['musicfile']["name"]);
			
				$uploadOk = 1;
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			
					
					if(file_exists($target_file))
					{
						echo	"File is already exists in database";
						$uploadOk = 0;
					}

					if ($imageFileType != 'mp3')
					{
					echo	"Accept only mp3 type";
						$uploadOk = 0;
					}
					
				if($_FILES['musicfile']["size"] > 5000000000)
				{
					echo	$_FILES['musicfile']["size"];
					echo	"Uploading file is too big";
				}
					
				if ($uploadOk == 0)
				{
					echo	"Your file was not uploaded";
				}
					else
					{
						//upload correct file
						if (move_uploaded_file($_FILES['musicfile']["tmp_name"],$target_file))
						{
							echo	"File: ". basename($_FILES['musicfile']["name"])."has been uploaded correctly";
							
						}
							else
							{
								echo	"There was an error to upload ".basename($_FILES['musicfile']["name"]);
							}
						
					}
				
				
			}
	}

	function photo($gconn)
	{
		if(isset($_POST['photoSubmit']))
		{
							$gname= $_POST['gname'];
							$uid = $_POST['uid'];
							$fileName=basename($_FILES['photofile']["name"]);
							$fileTmpName=$_FILES['photofile']['tmp_name'];
							$fileExt= explode('.', $fileName);
							$fileActualExt = strtolower(end($fileExt));
							
							$fileNameNew = uniqid('', true).".".$fileActualExt;
							$target_direction = 'photo/'.$fileNameNew;

			$uploadOk=1;
			$imageFileType=strtolower(pathinfo($target_direction,PATHINFO_EXTENSION));
			
				$check= getimagesize($_FILES['photofile']["tmp_name"]);
				if($check !== false)
				{
					echo	"File is an image".$check['mime'].".";
					$uploadOk=1;
				}
					else
					{
						echo	"Uploading file is not an image";
					}
					
				if(file_exists($target_direction))
				{
					echo	"Uploading file already exists in database";
				
				}
				
				if($_FILES['photofile']["size"] > 500000)
				{
					echo	"Uploading file is very big";
				}
				

						
						if($uploadOk==0)
						{
							echo	"Your file has not been uploaded";
						}
							else
							{
								if(move_uploaded_file($fileTmpName, $target_direction))
								{
									echo	"Your file :".basename($_FILES['photofile']["name"]). "has been uploaded correctly";

								}
									else	
									{
										echo	"There was an error to upload file correctly";
										
									}
								$sprawdzsql=("SELECT * FROM photo WHERE gname='$gname'");
									$sprawdz=$gconn->query($sprawdzsql);
										$policz=$sprawdz -> num_rows;
										
										if($policz>0)
										{
											$sql=("UPDATE photo SET name='$fileName', file='$target_direction' WHERE gname='$gname'");
											$polacz=$gconn->query($sql);
										}
											else
											{
												$sql=("INSERT INTO photo (uid, gname, name, file) VALUES ('$uid', '$gname', '$fileName', '$target_direction')");
												$polacz=$gconn->query($sql);		
											}
							}
				
		}
	}
						function getBackground($gconn)
					{
						$gname=$_GET['gname'];
						$bsql=("SELECT * FROM photo WHERE gname='$gname'");
						$polaczBackground = $gconn ->query ($bsql);
						$check = $polaczBackground -> num_rows;
									echo	"<div class='listaBackgroud' style='margin-top: 5px; margin-bottom: 5px;'>";
												if($check ==0)
											{
												echo "<img src='photo/none.jpg' width='236px' height='90px'>";
											}								
												else
									while($tlo=$polaczBackground->fetch_assoc())
									{
										if($check >0)
										{
												echo	"<img src='{$tlo['file']}' width='236px' height='90px'>";
										}					
									}
								echo	"</div>";			
					}

		function setMusic($gconn)
		{
			if(isset($_POST['musicSubmit']))
			{
				$gname=$_POST['gname'];
				$user=$_POST['user'];
				$target_direction="music/";
				$target_file=$target_direction. basename($_FILES['musicFile']["name"]);
				$fileName=basename($_FILES['musicFile']["name"]);

				$uploadOk=1;
				$imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				
					$check= getimagesize($_FILES['musicFile']["tmp_name"]);
					if($check !== false)
					{
						echo	"File is an image".$check['mime'].".";
						
					}
						else
						{
							echo	"Uploading file is not an image";
							
						}
						
					if(file_exists($target_file))
					{
						echo	"Uploading file already exists in database";
						$uploadOk=0;
					}
					
					if($_FILES['musicFile']["size"] > 500000)
					{
						echo	"Uploading file is very big";
						
					}
					

							if($uploadOk==0)
							{
								echo	"Your file has not been uploaded";
							}
								else
								{
									if(move_uploaded_file($_FILES['musicFile']["tmp_name"], $target_file))
									{
										echo	"Your file :".basename($_FILES['musicFile']["name"]). "has been uploaded correctly";
													$fileName=preg_replace("!-!"," ", $fileName);
													$fileName=ucwords($fileName);
									}
										else	
										{
											echo	"There was an error to upload file correctly";
										}
										
										$sprawdzsql=("SELECT * FROM music WHERE gname='$gname'");
										$sprawdz=$gconn->query($sprawdzsql);
											$policz=$sprawdz -> num_rows;
											
											if($policz>0)
											{
												$sql=("UPDATE music SET name='$fileName', file='$target_file' WHERE gname='$gname'");
												$polacz=$gconn->query($sql);
											}
												else
												{
													$sql=("INSERT INTO music (user, gname, name, file) VALUES ('$user', '$gname', '$fileName', '$target_file')");
													$polacz=$gconn->query($sql);		
												}
								}
					
			}		
		}
		function getMusic($gconn)
		{
			$gname=$_GET['gname'];
			$user=$_GET['user'];
			$sql=("SELECT * FROM music WHERE gname='$gname'");
			$polacz=$gconn->query($sql);		
			
				while($row=$polacz->fetch_assoc())
				{
					echo	"Name: ".$row['name']."<br>";
					echo	"<audio controls ><source src='".$row['file']."' ></audio>";
				}
		}
		
		function setFilm($gconn)
		{
			if(isset($_POST['filmSubmit']))
			{
				$gname=$_POST['gname'];
				$user=$_POST['user'];
				$target_direction="film/";
				$target_file=$target_direction. basename($_FILES['filmFile']["name"]);
				$fileName=basename($_FILES['filmFile']["name"]);

				$uploadOk=1;
				$imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				
					$check= getimagesize($_FILES['filmFile']["tmp_name"]);
					if($check !== false)
					{
						echo	"File is an image".$check['mime'].".";
						
					}
						else
						{
							echo	"Uploading file is not an image";
							
						}
						
					if(file_exists($target_file))
					{
						echo	"Uploading file already exists in database";
						$uploadOk=0;
					}
					
					if($_FILES['filmFile']["size"] > 500000)
					{
						echo	"Uploading file is very big";
						
					}
					

							if($uploadOk==0)
							{
								echo	"Your file has not been uploaded";
							}
								else
								{
									if(move_uploaded_file($_FILES['filmFile']["tmp_name"], $target_file))
									{
										echo	"Your file :".basename($_FILES['filmFile']["name"]). "has been uploaded correctly";
													$fileName=preg_replace("!-!"," ", $fileName);
													$fileName=ucwords($fileName);
									}
										else	
										{
											echo	"There was an error to upload file correctly";
										}
										
										$sprawdzsql=("SELECT * FROM film WHERE gname='$gname'");
										$sprawdz=$gconn->query($sprawdzsql);
											$policz=$sprawdz -> num_rows;
											
											if($policz>0)
											{
												$sql=("UPDATE photo SET name='$fileName', file='$target_file' WHERE gname='$gname'");
												$polacz=$gconn->query($sql);
											}
												else
												{
													$sql=("INSERT INTO film (user, gname, name, file) VALUES ('$user', '$gname', '$fileName', '$target_file')");
													$polacz=$gconn->query($sql);		
												}
								}
					
			}		
		}
	
	
	function setGroupContent()
	{
	include "groupConnect.php";
	mysqli_report (MYSQLI_REPORT_STRICT);
	
	try
	{
	$gconnect=new mysqli($host, $db_user, $db_password, $db_name);
	if($gconnect->connect_errno!=0)
	{
		Throw new Exception(mysqli_connect_errno());
	}
		else
		{			

		if(isset($_POST['tgroupSubmit']))
		{

			$user = $_POST['user'];
			$date = $_POST['tdate'];
			$gname = $_POST['gname'];
	
					$tgroup = $_POST['tgroup'];
					
					$sql = "INSERT INTO tgroup (user, gname, date, text) VALUES ('$user', '$gname', '$date', '$tgroup')";
					$polacz = $gconnect->query($sql);

						
						
						if($_FILES['group-file1-img']["size"] != 0)
						{
							$fileName_Img=basename($_FILES['group-file1-img']["name"]);
							$fileTmpName_Img=$_FILES['group-file1-img']['tmp_name'];
							$fileExt_Img= explode('.', $fileName_Img);
							$fileActualExt_Img = strtolower(end($fileExt_Img));
							
							$fileNameNew_Img = uniqid('', true).".".$fileActualExt_Img;
							$target_direction_Img = 'group/img/'.$fileNameNew_Img;

							$uploadOk_Img=1;
							$imageFileType_Img=strtolower(pathinfo($target_direction_Img,PATHINFO_EXTENSION));

								$check_Img= getimagesize($_FILES['group-file1-img']["tmp_name"]);
								if($check_Img !== false)
								{
								//	echo	"File is an image".$check_Img['mime'].".";
									
								}
									else
									{
									//	echo	"Uploading file is not an image";
										
									}
									
								if(file_exists($target_direction_Img))
								{
								//	echo	"Uploading file already exists in database";
									
								}
								
								if($_FILES['group-file1-img']["size"] > 500000)
								{
								//	echo	"Size of uploading file exists in the limit";
								}
								

										
										if($uploadOk_Img==0)
										{
											echo	"<div class='fileError'>Your file has not been uploaded</div>";
										}
											else
											{
												if(move_uploaded_file($fileTmpName_Img, $target_direction_Img))
												{
													echo	"<div class='fileError'>Your file :".basename($_FILES['group-file1-img']["name"]). "has been uploaded correctly</div>";
																
																$sql_Img=("INSERT INTO imggroup (user, date, gname, imgname, imgfile) VALUES ('$user', '$date', '$gname', '$fileName_Img', '$target_direction_Img')");
																$polacz_Img=$gconnect->query($sql_Img);		
														
												}
													else	
													{
														echo	"<div class='fileError' style='color: red;'>There was an error to upload file correctly</div>";
														$sql_Img=("INSERT INTO imggroup (user, gname, date) VALUES ('$user', '$gname', '$date')");
														$polacz_Img=$gconnect->query($sql_Img);	
													}
											}
						}	else
						{
							$sql_Img=("INSERT INTO imggroup (user, gname, date) VALUES ('$user', '$gname', '$date')");
							$polacz_Img=$gconnect->query($sql_Img);	
						}


				if($_FILES['group-file2-mp3']["size"] != 0)
				{
							$fileNameMp3=basename($_FILES['group-file2-mp3']["name"]);
							$fileTmpNameMp3=$_FILES['group-file2-mp3']['tmp_name'];
							$fileExtMp3= explode('.', $fileNameMp3);
							$fileActualExtMp3 = strtolower(end($fileExtMp3));
							
							$fileNameNewMp3 = uniqid('', true).".".$fileActualExtMp3;
							$target_directionMp3 = 'group/mp3/'.$fileNameNewMp3;

							$uploadOkMp3=1;
							$imageFileTypeMp3=strtolower(pathinfo($target_directionMp3,PATHINFO_EXTENSION));

								$checkMp3= getimagesize($_FILES['group-file2-mp3']["tmp_name"]);
								if($checkMp3 !== false)
								{
								//	echo	"File is an image".$checkMp3['mime'].".";
									
								}
									else
									{
								//		echo	"Uploading file is not an image";
									}
									
								if(file_exists($target_directionMp3))
								{
								//	echo	"Uploading file already exists in database";
								}
								
								if($_FILES['group-file2-mp3']["size"] > 500000)
								{
								//	echo	"Uploading file is very big";
								}
								

										
										if($uploadOkMp3==0)
										{
											echo	"<div class='fileError'>Your file has not been uploaded</div>";
										}
											else
											{
												if(move_uploaded_file($fileTmpNameMp3, $target_directionMp3))
												{
													echo	"<div class='fileError'>Your file :".basename($_FILES['group-file2-mp3']["name"]). "has been uploaded correctly</div>";
													
																
																$sqlMp3=("INSERT INTO mp3group (user, date, gname, mp3name, mp3file) VALUES ('$user', '$date', '$gname', '$fileNameMp3', '$target_directionMp3')");
																$polaczMp3=$gconnect->query($sqlMp3);													
												}
													else	
													{
														echo	"<div class='fileError'>There was an error to upload file correctly</div>";
														$sqlMp3=("INSERT INTO mp3group (user, gname, date) VALUES ('$user', '$gname', '$date')");
														$polaczMp3=$gconnect->query($sqlMp3);
													}
											}					
				}	else
				{
					$sqlMp3=("INSERT INTO mp3group (user, gname, date) VALUES ('$user', '$gname', '$date')");
					$polaczMp3=$gconnect->query($sqlMp3);		
				}
				

						if($_FILES['group-file3-video']["size"] != 0)
						{
							$fileNameVideo=basename($_FILES['group-file3-video']["name"]);
							$fileTmpNameVideo=$_FILES['group-file3-video']['tmp_name'];
							$fileExtVideo= explode('.', $fileNameVideo);
							$fileActualExtVideo = strtolower(end($fileExtVideo));
							
							$fileNameNewVideo = uniqid('', true).".".$fileActualExtVideo;
							$target_directionVideo = 'group/video/'.$fileNameNewVideo;

							$uploadOkVideo=1;
							$imageFileTypeVideo=strtolower(pathinfo($target_directionVideo,PATHINFO_EXTENSION));

								$checkVideo= getimagesize($_FILES['group-file3-video']["tmp_name"]);
								if($checkVideo !== false)
								{
								//	echo	"File is an image".$checkVideo['mime'].".";
									
								}
									else
									{
									//	echo	"Uploading file is not an image";
									}
									
								if(file_exists($target_directionVideo))
								{
								//	echo	"Uploading file already exists in database";
									
								}
								
								if($_FILES['group-file3-video']["size"] > 500000)
								{
								//	echo	"Uploading file is very big";
								}
								

										
										if($uploadOkVideo==0)
										{
											echo	"<div class='fileError'>Your file has not been uploaded</div>";
										}
											else
											{
												if(move_uploaded_file($fileTmpNameVideo, $target_directionVideo))
												{
													echo	"<div class='fileError'>Your file :".basename($_FILES['group-file3-video']["name"]). "has been uploaded correctly</div>";

													$sqlVideo=("INSERT INTO videogroup (user, date, gname, videoname, videofile) VALUES ('$user', '$date', '$gname', '$fileNameVideo', '$target_directionVideo')");
													$polaczVideo=$gconnect->query($sqlVideo);	
													
												}
													else	
													{
														echo	"<div class='fileError'>There was an error to upload file correctly</div>";
														$sqlVideo=("INSERT INTO videogroup (user, gname, date) VALUES ('$user', '$gname', '$date')");
														$polaczVideo=$gconnect->query($sqlVideo);			
													}
											}
						}	else
						{
							$sqlVideo=("INSERT INTO videogroup (user, gname, date) VALUES ('$user', '$gname', '$date')");
							$polaczVideo=$gconnect->query($sqlVideo);								
						}
			
		}
		
	}
	}			
		Catch (Exception $e)
		{
			echo "<span style='color: red;'>Błąd połączenia witryny z serwerem, Pozdrawiam</span>";
		}		
	}
	
	
/*	function	getGroupContent($gconn)
	{
		$gname=$_GET['gname'];
		$mySql=("SELECT tgroup.id, tgroup.user, tgroup.gname, tgroup.date, tgroup.text, imggroup.id, imggroup.user, imggroup.gname, imggroup.date, imggroup.imgname, imggroup.imgfile, mp3group.id, mp3group.user, mp3group.gname, mp3group.date, mp3group.mp3name, mp3group.mp3file, videogroup.id, videogroup.user, videogroup.gname, videogroup.date, videogroup.videoname, videogroup.videofile FROM tgroup, imggroup, mp3group, videogroup WHERE 
		tgroup.id=imggroup.id AND tgroup.user=imggroup.user AND tgroup.gname=imggroup.gname AND tgroup.date=imggroup.date AND tgroup.id=mp3group.id AND tgroup.user=mp3group.user AND tgroup.gname=mp3group.gname AND tgroup.date=mp3group.date AND tgroup.id=videogroup.id AND tgroup.user=videogroup.user AND tgroup.gname=videogroup.gname AND tgroup.date=videogroup.date AND imggroup.id=mp3group.id AND imggroup.user=mp3group.user AND imggroup.gname=mp3group.gname AND imggroup.date=mp3group.date AND mp3group.id=videogroup.id AND mp3group.user=videogroup.user AND mp3group.gname=videogroup.gname AND mp3group.date=videogroup.date AND tgroup.gname='$gname' ORDER BY tgroup.date DESC");
		$polaczMySql= $gconn -> query($mySql);
		
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
	*/
	
	
	