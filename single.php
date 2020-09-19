<?php

		//kod php dla portalu uzytkownika bez edycji przy uzyciu get id w adresie strony


		if(isset($_GET['profilowy']))
			{
					//polaczenie z connect.php
				require_once "connect.php";
				mysqli_report(MYSQLI_REPORT_STRICT);
				try
				{
					$polaczenie= new mysqli($host, $db_user, $db_password, $db_name);
					if($polaczenie -> connect_errno!=0)
						{
							throw new Exception(mysqli_connect_errno());
						}
							else
								{
						
								$user = $_GET['profilowy'];
								$select= $polaczenie -> query("SELECT * FROM uzytkownik WHERE user = '".$user."'");
									
									$ilu_userow= $select -> num_rows;
									
									if($ilu_userow>0)
										{
											$row = $select -> fetch_assoc();
											// echo w pozostalych wierszach kodu
									
									
											
										}
									else
									{
										echo "No users";
									}
									$polaczenie -> close();
								}
								
				}
					Catch (Exception $e)
					{
						echo '<span style="color:red;">Błąd połączenia witryny z serwerem, Pozdrawiam</span>';
					//	echo '<br />Informacja o błędzie ze strony serwera: '.$e;
					}
			}