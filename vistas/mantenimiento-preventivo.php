<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/archivosComunes.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/biomedica/rutinas/rutinas.class.php");
$rutinasClass = new rutinas();
$sigaRutinas = $rutinasClass->sigaRutinas();
?>

<link rel="stylesheet" href="/siga/dist/css/spinner.css">

<div class="loadingState" id="loadingState">
  <div class="loader"></div>
</div>

<!-- ==== Page: mantenimiento-preventivo ==== -->
<input type="hidden" id="Area_inventario_regresar" value="<?php echo $_GET["area"]; ?>">
	<input type="hidden" id="Area_perfil_regresar" value="<?php echo $_GET["perfil"]; ?>">
	<style>
		.datepicker{z-index:1151 !important;}
		.table-fixed thead { width: 97%; }
		.table-fixed tbody { height: 230px; overflow-y: auto; width: 100%; }
		.table-fixed thead, .table-fixed tbody, .table-fixed tr, .table-fixed td, .table-fixed th { display: block; }
		.table-fixed tbody td, .table-fixed thead > tr> th { float: left; border-bottom-width: 0; }
	</style>
	<link rel="stylesheet" href="../dist/css/jquery-confirm.min.css">
	<script src="../dist/js/jquery-confirm.min.js"></script>	
	<link rel="stylesheet" href="../plugins/fileinput/fileinput.css">
	<script src="../plugins/docsupport/standalone/selectize.js"></script>
	<script src="../plugins/docsupport/index.js"></script>	
	<script src="../js/prettify.js"></script>	

<!-- ==== Sección Menu Inicio ======================================================================================================================================================= -->
<!-- ==== Sección Menu Inicio ======================================================================================================================================================= -->
	<div class="row">
		<div class="col-md-7 col-sm-12 col-xs-12">
			<ul class="nav nav-tabs azulf" role="tablist">
				<li role="presentation" class="active" title="Mantenimientos Programados"><a href="#mantenimientoMensual" aria-controls="mantenimientoMensual" role="tab" data-toggle="tab">Mtos. Programados</a></li>
				<li role="presentation" onclick="limpiar_global(); global()"><a href="#global" aria-controls="global" role="tab" data-toggle="tab">Global</a></li>
				<li role="presentation"><a href="#calendario" aria-controls="calendario" role="tab" data-toggle="tab" onclick="generarCalendario();">Calendarios</a></li>
				<!-- 
				<li role="presentation"><a href="#indicadores" aria-controls="indicadores" role="tab" data-toggle="tab">Indicadores</a></li> 
				<li role="presentation"><a href="#reportes" aria-controls="reportes" role="tab" data-toggle="tab">Reportes</a></li>
				<li role="presentation"><a href="#lista" aria-controls="lista" role="tab" data-toggle="tab">Lista</a></li>
				-->
			</ul>
		</div>
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box azul">
				<a href="#" data-toggle="modal" data-target="#Actividades_Activo_Fijo" onclick="limpiar(); document.getElementById('Estatus_Guardar').value=''; recargaTablas();" id="abrir_popup">
					<span class="info-box-icon bg-aqua"><i class="fa fa-check-circle-o"></i></span>
					<div class="info-box-content"><h3 class="info-box-text">Nuevo Mant. Preventivo</h3></div>
				</a>
			</div>
		</div>
	</div>
<!-- ==== Sección Menu Fin ========================================================================================================================================================== -->
<!-- ==== Sección Menu Fin ========================================================================================================================================================== -->

<!-- ||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| -->
 <!-- /.row -->	
<div class="row">
	<div class="tab-content">
<!-- ||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| -->

<!-- ==== Sección Indicadores Inicio ================================================================================================================================================ -->
<!-- ==== Sección Indicadores Inicio ================================================================================================================================================ -->
<!-- tab#1 -->
	<div id="indicadores" role="tabpanel" class="tab-pane">
		<div class="gray">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="AF/BC">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Ubicación Primaria">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group"><input type="text" class="form-control" placeholder="Ubicación Secundaria"></div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<textarea rows="2" class="form-control" placeholder="Descripción corta (200 caracteres)"></textarea>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="box">
				<!-- /.box-header -->
				<div class="box-body">
					<div id="pie-chart-1" class="highcharts pie"></div>
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
<!-- ==== Sección Indicadores Fin ================================================================================================================================================== -->
<!-- ==== Sección Indicadores Fin ================================================================================================================================================== -->

<!-- ==== Sección calendario Inicio ================================================================================================================================================= -->
<!-- ==== Sección calendario Inicio ================================================================================================================================================= -->
<!-- tab#2 -->
	<div id="calendario" role="tabpanel" class="tab-pane">
		<div class="gray">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label  class="control-label" style="font-size: 11px;">AF/BC</label>
								<div id="muestro_select">
									<select id="select-activos-search" class="demo-default" placeholder="AF/BC" style="display:none"></select>
								</div>
								<div id="gifcargando-search" style="display:none" align="center">
									<img src="../dist/img/cargando-loading.gif" style="max-width: 25px; max-height: 25px" alt="cargando-loading-037.gif">
								</div>
							</div>
						</div>
						<div class="col-md-8">
							<div class="form-group">
								<label  class="control-label" style="font-size: 11px;">Rutina</label>
								<input rows="2" class="form-control" placeholder="Rutina" id="txt_Rutina_Search">
							</div>
						</div>
						<div class="col-md-12"></div>
						<div class="col-md-4">
							<div class="form-group">
								<label  class="control-label" style="font-size: 11px;">Descripción Corta</label>
								<input class="form-control" placeholder="Descripción Corta" id="txt_Desc_Corta_Search">
							</div>
						</div>
						<div class="col-md-2" id="div_gestores_Search">
							<div class="form-group">
								<label  class="control-label" style="font-size: 11px;">Gestores</label>
								<select class="form-control" id="cmb_gestores_Search"></select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label  class="control-label" style="font-size: 11px;">A&ntilde;o</label>
								<select class="form-control" id="Cmb_Anios_Search"></select>
							</div>
						</div>
					</div>
					<div class="row" align="center">
						<button type="button" class="btn chs" id="btn_buscar_full_calendar" onclick="busqueda_full_calendar(2);">Buscar</button>
						<button type="button" class="btn chs" id="btn_mostrar_full_calendar" onclick="mostrar_full_calendar();" style="display:none">Mostrar Calendario</button>
					</div>
				</div>
			</div>
		</div>
		<!-- ==== Area para el calendario de mantenimientos ==== -->
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="box">
					<div class="box-body">
						<ul class="acoat">
							<li>Estatus: </li>
							<li>Realizado y cerrado<span style="background: #448aff; width: 1.2em; height: 1.2em;"></span></li>
							<li>Realizado en espera de cierre<span style="background: #35a61e;width: 1.2em;height: 1.2em;"></span></li>
							<li>En seguimiento Mesa de Ayuda <span style="background: #ecc93b;width: 1.2em;height: 1.2em;"></span></li>
							<li>No Realizado <span style="background: #D90505;width: 1.2em;height: 1.2em;"></span></li>
						</ul>
						<div width="100%" align="right">
							<input type="hidden" id="btn_anio" />
							<input type="hidden" id="btn_mes" />
							<input type="hidden" id="btn_semana" />
							<input type="hidden" id="btn_dia" />
							<input type="hidden" id="btn_mes_lista" />
							<div id="calendario-shit">
								<div style="padding: 2em 1em;">
									<div class="progress">
										<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:100%">
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- ==== Area para la búsqueda Panel inferior==== -->
		<div class="row">
			<div id="respuesta_busqueda" class="col-md-10 col-md-offset-1"></div>
		</div>
	</div>
<!-- ==== Sección calendario Fin =================================================================================================================================================== -->
<!-- ==== Sección calendario Fin =================================================================================================================================================== -->

<!-- ==== Sección reportes Inicio ================================================================================================================================================== -->
<!-- ==== Sección reportes Inicio ================================================================================================================================================== -->
<!-- tab#3 -->
	<div id="reportes" role="tabpanel" class="tab-pane">
		<div class="col-md-12">
			<div class="box">
			<div class="box-body">
				<ul class="nav-time">
				<li>
					<a href="#"><span><i class="fa fa-chevron-left" aria-hidden="true"></i></span></a>
				</li>
				<li>
					Mayo
				</li>
				<li>
					<a href="#"><span><i class="fa fa-chevron-right" aria-hidden="true"></i></span></a>
				</li>
				<li>
					<a href="#"><span><i class="fa fa-chevron-left" aria-hidden="true"></i></span></a>
				</li>
				<li>
					2017
				</li>
				<li>
					<a href="#"><span><i class="fa fa-chevron-right" aria-hidden="true"></i></span></a>
				</li>
				<li class="export">
					<a href="#"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a>
				</li>
				</ul>
				<div class="table-responsive">
				<table id="example1" class="table table-bordered table-striped table-chs" width="100%">
				<thead>
					<tr>
					<th>No.</th>
					<th>Área</th>
					<th>Manto. Programa</th>
					<th>Manto. Real</th>
					<th>Cumplimiento Mayo</th>
					<th>Clasificación</th>
					<th>Total Programación</th>
					<th>Total Real</th>
					<th>Cumplimiento</th>
					<th>Descripción</th>
					</tr>
				</thead>
				<tbody>
					<tr>
					<td>1</td>
					<td>Recuperación</td>
					<td>1</td>
					<td>1</td>
					<td>1%</td>
					<td>1%</td>
					<td>1%</td>
					<td>1%</td>
					<td>1%</td>
					<td>Lorem ipsum sit amet ::::</td>
					</tr>
				</tbody>
				</table>
				</div>
			</div>
			</div>
		</div>
	</div>
<!-- ==== Sección reportes Fin ==================================================================================================================================================== -->
<!-- ==== Sección reportes Fin ==================================================================================================================================================== -->

<!-- ==== Sección Lista Inicio ==================================================================================================================================================== -->
<!-- ==== Sección Lista Inicio ==================================================================================================================================================== -->
	<div id="lista" role="tabpanel" class="tab-pane">
		<div class="col-md-12">
			<div class="box">
				<div class="box-body">
					<div class="table-responsive">
						<table id="displayListaActividades" class="table table-bordered table-striped table-chs" width="100%">
							<thead>
								<tr>
									<th>Editar</th>
									<th>Editar</th>
									<th>AF/BC</th>
									<th>Activo</th>
									<th>Marca</th>
									<th>Modelo</th>
									<th>N/S</th>
									<th>Nombre Rutina</th>
									<th>Frecuencia</th>
									<th>Descripción corta</th>
									<th>Estatus Activo</th>
								</tr>
							</thead>
							<tbody></tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- ==== Sección Lista Fin ====================================================================================================================================================== -->
<!-- ==== Sección Lista Fin ====================================================================================================================================================== -->

