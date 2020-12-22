function RestaurarContrasena() {
  if (XMLHttpRequest) xhr = new XMLHttpRequest();
  correo = document.getElementById("dirCorreo").value;
  xhr.open("GET", "../php/EnviarCorreo.php?dirCorreo=" + correo, true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      var result = xhr.responseText;
      if (result == "Succeed") {
        document.getElementById("message").innerHTML = "El mensaje ha sido enviado correctamente";
        document.getElementById("message").style.color = "darkgreen";
      } else {
        if (result == "Correo invalido") {
          document.getElementById("message").innerHTML = "Correo invalido";
          document.getElementById("message").style.color = "darkred";
        }
        else {
          if (result == "Correo vacío") {
            document.getElementById("message").innerHTML = "Correo vacío"
            document.getElementById("message").style.color = "darkred";
          }
          else {
            document.getElementById("message").innerHTML = "Error al enviar el correo";
            document.getElementById("message").style.color = "darkred";
          }
          // console.log(result);
          // alert(result);
        }
      }
    }
  };
  xhr.send("");
}
