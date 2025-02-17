<!-- ==== Page: Include_baja_activo ==== -->
<div class="modal fade modalchs" id="bajaEquipo" data-backdrop="false">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<!-- ==== Titulo de la Ventana Modal ==== -->
			<div class="modal-header verde">
				<button type="button" class="close" aria-label="Close" onclick="confirmacion_cerrar('bajaEquipo')"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><i class="fa fa-arrow-circle-o-down" aria-hidden="true"></i> Baja Equipo </h4>
			</div>
			
			<!-- ==== Cuerpo de la Ventana Modal ==== -->
			<div class="modal-body nopsides">
				<!-- ==== Botones de selección de Tabs ==== -->
				<ul class="nav nav-tabs verde" role="tablist">
					<li role="presentation" class="active"><a href="#datosBaja" aria-controls="datosBaja" role="tab" data-toggle="tab">Datos Baja</a></li>
					<li role="presentation"><a href="#seguimiento" id="tabSeguimiento" aria-controls="seguimiento" role="tab" data-toggle="tab">Seguimiento</a></li>
				</ul>

				<!-- ==== Tab panes ==== -->
				<div class="tab-content">
					<!-- ==== Ficha con los datos de la Baja ==== -->
					<div role="tabpanel" class="active tab-pane" id="datosBaja">
						<form>
							<div class="gray">
								<div class="row">
									<div class="col-md-10 col-md-offset-1">
										<div class="row">
											<div class="col-md-4">
												<input type="hidden" id="Id_baja_activo" />
												<input type="hidden" id="Id_Activo_Baja_Form" />

												<div class="form-group">
													<div id="muestro_select">
														<span><font color="red">*</font></span>
														<label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">AF/BC</label>
														<select id="AF_BC_baja" class="demo-default" placeholder="AF/BC" style="display:none;" onchange="actualizarRutaCarpetaArchivos();"></select>
													</div>
													<div id="gifcargando1" style="display:none" align="center">
														<img src="../dist/img/cargando-loading.gif" style="max-width: 25px; max-height: 25px" alt="cargando-loading-037.gif">
													</div>
												</div>
												<div class="form-group">
													<label for="Serie_baja" class="control-label" id="Serie_bajaLabel" style="font-size: 11px;">Serie</label>
													<input type="text" id="Serie_baja" disabled class="form-control" placeholder="Serie" disabled>
												</div>
												<div class="form-group">
													<label for="cmbestatus_baja" class="control-label" id="cmbestatus_bajaLabel" style="font-size: 11px;">Estatus</label>
													<select class="form-control" id="cmbestatus_baja" disabled></select>
												</div>
												<div class="form-group">
													<label for="cmbubicacionprimaria_baja" class="control-label" id="cmbubicacionprimaria_bajaLabel" style="font-size: 11px;">Ubicación primaria</label>
													<select class="form-control" id="cmbubicacionprimaria_baja" disabled></select>
												</div>
											</div><!-- columna#1 -->
											<div class="col-md-4">
												<div class="form-group">
													<label for="marca_baja" class="control-label" id="marca_bajaLabel" style="font-size: 11px;">Marca</label>
													<input type="text" class="form-control" id="marca_baja" placeholder="Marca" disabled>
												</div>
												<div class="form-group">
													<label for="Modelo" class="control-label" id="ModeloLabel" style="font-size: 11px;">Modelo</label>
													<input type="text" class="form-control" id="modelo_baja" placeholder="Modelo" disabled>
												</div>
												<div class="form-group">
													<label for="cmbarea_baja" class="control-label" id="cmbarea_bajaLabel" style="font-size: 11px;">Área</label>
													<select class="form-control" id="cmbarea_baja" disabled></select>
												</div>
												<div class="form-group">
													<label for="cmbubicacionsecundaria_baja" class="control-label" id="cmbubicacionsecundaria_bajaLabel" style="font-size: 11px;">Ubicación secundaria</label>
													<select class="form-control" id="cmbubicacionsecundaria_baja" disabled></select>
												</div>
											</div><!-- columna#2 -->
											<div class="col-md-4">
												<div class="form-group">
													<label for="desccorta_baja" class="control-label" id="desccorta_bajaLabel" style="font-size: 11px;">Descripción Corta</label>
													<textarea rows="4" class="form-control" id="desccorta_baja" placeholder="Descripción Corta" disabled style="height: 7.05em;"></textarea>
												</div>
												<div class="form-group">
													<label for="cmbjefearea_baja" class="control-label" id="cmbjefearea_bajaLabel" style="font-size: 11px;">Gerencia/Jefatura que Autoriza</label>
													<input type="text" class="form-control" id="jefearea_baja" disabled>
												</div>
												<div class="form-group">
													<div id="muestro_select_usuario_baja">
														<span><font color="red">*</font></span>
														<label class="control-label" id="cmbareasLabel" style="font-size: 11px;">Usuario Solicitante Baja</label>
														<select id="Usuario_soli_baja" class="demo-default" placeholder="Usuario Baja" style="display:none"></select>
													</div>
													<div id="gif_usuario_baja" style="display:none" align="center">
														<img src="../dist/img/cargando-loading.gif" style="max-width: 25px; max-height: 25px" alt="cargando-loading-037.gif">
													</div>
												</div>
											</div><!-- columna#2 -->
										</div>
									</div>
								</div>
							</div>

							<!-- ==== Datos especificos de la baja ==== -->
							<div class="row">
								<div class="col-md-10 col-md-offset-1">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="Motivo_Baja" class="control-label" id="Motivo_BajaLabel" style="font-size: 11px;">Motivo baja</label>
												<!--<input type="text" class="form-control" id="Motivo_Baja" placeholder="Motivo baja">-->
												<select class="form-control" id="cmbbajas"></select>
											</div>
											<div class="form-group">
												<label for="Fecha_baja" class="control-label" id="Fecha_bajaLabel" style="font-size: 11px;">Fecha de baja</label>
												<input type="text" class="form-control datepicker" id="Fecha_baja" placeholder="Fecha de baja">
											</div>
											<div class="form-group">
												<label for="Fecha_baja" class="control-label" id="Fecha_bajaLabel" style="font-size: 11px;">Cuenta contable baja</label>
												<!--<input type="text" class="form-control" id="Cuenta_baja">-->
												<select class="form-control" id="Cuenta_baja" style="display:block">
													<option value="1">Venta</option>
													<option value="2">Otro</option>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="Destinofinal_baja" class="control-label" id="Destinofinal_bajaLabel" style="font-size: 11px;">Destino Final</label>
												<!--<input type="text" class="form-control" id="Destinofinal_baja" placeholder="Destino Final">-->
												<select class="form-control" id="cmbdestinofinal"></select>
											</div>
											<div class="form-group">
												<label for="Comentarios_baja" class="control-label" id="Comentarios_bajaLabel" style="font-size: 11px;">Comentarios</label>
												<textarea rows="8" class="form-control" id="Comentarios_baja" placeholder="Comentarios" style="height: 7.1em;"></textarea>
											</div>
										</div>
									</div>
								</div>
							</div>

							<!-- ==== Area de archivos a adjuntar ==== -->
							<div class="row">
								<div class="col-md-10 col-md-offset-1">
									<div class="row">
										<div id="ArchivosBajaArea" class="col-md-12">
											<div>
												<div class="text-justify">
													<label for="ArchivosBajaAreaLabel" class="control-label" style="font-size: 11px;">Adjuntar máximo 5 archivos por bloque (10 Mb máximo)</label>
													<a href="#!" class="text-danger" title="Tutorial para agregar / quitar documentos" style="float: right;" onclick="mostrarVideoAyuda('video/mp4', '../videos/Biomedica_Fase_2/Funcionalidad/1.mp4', '<i class=\'fa fa-info-circle \'></i>&nbsp;Tutorial para agregar / quitar documentos');"><i class="fa fa-info-circle"></i> <b>Ayuda</b></a>
												</div>
												<input id="ArchivosBajaAreaInputFile" name="imagenes[]" type="file" multiple="multiple" class="file-loading" />
												<input type="hidden" name="ArchivosBajaAreaInputHidden" id="ArchivosBajaAreaInputHidden" />
											</div>
											<hr />
											<div id="ArchivosBajaAreaLista"></div>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>

					<!-- ==== Pasos de seguimiento  ==== -->
					<div role="tabpanel" class="tab-pane" id="seguimiento">
						<form>
							<div class="gray" style="display:none">
								<div class="row">
									<div class="col-md-10 col-md-offset-1">
										<div class="col-md-4">
											<div class="form-group">
												<input type="text" class="form-control" placeholder="AF/BC">
											</div>
											<div class="form-group">
												<input type="text" class="form-control" placeholder="Serie">
											</div>
											<div class="form-group">
												<select class="form-control">
													<option>Status</option>
												</select>
											</div>
											<div class="form-group">
												<select class="form-control">
													<option>Ubicación primaria</option>
												</select>
											</div>
										</div><!-- columna#1 -->
										<div class="col-md-4">
											<div class="form-group">
												<input type="text" class="form-control" placeholder="Marca">
											</div>
											<div class="form-group">
												<input type="text" class="form-control" placeholder="Modelo">
											</div>
											<div class="form-group">
												<select class="form-control">
													<option>Área</option>
												</select>
											</div>
											<div class="form-group">
												<select class="form-control">
													<option>Ubicación secundaria</option>
												</select>
											</div>
										</div><!-- columna#2 -->
										<div class="col-md-4">
											<div class="form-group">
												<textarea rows="5" class="form-control" placeholder="Descripción Corta (150 Caracteres)"></textarea>
											</div>
											<div class="form-group">
												<input type="text" class="form-control">
											</div>
										</div><!-- columna#2 -->
									</div>
								</div>
							</div>
							<ul class="steps">
								<li class="verde"><span></span> Baja aceptada</li>
								<li class="amarillo"><span></span> En proceso de baja</li>
								<li class="rojo"><span></span> Baja no aceptada</li>
							</ul>
							<div class="process">
								<div class="process-row nav nav-tabs">
									<div class="process-step">
										<button id="Paso1" type="button" class="btn btn-info btn-circle amarillo"><i class="fa fa-user fa-3x"></i></button>
										<p><small>Usuario <br />Solicitante Baja</small></p>
										<p><small><span id="Paso1Fecha" style="display:none"><b>Fecha:</b> </span></small></p>
										<p><small><span id="Paso1Link" style="display:none"></span></small></p>
										<p><small><span id="Paso1Com" style="display:none"></span></small></p>
									</div>
									<div class="process-step">
										<button id="Paso2" type="button" class="btn btn-default btn-circle amarillo"><i class="fa fa-user fa-3x"></i></button>
										<p><small>Usuario Responsable</small></p>
										<p><small><span id="Paso2Fecha" style="display:none"><b>Fecha:</b> </span></small></p>
										<p><small><span id="Paso2Link" style="display:none"></span></small></p>
										<p><small><span id="Paso2Com" style="display:none"></span></small></p>
									</div>
									<div class="process-step">
										<button id="Paso3" type="button" class="btn btn-default btn-circle amarillo"><i class="fa fa-user fa-3x"></i></button>
										<p><small>Titular del Área<br/>Gestora</small></p>
										<p><small><span id="Paso3Fecha" style="display:none"><b>Fecha:</b> </span></small></p>
										<p><small><span id="Paso3Link" style="display:none"></span></small></p>
										<p><small><span id="Paso3Com" style="display:none"></span></small></p>
									</div>
									<div class="process-step">
										<button id="Paso4" type="button" class="btn btn-default btn-circle amarillo"><i class="fa fa-user fa-3x"></i></button>
										<p><small>Dirección <br />Financiera</small></p>
										<p><small><span id="Paso4Fecha" style="display:none"><b>Fecha:</b> </span></small></p>
										<p><small><span id="Paso4Link" style="display:none"></span></small></p>
										<p><small><span id="Paso4Com" style="display:none"></span></small></p>
									</div>
									<div class="process-step">
										<button id="Paso5" type="button" class="btn btn-default btn-circle amarillo"><i class="fa fa-user fa-3x"></i></button>
										<p><small>Contabilidad</small></p>
										<p><small><span id="Paso5Fecha" style="display:none"><b>Fecha:</b> </span></small></p>
										<p><small><span id="Paso5Link" style="display:none"></span></small></p>
										<p><small><span id="Paso5Com" style="display:none"></span></small></p>
									</div>
									<!-- <div class="process-step">
										<button id="Paso6" type="button" class="btn btn-default btn-circle amarillo"><i class="fa fa-user fa-3x"></i></button>
										<p><small>Seguridad</small></p>
										<p><small><span id="Paso6Fecha" style="display:none"><b>Fecha:</b> </span></small></p>
										<p><small><span id="Paso6Link" style="display:none"></span></small></p>
										<p><small><span id="Paso6Com" style="display:none"></span></small></p>
									</div>-->
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>

			<!-- ==== Footer ==== -->
			<div class="modal-footer">
				<a href="formato-baja.html" class="btn chs" role="button" target="_blank" style="display:none">Formato</a>
				<button type="button" class="btn chs" id="generarbaja">Generar Baja</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	// Función para obtener la lista de elementos obtenidos previamente
	function obtenerListaArchivosBaja() {
		var parametrosJson = { accion: "consultar", Id_Activo: $("#Id_Activo_Baja_Form").val() };
		$.ajax({
			type: "POST",
			url: "../Controladores/activos/siga_baja_activo/Siga_baja_activo_archivosController.Class.php",
			async: false,
			data: parametrosJson,
			error: function (jqXHR) {
				// Ha ocurrido un error
				mensajesalerta("Oh No!", jqXHR.responseText, "error", "dark");
			},
			success: function (data) {
				// Recupera la respuesta
				var respuesta = JSON.parse($.trim(data));
				var listaElementos = new Array();
				for(var i = 0; i < respuesta.length; i++) {
					var Ruta_Archivo = "../Archivos/Archivos-Activos-Bajas";
					listaElementos.push('<li><span class="span-img-borrar" data-id="' + respuesta[i].Id_Adjunto + '" onclick="mostrarAlertConfirm(() => eliminar_archivo_baja(this));" title="Eliminar archivo"><i class="fa fa-trash" aria-hidden="true"></i></span>&nbsp;|&nbsp;' + obtenerIconoArchivo(respuesta[i].Url_Adjunto) + '&nbsp;<a rel="author" href="'+ Ruta_Archivo + "/" + $("#Id_Activo_Baja_Form").val() + "/" + respuesta[i].Url_Adjunto + '" target="_blank"><span class="fa fa-pdf"></span>' + (i + 1) + '.- ' + respuesta[i].Url_Adjunto + '</a></li>');
				}
				// Muestra el mensaje correspondiente
				if(listaElementos.length > 0) {
					$("#ArchivosBajaAreaLista").html("<ul class='lista_divFoto_lista lista_div_2_cols'>" + listaElementos.join("") + "</ul>");
				}
				else {
					$("#ArchivosBajaAreaLista").html("<h4 class='text-center'>Por el momento no existen elementos adjuntos para mostrar</h4>");
				}
			}
		});
	}


	// Función que guarda la relación entre el archivo y el activo dado de baja
	function guardarAdjuntoBaja() {
		var parametrosJson = { accion: "agregar", Id_Activo: $("#Id_Activo_Baja_Form").val(), Id_Usuario: $("#usuariosesion").val(), Url_Adjunto: $("#ArchivosBajaAreaInputHidden").val() };
		$.ajax({
			type: "POST",
			url: "../Controladores/activos/siga_baja_activo/Siga_baja_activo_archivosController.Class.php",
			async: false,
			data: parametrosJson,
			error: function (jqXHR) {
				// Ha ocurrido un error
				mensajesalerta("Oh No!", jqXHR.responseText, "error", "dark");
			},
			success: function (data) {
				// Recupera la respuesta
				var respuesta = JSON.parse($.trim(data));
				// Muestra el mensaje correspondiente
				mensajesalerta((respuesta.intResultado > 0 ? "&Eacute;xito" : "Oh No!"), respuesta.strMensaje, (respuesta.intResultado > 0 ? "success" : "error"), "dark");
				// Actualiza la lista de elementos agregados
				obtenerListaArchivosBaja();
			}
		});
	}


	// Función para eliminar un archivo adjunto a la baja
	function eliminar_archivo_baja(elemento) {
		var parametrosJson = { accion: "eliminar", Id_Adjunto: $(elemento).data("id"), Id_Usuario: $("#usuariosesion").val() };
		$.ajax({
			type: "POST",
			url: "../Controladores/activos/siga_baja_activo/Siga_baja_activo_archivosController.Class.php",
			async: false,
			data: parametrosJson,
			error: function (jqXHR) {
				// Ha ocurrido un error
				mensajesalerta("Oh No!", jqXHR.responseText, "error", "dark");
			},
			success: function (data) {
				// Recupera la respuesta
				var respuesta = JSON.parse($.trim(data));
				if(respuesta.intResultado > 0) {
					// El archivo se ha eliminado correctamente
					mensajesalerta("&Eacute;xito", respuesta.strMensaje, "success", "dark");
					// Actualiza la lista de elementos agregados
					obtenerListaArchivosBaja();
				}
				else {
					// Ha ocurrido un error
					mensajesalerta("Oh No!", respuesta.strMensaje, "error", "dark");
				}
			}
		});
	}

	
	// Actualiza la ruta de la carpeta de los archivos adjuntos
	// Normalmente aplicará cuando sea una baja nueva y no se tenga el Identificador del Activo a la que estarán ligados los archivos
	function actualizarRutaCarpetaArchivos() {
		var carpetaAlmacenamiento = carpetaRaizArchivosLigados + "\/" + $("#Id_Activo_Baja_Form").val();
		$('#' + objetoInputNombre).fileinput('refresh', {
			uploadUrl: "../Archivos/upload.php?modoNombradoArchivo=nombreoriginal&carpeta=" + carpetaAlmacenamiento
		})
	}
</script>
<!-- ==== Fin Page: Include_baja_activo ==== -->