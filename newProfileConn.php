	<?php
	
$conn = mysqli_connect('localhost', 'root', '', 'personal');
	
	if(!$conn)
	{
		die("Connection with the server is lost: ".mysqli_connect_error());
	}
	
	?>