<?php

	function setArt($conn)
	{
		if(isset($_POST['noteSubmit']))
				{
					$uid = $_POST['uid'];
					$date = $_POST['date'];
					$tittle = $_POST['tittle'];
					$note = filter_var($_POST['note'], FILTER_SANITIZE_STRING);
					
					
					$sql = "INSERT INTO pocket (uid, date, tittle, note) VALUES ('$uid', '$date', '$tittle', '$note')";
					$polacz = $conn->query($sql);						
					

					
				}
	}
	function getArt($conn)
	{
		if(isset($_SESSION['user']))
		{
		$uname=$_SESSION['user'];
		}
		$sql = "SELECT * FROM pocket WHERE uid = '$uname' ORDER BY cid DESC";
		$polacz = $conn->query($sql);
		
		while($row =$polacz -> fetch_assoc())
					{
						echo '<div class="pockets">';
						echo "<p style='margin-right: 50px; float: right; text-decoration: underline;'>".$row['uid'];
						echo " ".$row['date']."</p>";
						echo "<p style='text-decoration: underline; color: #303030;'>The Tittle: ".$row['tittle']."</p>";
						echo "<p>".$row['note']."</p>";
						echo "</div>";
						echo '<div class="space">';
						echo '</div>';
					}
					
			
		
	}
/*	function getPost($conn)
	{
		if(isset($_GET['pocket']))
		{
		$us = $_GET['pocket'];
		}
		if(isset($_GET['found']))
		{
		$us = $_GET['pocket'];
		}
		
		$sql = "SELECT * FROM pocket WHERE uid = '$us' ORDER BY cid DESC";
		$polacz = $conn->query($sql);
		while($row =$polacz -> fetch_assoc())
					{
						echo '<div class="pockets">';
						echo "<p style='margin-right: 50px; float: right; text-decoration: underline;'>".$row['uid']; 
						
						
						echo " ".$row['date']."</p>";
						echo "<p style='text-decoration: underline; color: #303030;'>The Tittle: ".$row['tittle']."</p>";
						echo "<p>".$row['note']."</p>";
						echo "</div>";
						echo '<div class="space">';
						echo '</div>';
					}
	}	*/
	
		if(isset($_GET['epocket']))
			{
					//polaczenie z connect.php
				require_once "connect.php";
				mysqli_report(MYSQLI_REPORT_STRICT);
				try
				{
					$polaczenie= new mysqli($host, $db_user, $db_password, $db_name);
					if($polaczenie -> connect_errno!=0)
						{
							throw new Exception(mysqli_connect_errno());
						}
							else
								{
						
								$uname=$_SESSION['user'];
								$select= $polaczenie -> query("SELECT * FROM uzytkownik WHERE user = '".$uname."'");
									
									$ilu_userow= $select -> num_rows;
									
									if($ilu_userow>0)
										{
											$row = $select -> fetch_assoc();
											// echo w pozostalych wierszach kodu pocket.php
									
										
									
											
										}
									else
									{
										echo "No users";
									}
									$polaczenie -> close();
								}
								
				}
					Catch (Exception $e)
					{
						echo '<span style="color:red;">Błąd połączenia witryny z serwerem, Pozdrawiam</span>';
				//		echo '<br />Informacja o błędzie ze strony serwera: '.$e;
					}
			}
			
		if(isset($_GET['pocket']))
			{
					//polaczenie z connect.php
				require_once "connect.php";
				mysqli_report(MYSQLI_REPORT_STRICT);
				try
				{
					$polaczenie= new mysqli($host, $db_user, $db_password, $db_name);
					if($polaczenie -> connect_errno!=0)
						{
							throw new Exception(mysqli_connect_errno());
						}
							else
								{
						
								$u_name = $_GET['pocket'];
								$select= $polaczenie -> query("SELECT * FROM uzytkownik WHERE user = '".$u_name."'");
									
									$ilu_userow= $select -> num_rows;
									
									if($ilu_userow>0)
										{
											$row = $select -> fetch_assoc();
											// echo w pozostalych wierszach kodu pocket.php
									
										
									
											
										}
									else
									{
										echo "No users";
									}
									$polaczenie -> close();
								}
								
				}
					Catch (Exception $e)
					{
						echo '<span style="color:red;">Błąd połączenia witryny z serwerem, Pozdrawiam</span>';
				//		echo '<br />Informacja o błędzie ze strony serwera: '.$e;
					}
			}			
	
?>
	