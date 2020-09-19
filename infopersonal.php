

			<?php
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
			$uid=$_REQUEST['uid'];
						
						$sql="SELECT * FROM details WHERE uid='$uid'";
						$polacz=$connect->query($sql);
						
							while($row=$polacz->fetch_assoc())
							{
								echo		"<p>".$row['language']."</p>";
								echo		"<p>".$row['city']."</p>";
								echo		"<p>".$row['birth']."</p>";
								echo		"<p>".$row['passion']."</p>";
								echo		"<p>".$row['email']."</p>";
								echo		"<p>".$row['contact']."</p>";		
						
							}
						$connect->close();
					}
				
			}
				catch (Exception $e)
				{
					echo "<span style='color: red;'>Błąd połączenia witryny z serwerem, Pozdrawiam</span>";
				}
			
