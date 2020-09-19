<?php

		function setDescription($conn)
		{
			if(isset($_POST['descSubmit']))
			{

					$uid=$_POST['uid'];
					$date=$_POST['date'];
					$description=$_POST['personalDesc'];
					
						$sql=("SELECT * FROM description WHERE uid='$uid'");
						$sprawdz=$conn -> query($sql);
						$policz=$sprawdz -> num_rows;
							if ($policz>0)
							{
								$update = ("UPDATE description SET date='$date', description='$description' WHERE uid='$uid'");
								$polacz=$conn -> query($update);
							}
							else
								{
									$sql=("INSERT INTO description (uid, date, description) VALUES ('$uid', '$date', '$description')");
									$polacz=$conn -> query($sql);
									
								}	
			}		
		}
		function getDescription($conn)
		{
			$uname=$_GET['profilowy'];
			$sql="SELECT * FROM description WHERE uid='$uname'";
			$polacz=$conn->query($sql);
			if($pokaz=$polacz->fetch_assoc())
			{
				echo	$pokaz['description'];
			}
			
		}
		function getPrivDescription($conn)
		{
			$uname=$_SESSION['user'];
			$sql="SELECT * FROM description WHERE uid='$uname'";
			$polacz=$conn->query($sql);
			if($pokaz=$polacz->fetch_assoc())
			{
				echo	$pokaz['description'];
			}
			
		}
		function setPersonalPicture($conn)
		{
			if(isset($_POST['personalPictureEditSubmit']))
			{
						if($_FILES['personalPicture']["size"] != 0)
						{
							$date=$_POST['date'];
							$uid=$_POST['uid'];
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
																
									$sprawdzsql=("SELECT * FROM picture WHERE user='$uid'");
									$sprawdz=$conn->query($sprawdzsql);
										$policz=$sprawdz -> num_rows;
										
										if($policz>0)
										{
												$sql_Picture=("UPDATE picture SET date='$date', picname='$fileName_Picture', picfile='$target_direction_Picture' WHERE user='$uid'");
												$polacz_Picture=$conn->query($sql_Picture);			
										}
													else	
													{
														$sql_Picture=("INSERT INTO picture (user, date, picname, picfile) VALUES ('$uid', '$date', '$fileName_Picture', '$target_direction_Picture')");
														$polacz_Picture=$conn->query($sql_Picture);	
													}
							}
								else
								{
									echo	"There was an error to upload file correctly";
								}
						}
						}
			}
		}
		function getPersonalPicture($conn)
		{
						$user=$_GET['profilowy'];
						
						$sql=("SELECT * FROM picture WHERE user='$user'");
						$polacz = $conn ->query ($sql);
						$check = $polacz -> num_rows;
									
												if($check ==0)
											{
												echo "<img src='photo/none.jpg' width='510px' height='220px'>";
											}								
												else
									while($picture=$polacz->fetch_assoc())
									{
										if($check >0)
										{
												echo	"<img src='{$picture['picfile']}' width='510px' height='220px'>";
										}					
									}		
			
			
		}
		function getPersonalPrivPicture($conn)
		{
						$user=$_SESSION['user'];
						
						$sql=("SELECT * FROM picture WHERE user='$user'");
						$polacz = $conn ->query ($sql);
						$check = $polacz -> num_rows;
									
												if($check ==0)
											{
												echo "<img src='photo/none.jpg' width='510px' height='220px'>";
											}								
												else
									while($picture=$polacz->fetch_assoc())
									{
										if($check >0)
										{
												echo	"<img src='{$picture['picfile']}' width='510px' height='220px'>";
										}					
									}		
			
			
		}
		function setPersonalPhoto($conn)
		{
			if(isset($_POST['personalphotoEditSubmit']))
			{
						if($_FILES['personalphoto']["size"] != 0)
						{
							$date=$_POST['date'];
							$uid=$_POST['uid'];
							$fileName_photo=basename($_FILES['personalphoto']["name"]);
							$fileTmpName_photo=$_FILES['personalphoto']['tmp_name'];
							$fileExt_photo= explode('.', $fileName_photo);
							$fileActualExt_photo = strtolower(end($fileExt_photo));
							
							$fileNameNew_photo = uniqid('', true).".".$fileActualExt_photo;
							$target_direction_photo = 'personal/photo/'.$fileNameNew_photo;

							$uploadOk_photo=1;
							$imageFileType_photo=strtolower(pathinfo($target_direction_photo,PATHINFO_EXTENSION));

								$check_photo= getimagesize($_FILES['personalphoto']["tmp_name"]);
								if($check_photo !== false)
								{
									echo	"File is an image".$check_photo['mime'].".";
									
								}
									else
									{
										echo	"Uploading file is not an image";
										
									}
									
								if(file_exists($target_direction_photo))
								{
									echo	"Uploading file already exists in database";
									
								}
								
								if($_FILES['personalphoto']["size"] > 500000)
								{
									echo	"Uploading file is very big";
								}
								

										
										if($uploadOk_photo==0)
										{
											echo	"Your file has not been uploaded";
										}
											else
						{
							if(move_uploaded_file($fileTmpName_photo, $target_direction_photo))
							{
								echo	"Your file :".basename($_FILES['personalphoto']["name"]). "has been uploaded correctly";
																
									$sprawdzsql=("SELECT * FROM photo WHERE user='$uid'");
									$sprawdz=$conn->query($sprawdzsql);
										$policz=$sprawdz -> num_rows;
										
										if($policz>0)
										{
												$sql_Picture=("UPDATE photo SET date='$date', photoname='$fileName_photo', photofile='$target_direction_photo' WHERE user='$uid'");
												$polacz_Picture=$conn->query($sql_Picture);			
										}
													else	
													{
														$sql_Picture=("INSERT INTO photo (user, date, photoname, photofile) VALUES ('$uid', '$date', '$fileName_photo', '$target_direction_photo')");
														$polacz_Picture=$conn->query($sql_Picture);	
													}
							}
								else
								{
									echo	"There was an error to upload file correctly";
								}
						}
						}
			}			
			
			
			
			
		}
		function getPersonalPhoto($conn)
		{
						$user=$_GET['profilowy'];
						
						$sql=("SELECT * FROM photo WHERE user='$user'");
						$polacz = $conn ->query ($sql);
						$check = $polacz -> num_rows;
									
												if($check ==0)
											{
												echo "<img src='photo/none.jpg' width='180px' height='195px'>";
											}								
												else
									while($photo=$polacz->fetch_assoc())
									{
										if($check >0)
										{
												echo	"<img src='{$photo['photofile']}' width='180px' height='195px'>";
										}					
									}		
			
			
		}
			function getPersonalPrivPhoto($conn)
		{
						$user=$_SESSION['user'];
						
						$sql=("SELECT * FROM photo WHERE user='$user'");
						$polacz = $conn ->query ($sql);
						$check = $polacz -> num_rows;
									
												if($check ==0)
											{
												echo "<img src='photo/none.jpg' width='180px' height='195px'>";
											}								
												else
												{
									while($photo=$polacz->fetch_assoc())
									{
										if($check >0)
										{
												echo	"<img src='{$photo['photofile']}' width='180px' height='195px'>";
										}					
									}														
												}
	
			
			
		}
		function getSmallPhoto($conn)
		{
						$user=$_SESSION['user'];
						
						$sql=("SELECT * FROM photo WHERE user='$user'");
						$polacz = $conn->query($sql);
						$check = $polacz->num_rows;
									
												if($check==0)
											{
												echo "<img src='photo/none.jpg' width='100%' height='100%'>";
											}								
												else
												{
													while($photo=$polacz->fetch_assoc())
													{
														if($check >0)
														{
																echo	"<img src='{$photo['photofile']}' width='100%' height='100%'>";
														}					
													}															
												}

		}		
		
		function setSubscribeAsk($conn)
		{
			if(isset($_POST['friendSubmit']))
			{
				$uid = $_POST['uid'];
				$user = $_POST['user'];
				$date = $_POST['date'];
					
					$checkSql="SELECT * FROM friends WHERE ((uid='$uid') AND (user='$user')) OR ((uid='$user') AND (user='$uid'))";
					$polaczCheck=$conn->query($checkSql);
					$count1=$polaczCheck->num_rows;
						if($count1 == 0)
					{
						$sql="SELECT * FROM zapytanie WHERE (uid='$uid') AND (user='$user')";
						$polacz=$conn->query($sql);
						
						$count=$polacz->num_rows;
						
						if($count == 0)
						{
							$sql="INSERT INTO zapytanie (uid, user, date, stan) VALUES ('$uid', '$user', '$date', 'wait')";
							$polacz=$conn->query($sql);
						}
						else
							{
								echo "You asked ".$uid." before.";
							}						
					}
						else
						{
							echo "This friend exists in the list already.";
						}
				
				
				
			}			
		}

