<?php
class Articulos{
	public function buscarArticulo($terminoArticulo){
		include '../config/conexion.php';

		$datos = array();
		
		$sql = "SELECT T_ARTICULOS.*, T_RUBROS.NOMBRE_RUBRO, T_UNIDADES.DESCRIPCION_UNIDAD
				FROM SC_PROVEDURIA.T_ARTICULOS 
				INNER JOIN SC_PROVEDURIA.T_RUBROS
				ON T_RUBROS.ID_RUBRO = T_ARTICULOS.ID_RUBRO
				INNER JOIN SC_PROVEDURIA.T_UNIDADES
				ON T_UNIDADES.ID_UNIDAD = T_ARTICULOS.ID_UNIDAD
				WHERE NOMBRE_ARTICULO LIKE '%$terminoArticulo%'";
		
		$res = sqlsrv_query($conn,$sql);
		
		while($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC)){
			$datos[] = array("idArticulo" => $row['ID_ARTICULO'],"value" => $row['NOMBRE_ARTICULO'],"existenciaArticulo" => $row['EXISTENCIA_ARTICULO'], "minimoArticulo" => $row['MINIMO_ARTICULO'],"costoUnidad" => $row['COSTO_UNIDAD_ARTICULO'], "rubro" => $row['NOMBRE_RUBRO'],"unidad" => $row['DESCRIPCION_UNIDAD']);
		}

		//print_r($datos);
		
		return $datos;
	}
}