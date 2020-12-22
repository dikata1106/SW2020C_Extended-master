<?php
	require_once('../lib/nusoap.php');
	require_once('../lib/class.wsdlcache.php');

	$ns="http://localhost/nusoap-0.9.5/samples";
	$server = new soap_server;
	$server->configureWSDL('ComprobarPass',$ns);
	$server->wsdl->schemaTargetNamespace=$ns;
	$server->register('ComprobarPass',
	array('x'=>'xsd:string','y'=>'xsd:string'),
	array('z'=>'xsd:string'),
	$ns);

	function ComprobarPass ($x, $y){
		if($y != '1010'){
			return 'SIN SERVICIO';
		}else{
			$pagina = file_get_contents('../txt/toppasswords.txt');
			$pos = strpos($pagina, $x);
			if($pos == false)
				return 'VALIDA';
			else
				return 'INVALIDA';
		}
	}

	if ( !isset( $HTTP_RAW_POST_DATA ) ) $HTTP_RAW_POST_DATA =file_get_contents( 'php://input' );
	$server->service($HTTP_RAW_POST_DATA);
?> 