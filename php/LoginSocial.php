<?php
session_start();
	if(isset($_SESSION['correo'])){	
			echo "<script> alert('Usted ya ha iniciado sesion'); window.location.href='Layout.php'; </script>";
		}
?>

<!DOCTYPE html>
<html>

<head>
  <?php include '../html/Head.html'?>
</head>

<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div id="div1">
     <h2>Inicio de sesion con tu cuenta google</h2>


        <?php require ("../vendor/autoload.php");
			//Step 1: Enter you google account credentials
			$g_client = new Google_Client();
			$g_client->setClientId('994628261284-usvfr79tvs9rg5gb9o88vdek0a9asvkr.apps.googleusercontent.com');
			$g_client->setClientSecret('HLoheMSYPOyRpBpuFigqNfC-');
			//$g_client->setRedirectUri('https://ws20g13.000webhostapp.com/ws20g13_Extended-master/php/LoginSocial.php');
			$g_client->setRedirectUri('http://localhost/SW2020C_Extended-master/php/LoginSocial.php');
			$g_client->setScopes("email");
			//Step 2 : Create the url
			$auth_url = $g_client->createAuthUrl();
			echo "<a href='$auth_url'>Login Through Google</a>";
			//Step 3 : Get the authorization  code
			$code = isset($_GET['code']) ? $_GET['code'] : NULL;
			//Step 4: Get access token
			if(isset($code)) {
				try {
					$token = $g_client->fetchAccessTokenWithAuthCode($code);
					$g_client->setAccessToken($token);
				}catch (Exception $e){
					echo $e->getMessage();
				}
				try {
					$pay_load = $g_client->verifyIdToken();
				}catch (Exception $e) {
					echo $e->getMessage();
				}
			}else{
				$pay_load = null;
			}
			if(isset($code)) {
				$google_service = new Google_Service_Oauth2($g_client);
				$data = $google_service->userinfo->get();
			}
			if(isset($pay_load)){
				$_SESSION["picture"]=$data["picture"];
				$_SESSION['correo']= $pay_load["email"];
				echo "<script> alert('Inicio de sesion realizado correctamente. Pulsa aceptar para acceder a la pantalla principal'); window.location.href='Layout.php'; </script>";  
			}
		?>
      </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>

</html>