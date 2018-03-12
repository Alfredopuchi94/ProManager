/*-0-0-0-0-0-0-0-0-0 MODAL 0-0-0-0-0-0-0-0-0-0*/
$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
})

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

	        $('#buscarProductoSalida').autocomplete({ // Funcion para buscar los articulos en la base de datos
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
									  +'<a href="javascript:agregarSalidaSession()" class="btn btn-success btn-sm" role="button"><span class="fa fa-plus-circle"></span></a>'
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
	            	if (ui.item.value === 'No existe el proveedor') {
	            		$('#exampleModalCenter').modal('show'); // SI NO ENCUENTRA PROVEEDORES ABRE EL MODAL PARA CREAR UNO NUEVO
	            	} else {
	               		$('#proveedor_oculto').val(ui.item.idProveedor); // GUARDA EL ID DEL PROVEEDOR EN EL CAMPO OCULTO
	            	}
	            }
	        });

	        $('#actividadProveedor').autocomplete({ // Funcion para buscar los proveedores en la base de datos
	            source: 'ajaxActividadProveedor.php',
	            select: function(event,ui){
	            	$('#actOculto').val(ui.item.idActividad);
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

        /****************************** AGREGAR SALIDA A LA SESSION ******************************/

        function agregarSalidaSession() {
        	// if (existencia>0) {
            	$.ajax({
	        		url: 'agregarSaliArtSession.php',
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

        ////////////////////////////// AGREGAR SALIDA A LA SESSION //////////////////////////////

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

        $("#enviarSalida").click(function(event) {

        	var arrayArt = new Array();
			var nuevoArray = new Object();

			arrayArt["dependencia"] = $('#dependencia').val();
			arrayArt["ubicacion"] = $('#ubicacion').val();
        	//arrayArt["factura"] = $("#nroFactura").val();
        	//arrayArt["idProveedor"] = $("#proveedor_oculto").attr('value');
        	//arrayArt["total"] = $("#totalFactura").val();
        	arrayArt.cantArt = new Array();
        	arrayArt.idArt = new Array();



        	$(".cantArt").each(function(index, el) {
        		arrayArt.cantArt[index] = $(this).val();
        	});

        	$(".idDato").each(function(index, el) {
        		arrayArt.idArt[index] = $(this).text();
        	});


        	nuevoArray.dependencia = arrayArt["dependencia"];
        	nuevoArray.ubicacion = arrayArt["ubicacion"];
			// nuevoArray.factura = arrayArt["factura"];
			// nuevoArray.idProveedor = arrayArt["idProveedor"];
			// nuevoArray.total = arrayArt["total"];
			nuevoArray.cantArt = arrayArt.cantArt;
			nuevoArray.idArt = arrayArt.idArt;
			nuevoArray.causaAccion = 2;
			nuevoArray.tipoAccion = 2;

        	$.ajax({
        		url: 'agregarSalida.php',
        		type: 'POST',
        		data: nuevoArray,
        	})
        	.done(function() {
        		alert("Salida enviada.")
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
        
        /****************************** AGREGAR PROVEEDORES A LA BASE DE DATOS ******************************/

		$('#guardarProveedor').click(function() {
			var str = $( "form#formularioProveedor" ).serialize();
    		//alert(str);
			
			$.ajax({
				url: 'registrarProveedor.php',
				type: 'POST',
				data: str,
			})
			.done(function() {
				alert("Proveedor agregado");
				//location.reload();
				console.log("success");
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			
		});

		////////////////////////////// AGREGAR PROVEEDORES A LA BASE DE DATOS //////////////////////////////