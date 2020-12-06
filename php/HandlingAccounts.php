<?php
session_start();

	if(isset($_SESSION['correo'])){	
		if($_SESSION['correo'] != "admin@ehu.es"){
			echo 
				"<script> 
					alert('Debes de iniciar sesion como admin');
                    window.location.href='Layout.php';
				</script>";
		}
	}else{
		echo 
			"<script> 
					alert('Debes de iniciar sesion como admin.');
                    window.location.href='Layout.php';
			</script>";	
	}
?>
<html>
<head>
  <?php include '../html/Head.html'?>
  <script src="../js/ChangeUserState.js"></script>
  <script src="../js/RemoveUser.js"></script>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div id='div1'>
      <?php
        include 'DbConfig.php';
        //Creamos la conexion con la BD.
        $link = mysqli_connect($server,$user,$pass,$basededatos);
        if(!$link){
            die("Fallo al conectar con la base de datos: " .mysqli_connect_error());
        }
        
        $sql = "SELECT * FROM usuarios;";
        $resul = mysqli_query($link,$sql,MYSQLI_USE_RESULT);
        if(!$resul){
            die("Error: ".mysqli_error($link));
        }
        $aux=0;
        echo "<table class='table_Accounts' border='1' style='border-collapse: collapse'><tr><th>Email</th><th>Contraseña</th><th>Estado</th><th>Imagen</th><th>Bloqueo y Activacion</th><th>Borrar</th></tr>";
        while($row = mysqli_fetch_array($resul)){
          if($row['email'] == 'admin@ehu.es'){
            echo "<tr><td>".$row['email']."</td><td>".$row['pass']."</td><td id='\"".$aux."\"'>".$row['estado']."</td><td><img width=\"150\" height=\"150\" src=\"data:image/*;base64, ".$row['imagen']."\" alt=\"Imagen\"/></td> <td><input type='button' value='Bloquear/Desbloquear' disabled></td> <td><input type='button' value='Borrar' disabled></td> </tr>";
			
          }
          else {
            echo "<tr><td><a href=\"mailto:" . $row['email'] . "\">" . $row['email'] . "</a></td><td>".$row['pass']."</td><td id='\"".$aux."\"'>".$row['estado']."</td><td><img width=\"150\" height=\"150\" src=\"data:image/*;base64, ".$row['imagen']."\" alt=\"Imagen\"/></td> <td><input type='button' value='Bloquear/Desbloquear' onClick='changeUserState(\"".$row['email']."\")'></td> <td><input type='button' value='Borrar' onClick='RemoveUser(\"".$row['email']."\")'></td> </tr>";
          }
          $aux=$aux+1;
		}	
        echo "</table>";
		
        mysqli_close($link);
    ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
