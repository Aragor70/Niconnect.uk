<?php

		function reminder()
		{

			if (isset ($_POST['reminderSubmit']))
			{
				include "connect.php";
				mysqli_report (MYSQLI_REPORT_STRICT);
				
				try
				{
					$polaczenie= new mysqli($host, $db_user, $db_password, $db_name);
					if($polaczenie -> connect_errno!=0)
						{
							Throw new Exception(mysqli_connect_errno());
						}
							else
							{
								$uname=$_POST['user'];
								$reminder=$_POST['reminder'];
								$time=$_POST['time'];
								$info=$_POST['info'];
								
								
								$sql=("INSERT INTO reminder (user, reminder, time, info) VALUES ('$uname', '$reminder', '$time', '$info')");
								
								$polacz = $polaczenie -> query($sql);
								$polaczenie -> close();
								
							}
				}
							Catch (Exception $e)
							{
								echo '<span style="color:red;">Błąd połączenia witryny z serwerem, Pozdrawiam</span>';
				//				echo '<br />Informacja o błędzie ze strony serwera: '.$e;
							}
			}
		}
		function getReminder()
		{
			include "connect.php";
			mysqli_report (MYSQLI_REPORT_STRICT);
			
			try
			{
				$polaczenie= new mysqli($host, $db_user, $db_password, $db_name);
					if($polaczenie -> connect_errno!=0)
						{
							throw new Exception(mysqli_connect_errno());
						}
							else
								{
								
								$user = $_SESSION['user'];
								$select= $polaczenie -> query("SELECT * FROM reminder WHERE (user = '$user')");
									
									$ilu_userow= $select -> num_rows;
									
									if($ilu_userow>0)
										{
											echo "<p>";
											while($row = $select -> fetch_assoc())
											{
												if($row['reminder'] == date('Y-m-d'))
												{
													echo "<p>";
													echo "<b>Today</b>";
														// echo w pozostalych wierszach kodu
													echo "<div class='day'>".$row['reminder']."</div>";
													if($row['time'] >0)
														{
															echo "<div class='hour'>".$row['time']."</div><br />";
														}
													echo "<div class='info'><b>".$row['info']."</b></div>";
													echo "</p>";										
												}
												else
												{
													if($row['reminder'] > date('Y-m-d'))
													{
														// echo w pozostalych wierszach kodu
														echo "<div class='day'>".$row['reminder']."</div>";
														if($row['time'] >0)
															{
																echo "<div class='hour'>".$row['time']."</div><br />";
															}
														echo "<div class='info'><b>".$row['info']."</b></div>";

													}														
												}	
													if($row['reminder'] < date('Y-m-d'))
													{
														//usun z bazy danych
														$reminder= $row['reminder'];
														$info= $row['info'];
														$sqlDeleteDate=("DELETE FROM reminder WHERE (reminder='$reminder') AND (info='$info')");
														$polaczDelete=$polaczenie -> query($sqlDeleteDate);
													}
													
											
													
											}
											echo "</p>";
										}
										else
											{
												echo "No dates to remind";
											}
										
								}
									
									$polaczenie -> close();
			
								
			}
					Catch (Exception $e)
					{
						echo '<span style="color:red;">Błąd połączenia witryny z serwerem, Pozdrawiam</span>';
			//			echo '<br />Informacja o błędzie ze strony serwera: '.$e;
					}
		}
		
		function getPersonalReminder()
		{
			include "connect.php";
			mysqli_report (MYSQLI_REPORT_STRICT);
			
			try
			{
				$polaczenie= new mysqli($host, $db_user, $db_password, $db_name);
					if($polaczenie -> connect_errno!=0)
						{
							throw new Exception(mysqli_connect_errno());
						}
							else
								{
								
								$user = $_SESSION['user'];
								$select= $polaczenie -> query("SELECT * FROM reminder WHERE (user = '$user')");
									
									$ilu_userow= $select -> num_rows;
									
									if($ilu_userow>0)
										{
											echo "<p>";
											while($row = $select -> fetch_assoc())
											{
												if($row['reminder'] == date('Y-m-d'))
												{
														// echo w pozostalych wierszach kodu
													echo "<p><div class='day'>".$row['reminder']."</div>";
													if($row['time'] >0)
														{
															echo "<div class='hour'>".$row['time']."</div><br />";
														}
													echo "<div class='info'><b>".$row['info']."</b></div></p>";								
												}
												else
												{
													if($row['reminder'] > date('Y-m-d'))
													{
														// echo w pozostalych wierszach kodu
														echo "<p><div class='day'>".$row['reminder']."</div>";
														if($row['time'] >0)
															{
																echo "<div class='hour'>".$row['time']."</div><br />";
															}
														echo "<div class='info'><b>".$row['info']."</b></div></p>";

													}														
												}	
													if($row['reminder'] < date('Y-m-d'))
													{
														//usun z bazy danych
														$reminder= $row['reminder'];
														$info= $row['info'];
														$sqlDeleteDate=("DELETE FROM reminder WHERE (reminder='$reminder') AND (info='$info')");
														$polaczDelete=$polaczenie -> query($sqlDeleteDate);
													}
													
											
													
											}
											echo "</p>";
										}
										else
											{
												echo "No date on the list.";
											}
										
								}
									
									$polaczenie -> close();
			
								
			}
					Catch (Exception $e)
					{
						echo '<span style="color:red;">Błąd połączenia witryny z serwerem, Pozdrawiam</span>';
			//			echo '<br />Informacja o błędzie ze strony serwera: '.$e;
					}
		}