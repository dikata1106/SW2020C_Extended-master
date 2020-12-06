<!DOCTYPE html>
<html>

<head>
    <?php include '../html/Head.html' ?>
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/ShowImageInForm.js"></script>
    <script src="../js/CheckEmailOrPass.js"></script>
</head>

<body>
    <?php include '../php/Menus.php' ?>
    <?php include '../php/DbConfig.php' ?>
    <section class="main" id="s1">
        <div id="div1">
            <form id="fregister" name="fregister" method="POST" enctype="multipart/form-data" action="SignUp.php">
                <table class="table_fregister">
                    <tr>
                        <th colspan="2">
                            <h2>Registro de nuevo usuario</h2><br />
                        </th>
                    </tr>
                    <tr>
                        <td class="izda">Tipo de usuario<sup>*</sup> </td>
                        <td class="dcha">
                            <select id="tipoUsu" name="tipoUsu">
                                <option value="1" selected>Alumno</option>
                                <option value="2">Profesor</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="izda">Dirección de correo<sup>*</sup> </td> <td class="dcha"> <input type="email" size="50" id="dirCorreo" name="dirCorreo" onfocus="CleanEmail()" onblur="CheckEmail()"> <span id="CheckEmail" ></span></td>
                        
                    </tr>
                    <tr>
                        <td class="izda">Nombre y apellido(s)<sup>*</sup> </td> <td class="dcha"> <input type="text" size="50" id="nAp" name="nAp"></td>
                    </tr>
                    <tr>
                        <td class="izda">Contraseña (long>5)<sup>*</sup> </td> <td class="dcha"> <input type="password" size="50" id="pass1" name="pass1" onfocus="CleanPass()" onblur="CheckPass()"> <span id="CheckPass" ></span></td>
                    </tr>
                    <tr>
                        <td class="izda">Repite la contraseña<sup>*</sup> </td> <td class="dcha"> <input type="password" size="50" id="pass2" name="pass2"></td>
                    </tr>
                    <tr>
                        <td class="izda">Foto de perfil (opc) </td> <td class="dcha"> <input type="file" id="file" accept="image/*" name="file">
                            <div id="imgDynamica"></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" id="submit" value="Enviar"> <input type="reset" id="reset" value="Limpiar"></td>
                    </tr>
                </table>
            </form>
            <div>
            <?php
            if (isset($_REQUEST['dirCorreo'])) {
                $exprMail = "/((^[a-zA-Z]+(([0-9]{3})+@ikasle\.ehu\.(eus|es))$)|^[a-zA-Z]+(\.[a-zA-Z]+@ehu\.(eus|es)|@ehu\.(eus|es))$)/";
                $exprMailAlu = "/^[a-zA-Z]+(([0-9]{3})+@ikasle\.ehu\.(eus|es))$/";
                $exprMailProf = "/^[a-zA-Z]+(\.[a-zA-Z]+@ehu\.(eus|es)|@ehu\.(eus|es))$/";
                $exprPass = "/^.{6,}$/";
                $exprNAP = "/(\w.+\s).+/";
                $tipo = $_REQUEST['tipoUsu'];
                $mail = $_REQUEST['dirCorreo'];
                $nAp = $_REQUEST['nAp'];
                $pass1 = $_REQUEST['pass1'];
                $pass2 = $_REQUEST['pass2'];
                $imagen = $_FILES['file']['tmp_name'];
                $estado = 'Activo';
                /* debugger
                        echo $tipo, $mail, $nAp, $pass1, $pass2, $imagen;
                        if(!isset($tipo)) echo "tipo ";
                        if(!isset($mail)) echo "mail ";
                        if(!isset($nAp)) echo "nAp ";
                        if(!isset($pass1)) echo "pass1 ";
                        if(!isset($pass2)) echo "pass2 ";
                        */
                if (!isset($tipo, $mail, $nAp, $pass1, $pass2)) {
                    echo "<p class=\"error\">PHP error: variables indefinidas. Rellene bien el formulario<p><br/>";
                    // echo "<span><a href='javascript:history.back()'>Volver al formulario</a></span>";
                } else if (empty($tipo) || empty($mail) || empty($nAp) || empty($pass1) || empty($pass2)) {
                    echo "<p class=\"error\">¡Complete todos los campos obligatorios (*)!<p><br/>";
                    // echo "<span><a href='javascript:history.back()'>Volver al formulario</a></span>";
                } else if (!preg_match($exprMail, $mail)) {
                    echo "<p class=\"error\">¡Formato de correo electronico invalido!<p><br/>";
                    // echo "<span><a href='javascript:history.back()'>Volver al formulario</a></span>";
                } else if ((preg_match($exprMailAlu, $mail) && $tipo != "1") || (preg_match($exprMailProf, $mail) && $tipo != "2")) {
                    echo "<p class=\"error\">¡Formato de correo incorrecto para el tipo de usuario seleccionado!<p><br/>";
                    // echo "<span><a href='javascript:history.back()'>Volver al formulario</a></span>";
                } else if (!preg_match($exprNAP, $nAp)) {
                    echo "<p class=\"error\">¡Debe insertar minimo un nombre y un apellido!<p><br/>";
                    // echo "<span><a href='javascript:history.back()'>Volver al formulario</a></span>";
                } else if (!preg_match($exprPass, $pass1) || !preg_match($exprPass, $pass2)) {
                    echo "<p class=\"error\">¡Longitud minima de la contraseña debe ser de 6 caracteres!<p><br/>";
                    // echo "<span><a href='javascript:history.back()'>Volver al formulario</a></span>";
                } else if ($pass1 != $pass2) {
                    echo "<p class=\"error\">¡Las contraseñas no coinciden!<p><br/>";
                    // echo "<span><a href='javascript:history.back()'>Volver al formulario</a></span>";
                } else {
                    $mysqli = mysqli_connect($server, $user, $pass, $basededatos);
                    if (!$mysqli) {
                        die("Fallo al conectar a MySQL: " . mysqli_connect_error());
                        echo "<span><a href='javascript:history.back()'>Volver al formulario</a></span>";
                    }
                    $pass = crypt($pass1, './0-9A-Za-z');
                    if ($imagen == "") {
                        $imagen = "../images/anonimo.jpg";
                    }
                    $imagen_b64 = base64_encode(file_get_contents($imagen));
                    $sql = "INSERT INTO usuarios(tipousu, email, nomap, pass, estado, imagen) VALUES ('$tipo', '$mail', '$nAp', '$pass', '$estado', '$imagen_b64');";
                    if (!mysqli_query($mysqli, $sql)) {
                        die("Fallo al insertar en la BD: " . mysqli_error($mysqli));
                        echo "<span><a href='javascript:history.back()'>Volver al formulario</a></span>";
                    } else {
                        // echo "<p class=\"success\">Registrado correctamente<p><br/>";
                        // echo "<span><a href='LogIn.php'>Log In</a></span>";
                        echo "<script> alert(\"Registrado correctamente\"); document.location.href='LogIn.php'; </script>";
                    }
                    // Cerrar conexión
                    mysqli_close($mysqli);
                    // echo "Close OK.";
                }
            }
            ?>
        </div>
        </div>
        
    </section>
    <?php include '../html/Footer.html' ?>
</body>

</html>