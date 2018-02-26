<?php 

	//Conexion a la base de datos

	$serverName = '172.28.160.171';
	$infoConexion = array('Database' => 'DARZULIA', 'UID'=>'USUARIODARZULIA', 'PWD'=>'USUARIODARZULIA', "CharacterSet" => "UTF-8");
	$conn = sqlsrv_connect( $serverName, $infoConexion);

	if ($conn) {
		//echo "Conexion exitosa";
	} else {
		echo "error en conexion";
	}
?>