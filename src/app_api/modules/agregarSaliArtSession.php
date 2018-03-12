<?php session_start();

	include '../config/conexion.php';

	//print_r($_POST);

	$bandera = false;

	$id = $_POST["id"];
	$sql = "SELECT T_ARTICULOS.ID_ARTICULO, T_ARTICULOS.NOMBRE_ARTICULO, T_UNIDADES.DESCRIPCION_UNIDAD, MINIMO_ARTICULO, EXISTENCIA_ARTICULO, COSTO_UNIDAD_ARTICULO
			FROM SC_PROVEDURIA.T_ARTICULOS  
			INNER JOIN SC_PROVEDURIA.T_UNIDADES
			ON T_ARTICULOS.ID_UNIDAD = T_UNIDADES.ID_UNIDAD
			WHERE T_ARTICULOS.ID_ARTICULO = $id";

	//echo "$sql";

	$res = sqlsrv_query($conn,$sql);

	$row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC);

	$arreglo = $_SESSION["salida"];

	// foreach que recorre el arreglo donde se guardar los articulos para verificar que no se vayan a repetir, en caso de haber algun ID repetido cambia la variable $bandera=true por lo que no se agrega dicho articulo a la variable de session sino que avisa mediante ajax que ya ese articulo ya esta agregado

	foreach ($arreglo as $key => $value) {
		if($value['idArticulo']==$id){
			$bandera=true;
		}
	}

	if ($bandera==false) {
		// Se crea un nuevo arreglo con los datos del articulo nuevo
		$nuevo = array( 'idArticulo' => $row["ID_ARTICULO"], 
				'articulo' => $row["NOMBRE_ARTICULO"], 
				'unidad' => $row["DESCRIPCION_UNIDAD"],
				'minimo' => $row["MINIMO_ARTICULO"],
				'existencia' => $row["EXISTENCIA_ARTICULO"],
				'restante' => $row["EXISTENCIA_ARTICULO"],
				'precio' => $row["COSTO_UNIDAD_ARTICULO"]);
				 

		//Mediante el metodo array_push() se agrega el array que acabamos de crear al arreglo donde se habian guardado anteriormente los articulos

		array_push($arreglo, $nuevo);

		//Se devuelve el nuevo array con el articulo nuevo a la variable de session "articulos"

		$_SESSION["salida"] = $arreglo;

		//Se devuelve una fila con los datos del producto para ser agregada a la lista de entrada

		echo '<tr>
				<td>'.$nuevo["articulo"].'</td>
				<td>'.$nuevo["unidad"].'</td>
				<td><input value="1" min="1" max="'.$nuevo["restante"].'" name="valor" type="number" class="form-control cantArt"></td>
				<td>'.$nuevo["minimo"].'</td>
				<td>'.$nuevo["existencia"].'</td>
				<td>'.$nuevo["restante"].'</td>
				<td>'.$nuevo["precio"].'</td>
				<td>'.$nuevo["precio"].'</td>
				<td>
				<button type="button" id="edit" class="btn btn-info"><span class="fa fa-pencil"></span></button>
				<button type="button" class="btn btn-danger delete"><span class="fa fa-trash"></span></button>
				</td>
			</tr>';


	} else {
		echo "existe";
	}
	


?>