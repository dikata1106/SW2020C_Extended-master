<?php
session_start();

if (!isset($_SESSION['restablecer']) || !isset($_SESSION['codigo'])) {
	echo '<script>alert("No tienes permitido acceder a esta página.");';
	echo 'window.location.href=\'Layout.php\'</script>';
}
?>
<html>

<head>
	<?php include '../html/Head.html' ?>
	<script src="../js/jquery-3.4.1.min.js"></script>
	<script src="../js/CheckEmailOrPass.js"></script>
	<script src="../js/CambiarContraseña.js"></script>
</head>

<body>
	<?php include '../php/Menus.php' ?>
	<section class="main" id="s1">
		<center>
			<table border=1>
				<tr>
					<th>
						Recuperación de contraseña
					</th>
				</tr>
				<tr>
					<td>
						<form name="fpass" id="fpass">
							<p>E-mail*: <input type='email' id='dirCorreo' value='<?php $_SESSION['restablecer'] ?> ' onblur="CheckEmail()"></p>
							<div id="CheckEmail"></div>
							<p>Introduce tu nueva contraseña*: <input type='password' id='pass' onblur="CheckPass()"></p>
							<div id="CheckPass"></div>
							<p>Repite tu nueva contraseña*: <input type='password' id='pass2'></p>
							<p>Introduce el código de recuperación*: <input type='number' id='code'></p>
							<center>
								<input type='button' id='submit' value='Cambiar contraseña' onClick='RestaurarContraseña()' disabled> <input type='reset' value='Limpiar' onClick="Clean()">
							</center>
						</form>
					</td>
				</tr>
			</table>
		</center>
		<br>
		<p>Nota: Para poder realizar la recuperación de su contraseña ha de seguir los pasos indicados en el correo que se le hará llegar. En caso de que no lo encuentre mire en "spam".</p>
		<div id='message'>
			<div>
	</section>
	<?php include '../html/Footer.html' ?>

</body>

</html>