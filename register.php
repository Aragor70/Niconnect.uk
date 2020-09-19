<?php
	
	session_start ();

	if (isset ($_POST['email']))
	{
		// Udana walidacja
		$wszystko_OK=true;
		
			// Poprawność nicku 3-20 znaków
			$nick=$_POST['nick'];
			
			if ((strlen ($nick)<3) || (strlen ($nick)>20))
			{
				$wszystko_OK=false;
			$_SESSION['e_nick']="Your name can be created by 3-20 signs";
			}
				if (ctype_alnum ($nick)==false)
				{
					$wszystko_OK=false;
					$_SESSION['e_nick']="Use only letters and numbers";
				}
				
			// walidacja maila
			$email=$_POST['email'];
			$emailB= filter_var($email, FILTER_SANITIZE_EMAIL);
			
			if ((filter_var($emailB, FILTER_SANITIZE_EMAIL)==false) || ($emailB!=$email))
			{
				$wszytsko_OK=false;
				$_SESSION['e_email']="Use correct E-mail adress";
			}
			
			// walidacja hasła
			$haslo1=$_POST['haslo1'];
			$haslo2=$_POST['haslo2'];
			if ((strlen($haslo1)<8) || (strlen($haslo1)>20))
			{
				$wszystko_OK=false;
				$_SESSION['e_haslo']="Your password needs to has 8-20 signs";
			}
		
			if ($haslo1!=$haslo2)
			{
				$wszystko_OK=false;
				$_SESSION['e_haslo']="Both passwords should to be the same";
			}
			$haslo_hash=password_hash($haslo1, PASSWORD_DEFAULT);
			
			// walidacja checkboxa
			
			if(!isset($_POST['regulamin']))
			{
				$wszystko_OK=false;
				$_SESSION['e_regulamin']="Accept the rules";
			}
			
			// walidacja captcha
			$sekret= "6Lehc7MUAAAAACx0Hril1RCAQLJ51oUjVFrUMAz5";
			$sprawdz= file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$sekret.'&response='.$_POST['g-recaptcha-response']);
			$odpowiedz=json_decode($sprawdz);
			
			if ($odpowiedz->success==false)
			{
				$wszystko_OK=false;
				$_SESSION['e_captcha']="Accept the reCaptcha";
			}
			
			// zapamiętaj dane
			$_SESSION['fr_nick']=$nick;
			$_SESSION['fr_email']=$email;
			$_SESSION['fr_haslo1']=$haslo1;
			$_SESSION['fr_haslo2']=$haslo2;
			if(isset($_POST['regulamin'])) $_SESSION['fr_regulamin']=true;
			
			// połączenie z bazą danych oraz rzucenie błędem'
			require_once "connect.php";
			mysqli_report(MYSQLI_REPORT_STRICT);
			
				try
				{
					$polaczenie = new mysqli ($host, $db_user, $db_password, $db_name);
					if($polaczenie -> connect_errno!=0)
						{
							throw new Exception (mysqli_connect_errno());
						}
						else
						{
							//Czy email już istnieje
							$rezultat= $polaczenie->query("SELECT id FROM uzytkownik WHERE email='$email'");
							if(!$rezultat) throw new Exception($polaczenie->error);
							$ile_takich_maili=$rezultat->num_rows;
							
								if($ile_takich_maili>0)
								{
									$wszystko_OK=false;
									$_SESSION['e_email']="W bazie użytkowników już istnieje podany adres E-mail";
									
								}
								
								
							//Czy name już istnieje
							$rezultat= $polaczenie->query("SELECT user FROM uzytkownik WHERE user='$nick'");
							if(!$rezultat) throw new Exception($polaczenie->error);
							$ile_takich_name=$rezultat->num_rows;
							
								if($ile_takich_name>0)
								{
									$wszystko_OK=false;
									$_SESSION['e_nick']="W bazie użytkowników już istnieje podany name";
								}
								
										if ($wszystko_OK==true)
										{
											// testy zakończone pomyślnie, wykonaj rejestrację
											if($polaczenie->query("INSERT INTO uzytkownik (id, user, pass, email, datereg) VALUES (NULL,'$nick','$haslo_hash','$email', now())"))
											{
												$_SESSION['udanarejestracja']=true;
												header('Location: newone.php');
											}
												else
												{
													throw new Exception($polaczenie->error);
												}
										}
							
							$polaczenie->close();
						}
				}
					catch(Exception $e)
					{
						echo '<span style="color:red;">Błąd połączenia witryny z serwerem, Pozdrawiam</span>';
				//		echo '<br /><br />Informacja o błędzie ze strony serwera: '.$e;
					}

	}
	
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<title>Niconnect - The Account Register</title>
	
	<meta name="description" content="Niconnect edu" />
	<meta name="keywords" content="niconnect, connect, connection" />
	<link href="style.css" rel="stylesheet" type="text/css" />
	<link href='https://fonts.googleapis.com/css?family=Lato:400,700&display=swap&subset=latin-ext' rel='stylesheet' type 'text/css'>
		<link href="register.css" rel="stylesheet" type="text/css" />
	<script src='https://www.google.com/recaptcha/api.js'></script>

		<script type="text/javascript" src="timer.js"></script>		
</head>

