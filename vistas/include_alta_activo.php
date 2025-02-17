<!-- ==== Page: Include_alta_activo ==== -->
<div class="modal fade modalchs" id="altaEquipo" data-backdrop="false">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<!-- ==== Titulo de la Ventana Modal ==== -->
			<div class="modal-header azul">
				<button type="button" class="close" aria-label="Close" onclick="confirmacion_cerrar('altaEquipo')"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><i class="fa fa-arrow-circle-o-up" aria-hidden="true"></i> alta equipo <?php echo date("Y")?></h4>
			</div>

			<!-- ==== Cuerpo de la Ventana Modal ==== -->
			<div class="modal-body nopsides">
				<input type="hidden" id="Id_Activo">
				<input type="hidden" id="Id_activo_proveedor">
				<input type="hidden" id="Id_baja">
				<input type="hidden" id="AnioDepreciacion" value="<?php echo date("Y")?>">
				<input type="hidden" id="MesDepreciacion" value="<?php echo date("m")?>">
				<input type="hidden" id="INPCPeriodo" value="2018">
				<input type="hidden" id="Id_Cargo" value="">
				<input type="hidden" id="Id_Valido" value="0">
				<input type="hidden" id="Id_Valido2" value="0">

				<!-- ==== Botones de selección de Tabs ==== -->
				<ul class="nav nav-tabs azul" role="tablist" id="interest_tabs">
					<li role="presentation" class="active"><a href="#generales" onclick="javascript:activaBoton(1);" aria-controls="generales" role="tab" data-toggle="tab" id="tab1">Datos Generales</a></li>
					<li role="presentation"><a href="#proveedor" aria-controls="proveedor"  onclick="javascript:activaBoton(2);" role="tab" data-toggle="tab" id="tab2">Datos Proveedor</a></li>
					<?php if (isset($_SESSION["Id_Cargo"])) {?><li role="presentation" id="tabContabilidad"><a href="#contabilidad" aria-controls="contabilidad" onclick="javascript:activaBoton(3);" role="tab" data-toggle="tab"  id="tab3">Contabilidad</a></li><?php }?>
				</ul>

				<!-- ==== Tab panes ==== -->
				<div class="tab-content">
					<!-- ==== Ficha de Activos ==== -->
					<div role="tabpanel" class="tab-pane active" id="generales">
						<form>
							<div class="gray">
								<div class="row">
									<div class="col-md-10 col-md-offset-1">
										<!-- columna#1 -->
										<div class="col-md-4">
											<div class="form-group">
												<span><font color="red">*</font></span><label for="AF_BC" class="control-label" id="AF_BCLabel" style="font-size: 11px;"></label>
												<input type="text" class="form-control" id="AF_BC" placeholder="AF/BC" maxlength="25">
											</div>
											<div class="form-group">
												<span><font color="red">*</font></span><label for="cmbubicacionprim" class="control-label" id="cmbubicacionprimLabel" style="font-size: 11px;"></label>
												<select class="form-control" id="cmbubicacionprim"></select>
											</div>
											<div class="form-group">
												<span><font color="red">*</font></span><label for="cmbubicacionsec" class="control-label" id="cmbubicacionsecLabel" style="font-size: 11px;"></label>
												<select class="form-control" id="cmbubicacionsec">
													<option value="-1">--Ubicación Secundaria--</option>
												</select>
											</div>
											<div class="form-group">
												<label for="especifica" class="control-label" id="especificaLabel" style="font-size: 11px;"></label>
												<input type="text" class="form-control" id="especifica" placeholder="Ubicación Específica">
											</div>
										</div>
										<!-- columna#2 -->
										<div class="col-md-4">
											<div class="form-group">
												<span><font color="red">*</font></span><label for="Nombre" class="control-label" id="NombreLabel" style="font-size: 11px;"></label>
												<input type="text" class="form-control" id="Nombre" placeholder="Nombre">
											</div>
											<div class="form-group">
												<span><font color="red">*</font></span><label for="cmbestatus" class="control-label" id="cmbestatusLabel" style="font-size: 11px;"></label>
												<select class="form-control" id="cmbestatus"></select>
											</div>
											<div class="form-group">
												<label for="DescCorta" class="control-label" id="DescCortaLabel" style="font-size: 11px;">Descripción Corta</label>
												<textarea rows="1" placeholder="Descripción Corta" id="DescCorta" class="form-control"></textarea>
											</div>
										</div>
										<!-- columna#3 -->
										<div class="col-md-4">
											<!--div class="form-group" id="Carrusel_Fotos"></div-->
											<div class="form-group">
												<label for="documentos_adjuntos_FILE_tmp" class="control-label" style="font-size: 11px;">Imagen</label>
												<div class="file-preview">
													<div class=" file-drop-zone">
														<div class="file-preview-thumbnails">
															<div class="file-initial-thumbs" style="display: table; margin: 0 auto;">
																<div class="file-preview-frame file-preview-initial" data-template="image" style="display: flex; align-items: center; justify-content: center;">
																	<div class="kv-file-content">
																		<div id="Carrusel_Fotos"></div>
																	</div>
																</div>
															</div>
															<div class="clearfix"></div>
														</div>
													</div>
												</div>
											</div>
											<!-- ==== Area del input para la subida de archivos ==== -->
											<div class="form-group" id="divFoto">
												<!--
												<label for="documentos_adjuntos_FILE" class="control-label" id="documentos_adjuntos_FILELabel" style="font-size: 11px;">Imagen (240x160px)</label>
												<input id="documentos_adjuntos_FILE" name="imagenes[]" type="file" multiple="multiple" class="file-loading">
												<input type="hidden" id="Url_Foto_Activo">
												-->
											</div>
										</div>
									</div>
								</div>
								<!-- ==== Lista de archivos ligados al Activo ==== -->
								<div class="row">
									<div class="col-md-10 col-md-offset-1">
										<div id="divFoto_lista"></div>
									</div> 
								</div>
							</div><!-- gray -->

							<div class="row">
								<div class="col-md-10 col-md-offset-1">

									<div class="col-md-4">

										<div class="form-group">
											<span><font color="red">*</font></span><label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;"></label>
											<select class="form-control" id="cmbareas"></select>
										</div>
										<div class="form-group">
											<span><font color="red">*</font></span><label for="cmbclasificacion" class="control-label" id="cmbclasificacionLabel" style="font-size: 11px;"></label>
											<table>
												<tr>
													<td><select class="form-control" id="cmbclase"></select></td>
													<td><select class="form-control" id="cmbclasificacion"><option value="-1">--Clasificación--</option></select></td>
												</tr>
											</table>
										</div>
										<div class="form-group">
											<label for="Marca" class="control-label" id="MarcaLabel" style="font-size: 11px;"></label>
											<input type="text" class="form-control" id="Marca" placeholder="Marca">
										</div>
										<div class="form-group">
											<span><font color="red">*</font></span><label for="cmbtipoactivo" class="control-label" id="cmbtipoactivoLabel" style="font-size: 11px;"></label>
											<select class="form-control" id="cmbtipoactivo"></select>
										</div>
										<div class="form-group">
											<span><font color="red">*</font></span><label for="cmbPRE" class="control-label" id="cmbPRELabel" style="font-size: 11px;"></label>
											<select class="form-control" id="cmbPRE">
												<option value="-1">Participa en PRE</option>
												<option value="1">Si</option>
												<option value="0">No</option>
											</select>
										</div>
										<div class="form-group">
											<span><font color="red">*</font></span><label for="cmbcertificacion" class="control-label" id="cmbcertificacionLabel" style="font-size: 11px;"></label>
											<select class="form-control" id="cmbcertificacion">
												<option value="-1">Participa en certificación</option>
												<option value="1">Si</option>
												<option value="0">No</option>
											</select>
										</div>
										<div class="form-group">
											<span><font color="red">*</font></span><label for="cmbtipovaleresguardo" class="control-label" id="cmbtipovaleresguardoLabel" style="font-size: 11px;"></label>
											<select class="form-control" id="cmbtipovaleresguardo"></select>
										</div>

										<div class="form-group">
											<span><font color="red">*</font></span><label for="FechaFactura" class="control-label" id="FechaFacturaLabel" style="font-size: 11px;">Fecha de recepción</label>
											<input type="text" class="form-control pull-right datepicker" id="siga_activo_alta_fch_recepcion" name='siga_activo_alta_fch_recepcion' placeholder="Fecha de Recepción">
										</div>

									</div><!-- columna#1 -->

									<div class="col-md-4">
										<div class="form-group">
											<span><font color="red">*</font></span><label for="cmbmotivo" class="control-label" id="cmbmotivoLabel" style="font-size: 11px;"></label>
											<select class="form-control" id="cmbmotivo"></select>
										</div>
										<div class="form-group">
											<span><font color="red">*</font></span><label for="cmbfamilia" class="control-label" id="cmbfamiliaLabel" style="font-size: 11px;"></label>
											<select class="form-control" id="cmbfamilia"></select>
										</div>
										<div class="form-group">
											<label for="modelo" class="control-label" id="modeloLabel" style="font-size: 11px;"></label>
											<input type="text" class="form-control" id="modelo" placeholder="Modelo">
										</div>
										<div class="form-group">
											<label for="activopadre" class="control-label" id="activopadreLabel" style="font-size: 11px;">Activo Padre</label>
											<!--<input type="text" class="form-control" id="activopadre" placeholder="Activo padre">-->
											<select id="activopadre" class="demo-default" placeholder="Activo padre" style="display:none"></select>
										</div>
										<div class="form-group">
											<span><font color="red">*</font></span><label for="cmbseguros" class="control-label" id="cmbsegurosLabel" style="font-size: 11px;"></label>
											<select class="form-control" id="cmbseguros">
												<option  value="-1">Participa en seguros</option>
												<option value="1">Si</option>
												<option value="0">No</option>
											</select>
										</div>
										
										<div class="form-group">
											<span><font color="red">*</font></span><label for="numempleadoresguardo" class="control-label" id="numempleadoresguardoLabel" style="font-size: 11px;">Usuario Resguardo/Responsable activo</label>
											<select id="numempleadoresguardo" class="demo-default" placeholder="Usuario Solicitante" style="display:none"></select>
											<div id="gifcargandoaltausuarios" style="display:none" align="center">
												<img src="../dist/img/cargando-loading.gif" style="max-width: 25px; max-height: 25px" alt="cargando-loading-037.gif">
											</div>
										</div>
										<div class="form-group">
											<span><font color="red">*</font></span>
											<label class="control-label" style="font-size: 11px;">Mantenimiento Preventivo</label>
											<select class="form-control" id="cmb_mant_prevent">
												<option  value="-1">Mantenimiento Preventivo</option>
												<option value="1">Si</option>
												<option value="0">No</option>
											</select>											
										</div>
										
										<div class="form-group">
											<span><font color="red"></font></span>
											<label class="control-label" style="font-size: 11px;">Fecha de Puesta Operación</label>
											<input type="text" class="form-control pull-right datepicker" id="siga_activo_alta_fch_operacion" name='siga_activo_alta_fch_operacion' placeholder="Fecha de puesta en operación">
										</div>

										<div class="form-group" style="display:none">
											<label for="nombreusuarioalta" class="control-label" id="nombreusuarioaltaLabel" style="font-size: 11px;"></label>
											<input type="text" class="form-control" id="nombreusuarioalta" placeholder="Nombre usuario alta">
										</div>
									</div><!-- columna#2 -->

								<div class="col-md-4">
									
									<div class="form-group">
											<span><font color="red">*</font></span>
											<label for="cmbpropiedad" class="control-label" id="cmbpropiedadLabel" style="font-size: 11px;"></label>
											<select class="form-control" id="cmbpropiedad"></select>
										</div>
										<div class="form-group">
											<label for="cmbsubfamilia" class="control-label" id="cmbsubfamiliaLabel" style="font-size: 11px;"></label>
											<select class="form-control" id="cmbsubfamilia"><option value="-1">--Subfamilia--</option></select>
										</div>
										<div class="form-group">
											<span id="spannunmserie"><font color="red">*</font></span><label for="numserie" class="control-label" id="numserieLabel" style="font-size: 11px;"></label>
											<input type="checkbox" id="chknumserie"> No Aplica
											<input type="text" class="form-control" id="numserie" placeholder="No. serie">
										</div>
										<div class="form-group">
											<label for="numactivoanterior" class="control-label" id="numactivoanteriorLabel" style="font-size: 11px;"></label>
											<input type="text" class="form-control" id="numactivoanterior" placeholder="No. activo anterior">
										</div>
										<div class="form-group">
											<font color="red">*</font></span><label for="importeseguros" class="control-label" id="importesegurosLabel" style="font-size: 11px;"></label>
											<input type="text" class="form-control" id="importeseguros" placeholder="Importe de seguros">
										</div>
										<div class="form-group" style="display:none">
											<label for="nombreempleadoresguardo" class="control-label" id="nombreempleadoresguardoLabel" style="font-size: 11px;"></label>
											<input type="text" class="form-control" id="nombreempleadoresguardo" placeholder="Nombre Empleado Resguardo">
										</div>
										<div class="form-group">
											<label for="numusuarioalta" class="control-label" id="numusuarioaltaLabel" style="font-size: 11px;"></label>
											<input type="text" class="form-control" id="numusuarioalta" placeholder="No. Usuario alta">
										</div>
										<div class="form-group">
											<span><font color="red">*</font></span>
											<label class="control-label" style="font-size: 11px;">Condición de Recepción</label>
											<select class="form-control" id="siga_cmb_condicion_recepcion" name="siga_cmb_condicion_recepcion">
												<option value="0" selected>Seleccionar</option>	
												<option value="1">Nuevo</option>
												<option value="2">Seminuevo</option>
												<option value="3">Reconstruido</option>
											</select>
										</div>

									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-10 col-md-offset-1">
									<div class="col-md-12">
										<div class="form-group">
											<label for="polizagarantia" class="control-label" id="polizagarantiaLabel" style="font-size: 11px;">Descripción Larga</label>
											<textarea rows="4" class="form-control" id="DescLarga" placeholder="Descripción Larga"></textarea>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>


					<!-- ==== Datos del Proveedor ==== -->
					<div role="tabpanel" class="tab-pane" id="proveedor">
						<form>
							<div class="gray">
								<div class="row">
									<div class="col-md-10 col-md-offset-1">
										<div class="col-md-4">
											<div class="form-group">
												<label for="AF_BC2" class="control-label" id="AF_BC2Label" style="font-size: 11px;">AF/BC</label>
												<input type="text" disabled class="form-control" id="AF_BC2" placeholder="AF/BC">
											</div>
											<div class="form-group">
												<label for="cmbubicacionprim2" class="control-label" id="cmbubicacionprim2Label" style="font-size: 11px;">Ubicación primaria</label>
												<select class="form-control" disabled id="cmbubicacionprim2"></select>
											</div>
											<div class="form-group">
												<label for="cmbubicacionsec2" class="control-label" id="cmbubicacionsec2Label" style="font-size: 11px;">Ubicación secundaria</label>
												<select class="form-control" disabled id="cmbubicacionsec2"></select>
											</div>
											<div class="form-group">
												<label for="especifica2" class="control-label" id="especifica2Label" style="font-size: 11px;">Ubicación Específica</label>
												<input type="text" disabled class="form-control" id="especifica2" placeholder="Ubicación Específica">
											</div>
										</div><!-- columna#1 -->
										<div class="col-md-4">
											<div class="form-group">
												<label for="Nombre2" class="control-label" id="Nombre2Label" style="font-size: 11px;">Nombre</label>
												<input type="text" class="form-control" disabled id="Nombre2" placeholder="Nombre">
											</div>
											<div class="form-group">
												<label for="cmbestatus2" class="control-label" id="cmbestatus2Label" style="font-size: 11px;">Estatus</label>
												<select class="form-control" disabled id="cmbestatus2"></select>
											</div>
											<div class="form-group">
												<label for="DescCorta2" class="control-label" id="DescCorta2Label" style="font-size: 11px;">Descripción corta</label>
												<textarea rows="1" disabled placeholder="Descripción Corta" id="DescCorta2" class="form-control"></textarea>
											</div>
										</div><!-- columna#2 -->
										<div class="col-md-4">
											<div class="form-group">
												<label for="documentos_adjuntos_FILE2" class="control-label" id="documentos_adjuntos_FILE2Label" style="font-size: 11px;">Imagen</label>
												<input id="documentos_adjuntos_FILE2" disabled name="imagenes[]" type="file" multiple="multiple" class="file-loading">
												<input type="hidden" id="Url_Foto_Activo2">
											</div>
										</div><!-- columna#3 -->
									</div><!-- columna-container -->
								</div><!-- row -->
								<div class="row">
									<div class="col-md-10 col-md-offset-1">
										<div class="col-md-8">
											<div class="form-group"></div>
										</div><!-- columna#1 -->
										<div class="col-md-4">
											<div class="form-group"></div>
											<div class="form-group"></div>
											<div class="form-group"></div>
										</div><!-- columna#2 -->
										<div class="col-md-4">
											<div class="form-group"></div>
										</div><!-- columna#3 -->
									</div><!-- columna-container -->
								</div><!-- row -->
							</div><!-- gray -->
							<div class="row">
								<div class="col-md-10 col-md-offset-1">
									<div class="col-md-12"> 
										<div class="form-group">
											<label for="UUID" class="control-label" id="UUIDLabel2" style="font-size: 11px;">Cadena SAT</label>
											<input type="text" class="form-control solotextoynumeros"  id="UUID2" placeholder="Escanear codigo de barras">
										</div>
									</div><!-- columna#4 -->
									<div class="col-md-12"> 
										<div class="form-group">
											<label for="UUID" class="control-label" id="UUIDLabel" style="font-size: 11px;">UUID/Folio fiscal (Max 36 caracteres)</label>
											<input type="text" class="form-control solotextoynumeros" maxlength="2000" id="UUID" placeholder="UUID/Folio fiscal (Max 36 caracteres)">
										</div>
									</div><!-- columna#4 -->
									<div class="col-md-6">
										<div class="form-group">
											<label for="NumOrdenCompra" class="control-label" style="font-size: 11px;">Folio Físcal</label>
											<input type="text" class="form-control solotextoynumeros" id="Folio_Fiscal" placeholder="Folio Físcal" maxlength="50">
										</div>
									</div><!-- columna#1 -->
									<div class="col-md-6">
										<div class="form-group">
											<span><font color="red">*</font></span><label class="control-label" style="font-size: 11px;">Monto Total de Factura (sin IVA)</label>
											<input type="text" class="form-control" id="Monto_Factura" placeholder="Monto Total de Factura (sin IVA)">
										</div>
									</div><!-- columna#1 -->
									<div class="col-md-4">
										<div class="form-group">
											<label for="NumOrdenCompra" class="control-label" id="NumOrdenCompraLabel" style="font-size: 11px;">Número de orden de compra</label>
											<input type="text" class="form-control solotextoynumeros" id="NumOrdenCompra" placeholder="No. orden de compra" maxlength="250">
										</div>
									</div><!-- columna#1 -->
									<div class="col-md-4">
										<div class="form-group">
											<label for="NumFactura" class="control-label" id="NumFacturaLabel" style="font-size: 11px;">Número de factura</label>
											<input type="text" class="form-control solotextoynumeros" id="NumFactura" placeholder="No. factura" maxlength="250">
										</div>
									</div><!-- columna#2 -->
									<div class="col-md-4">

									<div class="form-group">
										<span id="spanFechaFactura"><font color="red">*</font></span><label for="FechaFactura" class="control-label" id="FechaFacturaLabel" style="font-size: 11px;">Fecha de factura</label>
										<input type="text" class="form-control pull-right datepicker" id="FechaFactura" placeholder="Fecha de factura">
									</div>

									</div><!-- columna#2 -->
									<div class="col-md-12"></div>
									<div class="col-md-4">
										<span><font color="red">*</font></span><label  class="control-label" id="MontoFacturaLabel" style="font-size: 11px;">Monto del activo (sin IVA)</label>
										<div class="form-group">
											<input type="text" class="form-control" id="MontoFactura_s_iva" placeholder="Monto del activo (sin IVA)">
										</div>
									</div><!-- columna#5 -->
									<div class="col-md-4">
										<div class="form-group">
											<label for="NumContrato" class="control-label" id="NumContratoLabel" style="font-size: 11px;">No. Contrato</label>
											<input type="text" class="form-control solotextoynumeros" id="NumContrato" placeholder="No. Contrato" maxlength="250">
										</div>
									</div><!-- columna#6 -->
									<div class="col-md-4">
										<div class="form-group">
											<span><font color="red">*</font></span><label for="VidaUtilFabricante" class="control-label" id="VidaUtilFabricanteLabel" style="font-size: 11px;">Vida util proveedor</label>
											<input type="text" class="form-control" id="VidaUtilFabricante" placeholder="Vida util fabricante" onkeypress="return NumCheck(event, this)">
										</div>
									</div><!-- columna#7 -->
									<div class="col-md-4">
										<div class="form-group">
											<span><font color="red">*</font></span><label for="VidaUtilCHS" class="control-label" id="VidaUtilCHSLabel" style="font-size: 11px;">Vida util CHS</label>
											<input type="text" class="form-control" id="VidaUtilCHS" placeholder="Vida util CHS" onkeypress="return NumCheck(event, this)">
										</div>
									</div><!-- columna#5 -->
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label"  style="font-size: 11px;">Extensión de garantía</label>
											<input type="text" class="form-control solotextoynumeros" id="extension" placeholder="Extensión de garantía" maxlength="250">
										</div>
									</div><!-- columna#5 -->
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label"  style="font-size: 11px;">Garantía (meses)</label>
											<input type="text" class="form-control" id="garantia" placeholder="Garantía" maxlength="50">
										</div>
									</div><!-- columna#5 -->
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label"  style="font-size: 11px;">Fecha de Vencimiento</label>
											<input type="text" class="form-control pull-right datepicker" id="Fecha_Vencimiento" placeholder="Fecha de Vencimiento">
										</div>
									</div><!-- columna#5 -->
									<div class="col-md-4">
										<div class="form-group">
											<label for="polizagarantia" class="control-label" id="polizagarantiaLabel" style="font-size: 11px;">Póliza de garantía</label>
											<input type="file" class="form-control" id="polizagarantia" placeholder="Poliza garantía">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="Id_Proveedor" class="control-label" id="Id_ProveedorLabel" style="font-size: 11px;">No. Proveedor</label>
											<input type="text" class="form-control" id="Id_Proveedor" placeholder="No. Proveedor" maxlength="250">
										</div>
									</div><!-- columna#7 -->
									<div class="col-md-4">
										<div class="form-group">
											<font color="red">*</font></span><label for="NombreProveedor" class="control-label" id="NombreProveedorLabel" style="font-size: 11px;">Nombre Proveedor</label>
											<input type="text" class="form-control solotextoynumeros" id="NombreProveedor" placeholder="Nombre Proveedor" maxlength="250">
										</div>
									</div><!-- columna#6 -->
									<div class="col-md-4">
										<div class="form-group">
											<label for="Contacto" class="control-label" id="ContactoLabel" style="font-size: 11px;">Contacto</label>
											<input type="text" class="form-control solotextoynumeros" id="Contacto" placeholder="Contacto" maxlength="250">
										</div>
									</div><!-- columna#5 -->
									<div class="col-md-4">
										<div class="form-group">
											<label for="Telefono" class="control-label" id="TelefonoLabel" style="font-size: 11px;">Teléfono</label>
											<input type="text" class="form-control" id="Telefono" placeholder="Teléfono" maxlength="20">
										</div>
									</div><!-- columna#6 -->
									<div class="col-md-4">
										<div class="form-group">
											<label for="Correo" class="control-label" id="CorreoLabel" style="font-size: 11px;">Correo</label>
											<input type="text" class="form-control solotextoynumeros" id="Correo" placeholder="Correo" maxlength="250">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label  class="control-label" id="Nombre2Label" style="font-size: 11px;">Centro de costos</label>	
											<select class="form-control" id="centro_costos2">        </select>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label  class="control-label" id="no_capex2Label" style="font-size: 11px;">No. de CAPEX</label>	
											<input type="text" class="form-control" placeholder="No. de CAPEX" id="no_capex2">
										</div>
									</div>
									<!-- columna#7 -->
									<div class="col-md-12"></div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="DocRecibida" class="control-label" id="DocRecibidaLabel" style="font-size: 11px;">Documentación Recibida</label>
											<textarea rows="2" class="form-control solotextoynumeros" id="DocRecibida" placeholder="Documentación Recibida" maxlength="250"></textarea>
										</div>
									</div>
									<div class="col-md-4" style="display: none;">
										<div class="form-group">
											<label for="Accesorios" class="control-label" id="AccesoriosLabel" style="font-size: 11px;">Accesorios</label>
											<textarea rows="4" class="form-control solotextoynumeros" id="Accesorios" placeholder="Accesorios" maxlength="2500"></textarea>
										</div>
									</div>
									<div class="col-md-4" style="display: none;">
										<div class="form-group">
											<label for="Consumibles" class="control-label" id="ConsumiblesLabel" style="font-size: 11px;">Consumibles</label>
											<textarea rows="4" class="form-control solotextoynumeros" id="Consumibles" placeholder="Consumibles" maxlength="2500"></textarea>
										</div>
									</div>
									

									<!-- ==== Lista de Accesorios y Consumibles ==== -->
									<hr />
									<div  class="row areaTabsBasicos">
										<!-- Area que se carga dinamicamente desde activo-accesorio-consumible-admin -->
										<div id="activo-accesorio-consumible-admin" class="col-md-12"></div>
									</div>


									<hr />
									<div class="col-md-12">
										<div class="form-group">
										<label  class="control-label" style="font-size: 11px;"><span class='text-danger'>*</span> Link</label>
											<input type="text" id="manual1" class="form-control" placeholder="www.manual.com.mx">
											<a href="javascript:abrirMas()">Agregar más</a> / 
											<a href="" id="link1" target="_link1" style="display:none">Link</a>
										</div>
									</div>
									<div id="MasManuales" style="display:none">
										<div class="col-md-12">
											<div class="form-group">
												<label  class="control-label" style="font-size: 11px;">Link 2</label>
												<input type="text" id="manual2" class="form-control" placeholder="www.manual.com.mx">
												<a href="" id="link2" target="_link2" style="display:none">Link 2</a>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<label class="control-label" style="font-size: 11px;">Link 3</label>
												<input type="text" id="manual3" class="form-control" placeholder="www.manual.com.mx">
												<a href="" id="link3" target="_link3" style="display:none">Link 3</a>
											</div>
										</div>
									</div>
								</div>
							</div><!-- row -->

							<div class="row">
								<div class="col-md-10 col-md-offset-1">
									<div class="col-md-6">
										<div class="form-group" id="divProveedor_Adjuntar_Contrato">
											<!--	
											<label for="attach-1">1.-Adjuntar Contrato</label>
											<input id="documentos_adjuntos_contrato" name="imagenes[]" type="file" multiple="multiple" class="file-loading">
											<input type="hidden" id="url_contrato">
											-->	
										</div>
										<div id="divProveedor_Adjuntar_Contrato_lista"></div>
									</div>
									<div class="col-md-6">
										<div class="form-group" id="divOtro_Doc_Corto">
											<!--	
											<label for="attach-1">2.-Otro documento corto</label>
											<input id="documentos_adjuntos_corto" name="imagenes[]" type="file" multiple="multiple" class="file-loading">
											<input type="hidden" id="url_corto">
											-->
										</div>
										<div id="divOtro_Doc_Corto_lista"></div>
									</div>
								</div>
							</div><!-- row -->

							<div class="row">
								<div class="col-md-10 col-md-offset-1">
									<div class="col-md-6">
										<div class="form-group">
											<div class="form-group" id="divFactura_0">
												<!--
												<label for="attach-1">3.-Factura</label>
												<input id="documentos_adjuntos_factura0" name="imagenes[]" type="file" multiple="multiple" class="file-loading">
												<input type="hidden" id="url_factura0">
												-->
											</div>
											<div id="divFactura_0_lista"></div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<div class="form-group" id="divXml">
												<!--
												<label for="attach-1">4.-XML</label>
												<input id="documentos_adjuntos_xml" name="imagenes[]" type="file" multiple="multiple" class="file-loading">
												<input type="hidden" id="url_xml">
												-->
											</div>
											<div id="divXml_lista"></div>	
										</div>
									</div>
								</div>
							</div><!-- row -->
						</form>
					</div><!-- tab#2 -->


					<!-- ==== Contabilidad ==== -->
					<div role="tabpanel" class="tab-pane" id="contabilidad">
						<form>
							<div class="gray">
								<div class="row">
									<div class="col-md-10 col-md-offset-1">
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label" id="Nombre2Label" style="font-size: 11px;">AF/BC</label>
												<input type="text" class="form-control" placeholder="AF/BC" id="AF_BC3" disabled>
											</div>
											<div class="form-group">
												<label  class="control-label" id="Nombre2Label" style="font-size: 11px;">Ubicación primaria</label>
												<select class="form-control" id="cmbubicacionprim3" disabled></select>
											</div>
											<div class="form-group">
												<label  class="control-label" id="Nombre2Label" style="font-size: 11px;">Ubicación Secundaria</label>
												<select class="form-control" disabled id="cmbubicacionsec3"></select>
											</div>
											<div class="form-group">
												<label  class="control-label" id="Nombre2Label" style="font-size: 11px;">No. factura</label>
												<input type="text" class="form-control" placeholder="No. factura" id="NumFactura3" disabled>
											</div>
											<div class="form-group">
												<label  class="control-label" id="Nombre2Label" style="font-size: 11px;">Vida util fabricante</label>
												<input type="text" class="form-control" placeholder="Vida util fabricante" id="VidaUtilFabricante3" disabled>
											</div>
											<div class="form-group">
												<label  class="control-label" id="Nombre2Label" style="font-size: 11px;">Monto factura MXN (sin IVA)</label>
												<input type="text" class="form-control" placeholder="Monto factura MXN (sin IVA)" id="MontoFactura3" disabled>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label  class="control-label" id="Nombre2Label" style="font-size: 11px;">Nombre</label>
												<input type="text" class="form-control" placeholder="Nombre" id="Nombre3" disabled>
											</div>
											<div class="form-group">
												<label  class="control-label" id="Nombre2Label" style="font-size: 11px;">Estatus</label>
												<select class="form-control" disabled id="cmbestatus3"></select>
											</div>
											<div class="form-group">
												<label  class="control-label" id="Nombre2Label" style="font-size: 11px;">Descripción Corta</label>
												<textarea rows="1" placeholder="Descripción Corta" class="form-control" id="DescCorta3" disabled></textarea>
											</div>
											<div class="form-group">
												<label  class="control-label" id="Nombre2Label" style="font-size: 11px;">Fecha de factura</label>
												<input type="text" class="form-control" placeholder="Fecha de factura"  id="FechaFactura3" disabled>
											</div>
											<div class="form-group">
												<label  class="control-label" id="Nombre2Label" style="font-size: 11px;">Vida útil CHS</label>
												<input type="text" class="form-control" placeholder="Vida útil CHS" id="VidaUtilCHS3" disabled>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label  class="control-label" id="Nombre2Label" style="font-size: 11px;">Imagen</label>					  
												<input id="documentos_adjuntos_FILE3" disabled name="imagenes[]" type="file" multiple="multiple" class="file-loading">
												<input type="hidden" id="Url_Foto_Activo3">
											</div>
										</div>
									</div>
								</div><!-- row -->
							</div><!-- gray -->
							<input type="hidden" id="Id_Activo_Contabilidad">	
							<div class="row">
								<div class="col-md-10 col-md-offset-1">
									<div class="col-md-4">
										<div class="form-group">
											<label  class="control-label" id="Nombre2Label" style="font-size: 11px;">Centro de costos</label>	
											<select class="form-control" id="centro_costos"></select>
										</div>
										<div class="form-group">
											<span><font color="red">*</font></span><label  class="control-label" id="Nombre2Label" style="font-size: 11px;">Participa en depreciación</label>		
											<select class="form-control" id="cmbparticipaendepresiacion">
												<option value="-1">Participa en depreciación</option>
												<option value="1">Si</option>
												<option value="0">No</option>
											</select>
										</div>
									</div><!-- columna#1 -->
									<div class="col-md-4">
										<div class="form-group">
											<label  class="control-label" id="Nombre2Label" style="font-size: 11px;">Prorratear</label>
											<input type="text" class="form-control" placeholder="Prorratear" id="Prorratear">
										</div>
										<div class="form-group">
											<span id="spanparticipa"><font color="red">*</font></span> <label  class="control-label" id="Nombre2Label" style="font-size: 11px;">Fecha inicio depreciación</label>
											<input type="text" class="form-control pull-right datepicker" id="fecha_inicio_depr" placeholder="Fecha inicio depreciación">
										</div>
									</div><!-- columna#2 -->
									<div class="col-md-4">
										<div class="form-group">
											<!--<span><font color="red">*</font></span>--><label  class="control-label" id="Nombre2Label" style="font-size: 11px;">No. de CAPEX</label>
											<input type="text" class="form-control" placeholder="No. de CAPEX" id="no_capex">
										</div>
									</div><!-- columna#3 -->
								</div>
							</div>
							<div class="row">
								<div class="col-md-10 col-md-offset-1">
									<div class="col-md-6">
										<div class="form-group">
											<div class="form-group" id="divContabilidad_Adjuntar_Factura">
												<!--	
												<label for="attach-3">Factura</label>
												<input id="documentos_adjuntos_factura" name="imagenes[]" type="file" multiple="multiple" class="file-loading">
												<input type="hidden" id="url_factura">
												-->	
											</div>
											<div id="divContabilidad_Adjuntar_Factura_lista"></div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<div class="form-group" id="divContabilidad_Adjuntar_Xml">
												<!--	
												<label for="attach-4">XML</label>
												<input id="xml_contabilidad" name="imagenes[]" type="file" multiple="multiple" class="file-loading">
												<input type="hidden" id="url_xml_contabilidad">
												-->	
											</div>
											<div id="divContabilidad_Adjuntar_Xml_lista"></div>
										</div>
									</div>
								</div>
							</div><!-- row -->
							<!-- tabs inside tabs -->
							<div class="row" id="divContabilidad_Formulas">
								<div class="col-md-10 col-md-offset-1">
									<!-- Nav tabs -->
									<ul class="nav nav-tabs azul nested" role="tablist">
										<li role="presentation" class="active"><a href="#contable" aria-controls="contable" role="tab" data-toggle="tab">Contable</a></li>
										<!--<li role="presentation" class=""><a href="#contableMixto" aria-controls="contableMixto" role="tab" data-toggle="tab">Contable Decreciente</a></li>-->
										<li role="presentation"><a href="#fiscal" aria-controls="fiscal" role="tab" data-toggle="tab">Fiscal</a></li>
										<li role="presentation"><a href="#fiscald4" aria-controls="fiscald4" role="tab" data-toggle="tab">Fiscal D4</a></li>
										<li role="presentation"><a href="#b10" aria-controls="b10" role="tab" data-toggle="tab">B10</a></li>
									</ul>
									<!-- contable -->
									<div class="tab-content">
										<div role="tabpanel" class="active tab-pane" id="contable">
											<div class="col-md-4">
												<div class="form-group">
													<select class="form-control" id="cmbdepreciacion">
														<option value="1">Contable - Linea recta</option>
													</select>
												</div>
											</div>
											<div class="col-md-3">
												<div class="input-group">
													<input type="text" class="form-control" placeholder="Dep periodo" id="MontoDepPeriodo">
													<span class="input-group-btn">
														<a href="#" id="popupContable"><button type="button" class="btn btn-default"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
													</span>
												</div>
											</div>
											<div class="col-md-3">
												<div class="input-group">
													<input type="text" class="form-control" placeholder="Dep acumulada" id="DepreciacionAcumulada">
													<span class="input-group-btn">
														<a href="#" id="popupReporteContable"><button type="button" class="btn btn-default"><i class="fa fa-calendar" aria-hidden="true"></i></button></a>
													</span>
												</div>
											</div>
											<div class="col-md-2">
												<div class="form-group has-error"><input type="text" class="form-control" placeholder="%25"></div>
											</div>
										</div>
										<!-- contable Mixto -->
										<div role="tabpanel" class="tab-pane" id="contableMixto">
											<div class="col-md-4">
												<div class="form-group">
													<select class="form-control">
														<option value="2">Contable - Decreciente</option>
													</select>
												</div>
											</div>
											<div class="col-md-3">
												<div class="input-group">
													<input type="text" class="form-control" placeholder="Dep periodo" id="MontoDepPeriodoMixta">
													<span class="input-group-btn">
														<a href="#" id="popupContableMixta"><button type="button" class="btn btn-default"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
													</span>
												</div>
											</div>
											<div class="col-md-3">
												<div class="input-group">
												<input type="text" class="form-control" placeholder="Dep acumulada" id="DepreciacionAcumuladaMixta">
													<span class="input-group-btn">
														<a href="#" id="popupReporteContableMixta"><button type="button" class="btn btn-default"><i class="fa fa-calendar" aria-hidden="true"></i></button></a>
													</span>
												</div>
											</div>
											<div class="col-md-2">
												<div class="form-group has-error"><input type="text" class="form-control" placeholder="%25"></div>
											</div>
										</div>
										<!-- fiscal -->
										<div role="tabpanel" class="tab-pane" id="fiscal">
											<div class="col-md-4">
												<div class="form-group">
													<select class="form-control"><option value="1">Fórmula</option></select>
												</div>
											</div>
											<div class="col-md-3">
												<div class="input-group">
													<input type="text" class="form-control" placeholder="Depreciación del periodo" id="MontoDepPeriodoFiscal">
													<span class="input-group-btn">
														<a href="#" id="popupFiscal"><button type="button" class="btn btn-default"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
													</span>
												</div>
											</div>
											<div class="col-md-3">
												<div class="input-group">
													<input type="text" class="form-control" placeholder="Depreciación fiscal" id="DepreciacionFiscal">
													<span class="input-group-btn">
														<a href="#" id="popupReporteFiscal"><button type="button" class="btn btn-default"><i class="fa fa-calendar" aria-hidden="true"></i></button></a>
													</span>
												</div>
											</div>
											<div class="col-md-2">
												<div class="form-group has-error"><input type="text" class="form-control" placeholder="%25"></div>
											</div>
										</div>
										<!-- fiscald4 -->
										<div role="tabpanel" class="tab-pane" id="fiscald4">
											<div class="col-md-4">
												<div class="form-group">
													<select class="form-control"><option>Fórmula</option></select>
												</div>
											</div>
											<div class="col-md-3">
												<div class="input-group">
													<input type="text" class="form-control" placeholder="Depreciación del periodo" id="MontoDepPeriodoFiscalD4">
													<span class="input-group-btn">
														<a href="#" id="popupFiscalD4"><button type="button" class="btn btn-default"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
													</span>
												</div>
											</div>
											<div class="col-md-3">
												<div class="input-group">
													<input type="text" class="form-control" placeholder="Depreciación fiscal" id="DepreciacionFiscalD4">
													<span class="input-group-btn">
														<a href="#" id="popupReporteFiscalD4"><button type="button" class="btn btn-default"><i class="fa fa-calendar" aria-hidden="true"></i></button></a>
													</span>
												</div>
											</div>
											<div class="col-md-2">
												<div class="form-group has-error"><input type="text" class="form-control" placeholder="%25"></div>
											</div>
										</div>
										<!-- b10 -->
										<div role="tabpanel" class="tab-pane" id="b10">
											<div class="col-md-4">
												<div class="form-group">
													<select class="form-control"><option>Fórmula</option></select>
												</div>
											</div>
											<div class="col-md-3">
												<div class="input-group">
													<input type="text" class="form-control" id="MontoDepPeriodoFiscalB10" placeholder="Dep periodo">
													<span class="input-group-btn">
														<button type="button" class="btn btn-default"><a href="#" id="popupFiscalB10"><i class="fa fa-eye" aria-hidden="true"></i></a></button>
													</span>
												</div>
											</div>
											<div class="col-md-3">
												<div class="input-group">
												<input type="text" class="form-control" id="DepreciacionFiscalB10" placeholder="Dep acumulada">
													<span class="input-group-btn">
														<button type="button" class="btn btn-default"><a href="#" id="popupReporteFiscalB10"><i class="fa fa-calendar" aria-hidden="true"></i></a></button>
													</span>
												</div>
											</div>
											<div class="col-md-2">
												<div class="form-group has-error"><input type="text" class="form-control" placeholder="%25"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div><!-- tab#3 -->
				</div>
			</div><!-- modal-body -->


			<!-- ==== Footer ==== -->
			<div class="modal-footer">
				<!--<a href="formato-alta.html" class="btn chs" role="button" target="_blank">Formato</a>-->
				<button type="button" class="btn chs" id="guardar">Siguiente</button>
				<button type="button" class="btn chs" id="guardar2" style="display:none">Guardar datos proveedor</button>
				<button type="button" class="btn chs" onclick="validaMantenimiento();" id="linkMantenimiento" style="display:none">
					<!-- Ajuste JGR 28/06/2018 -->
					Generar actividades de Mantenimiento
				</button>
				<button type="button" class="btn chs" id="guardar3" style="display:none">Guardar datos contabilidad</button>
			</div>
		</div>
	</div>
</div>
<!-- ==== Fin Page: Include_alta_activo ==== -->