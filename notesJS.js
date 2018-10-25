	

	

	function on(){ // displays overlay
			document.getElementById('new-note-overlay').style.display = "block";
	}
	function off(){ // hides/closes overlay
		document.getElementById('note_title').value = "";
		document.getElementById('note_body').value = "";
		document.getElementById('new-note-overlay').style.display = "none";

	}	

	function showNote(){
		var ntitle123 = document.getElementById('note-title');
		 alert(ntitle123.textContent);
	}

	/*
	*when user clicks on the button, it toggles between hiding and showing 
	*the dropdown content
	*/
	function dropdown(){
			document.getElementById("dropdownContent").classList.toggle("show");
		}
	//close dropdown menu if user clicks outside of it
	window.onclick = function(event){
		//check if options btn was clicked
		if(!event.target.matches('#opt')){

			var dropdowns = document.getElementsByClassName('dropdownContent-opt');
			var i;
			for(var i = 0; i < dropdowns.length; i++){
				var openDropDown = dropdowns[i];
				if(openDropDown.classList.contains('show')){
					openDropDown.classList.remove('show');
				}
			}
		}
	}

