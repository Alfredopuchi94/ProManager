<?php
	// CONECTOR PARA OBTENER LOS DATOS DE LOS ARTICULOS PARA EL AUTOCOMPLETE
	
	include 'proveedores.class.php';
	
	$proveedores = new Proveedores();
	
	echo json_encode($proveedores->buscarProveedor($_GET['term']));