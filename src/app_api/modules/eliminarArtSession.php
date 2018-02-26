<?php session_start();

	include '../config/conexion.php';

	//Elimina un articulo de la lista de entrada

	$bandera = false;

	$id = $_POST["id"];

	$arreglo = $_SESSION["articulos"];

	//for($i=0;$i<count($arreglo);$i++){
	foreach ($arreglo as $key => $value) {
		if($value['id']==$id){
			echo "$key";
			unset($arreglo[$key]);
		}
	}

	$_SESSION["articulos"] = $arreglo;
?>