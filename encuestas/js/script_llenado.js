	$(document).ready(function(){
		$('#curso_realizado').val(1);
		recargarLista();

		$('#curso_realizado').change(function(){
			recargarLista();
		});
	})

	function recargarLista(){
		$.ajax({
			type:"POST",
			url:"cuestionario_relator.php",
			data:"curso_relator=" + $('#curso_realizado').val(),
			success:function(r){
				$('#relator_evaluado').html(r);
			}
		});
	}
