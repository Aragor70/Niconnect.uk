

	<?php
	
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
		Catch (Exception $e)
		{
			echo "<span style='color: red;'>Błąd połączenia witryny z serwerem, Pozdrawiam</span>";
		}				