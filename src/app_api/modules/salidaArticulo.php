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
					    <a class="nav-link colorLetraMenu" href="entradaArticulo"><span class="fa fa-arrow-down colIconMenu"></span> Entrada</a>
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
										<form>
										  <div class="form-row">
										    <div class="col-md-4 mb-3">
										      <label for="validationCustom01">N° de factura</label>
										      <input type="text" class="form-control" id="validationCustom01" required disabled="">
										    </div>
										    <div class="col-md-4 mb-3">
										      <label for="validationCustom01">Fecha</label>
										      <input type="text" class="form-control" id="validationCustom01" required>
										    </div>
										    <div class="col-md-4 mb-3">
											    <label for="validationCustomUsername">Nro de Oficio</label>
										        <input type="text" class="form-control" id="validationCustomUsername" required>
										    </div>
										  </div>
										  <div class="form-row">
										  	<div class="form-group col-md-11">
										      <label for="inputState">Dependencia</label>
										      <select id="inputState" class="form-control">
										        <option selected>ARTICULOS DE LIMPIEZA</option>
										        <option>CARATULAS Y FICHAS</option>
										        <option>ELECTRICIDAD</option>
										        <option>FERRETERIA</option>
										        <option>INSUMOS DE COMPUTACION</option>
										      </select>
										    </div>
										    <div class="col-md-1">
										    	<label for="validationCustomUsername">Código</label>
										        <input type="text" class="form-control" id="validationCustomUsername" disabled="">
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
										<table class="table table-hover" style="font-size: 0.9rem;">
											<thead>
												<tr>
													<th scope="col">Código</th>
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
											<tbody>
												<tr>
													<th scope="row">MO53</th>
													<td>REGULADOR/VOLTAJE 600 ZUHIPOINT</td>
													<td>UNIDAD</td>
													<td>20</td>
													<td>100</td>
													<td>2</td>
													<td>18</td>
													<td>500000</td>
													<td>1000000</td>
												</tr>
												<tr>
													<th scope="row">CO31</th>
													<td>REGULADOR/VOLTAJE 600 ZUHIPOINT</td>
													<td>UNIDAD</td>
													<td>20</td>
													<td>100</td>
													<td>2</td>
													<td>18</td>
													<td>500000</td>
													<td>1000000</td>
												</tr>
												<tr>
													<th scope="row">EL7</th>
													<td>REGULADOR/VOLTAJE 600 ZUHIPOINT</td>
													<td>UNIDAD</td>
													<td>20</td>
													<td>100</td>
													<td>2</td>
													<td>18</td>
													<td>500000</td>
													<td>1000000</td>
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