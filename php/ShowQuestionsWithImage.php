<?php
    session_start();

    if (isset($_SESSION['correo'])) {
        if ($_SESSION['correo'] == "admin@ehu.es") {
            echo "<script> window.location.href='Layout.php'; alert('Debes iniciar sesion como usuario'); </script>";
            exit(1);
        }
    } else {
        echo "<script> window.location.href = 'Layout.php'; alert('Debes iniciar sesion como usuario'); </script>";
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
    <div id="div1">
      <?php
        $link = mysqli_connect($server, $user, $pass, $basededatos);
        if (!$link) {
          die("Fallo al conectar con la base de datos: " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM preguntas;";
        $resul = mysqli_query($link, $sql);
        echo '<table border="1px" class="table_Questions"><tr id="thQ"><th>AUTOR</th><th>ENUNCIADO</th><th>RESPUESTA CORRECTA</th><th>RESPUESTA INCORRECTA 1</th> <th>RESPUESTA INCORRECTA 2</th><th>RESPUESTA INCORRECTA 3</th><th>COMPLEJIDAD</th><th>TEMA</th><th>IMAGEN</th></tr>';
        while ($row = mysqli_fetch_array($resul)) {
          echo "<tr><td><a href=\"mailto:" . $row['email'] . "\">" . $row['email'] . "</a></td><td>" . $row['enunciado'] . "</td><td>" . $row['respuestac'] . "</td><td>" . $row['respuestai1'] . "</td><td>" . $row['respuestai2'] . "</td><td>" . $row['respuestai3'] . "</td><td>" . $row['complejidad'] . "</td><td>" . $row['tema'] . "</td><td><img width=\"150\" height=\"150\" src=\"data:image/*;base64, " . $row['imagen'] . "\" alt=\"Sin imagen relacionada\"/></td></tr>";
        }
        echo "</table>";
        mysqli_close($link);
      ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>

</html>