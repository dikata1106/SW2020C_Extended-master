function validarCorreo(correo) {

    var correoAlumno = /^[a-zA-Z]+(([0-9]{3})+@ikasle\.ehu\.(eus|es))$/;
    var correoProfesor = /^[a-zA-Z]+(\.[a-zA-Z]+@ehu\.(eus|es)|@ehu\.(eus|es))$/;
    var correoGmail = /^[\w.+\-]+@gmail\.com$/;

    if (correoAlumno.test(correo) || correoProfesor.test(correo) || correoGmail.test(correo))
        return true;
    else
        return false;
}

function validarFormulario() {

    if ($('#dirCorreo').val() == "" ||
        $('#pregunta').val() == "" ||
        $('#respuestaCorrecta').val() == "" ||
        $('#respuestaIncorrecta1').val() == "" ||
        $('#respuestaIncorrecta2').val() == "" ||
        $('#respuestaIncorrecta3').val() == "" ||
        $('#tema').val() == "") {
        alert("¡Complete todos los campos obligatorios (*)!");
        return false;
    } else if (!validarCorreo($('#dirCorreo').val())) {
        alert("¡Formato de correo electronico invalido!");
        return false;
    } else if ($('#pregunta').val().length < 10) {
        alert("¡Se necesita pregunta con longitud minima de 10 caracteres!");
        return false;
    } else {
        return true;
    }
}

$(document).ready(function () {
    $('#submit').click(function () {
        return validarFormulario();
    });
    $("#reset").click(function () {
        $("#res").empty();
    });
});

// El boton reset (input type="reset") no necesita funcion de atencion, ya que por defecto resetea el form