<!-- ==== Page: activo-accesorio-consumible-lista ==== -->
<?php
		// https://www.php.net/manual/es/class.errorexception.php
		//error handler function
		function customError($errno, $errstr, $file, $lineno) {
			echo "<b>Error:</b> [$errno] $errstr $file linea: $lineno<br/>";
		}
		//set error handler
		set_error_handler("customError");
?>
<div class="modal fade modalchs" id="activo-accesorio-consumible-lista-modal" data-backdrop="false">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<!-- ==== Titulo de la Ventana Modal ==== -->
			<div class="modal-header azul">
				<button type="button" class="close" aria-label="Close" onclick="$(this).parents('.modal').modal('hide');"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><i class="fa fa-object-group" aria-hidden="true"></i> Accesorios y consumibles ligados al Activo</h4>
			</div>

			<!-- ==== Cuerpo de la Ventana Modal ==== -->
			<div class="modal-body nopsides">
				<div class="container">
					<?php
						// Contador de elementos por escribir
						$contador = 0;
						$TipoActual = 0;
						$consecutivo = 1;
					?>
					<?php
						if (count($respuestaConsulta) > 0) {
							?>
							<h4>Activo: <?php echo $respuestaConsulta[$contador]->AF_BC . " " . $respuestaConsulta[$contador]->Nombre_Activo; ?> </h4>
							<hr /><?php
							while($contador < count($respuestaConsulta)) {
								// Escribe el agrupador de Ubicación
								if ($respuestaConsulta[$contador]->Tipo != $TipoActual) { ?>
									<div style="margin-bottom: 3em;">
										<div class="agrupadorLevel_1"><a href="#TipoActual_<?php echo($respuestaConsulta[$contador]->Tipo); ?>" data-toggle="collapse"><i class="fa <?php echo $respuestaConsulta[$contador]->Tipo == 1 ? 'fa-briefcase' : 'fa-cart-plus'; ?>"></i>&nbsp;<?php echo $respuestaConsulta[$contador]->Nombre_Tipo; ?></a></div>
										<div id="TipoActual_<?php echo($respuestaConsulta[$contador]->Tipo); ?>" class="collapse in">
											<table class="table table-personalizada-1">
												<tbody>
													<tr>
														<th class="text-justify" style="width: 50px;">&nbsp;</th>
														<th class="text-justify" style="width: 20%;">SKU / REF / CAT</th>
														<th class="text-justify">Descripción</th>
														<th class="text-justify" style="width: 20%;">Marca</th>
														<th class="text-justify" style="width: 20%;">Modelo</th>
													</tr><?php
								}
													// Datos del Accesorio/Comsumible
													?><tr>
														<td class="text-right"><?php echo $consecutivo; ?></td>
														<td class="text-justify">
															<?php echo($respuestaConsulta[$contador]->Sku); ?>
														</td>
														<td class="text-justify">
															<?php echo($respuestaConsulta[$contador]->Descripcion); ?>
														</td>
														<td class="text-justify">
															<?php echo($respuestaConsulta[$contador]->Marca); ?>
														</td>
														<td class="text-justify">
															<?php echo($respuestaConsulta[$contador]->Modelo); ?>
														</td>
													</tr><?php

													// Siguiente elemento
													$TipoActual = $respuestaConsulta[$contador]->Tipo;
													$cierraAgrupador = false;
													$cierraAgrupadorLevel_1 = false;
													$contador++;
													$consecutivo++;

													// Revisa que el siguiente elemento pertenezca al agrupador de mantenimiento del mes realizados
													if($contador < count($respuestaConsulta)) {
														// El siguiente elemento no pertenece al grupo actual
														if($respuestaConsulta[$contador]->Tipo != $TipoActual) {
															$cierraAgrupadorLevel_1 = true;
															$consecutivo = 1;
														}
													}
													else {
														// Todos los registros han sido recorridos
														$cierraAgrupadorLevel_1 = true;
													}

								// Cierra la tabla agrupadora por Ubicación Primaria
								if($cierraAgrupadorLevel_1) {
												?></tbody>
											</table>
										</div>
									</div><?php
								}
							}
						}
						else { ?>
							<h3 class="text-center">
								No existen accesorios y consumibles ligados al Activo seleccionado
							</h3><?php
						}
					?>
				</div>
			</div>
		</div>
	</div>

	<style>
		.img-inventario-tabla { max-width: 100px; max-height: 100px; width: initial; margin: 0 auto; }

		.agrupadorLevel_1 { background: #19294a;  }
			.agrupadorLevel_1, .agrupadorLevel_2 { color: #FFF; padding: 1em; text-align: justify; }
			.agrupadorLevel_1 a { color: #FFF; text-decoration: none; }
		.agrupadorLevel_2 { background: #F0F0F0; }
			.agrupadorLevel_2 a { color: #19294a; text-decoration: none; }

		.table-personalizada-1 { border: #f4f4f4 solid 1px; }
			.table-personalizada-1 tbody th { background: #F0F0F0; }
		.cursor-pointer { cursor: pointer; }
	</style>
</div>
<!-- ==== Page: activo-accesorio-consumible-lista ==== -->