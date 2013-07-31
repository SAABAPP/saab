$("#help").mouseover(function(event){
   $("#badge-help").addClass("badge-info");
});

$("#help").mouseout(function(event){
   $("#badge-help").removeClass("badge-info");
});

$('#showsd').click(function() {
  $('#sd').show('slow');
});