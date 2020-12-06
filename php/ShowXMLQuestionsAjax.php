<?php
  //echo "<br/>";
  echo '<table border="1px" class="table_QuestionsXML"> <tr> <th id="thQ"> AUTOR </th> <th id="thQ"> ENUNCIADO </th> <th id="thQ"> RESPUESTA </th> </tr>';
  $xml = simplexml_load_file("../xml/Questions.xml");
  foreach ($xml->children() as $assessmentItem) {
    $atributos = $assessmentItem->attributes();
    echo '<tr><td><a href=\"mailto:' . $atributos['author'] . '">' . $atributos['author'] . '</a></td> <td>' . $assessmentItem->itemBody->p . '</td> <td>' . $assessmentItem->correctResponse->response . '</td></tr>';
  }
  echo '</table>';
?>