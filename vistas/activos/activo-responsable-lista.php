<!-- ==== Page: activo-responsable-lista ==== -->
<?php
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	ini_set('display_startup_errors', '1');
	include_once(dirname(__FILE__) . "/../../modelos/simple_mvc/ActivoModel.Class.php");


	// Variables que llegan como parametros
	$Id_Activos_Excluidos = isset($_POST["Id_Activos_Excluidos"]) ? $_POST["Id_Activos_Excluidos"] : "";
?>
	<!-- ==== Hidden ==== -->
		<textarea style="width: 100%; height: 300px; display: none;" id="jsonBusquedaActualActivos"><?php echo json_encode($respuestaConsulta); ?></textarea>

	<!-- ==== Cuerpo de la Pagina ==== -->
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<style>
						.panel-heading .accordion-toggle:after {
							/* symbol for "opening" panels */
							font-family: 'Glyphicons Halflings'; /* essential for enabling glyphicon */
							content: "\e114"; /* adjust as needed, taken from bootstrap.css */
							float: right; /* adjust as needed */
							color: grey; /* adjust as needed */
						}
						.panel-heading .accordion-toggle.collapsed:after {
							/* symbol for "collapsed" panels */
							content: "\e080"; /* adjust as needed, taken from bootstrap.css */
						}

						/* Estilo para darle vista al checkbox y se haga interactivo */
						.col-checkbox-radio { margin-top: 0.75em !important; }
							.label-checkbox-radio { font-size: 11px !important; margin: 0 !important; /*color: #d6d6d6;*/ margin-top: -26px !important; text-align: justify; display: block; position: absolute; }
							.col-checkbox-radio .form-bar { height: 1px; background: rgba(0, 0, 0, 0.22); }
							/*.col-checkbox-radio:hover .label-checkbox-radio { color: #e96b56; }*/

							.custom-checkbox { min-height: 1rem; padding-left: 0; margin-right: 0; cursor: pointer; }
							.custom-control { display: inline-block; }
							.custom-control-input { display: none; }
							.custom-checkbox .custom-control-indicator { content: ""; display: inline-block; position: relative; width: 30px; height: 10px; background-color: #818181; border-radius: 15px; margin-right: 10px; -webkit-transition: background .3s ease; transition: background .3s ease; vertical-align: middle; margin: 0 16px; box-shadow: none; }
							.custom-checkbox .custom-control-indicator:after { content: ""; position: absolute; display: inline-block; width: 18px; height: 18px; background-color: #f1f1f1; border-radius: 21px; box-shadow: 0 1px 3px 1px rgba(0, 0, 0, 0.4); left: -2px; top: -4px; -webkit-transition: left .3s ease, background .3s ease, box-shadow .1s ease; transition: left .3s ease, background .3s ease, box-shadow .1s ease; }
							.custom-checkbox .custom-control-input:checked ~ .custom-control-indicator { background-color: #448aff; background-image: none; box-shadow: none !important; }
							.custom-checkbox .custom-control-input:checked ~ .custom-control-indicator:after { background-color: #448aff; left: 15px; }
							.custom-checkbox .custom-control-input:focus ~ .custom-control-indicator { box-shadow: none !important; }
					</style>
					<div>
						<div class="panel-group" id="accordion">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne1">Activos encontrados</a>
									</h4>
								</div>
								<div id="collapseOne1" class="panel-collapse collapse in">
									<div class="panel-body">
										<?php
											if(count($respuestaConsulta) > 0) {
												?><table id="lstActivosBusqueda" class="table table-bordered table-striped table-chs dataTable no-footer">
													<thead>
														<tr>
															<th>&nbsp;</th>
															<th>Foto</th>
															<th>AF/BC</th>
															<th>Nombre</th>
															<th>Marca</th>
															<th>Modelo</th>
															<th>Número de Serie</th>
															<th>Ubicación Primaria</th>
															<th>Ubicación Secundaria</th>
															<th>Responsable</th>
														</tr>
													</thead>
													<tbody>
														<?php for($i = 0; $i < count($respuestaConsulta); $i++) { ?>
															<tr id="tr_activo_reasignar_tmp_<?php echo($respuestaConsulta[$i]->Id_Activo); ?>">
																<td class="text-center" style="vertical-align: middle; white-space: nowrap;">
																	<div class="text-center">Seleccionar</div>
																	<div class="text-center">
																		No
																		<label class="custom-control custom-checkbox">
																			<input type="checkbox" name="chkBox_activo_reasignar" id="chkBox_activo_reasignar_<?php echo($respuestaConsulta[$i]->Id_Activo); ?>" data-id="<?php echo($respuestaConsulta[$i]->Id_Activo); ?>" onclick="agregarQuitarListaActivos(this);" <?php if(strpos("," . $Id_Activos_Excluidos . ",", "," . $respuestaConsulta[$i]->Id_Activo . ",") || strpos("," . $Id_Activos_Excluidos . ",", "," . $respuestaConsulta[$i]->Id_Activo . ",") === 0) { echo "checked='checked'"; } ?> class="custom-control-input">
																			<span class="custom-control-indicator"></span>
																		</label>
																		Si
																	</div>
																</td>
																<td><img src="<?php echo($respuestaConsulta[$i]->Foto != null ? "../Archivos/Archivos-Activos/" . $respuestaConsulta[$i]->Foto : "../dist/img/no-camera.png"); ?>" class="img-responsive img-inventario-tabla" /></td>
																<td><?php echo($respuestaConsulta[$i]->AF_BC); ?></td>
																<td><?php echo($respuestaConsulta[$i]->Nombre_Activo); ?></td>
																<td><?php echo($respuestaConsulta[$i]->Marca); ?></td>
																<td><?php echo($respuestaConsulta[$i]->Modelo); ?></td>
																<td><?php echo($respuestaConsulta[$i]->NumSerie); ?></td>
																<td><?php echo($respuestaConsulta[$i]->Desc_Ubic_Prim); ?></td>
																<td><?php echo($respuestaConsulta[$i]->Desc_Ubic_Sec); ?></td>
																<td class="text-center">
																	<div><img src="https://207.249.133.119:8080/fotos_chs/<?php echo($respuestaConsulta[$i]->Num_Empleado); ?>.jpg" class="img-responsive img-rounded img-inventario-tabla" style="max-height: 70px;" /></div>
																	<?php echo($respuestaConsulta[$i]->UsuarioResponsable); ?>
																</td>
															</tr>
														<?php } ?>
													</tbody>
												</table>
												<hr>
												<div class="text-center">
													<button type="button" class="btn chs" onclick="marcarTodos(true);">Seleccionar todos</button>
													&nbsp;|&nbsp;
													<button type="button" class="btn chs" onclick="marcarTodos(false);">Desmarcar todos</button>
												</div>
												<?php
											}
											else { ?>
												<h3 class="text-center">No existen activos asignados al Usuario Responsable seleccionado</h3><?php
											}
										?>
									</div>
								</div>

								<!-- ==== Area de Activos seleccionados para reasignación ==== -->
								<style>.vertical-center { margin: 0; position: absolute; top: 50%; width: 100%; -ms-transform: translateY(-50%); transform: translateY(-50%); }</style><style>.vertical-center { margin: 0; position: absolute; top: 50%; -ms-transform: translateY(-50%); transform: translateY(-50%); }</style>
								<div class="panel-heading">
									<h4 class="panel-title">
										<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" onclick="setTimeout('generarTablaActivosReasignacion()', 100);">Activos a reasignar</a>
									</h4>
								</div>
								<div id="collapseTwo" class="panel-collapse collapse">
									<div class="panel-body" style="display: flex;">
										<div class="row" style="width: 100%;">
											<div class="col-md-8" style="height: 100%;">
												<div id="lstActivosReasignar" style="height: 100%;">
													<div class="vertical-center">
														<h4 class="text-center">Por el momento no hay Activos seleccionados</h4>
													</div>
												</div>
											</div>
											<div class="col-md-4" style="height: 100%;">
												<div style="background: #F0F0F0; padding: 1em; border-radius: 5px; height: 100%;">
													<div class="row">
														<div class="col-md-12">
															<div class="form-group">
																<label for="numEmpleadoNuevoResponsable-selectized" class="control-label" id="numEmpleadoNuevoResponsableLabel">Nuevo Usuario responsable resguardo</label>
																<select id="numEmpleadoNuevoResponsable" class="demo-default selectized" placeholder="--Mantener usuario responsable--" style="display: none;" tabindex="-1">
																	<?php
																		// Obtiene la lista de Usuarios que pueden recibir los activos y estan registrados en el sistema
																		$parametrosConsulta = new ActivoModel();
																		$parametrosConsulta->Id_Area = $_POST["Id_Area"];
																		$parametrosConsulta->SoloConActivos = 0;
																		$respuestaJson = $parametrosConsulta->UsuariosConActivosGet($parametrosConsulta);
																		if(count($respuestaJson) > 0) {
																			?><option></option><?php
																			for ($i = 0; $i < count($respuestaJson); $i++) {
																				if($respuestaJson[$i]->Num_Empleado != $_POST["Num_Empleado"]) {
																					?><option value='<?php echo $respuestaJson[$i]->Num_Empleado ?>'><?php echo $respuestaJson[$i]->Num_Empleado . ' ' . $respuestaJson[$i]->UsuarioResponsable ?></option><?php
																				}
																			}
																		}
																		else { 
																			?><option value="-1">--Sin resultados--</option><?php
																		}
																	?>
																</select>
															</div>
															<div class="form-group">
																<label for="cmbId_Ubic_Prim_NuevoResponsable" class="control-label" id="chkboxId_Ubic_Prim_Label">Nueva ubicación primaria</label>
																<select id="cmbId_Ubic_Prim_NuevoResponsable" class="form-control" placeholder="--Mantener Ubicación primaria--" tabindex="-1" data-combo-ubicacion-secundaria="cmbId_Ubic_Sec_NuevoResponsable" onchange="cambioUbicacionPrimaria(this);"></select>
															</div>
															<div class="form-group">
																<label for="cmbId_Ubic_Sec_NuevoResponsable" class="control-label" id="chkboxId_Ubic_Sec_Label">Nueva ubicación secundaria</label>
																<select id="cmbId_Ubic_Sec_NuevoResponsable" class="form-control" placeholder="--Mantener Ubicación secundaria--" tabindex="-1">
																	<option value="-1">--Mantener Ubicación Secundaria--</option>
																</select>
															</div>
															<div class="form-group">
																<label for="ubic_Especifica_NuevoResponsable" class="control-label" id="ubic_Especifica_Label">Nueva ubicación especifica</label>
																<input type="text" id="ubic_Especifica_NuevoResponsable" class="form-control" placeholder="Nueva ubicación especifica" tabindex="-1" />
															</div>
															<div class="form-group">
																<label for="cmbCentro_Costos_NuevoResponsable" class="control-label" id="chkboxCentro_Costos_Label">Centro de Costos</label>
																<select id="cmbCentro_Costos_NuevoResponsable" class="form-control" placeholder="--Mantener Centro de Costos--" tabindex="-1"></select>
															</div>
															<div class="form-group">
																<font color="red">*</font><label for="comentarioNuevoResponsable" class="control-label" id="comentarioNuevoResponsableLabel">Comentarios del cambio del responsable</label>
																<textarea class="form-control" name="comentarioNuevoResponsable" id="comentarioNuevoResponsable" rows="6"></textarea>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-md-12 text-right">
															<button type="button" class="btn chs" id="reasignarActivos" onclick="mostrarAlertConfirm(() => guardarReasignacion(), 'Está seguro que desea guardar los cambios que ha realizado?');">Actualizar Activos</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	<!-- ==== Ficha del Usuario Responsable ==== -->
		<script type="text/javascript">
			$(function() {
				$("#numEmpleadoNuevoResponsable").selectize();
				generarTablaActivosReasignacion();
				obtenerListaUbicacionPrimaria();
				centro_costos_contabilidad();
			});


			// Función que rellena los combos de Ubicación Primaria
			function obtenerListaUbicacionPrimaria() {
				var Id_Area = $("#idareasesion").val();
				var resultado = new Array();
				data = { Estatus_Reg: "1", Id_Area:Id_Area, accion: "consultar" };
				resultado = cargo_cmb("../fachadas/activos/siga_cat_ubic_prim/Siga_cat_ubic_primFacade.Class.php", false, data);

				if(resultado.totalCount>0){
					$('#cmbId_Ubic_Prim_NuevoResponsable').append($('<option>', { value: "-1" }).text("--Mantener Ubicación Primaria--"));
					for(var i = 0; i < resultado.totalCount; i++){
						$('#cmbId_Ubic_Prim_NuevoResponsable').append($('<option>', { value: resultado.data[i].Id_Ubic_Prim }).text(resultado.data[i].Desc_Ubic_Prim));
					}
				}
				else{
					$('#cmbId_Ubic_Prim_NuevoResponsable').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
				}
			}
			// Función que le agrega funcionalidad al combo de Ubicación Primaria al cambiar de valor seleccionado
			function cambioUbicacionPrimaria(objetoSelect) {
				var elementoDependiente = $(objetoSelect).data("combo-ubicacion-secundaria");
				$('#' + elementoDependiente).children('option').remove();

				if($(objetoSelect).val() != "-1"){
					// Actualiza el combo dependiente de la Ubicación Primaria
					var Id_Ubic_Prim = $(objetoSelect).val();
					var resultado = new Array();
					var data = { Estatus_Reg: "1", Id_Ubic_Prim: Id_Ubic_Prim, accion: "consultar" };
					resultado = cargo_cmb("../fachadas/activos/siga_cat_ubic_sec/Siga_cat_ubic_secFacade.Class.php", false, data);
					console.log(resultado);

					if(resultado.totalCount > 0) {
						// Escribe los elementos encontrados para el combo dependiente
						$('#' + elementoDependiente).append($('<option>', { value: "--Seleccione la nueva Ubicación Secundaria--" }).text("--Seleccione la nueva Ubicación Secundaria--"));
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
					$('#' + elementoDependiente).append($('<option>', { value: "-1" }).text("--Mantener Ubicación Secundaria--"));
				}
			}


			// Función para cargar los centros de costo de contabilidad
			function centro_costos_contabilidad() {
				var data = { Estatus_Reg: "1", accion: "consultar" };
				var resultado = cargo_cmb("../fachadas/activos/siga_cat_centro_de_costos/Siga_cat_centro_de_costosFacade.Class.php", false, data);
				if(resultado.totalCount>0){
					$('#cmbCentro_Costos_NuevoResponsable').append($('<option>', { value: "-1" }).text("--Mantener Centro de Costos--"));
					for(var i = 0; i < resultado.totalCount; i++) {
						$('#cmbCentro_Costos_NuevoResponsable').append($('<option>', { value: resultado.data[i].Id_Centros_de_costos }).text(resultado.data[i].Desc_Centro_de_costos));
					}
				}
				else {
					$('#cmbCentro_Costos_NuevoResponsable').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
				}
			}


			// Función generar para agregar/quitar el elemento del datatable de activos a modificar
			// Se agrega dicha funcionalidad al checkbox ya que el valor cambia de seleccionado a no seleccionado y viceversa
			function agregarQuitarListaActivos(elemento) {
				// Determina si debe agregarse o removerse del datatable de activos a modificar
				if($(elemento).is(':checked')) {
					seleccionActivo(elemento, false);
				}
				else {
					eliminarActivo(elemento, false);
				}
			}

			// Función que selecciona un activo para reasignación. Lo elimina de la lista de busqueda y lo agrega en lka lista para reasignación
			function seleccionActivo(elemento, seleccionXBloque = false) {
				// Obtiene el identificador del Activo seleccionado
				var Id_Activo = $(elemento).data("id");

				// Verifica que elemento no haya sido agregado previamente
				if(("," + $("#IdActivoReasignar").val() + ",").indexOf("," + Id_Activo + ",") < 0) {
					// Recupera el objeto Json de la consulta actual
					var jsonConsulta = JSON.parse($("#jsonBusquedaActualActivos").val());
					// Recupera la información del Objeto seleccionado dentro del JSON de la consulta actual
					var infoElementoJson = jsonConsulta.find(x => x.Id_Activo == Id_Activo);
					// Actualiza el Json con el nuevo elemento agregado
					$("#jsonListaActivosReasignar").val($("#jsonListaActivosReasignar").val() + ($("#jsonListaActivosReasignar").val().trim() != "" ? "," : "") + JSON.stringify(infoElementoJson));
					// Actualiza los identificadores que seran reasignados
					$("#IdActivoReasignar").val($("#IdActivoReasignar").val() + ($("#IdActivoReasignar").val().trim() != "" ? "," : "") + Id_Activo);
					// Genera la tabla con los activos a reasignar solo cuando sea marcado un elemento a la vez
					if(! seleccionXBloque) {
						generarTablaActivosReasignacion();
					}
				}
			}

			// Elimina un elemento de la lista de Activos que fueron seleccionados para reasignación
			function eliminarActivo(elemento, seleccionXBloque = false) {
				// Obtiene el identificador del Activo seleccionado
				var Id_Activo = $(elemento).data("id");
				// Recupera el objeto Json de la consulta actual
				var jsonListaActivosReasignar = JSON.parse("[" + $("#jsonListaActivosReasignar").val() + "]");
				// Recupera la información del Objeto seleccionado dentro del JSON de la consulta actual
				const dataRemoved = jsonListaActivosReasignar.filter((el) => { return el.Id_Activo != Id_Activo; });
				$("#jsonListaActivosReasignar").val(JSON.stringify(dataRemoved).replace(/[\[\]]/g, ''));

				// Elimina de la lista de Identificadores el Activo que fue seleccionado
				var lstIdActivos = $("#IdActivoReasignar").val().split(",");
				var indiceArray = lstIdActivos.indexOf('' + Id_Activo);
				lstIdActivos.splice(indiceArray, 1);
				$("#IdActivoReasignar").val(lstIdActivos.join(","));

				// Genera la tabla con los activos a reasignar solo cuando sea desmarcado un elemento a la vez
				if(! seleccionXBloque) {
					$('#lstActivosBusqueda').DataTable().column(0).nodes().to$().find("input[type=checkbox]#chkBox_activo_reasignar_" + Id_Activo).prop("checked", false);
					generarTablaActivosReasignacion();
				}
			}

			// Función que genera la tabla donde estan seleccionado los activos que serán reasignados a un nuevo usuario
			function generarTablaActivosReasignacion() {
				var dataJsonActivosReasignar = JSON.parse("[" + $("#jsonListaActivosReasignar").val() + "]");
				//console.log(dataJsonActivosReasignar);

				if(dataJsonActivosReasignar.length > 0) {
					$("#lstActivosReasignar").html("<table id='tablaActivosReasignar' class='table table-bordered table-striped table-chs dataTable no-footer' style='width: 100%;'><thead><tr><th>&nbsp;</th><th>Foto</th><th>AF/BC</th><th>Nombre</th><th>Marca</th><th>Modelo</th><th>Número de Serie</th><th>Ubicación Primaria</th><th>Ubicación Secundaria</th><th>Responsable</th></tr></thead></table>");
					$("#tablaActivosReasignar").DataTable({
						data: dataJsonActivosReasignar,
						columns: [
							{
								data: function (obj) {
									return "<div class='text-center'><p>Quitar</p><i style='font-size: 2em;' class='fa fa-trash cursor-pointer' data-id='" + obj.Id_Activo + "' onclick='eliminarActivo(this);'></i></div>";
								}
							},
							{
								data: function (obj) {
									return "<img src=" + (obj.Foto != null ? "../Archivos/Archivos-Activos/" + obj.Foto : "../dist/img/no-camera.png") + " class='img-responsive img-rounded img-inventario-tabla' />";
								}
							},
							{ data: 'AF_BC' },
							{ data: 'Nombre_Activo' },
							{ data: 'Marca' },
							{ data: 'Modelo' },
							{ data: 'NumSerie' },
							{ data: 'Desc_Ubic_Prim' },
							{ data: 'Desc_Ubic_Sec' },
							{
								data: function (obj) {
									return '<div class="text-center"><div><img src="https://207.249.133.119:8080/fotos_chs/' + obj.Num_Empleado + '.jpg" class="img-responsive img-rounded img-inventario-tabla" style="max-height: 70px;" /></div><p>' +  obj.UsuarioResponsable + "</p></div>";
								}
							}
						],
						columnDefs: [
							{ className: "celdaCentradaVertical", targets: [ 0 ] }
						],
						lengthMenu: [ [10, 25, 50, 100, 100000], [10, 25, 50, 100, "Todos"] ],
						// Esqueleto del datatable completo (B: botones; l: longitud de cuantos resultados va a mostrar; f: filtros; <: agrega un div; "table-responsive" agrega la clase al div; t: tabla; >:cierra el div; i: información ; p: paginación)
						dom: '<"text-center"><"row"<"col-md-6"l><"col-md-6"f>><"table-responsive"t>ip',
						scrollY: 500,
						language: {
							lengthMenu: "Mostrando _MENU_ registros por p&aacute;gina",
							zeroRecords: "Sin Resultados",
							info: "Monstrando p&aacute;gina _PAGE_ de _PAGES_ , total de registros: _MAX_",
							infoEmpty: "Sin Resultados",
							infoFiltered: "(Mostrando  _MAX_ del total de registros)",
							search: "Busqueda: ",
							paginate: {
								first: "Primera",
								last: "Ultima",
								next: "Siguiente",
								previous: "Anterior"
							}
						}
					});
				}
				else { 
					$("#lstActivosReasignar").html('<div class="vertical-center"><h4 class="text-center">Por el momento no hay Activos seleccionados</h4></div>');
				}
			}

			// Función para (des)seleccionar los elementos que forman parte de la tabla de Activos encontrados en la búsqueda
			function marcarTodos(todos) {
				// Genera la capa de espera
				jsShowWindowLoad("Por favor espere, actualizando los Activos seleccionados");
				setTimeout(() => {
					// (des)Marca todos los campos checkbox que están dentro de la tabla de activos buscador por filtros
					// https://jsfiddle.net/2n3dyLhh/13/
					$('#lstActivosBusqueda').DataTable().column(0).nodes().to$().find('input[type=checkbox]').prop('checked', todos);
					// Agrega la selección
					$('#lstActivosBusqueda').DataTable().column(0).nodes().to$().find('input[type=checkbox]').each(function() {
						if(todos) {
							// Carga en la lista de activos que serán actualizados
							seleccionActivo(this, true);
						}
						else {
							// Elimina de la lista de activos que serán actualizados
							eliminarActivo(this, true);
						}
					});
					// Genera el datatable con los elementos seleccionados en bloque
					generarTablaActivosReasignacion();	
					// Cierra la capa de espera
					jsRemoveWindowLoad();
				}, 100);
			}


			// Función para actualizar los activos que fueron seleccionados y reasignarlos de manera masiva
			// Definción para la validación de la forma
			a_fields = {
				'IdActivoReasignar': { 'l': 'Activos a reasignar', 'r': true },
				'numEmpleadoNuevoResponsable': { 'l': 'Nuevo usuario responsable', 'r': false },
				'cmbId_Ubic_Prim_NuevoResponsable': { 'l': 'Ubicación primaria', 'r': true },
				'cmbId_Ubic_Sec_NuevoResponsable': { 'l': 'Ubicación secundaria', 'r': $("#cmbId_Ubic_Prim_NuevoResponsable").val() > 0 ? true : false, 'f': 'integer' },
				'cmbCentro_Costos_NuevoResponsable': { 'l': 'Centro de Costos', 'r': false, 'f': 'integer' },
				'ubic_Especifica_NuevoResponsable': { 'l': 'Nueva ubicación especifica', 'mx': 500 },
				'comentarioNuevoResponsable': { 'l': 'Comentarios del cambio del responsable', 'r': true }
			};
			o_config = { 'to_disable': ['Submit', 'Reset'], 'alert': 1 };
			// validator constructor call
			var v = new validator('formaReasignacion', this.a_fields, this.o_config);
			
			function guardarReasignacion() {
				// Verifica que se hayan seleccionado Ubicaciones y/o cambio de Responsable
				if(v.exec()) {
					// Para realizar el cambio, es necesario que se haga alguna modificación en alguno de los 3 campos: responsable, ubicación primario o secundaria
					if($("#numEmpleadoNuevoResponsable").val() != "" || $("#cmbId_Ubic_Prim_NuevoResponsable").val() > 0 || $("#cmbId_Ubic_Sec_NuevoResponsable").val() > 0) {
						var parametrosJson = { accion: "ReubicacionReasignacionMasiva", Cad_Id_Activos: $("#IdActivoReasignar").val(), ComentarioReasignacion: $("#comentarioNuevoResponsable").val(), Id_Area: $("#idareasesion").val(), Usr_Mod: $("#nousuariosesion").val() };
						if($("#numEmpleadoNuevoResponsable").val() != "") { parametrosJson.IdUsuarioReasignacion = $("#numEmpleadoNuevoResponsable").val(); }
						if($("#cmbId_Ubic_Prim_NuevoResponsable").val() > 0) { parametrosJson.Id_Ubic_Prim = $("#cmbId_Ubic_Prim_NuevoResponsable").val(); }
						if($("#cmbId_Ubic_Sec_NuevoResponsable").val() > 0) { parametrosJson.Id_Ubic_Sec = $("#cmbId_Ubic_Sec_NuevoResponsable").val(); }
						if($("#cmbCentro_Costos_NuevoResponsable").val() > 0) { parametrosJson.Centro_Costos = $("#cmbCentro_Costos_NuevoResponsable").val(); }
						if($.trim($("#ubic_Especifica_NuevoResponsable").val()) != "") { parametrosJson.Ubic_Especifica = $("#ubic_Especifica_NuevoResponsable").val(); }

						$.ajax({
							type: "POST",
							url: "../controladores/simple_mvc/ActivoController.Class.php",
							data: parametrosJson,
							async: true,
							success: function (datos) {
								//console.log(datos);

								var respuestaJson = JSON.parse($.trim(datos));
								if(respuestaJson.intResultado > 0) {
									// La actualización se llevó a cabo correctamente
									mensajesalerta("&Eacute;xito", respuestaJson.strMensaje, "success", "dark");
									// Recupera la lista de Activos que fueron modificados
									$('#Cad_Id_Activo').val($("#IdActivoReasignar").val());
									$("#IdActivoReasignar").val("");
									$("#jsonListaActivosReasignar").val("");
									// Realiza la consulta de los activos que se han actualizado correctamente para mostrar los cambios
									obtenerListaActivos();
								}
								else {
									// Ha ocurrido un error de actualización
									mensajesalerta("Oh No!", "Ocurrio un error al actualizar: " + respuestaJson.strMensaje, "error", "dark");
								}
							},
							error: function (objeto, quepaso, otroobj) {
								// Ha ocurrido un error y no pueden ser cargados los elementos en el combo select
								mensajesalerta("Oh No!", "Ocurrio un error al consultar." + objeto.responseText, "error", "dark");
							}
						});
					}
					else {
						// La actualización no puede llevarse acabo
						mostrarAlertInfo("<p class='text-justify'>La actualización no puede llevarse acabo porque no hay cambio alguno en los Activos seleccionados a reasignar o para cambio de Ubicación.</p>");
					}
				}
			}
		</script>
		<style>
			.cursor-pointer { cursor: pointer; }
			.img-rounded { border-radius: 50%; }
		</style>
<!-- ==== Page: activo-responsable-lista ==== -->