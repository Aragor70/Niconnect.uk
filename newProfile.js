



//		function dropping()
//		{
//			document.getElementById("myDropdown").classList.toggle("show");
//			
//		}
//		window.onclick = function (eve)
//		{
//			if(!event.target.matches('.textNaviDiv'))
//			{
//				var dropdown = document.querySelector('.personal-options');
//				
//				dropdown.classList.remove('show');
//			}
//		}
//		var dropdown = document.querySelector('.personal-options');
//		document.addEventListener("keyup", function(ev) {
//			if(ev.keyCode===27){
//				dropdown.classList.remove("show");
//			}
//		}, false);


		
		var personalTextEditBtn=document.querySelector("#personalTextEdit");
		personalTextEditBtn.addEventListener("click", function(ev){
			document.body.classList.add("desc-text-edit-opened");
			}, false);

		var descSubmit=document.querySelector("#descSubmit");
		descSubmit.addEventListener("click", function(ev){
			document.body.classList.remove("desc-text-edit-opened");
			}, false);

		document.addEventListener("keyup", function(ev) {
			if(ev.keyCode===27){
				document.body.classList.remove("desc-text-edit-opened");
			}
		}, false);
		
		var closeTextBtn=document.querySelector("#closeTextButton");
		closeTextBtn.addEventListener("click", function (ev){
			document.body.classList.remove("desc-text-edit-opened");
		}, false);		
		
		var personalPicturesBtn=document.querySelector("#personalEdit");
		personalPicturesBtn.addEventListener("click", function(){
			document.body.classList.add("edit-pic-opened");
		}, false);
		document.addEventListener("keyup", function(ev) {
			if(ev.keyCode===27){
				document.body.classList.remove("edit-pic-opened");
			}
		}, false);
		
		var closePicturesBtn=document.querySelector("#closePictureUploadButton");
		closePicturesBtn.addEventListener("click", function(ev){
			document.body.classList.remove("edit-pic-opened");
		}, false);
		

		


		
		
		
		

		
		