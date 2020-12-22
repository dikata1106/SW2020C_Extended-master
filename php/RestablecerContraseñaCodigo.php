<?php
session_start();

if (!isset($_SESSION['restablecer']) || !isset($_SESSION['codigo'])) {
	echo "<script> window.location.href=\'Layout.php\';
	alert('No tienes permitido acceder a esta página'); </script>";
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
			<div id="div1">
	
				<form name="fpass" id="fpass">
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
								<input type='email' id='dirCorreo' value="<?php $_SESSION[' restablecer'] ?>" size="50"  onblur="CheckEmail()"></p>
								<span id="CheckEmail"></span>
							</td>
						</tr>
						<tr>
							<td class="izda">
								Introduce tu nueva contraseña<sup>*</sup> 
							</td>
							<td class="dcha">
								<input type='password' id='pass' onblur="CheckPass()" size="50">
								<span id="CheckPass"></span>
							</td>
						</tr>
						<tr>
							<td class="izda">
								Repite tu nueva contraseña<sup>*</sup> 
							</td>
							<td class="dcha">
								<input type='password' id='pass2' size="50">
							</td>
						</tr>
						<tr>
							<td class="izda">
								Introduce el código de recuperación<sup>*</sup>
							</td>
							<td class="dcha"> 
								<input type='number' id='code' size="50">
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<input type='button' id='submit' value='Cambiar contraseña' onClick='RestaurarContraseña()'
									disabled> <input type='reset' value='Limpiar' onClick="Clean()">
								</td>
							<td colspan="2">
								Nota: Para poder realizar la recuperación de su contraseña ha de seguir los pasos indicados
								en el correo que se le hará llegar. En caso de que no lo encuentre mire en "spam"
	
							</td>
						</tr>
					</table>
				</form>
	
	
			</div>
			<div id='message'>
				<div>
		</section>
		<?php include '../html/Footer.html' ?>
	
	</body>
	
	</html>