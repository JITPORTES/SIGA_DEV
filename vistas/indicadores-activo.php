
      
      <!-- Main row -->
      <div class="row">
        <!-- Tab panes -->
       
            
            <div class="gray">
              <div class="row">
                <div class="col-md-10 col-md-offset-1">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                      <select class="form-control">
                        <option>AF/BC</option>
                      </select>
                    </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                      <select class="form-control">
                        <option>Ubicación primaria</option>
                      </select>
                    </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                      <select class="form-control">
                        <option>Ubicación secundaria</option>
                      </select>
                    </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                      <select class="form-control">
                        <option>Área</option>
                      </select>
                    </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                      <select class="form-control">
                        <option>Familia</option>
                      </select>
                    </div>
                    </div> 
                    <div class="col-md-4">
                      <div class="form-group">
                      <select class="form-control">
                        <option>Subfamilia</option>
                      </select>
                    </div>
                    </div>
                  </div>
                 <div class="row">
                    <div class="col-md-12">
                      <button type="button" class="btn chs">Filtrar</button>
                    </div>
                  </div>
                </div>
             
              </div>
            </div>

			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
				  <ul class="nav nav-tabs azulf" role="tablist">
					<li role="presentation" class="active"><a href="#calendario" aria-controls="calendario" role="tab" data-toggle="tab">Estatus Activo</a></li>
					<li role="presentation"><a href="#indicadores" aria-controls="indicadores" role="tab" data-toggle="tab">Clase y Clasificacion</a></li>
					<li role="presentation"><a href="#reportes" aria-controls="reportes" role="tab" data-toggle="tab">Familia y Subfamilia</a></li>
				  </ul>
				</div>
			</div>
			
			<div class="row">
				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="calendario">
						<div class="col-md-12">
						<div class="box">
							<!-- /.box-header -->
							<div class="box-body" align="center">
								<div class="col-md-12 col-sm-12 col-xs-12 form-group">
									<label class="control-label" style="font-size: 11px;">Estatus</label>
									<div class="input-group">
										<select class="form-control"  id="cmbestatus">
										</select>
									</div>
								</div>
								<!--		
								<div class="col-md-2 col-sm-12 col-xs-12 form-group">
									<label class="control-label"  style="font-size: 11px;">Filtrar</label>
									<button type="button" class="btn chs" onclick="grafica_estatus_activos()">Filtrar</button>
								</div>
								-->
							<div id="bar-chart-3" class="highcharts bar col-md-12 col-sm-12 col-xs-12 form-group"></div>
							</div>
						</div><!-- /.box -->
						</div>
					</div>
					
					<div role="tabpanel" class="tab-pane" id="indicadores">		
						<div class="col-md-12">
						<div class="box">
							<!-- /.box-header -->
							<div class="box-body" align="center">
								<div class="col-md-12 col-sm-12 col-xs-12 form-group" id="div_clase">
									<label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Clase</label>
									<div class="input-group">
										<select class="form-control"  id="cmbclase">
										</select>
									</div>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 form-group">
									<label id="I_Grafica_Clase"></label>&nbsp;&nbsp;
									<label id="I_Grafica_Clasificacion"></label>
								</div>
								<!--
								<div class="col-md-5 col-sm-12 col-xs-12 form-group" id="div_clasificacion">
									<label class="control-label"  style="font-size: 11px;">Clasificación</label>
									<div class="input-group">
										<select class="form-control" id="cmbclasificacion">
											<option value="-1">--Clasificación--</option>
										</select>
										<span class="input-group-addon">
											<input type="checkbox" id="check_clasificacion">
										</span>
									</div>
								</div>
								<div class="col-md-2 col-sm-12 col-xs-12 form-group">
									<label class="control-label"  style="font-size: 11px;">Filtrar</label>
									<button type="button" class="btn chs" onclick="grafica_clasificacion()">Filtrar</button>
								</div>
								-->
								<div id="bar-chart-1" class="highcharts bar col-md-12 col-sm-12 col-xs-12 form-group"></div>
								<div id="T_Activos_Clas_Clasif" class="col-md-12 col-sm-12 col-xs-12 form-group"></div>
							</div>
						</div><!-- /.box -->
						</div>
					</div>
					
					<div role="tabpanel" class="tab-pane" id="reportes">
						<div class="col-md-12">
						<div class="box">
							<!-- /.box-header -->
							<div class="box-body" align="center">
								<div class="col-md-12 col-sm-12 col-xs-12 form-group" id="div_familia" >
									<label class="control-label" style="font-size: 11px;">Familia</label>
									<div class="input-group">
										<select class="form-control"  id="cmbfamilia">
										</select>
									</div>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 form-group">
									<label id="I_Grafica_Familia"></label>&nbsp;&nbsp;
									<label id="I_Grafica_Subfamilia"></label>
								</div>
								<!--
								<div class="col-md-5 col-sm-12 col-xs-12 form-group" id="div_subfamilia" style="display:none">
									<label class="control-label"  style="font-size: 11px;">Subfamilia</label>
									<div class="input-group">
										<select class="form-control" id="cmbsubfamilia">
											<option value="-1">--Subfamilia--</option>
										</select>
										<span class="input-group-addon">
											<input type="checkbox" id="check_subfamilia">
										</span>
									</div>
								</div>
								<div class="col-md-2 col-sm-12 col-xs-12 form-group" style="display:none">
									<label class="control-label"  style="font-size: 11px;">Filtrar</label>
									<button type="button" class="btn chs" onclick="grafica_subfamilia()">Filtrar</button>
								</div>
								-->
								<div id="bar-chart-2" class="highcharts bar col-md-12 col-sm-12 col-xs-12 form-group"></div>
								<div id="T_Activos_Clas_Subfamilia" class="col-md-12 col-sm-12 col-xs-12 form-group"></div>
							</div>
						</div><!-- /.box -->
						</div>
					</div>	
		
				</div>
			</div>
       
      </div>
      <!-- /.row -->
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- File Input -->
<script src="../plugins/fileinput/fileinput.js"></script>
<script src="../plugins/fileinput/fileinput_locale_es.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App   Se comento esta linea ya que no deja desplegar el menu-->
<!--<script src="../dist/js/app.min.js"></script>-->
<!-- bootstrap datepicker -->
<script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!--<script src="../plugins/fullcalendaryear/fullcalendar.js"></script>-->

