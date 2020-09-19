<?php
	
	session_start ();
	
	if (!isset($_SESSION['udanarejestracja']))
	{
		header('Location: index.php');
		exit ();
	}
	else
	{
		unset($_SESSION['udanarejestracja']);
	}

		//Usuwanie zmiennych, które pamiętały wartości wpisane do tagu form
		if(isset($_SESSION['fr_nick'])) unset($_SESSION['fr_nick']);
		if(isset($_SESSION['fr_email'])) unset($_SESSION['fr_email']);
		if(isset($_SESSION['fr_haslo1'])) unset($_SESSION['fr_haslo1']);
		if(isset($_SESSION['fr_regulamin'])) unset($_SESSION['fr_regulamin']);
		
		//Usuwanie błędów rejestracji
		if(isset($_SESSION['e_nick'])) unset($_SESSION['e_nick']);
		if(isset($_SESSION['e_email'])) unset($_SESSION['e_email']);
		if(isset($_SESSION['e_haslo1'])) unset($_SESSION['e_haslo1']);
		if(isset($_SESSION['e_haslo2'])) unset($_SESSION['e_haslo2']);
		if(isset($_SESSION['e_regulamin'])) unset($_SESSION['e_regulamin']);
		
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<title>Niconnect.com</title>
	
	<meta name="description" content="Niconnect edu" />
	<meta name="keywords" content="niconnect, connect, connection" />
	<link href="style.css" rel="stylesheet" type="text/css" />
	<link href='https://fonts.googleapis.com/css?family=Lato:400,700&display=swap&subset=latin-ext' rel='stylesheet' type 'text/css'>
		<link href="inputlog.css" rel="stylesheet" type="text/css" />
		
		<script type="text/javascript" src="timer.js"></script>
</head>

<body onload="odlicz();">
	<div class="main">
		<div class="one">
			<div class="marks">
			</div>		
		</div>
		<div class="two">
					<div class="textlog">Welcome,<br />Now You can be a Part of Niconnect.com<br />Time to make The First Log in
					</div>
				<div class="log">
					<div class="zaloguj">
				<form action="zaloguj.php" method="post">
						<div class="ologin">Your login:
								<input type="text" name="login"/>
						</div>
						<div class="opassword">Your password:
							<input type="password" name="haslo"/>
						</div>
						<br /><br /><br /><br /><br />
						<input type="submit" value="Log in"/>
				</form>
						<div class="ologerror">
						<?php
						if (isset ($_SESSION['blad']))
						{
							echo $_SESSION['blad'];
						}
						?>
						</div>
						<div class="reginfo">
						<p>Do you need one more The Account?<br />Trying help someone else to Create The Account?<br />Well, <a href="register.php">You could Create it now</a></p>
						</div>
					</div>

				</div>
		</div>
		<div class="three">
				<logo>
				<div class="niconnect"><a class="logo" href="index.php">Niconnect</a>
						<link href='https://fonts.googleapis.com/css?family=Signika&display=swap&subset=latin-ext' rel='stylesheet' type "text/css">
				</div>
				</logo>
				<div class="apps">
					<b><div id="timerjs"></div></b>
				</div>
				<div class="footer1">&copy;Nicolai.edu 2019
				</div>
		</div>
								<div class="clear">
								</div>
	</div>
</body>
</html>