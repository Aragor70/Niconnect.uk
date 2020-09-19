		<div class="two">
		<div class="wodnica"><img src=".jpg" ></div>
		
					<div class="textlog">Log in or Create Your Account
					</div>
				<div class="log">
					<div class="zaloguj">
				<form id="logForm" method="post">
						<div class="ologin">Your login:
								<p><input type="text" id="login" name="login"/></p>
						</div>
						<div class="opassword">Your password:
							<p><input type="password" id="haslo" name="haslo"/></p>
						</div>
						<br /><br /><br /><br /><br /><br />
						<input class="logSubmit" type="submit" value="Log in"/>
				</form>
						<div class="ologerror" id="ologerror">
						<?php
						if (isset ($_SESSION['blad']))
						{
							echo $_SESSION['blad'];
						}
						?>
						</div>
						<div class="reginfo">
						<p>Don't you have The Account yet? Well, Take your chance:</p>
						<p><a class="regsend" href="register.php" style="font-size: 17px;">Create it now</a></p>
						</div>
					</div>
				</div>
				
					<script>
						var logForm=document.getElementById("logForm");
						var login=document.getElementById("login");
						var password=document.getElementById("haslo");
						
							logForm.addEventListener("submit", zaloguj);
							function zaloguj(e){
								e.preventDefault();
								var http = new XMLHttpRequest();

								http.addEventListener('load', function(e){
								//	window.location.href = 'index.php';
									location.reload();
							
								});
								http.addEventListener('error', function(e){
									alert("We found some error");
							
								});							
								http.open("POST", "zaloguj.php", true);
								
								http.send(new FormData(logForm));
								
							}
							
						
						
						
					</script>
					

		</div>