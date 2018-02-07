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
					    <a class="nav-link colorLetraMenu" href="#"><span class="fa fa-search colIconMenu"></span> Articulos</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link colorLetraMenu" href="entradaArticulo.php"><span class="fa fa-arrow-down colIconMenu"></span> Entrada</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link colorLetraMenu" href="salidaArticulo.php"><span class="fa fa-arrow-up colIconMenu"></span> Salida</a>
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
					<div class="col-md-10 offset-md-1">
						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Buscar articulos</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Agregar Articulo</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">otra cosa</a>
							</li>
						</ul>
					</div>

					<div class="col-md-12">
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
								<div class="row">
									<div class="col-md-10 offset-md-1">
										<div class="col-md-12 pt-4">
											<h3 class="w-100 text-center">Buscar articulo</h3>
											<hr>
										</div>
										<div class="input-group mb-3 pt-2">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon3">Buscar</span>
											</div>
											<input type="text" class="form-control">
											<div class="input-group-append">
												<button class="btn btn-outline-secondary" type="button">Ir!</button>
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
									</div>
								</div>
							</div>

							<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
								<div class="row">
									<div class="col-md-12 pt-4">
										<form>
										  <div class="form-row">
										    <div class="form-group col-md-2">
										      <label for="inputEmail4">Codigo</label>
										      <input type="email" class="form-control" id="inputEmail4" disabled="">
										    </div>
										    <div class="form-group col-md-4">
										      <label for="inputState">Rubro</label>
										      <select id="inputState" class="form-control">
										        <option selected>ARTICULOS DE LIMPIEZA</option>
										        <option>CARATULAS Y FICHAS</option>
										        <option>ELECTRICIDAD</option>
										        <option>FERRETERIA</option>
										        <option>INSUMOS DE COMPUTACION</option>
										      </select>
										    </div>
										    <div class="form-group col-md-6">
										      <label for="inputEmail4">Nombre</label>
										      <input type="email" class="form-control" id="inputEmail4">
										    </div>
										  </div>
										  <div class="form-row">
										  	<div class="form-group col-md-3">
										      <label for="inputState">Unidad</label>
										      <select id="inputState" class="form-control">
										        <option selected>UNIDAD</option>
										        <option>CAJA</option>
										        <option>BOLSA</option>
										        <option>METRO</option>
										      </select>
										    </div>
										    <div class="form-group col-md-3">
										      <label for="inputCity">Existencia</label>
										      <input type="text" class="form-control" id="inputCity">
										    </div>
										    <div class="form-group col-md-3">
										      <label for="inputZip">Minimo</label>
										      <input type="text" class="form-control" id="inputZip">
										    </div>
										    <div class="form-group col-md-3">
										      <label for="inputZip">Costo</label>
										      <input type="text" class="form-control" id="inputZip">
										    </div>
										  </div>
										  <div class="form-group">
										    <div class="form-check">
										      <input class="form-check-input" type="checkbox" id="gridCheck">
										      <label class="form-check-label" for="gridCheck">
										        Check me out
										      </label>
										    </div>
										  </div>
										  <button type="submit" class="btn btn-primary">Sign in</button>
										</form>
									</div>
								</div>
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
</body>
</html>