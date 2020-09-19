	
	
	<?php
	
$conn = mysqli_connect('localhost', 'root', '', 'eprofile');
	
	if(!$conn)
	{
		die("Connection with the server is lost: ".mysqli_connect_error());
	}
	
	?>