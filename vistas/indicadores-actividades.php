
      
      <!-- Main row -->
      <div class="row">
        <!-- Tab panes -->
       

            <div class="col-md-6">
              <div class="box">
                <!-- /.box-header -->
				<div class="row">
					<div class="box-body">
					  <div class="col-md-10 col-md-offset-1">
						  <div class="row">
							<div class="col-md-5">
							  <div class="form-group">
								<span><font color="red">*</font></span>
								<label class="control-label" style="font-size: 11px;">Fecha Inicial</label>
								<input type="text" class="form-control pull-right datepicker" id="Fecha_Inicial_Serv_Reg">	
							  </div>
							</div>
							<div class="col-md-5">
							  <div class="form-group">
								<span><font color="red">*</font></span>
								<label class="control-label" style="font-size: 11px;">Fecha Final</label>
								<input type="text" class="form-control pull-right datepicker" id="Fecha_Final_Serv_Reg">	
							  </div>
							</div>
							<div class="col-md-2">
							  <div class="form-group">
								<span><font color="red"></font></span>
								<label class="control-label" style="font-size: 11px;">Filtrar</label>
								<button type="button" class="form-control btn chs" onclick="grafica_serv_registrados()">Filtrar</button>
							  </div>
							</div>
							
						  </div>
					  </div>
					  <div id="pie-chart-1" class="highcharts pie col-md-12 col-sm-12 col-xs-12 form-group"></div>
					</div>
				</div>
              </div><!-- /.box -->
            </div>

            <div class="col-md-6">
              <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                  <div id="pie-chart-2" class="highcharts pie"></div>
                </div>
              </div><!-- /.box -->
            </div>

            <div class="col-md-6">
              <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                  <div id="bar-chart-1" class="highcharts bar"></div>
                </div>
              </div><!-- /.box -->
            </div>

            <div class="col-md-6">
              <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                  <div id="bar-chart-2" class="highcharts bar"></div>
                </div>
              </div><!-- /.box -->
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
  
	//Date picker
	$('#Fecha_Inicial_Serv_Reg').datepicker({ 
		format: 'dd/mm/yyyy',
	}).datepicker();
	
	$('#Fecha_Final_Serv_Reg').datepicker({ 
		format: 'dd/mm/yyyy',
	}).datepicker();
  
  
  var Mes_Actual=moment().format('MM'); 	
  var Anio_Actual=moment().format('YYYY'); 
  var Dia_Mes_Inicial="01";
  var Dia_Mes_Final=moment(Anio_Actual+"-"+Mes_Actual, "YYYY-MM").daysInMonth();  
  
  var Fecha_I_Ready=Dia_Mes_Inicial+"/"+Mes_Actual+"/"+Anio_Actual;
  var Fecha_F_Ready=Dia_Mes_Final+"/"+Mes_Actual+"/"+Anio_Actual;
	
  //Highcharts
  
  grafica_serv_registrados=function(Fecha_Inicial="", Fecha_Final=""){
		var strDatos="";
		var Id_Area=$("#idareasesion").val();
		var Array_param=[];
		var Fecha_I="";
		var Fecha_F="";
		if(Fecha_Inicial!=""&&Fecha_Final!=""){
			$("#Fecha_Inicial_Serv_Reg").val(Fecha_Inicial);
			$("#Fecha_Final_Serv_Reg").val(Fecha_Final);
			Fecha_I=Quitar_Diagonal_Fecha(Fecha_Inicial,"aaaammdd");
			Fecha_F=Quitar_Diagonal_Fecha(Fecha_Final,"aaaammdd");
			Array_param[0]=Fecha_I;
			Array_param[1]=Fecha_F;
			
		}else{
			Fecha_I=Quitar_Diagonal_Fecha($("#Fecha_Inicial_Serv_Reg").val(),"aaaammdd");
			Fecha_F=Quitar_Diagonal_Fecha($("#Fecha_Final_Serv_Reg").val(),"aaaammdd");
			Array_param[0]=Fecha_I;
			Array_param[1]=Fecha_F;
		}
		
		strDatos={
			Id_Area:Id_Area,
			Array_Param_G:Array_param,
			accion:"grafica_servicios_registrados"
		}
		
		$.ajax({
            type: "POST",
            url: "../fachadas/activos/siga_actividades/Siga_actividadesFacade.Class.php",
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
						var Desc_Categoria="";
						Total_Cantidad=parseInt(json.Total_Filas);
						valor_y=(parseInt(json.data[i].RecuentoFilas)/Total_Cantidad)*100;
						
						//Redondear a un decimal
						var flotante = parseFloat(valor_y);
						var resultado = Math.round(flotante*Math.pow(10,1))/Math.pow(10,1);
						
						Desc_Categoria='('+resultado+'%) '+json.data[i].Desc_Tipo_Actividad;
							
						grafica[i]={
							name: Desc_Categoria,
							y: valor_y
							//color:'#05cc50',
						};
					}
					
					Highcharts.chart('pie-chart-1', {
						chart: {
							plotBackgroundColor: null,
							plotBorderWidth: null,
							plotShadow: false,
							type: 'pie',
							options3d: {
								enabled: true,
								alpha: 45,
								beta: 0
							}
						},
						title: {
							text: 'Actividades Registradas'
						},
						tooltip: {
							pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
						},
						plotOptions: {
							pie: {
								allowPointSelect: true,
								cursor: 'pointer',
								depth: 35,
								dataLabels: {
									enabled: false,
									format: '{point.name}'
								},
								showInLegend: true
							}
						},
						series: [{
							name: 'Brands',
							colorByPoint: true,
							data: grafica
						}]
					});
					
					
				}else{
					mensajesalerta("Informaci&oacute;n", "No se encontraron Resultados", "info", "dark");
				}
            },
            error: function () {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
            }
        });
	
  }
  
  Quitar_Diagonal_Fecha=function(Fecha, Formato){
	var Fech_Result="";
	
	if(Fecha!=""){
		if(Formato=="aaaammdd"){
			Fech_Result=Fecha[6]+""+Fecha[7]+""+Fecha[8]+""+Fecha[9]+""+Fecha[3]+""+Fecha[4]+""+Fecha[0]+""+Fecha[1];
		}
	}else{
		Fech_Result=Fecha;
	}
	
	return Fech_Result;
  }
  
  $(document).ready(function(){
	grafica_serv_registrados(Fecha_I_Ready, Fecha_F_Ready);
  
	
	var colors = Highcharts.getOptions().colors,
    categories = [
        "Chrome",
        "Firefox",
        "Internet Explorer",
        "Safari",
        "Edge",
        "Opera",
        "Other"
    ],
    data = [
        {
            "y": 62.74,
            "color": colors[2],
            "drilldown": {
                "name": "Chrome",
                "categories": [
                    "Chrome v65.0",
                    "Chrome v64.0",
                    "Chrome v63.0",
                    "Chrome v62.0",
                    "Chrome v61.0",
                    "Chrome v60.0",
                    "Chrome v59.0",
                    "Chrome v58.0",
                    "Chrome v57.0",
                    "Chrome v56.0",
                    "Chrome v55.0",
                    "Chrome v54.0",
                    "Chrome v51.0",
                    "Chrome v49.0",
                    "Chrome v48.0",
                    "Chrome v47.0",
                    "Chrome v43.0",
                    "Chrome v29.0"
                ],
                "data": [
                    0.1,
                    1.3,
                    53.02,
                    1.4,
                    0.88,
                    0.56,
                    0.45,
                    0.49,
                    0.32,
                    0.29,
                    0.79,
                    0.18,
                    0.13,
                    2.16,
                    0.13,
                    0.11,
                    0.17,
                    0.26
                ]
            }
        },
        {
            "y": 10.57,
            "color": colors[1],
            "drilldown": {
                "name": "Firefox",
                "categories": [
                    "Firefox v58.0",
                    "Firefox v57.0",
                    "Firefox v56.0",
                    "Firefox v55.0",
                    "Firefox v54.0",
                    "Firefox v52.0",
                    "Firefox v51.0",
                    "Firefox v50.0",
                    "Firefox v48.0",
                    "Firefox v47.0"
                ],
                "data": [
                    1.02,
                    7.36,
                    0.35,
                    0.11,
                    0.1,
                    0.95,
                    0.15,
                    0.1,
                    0.31,
                    0.12
                ]
            }
        },
        {
            "y": 7.23,
            "color": colors[0],
            "drilldown": {
                "name": "Internet Explorer",
                "categories": [
                    "Internet Explorer v11.0",
                    "Internet Explorer v10.0",
                    "Internet Explorer v9.0",
                    "Internet Explorer v8.0"
                ],
                "data": [
                    6.2,
                    0.29,
                    0.27,
                    0.47
                ]
            }
        },
        {
            "y": 5.58,
            "color": colors[3],
            "drilldown": {
                "name": "Safari",
                "categories": [
                    "Safari v11.0",
                    "Safari v10.1",
                    "Safari v10.0",
                    "Safari v9.1",
                    "Safari v9.0",
                    "Safari v5.1"
                ],
                "data": [
                    3.39,
                    0.96,
                    0.36,
                    0.54,
                    0.13,
                    0.2
                ]
            }
        },
        {
            "y": 4.02,
            "color": colors[5],
            "drilldown": {
                "name": "Edge",
                "categories": [
                    "Edge v16",
                    "Edge v15",
                    "Edge v14",
                    "Edge v13"
                ],
                "data": [
                    2.6,
                    0.92,
                    0.4,
                    0.1
                ]
            }
        },
        {
            "y": 1.92,
            "color": colors[4],
            "drilldown": {
                "name": "Opera",
                "categories": [
                    "Opera v50.0",
                    "Opera v49.0",
                    "Opera v12.1"
                ],
                "data": [
                    0.96,
                    0.82,
                    0.14
                ]
            }
        },
        {
            "y": 7.62,
            "color": colors[6],
            "drilldown": {
                "name": 'Other',
                "categories": [
                    'Other'
                ],
                "data": [
                    7.62
                ]
            }
        }
    ],
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
        color: data[i].color
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

// Create the chart
Highcharts.chart('pie-chart-2', {
    chart: {
        type: 'pie'
    },
    title: {
        text: 'Browser market share, January, 2018'
    },
    subtitle: {
        text: 'Source: <a href="http://statcounter.com" target="_blank">statcounter.com</a>'
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
        name: 'Browsers',
        data: browserData,
        size: '60%',
        dataLabels: {
            formatter: function () {
                return this.y > 5 ? this.point.name : null;
            },
            color: '#ffffff',
            distance: -30
        }
    }, {
        name: 'Versions',
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

  });//ND

</script>
</body>
</html>
