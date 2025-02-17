<?php
	session_start();
	$variable_ir_inventario = $_GET['variable_ir_inventario'];
	$Id_Menu = $_GET['Id_Menu'];
	$url = $_SERVER['REQUEST_URI']; //returns the current URL
	$parts = explode('/',$url);
	$dir = $_SERVER['SERVER_NAME'];
	$port = $_SERVER['SERVER_PORT'] ? ':' . $_SERVER['SERVER_PORT'] : '';
	$paginaSEO = "//" . $dir . $port . "/".$parts[1]."/";

	
	//print_r($parts);
	if (isset($parts[2])) {
		$paginaSEO = $paginaSEO.$parts[2]."/";
	}
	if (isset($parts[3])) {
		if (strpos($parts[3], '.php') == false) {
			$paginaSEO = $paginaSEO.$parts[3]."/"; 
		}
	}
?>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
	<!-- File Input -->
	<link rel="stylesheet" href="../plugins/fileinput/fileinput.css">
	<script src="../plugins/docsupport/standalone/selectize.js"></script>
	<script src="../plugins/docsupport/index.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/locale/es.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
	<!-- File Input -->
	<!--link rel="stylesheet" href="../plugins/fileinput/fileinput.css"-->
	<link rel="stylesheet" href="../js/jquery-ui.css">
	<script src="../js/jquery-ui.min.js"></script>
	<style>
		.ui-autocomplete-loading { background: white url('ui-anim_basic_16x16.gif') right center no-repeat; }
		.ui-autocomplete { z-index: 10000; }
		.celdaCentradaVertical { vertical-align: middle !important; }
		.cursor-pointer { cursor: pointer; }
		.th-foto-data-table { min-width: 108px; max-width: 108px; }
		.img-inventario-tabla { max-width: 100px; max-height: 100px; width: initial; margin: 0 auto; }

		.span-file-adjunto { border-radius: 50%; width: 28px; height: 28px; display: block; position: relative; margin: 3px 0px; background: rgba(0, 0, 0, 0.15); }
			.fa-file-adjunto { font-size: 18px; width: 40px; color: #000; margin-top: 5px; padding: 0 !important; position: relative; left: -20%; }
		
		/* Estilo para la lista de archivos ligados */
		.lista_divFoto_lista { list-style: none; display: table; width: 100%; }
			.lista_divFoto_lista li { display: table-cell; float: left; width: 24%; border-bottom: #F0F0F0 solid 1px; margin: 3px; padding: 3px 5px; }
			.lista_divFoto_lista li:hover { background: #F0F0F0; }
			.lista_divFoto_lista .span-img-borrar { float: left; margin-right: 5px; cursor: pointer; }

			.lista_div_2_cols li { width: 49%; }
			.lista_div_2_cols li a { word-break: break-all !important; }
	</style>

<!-- Info boxes -->
	<div class="row" style="<?php if($Id_Menu==25){echo"display:none"; } ?>">
		<!--div class="col-md-3 col-sm-6 col-xs-12"-->
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box azul">
				<!-- Button trigger modal -->
				<a href="#" data-toggle="modal" data-target="#altaEquipo" onclick="limpiarcampos(); limpiarcamposproveedor(); limpiarcamposcontabilidad(); cargarAdminAccesoriosActivos();">
					<span class="info-box-icon bg-aqua"><i class="fa fa-arrow-circle-o-up"></i></span>
					<div class="info-box-content"><h3 class="info-box-text">Alta equipo</h3></div>
				</a>
			</div>
		</div>
		<!--div class="col-md-3 col-sm-6 col-xs-12" id="div_btn_baja_activo"-->
		<div class="col-md-3 col-sm-6 col-xs-12" id="div_btn_baja_activo">
			<div class="info-box verde">
				<a href="#" data-toggle="modal" data-target="#bajaEquipo" onclick="limpiarcamposbaja();">
					<span class="info-box-icon bg-green"><i class="fa fa-arrow-circle-o-down"></i></span>
					<div class="info-box-content"><h3 class="info-box-text">Baja equipo</h3></div>
				</a>
			</div>
		</div>
		<!--div class="col-md-3 col-sm-6 col-xs-12" id="div_btn_reub_activo"-->
		<div class="col-md-3 col-sm-6 col-xs-12" id="div_btn_reub_activo">
			<div class="info-box amarillo">
				<a href="#" data-toggle="modal" data-target="#reubicacionEquipo" onclick="limpiarcamposreubicacion()">
					<span class="info-box-icon bg-yellow"><i class="fa fa-map-marker"></i></span>
					<div class="info-box-content"><h3 class="info-box-text two-lines">reubicación de<br />equipo</h3></div>
				</a>
			</div>
		</div>
		<!-- fix for small devices only -->
		
		<div class="clearfix visible-sm-block"></div>
		<div class="col-md-3 col-sm-6 col-xs-12" id="div_btn_reasignar_activo">
			<div class="info-box negro">
				<a href="#reasignacion" aria-controls="reasignacion" role="tab" data-toggle="tab" id="tabReasignacion_activo" onclick="$('#tiposInventario li').removeClass('active');">
					<span class="info-box-icon bg-info"><i class="fa fa-cubes"></i></span>
					<div class="info-box-content"><h3 class="info-box-text">Reasignación de Equipo</h3></div>
				</a>
			</div>
		</div>
		
	</div>
	<hr class="separation-line">

	<!-- ==== Botones de Activos por status ==== -->
	<div class="row">
		<ul id="tiposInventario" class="nav nav-tabs azulf" role="tablist">
			<li role="presentation" style="<?php if($Id_Menu==25){echo"display:none";}?>" class="active"><a href="#inventario" aria-controls="inventario" role="tab" data-toggle="tab">Inventario</a></li>
			<li role="presentation" style="<?php if($Id_Menu==25){echo"display:none";}?>"><a href="#bajas" aria-controls="bajas" id="tabEnProceso" role="tab" data-toggle="tab" onclick="tablabaja(0,0); ">En proceso de baja</a></li>
			<li role="presentation"><a href="#bajas" aria-controls="bajas" role="tab" data-toggle="tab" onclick="tablabaja(1,0); " id="tabbaja_definitiva">Baja definitiva</a>
			<li role="presentation" style="<?php if($Id_Menu==25){echo"display:none";}?>"><a href="#reubicacion" aria-controls="reubicacion" role="tab" data-toggle="tab" onclick="tablareubicacion(); " id="tabreubicacion_activo">Reubicación</a></li>
			<!--<li class="export"><a download="inventario.xls" href="#" onclick="return ExcellentExport.excel(this, 'tablaactivos', 'Inventario');"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Exportar</a></li>-->
		</ul>
	</div>

	<!-- ==== Main row ==== -->
	<div class="row">
		<div class="tab-content">
			<!-- ==== Area del Inventario Activo ==== -->
			<div role="tabpanel" class="tab-pane active" id="inventario">
				<div class="col-md-12">
					<div class="barrasLateralesDataTableIzquierdo"></div>
					<div class="box">
						<div class="box-body">
							<div>
								<!-- ==== Variables para Filtros especificos ==== -->
								<input type="hidden" id="hdd_filt_afbc_activos" />
								<input type="hidden" id="hdd_filt_nombre_activos" />
								<input type="hidden" id="hdd_filt_clasif_activos" />
								<input type="hidden" id="hdd_filt_marca_activos" / >
								<input type="hidden" id="hdd_filt_modelo_activos" / >
								<input type="hidden" id="hdd_filt_num_serie_activos" / >
								<input type="hidden" id="hdd_filt_propiedad_activos" />
								<input type="hidden" id="hdd_filt_resp_activos" />
								<input type="hidden" id="hdd_filt_uprim_activos" />
								<input type="hidden" id="hdd_filt_usec_activos" />
								<input type="hidden" id="hdd_filt_estatus_activos" />
								<input type="hidden" id="hdd_filt_importe_seguro_activos" />
								<input type="hidden" id="hdd_filt_monto_factura_activos" />
								<input type="hidden" id="hdd_filt_fecha_alta_activos" />

								<!-- ==== Tabla de Activos ==== -->
								<div id="lstFiltros_tablaactivos"></div>
								<table id="tablaactivos" class="table table-bordered table-striped table-chs" style="width:100%">
									<thead>
										<tr>
											<?php
												for($i = 0; $i < 17; $i++) {
													echo("<td style='height: 17px;'><div class='text-center'>&nbsp;</div></td>");
												}
											?>
										</tr>
										<tr>
											<!--<th>No.</th>-->
											<th>Editar</th>
											<th>Pdf</th>
											<th data-aplicar-filtro="true" data-id-select-filtro="Filtro_AFBC_Activos" data-campo-receptor="hdd_filt_afbc_activos" data-nombre-campo="AF_BC" data-id-tabla="tablaactivos">AF/BC</th>
											<th class="th-foto-data-table">Foto</th>
											<th data-aplicar-filtro="true" data-id-select-filtro="Filtro_Nombre_Activos" data-campo-receptor="hdd_filt_nombre_activos" data-nombre-campo="Nombre" data-id-tabla="tablaactivos">Nombre Activo</th>
											<!--<th>Área</th>-->
											<th data-aplicar-filtro="true" data-id-select-filtro="Filtro_Clasific_Activos" data-campo-receptor="hdd_filt_clasif_activos" data-nombre-campo="Clasificacion" data-id-tabla="tablaactivos">Clasificación</th>
											<th data-aplicar-filtro="true" data-id-select-filtro="Filtro_Marca_Activos" data-campo-receptor="hdd_filt_marca_activos" data-nombre-campo="Marca" data-id-tabla="tablaactivos">Marca</th>
											<th data-aplicar-filtro="true" data-id-select-filtro="Filtro_Modelo_Activos" data-campo-receptor="hdd_filt_modelo_activos" data-nombre-campo="Modelo" data-id-tabla="tablaactivos">Modelo</th>
											<th data-aplicar-filtro="true" data-id-select-filtro="Filtro_NumSerie_Activos" data-campo-receptor="hdd_filt_num_serie_activos" data-nombre-campo="NumSerie" data-id-tabla="tablaactivos">Número de serie</th>
											<th data-aplicar-filtro="true" data-id-select-filtro="Filtro_Propiedad_Activos" data-campo-receptor="hdd_filt_propiedad_activos" data-nombre-campo="Propiedad" data-id-tabla="tablaactivos">Propiedad</th>
											<!--<th>Tipo de activo</th>-->
											<!--<th>Descripción</th>-->
											<th data-aplicar-filtro="true" data-id-select-filtro="Filtro_Usr_Responsable_Activos" data-campo-receptor="hdd_filt_resp_activos" data-nombre-campo="UsuarioResponsable" data-id-tabla="tablaactivos">Usuario Responsable</th>
											<th data-aplicar-filtro="true" data-id-select-filtro="Filtro_UPrimaria_Activos" data-campo-receptor="hdd_filt_uprim_activos" data-nombre-campo="UbicacionPrimaria" data-id-tabla="tablaactivos">Ubicación Primaria</th>
											<th data-aplicar-filtro="true" data-id-select-filtro="Filtro_USecundaria_Activos" data-campo-receptor="hdd_filt_usec_activos" data-nombre-campo="UbicacionSecundaria" data-id-tabla="tablaactivos">Ubicación Secundaria</th>
											<th data-aplicar-filtro="true" data-id-select-filtro="Filtro_FechaAlta_Activos" data-campo-receptor="hdd_filt_fecha_alta_activos" data-nombre-campo="FechaAlta" data-id-tabla="tablaactivos">Fecha Alta</th>
											<th data-aplicar-filtro="true" data-id-select-filtro="Filtro_MontoFactura_Activos" data-campo-receptor="hdd_filt_monto_factura_activos" data-nombre-campo="Monto_Factura" data-id-tabla="tablaactivos">Monto Activo</th>
											<th data-aplicar-filtro="true" data-id-select-filtro="Filtro_ImporteSeguro_Activos" data-campo-receptor="hdd_filt_importe_seguro_activos" data-nombre-campo="ImporteSeguros" data-id-tabla="tablaactivos">Importe Seguros</th>
											<th data-aplicar-filtro="true" data-id-select-filtro="Filtro_Estatus_Activos" data-campo-receptor="hdd_filt_estatus_activos" data-nombre-campo="Estatus" data-id-tabla="tablaactivos">Estatus</th>
										</tr>
									</thead>
								</table>
								<p class="text-right">*Se incluyen los activos que en algún momento fueron dados de baja o estuvieron en proceso pero han regresado a operación.</p>
							</div>
						</div>
					</div>
					<div class="barrasLateralesDataTableDerecho"></div>
				</div>
			</div>

			<!-- ==== Area de Inventario en Proceso de Baja ==== -->
			<div role="tabpanel" class="tab-pane" id="bajas">
				<div class="col-md-12">
					<div class="barrasLateralesDataTableIzquierdo"></div>
					<div class="box">
						<div class="box-body">
							<div>
								<!-- ==== Filtros especificos ==== -->
								<input type="hidden" id="Estatus_baja">
								<div id="campos_hidden_baja_comun">
									<input type="hidden" id="hdd_filt_afbc_baja" />
									<input type="hidden" id="hdd_filt_nombre_baja" />
									<input type="hidden" id="hdd_filt_clasif_baja" />
									<input type="hidden" id="hdd_filt_marca_baja" / >
									<input type="hidden" id="hdd_filt_modelo_baja" / >
									<input type="hidden" id="hdd_filt_num_serie_baja" / >
									<input type="hidden" id="hdd_filt_propiedad_baja" />
									<input type="hidden" id="hdd_filt_resp_baja" />
									<input type="hidden" id="hdd_filt_desc_corta_baja" />
									<input type="hidden" id="hdd_filt_uprim_baja" />
									<input type="hidden" id="hdd_filt_usec_baja" />
									<input type="hidden" id="hdd_filt_estatus_baja" />
									<input type="hidden" id="hdd_filt_importe_seguro_baja" />
									<input type="hidden" id="hdd_filt_monto_factura_baja" />
									<input type="hidden" id="hdd_filt_tipo_activo_baja" />
									<input type="hidden" id="hdd_filt_motivo_baja" />
									<input type="hidden" id="hdd_filt_fecha_baja_usr_solicitante_baja" />
									<input type="hidden" id="hdd_filt_fecha_baja_usr_dir_financiera_baja" />
									<input type="hidden" id="hdd_filt_fecha_baja_usr_contabilidad_baja" />
									<input type="hidden" id="hdd_filt_estatus_workflow_baja" />
								</div>

								<table border="0" cellspacing="5" cellpadding="5" width="100%">
									<tbody>
										<tr>
											<td><div class="col-md-12">Bajas con fecha Del:</div></td>
											<td><div class="col-md-12"><input type="text" class="form-control" id="fechaDel" name="fechaDel" autocomplete="off"></div></td>
											<td><div class="col-md-12">Bajas con fecha Al:</div></td>
											<td><div class="col-md-12"><input type="text" class="form-control" id="fechaAl" name="fechaAl" autocomplete="off"></div></td>
											<td><div class="col-md-12"><input type="radio" name="fecha_bajas" id="baja_solicitante">&nbsp;Usuario Solicitante&nbsp;&nbsp;&nbsp;&nbsp;</div></td>
											<td><div class="col-md-12"><input type="radio" name="fecha_bajas" id="baja_direc_financiera">&nbsp;Direcci&oacute;n Financiera&nbsp;&nbsp;&nbsp;&nbsp;</div></td>
											<td><div class="col-md-12"><input type="radio" name="fecha_bajas" id="baja_contabilidad">&nbsp;Contabilidad</div></td>
										</tr>
										<tr>
											<td colspan="7" align="center"><br><button type="button" class="btn chs" id="buscar_baja">Buscar</button>&nbsp;&nbsp;&nbsp;<button type="button" class="btn chs export" id="exportar_baja"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Exportar a Excel</a></li></button><br>
										</tr>
									</tbody>
								</table>
								<!-- ==== Tabla de elementos ==== -->
								<div id="lstFiltros_tablebajas"></div>
								<table id="tablebajas" class="table table-bordered table-striped table-chs">
									<thead>
										<tr>
											<?php
												for($i = 0; $i < 22; $i++) {
													echo("<td style='height: 17px;'><div class='text-center'>&nbsp;</div></td>");
												}
											?>
										</tr>
										<tr>
											<!--th>No.</th-->
											<?php if($Id_Menu!=25) { ?><th>Editar</th><?php } ?>
											<th>PDF Baja</th>
											<!--<th>PDF Activo</th>-->
											<th class="th-foto-data-table">Foto</th>
											<th data-aplicar-filtro="true" data-id-select-filtro="Filtro_AFBC_Baja" data-campo-receptor="hdd_filt_afbc_baja" data-nombre-campo="AF_BC" data-id-tabla="tablebajas">AF/BC</th>
											<th data-aplicar-filtro="true" data-id-select-filtro="Filtro_Fecha_Baja_Usr_Solicitante_Baja" data-campo-receptor="hdd_filt_fecha_baja_usr_solicitante_baja" data-nombre-campo="FechaBaja_UsrSolicitante" data-id-tabla="tablebajas" title="Es la fecha en la cual el usuario ha firmado la baja">Fech. Baja Usuario Solicitante</th>
											<th data-aplicar-filtro="true" data-id-select-filtro="Filtro_Fecha_Baja_Usr_DirFinanciera_Baja" data-campo-receptor="hdd_filt_fecha_baja_usr_dir_financiera_baja" data-nombre-campo="FechaBaja_UsrDirFinanciera" data-id-tabla="tablebajas" title="Es la fecha en la cual el usuario ha firmado la baja">Fecha Baja Dirección Financiera</th>
											<th data-aplicar-filtro="true" data-id-select-filtro="Filtro_Fecha_Baja_Usr_Contabilidad_Baja" data-campo-receptor="hdd_filt_fecha_baja_usr_contabilidad_baja" data-nombre-campo="FechaBaja_UsrContabilidad" data-id-tabla="tablebajas" title="Es la fecha en la cual el usuario ha firmado la baja">Fecha Baja Contabilidad</th>
											<th data-aplicar-filtro="true" data-id-select-filtro="Filtro_EstatusWorkflow_Baja" data-campo-receptor="hdd_filt_estatus_workflow_baja" data-nombre-campo="EstatusWorkflowBaja" data-id-tabla="tablebajas">Estatus de Baja</th>
											<th data-aplicar-filtro="true" data-id-select-filtro="Filtro_Motivo_Baja" data-campo-receptor="hdd_filt_motivo_baja" data-nombre-campo="MotivoBaja" data-id-tabla="tablebajas">Motivo de Baja</th>
											<th data-aplicar-filtro="true" data-id-select-filtro="Filtro_Nombre_Baja" data-campo-receptor="hdd_filt_nombre_baja" data-nombre-campo="Nombre" data-id-tabla="tablebajas">Nombre del activo</th>
											<th>Área</th>
											<th data-aplicar-filtro="true" data-id-select-filtro="Filtro_Clasific_Baja" data-campo-receptor="hdd_filt_clasif_baja" data-nombre-campo="Clasificacion" data-id-tabla="tablebajas">Clasificación</th>
											<th data-aplicar-filtro="true" data-id-select-filtro="Filtro_Marca_Baja" data-campo-receptor="hdd_filt_marca_baja" data-nombre-campo="Marca" data-id-tabla="tablebajas">Marca</th>
											<th data-aplicar-filtro="true" data-id-select-filtro="Filtro_Modelo_Baja" data-campo-receptor="hdd_filt_modelo_baja" data-nombre-campo="Modelo" data-id-tabla="tablebajas">Modelo</th>
											<th data-aplicar-filtro="true" data-id-select-filtro="Filtro_NumSerie_Baja" data-campo-receptor="hdd_filt_num_serie_baja" data-nombre-campo="NumSerie" data-id-tabla="tablebajas">Número de serie</th>
											<th data-aplicar-filtro="true" data-id-select-filtro="Filtro_Propiedad_Baja" data-campo-receptor="hdd_filt_propiedad_baja" data-nombre-campo="Propiedad" data-id-tabla="tablebajas">Propiedad</th>
											<th data-aplicar-filtro="true" data-id-select-filtro="Filtro_TipoActivo_Baja" data-campo-receptor="hdd_filt_tipo_activo_baja" data-nombre-campo="Clase" data-id-tabla="tablebajas">Clase</th>
											<th data-aplicar-filtro="true" data-id-select-filtro="Filtro_DescCorta_Baja" data-campo-receptor="hdd_filt_desc_corta_baja" data-nombre-campo="Descripcion" data-id-tabla="tablebajas">Descripción</th>
											<th data-aplicar-filtro="true" data-id-select-filtro="Filtro_UPrimaria_Baja" data-campo-receptor="hdd_filt_uprim_baja" data-nombre-campo="UbicacionPrimaria" data-id-tabla="tablebajas">Ubicación Primaria</th>
											<th data-aplicar-filtro="true" data-id-select-filtro="Filtro_USecundaria_Baja" data-campo-receptor="hdd_filt_usec_baja" data-nombre-campo="UbicacionSecundaria" data-id-tabla="tablebajas">Ubicación Secundaria</th>
											<th data-aplicar-filtro="true" data-id-select-filtro="Filtro_FechaAlta_Baja" data-campo-receptor="hdd_filt_fecha_alta_baja" data-nombre-campo="FechaAlta" data-id-tabla="tablebajas">Fecha Alta Activo</th>
											<th data-aplicar-filtro="true" data-id-select-filtro="Filtro_MontoFactura_Baja" data-campo-receptor="hdd_filt_monto_factura_baja" data-nombre-campo="Monto_Factura" data-id-tabla="tablebajas">Monto Factura</th>
										</tr>
									</thead>
								</table>
							</div>
						</div>
					</div>
					<div class="barrasLateralesDataTableDerecho"></div>
				</div>
			</div>

			<!-- ==== Area de Reubicación ==== -->
			<div role="tabpanel" class="tab-pane" id="reubicacion">
				<div class="col-md-12">
					<div class="barrasLateralesDataTableIzquierdo"></div>
					<div class="box">
						<div class="box-body">
							<div>
								<!-- ==== Filtros especificos ==== -->
								<input type="hidden" id="hdd_filt_afbc_reubicacion" />
								<input type="hidden" id="hdd_filt_nombre_reubicacion" />
								<input type="hidden" id="hdd_filt_clasif_reubicacion" />
								<input type="hidden" id="hdd_filt_marca_reubicacion" / >
								<input type="hidden" id="hdd_filt_modelo_reubicacion" / >
								<input type="hidden" id="hdd_filt_num_serie_reubicacion" / >
								<input type="hidden" id="hdd_filt_propiedad_reubicacion" />
								<input type="hidden" id="hdd_filt_resp_reubicacion" />
								<input type="hidden" id="hdd_filt_uprim_reubicacion" />
								<input type="hidden" id="hdd_filt_usec_reubicacion" />
								<input type="hidden" id="hdd_filt_monto_factura_reubicacion" />
								<input type="hidden" id="hdd_filt_desc_corta_reubicacion" />
								<input type="hidden" id="hdd_filt_uespecifica_reubicacion" />
								<input type="hidden" id="hdd_filt_uprim_proc_reubicacion" />
								<input type="hidden" id="hdd_filt_usec_proc_reubicacion" />
								<input type="hidden" id="hdd_filt_fecha_reubicacion_reubicacion" />

								<table border="0" cellspacing="5" cellpadding="5" style="margin: 0 auto; margin-bottom: 1em;">
									<tbody>
										<tr>
										<td><div class="col-md-12">Reubicación con fecha Del:</div></td>
										<td><div class="col-md-12"><input type="text" class="form-control" id="fechaDel_reubic" name="fechaDel_reubic" autocomplete="off"></div></td>
										<td><div class="col-md-12">Reubicación con fecha Al:</div></td>
										<td><div class="col-md-12"><input type="text" class="form-control" id="fechaAl_reubic" name="fechaAl_reubic" autocomplete="off"></div></td>
										<td align="center"><button type="button" class="btn chs" id="buscar_reubicacion" onclick="tablareubicacion()">Buscar</button><br>
										</tr>
									</tbody>
								</table>
								<!--
								<table border="0" cellspacing="5" cellpadding="5">
										<tbody><tr>
											<td>Reubicación con fecha Del:</td>
											<td><input type="text" id="fechaDelR" name="fechaDelR"></td>
											<td>Reubicación con fecha Al:</td>
											<td><input type="text" id="fechaAlR" name="fechaAlR"></td>
											
										</tr>
									</tbody>
								</table>-->

								<div id="lstFiltros_tablereubicacion"></div>
								<table id="tablereubicacion" class="table table-bordered table-striped table-chs">
									<thead>
										<tr>
											<?php
												for($i = 0; $i < 18; $i++) {
													echo("<td style='height: 17px;'><div class='text-center'>&nbsp;</div></td>");
												}
											?>
										</tr>
										<tr>
											<!--th>No.</th-->
											<th>Editar</th>
											<th>PDF</th>
											<th data-aplicar-filtro="true" data-id-select-filtro="Filtro_AFBC_Reubicacion" data-campo-receptor="hdd_filt_afbc_reubicacion" data-nombre-campo="AF_BC" data-id-tabla="tablereubicacion">AF/BC</th>
											<th class="th-foto-data-table">Foto</th>
											<th data-aplicar-filtro="true" data-id-select-filtro="Filtro_Nombre_Reubicacion" data-campo-receptor="hdd_filt_nombre_reubicacion" data-nombre-campo="Nombre" data-id-tabla="tablereubicacion">Nombre Activo</th>
											<!--<th>Área</th>-->
											<th data-aplicar-filtro="true" data-id-select-filtro="Filtro_Clasific_Reubicacion" data-campo-receptor="hdd_filt_clasif_reubicacion" data-nombre-campo="Clasificacion" data-id-tabla="tablereubicacion">Clasificación</th>
											<th data-aplicar-filtro="true" data-id-select-filtro="Filtro_Marca_Reubicacion" data-campo-receptor="hdd_filt_marca_reubicacion" data-nombre-campo="Marca" data-id-tabla="tablereubicacion">Marca</th>
											<th data-aplicar-filtro="true" data-id-select-filtro="Filtro_Modelo_Reubicacion" data-campo-receptor="hdd_filt_modelo_reubicacion" data-nombre-campo="Modelo" data-id-tabla="tablereubicacion">Modelo</th>
											<th data-aplicar-filtro="true" data-id-select-filtro="Filtro_NumSerie_Reubicacion" data-campo-receptor="hdd_filt_num_serie_reubicacion" data-nombre-campo="NumSerie" data-id-tabla="tablereubicacion">Número de serie</th>
											<th data-aplicar-filtro="true" data-id-select-filtro="Filtro_Propiedad_Reubicacion" data-campo-receptor="hdd_filt_propiedad_reubicacion" data-nombre-campo="Propiedad" data-id-tabla="tablereubicacion">Propiedad</th>
											<th data-aplicar-filtro="true" data-id-select-filtro="Filtro_DescCorta_Reubicacion" data-campo-receptor="hdd_filt_desc_corta_reubicacion" data-nombre-campo="Descripcion" data-id-tabla="tablereubicacion">Descripción</th>
											<th data-aplicar-filtro="true" data-id-select-filtro="Filtro_UPrimariaProc_Reubicacion" data-campo-receptor="hdd_filt_uprim_proc_reubicacion" data-nombre-campo="UbicacionPrimariaProcedencia" data-id-tabla="tablereubicacion">Ubic. Primaria Procedencia</th>
											<th data-aplicar-filtro="true" data-id-select-filtro="Filtro_USecundariaProc_Reubicacion" data-campo-receptor="hdd_filt_usec_proc_reubicacion" data-nombre-campo="UbicacionSecundariaProcedencia" data-id-tabla="tablereubicacion">Ubic. Secundaria Procedencia</th>
											<th data-aplicar-filtro="true" data-id-select-filtro="Filtro_UPrimaria_Reubicacion" data-campo-receptor="hdd_filt_uprim_reubicacion" data-nombre-campo="UbicacionPrimaria" data-id-tabla="tablereubicacion">Ubic.<br> Primaria Destino</th>
											<th data-aplicar-filtro="true" data-id-select-filtro="Filtro_USecundaria_Reubicacion" data-campo-receptor="hdd_filt_usec_reubicacion" data-nombre-campo="UbicacionSecundaria" data-id-tabla="tablereubicacion">Ubic.<br> Secundaria Destino</th>
											<th data-aplicar-filtro="true" data-id-select-filtro="Filtro_UEspecifica_Reubicacion" data-campo-receptor="hdd_filt_uespecifica_reubicacion" data-nombre-campo="UbicacionEspecificaDestino" data-id-tabla="tablereubicacion">Ubic.<br> Especifica</th>
											<th data-aplicar-filtro="true" data-id-select-filtro="Filtro_FechaReubicacion_Reubicacion" data-campo-receptor="hdd_filt_fecha_reubicacion_reubicacion" data-nombre-campo="FechaReubicacion" data-id-tabla="tablereubicacion">Fecha Reubicación</th>
											<th data-aplicar-filtro="true" data-id-select-filtro="Filtro_MontoFactura_Reubicacion" data-campo-receptor="hdd_filt_monto_factura_reubicacion" data-nombre-campo="Monto_Factura" data-id-tabla="tablereubicacion">Monto Factura</th>
										</tr>
									</thead>
								</table>
							</div>
						</div>
					</div>
					<div class="barrasLateralesDataTableDerecho"></div>
				</div>
			</div>

			<!-- ==== Area para Reasignación de Activos ==== -->
			<div role="tabpanel" class="tab-pane" id="reasignacion">
				<div class="gray">
					<div class="row">
						<div id="lista_filtros_reasignacion" class="col-md-10 col-md-offset-1">
							<input type="text" name="Cad_Id_Activo" id="Cad_Id_Activo" style="display: none;" readonly="readonly" />
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">AF/BC</label>
										<div id="muestro_select">
											<select id="select-activos-reasignacion" class="demo-default" placeholder="AF/BC"></select>
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">Marca</label>
										<input type="text" id="inputReasignaMarca" class="form-control" placeholder="Marca" />
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">Modelo</label>
										<input type="text" id="inputReasignaModelo" class="form-control" placeholder="Modelo" />
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">Propiedad</label>
										<select id="cmbPropiedad_filtro" class="form-control" placeholder="Propiedad"></select>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">Usuarios responsables que tienen activos</label>
										<div id="muestro_select"><select id="select-usuario-responsable" class="demo-default" placeholder="Usuario responsable" style="display:none"></select></div>
										<div id="gifcargando-search-responsable" style="display:none" align="center"><img src="../dist/img/cargando-loading.gif" style="max-width: 25px; max-height: 25px" alt="cargando-loading-037.gif"></div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">Ubicación Primaria</label>
										<select class="form-control" id="cmbubicacionprim_filtro" data-combo-ubicacion-secundaria="cmbubicacionsec_filtro" onchange="cambioUbicacionPrimaria2(this);"></select>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">Ubicación Secundaria</label>
										<select class="form-control" id="cmbubicacionsec_filtro">
											<option value="-1">--Ubicación Secundaria--</option>
										</select>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">Buscar / Limpiar</label>
										<br>
										<button type="button" class="btn chs" onclick="$('#Cad_Id_Activo').val(''); obtenerListaActivos();">Buscar</button>
										<button type="button" class="btn chs" onclick="restablecerFiltros();">Limpiar</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<script type="text/javascript" src="../js/validator.js"></script>
					<script type="text/javascript">
						// ==== FUNCIONES PARA REASIGNACIÓN DE ACTIVOS ====
						// Función que restablece los filtros
						function restablecerFiltros() {
							// Restablece los combos select primarios
							$("#select-activos-reasignacion").val(-1);
							$("#select-activos-reasignacion")[0].selectize.clear();

							$("#select-usuario-responsable").val(-1);
							$("#select-usuario-responsable")[0].selectize.clear();

							// Elimina los valores en los campos
							$("#lista_filtros_reasignacion input").val("");
							$("#lista_filtros_reasignacion select").val(-1);
							// Restablece los combos select dependientes
							cambioUbicacionPrimaria2($("#cmbubicacionprim_filtro"));
						}

						// Funcion que rellena el combo de selección de Activos que pertenecen al Área (utilizado para Reasignación de equipo)
						function obtenerListaActivosArea() {
							var parametrosJson = { Id_Area: $("#idareasesion").val(), accion: "ActivosXArea" };
							$.ajax({
								type: "POST",
								url: "../controladores/simple_mvc/ActivoController.Class.php",
								data: parametrosJson,
								async: true,
								dataType: "html",
								beforeSend: function (objeto) {
									$("#gifcargando-search-activos-area").show();
								},
								success: function (datos) {
									var respuestaJson = JSON.parse($.trim(datos));
									var lstUsuarios = new Array();
									lstUsuarios.push("<option></option>");
									if (respuestaJson.length > 0) {
										for (var i = 0; i < respuestaJson.length; i++) {
											lstUsuarios.push("<option value='" + respuestaJson[i].Id_Activo + "'>" + respuestaJson[i].AF_BC + ' ' + respuestaJson[i].Nombre_Activo + "</option>");
										}
									}
									else {
										lstUsuarios.push("<option value='-1'>--Sin Resultados--</option>");
									}
									// Cierra el icono de carga
									$("#gifcargando-search-activos-area").hide();
									// Rellena el combo
									$('#select-activos-reasignacion').html(lstUsuarios.join(""));
									// Muestra el combo
									$("#select-activos-reasignacion").show();
									// Agrega funcionalidad al combo con el plugin
									$('#select-activos-reasignacion').selectize();
								},
								error: function (objeto, quepaso, otroobj) {
									// Ha ocurrido un error y no pueden ser cargados los elementos en el combo select
									$("#gifcargando-search-responsable").hide();
									mensajesalerta("Oh No!", "Ocurrio un error al consultar." + objeto.responseText, "error", "dark");
									$('#select-activos-reasignacion').append($('<option>', { value: "-1" }).text("--Sin resultados--"));
									$("#select-activos-reasignacion").show();
									$('#select-activos-reasignacion').selectize();
								}
							});
						}

						// Función para rellenar el combo con la lista de Usuarios que tienen activos asignados
						function obtenerUsuariosActivos() {
							var parametrosJson = { Id_Area: $("#idareasesion").val(), SoloConActivos: 1, accion: "UsuariosConActivosGet" };
							$.ajax({
								type: "POST",
								url: "../controladores/simple_mvc/ActivoController.Class.php",
								data: parametrosJson,
								async: true,
								dataType: "html",
								beforeSend: function (objeto) {
									$("#gifcargando-search-responsable").show();
								},
								success: function (datos) {
									var respuestaJson = JSON.parse($.trim(datos));
									var lstUsuarios = new Array();
									lstUsuarios.push("<option></option>");
									if (respuestaJson.length > 0) {
										for (var i = 0; i < respuestaJson.length; i++) {
											lstUsuarios.push("<option value='" + respuestaJson[i].Num_Empleado + "'>" + respuestaJson[i].Num_Empleado + ' ' + respuestaJson[i].UsuarioResponsable + "</option>");
										}
									}
									else {
										lstUsuarios.push("<option value='-1'>--Sin Resultados--</option>");
									}
									// Cierra el icono de carga
									$("#gifcargando-search-responsable").hide();
									// Rellena el combo
									$('#select-usuario-responsable').html(lstUsuarios.join(""));
									// Muestra el combo
									$("#select-usuario-responsable").show();
									// Agrega funcionalidad al combo con el plugin
									$('#select-usuario-responsable').selectize();
								},
								error: function (objeto, quepaso, otroobj) {
									// Ha ocurrido un error y no pueden ser cargados los elementos en el combo select
									$("#gifcargando-search-responsable").hide();
									mensajesalerta("Oh No!", "Ocurrio un error al consultar." + objeto.responseText, "error", "dark");
									$('#select-usuario-responsable').append($('<option>', { value: "-1" }).text("--Sin resultados--"));
									$("#select-usuario-responsable").show();
									$('#select-usuario-responsable').selectize();
								}
							});
						}

						// Rellena el combo para la selección de Propiedades
						function obtenerPropiedad() {
							// Identifica el Area y Todas (5)
							var Id_Area = $("#idareasesion").val();
							if(Id_Area != "") { Id_Area += ",5"; }

							var resultado = new Array();
							data = { Estatus_Reg: "1", Id_Area: Id_Area, accion: "consultar" };
							resultado = cargo_cmb("../fachadas/activos/siga_cat_propiedad/Siga_cat_propiedadFacade.Class.php", false, data);
							if(resultado.totalCount > 0) {
								$('#cmbPropiedad_filtro').append($('<option>', { value: "-1" }).text("--Propiedad--"));
								for(var i = 0; i < resultado.totalCount; i++){
									$('#cmbPropiedad_filtro').append($('<option>', { value: resultado.data[i].Id_Propiedad }).text(resultado.data[i].Desc_Propiedad));
								}
							}
							else {
								$('#cmbPropiedad_filtro').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
							}
						}

						
						// Función que obtiene la lista de activos de acuerdo a los filtros seleccionados
						function obtenerListaActivos() {
							var parametrosJson = { Id_Area: $("#idareasesion").val(), accion: "ActivosGet" };
							// Activo seleccionado desde el combo select ubicado en los filtros
							if($("#Cad_Id_Activo").val() != "") {
								// Se utiliza cuando se ha actualiza una serie de Activos y se deben mostrar después de la actualización
								parametrosJson.Cad_Id_Activo = $("#Cad_Id_Activo").val();
							}
							else {
								// Se utiliza cuando se realizan las búsquedas a través de los filtros. Opción común.
								if($("#select-activos-reasignacion").val() != "") { parametrosJson.Id_Activo = $("#select-activos-reasignacion").val(); }
								if($("#inputReasignaMarca").val() != "") { parametrosJson.Marca = $("#inputReasignaMarca").val(); }
								if($("#inputReasignaModelo").val() != "") { parametrosJson.Modelo = $("#inputReasignaModelo").val(); }
								if($("#cmbPropiedad_filtro").val() > 0) { parametrosJson.Id_Propiedad = $("#cmbPropiedad_filtro").val(); }
								if($("#select-usuario-responsable").val() != "") { parametrosJson.Num_Empleado = $("#select-usuario-responsable").val(); }
								if($("#cmbubicacionprim_filtro").val() > 0) { parametrosJson.Id_Ubic_Prim = $("#cmbubicacionprim_filtro").val(); }
								if($("#cmbubicacionsec_filtro").val() > 0) { parametrosJson.Id_Ubic_Sec = $("#cmbubicacionsec_filtro").val(); }
								if($("#IdActivoReasignar").val() != "") { parametrosJson.Id_Activos_Excluidos = $("#IdActivoReasignar").val(); }
							}

							//console.log(parametrosJson);
							jsShowWindowLoad("Por favor espere, buscando información");
							$("#listaActivosReasignacion").load("../controladores/simple_mvc/ActivoController.Class.php", parametrosJson, function (response, status, xhr) {
								if (status != "error") {
									// Genera el datatable con los registros encontrados
									$("#lstActivosBusqueda").DataTable({
										"lengthMenu": [ [10, 25, 50, 100, 100000], [10, 25, 50, 100, "Todos"] ],
										// Esqueleto del datatable completo (B: botones; l: longitud de cuantos resultados va a mostrar; f: filtros; <: agrega un div; "table-responsive" agrega la clase al div; t: tabla; >:cierra el div; i: información ; p: paginación)
										"dom": '<"text-center"><"row"<"col-md-6"l><"col-md-6"f>><"table-responsive"t>ip',
										// Tamaño (alto)
										"scrollY": 500,
										"responsive": true,
										"language": {
											"lengthMenu": "Mostrando _MENU_ registros por p&aacute;gina",
											"zeroRecords": "Sin Resultados",
											"info": "Monstrando p&aacute;gina _PAGE_ de _PAGES_ , total de registros: _MAX_",
											"infoEmpty": "Sin Resultados",
											"infoFiltered": "(Mostrando  _MAX_ del total de registros)",
											"search": "Busqueda: ",
											"paginate": {
												"first": "Primera",
												"last": "Ultima",
												"next": "Siguiente",
												"previous": "Anterior"
											}
										}
									});
								}
								else {
									// Ha ocurrido un error y debe mostrarse
									var msg = "Sorry but there was an error: ";
									mensajesalerta("Informaci&oacute;n", msg + xhr.status + " " + xhr.statusText, "error", "dark");
								}

								// Cierra la capa de espera
								setTimeout(function() { jsRemoveWindowLoad(); }, 100);
							});
						}

						// Función que rellena los combos de Ubicación Primaria
						function obtenerListaUbicacionPrimaria() {
							var Id_Area = $("#idareasesion").val();
							var resultado = new Array();
							data = { Estatus_Reg: "1", Id_Area:Id_Area, accion: "consultar" };
							resultado = cargo_cmb("../fachadas/activos/siga_cat_ubic_prim/Siga_cat_ubic_primFacade.Class.php", false, data);

							if(resultado.totalCount>0){
								$('#cmbubicacionprim_filtro').append($('<option>', { value: "-1" }).text("--Ubicación Primaria--"));
								for(var i = 0; i < resultado.totalCount; i++){
									$('#cmbubicacionprim_filtro').append($('<option>', { value: resultado.data[i].Id_Ubic_Prim }).text(resultado.data[i].Desc_Ubic_Prim));
								}
							}
							else{
								$('#cmbubicacionprim_filtro').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
							}
						}
						// Función que le agrega funcionalidad al combo de Ubicación Primaria al cambiar de valor seleccionado
						function cambioUbicacionPrimaria2(objetoSelect) {
							var elementoDependiente = $(objetoSelect).data("combo-ubicacion-secundaria");
							$('#' + elementoDependiente).children('option').remove();

							if($(objetoSelect).val() != "-1"){
								// Actualiza el combo dependiente de la Ubicación Primaria
								var Id_Ubic_Prim = $(objetoSelect).val();
								var resultado = new Array();
								var data = { Estatus_Reg: "1", Id_Ubic_Prim: Id_Ubic_Prim, accion: "consultar" };
								resultado = cargo_cmb("../fachadas/activos/siga_cat_ubic_sec/Siga_cat_ubic_secFacade.Class.php", false, data);
								//console.log(resultado);

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
						

						$(function() {
							// Acciones al cargarse la página
							obtenerListaActivosArea();
							obtenerUsuariosActivos();
							obtenerListaUbicacionPrimaria();
							obtenerPropiedad();
						});
					</script>
				</div>
				<!-- ==== Area de carga del lista de Activos/Modificación de los mismos ==== -->
				<form name="formaReasignacion">
					<div style="padding: 0em 2em; display: none;">
						<input type="text" id="IdActivoReasignar" name="IdActivoReasignar" style="width: 100%;" readonly="readonly" placeholder="Lista de activos seleccionados" />
						<textarea name="jsonListaActivosReasignar" id="jsonListaActivosReasignar" readonly="readonly" style="width: 100%; height: 100px;" placeholder="Cadena json para generar el DataTable de Activos seleccionados"></textarea>
					</div>
					<div class="row">
						<div class="col-md-12" id="listaActivosReasignacion">
							<div class="text-center"><h4>Seleccione los criterios para encontrar los Activos que desea reasignar</h4></div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>


	<!-- ==== Formularios de Edición de Activos ==== -->
	<?php include("include_alta_activo.php") ?>
	<?php include("include_reubicacion_activo.php") ?>
	<?php include("include_baja_activo.php") ?>
	<div id="area-activo-accesorio-consumible-lista-modal"></div>

	<div id="divLineaRecta"></div>
	<div id="divReporteLineaRecta"></div>
    
	<!-- ==== Fiscal ==== -->
  	<div id="divFiscal"></div>
	<div id="divReporteFiscal"></div>

	<!-- === ==== -->
	<div id="divFiscalD4"></div>
	<div id="divReporteFiscalD4"></div>

	<!-- ==== File Input ==== -->
	<script src="../plugins/fileinput/fileinput.js"></script>
	<script src="../plugins/fileinput/fileinput_locale_es.js"></script>
	<script src="../plugins/fileinput/fileInputFuncionesGenericas.js"></script>

	<!-- FastClick -->
	<script src="../plugins/fastclick/fastclick.js"></script>
	<!-- AdminLTE App Nota: Esta libreria comentada genera conflicto con el template es por eso que se comento-->
	<!--<script src="../dist/js/app.min.js"></script>-->
	<!-- SlimScroll 1.3.0 -->
	<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
	<!-- === AdminLTE for demo purposes ==== -->
	<script src="../dist/js/demo.js"></script>
	<script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
	<script src="../js/Funciones.js"></script>

	<!-- ==== Plugin de DataTables ==== -->
	<script src="DataTables1.10.0/media/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/rowreorder/1.2.5/js/dataTables.rowReorder.min.js"></script>
	<script type="text/javascript" src="../plugins/datatables/dataTables.buttons.min.js"></script>
	<script type="text/javascript" src="../plugins/datatables/jszip.min.js"></script>
	<script type="text/javascript" src="../plugins/datatables/buttons.html5.min.js"></script>

	<!--
	<script src="DataTables1.10.0/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
	<link href="DataTables1.10.0/extensions/TableTools/css/dataTables.tableTools.min.css" rel="stylesheet" type="text/css" />
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>	
	<script src="DataTables1.10.0/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
	<link href="DataTables1.10.0/extensions/TableTools/css/dataTables.tableTools.min.css" rel="stylesheet" type="text/css" />
	-->
	<script type="text/javascript" src="../dist/js/jquery.qrcode.js"></script>
	<script type="text/javascript" src="../dist/js/qrcode.js"></script>

	<!--<script src="../js/jquery-ui.min.js"></script>-->
	<script type="text/javascript" src="../multiselect/bootstrap-multiselect.js"></script>
	<script type="text/javascript">
		if($("#hddperfil").val()=="68") {
			$("#div_btn_reub_activo").hide();
			$("#tabreubicacion_activo").hide();
		}

		Img_Activo();
		
		/*function Img_Activo(){
				var Adjuntos="";
				Adjuntos='	<label for="documentos_adjuntos_FILE" class="control-label" id="documentos_adjuntos_FILELabel" style="font-size: 11px;">Imagen (240x160px)</label>	';					  
				Adjuntos+='	<input id="documentos_adjuntos_FILE" name="imagenes[]" type="file" multiple="multiple" class="file-loading">';
				Adjuntos+='	<input type="hidden" id="Url_Foto_Activo">';

				$("#divFoto").html(Adjuntos);
				fileuploaded("documentos_adjuntos_FILE", "Url_Foto_Activo","../Archivos/Archivos-Activos",true,false);
		}*/

		function Img_Activo(){
			var Adjuntos="";
			Adjuntos = '<label for="attach-1" class="control-label" id="documentos_adjuntos_FILELabel" style="font-size: 11px;">Imagen (240x160px)</label>';
			Adjuntos += '<input id="documentos_adjuntos_FILE" name="imagenes[]" type="file" multiple="multiple" class="file-loading">';
			Adjuntos += '<input type="hidden" id="Url_Foto_Activo">';
			$("#divFoto").html(Adjuntos);
			$("#divFoto_lista").html("");
			carga_arch_multiples("documentos_adjuntos_FILE", "divFoto", "divFoto_lista","Url_Foto_Activo","../Archivos/Archivos-Activos",false,true,"", "Imagen (240x160px)");
		}

		var Ruta_Archivos_Proveedores="../Archivos/Archivos-Activos-Proveedores";
		var Ruta_Archivos_Contabilidad="../Archivos/Archivos-Activos-Contabilidad";
		$(".upload-files").fileinput({
			browseClass: "btn chs",
			language: 'es',
			allowedFileExtensions : ['jpg','png','xml'],
		});

		$(".upload-simple").fileinput({
			browseClass: "btn chs",
			language: 'es',
		});

		//Subir Imagenes al servidor 
		fileuploaded("documentos_adjuntos_FILE2", "Url_Foto_Activo2","../Archivos/Archivos-Activos",true,false);
		fileuploaded("documentos_adjuntos_FILE3", "Url_Foto_Activo3","../Archivos/Archivos-Activos",true,false); 
  
		//PROVEEDORES
		Proveedor_adjuntos_contrato();
		function Proveedor_adjuntos_contrato(){
			var Adjuntos="";
			Adjuntos='<label for="attach-1" class="control-label" id="documentos_adjuntos_FILELabel" style="font-size: 11px;">1.-Adjuntar Contrato</label>';			  
			Adjuntos+='<input id="documentos_adjuntos_contrato" name="imagenes[]" type="file" multiple="multiple" class="file-loading">';
			Adjuntos+='<input type="hidden" id="url_contrato">';
			
			$("#divProveedor_Adjuntar_Contrato").html(Adjuntos);
			$("#divProveedor_Adjuntar_Contrato_lista").html("");
			carga_arch_multiples("documentos_adjuntos_contrato", "divProveedor_Adjuntar_Contrato", "divProveedor_Adjuntar_Contrato_lista","url_contrato",Ruta_Archivos_Proveedores,false,true,"", "1.-Adjuntar Contrato");
		}
		//fileuploaded("documentos_adjuntos_contrato", "url_contrato",Ruta_Archivos_Proveedores,true,false);
		Proveedor_adjuntos_otro_doc_corto();
		function Proveedor_adjuntos_otro_doc_corto(){
			var Adjuntos="";
			Adjuntos='<label for="attach-1" class="control-label" style="font-size: 11px;">2.-Otro documento corto</label>';			  
			Adjuntos+='<input id="documentos_adjuntos_corto" name="imagenes[]" type="file" multiple="multiple" class="file-loading">';
			Adjuntos+='<input type="hidden" id="url_corto">';
		
			$("#divOtro_Doc_Corto").html(Adjuntos);
			$("#divOtro_Doc_Corto_lista").html("");
			carga_arch_multiples("documentos_adjuntos_corto", "divOtro_Doc_Corto", "divOtro_Doc_Corto_lista","url_corto",Ruta_Archivos_Proveedores,false,true,"", "2.-Otro documento corto");
		}
		//fileuploaded("documentos_adjuntos_corto", "url_corto",Ruta_Archivos_Proveedores,true,false); 
		Proveedor_Factura_0();
		function Proveedor_Factura_0(){
			var Adjuntos="";
			Adjuntos='<label for="attach-1" class="control-label" style="font-size: 11px;">3.-Factura</label>';			  
			Adjuntos+='<input id="documentos_adjuntos_factura0" name="imagenes[]" type="file" multiple="multiple" class="file-loading">';
			Adjuntos+='<input type="hidden" id="url_factura0">';
		
			$("#divFactura_0").html(Adjuntos);
			$("#divFactura_0_lista").html("");
			carga_arch_multiples("documentos_adjuntos_factura0","divFactura_0","divFactura_0_lista","url_factura0",Ruta_Archivos_Proveedores,false,true,"pdf", "3.-Factura");
		}
		//fileuploaded("documentos_adjuntos_factura0", "url_factura0",Ruta_Archivos_Proveedores,true,false);
		Proveedor_Xml();
		function Proveedor_Xml(){
				var Adjuntos="";
				Adjuntos='<label for="attach-1" class="control-label" style="font-size: 11px;">4.-XML</label>';			  
				Adjuntos+='<input id="documentos_adjuntos_xml" name="imagenes[]" type="file" multiple="multiple" class="file-loading">';
				Adjuntos+='<input type="hidden" id="url_xml">';
			
				$("#divXml").html(Adjuntos);
				$("#divXml_lista").html("");
				carga_arch_multiples("documentos_adjuntos_xml","divXml", "divXml_lista","url_xml",Ruta_Archivos_Proveedores,false,true,"xml", "4.-XML");
		}
		//fileuploaded("documentos_adjuntos_xml", "url_xml",Ruta_Archivos_Proveedores,true,false);
		//CONTABILIDAD
		Contabilidad_Factura();
		function Contabilidad_Factura(){
			var Adjuntos="";
			Adjuntos='<label for="attach-1" class="control-label" style="font-size: 11px;">Factura</label>';			  
			Adjuntos+='<input id="documentos_adjuntos_factura" name="imagenes[]" type="file" multiple="multiple" class="file-loading">';
			Adjuntos+='<input type="hidden" id="url_factura">';
		
			$("#divContabilidad_Adjuntar_Factura").html(Adjuntos);
			$("#divContabilidad_Adjuntar_Factura_lista").html("");
			carga_arch_multiples("documentos_adjuntos_factura", "divContabilidad_Adjuntar_Factura","divContabilidad_Adjuntar_Factura_lista","url_factura",Ruta_Archivos_Contabilidad,false,true,"pdf", "Factura");
		}
		//fileuploaded("documentos_adjuntos_factura", "url_factura","../Archivos/Archivos-Activos-Contabilidad",true,true); 
		Contabilidad_Xml();
		function Contabilidad_Xml(){
			var Adjuntos="";
			Adjuntos='<label for="attach-1" class="control-label" style="font-size: 11px;">XML</label>';			  
			Adjuntos+='<input id="xml_contabilidad" name="imagenes[]" type="file" multiple="multiple" class="file-loading">';
			Adjuntos+='<input type="hidden" id="url_xml_contabilidad">';
		
			$("#divContabilidad_Adjuntar_Xml").html(Adjuntos);
			$("#divContabilidad_Adjuntar_Xml_lista").html("");
			carga_arch_multiples("xml_contabilidad", "divContabilidad_Adjuntar_Xml","divContabilidad_Adjuntar_Xml_lista","url_xml_contabilidad",Ruta_Archivos_Contabilidad,false,true,"xml", "XML");
		}
		//fileuploaded("xml_contabilidad", "url_xml_contabilidad","../Archivos/Archivos-Activos-Contabilidad",true,true); 
		
		$(".fileinput-remove").hide();
		$('#fecha_inicio_depr').datepicker({ 
			format: 'dd/mm/yyyy',
			autoclose: true,
		});
		
		$('#FechaFactura').datepicker({ 
			format: 'dd/mm/yyyy',
			autoclose: true,
		}).datepicker();
		
		$('#Fecha_Vencimiento').datepicker({ 
			format: 'dd/mm/yyyy',
			autoclose: true,
		}).datepicker();
		
		$('#Fecha_baja').datepicker({ 
			format: 'dd/mm/yyyy',
			autoclose: true,
		}).datepicker();

		$('#FechaFiscal').datepicker({ 
			format: 'dd/mm/yyyy',
			autoclose: true,
		}).datepicker();  

		$(document).ready(function(){
			//filtro_inventario_afbc();
			/*
			filtro_inventario_clasificacion();
			filtro_inventario_marca();
			filtro_inventario_propiedad();
			filtro_inventario_usr_respons();
			filtro_inventario_ubic_prim();
			filtro_inventario_ubic_sec();
			*/
			
			ubic_prim(); 
			familia();
			clase();
			centro_costos_contabilidad();
			centro_costos_reubicacion();

			$("#importeseguros").inputmask({ 
				'alias': 'numeric',
				'groupSeparator': ',',
				'autoGroup': true,
				'digits': 2,
				'radixPoint': ".",
				'digitsOptional': false,
				'allowMinus': false
				//'placeholder': '0.00'
			});

			$("#Monto_Factura").inputmask({ 
				'alias': 'numeric',
				'groupSeparator': ',',
				'autoGroup': true,
				'digits': 2,
				'radixPoint': ".",
				'digitsOptional': false,
				'allowMinus': false
				//'placeholder': '0.00'
			});

			$("#MontoFactura_s_iva").inputmask({ 
				'alias': 'numeric',
				'groupSeparator': ',',
				'autoGroup': true,
				'digits': 2,
				'radixPoint': ".",
				'digitsOptional': false,
				'allowMinus': false
				//'placeholder': '0.00'
			});

			function obtenerfechaactual(){
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
				var Fech_Actual=""; 
				Fech_Actual=dd+'/'+mm+'/'+yyyy;
				
				return Fech_Actual;
			}
	
			$('input').each(function (i, e) {
				var label;
				switch ($(e).attr('id')) {
				case 'AF_BC':
					label = 'AF/BC';
					break;
				case 'Nombre':
					label = 'Nombre del Activo';
					break;
				case 'DescCorta':
					label = 'Descripción Corta';
					break;	
				case 'DescLarga':
					label = 'Descripción Larga';
					break;
				case 'Marca':
					label = 'Marca';
					break;
				case 'modelo':
					label = 'Modelo';
					break;
				case 'numserie':
					label = 'Número de Serie';
					break;
				case 'numactivoanterior':
					label = 'Número de activo anterior';
					break;
				case 'importeseguros':
					label = 'Importe Seguros';
					break;
				case 'numempleadoresguardo':
					label = 'Número de Empleado Resguardo';
					break;
				case 'nombreempleadoresguardo':
					label = 'Nombre de empleado resguardo';
					break;
				case 'garantia':
					label = 'Garantía';
					break;
				case 'extension':
					label = 'Extensión de garantía';
					break;	
				case 'especifica':
					label = 'Ubicacion Especifica';
					break;
				case 'activopadre':
					label = 'Activo Padre';
					break;
				case 'numusuarioalta':
					label = 'Usuario solicitante';
					break;
				case 'nombreusuarioalta':
					label = 'Nombre usuario alta';
					break;
			}
	
			var fieldname = $(e).attr('id')+'Label';
			$("#"+fieldname).text(label);
			//$(e).tooltip({ 'trigger': 'hover', 'title': label });
		});
	
		$('select').each(function (i, e) {
			var label;
			switch ($(e).attr('id')) {
			case 'cmbubicacionprim':
				label = 'Ubicación Primaria';
				break;
			case 'cmbubicacionsec':
				label = 'Ubicación Secundaria';
				break;
			case 'cmbestatus':
				label = 'Estatus';
				break;
			case 'cmbareas':
				label = 'Área Gestora';
				break;
			case 'cmbclasificacion':
				label = 'Clase / Clasificación';
				break;
			case 'cmbpropiedad':
				label = 'Propiedad';
				break;
			case 'cmbmotivo':
				label = 'Motivo Alta';
				break;
			case 'cmbfamilia':
				label = 'Familia';
				break;
			case 'cmbsubfamilia':
				label = 'Subfamilia';
				break;
			case 'cmbtipoactivo':
				label = 'Tipo de Activo';
				break;
			case 'cmbPRE':
				label = 'Participa en PRE';
				break;
			case 'cmbcertificacion':
				label = 'Participa en Certificacion';
				break;
				case 'cmbseguros':
				label = 'Participa en Seguros';
				break;
				case 'cmbtipovaleresguardo':
				label = 'Tipo de vale de resguardo';
				break;
		}
		var fieldname = $(e).attr('id')+'Label';
		$("#"+fieldname).text(label);
		//$(e).tooltip({ 'trigger': 'hover', 'title': label });
	});
	


	// Funciones que generar loos combobox de búsqueda sobre los datatables
	/*
	function filtro_inventario_afbc() {
		var Id_Area=$("#idareasesion").val();
		var resultado=new Array();
		data={Id_Area:Id_Area, Seccion:"Activos",  accion: "filtro_afbc"};
		resultado=cargo_cmb("../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",false, data);
		if(resultado.totalCount>0){
			for(var i = 0; i < resultado.totalCount; i++){
				$('#Filtro_AFBC_Activos').append($('<option>', { value: resultado.data[i].AF_BC }).text(resultado.data[i].AF_BC));
			}
		}
		$('#Filtro_AFBC_Activos').multiselect();
	}
	$("#Filtro_AFBC_Activos_input").click(function() {
		$("#Filtro_Clasific_Activos_itemList").removeClass("active");
		$("#Filtro_Marca_Activos_itemList").removeClass("active");
		$("#Filtro_Propiedad_Activos_itemList").removeClass("active");
		$("#Filtro_Usr_Responsable_Activos_itemList").removeClass("active");
		$("#Filtro_UPrimaria_Activos_itemList").removeClass("active");
		$("#Filtro_USecundaria_Activos_itemList").removeClass("active");
	});
	
	// Genera el combo de
	function filtro_inventario_clasificacion() {
		var Id_Area=$("#idareasesion").val();
		var resultado = new Array();
		data={Id_Area:Id_Area, Seccion:"Activos",  accion: "filtro_clasificacion"};
		resultado=cargo_cmb("../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",false, data);
		if(resultado.totalCount>0){
			for(var i = 0; i < resultado.totalCount; i++){
				$('#Filtro_Clasific_Activos').append($('<option>', { value: resultado.data[i].Desc_Clasificacion }).text(resultado.data[i].Desc_Clasificacion));
			}
		}
		
		$('#Filtro_Clasific_Activos').multiselect({
			enableFiltering: false,//Buscador
			includeSelectAllOption: true,
			selectAllJustVisible: false,
			numberDisplayed: -1,
			maxHeight: 400,
			onChange: function(element, checked, select) {
				var options = ''; 
				$('#Filtro_Clasific_Activos option:selected').each(function() {
					options += "'"+$(this).val() + "', ";
				});
					
				$("#hdd_filt_clasif_activos").val(options.substr(0, options.length - 2));
				$('#tablaactivos').DataTable().ajax.reload();
			},
			onSelectAll: function() {
				var options = ''; 
				$('#Filtro_Clasific_Activos option:selected').each(function() {
					options += '"'+$(this).val() + '", ';
				});
				$("#hdd_filt_clasif_activos").val(options.substr(0, options.length - 2));
				$('#tablaactivos').DataTable().ajax.reload();
			},
			onDeselectAll: function() {
				$("#hdd_filt_clasif_activos").val("");
				$('#tablaactivos').DataTable().ajax.reload();
			}
		});
	}
	
	function filtro_inventario_marca() {
		var Id_Area=$("#idareasesion").val();
		var resultado=new Array();
		data={Id_Area:Id_Area, Seccion:"Activos",  accion: "filtro_marca"};
		resultado=cargo_cmb("../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",false, data);
		if(resultado.totalCount>0){
			for(var i = 0; i < resultado.totalCount; i++){
				$('#Filtro_Marca_Activos').append($('<option>', { value: resultado.data[i].Marca }).text(resultado.data[i].Marca));
			}
		}
		$('#Filtro_Marca_Activos').multiselect({
			enableFiltering: false,//Buscador
			includeSelectAllOption: true,
			selectAllJustVisible: false,
			numberDisplayed: -1,
			maxHeight: 400,
			onChange: function(element, checked, select) {
				var options = '';
				$('#Filtro_Marca_Activos option:selected').each(function() {
					options += "'"+$(this).val() + "', ";
				});
				$("#hdd_filt_marca_activos").val(options.substr(0, options.length - 2));
				$('#tablaactivos').DataTable().ajax.reload();
			},
			onSelectAll: function() {
				var options = '';
				$('#Filtro_Marca_Activos option:selected').each(function() {
					options += '"'+$(this).val() + '", ';
				});
				$("#hdd_filt_marca_activos").val(options.substr(0, options.length - 2));
				$('#tablaactivos').DataTable().ajax.reload();
			},
			onDeselectAll: function() {
				$("#hdd_filt_marca_activos").val("");
				$('#tablaactivos').DataTable().ajax.reload();
			}
		});
	}
	
	function filtro_inventario_propiedad() {
		var Id_Area=$("#idareasesion").val();
		var resultado=new Array();
		data={Id_Area:Id_Area, Seccion:"Activos",  accion: "filtro_propiedad"};
		resultado=cargo_cmb("../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",false, data);
		if(resultado.totalCount>0){
			for(var i = 0; i < resultado.totalCount; i++){
				$('#Filtro_Propiedad_Activos').append($('<option>', { value: resultado.data[i].Id_Propiedad }).text(resultado.data[i].Desc_Propiedad));
			}
		}
		$('#Filtro_Propiedad_Activos').multiselect({
			enableFiltering: false,//Buscador
			includeSelectAllOption: true,
			selectAllJustVisible: false,
			numberDisplayed: -1,
			maxHeight: 400,
			onChange: function(element, checked, select) {
				var options = '';
					$('#Filtro_Propiedad_Activos option:selected').each(function() {
					options += $(this).val() + ', ';
				});
				$("#hdd_filt_propiedad_activos").val(options.substr(0, options.length - 2));
				$('#tablaactivos').DataTable().ajax.reload();
			},
			onSelectAll: function() {
				var options = '';
				$('#Filtro_Propiedad_Activos option:selected').each(function() {
					options += $(this).val() + ', ';
				});
				$("#hdd_filt_propiedad_activos").val(options.substr(0, options.length - 2));
				$('#tablaactivos').DataTable().ajax.reload();
			},
			onDeselectAll: function() {
				$("#hdd_filt_propiedad_activos").val("");
				$('#tablaactivos').DataTable().ajax.reload();
			}
		});
	}
	
	function filtro_inventario_usr_respons() {
		var Id_Area=$("#idareasesion").val();
		var resultado=new Array();
		data={Id_Area:Id_Area, Seccion:"Activos",  accion: "filtro_usr_responsable"};
		resultado=cargo_cmb("../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",false, data);
		if(resultado.totalCount>0){
			for(var i = 0; i < resultado.totalCount; i++){
				$('#Filtro_Usr_Responsable_Activos').append($('<option>', { value: resultado.data[i].num_empleado }).text(resultado.data[i].nombre_completo));
			}
		}
		$('#Filtro_Usr_Responsable_Activos').multiselect({
			enableFiltering: false,//Buscador
			includeSelectAllOption: true,
			selectAllJustVisible: false,
			numberDisplayed: -1,
			maxHeight: 400,
			onChange: function(element, checked, select) {
				var options = ''; 
				$('#Filtro_Usr_Responsable_Activos option:selected').each(function() {
					options += $(this).val() + ', ';
				});
				$("#hdd_filt_resp_activos").val(options.substr(0, options.length - 2));
				$('#tablaactivos').DataTable().ajax.reload();
			},
			onSelectAll: function() {
				var options = ''; 
				$('#Filtro_Usr_Responsable_Activos option:selected').each(function() {
					options += $(this).val() + ', ';
				});
				$("#hdd_filt_resp_activos").val(options.substr(0, options.length - 2));
				$('#tablaactivos').DataTable().ajax.reload();
			},
			onDeselectAll: function() {
				$("#hdd_filt_resp_activos").val("");
				$('#tablaactivos').DataTable().ajax.reload();
			}
		});
	}
	
	function filtro_inventario_ubic_prim() {
		var Id_Area=$("#idareasesion").val();
		var resultado=new Array();
		data={Id_Area:Id_Area, Seccion:"Activos",  accion: "filtro_ubic_prim"};
		resultado=cargo_cmb("../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",false, data);
		if(resultado.totalCount>0){
			for(var i = 0; i < resultado.totalCount; i++){
				$('#Filtro_UPrimaria_Activos').append($('<option>', { value: resultado.data[i].Id_Ubic_Prim }).text(resultado.data[i].Desc_Ubic_Prim));
			}
		}
		$('#Filtro_UPrimaria_Activos').multiselect({
			enableFiltering: false,//Buscador
			includeSelectAllOption: true,
			selectAllJustVisible: false,
			numberDisplayed: -1,
			maxHeight: 400,
			//buttonContainer: '<div class="btn-group w-100" />',
			//buttonClass: 'btn chs',
			onChange: function(element, checked, select) {
				var options = ''; var options_turno = '';
				$('#Filtro_UPrimaria_Activos option:selected').each(function() {
					options += $(this).val() + ', ';
					
				});
				$("#hdd_filt_uprim_activos").val(options.substr(0, options.length - 2));
				$('#tablaactivos').DataTable().ajax.reload();
			},
			onSelectAll: function() {
				var options = ''; var options_turno = '';
				$('#Filtro_UPrimaria_Activos option:selected').each(function() {
					options += $(this).val() + ', ';
					
				});
				$("#hdd_filt_uprim_activos").val(options.substr(0, options.length - 2));
				$('#tablaactivos').DataTable().ajax.reload();
			},
			onDeselectAll: function() {
				$("#hdd_filt_uprim_activos").val("");
				$('#tablaactivos').DataTable().ajax.reload();
			}
		});
	}
	
	function filtro_inventario_ubic_sec() {
		var Id_Area=$("#idareasesion").val();
		var resultado=new Array();
		data = {Id_Area:Id_Area, Seccion:"Activos",  accion: "filtro_ubic_sec"};
		resultado = cargo_cmb("../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",false, data);
		if(resultado.totalCount>0){
			for(var i = 0; i < resultado.totalCount; i++){
				$('#Filtro_USecundaria_Activos').append($('<option>', { value: resultado.data[i].Desc_Ubic_Sec }).text(resultado.data[i].Desc_Ubic_Sec));
			}
		}
		
		$('#Filtro_USecundaria_Activos').multiselect({
			enableFiltering: false,//Buscador
			includeSelectAllOption: true,
			selectAllJustVisible: false,
			numberDisplayed: -1,
			maxHeight: 400,
			//buttonContainer: '<div class="btn-group w-100" />',
			onChange: function(element, checked, select) {
				var options = '';
				$('#Filtro_USecundaria_Activos option:selected').each(function() {
					options += "'"+$(this).val() + "', ";
				});
				$("#hdd_filt_usec_activos").val(options.substr(0, options.length - 2));
				$('#tablaactivos').DataTable().ajax.reload();
			},
			onSelectAll: function() {
				var options = '';
				$('#Filtro_USecundaria_Activos option:selected').each(function() {
					options += '"'+$(this).val() + '", ';
				});
				$("#hdd_filt_usec_activos").val(options.substr(0, options.length - 2));
				$('#tablaactivos').DataTable().ajax.reload();
			},
			onDeselectAll: function() {
				$("#hdd_filt_usec_activos").val("");
				$('#tablaactivos').DataTable().ajax.reload();
			}
		});
	}
	*/



	// Función que generar los filtros de manera dinámica a partir de los Activos
	var lstFiltrosTablaActivos = [];
	var lstFiltrosTablaBajas = [];
	var lstFiltrosTablaReubicacion = [];
	var aplicarReloadFiltro = false;
	function filtro_multiselect_generico(elementoSelect = null) {
		// Identificador de la Tabla
		var IdTabla = $(elementoSelect).data("id-tabla");
		// Obtiene el Area en la cual se encuentra el Usuario
		var Id_Area = $("#idareasesion").val();
		// Identificador del campo Select
		var Id_Select_Filtro = "#" + $(elementoSelect).data("id-select-filtro");
		// Campo oculto que recibe las options seleccionadas en el campo Select
		var Campo_Receptor = "#" + $(elementoSelect).data("campo-receptor");
		// Nombre del campo a filtrar
		var NombreCampo = $(elementoSelect).data("nombre-campo");

		// Consulta especifica para generar el control
		var resultado = new Array();
		// Genera la variables que serán utilizadas para generar el control
		var Seccion;
		var SeccionFiltro;
		// Recupera los filtros jerarquicos que han sido agregados antes que el campo actual
		var lstFiltrosXActualizar;
		switch(IdTabla) {
			case "tablaactivos":
				lstFiltrosXActualizar = lstFiltrosTablaActivos;
				Seccion = "Activos";
				SeccionFiltro = "Activos";
				break;

			case "tablebajas":
				lstFiltrosXActualizar = lstFiltrosTablaBajas;
				Seccion = $("#Estatus_baja").val() == 0 ? "BajaProceso" : "BajaDefinitiva";
				SeccionFiltro = "Baja";
				break;

			case "tablereubicacion":
				lstFiltrosXActualizar = lstFiltrosTablaReubicacion;
				Seccion = "Reubicacion";
				SeccionFiltro = "Reubicacion";
				break;
		}

		var parametrosJson = { Id_Area: Id_Area, Seccion: Seccion, NombreCampo: NombreCampo, accion: "filtro_generico" };
		//console.log("-->>" + IdTabla);
		for(var i = 0; i < lstFiltrosXActualizar.length; i++) {
			var optionSeleccionadas = $(lstFiltrosXActualizar[i] + " option:selected").map(function(i, el) { return $(el).val(); }).get();
			switch(lstFiltrosXActualizar[i]) {
				// Filtro de Nombre
				case "#Filtro_Nombre_" + SeccionFiltro:
					parametrosJson.FiltroSuperior_Nombre = optionSeleccionadas.join(",");
					break;
				// Filtro de AF/BC
				case "#Filtro_AFBC_" + SeccionFiltro:
					parametrosJson.FiltroSuperior_AFBC = optionSeleccionadas.join(",");
					break;
				// Filtro de Clasificación
				case "#Filtro_Clasific_" + SeccionFiltro:
					parametrosJson.FiltroSuperior_Clasificacion = optionSeleccionadas.join(",");
					break;
				// Filtro de Marca
				case "#Filtro_Marca_" + SeccionFiltro:
					parametrosJson.FiltroSuperior_Marca = optionSeleccionadas.join(",");
					break;
				// Filtro de Modelo
				case "#Filtro_Modelo_" + SeccionFiltro:
					parametrosJson.FiltroSuperior_Modelo = optionSeleccionadas.join(",");
					break;
				// Filtro de Numero de Serie
				case "#Filtro_NumSerie_" + SeccionFiltro:
					parametrosJson.FiltroSuperior_NumSerie = optionSeleccionadas.join(",");
					break;
				// Filtro de Propiedad
				case "#Filtro_Propiedad_" + SeccionFiltro:
					parametrosJson.FiltroSuperior_Propiedad = optionSeleccionadas.join(",");
					break;
				// Filtro de Usuario Responsable
				case "#Filtro_Usr_Responsable_" + SeccionFiltro:
					parametrosJson.FiltroSuperior_UsuarioResponsable = optionSeleccionadas.join(",");
					break;
				// Filtro de Ubicación Primaria
				case "#Filtro_UPrimaria_" + SeccionFiltro:
					parametrosJson.FiltroSuperior_UbicacionPrimaria = optionSeleccionadas.join(",");
					break;
				// Filtro de Ubicación Secundaria
				case "#Filtro_USecundaria_" + SeccionFiltro:
					parametrosJson.FiltroSuperior_UbicacionSecundaria = optionSeleccionadas.join(",");
					break;
				// Filtro de Monto Activo
				case "#Filtro_MontoFactura_" + SeccionFiltro:
					parametrosJson.FiltroSuperior_Monto_Factura = optionSeleccionadas.join(",");
					break;
				// Filtro de Importe Seguros
				case "#Filtro_ImporteSeguro_" + SeccionFiltro:
					parametrosJson.FiltroSuperior_ImporteSeguros = optionSeleccionadas.join(",");
					break;
				// Filtro de Estatus
				case "#Filtro_Estatus_" + SeccionFiltro:
					parametrosJson.FiltroSuperior_Estatus = optionSeleccionadas.join(",");
					break;
				// Filtro de Clase
				case "#Filtro_TipoActivo_" + SeccionFiltro:
					parametrosJson.FiltroSuperior_Clase = optionSeleccionadas.join(",");
					break;
				// Filtro por Motivo de Baja
				case "#Filtro_Motivo_" + SeccionFiltro:
					parametrosJson.FiltroSuperior_MotivoBaja = optionSeleccionadas.join(",");
					break;
				// Filtro por Fecha de Alta
				case "#Filtro_FechaAlta_" + SeccionFiltro:
					parametrosJson.FiltroSuperior_FechaAlta = optionSeleccionadas.join(",");
					break;
				// Filtro por Descripción
				case "#Filtro_DescCorta_" + SeccionFiltro:
					parametrosJson.FiltroSuperior_Descripcion = optionSeleccionadas.join(",");
					break;
				// Filtro de Ubicación Primaria Origen
				case "#Filtro_UPrimariaProc_" + SeccionFiltro:
					parametrosJson.FiltroSuperior_UbicacionPrimariaOrigen = optionSeleccionadas.join(",");
					break;
				// Filtro de Ubicación Secundaria Origen
				case "#Filtro_USecundariaProc_" + SeccionFiltro:
					parametrosJson.FiltroSuperior_UbicacionSecundariaOrigen = optionSeleccionadas.join(",");
					break;
				// Filtro de Fecha de Baja aceptada por el Usuario inicial (PASO 1)
				case "#Filtro_Fecha_Baja_Usr_Solicitante_" + SeccionFiltro:
					parametrosJson.FiltroSuperior_Baja_Usr_Solicitante = optionSeleccionadas.join(",");
					break;
				// Filtro de Fecha de Baja aceptada por la Dirección Financiera (PASO 4)
				case "#Filtro_Fecha_Baja_Usr_DirFinanciera_" + SeccionFiltro:
					parametrosJson.FiltroSuperior_Baja_Usr_DirFinanciera = optionSeleccionadas.join(",");
					break;
				// Filtro de Fecha de Baja aceptada por la Contabilidad (PASO 5)
				case "#Filtro_Fecha_Baja_Usr_Contabilidad_" + SeccionFiltro:
					parametrosJson.FiltroSuperior_Baja_Usr_Contabilidad = optionSeleccionadas.join(",");
					break;
				// Filtro de Paso en el que se encuentra el Workflow
				case "#Filtro_EstatusWorkflow_" + SeccionFiltro:
					parametrosJson.FiltroSuperior_EstatusWorkflow_Baja = optionSeleccionadas.join(",");
					break;
				// Filtro de Ubicacion Especifica
				case "#Filtro_UEspecifica_" + SeccionFiltro:
					parametrosJson.FiltroSuperior_UbicacionEspecifica = optionSeleccionadas.join(",");
					break;
			}
		}

		// Realiza la consulta para rellenar el control select
		$(Id_Select_Filtro).empty();
		resultado = cargo_cmb("../fachadas/activos/siga_activos/Siga_activosFacade.Class.php", false, parametrosJson);
		//console.log(parametrosJson);
		//console.log(resultado);
		if(resultado.totalCount > 0){
			// Rellena el control select con los datos encontrados
			for(var i = 0; i < resultado.totalCount; i++) {
				$(Id_Select_Filtro).append($('<option>', { value: resultado.data[i]["DespliegueValor"] }).text(resultado.data[i]["DespliegueTexto"]));
			}
		}

		// Identificador del control select que fue rellenado para darle funcionalidad multiselect
		$(Id_Select_Filtro).multiselect({
			enableFiltering: true,			// Aplica el buscador
			includeSelectAllOption: true,	// Agrega la opción de Select All
			selectAllJustVisible: false,	// Ajuste de la ventana
			numberDisplayed: -1,
			filterPlaceholder: 'Buscar',
			enableCaseInsensitiveFiltering: true,
			maxHeight: 400,					// Alto máximo del area donde se muestran las opciones del control select
			onChange: function(/*element, checked, select*/) {
				// https://stackoverflow.com/questions/3243476/how-to-get-multiple-select-box-values-using-jquery
				// Recupera la lista de opciones seleccionadas dentro del combo multiselect
				var optionSeleccionadas = $(Id_Select_Filtro + " option:selected").map(function(i, el) { return $(el).val(); }).get();
				// Asigna el valor ala variable que será enviada para la actualización del Datatable
				$(Campo_Receptor).val(optionSeleccionadas.length > 0 ? "'" + optionSeleccionadas.join("','") + "'" : "");
				// Actualiza la Tabla correspondiente con las opciones [des]seleccionadas
				$("#" + IdTabla).DataTable().ajax.reload();
				// Actualiza la lista de filtros
				actualizarListaFiltro(Id_Select_Filtro);
			},
			onSelectAll: function() {
				// https://stackoverflow.com/questions/3243476/how-to-get-multiple-select-box-values-using-jquery
				// Recupera la lista de opciones seleccionadas dentro del combo multiselect
				var optionSeleccionadas = $(Id_Select_Filtro + " option:selected").map(function(i, el) { return $(el).val(); }).get();
				// Asigna el valor ala variable que será enviada para la actualización del Datatable
				$(Campo_Receptor).val(optionSeleccionadas.length > 0 ? "'" + optionSeleccionadas.join("','") + "'" : "");
				// Actualiza la Tabla correspondiente con las opciones [des]seleccionadas
				$("#" + IdTabla).DataTable().ajax.reload();
				// Actualiza la lista de filtros
				actualizarListaFiltro(Id_Select_Filtro);
			},
			onDeselectAll: function() {
				// Elimina el filtro para actualizar el DataTable
				$(Campo_Receptor).val("");
				// Actualiza la tabla correspondiente con las opciones [des]seleccionadas
				$("#" + IdTabla).DataTable().ajax.reload();
				// Actualiza la lista de filtros
				actualizarListaFiltro(Id_Select_Filtro);
			}
		}).multiselect("rebuild");

		// A cada botón de busqueda, le aplica algunos estilos para adecuarlo a la ventana donde lo contiene
		$("#" + IdTabla + "_wrapper .multiselect-item div.input-group").css("padding", "0px 4px");
		$("#" + IdTabla + "_wrapper .multiselect-item div.input-group").css("width", "100%");
		$("#" + IdTabla + "_wrapper .multiselect-item div.input-group").addClass("input-group-sm");
	}


	// Función que actualiza la lista de filtros tipo Excel al momento de [des]marcar un checkbox que están dentro de la lista mostrada
	function actualizarListaFiltro(Id_Select_Filtro) {
		// Identificador de la Tabla
		var IdTabla = $(Id_Select_Filtro).data("id-tabla");
		// Determina que listado de filtros va a actualizar
		var lstFiltrosXActualizar;
		switch(IdTabla) {
			case "tablaactivos":
				lstFiltrosXActualizar = lstFiltrosTablaActivos;
				break;

			case "tablebajas":
				lstFiltrosXActualizar = lstFiltrosTablaBajas;
				break;

			case "tablereubicacion":
				lstFiltrosXActualizar = lstFiltrosTablaReubicacion;
				break;
		}

		// Apila los filtros para determinar una "jerarquía"
		var optionSeleccionadas = $(Id_Select_Filtro + " option:selected").map(function(i, el) { return $(el).val(); }).get();
		// Indica si debe actualizarse la lista de filtros
		var actualizarSelect =  false;
		if(optionSeleccionadas.length > 0) {
			// Agrega el filtro a la lista
			if(lstFiltrosXActualizar.indexOf(Id_Select_Filtro) < 0) {
				lstFiltrosXActualizar.push(Id_Select_Filtro);
				actualizarSelect = true;
			}
		}
		else {
			// Elimina el elemento de la lista
			lstFiltrosXActualizar.splice(lstFiltrosXActualizar.indexOf(Id_Select_Filtro), 1);
			actualizarSelect =  true;
		}

		// Vuelve a regenerar los combo select para actualizar los filtros tipo excel excepto los combos que se usan como flitros
		//console.log("-->Click en el checkbox y se actualizará los filtros en la tabla: " + IdTabla);
		var lstTh_Label_Filtro = new Array();
		for(var i = 0; i < lstFiltrosXActualizar.length; i++) {
			lstTh_Label_Filtro.push($("#" + IdTabla + " th[data-id-select-filtro='" + lstFiltrosXActualizar[i].replace("#", "") + "']").text());
			//lstTh_Label_Filtro.push(lstFiltrosXActualizar[i]);
		}
		$("#lstFiltros_" + IdTabla).html((lstTh_Label_Filtro.length > 0 ? "<div style='border-bottom: #F0F0F0 solid 1px; padding: 3px 0px; margin-bottom: 5px;'><b>Orden de filtros:</b> " : "") + lstTh_Label_Filtro.join(" | ") + (lstTh_Label_Filtro.length > 0 ? "</div> " : ""));

		setTimeout(function() {
			$("#" + IdTabla + " select.filtro-excel:not("+ lstFiltrosXActualizar.join(",") + ")").each(function() {
				//console.log("Actualizar: " + $(this).attr("id"));
				filtro_multiselect_generico(this);
			})
		}, 250);
	}




	
	
	//FIN FILTROS DE BUSQUEDA
	function ubic_prim() {
		var Id_Area=$("#idareasesion").val();
		var resultado=new Array();
		data={Estatus_Reg: "1", Id_Area:Id_Area, accion: "consultar"};
		resultado=cargo_cmb("../fachadas/activos/siga_cat_ubic_prim/Siga_cat_ubic_primFacade.Class.php",false, data);
		if(resultado.totalCount>0){
			$('#cmbubicacionprim').append($('<option>', { value: "-1" }).text("--Ubicación Primaria--"));
			for(var i = 0; i < resultado.totalCount; i++){
				$('#cmbubicacionprim').append($('<option>', { value: resultado.data[i].Id_Ubic_Prim }).text(resultado.data[i].Desc_Ubic_Prim));
			}
		}
		else{
			$('#cmbubicacionprim').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	$( "#cmbubicacionprim" ).change(function() {
		if($(this).val()!="-1"){
			ubic_sec($(this).val());
		}else{
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
		}
		else{
			$('#cmbubicacionsec').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	
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
		}
		else{
			$('#cmbfamilia').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	$( "#cmbfamilia" ).change(function() {
		if($(this).val()!="-1"){
			//alert($(this).val());
			if ($(this).val() == 25)  // Ajustes JGR 28/06/2018
			{
				$('#cmbseguros').val(1);
				$('#cmbcertificacion').val(1);
				$('#cmbPRE').val(1);
			}
			subfamilia($(this).val());
		}
		else{
			$('#cmbsubfamilia').children('option').remove();
			$('#cmbsubfamilia').append($('<option>', { value: "-1" }).text("--Subfamilia--"));
		}
	});
	
	function subfamilia(Id_Familia) {
		$('#cmbsubfamilia').children('option').remove();
		var resultado=new Array();
		data={Estatus_Reg: "1", Id_Familia:Id_Familia, accion: "consultar"};
		resultado=cargo_cmb("../fachadas/activos/siga_cat_subfamilia/Siga_cat_subfamiliaFacade.Class.php",false, data);
		if(resultado.totalCount>0){
			$('#cmbsubfamilia').append($('<option>', { value: "-1" }).text("--Subfamilia--"));
			for(var i = 0; i < resultado.totalCount; i++){
				$('#cmbsubfamilia').append($('<option>', { value: resultado.data[i].Id_Subfamilia }).text(resultado.data[i].Desc_Subfamilia));
			}
		}
		else{
			$('#cmbsubfamilia').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	
	function clase() {
		var Id_Perfil=$("#hddperfil").val();
		var Id_Area=$("#idareasesion").val();
		var resultado=new Array();
		data={Estatus_Reg: "1", Id_Area:Id_Area, accion: "consultar"};
		resultado=cargo_cmb("../fachadas/activos/siga_cat_clase/Siga_cat_claseFacade.Class.php",false, data);
		if(resultado.totalCount>0){
			$('#cmbclase').append($('<option>', { value: "-1" }).text("--Clase--"));
			for(var i = 0; i < resultado.totalCount; i++){
				if(Id_Perfil=="68"){
					if(resultado.data[i].Id_Clase=="17"){
						$('#cmbclase').append($('<option>', { value: resultado.data[i].Id_Clase }).text(resultado.data[i].Desc_Clase));
					}
				}else{
					$('#cmbclase').append($('<option>', { value: resultado.data[i].Id_Clase }).text(resultado.data[i].Desc_Clase));
				}
			}
		}
		else{
			$('#cmbclase').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
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
		resultado=cargo_cmb("../fachadas/activos/siga_cat_clasificacion/Siga_cat_clasificacionFacade.Class.php", false, data);
		if(resultado.totalCount>0){
			$('#cmbclasificacion').append($('<option>', { value: "-1" }).text("--Clasificación--"));
			for(var i = 0; i < resultado.totalCount; i++){
				$('#cmbclasificacion').append($('<option>', { value: resultado.data[i].Id_Clasificacion }).text(resultado.data[i].Desc_Clasificacion));
			}
		}else{
			$('#cmbclasificacion').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	
	function centro_costos_contabilidad() {
		var resultado=new Array();
		data={Estatus_Reg: "1", accion: "consultar"};
		resultado = cargo_cmb("../fachadas/activos/siga_cat_centro_de_costos/Siga_cat_centro_de_costosFacade.Class.php", false, data);
		if(resultado.totalCount>0){
			$('#centro_costos').append($('<option>', { value: "-1" }).text("--Centro de Costos--"));
			$('#centro_costos2').append($('<option>', { value: "-1" }).text("--Centro de Costos--"));
			for(var i = 0; i < resultado.totalCount; i++){
				$('#centro_costos').append($('<option>', { value: resultado.data[i].Id_Centros_de_costos }).text(resultado.data[i].Desc_Centro_de_costos));
				$('#centro_costos2').append($('<option>', { value: resultado.data[i].Id_Centros_de_costos }).text(resultado.data[i].Desc_Centro_de_costos));
			}
		}else{
			$('#centro_costos').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	//Reubicacion
	areas_reubicacion();
	function areas_reubicacion() {
		var resultado=new Array();
		data={Estatus_Reg: "1", accion: "consultar"};
		resultado=cargo_cmb("../fachadas/activos/siga_catareas/Siga_catareasFacade.Class.php",false, data);
		if(resultado.totalCount>0){
			$('#cmb_area_guardar').append($('<option>', { value: "-1" }).text("--Area Gestora--"));
			for(var i = 0; i < resultado.totalCount; i++){
				if(resultado.data[i].Id_Area!='5'){
					$('#cmb_area_guardar').append($('<option>', { value: resultado.data[i].Id_Area }).text(resultado.data[i].Nom_Area));
				}
			}
		}else{
			$('#cmb_area_guardar').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	$( "#cmb_area_guardar" ).change(function() {
		if($(this).val()!="-1"){
			ubic_prim_reubicacion($(this).val());
		}else{
			$('#cmb_ubic_prim_reub_guar').children('option').remove();
			$('#cmb_ubic_prim_reub_guar').append($('<option>', { value: "-1" }).text("--Ubicación Primaria--"));
		}
	});
	
	function ubic_prim_reubicacion(Id_Area) {
		$('#cmb_ubic_prim_reub_guar').children('option').remove();
		var resultado=new Array();
		data={Estatus_Reg: "1", Id_Area:Id_Area,accion: "consultar"};
		resultado=cargo_cmb("../fachadas/activos/siga_cat_ubic_prim/Siga_cat_ubic_primFacade.Class.php",false, data);
		if(resultado.totalCount>0){
			$('#cmb_ubic_prim_reub_guar').append($('<option>', { value: "-1" }).text("--Ubicación Primaria--"));
			for(var i = 0; i < resultado.totalCount; i++){
				$('#cmb_ubic_prim_reub_guar').append($('<option>', { value: resultado.data[i].Id_Ubic_Prim }).text(resultado.data[i].Desc_Ubic_Prim));
			}
		}else{
			$('#cmb_ubic_prim_reub_guar').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	$( "#cmb_ubic_prim_reub_guar" ).change(function() {
		if($(this).val()!="-1"){
			ubic_sec_reubicacion($(this).val());
		}else{
			$('#cmb_ubic_sec_reub_guar').children('option').remove();
			$('#cmb_ubic_sec_reub_guar').append($('<option>', { value: "-1" }).text("--Ubicación Secundaria--"));
		}
	});
	
	function ubic_sec_reubicacion(Id_Ubic_Prim) {
		$('#cmb_ubic_sec_reub_guar').children('option').remove();
		var resultado=new Array();
		data={Estatus_Reg: "1", Id_Ubic_Prim:Id_Ubic_Prim, accion: "consultar"};
		resultado=cargo_cmb("../fachadas/activos/siga_cat_ubic_sec/siga_cat_ubic_secFacade.Class.php",false, data);
		if(resultado.totalCount>0){
			$('#cmb_ubic_sec_reub_guar').append($('<option>', { value: "-1" }).text("--Ubicación Secundaria--"));
			for(var i = 0; i < resultado.totalCount; i++){
				$('#cmb_ubic_sec_reub_guar').append($('<option>', { value: resultado.data[i].Id_Ubic_Sec }).text(resultado.data[i].Desc_Ubic_Sec));
			}
		}else{
			$('#cmb_ubic_sec_reub_guar').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	function centro_costos_reubicacion() {
		var resultado=new Array();
		data={Estatus_Reg: "1", accion: "consultar"};
		resultado=cargo_cmb("../fachadas/activos/siga_cat_centro_de_costos/Siga_cat_centro_de_costosFacade.Class.php",false, data);
		if(resultado.totalCount>0){
			$('#centro_costos_guardar').append($('<option>', { value: "-1" }).text("--Centro de Costos Destino--"));
			for(var i = 0; i < resultado.totalCount; i++){
				$('#centro_costos_guardar').append($('<option>', { value: resultado.data[i].Id_Centros_de_costos }).text(resultado.data[i].Desc_Centro_de_costos));
			}
		}else{
			$('#centro_costos_guardar').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	
	
	//Autocomplete Usuarios Resguardo
	usuarios_empleados_reubicacion();
	function usuarios_empleados_reubicacion(){
		
		var strdatos="";
		
		strdatos={
			Estatus_Reg:"1",
			accion: 'consultar'
		}
		
			
		$.ajax({
			type: "POST",
			url: "../fachadas/activos/siga_usuarios/Siga_usuariosFacade.Class.php",
			data: strdatos,
			async: false,
			dataType: "html",
			beforeSend: function (objeto) {
				$("#gifcargandoreubicacion").show();
			},
			success: function (datos) {
				var json = "";
					json = eval("(" + datos + ")"); //Parsear JSON
					var usr_baja='';
					if (json.totalCount > 0) {

						
						usr_baja+='<option></option>';
						usr_baja+='<optgroup label="Usuario Responsable">';
						
						for (var i = 0; i < json.totalCount; i++) {
							usr_baja+='<option value="'+json.data[i].Id_Usuario+'">'+json.data[i].No_Usuario+'-'+json.data[i].Nombre_Usuario+'</option>';
						}
						usr_baja+='</optgroup>';
						$('#numempleadoreubicacion').html(usr_baja);

						$("#gifcargandoreubicacion").hide();
						$("#numempleadoreubicacion").show();
							
						$('#numempleadoreubicacion').selectize({
							//sortField: 'text'
						});
					}
					else {
						$("#gifcargandoreubicacion").hide();
						usr_baja+='<option>--Sin Resultados--</option>';
						usr_baja+='<optgroup label="Usuario Responsable">';
						usr_baja+='</optgroup>';
						$('#numempleadoreubicacion').html(usr_baja);
						$("#numempleadoreubicacion").show();
					}

			},
			error: function (objeto, quepaso, otroobj) {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
				$('#numempleadoreubicacion').append($('<option>', { value: "-1" }).text("Sin resultados"));
			}
		});
		
	}
	
	$("#numempleadoreubicacion").change(function() {
		$("#usuario_resp_guardar").val("");
		if(this.value!=""){
			var valor = $("#numempleadoreubicacion option:selected").html();
			var res = valor.split("-");
			
			$("#usuario_resp_guardar").val(res[1]);
		}
	});
	
	/////////
	
	<?php
      //$nombrefuncion = "ubicacionprim";	
	  //$tabla = "Siga_cat_ubic_prim";
	  //$id = "Id_Ubic_Prim";
	  //$desc = "Desc_Ubic_Prim";
	  //$nombre = "Ubicación Primaria";
	  //$excepto = "";
      //include ("includecombo.php"); 
	  
      //$nombrefuncion = "ubicacionsec";	
	  //$tabla = "Siga_cat_ubic_sec";
	  //$id = "Id_Ubic_Sec";
	  //$desc = "Desc_Ubic_Sec";
	  //$nombre = "Ubicación Secundaria";
	  //$excepto = "";
      //include ("includecombo.php"); 

      $nombrefuncion = "areas";	
	  $tabla = "Siga_catareas";
	  $id = "Id_Area";
	  $desc = "Nom_Area";
	  $nombre = "Áreas";
	  $excepto = "5";
	  $Filtro = ",Id_Area:$(\"#idareasesion\").val()";
      include ("includecombo.php");
      $Filtro = "";
	  
      $nombrefuncion = "motivo";
	  $tabla = "Siga_cat_motivo_alta";
	  $id = "Id_Motivo_Alta";
	  $desc = "Desc_Motivo_Alta";
	  $nombre = "Motivo Alta";
	  $excepto = "";
      include ("includecombo.php");

      //$nombrefuncion = "clasificacion";
	  //$tabla = "Siga_cat_clasificacion";
	  //$id = "Id_Clasificacion";
	  //$desc = "Desc_Clasificacion";
	  //$nombre = "Clasificación";
	  //$excepto = "";
      //include ("includecombo.php");
	  
	  $nombrefuncion = "propiedad";	
	  $tabla = "Siga_cat_propiedad";
	  $id = "Id_Propiedad";
	  $desc = "Desc_Propiedad";
	  $nombre = "Propiedad";
	  $excepto = "";
      include ("includecombo.php");	 

	  //$nombrefuncion = "familia";	
	  //$tabla = "Siga_cat_familia";
	  //$id = "Id_Familia";
	  //$desc = "Desc_Familia";
	  //$nombre = "Familia";
	  //$excepto = "";
      //include ("includecombo.php");	 	  
	  //
	  //$nombrefuncion = "subfamilia";	
	  //$tabla = "Siga_cat_subfamilia";
	  //$id = "Id_Subfamilia";
	  //$desc = "Desc_Subfamilia";
	  //$nombre = "Subfamilia";
	  //$excepto = "";
      //include ("includecombo.php");	 
	  
	  $nombrefuncion = "tipoactivo";	
	  $tabla = "Siga_cat_tipo_activo";
	  $id = "Id_Tipo_Activo";
	  $desc = "Desc_Tipo_Activo";
	  $nombre = "Tipo Activo";
	  $excepto = "";
      include ("includecombo.php");	 
	  
	  $nombrefuncion = "tipovaleresguardo";	
	  $tabla = "Siga_cat_tipo_vale_resg";
	  $id = "Id_Tipo_Vale_Resg";
	  $desc = "Desc_Tipo_Vale_Resg";
	  $nombre = "Tipo Vale Resguardo";
	  $excepto = "";
      include ("includecombo.php");	
	  
	  $nombrefuncion = "estatus";	
	  $tabla = "Siga_cat_estatus";
	  $id = "Id_Estatus";
	  $desc = "Desc_Estatus";
	  $nombre = "Estatus";
	  $excepto = "";
      include ("includecombo.php");	
	  
	  $nombrefuncion = "ubicacionprim2";	
	  $tabla = "Siga_cat_ubic_prim";
	  $id = "Id_Ubic_Prim";
	  $desc = "Desc_Ubic_Prim";
	  $nombre = "Ubicación Primaria";
	  $excepto = "";
      include ("includecombo.php");
	  
      $nombrefuncion = "ubicacionsec2";	
	  $tabla = "Siga_cat_ubic_sec";
	  $id = "Id_Ubic_Sec";
	  $desc = "Desc_Ubic_Sec";
	  $nombre = "Ubicación Secundaria";
	  $excepto = "";
      include ("includecombo.php");	  

	  $nombrefuncion = "estatus2";	
	  $tabla = "Siga_cat_estatus";
	  $id = "Id_Estatus";
	  $desc = "Desc_Estatus";
	  $nombre = "Estatus";
	  $excepto = "";
      include ("includecombo.php");	
	  
	  $nombrefuncion = "area_baja";	
	  $tabla = "Siga_catareas";
	  $id = "Id_Area";
	  $desc = "Nom_Area";
	  $nombre = "Áreas";
	  $excepto = "5";
      include ("includecombo.php");
	  
	  $nombrefuncion = "area_reubicacion";	
	  $tabla = "Siga_catareas";
	  $id = "Id_Area";
	  $desc = "Nom_Area";
	  $nombre = "Áreas";
	  $excepto = "5";
      include ("includecombo.php");
	  
	  //$nombrefuncion = "_area_guardar";	
	  //$tabla = "Siga_catareas";
	  //$id = "Id_Area";
	  //$desc = "Nom_Area";
	  //$nombre = "Áreas";
	  //$excepto = "";
      //include ("includecombo.php");
	  
	  $nombrefuncion = "estatus_baja";	
	  $tabla = "Siga_cat_estatus";
	  $id = "Id_Estatus";
	  $desc = "Desc_Estatus";
	  $nombre = "Estatus";
	  $excepto = "";
      include ("includecombo.php");
	  
	  $nombrefuncion = "estatus_reubicacion";	
	  $tabla = "Siga_cat_estatus";
	  $id = "Id_Estatus";
	  $desc = "Desc_Estatus";
	  $nombre = "Estatus";
	  $excepto = "";
      include ("includecombo.php");
	  
	  $nombrefuncion = "ubicacionprimaria_baja";	
	  $tabla = "Siga_cat_ubic_prim";
	  $id = "Id_Ubic_Prim";
	  $desc = "Desc_Ubic_Prim";
	  $nombre = "Ubicación Primaria";
	  $excepto = "";
      include ("includecombo.php");
	  
	  //$nombrefuncion = "_ubic_prim_reub_guar";	
	  //$tabla = "Siga_cat_ubic_prim";
	  //$id = "Id_Ubic_Prim";
	  //$desc = "Desc_Ubic_Prim";
	  //$nombre = "Ubicación Primaria";
	  //$excepto = "";
      //include ("includecombo.php");
	  
	  $nombrefuncion = "ubicacionprimaria_reubicacion";
	  $tabla = "Siga_cat_ubic_prim";
	  $id = "Id_Ubic_Prim";
	  $desc = "Desc_Ubic_Prim";
	  $nombre = "Ubicación Primaria";
	  $excepto = "";
      include ("includecombo.php");

     
	  
      $nombrefuncion = "ubicacionsecundaria_baja";	
	  $tabla = "Siga_cat_ubic_sec";
	  $id = "Id_Ubic_Sec";
	  $desc = "Desc_Ubic_Sec";
	  $nombre = "Ubicación Secundaria";
	  $excepto = "";
      include ("includecombo.php");	

      //$nombrefuncion = "_ubic_sec_reub_guar";	
	  //$tabla = "Siga_cat_ubic_sec";
	  //$id = "Id_Ubic_Sec";
	  //$desc = "Desc_Ubic_Sec";
	  //$nombre = "Ubicación Secundaria";
	  //$excepto = "";
      //include ("includecombo.php");		  
      
      $nombrefuncion = "ubicacionsecundaria_reubicacion";	
	  $tabla = "Siga_cat_ubic_sec";
	  $id = "Id_Ubic_Sec";
	  $desc = "Desc_Ubic_Sec";
	  $nombre = "Ubicación Secundaria";
	  $excepto = "";
      include ("includecombo.php");	 	  
	  /////////////////////////////////////////////
	  $nombrefuncion = "ubicacionprim3";	
	  $tabla = "Siga_cat_ubic_prim";
	  $id = "Id_Ubic_Prim";
	  $desc = "Desc_Ubic_Prim";
	  $nombre = "Ubicación Primaria";
	  $excepto = "";
      include ("includecombo.php");	
	  
	  $nombrefuncion = "ubicacionsec3";	
	  $tabla = "Siga_cat_ubic_sec";
	  $id = "Id_Ubic_Sec";
	  $desc = "Desc_Ubic_Sec";
	  $nombre = "Ubicación Secundaria";
	  $excepto = "";
      include ("includecombo.php");	
	  
	  
	  $nombrefuncion = "estatus3";	
	  $tabla = "Siga_cat_estatus";
	  $id = "Id_Estatus";
	  $desc = "Desc_Estatus";
	  $nombre = "Estatus";
	  $excepto = "";
      include ("includecombo.php");	
	  
	  $nombrefuncion = "bajas";	
	  $tabla = "siga_cast_motivo_baja";
	  $id = "Id_Motivo_baja";
	  $desc = "Desc_Motivo_baja";
	  $nombre = "Motivo Baja";
	  $excepto = "";
      include ("includecombo.php");
	  
	  $nombrefuncion = "destinofinal";	
	  $tabla = "siga_cast_destino_final";
	  $id = "Id_Destino_final";
	  $desc = "Desc_Destino_final";
	  $nombre = "Destino Final";
	  $excepto = "";
      include ("includecombo.php");	 

      $nombrefuncion = "Cuenta_baja";	
	  $tabla = "siga_cat_cuenta_baja";
	  $id = "Id_Cuenta_baja";
	  $desc = "Desc_Cuenta_baja";
	  $nombre = "Cuenta baja";
	  $excepto = "";
      include ("includecombo.php");	  
	  
	  $nombrefuncion = "Cuenta_reubicacion";	
	  $tabla = "siga_cat_cuenta_reubicacion";
	  $id = "Id_Cuenta_reubicacion";
	  $desc = "Desc_Cuenta_reubicacion";
	  $nombre = "Cuenta reubicacion";
	  $excepto = "";
      include ("includecombo.php");	  

	?>

	
	$("#cmbmotivo option:contains('SIN INFORMACION')").attr("disabled","disabled")
	
	function isNumber(n) 
	{
	 return !isNaN(parseFloat(n)) && isFinite(n);
	}

		//Guardar Registros
	$("#guardar").click(function () {
		//Usuario Logueado
		var usuariosesion=$("#usuariosesion").val();
		//	
		var Agregar = true;
		var mensaje_error = "";
		var Id_Activo=$("#Id_Activo").val();
		var Mant_Prevent=$("#cmb_mant_prevent").val();
		var AFBC=$.trim($("#AF_BC").val());
		var Nombre=$.trim($("#Nombre").val());
		var DescCorta=$.trim($("#DescCorta").val());
		var UbicacionPrimaria=$.trim($("#cmbubicacionprim").val());
		var UbicacionSecundaria=$.trim($("#cmbubicacionsec").val());
		var Estatus=$.trim($("#cmbestatus").val());
		var Area=$.trim($("#cmbareas").val());
		var Clase=$.trim($("#cmbclase").val());
		var Clasificacion=$.trim($("#cmbclasificacion").val());
		var Propiedad=$.trim($("#cmbpropiedad").val());
		var MotivoAlta=$.trim($("#cmbmotivo").val());
		var Familia=$.trim($("#cmbfamilia").val());
		var TipoActivo=$.trim($("#cmbtipoactivo").val());
		var DescLarga=$.trim($("#DescLarga").val());
		var Especifica=$.trim($("#especifica").val());
		var Foto=$.trim($("#Url_Foto_Activo").val());
		var ImporteSeguros=$.trim($("#importeseguros").val());
		var ParticipaPre=$.trim($("#cmbPRE").val());
		var ParticipaSeguros=$.trim($("#cmbseguros").val());
		var ParticipaCertificacion=$.trim($("#cmbcertificacion").val());
		var Id_Tipo_Vale_Resg=$.trim($("#cmbtipovaleresguardo").val());
		var Num_Empleado=$.trim($("#numempleadoresguardo").val());
		var NumSerie=$.trim($("#numserie").val());
		var strDatos=""; 
		
		if (AFBC.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar el AFBC del activo<br />";
			$("#AF_BC").focus();
		}else{
			//Esta validacion solo aplica para mantenimiento
			if($("#idareasesion").val()==3){
				if(AFBC.substring(0, 2)!="AF"&&AFBC.substring(0, 2)!="BC"&&AFBC.substring(0, 2)!="BI"&&AFBC.substring(0, 2)!="MI"&&AFBC.substring(0, 2)!="ME"){
					Agregar = false;
					mensaje_error += " -Falta agregar el AF, BC, BI o MI al Activo.<br />";
					$("#AF_BC").focus();
				}
			}
		}
		
		if (Nombre.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar el Nombre del activo<br />";
			$("#Nombre").focus();
		}
		
		if (UbicacionPrimaria == -1) {
			Agregar = false; 
			mensaje_error += " -Falta agregar la Ubicación primaria del activo<br />";
			$("#cmbubicacionprim").focus();
		}
		
		if (UbicacionSecundaria == -1) {
			Agregar = false; 
			mensaje_error += " -Falta agregar la Ubicación secundaria del activo<br />";
			$("#cmbubicacionsec").focus();
		}
		
		if (Mant_Prevent == -1) {
			Agregar = false; 
			mensaje_error += " -Falta seleccionar si Participa en Mantenimiento Preventivo<br />";
			$("#cmb_mant_prevent").focus();
		}
		
		if (Estatus == -1) {
			Agregar = false; 
			mensaje_error += " -Falta agregar el estatus del activo<br />";
			$("#cmbestatus").focus();
		}
		
		/*if (DescCorta.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar la Descripción corta del activo<br />";
		}*/
		
		if (Area == -1) {
			Agregar = false; 
			mensaje_error += " -Falta agregar el Área del activo<br />";
			$("#cmbareas").focus();
		}
		
		if (Clase == -1) {
			Agregar = false; 
			mensaje_error += " -Falta agregar la Clase<br />";
			$("#cmbclase").focus();
		}
		if (Clasificacion == -1) {
			Agregar = false; 
			mensaje_error += " -Falta agregar la Clasificacion del activo<br />";
			$("#cmbclasificacion").focus();
		}
		
		if (Propiedad == -1) {
			Agregar = false; 
			mensaje_error += " -Falta agregar la Propiedad del activo<br />";
			$("#cmbpropiedad").focus();
		}
		
		if (MotivoAlta == -1) {
			Agregar = false; 
			mensaje_error += " -Falta agregar el Motivo de alta del activo<br />";
			$("#cmbmotivo").focus();
		}
		
		if (Familia == -1) {
			Agregar = false; 
			mensaje_error += " -Falta agregar la Familia del activo<br />";
			$("#cmbfamilia").focus();
		}
		
		if (TipoActivo == -1) {
			Agregar = false; 
			mensaje_error += " -Falta agregar el Tipo de activo<br />";
			$("#cmbtipoactivo").focus();
		}
		
		if (ImporteSeguros.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar el Importe de seguros<br />";
			$("#importeseguros").focus();
		}
		
		//if (!isNumber(ImporteSeguros)) {
		//	Agregar = false; 
		//	mensaje_error += " -El Importe de seguros del activo debe ser númerico<br />";
		//	$("#importeseguros").focus();
		//}		
		
		
		if (ParticipaSeguros == -1) {
			Agregar = false; 
			mensaje_error += " -Falta agregar si Participa en Seguros<br />";
			$("#cmbseguros").focus();
		}
		
		if (ParticipaPre == -1) {
			Agregar = false; 
			mensaje_error += " -Falta agregar si Participa en PRE<br />";
			$("#cmbPRE").focus();
		}
		
		if (ParticipaCertificacion == -1) {
			Agregar = false; 
			mensaje_error += " -Falta agregar si Participa en Certificacion<br />";
			$("#cmbcertificacion").focus();
		}
		
		if (Id_Tipo_Vale_Resg == -1) {
			Agregar = false; 
			mensaje_error += " -Falta agregar el Tipo de Vale de Resguardo<br />";
			$("#cmbtipovaleresguardo").focus();
		}
		
		if (Num_Empleado.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar el Usuario de Resguardo<br />";
			$("#numempleadoresguardo").focus();
		}
		
		if (!$("#chknumserie").is(':checked'))
		{
		if (NumSerie.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar el Número de serie<br />";
			$("#numserie").focus();
		}
		}
		
		if (!Agregar) 
		{
			$("#Id_Valido").val(0);
			mensajesalerta("Informaci&oacute;n", mensaje_error, "info", "dark");			
		}

		
		if(Agregar)
		{	
	        $("#Id_Valido").val(1);
	        if (Id_Activo.length <= 0)
			{
			     $("#AF_BC2").val($("#AF_BC").val());
				 $("#Nombre2").val($("#Nombre").val());
				 $("#DescCorta2").val($("#DescCorta").val());
				 $("#cmbestatus2").val($("#cmbestatus").val());
				 $("#especifica2").val($("#especifica").val());
				 $("#cmbubicacionprim2").val($("#cmbubicacionprim").val());
				 $("#cmbubicacionsec2").val($("#cmbubicacionsec").val());
				 
				 $("#AF_BC3").val($("#AF_BC").val());
				 $("#Nombre3").val($("#Nombre").val());
				 $("#DescCorta3").val($("#DescCorta").val());
				 $("#cmbestatus3").val($("#cmbestatus").val());
				 $("#especifica3").val($("#especifica").val());
				 $("#cmbubicacionprim3").val($("#cmbubicacionprim").val());
				 $("#cmbubicacionsec3").val($("#cmbubicacionsec").val());

		
			$("#tab2").click();
		    }
			else	
			guardaDatosGenerales();	
		}
	});
	
	function guardaDatosGenerales()
	{
		
		var usuariosesion=$("#usuariosesion").val();
		//	
		var Agregar = true;
		var mensaje_error = "";
		var Id_Activo=$("#Id_Activo").val();
		var Mant_Prevent=$("#cmb_mant_prevent").val();
		var AFBC=$.trim($("#AF_BC").val());
		var Nombre=$.trim($("#Nombre").val());
		var DescCorta=$.trim($("#DescCorta").val());
		var UbicacionPrimaria=$.trim($("#cmbubicacionprim").val());
		var UbicacionSecundaria=$.trim($("#cmbubicacionsec").val());
		var Estatus=$.trim($("#cmbestatus").val());
		var Area=$.trim($("#cmbareas").val());
		var Clase=$.trim($("#cmbclase").val());
		var Clasificacion=$.trim($("#cmbclasificacion").val());
		var Propiedad=$.trim($("#cmbpropiedad").val());
		var MotivoAlta=$.trim($("#cmbmotivo").val());
		var Familia=$.trim($("#cmbfamilia").val());
		var TipoActivo=$.trim($("#cmbtipoactivo").val());
		var DescLarga=$.trim($("#DescLarga").val());
		var Especifica=$.trim($("#especifica").val());
		var Foto=$.trim($("#Url_Foto_Activo").val());
		var ImporteSeguros=$.trim($("#importeseguros").val());
		var ParticipaPre=$.trim($("#cmbPRE").val());
		var ParticipaSeguros=$.trim($("#cmbseguros").val());
		var ParticipaCertificacion=$.trim($("#cmbcertificacion").val());
		var Id_Tipo_Vale_Resg=$.trim($("#cmbtipovaleresguardo").val());
		var Num_Empleado=$.trim($("#numempleadoresguardo").val());
		var NumSerie=$.trim($("#numserie").val());
		var strDatos="";
		
		ImporteSeguros=ImporteSeguros.replace(/\,/g,'');
		    /* Obligatorios */
			strDatos = "AF_BC="+AFBC; 
			strDatos += "&Nombre_Activo="+Nombre;
			strDatos += "&DescCorta="+DescCorta;
			strDatos += "&Id_Ubic_Prim="+UbicacionPrimaria;
			strDatos += "&Id_Ubic_Sec="+UbicacionSecundaria;
			strDatos += "&Id_Situacion_Activo="+Estatus;
			strDatos += "&Estatus_Reg=1";
			strDatos += "&Id_Area="+Area;
			strDatos += "&Id_Clase="+Clase;
			strDatos += "&Id_Clasificacion="+Clasificacion;
			strDatos += "&Id_Propiedad="+Propiedad;
			strDatos += "&Id_Motivo_Alta="+MotivoAlta;
			strDatos += "&Id_Familia="+Familia;
			strDatos += "&Id_Tipo_Activo="+TipoActivo;
			strDatos += "&DescLarga="+DescLarga;
			strDatos += "&Foto="+Foto;
			strDatos += "&Mant_Prevent="+Mant_Prevent;
			/* Opcionales */
			// Combos
			var Id_Tipo_Vale_Resg=$.trim($("#cmbtipovaleresguardo").val());
			if (Id_Tipo_Vale_Resg != -1)
			strDatos += "&Id_Tipo_Vale_Resg="+Id_Tipo_Vale_Resg;	
			var Id_Subfamilia=$.trim($("#cmbsubfamilia").val());
			if (Id_Subfamilia != -1)
			strDatos += "&Id_Subfamilia="+Id_Subfamilia;
			
			if (ParticipaPre != -1)
			strDatos += "&ParticipaPre="+ParticipaPre;
			
			if (ParticipaSeguros != -1)
			strDatos += "&ParticipaSeguros="+ParticipaSeguros;
			
			if (ParticipaCertificacion != -1)
			strDatos += "&ParticipaCertificacion="+ParticipaCertificacion;		
			
			if (Id_Tipo_Vale_Resg != -1)
			strDatos += "&Id_Tipo_Vale_Resg="+Id_Tipo_Vale_Resg;		
		
		
            // Campos
			var Marca=$.trim($("#Marca").val());
			if (Marca != "")
			strDatos += "&Marca="+Marca;
			var Modelo=$.trim($("#modelo").val());
			if (Modelo != "")
			strDatos += "&Modelo="+Modelo;
			
			if (NumSerie != "")
			strDatos += "&NumSerie="+NumSerie;
			var NumActivoAnterior=$.trim($("#numactivoanterior").val());
			if (NumActivoAnterior != "")
			strDatos += "&NumActivoAnterior="+NumActivoAnterior;		
			
			if (ImporteSeguros != "")
			strDatos += "&ImporteSeguros="+ImporteSeguros;
		    var Num_Empleado=$.trim($("#numempleadoresguardo").val());
			if (Num_Empleado != "")
			strDatos += "&Num_Empleado="+Num_Empleado;
			var Nombre_Completo=$.trim($("#nombreempleadoresguardo").val());
			if (Nombre_Completo != "")
			strDatos += "&Nombre_Completo="+Nombre_Completo;
			//var Garantia=$.trim($("#garantia").val());
			//if (Garantia != "")
			//strDatos += "&Garantia="+Garantia;		
			//var ExtGarantia=$.trim($("#extension").val());
			//if (ExtGarantia != "")
			//strDatos += "&ExtGarantia="+ExtGarantia;
			var Especifica=$.trim($("#especifica").val());
			if (Especifica != "")
			strDatos += "&Especifica="+Especifica;
		
		
		    var activopadre=$.trim($("#activopadre").val());
			if (activopadre != "")
			strDatos += "&Id_ActivoPadre="+activopadre;
		    else
				strDatos += "&Id_ActivoPadre= ";
		
			if(Id_Activo.length <= 0){
				strDatos += "&Usr_Inser="+usuariosesion;
				//strDatos += "&Estatus_Reg=1";				
				strDatos += "&accion=guardar";
			}else{
				strDatos += "&Id_Activo="+Id_Activo;
				strDatos += "&Usr_Mod="+usuariosesion;
				//strDatos += "&Estatus_Reg=2";				
				strDatos += "&accion=guardar";
			}

			$.ajax({
				type: "POST",
				encoding:"UTF-8",
				url: "../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",        
				async: false,
				data: strDatos,
				dataType: "html",
				beforeSend: function (xhr) {

				},
				success: function (datos) {
					data = eval("(" + datos + ")");
					if(Id_Activo.length <= 0)
					{
					//console.log(json);
					//limpiarcampos();
					//limpiarcamposproveedor();
					//limpiarcamposbaja();
					$("#Id_Activo").val(data.data[0].Id_Activo);
					mensajesalerta("&Eacute;xito", "Datos Generales guardado Correctamente.", "success", "dark");
					enviaCorreoAlta(data.data[0].Id_Activo,usuariosesion);
					//activaBoton(2);
					//$('#altaEquipo').modal('hide')
					//alert(data.data[0].Id_Activo);
					//pasarvalores(data.data[0].Id_Activo,0);
					//$("#tab2").click();
					}
					else
					{
					mensajesalerta("&Eacute;xito", "Actualizado Correctamente.", "success", "dark");
					}
						
					//$('#altaEquipo').modal('hide');
					
					$('#tablaactivos').DataTable().ajax.reload();
					//$('#tablaactivos').DataTable().search(AFBC).draw();
				},
				error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
				}
			});
		
	}



	//enviaCorreoAlta(23245,5);
	// Función que guarda la información del Activo (Nuevo Activo)
	$("#guardar2").click(function () {
		var Agregar = true;
		var mensaje_error = "";
		
		//Usuario Logueado
		var Id_Usuario_Sesion=$("#usuariosesion").val();
		
		var Id_Activo=$("#Id_Activo").val();
		var Id_Activo_Contabilidad=$("#Id_Activo_Contabilidad").val();
		var Folio_Fiscal=$("#Folio_Fiscal").val();
		var Monto_F=$("#Monto_Factura").val();
		var Id_activo_proveedor=$("#Id_activo_proveedor").val();
		var NumOrdenCompra=$.trim($("#NumOrdenCompra").val());
		var NumFactura=$.trim($("#NumFactura").val());
		var FechaFactura=$.trim($("#FechaFactura").val());
		var UUID=$.trim($("#UUID").val());
		var MontoFactura_s_iva=$.trim($("#MontoFactura_s_iva").val());
		var NumContrato=$.trim($("#NumContrato").val());
		var VidaUtilFabricante=$.trim($("#VidaUtilFabricante").val());
	    var VidaUtilCHS=$.trim($("#VidaUtilCHS").val());
		var NombreProveedor=$.trim($("#NombreProveedor").val());
		var Id_Proveedor=$.trim($("#Id_Proveedor").val());
		var Contacto=$.trim($("#Contacto").val());
		var Telefono=$.trim($("#Telefono").val());
		var Correo=$.trim($("#Correo").val());
		var DocRecibida=$.trim($("#DocRecibida").val());
		var Accesorios=$.trim($("#Accesorios").val());
		var Consumibles=$.trim($("#Consumibles").val());
		var Url_Contrato=$.trim($("#url_contrato").val());
		var Url_Otro_Doc=$.trim($("#url_corto").val());
		var Url_Factura=$.trim($("#url_factura0").val());
		var Url_Xml=$.trim($("#url_xml").val());
		var Link=$.trim($("#manual1").val());
		var Link2=$.trim($("#manual2").val());
		var Link3=$.trim($("#manual3").val());
		var no_capex2=$.trim($("#no_capex2").val());
		//var Foto=$.trim($("#Url_Foto_Activo").val());
		var Propiedad=$.trim($("#cmbpropiedad").val());
		var centro_costos=$("#centro_costos2").val();
		var strDatos=""; var strDatosContab="";
		
		
		if(centro_costos=="-1"){
			centro_costos="";
		}
		
		if (Monto_F.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar el Monto de la factura del activo<br />";
		}
		
		if (MontoFactura_s_iva.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar el Monto del <br />";
		}
		
		if (Propiedad == 1) 
		{
			if (FechaFactura.length <= 0) {
				Agregar = false; 
				mensaje_error += " -Falta agregar la fecha de la factura<br />";
			}
		}
		
		if (VidaUtilFabricante.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar la vida útil del fabricante<br />";
		}
		
		if (VidaUtilCHS.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar la vida útil CHS<br />";
		}
		
		//if (Id_Proveedor <= 0) {
		//	Agregar = false; 
		//	mensaje_error += " -Falta agregar el Número de proveedor del activo<br />";
		//}
		
		if (NombreProveedor.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar el Nombre del proveedor del activo<br />";
		}
		
		//if (Contacto <= 0) {
		//	Agregar = false; 
		//	mensaje_error += " -Falta agregar el Contacto del proveedor activo<br />";
		//}


		// LISTA DE ACCESORIOS
		// Dentro de cada sección para agregar accesorios y consumibles, se obtienen las lineas de campos que permanecen
		var listaAccesorios = [];
		var listaAccesoriosErrores = false;
		$("#accesorioTabContenedor div.linea-campos-clon").each(function() {
			if($(this).find(".campo-formulario").length > 0) {
				// Crea un Objeto Json
				var jsonAccesorio = new Object();
				// Rellena el objeto con cada propiedad que equivale a un campo del formulario
				jsonAccesorio.accesorioConsumibleId = $(this).find("input[name='accesorioConsumibleId']").val();
				jsonAccesorio.accesorioConsumibleSKU = $.trim($(this).find("input[name='accesorioConsumibleSKU']").val());
				jsonAccesorio.accesorioConsumibleDescripcion = $.trim($(this).find("textarea[name='accesorioConsumibleDescripcion']").val());
				jsonAccesorio.accesorioConsumibleModelo = $.trim($(this).find("input[name='accesorioConsumibleModelo']").val());
				jsonAccesorio.accesorioConsumibleMarca = $.trim($(this).find("input[name='accesorioConsumibleMarca']").val());
				
				// Para agregar el nuevo objeto al array correspondiente, se deben llenar los campos con información
				if (jsonAccesorio.accesorioConsumibleSKU != "" && jsonAccesorio.accesorioConsumibleDescripcion != "" && jsonAccesorio.accesorioConsumibleModelo != "" && jsonAccesorio.accesorioConsumibleMarca != "") {
					listaAccesorios.push(jsonAccesorio);
				}
				else {
					listaAccesoriosErrores = true;
				}
			}
		});
		// LISTA DE CONSUMIBLES
		// Dentro de cada sección para agregar accesorios y consumibles, se obtienen las lineas de campos que permanecen
		var listaConsumibles = [];
		var listaConsumiblesErrores = false;
		$("#consumibleTabContenedor div.linea-campos-clon").each(function() {
			if($(this).find(".campo-formulario").length > 0) {
				// Crea un Objeto Json
				var jsonConsumible = new Object();
				// Rellena el objeto con cada propiedad que equivale a un campo del formulario
				jsonConsumible.accesorioConsumibleId = $(this).find("input[name='accesorioConsumibleId']").val();
				jsonConsumible.accesorioConsumibleSKU = $(this).find("input[name='accesorioConsumibleSKU']").val();
				jsonConsumible.accesorioConsumibleDescripcion = $(this).find("textarea[name='accesorioConsumibleDescripcion']").val();
				jsonConsumible.accesorioConsumibleModelo = $(this).find("input[name='accesorioConsumibleModelo']").val();
				jsonConsumible.accesorioConsumibleMarca = $(this).find("input[name='accesorioConsumibleMarca']").val();

				// Para agregar el nuevo objeto al array correspondiente, se deben llenar los campos con información
				if (jsonConsumible.accesorioConsumibleSKU != "" && jsonConsumible.accesorioConsumibleDescripcion != "" && jsonConsumible.accesorioConsumibleModelo != "" && jsonConsumible.accesorioConsumibleMarca != "") {
					listaConsumibles.push(jsonConsumible);
				}
				else {
					listaConsumiblesErrores = true;
				}
			}
		});
		// Agrega los códigos de error a la variable que lleva el control general
		if(listaAccesoriosErrores) { Agregar = false; mensaje_error += "-Debe llenarse correctamente la información de los Accesorios"; }
		if(listaConsumiblesErrores) { Agregar = false; mensaje_error += "-Debe llenarse correctamente la información de los Consumibles"; }


		if ($("#Id_Valido").val() == 0) {
			if (Id_Activo.length <= 0) {
				Agregar = false; 
				mensaje_error = " -Debe capturarse primero el activo en Datos Generales<br />";
			}
		}
		
		//if (!isNumber(Monto_F)) {
		//	Agregar = false; 
		//	mensaje_error += " -El Monto de la factura del activo debe ser númerico<br />";
		//}
		
		//if (!isNumber(MontoFactura_s_iva)) {
		//	Agregar = false; 
		//	mensaje_error += " -El Monto de la factura sin iva del activo debe ser numérico<br />";
		//}		


		if (!Agregar) {
			$("#Id_Valido2").val(0);
			mensajesalerta("Informaci&oacute;n", mensaje_error, "info", "dark");			
		}
		
		
		if(Agregar) {
			Monto_F=Monto_F.replace(/\,/g,'');
			MontoFactura_s_iva=MontoFactura_s_iva.replace(/\,/g,'');
			$("#guardar2").prop("disabled", true);
			$("#guardar2").html('Procesando..');
			if (Id_Activo.length <= 0) {
				guardaDatosGenerales();
				Id_Activo = $("#Id_Activo").val();
			}


			// Lista de campos a enviar para ser almacenados
			/* Obligatorios */
			$("#Id_Valido2").val(1);
			strDatos = "Id_activo_proveedor="+Id_activo_proveedor;
			strDatos += "&id_Activo="+Id_Activo; 
			strDatos += "&Folio_Fiscal="+Folio_Fiscal; 
			strDatos += "&No_Capex="+no_capex2;
			strDatos += "&Monto_F="+Monto_F; 
			strDatos += "&MontoFactura="+MontoFactura_s_iva; 
			strDatos += "&NombreProveedor="+NombreProveedor;
			strDatos += "&Id_Proveedor="+Id_Proveedor;
			strDatos += "&Contacto="+Contacto;
			/* Opcionales */
		
			// Campos
			var NumOrdenCompra=$.trim($("#NumOrdenCompra").val());
			if (NumOrdenCompra != "") { strDatos += "&NumOrdenCompra=" + NumOrdenCompra; }
			var NumFactura=$.trim($("#NumFactura").val());
			if (NumFactura != "") { strDatos += "&NumFactura=" + NumFactura; }
			if (FechaFactura != "") { strDatos += "&FechaFactura="+FechaFactura.substring(6, 10)+"-"+FechaFactura.substring(3, 5)+"-"+FechaFactura.substring(0, 2); }

			var UUID=$.trim($("#UUID").val());
			if (UUID != "") { strDatos += "&UUID="+UUID; }
			var NumContrato=$.trim($("#NumContrato").val());
			if (NumContrato != "") { strDatos += "&NumContrato="+NumContrato; }

			if (VidaUtilFabricante != "") { strDatos += "&VidaUtilFabricante=" + VidaUtilFabricante; }
			if (VidaUtilCHS != "") { strDatos += "&VidaUtilCHS=" + VidaUtilCHS; }
			
			var Garantia=$.trim($("#garantia").val());
			if (Garantia != "") { strDatos += "&Garantia="+Garantia; }
			
			var ExtGarantia=$.trim($("#extension").val());
			if (ExtGarantia != "") { strDatos += "&ExtGarantia="+ExtGarantia; }
			
			var Fecha_Vencimiento=$.trim($("#Fecha_Vencimiento").val());
			if (Fecha_Vencimiento != "") { strDatos += "&Fecha_Vencimiento="+Fecha_Vencimiento; }
			
			var Telefono=$.trim($("#Telefono").val());
			if (Telefono != "") { strDatos += "&Telefono="+Telefono; }
			
			var Correo=$.trim($("#Correo").val());
			if (Correo != "") { strDatos += "&Correo="+Correo; }
			
			var DocRecibida=$.trim($("#DocRecibida").val());
			if (DocRecibida != "") { strDatos += "&DocRecibida="+DocRecibida; }

			/*
			// Accesorios y consumibles
			var Accesorios = $.trim($("#Accesorios").val());
			if (Accesorios != "")
			strDatos += "&Accesorios="+Accesorios;
			var Consumibles = $.trim($("#Consumibles").val());
			if (Consumibles != "")
				strDatos += "&Consumibles="+Consumibles;
			*/

			if (Url_Contrato != "") { strDatos += "&Url_Contrato=" + Url_Contrato; }
			if (Url_Otro_Doc != "") { strDatos += "&Url_Otro_Doc=" + Url_Otro_Doc; }
			if (Url_Factura != "") { strDatos += "&Url_Factura=" + Url_Factura; }
			if (Url_Xml != "") { strDatos += "&Url_Xml=" + Url_Xml; }
			if (Link != "") { strDatos += "&Link=" + Link; }
			if (Link2 != "") { strDatos += "&Link2=" + Link2; }
			if (Link3 != "") { strDatos += "&Link3=" + Link3; }
			if(Id_activo_proveedor.length <= 0) {
				strDatos += "&Usr_Inser="+Id_Usuario_Sesion;
				strDatos += "&Estatus_Reg=1";
				strDatos += "&accion=guardar";
			}
			else {
				//strDatos += "&Id_activo_proveedor="+Id_activo_proveedor;
				strDatos += "&Usr_Mod="+Id_Usuario_Sesion;
				strDatos += "&Estatus_Reg=2";
				strDatos += "&accion=guardar";
			}

			
			$.ajax({
				type: "POST",
				encoding:"UTF-8",
				url: "../fachadas/activos/siga_activo_proveedor/Siga_activo_proveedorFacade.Class.php",
				async: false,
				data: strDatos,
				dataType: "html",
				beforeSend: function (xhr) { },
				success: function (datos) {
					var json;
					json = eval("(" + datos + ")"); //Parsear JSON
					if(json.totalCount > 0) {
						// Actualiza la información de los Consumibles y Accesorios que están ligados al Activo
						var parametrosJson = { listaAccesorios: listaAccesorios, listaConsumibles: listaConsumibles, Id_Activo: Id_Activo, Id_Usuario: $("#usuariosesion").val() , accion: "AccesorioConsumibleAddEdit" };
						$.ajax({
							type: "POST",
							url: "../controladores/simple_mvc/ActivoAccesorioConsumibleController.Class.php",
							data: parametrosJson,
							success: function (response) {
								//console.log(response);

								$respuesta = JSON.parse($.trim(response));
								if($respuesta.intResultado < 0) {
									// Ha ocurruido un error al cargar los Accesorios/Consumibles
									mensajesalerta("Oh No!", $respuesta.strMensaje, "error", "dark");
								}
							},
							error: function () {
								mensajesalerta("Oh No!", "Ocurri&oacute; un error al guardar los accesorios y consumibles.", "error", "dark");
							}
						});
						
						var eliminar_archivo="";
						$("#Id_activo_proveedor").val(json.data[0]["Id_activo_proveedor"]);
						if(json.data[0]["Id_activo_proveedor"]!=""){
							eliminar_archivo="no";
						}
						
						$("#url_contrato").val(json.data[0]["Url_Contrato"]);
						if($('#url_contrato').val()!="") {
							var Proveedor_contrato = $('#url_contrato').val().indexOf("---");
							if(Proveedor_contrato!=-1) {
								mostrar_archivos_lista($('#url_contrato').val(), "divProveedor_Adjuntar_Contrato_lista", Ruta_Archivos_Proveedores, "si", "url_contrato", eliminar_archivo);
							}
							else {
								mostrar_archivos_lista($('#url_contrato').val(), "divProveedor_Adjuntar_Contrato_lista", Ruta_Archivos_Proveedores, "no", "url_contrato", eliminar_archivo);
							}
						}
						
						$("#url_factura0").val(json.data[0].Url_Factura);
						if($('#url_factura0').val()!="") {
							var Proveedor_Factura_0 = $('#url_factura0').val().indexOf("---");
							if(Proveedor_Factura_0!=-1){
								mostrar_archivos_lista($('#url_factura0').val(), "divFactura_0_lista", Ruta_Archivos_Proveedores, "si", "url_factura0", eliminar_archivo);
							}
							else {
								mostrar_archivos_lista($('#url_factura0').val(), "divFactura_0_lista", Ruta_Archivos_Proveedores, "no", "url_factura0", eliminar_archivo);
							}
						}

						$("#url_corto").val(json.data[0].Url_Otro_Doc);
						if($('#url_corto').val()!="") {
							var Proveedor_otro_doc_corto = $('#url_corto').val().indexOf("---");
							if(Proveedor_otro_doc_corto!=-1) {
								mostrar_archivos_lista($('#url_corto').val(), "divOtro_Doc_Corto_lista", Ruta_Archivos_Proveedores, "si", "url_corto", eliminar_archivo);
							}
							else {
								mostrar_archivos_lista($('#url_corto').val(), "divOtro_Doc_Corto_lista", Ruta_Archivos_Proveedores, "no", "url_corto", eliminar_archivo);
							}
						}

						$("#url_xml").val(json.data[0].Url_Xml);
						if($('#url_xml').val()!=""){
							var Proveedor_url_xml = $('#url_xml').val().indexOf("---");
							if(Proveedor_url_xml!=-1) {
								mostrar_archivos_lista($('#url_xml').val(), "divXml_lista", Ruta_Archivos_Proveedores, "si", "url_xml", eliminar_archivo);
							}
							else {
								mostrar_archivos_lista($('#url_xml').val(), "divXml_lista", Ruta_Archivos_Proveedores, "no", "url_xml", eliminar_archivo);
							}
						}
						
						//Si el número de capex es diferente a vacio realiza la consulta
						$.ajax({
							type: "POST",
							url: "../fachadas/activos/siga_activos_contabilidad/Siga_activos_contabilidadFacade.Class.php",
							async: false,
							data: {
								Id_Activo: Id_Activo, Estatus_Reg:"1", accion: "consultar"
							},
							dataType: "html",
							success: function (data_u) {
								//console.log(data_u);
								var data_u = eval("(" + data_u + ")");
								if (data_u.totalCount > 0) {
									$("#Id_Activo_Contabilidad").val(data_u.data[0].Id_Activo_Contabilidad);
									$("#no_capex").val(data_u.data[0].No_Capex);
									$("#no_capex2").val(data_u.data[0].No_Capex);
								}
							},
							error: function () {
								mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
							}
						});

						
						//////////////////////////////////////////////////
						//Inserta el centro de costos en contabilidad
						strDatosContab = "Id_Activo_Contabilidad="+$("#Id_Activo_Contabilidad").val();
						strDatosContab+="&Id_Activo="+Id_Activo;
						strDatosContab+="&Centro_Costos="+centro_costos;
						strDatosContab+="&No_Capex="+no_capex2;
						if($("#Id_Activo_Contabilidad").val().length <= 0) {
							strDatosContab += "&Usr_Inser="+Id_Usuario_Sesion;
							strDatosContab += "&Estatus_Reg=1";				
							strDatosContab += "&accion=guardar";
						}
						else {
							//strDatos += "&Id_activo_proveedor="+Id_activo_proveedor;
							strDatosContab += "&Usr_Mod="+Id_Usuario_Sesion;
							strDatosContab += "&Estatus_Reg=2";				
							strDatosContab += "&accion=guardar";
						}

						if(centro_costos!="") {
							if(Id_Activo!=""){
								$.ajax({
									type: "POST",
									encoding:"UTF-8",
									url: "../fachadas/activos/siga_activos_contabilidad/Siga_activos_contabilidadFacade.Class.php",        
									async: false,
									data: strDatosContab,
									dataType: "html",
									beforeSend: function (xhr) { },
									success: function (datos) {
										var json_cont;
										json_cont = eval("(" + datos + ")"); //Parsear JSON
										if(json_cont.totalCount>0){
											$("#Id_Activo_Contabilidad").val(json_cont.data[0]["Id_Activo_Contabilidad"]);
										}
									},
									error: function () {
										mensajesalerta("Oh No!", "Ocurrio un error al guardar el centro de costos.", "error", "dark");
									}
								});
							}
						}
						

						if(Id_activo_proveedor.length <= 0){
							mensajesalerta("&Eacute;xito", "Datos de Proveedor Guardados Correctamente.", "success", "dark");	
							//enviaCorreoAlta(Id_Activo,Id_Usuario_Sesion);
							//limpiarcamposproveedor();
						}
						else {
							mensajesalerta("&Eacute;xito", "Actualizado Correctamente.", "success", "dark");	
						}
						$("#guardar2").prop("disabled", false);
						$("#guardar2").html('Guardar datos proveedor');
					 
						if ($("#cmb_mant_prevent").val() == 1) {
							if($("#hddperfil").val()!="68") {
								$("#linkMantenimiento").show();
							}
				
							if(Id_activo_proveedor.length <= 0) {
								if ($("#idareasesion").val() == 1) {
									loadOptionBandejas('mantenimiento-preventivo.php?Id_Menu=4&Id_Submenu=2&abriractivo='+Id_Activo,'contenedorprincipalactivofijo','2943');
									//$("#linkMantenimiento").click();
								}
							}
						}
						else {
							$("#linkMantenimiento").hide();
						}

						$('#altaEquipo').modal('hide');
						$('#tablaactivos').DataTable().ajax.reload();
					}
					else {
						mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
					}
				},
				error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
				}
			});

		}
	});


	
	$("#guardar3").click(function () {
		var Agregar = true;
		var mensaje_error = "";
		//Usuario Logueado
		var Id_Usuario=$("#usuariosesion").val();
		var Id_Activo=$("#Id_Activo").val();
		var Id_Activo_Contabilidad=$("#Id_Activo_Contabilidad").val();
		var centro_costos=$("#centro_costos").val();
		var no_capex=$.trim($("#no_capex").val());
		var Prorrateo=$.trim($("#Prorratear").val());
		var cmbparticipaendepresiacion=$.trim($("#cmbparticipaendepresiacion").val());
		var fecha_inicio_depr=$.trim($("#fecha_inicio_depr").val());
		var url_factura=$.trim($("#url_factura").val());
		var url_xml_contabilidad=$.trim($("#url_xml_contabilidad").val());
		
		var strDatos="";
		
		
		if (centro_costos.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar el centro de costos<br />";
		}
		
		/*if (no_capex <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar el Número de Capex<br />";
		}*/
		
		if (cmbparticipaendepresiacion== -1) {
			Agregar = false; 
			mensaje_error += " -Selecciona la opción de participa en depreciación<br />";
		}
		
		if ($("#cmbparticipaendepresiacion").val() == 1)
		{
		if (fecha_inicio_depr <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar la fecha de inicio de depreciación<br />";
		}else{
			fecha_inicio_depr=fecha_inicio_depr.substring(6, 10)+"-"+fecha_inicio_depr.substring(3, 5)+"-"+fecha_inicio_depr.substring(0, 2);
		}
		}
				
		
		if (Id_Activo.length <= 0) {
			Agregar = false; 
			mensaje_error = " -Debe capturarse primero el activo en Datos Generales<br />";
		}
		
		if (!Agregar) {
			mensajesalerta("Informaci&oacute;n", mensaje_error, "info", "dark");			
		}
		
		
		if(Agregar)
		{
	        /* Obligatorios */
			strDatos += "Id_Activo="+Id_Activo;
			strDatos += "&Id_Activo_Contabilidad="+Id_Activo_Contabilidad;
			strDatos += "&Centro_Costos="+centro_costos; 
			strDatos += "&No_Capex="+no_capex; 
			strDatos += "&Prorrateo="+Prorrateo,
			strDatos += "&Participa_Depreciacion="+cmbparticipaendepresiacion;
			strDatos += "&Fecha_Inicio_Depr="+fecha_inicio_depr;
			strDatos += "&Url_Factura="+url_factura;
			strDatos += "&Url_Xml="+url_xml_contabilidad;

			/* Opcionales */
		
		
			if(Id_Activo_Contabilidad.length <= 0)
			{
				strDatos += "&Usr_Inser="+Id_Usuario;
				strDatos += "&Estatus_Reg=1";				
				strDatos += "&accion=guardar";
			}
			else
			{
				//strDatos += "&Id_activo_proveedor="+Id_activo_proveedor;
				strDatos += "&Usr_Mod="+Id_Usuario;
				strDatos += "&Estatus_Reg=2";				
				strDatos += "&accion=guardar";
			}
		
			$.ajax({
				type: "POST",
				encoding:"UTF-8",
				url: "../fachadas/activos/siga_activos_contabilidad/Siga_activos_contabilidadFacade.Class.php",        
				async: false,
				data: strDatos,
				dataType: "html",
				beforeSend: function (xhr) {

				},
				success: function (datos) {
					var json;
					json = eval("(" + datos + ")"); //Parsear JSON
					
					if(json.totalCount>0){
						var eliminar_archivo="";
						$("#Id_Activo_Contabilidad").val(json.data[0]["Id_Activo_Contabilidad"]);
						if(json.data[0]["Id_Activo_Contabilidad"]!=""){
							eliminar_archivo="no";
						}
						
						$("#url_factura").val(json.data[0]["Url_Factura"]);
						if($('#url_factura').val()!=""){
							var Contabilidad_Factura = $('#url_factura').val().indexOf("---");
							if(Contabilidad_Factura!=-1){
								mostrar_archivos_lista($('#url_factura').val(), "divContabilidad_Adjuntar_Factura_lista", Ruta_Archivos_Contabilidad, "si", "url_factura", eliminar_archivo);
							}else{
								mostrar_archivos_lista($('#url_factura').val(), "divContabilidad_Adjuntar_Factura_lista", Ruta_Archivos_Contabilidad, "no", "url_factura", eliminar_archivo);
							}
						}
						
						$("#url_xml_contabilidad").val(json.data[0]["Url_Xml"]);	
						if($('#url_xml_contabilidad').val()!=""){
							var Contabilidad_Xml = $('#url_xml_contabilidad').val().indexOf("---");
							if(Contabilidad_Xml!=-1){
								mostrar_archivos_lista($('#url_xml_contabilidad').val(), "divContabilidad_Adjuntar_Xml_lista", Ruta_Archivos_Contabilidad, "si", "url_xml_contabilidad", eliminar_archivo);
							}else{
								mostrar_archivos_lista($('#url_xml_contabilidad').val(), "divContabilidad_Adjuntar_Xml_lista", Ruta_Archivos_Contabilidad, "no", "url_xml_contabilidad", eliminar_archivo);
							}
						}
					}
					
					
					if(Id_Activo_Contabilidad.length <= 0)
			        {
			 		//limpiarcamposcontabilidad();
					mensajesalerta("&Eacute;xito", "Guardado Correctamente.", "success", "dark");
					}
					else
					mensajesalerta("&Eacute;xito", "Actualizado Correctamente.", "success", "dark");	
					//$('#altaEquipo').modal('hide');
					$('#tablaactivos').DataTable().ajax.reload();
				
				},
				error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
				}
			});
		}
	});
	
	
	//Autocomplete activos BAJA	
	autocomplete_baja();
	function autocomplete_baja(){
		//Area
		var Id_Area=$("#idareasesion").val();
		var strdatos="";
		
		if(Id_Area != "5"){
			strdatos={
				Id_Area:Id_Area,
				Estatus_Reg:"1",
				accion: 'autocomplete_activos'
			}
		}
		else{
			strdatos={
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
							if($("#hddperfil").val()=="68"){
								if(json.data[i].Id_Clase=="17") {
									activos+='<option value="'+json.data[i].Id_Activo+'">'+json.data[i].AF_BC+' '+json.data[i].Nombre_Activo+'</option>';
								}
							}
							else {
								activos+='<option value="'+json.data[i].Id_Activo+'">'+json.data[i].AF_BC+' '+json.data[i].Nombre_Activo+'</option>';
							}
						}
						activos+='</optgroup>';
						$('#AF_BC_baja').html(activos);
						$("#gifcargando1").hide();
						$("#AF_BC_baja").show();
						$('#AF_BC_baja').selectize();
					}
					else {
						$("#gifcargando1").hide();
						activos+='<option>--Sin Resultados--</option>';
						activos+='<optgroup label="Activos">';
						activos+='</optgroup>';
						$('#AF_BC_baja').html(activos);
						$("#AF_BC_baja").show();
					}

			},
			error: function (objeto, quepaso, otroobj) {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
				$('#AF_BC_baja').append($('<option>', { value: "-1" }).text("Sin resultados"));
			}
		});
	}
	
	autocomplete_padre();
	function autocomplete_padre(){
		//Area
		var Id_Area=$("#idareasesion").val();
		var strdatos="";
		
		if(Id_Area!="5"){
			strdatos={
				Id_Area:Id_Area,
				Estatus_Reg:"1",
				accion: 'autocomplete_activos'
			}
		}else{
			strdatos={
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
							activos+='<option value="'+json.data[i].Id_Activo+'">'+json.data[i].AF_BC+' '+json.data[i].Nombre_Activo+'</option>';
						}
						activos+='</optgroup>';
						$('#activopadre').html(activos);

						$("#gifcargando1").hide();
						$("#activopadre").show();
							
						$('#activopadre').selectize({
							//sortField: 'text'
						});
					}
					else {
						$("#gifcargando1").hide();
						activos+='<option>--Sin Resultados--</option>';
						activos+='<optgroup label="Activos">';
						activos+='</optgroup>';
						$('#activopadre').html(activos);
						$("#activopadre").show();
					}

			},
			error: function (objeto, quepaso, otroobj) {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
				$('#activopadre').append($('<option>', { value: "-1" }).text("Sin resultados"));
			}
		});
	}
	
	$("#AF_BC").focusout(function(e){

        if ($("#Id_Activo").val() == "" && $("#AF_BC").val() != "")
		{			
		$.ajax({
				type: "POST",
				url: "validaactivo.php",
				data: {
					AF_BC:this.value,
				},
				async: false,
				dataType: "html",
				beforeSend: function (objeto) {
				},
				success: function (datos) {
					var data = "";
						data = eval("(" + datos + ")"); //Parsear JSON
						//alert(data.length);
						if (data.length > 0) 
						{
							mensajesalerta("", "El activo ya existe, no es posible duplicarse", "error", "dark");
                            valida = false;	
							$("#AF_BC").val("");						
						}

				},
				error: function (objeto, quepaso, otroobj) {
					mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
				}
			});
		}
		
		var activo = $("#AF_BC").val();
		if(Math.floor(activo) == activo && $.isNumeric(activo)) 
		{
			//alert('entero');
			//alert(pad(activo, 6)); 
			$("#AF_BC").val(pad(activo, 6));
		}
	});
	
	function pad (str, max) {
  str = str.toString();
  return str.length < max ? pad("0"+str, max) : str;
}
	
	$("#AF_BC_baja").change(function() {
		$("#Id_Activo_Baja_Form").val("");
		$("#Serie_baja").val("");
		$("#marca_baja").val("");
		$("#modelo_baja").val("");
		$("#cmbestatus_baja").val("");
		$("#cmbarea_baja").val("");
		$("#cmbubicacionprimaria_baja").val("");
		$("#cmbubicacionsecundaria_baja").val("");
		$("#desccorta_baja").val("");
		$("#jefearea_baja").val("");
		
		var valida = true;
		
		if ($("#Id_baja_activo").val() == "")
		{
			if(this.value!=""){
				$.ajax({
					type: "POST",
					url: "obtenbajaactivo.php",
					data: {
						Id_Activo:this.value,
					},
					async: false,
					dataType: "html",
					beforeSend: function (objeto) {
					},
					success: function (datos) {
						var data = "";
							data = eval("(" + datos + ")"); //Parsear JSON
							//alert(data.length);
							if (data.length > 0) 
							{
								mensajesalerta("", "El activo ya se encuentra dado de baja", "error", "dark");
								valida = false;							
							}
	
					},
					error: function (objeto, quepaso, otroobj) {
						mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
					}
				});
			}
			if (valida)
				if(this.value!=""){
					$.ajax({
						type: "POST",
						url: "obtendatoscontabilidad.php",
						data: {
							Id_Activo:this.value,
						},
						async: false,
						dataType: "html",
						beforeSend: function (objeto) {
						},
						success: function (datos) {
							var data = "";
								data = eval("(" + datos + ")"); //Parsear JSON
								//alert(data.length);
								if (data.length > 0) 
								{
									//if (data[0].Participa_Depreciacion == 1)
									//{
									//console.log(data[0].Cuent_Cont_Act);
									$("#Cuenta_baja").val(data[0].Cuent_Cont_Baja);
									//mensajesalerta("", "El activo ya se encuentra dado de baja", "error", "dark");
									//valida = false;			
									/*}
									else
									{
										mensajesalerta("", "El activo no tiene datos de contabilidad, deben ser proporcionados para realizar la baja 1", "error", "dark");
										valida = false;
									}*/
								}
								else
								{
									//mensajesalerta("", "El activo no tiene datos de contabilidad, deben ser proporcionados para realizar la baja 2", "error", "dark");
					  //valida = false;
								}

						},
						error: function (objeto, quepaso, otroobj) {
							mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
						}
					});
				}
			}
		
		
		if (valida)
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
						var data = "";
							data = eval("(" + datos + ")"); //Parsear JSON
	
							if (data.totalCount > 0) {
								$("#Id_Activo_Baja_Form").val(data.data[0].Id_Activo);
								$("#Serie_baja").val(data.data[0].NumSerie);
								$("#marca_baja").val(data.data[0].Marca);
								$("#modelo_baja").val(data.data[0].Modelo);
								$("#cmbestatus_baja").val(data.data[0].Estatus_Reg);
								$("#cmbarea_baja").val(data.data[0].Id_Area);
								$("#cmbubicacionprimaria_baja").val(data.data[0].Id_Ubic_Prim);
								$("#cmbubicacionsecundaria_baja").val(data.data[0].Id_Ubic_Sec);
								$("#desccorta_baja").val(data.data[0].DescCorta);
								$("#jefearea_baja").val(data.data[0].Jefe_Area);	
								
							}else {
								//mensajesalerta("", "No se encontraron resultados", "error", "dark");
							}
	
					},
					error: function (objeto, quepaso, otroobj) {
						mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
					}
				});
			}
	});
	
	
	autocomplete_reubicacion();
	
	//Autocomplete usuarios BAJA	
	autocomplete_usuarios_baja();
	function autocomplete_usuarios_baja(){
		var strdatos="";
		
		strdatos={
			Estatus_Reg:"1",
			accion: 'consultar'
		}
		
			
		$.ajax({
			type: "POST",
			url: "../fachadas/activos/siga_usuarios/Siga_usuariosFacade.Class.php",
			data: strdatos,
			async: false,
			dataType: "html",
			beforeSend: function (objeto) {
				$("#gif_usuario_baja").show();
			},
			success: function (datos) {
				var json = "";
					json = eval("(" + datos + ")"); //Parsear JSON
					var usr_baja='';
					if (json.totalCount > 0) {

						
						usr_baja+='<option></option>';
						usr_baja+='<optgroup label="Usuarios Baja">';
						
						for (var i = 0; i < json.totalCount; i++) {
							usr_baja+='<option value="'+json.data[i].Id_Usuario+'">'+json.data[i].No_Usuario+'-'+json.data[i].Nombre_Usuario+'</option>';
						}
						usr_baja+='</optgroup>';
						$('#Usuario_soli_baja').html(usr_baja);

						$("#gif_usuario_baja").hide();
						$("#Usuario_soli_baja").show();
							
						$('#Usuario_soli_baja').selectize({
							//sortField: 'text'
						});
					}
					else {
						$("#gif_usuario_baja").hide();
						usr_baja+='<option>--Sin Resultados--</option>';
						usr_baja+='<optgroup label="Usuario Baja">';
						usr_baja+='</optgroup>';
						$('#Usuario_soli_baja').html(usr_baja);
						$("#Usuario_soli_baja").show();
					}

			},
			error: function (objeto, quepaso, otroobj) {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
				$('#Usuario_soli_baja').append($('<option>', { value: "-1" }).text("Sin resultados"));
			}
		});
	}
	
	
	
	function autocomplete_reubicacion(){
		//Area
		var Id_Area=$("#idareasesion").val();
		var strdatos="";
		
		if(Id_Area!="5"){
			strdatos={
				Id_Area: Id_Area,
				Estatus_Reg:"1",
				accion: 'autocomplete_activos'
			}
		}else{
			strdatos={
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
				$("#gifcargando2").show();
			},
			success: function (datos) {
				var json = "";
					json = eval("(" + datos + ")"); //Parsear JSON
					var activos='';
					if(json.totalCount > 0){
						activos+='<option></option>';
						activos+='<optgroup label="Activos">';
						
						for (var i = 0; i < json.totalCount; i++) {
							activos+='<option value="'+json.data[i].Id_Activo+'">'+json.data[i].AF_BC+' '+json.data[i].Nombre_Activo+'</option>';
						}
						activos+='</optgroup>';
						$('#AF_BC_reubicacion').html(activos);

						$("#gifcargando2").hide();
						$("#AF_BC_reubicacion").show();
							
						$('#AF_BC_reubicacion').selectize({
							//sortField: 'text'
						});
					}else {
						$("#gifcargando2").hide();
						activos+='<option>--Sin Resultados--</option>';
						activos+='<optgroup label="Activos">';
						activos+='</optgroup>';
						$('#AF_BC_reubicacion').html(activos);
						$("#AF_BC_reubicacion").show();
					}
					
					
					//

			},
			error: function (objeto, quepaso, otroobj) {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
				$('#AF_BC_reubicacion').append($('<option>', { value: "-1" }).text("Sin resultados"));
			}
		});
	}
	
	$("#AF_BC_reubicacion").change(function() {
		$("#Id_Activo_reubicacion_Form").val("");
		$("#Serie_reubicacion").val("");
		$("#marca_reubicacion").val("");
		$("#responsable_procedencia").val("");
		$("#ubic_especifica_procedencia").val("");
		$("#modelo_reubicacion").val("");
		$("#cmbestatus_reubicacion").val("");
		$("#cmbarea_reubicacion").val("");
		$("#cmbubicacionprimaria_reubicacion").val("");
		$("#cmbubicacionsecundaria_reubicacion").val("");
		$("#desccorta_reubicacion").val("");
		$("#jefearea_reubicacion").val("");
		$("#centro_costos_guardar").val(-1);
		
		var valida = true;
		
		if ($("#Id_reubicacion_activo").val() == "")
		$.ajax({
				type: "POST",
				url: "obtenbajaactivo.php",
				data: {
					Id_Activo:this.value,
				},
				async: false,
				dataType: "html",
				beforeSend: function (objeto) {
				},
				success: function (datos) {
					var data = "";
						data = eval("(" + datos + ")"); //Parsear JSON
						//alert(data.length);
						if (data.length > 0) 
						{
							mensajesalerta("", "El activo se encuentra dado de baja", "error", "dark");
                            valida = false;							
						}

				},
				error: function (objeto, quepaso, otroobj) {
					mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
				}
			});		
			
			if (valida)
				if(this.value!=""){
			$.ajax({
								type: "POST",
								url: "obtendatoscontabilidad.php",
								data: {
									Id_Activo:this.value,
								},
								async: false,
								dataType: "html",
								beforeSend: function (objeto) {
								},
								success: function (datos) {
									var data = "";
										data = eval("(" + datos + ")"); //Parsear JSON
										//alert(data.length);
										if (data.length > 0) 
										{
											if (data[0].Participa_Depreciacion == 1)
							        {
											//console.log(data[0].Cuent_Cont_Act);
											$("#Cuenta_reubicacion").val(data[0].Cuent_Cont_Dep);
											//mensajesalerta("", "El activo ya se encuentra dado de baja", "error", "dark");
											//valida = false;		
											}		
											else
										    {
											 //mensajesalerta("", "El activo no tiene datos de contabilidad, deben ser proporcionados para realizar la reubicacion", "error", "dark");
											 //valida = false;
										    }											
										}
										else
										{
											//mensajesalerta("", "El activo no tiene datos de contabilidad, deben ser proporcionados para realizar la reubicacion", "error", "dark");
											//valida = false;
										}

								},
								error: function (objeto, quepaso, otroobj) {
									mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
								}
							});	
	              }
		
		if (valida)
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
					var data = "";
						data = eval("(" + datos + ")"); //Parsear JSON

						if (data.totalCount > 0) {
							
							$("#Id_Activo_reubicacion_Form").val(data.data[0].Id_Activo);
							$("#Serie_reubicacion").val(data.data[0].NumSerie);
							$("#marca_reubicacion").val(data.data[0].Marca);
							$("#modelo_reubicacion").val(data.data[0].Modelo);
							$("#cmbestatus_reubicacion").val(data.data[0].Estatus_Reg);
							$("#cmbarea_reubicacion").val(data.data[0].Id_Area);
							$("#cmbubicacionprimaria_reubicacion").val(data.data[0].Id_Ubic_Prim);
							$("#cmbubicacionsecundaria_reubicacion").val(data.data[0].Id_Ubic_Sec);
							$("#desccorta_reubicacion").val(data.data[0].DescCorta);
							$("#jefearea_reubicacion").val(data.data[0].Jefe_Area);
							$("#responsable_procedencia").val(data.data[0].Nombre_Completo);
							$("#ubic_especifica_procedencia").val(data.data[0].Especifica);
							
						}else {
							mensajesalerta("", "No se encontraron resultados", "error", "dark");
						}

				},
				error: function (objeto, quepaso, otroobj) {
					mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
				}
			});
		}
	});
	
	//Autocomplete Usuarios Resguardo
	usuarios_empleados();
	function usuarios_empleados(){
		$.ajax({
			type: "POST",
			url: "../fachadas/activos/siga_v_empleados_activo_fijo/Siga_v_empleados_activo_fijoFacade.Class.php",
			data: {
				accion: 'consultar'
			},
			async: false,
			dataType: "html",
			beforeSend: function (objeto) {
				$("#gifcargandoaltausuarios").show();
			},
			success: function (datos) {
				var json = "";
					json = eval("(" + datos + ")"); //Parsear JSON

					if (json.totalCount > 0) {

						var usuarios='';
						usuarios+='<option></option>';
						usuarios+='<optgroup label="Empleado Resguardo">';
						if($("#idareasesion").val()==2){
							usuarios+='<option value="99999">99999-STOCK TI</option>';
						}
						
						for (var i = 0; i < json.totalCount; i++) {
							usuarios+='<option value="'+json.data[i].num_empleado.trim()+'">'+json.data[i].num_empleado.trim()+'-'+json.data[i].nombre_completo.trim()+'</option>';
						}
						usuarios+='</optgroup>';
						$('#numempleadoresguardo').html(usuarios);

						$("#gifcargandoaltausuarios").hide();
						$("#numempleadoresguardo").show();
							
						$('#numempleadoresguardo').selectize({
							//sortField: 'text'
						});
					}
					else {
						$("#gifcargandoaltausuarios").hide();
						$('#numempleadoresguardo').append($('<option>', { value: "" }).text("Sin resultados"));
					}

			},
			error: function (objeto, quepaso, otroobj) {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
				$('#numempleadoresguardo').append($('<option>', { value: "-1" }).text("Sin resultados"));
			}
		});
	}
	
	$("#numempleadoresguardo").change(function() {
		$("#nombreempleadoresguardo").val("");
		if(this.value!=""){
			var valor = $("#numempleadoresguardo option:selected").html();
			var res = valor.split("-");
			
			$("#nombreempleadoresguardo").val(res[1]);
		}
	});
	

	// Acción para guardar la baja del activo
	$("#generarbaja").click(function () {
		$("#generarbaja").hide();
		var Agregar = true;
		var mensaje_error = "";
		var Id_Activo=$("#Id_Activo_Baja_Form").val();
		var Id_baja=$("#Id_baja_activo").val();
		var Motivo_Baja=$("#cmbbajas").val();
		var Comentarios=$.trim($("#Comentarios_baja").val());
		var Destino=$("#cmbdestinofinal").val();
		var Fecha_Baja=$.trim($("#Fecha_baja").val());
		var Usuario=$.trim($("#Usuario_soli_baja").val());
		var Cuenta_baja=$.trim($("#Cuenta_baja").val());
		var Jefe_Area=$.trim($("#jefearea_baja").val());
		
		var strDatos={};  
		if (Id_Activo.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Selecciona un activo<br />";
		}
		
		if (Motivo_Baja == -1) {
			Agregar = false; 
			mensaje_error += " -Falta agregar el Motivo de la baja del activo<br />";
		}

		if (Comentarios <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar el Comentario<br />";
		}

		if (Destino == -1) {
			Agregar = false; 
			mensaje_error += " -Falta agregar el Destino<br />";
		}
		
		if (Fecha_Baja <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar la Fecha de baja<br />";
		}
		
		if (Usuario <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar el Usuario<br />";
		}
				
		if (!Agregar) {
			mensajesalerta("Informaci&oacute;n", mensaje_error, "info", "dark");			
		}
		
		if(Agregar)
		{
			// Obligatorios
			strDatos.Id_baja=Id_baja;
			strDatos.Id_Activo=Id_Activo;
			strDatos.Motivo_Baja=Motivo_Baja;
			strDatos.Comentarios=Comentarios;	
			strDatos.Cuenta_baja=Cuenta_baja;
			strDatos.Destino=Destino;
			strDatos.Fecha_Baja=Fecha_Baja;
			strDatos.Usuario=Usuario;	
			strDatos.Jefe_Area=Jefe_Area;
			//strDatos.Seg_Usuario_Resp=0;
			
			if (Id_baja.length <= 0) {
				strDatos.Usr_Inser="pruinser";
				strDatos.Estatus_Reg="1";
				strDatos.accion="guardar";
			}
			else {
				//strDatos.Id_baja=Id_baja;
				strDatos.Usr_Mod="prumod";
				strDatos.Estatus_Reg="2";
				strDatos.accion="guardar";
			}

			$.ajax({
				type: "POST",
				encoding:"UTF-8",
				url: "../fachadas/activos/siga_baja_activo/Siga_baja_activoFacade.Class.php",
				async: false,
				data: strDatos,
				dataType: "html",
				beforeSend: function (xhr) {
				},
				success: function (datos) {
					//Parsear JSON
					var json = eval("(" + datos + ")");
					// Evento que dispara la subida de archivos que fueron agregados al input file de manera programatica
					$('#ArchivosBajaAreaInputFile').fileinput('upload');
					
					// Cierra el control
					$('#bajaEquipo').modal("hide");
					if(json.totalCount > 0) {
						if(json.data[0].Id_baja != "") {
							enviaCorreoBaja(Id_Activo,json.data[0].Id_baja,Usuario,1);
						}
						mensajesalerta("&Eacute;xito", "Guardado Correctamente.", "success", "dark");
						//$("#generarbaja").show();
						$('#tablaactivos').DataTable().ajax.reload();
						$("#tabEnProceso").click();
						//tablabaja(0);
					}
					else {
						mensajesalerta("Error!", "Ocurrio un error al guardar.", "error", "dark");
					}
					// Limpia el formulario de baja de activos
					setTimeout(function() { limpiarcamposbaja() }, 1000);
				},
				error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
					$("#generarbaja").show();	
				}
			});
		}
		else {
			$("#generarbaja").show();
		}
	});

	// Función
	function enviaCorreoBaja(Id_Activo,Id_Baja,usuario,Paso) {
		$.ajax({
			type: "POST",
			encoding:"UTF-8",
			url: "../vistas/enviacorreobaja.php",
			async: false,
			data: { Id_Activo:Id_Activo, Id_Baja:Id_Baja, Paso:Paso, Usuario:usuario},
			dataType: "html",
			beforeSend: function (xhr) {

			},
			success: function (datos) {
				mensajesalerta("&Eacute;xito", "Correo enviado Correctamente.", "success", "dark");	
				$("#generarbaja").show();
			},
			error: function () {
				mensajesalerta("Oh No!", "Ocurrio un error al enviar.", "error", "dark");
			}
		});
	}

	
	function enviaCorreoAlta(Id_Activo,usuario)
	{
		$.ajax({
				type: "POST",
				encoding:"UTF-8",
				url: "../vistas/enviacorreoalta.php",        
				async: false,
				data: {Id_Activo:Id_Activo,Usuario:usuario},
				dataType: "html",
				beforeSend: function (xhr) {

				},
				success: function (datos) {
					
					mensajesalerta("&Eacute;xito", "Correo enviado a Contabilidad.", "success", "dark");	
					$("#generarbaja").show();
				},
				error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al enviar.", "error", "dark");
				}
			});
	}
	
  
    $("#generarreubicacion").click(function () {
			
		var Agregar = true;
		var mensaje_error = "";
		var Id_Activo=$("#Id_Activo_reubicacion_Form").val();
		var Id_Activo_Reubicacion=$("#Id_reubicacion_activo").val();
		//Usuario Logueado
		var Id_Usuario_Sesion=$("#usuariosesion").val();
		var Cuenta_reubicacion=$.trim($("#Cuenta_reubicacion").val());
		var Id_Area=$.trim($("#cmb_area_guardar").val());
		var Id_Ubic_Prim=$.trim($("#cmb_ubic_prim_reub_guar").val());
		var Id_Ubic_Sec=$.trim($("#cmb_ubic_sec_reub_guar").val());
		var responsable_procedencia=$.trim($("#responsable_procedencia").val());
		var Ubic_Especifica=$.trim($("#ubic_especifica_guardar").val());
		var Id_Usuario_Responsable=$.trim($("#numempleadoreubicacion").val());
		var Nom_Usuario_Reponsable=$.trim($("#usuario_resp_guardar").val());
		var Centro_Costos=$.trim($("#centro_costos_guardar").val());
		var Jefe_Area=$.trim($("#jefearea_reubicacion").val());
		var Motivo_Reubicacion=$.trim($("#Motivo_Reubicacion").val());
		var Comentarios_Reubicacion=$.trim($("#comentarios_reubicacion").val());
		
		//var Foto=$.trim($("#Url_Foto_Activo").val());
		var strDatos=""; 
		
		if (Id_Activo.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Selecciona un activo<br />";
		}
		
		if (Id_Area == "-1") {
			Agregar = false; 
			mensaje_error += " -Falta agregar el Area<br />";
		}
		
		if (Id_Ubic_Prim == "-1") {
			Agregar = false; 
			mensaje_error += " -Falta agregar la ubicaci&oacute;n primaria<br />";
		}
		
		if (Id_Ubic_Sec == "-1") {
			Agregar = false; 
			mensaje_error += " -Falta agregar la ubicaci&oacute;n secundaria<br />";
		}
		
		if (Ubic_Especifica == "") {
			Agregar = false; 
			mensaje_error += " -Falta agregar la ubicaci&oacute;n especifica<br />";
		}
		
		if (Nom_Usuario_Reponsable <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar el usuario responsable<br />";
		}
		
		
		if (Centro_Costos == "-1") {
			Agregar = false; 
			mensaje_error += " -Falta agregar el centro de costos<br />";
		}
		/*
		if (Jefe_Area <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar el Jefe de área<br />";
		}*/
		
		if (Motivo_Reubicacion <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar el motivo de la reubicaci&oacute;n<br />";
		}
		
		
		if (!Agregar) {
			mensajesalerta("Informaci&oacute;n", mensaje_error, "info", "dark");			
		}
		
		if(Agregar)
		{
	        /* Obligatorios */
			strDatos = "Id_Activo_Reubicacion="+Id_Activo_Reubicacion;
			strDatos += "&Id_Activo="+Id_Activo;
			
			strDatos += "&Id_Area="+Id_Area; 
			strDatos += "&Id_Ubic_Prim="+Id_Ubic_Prim;
			strDatos += "&Id_Ubic_Sec="+Id_Ubic_Sec;
			strDatos += "&Ubic_Especifica="+Ubic_Especifica;
			strDatos += "&Id_Usuario_Responsable="+Id_Usuario_Responsable;
			strDatos += "&Nom_Usuario_Reponsable="+Nom_Usuario_Reponsable;
			strDatos += "&Centro_Costos="+Centro_Costos;
			strDatos += "&Jefe_Area="+Jefe_Area;
			strDatos += "&Cuenta_reubicacion="+Cuenta_reubicacion;
			strDatos += "&Motivo_Reubicacion="+Motivo_Reubicacion;
			strDatos += "&Comentarios_Reubicacion="+Comentarios_Reubicacion;
	
			if(Id_Activo_Reubicacion.length <= 0){
				strDatos += "&Usr_Inser="+Id_Usuario_Sesion;
				strDatos += "&Estatus_Reg=1";				
				strDatos += "&accion=guardar";
			}
			else{
				strDatos += "&Usr_Mod="+Id_Usuario_Sesion;
				strDatos += "&Estatus_Reg=2";				
				strDatos += "&accion=guardar";
			}
		
			$.ajax({
				type: "POST",
				encoding:"UTF-8",
				url: "../fachadas/activos/siga_reubicacion_activo/Siga_reubicacion_activoFacade.Class.php",        
				async: false,
				data: strDatos,
				dataType: "html",
				beforeSend: function (xhr) {

				},
				success: function (datos) {
					var json;
					json = eval("(" + datos + ")"); //Parsear JSON
					if (json.totalCount > 0) {
						limpiarcamposreubicacion();
						$('#reubicacionEquipo').modal("hide");
						
						mensajesalerta("&Eacute;xito", "Reubicacion guardada correctamente.", "success", "dark");	
						actualizaReubicacion(Id_Activo,Id_Area,Id_Ubic_Prim,Id_Ubic_Sec,Ubic_Especifica,Centro_Costos,Id_Usuario_Sesion, Id_Usuario_Responsable, Nom_Usuario_Reponsable, responsable_procedencia, json.data[0].Id_Activo_Reubicacion);
						$('#tablaactivos').DataTable().ajax.reload();
						tablareubicacion();
					}else{
						alert("Ocurrio un error al crear la reubicacion");
					}
				},
				error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
				}
			});
		}
	});
  
  
	function actualizaReubicacion(Id_Activo,Id_Area,Id_Ubic_Prim,Id_Ubic_Sec,Ubic_Especifica,Centro_Costos,Id_Usuario_Sesion, Id_Usuario_Responsable, Nom_Usuario_Reponsable, Responsable_Procedencia, Id_Activo_Reubicacion) {
		$.ajax({
			type: "POST",
			encoding:"UTF-8",
			url: "../vistas/actualizaReubicacion.php",        
			async: false,
			data: {Id_Activo:Id_Activo,Id_Area:Id_Area,Id_Ubic_Prim:Id_Ubic_Prim,Id_Ubic_Sec:Id_Ubic_Sec,Ubic_Especifica:Ubic_Especifica,Centro_Costos:Centro_Costos,Id_Usuario_Sesion:Id_Usuario_Sesion, Id_Usuario_Responsable:Id_Usuario_Responsable, Nom_Usuario_Reponsable:Nom_Usuario_Reponsable, Responsable_Procedencia:Responsable_Procedencia, Id_Activo_Reubicacion:Id_Activo_Reubicacion},
			dataType: "html",
			beforeSend: function (xhr) {
			},
			success: function (datos) {
				//mensajesalerta("&Eacute;xito", "Correo enviado Correctamente.", "success", "dark");
			},
			error: function () {
				mensajesalerta("Oh No!", "Ocurrio un error al enviar.", "error", "dark");
			}
		});
	}

	// TABLA DINAMICA DONDE SE MUESTRAN LOS INVENTARIOS
	$('#tablaactivos').DataTable({
		"lengthMenu": [ [10, 25, 50, 100, 100000], [10, 25, 50, 100, "Todos"] ],
		// Esqueleto del datatable completo (B: botones; l: longitud de cuantos resultados va a mostrar; f: filtros; <: agrega un div; "table-responsive" agrega la clase al div; t: tabla; >:cierra el div; i: información ; p: paginación)
		//"dom": '<"text-center"B><"row"<"col-md-6"l><"col-md-6"f>><"table-responsive"t>ip',
		"dom": '<"text-center"B><"row"<"col-md-6"l><"col-md-6"f>><t>ip',
		// Celdas a exportar en el documento Excel, empezando por el indice 0
		// Elimina también clases que definen el botón
		"buttons": [{
			text: '<i class="fa fa-file-excel-o"></i> Exportar a Excel',
			className: 'btn chs export',
			extend: 'excelHtml5',
			init: function (api, node, config) {
				jQuery(node).removeClass('dt-button buttons-excel buttons-html5')
			}
		}],
		"scrollY": 500,
		"scrollX": true,
		"processing": true,
		"serverSide": true,
		"ajax": { 
			"url": "../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",
			"type": "POST",
			"data": {
				Id_Area: $("#idareasesion").val(),
				orden: 'Fech_Inser',
				dir: 'desc',
				estatus: 'soloactivos',
				perfil: $("#hddperfil").val(),
				Filtro_AF_BC_Activos: function() { return $("#hdd_filt_afbc_activos").val(); },
				Filtro_Nombre_Activos: function() { return $("#hdd_filt_nombre_activos").val(); },
				Filtro_Clasific_Activos: function() { return $("#hdd_filt_clasif_activos").val(); },
				Filtro_Marca_Activos: function() { return $("#hdd_filt_marca_activos").val() },
				Filtro_Modelo_Activos: function() { return $("#hdd_filt_modelo_activos").val() },
				Filtro_NumSerie_Activos: function() { return $("#hdd_filt_num_serie_activos").val(); },
				Filtro_Propiedad_Activos: function() { return $("#hdd_filt_propiedad_activos").val() },
				Filtro_Usr_Responsable_Activos: function() { return $("#hdd_filt_resp_activos").val() },
				Filtro_UPrimaria_Activos: function() { return $("#hdd_filt_uprim_activos").val() },
				Filtro_USecundaria_Activos: function() { return $("#hdd_filt_usec_activos").val() },
				Filtro_Estatus_Activos: function() { return $("#hdd_filt_estatus_activos").val() },
				Filtro_Importe_Seguro_Activos: function() { return $("#hdd_filt_importe_seguro_activos").val() },
				Filtro_Monto_Factura_Activos: function() { return $("#hdd_filt_monto_factura_activos").val() },
				Filtro_Fecha_Alta_Activos: function() { return $("#hdd_filt_fecha_alta_activos").val() }
			}
		},
		"columnDefs": [
			{ className: "celdaCentradaVertical", "targets": [ 0, 1 ] }
		],
		"columns": [
			//{ "data": "AF_BC", "visible": false },
			{
				"data": function (obj) {
					var opciones = new Array();
					opciones.push('<div class="text-center"><span class="cursor-pointer" onclick="pasarvalores(' + obj.Id_Activo + ',0)" title="Editar los datos del Activo"><i class="fa fa-pencil" aria-hidden="true"></i></span></div>');
					opciones.push('<div class="text-center"><span class="cursor-pointer" onclick="pasarelimina(' + obj.Id_Activo + ')" title="Eliminar el Activo"><i class="fa fa-trash" aria-hidden="true"></i></span></div>');
					return opciones.join("");
				}
			},
			{
				"data": function (obj) {
					var opciones = new Array();
					opciones.push('<div class="text-center"><a target="_blank" href="../controladores/activos/siga_activos/Reporte-Alta.php?Id_Activo=' + obj.Id_Activo + '" title="Click para ver el PDF"><span class="span-file-adjunto"><i class="fa fa-paperclip fa-file-adjunto" aria-hidden="true"></i></span></a></div>');
					if(obj.CuentaAccesoriosConsumibles > 0) {
						opciones.push('<div class="text-center"><a href="#" onclick="verAccesorioConsumible(this);" data-id-activo="' + obj.Id_Activo + '" title="Click para ver los accesorios y consumibles ligados al Activo"><span class="span-file-adjunto"><i class="fa fa-object-group fa-file-adjunto" aria-hidden="true"></i></span></a></div>');
					}
					return opciones.join("");
				}
			},
			{
				"data": "AF_BC"
			},
			{
				"data": function (obj) {
					var Foto = "";
					if(obj.Foto != null) {
						var Foto_Activo = obj.Foto.indexOf("---");
						if(Foto_Activo != -1) {
							Foto_Activo = obj.Foto.split('---');
							Foto = '<img src="../Archivos/Archivos-Activos/' + Foto_Activo[0] + '" class="img-responsive img-rounded img-inventario-tabla">';
						}
						else {
							Foto = '<img src="../Archivos/Archivos-Activos/' + obj.Foto + '" class="img-responsive img-rounded img-inventario-tabla">';
						}
					}
					else {
						Foto = '<img src="../dist/img/no-camera.png" class="img-responsive img-rounded img-inventario-tabla">';
					}
					return Foto;
				}
			},
			{
				"data": "Nombre_Activo"
			},
			//{ "data": "Area" },
			{ "data": "Clasificacion"},
			{ "data": "Marca"},
			{ "data": "Modelo"},
			{ "data": "NumSerie"},
			{ "data": "Propiedad"},
			//{ "data": "TipoActivo"},
			//{ "data": "DescCorta"},
			{ "data": "Nombre_Completo"},
			{ "data": "UbicacionPrimaria"},
			{ "data": "UbicacionSecundaria"},
			{ "data": "FechaAlta"},
			{ "data": "MontoFactura"},
			{ "data": "Importe_Seguros"},
			{ "data": "Estatus"}
		],
		// Ordenamiento por Fecha de Alta
		"order": [13, "desc"],
		// Lenguaje
		"language": {
			"lengthMenu": "Mostrando _MENU_ registros por p&aacute;gina",
			"zeroRecords": "Sin Resultados",
			"info": "Monstrando p&aacute;gina _PAGE_ de _PAGES_ , total de registros: _MAX_",
			"infoEmpty": "Sin Resultados",
			"infoFiltered": "(Mostrando  _MAX_ del total de registros)",
			"search": "Busqueda: ",
			"paginate": {
				"first": "Primera",
				"last": "Ultima",
				"next": "Siguiente",
				"previous": "Anterior"
			}
		},
		initComplete: function () { // After DataTable initialized
			var listaFiltrosSelect = [];
			this.api().columns().every(function (index) {
				if($("#tablaactivos th:eq(" + index + ")").data("aplicar-filtro")) {
					/* use of [2] for third column.  Leave blank - columns() - for all.
					Multiples? Use columns[0,1]) for first and second, e.g. */
					/*
					var column = this;
					var select = $('<select style="margin-top: 8px;"><option value="">Todos</option></select>')
						 // for multiples use .appendTo( $(column.header()).empty() ) or .appendTo( $(column.footer()).empty() ) 
						.appendTo($(column.header()))
						.on('change', function () {
							var val = $.fn.dataTable.util.escapeRegex($(this).val());
							// Realiza la busqueda sobre la tabla ya cargada
							//column.search(val ? '^' + val + '$' : '', true, false).draw();
							// Realiza la busqueda sobre una nueva consulta a la BD
							
						});
						column.data().unique().sort().each( function ( d, j ) {
							select.append('<option value="' + d + '">' + (d != null ? d.substr(0, 20) : d) + '</option>')
						});
					// Elimina la funcionalidad de ordenamiento al combo select pero se la deja al resto de la celda
					//$(select).click( function(e) { e.stopPropagation(); });
					*/

					var IdSelectFiltro = $("#tablaactivos th:eq(" + index + ")").data("id-select-filtro");
					var CampoReceptor = $("#tablaactivos th:eq(" + index + ")").data("campo-receptor");
					var NombreCampo = $("#tablaactivos th:eq(" + index + ")").data("nombre-campo");
					var IdTabla =  $("#tablaactivos th:eq(" + index + ")").data("id-tabla");
					var select = $('<select id="' + IdSelectFiltro + '" class="filtro-excel" data-id-tabla="' + IdTabla + '" data-id-select-filtro="' + IdSelectFiltro + '" data-campo-receptor="' + CampoReceptor + '" data-nombre-campo="' + NombreCampo + '" multiple="multiple" style="display:none; margin-top: 8px;"></select>')
						//.appendTo($(".table-chs thead td:eq(" + index + ")").empty());
						.appendTo($("#tablaactivos_wrapper .dataTables_scrollHead thead td:eq(" + index + ")").empty());
					listaFiltrosSelect.push(select);
				}
			}); // this.api function

			// Genera los campos de filtrado tipo Excel
			for(var i = 0; i < listaFiltrosSelect.length; i++) {
				filtro_multiselect_generico(listaFiltrosSelect[i]);
			}
			// Inicia la funcionalidad de mover los botones con el scroll horizontal
			movimientoHorizontalBotonesExcel("tablaactivos");
			// Cierra la ventana de espera
			setTimeout(function() { jsRemoveWindowLoad(); }, 1000);
		} //initComplete function
	})
	.on('init.dt', function () {
		// Muestra la ventana de espera
		jsShowWindowLoad("Por favor espere, buscando información");
	});


	// Función que hace el movimiento de los botones de manera horizontal al mover el Scroll en el eje X y evitar que se queden fijos por tener una posición absolute
	function movimientoHorizontalBotonesExcel(IdTabla) {
		$("#" + IdTabla + "_wrapper div.dataTables_scrollBody").on("scroll", function (e) {
			var horizontal = e.currentTarget.scrollLeft;
			$("#" + IdTabla + "_wrapper .dataTables_scrollHead thead td .btn-group").css("left", -(horizontal) + "px");
		});
	}
	
	


  //Date picker
	$('#fechaAl').datepicker({ 
		format: 'dd/mm/yyyy',
	}).datepicker().on('changeDate', function(e) {
	  /*var dateString = $('#fechaAl').val();
	  alert('Fecha1='+dateString);
	  var dateParts = dateString.split("/");
	  var minDateFilter = new Date(dateParts[2], dateParts[1] - 1, dateParts[0]).getTime();*/
	  //alert('Fecha='+minDateFilter);
	  //tablabaja.draw();
   });

$('#fechaAlR').datepicker({ 
    format: 'dd/mm/yyyy',
    }).datepicker().on('changeDate', function(e) {
	  /*var dateString = $('#fechaAl').val();
	  alert('Fecha1='+dateString);
	  var dateParts = dateString.split("/");   
	  var minDateFilter = new Date(dateParts[2], dateParts[1] - 1, dateParts[0]).getTime();*/
	  //alert('Fecha='+minDateFilter);
	  //tablabaja.draw();
      tablareubicacion();
   }); 

$('#fechaDel').datepicker({
    format: 'dd/mm/yyyy',
    }).datepicker().on('changeDate', function(e) {
	  /*var dateString = $('#fechaAl').val();
	  alert('Fecha1='+dateString);
	  var dateParts = dateString.split("/");
	  var minDateFilter = new Date(dateParts[2], dateParts[1] - 1, dateParts[0]).getTime();*/
	  //alert('Fecha='+minDateFilter);
	  //tablabaja.draw();
   });
   
   
   $('#fechaAl_reubic').datepicker({
    format: 'dd/mm/yyyy',
    }).datepicker().on('changeDate', function(e) {
	  /*var dateString = $('#fechaAl').val();
	  alert('Fecha1='+dateString);
	  var dateParts = dateString.split("/");
	  var minDateFilter = new Date(dateParts[2], dateParts[1] - 1, dateParts[0]).getTime();*/
	  //alert('Fecha='+minDateFilter);
	  //tablabaja.draw();
   });
   
   $('#fechaDel_reubic').datepicker({
    format: 'dd/mm/yyyy',
    }).datepicker().on('changeDate', function(e) {
	  /*var dateString = $('#fechaAl').val();
	  alert('Fecha1='+dateString);
	  var dateParts = dateString.split("/");
	  var minDateFilter = new Date(dateParts[2], dateParts[1] - 1, dateParts[0]).getTime();*/
	  //alert('Fecha='+minDateFilter);
	  //tablabaja.draw();
   });

$('#fechaDelR').datepicker({ 
    format: 'dd/mm/yyyy',
    }).datepicker().on('changeDate', function(e) {
	  /*var dateString = $('#fechaAl').val();
	  alert('Fecha1='+dateString);
	  var dateParts = dateString.split("/");
	  var minDateFilter = new Date(dateParts[2], dateParts[1] - 1, dateParts[0]).getTime();*/
	  //alert('Fecha='+minDateFilter);
	  //tablabaja.draw();
      tablareubicacion();
   });    
	

/*Este evento hacia que en las secciones de reportes y otros modulos, arrojara el mensaje de error (objec invalid)
   $.fn.dataTable.ext.search.push(
          function (settings, data, dataIndex) {
        var min = $('#fechaAl').datepicker("getDate");
        //var max = $('#max').datepicker("getDate");
        var startDate = new Date(data[3]);
		alert(min);
		alert(startDate);
        if (min == null) { return true; }
        if (startDate >= min) { return true; }
        return false;
    }
    );
*/
    
	$( "#buscar_baja" ).click(function() {
		tablabaja($("#Estatus_baja").val(), 1);
  });
  
	$( "#exportar_baja" ).click(function() {
		var Fech_Inicial="";
		var Fech_Final="";
		
		var estatusSrc = "baja";	
		var EstatusBaja=$("#Estatus_baja").val();
		if(EstatusBaja==0){ Fech_Inicial=$("#fechaDel").val(); Fech_Final=$("#fechaAl").val();}
		if(EstatusBaja==1){ Fech_Inicial=$("#fechaDel").val(); Fech_Final=$("#fechaAl").val();}
		
		if($("#baja_solicitante").is(':checked')) {estatusSrc= "baja";}
		if($("#baja_direc_financiera").is(':checked')) {estatusSrc= "baja2";}
		if($("#baja_contabilidad").is(':checked')) {estatusSrc= "baja3";}
		var Id_Area=$("#idareasesion").val();
		var perfil=$("#hddperfil").val();
		
		// Creamos el formulario auxiliar
		var form = document.createElement( "form" );

		// Le añadimos atributos como el name, action y el method
		form.setAttribute( "id", "formulario");
		form.setAttribute( "name", "formulario");
		form.setAttribute( "action", "excel_bajas.php" );
		form.setAttribute( "method", "post" );
		
		
		var Area = document.createElement( "input" );
		// Le añadimos atributos como el name, type y el value
		Area.setAttribute( "name", "Id_Area" );
		Area.setAttribute( "type", "hidden" );
		Area.setAttribute( "value", Id_Area );
		// Añadimos el input al formulario
		form.appendChild( Area );
		
		var Estatus = document.createElement( "input" );
		// Le añadimos atributos como el name, type y el value
		Estatus.setAttribute( "name", "estatus" );
		Estatus.setAttribute( "type", "hidden" );
		Estatus.setAttribute( "value", estatusSrc );
		// Añadimos el input al formulario
		form.appendChild( Estatus );
		
		var Id_Tab = document.createElement( "input" );
		// Le añadimos atributos como el name, type y el value
		Id_Tab.setAttribute( "name", "Tab" );
		Id_Tab.setAttribute( "type", "hidden" );
		Id_Tab.setAttribute( "value", EstatusBaja );
		// Añadimos el input al formulario
		form.appendChild( Id_Tab );
		
		var Id_Perfil = document.createElement( "input" );
		// Le añadimos atributos como el name, type y el value
		Id_Perfil.setAttribute( "name", "perfil" );
		Id_Perfil.setAttribute( "type", "hidden" );
		Id_Perfil.setAttribute( "value", perfil );
		// Añadimos el input al formulario
		form.appendChild( Id_Perfil );
		
		
		
		// Creamos un input para enviar el valor
		var FechInicio = document.createElement( "input" );
		// Le añadimos atributos como el name, type y el value
		FechInicio.setAttribute( "name", "Fech_Inicial" );
		FechInicio.setAttribute( "type", "hidden" );
		FechInicio.setAttribute( "value", Fech_Inicial );
		// Añadimos el input al formulario
		form.appendChild( FechInicio );
			
			
		var FechFin = document.createElement( "input" );
		// Le añadimos atributos como el name, type y el value
		FechFin.setAttribute( "name", "Fech_Final" );
		FechFin.setAttribute( "type", "hidden" );
		FechFin.setAttribute( "value", Fech_Final );
		// Añadimos el input al formulario
		form.appendChild( FechFin );
		
		
		// Añadimos el formulario al documento
		document.getElementsByTagName( "body" )[0].appendChild( form );
		// Hacemos submit
		//document.formulario.submit();
		$("#formulario").submit();
		//Se elimina el objeto doom
		$("#formulario").remove();
  });
  
	
	// CREA LA TABLA DE LOS ACTIVOS QUE HAN SIDO DADOS DE BAJA YA SEA DEFINITIVA O EN PROCESO
	tablabaja = function(EstatusBaja, Tab_baja) {
		// Muestra la ventana de espera
		jsShowWindowLoad("Por favor espere, buscando información");

		// Elimina los filtros seleccionados previamente en el campo acumulado de filtros encadenados Tipo Excel
		// Evita que se acumulen filtros de Tablas de Baja diferentes
		lstFiltrosTablaBajas = [];
		$("#lstFiltros_tablebajas").html("");
		$("#campos_hidden_baja_comun input[type=hidden]").val("");


		var Campo_Clase = true;
		if(EstatusBaja == 1) {
			Campo_Clase = false;
		}
		
		var Campo_Motivo_Baja=false;
		if(EstatusBaja == 1) {
			Campo_Motivo_Baja = true;
		}
		
		var Fech_Inicial="";
		var Fech_Final="";
		
		var estatusSrc = "baja";
		$("#Estatus_baja").val(EstatusBaja);
		if(EstatusBaja==0) { if(Tab_baja==0) { $("#baja_solicitante").prop("checked", true); } else { Fech_Inicial=$("#fechaDel").val(); Fech_Final=$("#fechaAl").val(); }}
		if(EstatusBaja==1) { if(Tab_baja==0) { $("#baja_contabilidad").prop("checked", true); } else { Fech_Inicial=$("#fechaDel").val(); Fech_Final=$("#fechaAl").val(); }}
		
		if($("#baja_solicitante").is(':checked')) {estatusSrc= "baja";}
		if($("#baja_direc_financiera").is(':checked')) {estatusSrc= "baja2";}
		if($("#baja_contabilidad").is(':checked')) {estatusSrc= "baja3";}

		//alert(estatusSrc)
		$('#tablebajas').DataTable().clear().destroy();
		$('#tablebajas').DataTable({
			"lengthMenu": [ [10, 25, 50, 100, 100000], [10, 25, 50, 100, "Todos"] ] ,
			// Esqueleto del datatable completo (B: botones; l: longitud de cuantos resultados va a mostrar; f: filtros; <: agrega un div; "table-responsive" agrega la clase al div; t: tabla; >:cierra el div; i: información ; p: paginación)
			"dom": '<"text-center"B><"row"<"col-md-6"l><"col-md-6"f>><"table-responsive"t>ip',
			// Celdas a exportar en el documento Excel, empezando por el indice 0
			// Elimina también clases que definen el botón
			"buttons": [],
			"scrollY": 500,
			"scrollX": true,
			"paging": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"ajax": { 
				"url": "../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",
				"type": "POST",
				"data": {
					Id_Area:$("#idareasesion").val(),
					orden:'AF_BC',
					estatus: estatusSrc,
					Tab:EstatusBaja,
					perfil:$("#hddperfil").val(),
					Fech_Inicial:Fech_Inicial,
					Fech_Final:Fech_Final,
					Filtro_AF_BC_Activos: function() { return $("#hdd_filt_afbc_baja").val(); },
					Filtro_Nombre_Activos: function() { return $("#hdd_filt_nombre_baja").val(); },
					Filtro_Clasific_Activos: function() { return $("#hdd_filt_clasif_baja").val(); },
					Filtro_Marca_Activos: function() { return $("#hdd_filt_marca_baja").val(); },
					Filtro_Modelo_Activos: function() { return $("#hdd_filt_modelo_baja").val(); },
					Filtro_NumSerie_Activos: function() { return $("#hdd_filt_num_serie_baja").val(); },
					Filtro_Propiedad_Activos: function() { return $("#hdd_filt_propiedad_baja").val(); },
					Filtro_Tipo_Activo_Activos: function() { return $("#hdd_filt_tipo_activo_baja").val(); },
					Filtro_Descripcion_Activos: function() { return $("#hdd_filt_desc_corta_baja").val() },
					Filtro_UPrimaria_Activos: function() { return $("#hdd_filt_uprim_baja").val(); },
					Filtro_USecundaria_Activos: function() { return $("#hdd_filt_usec_baja").val(); },
					Filtro_Monto_Factura_Activos: function() { return $("#hdd_filt_monto_factura_baja").val(); },
					Filtro_Fecha_Baja_Usr_Solicitante_Activos: function() { return $("#hdd_filt_fecha_baja_usr_solicitante_baja").val(); },
					Filtro_Fecha_Baja_Usr_DirFinanciera_Activos: function() { return $("#hdd_filt_fecha_baja_usr_dir_financiera_baja").val(); },
					Filtro_Fecha_Baja_Usr_Contabilidad_Activos: function() { return $("#hdd_filt_fecha_baja_usr_contabilidad_baja").val(); },
					Filtro_Estatus_Workflow_Activos: function() { return $("#hdd_filt_estatus_workflow_baja").val(); },
					Filtro_Motivo_Baja_Activos: function() { return $("#hdd_filt_motivo_baja").val(); }
				}
			},
			"columnDefs": [
				{ className: "celdaCentradaVertical", "targets": [ 0, 1 ] }
			],
			"columns": [
				/*{ "data": "AF_BC", "visible" : false},*/
				<?php if($Id_Menu!=25) { ?>
					{
						"data": function (obj) {
							var edicion = '<div class="text-center">';
							edicion += '<span class="cursor-pointer" onclick="pasarvalores_baja(' + obj.Id_Activo + ');"><i class="fa fa-pencil" aria-hidden="true" ></i></span>';
							edicion += '<span class="cursor-pointer" onclick="pasarvalores(' + obj.Id_Activo + ',1)"><i class="fa fa-file-text-o" aria-hidden="true" ></i></span>';
							<?php if (isset($_SESSION["Id_Cargo"])) {?>
									edicion += '<span class="cursor-pointer" onclick="pasareliminabaja(' + obj.Id_Activo + ')"><i class="fa fa-trash" aria-hidden="true"></i></span>';
							<?php } else {?>
								if (EstatusBaja == 0)
									edicion += '<span class="cursor-pointer" onclick="pasareliminabaja(' + obj.Id_Activo + ')"><i class="fa fa-trash" aria-hidden="true"></i></span>';
							<?php }?>
							edicion += "</div>";
							return edicion;
						}
					},
				<?php } ?>
				{
					"data": function (obj) {
						var opciones = new Array();
						opciones.push('<div class="text-center"><a target="_blank" href="../controladores/activos/siga_activos/Reporte-Baja.php?Id_baja=' + obj.Id_Baja_Reubicacion + '&Id_Activo='+obj.Id_Activo + '"><span class="span-file-adjunto"><i class="fa fa-paperclip fa-file-adjunto" aria-hidden="true""></i></span></a></div>');
						if(obj.CuentaAccesoriosConsumibles > 0) {
							opciones.push('<div class="text-center"><a href="#" onclick="verAccesorioConsumible(this);" data-id-activo="' + obj.Id_Activo + '" title="Click para ver los accesorios y consumibles ligados al Activo"><span class="span-file-adjunto"><i class="fa fa-object-group fa-file-adjunto" aria-hidden="true"></i></span></a></div>');
						}
						return opciones.join("");
					}
				},
				/*{
					"data": function (obj) {
						var Pdf = '';
						Pdf = '<a target="_blank" href="../controladores/activos/siga_activos/Reporte-Alta.php?Id_Activo='+obj.Id_Activo+'" class="fa fa-paperclip" aria-hidden="true"></a>';
						return Pdf;
					}
				},*/
				{
					"data": function (obj) {
						var Foto = '';
						if (obj.Foto != null) {
							Foto = '<img src="../Archivos/Archivos-Activos/' + obj.Foto + '"  class="img-responsive img-rounded img-inventario-tabla">';
						}
						else {
							Foto = '<img src="../dist/img/no-camera.png" class="img-responsive img-rounded img-inventario-tabla">';
						}
						return Foto;
					}
				},
				{ "data": "AF_BC"},
				{ "data": "fecha_baja_usr_solicitante"},
				{ "data": "fecha_baja_dir_financiera"},
				{ "data": "fecha_baja_usr_contabilidad"},
				{
					"data": function (obj) {
						var paso = '';
						if (obj.WorkFlowPaso != null)
							paso = ' Paso ' + obj.WorkFlowPaso + ' de 5';
						else
							paso = ' Paso 1 de 5';
						return paso;
					}
				},
				{ "data": "Motivo_Baja", "visible": Campo_Motivo_Baja},
				{ "data": "Nombre_Activo"},
				{ "data": "Area", "visible": false},
				{ "data": "Clasificacion"},
				{ "data": "Marca"},
				{ "data": "Modelo"},
				{ "data": "NumSerie"},
				{ "data": "Propiedad"},
				{ "data": "TipoActivo", "visible": Campo_Clase},
				{ "data": "DescCorta"},
				{ "data": "UbicacionPrimaria"},
				{ "data": "UbicacionSecundaria"},
				{ "data": "FechaAlta"},
				{ "data": "MontoFactura"}
			], 
			"order": [[7, "desc"]],
			"language": {
				"lengthMenu": "Mostrando _MENU_ registros por p&aacute;gina",
				"zeroRecords": "Sin Resultados",
				"info": "Monstrando p&aacute;gina _PAGE_ de _PAGES_ , total de registros: _MAX_",
				"infoEmpty": "Sin Resultados",
				"infoFiltered": "(Mostrando  _MAX_ del total de registros)",
				"search": "Busqueda: ",
				"paginate": {
					"first": "Primera",
					"last": "Ultima",
					"next": "Siguiente",
					"previous": "Anterior"
				}
			},
			initComplete: function () { // After DataTable initialized
				var listaFiltrosSelect = [];
				this.api().columns().every(function (index) {
					if($("#tablebajas th:eq(" + index + ")").data("aplicar-filtro")) {
						var IdSelectFiltro = $("#tablebajas th:eq(" + index + ")").data("id-select-filtro");
						var CampoReceptor = $("#tablebajas th:eq(" + index + ")").data("campo-receptor");
						var NombreCampo = $("#tablebajas th:eq(" + index + ")").data("nombre-campo");
						var IdTabla =  $("#tablebajas th:eq(" + index + ")").data("id-tabla");

						var select = $('<select id="' + IdSelectFiltro + '" class="filtro-excel" data-id-tabla="' + IdTabla + '" data-id-select-filtro="' + IdSelectFiltro + '" data-campo-receptor="' + CampoReceptor + '" data-nombre-campo="' + NombreCampo + '" multiple="multiple" style="display:none; margin-top: 8px;"></select>')
							.appendTo($("#tablebajas_wrapper .dataTables_scrollHead thead td:eq(" + index + ")").empty());
						listaFiltrosSelect.push(select);
					}
				}); // this.api function

				// Genera los campos de filtrado tipo Excel
				for(var i = 0; i < listaFiltrosSelect.length; i++) {
					filtro_multiselect_generico(listaFiltrosSelect[i]);
				}
				// Inicia la funcionalidad de mover los botones con el scroll horizontal
				movimientoHorizontalBotonesExcel("tablebajas");
				// Cierra la ventana de espera
				setTimeout(function() { jsRemoveWindowLoad(); }, 1000);
			} //initComplete function
		});
	}
	

	// CREA LA TABLA DE LOS ACTIVOS QUE HAN SIDO REUBICADOS
	tablareubicacion = function(){
		// Muestra la ventana de espera
		jsShowWindowLoad("Por favor espere, buscando información");

		var Fech_Inicial="";
		var Fech_Final="";
		Fech_Inicial=$("#fechaDel_reubic").val()
		Fech_Final=$("#fechaAl_reubic").val();
		
		$('#tablereubicacion').DataTable().clear().destroy(); 
		$('#tablereubicacion').DataTable({
			"lengthMenu": [ [10, 25, 50, 100, 100000], [10, 25, 50, 100, "Todos"] ] ,
			// Esqueleto del datatable completo (B: botones; l: longitud de cuantos resultados va a mostrar; f: filtros; <: agrega un div; "table-responsive" agrega la clase al div; t: tabla; >:cierra el div; i: información ; p: paginación)
			"dom": '<"text-center"B><"row"<"col-md-6"l><"col-md-6"f>><"table-responsive"t>ip',
			// Celdas a exportar en el documento Excel, empezando por el indice 0
			// Elimina también clases que definen el botón
			"buttons": [
				{
					text: 'Copiar',
					className: 'btn chs export',
					extend: 'copyHtml5',
					init: function (api, node, config) {
						jQuery(node).removeClass('dt-button buttons-excel buttons-html5')
					}
				},
				{
					text: 'Exportar a CSV',
					className: 'btn chs export',
					extend: 'csvHtml5',
					init: function (api, node, config) {
						jQuery(node).removeClass('dt-button buttons-excel buttons-html5')
					}
				},
				{
					text: '<i class="fa fa-file-excel-o"></i> Exportar a Excel',
					className: 'btn chs export',
					extend: 'excelHtml5',
					init: function (api, node, config) {
						jQuery(node).removeClass('dt-button buttons-excel buttons-html5')
					}
				}
			],
			"scrollY": 500,
			"scrollX": true,
			"paging": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"ajax": { 
				"url": "../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",
				"type": "POST",
				"data": {
					Id_Area:$("#idareasesion").val(),
					orden:'AF_BC',
					estatus:'reubicacion',
					Fech_Inicial: Fech_Inicial,
					Fech_Final: Fech_Final,
					Filtro_AF_BC_Activos: function() { return $("#hdd_filt_afbc_reubicacion").val(); },
					Filtro_Nombre_Activos: function() { return $("#hdd_filt_nombre_reubicacion").val(); },
					Filtro_Clasific_Activos: function() { return $("#hdd_filt_clasif_reubicacion").val(); },
					Filtro_Marca_Activos: function() { return $("#hdd_filt_marca_reubicacion").val(); },
					Filtro_Modelo_Activos: function() { return $("#hdd_filt_modelo_reubicacion").val(); },
					Filtro_NumSerie_Activos: function() { return $("#hdd_filt_num_serie_reubicacion").val(); },
					Filtro_Propiedad_Activos: function() { return $("#hdd_filt_propiedad_reubicacion").val(); },
					Filtro_Descripcion_Activos: function() { return $("#hdd_filt_desc_corta_reubicacion").val() },
					Filtro_UPrimaria_Activos: function() { return $("#hdd_filt_uprim_reubicacion").val(); },
					Filtro_USecundaria_Activos: function() { return $("#hdd_filt_usec_reubicacion").val(); },
					Filtro_Monto_Factura_Activos: function() { return $("#hdd_filt_monto_factura_reubicacion").val(); },
					Filtro_Fecha_Reubicacion_Activos: function() { return $("#hdd_filt_fecha_reubicacion_reubicacion").val(); },
					Filtro_Filtro_UPrimariaOrigen_Activos: function() { return $("#hdd_filt_uprim_proc_reubicacion").val(); },
					Filtro_Filtro_USecundariaOrigen_Activos: function() { return $("#hdd_filt_usec_proc_reubicacion").val(); },
					Filtro_UbicacionEspecifica_Activos: function() { return $("#hdd_filt_uespecifica_reubicacion").val(); }
				}
			},
			"columnDefs": [
				{ className: "celdaCentradaVertical", "targets": [ 0, 1 ] }
			],
			"columns": [
				/*{ "data": "AF_BC", "visible": false},*/
				{
					"data": function (obj) {
						var edicion = '<div class="text-center">';
						//edicion += '<span onclick="pasarvalores_reubicacion(' + obj.Id_Activo + ',' + obj.Id_Baja_Reubicacion + ')"><i class="fa fa-pencil" aria-hidden="true" ></i></span>';
						edicion += '<span class="cursor-pointer" onclick="pasarvalores(' + obj.Id_Activo + ',1)"><i class="fa fa-file-text-o" aria-hidden="true" ></i></span>';
						edicion += '<span class="cursor-pointer" onclick="pasarelimina_reubicacion(' + obj.Id_Baja_Reubicacion + ')"><i class="fa fa-trash" aria-hidden="true"></i></span>';
						edicion += "</div>";
						return edicion;
					}
				},
				{
					"data": function (obj) {
						var opciones = new Array();
						opciones.push('<div class="text-center"><a target="_blank" href="../controladores/activos/siga_activos/Reporte-Reubicacion.php?Id_Activo_Reubicacion=' + obj.Id_Baja_Reubicacion + '&Id_Activo=' + obj.Id_Activo + '"><span class="span-file-adjunto"><i class="fa fa-paperclip fa-file-adjunto" aria-hidden="true""></i></span></a></div>');
						if(obj.CuentaAccesoriosConsumibles > 0) {
							opciones.push('<div class="text-center"><a href="#" onclick="verAccesorioConsumible(this);" data-id-activo="' + obj.Id_Activo + '" title="Click para ver los accesorios y consumibles ligados al Activo"><span class="span-file-adjunto"><i class="fa fa-object-group fa-file-adjunto" aria-hidden="true"></i></span></a></div>');
						}
						return opciones.join("");
					}
				},
				{ "data": "AF_BC"},
				{
					"data": function (obj) {
						var Foto="";
						if(obj.Foto != null) {
							Foto = '<img src="../Archivos/Archivos-Activos/' + obj.Foto + '" class="img-responsive img-rounded img-inventario-tabla">';
						}
						else {
							Foto = '<img src="../dist/img/no-camera.png" class="img-responsive img-rounded img-inventario-tabla">';
						}
						return Foto;
					}
				},
				{ "data": "Nombre_Activo"},
				////{ "data": "Id_AreaReu"},
				{ "data": "Clasificacion"},
				{ "data": "Marca"},
				{ "data": "Modelo"},
				{ "data": "NumSerie"},
				{ "data": "Propiedad"},
				{ "data": "DescCorta"},
				{ "data": "Desc_ubic_prim_proc"},
				{ "data": "Desc_ubic_sec_proc"},
				{ "data": "UbicacionPrimariaReu"},
				{ "data": "UbicacionSecundariaReu"},
				{ "data": "Ubic_Especifica"},
				{ "data": "Fecha_Reubicacion"},
				{ "data": "MontoFactura"}
				
			], 
			order: [[17,"desc"]],
			"language": {
				"lengthMenu": "Mostrando _MENU_ registros por p&aacute;gina",
				"zeroRecords": "Sin Resultados",
				"info": "Monstrando p&aacute;gina _PAGE_ de _PAGES_ , total de registros: _MAX_",
				"infoEmpty": "Sin Resultados",
				"infoFiltered": "(Mostrando  _MAX_ del total de registros)",
				"search": "Busqueda: ",
				"paginate": {
					"first": "Primera",
					"last": "Ultima",
					"next": "Siguiente",
					"previous": "Anterior"
				}
			},
			initComplete: function () { // After DataTable initialized
				var listaFiltrosSelect = [];
				this.api().columns().every(function (index) {
					if($("#tablereubicacion th:eq(" + index + ")").data("aplicar-filtro")) {
						var IdSelectFiltro = $("#tablereubicacion th:eq(" + index + ")").data("id-select-filtro");
						var CampoReceptor = $("#tablereubicacion th:eq(" + index + ")").data("campo-receptor");
						var NombreCampo = $("#tablereubicacion th:eq(" + index + ")").data("nombre-campo");
						var IdTabla =  $("#tablereubicacion th:eq(" + index + ")").data("id-tabla");

						var select = $('<select id="' + IdSelectFiltro + '" class="filtro-excel" data-id-tabla="' + IdTabla + '" data-id-select-filtro="' + IdSelectFiltro + '" data-campo-receptor="' + CampoReceptor + '" data-nombre-campo="' + NombreCampo + '" multiple="multiple" style="display:none; margin-top: 8px;"></select>')
							.appendTo($("#tablereubicacion_wrapper .dataTables_scrollHead thead td:eq(" + index + ")").empty());
						listaFiltrosSelect.push(select);
					}
				}); // this.api function

				// Genera los campos de filtrado tipo Excel
				for(var i = 0; i < listaFiltrosSelect.length; i++) {
					filtro_multiselect_generico(listaFiltrosSelect[i]);
				}
				// Inicia la funcionalidad de mover los botones con el scroll horizontal
				movimientoHorizontalBotonesExcel("tablereubicacion");
				// Cierra la ventana de espera
				setTimeout(function() { jsRemoveWindowLoad(); }, 1000);
			} //initComplete function
		});
	}
	
	
	limpiarcampos = function() {
		Img_Activo();
		//$(".fileinput-remove").click();
	
		$("#numusuarioalta").prop("disabled", true);
		$("#numusuarioalta").val("");
		
		$("#Id_Activo").val("");
		$("#AF_BC").val("");
		$("#Nombre").val("");
		$("#DescCorta").val("");
		$("#cmbubicacionprim").val(-1);
		$("#cmbubicacionsec").val(-1);
		$("#cmbestatus").val(-1);
		$("#cmbareas").val(-1);
		$("#cmbclase").val(-1);
		$("#cmbclasificacion").val(-1);
		$("#cmbpropiedad").val(-1);
		$("#cmbmotivo").val(-1);
		$("#cmbfamilia").val(-1);
		$("#cmbsubfamilia").val(-1);
		$("#cmbtipoactivo").val(-1);
		$("#DescLarga").val("");
		$("#Marca").val("");
		$("#modelo").val("");
		$("#numserie").val("");
		$("#numactivoanterior").val("");
		$("#cmbPRE").val(-1);
		$("#cmbseguros").val(-1);
		$("#cmbcertificacion").val(-1);
		$("#importeseguros").val("");
		
		var Num_Empleado=$.trim($("#numempleadoresguardo").val());
		if(Num_Empleado!=""){			
			if(Num_Empleado.length > 0){
				var $select3 = $('#numempleadoresguardo').selectize({});	
				var control3 = $select3[0].selectize;
				control3.clear();
			}
		}
		$("#nombreempleadoresguardo").val("");
		
		$("#cmb_mant_prevent").val(-1);
		$("#cmbtipovaleresguardo").val(-1);
		$("#garantia").val("");
		$("#extension").val("");
		$("#especifica").val("");
		$("#Url_Foto_Activo").val("");
		//$("#Carrusel_Fotos").html("");
		$("#Carrusel_Fotos").html('<img src="../dist/img/no-camera.png" alt="Sin imagen definida" class="img-inventario-tabla" />');
		$("#AF_BC2").val("");
		$("#Nombre2").val("");
		$("#DescCorta2").val("");
		$("#cmbubicacionprim2").val(-1);
		$("#cmbubicacionsec2").val(-1);
		$("#cmbestatus2").val(-1);
		
		$("#AF_BC3").val("");
		$("#Nombre3").val("");
		$("#DescCorta3").val("");
		$("#cmbubicacionprim3").val(-1);
		$("#cmbubicacionsec3").val(-1);
		$("#cmbestatus3").val(-1);
		
		/* Si es biomedica */
		if ($("#idareasesion").val() == 1) // Ajustes JGR 28/06/2018
		{
			$("#cmbareas").val(1);
			$("#cmbclase").val(5);
			$("#cmbclase").change();
			$("#cmbtipovaleresguardo").val(1);
			
		}
		else
		$("#cmbareas").val($("#idareasesion").val());
	
	
	    var activopadre=$.trim($("#activopadre").val());
		if(activopadre!=""){			
			if(activopadre.length > 0){
				var $select4 = $('#activopadre').selectize({});	
				var control4 = $select4[0].selectize;
				control4.clear();
			}
		}
		
		//if ($(".kv-preview-data")[0])
		//$(".kv-file-remove").click();
		$("#linkMantenimiento").hide();
		
		$("#guardar").prop("disabled", false);
		$("#guardar2").prop("disabled", false);
		$("#guardar3").prop("disabled", false);
		$("#guardar").html("Siguiente");
		
	}
	
	limpiarcamposproveedor=function()
	{
	
		//Se inician los controles para subir archivos multiples
		 Proveedor_adjuntos_contrato();
		 Proveedor_adjuntos_otro_doc_corto();
		 Proveedor_Factura_0();
		 Proveedor_Xml();
		//Se inician los controles para subir archivos multiples
	
		$("#Id_activo_proveedor").val("");
		
		$("#Folio_Fiscal").val("");
		$("#Monto_Factura").val("");
		$("#NumOrdenCompra").val("");
		$("#NumFactura").val("");
		$("#FechaFactura").val("");
		$("#UUID").val("");
		$("#MontoFactura_s_iva").val("");
		$("#VidaUtilFabricante").val("");
		$("#VidaUtilCHS").val("");
		$("#garantia").val("");
		$("#extension").val("");
		$("#Fecha_Vencimiento").val("");
		$("#NombreProveedor").val("");
		$("#Id_Proveedor").val("");
		$("#Contacto").val("");
		$("#Telefono").val("");
		$("#Correo").val("");
		$("#DocRecibida").val("");
		$("#Accesorios").val("");
		$("#Consumibles").val("");
		$("#NumContrato").val("");
		$("#manual1").val("");
		$("#manual2").val("");
		$("#manual3").val("");
		
		
		$("#url_contrato").val("");
		$("#url_corto").val("");
		$("#url_factura0").val("");
		$("#url_xml").val("");
	}
	
	limpiarcamposcontabilidad=function(){
		Contabilidad_Factura();
		Contabilidad_Xml();
		
		$("#Id_Activo_Contabilidad").val("");
		$("#centro_costos").val("-1");
		$("#centro_costos2").val("-1");
		$("#cmbparticipaendepresiacion").val(-1);
		$("#no_capex").val("");
		$("#Prorratear").val("");
		$("#fecha_inicio_depr").val("");
		$("#url_factura").val("");
		$("#url_xml_contabilidad").val("");
		$("#NumFactura3").val("");
		$("#FechaFactura3").val("");
		$("#VidaUtilFabricante3").val("");
		$("#VidaUtilCHS3").val("");
		$("#MontoFactura3").val("");
	}


	// Función que limpia el formulario de baja
	limpiarcamposbaja = function() {
		var Nom_Activo = $.trim($("#AF_BC_baja").val());
		if(Nom_Activo != "") {
			if(Nom_Activo.length > 0){
				var $select3 = $('#AF_BC_baja').selectize({});	
				var control3 = $select3[0].selectize;
				control3.clear();
				control3.enable();
			}
		}
		
		$("#Id_Activo_Baja_Form").val("");
		$("#Serie_baja").val("");
		$("#marca_baja").val("");
		$("#modelo_baja").val("");
		$("#cmbestatus_baja").val("");
		$("#cmbarea_baja").val("");
		$("#cmbubicacionprimaria_baja").val("");
		$("#cmbubicacionsecundaria_baja").val("");
		$("#desccorta_baja").val("");
		$("#jefearea_baja").val("");
		$("#Id_baja_activo").val("");
		$("#cmbbajas").val(-1);
		$("#Comentarios_baja").val("");
		$("#cmbdestinofinal").val(-1);
		$("#Cuenta_baja").val("");

		// Habilita el campo de selección del activo
		$("#AF_BC_baja").prop("disabled", false);
		$("#Usuario_soli_baja").prop("disabled", false);
		
		$("#Fecha_baja").val(obtenerfechaactual());
		//$("#Fecha_baja").datepicker("update");
		var Usuario_Baja=$.trim($("#Usuario_soli_baja").val());
		if(Usuario_Baja!="") {
			if(Usuario_Baja.length > 0){
				var $usr_baja = $('#Usuario_soli_baja').selectize({});	
				var usr_baja2 = $usr_baja[0].selectize;
				usr_baja2.clear();
				usr_baja2.enable();
			}
		}
		
		
		$("#Jefe_Area").val("");
		for (i=0; i <=6; i++) {
			$("#Paso"+i).removeClass("verde");
			$("#Paso"+i).removeClass("rojo");
			$("#Paso"+i).removeClass("amarillo");
			$("#Paso"+i).addClass("amarillo");	
			$("#Paso"+i+"Fecha").html("");
			$("#Paso"+i+"Link").html("");
			$("#Paso"+i+"Com").html("");
			$("#Paso"+i+"Fecha").hide();
			$("#Paso"+i+"Link").hide();
			$("#Paso"+i+"Com").hide();
		}
		parametrosCargaArchivos.show_upload = false;
		subirArchivosVsObjeto(parametrosCargaArchivos);
		$("#ArchivosBajaAreaLista").html("");
		$("#generarbaja").show();
	}

	limpiarcamposreubicacion=function(){
		var Nom_Activo=$.trim($("#AF_BC_reubicacion").val());
		if(Nom_Activo!=""){			
			if(Nom_Activo.length > 0){
				var $select3 = $('#AF_BC_reubicacion').selectize({});	
				var control3 = $select3[0].selectize;
				control3.clear();
				control3.enable();
			}
		}
		
		
		var Num_Empleado=$.trim($("#numempleadoreubicacion").val());
		if(Num_Empleado!=""){			
			if(Num_Empleado.length > 0){
				var $select3 = $('#numempleadoreubicacion').selectize({});	
				var control3 = $select3[0].selectize;
				control3.clear();
			}
		}
		$("#usuario_resp_guardar").val("");
		
		
		$("#Id_Activo_reubicacion_Form").val("");
		$("#Serie_reubicacion").val("");
		$("#marca_reubicacion").val("");
		$("#responsable_procedencia").val("");
		$("#ubic_especifica_procedencia").val("");
		$("#modelo_reubicacion").val("");
		$("#cmbestatus_reubicacion").val("");
		$("#cmbarea_reubicacion").val("");
		$("#cmbubicacionprimaria_reubicacion").val("");
		$("#cmbubicacionsecundaria_reubicacion").val("");
		$("#desccorta_reubicacion").val("");
		
		$("#jefearea_reubicacion").val("");
		$("#Id_reubicacion_activo").val("");
		$("#cmb_area_guardar").val("-1");
		$("#cmb_ubic_prim_reub_guar").val("-1");
		$("#cmb_ubic_sec_reub_guar").val("-1");
		$("#ubic_especifica_guardar").val("");
		$("#Usuario_soli_baja").val("");
		$("#centro_costos_guardar").prop("disabled", false);
		$("#centro_costos_guardar").val("-1");
		
		$("#Motivo_Reubicacion").val("");
		$("#comentarios_reubicacion").val("");
		$("#generarreubicacion").prop("disabled", false);
		$("#Cuenta_reubicacion").val("");
	}

	
	usuario_insert=function(Id_Usuario){
		$.ajax({
            type: "POST",
            url: "../fachadas/activos/siga_usuarios/Siga_usuariosFacade.Class.php",
            async: false,
            data: {
				Estatus_Reg:"1",
                Id_Usuario: Id_Usuario,
                accion: "consultar"
            },
            dataType: "html",
            beforeSend: function (xhr) {

            },
			
            success: function (data) {
                data = eval("(" + data + ")");
                if (data.totalCount > 0) {
					$("#numusuarioalta").val(data.data[0].No_Usuario+"-"+data.data[0].Nombre_Usuario);
                }
            },
            error: function () {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
            }
        });
		
	}
	
	// Función que carga la información del Activo
	pasarvalores =function(id,estatus) {
		limpiarcampos();
		limpiarcamposproveedor();
		limpiarcamposcontabilidad();
		limpiarcamposbaja();
		
		if (id != "") {
			$.ajax({
				type: "POST",
				url: "../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",
				async: false,
				data: {
					Id_Activo: id,
					accion: "consultar"
				},
				dataType: "html",
				beforeSend: function (xhr) {
				},
				success: function (data) {
					data = eval("(" + data + ")");
					if (data.totalCount > 0) {
						$("#guardar").html("Actualizar Datos Generales");
						if ($("#numserie").val() == "") {
							$("#chknumserie").prop("checked",true);
						}

						$("#Id_Activo").val(data.data[0].Id_Activo);
						$("#AF_BC").val(data.data[0].AF_BC);
						$("#Nombre").val(data.data[0].Nombre_Activo);
						$("#DescCorta").val(data.data[0].DescCorta);
						$("#cmbubicacionprim").val(data.data[0].Id_Ubic_Prim);
						if(data.data[0].Id_Ubic_Prim!=""){
							ubic_sec(data.data[0].Id_Ubic_Prim);
						}
						$("#cmbubicacionsec").val(data.data[0].Id_Ubic_Sec);
						$("#cmbestatus").val(data.data[0].Id_Situacion_Activo);
						$("#cmbareas").val(data.data[0].Id_Area);
						$("#cmbclase").val(data.data[0].Id_Clase);
						if(data.data[0].Id_Clase!=""){
							clasificacion(data.data[0].Id_Clase);
						}
						$("#cmbclasificacion").val(data.data[0].Id_Clasificacion);
						$("#cmbpropiedad").val(data.data[0].Id_Propiedad);
						
						if(data.data[0].Id_Propiedad == 1){
							$("#spanFechaFactura").show();
						}
						else{
							$("#spanFechaFactura").hide();
						}
						
						$("#cmbmotivo").val(data.data[0].Id_Motivo_Alta);
						$("#cmbfamilia").val(data.data[0].Id_Familia);
						$("#cmbtipoactivo").val(data.data[0].Id_Tipo_Activo);
						$("#DescLarga").val(data.data[0].DescLarga);
						/* Opcionales*/
						if(data.data[0].Id_Familia!=""){
							subfamilia(data.data[0].Id_Familia);
						}
						$("#cmbsubfamilia").val(data.data[0].Id_Subfamilia);
						$("#Marca").val(data.data[0].Marca);
						$("#modelo").val(data.data[0].Modelo);
						$("#numserie").val(data.data[0].NumSerie);
						$("#numactivoanterior").val(data.data[0].NumActivoAnterior);
						$("#cmbPRE").val(data.data[0].ParticipaPre);
						$("#cmbseguros").val(data.data[0].ParticipaSeguros);
						
						$("#MontoDepPeriodo").val(Math.round(data.data[0].Depreciacion*100)/100);
						$("#DepreciacionAcumulada").val(Math.round(data.data[0].DepreciacionAcumulada*100)/100);
						
						$("#MontoDepPeriodoMixta").val(Math.round(data.data[0].DepreciacionMixta*100)/100);
						$("#DepreciacionAcumuladaMixta").val(Math.round(data.data[0].DepreciacionAcumuladaMixta*100)/100);
						
						$("#MontoDepPeriodoFiscal").val(Math.round(data.data[0].DepreciacionPeriodoFiscal*100)/100);
						$("#DepreciacionFiscal").val(Math.round(data.data[0].DepreciacionFiscal*100)/100);
						
						$("#MontoDepPeriodoFiscalD4").val(Math.round(data.data[0].DepreciacionPeriodoFiscalD4*100)/100);
						$("#DepreciacionFiscalD4").val(Math.round(data.data[0].DepreciacionFiscalD4*100)/100);

						$("#MontoDepPeriodoFiscalB10").val(Math.round(data.data[0].DepreciacionPeriodoFiscalB10*100)/100);
						$("#DepreciacionFiscalB10").val(Math.round(data.data[0].DepreciacionFiscalB10*100)/100);
						
						if(data.data[0].Mant_Prevent!=null&&data.data[0].Mant_Prevent!=""){
							$("#cmb_mant_prevent").val(data.data[0].Mant_Prevent);
							if (data.data[0].Mant_Prevent == 1) {
								if($("#hddperfil").val()!="68") {
									$("#linkMantenimiento").show();
								}
							}
						}
						else {
							$("#cmb_mant_prevent").val(-1);	
						}
						$("#cmbcertificacion").val(data.data[0].ParticipaCertificacion);
						$("#importeseguros").val(data.data[0].ImporteSeguros);
						
						var $select3 = $('#numempleadoresguardo').selectize({});	
						var control3 = $select3[0].selectize;
						control3.addItem(data.data[0].Num_Empleado);
						//$("#numempleadoresguardo").val(data.data[0].Num_Empleado);
						$("#nombreempleadoresguardo").val(data.data[0].Nombre_Completo);
						$("#cmbtipovaleresguardo").val(data.data[0].Id_Tipo_Vale_Resg);
						$("#garantia").val(data.data[0].Garantia);
						$("#extension").val(data.data[0].ExtGarantia);
						
						$("#cmbubicacionprim3").val(data.data[0].Id_Ubic_Prim);
						$("#cmbubicacionsec3").val(data.data[0].Id_Ubic_Sec);
						$("#AF_BC3").val(data.data[0].AF_BC);
						$("#Nombre3").val(data.data[0].Nombre_Activo);
						$("#DescCorta3").val(data.data[0].DescCorta);
						$("#cmbestatus3").val(data.data[0].Estatus_Reg);
						$("#Url_Foto_Activo3").val(data.data[0].Foto);
						$("#Url_Foto_Activo3").val(data.data[0].Foto);
						
						$("#cmbubicacionprim2").val(data.data[0].Id_Ubic_Prim);
						$("#cmbubicacionsec2").val(data.data[0].Id_Ubic_Sec);
						$("#AF_BC2").val(data.data[0].AF_BC);
						$("#Nombre2").val(data.data[0].Nombre_Activo);
						$("#DescCorta2").val(data.data[0].DescCorta);
						$("#cmbestatus2").val(data.data[0].Estatus_Reg);
						$("#especifica").val(data.data[0].Especifica);
						$("#especifica2").val(data.data[0].Especifica);
						$("#Url_Foto_Activo").val(data.data[0].Foto);
						$("#Url_Foto_Activo2").val(data.data[0].Foto);
						//$("#activopadre").val(data.data[0].Id_ActivoPadre);
						
						var $select4 = $('#activopadre').selectize({});	
						var control4 = $select4[0].selectize;
						control4.addItem(data.data[0].Id_ActivoPadre);
						
						//$("#AF_BC_baja").val(data.data[0].AF_BC);
						//$("#Serie_baja").val(data.data[0].NumSerie);
						//$("#marca_baja").val(data.data[0].Marca);
						//$("#modelo_baja").val(data.data[0].Modelo);
						//$("#cmbestatus_baja").val(data.data[0].Estatus_Reg);
						//$("#cmbarea_baja").val(data.data[0].Id_Area);
						//$("#cmbubicacionprimaria_baja").val(data.data[0].Id_Ubic_Prim);
						//$("#cmbubicacionsecundaria_baja").val(data.data[0].Id_Ubic_Sec);
						//$("#desccorta_baja").val(data.data[0].DescCorta);
						
						$('#altaEquipo').modal('show');
						// Carga las imagenes del activo
						if (data.data[0].Foto != null && data.data[0].Foto.length > 0) {
							$("#Url_Foto_Activo").val(data.data[0].Foto);
							if($('#Url_Foto_Activo').val() != "") {
								var Foto_Activo = $('#Url_Foto_Activo').val().indexOf("---");
								
								if(Foto_Activo != -1) {
									var result=$('#Url_Foto_Activo').val().split('---');
									mostrar_archivos_lista($('#Url_Foto_Activo').val(), "divFoto_lista", "../Archivos/Archivos-Activos", "si", "Url_Foto_Activo", "");
									cargar_archivos("Url_Foto_Activo2", "documentos_adjuntos_FILE2", result[0],"../Archivos/Archivos-Activos",true,false);
									cargar_archivos("Url_Foto_Activo3", "documentos_adjuntos_FILE3", result[0],"../Archivos/Archivos-Activos",true,false);
								}
								else {
									mostrar_archivos_lista($('#Url_Foto_Activo').val(), "divFoto_lista", "../Archivos/Archivos-Activos", "no", "Url_Foto_Activo", "");
									cargar_archivos("Url_Foto_Activo2", "documentos_adjuntos_FILE2", $('#Url_Foto_Activo').val(),"../Archivos/Archivos-Activos",true,false);
									cargar_archivos("Url_Foto_Activo3", "documentos_adjuntos_FILE3", $('#Url_Foto_Activo').val(),"../Archivos/Archivos-Activos",true,false);
								}
							}
						}
						else {

							// No hay imagenes para mostrar, por lo tanto, deberá eliminar la imagen previamente cargada de  otra consulta
							$("#documentos_adjuntos_FILE2").val("");
							//$("#divFoto_lista").html("");
							$("#documentos_adjuntos_FILE2").fileinput('refresh', { initialPreview: "", initialPreviewAsData: false });
						}
					
						if(data.data[0].Usr_Inser!="") {
							//alert(data.data[0].Usr_Inser);
							usuario_insert(data.data[0].Usr_Inser);
						}
						else {
							$("#numusuarioalta").val("SIN INFORMACION");
						}
						
						if (estatus==1) {
							$("#guardar").prop("disabled", true);
							$("#guardar2").prop("disabled", true);
							$("#guardar3").prop("disabled", true);
						}
						else
						{
							if ($("#cmb_mant_prevent").val() ==1) {
								 if($("#hddperfil").val()!="68"){
									$("#linkMantenimiento").show();
								 }
							}
							else {
								$("#linkMantenimiento").hide();
							}
							$("#guardar").prop("disabled", false);
							$("#guardar2").prop("disabled", false);
							$("#guardar3").prop("disabled", false);
						}

						// Carga dinamicamente el pequeño formulario donde se administran los accesorios y los activos
						cargarAdminAccesoriosActivos(id);
					}
				},
				error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
				}
			});
			
			
			$.ajax({
                type: "POST",
                url: "../fachadas/activos/siga_activo_proveedor/Siga_activo_proveedorFacade.Class.php",
                async: false,
                data: {
                    id_Activo: id,
					Estatus_Reg:"1",
                    accion: "consultar"
                },
                dataType: "html",
                beforeSend: function (xhr) {

                },
				
                success: function (data) {
                    data = eval("(" + data + ")");
                    if (data.totalCount > 0) {
						var eliminar_archivo="";
                        $("#Id_activo_proveedor").val(data.data[0].Id_activo_proveedor);
						
						if(data.data[0]["Id_activo_proveedor"]!=""){
							eliminar_archivo="no";
						}
						$("#NumOrdenCompra").val(data.data[0].NumOrdenCompra);
						$("#Folio_Fiscal").val(data.data[0].Folio_Fiscal);
						$("#Monto_Factura").val(data.data[0].Monto_F);
						$("#NumFactura").val(data.data[0].NumFactura);
						
						var fecha_fac="";
						if(data.data[0].FechaFactura!=""){
							if(data.data[0].FechaFactura!=null){
								fecha_fac=data.data[0].FechaFactura[8]+""+data.data[0].FechaFactura[9]+"/"+data.data[0].FechaFactura[5]+""+data.data[0].FechaFactura[6]+"/"+data.data[0].FechaFactura[0]+""+data.data[0].FechaFactura[1]+""+data.data[0].FechaFactura[2]+""+data.data[0].FechaFactura[3];
							}
						}
						$("#FechaFactura").val(fecha_fac);
						$("#FechaFactura").datepicker('update');
						$("#UUID").val(data.data[0].UUID);
						$("#MontoFactura_s_iva").val(data.data[0].MontoFactura);
						$("#NumContrato").val(data.data[0].NumContrato);
						$("#VidaUtilFabricante").val(data.data[0].VidaUtilFabricante);
						$("#VidaUtilCHS").val(data.data[0].VidaUtilCHS);
						$("#extension").val(data.data[0].ExtGarantia);
						$("#garantia").val(data.data[0].Garantia);
						$("#Fecha_Vencimiento").val(data.data[0].Fecha_Vencimiento);
						$("#Fecha_Vencimiento").datepicker('update');
						$("#Id_Proveedor").val(data.data[0].Id_Proveedor);
						$("#NombreProveedor").val(data.data[0].NombreProveedor);
						$("#Contacto").val(data.data[0].Contacto);
						$("#Telefono").val(data.data[0].Telefono);
						$("#Correo").val(data.data[0].Correo);
						/* Opcionales*/
						$("#DocRecibida").val(data.data[0].DocRecibida);
						$("#Accesorios").val(data.data[0].Accesorios);
						$("#Consumibles").val(data.data[0].Consumibles);
						//header contabilidad
						$("#NumFactura3").val(data.data[0].NumFactura);
						$("#FechaFactura3").val(data.data[0].FechaFactura);
						$("#VidaUtilFabricante3").val(data.data[0].VidaUtilFabricante);
						$("#VidaUtilCHS3").val(data.data[0].VidaUtilCHS);
						$("#MontoFactura3").val(data.data[0].MontoFactura);
						$("#manual1").val(data.data[0].Link);
						$("#manual2").val(data.data[0].Link2);
						$("#manual3").val(data.data[0].Link3);
						
						if (data.data[0].Link != "")
						{
							$("#link1").show();
							$("#link1").attr("href",data.data[0].Link);
						}
						if (data.data[0].Link2 != "")
						{
							$("#link2").show();
							$("#link3").attr("href",data.data[0].Link2);
						}
						if (data.data[0].Link3 != "")
						{
							$("#link3").show();
							$("#link3").attr("href",data.data[0].Link3);
						}
						
						if(data.data[0].Url_Factura!=null && data.data[0].Url_Factura.length>0){
							$("#url_factura0").val(data.data[0].Url_Factura);
							if($('#url_factura0').val()!=""){
								var Proveedor_Factura_0 = $('#url_factura0').val().indexOf("---");
								if(Proveedor_Factura_0!=-1){
									mostrar_archivos_lista($('#url_factura0').val(), "divFactura_0_lista", Ruta_Archivos_Proveedores, "si", "url_factura0", eliminar_archivo);
								}else{
									mostrar_archivos_lista($('#url_factura0').val(), "divFactura_0_lista", Ruta_Archivos_Proveedores, "no", "url_factura0", eliminar_archivo);
								}
							}
							//cargar_archivos("url_factura0", "documentos_adjuntos_factura0", data.data[0].Url_Factura,"../Archivos/Archivos-Activos-Proveedores",true,false);
						}
						if(data.data[0].Url_Contrato!=null && data.data[0].Url_Contrato.length>0){
							$("#url_contrato").val(data.data[0].Url_Contrato);
							
							if($('#url_contrato').val()!=""){
								var Proveedor_contrato = $('#url_contrato').val().indexOf("---");
								if(Proveedor_contrato!=-1){
									mostrar_archivos_lista($('#url_contrato').val(), "divProveedor_Adjuntar_Contrato_lista", Ruta_Archivos_Proveedores, "si", "url_contrato", eliminar_archivo);
								}else{
									mostrar_archivos_lista($('#url_contrato').val(), "divProveedor_Adjuntar_Contrato_lista", Ruta_Archivos_Proveedores, "no", "url_contrato", eliminar_archivo);
								}
							}
							//cargar_archivos("url_contrato", "documentos_adjuntos_contrato", data.data[0].Url_Contrato,"../Archivos/Archivos-Activos-Proveedores",true,false);
						}
						if(data.data[0].Url_Otro_Doc!=null && data.data[0].Url_Otro_Doc.length>0){
							$("#url_corto").val(data.data[0].Url_Otro_Doc);
							
							if($('#url_corto').val()!=""){
								var Proveedor_otro_doc_corto = $('#url_corto').val().indexOf("---");
								if(Proveedor_otro_doc_corto!=-1){
									mostrar_archivos_lista($('#url_corto').val(), "divOtro_Doc_Corto_lista", Ruta_Archivos_Proveedores, "si", "url_corto", eliminar_archivo);
								}else{
									mostrar_archivos_lista($('#url_corto').val(), "divOtro_Doc_Corto_lista", Ruta_Archivos_Proveedores, "no", "url_corto", eliminar_archivo);
								}
							}
							//cargar_archivos("url_corto", "documentos_adjuntos_corto", data.data[0].Url_Otro_Doc,"../Archivos/Archivos-Activos-Proveedores",true,false);
						}
						
						if(data.data[0].Url_Xml!=null && data.data[0].Url_Xml.length>0){
							$("#url_xml").val(data.data[0].Url_Xml);
							
							if($('#url_xml').val()!=""){
								var Proveedor_url_xml = $('#url_xml').val().indexOf("---");
								if(Proveedor_url_xml!=-1){
									mostrar_archivos_lista($('#url_xml').val(), "divXml_lista", Ruta_Archivos_Proveedores, "si", "url_xml", eliminar_archivo);
								}else{
									mostrar_archivos_lista($('#url_xml').val(), "divXml_lista", Ruta_Archivos_Proveedores, "no", "url_xml", eliminar_archivo);
								}
							}
							//cargar_archivos("url_xml", "documentos_adjuntos_xml", data.data[0].Url_Xml,"../Archivos/Archivos-Activos-Proveedores",true,false);
						}
						
						
						//$('#altaEquipo').modal('show');
						/*
						if(data.data[0].Foto!=null && data.data[0].Foto.length>0){
							cargar_archivos("Url_Foto_Activo", "documentos_adjuntos_FILE", data.data[0].Foto,"../Archivos/Archivos-Actividades/Mantenimiento-Predictivo");
						}*/
						
                    }
                },
                error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
                }
            });
			
			$.ajax({
                type: "POST",
                url: "../fachadas/activos/siga_activos_contabilidad/Siga_activos_contabilidadFacade.Class.php",
                async: false,
                data: {
                    Id_Activo: id,
					Estatus_Reg:"1",
                    accion: "consultar"
                },
                dataType: "html",
                beforeSend: function (xhr) {

                },
				
                success: function (data) {
                    data = eval("(" + data + ")");
                    if (data.totalCount > 0) {
                        $("#Id_Activo_Contabilidad").val(data.data[0].Id_Activo_Contabilidad);
						
						var eliminar_archivo="";
						if(data.data[0]["Id_Activo_Contabilidad"]!=""){
							eliminar_archivo="no";
						}
						
						
						$("#centro_costos").val(data.data[0].Centro_Costos);
						$("#centro_costos2").val(data.data[0].Centro_Costos);
						$("#cmbparticipaendepresiacion").val(data.data[0].Participa_Depreciacion);
						if (data.data[0].Participa_Depreciacion == 0)
						{
							$("#divContabilidad_Formulas").hide();
						}
						else
							$("#divContabilidad_Formulas").show();
						
						$("#no_capex").val(data.data[0].No_Capex);
						$("#no_capex2").val(data.data[0].No_Capex);
						$("#Prorratear").val(data.data[0].Prorrateo);
						var fecha_dep="";
						if(data.data[0].Fecha_Inicio_Depr!=""){
							fecha_dep=data.data[0].Fecha_Inicio_Depr[8]+""+data.data[0].Fecha_Inicio_Depr[9]+"/"+data.data[0].Fecha_Inicio_Depr[5]+""+data.data[0].Fecha_Inicio_Depr[6]+"/"+data.data[0].Fecha_Inicio_Depr[0]+""+data.data[0].Fecha_Inicio_Depr[1]+""+data.data[0].Fecha_Inicio_Depr[2]+""+data.data[0].Fecha_Inicio_Depr[3];
						}
						$("#fecha_inicio_depr").val(fecha_dep);
						$('#fecha_inicio_depr').datepicker('update');
						
						if(data.data[0].Url_Factura!=null && data.data[0].Url_Factura.length>0){
							$("#url_factura").val(data.data[0].Url_Factura);
							if($('#url_factura').val()!=""){
								var Contabilidad_Factura = $('#url_factura').val().indexOf("---");
								if(Contabilidad_Factura!=-1){
									mostrar_archivos_lista($('#url_factura').val(), "divContabilidad_Adjuntar_Factura_lista", Ruta_Archivos_Contabilidad, "si", "url_factura", eliminar_archivo);
								}else{
									mostrar_archivos_lista($('#url_factura').val(), "divContabilidad_Adjuntar_Factura_lista", Ruta_Archivos_Contabilidad, "no", "url_factura", eliminar_archivo);
								}
							}
							//cargar_archivos("url_factura", "documentos_adjuntos_factura", data.data[0].Url_Factura,"../Archivos/Archivos-Activos-Contabilidad",true,false);
						}
						
						if(data.data[0].Url_Xml!=null && data.data[0].Url_Xml.length>0){
							$("#url_xml_contabilidad").val(data.data[0].Url_Xml);
							if($('#url_xml_contabilidad').val()!=""){
								var Contabilidad_Xml = $('#url_xml_contabilidad').val().indexOf("---");
								if(Contabilidad_Xml!=-1){
									mostrar_archivos_lista($('#url_xml_contabilidad').val(), "divContabilidad_Adjuntar_Xml_lista", Ruta_Archivos_Contabilidad, "si", "url_xml_contabilidad", eliminar_archivo);
								}else{
									mostrar_archivos_lista($('#url_xml_contabilidad').val(), "divContabilidad_Adjuntar_Xml_lista", Ruta_Archivos_Contabilidad, "no", "url_xml_contabilidad", eliminar_archivo);
								}
							}
						}
                    }
                },
                error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
                }
            });
		}
    }
	
	var variable_ir_inventario="<?php echo $variable_ir_inventario; ?>";
	if(variable_ir_inventario!=""){
		pasarvalores(variable_ir_inventario,0);
	}
	<?php echo $variable_ir_inventario=""; ?>
	
	// Función para cargar la sección de Administración de Consumibles/Accesorios dentro de la ficha de Activos
	cargarAdminAccesoriosActivos = function(Id_Activo = null) {
		// Carga dinamicamente el pequeño formulario donde se administran los accesorios y los activos
		var parametrosJson = { Id_Activo: Id_Activo, accion: "AccesorioConsumibleAdminGet" };
		$("#activo-accesorio-consumible-admin").load("../controladores/simple_mvc/ActivoAccesorioConsumibleController.Class.php", parametrosJson, function (response, status, xhr) {
			if (status == "error") {
				// Ha ocurrido un error y debe mostrarse
				var msg = "Sorry but there was an error: ";
				mensajesalerta("Informaci&oacute;n", msg + xhr.status + " " + xhr.statusText, "error", "dark");
				$("#activo-accesorio-consumible-admin").html(msg + xhr.status + " " + xhr.statusText);
			}
		});
	}


	// Función que carga la ficha de la baja seleccionada en la tabla
	var parametrosCargaArchivos = {
		nombreInputFile: "ArchivosBajaAreaInputFile",
		div_control: "ArchivosBajaArea",
		div_lista: "ArchivosBajaAreaLista",
		url_hidden: "ArchivosBajaAreaInputHidden",
		url_upload: "../Archivos/Archivos-Activos-Bajas",
		vista_imagen: false,
		show_upload: false,
		tipo_archivo: ["jpg", "jpeg", "png", "bmp", "gif", "pdf", "docx", "doc", "xls", "xlsx", "ppt","pptx", "xml" ],
		nombre_label: null,
		accionAgregar: () => guardarAdjuntoBaja(),
		accionEliminar: null,
		accionListaElementos: () => obtenerListaArchivosBaja(),
		idInputObjetoPrincipal: "Id_Activo_Baja_Form"
	};
	pasarvalores_baja = function(id) {
		limpiarcamposbaja();

		$.ajax({
			type: "POST",
			url: "../fachadas/activos/siga_baja_activo/Siga_baja_activoFacade.Class.php",
			async: false,
			data: {
				Id_Activo: id,
				accion: "consultar"
			},
			dataType: "html",
			beforeSend: function (xhr) {
			},
			success: function (data) {
				data = eval("(" + data + ")");
				
				if (data.totalCount > 0) {
					$("#bajaEquipo").modal("show");
					$("#generarbaja").hide();
					$("#Id_baja_activo").val(data.data[0].Id_baja);
					$("#Id_Activo_Baja_Form").val(data.data[0].Id_Activo);
					$("#cmbbajas").val(data.data[0].Motivo_Baja);
					$("#Comentarios_baja").val(data.data[0].Comentarios);
					$("#cmbdestinofinal").val(data.data[0].Destino);
					$("#Fecha_baja").val(data.data[0].Fecha_Baja);
					$("#Fecha_baja").datepicker("update");

					var $select3 = $('#AF_BC_baja').selectize({});
					var control3 = $select3[0].selectize;
					control3.addItem(data.data[0].Id_Activo);
					
					var $Usuario_Baja = $('#Usuario_soli_baja').selectize({});
					var Usr_Baja = $Usuario_Baja[0].selectize;
					Usr_Baja.addItem(data.data[0].Usuario);
					
					$("#Cuenta_baja").val(data.data[0].Cuenta_baja);
					//$("#cmbCuenta_baja").val(-1);
					
					var text2 = data.data[0].Cuenta_baja;
					//alert(text2);
					//if (text2 == null)
					//text2 = -1;
					$("#cmbCuenta_baja option").filter(function() {
						return this.text == text2; 
					}).attr('selected', true);
					validaWorkFlow(data.data[0].Id_Activo);
				}

				// Al mostrar la ficha baja, se inicializa el objeto de carga de Archivos o resetea los valortes que pudiera tener cargados previamente
				parametrosCargaArchivos.show_upload = true;
				// Habilita el campo de selección del activo
				$("#AF_BC_baja")[0].selectize.disable();
				$("#Usuario_soli_baja")[0].selectize.disable();
				
				// Actualiza el control de subida de archivos
				subirArchivosVsObjeto(parametrosCargaArchivos);
			},
			error: function () {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
			}
		});
	}

			function validaWorkFlow(Id_Activo) {
				$.ajax({
					type: "POST",
					encoding:"UTF-8",
					url: "../vistas/obtenbajaactivo.php",        
					async: false,
					data: {Id_Activo:Id_Activo},
					dataType: "json",
					beforeSend: function (xhr) {
					},
					success: function (datos) {
						//console.log(datos);
						if (datos[0].Seg_Sol_Baja == 1) {
							$("#Paso1").removeClass("amarillo");
							$("#Paso1").addClass("verde");
						}
						if (datos[0].Seg_Usuario_Resp == 1) {
							$("#Paso2").removeClass("amarillo");
							$("#Paso2").addClass("verde");
						}
						if (datos[0].Seg_Resp_Area_Ges == 1) {
							$("#Paso3").removeClass("amarillo");
							$("#Paso3").addClass("verde");
						}
						if (datos[0].Seg_Dir_Adminis == 1) {
							$("#Paso4").removeClass("amarillo");
							$("#Paso4").addClass("verde");
						}
						if (datos[0].Seg_Contabilidad == 1) {
							$("#Paso5").removeClass("amarillo");
							$("#Paso5").addClass("verde");
						}
						if (datos[0].Seg_Sol_Baja == 0) {
							$("#Paso1").removeClass("amarillo");
							$("#Paso1").addClass("rojo");
						}
						if (datos[0].Seg_Usuario_Resp == 0) {
							$("#Paso2").removeClass("amarillo");
							$("#Paso2").addClass("rojo");
						}
						if (datos[0].Seg_Resp_Area_Ges == 0) {
							$("#Paso3").removeClass("amarillo");
							$("#Paso3").addClass("rojo");
						}
						if (datos[0].Seg_Dir_Adminis == 0) {
							$("#Paso4").removeClass("amarillo");
							$("#Paso4").addClass("rojo");
						}
						if (datos[0].Seg_Contabilidad == 0) {
							$("#Paso5").removeClass("amarillo");
							$("#Paso5").addClass("rojo");
						}
						
						for (i=0; i < datos.length; i++) {
							//console.log(parseJsonDate(datos[i].FechaAceptado));
							if (datos[i].FechaAceptado != null) {
								var str = window.JSON.stringify(datos[i].FechaAceptado);
								var obj = window.JSON.parse(str);	
								var dateStr = obj.date;
								var a = moment(dateStr);
								$("#Paso"+datos[i].Orden+"Fecha").show();	
								$("#Paso"+datos[i].Orden+"Fecha").html('<b>Fecha Aceptado:</b><br>'+a.format('DD/MM/YYYY HH:mm')+'<br><b>'+datos[i].Correo+'</b>');
							}
							if (datos[i].Aceptado == 0) {
								$("#Paso"+datos[i].Orden+"Link").show();
								$("#Paso"+datos[i].Orden+"Link").html('<a target="_aprobacion" href="<?php echo $paginaSEO?>acepto.php?Id_Activo='+datos[i].Id_Activo+'&Paso='+datos[i].Orden+'&Id_Usuario='+datos[i].Id_Usuario+'">Link Aprobación</a>');
							}
							if (datos[i].ComentarioBaja != null) {
								$("#Paso"+datos[i].Orden+"Com").show();
								$("#Paso"+datos[i].Orden+"Com").html('<a href="javascript:void()" data-toggle="tooltip" data-placement="top" title="'+datos[i].ComentarioBaja+'" >Comentario</a>');
							}
						}
						//mensajesalerta("&Eacute;xito", "Correo enviado Correctamente.", "success", "dark");
					},
					error: function () {
						mensajesalerta("Oh No!", "Ocurrio un error al enviar.", "error", "dark");
					}
				});
			}
	
			pasarvalores_reubicacion=function(id,idreubicacion){
				limpiarcamposreubicacion();
				$.ajax({
					type: "POST",
					url: "../fachadas/activos/siga_reubicacion_activo/Siga_reubicacion_activoFacade.Class.php",
					async: false,
					data: {
						Id_Activo: id,
						Id_Activo_Reubicacion: idreubicacion,
						Estatus_Reg: "1",
						accion: "consultar"
					},
					dataType: "html",
					beforeSend: function (xhr) {
					},
					success: function (data) {
						data = eval("(" + data + ")");
						if (data.totalCount > 0) {
							$("#reubicacionEquipo").modal("show");
							var $select3 = $('#AF_BC_reubicacion').selectize({});	
							var control3 = $select3[0].selectize;
							control3.addItem(data.data[0].Id_Activo);
							
							var $select_numempleadoreubicacion = $('#numempleadoreubicacion').selectize({});	
							var control_numempleadoreubicacion = $select_numempleadoreubicacion[0].selectize;
							control_numempleadoreubicacion.addItem(data.data[0].Id_Usuario_Responsable);
							
							$("#Id_reubicacion_activo").val(data.data[0].Id_Activo_Reubicacion);
							$("#cmb_area_guardar").val(data.data[0].Id_Area);
							$("#cmb_area_guardar").change();
							$("#cmb_ubic_prim_reub_guar").val(data.data[0].Id_Ubic_Prim);
							if(data.data[0].Id_Ubic_Prim!="") {
								ubic_sec_reubicacion(data.data[0].Id_Ubic_Prim);
							}
							$("#cmb_ubic_sec_reub_guar").val(data.data[0].Id_Ubic_Sec);
							$("#ubic_especifica_guardar").val(data.data[0].Ubic_Especifica);
							$("#usuario_resp_guardar").val(data.data[0].Nom_Usuario_Reponsable);
							$("#centro_costos_guardar").val(data.data[0].Centro_Costos);
							$("#centro_costos_guardar").prop("disabled", true);
							$("#jefearea_reubicacion").val(data.data[0].Jefe_Area);
							$("#Motivo_Reubicacion").val(data.data[0].Motivo_Reubicacion);
							$("#comentarios_reubicacion").val(data.data[0].Comentarios_Reubicacion);
							$("#generarreubicacion").prop("disabled", true);
						}
					},
					error: function () {
						mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
					}
				});
			}
	
			//Funcion Para Eliminar Logicamente
			pasarelimina= function(id) {
				bootbox.dialog({
					message: "Advertencia!! <br><br> Esta Seguro de Eliminar el Registro??",
					buttons: {
						danger: {
							label: "Aceptar",
							className: "btn-primary",
							callback: function() {
								
								$.ajax({
									type: "POST",
									url: "../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",        
									async: false,
									data: {
										Id_Activo: id,
										Estatus_Reg: '3',
										Usr_Mod: 'Pruelimina',
										accion: "guardar"
									},
									dataType: "html",
									beforeSend: function (xhr) {

									},
									success: function (datos) {
										var json;
										json = eval("(" + datos + ")"); //Parsear JSON
										mensajesalerta("&Eacute;xito", "Eliminado Correctamente.", "success", "dark");	
										$('#tablaactivos').DataTable().ajax.reload();
									},
									error: function (objeto, quepaso, otroobj) {
										mensajesalerta("Oh No!", "Ocurrio un error al eliminar.", "error", "dark");
									}
								});
							}
						},
						success: {
							label: "Cancelar!",
							className: "btn-primary",
							callback: function() {
							}
						}
						
					}
				});
			}
	
			pasareliminabaja= function(id) {
				bootbox.dialog({
					message: "Advertencia!! <br><br> ¿Esta seguro de que desea reactivar el AFBC seleccionado??",
					buttons: {
						danger: {
							label: "Aceptar",
							className: "btn-primary",
							callback: function() {
								$.ajax({
									type: "POST",
									url: "../fachadas/activos/siga_baja_activo/Siga_baja_activoFacade.Class.php",        
									async: false,
									data: {
										Id_baja: id,
										accion: "baja"
									},
									dataType: "html",
									beforeSend: function (xhr) {

									},
									success: function (datos) {
										var json;
										json = eval("(" + datos + ")"); //Parsear JSON
										mensajesalerta("&Eacute;xito", "Baja Cancelada Correctamente.", "success", "dark");	
										$('#tablaactivos').DataTable().ajax.reload();
										//tablabaja(0);
										$("#tabEnProceso").click();
									},
									error: function (objeto, quepaso, otroobj) {
										mensajesalerta("Oh No!", "Ocurrio un error al eliminar.", "error", "dark");
									}
								});
							}
						},
						success: {
							label: "Cancelar!",
							className: "btn-primary",
							callback: function() {
							}
						}
					}
				});
			}

			$(".selectize-control").css("height", "34px");

			pasarelimina_reubicacion= function(id) {
				bootbox.dialog({
					message: "Advertencia!! <br><br> Esta Seguro de eliminar/cancelar el estatus de reubicación del Registro?",
					buttons: {
						danger: {
							label: "Aceptar",
							className: "btn-primary",
							callback: function() {
								$.ajax({
									type: "POST",
									url: "../fachadas/activos/siga_reubicacion_activo/Siga_reubicacion_activoFacade.Class.php",        
									async: false,
									data: {
										Id_Activo_Reubicacion: id,
										accion: "baja"
									},
									dataType: "html",
									beforeSend: function (xhr) {
									},
									success: function (datos) {
										var json;
										json = eval("(" + datos + ")"); //Parsear JSON
										mensajesalerta("&Eacute;xito", "Reubicacion Cancelada Correctamente.", "success", "dark");	
										$('#tablaactivos').DataTable().ajax.reload();
										tablareubicacion();
									},
									error: function (objeto, quepaso, otroobj) {
										mensajesalerta("Oh No!", "Ocurrio un error al eliminar.", "error", "dark");
									}
								});
							}
						},
						success: {
							label: "Cancelar!",
							className: "btn-primary",
							callback: function() {
							}
						}
					}
				});
			}
	
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
				return false;
			}
	
			// Función para cerrar la ventana modal de edición del Activo
			confirmacion_cerrar = function(id_button){
				$.confirm({
					title: 'Cerrar editor del activo',
					content: 'Deseas salir sin guardar la información?',
					buttons: {
						cancel: {
							text: "Cancelar",
							btnClass: 'btn btn-default'
						},
						confirm:{
							text: "Cerrar",
							btnClass: 'btn btn-danger',
							action: function () {
								//eliminamos el backdrop del modal
								$('.modal-backdrop').remove();
								$('#' + id_button).modal('hide');
								if (id_button == 'bajaEquipo') {
									if ($("#Estatus_baja").val() != "") {
										tablabaja($("#Estatus_baja").val(), 1);
									}
								}
							}
						}
					}
				});
			}
		});

		function activaBoton(tab) {
			if (tab==1) {
				$("#guardar").show();
				$("#guardar2").hide();
				$("#guardar3").hide();
			}
			if (tab==2) {
				$("#guardar").hide();
				$("#guardar2").show();
				$("#guardar3").hide();
			}
			if (tab==3) {
				$("#guardar").hide();
				$("#guardar2").hide();
				$("#guardar3").show();
			}
		}

		$("#popupContable").click(function(e){
			//console.log('Anio='+$("#cmbAnio").val()+',Mes='+$("#cmbMes").val());
			$.ajax({
				url : 'includedepcontablelinearecta.php',
				type : "post",
				dataType: 'html',
				data : { AF_BC: $("#AF_BC").val(),Anio:$("#AnioDepreciacion").val(),Mes:$("#MesDepreciacion").val(),Formula:1,Id_Activo:$("#Id_Activo").val(),INPC: $("#INPCPeriodo").val()},
				success : function(response) {
					//$("#periodo-contable").modal('hide');
					$("#divLineaRecta").html(response);
					$("#periodo-contable").modal('show');
				},
				error: function(jqXHR, exception) {
					muestraErrorAjax(jqXHR, exception);
				}
			});
		});

		$("#popupReporteContable").click(function(e){
			$.ajax({
				url : 'includereportecontablelinearecta.php',
				type : "post",
				dataType: 'html',
				data : { AF_BC: $("#AF_BC").val(),Anio:$("#AnioDepreciacion").val(),Formula:1},
				success : function(response) {
					$("#divReporteLineaRecta").html(response);
					$("#acumulada-contable").modal('show');
				},
				error: function(jqXHR, exception) {
					muestraErrorAjax(jqXHR, exception);
				}
			});
		});

		$("#popupContableMixta").click(function(e){
			$.ajax({
				url : 'includedepcontablelinearecta.php',
				type : "post",
				dataType: 'html',
				data : { AF_BC: $("#AF_BC").val(),Anio:$("#AnioDepreciacion").val(),Formula:2},
				success : function(response) {
					//$("#periodo-contable").modal('hide');
					$("#divLineaRecta").html(response);
					$("#periodo-contable").modal('show');
				},
				error: function(jqXHR, exception) {
					muestraErrorAjax(jqXHR, exception);
				}
			});
		});

		$("#popupReporteContableMixta").click(function(e){
			$.ajax({
				url : 'includereportecontablelinearecta.php',
				type : "post",
				dataType: 'html',
				data : { AF_BC: $("#AF_BC").val(),Anio:$("#AnioDepreciacion").val(),Formula:2},
				success : function(response) {
					$("#divReporteLineaRecta").html(response);
					$("#acumulada-contable").modal();
				},
				error: function(jqXHR, exception) {
					muestraErrorAjax(jqXHR, exception);
				}
			});
		});

		$("#popupFiscal").click(function(e){
			//alert($("#INPCPeriodo").val());
			$.ajax({
				url : 'includedepcontablelinearecta.php',
				type : "post",
				dataType: 'html',
				data : { AF_BC: $("#AF_BC").val(),Anio:$("#AnioDepreciacion").val(),Mes:$("#MesDepreciacion").val(),Formula:1,Id_Activo:$("#Id_Activo").val(),Fiscal:1,INPC: $("#INPCPeriodo").val()},
				success : function(response) {
					//$("#periodo-contable").modal('hide');
					$("#divFiscal").html(response);
					$("#periodo-contable").modal('show');
				},
				error: function(jqXHR, exception) {
					muestraErrorAjax(jqXHR, exception);
				}
			});
		});

		$("#popupReporteFiscal").click(function(e){
			$.ajax({
				url : 'includereportefiscal.php',
				type : "post",
				dataType: 'html',
				data : { AF_BC: $("#AF_BC").val(),Anio:$("#AnioDepreciacion").val(),Mes:$("#MesDepreciacion").val(),Formula:1,Id_Activo:$("#Id_Activo").val(),Fiscal:1,INPC: $("#INPCPeriodo").val()},
				success : function(response) {
					$("#divReporteFiscal").html(response);
					$("#acumulada-fiscal").modal();
				},
				error: function(jqXHR, exception)  {
					muestraErrorAjax(jqXHR, exception);
				}
			});
		});

		$("#popupFiscalD4").click(function(e){
			$.ajax({
				url : 'includedepcontablelinearecta.php',
				type : "post",
				dataType: 'html',
				data : { AF_BC: $("#AF_BC").val(),Anio:$("#AnioDepreciacion").val(),Mes:$("#MesDepreciacion").val(),Formula:1,Id_Activo:$("#Id_Activo").val(),Fiscal:1, D4:1,INPC: $("#INPCPeriodo").val()},
				success : function(response) {
					//$("#periodo-contable").modal('hide');
					$("#divFiscalD4").html(response);
					$("#periodo-contable").modal('show');
				},
				error: function(jqXHR, exception) {
					muestraErrorAjax(jqXHR, exception);
				}
			});
		});

		$("#popupReporteFiscalD4").click(function(e){
			$.ajax({
				url : 'includereportefiscal.php',
				type : "post",
				dataType: 'html',
				data : { AF_BC: $("#AF_BC").val(),Anio:$("#AnioDepreciacion").val(),Mes:$("#MesDepreciacion").val(),Formula:1,Id_Activo:$("#Id_Activo").val(),Fiscal:1, D4:1,INPC: $("#INPCPeriodo").val()},
				success : function(response) {
					$("#divReporteFiscal").html(response);
					$("#acumulada-fiscal").modal();
				},
				error: function(jqXHR, exception) {
					muestraErrorAjax(jqXHR, exception);
				}
			});	
		});

		$("#popupFiscalB10").click(function(e){
			$.ajax({
				url : 'includedepcontablelinearecta.php',
				type : "post",
				dataType: 'html',
				data : { AF_BC: $("#AF_BC").val(),Anio:$("#AnioDepreciacion").val(),Mes:$("#MesDepreciacion").val(),Formula:1,Id_Activo:$("#Id_Activo").val(),Fiscal:1, D4:1,INPC: $("#INPCPeriodo").val(),B10: 1},
				success : function(response) {
					//$("#periodo-contable").modal('hide');
					$("#divFiscalD4").html(response);
					$("#periodo-contable").modal('show');
				},
				error: function(jqXHR, exception)  {
					muestraErrorAjax(jqXHR, exception);
				}
			});
		});

		$("#popupReporteFiscalB10").click(function(e){
			$.ajax({
				url : 'includereportefiscalD4.php',
				type : "post",
				dataType: 'html',
				data : { AF_BC: $("#AF_BC").val(), Anio:$("#AnioDepreciacion").val(), Tipo:'B10'},
				success : function(response) {	
					$("#divReporteFiscalD4").html(response);
					$("#acumulada-fiscalD4").modal();
				},
				error: function(jqXHR, exception) 
				{
					muestraErrorAjax(jqXHR, exception);
				}
			});
		});

		function muestraErrorAjax(jqXHR,exception) {
			if (jqXHR.status === 0) {
				alert('Not connect.\n Verify Network.');
			} else if (jqXHR.status == 404) {
				alert('Requested page not found. [404]');
			} else if (jqXHR.status == 500) {
				alert('Internal Server Error [500].');
			} else if (exception === 'parsererror') {
				alert('Requested JSON parse failed.');
			} else if (exception === 'timeout') {
				alert('Time out error.');
			} else if (exception === 'abort') {
				alert('Ajax request aborted.');
			} else {
				alert('Uncaught Error.\n' + jqXHR.responseText);
			}
		}
			
		function validaMantenimiento() {
			var Id_Activo = $("#Id_Activo").val();
			var Perfil=$("#hddperfil").val();
			var IdArea=$("#idareasesion").val();
			if (Id_Activo != "") {
				$("#guardar2").click();
				if ($("#Id_Valido2").val() == 1) {
					loadOptionBandejas('mantenimiento-preventivo.php?Id_Menu=4&Id_Submenu=2&abriractivo='+Id_Activo+'&perfil='+Perfil+'&area='+IdArea,'contenedorprincipalactivofijo','2943');
					Activa_btn_menu('li_sub_2', 'S');
				}
			}
			else {
				var Id_ActivoTemp = $("#Id_Activo").val();	
				$("#guardar").click();
				if ($("#Id_Valido").val() == 1) {
					loadOptionBandejas('mantenimiento-preventivo.php?Id_Menu=4&Id_Submenu=2&abriractivo='+Id_ActivoTemp,'contenedorprincipalactivofijo','2943');
					Activa_btn_menu('li_sub_2', 'S');
				}
			}
		}
			
		$("#cmb_mant_prevent").change(function(e) {
			if ($("#Id_Activo").val() != "") {
				if ($("#cmb_mant_prevent").val() ==1) {
					if($("#hddperfil").val()!="68") {
						$("#linkMantenimiento").show();
					}
				}
				else {
					$("#linkMantenimiento").hide();
				}
			}
		});
		
		function abrirMas() {
			$("#MasManuales").toggle();
		}
		
		$("#garantia").focusout(function(e) {
			var FechaFactura = $("#FechaFactura").val();
			var garantia = $("#garantia").val();
			if (FechaFactura != "" && garantia != "") {
				var a = moment(FechaFactura,"DD/MM/YYYY");
				//alert('FechaFactura='+a.format('DD/MM/YYYY'));
				var futureMonth = moment(a).add(garantia, 'M');
				//alert(futureMonth.format('DD/MM/YYYY'));
				$('#Fecha_Vencimiento').datepicker("setDate", futureMonth.format('DD/MM/YYYY') );
			}
		});
		
		$("#fecha_inicio_depr").focusout(function(e) {
			var FechaInicio = $("#fecha_inicio_depr").val();
			var FechaFactura = $("#FechaFactura").val();
			validaFecha(FechaInicio,FechaFactura,'inicio de depreciación','fecha_inicio_depr');
		});
		
		$('#fecha_inicio_depr').on('changeDate', function (ev) {
			var FechaInicio = $("#fecha_inicio_depr").val();
			var FechaFactura = $("#FechaFactura").val();
			validaFecha(FechaInicio,FechaFactura,'inicio de depreciación','fecha_inicio_depr');
		});
		
		$("#Fecha_baja").focusout(function(e) {
			var FechaInicio = $("#Fecha_baja").val();
			var FechaFactura = $("#FechaFactura").val();
			validaFecha(FechaInicio,FechaFactura,'baja','Fecha_baja');
		});
		
		$('#Fecha_baja').on('changeDate', function (ev) {
			var FechaInicio = $("#Fecha_baja").val();
			var FechaFactura = $("#FechaFactura").val();
			validaFecha(FechaInicio,FechaFactura,'baja','Fecha_baja');
		});
		
		$("#Fecha_Vencimiento").focusout(function(e) {
			var FechaInicio = $("#Fecha_Vencimiento").val();
			var FechaFactura = $("#FechaFactura").val();
			validaFecha(FechaInicio,FechaFactura,'baja','Fecha_Vencimiento');
		});
		
		$('#Fecha_Vencimiento').on('changeDate', function (ev) {
			var FechaInicio = $("#Fecha_Vencimiento").val();
			var FechaFactura = $("#FechaFactura").val();			
			validaFecha(FechaInicio,FechaFactura,'baja','Fecha_Vencimiento');
		});
		
		$("#FechaFactura").focusout(function(e)
		{
			var activopadre = $("#activopadre").val();
			var FechaPadre;
			var VidaUtilPadre;
			var FechaHijo = $("#FechaFactura").val();
			if (activopadre != '')
			{
				
			$.ajax({
				url : 'obtenpadre.php',
					type : "post",
					dataType: 'html',
					data : { Id_Activo: activopadre},
					success : function(datos) {
						json = eval("(" + datos + ")"); //Parsear JSON
						//console.log(json[0]);
						FechaPadre = json[0].FechaFactura.date;
						VidaUtilPadre = json[0].VidaUtilCHS;
						//alert(FechaPadre);
						//alert(FechaHijo);
						var MesesPadre = VidaUtilPadre*12; 
						difAnios = new Date(FechaPadre);
						difAnios2 = compareDate(FechaHijo);
						anio1 = difAnios.getFullYear();
						anio2 = difAnios2.getFullYear();
						mes1 = difAnios.getMonth()+1;
						mes2 = difAnios2.getMonth()+1;
						/*alert(MesesPadre);
						alert(anio1);
						alert(anio2);
						alert(mes1);
						alert(mes2);*/
						vidautilhijo = (MesesPadre-(((anio2-anio1)*12)+(mes2-mes1)))/12;
						//alert(vidautilhijo);
						alert('Vida Util Hijo recalculada');
						$("#VidaUtilCHS").val(Math.round(vidautilhijo * 100) / 100);
					},
					error: function(jqXHR, exception) {
						muestraErrorAjax(jqXHR, exception);
					}
				});
			}
		});
		
		$("#VidaUtilCHS").focusout(function(e) {
			var activopadre = $("#activopadre").val();
			var FechaPadre;
			var VidaUtilPadre;
			var FechaHijo = $("#FechaFactura").val();
			if (activopadre != '') {
				$.ajax({
					url : 'obtenpadre.php',
					type : "post",
					dataType: 'html',
					data : { Id_Activo: activopadre},
					success : function(datos) 
						{
							json = eval("(" + datos + ")"); //Parsear JSON
							//console.log(json[0]);
							FechaPadre = json[0].FechaFactura.date;
							VidaUtilPadre = json[0].VidaUtilCHS;
							//alert(FechaPadre);
							//alert(FechaHijo);
							var MesesPadre = VidaUtilPadre*12; 
							difAnios = new Date(FechaPadre);
							difAnios2 = compareDate(FechaHijo);
							anio1 = difAnios.getFullYear();
							anio2 = difAnios2.getFullYear();
							mes1 = difAnios.getMonth()+1;
							mes2 = difAnios2.getMonth()+1;

							vidautilhijo = (MesesPadre-(((anio2-anio1)*12)+(mes2-mes1)))/12;
							//alert(vidautilhijo);
							vidautilhijo = (Math.round(vidautilhijo * 100) / 100);
							
							if ($("#VidaUtilCHS").val() > VidaUtilPadre)
							{
								alert('La vida util del hijo no puede ser mayor a '+VidaUtilPadre+' que es la vida util del padre');
							}	
						},
					error: function(jqXHR, exception) {
						muestraErrorAjax(jqXHR, exception);
					}
				});
			}
		});
		
		$("#centro_costos").change(function(e) {
			validaCentroCostos("centro_costos",'');
		});
		
		$("#centro_costos2").change(function(e) {
			validaCentroCostos("centro_costos2",'');	
			if ($("#activopadre").val() == '') {
				$("#centro_costos").val($("#centro_costos2").val());
			}
		});
		
		$("#centro_costos_guardar").change(function(e) {
			if ($("#AF_BC_reubicacion").val() != '') {
				$.ajax({
					url : 'obtenactivo.php',
					type : "post",
					dataType: 'html',
					data : { Id_Activo: $("#AF_BC_reubicacion").val() },
					success : function(datos)  {
							json = eval("(" + datos + ")"); //Parsear JSON
							//console.log(json[0]);
							id_Padre = json[0].Id_ActivoPadre;
							if (id_Padre != 0 && id_Padre != '')
							validaCentroCostos("centro_costos_guardar",id_Padre);	
							//alert(id_Padre);	
						},
					error: function(jqXHR, exception)  {
						muestraErrorAjax(jqXHR, exception);
					}
				});
			}
			else {
				alert('Debe elegi primero un activo a reasignar');
				$("#centro_costos_guardar").val(-1);
			}
			//validaCentroCostos("centro_costos_guardar");	
		});
		
		function validaCentroCostos(campo,padre) {
			var activopadre = $("#activopadre").val();
			if (padre != '') {
				activopadre = padre;
			}

			var Centro_Costos;
			if (activopadre != '') {
				$.ajax({
					url : 'obtenactivo.php',
					type : "post",
					dataType: 'html',
					data : { Id_Activo: activopadre},
					success : function(datos) {
							json = eval("(" + datos + ")"); //Parsear JSON
							//console.log(json[0]);
							Centro_Costos = json[0].Centro_Costos;
							//alert(FechaPadre);
							//alert(FechaHijo);
							if (Centro_Costos != $("#"+campo).val()) {
								alert('El Centro de costos no puede ser cambiado ya que es diferente al del padre');
								//alert(Centro_Costos);
								$("#"+campo).val(Centro_Costos);
							}	
						},
					error: function(jqXHR, exception) {
						muestraErrorAjax(jqXHR, exception);
					}
				});
			}
		}
		
		function compareDate(str1) {
			// str1 format should be dd/mm/yyyy. Separator can be anything e.g. / or -. It wont effect
			var dt1   = parseInt(str1.substring(0,2));
			var mon1  = parseInt(str1.substring(3,5));
			var yr1   = parseInt(str1.substring(6,10));
			var date1 = new Date(yr1, mon1-1, dt1);
			return date1;
		}
		
		function validaFecha(FechaInicio,FechaFactura,mensaje,campo) {
			if (FechaInicio != "" && FechaFactura != "") {
				var a = moment(FechaInicio,"DD/MM/YYYY");
				var b = moment(FechaFactura,"DD/MM/YYYY");
				var isafter = b.isAfter(a);
				//alert(isafter);
				if (isafter) {
					mensajesalerta("Oh No!", "La fecha de "+mensaje+" no puede ser menor a la fecha de la factura", "error", "dark");
					$("#"+campo).val('');
					//alert('FechaFactura='+a.format('DD/MM/YYYY'));
				}
			}
		}
		
		/*$(function () {
		  $('[data-toggle="tooltip"]').tooltip();
		})*/
		
		$("#cmbCuenta_baja").change(function(e) {
			$("#Cuenta_baja").val($("#cmbCuenta_baja option:selected").text());
		});
		
		$("#chknumserie").change(function(e){
			if ($("#chknumserie").is(":checked"))
				$("#spannunmserie").hide();
			else
				$("#spannunmserie").show();
		});
		
		$('#UUID').keyup(function () {
			$(this).val($(this).val().toUpperCase());
		});
		
		$('#UUID2').focusout( function(e) {
			var url = $('#UUID2').val();
			url = url.replace('https://verificacfdi.facturaelectronica.sat.gob.mx/default.aspx?','');
			var id = getUrlParameter('id',url);
			var tt = getUrlParameter('tt',url);
			//alert(url);
			//alert(id);
			$('#UUID').val(id);
			$("#Monto_Factura").val(tt);
		});
		
		function getUrlParameter(sParam,url) {
			var sPageURL = url, sURLVariables = sPageURL.split('&'), sParameterName, i;
			for (i = 0; i < sURLVariables.length; i++) {
				sParameterName = sURLVariables[i].split('=');
				if (sParameterName[0] === sParam) {
					return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
					//return sParameterName[1] === undefined ? true : sParameterName[1];
				}
			}
		}
		 
		$("#cmbparticipaendepresiacion").change(function(e){
			if ($("#cmbparticipaendepresiacion").val() == 1) {
				$("#spanparticipa").show();
				$("#divContabilidad_Formulas").show();
			}
			else {
				$("#spanparticipa").hide();
				$("#divContabilidad_Formulas").hide();
			}
		});
		
		$('a[data-toggle="tooltip"]').tooltip({
			animated: 'fade',
			placement: 'bottom',
			html: true
		});

		$( "#NombreProveedor").focusin(function (e){
			$( "#NombreProveedor" ).autocomplete('search');
		});

		$( "#NombreProveedor" ).autocomplete({
			source: "buscaProveedor.php",
			minLength: 0,
			select: function( event, ui )  {
				//cargadatos(ui.item.id);
				//alert('Hola');
				//$("#hddCveContacto").val(ui.item.id);
			}
		});
	
		$("#cmbpropiedad").change(function (e){
			if ($("#cmbpropiedad").val() == 1)  {
				$("#spanFechaFactura").show();
			}
			else{
				$("#spanFechaFactura").hide();
			}
		});
	
		if("<?php echo $Id_Menu;?>"=="25"){
			$("#tabbaja_definitiva").click();
		}


		// Función para ver detalle en una ventana modal del Accesorio/Consumible que está ligado al activo seleccionado
		function verAccesorioConsumible(elemento) {
			var parametrosJson = { Id_Activo: $(elemento).data("id-activo"), accion: "AccesorioConsumibleGet" };
			$("#area-activo-accesorio-consumible-lista-modal").load("../controladores/simple_mvc/ActivoAccesorioConsumibleController.Class.php", parametrosJson, function (response, status, xhr) {
				if (status != "error") {
					$("#activo-accesorio-consumible-lista-modal").modal('show');
				}
				else {
					// Ha ocurrido un error y debe mostrarse
					var msg = "Sorry but there was an error: ";
					mensajesalerta("Informaci&oacute;n", msg + xhr.status + " " + xhr.statusText, "error", "dark");
				}
			});
		}
	</script>
	<style>
		.table-chs thead select { color: initial; font-size: 11px; }
		.table-chs thead td { border-bottom: none !important; }
		.table-chs thead th { border-top: none !important; }
		.w-100 { width: 100%!important; }
		.w-100 button { width: 100% !important; }

		.dataTables_scrollHead { position: initial !important; }
			.dataTables_scrollHead th { vertical-align: middle; }
			.dataTables_scrollHead { align-content: center; }
			.dataTables_scrollHead .multiselect-container li { font-size: 10px; }
			.dataTables_scrollHead .multiselect-native-select { position: absolute !important; z-index: 1; }
			.dataTables_scrollHead button.multiselect { font-size: 10px; height: 25px; padding: 2px 4px; width: 100%; }

		/* Barras larterales para ocultar los botones de filtro Tipo Excel cuando se mueve el scroll horizontal */
		.barrasLateralesDataTableIzquierdo { width: 25px; height: 100%; background: #FFF; position: absolute; top: 0; left: 0; z-index: 10; }
		.barrasLateralesDataTableDerecho { width: 25px; height: 100%; background: #FFF; position: absolute; top: 0; right: 0; z-index: 10; }

		/*.dataTables_scrollBody .multiselect-native-select { display: none !important; }*/
	</style>