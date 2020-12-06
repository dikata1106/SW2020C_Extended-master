function verImagen(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    var verImagen = document.createElement("img");
    verImagen.id = "verImagen";
    document.getElementById("imgDynamica").appendChild(verImagen);

    reader.onload = function (e) {
      $("#verImagen").attr("src", e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
    verImagen.width = "150";
    verImagen.height = "150";
  }
}

$(document).ready(function () {
  $("#file").change(function () {
    $("#verImagen").remove();
    verImagen(this);
  });
  $("#reset").click(function () {
    $("#verImagen").remove();
  });
});
