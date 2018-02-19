<?php
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
					    <a class="nav-link colorLetraMenu" href="#"><span class="fa fa-arrow-down colIconMenu"></span> Entrada</a>
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
								<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Entrada Nueva</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Buscar Entrada</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
							</li>
						</ul>

						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
								<div class="row">
									<div class="col-md-12 pt-4">
										<h2 class="w-100 text-center pt-2">Registro de entrada <hr></h2>
										<div class="btn-group btn-group-toggle pb-4" data-toggle="buttons">
										  <label id="prodExistente" class="btn btn-secondary active">
										    <input type="radio" name="options" id="option1" autocomplete="off" checked> Articulo Existente
										  </label>
										  <label id="prodNuevo" class="btn btn-secondary">
										    <input type="radio" name="options" id="option2" autocomplete="off"> Articulo Nuevo
										  </label>
										</div>
										<form id="formularioEntradaNuevo" action="../config/datos.php" method="post">
										  <div class="form-row">
										  	<div class="form-group col-md-3">
										      <label for="inputState">Rubro</label>
										      <select name="id_rubro" id="inputState" class="form-control">
										        <option disable selected>Seleccione Rubro</option>
										       <?php
										        $sql = "SELECT * FROM SC_PROVEDURIA.T_RUBROS";

										         $query=sqlsrv_query($conn,$sql); 

													while ($reg=sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) { 

			  										echo '<option value="'.$reg["ID_RUBRO"].'">'.$reg['NOMBRE_RUBRO'].'</option>'; 
												} ?>
										      </select>
										    </div>
										    <div class="form-group col-md-6">
										      <label for="inputEmail4">Descripcion</label>
										      <input name="nombre" type="text" class="form-control" id="inputEmail4">
										    </div>
										  </div>
										  <div class="form-row">
										  	<div class="form-group col-md-3">
										      <label for="inputState">Unidad</label>
										      <select name="id_unidad" id="inputState" class="form-control">
										        <option disable selected>Seleccione la unidad</option>
										       <?php
										        $sql = "SELECT * FROM SC_PROVEDURIA.T_UNIDADES";

										         $query=sqlsrv_query($conn,$sql); 

													while ($reg=sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) { 

			  										echo '<option value="'.$reg["ID_UNIDAD"].'">'.$reg['DESCRIPCION_UNIDAD'].'</option>'; 
												} ?>
										      </select>
										    </div>
										    <div class="form-group col-md-3">
										      <label for="inputCity">Existencia</label>
										      <input name="existencia" type="text" class="form-control" id="inputCity">
										    </div>
										    <div class="form-group col-md-3">
										      <label for="inputZip">Minimo</label>
										      <input name="minimo" type="text" class="form-control" id="inputZip">
										    </div>
										    <div class="form-group col-md-3">
										      <label for="inputZip">Costo</label>
										      <input name="costo" type="text" class="form-control" id="inputZip">
										    </div>
										    	<input type="hidden" name="id" value="formularioEntradaNuevo">
										    <button type="submit" class="btn btn-primary d-block m-auto">Agregar artículo</button>
										  </div>
										</form>
									</div>
									<div class="col-md-12 pt-5">
										<h2 class="w-100 text-center">Detalle de la entrada</h2>
										<hr>
									</div>
									<div class="col-md-10 offset-md-1 pt-1">
										<form>
										  <div class="form-row">
										    <div class="col-md-4 mb-3">
										      <label for="validationCustom01">N° de factura</label>
										      <input type="text" class="form-control" id="validationCustom01" required>
										    </div>
										    <div class="form-group col-md-4">
										      <label for="inputState">Proveedor</label>
										      <select id="inputState" class="form-control">
										        <option selected>ARTICULOS DE LIMPIEZA</option>
										        <option>CARATULAS Y FICHAS</option>
										        <option>ELECTRICIDAD</option>
										        <option>FERRETERIA</option>
										        <option>INSUMOS DE COMPUTACION</option>
										      </select>
										    </div>
										    <div class="col-md-4 mb-3">
											    <label for="validationCustomUsername">Total</label>
										        <input type="text" class="form-control" id="validationCustomUsername" required>
										    </div>
										  </div>
										  <div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon3">Buscar</span> 
											</div>
											<input type="text" class="form-control">
											<div class="input-group-append">
												<button class="btn btn-outline-secondary" type="button">Guardar</button>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<table class="table table-hover">
											<thead>
												<tr>
													<th scope="col" width="10%">Código</th>
													<th scope="col" width="30%">Rubro</th>
													<th scope="col" width="35%">Nombre</th>
													<th scope="col" width="15%">Unidad</th>
													<th scope="col" width="10%">Cantidad</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<th scope="row">MO53</th>
													<td>MATERIAL DE OFICINA</td>
													<td>RESMA DE PAPEL OFICIO</td>
													<td>UNIDAD</td>
													<td><input type="number" class="form-control"></td>
												</tr>
												<tr>
													<th scope="row">CO31</th>
													<td>INSUMOS DE COMPUTACION</td>
													<td>REGULADOR/VOLTAJE 600 ZUHIPOINT</td>
													<td>UNIDAD</td>
													<td><input type="number" class="form-control"></td>
												</tr>
												<tr>
													<th scope="row">EL7</th>
													<td>ELECTRICIDAD</td>
													<td>LAMPARA DE 32W</td>
													<td>GALON X 4 LTS.</td>
													<td><input type="number" class="form-control"></td>
												</tr>
											</tbody>
										</table>
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
	<script src="../../assets/js/bootstrap.js"></script>
	<script>
		var aux = true;

		$("#formularioEntradaNuevo").slideUp('fast');

		$("#prodNuevo").click(function() {
			if (!$("#option2:checked").val() == true) {
				$("#formularioEntradaNuevo").slideDown(400);
			}
		});

		$("#prodExistente").click(function() {
			if (!$("#option1:checked").val() == true) {
				$("#formularioEntradaNuevo").slideUp(400);
			}
		});
	</script>
</body>
</html>