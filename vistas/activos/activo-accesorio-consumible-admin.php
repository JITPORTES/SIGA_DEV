<!-- ==== Page: activo-accesorio-consumible-lista ==== -->
	<?php
		$Id_Activo = $_POST["Id_Activo"];
	?>
	<div class="col-md-12">
		<ul class="nav nav-tabs">
			<li class="active" title="Click para administrar los accesorios ligados al Activo"><a data-toggle="tab" href="#accesorioTab"><i class="fa fa-briefcase"></i>&nbsp;Accesorios</a></li>
			<li title="Click para administrar los consumibles ligados al Activo"><a data-toggle="tab" href="#consumibleTab"><i class="fa fa-cart-plus"></i>&nbsp;Consumibles</a></li>
		</ul>
		<div class="tab-content">
			<!-- ==== Mantenimientos del mes ==== -->
				<div id="accesorioTab" class="tab-pane active">
					<div id="accesorioTabContenedor">
						<?php
							$contador = 0;
							if(count($respuestaConsulta) > 0) {
								if($respuestaConsulta[$contador]->Tipo == 1) {
									while($contador < count($respuestaConsulta)) {
										?><div class="linea-campos-clon">
											<div class="row forma-inline-fixed">
												<input type="text" name="accesorioConsumibleId" readonly="readonly" value="<?php echo($respuestaConsulta[$contador]->Id_Accesorio_Consumible); ?>" style="width: 100%; display: none;" />
												<div class="col-md-2 form-group">
													<font color="red">*</font><label class="control-label">SKU / REF / CAT</label>
													<input type="text" class="form-control campo-formulario" name="accesorioConsumibleSKU" placeholder="SKU" value="<?php echo($respuestaConsulta[$contador]->Sku); ?>" />
												</div>
												<div class="col-md-4 form-group">
													<font color="red">*</font><label class="control-label">Descripción</label>
													<textarea class="form-control campo-formulario" name="accesorioConsumibleDescripcion" rows="1" placeholder="Descripción"><?php echo($respuestaConsulta[$contador]->Descripcion); ?></textarea>
												</div>
												<div class="col-md-2 form-group">
													<font color="red">*</font><label class="control-label">Marca</label>
													<input type="text" class="form-control campo-formulario" name="accesorioConsumibleMarca" placeholder="Marca" value="<?php echo($respuestaConsulta[$contador]->Marca); ?>" />
												</div>
												<div class="col-md-2 form-group">
													<font color="red">*</font><label class="control-label">Modelo</label>
													<input type="text" class="form-control campo-formulario" name="accesorioConsumibleModelo" placeholder="Modelo" value="<?php echo($respuestaConsulta[$contador]->Modelo); ?>" />
												</div>
												<div class="col-md-2 form-group text-center">
													<label class="control-label" style="font-size: 0.9em; display: block;">&nbsp;</label>
													<button type="button" class="btn btn-danger btn-eliminar-accesorio-consumible" data-area-linea-campos="accesorioTabContenedor" data-id-activo="<?php echo($Id_Activo); ?>" data-id-accesorio-consumible="<?php echo($respuestaConsulta[$contador]->Id_Accesorio_Consumible); ?>" onclick="mostrarAlertConfirm(() => eliminarAccesorioConsumibleElemento(this), 'Está seguro que desea eliminar este <b>accesorio</b> ligado al Activo?');"><i class="fa fa-trash"></i> Eliminar</button>
												</div>
											</div>
										</div><?php
										// Siguiente elemento
										$contador++;
										// Analiza el nuevo elemento para saber si sigue siendo del mismo tipo
										if($contador < count($respuestaConsulta)) {
											// Sale de la iteración cuando cambie de Tipo de elemento
											if($respuestaConsulta[$contador]->Tipo != 1) { break; }
										}
									}
								}
								else {
									?><h4 class="text-center"><i class="fa fa-briefcase"></i> Por el momento no existen accesorios agregados</h4><?php
								}
							}
							else {
								?><h4 class="text-center"><i class="fa fa-briefcase"></i> Por el momento no existen accesorios agregados</h4><?php
							}
						?>
					</div>
					<div class="text-center area-btn-fixed">
						<button type="button" class="btn chs" data-tipo="1" data-area-linea-campos="accesorioTabContenedor" onclick="agregarAccesorioConsumibleElemento(this);">[ + ] Agregar</button>
					</div>
				</div>
			<!-- ==== Mantenimienrtos pendientes ==== -->
				<div id="consumibleTab" class="tab-pane">
					<div id="consumibleTabContenedor">
						<?php
							if($contador < count($respuestaConsulta)) {
								if($respuestaConsulta[$contador]->Tipo == 2) {
									while($contador < count($respuestaConsulta)) {
										?><div class="linea-campos-clon">
											<div class="row forma-inline-fixed">
												<input type="text" name="accesorioConsumibleId" readonly="readonly" value="<?php echo($respuestaConsulta[$contador]->Id_Accesorio_Consumible); ?>" style="width: 100%; display: none;" />
												<div class="col-md-2 form-group">
													<font color="red">*</font><label class="control-label">SKU / REF / CAT</label>
													<input type="text" class="form-control campo-formulario" name="accesorioConsumibleSKU" placeholder="SKU" value="<?php echo($respuestaConsulta[$contador]->Sku); ?>" />
												</div>
												<div class="col-md-4 form-group">
													<font color="red">*</font><label class="control-label">Descripción</label>
													<textarea class="form-control campo-formulario" name="accesorioConsumibleDescripcion" rows="1" placeholder="Descripción"><?php echo($respuestaConsulta[$contador]->Descripcion); ?></textarea>
												</div>
												<div class="col-md-2 form-group">
													<font color="red">*</font><label class="control-label">Marca</label>
													<input type="text" class="form-control campo-formulario" name="accesorioConsumibleMarca" placeholder="Marca" value="<?php echo($respuestaConsulta[$contador]->Marca); ?>" />
												</div>
												<div class="col-md-2 form-group">
													<font color="red">*</font><label class="control-label">Modelo</label>
													<input type="text" class="form-control campo-formulario" name="accesorioConsumibleModelo" placeholder="Modelo" value="<?php echo($respuestaConsulta[$contador]->Modelo); ?>" />
												</div>
												<div class="col-md-2 form-group text-center">
													<label class="control-label" style="font-size: 0.9em; display: block;">&nbsp;</label>
													<button type="button" class="btn btn-danger btn-eliminar-accesorio-consumible" data-area-linea-campos="consumibleTabContenedor" data-id-activo="<?php echo($Id_Activo); ?>" data-id-accesorio-consumible="<?php echo($respuestaConsulta[$contador]->Id_Accesorio_Consumible); ?>" onclick="mostrarAlertConfirm(() => eliminarAccesorioConsumibleElemento(this), 'Está seguro que desea eliminar este <b>consumible</b> ligado al Activo?');"><i class="fa fa-trash"></i> Eliminar</button>
												</div>
											</div>
										</div><?php
										// Siguiente elemento
										$contador++;
									}
								}
								else {
									?><h4 class="text-center"><i class="fa fa-briefcase"></i> Por el momento no existen consumibles agregados</h4><?php
								}
							}
							else {
								?><h4 class="text-center"><i class="fa fa-cart-plus"></i> Por el momento no existen consumibles agregados</h4><?php
							}
						?>
					</div>
					<div class="text-center area-btn-fixed">
						<button type="button" class="btn chs" data-tipo="2" data-area-linea-campos="consumibleTabContenedor" onclick="agregarAccesorioConsumibleElemento(this);">[ + ] Agregar</button>
					</div>
				</div>
			<!-- ==== Forma común para agregar un accesorio/consumible ==== -->
				<div id="accesorioConsumibleFormaVacia" style="display: none;">
					<div class="row forma-inline-fixed">
						<input type="text" name="accesorioConsumibleId" value="0" readonly="readonly" style="width: 100%; display: none;" />
						<div class="col-md-2 form-group">
							<font color="red">*</font><label class="control-label">SKU / REF / CAT</label>
							<input type="text" class="form-control campo-formulario" name="accesorioConsumibleSKU" placeholder="SKU" disabled="disabled" />
						</div>
						<div class="col-md-4 form-group">
							<font color="red">*</font><label class="control-label">Descripción</label>
							<textarea class="form-control campo-formulario" name="accesorioConsumibleDescripcion" rows="1" placeholder="Descripción" disabled="disabled"></textarea>
						</div>
						<div class="col-md-2 form-group">
							<font color="red">*</font><label class="control-label">Marca</label>
							<input type="text" class="form-control campo-formulario" name="accesorioConsumibleMarca" placeholder="Marca" disabled="disabled" />
						</div>
						<div class="col-md-2 form-group">
							<font color="red">*</font><label class="control-label">Modelo</label>
							<input type="text" class="form-control campo-formulario" name="accesorioConsumibleModelo" placeholder="Modelo" disabled="disabled" />
						</div>
						<div class="col-md-2 form-group text-center">
							<label class="control-label" style="font-size: 0.9em; display: block;">&nbsp;</label>
							<button type="button" class="btn btn-danger btn-eliminar-accesorio-consumible" disabled="disabled" onclick="eliminarAccesorioConsumibleElemento(this);"><i class="fa fa-trash"></i> Eliminar</button>
						</div>
					</div>
				</div>
		</div>
	</div>
	<style>
		.areaTabsBasicos .nav-tabs { border-bottom: #ddd solid 1px !important; }
			.areaTabsBasicos .nav-tabs li { display: table-cell !important; bottom: -1px !important; position: relative; }
			.areaTabsBasicos .nav-tabs a { color: initial !important; border-radius: 4px 4px 0 0 !important; }
			.areaTabsBasicos .control-label { font-size: 11px; }
			
		.forma-inline-fixed .form-group, .forma-inline-fixed .form-group .input-group { margin: 0px !important; }
			.area-btn-fixed { border-top: #F0F0F0 solid  1px; margin-top: 4px; padding-top: 2px; }
	</style>
	<script type="text/javascript">
		// Función que genera una linea de campos para agregar un nuevo accesorio/nuevo consumible
		function agregarAccesorioConsumibleElemento(elementoBtn) {
			// Determina el area en donde se agregará un nuevo elemento
			var areaAgregarLineaCampos = $(elementoBtn).data("area-linea-campos");
			// Tipo de Accesorio/Consumible
			var tipoAccesorioConsumible = $(elementoBtn).data("tipo");
			// Elimina el identificador y le agregar una clase para ir marcando un contador de elementos
			var numLineaCamposClonados = $("#" + areaAgregarLineaCampos + " .linea-campos-clon").length;
			// Si no exiten elementos, se elimimna la leyenda inicial
			if(numLineaCamposClonados == 0) {
				$("#" + areaAgregarLineaCampos).children().remove();
			}
			// Ubica la linea de campos a clonar y realiza una copia
			var lineaCampos = $("#accesorioConsumibleFormaVacia").clone();
			// Muestra la línea de campos
			$(lineaCampos).css("display", "");
			// Cambia el identificador de la linea de campos
			$(lineaCampos).attr("id", "accesorioConsumibleFormaVacia_" + tipoAccesorioConsumible + "_" + numLineaCamposClonados);
			// Agrega una clase para ir llevando un contador de lineas de campo clonadas
			$(lineaCampos).addClass("linea-campos-clon");
			// Al botón de eliminar la linea, le agrega la opción para eliminarla
			$(lineaCampos).find("button.btn-eliminar-accesorio-consumible").attr('data-accesorio-consumible-consecutivo', numLineaCamposClonados).attr("data-tipo", tipoAccesorioConsumible).attr("data-area-linea-campos", areaAgregarLineaCampos);
			// Elimina la propiedad de deshabilitar
			$(lineaCampos).find(":disabled").removeAttr("disabled");
			// Agrega la linea de campos al area correspondiente
			$("#" + areaAgregarLineaCampos).append(lineaCampos);
		}

		// Función que elimina una linea de campos de accesorios/consumibles
		function eliminarAccesorioConsumibleElemento(elementoBtn) {
			// Determina el area en donde se analizará el elemento a eliminar
			var areaAgregarLineaCampos = $(elementoBtn).data("area-linea-campos");

			if($(elementoBtn).data("id-accesorio-consumible")) {
				// Se eliminará un elemento previamente almacenado
				var Id_Activo = $(elementoBtn).data("id-activo");
				var Id_Accesorio_Consumible = $(elementoBtn).data("id-accesorio-consumible");
				var parametrosJson = { Id_Activo: Id_Activo, Id_Accesorio_Consumible: Id_Accesorio_Consumible , accion: "AccesorioConsumibleDel" };

				$.ajax({
					type: "POST",
					url: "../controladores/simple_mvc/ActivoAccesorioConsumibleController.Class.php",
					data: parametrosJson,
					success: function (response) {
						respuesta = JSON.parse($.trim(response));
						if(respuesta.intResultado > 0) {
							// Elimina solo la fila para no recargar la sección de administrador
							$(elementoBtn).parents("div.forma-inline-fixed").remove();
							mensajesalerta("&Eacute;xito", respuesta.strMensaje, "success", "dark");
						}
						else {
							// Ha ocurrido un error al cargar los Accesorios/Consumibles
							mensajesalerta("Oh No!", respuesta.strMensaje, "error", "dark");
						}
					},
					error: function () {
						mensajesalerta("Oh No!", "Ocurrio un error al eliminar el accesorio y/o consumible.", "error", "dark");
					}
				});
			}
			else {
				// Elimina solo un elemento que fue creado dinámicamente pero no se ha guardado
				// Tipo de Accesorio/Consumible
				var tipoAccesorioConsumible = $(elementoBtn).data("tipo");
				// Consecutivo que se le fue asignado
				var consecutivo = $(elementoBtn).data("accesorio-consumible-consecutivo");
				// Determina cual es la linea que será eliminada
				$("#accesorioConsumibleFormaVacia_" + tipoAccesorioConsumible + "_" + consecutivo + " div.forma-inline-fixed").remove();
			}

			// Determina si quedaron elementos parta mostrar o se coloca una leyenda de elementos vacios
			setTimeout(function() {
				var numLineaCamposClonados = $("#" + areaAgregarLineaCampos + " .forma-inline-fixed").length;
				if(numLineaCamposClonados == 0 && areaAgregarLineaCampos == "accesorioTabContenedor") {
					$("#" + areaAgregarLineaCampos).html('<h4 class="text-center"><i class="fa fa-briefcase"></i> Por el momento no existen consumibles agregados</h4>');
				}
				else if(numLineaCamposClonados == 0 && areaAgregarLineaCampos == "consumibleTabContenedor") {
					$("#" + areaAgregarLineaCampos).html('<h4 class="text-center"><i class="fa fa-briefcase"></i> Por el momento no existen consumibles agregados</h4>');
				}
			}, 100);
		}
	</script>
<!-- ==== Page: activo-accesorio-consumible-lista ==== -->