$(document).on("ready", inicio);

function inicio() {
	top_productos("","");
	$("#form_top_productos").submit(function(event) {
		event.preventDefault();

		$.ajax({
			url: $(this).attr("action"),
			type: $(this).attr("method"),
			data: $(this).serialize(),
			success: function(respuesta) {
				alert(respuesta);
			}
		});
	});
}

function top_productos(mes, gestion) {
	$.ajax({
		url: "<?= base_url('top_produtos_ajax') ?>",
		type: "post",
		data:{
			mes_tp: mes,
			gestion_tp: gestion 
		}
		success: function(respuesta) {
			alert(respuesta);
		}
	});
}

