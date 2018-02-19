<?php
	include 'articulos.class.php';
	
	$articulos = new Articulos();
	
	echo json_encode($articulos->buscarArticulo($_GET['term']));