<?php
	
	session_start ();
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: in.php');
		exit ();
	}

?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<title>Niconnect.uk</title>
	
	<meta name="description" content="Niconnect edu" />
	<meta name="keywords" content="niconnect, connect, connection" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="style.css" rel="stylesheet" type="text/css" />
	<link href='https://fonts.googleapis.com/css?family=Lato:400,700&display=swap&subset=latin-ext' rel='stylesheet' type 'text/css'>
		<link href="inputlog.css" rel="stylesheet" type="text/css" />
		<link href="preloader.css" rel="stylesheet" type="text/css" />
		
		<script type="text/javascript" src="timer.js"></script>
</head>

<body onload="odlicz();">
	<div class="main">
		<div class="one">
			<div class="marks">
			</div>
		</div>
			<div id="preloader">
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
			</div>
			
		
			<?php
				include "indexLog.php";
			?>
		

		
	<script>
    var preloaderEl = document.querySelector("#preloader");

    window.addEventListener("load", function(){
        preloaderEl.classList.add("preloader-hiding");
        preloaderEl.addEventListener("transitionend", function(){
          this.classList.add("preloader-hidden");
          this.classList.remove("preloader-hiding");
        });
    });
    </script>
	
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