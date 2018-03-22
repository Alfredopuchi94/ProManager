<?php // Se para la variable de session para que pueda ser utilizada
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sistema de Proveeduría</title>
	<link rel="stylesheet" href="../../assets/css/app.css">
	<link rel="stylesheet" href="../../assets/js/app.js">
	<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="../../assets/css/datetable.css">
</head>
<body>
	<?php 
	include "../config/conexion.php";

	 ?>
	<nav class="navbar navbar-primary sticky-top bgnav justify-content-center">
		<p class="mb-0 title-5" style="color: white;">Sistema de Proveduria</p>
	</nav>
	<div class="container-fluid">
		<div class="row">
			<nav class="col-md-2 pl-4 sidebar bg-light">
				<div class="sidebar-sticky pt-4">
					<h5>Menu</h5>
					<ul class="nav flex-column">
					  <li class="nav-item">
					    <a class="nav-link colorLetraMenu" href="#"><span class="fa fa-search colIconMenu"></span> Articulos</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link colorLetraMenu" href="entradaArticulo.php"><span class="fa fa-arrow-down colIconMenu"></span> Entrada</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link colorLetraMenu" href="salidaArticulo.php"><span class="fa fa-arrow-up colIconMenu"></span> Salida</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link colorLetraMenu" href="#"><span class="fa fa-retweet colIconMenu"></span> Devoluciones</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link colorLetraMenu" href="#"><span class="fa fa-file-text colIconMenu"></span> Reportes</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link colorLetraMenu" data-toggle="modal" data-target="#exampleModalCenter" href="#"><span class="fa fa-user-circle-o colIconMenu"></span> Usuarios</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link colorLetraMenu" href="#"><span class="fa fa-sign-out colIconMenu"></span> Salir</a>
					  </li>
					</ul>
				</div>
			</nav>
			<div class="col-md-10 my-3">
				<div class="row">
					<div class="col-md-12">
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
								<div class="row">
									<div class="col-md-10 offset-md-1">
										<div class="col-md-12 pt-4">
											<h3 class="w-100 text-center">Buscar articulo</h3>
											<hr>
										</div><br>
									</div>
									<div class="col-md-12">
										<table class="table table-hover table-striped table-bordered" id="myTable">
											<thead>
												<tr>
													<th scope="col" width="10%">Id</th>
													<th scope="col" width="30%">Rubro</th>
													<th scope="col" width="35%">Nombre</th>
													<th scope="col" width="15%">Unidad</th>
													<th scope="col" width="10%">Existencia</th>
													<th scope="col" width="10%">Minimo</th>
													<th scope="col" width="10%">Costo U.</th>
												</tr>
											</thead>

											<tbody >
												<?php $sql ="SELECT T_ARTICULOS.ID_ARTICULO, T_RUBROS.NOMBRE_RUBRO, T_ARTICULOS.NOMBRE_ARTICULO, T_UNIDADES.DESCRIPCION_UNIDAD, EXISTENCIA_ARTICULO, MINIMO_ARTICULO, COSTO_UNIDAD_ARTICULO
															 FROM SC_PROVEDURIA.T_ARTICULOS
															 INNER JOIN SC_PROVEDURIA.T_RUBROS ON T_ARTICULOS.ID_RUBRO = T_RUBROS.ID_RUBRO
															 INNER JOIN SC_PROVEDURIA.T_UNIDADES ON T_ARTICULOS.ID_UNIDAD = T_UNIDADES.ID_UNIDAD
															 WHERE T_ARTICULOS.ID_ARTICULO = ID_ARTICULO";
														$query =sqlsrv_query($conn,$sql); 
														while ($filas=sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) {
															echo "<tr>";
																echo "<td>"; echo $filas['ID_ARTICULO']; "</td>";
																echo "<td>"; echo $filas['NOMBRE_RUBRO']; "</td>";
																echo "<td>"; echo $filas['NOMBRE_ARTICULO']; "</td>";
																echo "<td>"; echo $filas['DESCRIPCION_UNIDAD']; "</td>";
																echo "<td>"; echo $filas['EXISTENCIA_ARTICULO']; "</td>";
																echo "<td>"; echo $filas['MINIMO_ARTICULO']; "</td>";
																echo "<td>"; echo $filas['COSTO_UNIDAD_ARTICULO']; "</td>";
															echo "</tr>";
														}

														?>
											</tbody>
										</table><br> <br> <br>
									</div>
								</div>
							</div>
						</div>						
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="../../assets/js/jquery-3.2.1.min.js"></script>
	<script src="../../assets/js/jquery-ui.min.js"></script>
	<script src="../../assets/js/bootstrap.js"></script>
	<script src="../../assets/js/app.js"></script>
	<script src="../../assets/js/datetable1.js"></script>
	<script src="../../assets/js/datetable2.js"></script>
	<script>
		$(document).ready( function () {
    		$('#myTable').DataTable();
			} );
	</script>
</body>
</html>