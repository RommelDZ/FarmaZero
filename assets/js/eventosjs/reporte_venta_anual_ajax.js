$(document).on("ready", function(){
	$("#gestion_vm").on("change", function(e){
		e.preventDefault();	  
		$.ajax({
			url: "venta_anual_ajax",
			type: "post",
			/*data:{					
				gestion: $("#gestion_vm").val() 
			},*/
			beforeSend: function() {
				html = "";
	            html += "<tr><td colspan='3' align='center'>Procesando...</td></tr>";

	            $("#ventaAnual").html(html);
	        },
			success: function(data) {
				//alert(respuesta);
				
				var registros = eval(data);
				gestion = [];
				cantidad = [];
				ganancias = [];
				html = "";
				cantidad_total = 0;
				importe_total = 0;

				Highcharts.theme = {
			    	colors: ["#2b908f", "#90ee7e", "#f45b5b", "#7798BF", "#aaeeee", "#ff0066", "#eeaaee",
			          "#55BF3B", "#DF5353", "#7798BF", "#aaeeee"],
			    	chart: {
						style: {
						 fontFamily: "'Unica One', sans-serif"
						},
						plotBorderColor: '#606063'
			       }
			    };

			    Highcharts.setOptions(Highcharts.theme);

				if (registros != "") {										          	                    
	                for (var i = 0; i < registros.length; i++) {
	                	html += "<tr>";
	                	html += "<th>"+registros[i]["gestion"]+"</th>";
	                	html += "<td>"+registros[i]["cantidad_ventaproducto"]+"</td>";
	                	html += "<td>"+parseFloat(registros[i]["importe_ventaproducto"]).toFixed(2).replace(".",",")+" Bs.</td>";
	                	html += "</tr>";

	                	gestion[i] = registros[i]["gestion"];
	                	cantidad[i] = parseInt(registros[i]["cantidad_ventaproducto"]);
	                	ganancias[i] = Number(parseFloat(registros[i]["importe_ventaproducto"]).toFixed(2));

	                	cantidad_total += parseInt(registros[i]["cantidad_ventaproducto"]);
	                	importe_total += parseFloat(registros[i]["importe_ventaproducto"]);
	                }	              

				    $('#grafica_cantidad_va').highcharts({
				        chart: {
				            type: 'bar'
				        },
				        title: {
				            text: 'Venta Anual'
				        },
				        xAxis: {
				            categories: gestion,
				            title: {
				                text: null
				            }
				        },
				        yAxis: {
				            min: 0,
				            title: {
				                text: 'Cantidad de Productos Vendidos (unidades)',
				                align: 'high'
				            },
				            labels: {
				                overflow: 'justify'
				            }
				        },
				        tooltip: {
				            valueSuffix: ' unidades'
				        },
				        plotOptions: {
				            bar: {
				                dataLabels: {
				                    enabled: true
				                }
				            }
				        },
				        legend: {
				            layout: 'vertical',
				            align: 'right',
				            verticalAlign: 'top',
				            x: -40,
				            y: 80,
				            floating: true,
				            borderWidth: 1,
				            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
				            shadow: true
				        },
				        credits: {
				            enabled: false
				        },
				        series: [{
				            name: 'Cantidad',
				            data: cantidad
				        }]
				    });

				    $('#grafica_ganancias_va').highcharts({
				        chart: {
				            type: 'bar'
				        },
				        title: {
				            text: 'Venta Anual'
				        },
				        xAxis: {
				            categories: gestion,
				            title: {
				                text: null
				            }
				        },
				        yAxis: {
				            min: 0,
				            title: {
				                text: 'Importe por Productos Vendidos (Bs.)',
				                align: 'high'
				            },
				            labels: {
				                overflow: 'justify'
				            }
				        },
				        tooltip: {
				            valueSuffix: ' Bs.'
				        },
				        plotOptions: {
				            bar: {
				                dataLabels: {
				                    enabled: true
				                }
				            }
				        },
				        legend: {
				            layout: 'vertical',
				            align: 'right',
				            verticalAlign: 'top',
				            x: -40,
				            y: 80,
				            floating: true,
				            borderWidth: 1,
				            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
				            shadow: true
				        },
				        credits: {
				            enabled: false
				        },
				        series: [{
				            name: 'Ganancias',
				            data: ganancias
				        }]
				    });
	            }
	            else {
	            	html += "<tr><td colspan='3' align='center'>Ningún dato disponible en esta tabla</td></tr>";

				    $('#grafica_cantidad_va').highcharts({
				        chart: {
				            type: 'bar'
				        },
				        title: {
				            text: 'Venta Diario'
				        },
				        xAxis: {
				            categories: ["0"],
				            title: {
				                text: null
				            }
				        },
				        yAxis: {
				            min: 0,
				            title: {
				                text: 'Cantidad de Productos Vendidos (unidades)',
				                align: 'high'
				            },
				            labels: {
				                overflow: 'justify'
				            }
				        },
				        tooltip: {
				            valueSuffix: ' unidades'
				        },
				        plotOptions: {
				            bar: {
				                dataLabels: {
				                    enabled: true
				                }
				            }
				        },
				        legend: {
				            layout: 'vertical',
				            align: 'right',
				            verticalAlign: 'top',
				            x: -40,
				            y: 80,
				            floating: true,
				            borderWidth: 1,
				            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
				            shadow: true
				        },
				        credits: {
				            enabled: false
				        },
				        series: [{
				            name: 'Cantidad',
				            data: null
				        }]
				    });

				    $('#grafica_ganancias_va').highcharts({
				        chart: {
				            type: 'bar'
				        },
				        title: {
				            text: 'Venta Anual'
				        },
				        xAxis: {
				            categories: ["0"],
				            title: {
				                text: null
				            }
				        },
				        yAxis: {
				            min: 0,
				            title: {
				                text: 'Importe por Productos Vendidos (Bs.)',
				                align: 'high'
				            },
				            labels: {
				                overflow: 'justify'
				            }
				        },
				        tooltip: {
				            valueSuffix: ' Bs.'
				        },
				        plotOptions: {
				            bar: {
				                dataLabels: {
				                    enabled: true
				                }
				            }
				        },
				        legend: {
				            layout: 'vertical',
				            align: 'right',
				            verticalAlign: 'top',
				            x: -40,
				            y: 80,
				            floating: true,
				            borderWidth: 1,
				            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
				            shadow: true
				        },
				        credits: {
				            enabled: false
				        },
				        series: [{
				            name: 'Ganancias',
				            data: null
				        }]
				    });
	            }
	            $("#ventaAnual").html(html);	                    

	            $("#cantidadTotal").empty();
	    		$("#cantidadTotal").prepend(
					cantidad_total
				);  
				$("#importeTotal").empty();
	    		$("#importeTotal").prepend(
					parseFloat(importe_total).toFixed(2).replace(".",",")+" Bs."
				);                    
			}
		});
	});   
}); 