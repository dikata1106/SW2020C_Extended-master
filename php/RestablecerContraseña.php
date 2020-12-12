<?php
session_start();

?>
<html>

<head>
	<?php include '../html/Head.html' ?>
	<script src="../js/jquery-3.4.1.min.js"></script>
	<script src="../js/RestaurarContraseña.js"></script>
	<script src="../js/CheckEmailOrPass.js"></script>
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
							<p>Introduce tu e-mail de recuperación*: <input type="email" name="dirCorreo" id="dirCorreo"></p>
							<div id="CheckEmail"></div>
							<center>
								<input type='button' id='Recuperar' value='Enviar solicitud' onClick='RestaurarContraseña()'> <input type='reset' value='Limpiar'>
							</center>
						</form>
					</td>
				</tr>
			</table>
		</center>
		<br>
		<p>Nota: Para poder realizar la recuperación de su contraseña ha de seguir los pasos indicados en el correo que se le hará llegar. En caso de que no lo encuentre mire en "spam".</p>
		<div id='message'></div>
	</section>
	<?php include '../html/Footer.html' ?>

</body>

</html>