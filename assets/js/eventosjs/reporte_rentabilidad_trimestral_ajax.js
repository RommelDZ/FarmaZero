$(document).on("ready", function(){
	$("#gestion_rt").on("change", function(e){
		e.preventDefault();
		$("#titulo_rt").empty();
	    $("#titulo_rt").prepend(
			$("#gestion_rt").val()
		);  

		$.ajax({
			url: "rentabilidad_trimestral_ajax",
			type: "post",
			data:{					
				gestion: $("#gestion_rt").val() 
			},
			beforeSend: function() {
				html = "";
	            html += "<tr><td colspan='5' align='center'>Procesando...</td></tr>";

	            $("#primerTrimestre").html(html);
	            $("#segundoTrimestre").html(html);
	            $("#tercerTrimestre").html(html);
	            $("#cuartoTrimestre").html(html);
	        },
			success: function(data) {

				var registro = JSON.parse(data);
				
				html = "";
				if (registro["primer_trimestre"] != "") {										          	                    
	                for (var i = 0; i < registro["primer_trimestre"].length; i++) {
	                	html += "<tr>";
	                	html += "<td>"+registro["primer_trimestre"][i]["id_producto"]+"</td>";
	                	html += "<td>"+registro["primer_trimestre"][i]["nombre_producto"]+"</td>";
	                	html += "<td>"+parseFloat(registro["primer_trimestre"][i]["precio_ventaproducto"]).toFixed(2).replace(".",",")+" Bs.</td>";
	                	html += "<td>"+parseInt(registro["primer_trimestre"][i]["cantidad_ventaproducto"]).toFixed(2).replace(".",",")+" Bs.</td>";
	                	html += "<td>"+parseFloat(registro["primer_trimestre"][i]["importe_ventaproducto"]).toFixed(2).replace(".",",")+" Bs.</td>";
	                	html += "</tr>";
	                }	              

				}
				else {
	            	html += "<tr><td colspan='5' align='center'>Aún no hay suficientes datos para generar un reporte del trimestre actual.</td></tr>";
	            }
	            $("#primerTrimestre").html(html); 

	            html = "";
	            if (registro["segundo_trimestre"] != "") {										          	                    
	                for (var i = 0; i < registro["segundo_trimestre"].length; i++) {
	                	html += "<tr>";
	                	html += "<td>"+registro["segundo_trimestre"][i]["id_producto"]+"</td>";
	                	html += "<td>"+registro["segundo_trimestre"][i]["nombre_producto"]+"</td>";
	                	html += "<td>"+parseFloat(registro["segundo_trimestre"][i]["precio_ventaproducto"]).toFixed(2).replace(".",",")+" Bs.</td>";
	                	html += "<td>"+parseInt(registro["segundo_trimestre"][i]["cantidad_ventaproducto"]).toFixed(2).replace(".",",")+" Bs.</td>";
	                	html += "<td>"+parseFloat(registro["segundo_trimestre"][i]["importe_ventaproducto"]).toFixed(2).replace(".",",")+" Bs.</td>";
	                	html += "</tr>";
	                }	              

				}
				else {
	            	html += "<tr><td colspan='5' align='center'>Aún no hay suficientes datos para generar un reporte del trimestre actual.</td></tr>";
	            }
	            $("#segundoTrimestre").html(html);             

	            html = "";
	            if (registro["tercer_trimestre"] != "") {										          	                    
	                for (var i = 0; i < registro["tercer_trimestre"].length; i++) {
	                	html += "<tr>";
	                	html += "<td>"+registro["tercer_trimestre"][i]["id_producto"]+"</td>";
	                	html += "<td>"+registro["tercer_trimestre"][i]["nombre_producto"]+"</td>";
	                	html += "<td>"+parseFloat(registro["tercer_trimestre"][i]["precio_ventaproducto"]).toFixed(2).replace(".",",")+" Bs.</td>";
	                	html += "<td>"+parseInt(registro["tercer_trimestre"][i]["cantidad_ventaproducto"]).toFixed(2).replace(".",",")+" Bs.</td>";
	                	html += "<td>"+parseFloat(registro["tercer_trimestre"][i]["importe_ventaproducto"]).toFixed(2).replace(".",",")+" Bs.</td>";
	                	html += "</tr>";
	                }	              

				}
				else {
	            	html += "<tr><td colspan='5' align='center'>Aún no hay suficientes datos para generar un reporte del trimestre actual.</td></tr>";
	            }
	            $("#tercerTrimestre").html(html);    

	            html = "";
	            if (registro["cuarto_trimestre"] != "") {										          	                    
	                for (var i = 0; i < registro["cuarto_trimestre"].length; i++) {
	                	html += "<tr>";
	                	html += "<td>"+registro["cuarto_trimestre"][i]["id_producto"]+"</td>";
	                	html += "<td>"+registro["cuarto_trimestre"][i]["nombre_producto"]+"</td>";
	                	html += "<td>"+parseFloat(registro["cuarto_trimestre"][i]["precio_ventaproducto"]).toFixed(2).replace(".",",")+" Bs.</td>";
	                	html += "<td>"+parseInt(registro["cuarto_trimestre"][i]["cantidad_ventaproducto"]).toFixed(2).replace(".",",")+" Bs.</td>";
	                	html += "<td>"+parseFloat(registro["cuarto_trimestre"][i]["importe_ventaproducto"]).toFixed(2).replace(".",",")+" Bs.</td>";
	                	html += "</tr>";
	                }	              

				}
				else {
	            	html += "<tr><td colspan='5' align='center'>Aún no hay suficientes datos para generar un reporte del trimestre actual.</td></tr>";
	            }
	            $("#cuartoTrimestre").html(html);                      
			}
		});
	});   
}); 