
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
						$myText=$_POST['myText'];
						
						echo $myText;
						
						
						if($_FILES['inpFile']["size"] != 0)
						{
							
							$fileName_Img=basename($_FILES['inpFile']["name"]);
							$fileTmpName_Img=$_FILES['inpFile']['tmp_name'];
							$fileExt_Img= explode('.', $fileName_Img);
							$fileActualExt_Img = strtolower(end($fileExt_Img));
							
							$fileNameNew_Img = uniqid('', true).".".$fileActualExt_Img;
							$target_direction_Img = 'photo/'.$fileNameNew_Img;

							$uploadOk_Img=1;
							$imageFileType_Img=strtolower(pathinfo($target_direction_Img,PATHINFO_EXTENSION));

								$check_Img= getimagesize($_FILES['inpFile']["tmp_name"]);
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
								
								if($_FILES['inpFile']["size"] > 500000)
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
													echo	"<div class='fileError'>Your file :".basename($_FILES['inpFile']["name"]). "has been uploaded correctly</div>";

												}

											}

						}
						}
					}
		Catch (Exception $e)
		{
			echo "<span style='color: red;'>Błąd połączenia witryny z serwerem, Pozdrawiam</span>";
		}			
			

		?>