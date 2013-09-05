$('#help').mouseover(function(event){
	$('#badge-help').addClass('badge-info');
});

$('#help').mouseout(function(event){
	$('#badge-help').removeClass('badge-info');
});

$('#btnAdd').click(function() {
	$('#divAnalizar').css('visibility','visible');
});

$('#analizar').click(function() {
	$('#bienes').show('slow');
	$('#razonSocial').attr('disabled','disabled');
	$('#monto').attr('disabled','disabled');
	$('#btnAdd').css('display', 'none');
	$('#cotizacion-grid_c4').css('display', 'none');	
	$('.button-column').css('display', 'none');
	$('#analizar').css('display', 'none');
	$('#btnGuardarCotizacion').css('visibility','visible');
});