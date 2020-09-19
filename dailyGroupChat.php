

		<?php
			session_start();
			
			include "groupConnect.php";
			mysqli_report(MYSQLI_REPORT_STRICT);
			try
			{
				$gconnect = new mysqli($host, $db_user, $db_password, $db_name);
				if($gconnect -> connect_errno != 0)
				{
					Throw new Exception(mysqli_connect_errno());
				}
					else
					{
						$gname= $_REQUEST['gname'];
						
						$sql = "SELECT * FROM tgroup WHERE gname='$gname' ORDER BY date DESC";
						$polacz = $gconnect -> query($sql);
						$count = $polacz->num_rows;
						
						if($count > 0)
						{
								while($row = $polacz->fetch_assoc())
								{	
									if(strlen($row['text'])>0)
									{
										echo	"<div class='dailyMessage'>";
										echo	"<div class='dailyDate'>".$row['date'];
										echo	"</div>";
										echo	"<div class='dailyName'><form method='get' action='newUser.php'><input type='hidden' name='user' value='".$_SESSION['user']."' /><input type='hidden' name='profilowy' value='".$row['user']."' /><input type='submit' name='profileUserSubmit' value='".$row['user']."' /></form>";
										echo	"</div>";
										echo	"<div class='dailyText'>".$row['text'];
										echo	"</div>";	
										echo	"</div>";										
									}
								}
						}
						echo	"<div class='dailyMessage'>";
						echo 	"No Messages on the list";
						echo	"</div>";
					}
			}
			Catch (Exception $e)
				{
					echo "<span style='color: red;'>Błąd połączenia witryny z serwerem, Pozdrawiam</span>";
				}		
		
		
		?>