<?php
/*Conexión a base de datos*/
	$serverName = '172.28.160.171';
	$infoConexion = array('Database' => 'DARZULIA', 'UID'=>'USUARIODARZULIA', 'PWD'=>'USUARIODARZULIA');
	$conn = sqlsrv_connect( $serverName, $infoConexion);
?>