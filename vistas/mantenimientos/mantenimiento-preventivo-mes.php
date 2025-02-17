<!-- ==== Page: mantenimiento-preventivo-mes ==== -->
	<?php
		error_reporting(E_ALL);
		ini_set('display_errors', '1');
		ini_set('display_startup_errors', '1');
		
		// https://www.php.net/manual/es/class.errorexception.php
		//error handler function
		function customError($errno, $errstr, $file, $lineno) {
			echo "<b>Error:</b> [$errno] $errstr $file linea: $lineno<br/>";
		}
		//set error handler
		set_error_handler("customError");
		

		// Contador de elementos por escribir
		$contador = 0;
		// Agrupador Ubicación primaria
		$Id_Ubic_Prim = 0;
		// Agrupador Ubicación secundaria
		$Id_Ubic_Sec = 0;
		
		?>
		<h3>Mantenimientos <?php if($_POST["Modo_Opcion"] == 2) echo " pendientes "; ?>del período del <?php echo($_POST["PeriodoTiempoInicio"]); ?> al <?php echo($_POST["PeriodoTiempoFinal"]); ?>			
		</h3>
		<?php if(trim($_POST["lstFiltrosMantenimiento_tmp"]) != "") { echo "<h4>" . $_POST["lstFiltrosMantenimiento_tmp"] . "</h4>"; } ?>
		<?php if(count($respuestaConsulta) > 0) { ?><h5><?php echo(count($respuestaConsulta)); ?> elemento(s) encontrado(s)</h5><?php } ?>
		<hr />
		<?php
			if (count($respuestaConsulta) > 0) { ?>
				<div>
					<?php
						while($contador < count($respuestaConsulta)) {
							// Escribe el agrupador de Ubicación
							if ($respuestaConsulta[$contador]->Id_Ubic_Prim != $Id_Ubic_Prim) { ?>
								<div style="margin-bottom: 3em;">
									<div class="agrupadorLevel_1"><a href="#IdUbicPrim_<?php echo $_POST["Modo_Opcion"] . "_" . $respuestaConsulta[$contador]->Id_Ubic_Prim; ?>" data-toggle="collapse"><b>Ubicación primaria:</b> <?php echo $respuestaConsulta[$contador]->Desc_Ubic_Prim; ?></a></div>
									<div id="IdUbicPrim_<?php echo $_POST["Modo_Opcion"] . "_" . $respuestaConsulta[$contador]->Id_Ubic_Prim; ?>" class="collapse in" style="padding-left: 5em;"><?php
							}

									if($respuestaConsulta[$contador]->Id_Ubic_Sec != $Id_Ubic_Sec) { ?>
										<div class="agrupadorLevel_2">
											<a  href="#IdUbicPrim_<?php echo $_POST["Modo_Opcion"] . "_" . $respuestaConsulta[$contador]->Id_Ubic_Prim . "_Sec_" . $respuestaConsulta[$contador]->Id_Ubic_Sec; ?>" data-toggle="collapse"><b>Ubicación secundaria:</b> <?php echo $respuestaConsulta[$contador]->Desc_Ubic_Sec; ?></a>
										</div>
										<div id="IdUbicPrim_<?php echo $_POST["Modo_Opcion"] . "_" . $respuestaConsulta[$contador]->Id_Ubic_Prim . "_Sec_" . $respuestaConsulta[$contador]->Id_Ubic_Sec; ?>" class="collapse">
											<table class="table table-personalizada-1">
												<tbody>
													<tr>
														<th class="text-center">&nbsp;</th>
														<th class="text-center">Foto</th>
														<th>Información del Activo</th>
														<th>Información de la Rutina</th>
													</tr><?php
									}

													// Datos del activo
													?><tr>
														<td class="text-center" style="width: 80px; vertical-align: middle;">
															<h4 onclick="pasar_valores_mantenimiento('<?php echo( $respuestaConsulta[$contador]->Id_Actividad . "-" . $respuestaConsulta[$contador]->Fecha_Programada); ?>', '<?php echo($respuestaConsulta[$contador]->Color_Semaforo_Mantenimiento); ?>');">
																<span style="background: <?php echo($respuestaConsulta[$contador]->Color_Semaforo_Mantenimiento); ?>; display: block; border-radius: 50%; padding: 0.5em; width: 40px; height: 40px;">
																	<span class="glyphicon glyphicon-zoom-in cursor-pointer" aria-hidden="true"></span>
																</span>
															</h4>
														</td>
														<td class="text-center" style="vertical-align: middle;">
															<?php if($respuestaConsulta[$contador]->Foto != null) { ?>
																<img src="../Archivos/Archivos-Activos/<?php echo $respuestaConsulta[$contador]->Foto; ?>" alt="Imagen activo" class="img-responsive img-rounded img-inventario-tabla" />
															<?php }
															else { ?>
																<img src="../dist/img/no-camera.png" class="img-responsive img-rounded img-inventario-tabla">
															<?php } ?>
														</td>
														<td style="width: 40%;" class="text-justify">
															<ul>
																<li><b>AF/BC</b> <?php echo $respuestaConsulta[$contador]->AF_BC; ?></li>
																<li><b>Número de serie:</b> <?php echo $respuestaConsulta[$contador]->NumSerie; ?></li>
																<li><b>Nombre:</b> <?php echo $respuestaConsulta[$contador]->Nombre_Activo; ?></li>
																<li><b>Modelo:</b> <?php echo $respuestaConsulta[$contador]->Modelo; ?></li>
															</ul>
														</td>
														<td style="width: 40%;" class="text-justify">
															<ul>
																<li><b>Rutina:</b> <?php echo $respuestaConsulta[$contador]->Nombre_Rutina; ?></li>
																<li><b>Fecha programada:</b> <?php echo date('d/m/Y', strtotime($respuestaConsulta[$contador]->Fecha_Programada)); ?></li>
																<?php
																	if($_POST["Modo_Opcion"] == 1) {
																		?><li><b>Fecha realizada:</b>
																			<?php echo ($respuestaConsulta[$contador]->Fecha_Realizada != null && trim($respuestaConsulta[$contador]->Fecha_Realizada) != "" ? date('d/m/Y', strtotime($respuestaConsulta[$contador]->Fecha_Realizada)) : "Pendiente"); ?>
																		</li><?php
																	}
																	else if($_POST["Modo_Opcion"] == 2) {
																		$dateActual = date_create(date('Ymd'));
																		$dateProgramada = date_create(date('Ymd', strtotime($respuestaConsulta[$contador]->Fecha_Programada)));
																		$diasRetraso = date_diff($dateActual, $dateProgramada);
																		?><li><b>Días de retraso:</b> <span class="bg-danger"><?php echo($diasRetraso->format("%a")); ?> días</span></li>
																<?php } ?>
																<li><b>No. ticket:</b> <?php echo(($respuestaConsulta[$contador]->Id_Solicitud != null ? $respuestaConsulta[$contador]->Id_Solicitud : "Ticket no registrado")); ?></li>
															</ul>
														</td>
													</tr><?php

													// Siguiente elemento
													$Id_Ubic_Prim = $respuestaConsulta[$contador]->Id_Ubic_Prim;
													$Id_Ubic_Sec = $respuestaConsulta[$contador]->Id_Ubic_Sec;
													$cierraAgrupadorLevel_2 = false;
													$cierraAgrupadorLevel_1 = false;
													$contador++;

													// Revisa que el siguiente elemento pertenezca al agrupador de mantenimiento del mes realizados
													if($contador < count($respuestaConsulta)) {
														// El siguiente elemento no pertenece al grupo de nivel 2 actual
														if($respuestaConsulta[$contador]->Id_Ubic_Sec != $Id_Ubic_Sec) {
															$cierraAgrupadorLevel_2 = true;
														}

														// El siguiente elemento no pertenece al grupo de nivel 1 actual
														if($respuestaConsulta[$contador]->Id_Ubic_Prim != $Id_Ubic_Prim) {
															$cierraAgrupadorLevel_1 = true;
														}
													}
													else {
														$cierraAgrupadorLevel_2 = true;
														$cierraAgrupadorLevel_1 = true;
													}

									// Cierra la tabla agrupadora por Ubicación Primaria
									if($cierraAgrupadorLevel_2) { ?>
												</tbody>
											</table>
										</div><?php
									}

							if($cierraAgrupadorLevel_1) {
								?></div>
								</div><?php
							}
						}
					?>
				</div>
		<?php
			}
			else { ?>
				<h3 class="text-center">
					No existen mantenimentos programados
				</h3><?php
			}
		?>
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
<!-- ==== Page: mantenimiento-preventivo-mes ==== -->