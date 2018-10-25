

//notes contents (title and body)
		function submitNote(){

			if(form1.ntitle.value === "" || form1.nbody.value === ""){
				alert('Please ensure that no field is empty on submission!');
				return;
			}

				var ntle = form1.ntitle.value;
				var ntitle = ntle.toLowerCase();
				var nbody = form1.nbody.value;

				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function(){
					if(xmlhttp.readyState === 4 && xmlhttp.status === 200){
						document.getElementById('notes-log').innerHTML = xmlhttp.responseText;
					}
				}
			/*
			 the url in .open() contains the requests to be sent to actual URL for  further processing
			 and its name must be exact as variable in which the data was collected i.e ntitle & nbody in the case of this particular request.
			*/
			xmlhttp.open("GET","insert_notes.php?&ntitle=" + ntitle + "&nbody=" + nbody,true);
			xmlhttp.send();
			//after submission, the overlay is closed
			off();
		}

	//number of saved notes
		function loadCount(){
			off();
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function(){
				if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
					document.getElementById('saved-notes-count').innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open('GET', 'saved_notes_count.php',true);
			xmlhttp.send();
		}

	//load clicked notes content
		
		function displayNote(res){
			//var res = document.getElementById('no')
			var note_content = res.innerHTML;
			
			document.getElementById('file-text-o').style.display = "none";
			document.getElementById('click-text').style.display = "none";
		
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function(){
				if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
					document.getElementById('note-display').innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open('GET','displayNote.php?&note_content=' + note_content,true);
			xmlhttp.send();
			document.getElementById('note-display').style.display = "block";

		}
		
		//jquery
		$(document).ready(function(e){
		//disables page from loading old data from browser cache
			$.ajaxSetup({cache:false});
		//loads contents from the notes_log.php into the notes_log div after 3 seconds
			setInterval(function(){
				$('#notes-log').load('notes_log.php'); 
			},3000);

			setInterval(function(){
				$('#saved-notes-count').load('saved_notes_count.php');
			},3000);

		
			
		});