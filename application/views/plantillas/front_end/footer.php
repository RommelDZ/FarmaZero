		<div class="row clearfix">      
			<div class="borde"></div>
		</div>

		<footer class="row">
			<div class="row clearfix text">
		  		<div class="col-md-2 column">
			
		  		</div>
		  	<div class="col-md-10 column">
				<h5>
			  		Opiniones y consejos sobre servicios en desarrollo, análisis, implementacion de sistemas y muchos más.
				</h5>
				<p>
			  		Visitenos en www.dashmaniasoluciones.com o para cualquier duda comuniquese con nosotros dashmania_desarrollo@gmail.com
				</p>
		  	</div>
			</div>
			<div class="row clearfix">
			  <div class="col-md-12 column">
				<p class="copyrigth">
				  © 2015 DASHMANIA Todos los derechos reservados. <u>Condiciones de uso</u>, <u>Política de privacidad</u> y <u>Política de cookies</u>.
				</p>
			  </div>
			</div>
	  	</footer>
	</div>

	<!-- Include Bootstrap -->
	<script src="<?= base_url() ?>assets/js/bootstrap-3.3.6.js"></script>
	<!-- Include Bootstrap confirmation -->
	<script src="<?= base_url() ?>assets/js/bootstrap-confirmation.js"></script>
	<!-- bxSlider Javascript file -->
	<script src="<?= base_url() ?>assets/js/jquery.bxslider.min.js"></script>
	<!-- Script para animacion y funcionamiento del Slider inicial -->
	<script>
		$(document).ready(function(){
			$('.bxslider').bxSlider({
				mode: 'fade',
				auto: true,
				speed: 200,
			});
		});
	</script>
	<!-- Include JQuery DataTables -->
	<script src="<?= base_url() ?>assets/js/jquery.dataTables-1.10.11.js"></script>
	<!-- Include DataTables buttons -->
	<script src="<?= base_url() ?>assets/js/dataTables.buttons-1.10.11.js"></script>
	<!-- Include DataTables buttons html5 -->
	<script src="<?= base_url() ?>assets/js/buttons.html5-1.10.11.js"></script>
	<!-- Include libreria pdfmake para convertir DataTables a formato pdf -->
	<script src="<?= base_url() ?>assets/js/pdfmake.js"></script>
	<!-- Include vfs_fonts para pdf -->
	<script src="<?= base_url() ?>assets/js/vfs_fonts.js"></script>
	<!-- Include jszip para convertit dataTables a formato xlsx -->
	<script src="<?= base_url() ?>assets/js/jszip.js"></script>

	<script>
	  	$(document).ready(function() {
			$('#tblDatos').DataTable({
				dom: 'Bfrtip',
				lengthMenu: [
			        [ 10, 25, 50, -1 ],
			        [ '10 registros', '25 registros', '50 registros', 'Mostrar Todo' ]
			    ],
				language: {
				    "sProcessing":     "Procesando...",
				    "sLengthMenu":     "Mostrar _MENU_ registros",
				    "sZeroRecords":    "No se encontraron resultados",
				    "sEmptyTable":     "Ningún dato disponible en esta tabla",
				    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
				    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
				    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
				    "sInfoPostFix":    "",
				    "sSearch":         "Buscar:",
				    "sUrl":            "",
				    "sInfoThousands":  ",",
				    "sLoadingRecords": "Cargando...",
				    "oPaginate": {
				        "sFirst":    "Primero",
				        "sLast":     "Último",
				        "sNext":     "Siguiente",
				        "sPrevious": "Anterior"
				    },
				    "oAria": {
				        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
				    },
				    buttons: {
			            pageLength: {
			                _: "Mostrar %d registros",
			                '-1': "Mostrar Todo"
			            }
			        }
				},
		        buttons: [
		        	'pageLength',
		        	{
		                extend: 'copyHtml5',
		                text: '<i class="fa fa-clipboard" aria-hidden="true"></i>',
		                titleAttr: 'Copy'
		            },
		            {
		                extend: 'excelHtml5',
		                text: '<i class="fa fa-file-excel-o" aria-hidden="true"></i>',
                		titleAttr: 'Excel'
		            },
		            {
		                extend: 'pdfHtml5',	
		                text: '<i class="fa fa-file-pdf-o" aria-hidden="true"></i>',
                		titleAttr: 'PDF',	                
		                download: 'open'
		            }		
		        ]
		        
			});

			var table = $('#tblTopProductos').DataTable({		   
		        "ordering": false,
		        "searching": false,
		        dom: 'Bfrtip',
				lengthMenu: [
			        [ 10, 25, 50, -1 ],
			        [ '10 registros', '25 registros', '50 registros', 'Mostrar Todo' ]
			    ],
		        language: {
				    "sProcessing":     "Procesando...",
				    "sLengthMenu":     "Mostrar _MENU_ registros",
				    "sZeroRecords":    "No se encontraron resultados",
				    "sEmptyTable":     "Ningún dato disponible en esta tabla",
				    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
				    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
				    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
				    "sInfoPostFix":    "",
				    "sSearch":         "Buscar:",
				    "sUrl":            "",
				    "sInfoThousands":  ",",
				    "sLoadingRecords": "Cargando...",
				    "oPaginate": {
				        "sFirst":    "Primero",
				        "sLast":     "Último",
				        "sNext":     "Siguiente",
				        "sPrevious": "Anterior"
				    },
				    "oAria": {
				        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
				    },
				    buttons: {
			            pageLength: {
			                _: "Mostrar %d registros",
			                '-1': "Mostrar Todo"
			            }
			        }
				},	
				buttons: [
		        	'pageLength',
		        	{
		                extend: 'copyHtml5',
		                text: '<i class="fa fa-clipboard" aria-hidden="true"></i>',
		                titleAttr: 'Copy'
		            },
		            {
		                extend: 'excelHtml5',
		                text: '<i class="fa fa-file-excel-o" aria-hidden="true"></i>',
                		titleAttr: 'Excel'
		            },
		            {
		                extend: 'pdfHtml5',	
		                text: '<i class="fa fa-file-pdf-o" aria-hidden="true"></i>',
                		titleAttr: 'PDF',	                
		                download: 'open'
		            }		
		        ],
		        "processing": true,        		
		        "ajax": {
		        	'url': '<?= base_url()?>top_productos_ajax',
		        	'type': 'POST',
		        	'data': {
		                mes: $('#mes_tp').val(),
		                gestion: $('#gestion_tp').val()
		            }
				},
				"columns": [
					{ "data": 'id_producto' },
					{ "data": 'nombre_producto' },
					{ "data": 'precio_ventaproducto' },
					{ "data": 'cantidad_ventaproducto' },
					{ "data": 'importe_ventaproducto' },  
			    ]
		    });

		    $('#mes_tp, #gestion_tp').change( function() {
		    	$('#tblTopProductos').DataTable({		   
			        "ordering": false,
			        "searching": false,
			        dom: 'Bfrtip',
					lengthMenu: [
				        [ 10, 25, 50, -1 ],
				        [ '10 registros', '25 registros', '50 registros', 'Mostrar Todo' ]
				    ],
			        language: {
					    "sProcessing":     "Procesando...",
					    "sLengthMenu":     "Mostrar _MENU_ registros",
					    "sZeroRecords":    "No se encontraron resultados",
					    "sEmptyTable":     "Ningún dato disponible en esta tabla",
					    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
					    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
					    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
					    "sInfoPostFix":    "",
					    "sSearch":         "Buscar:",
					    "sUrl":            "",
					    "sInfoThousands":  ",",
					    "sLoadingRecords": "Cargando...",
					    "oPaginate": {
					        "sFirst":    "Primero",
					        "sLast":     "Último",
					        "sNext":     "Siguiente",
					        "sPrevious": "Anterior"
					    },
					    "oAria": {
					        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
					        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
					    },
					    buttons: {
				            pageLength: {
				                _: "Mostrar %d registros",
				                '-1': "Mostrar Todo"
				            }
				        }
					},	
					buttons: [
			        	'pageLength',
			        	{
			                extend: 'copyHtml5',
			                text: '<i class="fa fa-clipboard" aria-hidden="true"></i>',
			                titleAttr: 'Copy'
			            },
			            {
			                extend: 'excelHtml5',
			                text: '<i class="fa fa-file-excel-o" aria-hidden="true"></i>',
	                		titleAttr: 'Excel'
			            },
			            {
			                extend: 'pdfHtml5',	
			                text: '<i class="fa fa-file-pdf-o" aria-hidden="true"></i>',
	                		titleAttr: 'PDF',	                
			                download: 'open'
			            }		
			        ],
			        "processing": true,	        		
	        		"destroy": true,
			        "ajax": {
			        	'url': '<?= base_url()?>top_productos_ajax',
			        	'type': 'POST',
			        	'data': {
			                mes: $('#mes_tp').val(),
			                gestion: $('#gestion_tp').val()
			            }
					},
					"columns": [
						{ "data": 'id_producto' },
						{ "data": 'nombre_producto' },
						{ "data": 'precio_ventaproducto' },
						{ "data": 'cantidad_ventaproducto' },
						{ "data": 'importe_ventaproducto' },  
				    ]
			    });
		    	$("#titulo_tp").empty();
			    $("#titulo_tp").prepend(
					$("#mes_tp option:selected").text() + " " + $("#gestion_tp").val()
				);  
			});
	  	});
	</script>
	 
	<script>
		$(document).ready(function() {
			//cambiando el importe y stock de productos en venta si hay algun cambio en el valor de cantidad de produtos venta
			$("#cantidad_ventaproducto").change(function() {
				var stock = $('#stock_fijo').val() - $(this).val();
				var importe = $(this).val() * $('#precio_producto').val();
				$('#stock_producto').val(stock);
				$('#importe_ventaproducto').val(parseFloat(importe).toFixed(2));
			});
			//agregando el icono glyphicon de buscar en DataTables 
			$("#tblDatos_filter label").prepend("<span class='glyphicon glyphicon-search'></span> ");           
			//agregando iconos en el boton input type submit - alterando estilos
			$(".icon-input-btn").each(function() {
		        var btnFont = $(this).find(".btn").css("font-size");
		        var btnColor = $(this).find(".btn").css("color");
				$(this).find(".glyphicon").css("font-size", btnFont);
		        $(this).find(".glyphicon").css("color", btnColor);
		        if($(this).find(".btn-xs").length){
		            $(this).find(".glyphicon").css("top", "24%");
		        }
			}); 
			//desabilitando boton guarar venta si se hizo algun cambio de valor en el carrito
			$('.cantidad_carrito').change(function() {
				$('#btn_guardar_venta').attr('disabled','disabled');
				//console.log('cambio valor');
     		});
			//desabilitando boton guarar venta si importe total es igual a 0
     		if($('#importe_total').val() == 0) {
     			$('#btn_guardar_venta').attr('disabled','disabled');
     		}
     		//agregando mensaje de confirmacion a botones href
     		$('[data-toggle="confirmation"]').confirmation({
     			href: function(elem){
			        return $(elem).attr('href');
			    },
			    title: 'Esta usted seguro',
			    btnOkClass: 'btn btn-sm btn-success',
			    btnOkLabel: 'Si',
			    btnCancelLabel: 'No'
     		});

     		//agregando el mes y gestion correspondiente al titulo 
			$("#titulo_tp").prepend(
				$("#mes_tp option:selected").text() + " " + $("#gestion_tp").val()		
			);  
			$("#titulo_vd").prepend(
				$("#mes_vd option:selected").text() + " " + $("#gestion_vd").val()		
			);  
			$("#titulo_vm").prepend(
				$("#gestion_vm").val()		
			);  
			$("#titulo_rt").prepend(
				$("#gestion_rt").val()		
			);  
		});
	</script>

	<script type="text/javascript">
	    $(document).ready(function(){
	        $("#form_modal").on("submit", function(e){
	            $.ajax({
	                url: "<?= base_url('registra_clienteventa') ?>",
	                type: "post",
	                data: $(this).serialize(),   
	                beforeSend: function(){
	                    $(".loader").show();
	                },
	                success: function(data){
	                    //$(".loader").fadeOut("slow");
	                    
	                    //$("#popupRegistrar").modal("hide");  
	                    //console.log(data);
	                    var json = JSON.parse(data);
			            $(".errornit, .errornombre, .errordireccion, .errortelefono").html("");
			            if(json.res == "error") {
			            	if(json.nit_cliente) {
			            		$(".errornit").append("<span class='mensaje-error'>" + json.nit_cliente + "</span>");
			            	}
			            	if(json.nombre_cliente) {
			            		$(".errornombre").append("<span class='mensaje-error'>" + json.nombre_cliente + "</span>");
			            	}
	                        if(json.direccion_cliente) {
			            		$(".errordireccion").append("<span class='mensaje-error'>" + json.direccion_cliente + "</span>");
			            	}
			            	if(json.telefono_cliente) {
			            		$(".errortelefono").append("<span class='mensaje-error'>" + json.telefono_cliente + "</span>");
			            	}
			            }
			            else {
			            	alert("Cliente Registrado Correctamente");//todo ha salido bien
	                        $('#popupRegistrarCliente').modal('hide');//cerramos la modal de bootstrap
	                        console.log(json.nit_cliente);
	                        $('#nombre_cliente').val(json.nombre_cliente);
	                        $('#id_cliente').val(json.id_cliente);
	                        $('#nit_cliente').val(json.nit_cliente);
	                        $('#nit_cliente_modal').val("");
	                        $('#direccion_cliente_modal').val("");
	                        $('#telefono_cliente_modal').val("");
			            }
			        },
			        error: function(jqXHR, exception)
			        {
			            console.log("Error: " + jqXHR.responseText)
			        }
				});
				e.preventDefault();
	            //return false;
	        })

	    });
    </script>

    <script type="text/javascript">
    	function imprimir(){
			var objeto=document.getElementById('print_ticket');  //obtenemos el objeto a imprimir
			var ventana=window.open('','_blank');  //abrimos una ventana vacía nueva
			ventana.document.write(objeto.innerHTML);  //imprimimos el HTML del objeto en la nueva ventana
			ventana.document.close();  //cerramos el documento
			ventana.print();  //imprimimos la ventana
			ventana.close();  //cerramos la ventana
		}
    </script>

	<!-- Includes Eventosjs - funciones Jquery Ajax y Graficas Highcharts -->
	<script src="<?= base_url() ?>assets/js/eventosjs/reporte_venta_diario_ajax.js"></script>
    <script src="<?= base_url() ?>assets/js/eventosjs/reporte_venta_mensual_ajax.js"></script>
    <script src="<?= base_url() ?>assets/js/eventosjs/reporte_rentabilidad_trimestral_ajax.js"></script>
  </body>
</html>