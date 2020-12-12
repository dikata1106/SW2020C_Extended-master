function RestaurarContraseña() {
  if (XMLHttpRequest) xhr = new XMLHttpRequest();
  xhr.open(
    "GET",
    "../php/CambiarContraseña.php?dirCorreo=" +
      document.getElementById("dirCorreo").value +
      "&Pass=" +
      document.getElementById("pass").value +
      "&Pass2=" +
      document.getElementById("pass2").value +
      "&Code=" +
      document.getElementById("code").value,
    true
  );
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      var result = xhr.responseText;
      if (result == 1) {
        document.getElementById("message").innerHTML =
          "Parametros vacios, por favor rellene todos los parametros.";
      } else {
        if (result == 2) {
          document.getElementById("message").innerHTML = "Correo invalido.";
        } else {
          if (result == 3) {
            document.getElementById("message").innerHTML =
              "Las contraseñas no coinciden.";
          } else {
            if (result == 4) {
              document.getElementById("message").innerHTML =
                "El codigo no es correcto.";
            } else {
              if (result == 5) {
                document.getElementById("message").innerHTML =
                  "La contraseña ha sido modificada correctamente.";
              } else {
                if ((result = 6)) {
                  document.getElementById("message").innerHTML =
                    "La contraseña ya ha sido restablecida";
                } else {
                  document.getElementById("message").innerHTML =
                    result + result;
                }
              }
            }
          }
        }
      }
    }
  };
  xhr.send("");
}

function Clean() {
  CleanEmail();
  CleanPass();
}
