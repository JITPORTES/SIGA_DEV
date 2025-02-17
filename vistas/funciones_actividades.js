	if($("#idareasesion").val()=="1"){
		$("#div_gestores_Search").hide();
		$("#div_cmb_gestores").hide();
		$("#div_cmb_ejecutantes").hide();
	}
	
	const anio_actual=moment().year();
	cmb_hasta();
	
	//Validacion Tabla de Costos
	function filterFloat(evt,input){
		// Backspace = 8, Enter = 13, ‘0′ = 48, ‘9′ = 57, ‘.’ = 46, ‘-’ = 43
		var key = window.Event ? evt.which : evt.keyCode;    
		var chark = String.fromCharCode(key);
		var tempValue = input.value+chark;
		if(key >= 48 && key <= 57){
			if(filter(tempValue)=== false){
				return false;
			}else{       
				return true;
			}
		}else{
			  if(key == 8 || key == 13 || key == 0) {     
				  return true;              
			  }else if(key == 46){
					if(filter(tempValue)=== false){
						return false;
					}else{       
						return true;
					}
			  }else{
				  return false;
			  }
		}
	}
	
	function filter(__val__){
		var preg = /^([0-9]+\.?[0-9]{0,2})$/; 
		if(preg.test(__val__) === true){
			return true;
		}else{
		   return false;
		}
		
	}
	
	
	$("#Total_CE").prop( "disabled", true );
	$("#Total_CI").prop( "disabled", true );
	
	
	//$('#Horas').on('input', function () {
    //    this.value = this.value.replace(/[^0-9]/g, '');
    //});
	for(var j=1; j<5;j++){
		$("#Cantidad_M_"+j).on('keyup', function(){
			var value = $(this).val().length;
			var Cantidad=0;
			var Costo=0;
			var Total=0;
			
			for(var i=1; i<5;i++){
				if($("#Cantidad_M_"+i).val()!=""){Cantidad=$("#Cantidad_M_"+i).val();}
				if($("#Costo_M_"+i).val()!=""){Costo=$("#Costo_M_"+i).val();}
				Total=Total+(Cantidad*Costo);Cantidad=0;Costo=0;
			}
			
			if(Total>0){
				Total=Total.toFixed(2);
			}
			
			$("#Total_Costos").val(Total);
			$("#Costos_Materiales_CE").val(Total);
			
			//Total Costo Interno
		var Costos_Mat=$("#Costos_Materiales_CE").val().length;
		if(Costos_Mat>0){
			var Cos_Mater=parseFloat($("#Costos_Materiales_CE").val());
			$("#Total_CE").val(Cos_Mater);
			if($("#Mano_Obra_CE").val()!=""){
				var Mano_Obra=parseFloat($("#Mano_Obra_CE").val());
				var resultado=(Cos_Mater+Mano_Obra);
				if(resultado>0){
					resultado=resultado.toFixed(2);
				}
				$("#Total_CE").val(resultado);
			}
		}else{
			$("#Total_CE").val("");
			if($("#Mano_Obra_CE").val()!=""){
				var Mano_Obra=parseFloat($("#Mano_Obra_CE").val());
				var resultado=(Mano_Obra);
				if(resultado>0){
					resultado=resultado.toFixed(2);
				}
				$("#Total_CE").val(resultado);
			}
		}
		
		
		//Total Costo Externo
		var Costos_Mat_CI=$("#Costos_Materiales_CI").val().length;
		if(Costos_Mat_CI>0){
			var Cos_Mater_CI=parseFloat($("#Costos_Materiales_CI").val());
			if(Cos_Mater_CI>0){
				Cos_Mater_CI=Cos_Mater_CI.toFixed(2);
			}
			$("#Total_CI").val(Cos_Mater_CI);
			if($("#Mano_Obra_CI").val()!=""){
				var Mano_Obra_CI=parseFloat($("#Mano_Obra_CI").val());
				var resultado_CI=(Cos_Mater_CI+Mano_Obra_CI);
				if(resultado_CI>0){
					resultado_CI=resultado_CI.toFixed(2);
				}
				$("#Total_CI").val(resultado_CI);
			}
		}else{
			$("#Total_CI").val("");
			$("#Total_CI").val("");
			if($("#Mano_Obra_CI").val()!=""){
				var Mano_Obra=parseFloat($("#Mano_Obra_CI").val());
				var resultado=(Mano_Obra);
				if(resultado>0){
					resultado=resultado.toFixed(2);
				}
				$("#Total_CI").val(resultado);
			}
		}
		
		
		if($("#Total_CE").val()!=""){
			if($("#Total_CI").val()!=""){
				var Total_CE=parseFloat($("#Total_CE").val());
				var Total_CI=parseFloat($("#Total_CI").val());
				var Res_Total=Total_CE-Total_CI;
				if(Res_Total>0){
					Res_Total=Res_Total.toFixed(2);
				}
				$("#Ahorro").val(Res_Total);
			}
		}else{
			if($("#Total_CI").val()!=""){
				var Total_CI=parseFloat($("#Total_CI").val());
				var Res_Total=Total_CI;
				if(Res_Total>0){
					Res_Total=Res_Total.toFixed(2);
				}
				$("#Ahorro").val(Res_Total);
			}else{
				$("#Ahorro").val("");
			}
		}
		
		if($("#Total_CI").val()==""){
			$("#Ahorro").val("");
		}
		}).keyup();
	}
	
	for(var j=1; j<5;j++){
		$("#Costo_M_"+j).on('keyup', function(){
			var value = $(this).val().length;
			var Cantidad=0;
			var Costo=0;
			var Total=0;
			
			for(var i=1; i<5;i++){
				if($("#Cantidad_M_"+i).val()!=""){Cantidad=$("#Cantidad_M_"+i).val();}
				if($("#Costo_M_"+i).val()!=""){Costo=$("#Costo_M_"+i).val();}
				Total=Total+(Cantidad*Costo);Cantidad=0;Costo=0;
			}
			
			if(Total>0){
				Total=Total.toFixed(2);
			}
			
			$("#Total_Costos").val(Total);
			$("#Costos_Materiales_CE").val(Total);
			
			//Total Costo Interno
		var Costos_Mat=$("#Costos_Materiales_CE").val().length;
		if(Costos_Mat>0){
			var Cos_Mater=parseFloat($("#Costos_Materiales_CE").val());
			if(Cos_Mater>0){
				Cos_Mater=Cos_Mater.toFixed(2);
			}
			$("#Total_CE").val(Cos_Mater);
			if($("#Mano_Obra_CE").val()!=""){
				var Mano_Obra=parseFloat($("#Mano_Obra_CE").val());
				var resultado=(Cos_Mater+Mano_Obra);
				if(resultado>0){
					resultado=resultado.toFixed(2);
				}
				$("#Total_CE").val(resultado);
			}
		}else{
			$("#Total_CE").val("");
			if($("#Mano_Obra_CE").val()!=""){
				var Mano_Obra=parseFloat($("#Mano_Obra_CE").val());
				var resultado=(Mano_Obra);
				if(resultado>0){
					resultado=resultado.toFixed(2);
				}
				$("#Total_CE").val(resultado);
			}
		}
		
		
		//Total Costo Externo
		var Costos_Mat_CI=$("#Costos_Materiales_CI").val().length;
		if(Costos_Mat_CI>0){
			var Cos_Mater_CI=parseFloat($("#Costos_Materiales_CI").val());
			if(Cos_Mater_CI>0){
				Cos_Mater_CI=Cos_Mater_CI.toFixed(2);
			}
			$("#Total_CI").val(Cos_Mater_CI);
			if($("#Mano_Obra_CI").val()!=""){
				var Mano_Obra_CI=parseFloat($("#Mano_Obra_CI").val());
				var resultado_CI=(Cos_Mater_CI+Mano_Obra_CI);
				if(resultado_CI>0){
					resultado_CI=resultado_CI.toFixed(2);
				}
				$("#Total_CI").val(resultado_CI);
			}
		}else{
			$("#Total_CI").val("");
			$("#Total_CI").val("");
			if($("#Mano_Obra_CI").val()!=""){
				var Mano_Obra=parseFloat($("#Mano_Obra_CI").val());
				var resultado=(Mano_Obra);
				if(resultado>0){
					resultado=resultado.toFixed(2);
				}
				$("#Total_CI").val(resultado);
			}
		}
		
		
		if($("#Total_CE").val()!=""){
			if($("#Total_CI").val()!=""){
				var Total_CE=parseFloat($("#Total_CE").val());
				var Total_CI=parseFloat($("#Total_CI").val());
				var Res_Total=Total_CE-Total_CI;
				if(Res_Total>0){
					Res_Total=Res_Total.toFixed(2);
				}
				$("#Ahorro").val(Res_Total);
			}
		}else{
			if($("#Total_CI").val()!=""){
				var Total_CI=parseFloat($("#Total_CI").val());
				var Res_Total=Total_CI;
				if(Res_Total>0){
					Res_Total=Res_Total.toFixed(2);
				}
				$("#Ahorro").val(Res_Total);
			}else{
				$("#Ahorro").val("");
			}
		}
		
		if($("#Total_CI").val()==""){
			$("#Ahorro").val("");
		}
			
		}).keyup();
	}	
	
	$("#Horas").on('keyup', function(){
        var value = $(this).val().length;
		var costo_ext_x_hr=1500;
		var costo_int_x_hr=70;
		var minutos=60;
        if(value>0){
			
			var cadena=$(this).val();
			if(cadena.indexOf('.') != -1){//Esta instruccion me permite encotrar un acarecter en l cadena
				
				var Ae=$(this).val().split(".");
				if(Ae[1]){
					var Respuesta1=Ae[0]*costo_ext_x_hr+((costo_ext_x_hr/minutos)*Ae[1]);
					$("#Mano_Obra_CE").val(Respuesta1);		
					
					var Respuesta2=Ae[0]*costo_int_x_hr+((costo_int_x_hr/minutos)*Ae[1]);
					$("#Mano_Obra_CI").val(Respuesta2);
					
				}
			}else{
				var Respuesta1=$(this).val()*costo_ext_x_hr
				$("#Mano_Obra_CE").val(Respuesta1);
			
				var Respuesta2=$(this).val()*costo_int_x_hr
				$("#Mano_Obra_CI").val(Respuesta2);
			}
			
		}else{
			$("#Mano_Obra_CE").val("");
			$("#Mano_Obra_CI").val("");
		}
		
		
		//Total Costo Interno
		var Costos_Mat=$("#Costos_Materiales_CE").val().length;
		if(Costos_Mat>0){
			var Cos_Mater=parseFloat($("#Costos_Materiales_CE").val());
			if(Cos_Mater>0){
				Cos_Mater=Cos_Mater.toFixed(2);
			}
			$("#Total_CE").val(Cos_Mater);
			if($("#Mano_Obra_CE").val()!=""){
				var Mano_Obra=parseFloat($("#Mano_Obra_CE").val());
				var resultado=(Cos_Mater+Mano_Obra);
				if(resultado>0){
					resultado=resultado.toFixed(2);
				}
				$("#Total_CE").val(resultado);
			}
		}else{
			$("#Total_CE").val("");
			if($("#Mano_Obra_CE").val()!=""){
				var Mano_Obra=parseFloat($("#Mano_Obra_CE").val());
				var resultado=(Mano_Obra);
				if(resultado>0){
					resultado=resultado.toFixed(2);
				}
				$("#Total_CE").val(resultado);
			}
		}
		
		
		//Total Costo Externo
		var Costos_Mat_CI=$("#Costos_Materiales_CI").val().length;
		if(Costos_Mat_CI>0){
			var Cos_Mater_CI=parseFloat($("#Costos_Materiales_CI").val());
			if(Cos_Mater_CI>0){
				Cos_Mater_CI=Cos_Mater_CI.toFixed(2);
			}
			$("#Total_CI").val(Cos_Mater_CI);
			if($("#Mano_Obra_CI").val()!=""){
				var Mano_Obra_CI=parseFloat($("#Mano_Obra_CI").val());
				var resultado_CI=(Cos_Mater_CI+Mano_Obra_CI);
				if(resultado_CI>0){
					resultado_CI=resultado_CI.toFixed(2);
				}
				$("#Total_CI").val(resultado_CI);
			}
		}else{
			$("#Total_CI").val("");
			$("#Total_CI").val("");
			if($("#Mano_Obra_CI").val()!=""){
				var Mano_Obra=parseFloat($("#Mano_Obra_CI").val());
				var resultado=(Mano_Obra);
				if(resultado>0){
					resultado=resultado.toFixed(2);
				}
				$("#Total_CI").val(resultado);
			}
		}
		
		
		if($("#Total_CE").val()!=""){
			if($("#Total_CI").val()!=""){
				var Total_CE=parseFloat($("#Total_CE").val());
				var Total_CI=parseFloat($("#Total_CI").val());
				var Res_Total=Total_CE-Total_CI;
				if(Res_Total>0){
					Res_Total=Res_Total.toFixed(2);
				}
				$("#Ahorro").val(Res_Total);
			}
		}else{
			if($("#Total_CI").val()!=""){
				var Total_CI=parseFloat($("#Total_CI").val());
				var Res_Total=Total_CI;
				if(Res_Total>0){
					Res_Total=Res_Total.toFixed(2);
				}
				$("#Ahorro").val(Res_Total);
			}else{
				$("#Ahorro").val("");
			}
		}
		
		if($("#Total_CI").val()==""){
			$("#Ahorro").val("");
		}
		
    }).keyup();
	
	$("#Mano_Obra_CE").on('keyup', function(){
		var value = $(this).val().length;
        
		if(value>0){
			var Mano_Obra=parseFloat($("#Mano_Obra_CE").val());
			var resultado=(Mano_Obra);
			if(resultado>0){
				resultado=resultado.toFixed(2);
			}
			$("#Total_CE").val(resultado);
			
			if($("#Costos_Materiales_CE").val()!=""){
				var Cos_Mater=parseFloat($("#Costos_Materiales_CE").val());
				if(Cos_Mater>0){
					Cos_Mater=Cos_Mater.toFixed(2);
				}
				$("#Total_CE").val(Cos_Mater);
				if(resultado>0){
					resultado=resultado.toFixed(2);
				}
				var resultado=(Cos_Mater+Mano_Obra);
				$("#Total_CE").val(resultado);
			}
		}else{
			$("#Total_CE").val("");
			if($("#Costos_Materiales_CE").val()!=""){
				var Costos_Materiales_CE=parseFloat($("#Costos_Materiales_CE").val());
				var resultado=(Costos_Materiales_CE);
				if(resultado>0){
					resultado=resultado.toFixed(2);
				}
				$("#Total_CE").val(resultado);
			}
		}
		
		if($("#Total_CE").val()!=""){
			if($("#Total_CI").val()!=""){
				var Total_CE=parseFloat($("#Total_CE").val());
				var Total_CI=parseFloat($("#Total_CI").val());
				var Res_Total=Total_CE-Total_CI;
				if(Res_Total>0){
					Res_Total=Res_Total.toFixed(2);
				}
				$("#Ahorro").val(Res_Total);
			}
		}else{
			if($("#Total_CI").val()!=""){
				var Total_CI=parseFloat($("#Total_CI").val());
				var Res_Total=Total_CI;
				if(Res_Total>0){
					Res_Total=Res_Total.toFixed(2);
				}
				$("#Ahorro").val(Res_Total);
			}else{
				$("#Ahorro").val("");
			}
		}
		
		if($("#Total_CI").val()==""){
			$("#Ahorro").val("");
		}
    }).keyup();
	
	$("#Mano_Obra_CI").on('keyup', function(){
		var value = $(this).val().length;
        
		if(value>0){
			var Mano_Obra=parseFloat($("#Mano_Obra_CI").val());
			var resultado=(Mano_Obra);
			if(resultado>0){
				resultado=resultado.toFixed(2);
			}
			$("#Total_CI").val(resultado);
			
			if($("#Costos_Materiales_CI").val()!=""){
				var Cos_Mater=parseFloat($("#Costos_Materiales_CI").val());
				if(Cos_Mater>0){
					Cos_Mater=Cos_Mater.toFixed(2);
				}
				$("#Total_CI").val(Cos_Mater);
				var resultado=(Cos_Mater+Mano_Obra);
				if(resultado>0){
					resultado=resultado.toFixed(2);
				}
				$("#Total_CI").val(resultado);
			}
		}else{
			$("#Total_CI").val("");
			if($("#Costos_Materiales_CI").val()!=""){
				var Costos_Materiales_CI=parseFloat($("#Costos_Materiales_CI").val());
				var resultado=(Costos_Materiales_CI);
				if(resultado>0){
					resultado=resultado.toFixed(2);
				}
				$("#Total_CI").val(resultado);
			}
		}
		
		if($("#Total_CE").val()!=""){
			if($("#Total_CI").val()!=""){
				var Total_CE=parseFloat($("#Total_CE").val());
				var Total_CI=parseFloat($("#Total_CI").val());
				var Res_Total=Total_CE-Total_CI;
				if(Res_Total>0){
					Res_Total=Res_Total.toFixed(2);
				}
				$("#Ahorro").val(Res_Total);
			}
		}else{
			if($("#Total_CI").val()!=""){
				var Total_CI=parseFloat($("#Total_CI").val());
				var Res_Total=Total_CI;
				if(Res_Total>0){
					Res_Total=Res_Total.toFixed(2);
				}
				$("#Ahorro").val(Res_Total);
			}else{
				$("#Ahorro").val("");
			}
		}
		
		if($("#Total_CI").val()==""){
			$("#Ahorro").val("");
		}
		
		
    }).keyup();
	
	$("#Costos_Materiales_CE").on('keyup', function(){
		var value = $(this).val().length;
        
		if(value>0){
			var Cos_Mater=parseFloat($("#Costos_Materiales_CE").val());
			if(Cos_Mater>0){
				Cos_Mater=Cos_Mater.toFixed(2);
			}
			$("#Total_CE").val(Cos_Mater);
			if($("#Mano_Obra_CE").val()!=""){
				var Mano_Obra=parseFloat($("#Mano_Obra_CE").val());
				var resultado=(Cos_Mater+Mano_Obra);
				if(resultado>0){
					resultado=resultado.toFixed(2);
				}
				$("#Total_CE").val(resultado);
			}
		}else{
			$("#Total_CE").val("");
			if($("#Mano_Obra_CE").val()!=""){
				var Mano_Obra=parseFloat($("#Mano_Obra_CE").val());
				var resultado=(Mano_Obra);
				if(resultado>0){
					resultado=resultado.toFixed(2);
				}
				$("#Total_CE").val(resultado);
			}
		}
		
		if($("#Total_CE").val()!=""){
			if($("#Total_CI").val()!=""){
				var Total_CE=parseFloat($("#Total_CE").val());
				var Total_CI=parseFloat($("#Total_CI").val());
				var Res_Total=Total_CE-Total_CI;
				if(Res_Total>0){
					Res_Total=Res_Total.toFixed(2);
				}
				$("#Ahorro").val(Res_Total);
			}
		}else{
			if($("#Total_CI").val()!=""){
				var Total_CI=parseFloat($("#Total_CI").val());
				var Res_Total=Total_CI;
				if(Res_Total>0){
					Res_Total=Res_Total.toFixed(2);
				}
				$("#Ahorro").val(Res_Total);
			}else{
				$("#Ahorro").val("");
			}
		}
		
		if($("#Total_CI").val()==""){
			$("#Ahorro").val("");
		}
		
    }).keyup();
	
	$("#Costos_Materiales_CI").on('keyup', function(){
		var value = $(this).val().length;
        
		if(value>0){
			var Cos_Mater=parseFloat($("#Costos_Materiales_CI").val());
			$("#Total_CI").val(Cos_Mater);
			if($("#Mano_Obra_CI").val()!=""){
				var Mano_Obra=parseFloat($("#Mano_Obra_CI").val());
				var resultado=(Cos_Mater+Mano_Obra);
				if(resultado>0){
					resultado=resultado.toFixed(2);
				}
				$("#Total_CI").val(resultado);
			}
		}else{
			$("#Total_CI").val("");
			if($("#Mano_Obra_CI").val()!=""){
				var Mano_Obra=parseFloat($("#Mano_Obra_CI").val());
				var resultado=(Mano_Obra);
				if(resultado>0){
					resultado=resultado.toFixed(2);
				}
				$("#Total_CI").val(resultado);
			}
		}
		
		if($("#Total_CE").val()!=""){
			if($("#Total_CI").val()!=""){
				var Total_CE=parseFloat($("#Total_CE").val());
				var Total_CI=parseFloat($("#Total_CI").val());
				var Res_Total=Total_CE-Total_CI;
				if(Res_Total>0){
					Res_Total=Res_Total.toFixed(2);
				}
				$("#Ahorro").val(Res_Total);
			}
		}else{
			if($("#Total_CI").val()!=""){
				var Total_CI=parseFloat($("#Total_CI").val());
				var Res_Total=Total_CI;
				if(Res_Total>0){
					Res_Total=Res_Total.toFixed(2);
				}
				$("#Ahorro").val(Res_Total);
			}else{
				$("#Ahorro").val("");
			}
		}

		if($("#Total_CI").val()==""){
			$("#Ahorro").val("");
		}

    }).keyup();
	//Fin Validacion Tabla de Costos


	function NumCheck(e, field) {
	  key = e.keyCode ? e.keyCode : e.which
	  // backspace
	  if (key == 8) return true
	  // 0-9
	  if (key > 47 && key < 58) {
		if (field.value == "") return true
		regexp = /.[^0-9]{2}$/
		return !(regexp.test(field.value))
	  }
	  // .
	  if (key == 46) {
		if (field.value == "") return false
		regexp = /^[0-9]+$/
		return regexp.test(field.value)
	  }
	  // other key
	  return false

	}

	$(function () {
		$('#example1, #example2, #example3').DataTable({
		"paging": true,
		"lengthChange": false,
		"searching": false,
		"ordering": true,
		"info": true,
		"autoWidth": false
		});
	});


	confirmacion_cerrar=function(id_modal){
		$.confirm({
			title: 'Confirm!',
			content: '¿Deseas salir sin guardar la información?',
			buttons: {
				confirm: function () {
					$('.modal-backdrop').remove();//eliminamos el backdrop del modal
					$('#'+id_modal+'').modal('hide');
				},
				cancel: function () {
				}
			}
		});
	}



	// Genera el calendario al presionar la pestaña
	$('#calendario-shit').fullCalendar('destroy');
	var existeCalendario = false;
	
	function generarCalendario() {
		
		if(!existeCalendario) {
			// Muestra la ventana de espera
			jsShowWindowLoad("Por favor espere, buscando información");

			setTimeout(function() {
				// Genera el calendario con el componente FullCalendar
				existeCalendario = true;
				$('#calendario-shit').html("");
				$('#calendario-shit').fullCalendar({
					// put your options and callbacks here
					header: {
						left: 'prev,next today',
						center: 'title',
						right: 'year,month,basicWeek,basicDay'
					},
					buttonText: {
						today: 'Actual',
						year: 'Año',
						month: 'Mes',
						basicWeek: 'Semana',
						basicDay: 'Dia'
					},
					showNonCurrentDates: false,
					monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
					monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
					dayNames: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
					dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
					locale: 'es',
					timezone: 'local',
					height: 650,//"auto"
					eventLimit: true, // allow "more" link when too many events
					//selectable: true,
					dragabble: true,
					defaultView: 'year',
					eventRender: function(eventObj, $el) {
						$el.popover({
							content: eventObj.description,
							start: eventObj.start,							
							trigger: 'hover',
							placement: 'top',
							container: 'body'
						});
					},
					yearColumns: 3,
					defaultDate: anio_actual+'-01-01',
					durationEditable: true,
					bootstrap: false,
					editable: false,
					navLinks: true,
					eventClick: function(calEvent, jsEvent, view) {
						pasar_valores_mantenimiento(calEvent.id, calEvent.color);									
					},
					week:"Semana",
					day:"dia"
				});
				// Carga la información en el calendario recien creado
				llenar_calendario(2);
				// Elimina la ventana de espera
				jsRemoveWindowLoad();
			}, 100);
		}
	}
	
	

	pasar_valores_mantenimiento = function(id_fecha, color) {
		$("#btn_guardar").show();
		if(Estatus_Tipo_Actividad == 2) {


			$.confirm({
				title: 'Modificar fecha de actividad!',
				type: 'red',
				icon: 'fa fa-warning',
				// content: 'Modificar Actividades o Llenar! (757)',
				content: 'Modificar Fecha',
				buttons: {
					// Modificar: function () {
					// 	var val = id_fecha.split("-");
					// 	var Id_Actividad = val[0];

					// 	// #448aff: Azul
					// 	// #35a61e: Verde
					// 	// #ecc93b: Amarillo
					// 	// #d90505: Rojo

					// 	if(color != "#ecc93b") {
					// 		if(color != "#35a61e" && color != "#448aff") {
					// 			$("#Fecha_Calendario").val(val[1]);
					// 			pasarvalores(Id_Actividad, 1, null);
					// 		}
					// 		else {
					// 			mensajesalerta("Informaci&oacute;n", "No se puede modificar debido a que el mantenimiento se encuentra realizado", "info", "dark");
					// 		}
					// 	}
					// 	else {
					// 		mensajesalerta("Informaci&oacute;n", "No se puede modificar debido a que existe la mesa de ayuda, para realizar esta acción es necesario cancelar el ticket asociado.", "info", "dark");
					// 	}
					// },
					Modificar: function () {
						$('#texto_fecha_reprogramada').val('');
						$("#btn_actividad_guardar").attr('disabled', false);
						$("#btn_actividad_cancelar").attr('disabled', false);
						if(color == "#35a61e" || color == "#448aff"){
							mensajesalerta("Informaci&oacute;n", "Este mantenimiento no se puede actualizar debido a que ya se realizó.", "info", "dark");
							$("#btn_guardar").hide();
						}
						muestro_actividades_por_fecha(id_fecha);
					},
					Cerrar: function () {
        },
				}
			});
		}
		else {
			muestro_actividades_por_fecha(id_fecha);
		}
	}
	
	
	//Variables
	var cont_array_actividades=0;
	var array_actividades=[];
	array_actividades[0]="S";
	var switch_fech_prog=0;
	/////
	
	//Autocomplete activos
	function autocomplete_activos(){
		//Area
		var Id_Area=$("#idareasesion").val();
		var strdatos="";
		
		if(Id_Area!="5"){
			strdatos={
				soloactivos:'1',
				Id_Area:Id_Area,
				Estatus_Reg:"1",
				accion: 'autocomplete_activos'
			}
		}else{
			strdatos={
				soloactivos:'1',
				Estatus_Reg:"1",
				accion: 'autocomplete_activos'
			}
		}
			
		$.ajax({
			type: "POST",
			url: "../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",
			data: strdatos,
			async: false,
			dataType: "html",
			beforeSend: function (objeto) {
				$("#gifcargando1").show();
			},
			success: function (datos) {
				var json = "";
					json = eval("(" + datos + ")"); //Parsear JSON
					var activos='';
					if (json.totalCount > 0) {						
						activos+='<option></option>';
						activos+='<optgroup label="Activos">';
						
						for (var i = 0; i < json.totalCount; i++) {
							activos+='<option value="'+json.data[i].Id_Activo+'">'+json.data[i].AF_BC+' '+json.data[i].Nombre_Activo+' ('+json.data[i].Num_Empleado+'-'+json.data[i].Nombre_Completo+')</option>';
							//activos+='<option value="'+json.data[i].Id_Activo+'">'+json.data[i].AF_BC+' '+json.data[i].Nombre_Activo+' ('+json.data[i].Marca+'/'+json.data[i].Modelo+'/'+json.data[i].NumSerie+')</option>';
							
						}
						activos+='</optgroup>';
						$('#select-activos').html(activos);

						$("#gifcargando1").hide();
						$("#select-activos").show();
							
						$('#select-activos').selectize({
							//sortField: 'text'
						});
					}
					else {
						$("#gifcargando1").hide();
						activos+='<option>--Sin Resultados--</option>';
						activos+='<optgroup label="Activos">';
						activos+='</optgroup>';
						$('#select-activos').html(activos);
						$("#select-activos").show();
					}

			},
			error: function (objeto, quepaso, otroobj) {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
				$('#select-activos').append($('<option>', { value: "-1" }).text("Sin resultados"));
			}
		});
	}
	
	
	function cmb_hasta() {
		var anio_actual=moment().format("YYYY");
		var anio_siguiente=moment().add('year',1).format('YYYY');
		$('#cmb_hasta').append($('<option>', { value: anio_actual+"1231" }).text(anio_actual));
		$('#cmb_hasta').append($('<option>', { value: anio_siguiente+"1231" }).text(anio_siguiente));
	}
	
	function cmb_rutina(Tipo_Actividad) {
		var resultado=new Array();
		//Area
		var Id_Area=$("#idareasesion").val();
		data={
			Id_Area:Id_Area,
			Tipo_Actividad:Tipo_Actividad,
			Estatus_Reg: "1",
			accion: "consultar"
			};
		resultado=cargo_cmb("../fachadas/activos/siga_actividades/Siga_actividadesFacade.Class.php",false, data);

		if(resultado.totalCount>0){
			var option='<option value="-1">--Rutinas--</option>';
			//$('#cmb_copiar').append($('<option>', { value: "-1" }).text("--Rutinas--"));
			
			//Removemos los duplicados         //Arreglo       //Campo Duplicado	
			var uniqueArray = removeDuplicates(resultado.data, "Nombre_Rutina");
			if(uniqueArray.length>0){
				for(var i = 0; i < uniqueArray.length; i++){
					option+='<option value="'+uniqueArray[i].Id_Actividad+'">'+uniqueArray[i].Nombre_Rutina+'</option>';
				}
			}
			
			$('#cmb_copiar').html(option);
		}else{
			$('#cmb_copiar').html('<option value="-1">--Sin Resultados--</option>');
			//$('#cmb_copiar').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	function cmb_gestores() {
		var Id_Area=$("#idareasesion").val();
		var Id_Seccion="";
		//Biomédica
		if(Id_Area=="1"){Id_Seccion="1";}
		if(Id_Area=="2"){Id_Seccion="4";}
		if(Id_Area=="3"){Id_Seccion="6";}
		
		data={
			Id_Seccion:Id_Seccion,
			Id_Area:Id_Area,
			Estatus_Reg: "1",
			accion: "cmb_gestores"
		};
		resultado=cargo_cmb("../fachadas/activos/siga_actividades/Siga_actividadesFacade.Class.php",false, data);
		
		if(resultado.totalCount>0){
			$('#cmb_gestores').append($('<option>', { value: "" }).text("--Gestores--"));
			$('#cmb_gestores_Search').append($('<option>', { value: "" }).text("--Gestores--"));
			for(var i = 0; i < resultado.totalCount; i++){
				$('#cmb_gestores').append($('<option>', { value: resultado.data[i].Id_Usuario }).text(resultado.data[i].Nombre_Empleado));
				$('#cmb_gestores_Search').append($('<option>', { value: resultado.data[i].Id_Usuario }).text(resultado.data[i].Nombre_Empleado));
			}
		}else{
			$('#cmb_gestores').append($('<option>', { value: "" }).text("--Gestores--"));
			$('#cmb_gestores_Search').append($('<option>', { value: "" }).text("--Gestores--"));
		}
	}
	
	function cmb_ejecutantes() {
		var Id_Area=$("#idareasesion").val();
		data={
			Id_Area:Id_Area,
			accion: "cmb_ejecutantes"
		};
		resultado=cargo_cmb("../fachadas/activos/siga_actividades/Siga_actividadesFacade.Class.php",false, data);
		
		if(resultado.totalCount>0){
			$('#cmb_ejecutantes').append($('<option>', { value: "" }).text("--Ejecutantes--"));
			for(var i = 0; i < resultado.totalCount; i++){
				$('#cmb_ejecutantes').append($('<option>', { value: resultado.data[i].Nombre_Completo }).text(resultado.data[i].Nombre_Completo));
			}
		}else{
			$('#cmb_ejecutantes').append($('<option>', { value: "" }).text("--Ejecutantes--"));
		}
	}
	
	function removeDuplicates(originalArray, prop) {
		 var newArray = [];
		 var lookupObject  = {};

		 for(var i in originalArray) {
			lookupObject[originalArray[i][prop]] = originalArray[i];
		 }

		 for(i in lookupObject) {
			 newArray.push(lookupObject[i]);
		 }
		  return newArray;
	 }
	
	function cmb_frecuencia() {
		data={
			Estatus_Reg: "1",
			accion: "consultar"
			};
		resultado=cargo_cmb("../fachadas/activos/siga_cat_frecuencia/Siga_cat_frecuenciaFacade.Class.php",false, data);

		if(resultado.totalCount>0){
			$('#cmb_frecuencia').append($('<option>', { value: "-1" }).text("--Frecuencia--"));
			for(var i = 0; i < resultado.totalCount; i++){
				$('#cmb_frecuencia').append($('<option>', { value: resultado.data[i].Id_Frecuencia }).text(resultado.data[i].Desc_Frecuencia));
			}
		}else{
			$('#cmb_frecuencia').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	function Archivos_Multiples_Adjuntar(){
		var Adjuntos="";
		Adjuntos='<label for="attach-1" class="control-label"  style="font-size: 11px;">Adjuntar Archivos</label>';			  
		Adjuntos+='<input id="documentos_adjuntos_FILE" name="imagenes[]" type="file" multiple="multiple" class="file-loading">';
		Adjuntos+='<input type="hidden" id="url_documentos_adjuntos">';
		
		$("#Cadena_doc_adjuntos").html(Adjuntos);
		$("#div_archivos_multiples_lista").html("");
		carga_arch_multiples("documentos_adjuntos_FILE", "Cadena_doc_adjuntos","div_archivos_multiples_lista","url_documentos_adjuntos",url_direccion,true,false,"", "Adjuntar Archivos");
	}
	
	$("#select-activos").change(function() {
		$("#Imagen_Activo").html('<img src="../dist/img/no-camera.png" style="width:150px; height:150px;">');
		$("#txt_Id_Activo").val("");
		$("#txt_Nom_Activo").val("");
		$("#txt_ubic_primaria").val("");
		$("#txt_ubic_secundaria").val("");
		$("#txt_marca").val("");
		$("#text_Modelo").val("");
		$("#text_Desc_Corta").val("");
		$("#text_Ubicacion_Especifica").val("");
		$("#text_No_Serie").val("");
		$("#text_AFBC").val("");
		$("#text_Usr_Resp").val("");
		$("#text_Id_Usuario").val("");
		
		if(this.value!=""){
			$.ajax({
				type: "POST",
				url: "../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",
				data: {
					Id_Activo:this.value,
					accion: 'activos'
				},
				async: false,
				dataType: "html",
				beforeSend: function (objeto) {
				},
				success: function (datos) {
					var json = "";
						json = eval("(" + datos + ")"); //Parsear JSON

						if (json.totalCount > 0) {
							$("#btn_ver_inventario").show();
							$("#txt_Id_Activo").val(json.data[0].Id_Activo);
							$("#txt_Nom_Activo").val(json.data[0].Nombre_Activo);
							$("#txt_ubic_primaria").val(json.data[0].Desc_Ubic_Prim);
							$("#txt_ubic_secundaria").val(json.data[0].Desc_Ubic_Sec);
							$("#txt_marca").val(json.data[0].Marca);
							$("#text_Modelo").val(json.data[0].Modelo);
							$("#text_Desc_Corta").val(json.data[0].DescCorta);
							$("#text_Ubicacion_Especifica").val(json.data[0].Especifica);
							$("#text_No_Serie").val(json.data[0].NumSerie);
							$("#text_AFBC").val(json.data[0].AF_BC);
							$("#text_Usr_Resp").val(json.data[0].Nombre_Completo);
							Buscar_Id_Usuario(json.data[0].Num_Empleado);
							
							if(json.data[0].Foto!=null && json.data[0].Foto.length>0){
								$("#Imagen_Activo").html('<img src="../Archivos/Archivos-Activos/'+json.data[0].Foto+'" style="width:150px;height:150px;">');
							}else{
								$("#Imagen_Activo").html('<img src="../dist/img/no-camera.png" style="width:150px; height:150px;">');
							}
							
							
							
						}else {
							$("#btn_ver_inventario").hide();
							mensajesalerta("", "No se encontraron resultados", "error", "dark");
						}

				},
				error: function (objeto, quepaso, otroobj) {
					mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
				}
			});
		}else{
			$("#btn_ver_inventario").hide();
		}
	});
	
	function Buscar_Id_Usuario(Num_Empleado){
		if(Num_Empleado!=""){
			$.ajax({
				type: "POST",
				url: "../fachadas/activos/siga_usuarios/Siga_usuariosFacade.Class.php",
				data: {
					No_Usuario:Num_Empleado,
					Estatus_Reg:"1",
					accion: 'consultar'
				},
				async: false,
				dataType: "html",
				beforeSend: function (objeto) {
				},
				success: function (datos) {
					var json = "";
						json = eval("(" + datos + ")"); //Parsear JSON
	
						if (json.totalCount > 0) {
							$("#text_Id_Usuario").val(json.data[0].Id_Usuario);
						}else {
							mensajesalerta("", "El Responsable de este activo no esta registrado en el sistema", "error", "dark");
						}
	
				},
				error: function (objeto, quepaso, otroobj) {
					mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
				}
			});
		}
	}
	
	
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	
	/*Funciones para Busqueda*/
	function autocomplete_activos_search(){
	
		//Area
		var Id_Area=$("#idareasesion").val();
		var strdatos="";
		
		if(Id_Area!="5"){
			strdatos={
				soloactivos:'1',
				Id_Area:Id_Area,
				Estatus_Reg:"1",
				accion: 'autocomplete_activos'
			}
		}else{
			strdatos={
				soloactivos:'1',
				Estatus_Reg:"1",
				accion: 'autocomplete_activos'
			}
		}
			
		$.ajax({
			type: "POST",
			url: "../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",
			data: strdatos,
			async: true,
			dataType: "html",
			beforeSend: function (objeto) {
				$("#gifcargando-search").show();
			},
			success: function (datos) {
				var json = "";
					json = eval("(" + datos + ")"); //Parsear JSON
					var activos='';
					if (json.totalCount > 0) {
						activos+='<option></option>';
						activos+='<optgroup label="Activos">';
						
						for (var i = 0; i < json.totalCount; i++) {
							activos+='<option value="'+json.data[i].Id_Activo+'">'+json.data[i].AF_BC+' '+json.data[i].Nombre_Activo+'</option>';
						}
						activos+='</optgroup>';
						$('#select-activos-search').html(activos);
						$('#select-activos-search-mensual').html(activos);

						$("#gifcargando-search").hide();
						$("#gifcargando-search-mensual").hide();
						$("#select-activos-search").show();
						$("#select-activos-search-mensual").show();
							
						$('#select-activos-search').selectize({
							//sortField: 'text'
						});
						$('#select-activos-search-mensual').selectize({
							//sortField: 'text'
						});
					}
					else {
						$("#gifcargando-search").hide();
						$("#gifcargando-search-mensual").hide();
						activos+='<option>--Sin Resultados--</option>';
						activos+='<optgroup label="Activos">';
						activos+='</optgroup>';
						$('#select-activos-search').html(activos);
						$("#select-activos-search").show();

						$('#select-activos-search-mensual').html(activos);
						$("#select-activos-search-mensual").show();
					}

			},
			error: function (objeto, quepaso, otroobj) {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
				$('#select-activos-search').append($('<option>', { value: "-1" }).text("Sin resultados"));
				$('#select-activos-search-mensual').append($('<option>', { value: "-1" }).text("Sin resultados"));
			}
		});
	}
	
	function Carga_anios(json) {
		//var resultado=new Array();
		//data={Estatus_Reg: "1", accion: "consultar"};
		//resultado=cargo_cmb("../fachadas/activos/siga_cat_ubic_prim/Siga_cat_ubic_primFacade.Class.php",false, data);
		$('#Cmb_Anios_Search').empty();
		if(json.totalCountAnio>0){
			$('#Cmb_Anios_Search').append($('<option>', { value: "-1" }).text("--Año--"));
			for(var i = 0; i < json.totalCountAnio; i++){
				$('#Cmb_Anios_Search').append($('<option>', { value: json.data_anios[i].Anio }).text(json.data_anios[i].Anio));
			}
		}else{
			$('#Cmb_Anios_Search').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	/*Fin*/
	
	//Funcion agregar mas
	Agregar_Mas=function(Indice=null){

		var Fecha_Inicial="";
		cont_array_actividades=cont_array_actividades+1;
		array_actividades[cont_array_actividades]="S";
		var contenido="";
		
		if(Indice!=null){
				Fecha_Inicial=$("#fecha_programada"+(Indice-1)).val();
			}else{
				Fecha_Inicial=$("#fecha_programada"+(cont_array_actividades-1)).val();
			}
		
		if(Fecha_Inicial==undefined){
				Fecha_Inicial=moment().format('DD/MM/YYYY');
			}

		contenido+='<tr id="Contenido_tr'+cont_array_actividades+'">';
		contenido+='  <td><span><i class="fa fa-plus" aria-hidden="true" onclick="Agregar_Mas('+cont_array_actividades+')" id="mas_table_dinamyc'+cont_array_actividades+'"></i></span></td>';
        contenido+='  <td>';
        contenido+='    <div class="form-group" style="width:50px;" align="center">';
        contenido+='      <input type="text" class="form-control" placeholder="" id="Num_Actividad'+cont_array_actividades+'" value='+(cont_array_actividades+1)+' style="font-size: 11px;" disabled>';
		contenido+='    </div>';
        contenido+='  </td>';
        contenido+='  <td>';
        contenido+='    <div class="form-group">';
        contenido+='      <textarea rows="2" class="form-control" placeholder="" id="Nombre_Actividad'+cont_array_actividades+'" style="font-size: 11px;"></textarea>';
        contenido+='    </div>';
        contenido+='  </td>';
        contenido+='  <td>';
        contenido+='    <div class="form-group">';
        contenido+='      <textarea rows="2" class="form-control" placeholder="" id="Valor_Referencia'+cont_array_actividades+'" style="font-size: 11px;"></textarea>';
        contenido+='    </div>';
        contenido+='  </td>';
        contenido+='  <td>';
        contenido+='    <div class="form-group">';
        contenido+='      <textarea rows="2" class="form-control" placeholder="" id="Valor_Medido'+cont_array_actividades+'" style="font-size: 11px;" disabled></textarea>';
        contenido+='    </div>';
        contenido+='  </td>';
        contenido+='  <td align="center">';
        contenido+='  	<input type="radio" id="radio_ok'+cont_array_actividades+'" name="groupradioactividad'+cont_array_actividades+'" disabled>';
        contenido+='  </td>';
        contenido+='  <td align="center">';
        contenido+='  	<input type="radio" id="radio_fallo'+cont_array_actividades+'" name="groupradioactividad'+cont_array_actividades+'" disabled>';
        contenido+='  </td>';
        contenido+='  <td align="center">';
        contenido+='  	<input type="radio" id="radio_no_aplica'+cont_array_actividades+'" name="groupradioactividad'+cont_array_actividades+'" disabled>';
        contenido+='  </td>';
		// contenido+='  <td align="center">';
		// contenido+='  	<input type="checkbox" id="check_vincular_mesa_ayuda'+cont_array_actividades+'">';
		// contenido+='  </td>';
        contenido+='  <td>';
        contenido+='    <div class="form-group">';
        contenido+='      <textarea rows="2" class="form-control" placeholder="(200 caracteres)" id="observaciones'+cont_array_actividades+'" style="font-size: 11px;" disabled></textarea>';
        contenido+='    </div>';
        contenido+='  </td>';
        contenido+='  <td>';
        contenido+='   <div class="form-group" align="center">';
        contenido+='      <div id="div_input_dymanic'+cont_array_actividades+'"><input id="upload_adjuntos'+cont_array_actividades+'" name="imagenes[]" type="file" multiple="multiple" class="file-loading" ></div>';
		contenido+='      <input type="hidden"  id="url_det_adjuntos'+cont_array_actividades+'">';
		contenido+='      <div id="divVer_Imagen'+cont_array_actividades+'"></div>';
        contenido+='    </div>';
        contenido+='  </td>';
		contenido+='<td>';
		contenido+='  <div class="input-group date">';
		contenido+='	<div class="input-group-addon">';
		contenido+='	  <i class="fa fa-calendar"></i>';
		contenido+='	</div>';
		contenido+='	<input type="text" class="form-control pull-right datepicker" onclick="Cambio_Fecha_Progr_Array('+cont_array_actividades+')" id="fecha_programada'+cont_array_actividades+'" value="'+Fecha_Inicial+'" style="font-size: 11px;" autocomplete="off">';
		contenido+='  </div>';
		contenido+='</td>';
		contenido+='<td>';
		contenido+='  <div class="input-group date">';
		contenido+='	<div class="input-group-addon">';
		contenido+='	  <i class="fa fa-calendar"></i>';
		contenido+='	</div>';
		contenido+='	<input type="text" class="form-control pull-right datepicker" onclick="Cambio_Fecha_Reali_Array('+cont_array_actividades+')" id="fecha_realizada'+cont_array_actividades+'" style="font-size: 11px;" disabled>';
		contenido+='  </div>';
		contenido+='</td>';
        contenido+='  <td><span><i class="fa fa-trash" aria-hidden="true" id="quitarmas_table_dinamyc'+cont_array_actividades+'" onclick="quitarmas('+cont_array_actividades+')"></i></span></td>';
        contenido+='</tr>';

		if(Indice!=null){
			//Agregar Campo Hacia arriba
			jQuery("#Contenido_tr"+Indice).before(contenido);

			//alert(Indice+1);
			//alert(cont_array_actividades);
			var contador=array_actividades.length;
			
			for(var i=0;i < array_actividades.length; i++){
				contador=contador-1;
				if(Indice < contador){
					//Cambiamos los ids de los campos

					var valor="Num_Actividad"+(contador);
					$("#Contenido_tr"+(contador-1)).attr({id:"Contenido_tr"+contador});
					$("#mas_table_dinamyc"+(contador-1)).attr({id:"mas_table_dinamyc"+contador, onclick: "Agregar_Mas("+contador+")"});
					$("#quitarmas_table_dinamyc"+(contador-1)).attr({id:"quitarmas_table_dinamyc"+contador, onclick: "quitarmas("+contador+")"});
					$("#Num_Actividad"+(contador-1)).val((contador+1));
					$("#Num_Actividad"+(contador-1)).attr("id",valor);
					$("#Nombre_Actividad"+(contador-1)).attr("id","Nombre_Actividad"+contador);
					$("#Valor_Referencia"+(contador-1)).attr("id","Valor_Referencia"+contador);
					$("#Valor_Medido"+(contador-1)).attr("id","Valor_Medido"+contador);
					$("#radio_ok"+(contador-1)).attr("id","radio_ok"+contador);  $("#groupradioactividad"+(contador-1)).attr("name","groupradioactividad"+contador);
					$("#radio_fallo"+(contador-1)).attr("id","radio_fallo"+contador);
					$("#radio_no_aplica"+(contador-1)).attr("id","radio_no_aplica"+contador);
					//$("#check_vincular_mesa_ayuda"+(contador-1)).attr("id","check_vincular_mesa_ayuda"+contador);
					$("#observaciones"+(contador-1)).attr("id","observaciones"+contador);
					
					//$("#div_input_dymanic"+(contador-1)).html("");
					$("#div_input_dymanic"+(contador)).html('<input id="upload_adjuntos'+contador+'" name="imagenes[]" type="file" multiple="multiple" class="file-loading" >');
					$("#div_input_dymanic"+(contador-1)).attr("id","div_input_dymanic"+contador);
					
					
					$("#url_det_adjuntos"+(contador-1)).attr("id","url_det_adjuntos"+contador);
					$("#divVer_Imagen"+(contador-1)).attr("id","divVer_Imagen"+contador);
					//$("#fecha_programada"+(contador-1)).attr("id","fecha_programada"+contador);
					$("#fecha_programada"+(contador-1)).attr({id:"fecha_programada"+(contador), onclick:"Cambio_Fecha_Progr_Array("+contador+")"});
					//$("#fecha_realizada"+(contador-1)).attr("id","fecha_realizada"+contador);
					$("#fecha_realizada"+(contador-1)).attr({id:"fecha_realizada"+(contador), onclick:"Cambio_Fecha_Reali_Array("+contador+")"});
					
					
					//console.log("$(#Num_Actividad"+(contador-1)+").attr(id,"+valor+")----Indice="+Indice+"----contador:"+contador);
					
					var file_adjuntos="upload_adjuntos"+(contador);
					var hidden_url="url_det_adjuntos"+(contador);
					subirimagenes(file_adjuntos, hidden_url, false, contador);
				}
				
				if(cont_array_actividades==i){
					$("#Contenido_tr"+(i)).attr("id","Contenido_tr"+(Indice));
					$("#mas_table_dinamyc"+(i)).attr({id:"mas_table_dinamyc"+(Indice), onclick:"Agregar_Mas("+Indice+")"});
					$("#Num_Actividad"+(i)).val(Indice+1);
					$("#Num_Actividad"+(i)).attr("id","Num_Actividad"+(Indice));
					$("#Nombre_Actividad"+(i)).attr("id","Nombre_Actividad"+(Indice));
					$("#Valor_Referencia"+(i)).attr("id","Valor_Referencia"+(Indice));
					$("#Valor_Medido"+(i)).attr("id","Valor_Medido"+(Indice));
					$("#radio_ok"+(i)).attr("id","radio_ok"+(Indice)); $("#groupradioactividad"+(i)).attr("name","groupradioactividad"+(Indice));
					$("#radio_fallo"+(i)).attr("id","radio_fallo"+(Indice));
					$("#radio_no_aplica"+(i)).attr("id","radio_no_aplica"+(Indice));
					$("#check_vincular_mesa_ayuda"+(i)).attr("id","check_vincular_mesa_ayuda"+(Indice));
					
					//$("#div_input_dymanic"+(i)).html("");
					$("#div_input_dymanic"+(i)).attr("id","div_input_dymanic"+(Indice));
					$("#div_input_dymanic"+(Indice)).html('<input id="upload_adjuntos'+Indice+'" name="imagenes[]" type="file" multiple="multiple" class="file-loading" >');
					
					$("#url_det_adjuntos"+(i)).attr("id","url_det_adjuntos"+Indice);
					$("#divVer_Imagen"+(i)).attr("id","divVer_Imagen"+Indice);
					//$("#fecha_programada"+(i)).attr("id","fecha_programada"+(Indice));
					$("#fecha_programada"+(i)).attr({id:"fecha_programada"+(Indice), onclick:"Cambio_Fecha_Progr_Array("+Indice+")"});
					//$("#fecha_realizada"+(i)).attr("id","fecha_realizada"+(Indice));
					$("#fecha_realizada"+(i)).attr({id:"fecha_realizada"+(Indice), onclick:"Cambio_Fecha_Reali_Array("+Indice+")"});
					
					$("#quitarmas_table_dinamyc"+(i)).attr({id:"quitarmas_table_dinamyc"+(Indice), onclick:"quitarmas("+Indice+")"});
					//console.log("$(#Num_Actividad"+(i)+").attr(id,Num_Actividad"+Indice+")----Indice="+Indice+"----contador:"+Indice+"--des");
					
					var file_adjuntos="upload_adjuntos"+(Indice);
					var hidden_url="url_det_adjuntos"+(Indice);
					subirimagenes(file_adjuntos, hidden_url, false, Indice);
				}
				
			}
			
		}else{
			jQuery("#Muestro_Agregados").append(contenido);
			var file_adjuntos="upload_adjuntos"+cont_array_actividades;
			var hidden_url="url_det_adjuntos"+cont_array_actividades;
			subirimagenes(file_adjuntos, hidden_url, false, cont_array_actividades);	
		}		
		
		//Fecha
		var nowTemp = new Date();
		var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
		
		if(Indice==null){
			$('#fecha_programada'+cont_array_actividades+'').datepicker({
				format: 'dd/mm/yyyy',
				onRender: function(date) {
					return date.valueOf() < now.valueOf() ? 'disabled' : '';
				}
			});
		}else{
			$('#fecha_programada'+Indice).datepicker({
				format: 'dd/mm/yyyy',
				onRender: function(date) {
					return date.valueOf() < now.valueOf() ? 'disabled' : '';
				}
			});
		}
		//Fecha
		//console.log(array_actividades);
}



	
	//Funcion quitar
	quitarmas=function(contador){
	    $.confirm({
			title: 'Confirm!',
			content: 'Deseas eliminar la fila!',
			buttons: {
				confirm: function () {
					var Total_Array=array_actividades.length;
						array_actividades[contador]="N";
						array_actividades=[];
						cont_array_actividades=cont_array_actividades-1;
						
						for(var i=0;i < (Total_Array); i++){
							if(contador<=(i-1)){
								$("#Contenido_tr"+i).attr({id:"Contenido_tr"+(i-1)});
								$("#mas_table_dinamyc"+i).attr({id:"mas_table_dinamyc"+(i-1), onclick: "Agregar_Mas("+(i-1)+")"});
								$("#Num_Actividad"+(i)).val(i);
								$("#Num_Actividad"+i).attr("id","Num_Actividad"+(i-1));
								$("#Nombre_Actividad"+i).attr("id","Nombre_Actividad"+(i-1));
								$("#Valor_Referencia"+i).attr("id","Valor_Referencia"+(i-1));
								$("#Valor_Medido"+i).attr("id","Valor_Medido"+(i-1));
								$("#radio_ok"+i).attr("id","radio_ok"+(i-1));  $("#groupradioactividad"+i).attr("name","groupradioactividad"+(i-1));
								$("#radio_fallo"+i).attr("id","radio_fallo"+(i-1));
								$("#radio_no_aplica"+i).attr("id","radio_no_aplica"+(i-1));
								$("#check_vincular_mesa_ayuda"+i).attr("id","check_vincular_mesa_ayuda"+(i-1));
								$("#observaciones"+i).attr("id","observaciones"+(i-1));
								$("#upload_adjuntos"+i).attr("id","upload_adjuntos"+(i-1));
								$("#url_det_adjuntos"+i).attr("id","url_det_adjuntos"+(i-1));
								$("#divVer_Imagen"+i).attr("id","divVer_Imagen"+(i-1));
								//$("#fecha_programada"+i).attr("id","fecha_programada"+(i-1));
								$("#fecha_programada"+i).attr({id:"fecha_programada"+(i-1), onclick:"Cambio_Fecha_Progr_Array("+(i-1)+")"});
								//$("#fecha_realizada"+i).attr("id","fecha_realizada"+(i-1));
								$("#fecha_realizada"+(i)).attr({id:"fecha_realizada"+(i-1), onclick:"Cambio_Fecha_Reali_Array("+(i-1)+")"});
								$("#quitarmas_table_dinamyc"+i).attr({id:"quitarmas_table_dinamyc"+(i-1), onclick: "quitarmas("+(i-1)+")"});	
							}
						}
						
						for(var i=0;i < ((Total_Array)-1); i++){
							array_actividades[i]="S";
						}
						
						$("#Contenido_tr"+contador+"").remove();
						//console.log(array_actividades);
				},
				cancel: function () {
				}
			}
		});
	
	}
	
	//Funcion Agregar Fecha en automatico (Fecha programada)
	Cambio_Fecha_Progr_Array=function(Indice){
		//Al dar click sobre el calendario se crea el evento
		$("#fecha_programada"+Indice).on("changeDate", function (e) {
			/*Como se generan varios eventos del mismo al dar click, se creo un contador que incrementa a uno 
			solo cuando se da click sobre un dia en el calendario
			*/
			switch_fech_prog=switch_fech_prog+1;
			if((cont_array_actividades>0)&&(Indice<cont_array_actividades)){
				if(switch_fech_prog==1){
					$.confirm({
						title: 'Confirm!',
						content: 'Cambiar Fecha Solo a este campo CAMBIAR<br> Cambiar fecha de aqui en adelante TODOS',
						buttons: {
							cambiar: function () {
							},
							todos: function () {
								var Fecha_Programada_Select=$("#fecha_programada"+Indice).val();
								for(var i=Indice;i < (cont_array_actividades+1); i++){
									$("#fecha_programada"+i).val(Fecha_Programada_Select);
								}
							}
						}
					});
					
				}
			}
		});
		//Se comienza nuevamente con el objetivo de que no muestra varias alertas de confirmacion
		switch_fech_prog=0;
	}
	
	
	//Funcion Agregar Fecha en automatico (Fecha realizada)
	Cambio_Fecha_Reali_Array=function(Indice){
		//Al dar click sobre el calendario se crea el evento
		$("#fecha_realizada"+Indice).on("changeDate", function (e) {
			var Fecha_Realizada_Select=$("#fecha_realizada"+Indice).val();
			var Fecha_Programada_Select=$("#fecha_programada"+Indice).val();
			if(Fecha_Realizada_Select!=""){
				var fec_realizada_sin_formato=Fecha_Realizada_Select.substring(6, 10)+Fecha_Realizada_Select.substring(3, 5)+Fecha_Realizada_Select.substring(0, 2);
				var fec_program_sin_formato=Fecha_Programada_Select.substring(6, 10)+Fecha_Programada_Select.substring(3, 5)+Fecha_Programada_Select.substring(0, 2);
				if(parseInt(fec_realizada_sin_formato)<parseInt(fec_program_sin_formato)){
					$("#fecha_realizada"+Indice).val("");
				}
			}
			
			/*Como se generan varios eventos del mismo al dar click, se creo un contador que incrementa a uno 
			solo cuando se da click sobre un dia en el calendario
			*/
			switch_fech_prog=switch_fech_prog+1;
			
			if((cont_array_actividades>0)&&(Indice<cont_array_actividades)){
				if(switch_fech_prog==1){
					if($("#fecha_realizada"+Indice).val()!=""){
						$.confirm({
							title: 'Confirm!',
							content: 'Cambiar Fecha Solo a este campo CAMBIAR<br> Cambiar fecha de aqui en adelante TODOS',
							buttons: {
								cambiar: function () {
								},
								todos: function () {
									for(var i=Indice;i < (cont_array_actividades+1); i++){
										$("#fecha_realizada"+i).val(Fecha_Realizada_Select);
									}
								}
							}
						});
					}
				}
			}
		});
		//Se comienza nuevamente con el objetivo de que no muestra varias alertas de confirmacion
		switch_fech_prog=0;
	}
	
	//Funcion copiar
	copiar=function(){
		cont_array_actividades=0;
		array_actividades=[];
		array_actividades[0]="S";
		mensaje_error="";
		var Id_Actividad=$("#cmb_copiar").val();
		
		if (Id_Actividad == "-1") {
			mensaje_error += " -Selecciona una rutina<br />";
			mensajesalerta("Informaci&oacute;n", mensaje_error, "info", "dark");
		}else{
			pasarvalores(Id_Actividad,2,null);
			
			$("#fecha_programada0").blur(function(){
				if($("#fecha_programada0").val()!=""){
					var Fecha_Programada_Pos_0=$("#fecha_programada0").val();
					
					for(var i=1;i < array_actividades.length; i++){
						$("#fecha_programada"+i).val(Fecha_Programada_Pos_0);
					}	
				}		
			});
		}
	}
	
	
	//Llenar Calendario desde inicio
	function llenar_calendario(Tipo_Actividad) {
        //Usuario Logueado
		var Id_Usuario=$("#usuariosesion").val();
		//Area
		var Id_Area=$("#idareasesion").val();
		
		$.ajax({
			type: "POST",
			url: "../fachadas/activos/siga_actividades/Siga_actividadesFacade.Class.php",
			async: true,
			data: {
				Id_Area:Id_Area,
				Tipo_Actividad:Tipo_Actividad,//Mantenimiento Predictivo
				Estatus_Reg:"1",
				accion: "calendario_global"
			},
			dataType: "html",
			beforeSend: function (xhr) {
			},
			success: function (data) {

				var fecha2 = moment('2016-08-1');
                data = eval("(" + data + ")");
                if (data.totalCount > 0) {
					Carga_anios(data);
					//Creamos el objeto array_DextrostixHora para poder llenarlo dinamicamente desde la tabla detalle siga_det_actividades
					array_DextrostixHora = new Array();	
					for(var i=0;i < data.totalCount; i++){
						
						var anio=data.data[i].Fecha_Programada[0]+''+data.data[i].Fecha_Programada[1]+''+data.data[i].Fecha_Programada[2]+''+data.data[i].Fecha_Programada[3];
						var mes=data.data[i].Fecha_Programada[4]+''+data.data[i].Fecha_Programada[5];
						var dia=data.data[i].Fecha_Programada[6]+''+data.data[i].Fecha_Programada[7];
						var Fecha_Start="";
						
						if(dia<10){
							dia=dia[1];
							Fecha_Start=anio+"-"+mes+"-"+dia;
						}
						
						if(dia>9){
							//dia=(parseInt(dia)+1);
							//Incrementa a un dia la fecha programada
							Fecha_Start=moment(''+anio+'-'+mes+'-'+dia+'').add(1, 'days').format("YYYY-MM-DD");
						}
						
						var Id_Calendario="";
						var Nombre_Actividad="";
						let fechaStart = "";
						fechaIniciAlex=data.data[i].Fecha_Programada;
						
						if(Estatus_Tipo_Actividad!=3){							
							Id_Calendario=data.data[i].Id_Actividad+'-'+data.data[i].Fecha_Programada;
							Nombre_Actividad=data.data[i].Activo_UbicEspecifica;
							
						}else{
							Id_Calendario=data.data[i].Id_Actividad;
							Nombre_Actividad=data.data[i].AF_BC.trim();
							
						}
						
						//console.log(data.data[i].Id_Actividad+'-'+anio+'-'+mes+'-'+dia);
						//console.log(Fecha_Start);
						//Llenamos el array
						array_DextrostixHora[i]={
							description: Nombre_Actividad,
							title: Nombre_Actividad,
							//inicio: fechaStart,
							start: fechaIniciAlex,
							//end: new Date('2017-11-30'),
							id: Id_Calendario,
							allDay: true,
							//editable: true,
							//eventDurationEditable: true,
							color: data.data[i].Color_Calendar
						};
					}
					
					//Una vez llenado el array dinamicamente, lo pasamos al objeto calendario
					var source = { 
						events: array_DextrostixHora,
						eventRender: function(event, element) {
							element.qtip({
								content: event.description,								
							});
						}
					};
					$('#calendario-shit').fullCalendar( 'addEventSource', source );
                
				}
            },
            error: function () {
							mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
            }
        });
        
    }
	

	// Acciones para mostrar el calendario generado por el componente o los reportes especificos
	busqueda_full_calendar = function(Tipo_Actividad){
		$("#respuesta_busqueda").html("");
		//Usuario Logueado
		var Id_Usuario=$("#usuariosesion").val();
		var Id_Gestor=$("#cmb_gestores_Search").val();
		//Area
		var Id_Area=$("#idareasesion").val();
		
		//Parametros Busqueda
		var Id_Activo=$("#select-activos-search").val();
		var Rutina=$.trim($("#txt_Rutina_Search").val());
		var Desc_Corta=$.trim($("#txt_Desc_Corta_Search").val());
		var Anios=$("#Cmb_Anios_Search").val();
		if (Id_Activo=="-1") { Id_Activo = ""; }
		if (Rutina.length<= 0) { Rutina = ""; }
		if (Desc_Corta.length<= 0) { Desc_Corta=""; }
		if (Anios=="-1") { Anios=""; }
		
		var arry_search = new Array();
		arry_search[0] = Id_Activo;
		arry_search[1] = Rutina;
		arry_search[2] = Desc_Corta;
		arry_search[3] = Anios;
		
		$.ajax({
			type: "POST",
			url: "../fachadas/activos/siga_actividades/Siga_actividadesFacade.Class.php",
			async: true,
			data: {
				Id_Area:Id_Area,
				Tipo_Actividad:Tipo_Actividad,//Mantenimiento Predictivo
				Estatus_Reg:"1",
				Id_Gestor:Id_Gestor,
				Busqueda:arry_search,
				accion: "calendario_global"
			},
			dataType: "html",
			beforeSend: function (xhr) {

			},
			success: function (data) {
				json = eval("(" + data + ")");
				if (json.totalCount > 0) {
					mensajesalerta("&Eacute;xito", "Registros Encontrados", "success", "dark");
					// Oculta el calendario creado por el componente
					$("#calendario-shit").hide();
					$("#btn_mostrar_full_calendar").show();
					var tabla="";
					var Fecha_P=0;
					if(json.totalCountAnio>0){
						for(var i=0;i < json.totalCountAnio; i++){
							tabla+='<div class="table-responsive">';
							tabla+='	<table class="table table-bordered display">';
							tabla+='		<thead>';
							tabla+='			<tr>';
							tabla+='				<td style="color:#fff;" class="text-center" colspan="2"><h4>'+json.data_anios[i].Anio+'</h4></td>';
							tabla+='			</tr>  ';
							tabla+='		</thead>';
							tabla+='		<tbody>';
							//Fecha_P=json.data[0].Fecha_Programada;
							for(var j=0;j < json.totalCount; j++){
								var color="";
								if(json.data_anios[i].Anio==json.data[j].Fecha_Programada[0]+""+json.data[j].Fecha_Programada[1]+""+json.data[j].Fecha_Programada[2]+""+json.data[j].Fecha_Programada[3]){
									if(Fecha_P<json.data[j].Fecha_Programada){
										var anio=json.data[j].Fecha_Programada[0]+""+json.data[j].Fecha_Programada[1]+""+json.data[j].Fecha_Programada[2]+""+json.data[j].Fecha_Programada[3];
										var mes=json.data[j].Fecha_Programada[4]+""+json.data[j].Fecha_Programada[5];
										var dia=json.data[j].Fecha_Programada[6]+""+json.data[j].Fecha_Programada[7];
										
										var Dia_String = moment(anio+" "+mes+" "+dia , "YYYY MM DD" );
										Dia_String=Dia_String.format('dddd');
										
										var Mes_String = moment(anio+" "+mes+" "+dia , "YYYY MM DD" );
										Mes_String=Mes_String.format('MMMM');
										
										tabla+='<tr>';
										tabla+='	<td class="text-left"  style="background:#a0a2a5;color:black">';
										tabla+=			'<strong>'+Mes_String+' '+dia+', '+anio+'</strong>';
										tabla+='	</td>';
										tabla+='	<td class="text-right"  style="background:#a0a2a5;color:black">';
										tabla+=			'<strong>'+Dia_String+'</strong>';
										tabla+='	</td>';
										tabla+='</tr>';
									}
									
									var Nombre_Actividad="";
									var Id_Calendario="";
									var Funcion_Td="";
									if(Estatus_Tipo_Actividad!=3){
										Id_Calendario=json.data[j].Id_Actividad+'-'+json.data[j].Fecha_Programada;
										Nombre_Actividad=json.data[j].Nombre_Rutina;
										Funcion_Td='	<td class="text-left"><a href="#" onclick="pasar_valores_mantenimiento(\''+json.data[j].Id_Actividad+'-'+json.data[j].Fecha_Programada+'\',\''+json.data[j].Color_Calendar+'\');">';
									}else{
										Id_Calendario=json.data[j].Id_Actividad;
										Nombre_Actividad=json.data[j].Motivo_Servicio.trim();
										Funcion_Td='	<td class="text-left"><a href="#" onclick="pasar_valores_mantenimiento(\''+json.data[j].Id_Actividad+'-'+json.data[j].Fecha_Programada+'\',\''+json.data[j].Color_Calendar+'\');">';
									}
									
									tabla+='<tr>';
									tabla+=Funcion_Td;
									
									if(json.data[j].Realiza=="1"){
										color="#ecc93b";
									}else{
										if(json.data[j].Realiza=="2"){
											color="#2ad4a7";
										}
									}
									
									tabla+='		<table border="0"><tr><td><div width="15%" style="width: 15px; height: 15px; -moz-border-radius: 50%; -webkit-border-radius: 50%; border-radius: 50%; background:'+json.data[j].Color_Calendar+';"></div></td><td>&nbsp;&nbsp;&nbsp;'+Nombre_Actividad+'</td></tr></table>';
									tabla+='	</a></td>';
									tabla+='	<td class="text-right">';
									tabla+=			json.data[j].Fecha_Programada[6]+""+json.data[j].Fecha_Programada[7]+'/'+json.data[j].Fecha_Programada[4]+""+json.data[j].Fecha_Programada[5]+'/'+json.data[j].Fecha_Programada[0]+""+json.data[j].Fecha_Programada[1]+""+json.data[j].Fecha_Programada[2]+""+json.data[j].Fecha_Programada[3];
									tabla+='	</td>';
									tabla+='</tr>';
									Fecha_P=json.data[j].Fecha_Programada;
								}
							}
							
							tabla+='		</tbody>';
							tabla+='	</table>';
							tabla+='</div>';
							tabla+='<br><br>';
						}
					}
					$("#respuesta_busqueda").html(tabla);
				}else{
					mensajesalerta("Informaci&oacute;n", "No se encontraron registros.", "info", "dark");
				}
			},
			error: function () {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
			}
		});
	}

	
	//Carga el plugin Full Calendar al presionar en el menu izquierdo cualquiera de las actividades
	mostrar_full_calendar = function(Tipo_Actividad) {
		$("#calendario-shit").show();
		$("#btn_mostrar_full_calendar").hide();
		$("#respuesta_busqueda").html("");
		limpiar_campos_busqueda(Tipo_Actividad);
	}


	
	limpiar_campos_busqueda=function(Tipo_Actividad){
		var Nom_Activo=$.trim($("#select-activos-search").val());
		if(Nom_Activo!=""){			
			if(Nom_Activo.length > 0){
				var $select3 = $('#select-activos-search').selectize({});	
				var control3 = $select3[0].selectize;
				control3.clear();
				control3.enable();
			}
		}
		
		$("#txt_Rutina_Search").val("");
		$("#txt_Desc_Corta_Search").val("");
		$("#Cmb_Anios_Search").val("-1");
	}
	
	function cargarimagenes(hidden_url, file_adjuntos, nombre_url, vista_imagen, Posicion){
		$("#"+hidden_url).val(nombre_url);
		$('#'+file_adjuntos).fileinput({
			uploadUrl: "../Archivos/upload.php?carpeta="+url_direccion+"",
			uploadAsync: true,
			showUpload: true,
			showRemove: false,
			showPreview: vista_imagen,
			maxFileCount: 0,
			minFileCount: 0,
			browseClass: "btn chs",
			validateInitialCount: true,
			language: 'es',
			
			initialPreviewConfig: [{
			caption: '' + nombre_url + '', 
			width: '100px',
			url: '../Archivos/borrar.php?carpeta='+url_direccion+'', 
			key: '' + nombre_url + '',  
			extra: { id: 100 }
			}]
			, initialPreview: [
			//NOMBRE IMAGEN CARGADA OBTENER EL NOMBRE DE LA CAJA DE TEXTO
			"<img src='"+url_direccion+"/" + nombre_url + "' class='kv-preview-data file-preview-image' style='width:auto;height:160px;' alt='Imagen Cargada' title='Imagen Cargada'>"
			]
		});
		
		//Cargar Archivo
		$('#'+file_adjuntos).on('fileuploaded', function (event, data, previewId, index) {
			var form = data.form, files = data.files, extra = data.extra,
				response = data.response, reader = data.reader;
			$('#'+hidden_url).val(response.initialPreviewConfig[0].caption);
			$('#divVer_Imagen'+Posicion).html('<a href="'+url_direccion+'/'+response.initialPreviewConfig[0].caption+'" target="_blank">Ver Im&aacute;gen</a>');
		});
		
		$('#'+file_adjuntos).on('filereset', function (event) {
			$('#'+hidden_url).val("");
			
			$('#divVer_Imagen'+Posicion).html("");
		});
		
	}
	
	function subirimagenes(file_adjuntos, url_hidden, vista_imagen, Posicion){
		//inicializar el file upload
		$('#'+file_adjuntos).fileinput({
			uploadUrl: "../Archivos/upload.php?carpeta="+url_direccion+"",
			uploadAsync: true,
			showUpload: true,
			showRemove: false,
			showPreview: vista_imagen,
			//showCaption: false,
			maxFileCount: 1,
			minFileCount: 0,
			browseClass: "btn chs",
			validateInitialCount: true,
			language: 'es'
		});
		//Cargar Archivo
		$('#'+file_adjuntos).on('fileuploaded', function (event, data, previewId, index) {
			
			var form = data.form, files = data.files, extra = data.extra,
				response = data.response, reader = data.reader;
			$('#'+url_hidden).val(response.initialPreviewConfig[0].caption);
			$('#divVer_Imagen'+Posicion).html('<a href="'+url_direccion+'/'+response.initialPreviewConfig[0].caption+'" target="_blank">Ver Im&aacute;gen</a>');
		});
		
		//Eliminar Archivo desde la imagen
		$('#'+file_adjuntos).on('filereset', function (event, data, previewId, index) {
			$('#'+url_hidden).val("");
			$('#divVer_Imagen'+Posicion).html("");
		});
		
	}
	

function pasar_valores_a_modal(id, fecha){

		if (id != "" ) {

			$.ajax({
					type: "POST",
					url: "/siga/class/biomedica/mtoPreventivo/mtoPreventivo.ajax.php",
					data: {						
						Id_Actividad: id,
						accion: 5
					},
					dataType: "JSON",
					cache:false,
					beforeSend: function (xhr) {

					},
					success: function (data) {						
						let agnio = fecha.substring(0, 4);
						let mes 	= fecha.substring(4, 6);
						let dia 	= fecha.substring(6, 8);
						let FechaInicial = agnio+'-'+mes+'-'+dia;
						$('#texto_AF_BC').val($.trim(data.AF_BC)+'-'+$.trim(data.DescLarga));
						$('#texto_ubic_primaria').val(data.Ubic_Prim);
						$('#texto_ubic_secundaria').val(data.Ubic_Sec);
						$('#texto_No_Serie').val(data.NumSerie);
						$('#texto_marca').val(data.Marca);
						$('#texto_Rutina').val(data.Nombre_Rutina);
						$('#texto_Modelo').val(data.Modelo);
						$('#texto_Ubicacion_Especifica').val(data.Especifica);
						$('#texto_id_actividad').val(id);
						$('#texto_fecha_programada').val(FechaInicial);
						$("#Actividades_Activo_Fijo_Reprogramar").modal("show");
					}
			});
	}else{

	}

}

	//Pasar Valores al Editar
	pasarvalores_full_calendar=function(id, estatus, fecha=null) {		
		limpiar();

		if (id != "") {
			$("#txt_Nombre_Rutina").attr('disabled', true);
			$("#cmb_frecuencia").attr('disabled', true);
			$("#txt_Desc_Corta").attr('disabled', true);
			//Deshabilita radios quien realiza
			$("#radio_interno").attr('disabled', true);
			$("#radio_externo").attr('disabled', true);
			
			$("#cmb_copiar").attr('disabled', true);
			$("#btn_copiar").attr('disabled', true);
			
			//Deshabilita radios vincular mesa de ayuda
			$("#vincular_mesa_ayuda_si").attr('disabled', true);
			$("#vincular_mesa_ayuda_no").attr('disabled', true);
			
			//Contador que valida si los estatus ok, fallo y no aplica estan checkeados
			var cont_est_act=0;
			
            $.ajax({
                type: "POST",
                url: "../fachadas/activos/siga_actividades/Siga_actividadesFacade.Class.php",
                async: false,
                data: {
									Fecha_Det_Programada:fecha,
									Estatus_Reg:"1",
            			Id_Actividad: id,
            			accion: "consultar_actividades"
                },
                dataType: "html",
                beforeSend: function (xhr) {

                },
                success: function (data) {
										var LoRealiza=0;
                    	data = eval("(" + data + ")");
                    if (data.totalCount > 0) {
						//consultar_actividades_calif(id);
											var eliminar_archivo="";
						
										if(data.data[0]["Id_Actividad"]!=""){
											eliminar_archivo="no";
										}
						
						//Pasar valor y deshabilita control autocomplete de activos
						var $select3 = $('#select-activos').selectize({});	
						var control3 = $select3[0].selectize;
						control3.addItem(data.data[0].Id_Activo);
						control3.disable();
						$("#Id_Actividad").val(data.data[0].Id_Actividad);
						$("#txt_Nombre_Rutina").val(data.data[0].Nombre_Rutina);
						$("#cmb_frecuencia").val(data.data[0].Id_Frecuencia);
						$("#txt_Desc_Corta").val(data.data[0].Descripcion);
						$("#cmb_gestores").val(data.data[0].Id_Gestor);
						$("#cmb_ejecutantes").val(data.data[0].Nombre_Ejecutante);
						
						if(Estatus_Tipo_Actividad==2){
							$("#txt_comentarios").val(data.data[0].Comentarios);
							
							$("#Mant_RAC1").val(data.data[0].Mant_RAC1);
							$("#Mant_RAC2").val(data.data[0].Mant_RAC2);
							$("#Mant_RAC3").val(data.data[0].Mant_RAC3);
							$("#Mant_RAC4").val(data.data[0].Mant_RAC4);
							$("#Cantidad_M_1").val(data.data[0].Cantidad_1);
							$("#Cantidad_M_2").val(data.data[0].Cantidad_2);
							$("#Cantidad_M_3").val(data.data[0].Cantidad_3);
							$("#Cantidad_M_4").val(data.data[0].Cantidad_4);
							$("#Costo_M_1").val(data.data[0].Costo_1);
							$("#Costo_M_2").val(data.data[0].Costo_2);
							$("#Costo_M_3").val(data.data[0].Costo_3);
							$("#Costo_M_4").val(data.data[0].Costo_4);
							$("#Horas").val(data.data[0].Horas);
							$("#Costos_Materiales_CE").val(data.data[0].Costos_Materiales_CE);
							$("#Mano_Obra_CE").val(data.data[0].Mano_Obra_CE);
							$("#Total_CE").val(data.data[0].Total_CE);
							$("#Costos_Materiales_CI").val(data.data[0].Costos_Materiales_CI);
							$("#Mano_Obra_CI").val(data.data[0].Mano_Obra_CI);
							$("#Total_CI").val(data.data[0].Total_CI);
							$("#Ahorro").val(data.data[0].Ahorro);
						
							var Total=0;
							var Cantidad=0;
							var Costo=0;
							for(var i=1; i<5;i++){
								if($("#Cantidad_M_"+i).val()!=""){Cantidad=$("#Cantidad_M_"+i).val();}
								if($("#Costo_M_"+i).val()!=""){Costo=$("#Costo_M_"+i).val();}
								Total=Total+(Cantidad*Costo);Cantidad=0;Costo=0;
							}
							
							$("#Total_Costos").val(Total);
						
						}
						
						//Chekear radios quien realiza
						if(data.data[0].Realiza=="1"){$("#radio_interno").prop( "checked", true );LoRealiza=1;}
						if(data.data[0].Realiza=="2"){$("#radio_externo").prop( "checked", true );LoRealiza=2;}
						if(data.data[0].vincular_mesa_ayuda=="1"){$("#vincular_mesa_ayuda_si").prop( "checked", true );}
						if(data.data[0].vincular_mesa_ayuda=="2"){$("#vincular_mesa_ayuda_no").prop( "checked", true );}
						//Pasar imagenes al dropzone
						if (data.data[0].url_documentos_adjuntos.length>0){
							//var Doc_adjuntos="";
							//Doc_adjuntos+='<input id="documentos_adjuntos_FILE" name="imagenes[]" type="file" multiple="multiple" class="file-loading"/>';
							//Doc_adjuntos+='<input type="hidden" id="url_documentos_adjuntos">';
							//$("#Cadena_doc_adjuntos").html(Doc_adjuntos);
							//Archivos_Multiples_Adjuntar();
							
							//var hidden_url="url_documentos_adjuntos";
							//var file_adjuntos="documentos_adjuntos_FILE";
							var nombre_url=data.data[0].url_documentos_adjuntos;
							//	
							//cargarimagenes(hidden_url, file_adjuntos, nombre_url, true, -1);
						
							if(nombre_url!=null && nombre_url.length>0){
								$("#url_documentos_adjuntos").val(nombre_url);
								
								if($('#url_documentos_adjuntos').val()!=""){
									var Proveedor_contrato = $('#url_documentos_adjuntos').val().indexOf("---");
									if(Proveedor_contrato!=-1){
										mostrar_archivos_lista($('#url_documentos_adjuntos').val(), "div_archivos_multiples_lista", url_direccion, "si", "url_documentos_adjuntos", eliminar_archivo);
									}else{
										mostrar_archivos_lista($('#url_documentos_adjuntos').val(), "div_archivos_multiples_lista", url_direccion, "no", "url_documentos_adjuntos", eliminar_archivo);
									}
								}
							}
						}
						//////////////////////////////////////////////////
						//Muestra pantalla modal
						$("#Actividades_Activo_Fijo").modal("show");
					
					
					
						var vista_imagen=false;
						var contenido="";
						var Estatus_Fech_Real=0;
						
						
						
						for(var i=0;i < data.totalCountDetalle; i++){
							var Fecha_Prog="";
							var Fecha_Real="";
							if(estatus==1 || estatus==3){
								Fecha_Prog=data.data_det[i].Fecha_Programada[6]+''+data.data_det[i].Fecha_Programada[7]+'/'+data.data_det[i].Fecha_Programada[4]+''+data.data_det[i].Fecha_Programada[5]+'/'+data.data_det[i].Fecha_Programada[0]+''+data.data_det[i].Fecha_Programada[1]+''+data.data_det[i].Fecha_Programada[2]+''+data.data_det[i].Fecha_Programada[3];
								
								if(data.data_det[i].Fecha_Realizada.trim()!=""){
									Fecha_Real=data.data_det[i].Fecha_Realizada[6]+''+data.data_det[i].Fecha_Realizada[7]+'/'+data.data_det[i].Fecha_Realizada[4]+''+data.data_det[i].Fecha_Realizada[5]+'/'+data.data_det[i].Fecha_Realizada[0]+''+data.data_det[i].Fecha_Realizada[1]+''+data.data_det[i].Fecha_Realizada[2]+''+data.data_det[i].Fecha_Realizada[3];	
									Estatus_Fech_Real=1;
								}
							}
							cont_array_actividades=i;
							array_actividades[cont_array_actividades]="S";
							contenido+='<tr id="Contenido_tr'+i+'">';
							contenido+='  <td></td>';
							contenido+='  <td>';
							contenido+='    <div class="form-group" style="width:30px;font-size: 11px"  align="center" >';
							contenido+='      <input type="hidden" id="Id_Det_Actividad'+i+'" value="'+data.data_det[i].Id_Det_Actividad+'">';
							contenido+=       data.data_det[i].Num_Actividad.trim();
							contenido+='    </div>';
							contenido+='  </td>';
							contenido+='  <td>';
							contenido+='    <div class="form-group" style="font-size:11px">';
							contenido+=		data.data_det[i].Nombre_Actividad.trim();
							contenido+='    </div>';
							contenido+='  </td>';
							contenido+='  <td>';
							contenido+='    <div class="form-group" style="font-size:11px">';
							contenido+=		data.data_det[i].Valor_Referencia;
							contenido+='    </div>';
							contenido+='  </td>';
							contenido+='  <td>';
							contenido+='    <div class="form-group">';
							contenido+='      <textarea rows="2" class="form-control" placeholder="" id="Valor_Medido'+i+'" style="font-size: 11px;">'+data.data_det[i].Valor_Medido+'</textarea>';
							contenido+='    </div>';
							contenido+='  </td>';
							contenido+='  <td align="center">';
							contenido+='  	<input type="radio" id="radio_ok'+i+'" name="groupradioactividad'+i+'"'; if(data.data_det[i].Estatus_Actividad=="1"){contenido+=' checked ';cont_est_act=cont_est_act+1;}contenido+='>';
							contenido+='  </td>';
							contenido+='  <td align="center">';
							contenido+='  	<input type="radio" id="radio_fallo'+i+'" name="groupradioactividad'+i+'"'; if(data.data_det[i].Estatus_Actividad=="2"){contenido+=' checked ';cont_est_act=cont_est_act+1;}contenido+='>';
							contenido+='  </td>';
							contenido+='  <td align="center">';
							contenido+='  	<input type="radio" id="radio_no_aplica'+i+'" name="groupradioactividad'+i+'"'; if(data.data_det[i].Estatus_Actividad=="3"){contenido+=' checked ';cont_est_act=cont_est_act+1;}contenido+='>';
							contenido+='  </td>';
							// contenido+='  <td align="center">';
							// if(data.data_det[i].V_Mesa==1){
							// 	contenido+='  	<input type="checkbox" id="check_vincular_mesa_ayuda'+i+'" checked disabled>';
							// }else{
							// 	contenido+='  	<input type="checkbox" id="check_vincular_mesa_ayuda'+i+'" disabled>';
							// }
							// contenido+='  </td>';
							contenido+='  <td>';
							contenido+='    <div class="form-group">';
							contenido+='      <textarea rows="2" class="form-control" placeholder="(200 caracteres)" id="observaciones'+i+'" style="font-size: 10px;">'+data.data_det[i].Observaciones+'</textarea>';
							contenido+='    </div>';
							contenido+='  </td>';
							contenido+='  <td>';
							contenido+='   <div class="form-group" align="center">';
							contenido+='      <div id="div_input_dymanic'+i+'"><input name="imagenes[]" type="file" multiple="multiple" class="file-loading" id="upload_adjuntos'+i+'"></div>';
							contenido+='      <input type="hidden"  id="url_det_adjuntos'+i+'">';
							contenido+='      <div id="divVer_Imagen'+i+'">';
							if(data.data_det[i].Url_Adjunto!=null && data.data_det[i].Url_Adjunto!=""){
								contenido+='<a href="'+url_direccion+'/'+data.data_det[i].Url_Adjunto+'" target="_blank">Ver Im&aacute;gen</a>';
							}
							contenido+='	  </div>';
							contenido+='    </div>';
							contenido+='  </td>';
							contenido+='<td style="font-size:11px">';
							contenido+='	<input type="hidden" id="fecha_programada'+i+'" value="'+Fecha_Prog+'">';
							contenido+=		Fecha_Prog;
							contenido+='</td>';
							contenido+='<td>';
							contenido+='  <div class="input-group date">';
							//contenido+='	<div class="input-group-addon">';
							//contenido+='	  <i class="fa fa-calendar"></i>';
							//contenido+='	</div>';
							contenido+='	<input type="text" class="form-control pull-right datepicker" onclick="Cambio_Fecha_Reali_Array('+i+')"  id="fecha_realizada'+i+'" style="font-size: 11px;" disabled value="'+Fecha_Real+'">';
							contenido+='  </div>';
							contenido+='</td>';
							contenido+='  <td></td>';
							contenido+='</tr>';
						}
						
						$("#Muestro_Agregados").html(contenido);
						if(Estatus_Tipo_Actividad==1){
							$("#td_formato").html('<a href="../controladores/activos/siga_actividades/Reporte-Mantenimiento-Predictivo.php?Id_Actividad='+id+'" class="btn chs" role="button" target="_blank" id="Btn_Formato" style="display:none">Formato</a>');
						}
						if(Estatus_Tipo_Actividad==2){
							$("#td_formato").html('<a href="../controladores/activos/siga_actividades/Reporte-Mantenimiento-Preventivo.php?Id_Actividad='+id+'" class="btn chs" role="button" target="_blank" id="Btn_Formato" style="display:none">Formato</a>');
						}
						if(Estatus_Tipo_Actividad==3){
							$("#td_formato").html('<a href="../controladores/activos/siga_actividades/Reporte-Mantenimiento-Correctivo.php?Id_Actividad='+id+'" class="btn chs" role="button" target="_blank" id="Btn_Formato" style="display:none">Formato</a>');
						}
						if(Estatus_Tipo_Actividad==4){
							$("#td_formato").html('<a href="../controladores/activos/siga_actividades/Reporte-Capacitaciones.php?Id_Actividad='+id+'" class="btn chs" role="button" target="_blank" id="Btn_Formato" style="display:none">Formato</a>');
						}
						//Deshabilitamos el control agregar mas
						$("#agregarmas_table_dinamyc").hide();
						
						//Obtener Fecha
						var hoy = new Date();
						var dd = hoy.getDate();
						var mm = hoy.getMonth()+1; //hoy es 0!
						var yyyy = hoy.getFullYear();

						if(dd<10) {
							dd='0'+dd
						}

						if(mm<10) {
							mm='0'+mm
						}

						hoy = yyyy+''+mm+''+dd;
						var Fech_Actual=dd+'/'+mm+'/'+yyyy;
						//Fin Obtener Fecha
						
						$("#Estatus_Realizado").val("1");

						for(var k=0;k < data.totalCountDetalle; k++){
							//Pasar imagenes a la tabla dinamica
							if (data.data_det[k].Url_Adjunto.length>0){
								var hidden_url="url_det_adjuntos"+k;
								var file_adjuntos="upload_adjuntos"+k;
								var nombre_url=data.data_det[k].Url_Adjunto;
								
								cargarimagenes(hidden_url, file_adjuntos, nombre_url, false, k);
							  
							}
							else{
								var file_adjuntos="upload_adjuntos"+k;
								var hidden_url="url_det_adjuntos"+k;
								subirimagenes(file_adjuntos, hidden_url, false, k);
							}
							
							
							$("#fecha_realizada"+k).attr('disabled', false);
							/*
							if($("#fecha_realizada"+k).val()==""){
								$("#fecha_realizada"+k).val(Fech_Actual);
							}
							*/
							
							/*
							if(LoRealiza==1){
								$("#fecha_realizada"+k).attr('disabled', true);
								if(Estatus_Fech_Real==0){
									$("#fecha_realizada"+k).val(Fech_Actual);
								}
							}else{
								$("#fecha_realizada"+k).attr('disabled', false);
								if(Estatus_Fech_Real==0){
									$("#fecha_realizada"+k).val(Fech_Actual);
								}
							}
							*/

							
							/*
							if(hoy>=fecha){
								
								$("#btn_guardar").attr('disabled', false);
								$("#Estatus_Realizado").val("1");
							}else{
									//Radios
									$("#radio_ok"+k).attr('disabled', true);
									$("#radio_fallo"+k).attr('disabled', true);
									$("#radio_no_aplica"+k).attr('disabled', true);
									$("#Valor_Medido"+k).attr('disabled', true);
									$("#upload_adjuntos"+k).attr('disabled', true);
									
									//Observaciones
									$("#observaciones"+k).attr('disabled', true);
									$("#fecha_realizada"+k).attr('disabled', true);
									$("#btn_guardar").attr('disabled', true);
							}
							*/
							
							
							//Fecha
							var nowTemp = new Date();
							var fec_sin_formato=moment(data.data_det[k].Fecha_Programada).format('YYYYMMDD');
							
							//De acuerdo al formato de datepicker se le resta un mes a la fecha programada
							fec_sin_formato=moment(fec_sin_formato).add(-1, 'month').format('YYYYMMDD');
							
							var FechProg_Date= new Date (fec_sin_formato.substring(0, 4), fec_sin_formato.substring(4, 6), fec_sin_formato.substring(6, 8), 0, 0, 0, 0);
							
							$('#fecha_realizada'+k).datepicker({
								format: 'dd/mm/yyyy',
								startDate: FechProg_Date,
								onRender: function(date) {
									return date.valueOf() < FechProg_Date.valueOf() ? 'disabled' : '';
								}
							});	
							//Fecha
						}
						
						
						
						//Si se han calificado los estatus de cada actividad ya sea ok, fallo, no aplica., mostrara el div de calificaciones
						if(cont_est_act==data.totalCountDetalle){
							/*
							$("#Estatus_Calif_Guardar").val("1");
							//Mostrar div Calificacion
							$("#div_calificacion").show();
							*/
							//Muestro boton formato
							$("#Btn_Formato").show();
						}else{
							/*
							//Ocultar div Calificacion 
							$("#div_calificacion").hide();
							*/
							//Muestro boton formato
							$("#Btn_Formato").hide();
						}
						
						
					}
                },
                error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
                }
            });
        }
    }
	
	
	//Vincular con Mesa de Ayuda
	Vincular_Mesa_de_Ayuda=function(Tipo_Actividad,Id_Actividad,Id_Det_Actividad, Nombre_Actividad, Valor_Referencia, Descripcion, Id_Activo, Usuario_Sistem_Activo, Nombre_Rutina, Frecuencia, DescCorta){
		var strDatos="";
		var Id_Solicitud_Correo="";
		var Desc_Motivo="";
		
		if(Tipo_Actividad!="3"){
			Desc_Motivo+="[Motivo del Servicio: "+Nombre_Rutina+"]";
			Desc_Motivo+=" [Frecuencia: "+Frecuencia+"]";
			Desc_Motivo+=" [Desc. Larga: "+DescCorta+"]";
		}else{
			Desc_Motivo+="[Nombre Rutina: "+Nombre_Rutina+"]";
			Desc_Motivo+=" [Frecuencia: "+Frecuencia+"]";
			Desc_Motivo+=" [Desc. Corta: "+DescCorta+"]";			
		}
		
		
		//Usuario Sesion
		var Id_Usuario=$("#usuariosesion").val();
		var Id_Area=$("#idareasesion").val();
		var Titulo=Descripcion;
		var Desc_Categoria=Valor_Referencia;
		var Subcategoria="";
		
		
		var Seccion="";
		var Id_Categoria="";
		//Tic
		if(Id_Area=="2"){
			Id_Categoria="9";
		
			//Mantenimiento-Predictivo
			if(Tipo_Actividad=="1"){
				//Titulo+=Nombre_Rutina;
				Subcategoria="88";
			}
			//Mantenimiento-Preventivo
			if(Tipo_Actividad=="2"){
				//Titulo+=Nombre_Rutina+"";
				Subcategoria="89";
			}
			//Mantenimiento-Correctivo
			if(Tipo_Actividad=="3"){
				//Titulo+=Nombre_Rutina;
				Subcategoria="90";
			}
			//Capacitaciones
			if(Tipo_Actividad=="4"){
				//Titulo+=Nombre_Rutina;
				Subcategoria="91";
			}
			
			//Soporte Tecnico
			Seccion="4";
		}else{
			//Biomedica
			if(Id_Area=="1"){
				//Soporte Tecnico
				Seccion="1";
				Id_Categoria="56";
				
				//Mantenimiento-Predictivo
				if(Tipo_Actividad=="1"){Subcategoria="317";}
				//Mantenimiento-Preventivo
				if(Tipo_Actividad=="2"){Subcategoria="318";}
				//Mantenimiento-Correctivo
				if(Tipo_Actividad=="3"){Subcategoria="316";}
				//Capacitaciones
				if(Tipo_Actividad=="4"){Subcategoria="315";}
			
			}
			
			//Mantenimiento
			if(Id_Area=="3"){
				//Soporte Tecnico
				Seccion="6";
				Id_Categoria="62";
				
				//Mantenimiento-Predictivo
				if(Tipo_Actividad=="1"){Subcategoria="1343";}
				//Mantenimiento-Preventivo
				if(Tipo_Actividad=="2"){Subcategoria="1344";}
				//Mantenimiento-Correctivo
				if(Tipo_Actividad=="3"){Subcategoria="1345";}
				//Capacitaciones
				if(Tipo_Actividad=="4"){Subcategoria="1346";}
			
			}
		}

		if(Usuario_Sistem_Activo!=""){
			strDatos = "Id_Usuario="+Usuario_Sistem_Activo;
		}else{
			strDatos = "Id_Usuario="+Id_Usuario;
		}
		strDatos += "&Id_Area="+Id_Area;
		strDatos += "&Seccion="+Seccion;
		strDatos += "&Titulo="+Desc_Motivo;
		strDatos += "&Desc_Motivo_Reporte="+Titulo;
		strDatos += "&Id_Categoria="+Id_Categoria;
		strDatos += "&Id_Subcategoria="+Subcategoria;
		strDatos += "&Desc_Categoria="+Desc_Categoria;
		strDatos += "&Prioridad=1";
		strDatos += "&Estatus_Proceso=1";
		strDatos += "&Id_Actividad="+Id_Actividad;
		strDatos += "&Id_Det_Actividad="+Id_Det_Actividad;
		//strDatos += "&Url_archivo="+Url_archivo;
		//strDatos += "&Url_archivo="+Foto;
		strDatos += "&Usr_Inser="+Id_Usuario;
		strDatos += "&Id_Activo="+Id_Activo;
		strDatos += "&Id_Medio=5"; //Web
		strDatos += "&Estatus_Reg=1";				
		strDatos += "&accion=guardar";
		
		$.ajax({
			type: "POST",
			url: "../fachadas/activos/siga_solicitud_tickets/Siga_solicitud_ticketsFacade.Class.php",        
			async: false,
			data: strDatos,
			dataType: "html",
			beforeSend: function (xhr) {
		
			},
			success: function (datos) {
				var json;
				json = eval("(" + datos + ")"); //Parsear JSON
				//mensajesalerta("&Eacute;xito", "Generado Correctamente.", "success", "dark");
				//Id_Solicitud_Correo=json.data[0].Id_Solicitud;
			},
			error: function () {
				mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
			}
		});
		
	}
	
	//Calificacion de la Rutina al dar click pasa la calificacion a los Texbox de tipo hidden
	guardaRespuestaP1=function(valor){
		$("#hddP1").val(valor);
	}
   
	guardaRespuestaP2=function(valor){
		$("#hddP2").val(valor);
	}
   
	guardaRespuestaP3=function(valor){
		$("#hddP3").val(valor);
	}
	
	
	//Limpiar Campos calificacion
	limpiar_campos_y_div_calif=function(){
		//Ocultar div Calificacion 
		$("#div_calificacion").hide();
		//Limpiamos el estatus para poder guardar la calificacion
		$("#Estatus_Calif_Guardar").val("");
		
		//Limpiar hiiden Id_Calififcacion
		$("#Id_Calififcacion").val("");
		//Limpiar campos calificacion 
		$("#hddP1").val("");
		$("#Solucion").val("");
		
		$("#hddP2").val("");
	    $("#Actitud").val("");
		
		$("#hddP3").val("");
		$("#TiempoRespuesta").val("");
		
		$("#faces-1-1").prop('checked', false); 
		$("#faces-1-2").prop('checked', false);
		$("#faces-1-3").prop('checked', false); 

		$("#faces-2-1").prop('checked', false); 
		$("#faces-2-2").prop('checked', false);
		$("#faces-2-3").prop('checked', false); 

		$("#faces-3-1").prop('checked', false); 
		$("#faces-3-2").prop('checked', false);
		$("#faces-3-3").prop('checked', false);
	}

	
	guardar_calificacion_actividades=function(Id_Actividad, Id_Calificacion, Cal_Sol_Ofrecida, Comen_Sol_Ofrecida, Cal_Act_Servicio, Comen_Act_Servicio, Cal_Tiem_Respusta, Comen_Tiem_Respuesta){
		//Usuario Logueado
		var Id_Usuario=$("#usuariosesion").val();
		strDatos = "Id_Actividad="+Id_Actividad;
		strDatos += "&Cal_Sol_Ofrecida="+Cal_Sol_Ofrecida; 
		strDatos += "&Comen_Sol_Ofrecida="+Comen_Sol_Ofrecida;
		strDatos += "&Cal_Act_Servicio="+Cal_Act_Servicio;
		strDatos += "&Comen_Act_Servicio="+Comen_Act_Servicio;
		strDatos += "&Cal_Tiem_Respusta="+Cal_Tiem_Respusta;
		strDatos += "&Comen_Tiem_Respuesta="+Comen_Tiem_Respuesta;
			
		if(Id_Calificacion.length <= 0){
			strDatos += "&Usr_Inser="+Id_Usuario;
			strDatos += "&Estatus_Reg=1";	
			strDatos += "&accion=guardar";
		}else{
			strDatos += "&Id_Calificacion="+Id_Calificacion;
			strDatos += "&Usr_Mod="+Id_Usuario;
			strDatos += "&Estatus_Reg=2";				
			strDatos += "&accion=guardar";
		}
		
		$.ajax({
			type: "POST",
			encoding:"UTF-8",
			url: "../fachadas/activos/siga_actividades_calificacion/Siga_actividades_calificacionFacade.Class.php",        
			async: false,
			data: strDatos,
			dataType: "html",
			beforeSend: function (xhr) {

			},
			success: function (data) {
				var data;
				data = eval("(" + data + ")");
				if(data.totalCount>0){
				
				}else{
					mensajesalerta("Oh No!", "Ocurrio un error al guardar la calificación.", "error", "dark");
				}
			},
			error: function () {
				mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
			}
		});
		
	}
	
	consultar_actividades_calif=function(Id_Actividad){
		
		if(Id_Actividad!=""){
			$.ajax({
				type: "POST",
				encoding:"UTF-8",
				url: "../fachadas/activos/siga_actividades_calificacion/Siga_actividades_calificacionFacade.Class.php",        
				async: false,
				data: {
					Estatus_Reg:"1",
					Id_Actividad:Id_Actividad,
					accion: "consultar"
				},
				dataType: "html",
				beforeSend: function (xhr) {

				},
				success: function (data) {
					var data;
					data = eval("(" + data + ")");
					if(data.totalCount>0){
						$("#Id_Calificacion").val(data.data[0].Id_Calificacion);
						$("#hddP1").val(data.data[0].Cal_Sol_Ofrecida);
						$("#Solucion").val(data.data[0].Comen_Sol_Ofrecida);
						$("#hddP2").val(data.data[0].Cal_Act_Servicio);
						$("#Actitud").val(data.data[0].Comen_Act_Servicio);
						$("#hddP3").val(data.data[0].Cal_Tiem_Respusta);
						$("#TiempoRespuesta").val(data.data[0].Comen_Tiem_Respuesta);
						
						if(data.data[0].Cal_Sol_Ofrecida==1){
							$("#faces-1-1").prop('checked', true); 
						}else{
							if(data.data[0].Cal_Sol_Ofrecida==2){
								$("#faces-1-2").prop('checked', true); 
							}else{
								if(data.data[0].Cal_Sol_Ofrecida==3){
									$("#faces-1-3").prop('checked', true); 
								}
							}	
						}
						
						if(data.data[0].Cal_Act_Servicio==1){
							$("#faces-2-1").prop('checked', true); 
						}else{
							if(data.data[0].Cal_Act_Servicio==2){
								$("#faces-2-2").prop('checked', true); 
							}else{
								if(data.data[0].Cal_Act_Servicio==3){
									$("#faces-2-3").prop('checked', true); 
								}
							}	
						}
						
						if(data.data[0].Cal_Tiem_Respusta==1){
							$("#faces-3-1").prop('checked', true); 
						}else{
							if(data.data[0].Cal_Tiem_Respusta==2){
								$("#faces-3-2").prop('checked', true); 
							}else{
								if(data.data[0].Cal_Tiem_Respusta==3){
									$("#faces-3-3").prop('checked', true); 
								}
							}	
						}
					}
				},
				error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
				}
			});
		}
	}

	
	function fecha_por_mes(Fecha){
		
	
	
		switch(mes) {
		case o:
			
			break;
		case n:
			
			break;
		}
	}
	
	//Al presionar el tab global, ejecuta esta funciion que a la vez forma la tabla en donde se muestran las actividades programadas y no programadas
	global_anterior=function(){
		
		var val_actual=$("#anio_global").val();
		if(val_actual!=""){
			val_actual=val_actual-1;
			$("#anio_global").val(val_actual);
			$("#li_anio_global").html(val_actual);
			global(val_actual);
		}
	}

	global_siguiente=function(){
		var val_actual=$("#anio_global").val();
		if(val_actual!=""){
			val_actual=parseInt(val_actual)+1;
			$("#anio_global").val(val_actual);
			$("#li_anio_global").html(val_actual);
			global(val_actual);
		}
	}
	

	global=function(val_actual=""){		
		
		anio_global_actual ="";
		if(val_actual==""){
			if($("#anio_global").val()==""){
				anio_global_actual = moment().year();
				$("#anio_global").val(anio_global_actual);
				$("#li_anio_global").html(anio_global_actual);
			}else{
				anio_global_actual =$("#anio_global").val();
			}
			
		}else{
			anio_global_actual =val_actual;
		}
		
		var Array_Param_G=[4];
		var Id_Area=$("#idareasesion").val();
		var cmbprogramadas=$("#cmbprogramadas").val();
		var cmbubicacionprim=$("#cmbubicacionprim").val();
		var cmbubicacionsec=$("#cmbubicacionsec").val();
		var cmbfamilia=$("#cmbfamilia").val();
		var cmbsubfamilia=$("#cmbsubfamilia").val();
		var usuarios=$.trim($("#select-usuarios").val());
		var Slc_Mostrar=$("#Slc_Mostrar").val();
		
		var Nombre_Rutina=$.trim($("#text_Nombre_Rutina").val());
		var Descripcion_Corta=$.trim($("#text_Descripcion_Corta").val());
		
		var $select_usuarios = $('#select-usuarios').selectize({});	
		var control3 = $select_usuarios[0].selectize;
		var Num_Empleado="";
		if(control3.items.length > 0){
			estatus=1;
			//Convertimos el array a String
			Num_Empleado=control3.items.toString();
		}else{
			Num_Empleado="";
		}
		
		var cmbclase=$("#cmbclase").val();
		var cmbclasificacion=$("#cmbclasificacion").val();
		
		if(cmbubicacionprim!="-1"){
			Array_Param_G[0]=cmbubicacionprim;
		}else{
			Array_Param_G[0]="";
		}
		
		if(cmbubicacionsec!="-1"){
			Array_Param_G[1]=cmbubicacionsec;
		}else{
			Array_Param_G[1]="";
		}
		
		if(cmbclase!="-1"){
			Array_Param_G[2]=cmbclase;
		}else{
			Array_Param_G[2]="";
		}
		
		if(cmbclasificacion!="-1"){
			Array_Param_G[3]=cmbclasificacion;
		}else{
			Array_Param_G[3]="";
		}
		
		Array_Param_G[4]=Num_Empleado;
		
		if(cmbprogramadas!="-1"){
			Array_Param_G[5]=cmbprogramadas;
		}else{
			Array_Param_G[5]="";
		}
		
		if(cmbfamilia!="-1"){
			Array_Param_G[6]=cmbfamilia;
		}else{
			Array_Param_G[6]="";
		}
		
		if(cmbsubfamilia!="-1"){
			Array_Param_G[7]=cmbsubfamilia;
		}else{
			Array_Param_G[7]="";
		}
		
		if(Nombre_Rutina!=""){
			Array_Param_G[8]=Nombre_Rutina;
		}else{
			Array_Param_G[8]="";
		}
		
		if(Descripcion_Corta!=""){
			Array_Param_G[9]=Descripcion_Corta;
		}else{
			Array_Param_G[9]="";
		}
		
		if(anio_global_actual!=""){

			$.ajax({
				type: "POST",
				encoding:"UTF-8",
				url: "../fachadas/activos/siga_actividades/Siga_actividadesFacade.Class.php",        
				async: true,
				data: {
					Array_Param_G:Array_Param_G,
					Tipo_Actividad:"2",
					Id_Area:Id_Area,
					Anio_Global:anio_global_actual,
					accion: "Actividades_Global"
				},
				dataType: "html",
				beforeSend: function (xhr) {
					jsShowWindowLoad("Por favor espere, buscando información");
				},
				success: function (data) {
					var data;
					data = eval("(" + data + ")");
					var tabla='';
					var tabla_excel='';
					var estatus_detalle=false;
					var div_realizado='<div style="background-color:#00a65a;">';
					var div_realizado_cerrar='</div>';
					var div_norealizados='<div style="background-color:#fa4848;color:#fa4848">...</div>';
						/*
						tabla_excel+='<table class="table table-bordered display table-striped table" id="tabla_excel_actividades" Style="display:none">';
						tabla_excel+='  <thead>';
						tabla_excel+='	<tr>';
						tabla_excel+='	  <th style="color:#fff;font-size:11px;" class="text-center">Usuario Responsable</th>';
						tabla_excel+='	  <th style="color:#fff;font-size:11px;" class="text-center">TIPO</th>';
						tabla_excel+='	  <th style="color:#fff;font-size:11px;" class="text-center">AF/BC</th>';
						tabla_excel+='	  <th style="color:#fff;font-size:11px;" class="text-center">EQUIPO</th>';
						tabla_excel+='	  <th style="color:#fff;font-size:11px;" class="text-center">ACTIVIDADES</th>';
						tabla_excel+='	  <th style="color:#fff;font-size:11px;" class="text-center">PERIODO</th>';
						tabla_excel+='	  <th colspan="24" style="color:#fff;font-size:11px;" class="text-center">MES</th>';
						tabla_excel+='	</tr>';
						tabla_excel+='  </thead>';
						tabla_excel+='  <tbody>';
						tabla_excel+='	<tr>';
						tabla_excel+='	  <td style="font-size:11px"  class="text-center"></td>';
						tabla_excel+='	  <td style="font-size:11px"  class="text-center"></td>';
						tabla_excel+='	  <td style="font-size:11px"  class="text-center"></td>';
						tabla_excel+='	  <td style="font-size:11px"  class="text-center"></td>';
						tabla_excel+='	  <td style="font-size:11px"  class="text-center"></td>';
						tabla_excel+='	  <td style="font-size:11px"  class="text-center"></td>';
						tabla_excel+='	  <td style="font-size:11px" colspan="2" class="text-center">Ene</td>';
						tabla_excel+='	  <td style="font-size:11px" colspan="2" class="text-center">Feb</td>';
						tabla_excel+='	  <td style="font-size:11px" colspan="2" class="text-center">Mar</td>';
						tabla_excel+='	  <td style="font-size:11px" colspan="2" class="text-center">Abr</td>';
						tabla_excel+='	  <td style="font-size:11px" colspan="2" class="text-center">May</td>';
						tabla_excel+='	  <td style="font-size:11px" colspan="2" class="text-center">Jun</td>';
						tabla_excel+='	  <td style="font-size:11px" colspan="2" class="text-center">Jul</td>';
						tabla_excel+='	  <td style="font-size:11px" colspan="2" class="text-center">Ago</td>';
						tabla_excel+='	  <td style="font-size:11px" colspan="2" class="text-center">Sep</td>';
						tabla_excel+='	  <td style="font-size:11px" colspan="2" class="text-center">Oct</td>';
						tabla_excel+='	  <td style="font-size:11px" colspan="2" class="text-center">Nov</td>';
						tabla_excel+='	  <td style="font-size:11px" colspan="2" class="text-center">Dic</td>';
						tabla_excel+='	</tr>';
						*/
						
						tabla+='<table class="table table-bordered display table-striped table">';
						tabla+='  <thead>';
						tabla+='	<tr>';
						tabla+='	  <th style="color:#fff;font-size:11px;" class="text-center">Usuario Responsable</th>';
						tabla+='	  <th style="color:#fff;font-size:11px;" class="text-center">REALIZA</th>';
						tabla+='	  <th style="color:#fff;font-size:11px;" class="text-center">AF/BC</th>';
						tabla+='	  <th style="color:#fff;font-size:11px;" class="text-center">EQUIPO</th>';
						tabla+='	  <th style="color:#fff;font-size:11px;" class="text-center">ACTIVIDADES</th>';
						tabla+='	  <th style="color:#fff;font-size:11px;" class="text-center">PERIODO</th>';
						tabla+='	  <th colspan="24" style="color:#fff;font-size:11px;" class="text-center">MES</th>';
						tabla+='	</tr>';
						tabla+='  </thead>';
						tabla+='  <tbody>';
						tabla+='	<tr>';
						tabla+='	  <td style="font-size:11px"  class="text-center"></td>';
						tabla+='	  <td style="font-size:11px"  class="text-center"></td>';
						tabla+='	  <td style="font-size:11px"  class="text-center"></td>';
						tabla+='	  <td style="font-size:11px"  class="text-center"></td>';
						tabla+='	  <td style="font-size:11px"  class="text-center"></td>';
						tabla+='	  <td style="font-size:11px"  class="text-center"></td>';
						tabla+='	  <td style="font-size:11px" colspan="2" class="text-center">Ene</td>';
						tabla+='	  <td style="font-size:11px" colspan="2" class="text-center">Feb</td>';
						tabla+='	  <td style="font-size:11px" colspan="2" class="text-center">Mar</td>';
						tabla+='	  <td style="font-size:11px" colspan="2" class="text-center">Abr</td>';
						tabla+='	  <td style="font-size:11px" colspan="2" class="text-center">May</td>';
						tabla+='	  <td style="font-size:11px" colspan="2" class="text-center">Jun</td>';
						tabla+='	  <td style="font-size:11px" colspan="2" class="text-center">Jul</td>';
						tabla+='	  <td style="font-size:11px" colspan="2" class="text-center">Ago</td>';
						tabla+='	  <td style="font-size:11px" colspan="2" class="text-center">Sep</td>';
						tabla+='	  <td style="font-size:11px" colspan="2" class="text-center">Oct</td>';
						tabla+='	  <td style="font-size:11px" colspan="2" class="text-center">Nov</td>';
						tabla+='	  <td style="font-size:11px" colspan="2" class="text-center">Dic</td>';
						tabla+='	</tr>';
						//Actividades sin Programar
						if(data.totalCountActsinProgramar>0){
							estatus_detalle=true;
							for(var k=0;k < data.totalCountActsinProgramar; k++){								
								
								tabla_excel+='	<tr onclick="pasar_activo('+data.dataActsinProgramar[k].Id_Activo+')">';
								tabla_excel+='	  <td style="font-size:11px;color:#e40b0b"><strong>'+data.dataActsinProgramar[k].Nombre_Completo+'</strong></td>';
								tabla_excel+='	  <td style="font-size:11px;color:#e40b0b"><strong></strong></td>';
								tabla_excel+='	  <td style="font-size:11px;color:#e40b0b"><strong>'+data.dataActsinProgramar[k].AF_BC+'</strong></td>';
								tabla_excel+='	  <td style="font-size:11px;color:#e40b0b" ><strong>'+data.dataActsinProgramar[k].Nombre_Activo+'</strong></td>';
								tabla_excel+='	  <td style="font-size:11px;color:#e40b0b" ><strong></strong></td>';
								tabla_excel+='	  <td style="font-size:11px;color:#e40b0b" ><strong></strong></td>';
								tabla_excel+='	  <td>P</td>';
								tabla_excel+='	  <td style="background-color:#f4f4f4;">R</td>';
								tabla_excel+='	  <td>P</td>';
								tabla_excel+='	  <td style="background-color:#f4f4f4;">R</td>';
								tabla_excel+='	  <td>P</td>';
								tabla_excel+='	  <td style="background-color:#f4f4f4;">R</td>';
								tabla_excel+='	  <td>P</td>';
								tabla_excel+='	  <td style="background-color:#f4f4f4;">R</td>';
								tabla_excel+='	  <td>P</td>';
								tabla_excel+='	  <td style="background-color:#f4f4f4;">R</td>';
								tabla_excel+='	  <td>P</td>';
								tabla_excel+='	  <td style="background-color:#f4f4f4;">R</td>';
								tabla_excel+='	  <td>P</td>';
								tabla_excel+='	  <td style="background-color:#f4f4f4;">R</td>';
								tabla_excel+='	  <td>P</td>';
								tabla_excel+='	  <td style="background-color:#f4f4f4;">R</td>';
								tabla_excel+='	  <td>P</td>';
								tabla_excel+='	  <td style="background-color:#f4f4f4;">R</td>';
								tabla_excel+='	  <td>P</td>';
								tabla_excel+='	  <td style="background-color:#f4f4f4;">R</td>';
								tabla_excel+='	  <td>P</td>';
								tabla_excel+='	  <td style="background-color:#f4f4f4;">R</td>';
								tabla_excel+='	  <td>P</td>';
								tabla_excel+='	  <td style="background-color:#f4f4f4;">R</td>';
								tabla_excel+='	</tr>';
								
								tabla+='	<tr onclick="pasar_activo('+data.dataActsinProgramar[k].Id_Activo+')">';
								tabla+='	  <td style="font-size:11px;color:#e40b0b"><strong>'+data.dataActsinProgramar[k].Nombre_Completo+'</strong></td>';
								tabla+='	  <td style="font-size:11px;color:#e40b0b"><strong></strong></td>';
								tabla+='	  <td style="font-size:11px;color:#e40b0b"><strong>'+data.dataActsinProgramar[k].AF_BC+'</strong></td>';
								tabla+='	  <td style="font-size:11px;color:#e40b0b" ><strong>'+data.dataActsinProgramar[k].Nombre_Activo+'</strong></td>';
								tabla+='	  <td style="font-size:11px;color:#e40b0b" ><strong></strong></td>';
								tabla+='	  <td style="font-size:11px;color:#e40b0b" ><strong></strong></td>';
								tabla+='	  <td>P</td>';
								tabla+='	  <td style="background-color:#f4f4f4;">R</td>';
								tabla+='	  <td>P</td>';
								tabla+='	  <td style="background-color:#f4f4f4;">R</td>';
								tabla+='	  <td>P</td>';
								tabla+='	  <td style="background-color:#f4f4f4;">R</td>';
								tabla+='	  <td>P</td>';
								tabla+='	  <td style="background-color:#f4f4f4;">R</td>';
								tabla+='	  <td>P</td>';
								tabla+='	  <td style="background-color:#f4f4f4;">R</td>';
								tabla+='	  <td>P</td>';
								tabla+='	  <td style="background-color:#f4f4f4;">R</td>';
								tabla+='	  <td>P</td>';
								tabla+='	  <td style="background-color:#f4f4f4;">R</td>';
								tabla+='	  <td>P</td>';
								tabla+='	  <td style="background-color:#f4f4f4;">R</td>';
								tabla+='	  <td>P</td>';
								tabla+='	  <td style="background-color:#f4f4f4;">R</td>';
								tabla+='	  <td>P</td>';
								tabla+='	  <td style="background-color:#f4f4f4;">R</td>';
								tabla+='	  <td>P</td>';
								tabla+='	  <td style="background-color:#f4f4f4;">R</td>';
								tabla+='	  <td>P</td>';
								tabla+='	  <td style="background-color:#f4f4f4;">R</td>';
								tabla+='	</tr>';
							}
						}
						//Actividades Programadas
						if(data.totalCount>0){
							estatus_detalle=true;
							for(var i=0;i < data.totalCount; i++){
								tabla+='	<tr>';
								tabla+='	  <td  style="font-size:11px;color:blue"><strong>'+data.data[i].Nombre_Completo+'</strong></td>';
								tabla+='	  <td  style="font-size:11px;color:blue"><strong>'+data.data[i].Realiza+'</strong></td>';
								tabla+='	  <td  style="font-size:11px;color:blue"><strong>'+data.data[i].AF_BC+'</strong></td>';
								tabla+='	  <td  style="font-size:11px;color:blue" ><strong>'+data.data[i].Nombre_Activo+'</strong></td>';
								tabla+='	  <td style="font-size:11px;color:#8B8B8E"><strong>';
								
								tabla+='	  	</strong>';
								tabla+='      </td>';
								tabla+='	  <td style="font-size:11px;color:blue" ><strong>'+data.data[i].Desc_Frecuencia+'</strong></td>';
								
								//Enero
								tabla+='	  <td>P<br>';tabla+='</td>';
								tabla+='	  <td style="background-color:#f4f4f4;">R<br>';tabla+='</td>';
								//Febrero
								tabla+='	  <td>P<br>';tabla+='</td>';
								tabla+='	  <td style="background-color:#f4f4f4;">R<br>';tabla+='</td>';
								//Marzo
								tabla+='	  <td>P<br>';tabla+='</td>';
								tabla+='	  <td style="background-color:#f4f4f4;">R<br>';tabla+='</td>';
								//Abril
								tabla+='	  <td>P<br>';tabla+='</td>';
								tabla+='	  <td style="background-color:#f4f4f4;">R<br>';tabla+='</td>';
								//Mayo
								tabla+='	  <td>P<br>';tabla+='</td>';
								tabla+='	  <td style="background-color:#f4f4f4;">R<br>';tabla+='</td>';
								//Junio
								tabla+='	  <td>P<br>';tabla+='</td>';
								tabla+='	  <td style="background-color:#f4f4f4;">R<br>';tabla+='</td>';
								//Julio
								tabla+='	  <td>P<br>';tabla+='</td>';
								tabla+='	  <td style="background-color:#f4f4f4;">R<br>';tabla+='</td>';
								//Agosto
								tabla+='	  <td>P<br>';tabla+='</td>';
								tabla+='	  <td style="background-color:#f4f4f4;">R<br>';tabla+='</td>';
								//Septimbre
								tabla+='	  <td>P<br>';tabla+='</td>';
								tabla+='	  <td style="background-color:#f4f4f4;">R<br>';tabla+='</td>';
								//Octubre
								tabla+='	  <td>P<br>';tabla+='</td>';
								tabla+='	  <td style="background-color:#f4f4f4;">R<br>';tabla+='</td>';
								//Noviembre
								tabla+='	  <td>P<br>';tabla+='</td>';
								tabla+='	  <td style="background-color:#f4f4f4;">R<br>';tabla+='</td>';
								//Diciembre
								tabla+='	  <td>P<br>';tabla+='</td>';
								tabla+='	  <td style="background-color:#f4f4f4;">R<br>';tabla+='</td>';
								tabla+='	</tr>';
								
								
								var Total_Actividades="";
								if(Slc_Mostrar==1){
									Total_Actividades=1;
								}else{
									Total_Actividades=data.data[i].Total_Actividades;
								}
								
								for(var j=0;j < Total_Actividades; j++){
									
									tabla+='	<tr>';
									tabla+='	  <td style="font-size:11px"></td>';
									tabla+='	  <td style="font-size:11px"></td>';
									tabla+='	  <td style="font-size:11px"></td>';
									tabla+='	  <td style="font-size:11px"></td>';
									tabla+='	  <td style="font-size:11px;color:#8B8B8E"><strong>'+data.data[i].Actividades[j].Num_Actividad+'-'+data.data[i].Actividades[j].Nombre_Actividad+'</strong></td>';
									tabla+='	  <td style="font-size:11px"></td>';
									//Enero
									tabla+='	  <td id="P1_'+data.data[i].Id_Activo+'_'+data.data[i].Actividades[j].Num_Actividad+'">';tabla+='</td>';
									tabla+='	  <td id="R1_'+data.data[i].Id_Activo+'_'+data.data[i].Actividades[j].Num_Actividad+'"style="background-color:#f4f4f4;">';tabla+='</td>';
									//Febrero
									tabla+='	  <td id="P2_'+data.data[i].Id_Activo+'_'+data.data[i].Actividades[j].Num_Actividad+'">';tabla+='</td>';
									tabla+='	  <td id="R2_'+data.data[i].Id_Activo+'_'+data.data[i].Actividades[j].Num_Actividad+'"style="background-color:#f4f4f4;">';tabla+='</td>';
									//Marzo
									tabla+='	  <td id="P3_'+data.data[i].Id_Activo+'_'+data.data[i].Actividades[j].Num_Actividad+'">';tabla+='</td>';
									tabla+='	  <td id="R3_'+data.data[i].Id_Activo+'_'+data.data[i].Actividades[j].Num_Actividad+'"style="background-color:#f4f4f4;">';tabla+='</td>';
									//Abril
									tabla+='	  <td id="P4_'+data.data[i].Id_Activo+'_'+data.data[i].Actividades[j].Num_Actividad+'">';tabla+='</td>';
									tabla+='	  <td id="R4_'+data.data[i].Id_Activo+'_'+data.data[i].Actividades[j].Num_Actividad+'"style="background-color:#f4f4f4;">';tabla+='</td>';
									//Mayo
									tabla+='	  <td id="P5_'+data.data[i].Id_Activo+'_'+data.data[i].Actividades[j].Num_Actividad+'">';tabla+='</td>';
									tabla+='	  <td id="R5_'+data.data[i].Id_Activo+'_'+data.data[i].Actividades[j].Num_Actividad+'"style="background-color:#f4f4f4;">';tabla+='</td>';
									//Junio
									tabla+='	  <td id="P6_'+data.data[i].Id_Activo+'_'+data.data[i].Actividades[j].Num_Actividad+'">';tabla+='</td>';
									tabla+='	  <td id="R6_'+data.data[i].Id_Activo+'_'+data.data[i].Actividades[j].Num_Actividad+'"style="background-color:#f4f4f4;">';tabla+='</td>';
									//Julio
									tabla+='	  <td id="P7_'+data.data[i].Id_Activo+'_'+data.data[i].Actividades[j].Num_Actividad+'">';tabla+='</td>';
									tabla+='	  <td id="R7_'+data.data[i].Id_Activo+'_'+data.data[i].Actividades[j].Num_Actividad+'"style="background-color:#f4f4f4;">';tabla+='</td>';
									//Agosto
									tabla+='	  <td id="P8_'+data.data[i].Id_Activo+'_'+data.data[i].Actividades[j].Num_Actividad+'">';tabla+='</td>';
									tabla+='	  <td id="R8_'+data.data[i].Id_Activo+'_'+data.data[i].Actividades[j].Num_Actividad+'"style="background-color:#f4f4f4;">';tabla+='</td>';
									//Septimbre
									tabla+='	  <td id="P9_'+data.data[i].Id_Activo+'_'+data.data[i].Actividades[j].Num_Actividad+'">';tabla+='</td>';
									tabla+='	  <td id="R9_'+data.data[i].Id_Activo+'_'+data.data[i].Actividades[j].Num_Actividad+'"style="background-color:#f4f4f4;">';tabla+='</td>';
									//Octubre
									tabla+='	  <td id="P10_'+data.data[i].Id_Activo+'_'+data.data[i].Actividades[j].Num_Actividad+'">';tabla+='</td>';
									tabla+='	  <td id="R10_'+data.data[i].Id_Activo+'_'+data.data[i].Actividades[j].Num_Actividad+'"style="background-color:#f4f4f4;">';tabla+='</td>';
									//Noviembre
									tabla+='	  <td><div id="P11_'+data.data[i].Id_Activo+'_'+data.data[i].Actividades[j].Num_Actividad+'">';tabla+='</div></td>';
									tabla+='	  <td id="R11_'+data.data[i].Id_Activo+'_'+data.data[i].Actividades[j].Num_Actividad+'"style="background-color:#f4f4f4;">';tabla+='</td>';
									//Diciembre
									tabla+='	  <td id="P12_'+data.data[i].Id_Activo+'_'+data.data[i].Actividades[j].Num_Actividad+'">';tabla+='</td>';
									tabla+='	  <td id="R12_'+data.data[i].Id_Activo+'_'+data.data[i].Actividades[j].Num_Actividad+'"style="background-color:#f4f4f4;">';tabla+='</td>';
									tabla+='	</tr>';
									
								}
								
								
								
								/*
								tabla+='	<tr>';
								tabla+='	  <td onclick="pasarvalores_full_calendar(\''+data.data[i].Id_Actividad+'\', \'3\', null)" style="font-size:11px;color:blue"><strong>'+data.data[i].Nombre_Completo+'</strong></td>';
								tabla+='	  <td onclick="pasarvalores_full_calendar(\''+data.data[i].Id_Actividad+'\', \'3\', null)" style="font-size:11px;color:blue"><strong>'+data.data[i].Realiza+'</strong></td>';
								tabla+='	  <td onclick="pasarvalores_full_calendar(\''+data.data[i].Id_Actividad+'\', \'3\', null)" style="font-size:11px;color:blue"><strong>'+data.data[i].AF_BC+'</strong></td>';
								tabla+='	  <td onclick="pasarvalores_full_calendar(\''+data.data[i].Id_Actividad+'\', \'3\', null)" style="font-size:11px;color:blue" ><strong>'+data.data[i].Nombre_Activo+'</strong></td>';
								tabla+='	  <td style="font-size:11px;color:#8B8B8E"><strong>'+data.data[i].Detalle_Activ[0].Num_Actividad+'-'+data.data[i].Detalle_Activ[0].Nombre_Actividad;
								
								tabla+='	  	</strong>';
								tabla+='      </td>';
								tabla+='	  <td onclick="pasarvalores_full_calendar(\''+data.data[i].Id_Actividad+'\', \'3\', null)" style="font-size:11px;color:blue" ><strong>'+data.data[i].Desc_Frecuencia+'</strong></td>';
								
								//Enero
								tabla+='	  <td onclick="pasarvalores_full_calendar(\''+data.data[i].Id_Actividad+'\', \'3\', null)">P<br>';if(data.data[i].Detalle_Activ[0].Fecha_Programada!=""){if(data.data[i].Detalle_Activ[0].Fecha_Programada.substring(4, 6)=="01"){tabla+=data.data[i].Detalle_Activ[0].Fecha_Programada.substring(6, 8)}}tabla+='</td>';
								tabla+='	  <td onclick="pasarvalores_full_calendar(\''+data.data[i].Id_Actividad+'\', \'3\', null)" style="background-color:#f4f4f4;">R<br>';if(data.data[i].Detalle_Activ[0].Fecha_Realizada!=""){if(data.data[i].Detalle_Activ[0].Fecha_Realizada.substring(4, 6)=="01"){tabla+='<div style="background-color:#00a65a;">'+data.data[i].Detalle_Activ[0].Fecha_Realizada.substring(6, 8)+'</div>';}}	if(data.data[i].Detalle_Activ[0].Fecha_Programada!=""){if(data.data[i].Detalle_Activ[0].Fecha_Programada.substring(4, 6)=="01"){if(data.data[i].Detalle_Activ[0].Fecha_Realizada==""){tabla+='<div style="background-color:#fa4848;color:#fa4848">...</div>';}}}tabla+='</td>';
								//Febrero
								tabla+='	  <td onclick="pasarvalores_full_calendar(\''+data.data[i].Id_Actividad+'\', \'3\', null)">P<br>';if(data.data[i].Detalle_Activ[0].Fecha_Programada!=""){if(data.data[i].Detalle_Activ[0].Fecha_Programada.substring(4, 6)=="02"){tabla+=data.data[i].Detalle_Activ[0].Fecha_Programada.substring(6, 8)}}tabla+='</td>';
								tabla+='	  <td onclick="pasarvalores_full_calendar(\''+data.data[i].Id_Actividad+'\', \'3\', null)" style="background-color:#f4f4f4;">R<br>';if(data.data[i].Detalle_Activ[0].Fecha_Realizada!=""){if(data.data[i].Detalle_Activ[0].Fecha_Realizada.substring(4, 6)=="02"){tabla+='<div style="background-color:#00a65a;">'+data.data[i].Detalle_Activ[0].Fecha_Realizada.substring(6, 8)+'</div>';}}	if(data.data[i].Detalle_Activ[0].Fecha_Programada!=""){if(data.data[i].Detalle_Activ[0].Fecha_Programada.substring(4, 6)=="02"){if(data.data[i].Detalle_Activ[0].Fecha_Realizada==""){tabla+='<div style="background-color:#fa4848;color:#fa4848">...</div>';}}}tabla+='</td>';
								//Marzo
								tabla+='	  <td onclick="pasarvalores_full_calendar(\''+data.data[i].Id_Actividad+'\', \'3\', null)">P<br>';if(data.data[i].Detalle_Activ[0].Fecha_Programada!=""){if(data.data[i].Detalle_Activ[0].Fecha_Programada.substring(4, 6)=="03"){tabla+=data.data[i].Detalle_Activ[0].Fecha_Programada.substring(6, 8)}}tabla+='</td>';
								tabla+='	  <td onclick="pasarvalores_full_calendar(\''+data.data[i].Id_Actividad+'\', \'3\', null)" style="background-color:#f4f4f4;">R<br>';if(data.data[i].Detalle_Activ[0].Fecha_Realizada!=""){if(data.data[i].Detalle_Activ[0].Fecha_Realizada.substring(4, 6)=="03"){tabla+='<div style="background-color:#00a65a;">'+data.data[i].Detalle_Activ[0].Fecha_Realizada.substring(6, 8)+'</div>';}}	if(data.data[i].Detalle_Activ[0].Fecha_Programada!=""){if(data.data[i].Detalle_Activ[0].Fecha_Programada.substring(4, 6)=="03"){if(data.data[i].Detalle_Activ[0].Fecha_Realizada==""){tabla+='<div style="background-color:#fa4848;color:#fa4848">...</div>';}}}tabla+='</td>';
								//Abril
								tabla+='	  <td onclick="pasarvalores_full_calendar(\''+data.data[i].Id_Actividad+'\', \'3\', null)">P<br>';if(data.data[i].Detalle_Activ[0].Fecha_Programada!=""){if(data.data[i].Detalle_Activ[0].Fecha_Programada.substring(4, 6)=="04"){tabla+=data.data[i].Detalle_Activ[0].Fecha_Programada.substring(6, 8)}}tabla+='</td>';
								tabla+='	  <td onclick="pasarvalores_full_calendar(\''+data.data[i].Id_Actividad+'\', \'3\', null)" style="background-color:#f4f4f4;">R<br>';if(data.data[i].Detalle_Activ[0].Fecha_Realizada!=""){if(data.data[i].Detalle_Activ[0].Fecha_Realizada.substring(4, 6)=="04"){tabla+='<div style="background-color:#00a65a;">'+data.data[i].Detalle_Activ[0].Fecha_Realizada.substring(6, 8)+'</div>';}}	if(data.data[i].Detalle_Activ[0].Fecha_Programada!=""){if(data.data[i].Detalle_Activ[0].Fecha_Programada.substring(4, 6)=="04"){if(data.data[i].Detalle_Activ[0].Fecha_Realizada==""){tabla+='<div style="background-color:#fa4848;color:#fa4848">...</div>';}}}tabla+='</td>';
								//Mayo
								tabla+='	  <td onclick="pasarvalores_full_calendar(\''+data.data[i].Id_Actividad+'\', \'3\', null)">P<br>';if(data.data[i].Detalle_Activ[0].Fecha_Programada!=""){if(data.data[i].Detalle_Activ[0].Fecha_Programada.substring(4, 6)=="05"){tabla+=data.data[i].Detalle_Activ[0].Fecha_Programada.substring(6, 8)}}tabla+='</td>';
								tabla+='	  <td onclick="pasarvalores_full_calendar(\''+data.data[i].Id_Actividad+'\', \'3\', null)" style="background-color:#f4f4f4;">R<br>';if(data.data[i].Detalle_Activ[0].Fecha_Realizada!=""){if(data.data[i].Detalle_Activ[0].Fecha_Realizada.substring(4, 6)=="05"){tabla+='<div style="background-color:#00a65a;">'+data.data[i].Detalle_Activ[0].Fecha_Realizada.substring(6, 8)+'</div>';}}	if(data.data[i].Detalle_Activ[0].Fecha_Programada!=""){if(data.data[i].Detalle_Activ[0].Fecha_Programada.substring(4, 6)=="05"){if(data.data[i].Detalle_Activ[0].Fecha_Realizada==""){tabla+='<div style="background-color:#fa4848;color:#fa4848">...</div>';}}}tabla+='</td>';
								//Junio
								tabla+='	  <td onclick="pasarvalores_full_calendar(\''+data.data[i].Id_Actividad+'\', \'3\', null)">P<br>';if(data.data[i].Detalle_Activ[0].Fecha_Programada!=""){if(data.data[i].Detalle_Activ[0].Fecha_Programada.substring(4, 6)=="06"){tabla+=data.data[i].Detalle_Activ[0].Fecha_Programada.substring(6, 8)}}tabla+='</td>';
								tabla+='	  <td onclick="pasarvalores_full_calendar(\''+data.data[i].Id_Actividad+'\', \'3\', null)" style="background-color:#f4f4f4;">R<br>';if(data.data[i].Detalle_Activ[0].Fecha_Realizada!=""){if(data.data[i].Detalle_Activ[0].Fecha_Realizada.substring(4, 6)=="06"){tabla+='<div style="background-color:#00a65a;">'+data.data[i].Detalle_Activ[0].Fecha_Realizada.substring(6, 8)+'</div>';}}	if(data.data[i].Detalle_Activ[0].Fecha_Programada!=""){if(data.data[i].Detalle_Activ[0].Fecha_Programada.substring(4, 6)=="06"){if(data.data[i].Detalle_Activ[0].Fecha_Realizada==""){tabla+='<div style="background-color:#fa4848;color:#fa4848">...</div>';}}}tabla+='</td>';
								//Julio
								tabla+='	  <td onclick="pasarvalores_full_calendar(\''+data.data[i].Id_Actividad+'\', \'3\', null)">P<br>';if(data.data[i].Detalle_Activ[0].Fecha_Programada!=""){if(data.data[i].Detalle_Activ[0].Fecha_Programada.substring(4, 6)=="07"){tabla+=data.data[i].Detalle_Activ[0].Fecha_Programada.substring(6, 8)}}tabla+='</td>';
								tabla+='	  <td onclick="pasarvalores_full_calendar(\''+data.data[i].Id_Actividad+'\', \'3\', null)" style="background-color:#f4f4f4;">R<br>';if(data.data[i].Detalle_Activ[0].Fecha_Realizada!=""){if(data.data[i].Detalle_Activ[0].Fecha_Realizada.substring(4, 6)=="07"){tabla+='<div style="background-color:#00a65a;">'+data.data[i].Detalle_Activ[0].Fecha_Realizada.substring(6, 8)+'</div>';}}	if(data.data[i].Detalle_Activ[0].Fecha_Programada!=""){if(data.data[i].Detalle_Activ[0].Fecha_Programada.substring(4, 6)=="07"){if(data.data[i].Detalle_Activ[0].Fecha_Realizada==""){tabla+='<div style="background-color:#fa4848;color:#fa4848">...</div>';}}}tabla+='</td>';
								//Agosto
								tabla+='	  <td onclick="pasarvalores_full_calendar(\''+data.data[i].Id_Actividad+'\', \'3\', null)">P<br>';if(data.data[i].Detalle_Activ[0].Fecha_Programada!=""){if(data.data[i].Detalle_Activ[0].Fecha_Programada.substring(4, 6)=="08"){tabla+=data.data[i].Detalle_Activ[0].Fecha_Programada.substring(6, 8)}}tabla+='</td>';
								tabla+='	  <td onclick="pasarvalores_full_calendar(\''+data.data[i].Id_Actividad+'\', \'3\', null)" style="background-color:#f4f4f4;">R<br>';if(data.data[i].Detalle_Activ[0].Fecha_Realizada!=""){if(data.data[i].Detalle_Activ[0].Fecha_Realizada.substring(4, 6)=="08"){tabla+='<div style="background-color:#00a65a;">'+data.data[i].Detalle_Activ[0].Fecha_Realizada.substring(6, 8)+'</div>';}}	if(data.data[i].Detalle_Activ[0].Fecha_Programada!=""){if(data.data[i].Detalle_Activ[0].Fecha_Programada.substring(4, 6)=="08"){if(data.data[i].Detalle_Activ[0].Fecha_Realizada==""){tabla+='<div style="background-color:#fa4848;color:#fa4848">...</div>';}}}tabla+='</td>';
								//Septimbre
								tabla+='	  <td onclick="pasarvalores_full_calendar(\''+data.data[i].Id_Actividad+'\', \'3\', null)">P<br>';if(data.data[i].Detalle_Activ[0].Fecha_Programada!=""){if(data.data[i].Detalle_Activ[0].Fecha_Programada.substring(4, 6)=="09"){tabla+=data.data[i].Detalle_Activ[0].Fecha_Programada.substring(6, 8)}}tabla+='</td>';
								tabla+='	  <td onclick="pasarvalores_full_calendar(\''+data.data[i].Id_Actividad+'\', \'3\', null)" style="background-color:#f4f4f4;">R<br>';if(data.data[i].Detalle_Activ[0].Fecha_Realizada!=""){if(data.data[i].Detalle_Activ[0].Fecha_Realizada.substring(4, 6)=="09"){tabla+='<div style="background-color:#00a65a;">'+data.data[i].Detalle_Activ[0].Fecha_Realizada.substring(6, 8)+'</div>';}}	if(data.data[i].Detalle_Activ[0].Fecha_Programada!=""){if(data.data[i].Detalle_Activ[0].Fecha_Programada.substring(4, 6)=="09"){if(data.data[i].Detalle_Activ[0].Fecha_Realizada==""){tabla+='<div style="background-color:#fa4848;color:#fa4848">...</div>';}}}tabla+='</td>';
								//Octubre
								tabla+='	  <td onclick="pasarvalores_full_calendar(\''+data.data[i].Id_Actividad+'\', \'3\', null)">P<br>';if(data.data[i].Detalle_Activ[0].Fecha_Programada!=""){if(data.data[i].Detalle_Activ[0].Fecha_Programada.substring(4, 6)=="10"){tabla+=data.data[i].Detalle_Activ[0].Fecha_Programada.substring(6, 8)}}tabla+='</td>';							
								tabla+='	  <td onclick="pasarvalores_full_calendar(\''+data.data[i].Id_Actividad+'\', \'3\', null)" style="background-color:#f4f4f4;">R<br>';if(data.data[i].Detalle_Activ[0].Fecha_Realizada!=""){if(data.data[i].Detalle_Activ[0].Fecha_Realizada.substring(4, 6)=="10"){tabla+='<div style="background-color:#00a65a;">'+data.data[i].Detalle_Activ[0].Fecha_Realizada.substring(6, 8)+'</div>';}}	if(data.data[i].Detalle_Activ[0].Fecha_Programada!=""){if(data.data[i].Detalle_Activ[0].Fecha_Programada.substring(4, 6)=="10"){if(data.data[i].Detalle_Activ[0].Fecha_Realizada==""){tabla+='<div style="background-color:#fa4848;color:#fa4848">...</div>';}}}tabla+='</td>';
								//Noviembre
								tabla+='	  <td onclick="pasarvalores_full_calendar(\''+data.data[i].Id_Actividad+'\', \'3\', null)">P<br>';if(data.data[i].Detalle_Activ[0].Fecha_Programada!=""){if(data.data[i].Detalle_Activ[0].Fecha_Programada.substring(4, 6)=="11"){tabla+=data.data[i].Detalle_Activ[0].Fecha_Programada.substring(6, 8)}}tabla+='</td>';
								tabla+='	  <td onclick="pasarvalores_full_calendar(\''+data.data[i].Id_Actividad+'\', \'3\', null)" style="background-color:#f4f4f4;">R<br>';if(data.data[i].Detalle_Activ[0].Fecha_Realizada!=""){if(data.data[i].Detalle_Activ[0].Fecha_Realizada.substring(4, 6)=="11"){tabla+='<div style="background-color:#00a65a;">'+data.data[i].Detalle_Activ[0].Fecha_Realizada.substring(6, 8)+'</div>';}} if(data.data[i].Detalle_Activ[0].Fecha_Programada!=""){if(data.data[i].Detalle_Activ[0].Fecha_Programada.substring(4, 6)=="11"){if(data.data[i].Detalle_Activ[0].Fecha_Realizada==""){tabla+='<div style="background-color:#fa4848;color:#fa4848">...</div>';}}}tabla+='</td>';
								//Diciembre
								tabla+='	  <td onclick="pasarvalores_full_calendar(\''+data.data[i].Id_Actividad+'\', \'3\', null)">P<br>';if(data.data[i].Detalle_Activ[0].Fecha_Programada!=""){if(data.data[i].Detalle_Activ[0].Fecha_Programada.substring(4, 6)=="12"){tabla+=data.data[i].Detalle_Activ[0].Fecha_Programada.substring(6, 8)}}tabla+='</td>';
								tabla+='	  <td onclick="pasarvalores_full_calendar(\''+data.data[i].Id_Actividad+'\', \'3\', null)" style="background-color:#f4f4f4;">R<br>';if(data.data[i].Detalle_Activ[0].Fecha_Realizada!=""){if(data.data[i].Detalle_Activ[0].Fecha_Realizada.substring(4, 6)=="12"){tabla+='<div style="background-color:#00a65a;">'+data.data[i].Detalle_Activ[0].Fecha_Realizada.substring(6, 8)+'</div>';}} if(data.data[i].Detalle_Activ[0].Fecha_Programada!=""){if(data.data[i].Detalle_Activ[0].Fecha_Programada.substring(4, 6)=="12"){if(data.data[i].Detalle_Activ[0].Fecha_Realizada==""){tabla+='<div style="background-color:#fa4848;color:#fa4848">...</div>';}}}tabla+='</td>';
								tabla+='	</tr>';
								
								*/
								/*
								for(var j=1;j < data.data[i].totalCount; j++){
									
									tabla+='	<tr id="'+data.data[i].Id_Actividad+'-'+j+'" style="display:none">';
									tabla+='	  <td style="font-size:11px"></td>';
									tabla+='	  <td style="font-size:11px"></td>';
									tabla+='	  <td style="font-size:11px"></td>';
									tabla+='	  <td style="font-size:11px"></td>';
									tabla+='	  <td style="font-size:11px;color:#8B8B8E"><strong>'+data.data[i].Detalle_Activ[j].Num_Actividad+'-'+data.data[i].Detalle_Activ[j].Nombre_Actividad+'</strong></td>';
									tabla+='	  <td style="font-size:11px"></td>';
									//Enero
									tabla+='	  <td>';if(data.data[i].Detalle_Activ[j].Fecha_Programada!=""){if(data.data[i].Detalle_Activ[j].Fecha_Programada.substring(4, 6)=="01"){tabla+=data.data[i].Detalle_Activ[j].Fecha_Programada.substring(6, 8)}}tabla+='</td>';
									tabla+='	  <td style="background-color:#f4f4f4;">';if(data.data[i].Detalle_Activ[j].Fecha_Realizada!=""){if(data.data[i].Detalle_Activ[j].Fecha_Realizada.substring(4, 6)=="01"){tabla+='<div style="background-color:#00a65a;">'+data.data[i].Detalle_Activ[j].Fecha_Realizada.substring(6, 8)+'</div>';}}	if(data.data[i].Detalle_Activ[j].Fecha_Programada!=""){if(data.data[i].Detalle_Activ[j].Fecha_Programada.substring(4, 6)=="01"){if(data.data[i].Detalle_Activ[j].Fecha_Realizada==""){tabla+='<div style="background-color:#fa4848;color:#fa4848">...</div>';}}}tabla+='</td>';
									//Febrero
									tabla+='	  <td>';if(data.data[i].Detalle_Activ[j].Fecha_Programada!=""){if(data.data[i].Detalle_Activ[j].Fecha_Programada.substring(4, 6)=="02"){tabla+=data.data[i].Detalle_Activ[j].Fecha_Programada.substring(6, 8)}}tabla+='</td>';
									tabla+='	  <td style="background-color:#f4f4f4;">';if(data.data[i].Detalle_Activ[j].Fecha_Realizada!=""){if(data.data[i].Detalle_Activ[j].Fecha_Realizada.substring(4, 6)=="02"){tabla+='<div style="background-color:#00a65a;">'+data.data[i].Detalle_Activ[j].Fecha_Realizada.substring(6, 8)+'</div>';}}	if(data.data[i].Detalle_Activ[j].Fecha_Programada!=""){if(data.data[i].Detalle_Activ[j].Fecha_Programada.substring(4, 6)=="02"){if(data.data[i].Detalle_Activ[j].Fecha_Realizada==""){tabla+='<div style="background-color:#fa4848;color:#fa4848">...</div>';}}}tabla+='</td>';
									//Marzo
									tabla+='	  <td>';if(data.data[i].Detalle_Activ[j].Fecha_Programada!=""){if(data.data[i].Detalle_Activ[j].Fecha_Programada.substring(4, 6)=="03"){tabla+=data.data[i].Detalle_Activ[j].Fecha_Programada.substring(6, 8)}}tabla+='</td>';
									tabla+='	  <td style="background-color:#f4f4f4;">';if(data.data[i].Detalle_Activ[j].Fecha_Realizada!=""){if(data.data[i].Detalle_Activ[j].Fecha_Realizada.substring(4, 6)=="03"){tabla+='<div style="background-color:#00a65a;">'+data.data[i].Detalle_Activ[j].Fecha_Realizada.substring(6, 8)+'</div>';}}	if(data.data[i].Detalle_Activ[j].Fecha_Programada!=""){if(data.data[i].Detalle_Activ[j].Fecha_Programada.substring(4, 6)=="03"){if(data.data[i].Detalle_Activ[j].Fecha_Realizada==""){tabla+='<div style="background-color:#fa4848;color:#fa4848">...</div>';}}}tabla+='</td>';
									//Abril
									tabla+='	  <td>';if(data.data[i].Detalle_Activ[j].Fecha_Programada!=""){if(data.data[i].Detalle_Activ[j].Fecha_Programada.substring(4, 6)=="04"){tabla+=data.data[i].Detalle_Activ[j].Fecha_Programada.substring(6, 8)}}tabla+='</td>';
									tabla+='	  <td style="background-color:#f4f4f4;">';if(data.data[i].Detalle_Activ[j].Fecha_Realizada!=""){if(data.data[i].Detalle_Activ[j].Fecha_Realizada.substring(4, 6)=="04"){tabla+='<div style="background-color:#00a65a;">'+data.data[i].Detalle_Activ[j].Fecha_Realizada.substring(6, 8)+'</div>';}}	if(data.data[i].Detalle_Activ[j].Fecha_Programada!=""){if(data.data[i].Detalle_Activ[j].Fecha_Programada.substring(4, 6)=="04"){if(data.data[i].Detalle_Activ[j].Fecha_Realizada==""){tabla+='<div style="background-color:#fa4848;color:#fa4848">...</div>';}}}tabla+='</td>';
									//Mayo
									tabla+='	  <td>';if(data.data[i].Detalle_Activ[j].Fecha_Programada!=""){if(data.data[i].Detalle_Activ[j].Fecha_Programada.substring(4, 6)=="05"){tabla+=data.data[i].Detalle_Activ[j].Fecha_Programada.substring(6, 8)}}tabla+='</td>';
									tabla+='	  <td style="background-color:#f4f4f4;">';if(data.data[i].Detalle_Activ[j].Fecha_Realizada!=""){if(data.data[i].Detalle_Activ[j].Fecha_Realizada.substring(4, 6)=="05"){tabla+='<div style="background-color:#00a65a;">'+data.data[i].Detalle_Activ[j].Fecha_Realizada.substring(6, 8)+'</div>';}}	if(data.data[i].Detalle_Activ[j].Fecha_Programada!=""){if(data.data[i].Detalle_Activ[j].Fecha_Programada.substring(4, 6)=="05"){if(data.data[i].Detalle_Activ[j].Fecha_Realizada==""){tabla+='<div style="background-color:#fa4848;color:#fa4848">...</div>';}}}tabla+='</td>';
									//Junio
									tabla+='	  <td>';if(data.data[i].Detalle_Activ[j].Fecha_Programada!=""){if(data.data[i].Detalle_Activ[j].Fecha_Programada.substring(4, 6)=="06"){tabla+=data.data[i].Detalle_Activ[j].Fecha_Programada.substring(6, 8)}}tabla+='</td>';
									tabla+='	  <td style="background-color:#f4f4f4;">';if(data.data[i].Detalle_Activ[j].Fecha_Realizada!=""){if(data.data[i].Detalle_Activ[j].Fecha_Realizada.substring(4, 6)=="06"){tabla+='<div style="background-color:#00a65a;">'+data.data[i].Detalle_Activ[j].Fecha_Realizada.substring(6, 8)+'</div>';}}	if(data.data[i].Detalle_Activ[j].Fecha_Programada!=""){if(data.data[i].Detalle_Activ[j].Fecha_Programada.substring(4, 6)=="06"){if(data.data[i].Detalle_Activ[j].Fecha_Realizada==""){tabla+='<div style="background-color:#fa4848;color:#fa4848">...</div>';}}}tabla+='</td>';
									//Julio
									tabla+='	  <td>';if(data.data[i].Detalle_Activ[j].Fecha_Programada!=""){if(data.data[i].Detalle_Activ[j].Fecha_Programada.substring(4, 6)=="07"){tabla+=data.data[i].Detalle_Activ[j].Fecha_Programada.substring(6, 8)}}tabla+='</td>';
									tabla+='	  <td style="background-color:#f4f4f4;">';if(data.data[i].Detalle_Activ[j].Fecha_Realizada!=""){if(data.data[i].Detalle_Activ[j].Fecha_Realizada.substring(4, 6)=="07"){tabla+='<div style="background-color:#00a65a;">'+data.data[i].Detalle_Activ[j].Fecha_Realizada.substring(6, 8)+'</div>';}}	if(data.data[i].Detalle_Activ[j].Fecha_Programada!=""){if(data.data[i].Detalle_Activ[j].Fecha_Programada.substring(4, 6)=="07"){if(data.data[i].Detalle_Activ[j].Fecha_Realizada==""){tabla+='<div style="background-color:#fa4848;color:#fa4848">...</div>';}}}tabla+='</td>';
									//Agosto
									tabla+='	  <td>';if(data.data[i].Detalle_Activ[j].Fecha_Programada!=""){if(data.data[i].Detalle_Activ[j].Fecha_Programada.substring(4, 6)=="08"){tabla+=data.data[i].Detalle_Activ[j].Fecha_Programada.substring(6, 8)}}tabla+='</td>';
									tabla+='	  <td style="background-color:#f4f4f4;">';if(data.data[i].Detalle_Activ[j].Fecha_Realizada!=""){if(data.data[i].Detalle_Activ[j].Fecha_Realizada.substring(4, 6)=="08"){tabla+='<div style="background-color:#00a65a;">'+data.data[i].Detalle_Activ[j].Fecha_Realizada.substring(6, 8)+'</div>';}}	if(data.data[i].Detalle_Activ[j].Fecha_Programada!=""){if(data.data[i].Detalle_Activ[j].Fecha_Programada.substring(4, 6)=="08"){if(data.data[i].Detalle_Activ[j].Fecha_Realizada==""){tabla+='<div style="background-color:#fa4848;color:#fa4848">...</div>';}}}tabla+='</td>';
									//Septimbre
									tabla+='	  <td>';if(data.data[i].Detalle_Activ[j].Fecha_Programada!=""){if(data.data[i].Detalle_Activ[j].Fecha_Programada.substring(4, 6)=="09"){tabla+=data.data[i].Detalle_Activ[j].Fecha_Programada.substring(6, 8)}}tabla+='</td>';
									tabla+='	  <td style="background-color:#f4f4f4;">';if(data.data[i].Detalle_Activ[j].Fecha_Realizada!=""){if(data.data[i].Detalle_Activ[j].Fecha_Realizada.substring(4, 6)=="09"){tabla+='<div style="background-color:#00a65a;">'+data.data[i].Detalle_Activ[j].Fecha_Realizada.substring(6, 8)+'</div>';}}	if(data.data[i].Detalle_Activ[j].Fecha_Programada!=""){if(data.data[i].Detalle_Activ[j].Fecha_Programada.substring(4, 6)=="09"){if(data.data[i].Detalle_Activ[j].Fecha_Realizada==""){tabla+='<div style="background-color:#fa4848;color:#fa4848">...</div>';}}}tabla+='</td>';
									//Octubre
									tabla+='	  <td>';if(data.data[i].Detalle_Activ[j].Fecha_Programada!=""){if(data.data[i].Detalle_Activ[j].Fecha_Programada.substring(4, 6)=="10"){tabla+=data.data[i].Detalle_Activ[j].Fecha_Programada.substring(6, 8)}}tabla+='</td>';							
									tabla+='	  <td style="background-color:#f4f4f4;">';if(data.data[i].Detalle_Activ[j].Fecha_Realizada!=""){if(data.data[i].Detalle_Activ[j].Fecha_Realizada.substring(4, 6)=="10"){tabla+='<div style="background-color:#00a65a;">'+data.data[i].Detalle_Activ[j].Fecha_Realizada.substring(6, 8)+'</div>';}}	if(data.data[i].Detalle_Activ[j].Fecha_Programada!=""){if(data.data[i].Detalle_Activ[j].Fecha_Programada.substring(4, 6)=="10"){if(data.data[i].Detalle_Activ[j].Fecha_Realizada==""){tabla+='<div style="background-color:#fa4848;color:#fa4848">...</div>';}}}tabla+='</td>';
									//Noviembre
									tabla+='	  <td>';if(data.data[i].Detalle_Activ[j].Fecha_Programada!=""){if(data.data[i].Detalle_Activ[j].Fecha_Programada.substring(4, 6)=="11"){tabla+=data.data[i].Detalle_Activ[j].Fecha_Programada.substring(6, 8)}}tabla+='</td>';
									tabla+='	  <td style="background-color:#f4f4f4;">';if(data.data[i].Detalle_Activ[j].Fecha_Realizada!=""){if(data.data[i].Detalle_Activ[j].Fecha_Realizada.substring(4, 6)=="11"){tabla+='<div style="background-color:#00a65a;">'+data.data[i].Detalle_Activ[j].Fecha_Realizada.substring(6, 8)+'</div>';}}  if(data.data[i].Detalle_Activ[j].Fecha_Programada!=""){if(data.data[i].Detalle_Activ[j].Fecha_Programada.substring(4, 6)=="11"){if(data.data[i].Detalle_Activ[j].Fecha_Realizada==""){tabla+='<div style="background-color:#fa4848;color:#fa4848">...</div>';}}}tabla+='</td>';
									//Diciembre
									tabla+='	  <td>';if(data.data[i].Detalle_Activ[j].Fecha_Programada!=""){if(data.data[i].Detalle_Activ[j].Fecha_Programada.substring(4, 6)=="12"){tabla+=data.data[i].Detalle_Activ[j].Fecha_Programada.substring(6, 8)}}tabla+='</td>';
									tabla+='	  <td style="background-color:#f4f4f4;">';if(data.data[i].Detalle_Activ[j].Fecha_Realizada!=""){if(data.data[i].Detalle_Activ[j].Fecha_Realizada.substring(4, 6)=="12"){tabla+='<div style="background-color:#00a65a;">'+data.data[i].Detalle_Activ[j].Fecha_Realizada.substring(6, 8)+'</div>';}}  if(data.data[i].Detalle_Activ[j].Fecha_Programada!=""){if(data.data[i].Detalle_Activ[j].Fecha_Programada.substring(4, 6)=="12"){if(data.data[i].Detalle_Activ[j].Fecha_Realizada==""){tabla+='<div style="background-color:#fa4848;color:#fa4848">...</div>';}}}tabla+='</td>';
									tabla+='	</tr>';
								}
								*/
							}
						}
						//No se encontraron Resultados
						if(estatus_detalle==false){
							tabla_excel+='	<tr>';
								tabla_excel+='	  <td style="font-size:14px;color:blue" colspan="29" class="text-center"><strong>No se Encontraron Registros</strong></td>';
							tabla_excel+='	</tr>';
							
							tabla+='	<tr>';
								tabla+='	  <td style="font-size:14px;color:blue" colspan="29" class="text-center"><strong>No se Encontraron Registros</strong></td>';
							tabla+='	</tr>';
						}
						tabla_excel+='  </tbody>';
						tabla_excel+='</table>';
						
						tabla+='  </tbody>';
						tabla+='</table>';

						$("#tabla_Global").html(tabla);


						if(data.totalCount>0){
							for(var m=0;m < data.totalCount; m++){
								for(var n=0;n < data.data[m].Total_Actividades_Detalle; n++){
									if(data.data[m].Actividades_Detalle[n].Fecha_Programada!=""){
										if(data.data[m].Actividades_Detalle[n].Fecha_Programada.substring(4, 6)=="01"){progr_no_realizados('1', data.data[m].Id_Activo, data.data[m].Actividades_Detalle[n].Num_Actividad, data.data[m].Actividades_Detalle[n].Fecha_Programada.substring(6, 8), data.data[m].Actividades_Detalle[n].Fecha_Realizada);}

										if(data.data[m].Actividades_Detalle[n].Fecha_Programada.substring(4, 6)=="02"){progr_no_realizados('2', data.data[m].Id_Activo, data.data[m].Actividades_Detalle[n].Num_Actividad, data.data[m].Actividades_Detalle[n].Fecha_Programada.substring(6, 8), data.data[m].Actividades_Detalle[n].Fecha_Realizada);}

										if(data.data[m].Actividades_Detalle[n].Fecha_Programada.substring(4, 6)=="03"){progr_no_realizados('3', data.data[m].Id_Activo, data.data[m].Actividades_Detalle[n].Num_Actividad, data.data[m].Actividades_Detalle[n].Fecha_Programada.substring(6, 8), data.data[m].Actividades_Detalle[n].Fecha_Realizada);}

										if(data.data[m].Actividades_Detalle[n].Fecha_Programada.substring(4, 6)=="04"){progr_no_realizados('4', data.data[m].Id_Activo, data.data[m].Actividades_Detalle[n].Num_Actividad, data.data[m].Actividades_Detalle[n].Fecha_Programada.substring(6, 8), data.data[m].Actividades_Detalle[n].Fecha_Realizada);}

										if(data.data[m].Actividades_Detalle[n].Fecha_Programada.substring(4, 6)=="05"){progr_no_realizados('5', data.data[m].Id_Activo, data.data[m].Actividades_Detalle[n].Num_Actividad, data.data[m].Actividades_Detalle[n].Fecha_Programada.substring(6, 8), data.data[m].Actividades_Detalle[n].Fecha_Realizada);}

										if(data.data[m].Actividades_Detalle[n].Fecha_Programada.substring(4, 6)=="06"){progr_no_realizados('6', data.data[m].Id_Activo, data.data[m].Actividades_Detalle[n].Num_Actividad, data.data[m].Actividades_Detalle[n].Fecha_Programada.substring(6, 8), data.data[m].Actividades_Detalle[n].Fecha_Realizada);}

										if(data.data[m].Actividades_Detalle[n].Fecha_Programada.substring(4, 6)=="07"){progr_no_realizados('7', data.data[m].Id_Activo, data.data[m].Actividades_Detalle[n].Num_Actividad, data.data[m].Actividades_Detalle[n].Fecha_Programada.substring(6, 8), data.data[m].Actividades_Detalle[n].Fecha_Realizada);}

										if(data.data[m].Actividades_Detalle[n].Fecha_Programada.substring(4, 6)=="08"){progr_no_realizados('8', data.data[m].Id_Activo, data.data[m].Actividades_Detalle[n].Num_Actividad, data.data[m].Actividades_Detalle[n].Fecha_Programada.substring(6, 8), data.data[m].Actividades_Detalle[n].Fecha_Realizada);}

										if(data.data[m].Actividades_Detalle[n].Fecha_Programada.substring(4, 6)=="09"){progr_no_realizados('9', data.data[m].Id_Activo, data.data[m].Actividades_Detalle[n].Num_Actividad, data.data[m].Actividades_Detalle[n].Fecha_Programada.substring(6, 8), data.data[m].Actividades_Detalle[n].Fecha_Realizada);}

										if(data.data[m].Actividades_Detalle[n].Fecha_Programada.substring(4, 6)=="10"){progr_no_realizados('10', data.data[m].Id_Activo, data.data[m].Actividades_Detalle[n].Num_Actividad, data.data[m].Actividades_Detalle[n].Fecha_Programada.substring(6, 8), data.data[m].Actividades_Detalle[n].Fecha_Realizada);}

										if(data.data[m].Actividades_Detalle[n].Fecha_Programada.substring(4, 6)=="11"){progr_no_realizados('11', data.data[m].Id_Activo, data.data[m].Actividades_Detalle[n].Num_Actividad, data.data[m].Actividades_Detalle[n].Fecha_Programada.substring(6, 8), data.data[m].Actividades_Detalle[n].Fecha_Realizada);	
											//if($('#P11_'+data.data[m].Id_Activo+'_'+data.data[m].Actividades_Detalle[n].Num_Actividad+'').html()==""){
											//	alert($('#P11_'+data.data[m].Id_Activo+'_'+data.data[m].Actividades_Detalle[n].Num_Actividad+'').html());
											//	$('#P11_'+data.data[m].Id_Activo+'_'+data.data[m].Actividades_Detalle[n].Num_Actividad+'').html(data.data[m].Actividades_Detalle[n].Fecha_Programada.substring(6, 8));
											//}else{
											//	alert(2);
											//	$('#P11_'+data.data[m].Id_Activo+'_'+data.data[m].Actividades_Detalle[n].Num_Actividad+'').html('<br>'+data.data[m].Actividades_Detalle[n].Fecha_Programada.substring(6, 8));
											//}
											
											//$('#P11_'+data.data[m].Id_Activo+'_'+data.data[m].Actividades[n].Num_Actividad+'').val();
											
											//tabla+=data.data[i].Detalle_Activ[j].Fecha_Programada.substring(6, 8)
										}

										if(data.data[m].Actividades_Detalle[n].Fecha_Programada.substring(4, 6)=="12"){progr_no_realizados('12', data.data[m].Id_Activo, data.data[m].Actividades_Detalle[n].Num_Actividad, data.data[m].Actividades_Detalle[n].Fecha_Programada.substring(6, 8), data.data[m].Actividades_Detalle[n].Fecha_Realizada);}
									}

									if(data.data[m].Actividades_Detalle[n].Fecha_Realizada!=""){
										
										if(data.data[m].Actividades_Detalle[n].Fecha_Realizada.substring(4, 6)=="01"){
											act_realizadas('1',data.data[m].Id_Activo,data.data[m].Actividades_Detalle[n].Num_Actividad, data.data[m].Actividades_Detalle[n].Fecha_Realizada.substring(6, 8));
										}
										if(data.data[m].Actividades_Detalle[n].Fecha_Realizada.substring(4, 6)=="02"){
											act_realizadas('2',data.data[m].Id_Activo,data.data[m].Actividades_Detalle[n].Num_Actividad, data.data[m].Actividades_Detalle[n].Fecha_Realizada.substring(6, 8));
										}
										if(data.data[m].Actividades_Detalle[n].Fecha_Realizada.substring(4, 6)=="03"){
											act_realizadas('3',data.data[m].Id_Activo,data.data[m].Actividades_Detalle[n].Num_Actividad, data.data[m].Actividades_Detalle[n].Fecha_Realizada.substring(6, 8));
										}
										if(data.data[m].Actividades_Detalle[n].Fecha_Realizada.substring(4, 6)=="04"){
											act_realizadas('4',data.data[m].Id_Activo,data.data[m].Actividades_Detalle[n].Num_Actividad, data.data[m].Actividades_Detalle[n].Fecha_Realizada.substring(6, 8));
										}
										if(data.data[m].Actividades_Detalle[n].Fecha_Realizada.substring(4, 6)=="05"){
											act_realizadas('5',data.data[m].Id_Activo,data.data[m].Actividades_Detalle[n].Num_Actividad, data.data[m].Actividades_Detalle[n].Fecha_Realizada.substring(6, 8));
										}
										
										if(data.data[m].Actividades_Detalle[n].Fecha_Realizada.substring(4, 6)=="06"){
											act_realizadas('6',data.data[m].Id_Activo,data.data[m].Actividades_Detalle[n].Num_Actividad, data.data[m].Actividades_Detalle[n].Fecha_Realizada.substring(6, 8));
											/*
											var valR6 = $('#R6_'+data.data[m].Id_Activo+'_'+data.data[m].Actividades_Detalle[n].Num_Actividad+'').is(':empty');
											if(valR6==true){ 
												var div_realizadas_6=data.data[m].Actividades_Detalle[n].Fecha_Realizada.substring(6, 8);
												$('#R6_'+data.data[m].Id_Activo+'_'+data.data[m].Actividades_Detalle[n].Num_Actividad+'').html(div_realizado+''+div_realizadas_6+''+div_realizado_cerrar);
											
											}else{
												var valor_ant=$('#R6_'+data.data[m].Id_Activo+'_'+data.data[m].Actividades_Detalle[n].Num_Actividad+'').html();
												var div_realizadas_6=data.data[m].Actividades_Detalle[n].Fecha_Realizada.substring(6, 8);
												$('#R6_'+data.data[m].Id_Activo+'_'+data.data[m].Actividades_Detalle[n].Num_Actividad+'').html(valor_ant+''+div_realizado+''+div_realizadas_6+''+div_realizado_cerrar);
											}
											*/
										}

										if(data.data[m].Actividades_Detalle[n].Fecha_Realizada.substring(4, 6)=="07"){
											act_realizadas('7',data.data[m].Id_Activo,data.data[m].Actividades_Detalle[n].Num_Actividad, data.data[m].Actividades_Detalle[n].Fecha_Realizada.substring(6, 8));
										}
										if(data.data[m].Actividades_Detalle[n].Fecha_Realizada.substring(4, 6)=="08"){
											act_realizadas('8',data.data[m].Id_Activo,data.data[m].Actividades_Detalle[n].Num_Actividad, data.data[m].Actividades_Detalle[n].Fecha_Realizada.substring(6, 8));
										}
										if(data.data[m].Actividades_Detalle[n].Fecha_Realizada.substring(4, 6)=="09"){
											act_realizadas('9',data.data[m].Id_Activo,data.data[m].Actividades_Detalle[n].Num_Actividad, data.data[m].Actividades_Detalle[n].Fecha_Realizada.substring(6, 8));
										}
										if(data.data[m].Actividades_Detalle[n].Fecha_Realizada.substring(4, 6)=="10"){
											act_realizadas('10',data.data[m].Id_Activo,data.data[m].Actividades_Detalle[n].Num_Actividad, data.data[m].Actividades_Detalle[n].Fecha_Realizada.substring(6, 8));
										}
										if(data.data[m].Actividades_Detalle[n].Fecha_Realizada.substring(4, 6)=="11"){
											act_realizadas('11',data.data[m].Id_Activo,data.data[m].Actividades_Detalle[n].Num_Actividad, data.data[m].Actividades_Detalle[n].Fecha_Realizada.substring(6, 8));
										}
										if(data.data[m].Actividades_Detalle[n].Fecha_Realizada.substring(4, 6)=="12"){
											act_realizadas('12',data.data[m].Id_Activo,data.data[m].Actividades_Detalle[n].Num_Actividad, data.data[m].Actividades_Detalle[n].Fecha_Realizada.substring(6, 8));
										}
										
									
									}
								
								}
							}
						}


				},
				error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
				},
				complete : function(xhr, status) {
					jsRemoveWindowLoad();
				}
			});

		}
	}
	
	act_realizadas=function(Id_Div, Id_Activo, Num_Actividad, Fecha_Realizada){
		var div_realizado='<div style="background-color:#00a65a;">';
		var div_realizado_cerrar='</div>';
		
		var valR = $('#R'+Id_Div+'_'+Id_Activo+'_'+Num_Actividad+'').is(':empty');
		if(valR==true){ 
			$('#R'+Id_Div+'_'+Id_Activo+'_'+Num_Actividad+'').removeAttr("style");
			$('#R'+Id_Div+'_'+Id_Activo+'_'+Num_Actividad+'').css("background-color", "#00a65a");
			var div_realizadas=Fecha_Realizada;
			$('#R'+Id_Div+'_'+Id_Activo+'_'+Num_Actividad+'').html(div_realizado+''+div_realizadas+''+div_realizado_cerrar);								
		}else{
			var valor_ant=$('#R'+Id_Div+'_'+Id_Activo+'_'+Num_Actividad+'').html();
			$('#R'+Id_Div+'_'+Id_Activo+'_'+Num_Actividad+'').removeAttr("style");	
			$('#R'+Id_Div+'_'+Id_Activo+'_'+Num_Actividad+'').css("background-color", "#00a65a");			
			var div_realizadas_ante=Fecha_Realizada;
			$('#R'+Id_Div+'_'+Id_Activo+'_'+Num_Actividad+'').html(valor_ant+''+div_realizado+''+div_realizadas_ante+''+div_realizado_cerrar);
		}

	}

	progr_no_realizados=function(Id_Div, Id_Activo, Num_Actividad, Fecha_Programada, Fecha_Realizada){
		var div_norealizados='<div style="background-color:#fa4848;color:#fa4848">...</div>';
				
		var val = $('#P'+Id_Div+'_'+Id_Activo+'_'+Num_Actividad+'').is(':empty');
		if(val==true){
			$('#P'+Id_Div+'_'+Id_Activo+'_'+Num_Actividad+'').html(Fecha_Programada);
		}else{
			var programados= $('#P'+Id_Div+'_'+Id_Activo+'_'+Num_Actividad+'').val(); 
			$('#P'+Id_Div+'_'+Id_Activo+'_'+Num_Actividad+'').html(programados+''+Fecha_Programada);
		}
										
		//No Realizados
		if(Fecha_Realizada==""){
			var val_R = $('#R'+Id_Div+'_'+Id_Activo+'_'+Num_Actividad+'').is(':empty');
			if(val_R==true){ 
				$('#R'+Id_Div+'_'+Id_Activo+'_'+Num_Actividad+'').html(div_norealizados);
				$('#R'+Id_Div+'_'+Id_Activo+'_'+Num_Actividad+'').removeAttr("style");	
				$('#R'+Id_Div+'_'+Id_Activo+'_'+Num_Actividad+'').css("background-color", "#fa4848");	
			}else{ 
				var No_Realizados= $('#R'+Id_Div+'_'+Id_Activo+'_'+Num_Actividad+'').val(); 
				$('#R'+Id_Div+'_'+Id_Activo+'_'+Num_Actividad+'').html(No_Realizados+''+div_norealizados);
				$('#R'+Id_Div+'_'+Id_Activo+'_'+Num_Actividad+'').removeAttr("style");	
				$('#R'+Id_Div+'_'+Id_Activo+'_'+Num_Actividad+'').css("background-color", "#fa4848");	
			}
		}
	}



	//Funcion que muestra el detalle de las actividades
	ver_mas_global=function(Id_Actividad, Total_Actividades){

		$("#Mostrar_Acti"+Id_Actividad).hide();
		$("#Cerrar_Act"+Id_Actividad).show();

		for(var j=1;j < Total_Actividades; j++){
			$("#"+Id_Actividad+"-"+j).show();
		}
	}

	//Funcion que oculta las actividades
	cerrar_actividades=function(Id_Actividad, Total_Actividades){

		$("#Mostrar_Acti"+Id_Actividad).show();
		$("#Cerrar_Act"+Id_Actividad).hide();

		for(var j=1;j < Total_Actividades; j++){
			$("#"+Id_Actividad+"-"+j).hide();
		}
	}


	//Autocomplete Usuarios
	usuarios();
	function usuarios(){
		$.ajax({
			type: "POST",
			url: "../fachadas/activos/siga_v_empleados_activo_fijo/Siga_v_empleados_activo_fijoFacade.Class.php",
			data: {
				accion: 'consultar'
			},
			async: false,
			dataType: "html",
			beforeSend: function (objeto) {
				$("#gifcargando-usuarios").show();
			},
			success: function (datos) {
				var json = "";
					json = eval("(" + datos + ")"); //Parsear JSON

					if (json.totalCount > 0) {

						var usuarios='';
						usuarios+='<option></option>';
						usuarios+='<optgroup label="Usuarios">';

						for (var i = 0; i < json.totalCount; i++) {
							usuarios+='<option value="'+json.data[i].num_empleado.trim()+'">'+json.data[i].num_empleado.trim()+' '+json.data[i].nombre_completo.trim()+'</option>';
						}
						usuarios+='</optgroup>';
						$('#select-usuarios').html(usuarios);

						$("#gifcargando-usuarios").hide();
						$("#select-usuarios").show();

						$('#select-usuarios').selectize({
							//sortField: 'text'
						});
					}
					else {
						$("#gifcargando-usuarios").hide();
						$('#select-usuarios').append($('<option>', { value: "" }).text("Sin resultados"));
					}

			},
			error: function (objeto, quepaso, otroobj) {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
				$('#select-usuarios').append($('<option>', { value: "-1" }).text("Sin resultados"));
			}
		});
	}

	function pasar_activo(Id_Activo){
		limpiar();
		$("#Actividades_Activo_Fijo").modal("show");
		//Pasar valor y deshabilita control autocomplete de activos
		var $select3 = $('#select-activos').selectize({});
		var control3 = $select3[0].selectize;
		control3.addItem(Id_Activo);
		control3.disable();
	}

	ubic_prim();
	clase();
	familia();

	// Función que rellena los combos de Ubicación Primaria
	function ubic_prim() {
		var Id_Area=$("#idareasesion").val();
		var resultado=new Array();
		data={Estatus_Reg: "1", Id_Area:Id_Area, accion: "consultar"};
		resultado=cargo_cmb("../fachadas/activos/siga_cat_ubic_prim/Siga_cat_ubic_primFacade.Class.php",false, data);
		if(resultado.totalCount>0){
			$('#cmbubicacionprim').append($('<option>', { value: "-1" }).text("--Ubicación Primaria--"));
			$('#cmbubicacionprim_mensual').append($('<option>', { value: "-1" }).text("--Ubicación Primaria--"));
			for(var i = 0; i < resultado.totalCount; i++){
				$('#cmbubicacionprim').append($('<option>', { value: resultado.data[i].Id_Ubic_Prim }).text(resultado.data[i].Desc_Ubic_Prim));
				$('#cmbubicacionprim_mensual').append($('<option>', { value: resultado.data[i].Id_Ubic_Prim }).text(resultado.data[i].Desc_Ubic_Prim));
			}
		}
		else{
			$('#cmbubicacionprim').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
			$('#cmbubicacionprim_mensual').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	// Función que le agrega funcionalidad al combo de Ubicación Primaria al cambiar de valor seleccionado
	function cambioUbicacionPrimaria(objetoSelect) {
		var elementoDependiente = $(objetoSelect).data("combo-ubicacion-secundaria");
		$('#' + elementoDependiente).children('option').remove();

		if($(objetoSelect).val() != "-1"){
			// Actualiza el combo dependiente de la Ubicación Primaria
			var Id_Ubic_Prim = $(objetoSelect).val();
			var resultado = new Array();
			var data = { Estatus_Reg: "1", Id_Ubic_Prim: Id_Ubic_Prim, accion: "consultar" };
			resultado = cargo_cmb("../fachadas/activos/siga_cat_ubic_sec/Siga_cat_ubic_secFacade.Class.php", false, data);

			if(resultado.totalCount > 0) {
				// Escribe los elementos encontrados para el combo dependiente
				$('#' + elementoDependiente).append($('<option>', { value: "-1" }).text("--Ubicación Secundaria--"));
				for(var i = 0; i < resultado.totalCount; i++) {
					$('#' + elementoDependiente).append($('<option>', { value: resultado.data[i].Id_Ubic_Sec }).text(resultado.data[i].Desc_Ubic_Sec));
				}
			}
			else {
				// No se han encontrado resultados
				$('#' + elementoDependiente).append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
			}
		}
		else {
			// Elimina los elementos del combo dependiente
			$('#' + elementoDependiente).append($('<option>', { value: "-1" }).text("--Ubicación Secundaria--"));
		}
	}
	/*
	$("#cmbubicacionprim").change(function() {
		if($(this).val()!="-1"){
			ubic_sec($(this).val());
		}
		else{
			$('#cmbubicacionsec').children('option').remove();
			$('#cmbubicacionsec').append($('<option>', { value: "-1" }).text("--Ubicación Secundaria--"));
		}
	});
	function ubic_sec(Id_Ubic_Prim) {
		$('#cmbubicacionsec').children('option').remove();
		var resultado=new Array();
		data={Estatus_Reg: "1", Id_Ubic_Prim:Id_Ubic_Prim, accion: "consultar"};
		resultado=cargo_cmb("../fachadas/activos/siga_cat_ubic_sec/Siga_cat_ubic_secFacade.Class.php",false, data);
		if(resultado.totalCount>0){
			$('#cmbubicacionsec').append($('<option>', { value: "-1" }).text("--Ubicación Secundaria--"));
			for(var i = 0; i < resultado.totalCount; i++){
				$('#cmbubicacionsec').append($('<option>', { value: resultado.data[i].Id_Ubic_Sec }).text(resultado.data[i].Desc_Ubic_Sec));
			}
		}else{
			$('#cmbubicacionsec').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	*/


	// Función que carga los elementos del combo Clase
	function clase() {
		var Id_Area = $("#idareasesion").val();
		var resultado = new Array();
		var data = { Estatus_Reg: "1", Id_Area:Id_Area, accion: "consultar" };
		resultado = cargo_cmb("../fachadas/activos/siga_cat_clase/Siga_cat_claseFacade.Class.php", false, data);
		if(resultado.totalCount > 0) {
			$('#cmbclase').append($('<option>', { value: "-1" }).text("--Clase--"));
			$('#cmbclase_mensual').append($('<option>', { value: "-1" }).text("--Clase--"));
			for(var i = 0; i < resultado.totalCount; i++) {
				$('#cmbclase').append($('<option>', { value: resultado.data[i].Id_Clase }).text(resultado.data[i].Desc_Clase));
				$('#cmbclase_mensual').append($('<option>', { value: resultado.data[i].Id_Clase }).text(resultado.data[i].Desc_Clase));
			}
		}
		else {
			$('#cmbclase').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
			$('#cmbclase_mensual').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	// Función que le agrega funcionalidad al combo de Clase al cambiar de valor seleccionado
	function cambioClase(objetoSelect) {
		var elementoDependiente = $(objetoSelect).data("combo-clasificacion");
		$('#' + elementoDependiente).children('option').remove();

		if($(objetoSelect).val() != "-1") {
			var Id_Clase = $(elementoDependiente).val();
			var resultado=new Array();
			data = { Estatus_Reg: "1", Id_Clase: Id_Clase, accion: "consultar" };
			resultado = cargo_cmb("../fachadas/activos/siga_cat_clasificacion/Siga_cat_clasificacionFacade.Class.php",false, data);

			if (resultado.totalCount > 0) {
				$('#' + elementoDependiente).append($('<option>', { value: "-1" }).text("--Clasificación--"));
				for(var i = 0; i < resultado.totalCount; i++){
					$('#' + elementoDependiente).append($('<option>', { value: resultado.data[i].Id_Clasificacion }).text(resultado.data[i].Desc_Clasificacion));
				}
			}
			else {
				$('#' + elementoDependiente).append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
			}
		}
		else{
			$('#' + elementoDependiente).append($('<option>', { value: "-1" }).text("--Clasificación--"));
		}
	}
	/*
	$( "#cmbclase" ).change(function() {
		if($(this).val()!="-1"){
			clasificacion($(this).val());
		}else{
			$('#cmbclasificacion').children('option').remove();
			$('#cmbclasificacion').append($('<option>', { value: "-1" }).text("--Clasificación--"));
		}
	});
	function clasificacion(Id_Clase) {
		$('#cmbclasificacion').children('option').remove();
		var resultado=new Array();
		data={Estatus_Reg: "1", Id_Clase:Id_Clase, accion: "consultar"};
		resultado=cargo_cmb("../fachadas/activos/siga_cat_clasificacion/Siga_cat_clasificacionFacade.Class.php",false, data);
		if(resultado.totalCount>0) {
			$('#cmbclasificacion').append($('<option>', { value: "-1" }).text("--Clasificación--"));
			for(var i = 0; i < resultado.totalCount; i++){
				$('#cmbclasificacion').append($('<option>', { value: resultado.data[i].Id_Clasificacion }).text(resultado.data[i].Desc_Clasificacion));
			}
		}
		else {
			$('#cmbclasificacion').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	*/


	// Función que carga los elementos del combo Familia
	function familia() {
		var Id_Area = $("#idareasesion").val();
		var resultado = new Array();
		var data = { Estatus_Reg: "1", Id_Area: Id_Area, accion: "consultar" };
		resultado = cargo_cmb("../fachadas/activos/siga_cat_familia/Siga_cat_familiaFacade.Class.php",false, data);
		if(resultado.totalCount > 0) {
			$('#cmbfamilia').append($('<option>', { value: "-1" }).text("--Familia--"));
			$('#cmbfamilia_mensual').append($('<option>', { value: "-1" }).text("--Familia--"));
			for(var i = 0; i < resultado.totalCount; i++) {
				$('#cmbfamilia').append($('<option>', { value: resultado.data[i].Id_Familia }).text(resultado.data[i].Desc_Familia));
				$('#cmbfamilia_mensual').append($('<option>', { value: resultado.data[i].Id_Familia }).text(resultado.data[i].Desc_Familia));
			}
		}
		else{
			$('#cmbfamilia').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
			$('#cmbfamilia_mensual').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	// Función que le agrega funcionalidad al combo de Familia al cambiar de valor seleccionado
	function cambioFamilia(objetoSelect) {
		var elementoDependiente = $(objetoSelect).data("combo-familia");
		$('#' + elementoDependiente).children('option').remove();

		if ($(objetoSelect).val() != "-1") {
			var Id_Familia = $(elementoDependiente).val();
			var resultado = new Array();
			var data = { Estatus_Reg: "1", Id_Familia: Id_Familia, accion: "consultar" };
			resultado = cargo_cmb("../fachadas/activos/siga_cat_subfamilia/Siga_cat_subfamiliaFacade.Class.php", false, data);

			if(resultado.totalCount > 0) {
				$('#' + elementoDependiente).append($('<option>', { value: "-1" }).text("--Subfamilia--"));
				for(var i = 0; i < resultado.totalCount; i++){
					$('#' + elementoDependiente).append($('<option>', { value: resultado.data[i].Id_Subfamilia }).text(resultado.data[i].Desc_Subfamilia));
				}
			}
			else {
				$('#' + elementoDependiente).append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
			}
		}
		else {
			$('#' + elementoDependiente).append($('<option>', { value: "-1" }).text("--Subfamilia--"));
		}
	}


	/*
	$( "#cmbfamilia" ).change(function() {
		if($(this).val()!="-1"){
			subfamilias($(this).val());
		}else{
			$('#cmbsubfamilia').children('option').remove();
			$('#cmbsubfamilia').append($('<option>', { value: "-1" }).text("--Subfamilia--"));
		}
	});

	function subfamilias(Id_Familia) {
		$('#cmbsubfamilia').children('option').remove();
		var resultado=new Array();
		data={Estatus_Reg: "1", Id_Familia:Id_Familia, accion: "consultar"};
		resultado=cargo_cmb("../fachadas/activos/siga_cat_subfamilia/Siga_cat_subfamiliaFacade.Class.php",false, data);
		if(resultado.totalCount>0){
			$('#cmbsubfamilia').append($('<option>', { value: "-1" }).text("--Subfamilia--"));
			for(var i = 0; i < resultado.totalCount; i++){
				$('#cmbsubfamilia').append($('<option>', { value: resultado.data[i].Id_Subfamilia }).text(resultado.data[i].Desc_Subfamilia));
			}
		}else{
			$('#cmbsubfamilia').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	*/

	limpiar_global=function(cargar=""){
		//$("#cmbprogramadas").val("-1");
		//$("#cmbubicacionprim").val("-1");
		//$("#cmbclase").val("-1");
		//$("#cmbubicacionsec").html('<option value="-1">--Ubicación Secundaria--</option>');
		//$("#cmbclasificacion").html('<option value="-1">--Clasificación--</option>');
	
		//var Usuarios=$.trim($("#select-usuarios").val());
		//if(Usuarios!=""){			
		//	if(Usuarios.length > 0){
		//		var $usr = $('#select-usuarios').selectize({});	
		//		var usr2 = $usr[0].selectize;
		//		usr2.clear();
		//		usr2.enable();
		//	}
		//}
		
		$("#Slc_Mostrar").val(1);
		if(cargar!=""){
			global();
		}
	
	}
	
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Librerias para Graficas
	Highcharts.chart('pie-chart-1', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Servicios registrados en Junio 2017'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
              allowPointSelect: true,
              cursor: 'pointer',
              dataLabels: {
                  enabled: true,
                  format: '{point.percentage:.1f} %',
              },
              showInLegend: true
            }
        },
        credits: {
            enabled: false
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            y: 80,
            floating: true,
            borderWidth: 1,
            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
            shadow: true
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [{
                name: 'Lorem Ipsum',
                y: 56.33,
                color: '#13a0cb',
            }, {
                name: 'Ipsum Lorem',
                y: 24.03,
                color: '#26a59a',
                // sliced: true,
                // selected: true
            }, {
                name: 'Ipsum Lorem',
                y: 10.38,
                color: '#f8b54c',
            }]
        }]
    });

    // highcharts pie2
    Highcharts.chart('pie-chart-2', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Servicios registrados en Junio 2017'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
              allowPointSelect: true,
              cursor: 'pointer',
              dataLabels: {
                  enabled: true,
                  format: '{point.percentage:.1f} %',
              },
              showInLegend: true
            }
        },
        credits: {
            enabled: false
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            y: 80,
            floating: true,
            borderWidth: 1,
            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
            shadow: true
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [{
                name: 'Lorem Ipsum',
                y: 56.33,
                color: '#13a0cb',
            }, {
                name: 'Ipsum Lorem',
                y: 24.03,
                color: '#26a59a',
                // sliced: true,
                // selected: true
            }, {
                name: 'Ipsum Lorem',
                y: 10.38,
                color: '#f8b54c',
            }, {
                name: 'Ipsum Lorem',
                y: 8,
                color: '#fa4848',
            }]
        }]
    });

    // hightchart bar 1
    Highcharts.chart('bar-chart-1', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Servicios reportados por mes en 2017'
        },
        xAxis: {
            categories: [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'May',
                'Jun',
                'Jul',
                'Aug',
                'Sep',
                'Oct',
                'Nov',
                'Dec'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Valores'
            }
        },
        credits: {
            enabled: false
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Columna',
            data: [49.9],
            color:'#05cc57',
        }, {
            name: 'Columna',
            data: [83.6],
            color:'#f8b54c',
        }, {
            name: 'Columna',
            data: [48.9],
            color:'#13a0cb',
        }, {
            name: 'Columna',
            data: [42.4],
            color:'#fa4848',
        }, {
            name: 'Columna',
            data: [42.4],
            color:'#13a0cb',
        }]
    });

    // hightchart bar 2
    Highcharts.chart('bar-chart-2', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Servicios reportados por mes en 2017'
        },
        xAxis: {
            categories: [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'May',
                'Jun',
                'Jul',
                'Aug',
                'Sep',
                'Oct',
                'Nov',
                'Dec'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Valores'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        credits: {
            enabled: false
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Columna',
            data: [49.9],
            color:'#05cc57',
        }, {
            name: 'Columna',
            data: [83.6],
            color:'#f8b54c',
        }, {
            name: 'Columna',
            data: [48.9],
            color:'#13a0cb',
        }, {
            name: 'Columna',
            data: [42.4],
            color:'#fa4848',
        }, {
            name: 'Columna',
            data: [42.4],
            color:'#13a0cb',
        }]
    });
//Fin Librerias para Graficas