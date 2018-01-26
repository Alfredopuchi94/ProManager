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
		<p class="mb-0 title-5">Sistema de Proveduria</p>
	</nav>
</header><!-- /header -->
	<div class="container">
		<div class="row my-5">
			<div class="col-md-8 offset-md-2 my-5">
				<div class="row">
					<div class="col-md-12">
						<div class="panel-heading">
						   <p class="panel-title title-6">
						    	Inicio de sesión
						   </p><br>
						 </div>
						<form id="form_login_usuario">
							<div id="form_message_usuario"></div>
							<div class="form-group">
								<input
									type="text"
									class="form-control"
									name="usuario"
									id="id_name_usuario"
									placeholder="Usuario">
									<div class="invalid-feedback">
										El usuario es invalido
									</div>
							</div>
							<div class="form-group">
								<input
									type="password"
									class="form-control"
									name="pass"
									id="id_pass_usuario"
									placeholder="Contraseña">
									<div class="invalid-feedback">
										la contraseña es invalida
										<ul>
											<li>caracteres minimos 8.</li>
											<li>debe contener al menos 1 letra mayúscula, 1 letra minúscula y 1 número</li>
											<li>Puede contener caracteres especiales</li>
										</ul>
									</div>
							</div><br>
								<button type="submit" class="btn btn-primary btn-block w-50 mx-auto" style="background-color: #0072C6;"><span id="usuario_sub">Usuario</span></button>
						</form> <br>
						<a href="#" data-toggle="modal" data-target="#usuario_recovery" class="text-left d-block mx-auto">Olvide mi contraseña</a>
					</div>
					<div class="panel-heading title-8">
						Aplicación web desarrollada por la Oficina de Apoyo Técnico Informático de la Dirección Administrativa Regional del Estado Zulia 
						de la Dirección Ejecutiva de la Magistratura del Tribunal Supremo de Justicia.
						<p>Todos los derechos reservados.</p>
					</div>

	<!-- Usuario Recovery -->
	<div class="modal fade" id="Usuario_recovery" tabindex="-1" role="dialog" aria-labelledby="Usuario_recovery" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="Usuario_recovery">Recovery Password</h5>
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
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Recovery</button>
				  	</div>
				</form>

				
				
	  </div>
	</div>
		


	<script src="./src/assets/js/bootstrap.min.js"></script>
	<script src="./src/assets/js/jquery-3.2.1.min.js"></script>
	<!-- <script src="./src/app_api/modules/Usuarioe/controller.js"></script> -->
</body>
</html>