<!-- ==== Sección Global Inicio =================================================================================================================================================== -->
<!-- ==== Sección Global Inicio =================================================================================================================================================== -->
<!-- tab#4 -->
	<div id="global" role="tabpanel" class="tab-pane">

		<div class="gray">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<span><font color="red">*</font></span><label class="control-label" style="font-size: 11px;">Ubicación Primaria</label>
								<select class="form-control" id="cmbubicacionprim" data-combo-ubicacion-secundaria="cmbubicacionsec" onchange="cambioUbicacionPrimaria(this);"></select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<span><font color="red">*</font></span><label class="control-label" style="font-size: 11px;">Ubicación Secundaria</label>
								<select class="form-control" id="cmbubicacionsec">
									<option value="-1">--Ubicación Secundaria--</option>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<span><font color="red">*</font></span><label class="control-label" style="font-size: 11px;">Clase</label>
								<select class="form-control" id="cmbclase" data-combo-clasificacion="cmbclasificacion" onchange="cambioClase(this);"></select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<span><font color="red">*</font></span><label class="control-label" style="font-size: 11px;">Clasificación</label>
								<select class="form-control" id="cmbclasificacion">
									<option value="-1">--Clasificación--</option>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<span><font color="red">*</font></span><label class="control-label" style="font-size: 11px;">Familia</label>
								<select class="form-control" id="cmbfamilia" data-combo-familia="cmbsubfamilia" onchange="cambioFamilia(this);"></select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<span><font color="red">*</font></span><label class="control-label" style="font-size: 11px;">Subfamilia</label>
								<select class="form-control" id="cmbsubfamilia">
									<option value="-1">--Subfamilia--</option>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<div id="muestro_select">
									<span><font color="red">*</font></span>
									<label  class="control-label"  style="font-size: 11px;">Usuario</label>
									<select id="select-usuarios" class="demo-default" placeholder="Usuarios" style="display:none"></select>
								</div>
								<div id="gifcargando-usuarios" style="display:none" align="center">
									<img src="../dist/img/cargando-loading.gif" style="max-width: 25px; max-height: 25px" alt="cargando-loading-037.gif">
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<span><font color="red">*</font></span><label class="control-label" style="font-size: 11px;">Programadas</label>
								<select class="form-control" id="cmbprogramadas">
									<option value="-1">--Selecciona una opción--</option>
									<option value="1" selected>Si</option>
									<option value="2">No</option>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<span><font color="red">*</font></span><label class="control-label" style="font-size: 11px;">Nombre Rutina</label>
								<input type="text" class="form-control" placeholder="Nombre Rutina" id="text_Nombre_Rutina">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<span><font color="red">*</font></span><label class="control-label" style="font-size: 11px;">Descripci&oacute;n Corta</label>
								<input type="text" class="form-control" placeholder="Descripción Corta" id="text_Descripcion_Corta">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<span><font color="red">*</font></span><label class="control-label" style="font-size: 11px;">Mostrar</label>
								<select class="form-control" id="Slc_Mostrar">
									<option value="1">Primera Actividad</option>
									<option value="2">Detalle Actividades</option>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<span><font color="red">*</font></span><label class="control-label" style="font-size: 11px;">Buscar / Limpiar</label>
								<br>
								<button type="button" class="btn chs"  onclick="global()">Buscar</button>
								<button type="button" class="btn chs"  onclick="limpiar_global('1')">Limpiar</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="col-md-12">
			<div class="box">
				<div class="box-body">
					<input type="hidden" id="anio_global">
					<ul class="nav-time">
						<li><a href="#noir" onclick="global_anterior()"><span><i class="fa fa-chevron-left" aria-hidden="true"></i></span></a></li>
						<li id="li_anio_global"></li>
						<li><a href="#noir" onclick="global_siguiente()"><span><i class="fa fa-chevron-right" aria-hidden="true"></i></span></a></li>
						<li class="export"><a href="#excel" onclick="return ExcellentExport.excel(this, 'tabla_Global', 'Actividades');"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a></li>
					</ul>
				<!-- ==== Tabla Global ==== -->
					<div class="" id="tabla_Global"></div>
				<!-- ==== Seccion Global ==== -->


					<div class="table-responsive" style="display:none">
						<table class="table table-bordered display" width="100%" id="tblexcel_actividades">
							<thead>
								<tr>
									<td style="color:#fff;" class="text-center">UBICACIÓN SECUNDARIA</td>
									<td style="color:#fff;" class="text-center">TIPO</td>
									<td style="color:#fff;" class="text-center">AF/BC</td>
									<td style="color:#fff;" class="text-center">NO SERIE</td>
									<td style="color:#fff;" class="text-center">EQUIPO</td>
									<td style="color:#fff;" class="text-center">ACTIVIDADES</td>
									<td style="color:#fff;" class="text-center">PERIODO</td>
									<td colspan="26" style="color:#fff;" class="text-center">MES</td>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="text-center"></td>  
									<td class="text-center"></td>
									<td class="text-center"></td>
									<td class="text-center"></td>
									<td class="text-center"></td>
									<td class="text-center"></td>
									<td class="text-center"></td>
									<td colspan="2" class="text-center">Ene</td>
									<td colspan="2" class="text-center">Feb</td>
									<td colspan="2" class="text-center">Mar</td>
									<td colspan="2" class="text-center">Abr</td>
									<td colspan="2" class="text-center">May</td>
									<td colspan="2" class="text-center">Jun</td>
									<td colspan="2" class="text-center">Jul</td>
									<td colspan="2" class="text-center">Ago</td>
									<td colspan="2" class="text-center">Sep</td>
									<td colspan="2" class="text-center">Oct</td>
									<td colspan="2" class="text-center">Nov</td>
									<td colspan="2" class="text-center">Dic</td>
								</tr>
								<tr>
									<td>Pediatría</td><!--Ubicacion secundaria-->  
									<td>I</td><!--Tipo-->
									<td>AF00103</td><!--AF/BC-->
									<td>80104072235</td><!--No Serie-->
									<td>ESFIGMOMANOMETRO DE PARED WA</td><!--Equipo-->
									<td>A</td><!--Periodo-->
									<td>P</td><!--Enero-->
									<td style="background-color:#f4f4f4;">R</td><!--Enero-->
									<td>P</td><!--Febrero-->
									<td style="background-color:#f4f4f4;">R</td><!--Febrero-->
									<td>P</td><!--Marzo-->
									<td style="background-color:#f4f4f4;">R</td><!--Marzo-->
									<td>P</td><!--Abril-->
									<td style="background-color:#f4f4f4;">R</td><!--Abril-->
									<td>P</td><!--Mayo-->
									<td style="background-color:#f4f4f4;">R</td><!--Mayo-->
									<td>P</td><!--Junio-->
									<td style="background-color:#f4f4f4;">R</td><!--Junio-->
									<td>P</td><!--Julio-->
									<td style="background-color:#f4f4f4;">R</td><!--Julio-->
									<td>P</td><!--Agosto-->
									<td style="background-color:#f4f4f4;">R</td><!--Agosto-->
									<td>P</td><!--Septiembre-->
									<td style="background-color:#f4f4f4;">R</td><!--Septiembre-->
									<td>P</td><!--Octubre-->
									<td style="background-color:#f4f4f4;">R</td><!--Octubre-->
									<td>P</td><!--Noviembre-->
									<td style="background-color:#f4f4f4;">R</td><!--Noviembre-->
									<td>P</td><!--Diciembre-->
									<td style="background-color:#f4f4f4;">R</td><!--Diciembre-->
								</tr>
								<tr>
									<td>Pediatría</td><!--Ubicacion secundaria-->  
									<td>E</td><!--Tipo-->
									<td>AF04540</td><!--AF/BC-->
									<td>CN44000984</td><!--No Serie-->
									<td>MONITOR DE SIGNOS VITALES GOLDWAY</td><!--Equipo-->
									<td>S</td><!--Periodo-->
									<td></td><!--Enero-->
									<td style="background-color:#00a65a;">13</td><!--Enero-->
									<td></td><!--Febrero-->
									<td style="background-color:#f4f4f4;"></td><!--Febrero-->
									<td></td><!--Marzo-->
									<td style="background-color:#f4f4f4;"></td><!--Marzo-->
									<td></td><!--Abril-->
									<td style="background-color:#f4f4f4;"></td><!--Abril-->
									<td></td><!--Mayo-->
									<td style="background-color:#f4f4f4;"></td><!--Mayo-->
									<td></td><!--Junio-->
									<td style="background-color:#f4f4f4;"></td><!--Junio-->
									<td></td><!--Julio-->
									<td style="background-color:#f4f4f4;"></td><!--Julio-->
									<td>17</td><!--Agosto-->
									<td style="background-color:#f4f4f4;"></td><!--Agosto-->
									<td></td><!--Septiembre-->
									<td style="background-color:#f4f4f4;"></td><!--Septiembre-->
									<td></td><!--Octubre-->
									<td style="background-color:#f4f4f4;"></td><!--Octubre-->
									<td></td><!--Noviembre-->
									<td style="background-color:#f4f4f4;"></td><!--Noviembre-->
									<td></td><!--Diciembre-->
									<td style="background-color:#f4f4f4;"></td><!--Diciembre-->
								</tr>
								<tr>
									<td>Pediatría</td><!--Ubicacion secundaria-->  
									<td>E</td><!--Tipo-->
									<td>AF04539</td><!--AF/BC-->
									<td>CN44000983</td><!--No Serie-->
									<td>MONITOR DE SIGNOS VITALES GOLDWAY</td><!--Equipo-->
									<td>A</td><!--Periodo-->
									<td></td><!--Enero-->
									<td style="background-color:#f4f4f4;"></td><!--Enero-->
									<td></td><!--Febrero-->
									<td style="background-color:#f4f4f4;"></td><!--Febrero-->
									<td></td><!--Marzo-->
									<td style="background-color:#f4f4f4;"></td><!--Marzo-->
									<td>13</td><!--Abril-->
									<td style="background-color:#fa4848;"></td><!--Abril-->
									<td></td><!--Mayo-->
									<td style="background-color:#f4f4f4;"></td><!--Mayo-->
									<td></td><!--Junio-->
									<td style="background-color:#f4f4f4;"></td><!--Junio-->
									<td></td><!--Julio-->
									<td style="background-color:#f4f4f4;"></td><!--Julio-->
									<td></td><!--Agosto-->
									<td style="background-color:#f4f4f4;"></td><!--Agosto-->
									<td></td><!--Septiembre-->
									<td style="background-color:#f4f4f4;"></td><!--Septiembre-->
									<td></td><!--Octubre-->
									<td style="background-color:#f4f4f4;"></td><!--Octubre-->
									<td></td><!--Noviembre-->
									<td style="background-color:#f4f4f4;"></td><!--Noviembre-->
									<td></td><!--Diciembre-->
									<td style="background-color:#f4f4f4;"></td><!--Diciembre-->
								</tr>
								<tr>
									<td>Pediatría</td><!--Ubicacion secundaria-->  
									<td>E</td><!--Tipo-->
									<td>AF04538</td><!--AF/BC-->
									<td>CN44000982</td><!--No Serie-->
									<td>MONITOR DE SIGNOS VITALES GOLDWAY</td><!--Equipo-->
									<td>A</td><!--Periodo-->
									<td></td><!--Enero-->
									<td style="background-color:#f4f4f4;"></td><!--Enero-->
									<td></td><!--Febrero-->
									<td style="background-color:#f4f4f4;"></td><!--Febrero-->
									<td></td><!--Marzo-->
									<td style="background-color:#f4f4f4;"></td><!--Marzo-->
									<td></td><!--Abril-->
									<td style="background-color:#f4f4f4;"></td><!--Abril-->
									<td></td><!--Mayo-->
									<td style="background-color:#f4f4f4;"></td><!--Mayo-->
									<td></td><!--Junio-->
									<td style="background-color:#f4f4f4;"></td><!--Junio-->
									<td></td><!--Julio-->
									<td style="background-color:#f4f4f4;"></td><!--Julio-->
									<td></td><!--Agosto-->
									<td style="background-color:#f4f4f4;"></td><!--Agosto-->
									<td></td><!--Septiembre-->
									<td style="background-color:#f4f4f4;"></td><!--Septiembre-->
									<td>12</td><!--Octubre-->
									<td style="background-color:#fa4848;"></td><!--Octubre-->
									<td></td><!--Noviembre-->
									<td style="background-color:#f4f4f4;"></td><!--Noviembre-->
									<td></td><!--Diciembre-->
									<td style="background-color:#f4f4f4;"></td><!--Diciembre-->
								</tr>
								<tr>
									<td>Pediatría</td><!--Ubicacion secundaria-->  
									<td>I</td><!--Tipo-->
									<td>AF00105</td><!--AF/BC-->
									<td>80104072235</td><!--No Serie-->
									<td>ESFIGMOMANOMETRO DE PARED</td><!--Equipo-->
									<td>S</td><!--Periodo-->
									<td>15</td><!--Enero-->
									<td style="background-color:#00a65a;">13</td><!--Enero-->
									<td></td><!--Febrero-->
									<td style="background-color:#f4f4f4;"></td><!--Febrero-->
									<td></td><!--Marzo-->
									<td style="background-color:#f4f4f4;"></td><!--Marzo-->
									<td></td><!--Abril-->
									<td style="background-color:#f4f4f4;"></td><!--Abril-->
									<td></td><!--Mayo-->
									<td style="background-color:#f4f4f4;"></td><!--Mayo-->
									<td></td><!--Junio-->
									<td style="background-color:#f4f4f4;"></td><!--Junio-->
									<td></td><!--Julio-->
									<td style="background-color:#f4f4f4;"></td><!--Julio-->
									<td>17</td><!--Agosto-->
									<td style="background-color:#f4f4f4;"></td><!--Agosto-->
									<td></td><!--Septiembre-->
									<td style="background-color:#f4f4f4;"></td><!--Septiembre-->
									<td></td><!--Octubre-->
									<td style="background-color:#f4f4f4;"></td><!--Octubre-->
									<td></td><!--Noviembre-->
									<td style="background-color:#f4f4f4;"></td><!--Noviembre-->
									<td></td><!--Diciembre-->
									<td style="background-color:#f4f4f4;"></td><!--Diciembre-->
								</tr>
							</tbody>
						</table>
					</div>



				</div>
			</div>
		</div>

	</div>
<!-- ==== Sección Global Fin ====================================================================================================================================================== -->
<!-- ==== Sección Global Fin ====================================================================================================================================================== -->

<!-- ==== Sección Mantenimientos Mensuales Inicio ================================================================================================================================= -->
<!-- ==== Sección Mantenimientos Mensuales Inicio ================================================================================================================================= -->
	<div id="mantenimientoMensual" role="tabpanel" class="tab-pane active">
		<div class="gray">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<input type="hidden" id="PeriodoTiempoInicio" name="PeriodoTiempoInicio" value="<?php echo(date('01/m/Y')); ?>" />
					<input type="hidden" id="PeriodoTiempoFinal" name="PeriodoTiempoFinal" value="<?php echo(date('t/m/Y')); ?>" />
					<input type="hidden" id="cmbubicacionprim_mensual_tmp" name="cmbubicacionprim_mensual_tmp" />
					<input type="hidden" id="cmbubicacionsec_mensual_tmp" name="cmbubicacionsec_mensual_tmp" />
					<input type="hidden" id="cmbclase_mensual_tmp" name="cmbclase_mensual_tmp" />
					<input type="hidden" id="cmbclasificacion_mensual_tmp" name="cmbclasificacion_mensual_tmp" />
					<input type="hidden" id="cmbfamilia_mensual_tmp" name="cmbfamilia_mensual_tmp" />
					<input type="hidden" id="cmbsubfamilia_mensual_tmp" name="cmbsubfamilia_mensual_tmp" />
					<input type="hidden" id="lstFiltrosMantenimiento_tmp" name="lstFiltrosMantenimiento_tmp" />
					<input type="hidden" id="select-activos-search-mensual_tmp" name="select-activos-search-mensual_tmp" />

					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label class="control-label">Ubicación Primaria</label>
								<select class="form-control" id="cmbubicacionprim_mensual" data-combo-ubicacion-secundaria="cmbubicacionsec_mensual" onchange="cambioUbicacionPrimaria(this);"></select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label class="control-label">Ubicación Secundaria</label>
								<select class="form-control" id="cmbubicacionsec_mensual">
									<option value="-1">--Ubicación Secundaria--</option>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label class="control-label">Clase</label>
								<select class="form-control" id="cmbclase_mensual" data-combo-clasificacion="cmbclasificacion_mensual" onchange="cambioClase(this);"></select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label class="control-label">Clasificación</label>
								<select class="form-control" id="cmbclasificacion_mensual">
									<option value="-1">--Clasificación--</option>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label class="control-label">Familia</label>
								<select class="form-control" id="cmbfamilia_mensual" data-combo-familia="cmbsubfamilia_mensual" onchange="cambioFamilia(this);"></select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label class="control-label">Activo</label>
								<select class="form-control" id="cmbsubfamilia_mensual">
									<option value="-1">--Subfamilia--</option>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label class="control-label">AF/BC</label>
								<div id="muestro_select"><select id="select-activos-search-mensual" class="demo-default" placeholder="AF/BC" style="display:none"></select></div>
								<div id="gifcargando-search-mensual" style="display:none" align="center"><img src="../dist/img/cargando-loading.gif" style="max-width: 25px; max-height: 25px" alt="cargando-loading-037.gif"></div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label class="control-label">Buscar / Limpiar</label>
								<br>
								<button type="button" class="btn chs" onclick="reporteMantenimientoMes(); reporteMantenimientoPendiente();">Buscar</button>
								<button type="button" class="btn chs" onclick="restablecerFiltros();">Limpiar</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="box">
					<div class="box-body">
						<div class="row">
							<div class="col-md-12">
								<ul class="acoat">
									<li>Estatus: </li>
									<li>Realizado y cerrado<span style="background: #448aff; width: 1.2em; height: 1.2em;"></span></li>
									<li>Realizado en espera de cierre<span style="background: #35a61e;width: 1.2em; height: 1.2em;"></span></li>
									<li>En seguimiento Mesa de Ayuda <span style="background: #ecc93b;width: 1.2em; height: 1.2em;"></span></li>
									<li>No Realizado <span style="background: #D90505;width: 1.2em; height: 1.2em;"></span></li>
								</ul>
							</div>
						</div>
						<div id="mantenimientos_mes" class="row">
							<div class="col-md-12">
								<ul class="nav nav-tabs">
									<li class="active"><a data-toggle="tab" href="#mantenimientoMesActualTab">Mantenimientos del mes</a></li>
									<li><a data-toggle="tab" href="#mantenimientoPendientesTab">Mantenimientos pendientes</a></li>
								</ul>
								<div class="tab-content">
									<!-- ==== Mantenimientos del mes ==== -->
										<div id="mantenimientoMesActualTab" class="tab-pane active">
											<div class="row">
												<div class="col-md-12 text-right" style="padding: 1em;">
													<button class="btn btn-default" onclick="reporteMantenimientoMes(-1);"><span class="glyphicon glyphicon-chevron-left">&nbsp;</span>Mes anterior</button>
													<button class="btn btn-default" onclick="reporteMantenimientoMes(1);">Siguiente mes&nbsp;<span class="glyphicon glyphicon-chevron-right"></button>
													&nbsp;&nbsp;
													<button class="btn btn-default" onclick="reporteMantenimientoMes();">Mes actual&nbsp;<span class="glyphicon glyphicon-calendar"></button>
												</div>
											</div>
											<div id="mantenimientoMesActualContenedor">
												<div class="text-center">...</div>
											</div>
										</div>
									<!-- ==== Mantenimienrtos pendientes ==== -->
										<div id="mantenimientoPendientesTab" class="tab-pane">
											<div id="mantenimientoPendientesContenedor">
												<div class="text-center">...</div>
											</div>
										</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<style>
			#mantenimientos_mes .nav-tabs { border-bottom: 1px solid #ddd !important; }
				#mantenimientos_mes .nav-tabs li { display: table-cell !important; bottom: -1px !important; position: relative; }
				#mantenimientos_mes .nav-tabs a { color: initial !important; border-radius: 4px 4px 0 0 !important; }
		</style>
	</div>
<!-- ==== Sección Mantenimientos Mensuales Fin =================================================================================================================================== -->
<!-- ==== Sección Mantenimientos Mensuales Fin =================================================================================================================================== -->

<!-- ||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| -->
<!-- /.row -->		
	</div>
</div>
<!-- ||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| -->

<!-- ==== Sección Modal Mto Preventivo Inicio ==================================================================================================================================== -->
<!-- ==== Sección Modal Mto Preventivo Inicio ==================================================================================================================================== -->

