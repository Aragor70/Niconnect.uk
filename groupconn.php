
	<?php
	
		if(!isset ($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit ();
	}
	
	
	$gconn = mysqli_connect('localhost', 'root', '', 'groups');
	
	if(!$gconn)
	{
		die("Connection with the server is lost: ".mysqli_connect_error());
	}
		
		
		?>