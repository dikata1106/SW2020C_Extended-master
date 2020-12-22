<?php
	session_start();
?>

<!DOCTYPE html>
<html>

<head>
	<?php include '../html/Head.html' ?>
	<script src="../js/jquery-3.4.1.min.js"></script>
	<script src="../js/RestaurarContrasena.js"></script>
	<script src="../js/CheckEmailOrPass.js"></script>
</head>

<body>
	<?php include '../php/Menus.php' ?>
	<section class="main" id="s1">
		<div id="div1">
			<form name="fpass" id="fpass">
				<table id="table_recuperacion1">
					<tr>
						<th colspan="2">
							<h2>Recuperación de contrasena </h2><br />
						</th>
					</tr>
					<tr>
						<td class="izda">
							Introduce tu e-mail de recuperación<sup>*</sup>
						</td>
						<td class="dcha">
							<input type="email" name="dirCorreo" id="dirCorreo" size="50" onfocus="CleanEmail()" onblur="CheckEmail()"> <span id="CheckEmail" ></span>
							<span id="CheckEmail"></span>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<input type='button' id='Recuperar' value='Enviar'
								onClick='RestaurarContrasena()'>
							<input type='reset' value='Limpiar'>
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
			<p id='message'></p>
		</div>
	</section>
	<?php include '../html/Footer.html' ?>
</body>

</html>