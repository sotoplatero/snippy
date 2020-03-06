

document.getElementById('btn-photo').addEventListener('click', function(evt) {
	evt.preventDefault();
	var editor = document.querySelector(".CodeMirror")
	html2canvas(editor).then( canvas => {
		let link = document.createElement('a');
		link.style.display = 'none';
		link.setAttribute('href', canvas.toDataURL("image/jpeg"));
		link.setAttribute('download', 'snippy.png');

		document.body.appendChild(link);

		link.click();
		document.body.removeChild(link);	    
	});
});
