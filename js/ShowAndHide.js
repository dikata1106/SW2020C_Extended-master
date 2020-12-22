function showOnLogIn() {
  $("#registro").hide();
  $("#Contraseña").hide();
  $("#login").hide();
  $("#logout").show();
  $("#inicio").show();
  $("#insertar").show();
  $("#creditos").show();
  $("#verBD").show();
  $("#verXML").hide();
  $("#verXSL").hide();
  $("#admin").hide();
  $("#loginSocial").hide();
}

function LogInAdmin() {
  $("#registro").hide();
  $("#Contraseña").hide();
  $("#login").hide();
  $("#logout").show();
  $("#inicio").show();
  $("#insertar").hide();
  $("#creditos").show();
  $("#verBD").hide();
  $("#verXML").hide();
  $("#verXSL").hide();
  $("#admin").show();
  $("#loginSocial").hide();
}

function showOnNotLogIn() {
  $("#registro").show();
  $("#Contraseña").show();
  $("#login").show();
  $("#logout").hide();
  $("#inicio").show();
  $("#insertar").hide();
  $("#creditos").show();
  $("#verBD").hide();
  $("#verXML").hide();
  $("#verXSL").hide();
  $("#admin").hide();
  $("#loginSocial").show();
}

function showOnLogG() {
  $("#registro").hide();
  $("#Contraseña").hide();
  $("#login").hide();
  $("#logout").show();
  $("#inicio").show();
  $("#insertar").show();
  $("#creditos").show();
  $("#verBD").show();
  $("#verXML").hide();
  $("#verXSL").hide();
  $("#admin").hide();
  $("#loginSocial").hide();
}

$(document).ready(function () {});
