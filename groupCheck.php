

	<?php
		include "groupConnect.php";
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		try
		{
			$connect = new mysqli($host, $db_user, $db_password, $db_name);
			if($connect -> connect_errno!=0)
			{
				Throw new Exception(mysqli_connect_errno());
			}
				else
				{
					$uname=$_SESSION['user'];
					$gname=$_GET['gname'];
					$sql = "SELECT * FROM users WHERE (gname='$gname') AND (uid='$uname' OR user='$uname')";
					$polacz = $connect -> query($sql);
					$count = $polacz -> num_rows;
					
					if($count === 0)
					{
						header("Location: index.php");
						exit();
					}
				}
		}
			Catch(Exception $e)
			{
				echo "<span style='color: red;'>Błąd połączenia witryny z serwerem, Pozdrawiam</span>";
			}		
	
	
	?>