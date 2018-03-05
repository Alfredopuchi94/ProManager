<?php 
	include('conexion.php');

	if( $_REQUEST['id'] == "formularioEntradaNuevo"){
		
	$nombre = $_REQUEST['nombre'];
	$existencia = $_REQUEST['existencia'];
	$minimo = $_REQUEST['minimo'];
	$costo = $_REQUEST['costo'];
	$id_rubro = $_REQUEST['id_rubro'];
	$id_unidad = $_REQUEST['id_unidad'];

	

	$sql = "INSERT INTO SC_PROVEDURIA.T_ARTICULOS (NOMBRE_ARTICULO, EXISTENCIA_ARTICULO, MINIMO_ARTICULO, COSTO_UNIDAD_ARTICULO, ID_RUBRO, ID_UNIDAD) VALUES ('$nombre', '$existencia', '$minimo', '$costo', '$id_rubro', '$id_unidad')";

	$insertar = sqlsrv_query($conn, $sql);
		
		if ($insertar) {

		    echo "<script>alert('Se registro con exito el articulo: $nombre'); location.href ='../modules/entradaArticulo.php';</script>";
			sqlsrv_close($conn);
		}else{
			echo "error";
		}

	}

 ?>