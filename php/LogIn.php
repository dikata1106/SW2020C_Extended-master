<?php
  session_start();
  if (isset($_SESSION['correo'])) {
    echo "<script> window.location.href='Layout.php'; alert('Actualmente existe sesion iniciada'); </script>";
    exit(1);
  }
?>

<!DOCTYPE html>
<html>

<head>
  <?php include '../html/Head.html' ?>
</head>

<body>
  <?php include '../php/Menus.php' ?>
  <?php include '../php/DbConfig.php' ?>
  <section class="main" id="s1">
    <div id='div1'>
      <form id="flogin" name="flogin" method="POST" enctype="multipart/form-data" action="LogIn.php">
        <table class="table_flogin">
          <tr>
            <th colspan='2'>
              <h2>Iniciar sesion</h2><br />
            </th>
          </tr>
          <tr>
            <td class="izda">Dirección de correo<sup>*</sup> </td>
            <td class="dcha"><input type="email" size="50" id="dirCorreo" name="dirCorreo"></td>
          </tr>
          <tr>
            <td class="izda">Contraseña<sup>*</sup></td>
            <td class="dcha"><input type="password" size="50" id="pass1" name="pass1"></td>
          </tr>
          <tr>
            <td align="center" colspan="2">
              <div id="buttons"><input type="submit" id="submit" value="Enviar"> <input type="reset" id="reset" value="Limpiar"></div>
            </td>
          </tr>
        </table>
      </form>
      <?php
        if (isset($_REQUEST['dirCorreo'])) {
          $email = $_REQUEST['dirCorreo'];
          $pass1 = $_REQUEST['pass1'];
          $mysqli = mysqli_connect($server, $user, $pass, $basededatos);
          if (!$mysqli) {
            die("Fallo al conectar con Mysql: " . mysqli_connect_error());
            echo "<span><a href='javascript:history.back()'>Volver</a></span>";
          }
          $sql = "SELECT * FROM usuarios WHERE email=\"" . $email . "\";";
          $resultado = mysqli_query($mysqli, $sql, MYSQLI_USE_RESULT);
          if (!$resultado) {
            die("Error: " . mysqli_error($mysqli));
            echo "<span><a href='javascript:history.back()'>Volver</a></span>";
          }
          $row = mysqli_fetch_array($resultado);
          if (!empty($row) && $row['email'] == $email && hash_equals($row['pass'], crypt($pass1, $row['pass']))) {
            if($row['estado']=="Bloqueado") {
              echo "<script> alert('Su cuenta esta actualmente bloqueada'); </script>";  
            } else {
              $_SESSION['correo']=$email;
              echo "<script> alert(\"¡Bienvenido!\"); </script>";
            }
            echo "<script> window.location.href='Layout.php'; </script>";
          } else {
            echo "<p class=\"error\">Usuario o contraseña incorrectos!<p><br/>";
          }
        }
      ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>

</html>