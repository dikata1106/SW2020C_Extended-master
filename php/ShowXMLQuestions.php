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
      <!--Código PHP para mostrar una tabla con las preguntas de la BD.<br/> La tabla incluye las imágenes de la BD.-->
      <?php
      echo '<table border="1px" class="table_QuestionsXML"> <tr> <th id="thQ"> AUTOR </th> <th id="thQ"> ENUNCIADO </th> <th id="thQ"> RESPUESTA </th> </tr>';
      $xml = simplexml_load_file("../xml/Questions.xml");
      foreach ($xml->children() as $assessmentItem) {
        $atributos = $assessmentItem->attributes();
        echo '<tr><td><a href=\"mailto:' . $atributos['author'] . '">' . $atributos['author'] . '</a></td> <td>' . $assessmentItem->itemBody->p . '</td> <td>' . $assessmentItem->correctResponse->response . '</td></tr>';
      }
      echo '</table>';
      ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>

</html>