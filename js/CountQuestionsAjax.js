setInterval(function () {
	if (XMLHttpRequest)
		xhr = new XMLHttpRequest();
	xhr.open('GET', 'CountXMLQuestions.php?logInMail=' + document.getElementById('dirCorreo').value, true);
	xhr.onreadystatechange = function () {
		if (xhr.readyState == 3 && xhr.status == 200)
			document.getElementById('cargando').style.visibility = "visible";

		if (xhr.readyState == 4 && xhr.status == 200) {
			document.getElementById('cargando').style.visibility = "hidden";
			//document.getElementById('cargando').remove();
			document.getElementById('contPreguntas').innerHTML = xhr.responseText;
		}
	}
	xhr.send('');
}, 10000);