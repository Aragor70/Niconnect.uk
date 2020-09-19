
<?php

	function setComments($conn)
	{
		if(isset($_POST['posterSubmit']))
		{

			$uid = $_POST['uid'];
			$date = $_POST['date'];
	
					$poster = filter_var($_POST['poster'], FILTER_SANITIZE_STRING);
					
					$sql = "INSERT INTO poster (uid, date, poster) VALUES ('$uid', '$date', '$poster')";
					$polacz = $conn->query($sql);



						if($_FILES['add-file1-img']["size"] != 0)
						{
							$target_direction_Img="poster/img/";
							$target_file_Img=$target_direction_Img. basename($_FILES['add-file1-img']["name"]);
							$fileName_Img=basename($_FILES['add-file1-img']["name"]);

							$uploadOk_Img=1;
							$imageFileType_Img=strtolower(pathinfo($target_file_Img,PATHINFO_EXTENSION));

								$check_Img= getimagesize($_FILES['add-file1-img']["tmp_name"]);
								if($check_Img !== false)
								{
									echo	"File is an image".$check_Img['mime'].".";
									
								}
									else
									{
										echo	"Uploading file is not an image";
										
									}
									
								if(file_exists($target_file_Img))
								{
									echo	"Uploading file already exists in database";
									
								}
								
								if($_FILES['add-file1-img']["size"] > 500000)
								{
									echo	"Uploading file is very big";
								}
								

										
										if($uploadOk_Img==0)
										{
											echo	"Your file has not been uploaded";
										}
											else
											{
												if(move_uploaded_file($_FILES['add-file1-img']["tmp_name"], $target_file_Img))
												{
													echo	"Your file :".basename($_FILES['add-file1-img']["name"]). "has been uploaded correctly";
																$fileName_Img=preg_replace("!-!"," ", $fileName_Img);
																$fileName_Img=ucwords($fileName_Img);
																
																$sql_Img=("INSERT INTO imgposter (uid, date, imgname, imgfile) VALUES ('$uid', '$date', '$fileName_Img', '$target_file_Img')");
																$polacz_Img=$conn->query($sql_Img);													
												}
													else	
													{
														echo	"There was an error to upload file correctly";
													}
											}
						}	else
						{
							$sql_Img=("INSERT INTO imgposter (uid, date) VALUES ('$uid', '$date')");
							$polacz_Img=$conn->query($sql_Img);	
							
						}


				if($_FILES['add-file2-mp3']["size"] != 0)
				{
							$target_directionMp3="poster/mp3/";
							$target_fileMp3=$target_directionMp3. basename($_FILES['add-file2-mp3']["name"]);
							$fileNameMp3=basename($_FILES['add-file2-mp3']["name"]);

							$uploadOkMp3=1;
							$imageFileTypeMp3=strtolower(pathinfo($target_fileMp3,PATHINFO_EXTENSION));

								$checkMp3= getimagesize($_FILES['add-file2-mp3']["tmp_name"]);
								if($checkMp3 !== false)
								{
									echo	"File is an image".$checkMp3['mime'].".";
									$uploadOkMp3=1;
								}
									else
									{
										echo	"Uploading file is not an image";
									}
									
								if(file_exists($target_fileMp3))
								{
									echo	"Uploading file already exists in database";
								}
								
								if($_FILES['add-file2-mp3']["size"] > 500000)
								{
									echo	"Uploading file is very big";
								}
								

										
										if($uploadOkMp3==0)
										{
											echo	"Your file has not been uploaded";
										}
											else
											{
												if(move_uploaded_file($_FILES['add-file2-mp3']["tmp_name"], $target_fileMp3))
												{
													echo	"Your file :".basename($_FILES['add-file2-mp3']["name"]). "has been uploaded correctly";
																$fileNameMp3=preg_replace("!-!"," ", $fileNameMp3);
																$fileNameMp3=ucwords($fileNameMp3);
																
																$sqlMp3=("INSERT INTO mp3poster (uid, date, mp3name, mp3file) VALUES ('$uid', '$date', '$fileNameMp3', '$target_fileMp3')");
																$polaczMp3=$conn->query($sqlMp3);													
												}
													else	
													{
														echo	"There was an error to upload file correctly";
													}
											}					
				}	else
				{
					$sqlMp3=("INSERT INTO mp3poster (uid, date) VALUES ('$uid', '$date')");
					$polaczMp3=$conn->query($sqlMp3);		
				}
				

						if($_FILES['add-file3-video']["size"] != 0)
						{
							$fileNameVideo=basename($_FILES['add-file3-video']["name"]);
							$fileTmpNameVideo=$_FILES['add-file3-video']['tmp_name'];
							$fileExtVideo= explode('.', $fileNameVideo);
							$fileActualExtVideo = strtolower(end($fileExtVideo));
							
							$fileNameNewVideo = uniqid('', true).".".$fileActualExtVideo;
							$target_directionVideo = 'poster/video/'.$fileNameNewVideo;

							$uploadOkVideo=1;
							$imageFileTypeVideo=strtolower(pathinfo($target_directionVideo,PATHINFO_EXTENSION));

								$checkVideo= getimagesize($_FILES['add-file3-video']["tmp_name"]);
								if($checkVideo !== false)
								{
									echo	"File is an image".$checkVideo['mime'].".";
									
								}
									else
									{
										echo	"Uploading file is not an image";
									}
									
								if(file_exists($target_directionVideo))
								{
									echo	"Uploading file already exists in database";
									
								}
								
								if($_FILES['add-file3-video']["size"] > 500000)
								{
									echo	"Uploading file is very big";
								}
								

										
										if($uploadOkVideo==0)
										{
											echo	"Your file has not been uploaded";
										}
											else
											{
												if(move_uploaded_file($fileTmpNameVideo, $target_directionVideo))
												{
													echo	"Your file :".basename($_FILES['add-file3-video']["name"]). "has been uploaded correctly";
																
																
																$sqlVideo=("INSERT INTO videoposter (uid, date, videoname, videofile) VALUES ('$uid', '$date', '$fileNameVideo', '$target_directionVideo')");
																$polaczVideo=$conn->query($sqlVideo);													
												}
													else	
													{
														echo	"There was an error to upload file correctly";
														$sqlVideo=("INSERT INTO videoposter (uid, date) VALUES ('$uid', '$date')");
														$polaczVideo=$conn->query($sqlVideo);		
													}
											}
						}	else
						{
							$sqlVideo=("INSERT INTO videoposter (uid, date) VALUES ('$uid', '$date')");
							$polaczVideo=$conn->query($sqlVideo);								
						}

						$conn ->close();
		}
	}
	// exists only for edu.php, changed to ajax
	function getComments($conn)
	{

		$mysql=("SELECT poster.uid, poster.date, poster.poster, imgposter.imgname, imgposter.imgfile, mp3poster.mp3name, mp3poster.mp3file, videoposter.videoname, videoposter.videofile FROM poster, imgposter, mp3poster, videoposter WHERE poster.id = imgposter.id AND poster.uid = imgposter.uid AND poster.date = imgposter.date AND poster.id=mp3poster.id AND poster.uid=mp3poster.uid AND poster.date=mp3poster.date AND imgposter.id=mp3poster.id AND imgposter.uid=mp3poster.uid AND imgposter.date=mp3poster.date AND poster.id=videoposter.id AND poster.uid=videoposter.uid AND poster.date=videoposter.date AND imgposter.id=videoposter.id AND imgposter.uid=videoposter.uid AND imgposter.date=videoposter.date AND mp3poster.id=videoposter.id AND mp3poster.uid=videoposter.uid AND mp3poster.date=videoposter.date ORDER BY poster.date DESC");
		$polaczMySql= $conn -> query($mysql);
		
		while($row=$polaczMySql -> fetch_assoc())
		{

echo		"<p>";
echo			"<div class='posterFace'>";
echo				"<div class='top-bar'>";
echo					"<div class='pDate'>".$row['date'];
echo					"</div>";
echo					"<div class='pName'><form method='get' action='newUser.php'><input type='hidden' name='user' value='".$_SESSION['user']."' /><input type='hidden' name='profilowy' value='".$row['uid']."' /><input type='submit' name='profileUserSubmit' value='".$row['uid']."' /></form>";
echo					"</div>";
echo					"<div class='pMusic'>";
							if($row['mp3file']==true)
							{
echo					"<audio controls><source src='".$row['mp3file']."' type='audio/mpeg'>
							<source src='".$row['mp3file']."' type='audio/ogg'></audio>";						
							}
echo					"</div>";
echo				"</div>";
echo			"<div class='bottom-bar'>";
echo					"<div class='pText'>".$row['poster'];
echo				"</div>";
echo					"<div class='pImage'>";
							if($row['imgfile']==true)
							{
echo					"<img src='{$row['imgfile']}' width='200' height='250'>";	
							
							}
							
echo					"</div>";
echo					"<div class='pVideo'>";
							if($row['videofile']==true)
							{
echo					$row['videoname']."<br />";
echo					"<video width='400' height='300' controls><source src='{$row['videofile']}' type='video/webm' >
							<source src='{$row['videofile']}' type='video/mp4'></video>";
							}
echo					"</div>";
echo				"</div>";
echo			"</div>";
echo		"</p>";
echo	"<div class='space'>";
echo	"</div>";

		}
		$conn ->close();
	}
	
	
	function setFile($conn)
	{
	if(isset($_POST['fileSubmit']))
	{
$uid=$_POST['uid'];
		
if($_FILES['file']["size"] != 0)
				{
							$uid=$_POST['uid'];

							$fileName=basename($_FILES['file']["name"]);
							$fileTmpName=$_FILES['file']['tmp_name'];
							$fileExt= explode('.', $fileName);
							$fileActualExt = strtolower(end($fileExt));
							
							$fileNameNew = uniqid('', true).".".$fileActualExt;
							$target_direction = 'files/'.$fileNameNew;
							
							$uploadOk=1;
							$imageFileType=strtolower(pathinfo($target_direction,PATHINFO_EXTENSION));

								$check= getimagesize($_FILES['file']["tmp_name"]);
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
								
								if($_FILES['file']["size"] > 500000)
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

													echo	"Your file :".basename($_FILES['file']["name"]). "has been uploaded correctly";

																
																$sql=("INSERT INTO files (uid, name, file) VALUES ('$uid', '$fileName', '$target_direction')");
																$polacz=$conn->query($sql);													
												}
													else	
													{
														echo	"There was an error to upload file correctly";
													}
											}					
				}	else
				{
					$sql=("INSERT INTO files (uid) VALUES ('$uid')");
					$polacz=$conn->query($sql);		
				}

	}		
		
		
		
	}

	
	
	
	
	
	
	
	
?>
	
	
	
	
	
	
	
	
	
	