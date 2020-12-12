function RestaurarContraseña() {
  if (XMLHttpRequest) xhr = new XMLHttpRequest();
  correo = document.getElementById("dirCorreo").value;
  xhr.open("GET", "../php/EnviarCorreo.php?dirCorreo=" + correo, true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      var result = xhr.responseText;
      if (result == "Succeed") {
        document.getElementById("message").innerHTML =
          "El mensaje ha sido enviado correctamente.";
      } else {
        if (result == "Correo invalido")
          document.getElementById("message").innerHTML = "Correo invalido.";
        else {
          if (result == "Correo vacío")
            document.getElementById("message").innerHTML = "Correo vacío.";
          else
            document.getElementById("message").innerHTML =
              "Error al enviar el correo";
          console.log(result);
          alert(result);
        }
      }
    }
  };
  xhr.send("");
}
