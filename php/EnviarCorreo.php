<?php
session_start();
include 'DbConfig.php';
if (isset($_REQUEST['dirCorreo'])) {
	if (!empty($_REQUEST['dirCorreo'])) {
		$mysqli = mysqli_connect($server, $user, $pass, $basededatos);
		if (!$mysqli) {
			die("Fallo al conectar a MySQL: " . mysqli_connect_error());
		}

		$sql = "SELECT * FROM usuarios WHERE email=\"" . $_REQUEST['dirCorreo'] . "\";";
		$resultado = mysqli_query($mysqli, $sql, MYSQLI_USE_RESULT);
		if (!$resultado) {
            die("Error: " . mysqli_error($mysqli));
        }
		$row = mysqli_fetch_array($resultado);
		if (!empty($row)){
			$email = $_REQUEST['dirCorreo'];

			$to = $email;
			$subject = "Recuperación de contrasena";

			$codigo = rand(10000, 99999);

			$_SESSION['restablecer'] = $email;
			$_SESSION['codigo'] = $codigo;

			$message = "
			<html>
			<head>
			<tittle>Recuperacion de contrasena</tittle>
			</head>
			<body>
			<h3>Pasos a realizar para recuperrar tu contrasena:</h3>
			<ol>
				<li>Entra en el link proporcionado.</li>
				<li>Introduce el codigo proporcionado y la nueva contrasena.</li>
				<li>Si todo va bien la pagina te lo notificara y habras cambiado tu contrasena.</li>
			</ol>
			<h3>Link a la pagina de recuperacion:</h3>
			<h4><a href ='https://ws20g13.000webhostapp.com/ws20g13_Extended-master/php/RestablecerContrasenaCodigo.php'>Restablecer Contrasena</a></h2>
			<h3>Codigo de recuperacion:</h3>
			<h4 style='color:red'>" . $codigo . "</h2>
			</body>
			</html>
			";

			$headers = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'To: ' . $to . "\r\n";
			$headers .= 'From: Daniel <druskov001@ikasle.ehu.eus>' . "\r\n";
			mail($to, $subject, $message, $headers);

			echo "Succeed";
		} else {
			echo "Correo invalido";
		}
		mysqli_close($mysqli);
	} else {
		echo "Correo vacío";
	}
} else {
	echo "Correo vacío";
}
