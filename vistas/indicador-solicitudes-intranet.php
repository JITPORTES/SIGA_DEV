<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIGA</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- File Input -->
  <link rel="stylesheet" href="../plugins/fileinput/fileinput.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
  
    <!-- fullCalendar -->
   <link rel="stylesheet" href="../plugins/fullcalendaryear/fullcalendar.css">
  <link rel="stylesheet" href="../plugins/fullcalendar/fullcalendar.print.css" media="print">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
  
  <!-- PNotify -->
  <link href="../plugins/pnotify/dist/pnotify.css" rel="stylesheet">
  <link href="../plugins/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
  <link href="../plugins/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
  
	<style>
	
	button.multiselect {
		font-size: 12px;
	}
	
	.dataTables_wrapper {
		font-family: tahoma;
		font-size: 10px;
	}
	
	#WindowLoad
	{
		position:fixed;
		top:0px;
		left:0px;
		z-index:3200;
		filter:alpha(opacity=65);
	   -moz-opacity:65;
		opacity:0.65;
		background:#000000;
	}
	
	.skin-blue .content-wrapper .content .box .table-chs tbody tr td:first-child span {
		background: rgba(0, 0, 0, 0.15);
		border: 2px solid #fff;
		display: inline-block;
		margin: 0 5px;
		width: 32px;
		height: 32px;
		line-height: 16px;
		padding: 0.5em;
		border-radius: 50%;
		-webkit-border-radius: 50%;
		-moz-border-radius: 50%;
		-o-border-radius: 50%;
		text-align: center;
	}
	
	
	.skin-blue .content-wrapper .content .box .table-chs tbody tr td:first-child span i {
		text-align: center;
		color: #fff;
	}
 
	
	#highcharts_pie_servicios_registrados_por_mes {
	  height: 400px;
	  max-width: 800px;
	  min-width: 320px;
	  margin: 0 auto;
	}
	
	#highcharts_pie_servicios_registrados_por_area_por_mes {
	  height: 400px;
	  max-width: 800px;
	  min-width: 320px;
	  margin: 0 auto;
	}
	
	
	
	#highcharts_pie_reportes_realizados {
	  height: 400px;
	  max-width: 800px;
	  min-width: 320px;
	  margin: 0 auto;
	}
	
	#highcharts_pie_reportes_realizados_ubic_sec {
	  height: 400px;
	  max-width: 800px;
	  min-width: 320px;
	  margin: 0 auto;
	}
	
	#highcharts_pie_reportes_realizados_por_area_ubic_sec {
	  height: 400px;
	  max-width: 800px;
	  min-width: 320px;
	  margin: 0 auto;
	}
	
	/*
	 CSS for the main interaction
	*/
	.tabset > input[type="radio"] {
	  position: absolute;
	  left: -200vw;
	}

	.tabset .tab-panel {
	  display: none;
	}

	.tabset > input:first-child:checked ~ .tab-panels > .tab-panel:first-child,
	.tabset > input:nth-child(3):checked ~ .tab-panels > .tab-panel:nth-child(2),
	.tabset > input:nth-child(5):checked ~ .tab-panels > .tab-panel:nth-child(3),
	.tabset > input:nth-child(7):checked ~ .tab-panels > .tab-panel:nth-child(4),
	.tabset > input:nth-child(9):checked ~ .tab-panels > .tab-panel:nth-child(5),
	.tabset > input:nth-child(11):checked ~ .tab-panels > .tab-panel:nth-child(6),
	.tabset > input:nth-child(13):checked ~ .tab-panels > .tab-panel:nth-child(7)
	{
	  display: block;
	}

	

	.tabset > label {
	  position: relative;
	  display: inline-block;
	  padding: 15px 15px 25px;
	  border: 1px solid transparent;
	  border-bottom: 0;
	  cursor: pointer;
	  font-weight: 600;
	}

	.tabset > label::after {
	  content: "";
	  position: absolute;
	  left: 15px;
	  bottom: 10px;
	  width: 22px;
	  height: 4px;
	  background: #8d8d8d;
	}

	.tabset > label:hover,
	.tabset > input:focus + label {
	  color: #06c;
	}

	.tabset > label:hover::after,
	.tabset > input:focus + label::after,
	.tabset > input:checked + label::after {
	  background: #06c;
	}

	.tabset > input:checked + label {
	  border-color: #ccc;
	  border-bottom: 1px solid #fff;
	  margin-bottom: -1px;
	}

	.tab-panel {
	  padding: 30px 0;
	  border-top: 1px solid #ccc;
	}

	/*
	 Demo purposes only
	*/
	*,
	*:before,
	*:after {
	  box-sizing: border-box;
	}


	/*
	.tabset {
	  max-width: 65em;
	}
	*/
	
	
	
	
	
