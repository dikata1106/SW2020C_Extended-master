<?php
    session_start();

    if (isset($_SESSION['correo'])) {
        if ($_SESSION['correo'] == "admin@ehu.es") {
            echo "<script> alert('Debes iniciar sesion como usuario'); window.location.href='Layout.php'; </script>";
            exit(1);
        }
    } else {
        echo "<script> alert('Debes iniciar sesion como usuario'); window.location.href = 'Layout.php'; </script>";
        exit(1);
    }
?>
<!DOCTYPE html>
<html>

<head>
    <?php include '../html/Head.html' ?>
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/AddQuestionsAjax.js"></script>
    <script src="../js/ShowQuestionsAjax.js"></script>
    <script src="../js/CountQuestionsAjax.js"></script>
    <script src="../js/ValidateFieldsQuestion.js"></script>
    <script src="../js/ShowImageInForm.js"></script>
</head>

<body>
    <?php include '../php/Menus.php' ?>
    <section class="main" id="s1">
        <div id="div1">
            <form id='fquestion' name='fquestion' enctype='multipart/form-data'>
                <table class="table_QuestionForm">
                    <tr>
                        <th colspan="2">
                            <h2>Insertar pregunta</h2><br />
                        </th>
                    </tr>
                    <tr>
                        <td class="izda">Direccion de correo<sup>*</sup></td>
                        <td class="dcha"><input type="text" size="75" id="dirCorreo" name="Direccion de correo"
                                value="<?php echo $_SESSION['correo'] ?>" readonly></td>
                    </tr>
                    <tr>
                        <td class="izda">Enunciado de pregunta<sup>*</sup></td>
                        <td class="dcha"><input type="text" size="75" id="pregunta" name="Pregunta"></td>
                    </tr>
                    <tr>
                        <td class="izda">Respuesta correcta<sup>*</sup></td>
                        <td class="dcha"><input type="text" size="75" id="respuestaCorrecta" name="Respuesta correcta">
                        </td>
                    </tr>
                    <tr>
                        <td class="izda">Respuesta incorrecta 1<sup>*</sup></td>
                        <td class="dcha"><input type="text" size="75" id="respuestaIncorrecta1"
                                name="Respuesta incorrecta 1"></td>
                    </tr>
                    <tr>
                        <td class="izda">Respuesta incorrecta 2<sup>*</sup></td>
                        <td class="dcha"><input type="text" size="75" id="respuestaIncorrecta2"
                                name="Respuesta incorrecta 2"></td>
                    </tr>
                    <tr>
                        <td class="izda">Respuesta incorrecta 3<sup>*</sup></td>
                        <td class="dcha"><input type="text" size="75" id="respuestaIncorrecta3"
                                name="Respuesta incorrecta 3"></td>
                    </tr>
                    <tr>
                        <td class="izda">Tema<sup>*</sup></td>
                        <td class="dcha"><input type="text" size="75" id="tema" name="tema"></td>
                    </tr>
                    <tr>
                        <td class="izda">
                            Complejidad<sup>*</sup></td>
                        <td class="dcha">
                            <select id="complejidad" name="complejidad">
                                <option value="1">Baja</option>
                                <option value="2" selected>Media</option>
                                <option value="3">Alta</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="file" id="file" accept="image/*" name="file">
                            <div id="imgDynamica"></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="button" id="insert" value="Insertar Pregunta">
                            <input type="button" id="Show" onClick="VerPreguntas()" value="Ver preguntas">
                            <input type="reset" id="reset" value="Limpiar">
                        </td>
                    </tr>
                </table>
            </form>
            <br /><br />
            <div id="contadores">
                <h4>TOT PREGUNTAS / TUS PREGUNTAS</h4>
                <div id="contPreguntas"></div>
            </div>
            <img id="cargando" src="../images/cargando.gif" height="30">
            <div id="res"></div>
        </div>
        </div>
    </section>
    <?php include '../html/Footer.html' ?>
</body>

</html>