<body onload="odlicz();">
	<div class="main">
		<div class="one">
			<div class="marks">

			</div>
		</div>
		<div class="two">
		<div class="register">
	<form method="post">
			<div class="ologinrejestracji">
			Name Account: <input type="text" value ="<?php
					if (isset($_SESSION['fr_nick']))
					{
						echo $_SESSION['fr_nick'];
						unset ($_SESSION['fr_nick']);
					}
			?>" name="nick" id="nickName" onchange="weryfikujName()" /><div class="oerror" id="nickError">
			<?php
				if(isset($_SESSION['e_nick']))
				{
				echo '<div class="error">'.$_SESSION['e_nick'].'</div>';
				unset($_SESSION['e_nick']);
				}
			?></div>
			</div>
			<div class="oemailrejestracji">
			E-mail Adress: <input type="text" value ="<?php
					if(isset($_SESSION['fr_email']))
					{
						echo $_SESSION['fr_email'];
						unset ($_SESSION['fr_email']);
					}
			
				?>" name="email"/><div class="oerror">
				<?php
				if(isset($_SESSION['e_email']))
				{
				echo '<div class="error">'.$_SESSION['e_email'].'</div>';
				unset($_SESSION['e_email']);
				}
				?></div>
			</div>
		<div class="opasswordrejestracji">
		The Password: <input type="password" value ="<?php
				if(isset($_SESSION['fr_haslo1']))
				{
					echo $_SESSION['fr_haslo1'];
					unset ($_SESSION['fr_haslo1']);
				}
		
		?>" name="haslo1" id="haslo1" onchange="weryfikuj()"/><div class="oerror" id="oerror">
				<?php
				if(isset($_SESSION['e_haslo']))
				{
				echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
				unset($_SESSION['e_haslo']);
				}
				?></div>
				</div>
				<div class="oconfirm">
				Confirm The Password: <input type="password" value ="<?php
						if(isset($_SESSION['fr_haslo2']))
						{
							echo $_SESSION['fr_haslo2'];
							unset ($_SESSION['fr_haslo2']);
						}
				
					?>" name="haslo2" id="haslo2" onchange="weryfikuj()"/>
				</div>
				<div class="ocheckbox">
					<label>
					<input type="checkbox" name="regulamin" <?php
						if(isset($_SESSION['fr_regulamin']))
						{
							echo "checked";
							unset($_SESSION['fr_regulamin']);
						}
					?>	/> Accept The Rules
					</label><div class="oerror">
							<?php
							if(isset($_SESSION['e_regulamin']))
							{
							echo '<div class="error">'.$_SESSION['e_regulamin'].'</div>';
							unset($_SESSION['e_regulamin']);
							}
							?></div>
				</div>
				<div class="ocaptcha">
				<div class="g-recaptcha" data-sitekey="6Lehc7MUAAAAAOWQOkHfANfWZojWcVcXXLEL77Mz"></div><div class="errorcaptcha">
								<?php
								if(isset($_SESSION['e_captcha']))
								{
								echo '<div class="error">'.$_SESSION['e_captcha'].'</div>';
								unset($_SESSION['e_captcha']);
								}
								?></div>
				</div>
	<input type="submit" value="Create" />
	</form>
	<script>
		function weryfikujName()
		{
			var name=document.getElementById("nickName").value;
			
				if(name=="")
				{
					var error=document.getElementById("nickError").innerHTML='<span style="color: red; font-size: 14px;">Nickname is empty.</span>';
				}
				if(name.length<3 || name.length>20)
				{
					var error=document.getElementById("nickError").innerHTML='<span style="color: red; font-size: 14px;">Nickname is not correct.</span>';
				}

		}

		function jest_cyfra(x)
		{
			var d = x.length;
			for(i=0; i <=d-1; i++)
			{
				if(x.charAt(i)== "0" || x.charAt(i)== "1" || x.charAt(i)== "2" || x.charAt(i)== "3" || x.charAt(i)== "4" || x.charAt(i)== "5" || x.charAt(i)== "6" || x.charAt(i)== "7" || x.charAt(i)== "8" || x.charAt(i)== "9")
					{
						return true;
					}
			}
				return false;
		}
		function weryfikuj()
		{
		var haslo1=document.getElementById("haslo1").value;
		var haslo2=document.getElementById("haslo2").value;
		var length=haslo1.length;
			if(haslo1 == "")
				{
					var oerror=document.getElementById("oerror").innerHTML='<span style="color: red; font-size: 14px;">Password is empty.</span>';
				}			
					else if (length >=8 && length <=20 && jest_cyfra(haslo1) == true)
					{
					var oerror=document.getElementById("oerror").innerHTML='<span style="color: green; font-size: 14px;">Password is strong.</span>';						
					}
					else if (length >=8 && length <=20)
					{
					var oerror=document.getElementById("oerror").innerHTML='<span style="color: lightgreen; font-size: 14px;">Password is correct.</span>';		
					}
					else if (length < 7 || length > 20)
					{
					var oerror=document.getElementById("oerror").innerHTML='<span style="color: red; font-size: 14px;">Password is not correct.</span>';			
					}
					else if (haslo1 != haslo2)
					{
					var oerror=document.getElementById("oerror").innerHTML='<span style="color: red; font-size: 14px;">Two passwords have to be the same.</span>';								
					}	
		}


	</script>
	
<?php
	echo '<p><a href="index.php" class="goback" style="margin-left: 10px;">Go back</a></p>';
?>
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