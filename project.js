

		var contactMeBtn= document.querySelector(".contact-me-btn");
		contactMeBtn.addEventListener("click", function() {
			document.body.classList.add("modal-opened");
		}, false);
		var closeModalBtn= document.querySelector(".modal .close-btn");
		closeModalBtn.addEventListener("click", function() {
			document.body.classList.remove("modal-opened");
		}, false);
		
		document.addEventListener("keyup", function(ev) {
			if(ev.keyCode===27){
				document.body.classList.remove("modal-opened");
			}
		}, false);