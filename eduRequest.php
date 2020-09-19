

	<?php
		
		$targetPath = "photo/" . basename($_FILES["myFile"]["name"]);
		move_uploaded_file($_FILES["myFile"]["tmp_name"], $targetPath);


		?>
		
