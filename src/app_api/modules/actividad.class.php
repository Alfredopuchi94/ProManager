<?php
class Actividad{
	public function buscarActividad($terminoArticulo){
		include '../config/conexion.php';

		$datos = array();
		
		$sql = "SELECT *
				FROM SC_PROVEEDORES.T_ACTIVIDADES 
				WHERE DESCRIPCION LIKE '%$terminoArticulo%'";

		// $sql = "SELECT * FROM SC_PROVEEDORES.T_ACTIVIDADES WHERE T_ACTIVIDADES.DESCRIPCION LIKE '%art%'";
		
		$res = sqlsrv_query($conn,$sql);


		// while($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC)){
		// 	// print_r($row);
		// 	$datos[] = array("idActividad" => $row['ID_ACTIVIDAD'],"value" => $row['DESCRIPCION']);
		// }

		while(sqlsrv_fetch($res)){
			// print_r($row);
			$datos[] = array("idActividad" => sqlsrv_get_field($res,0,SQLSRV_PHPTYPE_STRING('UTF-8')),
								"value" => sqlsrv_get_field($res,1,SQLSRV_PHPTYPE_STRING('UTF-8')));
		}

		//print_r($datos);
		//Devuelve los datos de los articulo para ser procesador por el autocomplete

		return $datos;

	}
}