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
										      <label for="rubro">Rubro</label>
										      <select name="id_rubro" id="rubro" class="form-control" required="">
										        <option value="" disable selected>Seleccione Rubro</option>
										       <?php
										       // Se llena el <optio> de los rubros con la info de la base de datos
												include '../config/conexion.php';

										        $sql1 = "SELECT * FROM SC_PROVEDURIA.T_RUBROS";

										         $query1=sqlsrv_query($conn,$sql1); 

													while ($reg1=sqlsrv_fetch_array($query1, SQLSRV_FETCH_ASSOC)) { 

			  										echo '<option value="'.$reg1["ID_RUBRO"].'">'.$reg1['NOMBRE_RUBRO'].'</option>'; 
												} ?>
										      </select>
										    </div>
										    <div class="form-group col-md-6">
										      <label for="Descripcion">Descripcion</label>
										      <input name="nombre" type="text" class="form-control" id="Descripcion" required="">
										    </div>
										  </div>
										  <div class="form-row">
										  	<div class="form-group col-md-3">
										      <label for="unidad">Unidad</label>
										      <select name="id_unidad" id="unidad" class="form-control" required="">
										        <option value="" disable selected>Seleccione la unidad</option>
										       <?php
										       // Se llena el <option> de las unidades con la info de la base de datos

										        $sql = "SELECT * FROM SC_PROVEDURIA.T_UNIDADES";

										         $query=sqlsrv_query($conn,$sql); 

													while ($reg=sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) { 

			  										echo '<option value="'.$reg["ID_UNIDAD"].'">'.$reg['DESCRIPCION_UNIDAD'].'</option>'; 
												} ?>
										      </select>
										    </div>
										    <div class="form-group col-md-3">
										      <label for="existencia">Existencia</label>
										      <input name="existencia" type="number" min="1" class="form-control" id="existencia" required="">
										    </div>
										    <div class="form-group col-md-3">
										      <label for="minimo">Minimo</label>
										      <input name="minimo" type="number" min="1" class="form-control" id="minimo" required="">
										    </div>
										    <div class="form-group col-md-3">
										      <label for="costo">Costo</label>
										      <input name="costo" type="number" min="1" step="0.01" class="form-control" id="costo" required="">
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
										<form id="formularioE" method="get" action="agregarEntrada.php">
										  <div class="form-row">
										    <div class="col-md-4 mb-3">
										      <label for="nroFactura">N° de factura</label>
										      <input type="text" class="form-control" id="nroFactura" required>
										    </div>
										    <div class="col-md-4 mb-3">
										      <label for="validationCustom01">Proveedor</label>
										      <input type="text" class="form-control" id="buscarProveedor" required>
										      <input id="proveedor_oculto" value="0" type="hidden" name="id_proveedor">
										    </div>
										    <div class="col-md-4 mb-3">
											    <label for="totalFactura">Fecha de Factura</label>
										        <input type="date" class="form-control" id="totalFactura" required>
										    </div>
										  </div>
										  <div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon3">Buscar</span> 
											</div>
											<input id="buscarProducto" type="text" class="form-control">
										</div>
									</div>
									<div class="col-md-12">
										<div id="resultados"></div>
										<table class="table table-hover small">
											<thead>
												<tr>
													<th scope="col" width="10%">Código</th>
													<th scope="col" width="15%">Rubro</th>
													<th scope="col" width="30%">Nombre</th>
													<th scope="col" width="10%">Unidad</th>
													<th scope="col" width="10%">Cantidad</th>
													<th scope="col" width="20%">Accion</th>
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
										<button id="enviarEntrada" type="submit" class="btn btn-primary d-block m-auto">Guardar entrada</button>
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
	<script>

		$("#formularioEntradaNuevo").slideUp('fast'); // Esconde el formulario para agregar nuevos productos.

		$("#prodNuevo").click(function() { // Muestra el formulario al darle click a Articulo Nuevo
			if (!$("#option2:checked").val() == true) {
				$("#formularioEntradaNuevo").slideDown(400);
			}
		});

		$("#prodExistente").click(function() { // Esconde el formulario al darle click a Articulo Existente
			if (!$("#option1:checked").val() == true) {
				$("#formularioEntradaNuevo").slideUp(400);
			}
		});

		/*************** AUTOCOMPLETAR *****************/

        $(function(){

	        $('#buscarProducto').autocomplete({ // Funcion para buscar los articulos en la base de datos
	            source: 'ajax.php',
	            select: function(event,ui){
	                $('#resultados').slideUp('slow',function(){
	                    $('#resultados').html(
	                        '<table class="table table-hover table-bordered small">'
							+'<colgroup> <col class="col-xs-1"> <col class="col-xs-5"><col class="col-xs-2"><col class="col-xs-1"><col class="col-xs-1"><col class="col-xs-2"></colgroup>'
								  +'<tbody>'
								 +'<thead>'
									+'<tr>'
									  +'<th>Codigo</th>'
									 +'<th>Rubro</th>'
									  +'<th>Nombre</th>'
									  +'<th>Unidad</th>'
									  +'<th>Existencia</th>'
									  +'<th>Accion</th>'
									+'</tr>'
								  +'</thead>'
									+'<tr>'
									  +'<th>'+ui.item.idArticulo+'</th>'
									  +'<td>'+ui.item.rubro+'</td>'
									  +'<td>'+ui.item.value+'</td>'
									  +'<td>'+ui.item.unidad+'</td>'
									  +'<td id="existenciaArt">'+ui.item.existenciaArticulo+'</td>'
									  +'<td>'
									  
									  +'<a href="javascript:agregarSession()" class="btn btn-success btn-sm" role="button"><span class="fa fa-plus-circle"></span></a>'
									  +'</td>'
									+'</tr>'
								  +'</tbody>'
								+'</table>'
	                    );
	                });
	                $('#resultados').slideDown('slow');
	            existencia = ui.item.existenciaArticulo;
	            id = ui.item.idArticulo;
	            }
	        });

	        $('#buscarProveedor').autocomplete({ // Funcion para buscar los proveedores en la base de datos
	            source: 'ajax2.php',
	            select: function(event,ui){
	                $('#proveedor_oculto').val(ui.item.idProveedor);
	            }
	        });
        });

        //////////////////////////// AUTOCOMPLETAR /////////////////////////////////

        /****************************** AGREGAR ARTICULOS A LA SESSION ******************************/

        function agregarSession() {
        	// if (existencia>0) {
            	$.ajax({
	        		url: 'agregarArtSession.php',
	        		type: 'POST',
	        		data: "id="+id
	        	})
	        	.done(function(data) {
	        		if (data == "existe") {
	        			alert("Ya agregaste ese articulo");
	        		}else{
	        			$("#contenedorArt").append(data);
	        		}
	        	})
	        	.fail(function() {
	        		console.log("error");
	        	})
	        	.always(function() {
	        		console.log("complete");
	        	});
	        	
        	// }else{
        	// 	alert("No hay existencia");
        	// }
        }

        ////////////////////////////// AGREGAR ARTICULOS A LA SESSION //////////////////////////////

        /****************************** ENVIAR DATOS DEL FORMULARIO ******************************/

        $("#enviarEntrada").click(function(event) {

        	var arrayArt = new Array();
			var nuevoArray = new Object();

        	arrayArt["factura"] = $("#nroFactura").val();
        	arrayArt["idProveedor"] = $("#proveedor_oculto").attr('value');
        	arrayArt["total"] = $("#totalFactura").val();
        	arrayArt.cantArt = new Array();
        	arrayArt.idArt = new Array();



        	$(".cantArt").each(function(index, el) {
        		arrayArt.cantArt[index] = $(this).val();
        	});

        	$(".idDato").each(function(index, el) {
        		arrayArt.idArt[index] = $(this).text();
        	});



			nuevoArray.factura = arrayArt["factura"];
			nuevoArray.idProveedor = arrayArt["idProveedor"];
			nuevoArray.total = arrayArt["total"];
			nuevoArray.cantArt = arrayArt.cantArt;
			nuevoArray.idArt = arrayArt.idArt;
			nuevoArray.causaAccion = 2;
			nuevoArray.tipoAccion = 1;

        	$.ajax({
        		url: 'agregarEntrada.php',
        		type: 'POST',
        		data: nuevoArray,
        	})
        	.done(function() {
        		alert("Entrada agregada.")
        		location.reload();
        		console.log("success");
        		return false;
        	})
        	.fail(function() {
        		console.log("error");
        	})
        	//alert(arrayArt.idProveedor);
        	return false;
        	
        });

        ////////////////////////////// ENVIAR DATOS DEL FORMULARIO //////////////////////////////

        /****************************** ELIMINAR ARTICULOS DE LA SESSION ******************************/

        $('.table tbody').on('click','.delete',function(){
			$(this).closest('tr').remove();
			
			var id = $(this).parent("td").parent("tr").children('th').text();

			$.ajax({
				url: 'eliminarArtSession.php',
				type: 'POST',
				data: "id="+id,
			})
			.done(function() {

				console.log("success");
			})
			.fail(function() {
				console.log("error");
			})
			
		});

		////////////////////////////// ELIMINAR ARTICULOS DE LA SESSION //////////////////////////////
	</script>
</body>
</html>