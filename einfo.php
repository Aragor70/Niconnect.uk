

	<?php
	
	function setInfo($conn)
	{
		if(isset($_POST['infoSubmit']))
		{
			$uid= $_POST['uid'];
			$date= $_POST['date'];
			$info= $_POST['info'];
			
			$sql = "INSERT INTO einfo (uid, date, info) VALUES ('$uid', '$date', '$info')";
			$polacz = $conn -> query($sql);
			$conn->close();
		}
	}
	function getInfo($conn)
	{
		
		$uname=$_SESSION['user'];
		$sql = "SELECT * FROM einfo WHERE '$uname'";
		$resultat = $conn -> query ($sql);
		
		$row=$resultat->fetch_assoc();
		echo $row['info'];
		
		
	}
	
	
	
	
	
	