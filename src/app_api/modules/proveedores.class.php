<?php
class Proveedores{
	public function buscarProveedor($terminoProveedor){
		include '../config/conexion.php';

		$datos = array();
		
		$sql = "SELECT ID_PROVEEDOR,NOMBRE_EMPRESA
				FROM SC_PROVEEDORES.T_PROVEEDORES
				WHERE T_PROVEEDORES.NOMBRE_EMPRESA 
				LIKE '%$terminoProveedor%'
				OR T_PROVEEDORES.RIF 
				LIKE '%$terminoProveedor%'
				OR T_PROVEEDORES.NIT 
				LIKE '%$terminoProveedor%'";

		$params = array();

		$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
						
		$res = sqlsrv_query($conn,$sql,$params,$options);
		
		$algo = sqlsrv_num_rows($res);

		if (sqlsrv_num_rows($res) > 0) {
		
			while($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC)){
				$datos[] = array("idProveedor" => $row['ID_PROVEEDOR'],"value" => $row['NOMBRE_EMPRESA']);
			}

			//Devuelve los datos de los proveedores para ser procesador por el autocomplete

			return $datos;

		} else {

			return array("value" => "No existe el proveedor");

		}
	}
}