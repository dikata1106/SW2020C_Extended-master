$(document).ready(function () {

  $('#insert').click(function (event) {
    event.preventDefault();
    if (validarFormulario()) {
      var formulario = document.getElementById('fquestion');
      var data = new FormData(formulario);
      $.ajax({
        type: 'POST',
        enctype: 'multipart/form-data',
        url: "../php/AddQuestionWithImage.php",
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 500000,
        success: function (data) {
          alert("Pregunta guardada en la BD y en XML");
          $("#reset").click();
          $("#res").click(VerPreguntas());
        },
        error: function (e) {
          alert('Error');
        }
      });
    }
  });

});