<?php
	include_once(dirname(__FILE__) . "/../modelos/simple_mvc/ActivoFijoInventarioReportesModel.Class.php");
	include_once($_SERVER["DOCUMENT_ROOT"]."/SIGA/poo/compartidos/ajax/class_usuario_adm_super.php");
	
	session_start();
	$Id_Usuario = $_SESSION['Id_Usuario'];

	$permisoAdminGralActivos = new class_usuario_adm_super();
	$AdminGralActivos = $permisoAdminGralActivos->usuariosAutorizados($Id_Usuario);
	
	// Contador de elementos por escribir
	$contador = 0;
	// Nombre de la tabla
	$NombreTabla = $_POST["NombreTabla"];
	// Versión del reporte en especifico
	$Id_Reporte_Version = isset($_POST["Id_Reporte_Version"]) ? $_POST["Id_Reporte_Version"] : null;
	?>
	<div style="display: none;">
		<div id="comboVersiones_<?php echo($NombreTabla); ?>">
			<label>Vistas disponibles:</label>
			<?php
				// Obtiene la lista de Versiones disponibles que tiene el reporte pasado como parámetro
				// Obtiene la información de las versiones para un reporte pasado como parámetro
				$parametrosConsulta = new ActivoFijoInventarioReportesModel();
				if(isset($_POST['Id_Area'])) { $parametrosConsulta->Id_Area = $_POST["Id_Area"]; }
				if(isset($_POST['NombreTabla'])) { $parametrosConsulta->NombreTabla = $_POST["NombreTabla"]; }

				// Ejecución de la consulta
				$lstVersiones = $parametrosConsulta->ActivoFijoVersionesReportesGet($parametrosConsulta);
				if(count($lstVersiones) > 0) {
					if($lstVersiones[0]->Id_Reporte_Version > 0) {
						?><select class="form-control" data-id-tabla="<?php echo($NombreTabla); ?>" onchange="generarTablaEncabezados(this);">
							<?php for($i = 0; $i < count($lstVersiones); $i++) {
								?><option value="<?php echo($lstVersiones[$i]->Id_Reporte_Version); ?>" <?php echo($Id_Reporte_Version != null ? ($lstVersiones[$i]->Id_Reporte_Version == $Id_Reporte_Version ? "selected='selected'" : "") : ($lstVersiones[$i]->Aplica == 1 ? "selected='selected'" : "")) ?>>
									<?php echo($lstVersiones[$i]->NombreVersion); echo($lstVersiones[$i]->Aplica == 1 ? " --default--" : ""); ?>
								</option><?php
							}?>
						</select><?php
					}
					else { 
						?><h4 class="text-center"><?php echo($lstVersiones[0]->NombreVersion); ?></h4><?php
					}
				}
				else {
					?><h4 class="text-center">Por el momento no hay definición de vistas para el reporte seleccionado</h4><?php
				}
			?>
		</div>
	</div>
	<?php


	// Escribe los elementos encontrados
	if (count($respuestaConsulta) > 0) {
		if($respuestaConsulta[0]->Id_Reporte_Version > 0) { ?>
			<textarea id="listaFiltrosExcel_<?php echo($NombreTabla); ?>" style="width: 100%; display: none;" readonly="readonly"></textarea>
			<table id="<?php echo($NombreTabla); ?>" class="table table-bordered table-striped table-chs w-100 tablas-datatable-excel">
				<thead>
					<tr>
						<?php
							for($i = 0; $i < count($respuestaConsulta); $i++) {
								echo("<td style='height: 17px;" . ($i == 2 ? "min-width: 120px;" : "") . "'>&nbsp;</div></td>");
							}
						?>
					</tr>
					<tr>
						<?php
							for($i = 0; $i < count($respuestaConsulta); $i++) {
								echo("<th " . ($respuestaConsulta[$i]->AplicaFiltro == 1 ? "class='columna-exportar-excel' data-aplicar-filtro='true' data-nombre-campo='" . $respuestaConsulta[$i]->Nom_Columna . "' data-id-select-filtro='Filtro_" . $respuestaConsulta[$i]->Nom_Columna . "_" . $NombreTabla . "' data-campo-receptor='hdd_filt_" . $respuestaConsulta[$i]->Nom_Columna . "_" . $NombreTabla . "' data-id-tabla='" . $NombreTabla . "'" : "") . ">".
									$respuestaConsulta[$i]->Descripcion_Columna .
									($respuestaConsulta[$i]->AplicaFiltro == 1 ? "<input type='hidden' id='hdd_filt_" . $respuestaConsulta[$i]->Nom_Columna . "_" . $NombreTabla . "' />" : "") .
								"</th>");
							}
						?>
					</tr>
				</thead>
			</table><?php
		}
		else { 
			// No se han encontrado elementos para mostrar
			?><div class="v-wrap">
				<div class="v-box">
					<h4>Ha ocurrido un error en la consulta: <?php echo($respuestaConsulta[0]->Descripcion_Columna); ?></h4>
				</div>
			</div><?php
		}
	}
	else{
		// No se han encontrado elementos para mostrar
		?><div class="v-wrap">
			<div class="v-box">
				<h4>Por el momento no hay definición de vistas para el reporte seleccionado</h4>
			</div>
		</div><?php
	}
