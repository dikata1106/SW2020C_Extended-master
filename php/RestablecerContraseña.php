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
		<div id="div1">
			<form name="fpass" id="fpass">
				<table id="table_recuperacion1">
					<tr>
						<th colspan="2">
							<h2>Recuperación de contraseña </h2><br />
						</th>
					</tr>
					<tr>
						<td class="izda">
							Introduce tu e-mail de recuperación<sup>*</sup>
						</td>
						<td class="dcha">
							<input type="email" name="dirCorreo" id="dirCorreo" size="50">
							<span id="CheckEmail"></span>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<input type='button' id='Recuperar' value='Enviar'
								onClick='RestaurarContraseña()'>
							<input type='reset' value='Limpiar'>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							Nota: Para poder realizar la recuperación de su contraseña ha de seguir los pasos indicados
							en el correo que se le hará llegar. En caso de que no lo encuentre mire en "spam"
						</td>
					</tr>
				</table>
			</form>
		</div>
		<div id='message'></div>
	</section>
	<?php include '../html/Footer.html' ?>
</body>

</html>