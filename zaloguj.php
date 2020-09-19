<?php

	session_start ();
	
	if ((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
	{
		header ('Location: index.php');
		exit ();
	}
	
		require_once "niconn.php";

		if(isset($_POST['login']))
		{
			$login = $_POST['login'];
			$haslo = $_POST['haslo'];
			
			$login = htmlentities($login, ENT_QUOTES, "UTF=8");

			$result = $niconnect -> prepare ("SELECT * FROM uzytkownik WHERE user = :login");
			$result->bindParam(':login', $login, PDO::PARAM_STR);
			$result->execute();
			

			$ilu_userow = $result -> rowcount();
			if($ilu_userow > 0)
			{
				$wiersz = $result -> fetch();
				if(password_verify($haslo, $wiersz['pass']))
				{
					$_SESSION['zalogowany'] = true;
					
					$_SESSION['id'] = $wiersz ['id'];
					$_SESSION['user'] = $wiersz['user'];
					$_SESSION['email'] = $wiersz['email'];


					unset($_SESSION['blad']);
					$result -> close();
					header ('Location: in.php');
				}
				else
				{
					$_SESSION['blad'] = '<span style="color:red"> Error login or password</span>';
					header ('Location: index.php');						
				}
			}
				else
				{
					$_SESSION['blad'] = '<span style="color:red"> Error login or password</span>';
					header ('Location: index.php');
				}
		}	



?>