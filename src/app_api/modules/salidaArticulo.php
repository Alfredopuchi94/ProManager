<?php // Se para la variable de session para que pueda ser utilizada
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sistema de Proveeduría</title>
	<link rel="stylesheet" href="../../assets/css/app.css">
	<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="../../assets/css/jquery-ui.min.css">
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
					    <a class="nav-link colorLetraMenu" href="buscar.php"><span class="fa fa-search colIconMenu"></span> Articulos</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link colorLetraMenu" href="entradaArticulo.php"><span class="fa fa-arrow-down colIconMenu"></span> Entrada</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link colorLetraMenu" href="#"><span class="fa fa-arrow-up colIconMenu"></span> Salida</a>
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
						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Salida Nueva</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Buscar Salida</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
							</li>
						</ul>

						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
								<div class="row">
									<div class="col-md-12 pt-4">
										<h2 class="w-100 text-center">Detalle de la Salida</h2>
										<hr>
									</div>
									<div class="col-md-10 offset-md-1 pt-1">
										<form id="FormularioS" action="agregarSalida.php" method="get">
										  <div class="row">
										    <div class=" input-group col-md-3 mb-0 ml-0">
										      <label class="mr-3">Fecha: </label><br>
										      <input name="fecha" class="form-control" id="validationCustom01" disabled required value="<?=date('m/d/Y');?>">
										    </div>
										  	</div>
								</div>
										  	<div class="row">
											  	<div class="form-group col-md-11 ml-5">
											      <p class="text-center" for="inputState">Dependencia</p>
											      <select id="inputState" class="form-control" width="100%">
											        <option disable selected>Seleccione la dependencia</option>
											       <?php
											       // Se llena el <optio> de los rubros con la info de la base de datos

											        $sql = "SELECT * FROM SC_COMUN.T_DEPENDENCIAS";

											         $query=sqlsrv_query($conn,$sql); 

														while ($reg=sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) { 

				  										echo '<option value="'.$reg["ID_DEPENDENCIA"].'">'.$reg['DESCRIPCION'].'</option>'; 
													} ?>
											      </select>
											    </div>
										    </div>
										  
										  <div class="input-group mx-auto col-md-8 mb-3">
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon3">Buscar</span> 
												</div>
												<input id="buscarProducto" type="text" class="form-control">
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div id="resultados"></div>
										<table class="table table-hover" style="font-size: 0.9rem;">
											<thead>
												<tr>
													<th scope="col">Descripcion</th>
													<th scope="col">Unidad</th>
													<th scope="col">Cantidad</th>
													<th scope="col">Minino</th>
													<th scope="col">Existencia</th>
													<th scope="col">Restante</th>
													<th scope="col">Precio U</th>
													<th scope="col">Total</th>
												</tr>
											</thead>
											<tbody id="contenedorArt">
												<?php 
													// foreach que recorre la variable de session "articulos" que es donde se guardan los articulos que van siendo agregados a la entrada

													$datos = $_SESSION["articulos"];
													foreach ($datos as $key => $value) {
												?>
												<tr>
													<th class="idDato" scope="row"><?php echo $value["id"] ?></th>
													<td><?php echo $value["rubro"] ?></td>
													<td><?php echo $value["articulo"] ?></td>
													<td><?php echo $value["unidad"] ?></td>
													<td><input value="1" min="1" name="valor<?php echo $value["id"] ?>" type="number" class="form-control cantArt"></td>
													<td>
														<button type="button" id="edit" class="btn btn-info"><span class="fa fa-pencil"></span></button>
														<button id="eliminarArt" type="button" class="btn btn-danger delete"><span class="fa fa-trash"></span></button>
													</td>

													

												</tr>
												<?php
													} // Termina el foreach donde se muestran los articulos que van a ser agregados a la entrada
												?>
											</tbody>
										</table>
										<button id="enviarSalida" type="submit" class="btn btn-primary d-block m-auto">Registrar Salida</button>
										</form>
									</div>
								</div>
							</div>

							<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
								b
							</div>

							<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
								c
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
	<script>
		var aux = true;

		$("#ContProdNuevo").slideUp('fast');

		$("#prodNuevo").click(function() {
			if (!$("#option2:checked").val() == true) {
				$("#ContProdNuevo").slideDown(400);
			}
		});

		$("#prodExistente").click(function() {
			if (!$("#option1:checked").val() == true) {
				$("#ContProdNuevo").slideUp(400);
			}
		});

	</script>
</body>
</html>