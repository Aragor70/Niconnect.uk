

	var msgBtn=document.querySelector(".msg-btn");
	msgBtn.addEventListener("click", function(){
		document.body.classList.add("msg-opened");
	}, false);
	
	var closeMsgBtn=document.querySelector(".close-msg-btn");
	closeMsgBtn.addEventListener("click", function(){
		document.body.classList.remove("msg-opened");
	}, false);
	