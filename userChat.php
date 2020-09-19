


	<?php
	
	session_start();
	include "posterConnect.php";
	mysqli_report (MYSQLI_REPORT_STRICT);
	
	try
	{
	$connect=new mysqli($host, $db_user, $db_password, $db_name);
	if($connect->connect_errno!=0)
	{
		Throw new Exception(mysqli_connect_errno());
	}
		else
		{					
	
		$uname=$_SESSION['user'];
		$adres=$_REQUEST['listuname'];
		$sql = "SELECT * FROM chat WHERE (uid = '$uname' AND adres = '$adres') OR (uid = '$adres' AND adres = '$uname') ORDER BY date ASC";
		$polacz = $connect -> query($sql);
		
		while ($row = $polacz -> fetch_assoc())
		{
			if($row['uid']==$uname)
			{
				echo "<div class='mbox1'>";
				echo "<p style='font-size: 11px; text-align: center; letter-spacing: 1px;'><b>".$row['uid']."</b>, ".$row['date']."</p>";
				echo "<div class='mfieldr'>".$row['message']."</div>";
				echo "</div>";
			}
			else
			{
			echo "<div class='mbox2'>";
			echo "<p style='font-size: 11px; text-align: center; letter-spacing: 1px;'><b>".$row['uid']."</b>, ".$row['date']."</p>";
			echo "<div class='mfieldl'>".$row['message']."</div>";
			echo "</div>";
			}
		}
		}
	}
		Catch (Exception $e)
		{
			echo "<span style='color: red;'>Błąd połączenia witryny z serwerem, Pozdrawiam</span>";
		}		

	?>
	


	