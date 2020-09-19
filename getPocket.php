

	<?php
		session_start();
	
		include "posterConnect.php";
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		try
		{
			$connect=new mysqli($host, $db_user, $db_password, $db_name);
				if($connect->connect_errno!=0)
				{
					Throw new Exception(mysqli_connect_errno());
				}
				else
				{
					
					$rpocket = $_REQUEST['pocket'];
					
					$sql = "SELECT * FROM pocket WHERE uid = '$rpocket' ORDER BY cid DESC";
					$polacz = $connect->query($sql);
					while($row =$polacz -> fetch_assoc())
								{
									echo '<div class="pockets">';
									echo "<p style='margin-right: 50px; float: right; text-decoration: underline;'>".$row['uid']; 
									
									
									echo " ".$row['date']."</p>";
									echo "<p style='text-decoration: underline; color: #303030;'>The Tittle: ".$row['tittle']."</p>";
									echo "<p>".$row['note']."</p>";
									echo "</div>";
									echo '<div class="space">';
echo	"<hr />";
									echo '</div>';
								}
				}
		}
		Catch (Exception $e)
		{
			echo "<span style='color: red;'>Błąd połączenia witryny z serwerem, Pozdrawiam</span>";
		}
		
		
		?>