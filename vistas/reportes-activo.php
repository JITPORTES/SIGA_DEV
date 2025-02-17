<?php
	include_once(dirname(__FILE__) . "/../modelos/simple_mvc/ActivoFijoInventarioReportesModel.Class.php");
	// Lista de tablas que componen el Universo de Inventario
	$lstTablasInventario = ["tablaactivos", "tablebajas", "tablereubicacion"];

session_start();

?>
<!-- Select2 -->
<input type="hidden" id="Id_Usuario_para_ajax" name="Id_Usuario_para_ajax" value="<?php echo $_SESSION["Id_Usuario"];?>">

	<link href="../js/select2.min.css" rel="stylesheet">
	
 	<!-- File Input -->
	<link rel="stylesheet" href="../plugins/fileinput/fileinput.css">
	<link rel="stylesheet" href="../dist/css/estilosPersonalizados.css">
	<script src="../plugins/docsupport/standalone/selectize.js"></script>
	<script src="../plugins/docsupport/index.js"></script>
	<script src="../js/select2.full.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>

	<!-- ==== Seccion1: Reporte de Activo Fijo ==== -->
	<div id="areaReporteActivoFijo" class="seccionEdicion">
		<!-- ==== Parte A: Area del Reporte ==== -->
		<div id="tabla_dinamica_reporte" style="display: none;">
			<button type="button" class="btn chs" onclick="limpiar_campos()"><--Regresar</button>
			<ul class="nav nav-tabs azulf" role="tablist"><li class="export"><a href="#" onclick="reporte()"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Exportar</a></li></ul>

			<form id="cont" action="../controladores/activos/siga_reportes/Reporte_Activos.php" method="post" style="display: none;">
				<input type="text" name="Val1" id="Val1" />
				<input type="text" name="Val2" id="Val2" />
				<input type="text" name="Val3" id="Val3" />
				<input type="text" name="Val4" id="Val4" />
				<input type="text" name="Val5" id="Val5" />
				<input type="text" name="Val6" id="Val6" />
				<input type="text" name="Val7" id="Val7" />
				<input type="text" name="Val8" id="Val8" />
				<input type="text" name="Val9" id="Val9" />
				<input type="text" name="Val10" id="Val10" />
				<input type="text" name="Val11" id="Val11" />
				<input type="text" name="Val12" id="Val12" />
				<input type="text" name="Val13" id="Val13" />
				<input type="text" name="Val14" id="Val14" />
				<input type="text" name="Val15" id="Val15" />
				<input type="text" name="Val16" id="Val16" />
				<input type="text" name="Val17" id="Val17" />
				<input type="text" name="Val18" id="Val18" />
				<input type="text" name="Val19" id="Val19" />
				<input type="text" name="Val20" id="Val20" />
				<input type="text" name="Val21" id="Val21" />
				<input type="text" name="Val22" id="Val22" />
				<input type="text" name="Val23" id="Val23" />
				<input type="text" name="Val24" id="Val24" />
				<input type="text" name="Val25" id="Val25" />
				<input type="text" name="hddbaja" id="hddbaja" />
				<input type="text" name="Check_Seleccionados" id="Check_Seleccionados" />
			</form>

			<!-- ==== Reporte Principal de Activo Fijo ==== -->
			<table id="tabla_reporte_activos" class="table table-bordered table-striped table-chs" width="100%">
				<thead>
					<tr>
						<th>No.</th>
						<th id="th_AF_BC">AF/BC</th>
						<th id="th_Nombre_Activo" >Nombre Activo</th>
						<th id="th_Area">Área</th>
						<th id="th_Ubic_Primaria">Ubicación<br> Primaria</th>
						<th id="th_Ubic_Sec">Ubicación<br> Secundaria</th>
						<th id="th_Ubic_Esp">Ubicación<br> Especifica</th>
						<th id="th_Desc_Larga">Descripción Larga</th>
						<th id="th_Desc_Corta">Descripción Corta</th>
						<th id="th_Motivo_Alta">Motivo Alta</th>
						<th id="th_Propiedad">Propiedad</th>
						<th id="th_Clasificacion">Clasificación</th>
						<th id="th_Familia">Familia</th>
						<th id="th_Subfamilia">Subfamilia</th>
						<th id="th_Marca">Marca</th>
						<th id="th_Modelo">Modelo</th>
						<th id="th_No_Serie">Numero de Serie</th>
						<th id="th_Tipo_Activo">Tipo de activo</th>
						<th id="th_Part_PRE">Participa en Pre</th>
						<th id="th_Part_Seg">Participa en Seguros</th>
						<th id="th_Import_Seg">Importe Seguros</th>
						<th id="th_Part_Cert">Participa Certificacion</th>
						<th id="th_Num_Empleado">Num. Empleado </th>
						<th id="th_Nomb_Resguardo">Nombre <br> Resguardo</th>
						<th id="th_Tipo_Vale">Tipo Vale</th>
						<th id="th_Garantia">Garantia</th>
						<th id="th_Ext_Garantia">Ext. Garantia</th>
						<th id="th_Departamento">Departamento</th>
						<!--Datos Proveedor-->
						<th id="th_P_Num_Orden_Compra">Num. Orden Compra</th>
						<th id="th_P_Num_Factura">Num. Factura</th>
						<th id="th_P_Fech_Factura">Fecha Factura</th>
						<th id="th_P_UUID">UUID</th>
						<th id="th_P_Folio_Fiscal">Folio Fiscal</th>
						<th id="th_P_Monto_F">Monto Activo</th>
						<th id="th_P_Monto_Factura">Monto Factura</th>
						<th id="th_P_Num_Contrato">Núm. Contrato</th>
						<th id="th_P_Vida_Util_Fabr">Vida Util Fabri.</th>
						<th id="th_P_Vida_Util_CHS">Vida Util CHS</th>
						<th id="th_P_Garantia">Garantia</th>
						<th id="th_P_Ext_Garantia">Ext. Garantia</th>
						<th id="th_P_Fecha_Vencimiento">Fech. Vencimiento</th>
						<th id="th_P_Nom_Proveedor">Nombre Proveedor</th>
						<th id="th_P_Contacto">Contacto</th>
						<th id="th_P_Telefono">Telefono</th>
						<th id="th_P_Doc_Recibida">Doc. Recibida</th>
						<th id="th_P_Accesorios">Accesorios</th>
						<th id="th_P_Correo">Correo</th>
						<th id="th_P_Consumibles">Consumibles</th>
						<th id="th_P_Link">Link</th>
						<th id="th_P_Condicion">Condición Equipo</th>
						<th id="th_P_FchRecEqu">Fch Rec Equipo</th>
						<th id="th_P_FchOpeEqu">Fch Ope Equipo</th>
						<!-- ==== Datos Contabilidad ==== -->
						<th id="th_C_Centro_Costos">Centro de Costos</th>
						<th id="th_C_No_Capex">No. Capex</th>
						<th id="th_C_Prorrateo">Prorrateo</th>
						<th id="th_C_Participa_Depreciacion">Participa Depreciación</th>
						<th id="th_C_Fecha_Inicio_Depr">Fecha Inicio Depr</th>
						<th id="th_C_Cuent_Cont_Act">Cuenta Cont. Act.</th>
						<th id="th_C_Cuent_Cont_Act_B10">Cuenta Cont. Act. B10</th>
						<th id="th_C_Cuent_Cont_Result">Cuenta Cont. Result.</th>
						<th id="th_C_Cuent_Cont_Result_B10">Cuenta Cont. Result. B10</th>
						<th id="th_C_Cuent_Cont_Dep">Cuenta Cont. Dep.</th>
						<th id="th_C_Cuent_Cont_Dep_B10">Cuenta Cont. Dep. B10</th>
						<!------------------->
						<th id="th_A_Fecha_Alta">Fecha Alta</th>
						<th id="th_A_Uuario_Registro">Usuario Registro</th>
						<th id="th_A_Frecuencia">Frecuencia MP</th>
						<th id="th_A_Interno_Externo">I/E MP</th>
					</tr>
				</thead>
			</table>
		</div>

		<!-- ==== Parte B: Area de filtros del Reporte ==== -->
		<div class="row" id="Busqueda">
			<div class="col-md-10 col-md-offset-1">
				<input type="hidden" id="Id_Verificacion">
				<div class="col-md-12 col-sm-12 col-xs-12 form-group" align="center">
					<button type="button" class="btn chs" onclick="llenar_check()" id="llenar_campos_reporte">Llenar check</button>
					<button type="button" class="btn chs" onclick="limpiar_check()" id="limpiar_campos_reporte">Limpiar check</button>
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12 form-group" id="div_activos">
					<label  class="control-label" id="cmbareasLabel" style="font-size: 11px;">Activos</label>
					<select id="select-activos" class="demo-default" placeholder="Activos" style="display:none"></select>
					<div id="gifcargando1" style="display:none" align="center">
						<img src="../dist/img/cargando-loading.gif" style="max-width: 25px; max-height: 25px" alt="cargando-loading-037.gif">
					</div>
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12 form-group" id="div_areas">
					<label class="control-label" id="cmbareasLabel" style="font-size: 11px;">Áreas</label>
					<div class="input-group">
						<select class="form-control" id="cmbareas"></select>
						<span class="input-group-addon"><input type="checkbox" id="check_areas"></span>
					</div>
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12 form-group" id="div_ubicprimaria">
					<label  class="control-label" id="cmbareasLabel" style="font-size: 11px;">Ubicaci&oacute;n Primaria</label>
					<div class="input-group">
						<select class="form-control" id="cmbubicprim"></select>
						<span class="input-group-addon"><input type="checkbox" id="check_ubic_prim"></span>
					</div>
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12 form-group"></div>
				<div class="col-md-4 col-sm-12 col-xs-12 form-group" id="div_ubic_sec">
					<label  class="control-label" id="cmbareasLabel" style="font-size: 11px;">Ubicaci&oacute;n Secundaria</label>
					<div class="input-group">
						<select class="form-control" id="cmbubicsec">
							<option value="-1">--Ubicación Secundaria--</option>
						</select>
						<span class="input-group-addon"><input type="checkbox" id="check_ubic_sec"></span>
					</div>
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12 form-group">
					<label class="control-label"  style="font-size: 11px;">Ubicaci&oacute;n Especifica</label>
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Ubicaci&oacute;n Especifica" id="txtUbic_Especifica">
						<span class="input-group-addon"><input type="checkbox" id="check_Ubic_Especifica"></span>
					</div>
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12 form-group">
					<label class="control-label"  style="font-size: 11px;">Desc. Larga</label>
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Desc. Larga" id="txtDesc_Larga">
						<span class="input-group-addon"><input type="checkbox" id="check_Desc_Larga"></span>
					</div>
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12 form-group"></div>
				<div class="col-md-4 col-sm-12 col-xs-12 form-group">
					<label class="control-label"  style="font-size: 11px;">Desc. Corta</label>
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Desc. Corta" id="txtDesc_Corta">
						<span class="input-group-addon"><input type="checkbox" id="check_Desc_Corta"></span>
					</div>
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12 form-group" id="div_mot_alta">
					<label  class="control-label" id="cmbareasLabel" style="font-size: 11px;">Motivo</label>
					<div class="input-group">
						<select class="form-control" id="cmbmotivo" multiple="multiple"></select>
						<span class="input-group-addon"><input type="checkbox" id="check_motivo"></span>
					</div>
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12 form-group" id="div_propiedad">
					<label  class="control-label" id="cmbareasLabel" style="font-size: 11px;">Propiedad</label>
					<div class="input-group">
						<select class="form-control" id="cmbprpiedad" multiple="multiple"></select>
						<span class="input-group-addon"><input type="checkbox" id="check_propedad"></span>
					</div>
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12 form-group"></div>
				<div class="col-md-4 col-sm-12 col-xs-12 form-group" id="div_clase">
					<label  class="control-label" id="cmbareasLabel" style="font-size: 11px;">Clase</label>
					<div class="input-group">
						<select class="form-control"  id="cmbclase"></select>
						<span class="input-group-addon"><input type="checkbox" id="check_clase"></span>
					</div>
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12 form-group" id="div_clasificacion">
					<label class="control-label"  style="font-size: 11px;">Clasificación</label>
					<div class="input-group">
						<select class="form-control" id="cmbclasificacion">
							<option value="-1">--Clasificación--</option>
						</select>
						<span class="input-group-addon"><input type="checkbox" id="check_clasificacion"></span>
					</div>
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12 form-group" id="div_familia">
					<label  class="control-label" id="cmbareasLabel" style="font-size: 11px;">Familia</label>
					<div class="input-group">
						<select class="form-control" id="cmbfamilia"></select>
						<span class="input-group-addon"><input type="checkbox" id="check_familia"></span>
					</div>
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12 form-group"></div>
				<div class="col-md-4 col-sm-12 col-xs-12 form-group" id="div_subfamilia">
					<label  class="control-label" id="cmbareasLabel" style="font-size: 11px;">Subfamilia</label>
					<div class="input-group">
						<select class="form-control" id="cmbsubfamilia">
							<option value="-1">--Subfamilia--</option>
						</select>
						<span class="input-group-addon"><input type="checkbox" id="check_subfamilia"></span>
					</div>
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12 form-group">
					<label class="control-label"  style="font-size: 11px;">Marca</label>
					<div class="input-group">
						<select class="form-control" id="cmbmarca" multiple="multiple"></select>
						<span class="input-group-addon"><input type="checkbox" id="check_marca"></span>
					</div>
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12 form-group">
					<label class="control-label"  style="font-size: 11px;">Modelo</label>
					<div class="input-group">
						<select class="form-control" id="cmbmodelo" multiple="multiple"></select>
						<span class="input-group-addon"><input type="checkbox" id="check_modelo"></span>
					</div>
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12 form-group"></div>
				<div class="col-md-4 col-sm-12 col-xs-12 form-group">
					<label class="control-label"  style="font-size: 11px;">Número de Serie</label>
					<div class="input-group">
						<select class="form-control" id="cmbnumserie" multiple="multiple"></select>
						<span class="input-group-addon"><input type="checkbox" id="check_no_serie"></span>
					</div>
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12 form-group">
					<label  class="control-label" id="cmbareasLabel" style="font-size: 11px;">Tipo Activo</label>
					<div class="input-group">
						<select class="form-control" id="cmbtipoactivo" multiple="multiple"></select>
						<span class="input-group-addon"><input type="checkbox" id="check_tipoactivo"></span>
					</div>
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12 form-group" id="div_activo_padre">
					<label class="control-label"  style="font-size: 11px;">Activo Padre</label>
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Activo Padre" id="txtActivo_Padre">
						<span class="input-group-addon"><input type="checkbox" id="check_activo_padre"></span>
					</div>
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12 form-group"></div>
				<div class="col-md-4 col-sm-12 col-xs-12 form-group" id="div_activo_anterior">
					<label class="control-label"  style="font-size: 11px;">No. Activo Anterior</label>
					<div class="input-group">
						<input type="text" class="form-control" placeholder="No. Activo Anterior" id="txtNo_Activo_Anterior">
						<span class="input-group-addon"><input type="checkbox" id="check_no_activo_anterior"></span>
					</div>
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12 form-group">
					<label  class="control-label" id="cmbareasLabel" style="font-size: 11px;">Participa en PRE</label>
					<div class="input-group">
						<select class="form-control" id="cmbPRE" multiple="multiple">
							<option value="1">Si</option>
							<option value="0">No</option>
						</select>
						<span class="input-group-addon"><input type="checkbox" id="check_PRE"></span>
					</div>
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12 form-group">
					<label  class="control-label" id="cmbareasLabel" style="font-size: 11px;">Participa en Seguros</label>
					<div class="input-group">
						<select class="form-control" id="cmbseguros" multiple="multiple">
							<option value="1">Si</option>
							<option value="0">No</option>
						</select>
						<span class="input-group-addon"><input type="checkbox" id="check_seguros"></span>
					</div>
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12 form-group"></div>
				<div class="col-md-4 col-sm-12 col-xs-12 form-group" id="div_importe_seguros">
					<label class="control-label"  style="font-size: 11px;">Importe Seguros</label>
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Importe Seguros" id="txtImporte_Seguros">
						<span class="input-group-addon"><input type="checkbox" id="check_Importe_Seguros"></span>
					</div>
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12 form-group" id="div_participa_certificacion">
					<label  class="control-label"  style="font-size: 11px;">Participa en Certificacion</label>
					<div class="input-group">
						<select class="form-control" id="cmbcertificacion" multiple="multiple">
							<option value="1">Si</option>
							<option value="0">No</option>
						</select>
						<span class="input-group-addon"><input type="checkbox" id="check_certificacion"></span>
					</div>
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12 form-group" id="div_usuarios">
					<div id="muestro_select">
						<label  class="control-label" id="cmbareasLabel" style="font-size: 11px;">Usuario Responsable</label>
						<select id="select-usuarios" class="demo-default" placeholder="Usuario Responsable" style="display:none"></select>
					</div>
					<div id="gifcargando_usuarios" style="display:none" align="center">
						<img src="../dist/img/cargando-loading.gif" style="max-width: 25px; max-height: 25px" alt="cargando-loading-037.gif">
					</div>
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12 form-group"></div>
				<div class="col-md-4 col-sm-12 col-xs-12 form-group">
					<label  class="control-label" id="cmbareasLabel" style="font-size: 11px;">Tipo Vale</label>
					<div class="input-group">
						<select class="form-control" id="cmbtipovale" multiple="multiple"></select>
						<span class="input-group-addon"><input type="checkbox" id="check_tipovale"></span>
					</div>
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12 form-group">
					<label class="control-label"  style="font-size: 11px;">Garantia</label>
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Garantia" id="txtGarantia">
						<span class="input-group-addon"><input type="checkbox" id="check_Garantia"></span>
					</div>
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12 form-group">
					<label class="control-label"  style="font-size: 11px;">Ext. Garantia</label>
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Ext. Garantia" id="txtExt_Garantia">
						<span class="input-group-addon"><input type="checkbox" id="check_Ext_Garantia"></span>
					</div>
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12 form-group">
					<label class="control-label"  style="font-size: 11px;">Baja de Activos</label>
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Baja de Activos" id="txtDatos_Baja" disabled>
						<span class="input-group-addon"><input type="checkbox" id="check_Baja"></span>
					</div>
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12 form-group">
					<label class="control-label"  style="font-size: 11px;">Datos Proveedor</label>
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Datos Proveedor" id="txtDatos_Proveedor" disabled>
						<span class="input-group-addon"><input type="checkbox" id="check_Datos_Proveedor"></span>
					</div>
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12 form-group">
					<label class="control-label"  style="font-size: 11px;">Datos Contabilidad</label>
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Datos Contabilidad" id="txtDatos_Contabilidad" disabled>
						<span class="input-group-addon"><input type="checkbox" id="check_Datos_Contabilidad"></span>
					</div>
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12 form-group" id="div_departamento" style="display: none;">
					<label  class="control-label" id="cmbareasLabel" style="font-size: 11px;">Departamento</label>
					<div class="input-group">
						<select class="form-control" id="cmbdepartamento" multiple="multiple"></select>
						<span class="input-group-addon"><input type="checkbox" id="check_departamento"></span>
					</div>
				</div>
				<div class="col-md-12" align="center">
					<button type="button" class="btn chs" onclick="buscar_activos();" id="Buscar_Activos">Buscar Activos</button>
				</div>
			</div>
		</div>
	</div>


	<!-- ==== Seccion 2: Administrador de versiones ==== -->
	<div id="AdminColumnas_X_Reporte" class="seccionEdicion" style="display: none;">
		<div class="panel with-nav-tabs panel-default h-100">
			<div class="panel-heading">
				<h4 style="padding: 0; margin: 0;">Generación de vista personalizada de Inventario</h4>
			</div>
			<div class="panel-body">
				<div class="row" style="height: calc(100vh - 100px); ">
					<div class="col-md-12 nav-tabs-bs h-100">
						<div class="tablaAnchoAltoFull">
							<div class="pseudoTR">
								<div class="pseudoTD h-100">
									<div class="tablaAnchoAltoFull">
										<!-- ==== Area de edición de columnas y de versiones de los reportes ==== -->
										<div class="pseudoTR">
											<div class="pseudoTD h-100">
												<div class="tab-content h-100">
													<input type="text" id="nombre-tabla-visible-actual" value="tablaactivos" readonly="readonly" style="display: none;" />
													<?php
														// Recorre la lista elementos en el arreglo
														for($i = 0; $i < count($lstTablasInventario); $i++) {
															?><div id="tab-reporte-<?php echo($lstTablasInventario[$i]); ?>" class="tab-pane h-100 <?php if($i == 0) { echo('active'); }?>">
																<div class="row h-100"">
																	<!-- ==== Lista de versiones del reporte que se han agregado ==== -->
																	<div class="col-md-4 h-100">
																		<div class="tablaAnchoAltoFull" style="box-shadow: #999 0px 0px 3px; border-radius: 10px;">
																			<div class="pseudoTR">
																				<div class="pseudoTD" style="padding: 0em 0.5em;">
																					<h4>Listas de reportes guardados
																						(
																							<?php
																								// Determina el reporte
																								switch($lstTablasInventario[$i]) 
																								{
																									case "tablaactivos":
																										echo("Inventario");
																										break;
																									case "tablebajas":
																										echo("En Proceso de Baja / Baja definitiva");
																										break;
																									case "tablereubicacion":
																										echo("Reubicación");
																										break;
																								}
																							?>
																						)
																					</h4>
																				</div>
																			</div>
																			<div class="pseudoTR">
																				<div class="pseudoTD positionRelativoFull">
																					<input type="text" id="Id_Reporte_Version_Edicion_Actual_<?php echo($lstTablasInventario[$i]); ?>" style="display: none;" />
																					<div id="tab-bs-<?php echo($lstTablasInventario[$i]); ?>-lista-versiones" class="pseudoIframe">
																						<div class="v-wrap">
																							<div class="v-box">
																								<div class="text-center"><img src="../dist/img/cargando-loading.gif" /></div>
																							</div>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																	<!-- ==== Administrador de columnas que han sido agrupados en una versión ==== -->
																	<div class="col-md-8 h-100">
																		<div id="areaEdicionColumnas_<?php echo($lstTablasInventario[$i]); ?>" class="h-100" style="box-shadow: #999 0px 0px 3px; border-radius: 10px;">
																			<div class="v-wrap" style="padding: 0px;">
																				<div class="v-box">
																					<h4>Agrege o modifique la vista que desea administrar</h4>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														<?php
														}
													?>
												</div>
											</div>
										</div>
										<!-- ==== Pestañas de los difrentes tipos de Inventario ==== -->
										<div class="pseudoTR">
											<div class="pseudoTD" style="padding-top: 5px;">
												<ul id="lstAgrupadorReportes" class="nav nav-tabs nav-tabs-bottom">
													<li id="li-tab-tablaactivos" onclick="$('#nombre-tabla-visible-actual').val('tablaactivos'); verColumnasXreporte('tablaactivos');" class="active"><a data-toggle="tab" href="#tab-reporte-tablaactivos">Inventario <i class="fa fa-plus-circle cursor-pointer" data-nombre-tabla="tablaactivos" onclick="agregarModificarVersionReporte(this);"></i></a></li>
													<li id="li-tab-tablebajas" onclick="$('#nombre-tabla-visible-actual').val('tablebajas'); verColumnasXreporte('tablebajas');"><a data-toggle="tab" href="#tab-reporte-tablebajas">En Proceso de Baja / Baja definitiva <i class="fa fa-plus-circle cursor-pointer" data-nombre-tabla="tablebajas" onclick="agregarModificarVersionReporte(this);"></i></a></li>
													<li id="li-tab-tablereubicacion" onclick="$('#nombre-tabla-visible-actual').val('tablereubicacion'); verColumnasXreporte('tablereubicacion');"><a data-toggle="tab" href="#tab-reporte-tablereubicacion">Reubicación <i class="fa fa-plus-circle cursor-pointer" data-nombre-tabla="tablereubicacion" onclick="agregarModificarVersionReporte(this);"></i></a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- ==== Lista de columnas que pueden ser incorporadas a las versiones de los reportes ==== -->
							<div class="pseudoTR">
								<div class="pseudoTD">
									<hr />
									<h4>Lista de columnas disponibles</h4>
									<p>Arrastre las columnas que desea agregar a alguna de las vistas que ha creado.</p>
									<div style="text-align: center">
										<?php
											// Obtiene la lista de columnas que pueden ser incluidas en los reportes
											$objColumnasCatalogo = new ActivoFijoInventarioReportesModel();
											$lstColumnas = $objColumnasCatalogo->ActivoFilasColumnasCatalogoGet();
											// Número de columnas por Bloque
											$numColumnasXbloque = 32;
											$numBloques = ceil(count($lstColumnas) / $numColumnasXbloque);

											if(count($lstColumnas) > 0) {
												if($lstColumnas[0]->Id_Columna > 0) {
													?><div id="myCarousel" class="carousel slide carousel-fade" data-interval="false" data-ride="carousel">
														<!-- ==== Wrapper for slides ==== -->
														<div class="carousel-inner" style="overflow: initial !important;">
															<?php
																// Contador de columna que ya fue escrita
																$numColumnaActual = 0;
																// Recorre cada columna encontrada
																for($numBloqueActual = 0; $numBloqueActual < $numBloques; $numBloqueActual++) {
																	?><div class="item <?php if($numBloqueActual == 0) echo('active'); ?>">
																		<ol class="lista-draggable">
																			<?php
																				while($numColumnaActual < count($lstColumnas)) {
																					?>
																					<div class="div-item">
																						<li class="item" title="<?php echo($lstColumnas[$numColumnaActual]->Descripcion_Columna); ?>" data-id-columna="<?php echo($lstColumnas[$numColumnaActual]->Id_Columna); ?>">
																							<span><?php echo(substr($lstColumnas[$numColumnaActual]->Descripcion_Columna, 0, 25)); ?></span>
																						</li>
																						<span class="bloqueo-columna-draggable" data-id-columna="<?php echo($lstColumnas[$numColumnaActual]->Id_Columna); ?>" data-aplica-tablaactivos="<?php echo($lstColumnas[$numColumnaActual]->AplicaTablaActivos); ?>" data-aplica-tablebajas="<?php echo($lstColumnas[$numColumnaActual]->AplicaTablaBajas); ?>" data-aplica-tablereubicacion="<?php echo($lstColumnas[$numColumnaActual]->AplicaTablaReubicacion); ?>"></span>
																					</div>
																					<?php
																					$numColumnaActual++;

																					if($numColumnaActual < count($lstColumnas)) {
																						if($numColumnaActual % $numColumnasXbloque == 0) {
																							// Cierra el bloque de columnas
																							break;
																						}
																					}
																					else{
																						// Fin del lista de columnas. Cierra el bloque de columnas
																						break;
																					}
																				}
																			?>
																		</ol>
																		<hr style="margin-bottom: 1em;" />
																		<h4 class="text-right">Bloque <?php echo(($numBloqueActual + 1) . " de " . $numBloques); ?></h4>
																	</div><?php
																}
															?>
														</div>
														<!-- ==== Left and right controls ==== -->
														<a style="width: initial !important;" class="left carousel-control" href="#myCarousel" data-slide="prev">
															<span class="glyphicon glyphicon-chevron-left" style="color: #2e486d;"></span>
															<span class="sr-only">Anteriores</span>
														</a>
														<a style="width: initial !important;" class="right carousel-control" href="#myCarousel" data-slide="next">
															<span class="glyphicon glyphicon-chevron-right" style="color: #2e486d;"></span>
															<span class="sr-only">Siguientes</span>
														</a>
													</div><?php
												}
												else {
													?><h4 class="text-center"><?php echo($lstColumnas[0]->Descripcion_Columna); ?></h4><?php
												}
											}
											else {
												?><h4 class="text-center">Por el momento no existen columnas que puedan ser agregadas</h4><?php
											}
										?>
									</div>
								</div>
							</div>
						</div>

						<script type="text/javascript" src="../plugins/jQueryUI/jquery-ui.js"></script>
						<script type="text/javascript">
							// Obtiene la lista de versiones agregadas a cada reporte y los carga en el espacio izquierdo de cada reporte
							function obtenerVersiones_x_Tab(elemento = null) {
								// Determina el tab (tipo de reporte) seleccionado actualmente
								var nombreTabla = $("#lstAgrupadorReportes").find("li.active i").data("nombre-tabla");
								if(elemento != null) { nombreTabla = elemento; }

								jQuery("#tab-bs-" + nombreTabla + "-lista-versiones").html('<div class="v-wrap"><div class="v-box"><div class="text-center"><img src="../dist/img/cargando-loading.gif" /></div></div></div>');
								jQuery("#areaEdicionColumnas_" + nombreTabla).html('<div class="v-wrap"><div class="v-box"><h4>Agrege o modifique la vista que desea administrar</h4></div></div>');
								
								// Parametros necesarios para la carga de la vista parcial
								var strJsonParametros = { accion: "ReportesVersionesGet", Id_Area: $("#idareasesion").val(), NombreTabla: nombreTabla };
								// Carga la vista parcial con la lista de Versiones del Reporte pasado como parámetro
								jQuery("#tab-bs-" + nombreTabla + "-lista-versiones").load("../controladores/simple_mvc/ActivoFijoInventarioReportesController.Class.php", strJsonParametros, function (response, status, xhr) {
									if (status == "error") {
										var msg = "Sorry but there was an error: ";
										mensajesalerta("Informaci&oacute;n", msg + xhr.status + " " + xhr.statusText, "error", "dark");
									}
								});

								if(elemento == null) {
									// Actualiza la lista de columnas
									verColumnasXreporte(nombreTabla);
								}
							}
							
							<?php
								// Obtiene la lista de versiones por cada reporte disponible
								for($i = 0; $i < count($lstTablasInventario); $i++) {
									// Carga la lista de versiones que pertenecen a un reporte
									?>obtenerVersiones_x_Tab("<?php echo($lstTablasInventario[$i]); ?>");<?php
									// Muestra solo las columnas que pueden ser utilizadas por el reporte
									if($i == 0) {
										?>verColumnasXreporte("<?php echo($lstTablasInventario[$i]); ?>");<?php
									}
								}
							?>

							// Muestra/oculta las columnas de acuerdo al reporte seleccionado
							// También oculta las columnas que la versión ya tiene incluidas para evitar una búsqueda manual
							function verColumnasXreporte(nombreTabla) {
								// Oculta todas las columnas independientemente si se visualizan en el reporte
								//$(".lista-draggable li").css("visibility", "hidden");
								$(".lista-draggable span.bloqueo-columna-draggable").show();
								// Muestra la lista de columnas que se pueden utilizar en el tipo de reporte seleccionado
								//$(".lista-draggable").find("[data-aplica-" + nombreTabla + "='1']").css("visibility", "visible");
								$(".lista-draggable span.bloqueo-columna-draggable[data-aplica-" + nombreTabla + "='1']").hide();
								// Oculta las columnas que ya están siendo utilizadas en el reporte seleccionado
								// Obtiene el reporte que está siendo editado
								var IdReporteVersionActual = $("#Id_Reporte_Version_Edicion_Actual_" + nombreTabla).val();
								// Recupera el identificador de cada columna que componen la versión del reporte en un arreglo
								var dataList = $("#lista-columnas-reporte-version-" + IdReporteVersionActual + " li").map(function() {
									return $(this).data("id-columna");
								}).get();
								var items = $(".lista-draggable span.bloqueo-columna-draggable").filter(function() {
									return $.inArray($(this).data("id-columna"), dataList) > -1;
								});
								items.show();
							}

							// Agrega la funcionalidad
							function agregaFuncionalidadColumnas() {
								// http://jsfiddle.net/ambiguous/PyWAM/
								$(".lista-draggable li").draggable({
									helper: 'clone'
								});
							}
							agregaFuncionalidadColumnas();

							// Agrega funcionalidad de arrastre y ordenamiento de las columnas hacia las versiones de los reportes
							// Internamente posee el método de agregar nuevas columnas a la versión del reporte
							function agregaFuncionalidadDetalleColumnas() {
								$(".lista-droppable").droppable({
									// Agrega una columna a la lista de columnas que se han agregado a la versión del reporte
									drop: function(event, ui) {
										var newDiv = '<li data-id-columna="' + $(ui.draggable).data("id-columna") + '"><span class="sortableItem">'+ ui.draggable.html() + '</span><span><i class="fa fa-trash" aria-hidden="true"></i></span></li>';
										// Determina el identificador del elemento que se está moviendo
										var IdColumnaEnMovimiento = $(ui.draggable).data("id-columna");
										// Revisa que en la lista de destino se encuentra en el elemento y lo elimina en caso de que se encuentre
										var itemPrevioLista = $(this).find('[data-id-columna=' + IdColumnaEnMovimiento + ']');
										var areaLista = $(this);

										if (itemPrevioLista.length == 0 && IdColumnaEnMovimiento != undefined) {
											// Agrega la columna a nivel de la BD
											var Id_Reporte_Version = $("#Id_Reporte_Version_Edicion_Actual_" + $("#nombre-tabla-visible-actual").val()).val();
											var parametrosJson = { accion: "ReportesDetalleColumnasAdd", Id_Area: $("#idareasesion").val(), Id_Reporte_Version: Id_Reporte_Version, Id_Columna: IdColumnaEnMovimiento, Id_Usuario: $("#usuariosesion").val() };
											$.ajax({
												type: "POST",
												url: "../controladores/simple_mvc/ActivoFijoInventarioReportesController.Class.php",
												data: parametrosJson,
												async: true,
												dataType: "html",
												success: function (datos) {
													var respuestaJson = JSON.parse($.trim(datos));
													if (respuestaJson.intResultado > 0) {
														// Actualiza la lista ya que el elemento fue agregado correctamente
														mostrarDetalleVersion($("#IdReporteVersion_" + Id_Reporte_Version));
													}
													else {
														// Ha ocurrido un error al momento de realizar la inserción
														mensajesalerta("Oh No!", "Ocurrió un error al agregar la columna: " + respuestaJson.strMensaje, "error", "dark");
													}
												},
												error: function (objeto, quepaso, otroobj) {
													// Ha ocurrido un error y no pueden ser cargados los elementos en el combo select
													//$("#gifcargando-search-responsable").hide();
													mensajesalerta("Oh No!", "Ocurrió un error al agregar la columna: " + objeto.responseText, "error", "dark");
												}
											});
										}
									}
								}).sortable({
									axis: 'y',
									items: 'li:not(.itemStatic)',	// Items que no serán movidos
									start: function(event, ui) {
										ui.item.data('sorting', true);
									},
									stop: function(event, ui) {
										ui.item.removeData('sorting');
										// Hack: Elimina elementos que pudieran generar problemas al momento de soltar en su ubicación final
										$(this).find('[data-id-columna="undefined"]').remove();

										// Realiza la actualización del orden del elemento en la lista a nivel de la BD
										var IdColumnaEnMovimiento = $(ui.item).data("id-columna-detalle")
										var Orden = $(ui.item).index() + 1;
										var Id_Reporte_Version = $("#Id_Reporte_Version_Edicion_Actual_" + $("#nombre-tabla-visible-actual").val()).val()
										var parametrosJson = { accion: "ReportesDetalleColumnasEdit", Id_Reporte_Version: Id_Reporte_Version, Id_Columna_Detalle: IdColumnaEnMovimiento, Orden: Orden, Id_Usuario: $("#usuariosesion").val() };

										// Realiza la actualización
										$.ajax({
											type: "POST",
											url: "../controladores/simple_mvc/ActivoFijoInventarioReportesController.Class.php",
											data: parametrosJson,
											async: true,
											dataType: "html",
											success: function (datos) {
												var respuestaJson = JSON.parse($.trim(datos));
												if (respuestaJson.intResultado <= 0) {
													// Ha ocurrido un error al momento de realizar la inserción
													mensajesalerta("Oh No!", "Ocurrió un error al agregar la columna: " + respuestaJson.strMensaje, "error", "dark");
												}
												// Actualiza la lista ya sea en caso de exito o en caso de error
												mostrarDetalleVersion($("#IdReporteVersion_" + Id_Reporte_Version));
											},
											error: function (objeto, quepaso, otroobj) {
												// Ha ocurrido un error y no pueden ser cargados los elementos en el combo select
												//$("#gifcargando-search-responsable").hide();
												mensajesalerta("Oh No!", "Ocurrió un error al agregar la columna: " + objeto.responseText, "error", "dark");
											}
										});
									}
								});
							}



							// Función para mostrar una ventana para escribir/modificar el nombre de la versión del reporte
							function agregarModificarVersionReporte(elemento) {
								// Verifica el origen de la llamada
								var Id_Reporte_Version = null;
								var tituloVentana = null;
								var nombreVersionReporte = "";
								var Aplica = false;
								var nombreReporte = null;

								if($(elemento).data("id-reporte-version")) {
									// Se modificará la versión del reporte
									Id_Reporte_Version = $(elemento).data("id-reporte-version");
									// Contenido de la ventana
									nombreVersionReporte = $("#IdReporteVersion_" + Id_Reporte_Version).text();
									// Nombre de la Ventana
									tituloVentana = "";
									// Determina si es la versión de default
									Aplica = $("#IdReporteVersion_" + Id_Reporte_Version).data("version-aplica") == 1 ? true : false;
								}
								else {
									// Nombre de la Ventana
									tituloVentana = "";
								}

								// Contenido de la ventana
								var contenidoAdmin = '<div class="form-group">' +
														'<label>Escriba el nombre de la vista</label>' +
														'<input type="text" name="nombreReporteVersion" placeholder="Nombre de la vista" maxlength="100" class="form-control" required value="' + nombreVersionReporte + '" />' +
													'</div>' + 
													'<div class="form-group">' +
														'<label class="custom-control">Vista por omisión</label>' +
														'<div class="text-center">' +
															'No' +
															'<label class="custom-control custom-checkbox">' +
																'<input type="checkbox" name="boolAplica" class="custom-control-input" ' + (Aplica ? ' checked="checked" ' : '') + '>' +
																'<span class="custom-control-indicator"></span>' +
															'</label>' +
															'Si' +
														'</div>' +
													'</div>';

								// Determina el nombre del Reporte General
								switch($(elemento).data("nombre-tabla")) {
									case "tablaactivos":
										nombreReporte = "Inventario";
										break;
									case "tablebajas":
										nombreReporte = "En Proceso de Baja / Baja definitiva";
										break;
									case "tablereubicacion":
										nombreReporte = "Reubicación";
										break;
								}

								// Ventana de administración
								$.confirm({
									title: "<i class='fa fa-file-text-o'></i>&nbsp;" + nombreReporte,
									content: contenidoAdmin,
									animateFromElement: false,
									columnClass: 'medium', animation: 'top', closeAnimation: 'opacity',
									buttons: {
										botonAceptar: {
											text: "Guardar",
											btnClass: 'btn btn-blue',
											action: function () {
												//Parámetros comúnes
												var parametrosJson = { accion: "ReporteVersionAdd",
													Id_Area: $("#idareasesion").val(),
													NombreVersion: this.$content.find('[name="nombreReporteVersion"]').val(),
													Id_Usuario: $("#usuariosesion").val(),
													Aplica: (this.$content.find('[name="boolAplica"]').is(':checked') ? 1 : 0)
												};

												if(Id_Reporte_Version != null) {
													// Modifica el reporte
													parametrosJson.accion = "ReporteVersionEdit";
													parametrosJson.Id_Reporte_Version = Id_Reporte_Version;
												}
												else {
													// Determina la Tabla a la que pertenecerá la versión del reporte
													parametrosJson.NombreTabla = $(elemento).data("nombre-tabla");
												}

												// Genera el agrupador de la nueva versión del reporte
												$.ajax({
													type: "POST",
													url: "../controladores/simple_mvc/ActivoFijoInventarioReportesController.Class.php",
													data: parametrosJson,
													async: true,
													success: function (datos) {
														var respuestaJson = JSON.parse($.trim(datos));
														if (respuestaJson.intResultado > 0) {
															if(Id_Reporte_Version != null) {
																// Se actualizó la información de la versión y se deberá actualizar la lista
																obtenerVersiones_x_Tab();
																// Muestra también las columnas que componen la vista personalizada
																$("#Id_Reporte_Version_Edicion_Actual_" + $(elemento).data("nombre-tabla")).val(Id_Reporte_Version);
																// Actualiza la lista de columnas que tiene internamente la vista
																mostrarDetalleVersion(Id_Reporte_Version);
															}
															else {
																// Se ha insertado correctamente la versión y por lo tanto, debe actualizarse la lista de versiones
																obtenerVersiones_x_Tab();
																// Muestra también las columnas que componen la vista personalizada
																mostrarDetalleVersion(respuestaJson.intResultado);
															}
														}
														else {
															// Ha ocurrido un error al momento de realizar la inserción
															mensajesalerta("Oh No!", "Ocurrio un error al consultar: " + respuestaJson.strMensaje, "error", "dark");
														}
													},
													error: function (objeto, quepaso, otroobj) {
														// Ha ocurrido un error y no pueden ser cargados los elementos en el combo select
														//$("#gifcargando-search-responsable").hide();
														mensajesalerta("Oh No!", "Ocurrio un error al consultar." + objeto.responseText, "error", "dark");
													}
												});
											}
										},
										botonCancelar: {
											text: "Cancelar",
											btnClass: 'btn btn-light'
										}
									}
								});
							}

							// Función que elimina uan versión especifica de los reportes
							function eliminarVersionReporte(elemento) {
								var Id_Reporte_Version = $(elemento).data("id-reporte-version");
								var parametrosJson = { accion: "ReporteVersionDel", Id_Area: $("#idareasesion").val(), Id_Reporte_Version: Id_Reporte_Version };
								$.ajax({
									type: "POST",
									url: "../controladores/simple_mvc/ActivoFijoInventarioReportesController.Class.php",
									data: parametrosJson,
									async: true,
									dataType: "html",
									success: function (datos) {
										var respuestaJson = JSON.parse($.trim(datos));
										if (respuestaJson.intResultado == 0) {
											// Obtiene la lista columnas que pertenecen a la versión del reporte seleccionado
											mostrarDetalleVersion();
											// Actualiza la lista de versiones de los reportes ya que el elemento fue eliminado correctamente
											obtenerVersiones_x_Tab();
										}
										else {
											// Ha ocurrido un error al momento de realizar la inserción
											mensajesalerta("Oh No!", "Ocurrió un error al eliminar la vista: " + respuestaJson.strMensaje, "error", "dark");
										}
									},
									error: function (objeto, quepaso, otroobj) {
										// Ha ocurrido un error y no pueden ser cargados los elementos en el combo select
										mensajesalerta("Oh No!", "Ocurrió un error al eliminar la vista: " + objeto.responseText, "error", "dark");
									}
								});
							}



							// Función para mostrar la lista de columnas que componen la versión seleccionada
							function mostrarDetalleVersion(elemento = null) {
								// Determina que reporte se está visualizando
								var nombreTabla = $("#nombre-tabla-visible-actual").val();
								// Elimina cualquier información guardada previamente
								$("#Id_Reporte_Version_Edicion_Actual_" + nombreTabla).val("");
								
								if(elemento != null) {
									// Almacena la versión del reporte del que se le editarán las columnas
									if(typeof(elemento) == "object") {
										// Se envío un objeto para obtener el Identificador
										$("#Id_Reporte_Version_Edicion_Actual_" + nombreTabla).val($(elemento).data("id-reporte-version"));
									}
									else {
										// Se ha envíado un númerico del Identificador
										$("#Id_Reporte_Version_Edicion_Actual_" + nombreTabla).val(elemento);
									}

									var Id_Reporte_Version = $("#Id_Reporte_Version_Edicion_Actual_" + nombreTabla).val();
									// Parametros necesarios para la carga de la vista parcial
									var strJsonParametros = { accion: "ReportesDetalleColumnasGet", Id_Area: $("#idareasesion").val(), Id_Reporte_Version: Id_Reporte_Version };
									// Carga la vista parcial con la lista de columnas que compone la versión del reporte seleccionado
									jQuery("#areaEdicionColumnas_" + nombreTabla).load("../controladores/simple_mvc/ActivoFijoInventarioReportesController.Class.php", strJsonParametros, function (response, status, xhr) {
										if (status != "error") {
											agregaFuncionalidadDetalleColumnas();
										}
										else {
											var msg = "Sorry but there was an error: ";
											mensajesalerta("Informaci&oacute;n", msg + xhr.status + " " + xhr.statusText, "error", "dark");
										}
									});

									// Muestra/oculta la lista de columnas al momento de seleccionar la vista del reporte
									setTimeout(function() { verColumnasXreporte(nombreTabla); }, 500);
								}
								else {
									$("#areaEdicionColumnas_" + nombreTabla).html('<div class="v-wrap"><div class="v-box"><h4>Agrege o modifique la vista que desea administrar</h4></div></div>');
								}
							}

							// Función que elimina una columna que pertenece a una versión del reporte
							function eliminarColumnaVersionReporte(elemento) {
								// Determina que reporte se está visualizando
								var nombreTabla = $("#lstAgrupadorReportes").find("li.active i").data("nombre-tabla");

								var Id_Columna_Detalle = $(elemento).data("id-columna-detalle");
								var Id_Reporte_Version = $("#Id_Reporte_Version_Edicion_Actual_" + nombreTabla).val();
								var parametrosJson = { accion: "ReportesDetalleColumnasDel", Id_Area: $("#idareasesion").val(), Id_Reporte_Version: Id_Reporte_Version, Id_Columna_Detalle: Id_Columna_Detalle };
								$.ajax({
									type: "POST",
									url: "../controladores/simple_mvc/ActivoFijoInventarioReportesController.Class.php",
									data: parametrosJson,
									async: true,
									dataType: "html",
									success: function (datos) {
										var respuestaJson = JSON.parse($.trim(datos));
										if (respuestaJson.intResultado == 0) {
											// Actualiza la lista ya que la columna fue eliminada correctamente
											mostrarDetalleVersion($("#IdReporteVersion_" + Id_Reporte_Version));
										}
										else {
											// Ha ocurrido un error al momento de realizar la inserción
											mensajesalerta("Oh No!", "Ocurrió un error al agregar la columna: " + respuestaJson.strMensaje, "error", "dark");
										}
									},
									error: function (objeto, quepaso, otroobj) {
										// Ha ocurrido un error y no pueden ser cargados los elementos en el combo select
										//$("#gifcargando-search-responsable").hide();
										mensajesalerta("Oh No!", "Ocurrió un error al agregar la columna: " + objeto.responseText, "error", "dark");
									}
								});
							}
						</script>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- ==== Area de Botones para selección de secciones ==== -->
	<div>
		<nav class="navbar navbar-simple">
			<ul class="navbar-nav">
				<li class="nav-item active">
					<a href="#" class="nav-link" data-seccion="areaReporteActivoFijo" onclick="mostraSeccion(this);">
						<i class="fa fa-shopping-bag"></i>
						Reporte de Activo fijo
					</a>
				</li>
				<li class="nav-item" id="permiso_admin_super" style="display:none;">
					<a href="#" class="nav-link" data-seccion="AdminColumnas_X_Reporte" onclick="mostraSeccion(this);">
						<i class="fa fa-server"></i>
						Vista personalizadas
					</a>
				</li>
			</ul>
			<script type="text/javascript">
				// Función que muestra la sección desea y oculta las demás
				function mostraSeccion(elemento) {
					$("div.seccionEdicion").hide();
					$(".navbar-simple li").removeClass("active");//.addClass("nav-item");
					$(elemento).parents("li").addClass("active");
					var seccionXmostrar = $(elemento).data("seccion");
					$("#" + seccionXmostrar).show();
				}
			</script>
		</nav>
	</div>

	<script type="text/javascript">
		$(document).ready(function(){

			var Id_Usuario_para_ajax=$("#Id_Usuario_para_ajax").val();
			
			$.ajax({
				url: '../poo/compartidos/ajax/ajax_usuario_adm_super.php',
				type: 'POST',
				dataType: 'JSON',
				data: {Id_Usuario_para_ajax: Id_Usuario_para_ajax},
				success:function(data){
					var arr = jQuery.makeArray(data);
					if(jQuery.inArray(arr,59)){
							$("#permiso_admin_super").show();
						}else if(jQuery.inArray(arr,64)){
							$("#permiso_admin_super").show();
						}
				}
			});

			var Id_Area_Login=$("#idareasesion").val();
			if(Id_Area_Login!="5") {
				$("#Val4").val(Id_Area_Login);
				$("#div_areas").hide();
				$("#div_activos").removeClass("col-md-4");
				$("#div_activos").addClass("col-md-8");

				ubic_prim(Id_Area_Login);
				Clase(Id_Area_Login);
				familia(Id_Area_Login);
			}
			else {
				$("#div_areas").show();
				$('#cmbubicprim').append($('<option>', { value: "-1" }).text("--Ubicación Primaria (Selecciona un Área)--"));
				$('#cmbclase').append($('<option>', { value: "-1" }).text("--Clase (Selecciona un Área)--"));
				$('#cmbfamilia').append($('<option>', { value: "-1" }).text("--Familia (Selecciona un Área)--"));
			}

			var array_abcdario = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","AA","AB","AC","AD","AD","AE","AF","AG","AH","AI","AJ","AK","AL","AM","AN","AO","AP","AQ","AR","AS","AT","AU","AV","AW","AX","AY","AZ","BA","BB","BC","BD","BE","BF","BG","BH","BI","BJ","BK","BL","BM","BN","BO","BP","BQ","BR","BS","BT","BU","BV","BW","BX","BY","BZ"];
			var strdatos = {};
			var tabla2 = "";
			//Carga de Combobox
			activos();
			usuarios();
			cargaareas();
			propiedad();
			Departamento();
			Motivo();
			Tipo_Activo();
			Tipo_Vale();
			Marca(); //Distinct
			Modelo();//Distinct
			NumSerie();//Distinct
			////////////////////////
	
			//Autocomplete Activos
			function activos() {
				//Area
				var Id_Area=$("#idareasesion").val();
				var strdatos="";
				
				if(Id_Area != "5") {
					strdatos = {
						Id_Area:Id_Area,
						Estatus_Reg:"1",
						accion: 'autocomplete_activos'
					}
				}
				else{
					strdatos = {
						Estatus_Reg:"1",
						accion: 'autocomplete_activos'
					}
				}
	
			$.ajax({
				type: "POST",
				url: "../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",
				data:strdatos,
				async: false,
				dataType: "html",
				beforeSend: function (objeto) {
					$("#gifcargando1").show();
				},
				success: function (datos) {
					var json = "";
						json = eval("(" + datos + ")"); //Parsear JSON

						if (json.totalCount > 0) {
							var Array_Activos=new Array();
							var activos='';
							activos+='<option></option>';
							activos+='<optgroup label="Activos">';

							for (var i = 0; i < json.totalCount; i++) {
								//activos+='<option value="'+json.data[i].Id_Activo.trim()+'">'+json.data[i].AF_BC.trim()+' '+json.data[i].Nombre_Activo.trim()+'</option>';
								Array_Activos.push({id: json.data[i].Id_Activo.trim(), title:json.data[i].AF_BC.trim()+' '+json.data[i].Nombre_Activo.trim()});
							}
							activos+='</optgroup>';
							//$('#select-activos').html(activos);

							$("#gifcargando1").hide();
							$("#select-activos").show();
								
							$('#select-activos').selectize({
								plugins: ['remove_button'],
								maxItems: null,
								valueField: 'id',
								labelField: 'title',
								searchField: 'title',
								options:Array_Activos,
								create: false
								//sortField: 'text'
							});
						}
						else {
							$("#gifcargando1").hide();
							$('#select-activos').append($('<option>', { value: "" }).text("Sin resultados"));
						}

				},
				error: function (objeto, quepaso, otroobj) {
					mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
					$('#select-activos').append($('<option>', { value: "-1" }).text("Sin resultados"));
				}
			});
		}


		function cargaareas() {
			var resultado = new Array();
			data={Estatus_Reg: "1",accion: "consultar"};
			resultado=cargo_cmb("../fachadas/activos/siga_catareas/Siga_catareasFacade.Class.php",false, data);

			if(resultado.totalCount>0) {
				$('#cmbareas').append($('<option>', { value: "-1" }).text("--Areas--"));
				for(var i = 0; i < resultado.totalCount; i++){
					if(resultado.data[i].Id_Area!="5"){
						$('#cmbareas').append($('<option>', { value: resultado.data[i].Id_Area }).text(resultado.data[i].Nom_Area));
					}
				}
			}
			else {
				$('#cmbareas').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
			}
		}

		$("#cmbareas").change(function() {
			$("#Val4").val($(this).val());
			if($(this).val() != "-1") {
				$('#cmbubicprim').children('option').remove();
				ubic_prim($(this).val());
				
				$('#cmbclase').children('option').remove();
				Clase($(this).val());
				
				$('#cmbfamilia').children('option').remove();
				familia($(this).val());
			}
			else {
				$('#cmbubicprim').children('option').remove();
				$('#cmbclase').children('option').remove();
				$('#cmbfamilia').children('option').remove();
				
				$('#cmbubicprim').append($('<option>', { value: "-1" }).text("--Ubicación Primaria (Selecciona un Área)--"));
				$('#cmbclase').append($('<option>', { value: "-1" }).text("--Clase (Selecciona un Área)--"));
				$('#cmbfamilia').append($('<option>', { value: "-1" }).text("--Familia (Selecciona un Área)--"));
			}
		});


		function ubic_prim(Id_Area) {
			var resultado=new Array();
			data={Estatus_Reg: "1",Id_Area:Id_Area, accion: "consultar"};
			resultado=cargo_cmb("../fachadas/activos/siga_cat_ubic_prim/Siga_cat_ubic_primFacade.Class.php",false, data);
			if(resultado.totalCount>0){
				$('#cmbubicprim').append($('<option>', { value: "-1" }).text("--Ubicación Primaria--"));
				for(var i = 0; i < resultado.totalCount; i++) {
					$('#cmbubicprim').append($('<option>', { value: resultado.data[i].Id_Ubic_Prim }).text(resultado.data[i].Desc_Ubic_Prim));
				}
			}
			else {
				$('#cmbubicprim').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
			}
		}


		$( "#cmbubicprim" ).change(function() {
			$("#Val2").val($(this).val());
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
			if(resultado.totalCount>0) {
				$('#cmbubicsec').append($('<option>', { value: "-1" }).text("--Ubicación Secundaria--"));
				for(var i = 0; i < resultado.totalCount; i++) {
					$('#cmbubicsec').append($('<option>', { value: resultado.data[i].Id_Ubic_Sec }).text(resultado.data[i].Desc_Ubic_Sec));
				}
			}
			else {
				$('#cmbubicsec').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
			}
		}


		$( "#cmbubicsec" ).change(function() {
			$("#Val3").val($(this).val());
		});


		function Motivo() {
			var resultado = new Array();
			data = { Estatus_Reg: "1", accion: "consultar" };
			resultado=cargo_cmb("../fachadas/activos/siga_cat_motivo_alta/Siga_cat_motivo_altaFacade.Class.php",false, data);
			if(resultado.totalCount>0){
				//$('#cmbmotivo').append($('<option>', { value: "-1" }).text("--Motivo--"));
				for(var i = 0; i < resultado.totalCount; i++){
					$('#cmbmotivo').append($('<option>', { value: resultado.data[i].Id_Motivo_Alta }).text(resultado.data[i].Desc_Motivo_Alta));
				}
				$("#cmbmotivo").select2({
					placeholder: "Sin Seleccionar",
					allowClear: true
				});
			}
			else {
				$("#cmbmotivo").select2({
					placeholder: "Sin Seleccionar",
					allowClear: true
				});
				//$('#cmbmotivo').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
			}
		}


		$( "#cmbmotivo" ).change(function() {
			$("#Val10").val($(this).val());
		});
		function propiedad() {
			var resultado=new Array();
			data={Estatus_Reg: "1", accion: "consultar"};
			resultado=cargo_cmb("../fachadas/activos/siga_cat_propiedad/Siga_cat_propiedadFacade.Class.php",false, data);
			if(resultado.totalCount>0){
				//$('#cmbprpiedad').append($('<option>', { value: "-1" }).text("--Propiedad--"));
				for(var i = 0; i < resultado.totalCount; i++){
					$('#cmbprpiedad').append($('<option>', { value: resultado.data[i].Id_Propiedad }).text(resultado.data[i].Desc_Propiedad));
				}
				
				$("#cmbprpiedad").select2({
				placeholder: "Sin Seleccionar",
				allowClear: true
				});
			}else{
				$("#cmbprpiedad").select2({
				placeholder: "Sin Seleccionar",
				allowClear: true
				});
				//$('#cmbprpiedad').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
			}
		}
		$("#cmbprpiedad").change(function() {
			$("#Val5").val($(this).val());
		});
	
	
	/////////////////////////////////////////////
	
	
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
	$("#cmbclasificacion").change(function() {
		$("#Val13").val($(this).val());
	});
	
	//////////////////////////////////////////////////
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
	$( "#cmbfamilia" ).change(function() {
		$("#Val6").val($(this).val());
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
	$("#cmbsubfamilia").change(function() {
		$("#Val7").val($(this).val());
	});
	function Marca() {
		var resultado=new Array();
		data={Valor:"Marca",accion: "select_distinct"};
		resultado=cargo_cmb("../fachadas/activos/siga_reportes/Siga_reportesFacade.Class.php",false, data);
		if(resultado.totalCount>0){
			//$('#cmbmarca').append($('<option>', { value: "-1" }).text("--Marca--"));
			for(var i = 0; i < resultado.totalCount; i++){
				$('#cmbmarca').append($('<option>', { value: resultado.data[i].Marca }).text(resultado.data[i].Marca));
			}
			$("#cmbmarca").select2({
			  placeholder: "Sin Seleccionar",
			  allowClear: true
			});
			
		}else{
			$("#cmbmarca").select2({
			  placeholder: "Sin Seleccionar",
			  allowClear: true
			});
			//$('#cmbmarca').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	$("#cmbmarca").change(function() {
		var valor=$(this).val();
		var cadena="";
		if(valor!=null){
			var res=valor.toString().split(",");
			if(res.length>0){
				for(var i=0; i<res.length;i++){
					cadena+="'"+res[i]+"',";
				}
				cadena=cadena.slice(0,-1);
			}else{
				cadena="";
			}
		}else{
			cadena=""
		}
		$("#Val14").val(cadena);
	});
	function Modelo() {
		var resultado=new Array();
		data={Valor:"Modelo",accion: "select_distinct"};
		resultado=cargo_cmb("../fachadas/activos/siga_reportes/Siga_reportesFacade.Class.php",false, data);
		if(resultado.totalCount>0){
			//$('#cmbmodelo').append($('<option>', { value: "-1" }).text("--Modelo--"));
			for(var i = 0; i < resultado.totalCount; i++){
				$('#cmbmodelo').append($('<option>', { value: resultado.data[i].Modelo }).text(resultado.data[i].Modelo));
			}
			$("#cmbmodelo").select2({
			  placeholder: "Sin Seleccionar",
			  allowClear: true
			});
			
		}else{
			$("#cmbmodelo").select2({
			  placeholder: "Sin Seleccionar",
			  allowClear: true
			});
			//$('#cmbmodelo').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	$("#cmbmodelo").change(function() {
		var valor=$(this).val();
		var cadena="";
		if(valor!=null){
			var res=valor.toString().split(",");
			if(res.length>0){
				for(var i=0; i<res.length;i++){
					cadena+="'"+res[i]+"',";
				}
				cadena=cadena.slice(0,-1);
			}else{
				cadena="";
			}
		}else{
			cadena=""
		}
		$("#Val15").val(cadena);
	});
	function NumSerie() {
		var resultado=new Array();
		data={Valor:"NumSerie",accion: "select_distinct"};
		resultado=cargo_cmb("../fachadas/activos/siga_reportes/Siga_reportesFacade.Class.php",false, data);
		if(resultado.totalCount>0){
			//$('#cmbnumserie').append($('<option>', { value: "-1" }).text("--Num. Serie--"));
			for(var i = 0; i < resultado.totalCount; i++){
				$('#cmbnumserie').append($('<option>', { value: resultado.data[i].NumSerie }).text(resultado.data[i].NumSerie));
			}
			$("#cmbnumserie").select2({
			  placeholder: "Sin Seleccionar",
			  allowClear: true
			});
			
		}else{
			$("#cmbnumserie").select2({
			  placeholder: "Sin Seleccionar",
			  allowClear: true
			});
			//$('#cmbnumserie').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	$("#cmbnumserie").change(function() {
		var valor=$(this).val();
		var cadena="";
		if(valor!=null){
			var res=valor.toString().split(",");
			if(res.length>0){
				for(var i=0; i<res.length;i++){
					cadena+="'"+res[i]+"',";
				}
				cadena=cadena.slice(0,-1);
			}else{
				cadena="";
			}
			$("#Val16").val(cadena);
		}else{
			$("#Val16").val();
		}
	});
	function Tipo_Activo() {
		var resultado=new Array();
		data={Estatus_Reg: "1", accion: "consultar"};
		resultado=cargo_cmb("../fachadas/activos/siga_cat_tipo_activo/Siga_cat_tipo_activoFacade.Class.php",false, data);
		if(resultado.totalCount>0){
			//$('#cmbtipoactivo').append($('<option>', { value: "-1" }).text("--Tipo Activo--"));
			for(var i = 0; i < resultado.totalCount; i++){
				$('#cmbtipoactivo').append($('<option>', { value: resultado.data[i].Id_Tipo_Activo }).text(resultado.data[i].Desc_Tipo_Activo));
			}
			$("#cmbtipoactivo").select2({
			  placeholder: "Sin Seleccionar",
			  allowClear: true
			});
		}else{
			$("#cmbtipoactivo").select2({
			  placeholder: "Sin Seleccionar",
			  allowClear: true
			});
			//$('#cmbtipoactivo').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	$("#cmbtipoactivo").change(function() {
		$("#Val11").val($(this).val());
	});
	$("#cmbPRE").select2({
	  placeholder: "Sin Seleccionar",
	  allowClear: true
	});
	$("#cmbPRE").change(function() {
		$("#Val17").val($(this).val());
	});
	$("#cmbseguros").select2({
	  placeholder: "Sin Seleccionar",
	  allowClear: true
	});
	$("#cmbseguros").change(function() {
		$("#Val18").val($(this).val());
	});
	$("#cmbcertificacion").select2({
	  placeholder: "Sin Seleccionar",
	  allowClear: true
	});
	$("#cmbcertificacion").change(function() {
		$("#Val20").val($(this).val());
	});
	//Autocomplete Empleados
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
				$("#gifcargando_usuarios").show();
			},
			success: function (datos) {
				var json = "";
					json = eval("(" + datos + ")"); //Parsear JSON

					if (json.totalCount > 0) {
						var Array_Usuarios=new Array();
						var usuarios='';
						usuarios+='<option></option>';
						usuarios+='<optgroup label="Usuarios">';

						for (var i = 0; i < json.totalCount; i++) {
							//usuarios+='<option value="'+json.data[i].num_empleado.trim()+'">'+json.data[i].num_empleado.trim()+' '+json.data[i].nombre_completo.trim()+'</option>';
							Array_Usuarios.push({id: json.data[i].num_empleado.trim(), title:json.data[i].num_empleado.trim()+' '+json.data[i].nombre_completo.trim()});
						}
						usuarios+='</optgroup>';
						//$('#select-usuarios').html(usuarios);

						$("#gifcargando_usuarios").hide();
						$("#select-usuarios").show();
							
						$('#select-usuarios').selectize({
							plugins: ['remove_button'],
							maxItems: null,
							valueField: 'id',
							labelField: 'title',
							searchField: 'title',
							options:Array_Usuarios,
							create: false
							//sortField: 'text'
						});
					}
					else {
						$("#gifcargando_usuarios").hide();
						$('#select-usuarios').append($('<option>', { value: "" }).text("Sin resultados"));
					}

			},
			error: function (objeto, quepaso, otroobj) {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
				$('#select-usuarios').append($('<option>', { value: "-1" }).text("Sin resultados"));
			}
		});
	}
	function Tipo_Vale() {
		var resultado=new Array();
		data={Estatus_Reg: "1", accion: "consultar"};
		resultado=cargo_cmb("../fachadas/activos/siga_cat_tipo_vale_resg/Siga_cat_tipo_vale_resgFacade.Class.php",false, data);
		if(resultado.totalCount>0){
			//$('#cmbtipovale').append($('<option>', { value: "-1" }).text("--Tipo Vale--"));
			for(var i = 0; i < resultado.totalCount; i++){
				$('#cmbtipovale').append($('<option>', { value: resultado.data[i].Id_Tipo_Vale_Resg }).text(resultado.data[i].Desc_Tipo_Vale_Resg));
			}
			$("#cmbtipovale").select2({
			  placeholder: "Sin Seleccionar",
			  allowClear: true
			});
		}else{
			$("#cmbtipovale").select2({
			  placeholder: "Sin Seleccionar",
			  allowClear: true
			});
			//$('#cmbtipovale').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	$("#cmbtipovale").change(function() {
		$("#Val12").val($(this).val());
	});
	
	function Departamento() {
		var resultado=new Array();
		data={Estatus_Reg: "1", accion: "consultar"};
		resultado=cargo_cmb("../fachadas/activos/siga_cat_departamento/Siga_cat_departamentoFacade.Class.php",false, data);
		if(resultado.totalCount>0){
			//$('#cmbdepartamento').append($('<option>', { value: "-1" }).text("--Departamento--"));
			for(var i = 0; i < resultado.totalCount; i++){
				$('#cmbdepartamento').append($('<option>', { value: resultado.data[i].Id_Departamento }).text(resultado.data[i].Des_Departamento));
			}
			$("#cmbdepartamento").select2({
			  placeholder: "Sin Seleccionar",
			  allowClear: true
			});
		}else{
			$("#cmbdepartamento").select2({
			  placeholder: "Sin Seleccionar",
			  allowClear: true
			});
			//$('#cmbdepartamento').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	$( "#cmbdepartamento" ).change(function() {
		$("#Val8").val($(this).val());
	});
	
	$(".selectize-control").css("height", "34px");
	
	
	
	/////////////////////////////////////////////////////////////////////////////////////////
	buscar_activos=function(){
		var Agregar = true;
		var mensaje_error = "";
		
		var estatus=0;
		///////////////////
		var Id_Activo=$("#select-activos").val();
		var cmbubicprim=$("#Val2").val();
		var cmbubicsec=$("#Val3").val();
		var cmbareas=$("#Val4").val();
		var cmbprpiedad=$("#Val5").val();
		var cmbfamilia=$("#Val6").val();
		var cmbsubfamilia=$("#Val7").val();
		var cmbdepartamento=$("#Val8").val();
		var Num_Empleado=$("#select-usuarios").val();
		var cmbmotivo=$("#Val10").val();
		var cmbtipoactivo=$("#Val11").val();
		var cmbtipovale=$("#Val12").val();
		
		//Aqui va la clase
		var cmbclasificacion=$("#Val13").val();
		var Marca=$("#Val14").val();
		var Modelo=$("#Val15").val();
		var No_Serie=$("#Val16").val();
		var cmbPRE=$("#Val17").val();
		var cmbseguros=$("#Val18").val();
		var Importe_Seguros=$.trim($("#txtImporte_Seguros").val());
		var cmbcertificacion=$("#Val20").val();
		var Garantia=$.trim($("#txtGarantia").val());
		var Ext_Garantia=$.trim($("#txtExt_Garantia").val());
		var Desc_Larga=$.trim($("#txtDesc_Larga").val());
		var Desc_Corta=$.trim($("#txtDesc_Corta").val());
		var Ubic_Especifica=$.trim($("#txtUbic_Especifica").val());
		var Baja =0;
		
		if($("#check_Baja").prop('checked')==true){
			Baja=1;
		}
		
		$("#hddbaja").val(Baja);
		
		var datos22=new Array();	
		var val_seleccionados="";
		var selec_abcdario="";
		var contador=1;
		
		datos22.push({ "data": "AF_BC", "visible": false});
		datos22.push({ "data": "AF_BC"});
		datos22.push({ "data": "Nombre_Activo"});
		
		selec_abcdario+=array_abcdario[0]+"-";
		selec_abcdario+=array_abcdario[1]+"-";
		
		
		var $select_activos = $('#select-activos').selectize({});	
		var control3 = $select_activos[0].selectize;
		
		if(control3.items.length > 0){
			estatus=1;
			//Convertimos el array a String
			Id_Activo=control3.items.toString();
		}else{
			Id_Activo="";
		}
		
		if($("#check_areas").prop('checked')==true){
			estatus=1;
			contador=contador+1;
			selec_abcdario+=array_abcdario[contador]+"-";
			
			datos22.push({ "data": "Area"});
			$("#th_Area").show();
			val_seleccionados+=1+"-";
			if (cmbareas == "-1") {
				cmbareas="";
			}
			
		}else{
			cmbareas="";
			$("#th_Area").hide();
			val_seleccionados+=0+"-";
			selec_abcdario+=0+"-";
		}
		
		if(Id_Area_Login!="5"){
			cmbareas=Id_Area_Login;
		}
		
		if($("#check_ubic_prim").prop('checked')==true){
			estatus=1;
			contador=contador+1;
			selec_abcdario+=array_abcdario[contador]+"-";
			datos22.push({ "data": "UbicacionPrimaria"});
			$("#th_Ubic_Primaria").show();
			val_seleccionados+=1+"-";
			if (cmbubicprim == "-1") {
				cmbubicprim="";
			}
		}else{
			cmbubicprim="";
			$("#th_Ubic_Primaria").hide();
			val_seleccionados+=0+"-";
			selec_abcdario+=0+"-";
		}
		if($("#check_ubic_sec").prop('checked')==true){
			estatus=1;
			contador=contador+1;
			selec_abcdario+=array_abcdario[contador]+"-";
			datos22.push({ "data": "UbicacionSecundaria"});
			$("#th_Ubic_Sec").show();
			val_seleccionados+=1+"-";
			if (cmbubicsec == "-1") {
				cmbubicsec="";
			}
		}else{
			cmbubicsec="";
			$("#th_Ubic_Sec").hide();
			val_seleccionados+=0+"-";
			selec_abcdario+=0+"-";
		}
		if($("#check_Ubic_Especifica").prop('checked')==true){
			estatus=1;
			contador=contador+1;
			selec_abcdario+=array_abcdario[contador]+"-";
			datos22.push({ "data": "Especifica"});
			$("#th_Ubic_Esp").show();
			val_seleccionados+=1+"-";
			if (Ubic_Especifica.length == 0) {
				Ubic_Especifica="";
			}
		}else{
			Ubic_Especifica="";
			$("#th_Ubic_Esp").hide();
			val_seleccionados+=0+"-";
			selec_abcdario+=0+"-";
		}
		if($("#check_Desc_Larga").prop('checked')==true){
			estatus=1;
			contador=contador+1;
			selec_abcdario+=array_abcdario[contador]+"-";
			datos22.push({ "data": "DescLarga"});
			$("#th_Desc_Larga").show();
			val_seleccionados+=1+"-";
			if (Desc_Larga.length == 0) {
				Desc_Larga="";
			}
		}else{
			Desc_Larga="";
			$("#th_Desc_Larga").hide();
			val_seleccionados+=0+"-";
			selec_abcdario+=0+"-";
		}
		if($("#check_Desc_Corta").prop('checked')==true){
			estatus=1;
			contador=contador+1;
			selec_abcdario+=array_abcdario[contador]+"-";
			datos22.push({ "data": "DescCorta"});
			$("#th_Desc_Corta").show();
			val_seleccionados+=1+"-";
			if (Desc_Corta.length == 0) {
				Desc_Corta="";
			}
		}else{
			Desc_Corta="";
			$("#th_Desc_Corta").hide();
			val_seleccionados+=0+"-";
			selec_abcdario+=0+"-";
		}
		if($("#check_motivo").prop('checked')==true){
			estatus=1;
			contador=contador+1;
			selec_abcdario+=array_abcdario[contador]+"-";
			datos22.push({ "data": "Motivo_Alta"});
			$("#th_Motivo_Alta").show();
			val_seleccionados+=1+"-";
			if (cmbmotivo == "-1") {
				cmbmotivo="";
			}
		}else{
			cmbmotivo="";
			$("#th_Motivo_Alta").hide();
			val_seleccionados+=0+"-";
			selec_abcdario+=0+"-";
		}
		if($("#check_propedad").prop('checked')==true){
			estatus=1;
			contador=contador+1;
			selec_abcdario+=array_abcdario[contador]+"-";
			datos22.push({ "data": "Propiedad"});
			$("#th_Propiedad").show();
			val_seleccionados+=1+"-";
			if (cmbprpiedad == "-1") {
				cmbprpiedad="";
			}
		}else{
			cmbprpiedad="";
			$("#th_Propiedad").hide();
			val_seleccionados+=0+"-";
			selec_abcdario+=0+"-";
		}
		if($("#check_clasificacion").prop('checked')==true){
			estatus=1;
			contador=contador+1;
			selec_abcdario+=array_abcdario[contador]+"-";
			datos22.push({ "data": "Clasificacion"});
			$("#th_Clasificacion").show();
			val_seleccionados+=1+"-";
			if (cmbclasificacion == "-1") {
				cmbclasificacion="";
			}
		}else{
			cmbclasificacion="";
			$("#th_Clasificacion").hide();
			val_seleccionados+=0+"-";
			selec_abcdario+=0+"-";
		}
		if($("#check_familia").prop('checked')==true){
			estatus=1;
			contador=contador+1;
			selec_abcdario+=array_abcdario[contador]+"-";
			datos22.push({ "data": "Familia"});
			$("#th_Familia").show();
			val_seleccionados+=1+"-";
			if (cmbfamilia == "-1") {
				cmbfamilia="";
			}
		}else{
			cmbfamilia="";
			$("#th_Familia").hide();
			val_seleccionados+=0+"-";
			selec_abcdario+=0+"-";
		}
		if($("#check_subfamilia").prop('checked')==true){
			estatus=1;
			contador=contador+1;
			selec_abcdario+=array_abcdario[contador]+"-";
			datos22.push({ "data": "Subfamilia"});
			$("#th_Subfamilia").show();
			val_seleccionados+=1+"-";
			if (cmbsubfamilia == "-1") {
				cmbsubfamilia="";
			}
		}else{
			cmbsubfamilia="";
			$("#th_Subfamilia").hide();
			val_seleccionados+=0+"-";
			selec_abcdario+=0+"-";
		}
		if($("#check_marca").prop('checked')==true){
			estatus=1;
			contador=contador+1;
			selec_abcdario+=array_abcdario[contador]+"-";
			datos22.push({ "data": "Marca"});
			$("#th_Marca").show();
			val_seleccionados+=1+"-";
			if (Marca.length == 0) {
				Marca="";
			}
			
		}else{
			Marca="";
			$("#th_Marca").hide();
			val_seleccionados+=0+"-";
			selec_abcdario+=0+"-";
		}
		if($("#check_modelo").prop('checked')==true){
			estatus=1;
			contador=contador+1;
			selec_abcdario+=array_abcdario[contador]+"-";
			datos22.push({ "data": "Modelo"});
			$("#th_Modelo").show();
			val_seleccionados+=1+"-";
			if (Modelo.length == 0) {
				Modelo="";
			}
		}else{
			Modelo="";
			$("#th_Modelo").hide();
			val_seleccionados+=0+"-";
			selec_abcdario+=0+"-";
		}
		if($("#check_no_serie").prop('checked')==true){
			estatus=1;
			contador=contador+1;
			selec_abcdario+=array_abcdario[contador]+"-";
			datos22.push({ "data": "NumSerie"});
			$("#th_No_Serie").show();
			val_seleccionados+=1+"-";
			if (No_Serie.length == 0) {
				No_Serie="";
			}
		}else{
			No_Serie="";
			$("#th_No_Serie").hide();
			val_seleccionados+=0+"-";
			selec_abcdario+=0+"-";
		}
		if($("#check_tipoactivo").prop('checked')==true){
			estatus=1;
			contador=contador+1;
			selec_abcdario+=array_abcdario[contador]+"-";
			datos22.push({ "data": "TipoActivo"});
			$("#th_Tipo_Activo").show();
			val_seleccionados+=1+"-";
			if (cmbtipoactivo == "-1") {
				cmbtipoactivo="";
			}
		}else{
			cmbtipoactivo="";
			$("#th_Tipo_Activo").hide();
			val_seleccionados+=0+"-";
			selec_abcdario+=0+"-";
		}
		if($("#check_PRE").prop('checked')==true){
			estatus=1;
			contador=contador+1;
			selec_abcdario+=array_abcdario[contador]+"-";
			datos22.push({ "data": "ParticipaPre"});
			$("#th_Part_PRE").show();
			val_seleccionados+=1+"-";
			if (cmbPRE == "-1") {
				cmbPRE="";
			}
		}else{
			cmbPRE="";
			$("#th_Part_PRE").hide();
			val_seleccionados+=0+"-";
			selec_abcdario+=0+"-";
		}
		if($("#check_seguros").prop('checked')==true){
			estatus=1;
			contador=contador+1;
			selec_abcdario+=array_abcdario[contador]+"-";
			datos22.push({ "data": "ParticipaSeguros"});
			$("#th_Part_Seg").show();
			val_seleccionados+=1+"-";
			if (cmbseguros == "-1") {
				cmbseguros="";
			}
		}else{
			cmbseguros="";
			$("#th_Part_Seg").hide();
			val_seleccionados+=0+"-";
			selec_abcdario+=0+"-";
		}
		if($("#check_Importe_Seguros").prop('checked')==true){
			estatus=1;
			contador=contador+1;
			selec_abcdario+=array_abcdario[contador]+"-";
			datos22.push({ "data": "ImporteSeguros"});
			$("#th_Import_Seg").show();
			val_seleccionados+=1+"-";
			if (Importe_Seguros.length == 0) {
				Importe_Seguros="";
			}
		}else{
			Importe_Seguros="";
			$("#th_Import_Seg").hide();
			val_seleccionados+=0+"-";
			selec_abcdario+=0+"-";
		}
		if($("#check_certificacion").prop('checked')==true){
			estatus=1;
			contador=contador+1;
			selec_abcdario+=array_abcdario[contador]+"-";
			datos22.push({ "data": "ParticipaCertificacion"});
			$("#th_Part_Cert").show();
			val_seleccionados+=1+"-";
			if (cmbcertificacion == "-1") {
				cmbcertificacion="";
			}
		}else{
			cmbcertificacion="";
			$("#th_Part_Cert").hide();
			val_seleccionados+=0+"-";
			selec_abcdario+=0+"-";
		}

		var $select_num_empleado = $('#select-usuarios').selectize({});	
		var empl = $select_num_empleado[0].selectize;
		if(empl.items.length > 0){
			estatus=1;
			//Convertimos el array a String
			Num_Empleado=empl.items.toString();
			contador=contador+1;
			selec_abcdario+=array_abcdario[contador]+"-";
			contador=contador+1;
			selec_abcdario+=array_abcdario[contador]+"-";
			datos22.push({ "data": "Num_Empleado"});
			datos22.push({ "data": "Nombre_Completo"});
		}else{
			Num_Empleado="";
			contador=contador+1;
			selec_abcdario+=array_abcdario[contador]+"-";
			contador=contador+1;
			selec_abcdario+=array_abcdario[contador]+"-";
			datos22.push({ "data": "Num_Empleado"});
			datos22.push({ "data": "Nombre_Completo"});
		}
		if($("#check_tipovale").prop('checked')==true){
			estatus=1;
			contador=contador+1;
			selec_abcdario+=array_abcdario[contador]+"-";
			datos22.push({ "data": "Tipo_Vale"});
			$("#th_Tipo_Vale").show();
			val_seleccionados+=1+"-";
			if (cmbtipovale == "-1") {
				cmbtipovale="";
			}
		}else{
			cmbtipovale="";
			$("#th_Tipo_Vale").hide();
			val_seleccionados+=0+"-";
			selec_abcdario+=0+"-";
		}
		if($("#check_Garantia").prop('checked')==true){
			estatus=1;
			contador=contador+1;
			selec_abcdario+=array_abcdario[contador]+"-";
			datos22.push({ "data": "Garantia"});
			$("#th_Garantia").show();
			val_seleccionados+=1+"-";
			if (Garantia.length == 0) {
				Garantia="";
			}
		}else{
			Garantia="";
			$("#th_Garantia").hide();
			val_seleccionados+=0+"-";
			selec_abcdario+=0+"-";
		}
		if($("#check_Ext_Garantia").prop('checked')==true){
			estatus=1;
			contador=contador+1;
			selec_abcdario+=array_abcdario[contador]+"-";
			datos22.push({ "data": "ExtGarantia"});
			$("#th_Ext_Garantia").show();
			val_seleccionados+=1+"-";
			if (Ext_Garantia.length == 0) {
				Ext_Garantia="";
			}
		}else{
			Ext_Garantia="";
			$("#th_Ext_Garantia").hide();
			val_seleccionados+=0+"-";
			selec_abcdario+=0+"-";
		}
		
	
		if($("#check_departamento").prop('checked')==true){
			estatus=1;
			contador=contador+1;
			selec_abcdario+=array_abcdario[contador]+"-";
			datos22.push({ "data": "Departamento"});
			$("#th_Departamento").show();
			val_seleccionados+=1+"-";
			if (cmbdepartamento == "-1") {
				cmbdepartamento="";
			}
			/*
			cmbdepartamento="";
			$("#th_Departamento").hide();
			val_seleccionados+=0+"-";
			selec_abcdario+=0+"-";
			*/
		}else{
			cmbdepartamento="";
			$("#th_Departamento").hide();
			val_seleccionados+=0+"-";
			selec_abcdario+=0+"-";
		}
		
		
		var Datos_Proveedor=false;
		if($("#check_Datos_Proveedor").prop('checked')==true){
			Datos_Proveedor=true;
			estatus=1;
			contador=contador+1;selec_abcdario+=array_abcdario[contador]+"-";datos22.push({ "data": "NumOrdenCompra"});$("#th_P_Num_Orden_Compra").show();val_seleccionados+=1+"-";
			contador=contador+1;selec_abcdario+=array_abcdario[contador]+"-";datos22.push({ "data": "NumFactura"});$("#th_P_Num_Factura").show();val_seleccionados+=1+"-";
			contador=contador+1;selec_abcdario+=array_abcdario[contador]+"-";datos22.push({ "data": "FechaFactura"});$("#th_P_Fech_Factura").show();val_seleccionados+=1+"-";
			contador=contador+1;selec_abcdario+=array_abcdario[contador]+"-";datos22.push({ "data": "UUID"});$("#th_P_UUID").show();val_seleccionados+=1+"-";
			contador=contador+1;selec_abcdario+=array_abcdario[contador]+"-";datos22.push({ "data": "Folio_Fiscal"});$("#th_P_Folio_Fiscal").show();val_seleccionados+=1+"-";
			contador=contador+1;selec_abcdario+=array_abcdario[contador]+"-";datos22.push({ "data": "MontoFactura"});$("#th_P_Monto_F").show();val_seleccionados+=1+"-";
			contador=contador+1;selec_abcdario+=array_abcdario[contador]+"-";datos22.push({ "data": "Monto_F"});$("#th_P_Monto_Factura").show();val_seleccionados+=1+"-";
			contador=contador+1;selec_abcdario+=array_abcdario[contador]+"-";datos22.push({ "data": "NumContrato"});$("#th_P_Num_Contrato").show();val_seleccionados+=1+"-";
			contador=contador+1;selec_abcdario+=array_abcdario[contador]+"-";datos22.push({ "data": "VidaUtilFabricante"});$("#th_P_Vida_Util_Fabr").show();val_seleccionados+=1+"-";
			contador=contador+1;selec_abcdario+=array_abcdario[contador]+"-";datos22.push({ "data": "VidaUtilCHS"});$("#th_P_Vida_Util_CHS").show();val_seleccionados+=1+"-";
			contador=contador+1;selec_abcdario+=array_abcdario[contador]+"-";datos22.push({ "data": "Garantia_P"});$("#th_P_Garantia").show();val_seleccionados+=1+"-";
			contador=contador+1;selec_abcdario+=array_abcdario[contador]+"-";datos22.push({ "data": "ExtGarantia_P"});$("#th_P_Ext_Garantia").show();val_seleccionados+=1+"-";
			contador=contador+1;selec_abcdario+=array_abcdario[contador]+"-";datos22.push({ "data": "Fecha_Vencimiento"});$("#th_P_Fecha_Vencimiento").show();val_seleccionados+=1+"-";
			contador=contador+1;selec_abcdario+=array_abcdario[contador]+"-";datos22.push({ "data": "NombreProveedor"});$("#th_P_Nom_Proveedor").show();val_seleccionados+=1+"-";
			contador=contador+1;selec_abcdario+=array_abcdario[contador]+"-";datos22.push({ "data": "Contacto"});$("#th_P_Contacto").show();val_seleccionados+=1+"-";
			contador=contador+1;selec_abcdario+=array_abcdario[contador]+"-";datos22.push({ "data": "Telefono"});$("#th_P_Telefono").show();val_seleccionados+=1+"-";
			contador=contador+1;selec_abcdario+=array_abcdario[contador]+"-";datos22.push({ "data": "DocRecibida"});$("#th_P_Doc_Recibida").show();val_seleccionados+=1+"-";
			contador=contador+1;selec_abcdario+=array_abcdario[contador]+"-";datos22.push({ "data": "Accesorios"});$("#th_P_Accesorios").show();val_seleccionados+=1+"-";
			contador=contador+1;selec_abcdario+=array_abcdario[contador]+"-";datos22.push({ "data": "Correo"});$("#th_P_Correo").show();val_seleccionados+=1+"-";
			contador=contador+1;selec_abcdario+=array_abcdario[contador]+"-";datos22.push({ "data": "Consumibles"});$("#th_P_Consumibles").show();val_seleccionados+=1+"-";
			contador=contador+1;selec_abcdario+=array_abcdario[contador]+"-";datos22.push({ "data": "Link"});$("#th_P_Link").show();val_seleccionados+=1+"-";
			contador=contador+1;selec_abcdario+=array_abcdario[contador]+"-";datos22.push({ "data": "siga_activos_condicion_recepcion"});$("#th_P_Condicion").show();val_seleccionados+=1+"-";
			contador=contador+1;selec_abcdario+=array_abcdario[contador]+"-";datos22.push({ "data": "siga_activos_fch_recepcion_equipo"});$("#th_P_FchRecEqu").show();val_seleccionados+=1+"-";
			contador=contador+1;selec_abcdario+=array_abcdario[contador]+"-";datos22.push({ "data": "siga_activos_fch_operacion"});$("#th_P_FchOpeEqu").show();val_seleccionados+=1+"-";
		}
		else{
			$("#th_P_Num_Orden_Compra").hide();val_seleccionados+=0+"-";selec_abcdario+=0+"-";
			$("#th_P_Num_Factura").hide();val_seleccionados+=0+"-";selec_abcdario+=0+"-";
			$("#th_P_Fech_Factura").hide();val_seleccionados+=0+"-";selec_abcdario+=0+"-";
			$("#th_P_UUID").hide();val_seleccionados+=0+"-";selec_abcdario+=0+"-";
			$("#th_P_Folio_Fiscal").hide();val_seleccionados+=0+"-";selec_abcdario+=0+"-";
			$("#th_P_Monto_F").hide();val_seleccionados+=0+"-";selec_abcdario+=0+"-";
			$("#th_P_Monto_Factura").hide();val_seleccionados+=0+"-";selec_abcdario+=0+"-";
			$("#th_P_Num_Contrato").hide();val_seleccionados+=0+"-";selec_abcdario+=0+"-";
			$("#th_P_Vida_Util_Fabr").hide();val_seleccionados+=0+"-";selec_abcdario+=0+"-";
			$("#th_P_Vida_Util_CHS").hide();val_seleccionados+=0+"-";selec_abcdario+=0+"-";
			$("#th_P_Garantia").hide();val_seleccionados+=0+"-";selec_abcdario+=0+"-";
			$("#th_P_Ext_Garantia").hide();val_seleccionados+=0+"-";selec_abcdario+=0+"-";
			$("#th_P_Fecha_Vencimiento").hide();val_seleccionados+=0+"-";selec_abcdario+=0+"-";
			$("#th_P_Nom_Proveedor").hide();val_seleccionados+=0+"-";selec_abcdario+=0+"-";
			$("#th_P_Contacto").hide();val_seleccionados+=0+"-";selec_abcdario+=0+"-";
			$("#th_P_Telefono").hide();val_seleccionados+=0+"-";selec_abcdario+=0+"-";
			$("#th_P_Doc_Recibida").hide();val_seleccionados+=0+"-";selec_abcdario+=0+"-";
			$("#th_P_Accesorios").hide();val_seleccionados+=0+"-";selec_abcdario+=0+"-";
			$("#th_P_Correo").hide();val_seleccionados+=0+"-";selec_abcdario+=0+"-";
			$("#th_P_Consumibles").hide();val_seleccionados+=0;selec_abcdario+=0+"-";
			$("#th_P_Link").hide();val_seleccionados+=0;selec_abcdario+=0+"-";
			$("#th_P_Condicion").hide();val_seleccionados+=0;selec_abcdario+=0+"-";
			$("#th_P_FchRecEqu").hide();val_seleccionados+=0;selec_abcdario+=0+"-";
			$("#th_P_FchOpeEqu").hide();val_seleccionados+=0;selec_abcdario+=0+"-";
			
		}
		
		var Datos_Contabilidad=false;
		
		if($("#check_Datos_Contabilidad").prop('checked')==true){
			Datos_Contabilidad=true;
			estatus=1;
			contador=contador+1;selec_abcdario+=array_abcdario[contador]+"-";datos22.push({ "data": "Centro_Costos"});$("#th_C_Centro_Costos").show();val_seleccionados+=1+"-";
			contador=contador+1;selec_abcdario+=array_abcdario[contador]+"-";datos22.push({ "data": "No_Capex"});$("#th_C_No_Capex").show();val_seleccionados+=1+"-";
			contador=contador+1;selec_abcdario+=array_abcdario[contador]+"-";datos22.push({ "data": "Prorrateo"});$("#th_C_Prorrateo").show();val_seleccionados+=1+"-";
			contador=contador+1;selec_abcdario+=array_abcdario[contador]+"-";datos22.push({ "data": "Participa_Depreciacion"});$("#th_C_Participa_Depreciacion").show();val_seleccionados+=1+"-";
			contador=contador+1;selec_abcdario+=array_abcdario[contador]+"-";datos22.push({ "data": "Fecha_Inicio_Depr"});$("#th_C_Fecha_Inicio_Depr").show();val_seleccionados+=1+"-";
			contador=contador+1;selec_abcdario+=array_abcdario[contador]+"-";datos22.push({ "data": "Cuent_Cont_Act"});$("#th_C_Cuent_Cont_Act").show();val_seleccionados+=1+"-";
			contador=contador+1;selec_abcdario+=array_abcdario[contador]+"-";datos22.push({ "data": "Cuent_Cont_Act_B10"});$("#th_C_Cuent_Cont_Act_B10").show();val_seleccionados+=1+"-";
			contador=contador+1;selec_abcdario+=array_abcdario[contador]+"-";datos22.push({ "data": "Cuent_Cont_Result"});$("#th_C_Cuent_Cont_Result").show();val_seleccionados+=1+"-";
			contador=contador+1;selec_abcdario+=array_abcdario[contador]+"-";datos22.push({ "data": "Cuent_Cont_Result_B10"});$("#th_C_Cuent_Cont_Result_B10").show();val_seleccionados+=1+"-";
			contador=contador+1;selec_abcdario+=array_abcdario[contador]+"-";datos22.push({ "data": "Cuent_Cont_Dep"});$("#th_C_Cuent_Cont_Dep").show();val_seleccionados+=1+"-";
			contador=contador+1;selec_abcdario+=array_abcdario[contador]+"-";datos22.push({ "data": "Cuent_Cont_Dep_B10"});$("#th_C_Cuent_Cont_Dep_B10").show();val_seleccionados+=1+"-";
		}else{
			$("#th_C_Centro_Costos").hide();val_seleccionados+=0+"-";selec_abcdario+=0+"-";
			$("#th_C_No_Capex").hide();val_seleccionados+=0+"-";selec_abcdario+=0+"-";
			$("#th_C_Prorrateo").hide();val_seleccionados+=0+"-";selec_abcdario+=0+"-";
			$("#th_C_Participa_Depreciacion").hide();val_seleccionados+=0+"-";selec_abcdario+=0+"-";
			$("#th_C_Fecha_Inicio_Depr").hide();val_seleccionados+=0+"-";selec_abcdario+=0+"-";
			$("#th_C_Cuent_Cont_Act").hide();val_seleccionados+=0+"-";selec_abcdario+=0+"-";
			$("#th_C_Cuent_Cont_Act_B10").hide();val_seleccionados+=0+"-";selec_abcdario+=0+"-";
			$("#th_C_Cuent_Cont_Result").hide();val_seleccionados+=0+"-";selec_abcdario+=0+"-";
			$("#th_C_Cuent_Cont_Result_B10").hide();val_seleccionados+=0+"-";selec_abcdario+=0+"-";
			$("#th_C_Cuent_Cont_Dep").hide();val_seleccionados+=0+"-";selec_abcdario+=0+"-";
			$("#th_C_Cuent_Cont_Dep_B10").hide();val_seleccionados+=0;selec_abcdario+=0+"-";
		}
		
		contador=contador+1;selec_abcdario+=array_abcdario[contador]+"-";datos22.push({ "data": "Fech_Inser"});val_seleccionados+=1+"-";
		contador=contador+1;selec_abcdario+=array_abcdario[contador]+"-";datos22.push({ "data": "Usuario_Registro"});val_seleccionados+=1+"-";
		contador=contador+1;selec_abcdario+=array_abcdario[contador]+"-";datos22.push({ "data": "Frecuencia"});val_seleccionados+=1+"-";
		contador=contador+1;selec_abcdario+=array_abcdario[contador]+"-";datos22.push({ "data": "Realiza"});val_seleccionados+=1;
		
		$("#Check_Seleccionados").val(selec_abcdario);
		//if(estatus==0){
		//	Agregar = false; 
		//	mensaje_error += " -Selecciona un Filtro para la Busqueda<br />";
		//}
		
		
		
		
		if (!Agregar) {
			mensajesalerta("Informaci&oacute;n", mensaje_error, "info", "dark");			
		}
		
		if(Agregar)
		{
			$("#Val1").val(Id_Activo);
            //$("#Val2").val(cmbubicprim);
            //$("#Val3").val(cmbubicsec);
            //$("#Val4").val(cmbareas);
            //$("#Val5").val(cmbprpiedad);
            //$("#Val6").val(cmbfamilia);
            //$("#Val7").val(cmbsubfamilia);
            //$("#Val8").val(cmbdepartamento);
            $("#Val9").val(Num_Empleado);
            //$("#Val10").val(cmbmotivo);
            //$("#Val11").val(cmbtipoactivo);
			//$("#Val12").val(cmbtipovale);
			
			//$("#Val13").val(cmbclasificacion);
			//$("#Val14").val(Marca);
			//$("#Val15").val(Modelo);
			//$("#Val16").val(No_Serie);
			//$("#Val17").val(cmbPRE);
			//$("#Val18").val(cmbseguros);
			$("#Val19").val(Importe_Seguros);
			//$("#Val20").val(cmbcertificacion);
			$("#Val21").val(Garantia);
			$("#Val22").val(Ext_Garantia);
			$("#Val23").val(Desc_Larga);
			$("#Val24").val(Desc_Corta);
			$("#Val25").val(Ubic_Especifica);
            
			strdatos={
				Id_Activo:Id_Activo,
				Id_Ubic_Prim:cmbubicprim,
				Id_Ubic_Sec:cmbubicsec,
				Id_Area:cmbareas,
				Id_Propiedad:cmbprpiedad,
				Id_Familia:cmbfamilia,
				Id_Subfamilia:cmbsubfamilia,
				Id_Departamento:cmbdepartamento,
				Num_Empleado:Num_Empleado,
				Id_Motivo_Alta:cmbmotivo,
				Id_Tipo_Activo:cmbtipoactivo,
				Id_Tipo_Vale_Resg:cmbtipovale,
				//Aqui va la clase
				Id_Clasificacion:cmbclasificacion,
				Marca:Marca,
				Modelo:Modelo,
				NumSerie:No_Serie,
				ParticipaPre:cmbPRE,
				ParticipaSeguros:cmbseguros,
				ImporteSeguros:Importe_Seguros,
				ParticipaCertificacion:cmbcertificacion,
				Garantia:Garantia,
				ExtGarantia:Ext_Garantia,
				DescLarga:Desc_Larga,
				DescCorta:Desc_Corta,
				Especifica:Ubic_Especifica,
				//Datos del proveedor
				Datos_Proveedor:Datos_Proveedor,
				Estatus_Reg: '1',
				Baja:Baja,
				accion:"Reporte_Activos"
			}
			
			//Limpiamos y destruimos la tabla para evitar errores en el javascript
			$('#tabla_reporte_activos').DataTable().clear().destroy();
		
			
			// Definición del DataTable principal
			$('#tabla_reporte_activos').DataTable({
				"processing": true,
				"serverSide": true,
				// Celdas a exportar en el documento Excel, empezando por el indice 0
				"buttons": [{
					text: '<i class="fa fa-file-excel-o"></i> Exportar a Excel',
					className: 'btn chs export',
					extend: 'excelHtml5',
					init: function (api, node, config) {
						jQuery(node).removeClass('dt-button buttons-excel buttons-html5')
					}
				}],
				"dom": '<"text-center"><"row"<"col-md-6"l><"col-md-6"f>><"table-responsive"Rt>ip',
				"ajax": {
					"url": "../fachadas/activos/siga_reportes/Siga_reportesFacade.Class.php",
					"type": "POST",
					"dataSrc": function ( json ) {
						if(json.recordsTotal>0){
							mensajesalerta("&Eacute;xito", "Registros encontrados", "success", "dark");
							$("#tabla_dinamica_reporte").show();
							$("#Busqueda").hide();
						}
						else {
							mensajesalerta("Informaci&oacute;n", "No se encontraron Registros", "info", "dark");
						}
						return json.data;
					},
					"data": strdatos,
				},
				"columns": datos22,
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
	}
	

	limpiar_campos= function (){
		$("#Busqueda").show();
		$("#Val1").val("");
        $("#Val2").val("");
        $("#Val3").val("");
        //$("#Val4").val("");
        $("#Val5").val("");
        $("#Val6").val("");
        $("#Val7").val("");
        $("#Val8").val("");
        $("#Val9").val("");
        $("#Val10").val("");
        $("#Val11").val("");
		$("#Val12").val("");
		$("#Val13").val("");
		$("#Val14").val("");
		$("#Val15").val("");
		$("#Val16").val("");
		$("#Val17").val("");
		$("#Val18").val("");
		$("#Val19").val("");
		$("#Val20").val("");
		$("#Val21").val("");
		$("#Val22").val("");
		$("#Val23").val("");
		$("#Val24").val("");
		$("#Val25").val("");
		$("#hddbaja").val("");
			
		strdatos={};
	
		$("#tabla_dinamica_reporte").hide();
	
		var $select3 = $('#select-activos').selectize({});
		var control3 = $select3[0].selectize;
		control3.clear();
		control3.enable();
		
		
		var Usuario=$.trim($("#select-usuarios").val());
		if(Usuario!=""){	
			if(Usuario.length > 0){
				var $select_u = $('#select-usuarios').selectize({});	
				var control_u = $select_u[0].selectize;
				control_u.clear();
				control_u.enable();
			}
		}
		
		$('#cmbareas').val(-1);
		$('#cmbubicprim').val(-1);
		$('#cmbubicsec').val(-1);
		$("#cmbfamilia").val(-1);
		$("#cmbsubfamilia").val(-1);
		$('#cmbprpiedad').val('').trigger('change');
		$('#cmbdepartamento').val('').trigger('change');
		$('#cmbmotivo').val('').trigger('change');
		$('#cmbtipoactivo').val('').trigger('change');
		$('#cmbtipovale').val('').trigger('change');
		$('#cmbclase').val(-1);
		$('#cmbclasificacion').val(-1);
		$('#cmbmarca').val('').trigger('change');
		$('#cmbmodelo').val('').trigger('change');
		$('#cmbnumserie').val('').trigger('change');
		$("#txtActivo_Padre").val("");
		$("#txtNo_Activo_Anterior").val("");
		$('#cmbPRE').val('').trigger('change');
		$('#cmbseguros').val('').trigger('change');
		$("#txtImporte_Seguros").val("");
		$('#cmbcertificacion').val('').trigger('change');
		$("#txtGarantia").val("");
		$("#txtExt_Garantia").val("");
		$("#txtDesc_Larga").val("");
		$("#txtDesc_Corta").val("");
		$("#txtUbic_Especifica").val("");
		//Enable checkboxes
		$("#check_areas").prop( "checked", false );
		$("#check_ubic_prim").prop( "checked", false );
		$("#check_ubic_sec").prop( "checked", false );
		$("#check_familia").prop( "checked", false );
		$("#check_subfamilia").prop( "checked", false );
		$("#check_propedad").prop( "checked", false );
		//$("#check_departamento").prop( "checked", false );
		$("#check_motivo").prop( "checked", false );
		$("#check_tipoactivo").prop( "checked", false );
		$("#check_tipovale").prop( "checked", false );
		$("#check_clase").prop( "checked", false );
		$("#check_clasificacion").prop( "checked", false );
		$("#check_marca").prop( "checked", false );
		$("#check_modelo").prop( "checked", false );
		$("#check_no_serie").prop( "checked", false );
		$("#check_activo_padre").prop( "checked", false );
		$("#check_no_activo_anterior").prop( "checked", false );
		$("#check_PRE").prop( "checked", false );
		$("#check_seguros").prop( "checked", false );
		$("#check_Importe_Seguros").prop( "checked", false );
		$("#check_certificacion").prop( "checked", false );
		$("#check_Garantia").prop( "checked", false );
		$("#check_Ext_Garantia").prop( "checked", false );
		$("#check_Baja").prop( "checked", false );
		$("#check_Datos_Proveedor").prop( "checked", false );
		$("#check_Datos_Contabilidad").prop( "checked", false );
		$("#check_Desc_Larga").prop( "checked", false );
		$("#check_Desc_Corta").prop( "checked", false );
		$("#check_Ubic_Especifica").prop( "checked", false );	
	}
	
	llenar_check=function(){
		$("#check_areas").prop( "checked", true );
		$("#check_ubic_prim").prop( "checked", true );
		$("#check_ubic_sec").prop( "checked", true );
		$("#check_familia").prop( "checked", true );
		$("#check_subfamilia").prop( "checked", true );
		$("#check_propedad").prop( "checked", true );
		$("#check_departamento").prop( "checked", true );
		$("#check_motivo").prop( "checked", true );
		$("#check_tipoactivo").prop( "checked", true );
		$("#check_tipovale").prop( "checked", true );
		$("#check_clase").prop( "checked", true );
		$("#check_clasificacion").prop( "checked", true );
		$("#check_marca").prop( "checked", true );
		$("#check_modelo").prop( "checked", true );
		$("#check_no_serie").prop( "checked", true );
		$("#check_activo_padre").prop( "checked", true );
		$("#check_no_activo_anterior").prop( "checked", true );
		$("#check_PRE").prop( "checked", true );
		$("#check_seguros").prop( "checked", true );
		$("#check_Importe_Seguros").prop( "checked", true );
		$("#check_certificacion").prop( "checked", true );
		$("#check_Garantia").prop( "checked", true );
		$("#check_Ext_Garantia").prop( "checked", true );
		$("#check_Baja").prop( "checked", true );
		$("#check_Datos_Proveedor").prop( "checked", true );
		$("#check_Datos_Contabilidad").prop( "checked", true );
		$("#check_Desc_Larga").prop( "checked", true );
		$("#check_Desc_Corta").prop( "checked", true );
		$("#check_Ubic_Especifica").prop( "checked", true );
	}
	
	limpiar_check=function(){
		$("#check_areas").prop( "checked", false );
		$("#check_ubic_prim").prop( "checked", false );
		$("#check_ubic_sec").prop( "checked", false );
		$("#check_familia").prop( "checked", false );
		$("#check_subfamilia").prop( "checked", false );
		$("#check_propedad").prop( "checked", false );
		//$("#check_departamento").prop( "checked", false );
		$("#check_motivo").prop( "checked", false );
		$("#check_tipoactivo").prop( "checked", false );
		$("#check_tipovale").prop( "checked", false );
		$("#check_clase").prop( "checked", false );
		$("#check_clasificacion").prop( "checked", false );
		$("#check_marca").prop( "checked", false );
		$("#check_modelo").prop( "checked", false );
		$("#check_no_serie").prop( "checked", false );
		$("#check_activo_padre").prop( "checked", false );
		$("#check_no_activo_anterior").prop( "checked", false );
		$("#check_PRE").prop( "checked", false );
		$("#check_seguros").prop( "checked", false );
		$("#check_Importe_Seguros").prop( "checked", false );
		$("#check_certificacion").prop( "checked", false );
		$("#check_Garantia").prop( "checked", false );
		$("#check_Ext_Garantia").prop( "checked", false );
		$("#check_Baja").prop( "checked", false );
		$("#check_Datos_Proveedor").prop( "checked", false );
		$("#check_Datos_Contabilidad").prop( "checked", false );
		$("#check_Desc_Larga").prop( "checked", false );
		$("#check_Desc_Corta").prop( "checked", false );
		$("#check_Ubic_Especifica").prop( "checked", false );
	}
	

	// Función que genera el reporte de Activos en formato Excel
	reporte = function () {
		$('#con').text(tabla2);
		$('#cont').submit();
	}
});
</script>