<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<script> 
	var Inicia_Id_Clasificacion="";
	var Inicia_Nombre_Clasificacion="";
	var Inicia_Id_Subfamilia="";
	var Inicia_Nombre_Subfamilia="";
	
	var coloresHTML=["#660000", "#663300", "#996633", "#003300", "#003333", "#003399", "#000066", "#330066", "#660066", "#FF0000", "#FFFF00", "#00CC00", "#009999", "#0099FF", "#0000FF","#9900CC", "#FF0099", "#FF9999", "#FF9966", "#FFFF99", "#99FF99", "#66FFCC", "#99FFFF", "#66CCFF", "#9999FF", "#FF99FF", "#990000", "#993300", "#CC9900", "#006600", "#336666", "#0033FF", "#000099", "#660099", "#990066"];
	grafica_estatus_activos=function(Id_Situacion_Activo){
		var Id_Area=$("#idareasesion").val();
		
		var strDatos="";
		var Subtitulo="";
		var Id_Situacion_Activo=$("#cmbestatus").val();
		
		strDatos+="Id_Area="+Id_Area;
		strDatos+="&accion=grafica_estatus_activo";
		
		if(Id_Situacion_Activo!="-1"){
			strDatos += "&Id_Situacion_Activo="+Id_Situacion_Activo;
			Subtitulo+="Estatus: "+$("#cmbestatus option:selected").html();				
		}else{
			Id_Situacion_Activo="";
		}
		
		//if(Id_Situacion_Activo!=""){
			$.ajax({
				type: "POST",
				url: "../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",
				async: false,
				data: strDatos,
				dataType: "html",
				beforeSend: function (xhr) {

				},
				
				success: function (data) {
					json = eval("(" + data + ")");
					if (json.totalCount > 0) {
						var Total_Cantidad=0;
						var grafica=[];
						var Desc_Cadena="";
						for(var i=0;i < json.totalCount; i++){
							var valor_y=0;
							Total_Cantidad=parseInt(json.Total_Filas);
							valor_y=(parseInt(json.data[i].RecuentoFilas)/Total_Cantidad)*100;
							
							//Redondear a un decimal
							var flotante = parseFloat(valor_y);
							var resultado = Math.round(flotante*Math.pow(10,1))/Math.pow(10,1);
							
							
							Desc_Clase=json.data[i].Desc_Estatus+' ('+json.data[i].RecuentoFilas+')';
							
							grafica[i]={
								name: Desc_Clase,
								y: valor_y,
								key:json.data[i].Id_Clasificacion
								//color:'#05cc50',
							};
						}
						
						Highcharts.chart('bar-chart-3', {
							chart: {
								type: 'column'
							},
							title: {
								text: 'Grafica por Estatus'
							},
							
							subtitle: {
								text: Subtitulo
							},
						
							xAxis: {
								type: 'category'
							},
							yAxis: {
								title: {
									text: 'Total Porcentaje Estatus'
								}
						
							},
							legend: {
								enabled: false
							},
							plotOptions: {
								series: {
									borderWidth: 0,
									dataLabels: {
										enabled: true,
										format: '{point.y:.1f}%'
									}
								}
							},
						
							tooltip: {
								headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
								pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b><br/>'
							},
						
							series: [{
								name: 'Estatus',
								colorByPoint: true,
								data: grafica
							}]
						});
						
						
					}else{
						$("#bar-chart-3").html("");
						mensajesalerta("Informaci&oacute;n", "No se encontraron Resultados", "info", "dark");
					}
				},
				error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
				}
			});
		//}
	}
	
	grafica_clasificacion=function(Id_Clase_Graf="", nombre="", valorY=""){
		
		$("#bar-chart-1").show();
		$("#I_Grafica_Clase").hide();
		$("#I_Grafica_Clasificacion").hide();
		$("#T_Activos_Clas_Clasif").hide();
		var Id_Area=$("#idareasesion").val();
		
		var strDatos="";
		var Subtitulo="";
		strDatos+="Id_Area="+Id_Area;
		strDatos+="&accion=grafica_clasificacion";
		
		if(Id_Clase_Graf==""){
			var Id_Clase=$("#cmbclase").val();
			var Id_Clasificacion=$("#cmbclasificacion").val();
		
			if($("#check_familia").prop('checked')==true){
				if(Id_Clase!="-1"){
					strDatos += "&Id_Clase="+Id_Clase;
					Subtitulo+="Clase: "+$("#cmbclase option:selected").html();				
				}
			}
			
			if($("#check_subfamilia").prop('checked')==true){
				if(Id_Clasificacion!="-1"){
					strDatos += "&Id_Clasificacion="+Id_Clasificacion;
					Subtitulo+=" Clasificacion: "+$("#cmbclasificacion option:selected").html();				
				}
			}else{
				Id_Clasificacion="-1";
			}
		}else{
			strDatos += "&Id_Clase="+Id_Clase_Graf;
		}
		
		
		
		$.ajax({
            type: "POST",
            url: "../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",
            async: false,
            data: strDatos,
            dataType: "html",
            beforeSend: function (xhr) {

            },
			
            success: function (data) {
                json = eval("(" + data + ")");
                if (json.totalCount > 0) {
					var Total_Cantidad=0;
					var grafica=[];
					var Desc_Clase="";
					
					//Variables
					var categorias=[];
					var data_grafica=[];
					var data_grafica_categories=[];
					var data_grafica_data=[];
					for(var i=0;i < json.totalCount; i++){
						Total_Cantidad=parseInt(json.Total_Filas);
						valor_y=(parseInt(json.data[i].RecuentoFilas)/Total_Cantidad)*100;
						
						if(Id_Clase_Graf!=""){
							if(valorY!=""){
								var resultado = convertir_a_porcentaje(json.Total_Filas, json.data[i].RecuentoFilas, valorY);
							}else{
								var resultado = convertir_a_porcentaje(json.Total_Filas, json.data[i].RecuentoFilas, 100);
							}
							Desc_Cadena=json.data[i].Desc_Clasificacion+' '+' ('+json.data[i].RecuentoFilas+')';
						
							grafica[i]={
								name: Desc_Cadena,
								y: resultado,
								key:json.data[i].Id_Clasificacion
								//color:'#05cc50',
							};
						}else{
							var resultado = convertir_a_porcentaje(json.Total_Filas, json.data[i].RecuentoFilas, 100);
						}
						
						//////////
						for(var j=0;j < json.data[i].CountClasificacion; j++){
							data_grafica_categories[j]=json.data[i].Clasificacion[j].Desc_Clasificacion;
							data_grafica_data[j]=convertir_a_porcentaje(json.data[i].RecuentoFilas, json.data[i].Clasificacion[j].RecuentoFilasClasificacion, resultado);
						}
						
						//Redondear a un decimal
						var flotante = parseFloat(valor_y);
						var resultado = Math.round(flotante*Math.pow(10,1))/Math.pow(10,1);
						
						categorias[i]=json.data[i].Desc_Clase;
						data_grafica[i]={
							y: resultado,
							color:coloresHTML[i],
							drilldown:{
								name:json.data[i].Desc_Clase,
								categories:data_grafica_categories,
								data:data_grafica_data
							}
						};
						data_grafica_data=[];
						data_grafica_categories=[];
					}
					
					
					if(Id_Clase_Graf==""){
						
						var colors = Highcharts.getOptions().colors,
						categories = categorias,
						data = data_grafica,
						browserData = [],
						versionsData = [],
						i,
						j,
						dataLen = data.length,
						drillDataLen,
						brightness;


						// Build the data arrays
						for (i = 0; i < dataLen; i += 1) {

							// add browser data
							browserData.push({
								name: categories[i],
								y: data[i].y,
								color: data[i].color,
								key:json.data[i].Id_Clase
							});

							// add version data
							drillDataLen = data[i].drilldown.data.length;
							for (j = 0; j < drillDataLen; j += 1) {
								brightness = 0.2 - (j / drillDataLen) / 5;
								versionsData.push({
									name: data[i].drilldown.categories[j],
									y: data[i].drilldown.data[j],
									color: Highcharts.Color(data[i].color).brighten(brightness).get()
								});
							}
						}
						
						console.log(data);
						
						Highcharts.chart('bar-chart-1', {
							chart: {
								type: 'pie'
							},
							title: {	
								text: 'Indicadores Clase y Clasificación'
							},
							subtitle: {
								//text: 'Source: <a href="http://statcounter.com" target="_blank">statcounter.com</a>'
							},
							yAxis: {
								title: {
									text: 'Total percent market share'
								}
							},
							plotOptions: {
								pie: {
									shadow: false,
									center: ['50%', '50%']
								}
							},
							tooltip: {
								valueSuffix: '%'
							},
							series: [{
								name: 'Clase',
								data: browserData,
								size: '60%',
								dataLabels: {
									formatter: function () {
										return this.y > 5 ? this.point.name : null;
									},
									color: '#ffffff',
									distance: -30
								},
								point: {
									events: {
										click: function () {
											grafica_clasificacion(this.options.key, this.options.name,this.options.y);
										}
									}
								}
							}, {
								name: 'Clasificación',
								data: versionsData,
								size: '80%',
								innerSize: '60%',
								dataLabels: {
									formatter: function () {
										// display only if larger than 1
										return this.y > 1 ? '<b>' + this.point.name + ':</b> ' +
											this.y + '%' : null;
									}
								},
								id: 'versions'
							}],
							responsive: {
								rules: [{
									condition: {
										maxWidth: 400
									},
									chartOptions: {
										series: [{
											id: 'versions',
											dataLabels: {
												enabled: false
											}
										}]
									}
								}]
							}
						});
					}
					else{
						Inicia_Id_Clasificacion=Id_Clase_Graf;
						Inicia_Nombre_Clasificacion=nombre;
						$("#I_Grafica_Clase").show();
						$("#I_Grafica_Clase").html("<a href='#noir' onclick='grafica_clasificacion()'>Grafica Clase-></a>");
						Highcharts.chart('bar-chart-1', {
							chart: {
								plotBackgroundColor: null,
								plotBorderWidth: null,
								plotShadow: false,
								type: 'pie'
							},
							title: {
								text: 'Clase: '+ nombre
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
										format: '<b>{point.name}</b>: {point.percentage:.1f} %',
										style: {
											color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
										}
									},
									point: {
										events: {
											click: function () {
												tabla_activos(this.options.key,'T_Activos_Clas_Clasif','tablaactivos','bar-chart-1');
											}
										}
									}
								}
							},
							series: [{
								name: 'P',
								colorByPoint: true,
								data: grafica
							}]
						});
					}
					
					/*
					Highcharts.chart('bar-chart-1', {
						chart: {
							type: 'column'
						},
						title: {
							text: 'Grafica por Clasificación'
						},
						
						subtitle: {
							text: Subtitulo
						},
					
						xAxis: {
							type: 'category'
						},
						yAxis: {
							title: {
								text: 'Total Porcentaje Clasificación'
							}
					
						},
						legend: {
							enabled: false
						},
						plotOptions: {
							series: {
								borderWidth: 0,
								dataLabels: {
									enabled: true,
									format: '{point.y:.1f}%'
								}
							}
						},
					
						tooltip: {
							headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
							pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
						},
					
						series: [{
							name: 'Clasificación',
							colorByPoint: true,
							data: grafica
						}]
					});
					*/
				}else{
					$("#bar-chart-1").html("");
					mensajesalerta("Informaci&oacute;n", "No se encontraron Resultados", "info", "dark");
				}
            },
            error: function () {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
            }
        });
	}
	
	tabla_activos=function(Id, Div_Html, Datatable,Div_Graf){
		var Id_Area=$("#idareasesion").val();
		var strDatos="";
		strDatos+="Id_Area="+Id_Area;
		
		if(Div_Graf=='bar-chart-1'){
			strDatos+="&Id_Clasificacion="+Id;
			$("#T_Activos_Clas_Clasif").show();
			$("#I_Grafica_Clasificacion").show();
			$("#I_Grafica_Clasificacion").html('<a href="#noir" onclick="grafica_clasificacion(\''+Inicia_Id_Clasificacion+'\',\''+Inicia_Nombre_Clasificacion+'\')">Grafica Clasificación-></a>');
		}
		
		if(Div_Graf=='bar-chart-2'){
			strDatos+="&Id_Subfamilia="+Id;
			$("#T_Activos_Clas_Subfamilia").show();
			$("#I_Grafica_Subfamilia").show();
			$("#I_Grafica_Subfamilia").html('<a href="#noir" onclick="grafica_subfamilia(\''+Inicia_Id_Subfamilia+'\',\''+Inicia_Nombre_Subfamilia+'\')">Grafica Subfamilia-></a>');
		}
		
		
		strDatos+="&Estatus_Reg=1";
		strDatos+="&accion=consultar";
		$.ajax({
            type: "POST",
            url: "../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",
            async: false,
            data: strDatos,
            dataType: "html",
            beforeSend: function (xhr) {

            },
			
            success: function (data) {
                json = eval("(" + data + ")");
                if (json.totalCount > 0) {
					var tabla="";
					tabla+='<div class="box-body"><div class="table-responsive">';
					tabla+='  <table id="'+Datatable+'" class="table table-bordered table-striped table-chs">';
					tabla+='	<thead>';
					tabla+='	  <tr>';
					tabla+='		<th>AF/BC</th>';
					tabla+='		<th>Nombre Activo</th>';
					tabla+='		<th>Marca</th>';
					tabla+='		<th>Modelo</th>';
					tabla+='		<th>No. Serie</th>';
					tabla+='		<th>Ubicación Primaria</th>';
					tabla+='		<th>Ubicación Secundaria</th>';
					tabla+='		<th>Usuario Responsable</th>';
					tabla+='	  </tr>';
					tabla+='	</thead>';
					tabla+='	<tbody>';
					for(var i=0;i < json.totalCount; i++){
						tabla+='	  <tr>';
						tabla+='		<td>'+json.data[i].AF_BC+'</td>';
						tabla+='		<td>'+json.data[i].Nombre_Activo+'</td>';
						tabla+='		<td>'+json.data[i].Marca+'</td>';
						tabla+='		<td>'+json.data[i].Modelo+'</td>';
						tabla+='		<td>'+json.data[i].NumSerie+'</td>';
						tabla+='		<td>'+json.data[i].Desc_Ubic_Prim+'</td>';
						tabla+='		<td>'+json.data[i].Desc_Ubic_Sec+'</td>';
						tabla+='		<td>'+json.data[i].Nombre_Completo+'</td>';
						tabla+='	  </tr>';	
					}
					tabla+='	</tbody>';
					tabla+='  </table>';
					tabla+='</div></div><br>';
					
					$("#"+Div_Graf).html("");
					$("#"+Div_Graf).hide();
					$("#"+Div_Html).html(tabla);
					$('#'+Datatable).DataTable({
					  "processing": true,
					  "paging": true,
					  "lengthChange": false,
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
					$("#"+Div_Graf).html("");
					mensajesalerta("Informaci&oacute;n", "No se encontraron Resultados", "info", "dark");
				}
            },
            error: function () {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
            }
        });
	}
	
	
	grafica_subfamilia=function(Id_Familia_Graf="", nombre="", valorY=""){
		$("#bar-chart-2").show();
		$("#I_Grafica_Familia").hide();
		$("#I_Grafica_Subfamilia").hide();
		$("#T_Activos_Clas_Subfamilia").hide();
		
		var Id_Area=$("#idareasesion").val();
		
		var strDatos="";
		var Subtitulo="";
		
		strDatos+="Id_Area="+Id_Area;
		strDatos+="&accion=grafica_subfamilias";
		
		if(Id_Familia_Graf==""){
			var Id_Familia=$("#cmbfamilia").val();
			var Id_Subfamilia=$("#cmbsubfamilia").val();
		
			if($("#check_familia").prop('checked')==true){
				if(Id_Familia!="-1"){
					strDatos += "&Id_Familia="+Id_Familia;
					Subtitulo+="Familia: "+$("#cmbfamilia option:selected").html();				
				}
			}
			
			if($("#check_subfamilia").prop('checked')==true){
				if(Id_Subfamilia!="-1"){
					strDatos += "&Id_Subfamilia="+Id_Subfamilia;
					Subtitulo+=" Subfamilia: "+$("#cmbsubfamilia option:selected").html();				
				}
			}else{
				Id_Subfamilia="-1";
			}
		}else{
			strDatos += "&Id_Familia="+Id_Familia_Graf;
		}
		
		$.ajax({
            type: "POST",
            url: "../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",
            async: false,
            data: strDatos,
            dataType: "html",
            beforeSend: function (xhr) {

            },
			
            success: function (data) {
                json = eval("(" + data + ")");
                if (json.totalCount > 0) {
					var Total_Cantidad=0;
					var grafica=[];
					var Desc_Cadena="";
					
					//Variables
					var categorias=[];
					var data_grafica=[];
					var data_grafica_categories=[];
					var data_grafica_data=[];
					for(var i=0;i < json.totalCount; i++){
						Total_Cantidad=parseInt(json.Total_Filas);
						
						if(Id_Familia_Graf!=""){
							if(valorY!=""){
								var resultado = convertir_a_porcentaje(json.Total_Filas, json.data[i].RecuentoFilas, valorY);
							}else{
								var resultado = convertir_a_porcentaje(json.Total_Filas, json.data[i].RecuentoFilas, 100);
							}
							Desc_Cadena=json.data[i].Desc_Subfamilia+' '+' ('+json.data[i].RecuentoFilas+')';
						
							grafica[i]={
								name: Desc_Cadena,
								y: resultado,
								//color:'#05cc50',
								key:json.data[i].Id_Subfamilia
							};
						}else{
							var resultado = convertir_a_porcentaje(json.Total_Filas, json.data[i].RecuentoFilas, 100);
						}
						
						
						//////////
						for(var j=0;j < json.data[i].CountSubfamilia; j++){
							data_grafica_categories[j]=json.data[i].Subfamilia[j].Desc_Subfamilia;
							data_grafica_data[j]=convertir_a_porcentaje(json.data[i].RecuentoFilas, json.data[i].Subfamilia[j].RecuentoFilasSubfamilia, resultado);
						}
						
						categorias[i]=json.data[i].Desc_Familia;
						data_grafica[i]={
							y: resultado,
							color:coloresHTML[i],
							drilldown:{
								name:json.data[i].Desc_Familia,
								categories:data_grafica_categories,
								data:data_grafica_data
							}
						};
						data_grafica_data=[];
						data_grafica_categories=[];
					}
					
					if(Id_Familia_Graf==""){
						var colors = Highcharts.getOptions().colors,
						categories = categorias,
						data = data_grafica,
						browserData = [],
						versionsData = [],
						i,
						j,
						dataLen = data.length,
						drillDataLen,
						brightness;


						// Build the data arrays
						for (i = 0; i < dataLen; i += 1) {

							// add browser data
							browserData.push({
								name: categories[i],
								y: data[i].y,
								color: data[i].color,
								key:json.data[i].Id_Familia
							});

							// add version data
							drillDataLen = data[i].drilldown.data.length;
							for (j = 0; j < drillDataLen; j += 1) {
								brightness = 0.2 - (j / drillDataLen) / 5;
								versionsData.push({
									name: data[i].drilldown.categories[j],
									y: data[i].drilldown.data[j],
									color: Highcharts.Color(data[i].color).brighten(brightness).get()
								});
							}
						}
						
						
						console.log(data);
						
					
						Highcharts.chart('bar-chart-2', {
							chart: {
								type: 'pie'
							},
							title: {	
								text: 'Indicadores Familias y Subfamilias'
							},
							subtitle: {
								//text: 'Source: <a href="http://statcounter.com" target="_blank">statcounter.com</a>'
							},
							yAxis: {
								title: {
									text: 'Total percent market share'
								}
							},
							plotOptions: {
								pie: {
									shadow: false,
									center: ['50%', '50%']
								}
							},
							tooltip: {
								valueSuffix: '%'
							},
							series: [{
								name: 'Familia',
								data: browserData,
								size: '60%',
								dataLabels: {
									formatter: function () {
										return this.y > 5 ? this.point.name : null;
									},
									color: '#ffffff',
									distance: -30
								},
								point: {
									events: {
										click: function () {
											grafica_subfamilia(this.options.key, this.options.name,this.options.y);
										}
									}
								}
							}, {
								name: 'Subfamilia',
								data: versionsData,
								size: '80%',
								innerSize: '60%',
								dataLabels: {
									formatter: function () {
										// display only if larger than 1
										return this.y > 1 ? '<b>' + this.point.name + ':</b> ' +
											this.y + '%' : null;
									}
								},
								id: 'versions'
							}],
							responsive: {
								rules: [{
									condition: {
										maxWidth: 400
									},
									chartOptions: {
										series: [{
											id: 'versions',
											dataLabels: {
												enabled: false
											}
										}]
									}
								}]
							}
						});
					}
					else{
						Inicia_Id_Subfamilia=Id_Familia_Graf;
						Inicia_Nombre_Subfamilia=nombre;
						$("#I_Grafica_Familia").show();
						$("#I_Grafica_Familia").html("<a href='#noir' onclick='grafica_subfamilia()'>Grafica Familia-></a>");
						
						Highcharts.chart('bar-chart-2', {
							chart: {
								plotBackgroundColor: null,
								plotBorderWidth: null,
								plotShadow: false,
								type: 'pie'
							},
							title: {
								text: 'Familia: '+ nombre
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
										format: '<b>{point.name}</b>: {point.percentage:.1f} %',
										style: {
											color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
										}
									},
									point: {
										events: {
											click: function () {
												tabla_activos(this.options.key,'T_Activos_Clas_Subfamilia','tablaactivos2','bar-chart-2');
											}
										}
									}
								}
							},
							series: [{
								name: 'P',
								colorByPoint: true,
								data: grafica
							}]
						});
					}	
						
					/*
					Highcharts.chart('bar-chart-2', {
						chart: {
							type: 'column'
						},
						title: {
							text: 'Grafica por Subfamilia'
						},
						
						subtitle: {
							text: Subtitulo
						},
					
						xAxis: {
							type: 'category'
						},
						yAxis: {
							title: {
								text: 'Total Porcentaje Subfamilia'
							}
					
						},
						
						legend: {
							enabled: false
						},
						plotOptions: {
							series: {
								borderWidth: 0,
								dataLabels: {
									enabled: true,
									format: '{point.y:.1f}%'
								}
							}
						},
					
						tooltip: {
							headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
							pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
						},
					
						series: [{
							name: 'Subfamilias',
							colorByPoint: true,
							data: grafica
						}]
					});
					*/
				}else{
					$("#bar-chart-2").html("");
					mensajesalerta("Informaci&oacute;n", "No se encontraron Resultados", "info", "dark");
				}
            },
            error: function () {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
            }
        });
	
	}
	
	convertir_a_porcentaje=function(Total, RecuentoFilas, Porcentaje){
		var Total_Cantidad=0;
		var valor_y=0;
		Total_Cantidad=parseInt(Total);
		valor_y=(parseInt(RecuentoFilas)/Total_Cantidad)*Porcentaje;
		//Redondear a 2 decimales
		var flotante = parseFloat(valor_y);
		return Math.round(flotante*Math.pow(10,2))/Math.pow(10,2);
	}

	
  //Highcharts
