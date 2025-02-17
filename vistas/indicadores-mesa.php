<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
<style>
	
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
      <!-- Main row -->
      <div class="row">
        <!-- Tab panes -->
            <div class="gray">
              <div class="row">
                <div class="col-md-10 col-md-offset-1">
                  <div class="row">
					<div class="col-md-3 col-sm-12 col-xs-12">
						<h4 class="box-title">Filtros Activos</h4>
					</div>
				  </div>
				  <div class="row">
                    <div class="col-md-4 col-sm-12 col-xs-12">
						<label  class="control-label" style="font-size: 11px;">Ubicaci&oacute;n Primaria</label>
						<select class="form-control" id="cmbubicprim">
						</select>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
						<div class="form-group">
						<label  class="control-label" style="font-size: 11px;">Ubicaci&oacute;n Secundaria</label>
							<select class="form-control" id="cmbubicsec">
								<option value="-1">--Ubicación Secundaria--</option>
							</select>
						</div>
                    </div>
					<div class="col-md-4 col-sm-12 col-xs-12">
						<div class="form-group">
						<label  class="control-label" style="font-size: 11px;">Clase</label>
							<select class="form-control" id="cmbclase">
							</select>
						</div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3 col-sm-12 col-xs-12">
						<div class="form-group">
							<label class="control-label"  style="font-size: 11px;">Clasificación</label>
							<select class="form-control" id="cmbclasificacion">
								<option value="-1">--Clasificación--</option>
							</select>
						</div>
                    </div>
                    <div class="col-md-2 col-sm-12 col-xs-12">
						<div class="form-group">
							<label  class="control-label" style="font-size: 11px;">Familia</label>
							<select class="form-control" id="cmbfamilia">
							</select>
						</div>
                    </div>
                    <div class="col-md-2 col-sm-12 col-xs-12">
						<div class="form-group">
							<label  class="control-label" style="font-size: 11px;">Subfamilia</label>
							<select class="form-control" id="cmbsubfamilia">
								<option value="-1">--Subfamilia--</option>
							</select>
						</div>
					</div>
					<div class="col-md-2 col-sm-12 col-xs-12">
						<div class="form-group">
							<label  class="control-label" style="font-size: 11px;">A&ntilde;o</label>
							<select class="form-control" id="cmbanios">
								<?php
									$anioActual = date("Y");
									for($anioInicio = 2018; $anioInicio <= $anioActual; $anioInicio++) {
										echo "<option value='" . $anioInicio . "' " . ($anioInicio == $anioActual ? "selected" : "") . ">" . $anioInicio . "</option>";
									}
								?>
							</select>
						</div>
                    </div>
                  </div>
				  <div class="row">
					<div class="col-md-3 col-sm-12 col-xs-12">
						<h4 class="box-title">Filtros Mesa de Ayuda</h4>
					</div>
				  </div>
				  <div class="row">
					<div class="col-md-3 col-sm-12 col-xs-12">
						<div class="form-group">
							<label  class="control-label" style="font-size: 11px;">Sección</label>
							<select class="form-control" id="cmbseccion">
							</select>
						</div>	
                    </div>
					<div class="col-md-3 col-sm-12 col-xs-12">
						<div class="form-group">
							<label class="control-label" style="font-size: 11px;">Categoría</label>	
							<select class="form-control" id="cmbcategoria">
								<option value="-1">--Categoría--</option>
							</select>
						</div>	
					</div>
					<div class="col-md-3 col-sm-12 col-xs-12">
						<div class="form-group">
							<label class="control-label" style="font-size: 11px;">Subcategoria</label>	
							<select class="form-control"  id="cmbsubcategoria">
								<option value="-1">--Subcategoría--</option>
							</select>
						</div>	
					</div>
					<div class="col-md-3 col-sm-12 col-xs-12">
						<div class="form-group">
							<label class="control-label" style="font-size: 11px;">Gestor</label>	
							<select class="form-control"  id="cmbgestores">
								<option value="-1">--Gestores--</option>
							</select>
						</div>	
					</div>
					
					
					<div class="col-md-3 col-sm-12 col-xs-12">
						<div class="form-group">
							<label  class="control-label" style="font-size: 11px;">Motivo Real</label>
							<select class="form-control" id="cmb_motivo_real">
							</select>
						</div>	
                    </div>
					<div class="col-md-3 col-sm-12 col-xs-12">
						<div class="form-group">	
							<label  class="control-label" style="font-size: 11px;">Motivo Aparente</label>
							<select class="form-control" id="cmb_motivo_aparente">
							</select>
						</div>	
                    </div>
					<div class="col-md-3 col-sm-12 col-xs-12">
						<div class="form-group">
							<label  class="control-label" style="font-size: 11px;">Estatus Final del Equipo</label>
							<select class="form-control" id="cmb_estatus_equipo">
							</select>
						</div>	
                    </div>
				  </div>
				  
				  <div class="row">
                    <div class="col-md-4">
						<br>
						<button type="button" class="btn chs" onclick="indicador_servicios_registrados();barra_indicador_reportes_por_area();pie_indicador_reportes_por_area();barra_reporte_por_gestor();barra_reporte_mantenimientos();cargar_estatus_proceso();limpia_controles();">Filtrar</button>
                    </div>
                  </div>
               
                </div>
             
              </div>
            </div>
            
			<div class="col-md-12" style="display:none">
				<div class="box">
					<!-- /.box-header -->
					<div class="box-body" align="center">
						<div class="col-md-3 col-sm-12 col-xs-12 form-group"></div>
						<div class="col-md-2 col-sm-12 col-xs-12 form-group">
							<span><font color="red">*</font></span>
							<label class="control-label" style="font-size: 11px;">Fecha Inicial</label>
							<input type="text" class="form-control pull-right datepicker" id="Fecha_Inicial_Serv_Reg">
						</div>
						<div class="col-md-2 col-sm-12 col-xs-12 form-group">
							<span><font color="red">*</font></span>
							<label class="control-label" style="font-size: 11px;">Fecha Final</label>
							<input type="text" class="form-control pull-right datepicker" id="Fecha_Final_Serv_Reg">
						</div>
						<div class="col-md-2 col-sm-12 col-xs-12 form-group">
							<span><font color="red">*</font></span>
							<label class="control-label" style="font-size: 11px;">Filtrar</label>
							<button type="button" class="form-control btn chs" onclick="grafica_servicios_registrados()">Filtrar</button>
						</div>
						<div class="col-md-3 col-sm-12 col-xs-12 form-group"></div>
						<div class="col-md-12 col-sm-12 col-xs-12 form-group" align="center">
							<label id="Regresar_Grafica_1"></label>
						</div>
						<div align="center" class="col-md-12 col-sm-12 col-xs-12 form-group" id="Alerta_Graf_y_Tabla_1">
						</div>
						
						<div id="pie-chart-2" class="highcharts pie col-md-12 col-sm-12 col-xs-12 form-group"></div>
						
					</div>
				</div>
			</div>	
	  
			
