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
		if ($resultado) {
			$email = $_REQUEST['dirCorreo'];

			$to = $email;
			$subject = "Recuperación de contraseña";

			$codigo = rand(10000, 99999);

			$_SESSION['restablecer'] = $email;
			$_SESSION['codigo'] = $codigo;

			$message = "
			<html>
			<head>
			<tittle>Recuperación de contraseña</tittle>
			</head>
			<body>
			<h3>Pasos a realizar para recuperrar tu contraseña:</h3>
			<ol>
				<li>Entra en el link proporcionado.</li>
				<li>Introduce el codigo proporcionado y la nueva contraseña.</li>
				<li>Si todo va bien la página te notificará y habrás cambiado tu contraseña.</li>
			</ol>
			<h3>Link a la página de recuperación:</h3>
			<h2><a href ='document.location.href=\'RestablecerContraseñaCodigo.php\''>Restablecer Contraseña</a></h2>
			<h3>Código de recuperación:</h3>
			<h2>" . $codigo . "</h2>
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
