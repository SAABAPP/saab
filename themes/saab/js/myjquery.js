$("#help").mouseover(function(event){
	$("#badge-help").addClass("badge-info");
});

$("#help").mouseout(function(event){
	$("#badge-help").removeClass("badge-info");
});

$('#showsd').click(function() {
	$('#bienes').show('slow');
	$('#razonSocial').attr('disabled','disabled');
	$('#monto').attr('disabled','disabled');
	$("#btnAdd").css("display", "none");
});