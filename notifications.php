


		<?php
		

			if(isset($_POST['friendAccept']))
			{
				include "personConnect.php";
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
				$profilowy=$_POST['uid'];
				$user=$_POST['user'];
				$date=$_POST['date'];
				
					$checkSql="SELECT * FROM friends WHERE ((uid='$profilowy') AND (user='$user')) OR ((uid='$user') AND (user='$profilowy'))";
					$polaczCheck=$connect->query($checkSql);
					$count=$polaczCheck->num_rows;
						if($count == 0)
						{
							
						$sql="INSERT INTO friends (uid, user, date) VALUES ('$profilowy', '$user', '$date')";
						$polacz=$connect->query($sql);
						$sqlCopy="INSERT INTO friends (uid, user, date) VALUES ('$user', '$profilowy', '$date')";
						$polaczCopy=$connect->query($sqlCopy);
						
							$sqlRemove="DELETE FROM zapytanie WHERE ((uid='$profilowy') AND (user='$user')) OR ((uid='$user') AND (user='$profilowy'))";
							$polacz2=$connect->query($sqlRemove);			
						header ('Location: index.php');		
						}
						else
						{
							header ('Location: index.php');		
							echo "This friend exists in the list already.";
						}
					}
				}		
				catch (Exception $e)
				{
					echo "<span style='color: red;'>Błąd połączenia witryny z serwerem, Pozdrawiam</span>";
				}				
				
			}
	
				
			
			if(isset($_POST['removeAskSubmit']))
			{
				include "personConnect.php";
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
				$profilowy=$_POST['uid'];
				$user=$_POST['user'];
				$date=$_POST['date'];
					// sql = remove data from zapytanie
					$sqlCheck="SELECT * FROM zapytanie WHERE (uid='$profilowy') AND (user='$user')";
					$polacz=$connect->query($sqlCheck);
					$count=$polacz->num_rows;
						if($count>0)
						{
							$sql="DELETE FROM zapytanie WHERE (uid='$profilowy') AND (user='$user')";
							$polacz=$connect->query($sql);
							header ('Location: index.php');		
						}				
					}
				}
				catch (Exception $e)
				{
					echo "<span style='color: red;'>Błąd połączenia witryny z serwerem, Pozdrawiam</span>";
				}
			}
		