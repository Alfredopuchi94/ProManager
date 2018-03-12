<?php

	session_start();

	include '../config/conexion.php';

	$nombreProveedor = strtoupper($_POST["nombreProveedor"]);
	$idActividad = strtoupper($_POST["actividadOculto"]);
	$rifProveedor = strtoupper($_POST["rifProveedor"]);
	$nitProveedor = strtoupper($_POST["nitProveedor"]);
	$emailProveedor = strtoupper($_POST["emailProveedor"]);

	$sql = "INSERT INTO SC_PROVEEDORES.T_PROVEEDORES (ID_ACTIVIDAD,NOMBRE_EMPRESA,RIF,NIT,EMAIL,ACTIVO) 
			VALUES ($idActividad,'$nombreProveedor','$rifProveedor','$nitProveedor','$emailProveedor',1)";

	if (sqlsrv_query($conn,$sql)) {
	 	echo "Exito";
	 } else {
	 	echo "Fallo";
	 }
	 
?>