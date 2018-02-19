<?php session_start();

	include '../config/conexion.php';

	$id = $_POST["id"];

	$sql = "SELECT T_ARTICULOS.ID_ARTICULO, T_RUBROS.NOMBRE_RUBRO, T_ARTICULOS.NOMBRE_ARTICULO, T_UNIDADES.DESCRIPCION_UNIDAD
			FROM SC_PROVEDURIA.T_ARTICULOS
			INNER JOIN SC_PROVEDURIA.T_RUBROS
			ON T_ARTICULOS.ID_RUBRO = T_RUBROS.ID_RUBRO
			INNER JOIN SC_PROVEDURIA.T_UNIDADES
			ON T_ARTICULOS.ID_UNIDAD = T_UNIDADES.ID_UNIDAD
			WHERE T_ARTICULOS.ID_ARTICULO = $id";

	//echo "$sql";

	$res = sqlsrv_query($conn,$sql);

	$row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC);

	$arreglo = $_SESSION["articulos"];

	$nuevo = array('id' => $row["ID_ARTICULO"], 
					'rubro' => $row["NOMBRE_RUBRO"], 
					'articulo' => $row["NOMBRE_ARTICULO"], 
					'unidad' => $row["DESCRIPCION_UNIDAD"] );

	array_push($arreglo, $nuevo);

	$_SESSION["articulos"] = $arreglo;

	echo '<tr>
			<th scope="row">'.$nuevo["id"].'</th>
			<td>'.$nuevo["rubro"].'</td>
			<td>'.$nuevo["articulo"].'</td>
			<td>'.$nuevo["unidad"].'</td>
			<td><input type="number" class="form-control"></td>
		</tr>';
?>