<?php
session_start();
session_destroy(); 
?>
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
						  <form class="form-horizontal" action="src/app_api/config/session.php" method="post" name="form_session">
							<div id="form_message_cliente"></div>
							<div class="form-group">
								<input type="text" class="form-control" name="user" id="user" placeholder="email">
							</div>
							<div class="form-group">
								<input type="password" class="form-control" name="pass" placeholder="Contraseña">
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
								<input type="submit" class="btn btn-lg col-sm-12" value="Ingresar" style="color: white;background-color: #0072C6;">
						</form>
					<br><br></div>
					<div class="title-9">
						<p class="text-center">Aplicación web desarrollada por la <span class="font-weight-bold">Oficina de Apoyo Técnico Informático</span> de la <span class="font-weight-bold">Dirección Administrativa Regional del Estado Zulia</span> 
						de la Dirección Ejecutiva de la Magistratura del Tribunal Supremo de Justicia. Todos los derechos reservados.</p>
						</p>
					</div>
					

	<!-- email Recovery -->
	<div class="modal fade" id="email_recovery" tabindex="-1" role="dialog" aria-labelledby="email_recovery" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="email_recovery">Recuperar Contraseña</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
				<form id="recovery_form_email">
				 	 <div class="modal-body">
						<div class="form-group">
							<input type="email" class="form-control" name="email" id="emailRC" placeholder="email">
							<div class="invalid-feedback">El email es invalido</div>
					  </div>
				  	</div>
				  	<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-primary">Recuperar</button>
				  	</div>
				</form>

				
				
	  </div>
	</div>
		

	<!-- 00000000000000000000 Script 00000000000000000000 -->
	<script src="./src/assets/js/bootstrap.min.js"></script>
	<script src="./src/assets/js/jquery-3.2.1.min.js"></script>
	<!-- <script src="./src/app_api/modules/Usuario/controller.js"></script> -->
</body>
</html>


