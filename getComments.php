
	<?php
	
		session_start();
		include "posterConnect.php";
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		try
		{
			$connect= new mysqli($host, $db_user, $db_password, $db_name);
			if($connect->connect_errno!=0)
			{
				Throw new Exception(mysqli_connect_errno());
			}
			else
			{
		$mysql=("SELECT poster.uid, poster.date, poster.poster, imgposter.imgname, imgposter.imgfile, mp3poster.mp3name, mp3poster.mp3file, videoposter.videoname, videoposter.videofile FROM poster, imgposter, mp3poster, videoposter WHERE poster.id = imgposter.id AND poster.uid = imgposter.uid AND poster.date = imgposter.date AND poster.id=mp3poster.id AND poster.uid=mp3poster.uid AND poster.date=mp3poster.date AND imgposter.id=mp3poster.id AND imgposter.uid=mp3poster.uid AND imgposter.date=mp3poster.date AND poster.id=videoposter.id AND poster.uid=videoposter.uid AND poster.date=videoposter.date AND imgposter.id=videoposter.id AND imgposter.uid=videoposter.uid AND imgposter.date=videoposter.date AND mp3poster.id=videoposter.id AND mp3poster.uid=videoposter.uid AND mp3poster.date=videoposter.date ORDER BY poster.date DESC");
		$polaczMySql= $connect -> query($mysql);
		
		while($row=$polaczMySql -> fetch_assoc())
		{

echo		"<p>";
echo			"<div class='posterFace'>";
echo				"<div class='top-bar'>";
echo					"<div class='pDate'>".$row['date'];
echo					"</div>";
echo					"<div class='pName'><form method='get' action='newUser.php'><input type='hidden' name='user' value='".$_SESSION['user']."' /><input type='hidden' name='profilowy' value='".$row['uid']."' /><input type='submit' name='profileUserSubmit' value='".$row['uid']."' /></form>";
echo					"</div>";
echo					"<div class='pMusic'>";
							if($row['mp3file']==true)
							{
echo					"<audio controls><source src='".$row['mp3file']."' type='audio/mpeg'>
							<source src='".$row['mp3file']."' type='audio/ogg'></audio>";						
							}
echo					"</div>";
echo				"</div>";
echo			"<div class='bottom-bar'>";
echo					"<div class='pText'>".$row['poster'];
echo				"</div>";
echo					"<div class='pImage'>";
							if($row['imgfile']==true)
							{
echo					"<img src='{$row['imgfile']}' width='200' height='250'>";	
							
							}
							
echo					"</div>";
echo					"<div class='pVideo'>";
							if($row['videofile']==true)
							{
echo					$row['videoname']."<br />";
echo					"<video width='400' height='300' controls><source src='{$row['videofile']}' type='video/webm' >
							<source src='{$row['videofile']}' type='video/mp4'></video>";
							}
echo					"</div>";
echo				"</div>";
echo			"</div>";
echo		"</p>";
echo	"<div class='space'>";
echo	"</div>";

		}
		$connect ->close();				
			}
		}
		Catch (Exception $e)
		{
			echo "<span style='color: red;'>Błąd połączenia witryny z serwerem, Pozdrawiam</span>";
		}
	
	


		?>		