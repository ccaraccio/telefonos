jQuery(document).ready(function($)
{
	//-----------------------------------------------
	//Guardar datos y mostrarlo - Focus in Focus out
	$('.guardar_datos').each(function(){ $(this).data('valor', $(this).val()); });
	$('.guardar_datos').focusout(function(){ if ($(this).val() == '') { $(this).val($(this).data('valor')); } });
	$('.guardar_datos').focusin(function(){ if ($(this).val() == $(this).data('valor')) { $(this).val(''); } });
	//-----------------------------------------------
	//Busqueda General
	$('.id_busqueda').keyup(function(event){
		if ( event.which == 13 || event.which == 8){ event.preventDefault(); }
		if ($('.id_busqueda').val() == $('.guardar_datos').data('valor')) { xval = ''; } else { xval = $('.id_busqueda').val(); }
		$(this).next('div').load('resultados.php',{par: $(this).attr('name'), valor: $(this).val()});
		$(this).next('div').css('display','');
		$('.tablacontenidos').css('display','none');
	});
	//-----------------------------------------------
	//Trae la tabla sin filtros
	$('.id_busqueda').next('div').load('resultados.php',{par: $('.id_busqueda').attr('name'), valor: ''});
	//-----------------------------------------------
	//Ocultar tabla de resultados
	$('.id_busqueda').focusin(function(){
		$(this).val('');
	});
	//-----------------------------------------------
	//Orden de Gerencias
	$('.ordenPersona').keyup(function(event){
		if ( event.which == 13 || event.which == 8){ event.preventDefault(); }
		$(this).next('div').load('resultados2.php',{valor: $('div.responsive-tabs__panel--active select.gerencia').val(), 
			nombre: $('div.responsive-tabs__panel--active input.nombre').val(), 
			sector: $('div.responsive-tabs__panel--active input.sector').val(), orden: $(this).val()});
	});
});
function seleccionarPersona(unId,unaPersona,unaGerencia,unSector,unInterno,unDirecto,unFax,unCelular,unDomicilio,
		unaObservacion,unOrden){
	document.getElementById("cmodificacion").style.display = '';
	document.getElementById("cbaja").style.display = '';
	document.getElementById("busqueda_persona").style.display = 'none';
	document.getElementById("bbusqueda_persona").style.display = 'none';
	document.getElementById("idpersona").value = unId;
	document.getElementById("mnombre").value = unaPersona;
	document.getElementById("mgerencia").value = unaGerencia;
	document.getElementById("msector").value = unSector;
	document.getElementById("minterno").value = unInterno;
	document.getElementById("mdirecto").value = unDirecto;
	document.getElementById("mfax").value = unFax;
	document.getElementById("mcelular").value = unCelular;
	document.getElementById("mdomiciliolaboral").value = unDomicilio;
	document.getElementById("mobservaciones").value = unaObservacion;
	document.getElementById("morden").value = unOrden;
	document.getElementById("bnombre").value = unaPersona;
	document.getElementById("bgerencia").value = unaGerencia;
	document.getElementById("bsector").value = unSector;
	document.getElementById("binterno").value = unInterno;
	document.getElementById("bdirecto").value = unDirecto;
	document.getElementById("bfax").value = unFax;
	document.getElementById("bcelular").value = unCelular;
	document.getElementById("bdomiciliolaboral").value = unDomicilio;
	document.getElementById("bobservaciones").value = unaObservacion;
}