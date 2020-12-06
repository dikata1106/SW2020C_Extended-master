function CheckEmail(){
		 
	if(XMLHttpRequest)
        xhr = new XMLHttpRequest();
    xhr.open('GET','ClientVerifyEnrollment.php?Email='+document.getElementById('dirCorreo').value,true);
    xhr.onreadystatechange = function() {
	if(xhr.readyState == 4 && xhr.status == 200)
		if (xhr.responseText == 'SI') {
			document.getElementById('CheckEmail').style.color = 'darkgreen';
			document.getElementById('CheckEmail').innerHTML = 'Email verificado';
		} else if (xhr.responseText == 'NO') {
			document.getElementById('CheckEmail').style.color = 'darkred';
			document.getElementById('CheckEmail').innerHTML = 'Email no valido';
		} else {
			document.getElementById('CheckEmail').style.color = 'darkred';
			document.getElementById('CheckEmail').innerHTML = 'Sin servicio';
		}
	}
	xhr.send('');
}

function CleanEmail(){
	document.getElementById('CheckEmail').innerHTML = "";
}

function CheckPass(){
		 
	if(XMLHttpRequest)
        xhr = new XMLHttpRequest();
    xhr.open('GET','ClientVerifyPass.php?Pass='+document.getElementById("pass1").value);
    xhr.onreadystatechange = function(){
	if(xhr.readyState == 4 && xhr.status == 200)
		if (xhr.responseText == 'VALIDA'){
			document.getElementById('CheckPass').innerHTML = 'Contraseña verificada';
			document.getElementById('CheckPass').style.color = 'darkgreen';
		}else if(xhr.responseText == 'INVALIDA'){
			document.getElementById('CheckPass').innerHTML = 'Contraseña no valida';
			document.getElementById('CheckPass').style.color = 'darkred';	
		}else{
			document.getElementById('CheckPass').innerHTML = 'Sin servicio';
			document.getElementById('CheckPass').style.color = 'darkred';
		}		
	}
	xhr.send('');
}

function CleanPass(){
	document.getElementById('CheckPass').innerHTML = "";
}

function validarFormularioRegistro() {
	
	var tipo = $('#tipoUsu').val();
	var email = $('#dirCorreo').val();
	var nAp = $('#nAp').val();
	var pass1 = $('#pass1').val();
	var pass2 = $('#pass2').val();
	var checkEmail = document.getElementById('CheckEmail').innerHTML; 	// $('#CheckEmail').val();
	var checkPass = document.getElementById('CheckPass').innerHTML; 	// $('#CheckPass').val();
	var exprMailAlu = /^[a-zA-Z]+(([0-9]{3})+@ikasle\.ehu\.(eus|es))$/;
	var exprMailProf = /^[a-zA-Z]+(\.[a-zA-Z]+@ehu\.(eus|es)|@ehu\.(eus|es))$/;
	var exprPass = /^.{6,}$/;
	var exprNAP = /(\w.+\s).+/;
	//alert(checkEmail, checkPass);
                
	if(email == "" || nAp == "" || pass1 == "" || pass2 == "") {
		alert("Rellene todos los campos obligatorios (*)!");
		return false;
	} else if (checkEmail != "Email verificado") {
		alert(checkEmail);
		return false;
	} else if (checkPass != "Contraseña verificada") {
		alert(checkPass);
		return false;
	} else if(!nAp.test(exprNAP)) {
		alert("Formato Nombre Apellido(s) invalido!");
		return false;
	} else if(!pass1.test(exprPass)) {
		alert("Introduce contraseña con longitud minima de 6 caracteres!");
		return false;
	} else if(pass1 != pass2) {
		alert("Las contraseñas no coinciden!");
		return false;
	} else {
		if (tipo == '1' && !exprMailAlu.test(email)) {
			alert("Seleccione tipo de usuario adecuado (Profesor)");
		} else if (tipo == '2' && !exprMailProf.test(email)) {
			alert("Seleccione tipo de usuario adecuado (Alumno)");
		} else {
			return true;
		}
	}
}

$(document).ready(function () {
    $('#submit').click(function () {
        return validarFormularioRegistro();
    });
});