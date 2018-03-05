<?php
	// CONECTOR PARA OBTENER LOS DATOS DE LAS ACTIVIDADES DE CADA PROVEEDOR

	include 'actividad.class.php';
	
	$actividad = new Actividad();
	
	echo json_encode($actividad->buscarActividad($_GET['term']));