jQuery(document).ready(function($)
{
	//-----------------------------------------------
	//Busqueda General
	$('.id_busqueda').keyup(function(event){
		if ( event.which == 13 || event.which == 8){
			event.preventDefault();
		}
		
		if ($(this).val() == ''){
			$('#div_busqueda_agente').slideUp('slow');
		} else {
			$('#div_busqueda_agente').slideDown('slow');
		}
		$('#div_busqueda_agente').load('resultados.php',{par: $(this).attr('name'), valor: $(this).val()});
		$(this).next('.txtHint').empty();
		
	});
	//-----------------------------------------------
	//Otros visual
	$('.oculto').slideUp('fast');
	$('.noOculto').slideDown('fast');
});

function confirmarEliminar(linkBorrar){
	return confirm("Est\u00E1 a punto de dar de baja esta persona, \u00BFconfirma la operaci\u00F3n?");
}
