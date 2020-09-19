


	var profileWindowBtn = document.querySelector("#profileWindowButton");
	profileWindowBtn.addEventListener("click", function (ev) {
		ev.preventDefault();
		document.body.classList.add("profileWindowOpened");
	}, false);
	
		var profileCloseWindowBtn = document.querySelector("#profileCloseWindowButton");
	profileCloseWindowBtn.addEventListener("click", function (ev) {
		document.body.classList.remove("profileWindowOpened");
	}, false);
