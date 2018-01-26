<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Form</title>
	<link rel="stylesheet" href="./src/assets/css/app.css">
	<link rel="stylesheet" href="./src/assets/css/bootstrap.min.css">
</head>
<body>
<header>
	<nav class="navbar navbar-primary bgnav justify-content-center">
		<p class="mb-0 title-5" style="color: white;">Sistema de Proveduria</p>
	</nav>
</header><!-- /header -->
	<div class="container">
		<div class="row my-4">
			<div class="col-md-8 offset-md-2 my-5">
				<div class="panel-heading text-center">
					<p class="panel-title title-6">Inicio de sesión</p>
				</div>
				<div class="col-lg-12"><hr></div><br>
				<div class="row">
					<div class="col-md-8 mx-auto">
						 <form class="form-horizontal" action="php/session.php" method="post" name="form_session">
							<div id="form_message_cliente"></div>
							<div class="form-group">
								<input
									type="email"
									class="form-control"
									name="email"
									id="email_cliente"
									placeholder="Email">
									<div class="invalid-feedback">
										EL email es invalido
									</div>
							</div>
							<div class="form-group">
								<input
									type="password"
									class="form-control"
									name="clave"
									id="pass_cliente"
									placeholder="Contraseña">
									<div class="invalid-feedback">
										la Contraseña es invalida
										<ul>
											<li>Debe obtener al menos 8 caracteres</li>
											<li>Debe tener al menos 1 letra mayuscula, 1 minuscula y 1 numero </li>
											<li>puede tener caracteres especiales</li>
										</ul>
									</div>
							</div>
							<a href="#" data-toggle="modal" data-target="#email_recovery" class="text-left d-block mx-auto">Olvide mi contraseña</a><br>
								<button type="submit" class="btn btn-primary btn-block w-50 mx-auto" style="background-color: #0072C6;"><span id="usuario_sub">Ingresar</span></button>
						</form>
					<br><br></div>
					<div class="title-9">
						<p class="text-center">Aplicación web desarrollada por la <span class="font-weight-bold">Oficina de Apoyo Técnico Informático</span> de la <span class="font-weight-bold">Dirección Administrativa Regional del Estado Zulia</span> 
						de la Dirección Ejecutiva de la Magistratura del Tribunal Supremo de Justicia. Todos los derechos reservados.</p>
						</p>
					</div>
					

	<!-- Usuario Recovery -->
	<div class="modal fade" id="Usuario_recovery" tabindex="-1" role="dialog" aria-labelledby="Usuario_recovery" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="Usuario_recovery">Recuperar Contraseña</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
				<form id="recovery_form_Usuario">
				 	 <div class="modal-body">
						<div class="form-group">
							<input type="usuario" class="form-control" name="usuario" id="usuarioRC" placeholder="usuario">
							<div class="invalid-feedback">El usuario es invalido</div>
					  </div>
				  	</div>
				  	<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-primary">Recuperar</button>
				  	</div>
				</form>

				
				
	  </div>
	</div>
		


	<script src="./src/assets/js/bootstrap.min.js"></script>
	<script src="./src/assets/js/jquery-3.2.1.min.js"></script>
	<!-- <script src="./src/app_api/modules/Usuarioe/controller.js"></script> -->
</body>
</html>


