<?php session_start();

	include '../config/conexion.php';

	// Se agarran los datos del formulario


	print_r($_POST);

//**************** T_ACCIONES **********************/

	$sql = "SELECT ISNULL(MAX(NUMERO_ACCION),0) AS UltimaAccion FROM SC_PROVEDURIA.T_ACCIONES WHERE ID_TIPO_ACCION = 2";

	//$res = sqlsrv_query($conn,$sql);

	$row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC);

	$sql = "SET DATEFORMAT ymd; 

			INSERT INTO SC_PROVEDURIA.T_ACCIONES (FECHA_ACCION,
												NUMERO_ACCION,
												ID_CAUSA_ACCION,
												ID_TIPO_ACCION,
												ID_DEPENDENCIA,
												ID_UBICACION_ADMINISTRATIVA,
												NUMERO_FACTURA_ART,
												FECHA_FACTURA_ART,
												NUMERO_ORDEN_ART,
												FECHA_ORDEN_ART,
												ID_PROVEEDOR,
												ID_USUARIO,
												ID_DEPENDENCIA_USUARIO,
												ID_UBICACION_ADMI_USUARIO)
			VALUES (GETDATE(), 
					".($row['UltimaAccion']+1).", 
					$causaAccion,
					$tipoAccion, 
					".$_SESSION["idDependencia"].", 
					".$_SESSION["ubiAdministrativa"].", 
					NULL, 
					NULL, 
					NULL, 
					NULL, 
					NULL, 
					".$_SESSION["idUsuario"].", 
					".$_SESSION["idDependencia"].", 
					".$_SESSION["ubiAdministrativa"].");";

	//$res = sqlsrv_query($conn,$sql);


//**************** T_ACCION_ARTICULO
// Tanto array donde vienen los ids como donde vienen las cantidades se recorren con un foreach
	


	foreach ($idArt as $key1 => $value1) {
		foreach ($cantArt as $key => $value) {
			// Cuando $key == $key1 es por el indice de los 2 array son iguales por lo que se trata del mismo producto
			/*
				idArt[0] = 5 ID de un borrador
				idArt[1] = 9 ID de una hoja

				cantArt[0] = 20 CANTIDAD de borrador
				cantArt[1] = 50 CANTIDAD de hojas
			*/
			if ($key == $key1) {
				// $value1 = ID ARTICULOS
				// $value = CANTIDAD DE ARTICULOS

				//Se consulta el ultimo id de la tabla T_ACCION y el precio del producto a agregar
				$req = "SELECT (SELECT ISNULL(MAX(ID_ACCION),0) FROM SC_PROVEDURIA.T_ACCIONES) AS ULT_ID_ACCION,(SELECT COSTO_UNIDAD_ARTICULO FROM SC_PROVEDURIA.T_ARTICULOS WHERE ID_ARTICULO = $value1) AS PRECIO_PRODUCTO";

				$resReq = sqlsrv_query($conn,$req);

				$rowReq = sqlsrv_fetch_array($resReq, SQLSRV_FETCH_ASSOC);

				//Se agrega la informacion de la operacion en la tabla T_ACCIONES_ARTICULO

				$sql = "INSERT INTO SC_PROVEDURIA.T_ACCIONES_ARTICULO (ID_ACCION,ID_ARTICULO,PRECIO_ARTICULO,CANTIDAD_ARTICULO)
						VALUES (".$rowReq['ULT_ID_ACCION'].", $value1, ".$rowReq['PRECIO_PRODUCTO'].", $value)";
				$res = sqlsrv_query($conn,$sql);

				//Se actualiza la cantidad del producto por la nueva

				$sql = "UPDATE SC_PROVEDURIA.T_ARTICULOS
						SET EXISTENCIA_ARTICULO = EXISTENCIA_ARTICULO + $value
						WHERE T_ARTICULOS.ID_ARTICULO = $value1";

				$res = sqlsrv_query($conn,$sql);

				//echo $sql;
			}
		
		}
	}


$_SESSION["salida"] = array();

?>