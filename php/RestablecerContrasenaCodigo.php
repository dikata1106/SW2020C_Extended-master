<?php
session_start();

	if (!isset($_SESSION['restablecer']) || !isset($_SESSION['codigo'])) {
		echo "<script> 	alert('No tienes permitido acceder a esta página'); window.location.href=\'Layout.php\'; </script>";
		exit(1);
	} else {
		include 'DbConfig.php';

		if (isset($_REQUEST['dirCorreo'])) {
			if(!isset($_REQUEST['dirCorreo']) || !isset($_REQUEST['Pass']) || !isset($_REQUEST['Pass2']) || !isset($_REQUEST['Code'])) {
				echo "<script> alert('PHP error: variables indefinidas. Rellene bien el formulario'); </script>";
			} else if (empty($_REQUEST['dirCorreo']) || empty($_REQUEST['Pass']) || empty($_REQUEST['Pass2']) || empty($_REQUEST['Code'])) {
				echo "<script> alert('Rellene todos los campos obligatorios(*)!'); </script>";
			} else if ($_REQUEST['dirCorreo'] != $_SESSION['restablecer']) {
				echo "<script> alert('No se ha solicitado restablecimiento de correo del email introducido'); </script>";
			} else if ($_REQUEST['Pass'] != $_REQUEST['Pass2']) {
				echo "<script> alert('Las contraseñas no coinciden'); </script>";
			} else if ($_REQUEST['Code'] != $_SESSION['codigo']) {
				echo "<script> alert('Codigo invalido'); </script>";
			} else {
				$mysqli = mysqli_connect($server, $user, $pass, $basededatos);
				if (!$mysqli) {
					die("Fallo al conectar a MySQL: " . mysqli_connect_error());
				}
				$email = $_REQUEST['dirCorreo'];
				$pass = crypt($_REQUEST['Pass'], './0-9A-Za-z');
				// echo $_REQUEST['Pass'], $email, $pass;
				$sql = "UPDATE usuarios SET pass='$pass' WHERE email='$email';";
				//echo $sql;
				if (!mysqli_query($mysqli, $sql)) {
					die("Error: " . mysqli_error($mysqli));
				} else {
					mysqli_close($mysqli);
					unset($_SESSION['restablecer']);
					unset($_SESSION['codigo']);
					echo "<script> alert('Contraseña restablecida'); document.location.href='LogIn.php'; </script>";
				}
			}
		}
	}

?>

<!DOCTYPE html>
<html>

	<head>
		<?php include '../html/Head.html' ?>
		<script src="../js/jquery-3.4.1.min.js"></script>
		<script src="../js/CheckEmailOrPass.js"></script>
	</head>
	
	<body>
		<?php include '../php/Menus.php' ?>
		<section class="main" id="s1">
			<div id="div1">
	
				<form name="fpass" id="fpass" method='POST' action='RestablecerContrasenaCodigo.php'>
					<table id="table_recuperacion2">
						<tr>
							<th colspan="2">
								<h2>Recuperación de contraseña</h2><br />
							</th>
						</tr>
						<tr>
							<td class="izda">
								E-mail<sup>*</sup> 
							</td>
							<td class="dcha">
								<input type='email' id='dirCorreo' name="dirCorreo" value="<?php echo $_SESSION['restablecer']; ?>" size="50"  onblur="CheckEmail()" readonly >
								<span id="CheckEmail"></span>
							</td>
						</tr>
						<tr>
							<td class="izda">
								Introduce tu nueva contrasena<sup>*</sup> 
							</td>
							<td class="dcha">
								<input type='password' id='pass1' name="Pass" size="50" onfocus="CleanPass()" onblur="CheckPass()"> <span id="CheckPass" ></span>
							</td>
						</tr>
						<tr>
							<td class="izda">
								Repite tu nueva contrasena<sup>*</sup> 
							</td>
							<td class="dcha">
								<input type='password' id='pass2' name="Pass2" size="50">
							</td>
						</tr>
						<tr>
							<td class="izda">
								Introduce el código de recuperación<sup>*</sup>
							</td>
							<td class="dcha">  
								<input type='number' id='code' name="Code" size="50">
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<input type='submit' id='send' value='Cambiar contrasena'> <input type='reset' value='Limpiar' onClick="Clean()">
							</td>
						</tr>
						<tr>
							<td colspan="2">
								Nota: Para poder realizar la recuperación de su contrasena ha de seguir los pasos indicados
								en el correo que se le hará llegar. En caso de que no lo encuentre mire en "spam"
	
							</td>
						</tr>
					</table>
				</form>
			</div>
		</section>
		<?php include '../html/Footer.html' ?>
	</body>
	
</html>