</style>
</head>
<body class="hold-transition skin-blue sidebar-mini" id="Mi_Body">
	<div class="col-md-2 col-sm-3 col-xs-3">
		<div class="form-group">
			<label  class="control-label" style="font-size: 11px;">A&ntilde;o</label>
			<select class="form-control" id="cmbanios">
				<option value="2018">2018</option>
				<option value="2019" selected>2019</option>
			</select>
		</div>
    </div>
	<div class="col-md-2 col-sm-3 col-xs-3">
		<div class="form-group">
			<label  class="control-label" style="font-size: 11px;">Mes</label>
			<select class="form-control" id="cmbmeses_graf_1">
				<option value="Anual">Anual</option>
				<option value="01">Enero</option>
				<option value="02">Febrero</option>
				<option value="03">Marzo</option>
				<option value="04">Abril</option>
				<option value="05">Mayo</option>
				<option value="06">Junio</option>
				<option value="07">Julio</option>
				<option value="08">Agosto</option>
				<option value="09">Septiembre</option>
				<option value="10">Octubre</option>
				<option value="11">Noviembre</option>
				<option value="12">Diciembre</option>
			</select>
		</div>
    </div>
	<div class="col-md-2 col-sm-3 col-xs-3">
		<div class="form-group">
			<label  class="control-label" style="font-size: 11px;">Área</label>
			<select class="form-control" id="cmbareas">
				<option value="1">Biomédica</option>
				<option value="2" selected>Tic</option>
				<option value="3">Mantenimiento</option>
				<option value="4">Mobiliario y Equipo</option>
			</select>
		</div>
    </div>
	
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div id="bar-chart-1" class="highcharts bar"></div>
	</div>
	  

	<div class="modal fade modalchs" id="Solicitud_Tickets">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header azuldef">
            <button type="button" class="close" id="closeSolicitud_Tickets" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title"><i class="fa fa-check-circle-o" aria-hidden="true"></i>Solicitudes</h4>
          </div>
		  
		  <div class="modal-body nopsides" id="div_tabla">
		  </div>
		</div>
      </div>
    </div>  
      <!-- /.row -->
<!-- File Input -->



<!-- jQuery 2.2.3-->

<script src='//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js' type='text/javascript'/>
<!--[if lt IE 8]>
    <script src="http://ie7-js.googlecode.com/svn/version/2.0(beta3)/IE8.js"></script>
<![endif]-->
<!--Convertir tabla html a excel-->
<script src="../plugins/excel/excellentexport.js"></script>
<!--Fin-->
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>

<!-- File Input -->
<script src="../plugins/fileinput/fileinput.js"></script>
<script src="../plugins/fileinput/fileinput_locale_es.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- PNotify -->
<script src="../plugins/pnotify/dist/pnotify.js"></script>
<script src="../plugins/pnotify/dist/pnotify.buttons.js"></script>
<script src="../plugins/pnotify/dist/pnotify.nonblock.js"></script>
<!-- highcharts -->
<script src="../plugins/highchart/highcharts.js"></script>
<script src="../plugins/highchart/highcharts-3d.js"></script>
<script src="../plugins/highchart/exporting.js"></script>
<script src="../plugins/highchart/drilldown.js"></script>
<!-- fullCalendar 2.2.5 -->
<script src="../plugins/fullcalendaryear/moment.min.js"></script>
<script src="../plugins/fullcalendaryear/fullcalendar.js"></script>
<!-- Mensaje de Confirmacion-->
<script src="../plugins/bootbox/bootbox.min.js"></script>
<script src="../js/Funciones.js"></script>
<div style="width: 100%; border: 1px solid rgb(206, 206, 206); position: absolute; top: 0px; height: 100vh; background: rgba(239, 239, 239, 0.48) none repeat scroll 0% 0%; z-index: 9999; display: none;" id="bloquear-internet"></div>



