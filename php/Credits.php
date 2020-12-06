<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<?php include '../html/Head.html'?>
</head>

<body>
	<?php include '../php/Menus.php' ?>
	<section class="main" id="s1">
		<div>
			<table class="table_Credits">
				<tr><th colspan="2"><h2>DATOS DEL AUTOR/AUTORES</h2><br/></th ></tr>
				<tr>
					<td>Konstantin Todorov Andreev</td>
					<td>Daniel Ruskov Vangelov</td>
				</tr>
				<tr>
					<td>Ingereria de Software</td>
					<td>Ingenieria de Computadores</td>
				</tr >
				<tr>
					<td><img class="autores" src="../images/aimg-1.jpeg" alt="autor 1"></td>
					<td><img class="autores" src="../images/aimg-2.jpeg" alt="autor 2"></td>
				</tr>
				<tr>
					<td><a href="mailto:kandreev001@ikasle.ehu.eus">kandreev001@ikasle.ehu.eus</a></td>
					<td><a href="mailto:druskov001@ikasle.ehu.eus">druskov001@ikasle.ehu.eus</a></td>
				</tr>
			</table>
		</div>
	</section>
	<?php include '../html/Footer.html' ?>
</body>

</html>