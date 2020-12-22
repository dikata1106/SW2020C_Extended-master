<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/ShowAndHide.js"></script>
<?php include '../php/DbConfig.php' ?>
<style>
  p {
    color: maroon;
  }
  .sessImg {
    position: absolute;
    margin-top: 0%;
    margin-left: 90%;
    margin-right: 5%;
    margin-bottom: 90%;
    height: 5%;
    width: 5%;
}
</style>
<div id='page-wrap'>

  <header class='main' id='h1'>
    <span id="registro"><a href="SignUp.php">Registro</a></span>
    <span id="login"><a href="LogIn.php">Login</a></span>
    <span id="logout"><a href="LogOut.php">Logout</a></span>
    <span id="Contraseña"><a href='RestablecerContraseña.php'>Restablecer Contraseña</a></span>
  </header>

  <nav class='main' id='n1' role='navigation'>

    <?php

    echo "<span id='inicio'><a id='ini' href='Layout.php'>Inicio</a></span>";
    echo "<span id='insertar'><a id='ins' href='HandlingQuizesAjax.php'>Insertar pregunta</a></span>";
    echo "<span id='verBD'> <a id='ver' href='ShowQuestionsWithImage.php'> Ver preguntas BD </a> </span>";
    echo "<span id='verXML'> <a id='ver2' href='ShowQuestionsWithImage.php'> Ver preguntas XML </a> </span>";
    echo "<span id='verXSL'> <a id='ver3' href='ejemplotransformar1.php'> Ver preguntas XSL </a> </span>";
    echo "<span id='admin'> <a id='adm' href='HandlingAccounts.php'> Gestionar cuentas </a> </span>";
    echo "<span id='creditos'> <a id='cre' href='Credits.php'> Creditos </a> </span>";

    function getImagenDeBD(){
      include '../php/DbConfig.php';
      if(isset($_SESSION['picture'])){
        return "";	
      } else if(isset($_SESSION['correo'])){
              $mysqli = mysqli_connect($server, $user, $pass, $basededatos);
              if(!$mysqli){
                  die("Error: ".mysqli_connect_error);
              }
              $sql = "SELECT imagen FROM usuarios WHERE email=\"".$_SESSION['correo']."\";";
              $resul = mysqli_query($mysqli,$sql, MYSQLI_USE_RESULT);
              if(!$resul){
                  die("Error: ".mysqli_error($mysqli));
              }
              $img = mysqli_fetch_array($resul);
              return $img['imagen'];
          }
          else{
              return "";
          }
      }

    if (isset($_SESSION['correo'])) {
      if ($_SESSION['correo'] == "admin@ehu.es") {
        echo "<script>LogInAdmin();</script>";
        echo "<script> $('#h1').append('<p>" . $_SESSION['correo'] . "</p>'); </script>";
      } else {
        echo "<script>showOnLogIn();</script>";
        echo "<script> $('#h1').append('<p>" . $_SESSION['correo'] . "</p>'); </script>";
      }
      echo '<script> $("#h1").append("<div class=\"sessImg\"><img width=\"60\" height=\"65\" src=\"data:image/*;base64,'.getImagenDeBD().'\" alt=\"Imagen\"/></div>");  </script>';
    } else {
      echo "<script>showOnNotLogIn();</script>";
    }
    ?>
  </nav>