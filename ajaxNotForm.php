

	<?php
		session_start();
		include "personConnect.php";
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		try
		{
			$connect=new mysqli($host, $db_user, $db_password, $db_name);
			if($connect->connect_errno!=0)
			{
				Throw new Exception (mysqli_connect_errno());
			}
			else
			{
				$uname=$_SESSION['user'];
				$sql="SELECT * FROM zapytanie WHERE uid='$uname'";
				$polacz=$connect-> query($sql);
					$policz=$polacz->fetch_assoc();
					if($policz>0)
					{
						$uname=$_SESSION['user'];
						echo	"<form method='get' action='messagesPage.php'>
									<input type='hidden' name='uid' value='$uname'>
									<input type='hidden' name='user' value='$uname'>
									<input type='hidden' name='profilowy' value='$uname'>
									<input type='submit' id='notSubmit1' name='notSubmit' value='Mail Box'>
									</form>";

					}
						else
						{
							$uname=$_SESSION['user'];
							echo	"<form method='get' action='messagesPage.php'>
										<input type='hidden' name='uid' value='$uname'>
										<input type='hidden' name='user' value='$uname'>
										<input type='hidden' name='profilowy' value='$uname'>
										<input type='submit' id='notSubmit' name='notSubmit' value='Mail Box'>
										</form>";
						}
			}
		}
			Catch (Exception $e)
			{
				echo "<span style='color: red;'>Błąd połączenia witryny z serwerem, Pozdrawiam</span>";
			}
			
		

		
		
		
		
		
	?>
			