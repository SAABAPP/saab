function mostrarFecha(){
	var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	var diasSemana = new Array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
	var f=new Date();
	document.write(" "+diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
}

function mostrarHora(){
	var fecha=new Date();
	var hora1=fecha.getHours(),hora,minuto,segundo;
	var sufix;
	if (hora1>12) {sufix="p.m."} else{sufix="a.m."};
	hora=analizarHora(hora1);
	if (fecha.getMinutes()<10)
	{
	 minuto='0'+fecha.getMinutes();
	}
	else{
    minuto=fecha.getMinutes();
	}
	if (fecha.getSeconds()<10)
	{
	 segundo='0'+fecha.getSeconds();
	}
	else{
	  segundo=fecha.getSeconds();
	}
	var horaImprimir= "La hora es "+ hora + ":" + minuto + ":" + segundo+" "+sufix;
	document.getElementById("reloj").innerHTML = horaImprimir;
	window.setTimeout("mostrarHora()",1000);
}

function analizarHora(hora){
	if (hora<12) {
		if (hora<10) {
			return "0"+hora;
		} else{
			return hora;
		};
		
	} else{
		if (hora>12) {
			hora=hora-12;
			if (hora<10) {
				return "0"+hora;
			} else{
				return hora;
			};
		} else{
			return hora;
		};
	};
}