<div class="modal fade modalchs" id="Actividades_Activo_Fijo" data-backdrop="false" >
	<div class="modal-dialog modal-xl">
		<div class="modal-content">

				<div class="modal-header azul">
					<button type="button" class="close" onclick="confirmacion_cerrar_mant_prev('Actividades_Activo_Fijo');"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Mantenimiento Preventivo</h4>
				</div>
				
				<div class="modal-body nopsides">

					<form>
					<div class="gray nm">
						<div class="row">
							<div class="col-md-10 col-md-offset-1">
								<input type="hidden"  id="Id_Actividad" readonly="readonly">
								<input type="hidden" id="Estatus_Realizado">
								<input type="hidden" id="Estatus_Guardar">
								<input type="hidden" id="Fecha_Calendario">

								<div class="col-md-8">
									<div class="form-group">
										<div id="muestro_select">
											<span><font color="red">*</font></span>
											<label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">AF/BC</label>
											<select id="select-activos" class="demo-default" placeholder="AF/BC" style="display:none"></select>
										</div>
										<div id="gifcargando1" style="display:none" align="center">
											<img src="../dist/img/cargando-loading.gif" style="max-width: 25px; max-height: 25px" alt="cargando-loading-037.gif">
										</div>
									</div>
								</div>

								<div class="col-md-12"></div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Ubicación primaria</label>
										<input type="text" class="form-control" placeholder="Ubicación primaria" id="txt_ubic_primaria" readonly="readonly">
									</div>
									<div class="form-group">
										<label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Ubicación secundaria</label>	
										<input type="text" class="form-control" placeholder="Ubicación secundaria" id="txt_ubic_secundaria" readonly="readonly">
									</div>
									<div class="form-group">
										<label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Marca</label>		
										<input type="text" class="form-control" placeholder="Marca" id="txt_marca" readonly="readonly">
									</div>
									<div class="form-group">
										<label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Modelo</label>
										<input type="text" class="form-control" placeholder="Modelo" id="text_Modelo" readonly="readonly">
									</div>
									<!-- <div class="form-group">
										<label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Fecha a reprogramada</label>									
										<input type="date" class="form-control" name="siga_fecha_programada" id="siga_fecha_programada">
									</div> -->

								</div><!-- columna#1 -->
								<input type="hidden" class="form-control" id="txt_Id_Activo" readonly="readonly">	
								<div class="col-md-4">
									<div class="form-group">
										<label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Nombre Activo</label>	
										<input type="text" class="form-control" placeholder="Nombre" id="txt_Nom_Activo" readonly="readonly">
									</div>
									<div class="form-group">
										<label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">No. Serie</label>	
										<input type="text" class="form-control" placeholder="No. de serie" id="text_No_Serie" readonly="readonly">
									</div>
									<div class="form-group">
										<label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Descripción corta</label>
										<textarea rows="1" class="form-control" placeholder="Descripción Corta" id="text_Desc_Corta" readonly="readonly"></textarea>
									</div>
									<div class="form-group">
										<label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Ubicación</label>
										<textarea rows="1" class="form-control" placeholder="Ubicación Especifica" id="text_Ubicacion_Especifica" readonly="readonly"></textarea>
									</div>
									<div class="form-group" style="display:none">
										<label class="control-label" id="cmbareasLabel" style="font-size: 11px;">AF/BC</label>
										<input type="text" class="form-control" placeholder="AF/BC" id="text_AFBC" readonly="readonly">
									</div>
									<div class="form-group" style="display:none">
										<label class="control-label" id="cmbareasLabel" style="font-size: 11px;">Usuario Responsable</label>
										<input type="text" class="form-control" placeholder="Usuario Resp." id="text_Usr_Resp" readonly="readonly">
									</div>
									<div class="form-group" style="display:none">
										<label class="control-label" id="cmbareasLabel" style="font-size: 11px;">Id Usuario</label>
										<input type="text" class="form-control" placeholder="Id Usuario" id="text_Id_Usuario" readonly="readonly">
									</div>
								</div><!-- columna#2 -->
								<div class="col-md-4">
									<label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Foto</label>
									<div class="form-group" id="Imagen_Activo">
										<img src="../dist/img/no-camera.png" style="width: 150px; height: 150px;">
									</div>
								</div><!-- columna#2 -->
							</div>
						</div>
					</div>

					<div class="row gray nm">
						<div class="col-md-12">

							<div class="col-md-4">
								<div class="form-group">
									<label for="siga_rutinasGet" class="control-label" style="font-size: 11px;">Rutina:</label>										
										<div id="com_select_rutinas"></div>
								</div>
							</div>

							<div class="col-md-2">
								<div class="form-group">
									<label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Fecha a reprogramada</label>									
									<input type="date" class="form-control" name="siga_fecha_programada" id="siga_fecha_programada">
								</div>
							</div>

							<div class="col-md-2">
								<div class="form-group">
									<label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Frecuencia</label>
									<select class="form-control" id="siga_frecuencia">
										<option value="2">Mensual</option>
										<option value="3">Bimestral</option>
										<option value="4">Trimestral</option>
										<option value="5">Cuatrimestral</option>
										<option value="6">Semestral</option>
										<option value="7">Anual</option>
									</select>
								</div>								
							</div>

							<div class="col-md-2">
								<div class="form-group">
										<label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Realiza</label>
										<select class="form-control" id="siga_realiza">
											<option value="0">Interno</option>
											<option value="1">Externo</option>
										</select>
								</div>
							</div>

							<div class="col-md-2">
								<div class="form-group">
									<center>
										<label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Vincular Mesa</label><br>
										<input type="checkbox" class="form-checkbox" name="vincular_a_mesa_ayuda" id="vincular_a_mesa_ayuda">
									</center>
								</div>
							</div>

						</div>
					</div>


					<!-- <div id="tabla_de_accesorios"></div>
					<div id="tabla_de_materiales"></div> -->

					<!-- <div class="row nm" style="display:none;">
						<div class="col-md-10 col-md-offset-1">
							<div class="admin-content">
								<div class="col-md-12">
									<div class="form-group" id="Cadena_doc_adjuntos"></div>
									<div id="div_archivos_multiples_lista"></div>
								</div>
							</div>	
						</div>
					</div> -->

					<!-- <div class="row">
						<div class="col-md-10 col-md-offset-1">
							<div class="col-md-12">
								<div class="form-group">
									<label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Comentarios</label>
									<textarea rows="4" class="form-control" placeholder="Comentarios" id="txt_comentarios"></textarea>
								</div>
							</div>
						</div>
					</div> -->

				</form>	
			</div>

			<div class="modal-footer">
				<table border="0" align="center">
					<tr>
						<td width="50%" id="td_formato"></td>
						<td width="50%">
							<button type="button" class="btn chs" id="btn_guardar">Guardar</button>					
						</td>
					</tr>
				</table>
			</div>

		</div>
	</div>
</div>

<!-- ==== Sección Modal Mto Preventivo Fin ====================================================================================================================================== -->
<!-- ==== Sección Modal Mto Preventivo Fin ====================================================================================================================================== -->

<!-- ==== Sección Modal Mto Preventivo Reprogramar Inicio ======================================================================================================================== -->
<!-- ==== Sección Modal Mto Preventivo Reprogramar Inicio ======================================================================================================================== -->

<div class="modal fade modalchs" id="Actividades_Activo_Fijo_Reprogramar" data-backdrop="false" >
	<div class="modal-dialog modal-xl">
		<div class="modal-content">

				<div class="modal-header azul">
					<button type="button" class="close" onclick="confirmacion_cerrar_mant_prev('Actividades_Activo_Fijo_Reprogramar');"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Mantenimiento Preventivo</h4>
				</div>
				
				<div class="modal-body nopsides">

					<form>
					<div class="gray nm">
						<div class="row">
							<div class="col-md-10 col-md-offset-1">
								<input type="hidden"  id="Id_Actividad" readonly="readonly">
								<input type="hidden" id="Estatus_Realizado">
								<input type="hidden" id="Estatus_Guardar">
								<input type="hidden" id="Fecha_Calendario">

								<div class="col-md-8">
									<div class="form-group">
										<div id="muestro_select">
											<span><font color="red">*</font></span>
											<label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">AF/BC-Activo</label>											
											<input type="text" class="form-control" placeholder="Ubicación primaria" id="texto_AF_BC" readonly="readonly">
										</div>
										<div id="gifcargando1" style="display:none" align="center">
											<img src="../dist/img/cargando-loading.gif" style="max-width: 25px; max-height: 25px" alt="cargando-loading-037.gif">
										</div>
									</div>
								</div>

								<div class="col-md-12"></div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Ubicación primaria</label>
										<input type="text" class="form-control" placeholder="Ubicación primaria" id="texto_ubic_primaria" readonly="readonly">
									</div>
									<div class="form-group">
										<label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">No. Serie</label>	
										<input type="text" class="form-control" placeholder="No. de serie" id="texto_No_Serie" readonly="readonly">
									</div>

									<div class="form-group">
										<label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Marca</label>		
										<input type="text" class="form-control" placeholder="Marca" id="texto_marca" readonly="readonly">
									</div>

									<div class="form-group">
										<label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Fecha Programada</label>
										<input type="date" class="form-control" name="siga_fecha_programada" id="texto_fecha_programada" readonly="readonly" >
									</div>

									<div class="form-group">
										<label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Rutina</label>
										<input type="text" class="form-control" placeholder="Rutina" id="texto_Rutina" readonly="readonly">
									</div>

								</div><!-- columna#1 -->
								<input type="hidden" class="form-control" id="txt_Id_Activo" readonly="readonly">	
								<div class="col-md-4">
									<!-- <div class="form-group">
										<label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Nombre Activo</label>	
										<input type="text" class="form-control" placeholder="Nombre" id="txt_Nom_Activo" readonly="readonly">
									</div> -->
									<div class="form-group">
										<label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Ubicación secundaria</label>	
										<input type="text" class="form-control" placeholder="Ubicación secundaria" id="texto_ubic_secundaria" readonly="readonly">
									</div>
									<!-- <div class="form-group">
										<label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Descripción corta</label>
										<textarea rows="1" class="form-control" placeholder="Descripción Corta" id="text_Desc_Corta" readonly="readonly"></textarea>
									</div> -->
									<div class="form-group">
										<label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Modelo</label>
										<input type="text" class="form-control" placeholder="Modelo" id="texto_Modelo" readonly="readonly">
									</div>
									<div class="form-group">
										<label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Ubicación</label>
										<textarea rows="1" class="form-control" placeholder="Ubicación Especifica" id="texto_Ubicacion_Especifica" readonly="readonly"></textarea>
									</div>
									<div class="form-group">
										<label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Fecha a reprogramada</label>									
										<input type="date" class="form-control" name="texto_fecha_reprogramada" id="texto_fecha_reprogramada"  onkeypress="return false;">
									</div>
									<div class="form-group">
										<label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Id Actividad</label>									
										<input type="text" class="form-control" placeholder="Id Operación" id="texto_id_actividad" readonly="readonly">
									</div>
								</div><!-- columna#2 -->
								<div class="col-md-4">
									<label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Foto</label>
									<div class="form-group" id="Imagen_Activo">
										<img src="../dist/img/no-camera.png" style="width: 150px; height: 150px;">
									</div>
								</div><!-- columna#2 -->
							</div>
						</div>
					</div>

				</form>	
			</div>

			<div class="modal-footer">
				<table border="0" align="center">
					<tr>

						<td width="100%">
							<button type="button" class="btn chs" id="btn_actividad_guardar">Guardar nueva fecha</button>
							<button type="button" class="btn btn-danger" id="btn_actividad_cancelar">Cancelar Actividad</button>			
						</td>
					</tr>
				</table>
			</div>

		</div>
	</div>
</div>

