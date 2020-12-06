<!DOCTYPE html>
<html>

<head>
	<?php include '../html/Head.html' ?>
	<script src="../js/jquery-3.4.1.min.js"></script>
	<script src="../js/ShowImageInForm.js"></script>
	<!--<script src="../js/ValidateFieldsQuestion.js"></script>-->
	<style>
		.table_QuestionForm {
			margin: auto;
			text-align: center;
		}
		sup {
			color: red;
		}
		h2 {
            color: darkblue;
        }
	</style>
</head>

<body>
	<?php include '../php/Menus.php' ?>
	<section class="main" id="s1">
		<div>

			<!--Añadir el formulario y los scripts necesarios para que el usuario<br>pueda introducir los datos de una pregunta sin imagen.-->
			<!--<form id='fquestion' name='fquestion' action=’AddQuestion.php’> POST porque envia imagen-->
			<!--<form id='fquestion' name='fquestion' method='POST' enctype='multipart/form-data' action='AddQuestionWithImage.php'>-->
			<?php echo "<form id='fquestion' name='fquestion' method='POST' enctype='multipart/form-data' action='AddQuestionWithImage.php?logInMail=$logInMail'>"; ?>
				<table class="table_QuestionForm">
					<tr>
						<th>
							<h2>Insertar pregunta</h2><br />
						</th>
					</tr>
					<tr>
						<td>Direccion de correo<sup>*</sup> <input type="text" size="75" id="dirCorreo" name="Direccion de correo" value="<?php echo $logInMail; ?>" readonly></td>
					</tr>
					<tr>
						<td>Enunciado de pregunta<sup>*</sup> <input type="text" size="75" id="pregunta" name="Pregunta"></td>
					</tr>
					<tr>
						<td>Respuesta correcta<sup>*</sup> <input type="text" size="75" id="respuestaCorrecta" name="Respuesta correcta"></td>
					</tr>
					<tr>
						<td>Respuesta incorrecta 1<sup>*</sup> <input type="text" size="75" id="respuestaIncorrecta1" name="Respuesta incorrecta 1"></td>
					</tr>
					<tr>
						<td>Respuesta incorrecta 2<sup>*</sup> <input type="text" size="75" id="respuestaIncorrecta2" name="Respuesta incorrecta 2"></td>
					</tr>
					<tr>
						<td>Respuesta incorrecta 3<sup>*</sup> <input type="text" size="75" id="respuestaIncorrecta3" name="Respuesta incorrecta 3"></td>
					</tr>
					<tr>
						<td>Tema<sup>*</sup> <input type="text" size="50" id="tema" name="tema"></td>
					</tr>
					<tr>
						<td>
							Complejidad<sup>*</sup>
							<select id="complejidad" name="complejidad">
								<option value="1">Baja</option>
								<option value="2" selected>Media</option>
								<option value="3">Alta</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><input type="file" id="file" accept="image/*" name="file">
							<div id="imgDynamica"></div>
						</td>
					</tr>
					<tr>
						<td><input type="submit" id="submit" value="Enviar"> <input type="reset" id="reset" value="Limpiar"></td>
					</tr>
				</table>
			</form>

		</div>
	</section>
	<?php include '../html/Footer.html' ?>
</body>

</html>