//		function getSubscribeAsk($conn)
//		{
//			$uid=$_SESSION['user'];
//			$sql="SELECT * FROM zapytanie WHERE (uid='$uid') AND (stan='wait')";
//				$polacz=$conn->query($sql);
//				$count=$polacz->num_rows;
//				if($count>0)
//				{
//					if($row=$polacz->fetch_assoc())
/*					{
						include "notifications.php";
						echo "<p>";
						echo "<div class='askNick'>";
					echo $row['user']." | | ".$row['stan']." | | ".$row['date'];
						echo "</div>";
						echo "<form method='post' action='".setFriend($conn)."'>
								  <input type='hidden' name='uid' value='".$row['uid']."'>
								  <input type='hidden' name='user' value='".$row['user']."'>
								  <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
								  <input type='submit' name='friendAccept' id='friendAccept' value='Accept'>
								  </form>";

						echo "<form method='post' action='".removeAsk($conn)."'>
								  <input type='hidden' name='uid' value='".$row['uid']."'>
								  <input type='hidden' name='user' value='".$row['user']."'>
								  <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
								  <input type='submit' name='removeAskSubmit' id='removeAskSubmit' value='Remove'>
								  </form>";
						echo "</p>";
					}
				}
				else
					{
						echo "Nothing new, at the moment.";
					}
		} */
		function getFriendList($conn)
		{
			$uid=$_GET['profilowy'];
				$sql="SELECT * FROM friends WHERE uid='$uid'";
				$polacz=$conn->query($sql);
					
					$count=$polacz->num_rows;
					if($count>0)
					{
						while($row=$polacz->fetch_assoc())
							{
								echo "<p>";
								echo $row['user'];
								echo "</p>";
							}
						
					}
					else
						{
							echo "No users on the list.";
						}
				
				
				
				
		}
		function getFriendPrivList($conn)
		{
			$uid=$_SESSION['user'];
				$sql="SELECT * FROM friends WHERE uid='$uid'";
				$polacz=$conn->query($sql);
					
					$count=$polacz->num_rows;
					if($count>0)
					{
						while($row=$polacz->fetch_assoc())
							{
								echo "<p>";
								echo $row['user'];
								echo "</p>";
							}
					}
					else
						{
							echo "No users on the list.";
						}
		}
		function setDetails($conn)
		{
			if(isset($_POST['detailsInputSubmit']))
			{
				$lang=filter_var($_POST['langInput'], FILTER_SANITIZE_STRING);
				$city=filter_var($_POST['cityInput'], FILTER_SANITIZE_STRING);
				$birth=$_POST['birthInput'];
				$passion=filter_var($_POST['passionInput'], FILTER_SANITIZE_STRING);
				$email=$_POST['emailInput'];
				$url=$_POST['urlInput'];
					if(filter_var($url, FILTER_VALIDATE_URL)==true)
					{
						$urlB=$_POST['urlInput'];
					}
				$changes=$_POST['changes'];
				
				$uid=$_POST['uid'];
					
					$sql="INSERT INTO details (uid, language, city, birth, passion, email, contact, changes) VALUES('$uid', '$lang', '$city', '$birth', '$passion', '$email', '$urlB', '$changes')";
					$polacz=$conn->query($sql);				
			}
		}
		function setPersonGalleryPicture($conn)
		{
			
		}
		
		
		