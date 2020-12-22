<?php
	session_start();

	include 'DbConfig.php';

	if (!isset($_SESSION['restablecer']) || !isset($_SESSION['codigo']) || !isset($_REQUEST['dirCorreo']) || !isset($_REQUEST['Pass']) || !isset($_REQUEST['Pass2']) || !isset($_REQUEST['Code'])) {
		echo '<script> alert("No tienes permitido acceder a esta página o estas accediendo de manera erronea"); window.location.href=\'Layout.php\' </script>';
		exit(1);
	}
	if (isset($_SESSION['restablecer']) && isset($_SESSION['codigo'])) {
		if (!empty($_REQUEST['dirCorreo']) && !empty($_REQUEST['Pass']) && !empty($_REQUEST['Pass2']) && !empty($_REQUEST['Code'])) {
			$regexMail = "/((^[a-zA-Z]+(([0-9]{3})+@ikasle\.ehu\.(eus|es))$)|^[a-zA-Z]+(\.[a-zA-Z]+@ehu\.(eus|es)|@ehu\.(eus|es))$)/";
			if (preg_match($regexMail, $_REQUEST['dirCorreo']) && $_REQUEST['dirCorreo'] == $_SESSION['restablecer']) {
				if ($_REQUEST['Pass'] == $_REQUEST['Pass2']) {
					if ($_REQUEST['Code'] == $_SESSION['codigo']) {
						$mysqli = mysqli_connect($server, $user, $pass, $basededatos);
						if (!$mysqli) {
							die("Fallo al conectar a MySQL: " . mysqli_connect_error());
						}
						$email = $_REQUEST['dirCorreo'];
						$pass = crypt($_REQUEST['Pass']);
						$sql = "UPDATE usuarios SET pass='$pass' where email='" . $email . "';";
						if (!mysqli_query($mysqli, $sql)) {
							die("Error: " . mysqli_error($mysqli));
						}
						mysqli_close($mysqli);
						unset($_SESSION['restablecer']);
						unset($_SESSION['codigo']);
						echo "5";
					} else {
						echo "4";
					}
				} else {
					echo "3";
				}
			} else {
				echo "2";
			}
		} else {
			echo "1";
		}
	} else {
		echo "6";
	}
?>