<script src="../plugins/fileinput/fileinput.js"></script>
<script src="../plugins/fileinput/fileinput_locale_es.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- bootstrap datepicker -->
<script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!--<script src="../plugins/fullcalendaryear/fullcalendar.js"></script>-->

<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<script>
	
	var carga_mes_actual = moment().format("MM");

    $("#cmbmeses_graf_1").val(carga_mes_actual);
    function cargar_estatus_proceso(){
		var Id_Area=$("#cmbareas").val();
		var Anio=$("#cmbanios").val();
		var Meses=$("#cmbmeses_graf_1").val();
		if(Id_Area!="" && Anio!=""){
			$.ajax({
				type: "POST",
				url: "../fachadas/activos/siga_solicitud_tickets/Siga_solicitud_ticketsFacade.Class.php",        
				async: false,
				data: {
					Id_Area:Id_Area,
					Anio:Anio,
					Mes:Meses,
					Ubic_Prim:"-1",
					Ubic_Sec:"-1",
					Clase:"-1",
					Clasificacion:"-1",
					Familia:"-1",
					Subfamilia:"-1",
					Seccion:"-1",
					Id_Medio:"-1",
					Lo_Realiza:"-1",
					Id_Categoria:"-1",
					Id_Subcategoria:"-1",
					Id_Gestor:"-1",
					Id_Motivo_Real:"-1",
					Id_Motivo_Aparente:"-1",
					Id_Est_Equipo:"-1",
					accion: "indicadores_mesa_ayuda"
				},
				dataType: "html",
				beforeSend: function (xhr) {
			
				},
				success: function (datos) {
					var json;
					json = eval("(" + datos + ")"); //Parsear JSON
					if(json.totalCount>0){
						
						var grafica=[
							{
								name: 'Nuevos',
								data: [parseInt(json.data[0].Total_Nuevos)],
								color:'#05cc57',
								point: {
									events: {
										click: function () {
											if(json.data[0].Total_Nuevos>0){
												var array_val=[];
												array_val[0]=1;//Nuevos
												tabla_popup_tickets("barra_indicadores_mesa_ayuda", array_val);
											}
										}
									}
								}
							}, {
								name: 'En seguimiento',
								data: [parseInt(json.data[0].Total_Seguimiento)],
								color:'#f8b54c',
								point: {
									events: {
										click: function () {
											if(json.data[0].Total_Seguimiento>0){
												var array_val=[];
												array_val[0]=2;//Seguimiento
												tabla_popup_tickets("barra_indicadores_mesa_ayuda", array_val);
											}
										}
									}
								}
							}, {
								name: 'Espera de Cierre',
								data: [parseInt(json.data[0].Total_Espera_Cierre)],
								color:'#13a0cb',
								point: {
									events: {
										click: function () {
											if(json.data[0].Total_Espera_Cierre>0){
												var array_val=[];
												array_val[0]=3;//Por Calificar
												tabla_popup_tickets("barra_indicadores_mesa_ayuda", array_val);
											}
										}
									}
								}
							}, {
								name: 'Cerrados',
								data: [parseInt(json.data[0].Total_Cierre)],
								color:'#fa4848',
								point: {
									events: {
										click: function () {
											if(json.data[0].Total_Cierre>0){
												var array_val=[];
												array_val[0]=4;//Cerrados
												tabla_popup_tickets("barra_indicadores_mesa_ayuda", array_val);
											}
										}
									}
								}
							},
						];
						
						
						 // hightchart bar 1
						Highcharts.chart('bar-chart-1', {
							chart: {
								type: 'column'
							},
							title: {
								text: 'Estatus de Tickets (Mesa de Ayuda)'
							},
							
							xAxis: {
								categories: [
									'Estatus'
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
									'<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
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
							series: grafica
						});
						
						
						
						
					}
				},
				error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
				}
			});
		}
	}
   
   function tabla_popup_tickets(nombre_grafica, valores_key){
		var Id_Area=$("#cmbareas").val();;
		
		var Ubic_Prim="-1";
		var Ubic_Sec="-1";
		var Clase="-1";
		var Clasificacion="-1";
		var Familia="-1";
		var Subfamilia="-1";
		var Seccion="-1";
		//var Id_Gestor="-1"; //Aqui Va el control de gestores y se sustituye por el -1
		var Id_Medio="-1";
		var Lo_Realiza="-1";
		var Id_Categoria="-1";
		var Id_Subcategoria="-1";
		var Id_Gestor="-1";
		var Id_Motivo_Real="-1";
		var Id_Motivo_Aparente="-1";
		var Id_Est_Equipo="-1";
		
		
		
		var Anio=$("#cmbanios").val();
		var Meses="";
		var Tipo_Mantenimiento="";
		var Rutina="";
		
		var Estatus_Proceso="";
		if(nombre_grafica=="barra_indicadores_mesa_ayuda"){
			Meses=$("#cmbmeses_graf_1").val();
			Estatus_Proceso=valores_key[0];
		}
		
	
		
		
		if(Id_Area!="" && Anio!=""){
			$.ajax({
				type: "POST",
				url: "../fachadas/activos/siga_solicitud_tickets/Siga_solicitud_ticketsFacade.Class.php",        
				async: false,
				data: {
					Id_Area:Id_Area,
					Anio:Anio,
					Ubic_Prim:Ubic_Prim,
					Ubic_Sec:Ubic_Sec,
					Clase:Clase,
					Clasificacion:Clasificacion,
					Familia:Familia,
					Subfamilia:Subfamilia,
					Seccion:Seccion,
					Mes:Meses,
					Nombre_Grafica:nombre_grafica,
					Tipo_Mantenimiento:Tipo_Mantenimiento,
					Estatus_Proceso:Estatus_Proceso,
					Rutina:Rutina,
					Id_Medio:Id_Medio,
					Lo_Realiza:Lo_Realiza,
					Id_Categoria:Id_Categoria,
					Id_Subcategoria:Id_Subcategoria,
					Id_Gestor:Id_Gestor,
					Id_Motivo_Real:Id_Motivo_Real,
					Id_Motivo_Aparente:Id_Motivo_Aparente,
					Id_Est_Equipo:Id_Est_Equipo,
					
					accion: "select_tabla_dinamica_tickets"
				},
				dataType: "html",
				beforeSend: function (xhr) {
			
				},
				success: function (datos) {
					var json;
					json = eval("(" + datos + ")"); //Parsear JSON
					var tabla="";
				
				if(json.totalCount>0){
				
					tabla+='<div class="box-body"><div class="table-responsive">';
					tabla+='  <table id="tabla_categorias" class="table table-bordered table-striped table-chs">';
					tabla+='	<thead>';
					tabla+='	  <tr>';
					tabla+='		<th>Id_Solicitud</th>';
					tabla+='		<th>Fecha Solicitud</th>';
					tabla+='		<th>Estatus Solicitud</th>';
					tabla+='		<th>Usuario Solicitante</th>';
					tabla+='		<th>Gestor Asignado</th>';
					tabla+='		<th>Prioridad</th>';
					tabla+='		<th>Sección</th>';
					tabla+='		<th>AF/BC</th>';
					tabla+='		<th>Nombre Activo</th>';
					tabla+='		<th>Estatus Activo</th>';
					tabla+='		<th>Ubicaci&oacute;n Prim.</th>';
					tabla+='		<th>Ubicaci&oacute;n Sec.</th>';
					tabla+='		<th>Categoría</th>';
					tabla+='		<th>Subcategoria</th>';
					tabla+='		<th>Descripción</th>';
					tabla+='		<th>Descripción Detalle</th>';
					tabla+='		<th>Área</th>';
					tabla+='	  </tr>';
					tabla+='	</thead>';
					tabla+='	<tbody>';
					for(var i=0;i < json.totalCount; i++){
						tabla+='	  <tr>';
						tabla+='		<td>'+json.data[i].Id_Solicitud+'</td>';
						tabla+='		<td>'+json.data[i].Fecha_Solicitud+'</td>';
						tabla+='		<td>'+json.data[i].Id_Estatus_Proceso+'</td>';
						tabla+='		<td>'+json.data[i].Nombre_Usuario+'</td>';
						tabla+='		<td>'; if(json.data[i].Gestor!=null){tabla+=json.data[i].Gestor;} tabla+='</td>';
						tabla+='		<td>'+json.data[i].Desc_Prioridad+'</td>';
						tabla+='		<td>'+json.data[i].Nombre_Seccion+'</td>';
						tabla+='		<td>'; if(json.data[i].AF_BC!=null){tabla+=json.data[i].AF_BC;} tabla+='</td>';
						tabla+='		<td>'; if(json.data[i].Nombre_Activo!=null){tabla+=json.data[i].Nombre_Activo;} tabla+='</td>';
						tabla+='		<td>'; if(json.data[i].Estatus_Activo!=null){tabla+=json.data[i].Estatus_Activo;} tabla+='</td>';
						tabla+='		<td>'; if(json.data[i].Desc_Ubic_Prim!=null){tabla+=json.data[i].Desc_Ubic_Prim;} tabla+='</td>';
						tabla+='		<td>'; if(json.data[i].Desc_Ubic_Sec!=null){tabla+=json.data[i].Desc_Ubic_Sec;} tabla+='</td>';
						
						tabla+='		<td>'; if(json.data[i].Desc_Categoria!=null){tabla+=json.data[i].Desc_Categoria;} tabla+='</td>';
						tabla+='		<td>'; if(json.data[i].Desc_Subcategoria!=null){tabla+=json.data[i].Desc_Subcategoria;} tabla+='</td>';
						tabla+='		<td>'+json.data[i].Titulo+'</td>';
						tabla+='		<td>';
						var Desc = '';
						if(json.data[i].Id_Actividad!=""){
							Desc='<a href="#noir" id="Ver_Act'+json.data[i].Id_Solicitud+'" onclick="ver_actividades('+json.data[i].Id_Solicitud+')">Ver Actividades</a><a href="#noir" id="Ocult_Act'+json.data[i].Id_Solicitud+'" onclick="ocult_actividades('+json.data[i].Id_Solicitud+')" style="display:none">Ocultar Actividades</a><div id="Desc_Motiv_Repor'+json.data[i].Id_Solicitud+'" style="display:none">'+json.data[i].Desc_Motivo_Reporte+"</div>";
						}else{
							Desc=json.data[i].Desc_Motivo_Reporte;
						}
						tabla+= 		Desc;
						tabla+='		</td>';
						tabla+='		<td>'+json.data[i].Nom_Area+'</td>';
						tabla+='	  </tr>';	
					}
					tabla+='	</tbody>';
					tabla+='  </table>';
					tabla+='</div></div><br>';
					$("#div_tabla").html(tabla);
					$('#tabla_categorias').DataTable({
					  "processing": true,
					  "paging": true,
					  "lengthChange": true,
					  "searching": true,
					  "ordering": true,
					  "info": true,
					  "autoWidth": true,
					  "language": {
							"lengthMenu": "Mostrando _MENU_ registros por p&aacute;gina",
							"zeroRecords": "Sin Resultados",
							"info": "Monstrando p&aacute;gina _PAGE_ de _PAGES_ , total de registros: _MAX_",
							"infoEmpty": "Sin Resultados",
							"infoFiltered": "(Monstrando  _MAX_ del total de registros)",
							"search": "Busqueda: ",
							"paginate": {
								"first": "Primera",
								"last": "Ultima",
								"next": "Siguiente",
								"previous": "Anterior"
							}
						}
					});
					
				}else{
					$("#div_tabla").html("");
					mensajesalerta("Informaci&oacute;n", "No se encontraron Resultados", "info", "dark");
				}
				
				},
				error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
				}
				
				
			});
			
			$("#Solicitud_Tickets").modal("show");
		}
	}
   
   
  
  //$(document).ready(function(){
	cargar_estatus_proceso();

	var Mes_Actual=moment().format('MM'); 	
	var Anio_Actual=moment().format('YYYY'); 
	var Dia_Mes_Inicial="01";
	var Dia_Mes_Final=moment(Anio_Actual+"-"+Mes_Actual, "YYYY-MM").daysInMonth(); 
	$('#Fecha_Inicial_Serv_Reg').val(Dia_Mes_Inicial+"/"+Mes_Actual+"/"+Anio_Actual);
	$('#Fecha_Final_Serv_Reg').val(Dia_Mes_Final+"/"+Mes_Actual+"/"+Anio_Actual);
	
	
	$("#cmbanios").change(function() {
		if($(this).val()!="-1"){
			cargar_estatus_proceso();	
		}else{
		}
	});
	
	$("#cmbmeses_graf_1").change(function() {
		if($(this).val()!="-1"){
			cargar_estatus_proceso();
		}else{
		}
	});
	
	$("#cmbareas").change(function() {
		if($(this).val()!="-1"){
			cargar_estatus_proceso();	
		}else{
		}
	});
	
  //});//ND

</script>
</body>
</html>