</div>
	  
	  <div class="modal-body nopsides">
			<div class="tabset">
			  <!-- Tab 1 -->
			  <input type="radio" name="tabset" onclick="cargar_estatus_proceso()" id="tab1" aria-controls="inventario" checked>
			  <label for="tab1">Estatus Tickets M.A</label>
			  <!-- Tab 2 -->
			  <input type="radio" name="tabset" onclick="indicador_servicios_registrados()" id="tab2" aria-controls="bajas">
			  <label for="tab2">Serv. Reportador por Mes</label>
			  <!-- Tab 3 -->
			  <input type="radio" name="tabset" onclick="barra_indicador_reportes_por_area()" id="tab3" aria-controls="reubicacion">
			  <label for="tab3">Rep. Registrados por Area</label>
			  <!-- Tab 4 -->
			  <input type="radio" name="tabset" onclick="pie_indicador_reportes_por_area()" id="tab4" aria-controls="graf4">
			  <label for="tab4">Rep. Registrados por Area</label>
			  <!-- Tab 5 -->
				<!--
			  <input type="radio"  name="tabset" onclick="pie_servicios_registrados_por_mes()" id="tab5" aria-controls="serv_reg_por_mes">
			  <label for="tab5">Rep. Registrados por Mes</label>
			  -->
				<!-- Tab 6 -->
			  <input type="radio" name="tabset" onclick="barra_reporte_por_gestor()" id="tab6" aria-controls="rep_reg_por_gestor">
			  <label for="tab6">Rep. Registrados por Gestor</label>
			  <!-- Tab 7 -->
			  <input type="radio" name="tabset" onclick="barra_reporte_mantenimientos();" id="tab7" aria-controls="rep_mantenimientos">
			  <label for="tab7">Rep. Mantenimientos</label>
			 
			  
			  <div class="tab-panels">
				<section id="inventario" class="tab-panel">
					<div class="box-body" align="center">
					  <div class="col-md-5 col-sm-5 col-xs-5"></div>
					  <div class="col-md-2">
						  <label  class="control-label" style="font-size: 11px;">Meses</label>
							<select class="form-control" id="cmbmeses_graf_1" name="cmbmeses_graf_1">
								<option value="Anual">ANUAL</option>
								<option value="01">ENERO</option>
								<option value="02">FEBRERO</option>
								<option value="03">MARZO</option>
								<option value="04">ABRIL</option>
								<option value="05">MAYO</option>
								<option value="06">JUNIO</option>
								<option value="07">JULIO</option>
								<option value="08">AGOSTO</option>
								<option value="09">SEPTIEMBRE</option>
								<option value="10">OCTUBRE</option>
								<option value="11">NOVIEMBRE</option>
								<option value="12">DICIEMBRE</option>
							</select>
						</div>
						<div class="col-md-5 col-sm-5 col-xs-5"></div>
					  <div id="bar-chart-1" class="highcharts bar"></div>
					</div>  
				</section>
				<section id="bajas" class="tab-panel">
					<div class="box-body">
						<div id="container"></div>
					</div>
				</section>
				<section id="reubicacion" class="tab-panel">
					<div class="box-body">
						<div class="col-md-5"></div>
						<div class="col-md-2">
						  <label  class="control-label" style="font-size: 11px;">Meses</label>
							<select class="form-control" id="cmbmeses_barra" name="cmbmeses_barra">
								<option value="01">ENERO</option>
								<option value="02">FEBRERO</option>
								<option value="03">MARZO</option>
								<option value="04">ABRIL</option>
								<option value="05">MAYO</option>
								<option value="06">JUNIO</option>
								<option value="07">JULIO</option>
								<option value="08">AGOSTO</option>
								<option value="09">SEPTIEMBRE</option>
								<option value="10">OCTUBRE</option>
								<option value="11">NOVIEMBRE</option>
								<option value="12">DICIEMBRE</option>
							</select>
						</div>
						<div class="col-md-5"></div>

						<div class="col-md-12 col-sm-12 col-xs-12 form-group">
							<div id="reportes_realizados" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
						</div>	
					</div>
				</section>
				<section id="graf4" class="tab-panel">
					<div class="box-body">
						<div class="col-md-6">
							<div class="box-body">
								<div class="col-md-5"></div>
								<div class="col-md-3">
								  <label  class="control-label" style="font-size: 11px;">Meses</label>
									<select class="form-control" id="cmbmeses_pie" name="cmbmeses_pie">
										<option value="01">ENERO</option>
										<option value="02">FEBRERO</option>
										<option value="03">MARZO</option>
										<option value="04">ABRIL</option>
										<option value="05">MAYO</option>
										<option value="06">JUNIO</option>
										<option value="07">JULIO</option>
										<option value="08">AGOSTO</option>
										<option value="09">SEPTIEMBRE</option>
										<option value="10">OCTUBRE</option>
										<option value="11">NOVIEMBRE</option>
										<option value="12">DICIEMBRE</option>
									</select>
								</div>
								<div class="col-md-4"></div>
								<div class="col-md-12">
									<div id="highcharts_pie_reportes_realizados" class="highcharts pie" style="min-width: 310px; height: 450px; max-width: 600px; margin: 0 auto"></div>
								</div>	
							</div>
						</div>
			
						<div class="col-md-6">
							<div class="box-body">
								<div class="col-md-12">
									<br><br><br>
									<div id="highcharts_pie_reportes_realizados_ubic_sec" class="highcharts pie"></div>
								</div>	
							</div>
						</div>

					</div>
				</section>
				<!--
				<section id="serv_reg_por_mes" class="tab-panel">
					<div class="box-body">
						<div class="col-md-5"></div>
						<div class="col-md-2">
						  <label  class="control-label" style="font-size: 11px;">Meses</label>
							<select class="form-control" id="cmbmeses_serv_reg_por_mes" name="cmbmeses_serv_reg_por_mes">
								<option value="01">ENERO</option>
								<option value="02">FEBRERO</option>
								<option value="03">MARZO</option>
								<option value="04">ABRIL</option>
								<option value="05">MAYO</option>
								<option value="06">JUNIO</option>
								<option value="07">JULIO</option>
								<option value="08">AGOSTO</option>
								<option value="09">SEPTIEMBRE</option>
								<option value="10">OCTUBRE</option>
								<option value="11">NOVIEMBRE</option>
								<option value="12">DICIEMBRE</option>
							</select>
						</div>
						<div class="col-md-5"></div>
						<div class="col-md-6">
							<div id="highcharts_pie_servicios_registrados_por_mes" class="highcharts pie"></div>
						</div>
						<div class="col-md-6">
							<div id="highcharts_pie_servicios_registrados_por_area_por_mes" class="highcharts pie"></div>
						</div>
						<div class="col-md-12">
							<div id="highcharts_pie_reportes_realizados_por_area_ubic_sec" class="highcharts pie"></div>
						</div>	
					</div>
				</section>
				-->
				<section id="rep_reg_por_gestor" class="tab-panel">
					<div class="box-body">
						<div class="col-md-5"></div>
						<div class="col-md-2">
						  <label  class="control-label" style="font-size: 11px;">Meses</label>
							<select class="form-control" id="cmbmeses_graf_6" name="cmbmeses_graf_6">
								<option value="01">ENERO</option>
								<option value="02">FEBRERO</option>
								<option value="03">MARZO</option>
								<option value="04">ABRIL</option>
								<option value="05">MAYO</option>
								<option value="06">JUNIO</option>
								<option value="07">JULIO</option>
								<option value="08">AGOSTO</option>
								<option value="09">SEPTIEMBRE</option>
								<option value="10">OCTUBRE</option>
								<option value="11">NOVIEMBRE</option>
								<option value="12">DICIEMBRE</option>
							</select>
						</div>
						<div class="col-md-5"></div>

						<div class="col-md-12 col-sm-12 col-xs-12 form-group">
							<div id="graf_rep_real_por_gestor" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
						</div>	
					</div>
				</section>
				<section id="rep_mantenimientos" class="tab-panel">
					<div class="box-body">
						<div class="col-md-3"></div>
						<div class="col-md-2">
						  <label  class="control-label" style="font-size: 11px;">Meses</label>
							<select class="form-control" id="cmbmeses_graf_7" name="cmbmeses_graf_7">
								<option value="Anual">ANUAL</option>
								<option value="01">ENERO</option>
								<option value="02">FEBRERO</option>
								<option value="03">MARZO</option>
								<option value="04">ABRIL</option>
								<option value="05">MAYO</option>
								<option value="06">JUNIO</option>
								<option value="07">JULIO</option>
								<option value="08">AGOSTO</option>
								<option value="09">SEPTIEMBRE</option>
								<option value="10">OCTUBRE</option>
								<option value="11">NOVIEMBRE</option>
								<option value="12">DICIEMBRE</option>
							</select>
						</div>
						<div class="col-md-2">
						  <label  class="control-label" style="font-size: 11px;">Rutina</label>
							<select class="form-control" id="cmbrutina_graf_7" name="cmbmeses_graf_7">
								
							</select>
						</div>
						<div class="col-md-2">
							<label  class="control-label" style="font-size: 11px;">Tabla de Cumplimiento</label>
							<a href="#noir" class="btn btn-round btn-primary form-control" data-toggle="modal" data-target="#modal_tabla_cumplimiento">Click Aquí</a>
						</div>
						
						
						<div class="col-md-3"></div>
						<div class="col-md-12 col-sm-12 col-xs-12 form-group">
							<div id="graf_rep_mantenimientos" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
						</div>	
						
					</div>
				</section>
				
			  </div>
			  
			</div>

		</div>
	  
	  
	  
	<div class="modal fade modalchs" id="modal_tabla_cumplimiento">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header azuldef">
            <button type="button" class="close" id="closeModal_Asist_Esp" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title"><i class="fa fa-check-circle-o" aria-hidden="true"></i>Tabla de Cumplimiento</h4>
          </div>
		  <div class="col-md-2 col-sm-12 col-xs-12 form-group"></div>
		  <div class="col-md-8 col-sm-12 col-xs-12 form-group" id="tabla_de_cumplimiento_PAMP">
		  <div class="col-md-2 col-sm-12 col-xs-12 form-group"></div>
		  </div>	
		</div>
      </div>
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
	$("#cmbmeses_graf_6").val(carga_mes_actual);
	$("#cmbmeses_barra").val(carga_mes_actual);
	$("#cmbmeses_pie").val(carga_mes_actual);
	
	var Id_Area_Login=$("#idareasesion").val();
	if(Id_Area_Login!="5"){
		ubic_prim(Id_Area_Login);
		familia(Id_Area_Login) 
		Clase(Id_Area_Login);
		Seccion(Id_Area_Login);
		carga_motivo_real(Id_Area_Login);
		carga_motivo_aparente(Id_Area_Login);
		carga_estatus_equipo();//No lleva el id del area
	}else{
		$('#cmbubicprim').append($('<option>', { value: "-1" }).text("--Ubicación Primaria (Selecciona un Área)--"));
		$('#cmbclase').append($('<option>', { value: "-1" }).text("--Clase (Selecciona un Área)--"));
		$('#cmbfamilia').append($('<option>', { value: "-1" }).text("--Familia (Selecciona un Área)--"));
	}


	function ubic_prim(Id_Area) {
		var resultado=new Array();
		data={Estatus_Reg: "1",Id_Area:Id_Area, accion: "consultar"};
		resultado=cargo_cmb("../fachadas/activos/siga_cat_ubic_prim/Siga_cat_ubic_primFacade.Class.php",false, data);
		if(resultado.totalCount>0){
			$('#cmbubicprim').append($('<option>', { value: "-1" }).text("--Ubicación Primaria--"));
			for(var i = 0; i < resultado.totalCount; i++){
				$('#cmbubicprim').append($('<option>', { value: resultado.data[i].Id_Ubic_Prim }).text(resultado.data[i].Desc_Ubic_Prim));
			}
		}else{
			$('#cmbubicprim').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	$("#cmbubicprim").change(function() {
		if($(this).val()!="-1"){
			ubic_sec($(this).val());
		}else{
			$('#cmbubicsec').children('option').remove();
			$('#cmbubicsec').append($('<option>', { value: "-1" }).text("--Ubicación Secundaria--"));
		}
	});
	
	function ubic_sec(Id_Ubic_Prim) {
		$('#cmbubicsec').children('option').remove();
		var resultado=new Array();
		data={Estatus_Reg: "1", Id_Ubic_Prim:Id_Ubic_Prim, accion: "consultar"};
		resultado=cargo_cmb("../fachadas/activos/siga_cat_ubic_sec/Siga_cat_ubic_secFacade.Class.php",false, data);
		if(resultado.totalCount>0){
			$('#cmbubicsec').append($('<option>', { value: "-1" }).text("--Ubicación Secundaria--"));
			for(var i = 0; i < resultado.totalCount; i++){
				$('#cmbubicsec').append($('<option>', { value: resultado.data[i].Id_Ubic_Sec }).text(resultado.data[i].Desc_Ubic_Sec));
			}
		}else{
			$('#cmbubicsec').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	function Clase(Id_Area) {
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
	
	$("#cmbclase").change(function() {
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
	
	function familia(Id_Area) {
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
	
	$("#cmbfamilia").change(function() {
		if($(this).val()!="-1"){
			Subfamilia($(this).val());
		}else{
			$('#cmbsubfamilia').children('option').remove();
			$('#cmbsubfamilia').append($('<option>', { value: "-1" }).text("--Subfamilia--"));
		}
	});
	
	function Subfamilia(Id_Familia) {
		$('#cmbsubfamilia').children('option').remove();
		var resultado=new Array();
		data={Estatus_Reg: "1", Id_Familia: Id_Familia, accion: "consultar"};
		resultado=cargo_cmb("../fachadas/activos/siga_cat_subfamilia/Siga_cat_subfamiliaFacade.Class.php",false, data);
		if(resultado.totalCount>0){
			$('#cmbsubfamilia').append($('<option>', { value: "-1" }).text("--Subfamilia--"));
			for(var i = 0; i < resultado.totalCount; i++){
				$('#cmbsubfamilia').append($('<option>', { value: resultado.data[i].Id_Subfamilia }).text(resultado.data[i].Desc_Subfamilia));
			}
		}else{
			$('#cmbsubfamilia').append($('<option>', { value: "-1" }).text("Selecciona una familia"));
		}
	}

	function Seccion(Id_Area) {	
		var resultado=new Array();
		data={Estatus_Reg: "1",Id_Area:Id_Area, accion: "consultar"};
		resultado=cargo_cmb("../fachadas/activos/siga_cat_ticket_seccion/Siga_cat_ticket_seccionFacade.Class.php",false, data);
		if(resultado.totalCount>0){
			$('#cmbseccion').append($('<option>', { value: "-1" }).text("--Sección--"));
			for(var i = 0; i < resultado.totalCount; i++){
				$('#cmbseccion').append($('<option>', { value: resultado.data[i].Id_Seccion }).text(resultado.data[i].Desc_Seccion));
			}
		}else{
			$('#cmbseccion').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	$( "#cmbseccion" ).change(function() {
		var Val=$(this).val();
		if(Val!="-1"){
			cargacategoria(Val);
			gestores(Val);
		}else{
			$('#cmbcategoria').children('option').remove();
			$('#cmbcategoria').append($('<option>', { value: "-1" }).text("--Categoría--"));
		
			$("#cmbsubcategoria").empty();
			$('#cmbsubcategoria').append($('<option>', { value: "-1" }).text("--Subcategoría--"));
			
			$("#cmbgestores").empty();
			$('#cmbgestores').append($('<option>', { value: "-1" }).text("--Gestores--"));
		}
	});
	
	cargacategoria=function(Id_Seccion) {
		var resultado=new Array();
		data={orden:'Desc_Categoria',accion: "consultar",Id_Seccion:Id_Seccion};
		resultado=cargo_cmb("../fachadas/activos/Siga_cat_ticket_categoria/Siga_cat_ticket_categoriaFacade.Class.php",false, data);
        $('#cmbcategoria').empty();
		if(resultado.totalCount>0){
			$('#cmbcategoria').append($('<option selected value="-1">', { value: "-1" }).text("--Categoría--"));
			for(var i = 0; i < resultado.totalCount; i++)
			{
				if (resultado.data[i].Id_Categoria != '') 			
				$('#cmbcategoria').append($('<option>', { value: resultado.data[i].Id_Categoria }).text(resultado.data[i].Desc_Categoria));
			}
		}else{
			$('#cmbcategoria').append($('<option selected value="-1">', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	$("#cmbcategoria").change(function (event){
		if ($("#cmbcategoria").val() != -1)
			cargasubcategoria($("#cmbcategoria").val());
	    else
		{
			$("#cmbsubcategoria").empty();
			$('#cmbsubcategoria').append($('<option>', { value: "-1" }).text("--Subcategoría--"));
		}
	});
	
	function cargasubcategoria(idcategoria){
		var resultado=new Array();
		data={orden:'Desc_Subcategoria',accion: "consultar",Id_Categoria:idcategoria};
		resultado=cargo_cmb("../fachadas/activos/Siga_cat_ticket_subcategoria/Siga_cat_ticket_subcategoriaFacade.Class.php",false, data);
        $('#cmbsubcategoria').empty();
		if(resultado.totalCount>0){
			$('#cmbsubcategoria').append($('<option>', { value: "-1" }).text("--Subcategoría--"));
			for(var i = 0; i < resultado.totalCount; i++)
			{
				if (resultado.data[i].Id_Subcategoria != '') 			
				$('#cmbsubcategoria').append($('<option>', { value: resultado.data[i].Id_Subcategoria }).text(resultado.data[i].Desc_Subcategoria));
			}
		}else{
			$('#cmbsubcategoria').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	gestores=function(Id_Seccion) {
		var resultado=new Array();
		data={Id_Area:Id_Area_Login,Estatus_Reg:'1',accion: "consultar",Id_Seccion:Id_Seccion};
		resultado=cargo_cmb("../fachadas/activos/siga_cat_gestores/Siga_cat_gestoresFacade.Class.php",false, data);
        $('#cmbgestores').empty();
		if(resultado.totalCount>0){
			$('#cmbgestores').append($('<option selected value="-1">', { value: "-1" }).text("--Gestores--"));
			for(var i = 0; i < resultado.totalCount; i++)
			{
				if (resultado.data[i].Id_Usuario!= '') 			
				$('#cmbgestores').append($('<option>', { value: resultado.data[i].Id_Usuario }).text(resultado.data[i].Nombre_Empleado.trim()));
			}
		}else{
			$('#cmbgestores').append($('<option selected value="-1">', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	
	function carga_motivo_real(Id_Area) {
		var resultado=new Array();
		data={accion: "consultar",Estatus_Reg:"1",Id_Area:Id_Area};
		resultado=cargo_cmb("../fachadas/activos/Siga_cat_motivo_real/Siga_cat_motivo_realFacade.Class.php",false, data);
        $('#cmb_motivo_real').empty();
		if(resultado.totalCount>0){
			$('#cmb_motivo_real').append($('<option selected value="-1">', { value: "-1" }).text("--Motivo Real Encontrado--"));
			for(var i = 0; i < resultado.totalCount; i++)
			{ 			
				$('#cmb_motivo_real').append($('<option>', { value: resultado.data[i].Id_Motivo_Real }).text(resultado.data[i].Desc_Motivo_Real));
			}
		}else{
			$('#cmb_motivo_real').append($('<option selected value="-1">', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	function carga_motivo_aparente(Id_Area) {
		var resultado=new Array();
		data={accion: "consultar",Estatus_Reg:"1",Id_Area:Id_Area};
		resultado=cargo_cmb("../fachadas/activos/Siga_cat_motivo_aparente/Siga_cat_motivo_aparenteFacade.Class.php",false, data);
        $('#cmb_motivo_aparente').empty();
		if(resultado.totalCount>0){
			$('#cmb_motivo_aparente').append($('<option selected value="-1">', { value: "-1" }).text("--Motivo Aparente (Reportado)--"));
			for(var i = 0; i < resultado.totalCount; i++)
			{ 			
				$('#cmb_motivo_aparente').append($('<option>', { value: resultado.data[i].Id_Motivo_Aparente }).text(resultado.data[i].Desc_Motivo_Aparente));
			}
		}else{
			$('#cmb_motivo_aparente').append($('<option selected value="-1">', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
  
	function carga_estatus_equipo() {
		var resultado=new Array();
		data={
			accion: "consultar",Estatus_Reg:"1"
			//,Id_Area:$("#idareasesion").val()
		};
		resultado=cargo_cmb("../fachadas/activos/siga_cat_estatus/Siga_cat_estatusFacade.Class.php",false, data);
        $('#cmb_estatus_equipo').empty();
		if(resultado.totalCount>0){
			$('#cmb_estatus_equipo').append($('<option selected value="-1">', { value: "-1" }).text("--Estatus Final del Equipo--"));
			for(var i = 0; i < resultado.totalCount; i++)
			{ 			
				if(resultado.data[i].Id_Estatus!="12"){
					$('#cmb_estatus_equipo').append($('<option>', { value: resultado.data[i].Id_Estatus }).text(resultado.data[i].Desc_Estatus));
				}
			}
		}else{
			$('#cmb_estatus_equipo').append($('<option selected value="-1">', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
  //Highcharts
	var Fech_I_G1="";
	var Fech_F_G1="";

	function grafica_servicios_registrados(Fecha_Inicial="", Fecha_Final=""){
		$("#Regresar_Grafica_1").html("");
		var Id_Area=$("#idareasesion").val();
		var strDatos="";
		var Fecha_I=$("#Fecha_Inicial_Serv_Reg").val();
		var Fecha_F=$("#Fecha_Final_Serv_Reg").val();
		var Estatus=false;
		var Seccion=$("#cmbseccion").val();
		var Id_Categoria=$("#cmbcategoria").val();
		var Id_Subcategoria=$("#cmbsubcategoria").val();
		var Id_Gestor=$("#cmbgestores").val();
		var Id_Motivo_Real=$("#cmb_motivo_real").val();
		var Id_Motivo_Aparente=$("#cmb_motivo_aparente").val();
		var Id_Est_Equipo=$("#cmb_estatus_equipo").val();
	
		strDatos+="Id_Area="+Id_Area;
			
		if(Fecha_Inicial!=""&&Fecha_Final!=""){
			strDatos+="&Fecha_Inicial="+Fecha_Inicial;
			strDatos+="&Fecha_Final="+Fecha_Final;
			Fech_I_G1=Fecha_Inicial;
			Fech_F_G1=Fecha_Final;
			
		}else{
			if(Fecha_I!=""&&Fecha_F!=""){
				Fecha_I=Fecha_Format(Fecha_I,"aaaa-mm-dd");
				Fecha_F=Fecha_Format(Fecha_F,"aaaa-mm-dd");
				
				strDatos+="&Fecha_Inicial="+Fecha_I;
				strDatos+="&Fecha_Final="+Fecha_F;
				strDatos+="&Seccion="+Seccion;
				strDatos+="&Id_Categoria="+Id_Categoria;
				strDatos+="&Id_Subcategoria="+Id_Subcategoria;
				strDatos+="&Id_Gestor="+Id_Gestor;
				strDatos+="&Id_Motivo_Real="+Id_Motivo_Real;
				strDatos+="&Id_Motivo_Aparente="+Id_Motivo_Aparente;
				strDatos+="&Id_Est_Equipo="+Id_Est_Equipo;
				Fech_I_G1=Fecha_I;
				Fech_F_G1=Fecha_F;
				
			}else{
				mensajesalerta("Informaci&oacute;n", "Agrega la Fecha Inicial o Final", "info", "dark");
				Estatus=true;
			}
		}
		strDatos+="&accion=grafica_servicios_registrados";
			
		if(!Estatus){
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
					if(json.totalCount>0){
						$("#Alerta_Graf_y_Tabla_1").hide();
						$("#pie-chart-2").show();
					
						var Total_Cantidad=0;
						var grafica=[];
						var Desc_Cadena="";
						for(var i=0;i < json.totalCount; i++){
							var valor_y=0;
							var Desc="";
							Total_Cantidad=parseInt(json.Total_Filas);
							valor_y=(parseInt(json.data[i].RecuentoFilas)/Total_Cantidad)*100;
							
							//Redondear a un decimal
							var flotante = parseFloat(valor_y);
							var resultado = Math.round(flotante*Math.pow(10,1))/Math.pow(10,1);
							
							Desc='('+resultado+'%, '+json.data[i].RecuentoFilas+') '+json.data[i].Desc_Tipo_Actividad;
						
							grafica[i]={
								name: Desc,
								y: valor_y,
								key:json.data[i].Tipo_Actividad
								//color:'#05cc50',
							};
						}
						
						
						Highcharts.chart('pie-chart-2', {
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
								data: grafica,
								point: {
									events: {
										click: function () {
											tabla_tickets(this.options.key, Fech_I_G1, Fech_F_G1, "tabla_sol_ticket_1", "Alerta_Graf_y_Tabla_1");
										}
									}
								}
							}]
						});
						
						
					}else{
						var alerta="";
						
						alerta+='<div class="alert alert-warning alert-dismissible fade in col-md-12 col-sm-12 col-xs-12 form-group" role="alert">';
						alerta+='	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>';
						alerta+='	</button>';
						alerta+='	<strong>No se encontraron resultados.</strong>';
						alerta+='</div>';
			
						
						$("#Alerta_Graf_y_Tabla_1").html(alerta);
					
						$("#Alerta_Graf_y_Tabla_1").show();
						$("#pie-chart-2").hide();
					}
					
				},
				error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
				}
			});
		}
		
	}
	
	function tabla_tickets(Tipo_Actividad, Fecha_I, Fecha_F, nombre_datatable, Div_Html){
		var strDatos="";
		var Id_Area=$("#idareasesion").val();
		strDatos+="Id_Area="+Id_Area;
		strDatos+="&Tipo_Actividad="+Tipo_Actividad;
		strDatos+="&Fecha_Inicial="+Fecha_I;
		strDatos+="&Fecha_Final="+Fecha_F;
		strDatos+="&accion=tabla_servicios_registrados";
		alert(Id_Area);
		
		if(Tipo_Actividad!=""&&Fecha_I!=""&&Fecha_F!=""){
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
					var tabla="";
					
					if(json.totalCount>0){
						$("#Regresar_Grafica_1").html('<a href="#noir" onclick="grafica_servicios_registrados(\''+Fecha_I+'\',\''+Fecha_F+'\')"><--Grafica</a>');
						$("#pie-chart-2").hide();
					
						tabla+='<div class="box-body"><div class="table-responsive">';
						tabla+='  <table id="'+nombre_datatable+'" class="table table-bordered table-striped table-chs">';
						tabla+='	<thead>';
						tabla+='	  <tr>';
						tabla+='		<th>Sección</th>';
						tabla+='		<th>Título</th>';
						tabla+='		<th>Motivo Reporte</th>';
						tabla+='		<th>Nombre Activo</th>';
						tabla+='		<th>Marca</th>';
						tabla+='		<th>Modelo</th>';
						tabla+='		<th>No Serie</th>';
						tabla+='		<th>Categoria</th>';
						tabla+='		<th>Subcategoria</th>';
						tabla+='		<th>Gestor</th>';
						tabla+='		<th>Prioridad</th>';
						tabla+='		<th>Estatus</th>';
						tabla+='		<th>Fecha Solicitud</th>';
						tabla+='	  </tr>';
						tabla+='	</thead>';
						tabla+='	<tbody>';
						for(var i=0;i < json.totalCount; i++){
							tabla+='	  <tr>';
							tabla+='		<td>'+json.data[i].Desc_Seccion+'</td>';
							tabla+='		<td>'+json.data[i].Titulo+'</td>';
							tabla+='		<td>'+json.data[i].Desc_Motivo_Reporte+'</td>';
							tabla+='		<td>'+json.data[i].Nombre_Activo+'</td>';
							tabla+='		<td>'+json.data[i].Marca+'</td>';
							tabla+='		<td>'+json.data[i].Modelo+'</td>';
							tabla+='		<td>'+json.data[i].NumSerie+'</td>';
							tabla+='		<td>'+json.data[i].Desc_Categoria+'</td>';
							tabla+='		<td>'+json.data[i].Desc_Subcategoria+'</td>';
							tabla+='		<td>'+json.data[i].Gestor+'</td>';
							tabla+='		<td>'+json.data[i].Desc_Prioridad+'</td>';
							tabla+='		<td>'+json.data[i].Desc_Proceso+'</td>';
							tabla+='		<td>'+json.data[i].Fech_Solicitud+'</td>';
							tabla+='	  </tr>';	
						}
						tabla+='	</tbody>';
						tabla+='  </table>';
						tabla+='</div></div><br>';
						$("#"+Div_Html).html(tabla);
						$("#"+Div_Html).show();
						$('#'+nombre_datatable).DataTable({
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
						mensajesalerta("Informaci&oacute;n", "No se encontraron Resultados", "info", "dark");
					}
					
				},
				error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
				}
			});
		
		}else{
			mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
		}
	}

	Fecha_Format=function(Fecha, Formato){
		var Fech_Result="";
		
		if(Fecha!=""){
			if(Formato=="aaaammdd"){
				Fech_Result=Fecha[6]+""+Fecha[7]+""+Fecha[8]+""+Fecha[9]+""+Fecha[3]+""+Fecha[4]+""+Fecha[0]+""+Fecha[1];
			}
			
			if(Formato=="aaaa-mm-dd"){
				Fech_Result=Fecha.substring(6, 10)+"-"+Fecha.substring(3, 5)+"-"+Fecha.substring(0, 2);
			}
		}else{
			Fech_Result=Fecha;
		}
		
		return Fech_Result;
	}	
   ///////////////////////
   //////////////////////INDICADORES///////////////////////////////////////////////
   ////////////////////////////////////////////////////////////////////////////////
  
   //Grafica 1
   function cargar_estatus_proceso(){
		var Id_Area=$("#idareasesion").val();
		
		var Ubic_Prim=$("#cmbubicprim").val();
		var Ubic_Sec=$("#cmbubicsec").val();
		var Clase=$("#cmbclase").val();
		var Clasificacion=$("#cmbclasificacion").val();
		var Familia=$("#cmbfamilia").val();
		var Subfamilia=$("#cmbsubfamilia").val();
		var Seccion=$("#cmbseccion").val();
		
		var Id_Medio="-1";
		var Lo_Realiza="-1";
		var Id_Categoria=$("#cmbcategoria").val();
		var Id_Subcategoria=$("#cmbsubcategoria").val();
		var Id_Gestor=$("#cmbgestores").val();
		var Id_Motivo_Real=$("#cmb_motivo_real").val();
		var Id_Motivo_Aparente=$("#cmb_motivo_aparente").val();
		var Id_Est_Equipo=$("#cmb_estatus_equipo").val();
		
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
					Ubic_Prim:Ubic_Prim,
					Ubic_Sec:Ubic_Sec,
					Clase:Clase,
					Clasificacion:Clasificacion,
					Familia:Familia,
					Subfamilia:Subfamilia,
					Seccion:Seccion,
					Id_Medio:Id_Medio,
					Lo_Realiza:Lo_Realiza,
					Id_Categoria:Id_Categoria,
					Id_Subcategoria:Id_Subcategoria,
					Id_Gestor:Id_Gestor,
					Id_Motivo_Real:Id_Motivo_Real,
					Id_Motivo_Aparente:Id_Motivo_Aparente,
					Id_Est_Equipo:Id_Est_Equipo,
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
   //Fin Grafica 1
   
   $("#cmbmeses_graf_1").change(function (event){
	cargar_estatus_proceso();
   });
   
   //Grafica 2
   function indicador_servicios_registrados(){
		var Id_Area=$("#idareasesion").val();
		
		var Ubic_Prim=$("#cmbubicprim").val();
		var Ubic_Sec=$("#cmbubicsec").val();
		var Clase=$("#cmbclase").val();
		var Clasificacion=$("#cmbclasificacion").val();
		var Familia=$("#cmbfamilia").val();
		var Subfamilia=$("#cmbsubfamilia").val();
		var Seccion=$("#cmbseccion").val();
		var Id_Medio="-1";
		var Lo_Realiza="-1";
		var Id_Categoria=$("#cmbcategoria").val();
		var Id_Subcategoria=$("#cmbsubcategoria").val();
		var Id_Gestor=$("#cmbgestores").val();
		var Id_Motivo_Real=$("#cmb_motivo_real").val();
		var Id_Motivo_Aparente=$("#cmb_motivo_aparente").val();
		var Id_Est_Equipo=$("#cmb_estatus_equipo").val();
		
		var Anio=$("#cmbanios").val();
		
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
					Id_Medio:Id_Medio,
					Lo_Realiza:Lo_Realiza,
					Id_Categoria:Id_Categoria,
					Id_Subcategoria:Id_Subcategoria,
					Id_Gestor:Id_Gestor,
					Id_Motivo_Real:Id_Motivo_Real,
					Id_Motivo_Aparente:Id_Motivo_Aparente,
					Id_Est_Equipo:Id_Est_Equipo,
					accion: "indicador_servicios_registrados"
				},
				dataType: "html",
				beforeSend: function (xhr) {
			
				},
				success: function (datos) {
					var json;
					json = eval("(" + datos + ")"); //Parsear JSON
					if(json.totalCount>0){
						var grafica=[];
						var Mant_Preventivo=[];
						var Mant_Correctivo=[];
						var Tickets_Mesa=[];
						var Totales=[];

						
						Mant_Correctivo[0]=parseInt(json.data[0].Enero);
						Mant_Correctivo[1]=parseInt(json.data[0].Febrero);
						Mant_Correctivo[2]=parseInt(json.data[0].Marzo);
						Mant_Correctivo[3]=parseInt(json.data[0].Abril);
						Mant_Correctivo[4]=parseInt(json.data[0].Mayo);
						Mant_Correctivo[5]=parseInt(json.data[0].Junio);
						Mant_Correctivo[6]=parseInt(json.data[0].Julio);
						Mant_Correctivo[7]=parseInt(json.data[0].Agosto);
						Mant_Correctivo[8]=parseInt(json.data[0].Septiembre);
						Mant_Correctivo[9]=parseInt(json.data[0].Octubre);
						Mant_Correctivo[10]=parseInt(json.data[0].Noviembre);
						Mant_Correctivo[11]=parseInt(json.data[0].Diciembre);
						
						Mant_Preventivo[0]=parseInt(json.data[1].Enero);
						Mant_Preventivo[1]=parseInt(json.data[1].Febrero);
						Mant_Preventivo[2]=parseInt(json.data[1].Marzo);
						Mant_Preventivo[3]=parseInt(json.data[1].Abril);
						Mant_Preventivo[4]=parseInt(json.data[1].Mayo);
						Mant_Preventivo[5]=parseInt(json.data[1].Junio);
						Mant_Preventivo[6]=parseInt(json.data[1].Julio);
						Mant_Preventivo[7]=parseInt(json.data[1].Agosto);
						Mant_Preventivo[8]=parseInt(json.data[1].Septiembre);
						Mant_Preventivo[9]=parseInt(json.data[1].Octubre);
						Mant_Preventivo[10]=parseInt(json.data[1].Noviembre);
						Mant_Preventivo[11]=parseInt(json.data[1].Diciembre);
						
						Tickets_Mesa[0]=parseInt(json.data[2].Enero);
						Tickets_Mesa[1]=parseInt(json.data[2].Febrero);
						Tickets_Mesa[2]=parseInt(json.data[2].Marzo);
						Tickets_Mesa[3]=parseInt(json.data[2].Abril);
						Tickets_Mesa[4]=parseInt(json.data[2].Mayo);
						Tickets_Mesa[5]=parseInt(json.data[2].Junio);
						Tickets_Mesa[6]=parseInt(json.data[2].Julio);
						Tickets_Mesa[7]=parseInt(json.data[2].Agosto);
						Tickets_Mesa[8]=parseInt(json.data[2].Septiembre);
						Tickets_Mesa[9]=parseInt(json.data[2].Octubre);
						Tickets_Mesa[10]=parseInt(json.data[2].Noviembre);
						Tickets_Mesa[11]=parseInt(json.data[2].Diciembre);
						
						Totales[0]=parseInt(json.data[3].Enero);
						Totales[1]=parseInt(json.data[3].Febrero);
						Totales[2]=parseInt(json.data[3].Marzo);
						Totales[3]=parseInt(json.data[3].Abril);
						Totales[4]=parseInt(json.data[3].Mayo);
						Totales[5]=parseInt(json.data[3].Junio);
						Totales[6]=parseInt(json.data[3].Julio);
						Totales[7]=parseInt(json.data[3].Agosto);
						Totales[8]=parseInt(json.data[3].Septiembre);
						Totales[9]=parseInt(json.data[3].Octubre);
						Totales[10]=parseInt(json.data[3].Noviembre);
						Totales[11]=parseInt(json.data[3].Diciembre);
						
						grafica[0]={
							name: 'Mant. Corr.',
							data: Mant_Correctivo,
							color:'#F92C18',
						};
						
						grafica[1]={
							name: 'Mant. Prev',
							data: Mant_Preventivo,
							color:'#25D5D5',
						};
						
						grafica[2]={
							name: 'Asistencia',
							data: Tickets_Mesa,
							color:'#A6ADAD',
						};
						
						grafica[3]={
							name: 'Tot. Rep',
							data: Totales,
							color:'#000000',
						};
						
						
						var title = {
						   text: 'SERVICIOS REPORTADOS POR MES EN '+ Anio
						};
						var subtitle = {
						   text: 'Source: worldClimate.com'
						};
						var xAxis = {
						   categories: ['ENE', 'FEB', 'MAR', 'ABR', 'MAY', 'JUN', 'JUL', 'AGO', 'SEP', 'OCT', 'NOV', 'DIC']
						};
						var yAxis = {
						   title: {
							  text: 'No. Reportes'
						   },
						   plotLines: [{
							  value: 0,
							  width: 2,
							  color: '#808080'
						   }]
						};   
						var tooltip = {
						   valueSuffix: ' T'
						}
						var legend = {
						   layout: 'vertical',
						   align: 'right',
						   verticalAlign: 'middle',
						   borderWidth: 0
						};
						var series = grafica;

						var json = {};
						json.title = title;
						//json.subtitle = subtitle;
						json.xAxis = xAxis;
						json.yAxis = yAxis;
						json.tooltip = tooltip;
						json.legend = legend;
						json.series = series;
						
						$('#container').highcharts(json);
						
						
					}
				},
				error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
				}
			});
		}
	}
   //Fin Grafica 2
   
   //Grafica 3
   $("#cmbmeses_barra").change(function() {
	  barra_indicador_reportes_por_area();
	 });
   
   
   function barra_indicador_reportes_por_area(){
   
		var Id_Area=$("#idareasesion").val();
		
		var Ubic_Prim=$("#cmbubicprim").val();
		var Ubic_Sec=$("#cmbubicsec").val();
		var Clase=$("#cmbclase").val();
		var Clasificacion=$("#cmbclasificacion").val();
		var Familia=$("#cmbfamilia").val();
		var Subfamilia=$("#cmbsubfamilia").val();
		var Seccion=$("#cmbseccion").val();
		var Id_Medio="-1";
		var Lo_Realiza="-1";
		var Id_Categoria=$("#cmbcategoria").val();
		var Id_Subcategoria=$("#cmbsubcategoria").val();
		var Id_Gestor=$("#cmbgestores").val();
		var Id_Motivo_Real=$("#cmb_motivo_real").val();
		var Id_Motivo_Aparente=$("#cmb_motivo_aparente").val();
		var Id_Est_Equipo=$("#cmb_estatus_equipo").val();
		
		var Anio=$("#cmbanios").val();
		var Meses=$("#cmbmeses_barra").val();
		var desc_meses=$('select[name="cmbmeses_barra"] option:selected').text();
		
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
					Id_Medio:Id_Medio,
					Lo_Realiza:Lo_Realiza,
					Id_Categoria:Id_Categoria,
					Id_Subcategoria:Id_Subcategoria,
					Id_Gestor:Id_Gestor,
					Id_Motivo_Real:Id_Motivo_Real,
					Id_Motivo_Aparente:Id_Motivo_Aparente,
					Id_Est_Equipo:Id_Est_Equipo,
					Mes:Meses,
					accion: "barra_indicador_reportes_por_area"
				},
				dataType: "html",
				beforeSend: function (xhr) {
			
				},
				success: function (datos) {
					var json;
					json = eval("(" + datos + ")"); //Parsear JSON
					if(json.totalCount>0){
						var Gerencia=[];
						var Mant_Prev=[];
						var Prev_Y=[];
						var Correc_Y=[];
						var Asist_Y=[];
						var Asist_Sin_Activo_Y=[];
						var Mant_Correctivo=[];
						var Asistencia=[];
						var Asistencia_Sin_Activo=[];
						for(var i=0;i < json.totalCount; i++){
							Gerencia[i]=json.data[i]["Gerencia"];
							Mant_Prev[i]=parseInt(json.data[i]["Total_Preventivo"]);
							Mant_Correctivo[i]=parseInt(json.data[i]["Total_Correctivo"]);
							Asistencia[i]=parseInt(json.data[i]["Total_Asistencia"]);
							Asistencia_Sin_Activo[i]=parseInt(json.data[i]["Total_Asistencia_Sin_Activo"]);
						
							Prev_Y[i]={
								y: parseInt(json.data[i]["Total_Preventivo"]),
								key:json.data[i].Gerencia
								//color:'#05cc50',
							};
							
							Correc_Y[i]={
								y: parseInt(json.data[i]["Total_Correctivo"]),
								key:json.data[i].Gerencia
								//color:'#05cc50',
							};
							
							Asist_Y[i]={
								y: parseInt(json.data[i]["Total_Asistencia"]),
								key:json.data[i].Gerencia
								//color:'#05cc50',
							};
							Asist_Sin_Activo_Y[i]={
								y: parseInt(json.data[i]["Total_Asistencia_Sin_Activo"]),
								key:json.data[i].Gerencia
								//color:'#05cc50',
							};
						}
						
						
					
						Highcharts.chart('reportes_realizados', {
						  title: {
							text: 'REPORTES REGISTRADOS POR ÁREA '+desc_meses+' DEL '+Anio
						  },
						  yAxis: {
							allowDecimals: false,
							min: 0,
							title: {
							  text: 'No. Reportes'
							},
							
						  },
						  xAxis: {
							categories: Gerencia,
							key: Gerencia
						  },
						  labels: {
							items: [{
							  html: '',
							  style: {
								left: '50px',
								top: '18px',
								color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
							  }
							}]
						  },
						  
						  series: [{
							type: 'column',
							name: 'Mto. Preventivo',
							data: Prev_Y,
							point: {
								events: {
									click: function () {
										if(this.y>0){
											var array_val=[];
											array_val[0]=2;//Id Tipo Actividad
											array_val[1]=this.key;//Id_Ubicacion_Primaria
											tabla_popup_tickets("barra_indicador_reportes_por_area", array_val);
											
										}
									}
								}
							}
						  }, {
							type: 'column',
							name: 'Mto. Correctivo',
							data: Correc_Y,
							point: {
								events: {
									click: function () {
										if(this.y>0){
											var array_val=[];
											array_val[0]=3;//Id Tipo Actividad
											array_val[1]=this.key;//Id_Ubicacion_Primaria
											tabla_popup_tickets("barra_indicador_reportes_por_area", array_val);
										}
									}
								}
							}
						  }, {
							type: 'column',
							name: 'Asistencia',
							data: Asist_Y,
							point: {
								events: {
									click: function () {
										if(this.y>0){
											var array_val=[];
											array_val[0]=0;//Id Tipo Actividad
											array_val[1]=this.key;//Id_Ubicacion_Primaria
											tabla_popup_tickets("barra_indicador_reportes_por_area", array_val);
										}
									}
								}
							}
						  }, {
							type: 'column',
							name: 'Asistencia Sin Activo',
							data: Asist_Sin_Activo_Y,
							point: {
								events: {
									click: function () {
										if(this.y>0){
											var array_val=[];
											array_val[0]="Sin_Activo";//Id Tipo Actividad
											array_val[1]=this.key;//Id_Ubicacion_Primaria
											tabla_popup_tickets("barra_indicador_reportes_por_area", array_val);
										}
									}
								}
							}
						  }]
						});

						
						
					}
				},
				error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
				}
			});
		}
	}
   //Fin Grafica 3
   	
	
   
   //Grafica 4
   $("#cmbmeses_pie").change(function() {
	  pie_indicador_reportes_por_area();
	  $("#highcharts_pie_reportes_realizados_ubic_sec").html("");
   });
   
   function pie_indicador_reportes_por_area(){
		//Se limpia la grafica de ubicacion secundaria
		$("#highcharts_pie_reportes_realizados_ubic_sec").html("");
		
		var Id_Area=$("#idareasesion").val();
		
		var Ubic_Prim=$("#cmbubicprim").val();
		var Ubic_Sec=$("#cmbubicsec").val();
		var Clase=$("#cmbclase").val();
		var Clasificacion=$("#cmbclasificacion").val();
		var Familia=$("#cmbfamilia").val();
		var Subfamilia=$("#cmbsubfamilia").val();
		var Seccion=$("#cmbseccion").val();
		var Id_Medio="-1";
		var Lo_Realiza="-1";
		var Id_Categoria=$("#cmbcategoria").val();
		var Id_Subcategoria=$("#cmbsubcategoria").val();
		var Id_Gestor=$("#cmbgestores").val();
		var Id_Motivo_Real=$("#cmb_motivo_real").val();
		var Id_Motivo_Aparente=$("#cmb_motivo_aparente").val();
		var Id_Est_Equipo=$("#cmb_estatus_equipo").val();
		
		var Anio=$("#cmbanios").val();
		var Meses=$("#cmbmeses_pie").val();
		var desc_meses=$('select[name="cmbmeses_pie"] option:selected').text();
		
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
					Id_Medio:Id_Medio,
					Lo_Realiza:Lo_Realiza,
					Id_Categoria:Id_Categoria,
					Id_Subcategoria:Id_Subcategoria,
					Id_Gestor:Id_Gestor,
					Id_Motivo_Real:Id_Motivo_Real,
					Id_Motivo_Aparente:Id_Motivo_Aparente,
					Id_Est_Equipo:Id_Est_Equipo,
					Mes:Meses,
					accion: "pie_indicador_reportes_por_area"
				},
				dataType: "html",
				beforeSend: function (xhr) {
			
				},
				success: function (datos) {
					var json;
					json = eval("(" + datos + ")"); //Parsear JSON
					if(json.totalCount>0){
						var Total_Cantidad=0;
						var grafica=[];
						for(var i=0;i < json.totalCount; i++){
							var valor_y=0;
							var Desc_Gerencia="";
							var Id_Categoria="";
							Total_Cantidad=parseInt(json.Total_Cantidad);
							valor_y=(parseInt(json.data[i].Total_Solicitudes)/Total_Cantidad)*100;
							
							Desc_Gerencia=json.data[i].Gerencia;
							
							//Redondear a un decimal
							var flotante = parseFloat(valor_y);
							var resultado = Math.round(flotante*Math.pow(10,1))/Math.pow(10,1);
							
							Desc_Gerencia='('+resultado+'% Tot. '+json.data[i].Total_Solicitudes+') '+Desc_Gerencia;
							grafica[i]={
								name: Desc_Gerencia,
								y: valor_y,
								key:json.data[i].Gerencia
								//color:'#05cc50',
							};
						}
						
						
						Highcharts.chart('highcharts_pie_reportes_realizados', {
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
								text: 'REPORTES REGISTRADOS POR ÁREA '+desc_meses+' DEL '+Anio
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
									showInLegend: true,
									point: {
										events: {
											click: function () {
												if(this.options.key!=0){
													pie_indicador_reportes_por_area_ubic_sec(this.options.key);
												}
											}
										}
									}
								}
							},
							series: [{
								name: 'Brands',
								colorByPoint: true,
								data: grafica
							}]
						});
						
					}else{
						$("#highcharts_pie_reportes_realizados").html("");
					}
				},
				error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
				}
			});
		}
	}
   
   function pie_indicador_reportes_por_area_ubic_sec(Gerencia){
		var Id_Area=$("#idareasesion").val();
		
		var Ubic_Prim=$("#cmbubicprim").val();
		var Ubic_Sec=$("#cmbubicsec").val();
		var Clase=$("#cmbclase").val();
		var Clasificacion=$("#cmbclasificacion").val();
		var Familia=$("#cmbfamilia").val();
		var Subfamilia=$("#cmbsubfamilia").val();
		var Seccion=$("#cmbseccion").val();
		var Id_Medio="-1";
		var Lo_Realiza="-1";
		var Id_Categoria=$("#cmbcategoria").val();
		var Id_Subcategoria=$("#cmbsubcategoria").val();
		var Id_Gestor=$("#cmbgestores").val();
		var Id_Motivo_Real=$("#cmb_motivo_real").val();
		var Id_Motivo_Aparente=$("#cmb_motivo_aparente").val();
		var Id_Est_Equipo=$("#cmb_estatus_equipo").val();
		
		var Anio=$("#cmbanios").val();
		var Meses=$("#cmbmeses_pie").val();
		var desc_meses=$('select[name="cmbmeses_pie"] option:selected').text();
		
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
					Id_Medio:Id_Medio,
					Lo_Realiza:Lo_Realiza,
					Id_Categoria:Id_Categoria,
					Id_Subcategoria:Id_Subcategoria,
					Id_Gestor:Id_Gestor,
					Id_Motivo_Real:Id_Motivo_Real,
					Id_Motivo_Aparente:Id_Motivo_Aparente,
					Id_Est_Equipo:Id_Est_Equipo,
					Mes:Meses,
					Gerencia:Gerencia,
					accion: "pie_indicador_reportes_por_area_ubic_sec"
				},
				dataType: "html",
				beforeSend: function (xhr) {
			
				},
				success: function (datos) {
					var json;
					json = eval("(" + datos + ")"); //Parsear JSON
					if(json.totalCount>0){
						var Total_Cantidad=0;
						var grafica=[];
						
						for(var i=0;i < json.totalCount; i++){
							var valor_y=0;
							var Departamento="";
							var Id_Categoria="";
							Total_Cantidad=parseInt(json.Total_Cantidad);
							valor_y=(parseInt(json.data[i].Total_Solicitudes)/Total_Cantidad)*100;
							
							Departamento=json.data[i].Departamento;
							
							//Redondear a un decimal
							var flotante = parseFloat(valor_y);
							var resultado = Math.round(flotante*Math.pow(10,1))/Math.pow(10,1);
							
							Departamento='('+resultado+'% Tot. '+json.data[i].Total_Solicitudes+') '+Departamento;
							grafica[i]={
								name: Departamento,
								y: valor_y,
								key:json.data[i].Departamento
								//color:'#05cc50',
							};
						}
						
						
						Highcharts.chart('highcharts_pie_reportes_realizados_ubic_sec', {
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
								text: '<br>REPORTES REGISTRADOS POR DEPARTAMENTO '+desc_meses+' DEL '+Anio
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
									showInLegend: true,
									point: {
										events: {
											click: function () {
												if(this.options.key!=0){
													var array_val=[];
													array_val[0]=Gerencia;//Gerencia
													array_val[1]=this.options.key;//Departamento
													tabla_popup_tickets("pie_reportes_por_area_ubic_prim_sec", array_val);
												}
											}
										}
									}
								}
							},
							series: [{
								name: 'Brands',
								colorByPoint: true,
								data: grafica
							}]
						});
					}
				},
				error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
				}
			});
		}
	}
   //Fin Grafica 4
   
   //Grafica 5
   $("#cmbmeses_serv_reg_por_mes").change(function() {
	  //pie_servicios_registrados_por_mes();
	  $("#highcharts_pie_servicios_registrados_por_area_por_mes").html("");
	  $("#highcharts_pie_reportes_realizados_por_area_ubic_sec").html("");
   });
   
   function pie_servicios_registrados_por_mes(){
		
		//Se limpian las graficas
		$("#highcharts_pie_servicios_registrados_por_area_por_mes").html("");
		$("#highcharts_pie_reportes_realizados_por_area_ubic_sec").html("");
		
		var Id_Area=$("#idareasesion").val();
		
		var Ubic_Prim=$("#cmbubicprim").val();
		var Ubic_Sec=$("#cmbubicsec").val();
		var Clase=$("#cmbclase").val();
		var Clasificacion=$("#cmbclasificacion").val();
		var Familia=$("#cmbfamilia").val();
		var Subfamilia=$("#cmbsubfamilia").val();
		var Seccion=$("#cmbseccion").val();
		var Id_Medio="-1";
		var Lo_Realiza="-1";
		var Id_Categoria=$("#cmbcategoria").val();
		var Id_Subcategoria=$("#cmbsubcategoria").val();
		var Id_Gestor=$("#cmbgestores").val();
		var Id_Motivo_Real=$("#cmb_motivo_real").val();
		var Id_Motivo_Aparente=$("#cmb_motivo_aparente").val();
		var Id_Est_Equipo=$("#cmb_estatus_equipo").val();
		
		var Anio=$("#cmbanios").val();
		var Meses=$("#cmbmeses_serv_reg_por_mes").val();
		var desc_meses=$('select[name="cmbmeses_serv_reg_por_mes"] option:selected').text();
		
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
					Id_Medio:Id_Medio,
					Lo_Realiza:Lo_Realiza,
					Id_Categoria:Id_Categoria,
					Id_Subcategoria:Id_Subcategoria,
					Id_Gestor:Id_Gestor,
					Id_Motivo_Real:Id_Motivo_Real,
					Id_Motivo_Aparente:Id_Motivo_Aparente,
					Id_Est_Equipo:Id_Est_Equipo,
					Mes:Meses,
					accion: "pie_servicios_registrados_por_mes"
				},
				dataType: "html",
				beforeSend: function (xhr) {
			
				},
				success: function (datos) {
					var json;
					json = eval("(" + datos + ")"); //Parsear JSON
					if(json.totalCount>0){
						var Total_Cantidad=0;
						var grafica=[];
						for(var i=0;i < json.totalCount; i++){
							
							var valor_y=0;
							Total_Cantidad=parseInt(json.Total_Cantidad);
							valor_y=(parseInt(json.data[i].Total)/Total_Cantidad)*100;
							
							Desc_Tipo_Actividad=json.data[i].Desc_Tipo_Actividad;
							
							//Redondear a un decimal
							var flotante = parseFloat(valor_y);
							var resultado = Math.round(flotante*Math.pow(10,1))/Math.pow(10,1);
							
							Desc_Tipo_Actividad='('+resultado+'% Tot. '+json.data[i].Total+') '+Desc_Tipo_Actividad;
							grafica[i]={
								name: Desc_Tipo_Actividad,
								y: valor_y,
								key:json.data[i].Tipo_Actividad
								//color:'#05cc50',
							};
							
						}
						
						Highcharts.chart('highcharts_pie_servicios_registrados_por_mes', {
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
								text: 'SERVICIOS REGISTRADOS POR MES '+desc_meses+' DEL '+Anio
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
									showInLegend: true,
									point: {
										events: {
											click: function () {
												if(this.options.key!=0){
													pie_indicador_reportes_por_mes_por_area(this.options.key);
												}
											}
										}
									}
								}
							},
							series: [{
								name: 'Brands',
								colorByPoint: true,
								data: grafica
							}]
						});
						
					}else{
						$("#highcharts_pie_servicios_registrados_por_mes").html("");
					}
				},
				error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
				}
			});
		}
	}
   
   function pie_indicador_reportes_por_mes_por_area(Tipo_Actividad){
	
	
		var Id_Area=$("#idareasesion").val();
		
		var Ubic_Prim=$("#cmbubicprim").val();
		var Ubic_Sec=$("#cmbubicsec").val();
		var Clase=$("#cmbclase").val();
		var Clasificacion=$("#cmbclasificacion").val();
		var Familia=$("#cmbfamilia").val();
		var Subfamilia=$("#cmbsubfamilia").val();
		var Seccion=$("#cmbseccion").val();
		var Id_Medio="-1";
		var Lo_Realiza="-1";
		var Id_Categoria=$("#cmbcategoria").val();
		var Id_Subcategoria=$("#cmbsubcategoria").val();
		var Id_Gestor=$("#cmbgestores").val();
		var Id_Motivo_Real=$("#cmb_motivo_real").val();
		var Id_Motivo_Aparente=$("#cmb_motivo_aparente").val();
		var Id_Est_Equipo=$("#cmb_estatus_equipo").val();
		
		var Anio=$("#cmbanios").val();
		var Meses=$("#cmbmeses_serv_reg_por_mes").val();
		var desc_meses=$('select[name="cmbmeses_serv_reg_por_mes"] option:selected').text();
		
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
					Mes:Meses,
					Tipo_Mantenimiento:Tipo_Actividad,
					Seccion:Seccion,
					Id_Medio:Id_Medio,
					Lo_Realiza:Lo_Realiza,
					Id_Categoria:Id_Categoria,
					Id_Subcategoria:Id_Subcategoria,
					Id_Gestor:Id_Gestor,
					Id_Motivo_Real:Id_Motivo_Real,
					Id_Motivo_Aparente:Id_Motivo_Aparente,
					Id_Est_Equipo:Id_Est_Equipo,
					accion: "pie_indicador_reportes_por_mes_por_area"
				},
				dataType: "html",
				beforeSend: function (xhr) {
			
				},
				success: function (datos) {
					var json;
					json = eval("(" + datos + ")"); //Parsear JSON
					if(json.totalCount>0){
						var Total_Cantidad=0;
						var grafica=[];
						for(var i=0;i < json.totalCount; i++){
							var valor_y=0;
							var Desc_Ubic_Prim="";
							var Id_Categoria="";
							
							Total_Cantidad=parseInt(json.Total_Cantidad);
							valor_y=(parseInt(json.data[i].Total_Solicitudes)/Total_Cantidad)*100;
							
							Desc_Ubic_Prim=json.data[i].Desc_Ubic_Prim;
							
							//Redondear a un decimal
							var flotante = parseFloat(valor_y);
							var resultado = Math.round(flotante*Math.pow(10,1))/Math.pow(10,1);
							
							Desc_Ubic_Prim='('+resultado+'% Tot. '+json.data[i].Total_Solicitudes+') '+Desc_Ubic_Prim;
							grafica[i]={
								name: Desc_Ubic_Prim,
								y: valor_y,
								key:json.data[i].Id_Ubic_Prim
								//color:'#05cc50',
							};
							
						}
						
						
						Highcharts.chart('highcharts_pie_servicios_registrados_por_area_por_mes', {
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
								text: 'REPORTES REGISTRADOS POR ÁREA '+desc_meses+' DEL '+Anio
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
									showInLegend: true,
									point: {
										events: {
											click: function () {
												if(this.options.key!=0){
													pie_indicador_reportes_por_mes_por_area_ubic_sec(this.options.key);
												}
											}
										}
									}
								}
							},
							series: [{
								name: 'Brands',
								colorByPoint: true,
								data: grafica
							}]
						});
						
					}else{
						$("#highcharts_pie_servicios_registrados_por_area_por_mes").html("");
					}
				},
				error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
				}
			});
		}
	}
   
   function pie_indicador_reportes_por_mes_por_area_ubic_sec(Id_Ubic_Prim){
		var Id_Area=$("#idareasesion").val();
		
		var Ubic_Prim=Id_Ubic_Prim;
		var Ubic_Sec=$("#cmbubicsec").val();
		var Clase=$("#cmbclase").val();
		var Clasificacion=$("#cmbclasificacion").val();
		var Familia=$("#cmbfamilia").val();
		var Subfamilia=$("#cmbsubfamilia").val();
		var Seccion=$("#cmbseccion").val();
		var Id_Medio="-1";
		var Lo_Realiza="-1";
		var Id_Categoria=$("#cmbcategoria").val();
		var Id_Subcategoria=$("#cmbsubcategoria").val();
		var Id_Gestor=$("#cmbgestores").val();
		var Id_Motivo_Real=$("#cmb_motivo_real").val();
		var Id_Motivo_Aparente=$("#cmb_motivo_aparente").val();
		var Id_Est_Equipo=$("#cmb_estatus_equipo").val();
		
		var Anio=$("#cmbanios").val();
		var Meses=$("#cmbmeses_serv_reg_por_mes").val();
		var desc_meses=$('select[name="cmbmeses_serv_reg_por_mes"] option:selected').text();
		
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
					Id_Medio:Id_Medio,
					Lo_Realiza:Lo_Realiza,
					Id_Categoria:Id_Categoria,
					Id_Subcategoria:Id_Subcategoria,
					Id_Gestor:Id_Gestor,
					Id_Motivo_Real:Id_Motivo_Real,
					Id_Motivo_Aparente:Id_Motivo_Aparente,
					Id_Est_Equipo:Id_Est_Equipo,
					Mes:Meses,
					accion: "pie_indicador_reportes_por_area_ubic_sec"
				},
				dataType: "html",
				beforeSend: function (xhr) {
			
				},
				success: function (datos) {
					var json;
					json = eval("(" + datos + ")"); //Parsear JSON
					if(json.totalCount>0){
						var Total_Cantidad=0;
						var grafica=[];
						
						for(var i=0;i < json.totalCount; i++){
							var valor_y=0;
							var Desc_Ubic_Sec="";
							var Id_Categoria="";
							Total_Cantidad=parseInt(json.Total_Cantidad);
							valor_y=(parseInt(json.data[i].Total_Solicitudes)/Total_Cantidad)*100;
							
							Desc_Ubic_Sec=json.data[i].Desc_Ubic_Sec;
							
							//Redondear a un decimal
							var flotante = parseFloat(valor_y);
							var resultado = Math.round(flotante*Math.pow(10,1))/Math.pow(10,1);
							
							Desc_Ubic_Sec='('+resultado+'% Tot. '+json.data[i].Total_Solicitudes+') '+Desc_Ubic_Sec;
							grafica[i]={
								name: Desc_Ubic_Sec,
								y: valor_y,
								key:json.data[i].Id_Ubic_Sec
								//color:'#05cc50',
							};
						}
						
						
						Highcharts.chart('highcharts_pie_reportes_realizados_por_area_ubic_sec', {
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
								text: '<br>REPORTES REGISTRADOS POR ÁREA '+desc_meses+' DEL '+Anio
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
									showInLegend: true,
									point: {
										events: {
											click: function () {
												if(this.options.key!=0){
													var array_val=[];
													array_val[0]=this.options.key;//Id Ubicacion Secundaria
													tabla_popup_tickets("pie_reportes_por_area_ubic_sec", array_val);
												}
											}
										}
									}
								}
							},
							series: [{
								name: 'Brands',
								colorByPoint: true,
								data: grafica
							}]
						});
					}
				},
				error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
				}
			});
		}
	}
   //Fin Grafica 5
   
   //Grafica 6
   $("#cmbmeses_graf_6").change(function() {
	  barra_reporte_por_gestor();
	});
   
   
   function barra_reporte_por_gestor(){
		var Id_Area=$("#idareasesion").val();
		
		var Ubic_Prim=$("#cmbubicprim").val();
		var Ubic_Sec=$("#cmbubicsec").val();
		var Clase=$("#cmbclase").val();
		var Clasificacion=$("#cmbclasificacion").val();
		var Familia=$("#cmbfamilia").val();
		var Subfamilia=$("#cmbsubfamilia").val();
		var Seccion=$("#cmbseccion").val();
		var Id_Medio="-1";
		var Lo_Realiza="-1";
		var Id_Categoria=$("#cmbcategoria").val();
		var Id_Subcategoria=$("#cmbsubcategoria").val();
		var Id_Gestor=$("#cmbgestores").val();
		var Id_Motivo_Real=$("#cmb_motivo_real").val();
		var Id_Motivo_Aparente=$("#cmb_motivo_aparente").val();
		var Id_Est_Equipo=$("#cmb_estatus_equipo").val();
		
		var Anio=$("#cmbanios").val();
		var Meses=$("#cmbmeses_graf_6").val();
		var desc_meses=$('select[name="cmbmeses_graf_6"] option:selected').text();
		
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
					Id_Medio:Id_Medio,
					Lo_Realiza:Lo_Realiza,
					Id_Categoria:Id_Categoria,
					Id_Subcategoria:Id_Subcategoria,
					Id_Gestor:Id_Gestor,
					Id_Motivo_Real:Id_Motivo_Real,
					Id_Motivo_Aparente:Id_Motivo_Aparente,
					Id_Est_Equipo:Id_Est_Equipo,
					Mes:Meses,
					accion: "graf_barra_por_gestor"
				},
				dataType: "html",
				beforeSend: function (xhr) {
			
				},
				success: function (datos) {
					var json;
					json = eval("(" + datos + ")"); //Parsear JSON
					if(json.totalCount>0){
						var Nombre_Usuario=[];
						var Mant_Prev=[];
						var Prev_Y=[];
						var Correc_Y=[];
						var Asist_Y=[];
						var Mant_Correctivo=[];
						var Asistencia=[];
						for(var i=0;i < json.totalCount; i++){
							Nombre_Usuario[i]=json.data[i]["Nombre_Usuario"];
							Mant_Prev[i]=parseInt(json.data[i]["Total_Preventivo"]);
							Mant_Correctivo[i]=parseInt(json.data[i]["Total_Correctivo"]);
							Asistencia[i]=parseInt(json.data[i]["Total_Asistencia"]);
						
							Prev_Y[i]={
								y: parseInt(json.data[i]["Total_Preventivo"]),
								key:json.data[i]["Id_Usuario"]
								//color:'#05cc50',
							};
							
							Correc_Y[i]={
								y: parseInt(json.data[i]["Total_Correctivo"]),
								key:json.data[i]["Id_Usuario"]
								//color:'#05cc50',
							};
							
							Asist_Y[i]={
								y: parseInt(json.data[i]["Total_Asistencia"]),
								key:json.data[i]["Id_Usuario"]
								//color:'#05cc50',
							};
						}
						
						
					
						Highcharts.chart('graf_rep_real_por_gestor', {
						  title: {
							text: 'REPORTES REGISTRADOS POR GESTOR '+desc_meses+' DEL '+Anio
						  },
						  yAxis: {
							allowDecimals: false,
							min: 0,
							title: {
							  text: 'Cant. Solicitudes'
							},
							
						  },
						  xAxis: {
							categories: Nombre_Usuario,
							key: Nombre_Usuario
						  },
						  labels: {
							items: [{
							  html: '',
							  style: {
								left: '50px',
								top: '18px',
								color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
							  }
							}]
						  },
						  
						  series: [{
							type: 'column',
							name: 'Mto. Preventivo',
							data: Prev_Y,
							
							point: {
								events: {
									click: function () {
										if(this.y>0){
											var array_val=[];
											array_val[0]=2;//Id Tipo Actividad
											array_val[1]=this.key;//Id_Ubicacion_Primaria
											tabla_popup_tickets("barra_indicador_reportes_por_gestor", array_val);
											
										}
									}
								}
							}
						  }, {
							type: 'column',
							name: 'Mto. Correctivo',
							data: Correc_Y,
							point: {
								events: {
									click: function () {
										if(this.y>0){
											var array_val=[];
											array_val[0]=3;//Id Tipo Actividad
											array_val[1]=this.key;//Id_Ubicacion_Primaria
											tabla_popup_tickets("barra_indicador_reportes_por_gestor", array_val);
										}
									}
								}
							}
						  }, {
							type: 'column',
							name: 'Asistencia',
							data: Asist_Y,
							point: {
								events: {
									click: function () {
										if(this.y>0){
											var array_val=[];
											array_val[0]=0;//Id Tipo Actividad
											array_val[1]=this.key;//Id_Ubicacion_Primaria
											tabla_popup_tickets("barra_indicador_reportes_por_gestor", array_val);
										}
									}
								}
							}
						  }]
						});

						
						
					}
				},
				error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
				}
			});
		}
	}
   //Fin Grafica 6
   
   
   //Grafica 7
   rutina();
   function rutina() {
		var Id_Area=$("#idareasesion").val();
		var resultado=new Array();
		data={Estatus_Reg: "1",Id_Area:Id_Area, accion: "Rutina_Mant_Preventiv"};
		resultado=cargo_cmb("../fachadas/activos/siga_actividades/Siga_actividadesFacade.Class.php",false, data);
		if(resultado.totalCount>0){
			$('#cmbrutina_graf_7').append($('<option>', { value: "-1" }).text("--Rutina--"));
			for(var i = 0; i < resultado.totalCount; i++){
				$('#cmbrutina_graf_7').append($('<option>', { value: resultado.data[i].Nombre_Rutina }).text(resultado.data[i].Nombre_Rutina));
			}
		}else{
			$('#cmbrutina_graf_7').append($('<option>', { value: "-1" }).text("--Rutina--"));
		}
	}
   
    $("#cmbmeses_graf_7").change(function() {
	  barra_reporte_mantenimientos();
	});
	
	$("#cmbrutina_graf_7").change(function() {
	  barra_reporte_mantenimientos();
	});
   
   
   function barra_reporte_mantenimientos(){
		var Id_Area=$("#idareasesion").val();
		
		var Ubic_Prim=$("#cmbubicprim").val();
		var Ubic_Sec=$("#cmbubicsec").val();
		var Clase=$("#cmbclase").val();
		var Clasificacion=$("#cmbclasificacion").val();
		var Familia=$("#cmbfamilia").val();
		var Subfamilia=$("#cmbsubfamilia").val();
		var Seccion=$("#cmbseccion").val();
		var Id_Medio="-1";
		var Lo_Realiza="-1";
		var Id_Categoria=$("#cmbcategoria").val();
		var Id_Subcategoria=$("#cmbsubcategoria").val();
		var Id_Gestor=$("#cmbgestores").val();
		var Id_Motivo_Real=$("#cmb_motivo_real").val();
		var Id_Motivo_Aparente=$("#cmb_motivo_aparente").val();
		var Id_Est_Equipo=$("#cmb_estatus_equipo").val();
		var Rutina=$("#cmbrutina_graf_7").val();
		
		var Anio=$("#cmbanios").val();
		var Meses=$("#cmbmeses_graf_7").val();
		var desc_meses=$('select[name="cmbmeses_graf_7"] option:selected').text();
		
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
					Id_Medio:Id_Medio,
					Lo_Realiza:Lo_Realiza,
					Id_Categoria:Id_Categoria,
					Id_Subcategoria:Id_Subcategoria,
					Id_Gestor:Id_Gestor,
					Id_Motivo_Real:Id_Motivo_Real,
					Id_Motivo_Aparente:Id_Motivo_Aparente,
					Id_Est_Equipo:Id_Est_Equipo,
					Mes:Meses,
					Rutina:Rutina,
					accion: "graf_barra_mantenimientos"
				},
				dataType: "html",
				beforeSend: function (xhr) {
			
				},
				success: function (datos) {
					var json;
					json = eval("(" + datos + ")"); //Parsear JSON
					if(json.totalCount>0){
						var Desc_Ubic_Prim=[];
						var Programados=[];
						var Prog_Y=[];
						var Total_Prog=0;
						var Realiz_Y=[];
						var Total_Realiz=0;
						var Realizados=[];
						var Tabla="";
						var Total_Porcentaje=0;
						
						Tabla='<table class="table table-bordered">';
						Tabla+='  <thead>';
						Tabla+='	<tr>';
						Tabla+='	  <th style="align:center">Ubicaci&oacute;n Primaria</th>';
						Tabla+='	  <th style="align:center">Mant. Programado '+desc_meses+'</th>';
						Tabla+='	  <th style="align:center">Mant. Realizado '+desc_meses+'</th>';
						Tabla+='	  <th style="align:center">% Cumplimiento '+desc_meses+'</th>';
						Tabla+='	</tr>';
						Tabla+='  </thead>';
						Tabla+='  <tbody>';
						
						for(var i=0;i < json.totalCount; i++){
							var Porcentaje_P_R=0;
							Desc_Ubic_Prim[i]=json.data[i]["Desc_Ubic_Prim"];
							Programados[i]=parseInt(json.data[i]["Total_Programados"]);
							Realizados[i]=parseInt(json.data[i]["Total_Realizados"]);
							
							
							if(parseInt(json.data[i]["Total_Programados"])==0&&parseInt(json.data[i]["Total_Realizados"])==0){
								Porcentaje_P_R=0;
							}else{
								if(parseInt(json.data[i]["Total_Programados"])==0){
									Porcentaje_P_R=0;
								}else{
									Porcentaje_P_R=(parseInt(json.data[i]["Total_Realizados"])*100)/parseInt(json.data[i]["Total_Programados"]);
									if(Porcentaje_P_R>0){
										Porcentaje_P_R=Porcentaje_P_R.toFixed(0)+" %";
									}
								}
							}
							
							
							
							
							Prog_Y[i]={
								y: parseInt(json.data[i]["Total_Programados"]),
								key:json.data[i]["Id_Ubic_Prim"],
								color:'#C7C9CB'
							};
							
							Realiz_Y[i]={
								y: parseInt(json.data[i]["Total_Realizados"]),
								key:json.data[i]["Id_Ubic_Prim"],
								color:'#519EE8'
							};
							Total_Prog=Total_Prog+parseInt(json.data[i]["Total_Programados"]);
							Total_Realiz=Total_Realiz+parseInt(json.data[i]["Total_Realizados"]);
						
							//Tabla
							Tabla+='	<tr>';
							Tabla+='	  <th >'+json.data[i]["Desc_Ubic_Prim"]+'</th>';
							Tabla+='	  <td bgcolor="#C7C9CB">'+json.data[i]["Total_Programados"]+'</td>';
							Tabla+='	  <td bgcolor="#519EE8">'+json.data[i]["Total_Realizados"]+'</td>';
							Tabla+='	  <td>'+Porcentaje_P_R+'</td>';
							Tabla+='	</tr>';
							//Fin Tabla
						}
						
						if(Total_Prog==0 && Total_Realiz==0){
							Total_Porcentaje=0;
						}else{
							if(Total_Prog==0){
								Total_Porcentaje=0;
							}else{
								Total_Porcentaje=(Total_Realiz*100)/Total_Prog;
								if(Total_Porcentaje>0){
									Total_Porcentaje=Total_Porcentaje.toFixed(0)+" %";
								}
							}
						}
						
						
						Tabla+='	<tr>';
						Tabla+='	  <th style="background-color: #19294a;color: #fff;">TOTAL</th>';
						Tabla+='	  <td style="background-color: #19294a;color: #fff;"><strong>'+Total_Prog+'</strong></td>';
						Tabla+='	  <td style="background-color: #19294a;color: #fff;"><strong>'+Total_Realiz+'</strong></td>';
						Tabla+='	  <td style="background-color: #19294a;color: #fff;"><strong>'+Total_Porcentaje+'</strong></td>';
						Tabla+='	</tr>';
						Tabla+='  </tbody>';
						Tabla+='</table>';
						
						
						
						
						//Grafico
						Highcharts.chart('graf_rep_mantenimientos', {
						  title: {
							text: 'CUMPLIMIENTO PAMP '+desc_meses+' DEL '+Anio
						  },
						  yAxis: {
							allowDecimals: false,
							min: 0,
							title: {
							  text: 'Mantenimientos'
							},
							
						  },
						  xAxis: {
							categories: Desc_Ubic_Prim,
							key: Desc_Ubic_Prim
						  },
						  labels: {
							items: [{
							  html: '',
							  style: {
								left: '50px',
								top: '18px',
								color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
							  }
							}]
						  },
						  
						  series: [{
							type: 'column',
							name: 'Programados',
							data: Prog_Y,
							color:'#C7C9CB',
							point: {
								events: {
									click: function () {
										if(this.y>0){
											var array_val=[];
											array_val[0]=1; //Programados
											array_val[1]=this.key;//Id_Ubicacion_Primaria
											tabla_popup_tickets("barra_indicador_mantenimientos", array_val);
										}
									}
								}
							}
						  }, {
							type: 'column',
							name: 'Realizados',
							data: Realiz_Y,
							color:'#519EE8',
							point: {
								events: {
									click: function () {
										if(this.y>0){
											var array_val=[];
											array_val[0]=2; //Realizados
											array_val[1]=this.key;//Id_Ubicacion_Primaria
											tabla_popup_tickets("barra_indicador_mantenimientos", array_val);
										}
									}
								}
							}
						  }]
						});
						//Fin Grafico
						
						//Lleno tabla PAMP
						$("#tabla_de_cumplimiento_PAMP").html(Tabla);
					
						
					}else{
						$("#tabla_de_cumplimiento_PAMP").html("");
					}
				},
				error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
				}
			});
		}
	}
   //Fin Grafica 7
   
   function tabla_popup_tickets(nombre_grafica, valores_key){
		var Id_Area=$("#idareasesion").val();
		
		var Ubic_Prim=$("#cmbubicprim").val();
		var Ubic_Sec=$("#cmbubicsec").val();
		var Clase=$("#cmbclase").val();
		var Clasificacion=$("#cmbclasificacion").val();
		var Familia=$("#cmbfamilia").val();
		var Subfamilia=$("#cmbsubfamilia").val();
		var Seccion=$("#cmbseccion").val();
		//var Id_Gestor="-1"; //Aqui Va el control de gestores y se sustituye por el -1
		var Id_Medio="-1";
		var Lo_Realiza="-1";
		var Id_Categoria=$("#cmbcategoria").val();
		var Id_Subcategoria=$("#cmbsubcategoria").val();
		var Id_Gestor=$("#cmbgestores").val();
		var Id_Motivo_Real=$("#cmb_motivo_real").val();
		var Id_Motivo_Aparente=$("#cmb_motivo_aparente").val();
		var Id_Est_Equipo=$("#cmb_estatus_equipo").val();
		var Gerencia="";
		var Departamento="";
		var Anio=$("#cmbanios").val();
		var Meses="";
		var Tipo_Mantenimiento="";
		var Rutina="";
		
		var Estatus_Proceso="";
		if(nombre_grafica=="barra_indicadores_mesa_ayuda"){
			Meses=$("#cmbmeses_graf_1").val();
			Estatus_Proceso=valores_key[0];
		}
		
		if(nombre_grafica=="barra_indicador_reportes_por_area"){
			Meses=$("#cmbmeses_barra").val();
			Tipo_Mantenimiento=valores_key[0];
			Gerencia=valores_key[1];
		}
		
		if(nombre_grafica=="pie_reportes_por_area_ubic_prim_sec"){
			Meses=$("#cmbmeses_pie").val();
			Gerencia=valores_key[0];
			Departamento=valores_key[1];
		}
		
		//Grafica 6
		if(nombre_grafica=="barra_indicador_reportes_por_gestor"){
			Meses=$("#cmbmeses_graf_6").val();
			Tipo_Mantenimiento=valores_key[0];
			Id_Gestor=valores_key[1];
		}
		
		//Grafica 7
		if(nombre_grafica=="barra_indicador_mantenimientos"){
			Meses=$("#cmbmeses_graf_7").val();
			Tipo_Mantenimiento=valores_key[0];
			Ubic_Prim=valores_key[1];
			Rutina=$("#cmbrutina_graf_7").val();
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
					Gerencia:Gerencia,
					Departamento:Departamento,
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
						"dom": 'Bfrtip',
						"buttons": [
									'copy', 'csv', 'excel', 'pdf', 'print'
						],
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
   
   
   function limpia_controles(){
	$("#highcharts_pie_reportes_realizados_ubic_sec").html("");
   }
   /////////////////////////////////////////////////////////////////////////////////
   
  $(document).ready(function(){
	cargar_estatus_proceso();
	//indicador_servicios_registrados();
	//barra_indicador_reportes_por_area();
	//pie_indicador_reportes_por_area();
		
	var Mes_Actual=moment().format('MM'); 	
	var Anio_Actual=moment().format('YYYY'); 
	var Dia_Mes_Inicial="01";
	var Dia_Mes_Final=moment(Anio_Actual+"-"+Mes_Actual, "YYYY-MM").daysInMonth(); 
	grafica_servicios_registrados(Anio_Actual+"-"+Mes_Actual+"-"+Dia_Mes_Inicial,Anio_Actual+"-"+Mes_Actual+"-"+Dia_Mes_Final);
	$('#Fecha_Inicial_Serv_Reg').val(Dia_Mes_Inicial+"/"+Mes_Actual+"/"+Anio_Actual);
	$('#Fecha_Final_Serv_Reg').val(Dia_Mes_Final+"/"+Mes_Actual+"/"+Anio_Actual);
	
	//Inicia Calendarios Date picker
	$('#Fecha_Inicial_Serv_Reg').datepicker({ 
		format: 'dd/mm/yyyy',
	}).datepicker();
	
	$('#Fecha_Final_Serv_Reg').datepicker({ 
		format: 'dd/mm/yyyy',
	}).datepicker();

	
  });//ND

</script>
</body>
</html>
