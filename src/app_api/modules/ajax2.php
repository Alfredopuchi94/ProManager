<?php
	include 'proveedores.class.php';
	
	$proveedores = new Proveedores();
	
	echo json_encode($proveedores->buscarProveedor($_GET['term']));