$(document).ready(function(){
	Estatus();
	Clase();
	grafica_estatus_activos();
	grafica_clasificacion();
	grafica_subfamilia();
	
	//Combobox Estatus
	function Estatus() {
		var Id_Area=$("#idareasesion").val();
		var resultado=new Array();
		data={Estatus_Reg: "1", accion: "consultar"};
		resultado=cargo_cmb("../fachadas/activos/siga_cat_estatus/Siga_cat_estatusFacade.Class.php",false, data);
		if(resultado.totalCount>0){
			$('#cmbestatus').append($('<option>', { value: "-1" }).text("--Estatus Activo--"));
			for(var i = 0; i < resultado.totalCount; i++){
				$('#cmbestatus').append($('<option>', { value: resultado.data[i].Id_Estatus }).text(resultado.data[i].Desc_Estatus));
			}
		}else{
			$('#cmbestatus').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	//Fin Combobox Estatus
	
	//Combobox Clase, Clasificación
	function Clase() {
		var Id_Area=$("#idareasesion").val();
		var resultado=new Array();
		data={Estatus_Reg: "1", Id_Area:Id_Area, accion: "consultar"};
		resultado=cargo_cmb("../fachadas/activos/siga_cat_clase/Siga_cat_claseFacade.Class.php",false, data);
		if(resultado.totalCount>0){
			$('#cmbclase').append($('<option>', { value: "-1" }).text("--Clase--"));
			for(var i = 0; i < resultado.totalCount; i++){
				$('#cmbclase').append($('<option>', { value: resultado.data[i].Id_Clase }).text(resultado.data[i].Desc_Clase));
			}
		}else{
			$('#cmbclase').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	$( "#cmbclase" ).change(function() {
		if($(this).val()!="-1"){
			Clasificacion($(this).val());
		}else{
			$('#cmbclasificacion').children('option').remove();
			$('#cmbclasificacion').append($('<option>', { value: "-1" }).text("--Clasificación--"));
		}
	});
	
	function Clasificacion(Id_Clase) {
		$('#cmbclasificacion').children('option').remove();
		var resultado=new Array();
		data={Estatus_Reg: "1",Id_Clase:Id_Clase, accion: "consultar"};
		resultado=cargo_cmb("../fachadas/activos/siga_cat_clasificacion/Siga_cat_clasificacionFacade.Class.php",false, data);
		if(resultado.totalCount>0){
			$('#cmbclasificacion').append($('<option>', { value: "-1" }).text("--Clasificación--"));
			for(var i = 0; i < resultado.totalCount; i++){
				$('#cmbclasificacion').append($('<option>', { value: resultado.data[i].Id_Clasificacion }).text(resultado.data[i].Desc_Clasificacion));
			}
		}else{
			$('#cmbclasificacion').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	//Fin Combobox Clase, Clasificación
	
	//Combobox Familia, Subfamilia
	familia();
	
	function familia() {
		var Id_Area=$("#idareasesion").val();
		var resultado=new Array();
		data={Estatus_Reg: "1", Id_Area:Id_Area, accion: "consultar"};
		resultado=cargo_cmb("../fachadas/activos/siga_cat_familia/Siga_cat_familiaFacade.Class.php",false, data);
		if(resultado.totalCount>0){
			$('#cmbfamilia').append($('<option>', { value: "-1" }).text("--Familia--"));
			for(var i = 0; i < resultado.totalCount; i++){
				$('#cmbfamilia').append($('<option>', { value: resultado.data[i].Id_Familia }).text(resultado.data[i].Desc_Familia));
			}
			
		}else{
			$('#cmbfamilia').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	$("#cmbestatus").change(function() {
		if($(this).val()!="-1"){
			grafica_estatus_activos($(this).val());
		}else{
			grafica_estatus_activos("");
		}
	});
	
	
	$("#cmbfamilia").change(function() {
		if($(this).val()!="-1"){
			grafica_subfamilia($(this).val(),$("#cmbfamilia option:selected").html(),"");
		}else{
			grafica_subfamilia();
		}
	});
	
	$("#cmbclase").change(function() {
		if($(this).val()!="-1"){
			grafica_clasificacion($(this).val(),$("#cmbclase option:selected").html(),"");
		}else{
			grafica_clasificacion();
		}
	});
	
	//Fin Combobox Familia, Subfamilia

  });//ND

</script>
</body>
</html>
