	<?php
	function setChat($conn)
	{
		if(isset($_POST['chatSubmit']))
				{
					$uid = $_POST['uid'];
					$adres = $_POST['adres'];
					$date = $_POST['date'];
					$message = $_POST['chatmessage'];
					
						$sql = "INSERT INTO chat (uid, adres, date, message) VALUES ('$uid', '$adres', '$date', '$message')";
						$polacz = $conn->query($sql);						


					
				}
	}
	
/*	function getChat1($conn)
	{
		$uname=$_SESSION['user'];
		$adres=$_GET['listuname'];
		$sql = "SELECT * FROM chat WHERE (uid = '$uname' AND adres = '$adres') OR (uid = '$adres' AND adres = '$uname') ORDER BY date ASC";
		$polacz = $conn -> query($sql);
		
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
		
		
	}*/
	function getChatProfile($conn)
	{
		$uname=$_SESSION['user'];
		$adres=$_GET['profilowy'];
		$sql = "SELECT * FROM chat WHERE (uid = '$uname' AND adres = '$adres') OR (uid = '$adres' AND adres = '$uname') ORDER BY date ASC";
		$polacz = $conn -> query($sql);
		
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






	
	