?>

<!-- ==== Lista de Versiones disponibles para el reporte ==== -->
	<?php if($NombreTabla == "tablaactivos") { ?>
		<div class="row">
			<p class="text-right">*Se incluyen los activos que en algún momento fueron dados de baja o estuvieron en proceso pero han regresado a operación.</p><hr />
		</div>
	<?php } ?>

	<script type="text/javascript">
		// Función que genera el datatable con la lista de columnas dinámicas
		function generarInventario_<?php echo($NombreTabla); ?>() {
			var estatusSrc = "<?php echo($NombreTabla); ?>";
			<?php if($NombreTabla == "tablebajas") { ?>
				// Elimina los filtros seleccionados previamente en el campo acumulado de filtros encadenados Tipo Excel
				// Limpia el arreglo para evita que se acumulen filtros de Tablas de Baja diferentes (En Proceso de Baja y Baja definitiva)
				lstFiltrosTablaBajas = [];
				// Limpia el texto donde se van acumulando visualmente lso filtros tipo Excel que se van utilizando y encadenando
				$("#lstFiltros_tablebajas").html("");

				//
				var EstatusBaja = $("#Estatus_baja").val();
				if(EstatusBaja == 0) { $("#baja_solicitante").prop("checked", true); }
				else { $("#baja_contabilidad").prop("checked", true); }
				
				if($("#baja_solicitante").is(':checked')) { estatusSrc = "baja"; }
				if($("#baja_direc_financiera").is(':checked')) { estatusSrc = "baja2"; }
				if($("#baja_contabilidad").is(':checked')) { estatusSrc = "baja3"; }
			<?php } ?>

			// Parametros Json para la búsqueda de la Información y generar la tabla
			var parametrosJson = {
				Id_Area: $("#idareasesion").val(),
				orden: 'Fech_Inser',
				dir: 'desc',
				estatus: estatusSrc,
				perfil: $("#hddperfil").val(),
				listaFiltrosExcel: function() { return $("#listaFiltrosExcel_<?php echo($NombreTabla); ?>").val() },
				accion: "LlenarDataTable",
				<?php
					// Parametros especificos para la tabla de Bajas
					if($NombreTabla == "tablebajas") { ?>
						Tab: $("#Estatus_baja").val(),
						Fech_Inicial: $("#fechaDel").val(),
						Fech_Final: $("#fechaAl").val(), <?php
					}
					// Parametros especificos para la tabla de Reubicación
					else if($NombreTabla == "tablereubicacion") { ?>
						Fech_Inicial: $("#fechaDel_reubic").val(),
						Fech_Final:  $("#fechaAl_reubic").val(), <?php
					}
				?>
				NombreTabla: "<?php echo($NombreTabla); ?>"
				<?php
					for($i = 0; $i < count($respuestaConsulta); $i++) {
						echo ", Filtro_" . $respuestaConsulta[$i]->Nom_Columna . "_DataTable: function() { return $('#hdd_filt_" . $respuestaConsulta[$i]->Nom_Columna . "_" . $NombreTabla . "').val(); } ";
					}
				?>
			};
			//console.log("datatable <?php echo($NombreTabla); ?>");
			console.log(parametrosJson);

			<?php if (count($respuestaConsulta) > 0) { ?>
				// Muestra la ventana de Espera
				jsShowWindowLoad("Por favor espere, buscando información para generar la tabla de Inventario");

				// Elimina la tabla anterior que fue construida antes que esta nueva consulta
				$('#<?php echo($NombreTabla); ?>').DataTable().clear().destroy(); 

				// TABLA DINAMICA DONDE SE MUESTRAN LOS INVENTARIOS ACTIVOS
				$('#<?php echo($NombreTabla); ?>').DataTable({
					"lengthMenu": [ [10, 25, 50, 100, 100000], [10, 25, 50, 100, "Todos"] ],
					// Esqueleto del datatable completo (B: botones; l: longitud de cuantos resultados va a mostrar; f: filtros; <: agrega un div; "table-responsive" agrega la clase al div; t: tabla; >:cierra el div; i: información ; p: paginación)
					//"dom": '<"text-center"B><"row"<"col-md-6"l><"col-md-6"f>><"table-responsive"t>ip',
					"dom": '<"row"<"#areaVersiones_<?php echo($NombreTabla); ?>.col-md-6 text-center padding-bottom-btn-datatable"><"col-md-6 text-center padding-bottom-btn-datatable"<?php if($NombreTabla != "tablebajas") { echo("B"); } ?>>><"row"<"col-md-6"l><"col-md-6"f>><Rt>ip',
					// Celdas a exportar en el documento Excel, empezando por el indice 0
					// Elimina también clases que definen el botón
					"buttons": [{
						text: '<i class="fa fa-file-excel-o"></i> Exportar a Excel',
						className: 'btn chs export',
						extend: 'excelHtml5',
						init: function (api, node, config) {
							jQuery(node).removeClass('dt-button buttons-excel buttons-html5')
						},
						exportOptions: { columns: ['.columna-exportar-excel'] },
					}],
					"scrollY": 500,
					"scrollX": true,
					"processing": true,
					"serverSide": true,
					"ajax": { 
						//"url": "../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",
						"url": "../controladores/simple_mvc/ActivoFijoInventarioReportesController.Class.php",
						"type": "POST",
						"data": parametrosJson,
						"dataSrc": function(json) {
							// You can also modify `json.data` if required
							console.log(parametrosJson);
							console.log(json);
							// Cierra la ventana de espera
							setTimeout(function() { jsRemoveWindowLoad(); }, 1000);
							// Almacena la información recuperada
							return json.data;
						},
						"error": function(jqXHR, ajaxOptions, thrownError) {
							console.log(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
						}
					},
					"columnDefs": [
						{ className: "celdaCentradaVertical text-center", "targets": [ 0, 1, 2, 3 ] }
					],
					"columns": [
						{
							// Columna de Edición
							"data": function (obj) {
								var opciones = new Array();
								<?php if($NombreTabla == "tablaactivos") { ?>
									opciones.push('<div class="text-center"><span class="cursor-pointer" data-id-tabla="tablaactivos" data-id-activo="' + obj.Id_Activo + '" onclick="pasarvalores(' + obj.Id_Activo + ', 0);" title="Editar los datos del Activo"><i class="fa fa-pencil" aria-hidden="true"></i></span></div>');
									//opciones.push('<div class="text-center"><span class="cursor-pointer" data-id-tabla="<?php echo($NombreTabla); ?>" data-id-activo="' + obj.Id_Activo + '" onclick="cargarWokflow(this);"><i class="fa fa-list-ol" aria-hidden="true" style="color: #000; font-size: 16px;"></i></span></div>');

									<?php if(in_array(59,$AdminGralActivos)){ ?>

									opciones.push('<div class="text-center"><span class="cursor-pointer" onclick="pasarelimina(' + obj.Id_Activo + ')" title="Eliminar el Activo"><i class="fa fa-trash" aria-hidden="true"></i></span></div>');

								<?php } 
								}

								else if($NombreTabla == "tablebajas") { ?>
									opciones.push('<div class="text-center">');
									opciones.push('<span class="cursor-pointer" onclick="pasarvalores_baja(' + obj.Id_Activo + ');"><i class="fa fa-pencil" aria-hidden="true" ></i></span>');
									opciones.push('<span class="cursor-pointer" onclick="pasarvalores(' + obj.Id_Activo + ',1)"><i class="fa fa-file-text-o" aria-hidden="true" ></i></span>');
									<?php if (isset($_SESSION["Id_Cargo"])) { ?>
										opciones.push('<span class="cursor-pointer" onclick="pasareliminabaja(' + obj.Id_Activo + ')"><i class="fa fa-trash" aria-hidden="true"></i></span>');
									<?php }
									else { ?>
										if (EstatusBaja == 0) { opciones.push('<span class="cursor-pointer" onclick="pasareliminabaja(' + obj.Id_Activo + ')"><i class="fa fa-trash" aria-hidden="true"></i></span>'); }
									<?php }?>
									opciones.push("</div>");
								<?php }
								else { ?>
									opciones.push('<div class="text-center"><span class="cursor-pointer" onclick="pasarvalores(' + obj.Id_Activo + ', 1)"><i class="fa fa-file-text-o" aria-hidden="true" ></i></span></div>');

									// opciones.push('<div class="text-center"><span class="cursor-pointer" data-id-tabla="<?php echo($NombreTabla); ?>" data-id-activo="' + obj.Id_Activo + '" data-id-activo-reubicacion="' + obj.Id_Baja_Reubicacion + '" onclick="cargarWokflow(this);"><i class="fa fa-list-ol" aria-hidden="true" style="color: #000; font-size: 16px;"></i></span></div>');

									<?php if(in_array(59,$AdminGralActivos)){ ?>
									opciones.push('<div class="text-center"><span class="cursor-pointer" onclick="pasarelimina_reubicacion(' + obj.Id_Baja_Reubicacion + ')"><i class="fa fa-trash" aria-hidden="true"></i></span></div>');
								<?php }
									} ?>
								return opciones.join("");
							},
							"orderable": false
						},
						{
							// Columna de PDF
							"data": function (obj) {
								var opciones = new Array();
								<?php if($NombreTabla == "tablaactivos") { ?>
									opciones.push('<div class="text-center"><a target="_blank" href="../controladores/activos/siga_activos/Reporte-Alta.php?Id_Activo=' + obj.Id_Activo + '" title="Click para ver el PDF"><span class="span-file-adjunto"><i class="fa fa-paperclip fa-file-adjunto" aria-hidden="true"></i></span></a></div>');
								<?php }
								else if($NombreTabla == "tablebajas") { ?>
									opciones.push('<div class="text-center"><a target="_blank" href="../controladores/activos/siga_activos/Reporte-Baja.php?Id_baja=' + obj.Id_Baja_Reubicacion + '&Id_Activo='+obj.Id_Activo + '"><span class="span-file-adjunto"><i class="fa fa-paperclip fa-file-adjunto" aria-hidden="true""></i></span></a></div>');
								<?php }
								else { ?>
									opciones.push('<div class="text-center"><a target="_blank" href="../controladores/activos/siga_activos/Reporte-Reubicacion.php?Id_Activo_Reubicacion=' + obj.Id_Baja_Reubicacion + '&Id_Activo=' + obj.Id_Activo + '"><span class="span-file-adjunto"><i class="fa fa-paperclip fa-file-adjunto" aria-hidden="true""></i></span></a></div>');
								<?php } ?>
								if(obj.CuentaAccesoriosConsumibles > 0) {
									opciones.push('<div class="text-center"><a href="#" onclick="verAccesorioConsumible(this);" data-id-activo="' + obj.Id_Activo + '" title="Click para ver los accesorios y consumibles ligados al Activo"><span class="span-file-adjunto"><i class="fa fa-object-group fa-file-adjunto" aria-hidden="true"></i></span></a></div>');
								}
								return opciones.join("");
							},
							"orderable": false
						},
						{
							// Columna de Foto
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
							},
							"orderable": false
						}
						<?php
							// Demás columnas dinámicas
							for($i = 3; $i < count($respuestaConsulta); $i++) {
								// Enmascara todo lo que pueda ser una fecha buscando la particula "fecha"
								if(strpos(strtolower($respuestaConsulta[$i]->Nom_Columna), 'fecha') !== false) {
									echo ", { 'data': '" . $respuestaConsulta[$i]->Nom_Columna . "', 'render': function(obj) { return obj != null && obj != '' ? moment(obj).format('YYYY-MM-DD') : null; } }";
								}
								// Enmascara todo lo que pueda ser una cantidad
								else if($respuestaConsulta[$i]->Nom_Columna == "MontoFactura" || $respuestaConsulta[$i]->Nom_Columna == "Monto_F" || $respuestaConsulta[$i]->Nom_Columna == "ImporteSeguros") {
									echo ", { 'data': '" . $respuestaConsulta[$i]->Nom_Columna . "', 'render': $.fn.dataTable.render.number( ',', '.', 2, '$' ) }";
								}
								// Columnas normales sin enmascaramiento
								else if($respuestaConsulta[$i]->Nom_Columna != "WorkFlowPaso") {
									echo ", { 'data': '" . $respuestaConsulta[$i]->Nom_Columna . "' }";
								}
								// Columna del Workflow
								else {
									?>, { "data": function (obj) { return (obj.WorkFlowPaso != null ? 'Paso ' + obj.WorkFlowPaso + ' de ' + obj.WorkFlowPasoTotal : "---"); } }<?php
								}
							}
						?>
					],
					// Lenguaje
					"language": {
						"lengthMenu": "Mostrando _MENU_ registros por p&aacute;gina",
						"zeroRecords": "Sin Resultados",
						"info": "Mostrando p&aacute;gina _PAGE_ de _PAGES_ , total de registros: _MAX_",
						"infoEmpty": "Sin Resultados",
						"infoFiltered": "(Mostrando  _MAX_ del total de registros)",
						"search": "Búsqueda: ",
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
							if($("#<?php echo($NombreTabla); ?> th:eq(" + index + ")").data("aplicar-filtro")) {
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

								var IdSelectFiltro = $("#<?php echo($NombreTabla); ?> th:eq(" + index + ")").data("id-select-filtro");
								var CampoReceptor = $("#<?php echo($NombreTabla); ?> th:eq(" + index + ")").data("campo-receptor");
								var NombreCampo = $("#<?php echo($NombreTabla); ?> th:eq(" + index + ")").data("nombre-campo");
								var IdTabla =  $("#<?php echo($NombreTabla); ?> th:eq(" + index + ")").data("id-tabla");
								var select = $('<select id="' + IdSelectFiltro + '" class="filtro-excel" data-id-tabla="' + IdTabla + '" data-id-select-filtro="' + IdSelectFiltro + '" data-campo-receptor="' + CampoReceptor + '" data-nombre-campo="' + NombreCampo + '" multiple="multiple" style="display: none; margin-top: 8px;"></select><button class="multiselect dropdown-toggle btn btn-default btn-inicial-excel" style="width: initial !important" data-id-tabla="' + IdTabla + '" data-id-select-filtro="' + IdSelectFiltro + '" data-campo-receptor="' + CampoReceptor + '" data-nombre-campo="' + NombreCampo + '" title="Click para mostar el filtro" onclick="filtro_multiselect_generico(this);"> [+] </button>')
												.appendTo($("#<?php echo($NombreTabla); ?>_wrapper .dataTables_scrollHead thead td:eq(" + index + ")").empty());
								listaFiltrosSelect.push(select);
							}
						}); // this.api function

						// Genera los campos de filtrado tipo Excel
						/*
						for(var i = 0; i < listaFiltrosSelect.length; i++) {
							filtro_multiselect_generico(listaFiltrosSelect[i]);
						}
						*/
						
						// Inicia la funcionalidad de mover los botones con el scroll horizontal
						movimientoHorizontalBotonesExcel("<?php echo($NombreTabla); ?>");
						// Cierra la ventana de espera
						setTimeout(function() { jsRemoveWindowLoad(); }, 1000);
					} //initComplete function
				})
				.on('init.dt', function () {
					$("#comboVersiones_<?php echo($NombreTabla); ?>").appendTo("#areaVersiones_<?php echo($NombreTabla); ?>");

					// Muestra la ventana de espera
					//jsShowWindowLoad("Por favor espere, buscando información para generar la tabla de Inventario");
				});
			<?php } ?>
		}

		// En caso de que se solicite una versión en especifico del reporte, automaticamente se dispara la consulta del mismo
		// Aplica también para los reportes que no son el Inventario Actiov pues es la primera consulta por omisión
		<?php if($Id_Reporte_Version != null || $NombreTabla != "tablaactivos") { ?>generarInventario_<?php echo($NombreTabla); ?>();<?php } ?>
	</script>