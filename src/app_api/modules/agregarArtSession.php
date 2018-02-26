<?php session_start();

	include '../config/conexion.php';

	$bandera = false;

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

	// foreach que recorre el arreglo donde se guardar los articulos para verificar que no se vayan a repetir, en caso de haber algun ID repetido cambia la variable $bandera=true por lo que no se agrega dicho articulo a la variable de session sino que avisa mediante ajax que ya ese articulo ya esta agregado

	foreach ($arreglo as $key => $value) {
		if($value['id']==$id){
			$bandera=true;
		}
	}

	if ($bandera==false) {
		// Se crea un nuevo arreglo con los datos del articulo nuevo
		$nuevo = array('id' => $row["ID_ARTICULO"], 
				'rubro' => $row["NOMBRE_RUBRO"], 
				'articulo' => $row["NOMBRE_ARTICULO"], 
				'unidad' => $row["DESCRIPCION_UNIDAD"] );

		//Mediante el metodo array_push() se agrega el array que acabamos de crear al arreglo donde se habian guardado anteriormente los articulos

		array_push($arreglo, $nuevo);

		//Se devuelve el nuevo array con el articulo nuevo a la variable de session "articulos"

		$_SESSION["articulos"] = $arreglo;

		//Se devuelve una fila con los datos del producto para ser agregada a la lista de entrada

		echo '<tr>
				<th class="idDato" scope="row">'.$nuevo["id"].'</th>
				<td>'.$nuevo["rubro"].'</td>
				<td>'.$nuevo["articulo"].'</td>
				<td>'.$nuevo["unidad"].'</td>
				<td><input value="1" min="1" name="valor'.$nuevo["id"].'" type="number" class="form-control cantArt"></td>
				<td>
				<button type="button" id="edit" class="btn btn-info"><span class="fa fa-pencil"></span></button>
				<button type="button" class="btn btn-danger delete"><span class="fa fa-trash"></span></button>
				</td>
			</tr>';


	} else {
		echo "existe";
	}
	


?>