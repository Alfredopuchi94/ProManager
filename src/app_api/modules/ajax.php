<?php
	// CONECTOR PARA OBTENER LOS DATOS DE LOS ARTICULOS PARA EL AUTOCOMPLETE

	include 'articulos.class.php';
	
	$articulos = new Articulos();
	
	echo json_encode($articulos->buscarArticulo($_GET['term']));