<?php
session_start();

if (isset($_SESSION['correo'])) {
    if ($_SESSION['correo'] == "admin@ehu.es") {
        echo
            "<script> 
					alert('Debes de iniciar sesion como usuario');
                    window.location.href='Layout.php';
				</script>";
    }
} else {
    echo
        "<script> 
      alert('Debes de iniciar sesion como usuario');
      window.location.href = 'Layout.php';
    </script>";
}
?>
<!DOCTYPE html>
<html>

<head>
  <?php include '../html/Head.html' ?>
  <style>
    .error {
      color: darkred;
    }

    .success {
      color: darkgreen;
    }
  </style>
</head>

<body>
  <?php include '../php/Menus.php' ?>
  <?php include '../php/DbConfig.php' ?>
  <section class="main" id="s1">
    <div>
      <!--Código PHP para añadir una pregunta con imagen-->
      <br />
      <?php
        // Validacion como en ValidateFieldsQuestion.js
        $exprMail = "/((^[a-zA-Z]+(([0-9]{3})+@ikasle\.ehu\.(eus|es))$)|^[a-zA-Z]+(\.[a-zA-Z]+@ehu\.(eus|es)|@ehu\.(eus|es))$)/";
        $longPregunta = "/^.{10,}$/";
        $mail = $_REQUEST['Direccion_de_correo'];
        $preg = $_REQUEST['Pregunta'];
        $corr = $_REQUEST['Respuesta_correcta'];
        $incorr1 = $_REQUEST['Respuesta_incorrecta_1'];
        $incorr2 = $_REQUEST['Respuesta_incorrecta_2'];
        $incorr3 = $_REQUEST['Respuesta_incorrecta_3'];
        $complejidad = $_REQUEST['complejidad'];
        $tema = $_REQUEST['tema'];
        $imagen = $_FILES['file']['tmp_name'];

        if (!isset($mail, $preg, $corr, $incorr1, $incorr2, $incorr3, $complejidad, $tema)) {
          echo "<p class=\"error\">PHP error: variables indefinidas. Rellene bien el formulario<p><br/>";
          echo "<span><a href='javascript:history.back()'>Volver al formulario</a></span>";
        } else if (empty($mail) || empty($preg) || empty($corr) || empty($incorr1) || empty($incorr2) || empty($incorr3) || empty($complejidad) || empty($tema)) {
          echo "<p class=\"error\">¡Complete todos los campos obligatorios (*)!<p><br/>";
          echo "<span><a href='javascript:history.back()'>Volver al formulario</a></span>";
        } else if (!preg_match($exprMail, $mail)) {
          echo "<p class=\"error\">¡Formato de correo electronico invalido!<p><br/>";
          echo "<span><a href='javascript:history.back()'>Volver al formulario</a></span>";
        } else if (!preg_match($longPregunta, $preg)) {
          echo "<p class=\"error\">¡Se necesita pregunta con longitud minima de 10 caracteres!<p><br/>";
          echo "<span><a href='javascript:history.back()'>Volver al formulario</a></span>";
        } else {
          // Realizar conexion php
          $mysqli = mysqli_connect($server, $user, $pass, $basededatos);
          if (!$mysqli) {
            die("Fallo al conectar a MySQL: " . mysqli_connect_error());
            echo "<span><a href='javascript:history.back()'>Volver al formulario</a></span>";
          }
          // echo "Connection OK.";
          // Operar con la BD
          if ($imagen != "") { // same as isset($imagen)
            $imagen_b64 = base64_encode(file_get_contents($imagen));
            //$sql = "INSERT INTO preguntas(email, enunciado, respuestac, respuestai1, respuestai2, respuestai3, complejidad, tema, imagen) VALUES('$_REQUEST[Direccion_de_correo]', '$_REQUEST[Pregunta]', '$_REQUEST[Respuesta_correcta]', '$_REQUEST[Respuesta_incorrecta_1]', '$_REQUEST[Respuesta_incorrecta_2]', '$_REQUEST[Respuesta_incorrecta_3]', '$_REQUEST[complejidad]', '$_REQUEST[tema]', '$imagen_b64');";
            $sql = "INSERT INTO preguntas(email, enunciado, respuestac, respuestai1, respuestai2, respuestai3, complejidad, tema, imagen) VALUES('$mail', '$preg', '$corr', '$incorr1', '$incorr2', '$incorr3', '$complejidad', '$tema', '$imagen_b64');";
          } else {
            //$sql = "INSERT INTO preguntas(email, enunciado, respuestac, respuestai1, respuestai2, respuestai3, complejidad, tema) VALUES('$_REQUEST[Direccion_de_correo]', '$_REQUEST[Pregunta]', '$_REQUEST[Respuesta_correcta]', '$_REQUEST[Respuesta_incorrecta_1]', '$_REQUEST[Respuesta_incorrecta_2]', '$_REQUEST[Respuesta_incorrecta_3]', '$_REQUEST[complejidad]', '$_REQUEST[tema]');";
            $sql = "INSERT INTO preguntas(email, enunciado, respuestac, respuestai1, respuestai2, respuestai3, complejidad, tema) VALUES('$mail', '$preg', '$corr', '$incorr1', '$incorr2', '$incorr3', '$complejidad', '$tema');";
          }
          if (!mysqli_query($mysqli, $sql)) {
            die("Fallo al insertar en la BD: " . mysqli_error($mysqli));
            echo "<span><a href='javascript:history.back()'>Volver al formulario</a></span>";
          } else {
            // echo "<p class=\"success\">Pregunta guardada en la BD<p><br/>";
            // echo "<span><a href='ShowQuestionsWithImage.php'>Ver preguntas de la BD</a></span>";
            $xml = simplexml_load_file('../xml/Questions.xml');
            if (!$xml) {
                die("Error: Fallo al entrar en la carpeta xml");
                echo "<span><a href='javascript:history.back()'>Volver al formulario</a></span>";
            } else {
              $assessmentItem = $xml->addChild('assessmentItem');
              $assessmentItem->addAttribute('subject', $tema);
              $assessmentItem->addAttribute('author', $mail);
              $itemBody = $assessmentItem->addChild('itemBody');
              $itemBody->addChild('p', $preg);
              $correctResponse = $assessmentItem->addChild('correctResponse');
              $correctResponse->addChild('response', $corr);
              $incorrectResponses = $assessmentItem->addChild('incorrectResponses');
              $incorrectResponses->addChild('response', $incorr1);
              $incorrectResponses->addChild('response', $incorr2);
              $incorrectResponses->addChild('response', $incorr3);
              //$imagen = &assessmentItem->addChild('img');
              //$imagen->addChild(
              $xml->asXML();
              $xml->asXML('../xml/Questions.xml');
              //echo "Registro añadido correctamente en XML<br/>";
              echo "<script> alert(\"Pregunta guardada en XML\"); </script>";
            }
            // echo "Registro añadido correctamente en la BD<br/>";
            echo "<script> alert(\"Pregunta guardada en la BD\"); document.location.href='QuestionFormWithImage.php?logInMail=$logInMail'; </script>";
          }
          // Cerrar conexión
          mysqli_close($mysqli);
          // echo "Close OK.";
        }
      ?>
      <br />
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>

</html>