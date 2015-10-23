$(function(){
	$('#btn-delete').click(function(){
		if($('input[type=checkbox]:checked').length){
			swal({
				title: "Confirmar Acción",
				text: "Los elementos seleccionados se eliminarán de forma permanente",
				type: "warning",
				showCancelButton: true,
				closeOnConfirm: true
			},
			function (confirm) {
				if(confirm) {
					$('#consulta').submit();
				}
			});
		} else {
			swal('Error', 'No se ha seleccionado ningún elemento.', 'error');
		}
	});

	$('a[title=eliminar]').click(function(e){
		e.preventDefault();

		swal({
			title: "Confirmar Acción",
			text: "Eliminar elemento de forma permanente",
			type: "warning",
			showCancelButton: true,
			closeOnConfirm: true
		},
		function (confirm) {
			if (confirm) {
				window.location.replace(e.currentTarget);
			};
		});

	});

	$('#detalle-usuario').on('hidden.bs.modal', function() {
		$(this).removeData();
	});

	$('#delete-image').click(function() {
		var id  = $(this).data('id');
		var url = $(this).data('url');
		$.ajax({
			url: url,
			type: 'POST',
			data: {'id': id}
		})
		.done(function() {
			$('.single-image').slideUp();
			setTimeout(function(){
				$('.single-image').remove();
			},1000);
		});
	});
});
