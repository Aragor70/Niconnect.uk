
	<?php
	
		if(!isset ($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit ();
	}
	
	
	$conn = mysqli_connect('localhost', 'root', '', 'posts');
	
	if(!$conn)
	{
		die("Connection with the server is lost: ".mysqli_connect_error());
	}
		
		
		?>