<!-- ==== Sección Modal Mto Preventivo Reprogramar Fin ======================================================================================================================== -->
<!-- ==== Sección Modal Mto Preventivo Reprogramar Fin ======================================================================================================================== -->


	<!-- File Input -->
	<script src="../plugins/fileinput/fileinput.js"></script>
	<script src="../plugins/fileinput/fileinput_locale_es.js"></script>
	<!-- FastClick -->
	<script src="../plugins/fastclick/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="../dist/js/app.min.js"></script>
	<!-- SlimScroll 1.3.0 -->
	<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
	<!--<script src="../plugins/fullcalendaryear/fullcalendar.js"></script>-->
	<!-- AdminLTE for demo purposes -->
	<script src="../dist/js/demo.js"></script> 
	<script src="funciones_actividades.js"></script>

	<script src="/siga/plugins/sweetalert2/sweetalert2.js"></script>
	<script src="/siga/class/fx.js"></script>

	<script type="text/javascript">

		$(document).ready(function(){
			$('#loadingState').css('display','none');

			$('#com_select_rutinas').load('/siga/vistas/view/biomedica/components/rutinas/siga_select_rutinas.com.php');
			$('#tabla_de_accesorios').load('/siga/vistas/view/biomedica/components/rutinas/siga_tabla_accesorios.com.php');
			$('#tabla_de_materiales').load('/siga/vistas/view/biomedica/components/rutinas/siga_tabla_materiales.com.php');	

			url_direccion = "../Archivos/Archivos-Actividades/Mantenimiento-Preventivo";
			Estatus_Tipo_Actividad = 2;
			autocomplete_activos();
			/*Inicia Controles Busqueda*/
			autocomplete_activos_search();
			/*Fin*/
			cmb_rutina(2);
			cmb_frecuencia();
			cmb_gestores();
			cmb_ejecutantes();

			// Genera la consulta del mantenimento del mes
			reporteMantenimientoMes();
			reporteMantenimientoPendiente();

//================================================================================================================================================
//================================================================================================================================================
$('#btn_actividad_guardar').on('click',function(){

let texto_fecha_programada 		= $('#texto_fecha_programada').val();
let texto_id_actividad				= $('#texto_id_actividad').val();
let texto_fecha_reprogramada	= $('#texto_fecha_reprogramada').val();
let validar 									= true;
let Id_Usuario 								= $('#usuariosesion').val();

if(texto_fecha_reprogramada == ''){
	$.alert({
    title: 'Campo Obligatorio',
    content: 'Fecha a reprogramada',
		type: 'red',
		icon: 'fa fa-warning',
	})
	validar = false;
} else if(texto_id_actividad=='' && texto_fecha_programada==''){
	$.alert({
    title: 'Operación sin éxito',
    content: 'Contacte a sistemas',
		type: 'red',
		icon: 'fa fa-warning',
	})
	validar = false;
}

if(validar){

	$.confirm({
					title: 'Confirmar cambio de fecha',
					content: '¿Deseas cambiar la fecha de la actividad?',
					type: 'dark',
					icon: 'fa fa-warning',
					buttons: {						
						Confirmar: function () {
//=============================================================================================================================	
						// $("#btn_actividad_guardar").attr('disabled', true);
						// $("#btn_actividad_cancelar").attr('disabled', true);

							$.ajax({
								type: "POST",
								url: "/siga/class/biomedica/mtoPreventivo/mtoPreventivo.ajax.php",
								data: {accion:6,
											texto_fecha_programada:texto_fecha_programada,
											texto_id_actividad:texto_id_actividad,
											texto_fecha_reprogramada:texto_fecha_reprogramada,
											Id_Usuario:Id_Usuario},
								dataType: "JSON",
								beforeSend: function(){
									jsShowWindowLoad('Procesando');
								},
								success: function (response) {
									//reporteMantenimientoMes();
									$('#calendario-shit').fullCalendar('destroy');
									existeCalendario = false;							
									generarCalendario();
									$('#Actividades_Activo_Fijo_Reprogramar').modal('hide');										
										jsRemoveWindowLoad();
										
								},
								error:function(response){
									console.log(response);
									alert(response);
									jsRemoveWindowLoad();
								}
							});

						},
						Cerrar: function () {

						}
					}
				});
//=============================================================================================================================

			}
});
//================================================================================================================================================
//================================================================================================================================================
$('#btn_actividad_cancelar').on('click',function(){

	let texto_fecha_programada 		= $('#texto_fecha_programada').val();
	let texto_id_actividad				= $('#texto_id_actividad').val();
	let validar 									= true;
	let Id_Usuario 								= $('#usuariosesion').val();



	$.confirm({
					title: 'Confirmar cancelación de fecha',
					content: '¿Deseas cancelar la fecha de la actividad?',
					type: 'red',
					icon: 'fa fa-warning',
					buttons: {						
						Confirmar: function () {
							
							$.ajax({
								type: "POST",
								url: "/siga/class/biomedica/mtoPreventivo/mtoPreventivo.ajax.php",
								data: {accion:7,
											texto_fecha_programada:texto_fecha_programada,
											texto_id_actividad:texto_id_actividad,
											Id_Usuario:Id_Usuario
								},
								dataType: "JSON",
								beforeSend: function(){
									jsShowWindowLoad('Procesando');
								},
								success: function (response) {
									//reporteMantenimientoMes();
									$('#calendario-shit').fullCalendar('destroy');
									existeCalendario = false;							
									generarCalendario();
									$('#Actividades_Activo_Fijo_Reprogramar').modal('hide');										
										jsRemoveWindowLoad();																		
								},
								error:function(){
								
								}
							});

						},
						Cerrar: function () {

						}
					}
				});

});
//================================================================================================================================================
//================================================================================================================================================



	$('#btn_guardar').on('click', function(){

		let validar 							= true;
		let arrayAccesorios				= [];
		let select_activos 				= $('#select-activos').val();
		let siga_rutinasGet 			= $('#siga_rutinasGet').val();
		let siga_rutinasGetNombre = $('#siga_rutinasGet').text();
		let siga_fecha_programada	= $('#siga_fecha_programada').val();
		let siga_frecuencia				= $('#siga_frecuencia').val();
		let siga_realiza					= $('#siga_realiza').val();
		let vincular_a_mesa_ayuda	= $('#vincular_a_mesa_ayuda').is(':checked');
		let Id_Usuario 						= $('#usuariosesion').val();
		let combo_accesorios_1		= $.trim($('#combo_accesorios_1').val());
		let combo_accesorios_2		= $.trim($('#combo_accesorios_2').val());
		let combo_accesorios_3		= $.trim($('#combo_accesorios_3').val());
		let combo_accesorios_4		= $.trim($('#combo_accesorios_4').val());
		let combo_accesorios_5		= $.trim($('#combo_accesorios_5').val());
		let manual_descripcion_1	= $.trim($('#manual_descripcion_1').val());
		let manual_descripcion_2	= $.trim($('#manual_descripcion_2').val());
		let manual_descripcion_3	= $.trim($('#manual_descripcion_3').val());
		let manual_descripcion_4	= $.trim($('#manual_descripcion_4').val());
		let manual_descripcion_5	= $.trim($('#manual_descripcion_5').val());
		let txt_comentarios				= $.trim($('#txt_comentarios').val());
		
		if(select_activos == ''){
			alerta('error', 'Obligatorio: seleccionar activo.');						
			validar = false;
		} else if(siga_rutinasGet == -1){
			alerta('error', 'Obligatorio: seleccionar Rutina.');						
			validar = false;
		} else if(siga_fecha_programada == ''){
			alerta('error', 'Obligatorio: Seleccionar Fecha a programar.');						
			validar = false;
		} 
		
		if(combo_accesorios_1 != ''){
			
			let Folio_Almacen_1 		= $('#Folio_Almacen_1').val();
			let cantidad_1					= $('#cantidad_1').val();
			let sku 								= $('#sku_vista_1').text();
			let combo_accesorios_1 	= $('#combo_accesorios_1').text();
			let clase_1 						= $('#clase_1').text();
			let unidad_1 						= $('#unidad_1').text();
			let costo_1							= $('#costo_1').text();

			if(Folio_Almacen_1 ==''){
				alerta('error', 'Obligatorio: Folio Almacen 1.');
				validar = false;	
			}else if(cantidad_1==''){
				alerta('error', 'Obligatorio: Cantidad 1.');
				validar = false;				
			} else {
				arrayAccesorios.push({nombre: combo_accesorios_1, folio: Folio_Almacen_1, sku:sku, cantidad: cantidad_1, clase:clase_1, unidad: unidad_1, costo: costo_1});
			}
		} 
		
		if(combo_accesorios_2 !== ''){
			
			let Folio_Almacen_2 		= $('#Folio_Almacen_2').val();
			let cantidad_2					= $('#cantidad_2').val();
			let sku 								= $('#sku_vista_2').text();
			let combo_accesorios_2 	= $('#combo_accesorios_2').text();
			let clase_2 						= $('#clase_2').text();
			let unidad_2 						= $('#unidad_2').text();
			let costo_2							= $('#costo_2').text();

			if(Folio_Almacen_2 == ''){
				alerta('error', 'Obligatorio: Folio Almacen 2.');
				validar = false;
			} else if(cantidad_2==''){
				alerta('error', 'Obligatorio: Cantidad 2.');
				validar = false;
			}else{
				arrayAccesorios.push({nombre: combo_accesorios_2, folio: Folio_Almacen_2, sku:sku, cantidad: cantidad_2, clase:clase_2, unidad: unidad_2, costo: costo_2});
			}

		} 
		
		if(combo_accesorios_3 != ''){
			
			let Folio_Almacen_3 		= $('#Folio_Almacen_3').val();
			let cantidad_3					= $('#cantidad_3').val();
			let sku 								= $('#sku_vista_3').text();
			let combo_accesorios_3 	= $('#combo_accesorios_3').text();
			let clase_3 						= $('#clase_3').text();
			let unidad_3 						= $('#unidad_3').text();
			let costo_3							= $('#costo_3').text();

			if(Folio_Almacen_3 == ''){
				alerta('error', 'Obligatorio: Folio Almacen 2.');
				validar = false;
			} else if(cantidad_3==''){
				alerta('error', 'Obligatorio: Cantidad 2.');
				validar = false;
			}else{
				arrayAccesorios.push({nombre: combo_accesorios_3, folio: Folio_Almacen_3, sku:sku, cantidad: cantidad_3, clase:clase_3, unidad: unidad_3, costo: costo_3});
			}

		} 
		if(combo_accesorios_4 != ''){
			
			let Folio_Almacen_4 		= $('#Folio_Almacen_4').val();
			let cantidad_4					= $('#cantidad_4').val();
			let sku 								= $('#sku_vista_4').text();
			let combo_accesorios_4 	= $('#combo_accesorios_4').text();
			let clase_4 						= $('#clase_4').text();
			let unidad_4 						= $('#unidad_4').text();
			let costo_4							= $('#costo_4').text();

			if(Folio_Almacen_4 == ''){
				alerta('error', 'Obligatorio: Folio Almacen 2.');
				validar = false;
			} else if(cantidad_4==''){
				alerta('error', 'Obligatorio: Cantidad 2.');
				validar = false;
			}else{
				arrayAccesorios.push({nombre: combo_accesorios_4, folio: Folio_Almacen_4, sku:sku, cantidad: cantidad_4, clase:clase_4, unidad: unidad_4, costo: costo_4});
			}
		}  
		
		if(combo_accesorios_5 != ''){
			
			let Folio_Almacen_5 		= $('#Folio_Almacen_5').val();
			let cantidad_5					= $('#cantidad_5').val();
			let sku 								= $('#sku_vista_5').text();
			let combo_accesorios_5 	= $('#combo_accesorios_5').text();
			let clase_5 						= $.trim($('#clase_5').text());
			let unidad_5 						= $.trim($('#unidad_5').text());
			let costo_5							= $('#costo_5').text();

			if(Folio_Almacen_5 == ''){
				alerta('error', 'Obligatorio: Folio Almacen 2.');
				validar = false;
			} else if(cantidad_5==''){
				alerta('error', 'Obligatorio: Cantidad 2.');
				validar = false;
			}else{
				arrayAccesorios.push({nombre: combo_accesorios_5, folio: Folio_Almacen_5, sku:sku, cantidad: cantidad_5, clase:clase_5, unidad: unidad_5, costo: costo_5});
			}
		}

		if(manual_descripcion_1 !=''){
			let manual_codigo_de_barras_1 = $('#manual_codigo_de_barras_1').val();
			let manual_costo_1						= $('#manual_costo_1').val();
			let manual_cantidad_1					= $('#manual_cantidad_1').val();

			if(manual_codigo_de_barras_1 == ''){
				alerta('error','Accesorio 1: Falta código de barras.');
				validar = false;
			} else if(manual_costo_1 ==''){
				alerta('error','Accesorio 1: Falta costo unitario.');
				validar = false;
			} else if (manual_cantidad_1==''){
				alerta('error','Accesorio 1: Falta cantidad.');
				validar = false;
			} else {
				arrayAccesorios.push({nombre: manual_descripcion_1, folio: '', sku: manual_codigo_de_barras_1, cantidad: manual_cantidad_1, clase:'', unidad: '', costo: manual_costo_1});
			}
		}	 

		if(manual_descripcion_2 !=''){
			let manual_codigo_de_barras_2 = $('#manual_codigo_de_barras_2').val();
			let manual_costo_2						= $('#manual_costo_2').val();
			let manual_cantidad_2					= $('#manual_cantidad_2').val();

			if(manual_codigo_de_barras_2 == ''){
				alerta('error','Accesorio 2: Falta código de barras.');
				validar = false;
			} else if(manual_costo_2 ==''){
				alerta('error','Accesorio 2: Falta costo unitario.');
				validar = false;
			} else if (manual_cantidad_2==''){
				alerta('error','Accesorio 2: Falta cantidad.');
				validar = false;
			} else {
				arrayAccesorios.push({nombre: manual_descripcion_2, folio: '', sku: manual_codigo_de_barras_2, cantidad: manual_cantidad_2, clase:'', unidad: '', costo: manual_costo_2});
			}
		}	 
		
		if(manual_descripcion_3 !=''){
			let manual_codigo_de_barras_3 = $('#manual_codigo_de_barras_3').val();
			let manual_costo_3						= $('#manual_costo_3').val();
			let manual_cantidad_3					= $('#manual_cantidad_3').val();

			if(manual_codigo_de_barras_3 == ''){
				alerta('error','Accesorio 3: Falta código de barras.');
				validar = false;
			} else if(manual_costo_3 ==''){
				alerta('error','Accesorio 3: Falta costo unitario.');
				validar = false;
			} else if (manual_cantidad_3==''){
				alerta('error','Accesorio 3: Falta cantidad.');
				validar = false;
			} else {
				arrayAccesorios.push({nombre: manual_descripcion_3, folio: '', sku: manual_codigo_de_barras_3, cantidad: manual_cantidad_3, clase:'', unidad: '', costo: manual_costo_3});
			}
		}	 

		if(manual_descripcion_4 !=''){
			let manual_codigo_de_barras_4 = $('#manual_codigo_de_barras_4').val();
			let manual_costo_4						= $('#manual_costo_4').val();
			let manual_cantidad_4					= $('#manual_cantidad_4').val();

			if(manual_codigo_de_barras_4 == ''){
				alerta('error','Accesorio 4: Falta código de barras.');
				validar = false;
			} else if(manual_costo_4 ==''){
				alerta('error','Accesorio 4: Falta costo unitario.');
				validar = false;
			} else if (manual_cantidad_4==''){
				alerta('error','Accesorio 4: Falta cantidad.');
				validar = false;
			} else {
				arrayAccesorios.push({nombre: manual_descripcion_4, folio: '', sku: manual_codigo_de_barras_4, cantidad: manual_cantidad_4, clase:'', unidad: '', costo: manual_costo_4});
			}
		}	 

		if(manual_descripcion_5 !=''){
			let manual_codigo_de_barras_5 = $('#manual_codigo_de_barras_5').val();
			let manual_costo_5						= $('#manual_costo_5').val();
			let manual_cantidad_5					= $('#manual_cantidad_5').val();

			if(manual_codigo_de_barras_5 == ''){
				alerta('error','Accesorio 5: Falta código de barras.');
				validar = false;
			} else if(manual_costo_5 == ''){
				alerta('error','Accesorio 5: Falta costo unitario.');
				validar = false;
			} else if (manual_cantidad_5==''){
				alerta('error','Accesorio 5: Falta cantidad.');
				validar = false;
			} else {
				arrayAccesorios.push({nombre: manual_descripcion_5, folio: '', sku: manual_codigo_de_barras_5, cantidad: manual_cantidad_5, clase:'', unidad: '', costo: manual_costo_5});
			}
		}	

		if(vincular_a_mesa_ayuda == false){
			vincular_a_mesa_ayuda=0;
		} else {
			vincular_a_mesa_ayuda=1;
		}

		if(validar){

			$.ajax({
				type: "POST",
				url: "/siga/class/biomedica/rutinas/rutinas.ajax.php",
				data: {accion:10, select_activos:select_activos, siga_rutinasGet:siga_rutinasGet,
							siga_fecha_programada:siga_fecha_programada, 
							siga_frecuencia:siga_frecuencia, siga_realiza:siga_realiza, 
							vincular_a_mesa_ayuda:vincular_a_mesa_ayuda, arrayAccesorios:arrayAccesorios,
							txt_comentarios:txt_comentarios, siga_rutinasGetNombre:siga_rutinasGetNombre,
							Id_Usuario:Id_Usuario},
				dataType: "JSON",
				cache: false,
				beforeSend:function(){
					$('#loadingState').show();
				},
				success: function (response) {					
					$('#Actividades_Activo_Fijo').modal('hide');
					$('#loadingState').hide();
				},
				error: function(response){
					$('#loadingState').hide();
					alert('error: Contacte a Sistemas.');
				}
			});
		}

	});

			guardar2 = function(){
				var Agregar = true; 
				var mensaje_error="";
				var Id_Actividad=$("#Id_Actividad").val();
				var Estatus_Realizado=$.trim($("#Estatus_Realizado").val());
				//Usuario Logueado
				var Id_Usuario=$("#usuariosesion").val();
				//Area
				var Id_Area=$("#idareasesion").val();
				//Mant. Predictivo=1, Mant. Preventivo=2, Mant. Correctivo=3, Capacitacion=4 
				var Tipo_Actividad=2;
				
				var Id_Activo=$.trim($("#txt_Id_Activo").val());
				var Nombre_Rutina=$.trim($("#txt_Nombre_Rutina").val());
				var Id_Frecuencia=$("#cmb_frecuencia").val();
				var Hasta_Anio=$("#cmb_hasta").val();
				var Comentarios=$.trim($("#txt_comentarios").val());
				var Descripcion=$.trim($("#txt_Desc_Corta").val());
				var Id_Gestor=$.trim($("#cmb_gestores").val());
				var Nombre_Ejecutante=$.trim($("#cmb_ejecutantes").val());

				var quien_realiza=0;
				var url_documentos_adjuntos=$.trim($("#url_documentos_adjuntos").val());
				var vincular_mesa_ayuda=0;
				
				var Mant_RAC1=$.trim($("#Mant_RAC1").val());
				var Mant_RAC2=$.trim($("#Mant_RAC2").val());
				var Mant_RAC3=$.trim($("#Mant_RAC3").val());
				var Mant_RAC4=$.trim($("#Mant_RAC4").val());
				var Cantidad_1=$.trim($("#Cantidad_M_1").val());
				var Cantidad_2=$.trim($("#Cantidad_M_2").val());
				var Cantidad_3=$.trim($("#Cantidad_M_3").val());
				var Cantidad_4=$.trim($("#Cantidad_M_4").val());
				var Costo_1=$.trim($("#Costo_M_1").val());
				var Costo_2=$.trim($("#Costo_M_2").val());
				var Costo_3=$.trim($("#Costo_M_3").val());
				var Costo_4=$.trim($("#Costo_M_4").val());
				var Horas=$.trim($("#Horas").val());
				var Costos_Materiales_CE=$.trim($("#Costos_Materiales_CE").val());
				var Mano_Obra_CE=$.trim($("#Mano_Obra_CE").val());
				var Total_CE=$.trim($("#Total_CE").val());
				var Costos_Materiales_CI=$.trim($("#Costos_Materiales_CI").val());
				var Mano_Obra_CI=$.trim($("#Mano_Obra_CI").val());
				var Total_CI=$.trim($("#Total_CI").val());
				var Ahorro=$.trim($("#Ahorro").val());
				var Est_Ok_Fallo_No_Aplica=false;
				if (Id_Activo.length<= 0) {
					Agregar = false; 
					mensaje_error += " -Falta agregar el Activo <br />";
				}
				
				if (Nombre_Rutina.length<= 0) {
					Agregar = false; 
					mensaje_error += " -Falta agregar la Rutina <br />";
				}
				
				if (Id_Frecuencia=="-1") {
					Agregar = false; 
					mensaje_error += " -Falta agregar la Frecuencia <br />";
				}
				
				if($("#radio_interno").prop('checked')){
					quien_realiza=0;
				}
				
				if($("#radio_externo").prop('checked')){
					quien_realiza=1;
				}
				
				if($("#vincular_mesa_ayuda_si").prop('checked')){
					vincular_mesa_ayuda=1;
				}
				
				if($("#vincular_mesa_ayuda_no").prop('checked')){
					vincular_mesa_ayuda=2;
				}
				///Validacion Calificacion general de las actividades 
				/*
				var Estatus_Calif_Guardar=$("#Estatus_Calif_Guardar").val();
				
				if(Estatus_Calif_Guardar==1){
					var Id_Calificacion=$("#Id_Calificacion").val();
					var hddP1=$.trim($("#hddP1").val());
					var hddP2=$.trim($("#hddP2").val());
					var hddP3=$.trim($("#hddP3").val());
					
					var coment_solucion=$.trim($("#Solucion").val());
					var coment_actitud=$.trim($("#Actitud").val());
					var coment_tiem_resp=$.trim($("#TiempoRespuesta").val());
					if (hddP1.length<= 0) {
						Agregar = false; 
						mensaje_error += " -Selecciona una carita en solución ofrecida <br/>";
					}
					
					if (hddP2.length<= 0) {
						Agregar = false; 
						mensaje_error += " -Selecciona una carita en actitud del servicio <br/>";
					}
					
					if (hddP3.length<= 0) {
						Agregar = false;
						mensaje_error += " -Selecciona una carita en tiempo de respuesta <br/>";
					}
				}
				*/
				//Fin
				
				///////////////////////////////////////////////////////////////////////////////////////////////////
				//Valores Tabla Dinamica
				Array_general= new Array();
				//Iniciamos el contador a -1 para que el indice del arreglo comienze con 0
				var cont=-1;
				
				var estatus_seleccionado=false;
				var estatus_fecha_realizada=false;
				//Recorremos el array de actividades  
				for(var i=0;i < array_actividades.length; i++){
					if(array_actividades[i]=="S"){
						//Se comienza el contador desde 0
						cont=cont+(1);
						var Estatus=0;
						
						var Array_por_actividad= new Array();
						var Id_Det_Actividad="";	Id_Det_Actividad=$.trim($("#Id_Det_Actividad"+i).val());
						var Num_Actividad=""; 		Num_Actividad=$.trim($("#Num_Actividad"+i).val());
						var Nombre_Actividad=""; 	Nombre_Actividad=$.trim($("#Nombre_Actividad"+i).val());
						var Valor_Referencia=""; 	Valor_Referencia=$.trim($("#Valor_Referencia"+i).val());
						var Valor_Medido=""; 		Valor_Medido=$.trim($("#Valor_Medido"+i).val());
						var Estatus_Actividad=0;	//Tomamos el radio checkeado
						var vincular_mesa_ayuda_det=0;//Tomamos el valor del chechbox
						var observaciones="";		observaciones=$.trim($("#observaciones"+i).val());
						var upload_adjuntos="";		upload_adjuntos=$.trim($("#url_det_adjuntos"+i).val());
						var fecha_programada="";	fecha_programada=$.trim($("#fecha_programada"+i).val());
						var fecha_realizada="";		fecha_realizada=$.trim($("#fecha_realizada"+i).val());
						
						
						if(Estatus_Realizado!="1"){
							if (Num_Actividad.length<= 0) {
								Agregar = false; 
								mensaje_error += " -Agrega el Num. de la Actividad en la Columna "+(cont+1)+"<br />";
								Estatus=1;
							}
							
							if (Nombre_Actividad.length<= 0) {
								Agregar = false; 
								mensaje_error += " -Agrega el Nombre de la Actividad en la Columna "+(cont+1)+"<br />";
								Estatus=1;
							}
							
							if (Valor_Referencia.length<= 0) {
								Agregar = false; 
								mensaje_error += " -Agrega el Valor de Referencia en la Columna "+(cont+1)+"<br />";
								Estatus=1;
							}
							
							/*
							if (Valor_Medido.length<= 0) {
								Agregar = false; 
								mensaje_error += " -Agrega el Valor Medido en la Columna "+(cont+1)+"<br />";
								Estatus=1;
							}
							*/

							if (fecha_programada.length<= 0) {
								Agregar = false; 
								mensaje_error += " -Agrega la Fecha Programada en la Columna "+(cont+1)+"<br />";
								Estatus=1;
							}
						}
						
						if($("#radio_ok"+i).prop('checked')){
							Estatus_Actividad=1;
							Est_Ok_Fallo_No_Aplica=true;
						}
						if($("#radio_fallo"+i).prop('checked')){
							Estatus_Actividad=2;
							Est_Ok_Fallo_No_Aplica=true;
						}
						if($("#radio_no_aplica"+i).prop('checked')){
							Estatus_Actividad=3;
							Est_Ok_Fallo_No_Aplica=true;
						}
												
						if(Estatus_Realizado=="1"){
							if(Estatus_Actividad==0){
								//Agregar = false; 
								//mensaje_error += " -Selecciona un Estatus de la Actividad en la Columna "+(cont+1)+"<br />";
							}else{
								if(fecha_realizada.length==0){
									Agregar = false;
									mensaje_error += " -Agrega la Fecha Realizada en la Actividad en la Columna "+(cont+1)+"<br />";
								}
								estatus_seleccionado=true;
							}
						
							if(fecha_realizada.length>0){
								estatus_fecha_realizada=true;
								if(Estatus_Actividad==0){
									Agregar = false; 
									mensaje_error += " -Selecciona un Estatus de la Actividad en la Columna "+(cont+1)+"<br />";
								}
								
								if(Valor_Medido.length==0){
									Agregar = false;
									mensaje_error += " -Agrega el Valor Medido en la Columna "+(cont+1)+"<br />";
								}
							}				
						}
						
						//Si no esta seleciconado el estatus y la fecha programada, los campos se van vacios
						if(Estatus_Actividad==0&&fecha_realizada.length==0){
							Estatus_Actividad="";
							fecha_realizada="";
						}
						
						//Check vincular mesa de ayuda
						if($("#check_vincular_mesa_ayuda"+i).prop('checked')){
							vincular_mesa_ayuda_det=1;
						}else{
							vincular_mesa_ayuda_det=2;
						}
						
						if (Estatus==1) {	
							mensaje_error += "<br/>";
						}
						
						
						Array_por_actividad[0]=Num_Actividad;
						Array_por_actividad[1]=Nombre_Actividad;
						Array_por_actividad[2]=Valor_Referencia;
						Array_por_actividad[3]=Valor_Medido;
						Array_por_actividad[4]=Estatus_Actividad;
						Array_por_actividad[5]=observaciones;
						Array_por_actividad[6]=upload_adjuntos;
						Array_por_actividad[7]=fecha_programada;
						Array_por_actividad[8]=fecha_realizada;
						Array_por_actividad[9]=Id_Det_Actividad;
						Array_por_actividad[10]=vincular_mesa_ayuda_det;
						Array_general[cont]=Array_por_actividad;
					}
				}
				
				if(Estatus_Realizado=="1"){
					if(estatus_seleccionado==false&&estatus_fecha_realizada==false){
						Agregar = false; 
						mensaje_error += " -Debes realizar almenos una actividad.<br />";	
					}
				}
				////////////////////////////////////////////////////////////////////////////
				
				if(Est_Ok_Fallo_No_Aplica==true && $("#Estatus_Realizado").val()==""){
					Agregar = false; 
					mensaje_error += " -Existen Actividades Realizadas, Por lo tanto no se podrá modificar.";	
				}
				
				if (!Agregar){
					mensajesalerta("Informaci&oacute;n", mensaje_error, "info", "dark");
				}
				
				if(Agregar){
					//console.log(Array_general);
					var strDatos="";
			
					//Esta accion la realiza cuando crea por primera vez una actividad o el gestor le da el seguimiento
					if($("#Estatus_Guardar").val()==""){
						if(Id_Actividad.length <= 0){
							strDatos={
								Id_Area:Id_Area,
								Tipo_Actividad:Tipo_Actividad,
								Id_Activo:Id_Activo,
								Nombre_Rutina:Nombre_Rutina,
								Id_Frecuencia:Id_Frecuencia,
								Hasta_Anio:Hasta_Anio,
								Descripcion:Descripcion,
								Id_Gestor:Id_Gestor,
								Nombre_Ejecutante:Nombre_Ejecutante,
								Realiza:quien_realiza,
								url_documentos_adjuntos:url_documentos_adjuntos,
								vincular_mesa_ayuda:vincular_mesa_ayuda,
								Comentarios:Comentarios,
								//
								Mant_RAC1:Mant_RAC1,
								Mant_RAC2:Mant_RAC2,
								Mant_RAC3:Mant_RAC3,
								Mant_RAC4:Mant_RAC4,
								Cantidad_1:Cantidad_1,
								Cantidad_2:Cantidad_2,
								Cantidad_3:Cantidad_3,
								Cantidad_4:Cantidad_4,
								Costo_1:Costo_1,
								Costo_2:Costo_2,
								Costo_3:Costo_3,
								Costo_4:Costo_4,
								Horas:Horas,
								Costos_Materiales_CE:Costos_Materiales_CE,
								Mano_Obra_CE:Mano_Obra_CE,
								Total_CE:Total_CE,
								Costos_Materiales_CI:Costos_Materiales_CI,
								Mano_Obra_CI:Mano_Obra_CI,
								Total_CI:Total_CI,
								Ahorro:Ahorro,
								//
								Array_det_actividades:Array_general,
								//
								Usr_Inser:Id_Usuario,
								Estatus_Reg:"1",			
								accion:"guardar"
								};
						}
						else{
							strDatos={
								Id_Actividad:Id_Actividad,
								Id_Area:Id_Area,
								Tipo_Actividad:Tipo_Actividad,
								Id_Activo:Id_Activo,
								Nombre_Rutina:Nombre_Rutina,
								Id_Frecuencia:Id_Frecuencia,
								Descripcion:Descripcion,
								Id_Gestor:Id_Gestor,
								Nombre_Ejecutante:Nombre_Ejecutante,
								Comentarios:Comentarios,
								Realiza:quien_realiza,
								url_documentos_adjuntos:url_documentos_adjuntos,
								vincular_mesa_ayuda:vincular_mesa_ayuda,
								//
								Mant_RAC1:Mant_RAC1,
								Mant_RAC2:Mant_RAC2,
								Mant_RAC3:Mant_RAC3,
								Mant_RAC4:Mant_RAC4,
								Cantidad_1:Cantidad_1,
								Cantidad_2:Cantidad_2,
								Cantidad_3:Cantidad_3,
								Cantidad_4:Cantidad_4,
								Costo_1:Costo_1,
								Costo_2:Costo_2,
								Costo_3:Costo_3,
								Costo_4:Costo_4,
								Horas:Horas,
								Costos_Materiales_CE:Costos_Materiales_CE,
								Mano_Obra_CE:Mano_Obra_CE,
								Total_CE:Total_CE,
								Costos_Materiales_CI:Costos_Materiales_CI,
								Mano_Obra_CI:Mano_Obra_CI,
								Total_CI:Total_CI,
								Ahorro:Ahorro,
								//
								Array_det_actividades:Array_general,
								//
								Estatus_Realizado:$("#Estatus_Realizado").val(),
								Usr_Inser:Id_Usuario,
								Usr_Mod:Id_Usuario,
								Estatus_Reg:"2",			
								accion:"guardar"
							};
						}
					
						$.ajax({
							type: "POST",
							encoding:"UTF-8",
							url: "../fachadas/activos/siga_actividades/Siga_actividadesFacade.Class.php",        
							async: true,
							data: strDatos,
							dataType: "html",
							beforeSend: function (xhr) {
								if(Estatus_Realizado!=""){
									jsShowWindowLoad("Por favor espere, se están creando las actividades hasta el "+$("#cmb_hasta option:selected").text()+".");
								}else{
									jsShowWindowLoad("Por favor espere, actualizando información");
								}
							},
							success: function (data) {
								var data;
								data = eval("(" + data + ")");
								if(data.totalCount>0){
									//Vincular con mesa de ayuda
									//var Descripcion_Det="";
									//if(data.CountActividades_Det>0){
									//	Descripcion_Det="[AF/BC: "+$.trim($("#text_AFBC").val())+"]";
									//	Descripcion_Det+=" [Nombre Activo: "+$.trim($("#txt_Nom_Activo").val())+"]";
									//	Descripcion_Det+=" [Marca: "+$("#txt_marca").val()+"]";
									//	Descripcion_Det+=" [Modelo: "+$("#text_Modelo").val()+"]";
									//	Descripcion_Det+=" [No. Serie: "+$("#text_No_Serie").val()+"]";
									//	Descripcion_Det+=" [Ubicación Primaria: "+$("#txt_ubic_primaria").val()+"]";
									//	Descripcion_Det+=" [Ubicación Secundaria: "+$("#txt_ubic_secundaria").val()+"]";
									//	Descripcion_Det+=" [Rutina: "+Nombre_Rutina+"]";
									//	Descripcion_Det+=" [Desc. Corta: "+Descripcion+"]";
									//	Descripcion_Det+=" [Usuario Responsable: "+$("#text_Usr_Resp").val()+"]";
									//	var Usuario_Sistem_Activo=$("#text_Id_Usuario").val();
									//	
									//	Descripcion_Det="[Actividades:]\n";
									//	for(var i1=0; i1 < data.CountActividades_Det; i1++){
									//		Descripcion_Det+="["+data.Actividades_Det[i1].Nombre_Actividad+"]"+"\n";
									//	}
									//	
									//	if(Id_Actividad.length <= 0){
									//		for(var i=0; i < data.CountActividades_Det;i++){
									//			if(data.Actividades_Det[i].V_Mesa=="1"){
									//				if(data.Actividades_Det[0].Fecha_Programda==moment().format('YYYYMMDD')){
									//					Vincular_Mesa_de_Ayuda("2",data.Actividades_Det[i].Id_Actividad,data.Actividades_Det[i].Id_Det_Actividad,data.Actividades_Det[i].Nombre_Actividad, data.Actividades_Det[i].Valor_Referencia, Descripcion_Det, Id_Activo, Usuario_Sistem_Activo, Nombre_Rutina,data.Frecuencia,Descripcion);
									//					break;
									//				}
									//			}
									//		}
									//	}
									//}
									//Fin Vincular a Mesa de Ayuda
									
									//if($("#Estatus_Realizado").val()==""){
										cmb_rutina(2);
										
										//Cargo Calendario Actividades Programadas
										$('#calendario-shit').fullCalendar('removeEvents');
										llenar_calendario(2);
										$("#calendario-shit").fullCalendar("refetchEvents");
										//Fin Cargo Calendario Actividades Programadas
									//}
									
									
									//Limpiamos los campos y arrays
									limpiar();
									//Mostramos el mensaje de exito
									mensajesalerta("&Eacute;xito", data.text, "success", "dark");	
									//Ocultamos la ventana modal
									$('#Actividades_Activo_Fijo').modal('hide');						
									//Cargamos la tabla dinamica
									$('#displayListaActividades').DataTable().ajax.reload();
									
									//Se carga el tab de Global y se limpian los campos
									limpiar_global();
									global();
									
								}else{
									mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
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
					else {
						// Se actualiza el mantenimiento
						$.confirm({
							title: 'Mantenimiento',
							columnClass: 'medium',
							content: 'Esta seguro de actualizar el mantenimiento?<ul><li>Al seleccionar "todo", actualizará los mantenimientos a partir de esta actividad.</li><li>Al seleccionar "solo esta", actualizará únicamente este mantenimiento.</li></ul>',
							buttons: {
								botonCancelar: {
									text: "Todo",
									btnClass: 'btn btn-info',
									action: function () {
										strDatos = {
											Fecha_Calendario: $("#Fecha_Calendario").val(),
											Id_Area: Id_Area,
											Tipo_Actividad: Tipo_Actividad,
											Id_Activo: Id_Activo,
											Nombre_Rutina: Nombre_Rutina,
											Id_Frecuencia: Id_Frecuencia,
											Hasta_Anio: Hasta_Anio,
											Descripcion: Descripcion,
											Id_Gestor: Id_Gestor,
											Nombre_Ejecutante: Nombre_Ejecutante,
											Realiza: quien_realiza,
											url_documentos_adjuntos: url_documentos_adjuntos,
											vincular_mesa_ayuda: vincular_mesa_ayuda,
											Comentarios: Comentarios,
											//
											Mant_RAC1: Mant_RAC1,
											Mant_RAC2: Mant_RAC2,
											Mant_RAC3: Mant_RAC3,
											Mant_RAC4: Mant_RAC4,
											Cantidad_1: Cantidad_1,
											Cantidad_2: Cantidad_2,
											Cantidad_3: Cantidad_3,
											Cantidad_4: Cantidad_4,
											Costo_1: Costo_1,
											Costo_2: Costo_2,
											Costo_3: Costo_3,
											Costo_4: Costo_4,
											Horas: Horas,
											Costos_Materiales_CE: Costos_Materiales_CE,
											Mano_Obra_CE: Mano_Obra_CE,
											Total_CE: Total_CE,
											Costos_Materiales_CI: Costos_Materiales_CI,
											Mano_Obra_CI: Mano_Obra_CI,
											Total_CI: Total_CI,
											Ahorro: Ahorro,
											//
											Array_det_actividades: Array_general,
											//
											Usr_Inser: Id_Usuario,
											Estatus_Reg: "1",			
											accion: "guardar"
										};
										
										$.ajax({
											type: "POST",
											encoding: "UTF-8",
											url: "../fachadas/activos/siga_actividades/Siga_actividadesFacade.Class.php",        
											async: true,
											data: strDatos,
											dataType: "html",
											beforeSend: function (xhr) {
												if(Estatus_Realizado != "") {
													jsShowWindowLoad("Por favor espere, se están creando las actividades hasta el " + $("#cmb_hasta option:selected").text() + ".");
												}
												else {
													jsShowWindowLoad("Por favor espere, actualizando información");
												}
											},
											success: function (data) {
												//console.log(data);
												var data = eval("(" + data + ")");

												if(data.totalCount > 0) {
													mostrar_full_calendar();
													//Vincular con mesa de ayuda
													//var Descripcion_Det="";
													//if(data.CountActividades_Det>0){
													//	Descripcion_Det="[AF/BC: "+$.trim($("#text_AFBC").val())+"]";
													//	Descripcion_Det+=" [Nombre Activo: "+$.trim($("#txt_Nom_Activo").val())+"]";
													//	Descripcion_Det+=" [Marca: "+$("#txt_marca").val()+"]";
													//	Descripcion_Det+=" [Modelo: "+$("#text_Modelo").val()+"]";
													//	Descripcion_Det+=" [No. Serie: "+$("#text_No_Serie").val()+"]";
													//	Descripcion_Det+=" [Ubicación Primaria: "+$("#txt_ubic_primaria").val()+"]";
													//	Descripcion_Det+=" [Ubicación Secundaria: "+$("#txt_ubic_secundaria").val()+"]";
													//	Descripcion_Det+=" [Rutina: "+Nombre_Rutina+"]";
													//	Descripcion_Det+=" [Desc. Corta: "+Descripcion+"]";
													//	Descripcion_Det+=" [Usuario Responsable: "+$("#text_Usr_Resp").val()+"]";
													//	var Usuario_Sistem_Activo=$("#text_Id_Usuario").val();
													//	
													//	Descripcion_Det="[Actividades:]\n";
													//	for(var i1=0; i1 < data.CountActividades_Det; i1++){
													//		Descripcion_Det+="["+data.Actividades_Det[i1].Nombre_Actividad+"]"+"\n";
													//	}
													//	
													//	if(Id_Actividad.length <= 0){
													//		
													//		for(var i=0; i < data.CountActividades_Det;i++){
													//			if(data.Actividades_Det[i].V_Mesa=="1"){
													//				if(data.Actividades_Det[0].Fecha_Programda==moment().format('YYYYMMDD')){
													//					Vincular_Mesa_de_Ayuda("2",data.Actividades_Det[i].Id_Actividad,data.Actividades_Det[i].Id_Det_Actividad,data.Actividades_Det[i].Nombre_Actividad, data.Actividades_Det[i].Valor_Referencia, Descripcion_Det, Id_Activo, Usuario_Sistem_Activo, Nombre_Rutina,data.Frecuencia,Descripcion);
													//					break;
													//				}
													//			}
													//		}
													//	}
													//}
													//Fin Vincular a Mesa de Ayuda
													
													if($("#Estatus_Realizado").val() == "") {
														cmb_rutina(2);
														//Cargo Calendario Actividades Programadas
														$('#calendario-shit').fullCalendar('removeEvents');
														llenar_calendario(2);
														$("#calendario-shit").fullCalendar("refetchEvents");
													}
													//Limpiamos los campos y arrays
													limpiar();
													//Mostramos el mensaje de exito
													mensajesalerta("&Eacute;xito", data.text, "success", "dark");	
													//Ocultamos la ventana modal
													$('#Actividades_Activo_Fijo').modal('hide');						
													//Cargamos la tabla dinamica
													$('#displayListaActividades').DataTable().ajax.reload();
													//Se carga el tab de Global y se limpian los campos
													limpiar_global();
													global();
												}
												else {
													mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
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
								},
								solo_esta: {
									text: "Solo esta",
									btnClass: 'btn btn-success',
									action: function () {
										if (Id_Actividad.length > 0) {
											strDatos = {
												Id_Actividad: Id_Actividad,
												Id_Area: Id_Area,
												Tipo_Actividad: Tipo_Actividad,
												Id_Activo: Id_Activo,
												Nombre_Rutina: Nombre_Rutina,
												Id_Frecuencia: Id_Frecuencia,
												Descripcion: Descripcion,
												Id_Gestor: Id_Gestor,
												Nombre_Ejecutante: Nombre_Ejecutante,
												Comentarios: Comentarios,
												Realiza: quien_realiza,
												url_documentos_adjuntos: url_documentos_adjuntos,
												vincular_mesa_ayuda: vincular_mesa_ayuda,
												//
												Mant_RAC1: Mant_RAC1,
												Mant_RAC2: Mant_RAC2,
												Mant_RAC3: Mant_RAC3,
												Mant_RAC4: Mant_RAC4,
												Cantidad_1: Cantidad_1,
												Cantidad_2: Cantidad_2,
												Cantidad_3: Cantidad_3,
												Cantidad_4: Cantidad_4,
												Costo_1: Costo_1,
												Costo_2: Costo_2,
												Costo_3: Costo_3,
												Costo_4: Costo_4,
												Horas: Horas,
												Costos_Materiales_CE: Costos_Materiales_CE,
												Mano_Obra_CE: Mano_Obra_CE,
												Total_CE: Total_CE,
												Costos_Materiales_CI: Costos_Materiales_CI,
												Mano_Obra_CI: Mano_Obra_CI,
												Total_CI: Total_CI,
												Ahorro: Ahorro,
												//
												Array_det_actividades: Array_general,
												//
												Estatus_Realizado: $("#Estatus_Realizado").val(),
												Usr_Inser: Id_Usuario,
												Usr_Mod: Id_Usuario,
												Estatus_Reg: "2",
												accion: "guardar"
											};

											$.ajax({
												type: "POST",
												encoding: "UTF-8",
												url: "../fachadas/activos/siga_actividades/Siga_actividadesFacade.Class.php",
												async: true,
												data: strDatos,
												dataType: "html",
												beforeSend: function (xhr) {
													if (Estatus_Realizado != "") {
														jsShowWindowLoad("Por favor espere, se están creando las actividades hasta el " + $("#cmb_hasta option:selected").text() + ".");
													}
													else {
														jsShowWindowLoad("Por favor espere, actualizando información");
													}
												},
												success: function (data) {
													var data;
													data = eval("(" + data + ")");
													if (data.totalCount > 0) {
														mostrar_full_calendar();
														//Vincular con mesa de ayuda
														//var Descripcion_Det="";
														//if(data.CountActividades_Det>0){
														//	Descripcion_Det="[AF/BC: "+$.trim($("#text_AFBC").val())+"]";
														//	Descripcion_Det+=" [Nombre Activo: "+$.trim($("#txt_Nom_Activo").val())+"]";
														//	Descripcion_Det+=" [Marca: "+$("#txt_marca").val()+"]";
														//	Descripcion_Det+=" [Modelo: "+$("#text_Modelo").val()+"]";
														//	Descripcion_Det+=" [No. Serie: "+$("#text_No_Serie").val()+"]";
														//	Descripcion_Det+=" [Ubicación Primaria: "+$("#txt_ubic_primaria").val()+"]";
														//	Descripcion_Det+=" [Ubicación Secundaria: "+$("#txt_ubic_secundaria").val()+"]";
														//	Descripcion_Det+=" [Rutina: "+Nombre_Rutina+"]";
														//	Descripcion_Det+=" [Desc. Corta: "+Descripcion+"]";
														//	Descripcion_Det+=" [Usuario Responsable: "+$("#text_Usr_Resp").val()+"]";
														//	var Usuario_Sistem_Activo=$("#text_Id_Usuario").val();
														//	
														//	Descripcion_Det="[Actividades:]\n";
														//	for(var i1=0; i1 < data.CountActividades_Det; i1++){
														//		Descripcion_Det+="["+data.Actividades_Det[i1].Nombre_Actividad+"]"+"\n";
														//	}
														//	
														//	if(Id_Actividad.length <= 0){
														//		for(var i=0; i < data.CountActividades_Det;i++){
														//			if(data.Actividades_Det[i].V_Mesa=="1"){
														//				if(data.Actividades_Det[0].Fecha_Programda==moment().format('YYYYMMDD')){
														//					Vincular_Mesa_de_Ayuda("2",data.Actividades_Det[i].Id_Actividad,data.Actividades_Det[i].Id_Det_Actividad,data.Actividades_Det[i].Nombre_Actividad, data.Actividades_Det[i].Valor_Referencia, Descripcion_Det, Id_Activo, Usuario_Sistem_Activo, Nombre_Rutina,data.Frecuencia,Descripcion);
														//					break;
														//				}
														//			}
														//		}
														//	}
														//}
														//Fin Vincular a Mesa de Ayuda

														if ($("#Estatus_Realizado").val() == "") {
															cmb_rutina(2);
															//Cargo Calendario Actividades Programadas
															$('#calendario-shit').fullCalendar('removeEvents');
															llenar_calendario(2);
															$("#calendario-shit").fullCalendar("refetchEvents");
														}

														//Limpiamos los campos y arrays
														limpiar();
														//Mostramos el mensaje de exito
														mensajesalerta("&Eacute;xito", data.text, "success", "dark");
														//Ocultamos la ventana modal
														$('#Actividades_Activo_Fijo').modal('hide');
														//Cargamos la tabla dinamica
														$('#displayListaActividades').DataTable().ajax.reload();
														//Se carga el tab de Global y se limpian los campos
														limpiar_global();
														global();
													}
													else {
														mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
													}
												},
												error: function () {
													mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
												},
												complete: function (xhr, status) {
													jsRemoveWindowLoad();
												}
											});
										}
									}
								},
								// Botón de cancelación
								cancelar: {
									text: "Cancelar",
									btnClass: 'btn chs'
								}
							}
						});
					}
				}
			}


			eliminar_programacion=function() {
				var resultado=new Array();
				//Area
				var Id_Actividad=$("#Id_Actividad").val();
				var Id_Usuario=$("#usuariosesion").val();
				data={
					Usr_Mod: Id_Usuario,
					Id_Actividad:Id_Actividad,
					accion: "eliminar_programacion"
				};
				if(Id_Actividad!=""){
					var r = confirm("Esta seguro de eliminar esta programación?");
					if (r == true) {
						resultado=cargo_cmb("../fachadas/activos/siga_actividades/Siga_actividadesFacade.Class.php",false, data);
						if(resultado.totalCount>0){
							alert("Eliminado correctamente");
							$("#Actividades_Activo_Fijo").modal("hide");
							//Cargo Calendario Actividades Programadas
							$('#calendario-shit').fullCalendar('removeEvents');
							llenar_calendario(2);
							$("#calendario-shit").fullCalendar("refetchEvents");
							//Fin Cargo Calendario Actividades Programadas
						}else{
							alert(resultado.mensaje);
						}
					}
				}
			}


			limpiar = function() {
				$("#btn_ver_inventario").hide();
				var Fecha_Actual = moment().format("DD/MM/YYYY");
				//Boton generar pdf
				$("#td_formato").html('');
				$("#Imagen_Activo").html('<img src="../dist/img/no-camera.png" alt="HTML5 logo" style="width:150px;height:150px;">');
				$("#Estatus_Realizado").val("");
				$("#Id_Actividad").val("");
				//Limpiamos los datos del activo
				//Limpiamos el autocomplete
				var Nom_Activo=$.trim($("#select-activos").val());
				if(Nom_Activo!=""){			
					if(Nom_Activo.length > 0){
						var $select3 = $('#select-activos').selectize({});	
						var control3 = $select3[0].selectize;
						control3.clear();
						control3.enable();
					}
				}
				//
				//Habilitar controles
				$("#txt_Nombre_Rutina").attr('disabled', false);
				$("#cmb_frecuencia").attr('disabled', false);
				$("#txt_Desc_Corta").attr('disabled', false);
				$("#cmb_gestores").attr('disabled', false);
				$("#cmb_ejecutantes").attr('disabled', false);
				//$("#txt_comentarios").attr('disabled', false);
				//
				$("#Mant_RAC1").attr('disabled', false);
				$("#Mant_RAC2").attr('disabled', false);
				$("#Mant_RAC3").attr('disabled', false);
				$("#Mant_RAC4").attr('disabled', false);
				$("#Cantidad_M_1").attr('disabled', false);
				$("#Cantidad_M_2").attr('disabled', false);
				$("#Cantidad_M_3").attr('disabled', false);
				$("#Cantidad_M_4").attr('disabled', false);
				$("#Costo_M_1").attr('disabled', false);
				$("#Costo_M_2").attr('disabled', false);
				$("#Costo_M_3").attr('disabled', false);
				$("#Costo_M_4").attr('disabled', false);
				$("#Horas").attr('disabled', false);
				$("#Costos_Materiales_CE").attr('disabled', false);
				$("#Mano_Obra_CE").attr('disabled', false);
				//$("#Total_CE").attr('disabled', false);
				$("#Costos_Materiales_CI").attr('disabled', false);
				$("#Mano_Obra_CI").attr('disabled', false);
				//$("#Total_CI").attr('disabled', false);
				$("#Ahorro").attr('disabled', false);
				
				$("#txt_comentarios").attr('disabled', false);
				//
				//Deshabilita radios quien realiza
				$("#radio_interno").attr('disabled', false);
				$("#radio_externo").attr('disabled', false);
				
				$("#cmb_copiar").attr('disabled', false);
				$("#btn_copiar").attr('disabled', false);
				
				//Deshabilita radios vincular mesa de ayuda
				$("#vincular_mesa_ayuda_si").attr('disabled', false);
				$("#vincular_mesa_ayuda_no").attr('disabled', false);
				
				
				$("#agregarmas_table_dinamyc").show();
				$("#btn_guardar").attr('disabled', false);
				//
				
				$("#txt_Id_Activo").val("");
				$("#txt_Nom_Activo").val("");
				$("#txt_ubic_primaria").val("");
				$("#text_No_Serie").val("");
				$("#txt_ubic_secundaria").val("");
				$("#text_Desc_Corta").val("");
				$("#text_Ubicacion_Especifica").val("");
				$("#txt_marca").val("");
				$("#text_Modelo").val("");
				$("#text_AFBC").val("");
				$("#text_Usr_Resp").val("");
				$("#text_Id_Usuario").val();
				/////////////////////////////////
				$("#txt_Nombre_Rutina").val("");
				$("#cmb_frecuencia").val("-1");
				$("#txt_Desc_Corta").val("");
				$("#cmb_gestores").val("");
				$("#cmb_ejecutantes").val("");
				$("#txt_comentarios").val("");
				
				$("#radio_interno").prop( "checked", true );
				//$("#url_documentos_adjuntos").val("");
				$("#vincular_mesa_ayuda_si").prop( "checked", true );
				
				
				$("#Mant_RAC1").val("");
				$("#Mant_RAC2").val("");
				$("#Mant_RAC3").val("");
				$("#Mant_RAC4").val("");
				$("#Cantidad_M_1").val("");
				$("#Cantidad_M_2").val("");
				$("#Cantidad_M_3").val("");
				$("#Cantidad_M_4").val("");
				$("#Costo_M_1").val("");
				$("#Costo_M_2").val("");
				$("#Costo_M_3").val("");
				$("#Costo_M_4").val("");
				$("#Total_Costos").val("");
				$("#Horas").val("");
				$("#Costos_Materiales_CE").val("");
				$("#Mano_Obra_CE").val("");
				$("#Total_CE").val("");
				$("#Costos_Materiales_CI").val("");
				$("#Mano_Obra_CI").val("");
				$("#Total_CI").val("");
				$("#Ahorro").val("");
				
				//Limpiar arrays de llenar mas
				cont_array_actividades=0;
				array_actividades=[];
				array_actividades[0]="S";
				//
				$("#Muestro_Agregados").html("");
				
				//Limpiar input
				$("#url_documentos_adjuntos").val("");
				//$('#documentos_adjuntos_FILE').fileinput('clear');
				
				
				var contenido="";
				contenido+='<tr id="Contenido_tr0">';
				contenido+='  <td><span><i class="fa fa-plus" aria-hidden="true" onclick="Agregar_Mas(0)" id="mas_table_dinamyc0"></i></span></td>';
				contenido+='  <td>';
				contenido+='    <div class="form-group" style="width:50px;" align="center">';
				contenido+='      <input type="text" rows="1" class="form-control" placeholder="" style="font-size: 11px;" id="Num_Actividad0" value="1" disabled>';
				contenido+='    </div>';
				contenido+='  </td>';
				contenido+='  <td>';
				contenido+='    <div class="form-group">';
				contenido+='      <textarea rows="2" class="form-control" placeholder="" style="font-size: 11px;" id="Nombre_Actividad0"></textarea>';
				contenido+='    </div>';
				contenido+='  </td>';
				contenido+='  <td>';
				contenido+='    <div class="form-group">';
				contenido+='      <textarea rows="2" class="form-control" placeholder="" style="font-size: 11px;" id="Valor_Referencia0"></textarea>';
				contenido+='    </div>';
				contenido+='  </td>';
				contenido+='  <td>';
				contenido+='    <div class="form-group">';
				contenido+='      <textarea rows="2" class="form-control" placeholder="" style="font-size: 11px;" id="Valor_Medido0" disabled></textarea>';
				contenido+='    </div>';
				contenido+='  </td>';
				contenido+='  <td align="center">';
				contenido+='  	<input type="radio" id="radio_ok0" name="groupradioactividad0" disabled>';
				contenido+='  </td>';
				contenido+='  <td align="center">';
				contenido+='  	<input type="radio" id="radio_fallo0" name="groupradioactividad0" disabled>';
				contenido+='  </td>';
				contenido+='  <td align="center">';
				contenido+='  	<input type="radio" id="radio_no_aplica0" name="groupradioactividad0" disabled>';
				contenido+='  </td>';
				contenido+='  <td align="center">';
				contenido+='  	<input type="checkbox" id="check_vincular_mesa_ayuda0">';
				contenido+='  </td>';
				contenido+='  <td>';
				contenido+='    <div class="form-group">';
				contenido+='      <textarea rows="2" class="form-control" placeholder="(200 caracteres)"  style="font-size: 11px;" id="observaciones0" disabled></textarea>';
				contenido+='    </div>';
				contenido+='  </td>';
				contenido+='  <td>';
				contenido+='   <div class="form-group" align="center">';
				contenido+='      <div id="div_input_dymanic0"><input name="imagenes[]" type="file" multiple="multiple" class="file-loading" id="upload_adjuntos0"></div>';
				contenido+='      <input type="hidden"  id="url_det_adjuntos0">';
				contenido+='      <div id="divVer_Imagen0"></div>';
				contenido+='    </div>';
				contenido+='  </td>';
				contenido+='<td>';
				contenido+='  <div class="input-group date">';
				contenido+='	<div class="input-group-addon">';
				contenido+='	  <i class="fa fa-calendar"></i>';
				contenido+='	</div>';
				contenido+='	<input type="text" class="form-control pull-right datepicker" style="font-size: 11px;"  onclick="Cambio_Fecha_Progr_Array(0)" id="fecha_programada0" value="'+Fecha_Actual+'" autocomplete="off">';
				contenido+='  </div>';
				contenido+='</td>';
				contenido+='<td>';
				contenido+='  <div class="input-group date">';
				contenido+='	<div class="input-group-addon">';
				contenido+='	  <i class="fa fa-calendar"></i>';
				contenido+='	</div>';
				contenido+='	<input type="text" class="form-control pull-right datepicker" style="font-size: 11px;" id="fecha_realizada0" onclick="Cambio_Fecha_Reali_Array(0)"  disabled>';
				contenido+='  </div>';
				contenido+='</td>';
				contenido+='  <td><span><i class="fa fa-trash" aria-hidden="true" id="quitarmas_table_dinamyc0" onclick="quitarmas(0)"></i></span></td>';
				contenido+='</tr>';
				jQuery("#Muestro_Agregados").append(contenido);
				
				var file_adjuntos="upload_adjuntos0";
				var hidden_url="url_det_adjuntos0";
				subirimagenes(file_adjuntos, hidden_url, false, 0);
				
				Archivos_Multiples_Adjuntar();
				//var Doc_adjuntos="";
				//Doc_adjuntos+='<input id="documentos_adjuntos_FILE" name="imagenes[]" type="file" multiple="multiple" class="file-loading" />';
				//Doc_adjuntos+='<input type="hidden" id="url_documentos_adjuntos">';
				//$("#Cadena_doc_adjuntos").html(Doc_adjuntos);
				//subirimagenes("documentos_adjuntos_FILE", "url_documentos_adjuntos", true, -1);
				
				
				//Fecha
				var nowTemp = new Date();
				var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
				
				$('#fecha_programada0').datepicker({
					format: 'dd/mm/yyyy',
					onRender: function(date) {
						return date.valueOf() < now.valueOf() ? 'disabled' : '';
					}
				});
				//Fecha
				
				//
				//limpiar_campos_y_div_calif();
			}


			//Llenar Tabla Dinamicamente
			/*
			$('#displayListaActividades').DataTable({
				"processing": true,
				"serverSide": true,
				"ajax": {
					"url": "../fachadas/activos/siga_actividades/Siga_actividadesFacade.Class.php",
					"type": "POST",
					"data": {
						Id_Area:$("#idareasesion").val(),
						Tipo_Actividad:"2",
					}
				},
				"columns": [
					{ "data": "Id_Actividad", "visible": false},
					{
						"data": function (obj) {
							var edicion = '';
							edicion += '<span onclick="pasarvalores(' + obj.Id_Actividad + ', 1,null)"><i class="fa fa-pencil" aria-hidden="true" ></i></span>';
							edicion += '<span onclick="pasarelimina(' + obj.Id_Actividad + ')"><i class="fa fa-trash" aria-hidden="true"></i></span>';
							return edicion;
						}
					},
					{ "data": "AF_BC"},
					{ "data": "Nombre_Activo"},
					{ "data": "Marca"},
					{ "data": "Modelo"},
					{ "data": "NumSerie"},
					{ "data": "Nombre_Rutina"},
					{ "data": "Desc_Frecuencia"},
					{ "data": "Descripcion"},
					{ "data": "Estatus_Activo"}
					
				], "language": {
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
			*/
			//Pasar Valores al Editar
			pasarvalores=function(id, estatus, fecha=null) {
				$("#Estatus_Guardar").val("");
				$("#Estatus_Guardar").val(estatus);
				if(estatus==1){
					limpiar();
					
					$("#cmb_copiar").attr('disabled', true);
					$("#btn_copiar").attr('disabled', true);
					////////CAMPOS COSTOS
					$("#Mant_RAC1").attr('disabled', true);
					$("#Mant_RAC2").attr('disabled', true);
					$("#Mant_RAC3").attr('disabled', true);
					$("#Mant_RAC4").attr('disabled', true);
					
					$("#Cantidad_M_1").attr('disabled', true);
					$("#Cantidad_M_2").attr('disabled', true);
					$("#Cantidad_M_3").attr('disabled', true);
					$("#Cantidad_M_4").attr('disabled', true);
					
					$("#Costo_M_1").attr('disabled', true);
					$("#Costo_M_2").attr('disabled', true);
					$("#Costo_M_3").attr('disabled', true);
					$("#Costo_M_4").attr('disabled', true);
					
					$("#Horas").attr('disabled', true);
					
					$("#Costos_Materiales_CE").attr('disabled', true);
					$("#Mano_Obra_CE").attr('disabled', true);
					
					$("#Costos_Materiales_CI").attr('disabled', true);
					$("#Mano_Obra_CI").attr('disabled', true);
					
					$("#Ahorro").attr('disabled', true);
					/////////////////////
					
					//////ADJUNTOS GENERALES
					//$("#documentos_adjuntos_FILE").attr('disabled', true);
					/////////////////////////
					
					////////CAMPO COMENTARIOS
					$("#txt_comentarios").attr('disabled', true);
					//////////////////////////
					
					$("#btn_ver_inventario").hide();
					$("#btn_eliminar").show();
				}else{
					$("#btn_eliminar").hide();
				}
				
				if (id != "") {
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

							//Pasar valores al copiar Modal de "Nuevo mantenimiento preventivo"
							$("#txt_Nombre_Rutina").val(data.data[0].Nombre_Rutina);
							$("#cmb_frecuencia").val(data.data[0].Id_Frecuencia);
							$("#txt_Desc_Corta").val(data.data[0].Descripcion);
							$("#cmb_gestores").val(data.data[0].Id_Gestor);
							$("#cmb_ejecutantes").val(data.data[0].Nombre_Ejecutante);

							//Costos Materiales y Refacciones
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
							//Fin Costos Materiales y Refacciones
							
							var Total=0;
							var Cantidad=0;
							var Costo=0;
							for(var i=1; i<5;i++){
								if($("#Cantidad_M_"+i).val()!=""){Cantidad=$("#Cantidad_M_"+i).val();}
								if($("#Costo_M_"+i).val()!=""){Costo=$("#Costo_M_"+i).val();}
								Total=Total+(Cantidad*Costo);Cantidad=0;Costo=0;
							}
							
							$("#Total_Costos").val(Total);
							
							if(estatus==1 || estatus==3){
								var $select3 = $('#select-activos').selectize({});
								var control3 = $select3[0].selectize;
								control3.addItem(data.data[0].Id_Activo);
								
								$("#Id_Actividad").val(data.data[0].Id_Actividad);
								$("#txt_comentarios").val(data.data[0].Comentarios);
								
								var eliminar_archivo="";
								
								if(data.data[0]["Id_Actividad"]!=""){
									eliminar_archivo="no";
								}
								
								if(data.data[0].Id_Activo!=""){
									$("#btn_ver_inventario").show();
								}

								//$("#url_documentos_adjuntos").val(data.data[0].url_documentos_adjuntos);

								//Chekear radios quien realiza
								if(data.data[0].Realiza=="0"){$("#radio_interno").prop( "checked", true );LoRealiza=0;}
								if(data.data[0].Realiza=="1"){$("#radio_externo").prop( "checked", true );LoRealiza=1;}


								if(data.data[0].vincular_mesa_ayuda=="1"){$("#vincular_mesa_ayuda_si").prop( "checked", true );}
								if(data.data[0].vincular_mesa_ayuda=="2"){$("#vincular_mesa_ayuda_no").prop( "checked", true );}

								//Pasar imagenes al dropzone
								if (data.data[0].url_documentos_adjuntos.length>0)
								{
									//var Doc_adjuntos="";
									//Doc_adjuntos+='<input id="documentos_adjuntos_FILE" name="imagenes[]" type="file" multiple="multiple" class="file-loading" disabled/>';
									//Doc_adjuntos+='<input type="hidden" id="url_documentos_adjuntos">';
									//$("#Cadena_doc_adjuntos").html(Doc_adjuntos);
									//
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

							}
								var contenido="";
								var Estatus_Fech_Real=0;
								for(var i=0;i < data.totalCountDetalle; i++){
									var Estatus_check=0;
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
									contenido+='  <td><span><i class="fa fa-plus" aria-hidden="true" onclick="Agregar_Mas('+i+')" id="mas_table_dinamyc'+i+'"></i></span></td>';
									contenido+='  <td>';
									contenido+='    <div class="form-group" style="width:50px;"  align="center">';
									contenido+='      <input type="hidden" id="Id_Det_Actividad'+i+'" value="'+data.data_det[i].Id_Det_Actividad+'">';
									contenido+='      <input type="text" rows="1" class="form-control" placeholder="" style="font-size: 11px;" value='+data.data_det[i].Num_Actividad.trim()+' id="Num_Actividad'+i+'" disabled>';
									contenido+='    </div>';
									contenido+='  </td>';
									contenido+='  <td>';
									contenido+='    <div class="form-group">';
									contenido+='      <textarea rows="2" class="form-control" placeholder="" style="font-size: 11px;" id="Nombre_Actividad'+i+'">'+data.data_det[i].Nombre_Actividad.trim()+'</textarea>';
									contenido+='    </div>';
									contenido+='  </td>';
									contenido+='  <td>';
									contenido+='    <div class="form-group">';
									contenido+='      <textarea rows="2" class="form-control" placeholder="" id="Valor_Referencia'+i+'" style="font-size: 11px;">';
									contenido+=					data.data_det[i].Valor_Referencia;
									contenido+='			</textarea>';
									contenido+='    </div>';
									contenido+='  </td>';
									contenido+='  <td>';
									contenido+='    <div class="form-group">';
									contenido+='      <textarea rows="2" class="form-control" placeholder="" id="Valor_Medido'+i+'" style="font-size: 11px;"';if(estatus==2||estatus==1){contenido+='disabled';}contenido+='>';
									if(estatus!=2 && estatus!=1){
										contenido+=					data.data_det[i].Valor_Medido;
									}
									contenido+=				'</textarea>';
									contenido+='    </div>';
									contenido+='  </td>';
									contenido+='  <td align="center">';
									contenido+='  	<input type="radio" id="radio_ok'+i+'" name="groupradioactividad'+i+'"'; if(data.data_det[i].Estatus_Actividad=="1" && estatus!=2){contenido+=' checked '; Estatus_check=1;}contenido+=' disabled>';
									contenido+='  </td>';
									contenido+='  <td align="center">';
									contenido+='  	<input type="radio" id="radio_fallo'+i+'" name="groupradioactividad'+i+'"'; if(data.data_det[i].Estatus_Actividad=="2" && estatus!=2){contenido+=' checked ';Estatus_check=1;}contenido+=' disabled>';
									contenido+='  </td>';
									contenido+='  <td align="center">';
									contenido+='  	<input type="radio" id="radio_no_aplica'+i+'" name="groupradioactividad'+i+'"'; if(data.data_det[i].Estatus_Actividad=="3" && estatus!=2){contenido+=' checked ';Estatus_check=1;}contenido+=' disabled>';
									contenido+='  </td>';
									contenido+='  <td align="center">';
									if(data.data_det[i].V_Mesa==1){
										contenido+='  	<input type="checkbox" id="check_vincular_mesa_ayuda'+i+'" checked>';
									}else{
										contenido+='  	<input type="checkbox" id="check_vincular_mesa_ayuda'+i+'">';	
									}
									contenido+='  </td>';
									contenido+='  <td>';
									contenido+='    <div class="form-group">';
									contenido+='      <textarea rows="2" class="form-control" placeholder="(200 caracteres)" style="font-size: 11px;" id="observaciones'+i+'" disabled></textarea>';
									contenido+='    </div>';
									contenido+='  </td>';
									contenido+='  <td>';
									contenido+='   <div class="form-group" align="center">';
									contenido+='      <div id="div_input_dymanic'+i+'"><input name="imagenes[]" type="file" multiple="multiple" class="file-loading" id="upload_adjuntos'+i+'"></div>';
									contenido+='      <input type="hidden"  id="url_det_adjuntos'+i+'">';
									if(estatus!=2){
										contenido+='      <div id="divVer_Imagen'+i+'">';
										if(data.data_det[i].Url_Adjunto!=null && data.data_det[i].Url_Adjunto!=""){
											contenido+='<a href="../Archivos/Archivos-Actividades/Mantenimiento-Preventivo/'+data.data_det[i].Url_Adjunto+'" target="_blank">Ver Im&aacute;gen</a>';
										}
									}
									contenido+='	  </div>';
									contenido+='    </div>';
									contenido+='  </td>';
									contenido+='<td>';
									contenido+='  <div class="input-group date">';
									contenido+='	<div class="input-group-addon">';
									contenido+='	  <i class="fa fa-calendar"></i>';
									contenido+='	</div>';
									contenido+='	<input type="text" class="form-control" style="font-size: 11px;" onclick="Cambio_Fecha_Progr_Array('+i+')" id="fecha_programada'+i+'" value="'+Fecha_Prog+'" autocomplete="off">';
									contenido+='  </div>';
									contenido+='</td>';
									contenido+='<td>';
									contenido+='  <div class="input-group date">';
									contenido+='	<div class="input-group-addon">';
									contenido+='	  <i class="fa fa-calendar"></i>';
									contenido+='	</div>';
									contenido+='	<input type="text" class="form-control pull-right datepicker" style="font-size: 11px;" onclick="Cambio_Fecha_Reali_Array('+i+')"  id="fecha_realizada'+i+'" value="'+Fecha_Real+'" disabled>';
									contenido+='  </div>';
									contenido+='</td>';
									contenido+='  <td>';
									if(Estatus_check<=0){
									contenido+='   		<span><i class="fa fa-trash" aria-hidden="true"  onclick="quitarmas(\''+i+'\')" id="quitarmas_table_dinamyc'+i+'"></i></span>';
									}
									contenido+='  </td>';
									contenido+='</tr>';
								}
								
								$("#Muestro_Agregados").html(contenido);
								
								$("#td_formato").html('<a href="../controladores/activos/siga_actividades/Reporte-Mantenimiento-Preventivo.php?Id_Actividad='+id+'" class="btn btn-danger" role="button" target="_blank" id="Btn_Formato" style="display:none">Formato</a>');
								
								for(var k=0;k < data.totalCountDetalle; k++){
									//Pasar imagenes al dropzone
									if (data.data_det[k].Url_Adjunto.length>0)
									{
										var hidden_url="url_det_adjuntos"+k;
										var file_adjuntos="upload_adjuntos"+k;
										var nombre_url=data.data_det[k].Url_Adjunto;
					
										if(estatus==2){
											//Estatus 2=copiado
											subirimagenes(file_adjuntos, hidden_url, false, k);
										}else{
											cargarimagenes(hidden_url, file_adjuntos, nombre_url, false, k);
										}
									}
									else{
										var file_adjuntos="upload_adjuntos"+k;
										var hidden_url="url_det_adjuntos"+k;
										subirimagenes(file_adjuntos, hidden_url, false, k);
									}
									//////////////////////////////////////////////////
									
									//Fecha
									var nowTemp = new Date();
									var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
									
									$('#fecha_programada'+k).datepicker({
										format: 'dd/mm/yyyy',
										onRender: function(date) {
											return date.valueOf() < now.valueOf() ? 'disabled' : '';
										}
									});
									
									
									$('#fecha_realizada'+k).datepicker({
										format: 'dd/mm/yyyy',
										onRender: function(date) {
											return date.valueOf() < now.valueOf() ? 'disabled' : '';
										}
									});
									
									//Fecha
									
								}
							
								//console.log(array_actividades);
							}
						},
						error: function () {
									mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
						}
					});
				}
			}
		});//END

//======================================================================================================================================================================================		
//======================================================================================================================================================================================
		function onEnviar_Inventario(){
			var variableJs=$("#txt_Id_Activo").val();
			document.getElementById("variable_ir_inventario").value=variableJs;
			document.getElementById("variable_ir_inventario_area").value=$("#Area_inventario_regresar").val();
			document.getElementById("variable_ir_inventario_perfil").value=$("#Area_perfil_regresar").val();
		}
	
		//ver actividades por fecha
		function muestro_actividades_por_fecha(Id_dia_calendar){
			
			var val 					= Id_dia_calendar.split("-");
			var Id_Actividad 	= val[0];
			var Fecha         = val[1];
			$("#Fecha_Calendario").val("");
			//pasarvalores_full_calendar(Id_Actividad, 3, Fecha);
			pasar_valores_a_modal(Id_Actividad, Fecha);

		}

		function pasar_activo2(Id_ActivoSel) {
			//Area
			limpiar();
			
			var Id_Area=$("#idareasesion").val();
			var strdatos="";
			if(Id_Area!="5") {
				strdatos={
					soloactivos:'1',
					Id_Area:Id_Area,
					Estatus_Reg:"1",
					accion: 'autocomplete_activos'
				}
			}
			else {
				strdatos = {
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
							//$("#select-activos").show();
							$seleccionado =  $('#select-activos').selectize({
								//sortField: 'text'
							});
							
							var control = $seleccionado[0].selectize;
							control.setValue(Id_ActivoSel);
							$("#Actividades_Activo_Fijo").modal("show");
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
		
		confirmacion_cerrar_mant_prev = function(id_modal) {
			<?php if (isset($_GET["abriractivo"])) {?>
				mensajesalerta("Oh No!", "Debes Crear el mantenimiento Preventivo.", "error", "dark");
			<?php }
			else { ?>
				$.confirm({
					icon: 'fa fa-warning',
					title: 'Confirmar',
					type: 'red',					
					content: '¿Deseas salir sin guardar la información?',
					buttons: {
						Aceptar: function () {
							$('.modal-backdrop').remove();//eliminamos el backdrop del modal
							$('#'+id_modal+'').modal('hide');
							$('#Estatus_Guardar').val("");
							$('#texto_fecha_reprogramada').val('');
						},
						cancel: function () {

						}
					}
				});
			<?php	} ?>
		}



		// MANTENIMIENTOS DEL MES
		// Función que carga el mantenimiento preventivo del Mes actual
		function reporteMantenimientoMes(incrementoTiempo = null) {
			// Calcula las nuevas fechas para generar la consulta
			var PeriodoTiempoInicio = $("#PeriodoTiempoInicio").val();
			var PeriodoTiempoFinal = $("#PeriodoTiempoFinal").val();

			// Determina las nuevas fechas a mostrar
			if (incrementoTiempo != null) {
				// Inicio de mes
				PeriodoTiempoInicio = moment(PeriodoTiempoInicio, "DD/MM/YYYY").add(incrementoTiempo, "M").format("DD/MM/YYYY");
				// Final del mes
				PeriodoTiempoFinal = moment(PeriodoTiempoFinal, "DD/MM/YYYY").add(incrementoTiempo, "M").endOf("month").format("DD/MM/YYYY");
			}
			else {
				// Inicio de mes actual
				PeriodoTiempoInicio = moment().startOf('month').format("DD/MM/YYYY");
				// Final del mes actual
				PeriodoTiempoFinal = moment().endOf('month').format("DD/MM/YYYY");
			}
			$("#PeriodoTiempoInicio").val(PeriodoTiempoInicio);
			$("#PeriodoTiempoFinal").val(PeriodoTiempoFinal);

			// Recolecta los parametros a enviar
			var strJsonParametros = { "accion": "mantenimientoActual", "Id_Area": $("#idareasesion").val(), "PeriodoTiempoInicio": PeriodoTiempoInicio, "PeriodoTiempoFinal": PeriodoTiempoFinal, "Modo_Opcion": 1 };
			// Guarda los filtros desde los controles directamente
			if (incrementoTiempo != null) {
				// Recupera los filtros guarados previamente en los campos hidden
				if($("#cmbubicacionprim_mensual_tmp").val() != -1) { strJsonParametros.Id_Ubic_Prim = $("#cmbubicacionprim_mensual_tmp").val(); }				// Ubicación Primaria
				if($("#cmbubicacionsec_mensual_tmp").val() != -1) { strJsonParametros.Id_Ubic_Sec = $("#cmbubicacionsec_mensual_tmp").val(); }					// Ubicación Secundaria
				if($("#cmbclase_mensual_tmp").val() != -1) { strJsonParametros.Id_Clase = $("#cmbclase_mensual_tmp").val(); }									// Clase
				if($("#cmbclasificacion_mensual_tmp").val() != -1) { strJsonParametros.Id_Clasificacion = $("#cmbclasificacion_mensual_tmp").val(); }			// Clasificación
				if($("#cmbfamilia_mensual_tmp").val() != -1) { strJsonParametros.Id_Familia = $("#cmbfamilia_mensual_tmp").val(); }								// Familia
				if($("#cmbsubfamilia_mensual_tmp").val() != -1) { strJsonParametros.Id_Subfamilia = $("#cmbsubfamilia_mensual_tmp").val(); }					// SubFamilia
				if($.trim($("#select-activos-search-mensual_tmp").val()) != "") { strJsonParametros.Id_Activo = $("#select-activos-search-mensual_tmp").val(); }	// Activo
			}
			else {
				// Resetea los campos hidden
				$("#cmbubicacionprim_mensual_tmp").val("");	$("#cmbubicacionsec_mensual_tmp").val("");
				$("#cmbclase_mensual_tmp").val("");	$("#cmbclasificacion_mensual_tmp").val("");
				$("#cmbfamilia_mensual_tmp").val(""); $("#cmbsubfamilia_mensual_tmp").val("");
				$("#lstFiltrosMantenimiento_tmp").val(""); $("#select-activos-search-mensual_tmp").val("");
				var lstFiltrosMantenimiento_tmp = new Array();

				// Almacena los filtros para las sub-busquedas
				if($("#cmbubicacionprim_mensual").val() != -1) {
					// Ubicación Primaria
					strJsonParametros.Id_Ubic_Prim = $("#cmbubicacionprim_mensual").val();
					$("#cmbubicacionprim_mensual_tmp").val($("#cmbubicacionprim_mensual").val());
					lstFiltrosMantenimiento_tmp.push("Ubicación Primaria: " + $("#cmbubicacionprim_mensual option:selected").text());
				}
				if($("#cmbubicacionsec_mensual").val() != -1) {
					// Ubicación Secundaria
					strJsonParametros.Id_Ubic_Sec = $("#cmbubicacionsec_mensual").val();
					$("#cmbubicacionsec_mensual_tmp").val($("#cmbubicacionsec_mensual").val());
					lstFiltrosMantenimiento_tmp.push("Ubicación Secundaria: " + $("#cmbubicacionsec_mensual option:selected").text());
				}
				if($("#cmbclase_mensual").val() != -1) {
					// Clase
					strJsonParametros.Id_Clase = $("#cmbclase_mensual").val();
					$("#cmbclase_mensual_tmp").val($("#cmbclase_mensual").val());
					lstFiltrosMantenimiento_tmp.push("Clase: " + $("#cmbclase_mensual option:selected").text());
				}
				if($("#cmbclasificacion_mensual").val() != -1) {
					// Clasificación
					strJsonParametros.Id_Clasificacion = $("#cmbclasificacion_mensual").val();
					$("#cmbclasificacion_mensual_tmp").val($("#cmbclasificacion_mensual").val());
					lstFiltrosMantenimiento_tmp.push("Clasificación: " + $("#cmbclasificacion_mensual option:selected").text());
				}
				if($("#cmbfamilia_mensual").val() != -1) {
					// Familia
					strJsonParametros.Id_Familia = $("#cmbfamilia_mensual").val();
					$("#cmbfamilia_mensual_tmp").val($("#cmbfamilia_mensual").val());
					lstFiltrosMantenimiento_tmp.push("Familia: " + $("#cmbfamilia_mensual option:selected").text());
				}
				if($("#cmbsubfamilia_mensual").val() != -1) {
					// SubFamilia
					strJsonParametros.Id_Subfamilia = $("#cmbsubfamilia_mensual").val();
					$("#cmbsubfamilia_mensual_tmp").val($("#cmbsubfamilia_mensual").val());
					lstFiltrosMantenimiento_tmp.push("Subfamilia: " + $("#cmbsubfamilia_mensual option:selected").text());
				}
				if($.trim($("#select-activos-search-mensual").val()) != "") {
					// Activo
					strJsonParametros.Id_Activo = $("#select-activos-search-mensual").val();
					$("#select-activos-search-mensual_tmp").val($("#select-activos-search-mensual").val());
					lstFiltrosMantenimiento_tmp.push("AF/BC: " + $("#select-activos-search-mensual option:selected").text());
				}
				// Guarda el listado de filtros como texto
				$("#lstFiltrosMantenimiento_tmp").val(lstFiltrosMantenimiento_tmp.join(" | "));
			}
			strJsonParametros.lstFiltrosMantenimiento_tmp = $("#lstFiltrosMantenimiento_tmp").val();

			// Genera la consulta
			jsShowWindowLoad("..:: Por favor espere, buscando información ::..");
			jQuery("#mantenimientoMesActualContenedor").html('<div style="padding: 2em 1em;"><div class="progress"><div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div></div></div>');
			jQuery("#mantenimientoMesActualContenedor").load("../controladores/simple_mvc/ActivoActividadesController.Class.php", strJsonParametros, function (response, status, xhr) {
				if (status == "error") {
					var msg = "Sorry but there was an error: ";
					mensajesalerta("Informaci&oacute;n", msg + xhr.status + " " + xhr.statusText, "error", "dark");
				}
				jsRemoveWindowLoad();
			});
		}

		// Función que carga el Mantenimiento pendiente del mes anterior hacia atrás
		function reporteMantenimientoPendiente() {
			// Calcula las nuevas fechas para generar la consulta
			// Fecha de inicio y fin del mes actual
			var PeriodoTiempoInicio = "<?php echo(date('01/m/Y')); ?>"; //$("#PeriodoTiempoInicio").val();
			var PeriodoTiempoFinal = "<?php echo(date('t/m/Y')); ?>"; //$("#PeriodoTiempoFinal").val();
			
			// Calcula el periodo de tiempo desde el ultimo día del mes anterior hasta 6 meses atrás
			PeriodoTiempoInicio = moment(PeriodoTiempoInicio, "DD/MM/YYYY").add(-6, "M").format("DD/MM/YYYY");
			PeriodoTiempoFinal = moment(PeriodoTiempoFinal, "DD/MM/YYYY").add(-1, "M").format("DD/MM/YYYY");

			// Recolecta los parametros a enviar
			var strJsonParametros = { "accion": "mantenimientoPendiente", "Id_Area": $("#idareasesion").val(), "PeriodoTiempoInicio": PeriodoTiempoInicio, "PeriodoTiempoFinal": PeriodoTiempoFinal, "Modo_Opcion": 2, "lstFiltrosMantenimiento_tmp":  $("#lstFiltrosMantenimiento_tmp").val() };
			// Recupera los filtros guarados previamente en los campos hidden
			if($("#cmbubicacionprim_mensual_tmp").val() != -1) { strJsonParametros.Id_Ubic_Prim = $("#cmbubicacionprim_mensual_tmp").val(); }				// Ubicación Primaria
			if($("#cmbubicacionsec_mensual_tmp").val() != -1) { strJsonParametros.Id_Ubic_Sec = $("#cmbubicacionsec_mensual_tmp").val(); }					// Ubicación Secundaria
			if($("#cmbclase_mensual_tmp").val() != -1) { strJsonParametros.Id_Clase = $("#cmbclase_mensual_tmp").val(); }									// Clase
			if($("#cmbclasificacion_mensual_tmp").val() != -1) { strJsonParametros.Id_Clasificacion = $("#cmbclasificacion_mensual_tmp").val(); }			// Clasificación
			if($("#cmbfamilia_mensual_tmp").val() != -1) { strJsonParametros.Id_Familia = $("#cmbfamilia_mensual_tmp").val(); }								// Familia
			if($("#cmbsubfamilia_mensual_tmp").val() != -1) { strJsonParametros.Id_Subfamilia = $("#cmbsubfamilia_mensual_tmp").val(); }					// SubFamilia
			if($.trim($("#select-activos-search-mensual_tmp").val()) != "") { strJsonParametros.Id_Activo = $("#select-activos-search-mensual_tmp").val(); }	// Activo
			
			// Genera la consulta
			jQuery("#mantenimientoPendientesContenedor").html('<div style="padding: 2em 1em;"><div class="progress"><div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div></div></div>');
			jQuery("#mantenimientoPendientesContenedor").load("../controladores/simple_mvc/ActivoActividadesController.Class.php", strJsonParametros, function (response, status, xhr) {
				if (status == "error") {
					var msg = "Sorry but there was an error: ";
					mensajesalerta("Informaci&oacute;n", msg + xhr.status + " " + xhr.statusText, "error", "dark");
				}
			});
		}

		function recargaTablas(){
			$('#tabla_de_accesorios').load('/siga/vistas/view/biomedica/components/rutinas/siga_tabla_accesorios.com.php');
			$('#tabla_de_materiales').load('/siga/vistas/view/biomedica/components/rutinas/siga_tabla_materiales.com.php');
			$('#com_select_rutinas').load('/siga/vistas/view/biomedica/components/rutinas/siga_select_rutinas.com.php');
		}

		// Función que restablece los filtros
		function restablecerFiltros() {
			// Restablece los combos select primarios
			$("#cmbubicacionprim_mensual").val(-1);
			$("#cmbclase_mensual").val(-1);
			$("#cmbfamilia_mensual").val(-1);
			$("#select-activos-search-mensual")[0].selectize.clear();
			// Restablece los combos select dependientes
			cambioUbicacionPrimaria($("#cmbubicacionprim_mensual"));
			cambioClase($("#cmbclase_mensual"));
			cambioFamilia($("#cmbfamilia_mensual"));
		}
	<?php if (isset($_GET["abriractivo"])) { ?>
		//$('#abrir_popup').click();
		pasar_activo2(<?php echo $_GET["abriractivo"] ?>);
	<?php } ?>

</script>
<!-- ==== Page: mantenimiento-preventivo ==== -->