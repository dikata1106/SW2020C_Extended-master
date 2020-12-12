<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/ShowAndHide.js"></script>
<?php include '../php/DbConfig.php' ?>
<style>
  p {
    color: maroon;
  }
</style>
<div id='page-wrap'>
  <header class='main' id='h1'>
    <span id="registro"><a href="SignUp.php">Registro</a></span>
    <span id="login"><a href="LogIn.php">Login</a></span>
    <span id="logout"><a href="LogOut.php">Logout</a></span>
    <span id="Contraseña"><a href='RestablecerContraseña.php'>Restablecer Contraseña</a></span>
    <!--<span id="logout" class="right" style="display:none;"><a href="/logout">Logout</a></span>-->

  </header>
  <nav class='main' id='n1' role='navigation'>
    <!--
  <span id="inicio"><a id="ini" href='Layout.php'>Inicio</a></span>
  <span id="insertar"><a id="ins" href='QuestionFormWithImage.php'>Insertar pregunta</a></span>
  <span id="creditos"><a id="cre" href='Credits.php'>Creditos</a></span>
  <span id="verBD"><a id="ver" href='ShowQuestionsWithImage.php'>Ver preguntas BD</a></span>
  <!--<span><a href='ShowQuestions.php'>Ver preguntas BD</a></span>-->
    <!--<span><a href='prueba.php'>DebugPHP</a></span>-->
    <?php
    /*if (isset($_REQUEST['logInMail'])) {
      $logInMail = $_REQUEST['logInMail'];
      echo "<span id='inicio'><a id='ini' href='Layout.php?logInMail=$logInMail'>Inicio</a></span>";
      // echo "<span id='insertar'><a id='ins' href='QuestionFormWithImage.php?logInMail=$logInMail'>Insertar pregunta</a></span>";
      echo "<span id='insertar'><a id='ins' href='HandlingQuizesAjax.php?logInMail=$logInMail'>Insertar pregunta</a></span>";
      echo "<span id='verBD'> <a id='ver' href='ShowQuestionsWithImage.php?logInMail=$logInMail'> Ver preguntas BD </a> </span>";
      echo "<span id='verXML'> <a id='ver2' href='ShowXMLQuestions.php?logInMail=$logInMail'> Ver preguntas XML </a> </span>";
      echo "<span id='verXSL'> <a id='ver3' href='ejemplotransformar1.php?logInMail=$logInMail'> Ver preguntas XSL </a> </span>";
      echo "<span id='creditos'> <a id='cre' href='Credits.php?logInMail=$logInMail'> Creditos </a> </span>";
     
      echo "<script> $(\"#h1\").append(\"<p>$logInMail</p>\"); </script>";
      //echo "<script> $(\"#h1\").append(\"<img/>\");";
      echo "<script> showOnLogIn(); </script>";
    } else {
      echo "<span id='inicio'><a id='ini' href='Layout.php'>Inicio</a></span>";
      // echo "<span id='insertar'><a id='ins' href='QuestionFormWithImage.php'>Insertar pregunta</a></span>";
      echo "<span id='insertar'><a id='ins' href='HandlingQuizesAjax.php?'>Insertar pregunta</a></span>";
      echo "<span id='verBD'> <a id='ver' href='ShowQuestionsWithImage.php'> Ver preguntas BD </a> </span>";
      echo "<span id='verXML'> <a id='ver2' href='ShowQuestionsWithImage.php'> Ver preguntas XML </a> </span>";
      echo "<span id='verXSL'> <a id='ver3' href='ejemplotransformar1.php'> Ver preguntas XSL </a> </span>";
      echo "<span id='creditos'> <a id='cre' href='Credits.php'> Creditos </a> </span>";
      echo "<script> showOnNotLogIn(); </script>";
    }*/
    echo "<span id='inicio'><a id='ini' href='Layout.php'>Inicio</a></span>";
    // echo "<span id='insertar'><a id='ins' href='QuestionFormWithImage.php'>Insertar pregunta</a></span>";
    echo "<span id='insertar'><a id='ins' href='HandlingQuizesAjax.php'>Insertar pregunta</a></span>";
    echo "<span id='verBD'> <a id='ver' href='ShowQuestionsWithImage.php'> Ver preguntas BD </a> </span>";
    echo "<span id='verXML'> <a id='ver2' href='ShowQuestionsWithImage.php'> Ver preguntas XML </a> </span>";
    echo "<span id='verXSL'> <a id='ver3' href='ejemplotransformar1.php'> Ver preguntas XSL </a> </span>";
    echo "<span id='admin'> <a id='adm' href='HandlingAccounts.php'> Gestionar cuentas </a> </span>";
    echo "<span id='creditos'> <a id='cre' href='Credits.php'> Creditos </a> </span>";

    /*
    function getImagenDeBD()
    {
      $mysqli = mysqli_connect($server, $user, $pass, $basededatos);
      if (!$mysqli) {
        die("Error: " . mysqli_connect_error);
        echo "<span><a href='javascript:history.back()'>Volver</a></span>";
      }
      $sql = "SELECT imagen FROM usuarios WHERE email=\"" . $logInMail . "\";";
      $resul = mysqli_query($mysqli, $sql, MYSQLI_USE_RESULT);
      if (!$resul) {
        die("Error: " . mysqli_error($mysqli));
        echo "<span><a href='javascript:history.back()'>Volver</a></span>";
      }
      $img = mysqli_fetch_array($resul);
      return $img['imagen'];
    }
    */

    if (isset($_SESSION['correo'])) {
      if ($_SESSION['correo'] == "admin@ehu.es") {
        echo "<script>LogInAdmin();</script>";
        echo "<script> $('#h1').append('<p>" . $_SESSION['correo'] . "</p>'); </script>";
      } else {
        echo "<script>showOnLogIn();</script>";
        echo "<script> $('#h1').append('<p>" . $_SESSION['correo'] . "</p>'); </script>";
      }
    } else {
      echo "<script>showOnNotLogIn();</script>";
    }
    ?>
  </nav>