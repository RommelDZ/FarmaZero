$(document).on("ready", function(){
	$("#mes_vd, #gestion_vd").on("change", function(e){
		e.preventDefault();
		$("#titulo_vd").empty();
	    $("#titulo_vd").prepend(
			$("#mes_vd option:selected").text() + " " + $("#gestion_vd").val()
		);  

		$.ajax({
			url: "venta_diario_ajax",
			type: "post",
			data:{
				mes: $("#mes_vd").val(),
				gestion: $("#gestion_vd").val() 
			},
			beforeSend: function() {
				html = "";
	            html += "<tr><td colspan='3' align='center'>Procesando...</td></tr>";

	            $("#ventaDiario").html(html);
	        },
			success: function(data) {
				//alert(respuesta);
				
				var registros = eval(data);
				dia = [];
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
	                	html += "<th>"+registros[i]["dia"]+"</th>";
	                	html += "<td>"+registros[i]["cantidad_ventaproducto"]+"</td>";
	                	html += "<td>"+parseFloat(registros[i]["importe_ventaproducto"]).toFixed(2).replace(".",",")+" Bs.</td>";
	                	html += "</tr>";

	                	dia[i] = registros[i]["dia"];
	                	cantidad[i] = parseInt(registros[i]["cantidad_ventaproducto"]);
	                	ganancias[i] = Number(parseFloat(registros[i]["importe_ventaproducto"]).toFixed(2));

	                	cantidad_total += parseInt(registros[i]["cantidad_ventaproducto"]);
	                	importe_total += parseFloat(registros[i]["importe_ventaproducto"]);
	                }

				    $('#grafica_cantidad_vd').highcharts({
				        chart: {
				            type: 'bar'
				        },
				        title: {
				            text: 'Venta Diario'
				        },
				        subtitle: {
				            text: $("#mes_vd option:selected").text() + " " + $("#gestion_vd").val()
				        },
				        xAxis: {
				            categories: dia,
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

				    $('#grafica_ganancias_vd').highcharts({
				        chart: {
				            type: 'bar'
				        },
				        title: {
				            text: 'Venta Diario'
				        },
				        subtitle: {
				            text: $("#mes_vd option:selected").text() + " " + $("#gestion_vd").val()
				        },
				        xAxis: {
				            categories: dia,
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

				    $('#grafica_cantidad_vd').highcharts({
				        chart: {
				            type: 'bar'
				        },
				        title: {
				            text: 'Venta Diario'
				        },
				        subtitle: {
				            text: $("#mes_vd option:selected").text() + " " + $("#gestion_vd").val()
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

				    $('#grafica_ganancias_vd').highcharts({
				        chart: {
				            type: 'bar'
				        },
				        title: {
				            text: 'Venta Diario'
				        },
				        subtitle: {
				            text: $("#mes_vd option:selected").text() + " " + $("#gestion_vd").val()
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
	            $("#ventaDiario").html(html);	                    

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
