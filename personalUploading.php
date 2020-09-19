					<?php


					if($_FILES['personalPicture']["size"] != 0)
						{
							$user=$_POST['user'];
							$fileName_Picture=basename($_FILES['personalPicture']["name"]);
							$fileTmpName_Picture=$_FILES['personalPicture']['tmp_name'];
							$fileExt_Picture= explode('.', $fileName_Picture);
							$fileActualExt_Picture = strtolower(end($fileExt_Picture));
							
							$fileNameNew_Picture = uniqid('', true).".".$fileActualExt_Picture;
							$target_direction_Picture = 'personal/picture/'.$fileNameNew_Picture;

							$uploadOk_Picture=1;
							$imageFileType_Picture=strtolower(pathinfo($target_direction_Picture,PATHINFO_EXTENSION));

								$check_Picture= getimagesize($_FILES['personalPicture']["tmp_name"]);
								if($check_Picture !== false)
								{
									echo	"File is an image".$check_Picture['mime'].".";
									
								}
									else
									{
										echo	"Uploading file is not an image";
										
									}
									
								if(file_exists($target_direction_Picture))
								{
									echo	"Uploading file already exists in database";
									
								}
								
								if($_FILES['personalPicture']["size"] > 500000)
								{
									echo	"Uploading file is very big";
								}
								

										
										if($uploadOk_Picture==0)
										{
											echo	"Your file has not been uploaded";
										}
											else
						{
							if(move_uploaded_file($fileTmpName_Picture, $target_direction_Picture))
							{
								echo	"Your file :".basename($_FILES['personalPicture']["name"]). "has been uploaded correctly";
																
									$sprawdzsql=("SELECT * FROM pricture WHERE user='$user'");
									$sprawdz=$gconn->query($sprawdzsql);
										$policz=$sprawdz -> num_rows;
										
										if($policz>0)
										{
												$sql_Picture=("UPDATE picture SET date='$date', pictureName='$fileName_Picture', pictureFile='$target_direction_Picture' WHERE user='$user'");
												$polacz_Picture=$gconn->query($sql_Picture);			
										}
													else	
													{
														$sql_Picture=("INSERT INTO picture (user, date, pictureName, pictureFile) VALUES ('$user', '$date', '$fileName_Picture', '$target_direction_Picture')");
														$polacz_Picture=$gconn->query($sql_Picture);	
													}
							}
								else
								{
									echo	"There was an error to upload file correctly";
								}
						}
						}