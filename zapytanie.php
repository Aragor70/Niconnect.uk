
			
			<p style='border-bottom: 1px solid #D8E1E9; margin-top: 5px; font-size: 15px; padding: 5px;'>Friend's notifications</p>
			<?php
				session_start();
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
			$uid=$_SESSION['user'];
			$sql="SELECT * FROM zapytanie WHERE (uid='$uid') AND (stan='wait')";
				$polacz=$connect->query($sql);
				$count=$polacz->num_rows;
				if($count>0)
				{
					while($row=$polacz->fetch_assoc())
					{
						include "notifications.php";
						echo "<p>";
						echo "<div class='askNick'>";
					echo $row['user']." | | ".$row['stan']." | | ".$row['date'];
						echo "</div>";
						echo "<form method='POST' action='notifications.php'>
								  <input type='hidden' name='uid' value='".$row['uid']."'>
								  <input type='hidden' name='user' value='".$row['user']."'>
								  <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
								  <input type='submit' name='friendAccept' id='friendAccept' value='Accept'>
								  </form>";
						echo "<form method='post' action='notifications.php'>
								  <input type='hidden' name='uid' value='".$row['uid']."'>
								  <input type='hidden' name='user' value='".$row['user']."'>
								  <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
								  <input type='submit' name='removeAskSubmit' id='removeAskSubmit' value='Remove'>
								  </form>";
						echo "</p>";
					}
				}
				else
					{
						echo "Nothing new, at the moment.";
					}
					}
				}
				catch (Exception $e)
				{
					echo "<span style='color: red;'>Błąd połączenia witryny z serwerem, Pozdrawiam</span>";
				}
				?>