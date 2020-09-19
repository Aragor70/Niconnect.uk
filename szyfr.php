<?php

		include "zapisz.php";
		
	function setCode($polaczenie)
	{
		if(isset($_POST['editCode']))
				{
					$id = $_POST['id'];
					$edate = $_POST['edate'];
					$number = $_POST['number'];
					
					$sql = "UPDATE uzytkownik SET cphone='$number' WHERE id='$id'";
					$polacz = $polaczenie->query($sql);					
				}
	}	

					$id=$_SESSION['id'];
echo	"<form method='POST' action='".setCode($polaczenie)."'>
		<div class='oedit'>
			<input type='hidden' name='id' value='$id'>
			<input type='hidden' name='edate' value='".date('Y-m-d H:i:s')."'>
			<input type='number' name='number' placeholder='phone number' >
		</div><br />
		<input type='submit' name='editCode' value='Save' />
		</form>"; ?>



