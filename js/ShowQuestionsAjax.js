function VerPreguntas() {
  if(XMLHttpRequest) xhr = new XMLHttpRequest();
  xhr.open("GET", "ShowXMLQuestionsAjax.php", true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200)
      document.getElementById("res").innerHTML = xhr.responseText;
  };
  xhr.send("");
}
