<?php
	require_once('../lib/nusoap.php');
	require_once('../lib/class.wsdlcache.php');

	 $soapclient = new nusoap_client('https://ws20g13.000webhostapp.com/ws20g13-master/php/VerifyPassWS.php?wsdl',true);
	// $soapclient = new nusoap_client('https://www.ehusw.es/jav/ServiciosWeb/comprobarcontrasena.php?wsdl',true);

	$ticket='1010';
	$result = $soapclient->call('ComprobarPass', array('x'=>$_GET["Pass"],'y'=>$ticket));
	
	if ($result == 'VALIDA'){
		echo 'VALIDA';
	} else if ($result == 'INVALIDA') {
		echo 'INVALIDA';
	} else {
		echo 'SIN SERVICIO';
	}
?>
