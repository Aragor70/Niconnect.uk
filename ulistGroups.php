

	<?php
			session_start();
			include "groupConnect.php";
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
			$uname = $_SESSION['user'];
			$user = $_SESSION['user'];
			$sql=("SELECT gname FROM users WHERE (user = '$uname') OR (uid='$uname')");
			$polacz = $gconnect ->query ($sql);
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
						$polacz2=$gconnect -> query($num);
						$policz=$polacz2 -> num_rows;
						echo	"Users: ".$policz.", ";
						$num2=("SELECT text FROM tgroup WHERE (gname='$gname')");
						$polacz3=$gconnect -> query($num2);
							
						$policz2=$polacz3 -> num_rows;
						echo	$policz2." post's";
						$bsql=("SELECT * FROM photo WHERE gname='$gname'");
						$polaczBackground = $gconnect ->query ($bsql);
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
								echo	"<hr />";
								echo	"</div>";		
				
					echo	"</div>";

				}					
				
				}
			}
				Catch (Exception $e)
				{
					echo "<span style='color: red;'>Błąd połączenia witryny z serwerem, Pozdrawiam</span>";
				}
