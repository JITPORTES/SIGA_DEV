<?php
	// PAGINA QUE PINTA CADA PASO QUE COMPONE EL WORKFLOW A DETALLE
	// Indica si el workflow se ha iniciado o solo se ha generado el esqueleto del mismoi, es decr, no existen registros del workflow
	$workflowIniciado = true;
	// Tipo de workflow (alta, baja, reubicación)
	$workflowNombreProceso = ($NombreTabla == "tablaactivos" ? "Alta" : ($NombreTabla == "tablebajas" ? "Baja" : "Reubicación"));
	// Identificador de Baja
	$Id_Activo_Reubicacion = isset($_POST["Id_Activo_Reubicacion"]) != null ? $_POST["Id_Activo_Reubicacion"] : null;
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h4>Seguimiento del Proceso [<?php echo($workflowNombreProceso); ?>]</h4>
			<?php
				if(count($respuestaConsulta) > 0) {
					if($respuestaConsulta[0]["IdClaveWorkflow"] > 0) {
						// Analiza el primer registro para ubicar si el workflow ha sido iniciado
						$workflowIniciado = $respuestaConsulta[0]["Id_WorkflowActivo"] != null && $respuestaConsulta[0]["CveWorkflow"] == 1 ? true : false;

						?><section class="ps-timeline-sec">
							<div class="container">
								<ol class="ps-timeline">
									<?php for($i = 0; $i < count($respuestaConsulta); $i++) { ?>
											<li>
												<div class="<?php echo($i % 2 == 0 ? "img-handler-top" : "img-handler-bot"); ?>">
													<?php if($respuestaConsulta[$i]["NumEmpleado"] != null) { ?>
														<div><img src="http://207.249.133.119:8080/fotos_chs/<?php echo($respuestaConsulta[$i]["NumEmpleado"]); ?>.jpg" class="img-responsive img-rounded img-inventario-tabla" /></div>
														<div class="text-center"><?php echo("(" . $respuestaConsulta[$i]["NumEmpleado"] . ") " . $respuestaConsulta[$i]["NomEmpleado"]) ?></div><?php
													}
													else { ?>
														<div class="text-center">
															<button id="Paso2" type="button" class="btn btn-circle btn-<?php echo($respuestaConsulta[$i]["Aceptado"] != null ? ($respuestaConsulta[$i]["Aceptado"] == 1 ? "success" : "danger") : "warning"); ?>">
																<i class="fa fa-user fa-3x"></i>
															</button>
														</div>
													<?php } ?>
												</div>
												<div class="<?php echo($i % 2 == 0 ? "ps-bot" : "ps-top"); ?>">
													<div class="speech <?php echo($i % 2 == 0 ? "top" : "bottom"); ?> <?php echo($respuestaConsulta[$i]["Aceptado"] != null ? ($respuestaConsulta[$i]["Aceptado"] == 1 ? "bg-success" : "bg-danger") : "bg-warning"); ?>">
														<h5 class="text-center <?php if($respuestaConsulta[$i]["Id_Activo"] != null) { echo("margin-bottom-5px"); } ?>">
															<b><?php echo($respuestaConsulta[$i]["Descripcion"]); ?></b>
														</h5>
														<?php if($respuestaConsulta[$i]["FechaAlta"] != null) { ?><p class="text-center"><i class="glyphicon glyphicon-info-sign"></i> Solicitado: <?php echo($respuestaConsulta[$i]["FechaAlta"]); ?></p><?php } ?>
														<?php if($respuestaConsulta[$i]["FechaAceptado"] != null) { ?><p class="text-center"><i class="glyphicon glyphicon-ok-circle"></i> Aceptado: <?php echo($respuestaConsulta[$i]["FechaAceptado"]); ?></p><?php } ?>
														<?php if($respuestaConsulta[$i]["Correo"] != null) { ?><p class="text-center"><i class="glyphicon glyphicon-envelope"></i> Correo: <?php echo($respuestaConsulta[$i]["Correo"]); ?></p><?php } ?>
														<?php if($respuestaConsulta[$i]["Id_WorkflowActivo"] != null && $respuestaConsulta[$i]["FechaAceptado"] == null) { ?>
															<p class="text-center"><a href="activos/activo-workflow-confirmacion.php?Id_Activo=<?php echo($respuestaConsulta[$i]["Id_Activo"]); ?>&Id_WorkflowActivo=<?php echo($respuestaConsulta[$i]["Id_WorkflowActivo"]); ?>&CveWorkflow=<?php echo($respuestaConsulta[$i]["CveWorkflow"]); ?><?php if($Id_Activo_Reubicacion != null) { echo("&Id_Activo_Reubicacion=" . $Id_Activo_Reubicacion); } ?>" target="_blank">
																<i class="glyphicon glyphicon-zoom-in"></i> Link de aprobación</a>
															</p>
														<?php } ?>
														<?php if($respuestaConsulta[$i]["Comentario"] != null) { ?>
															<label><i class="glyphicon glyphicon-comment"></i> Comentario:</label>
															<textarea class="form-control" style="height: 50px; background: transparent; border: none; padding: 0px;" readonly="readonly"><?php echo($respuestaConsulta[$i]["Comentario"]); ?></textarea>
														<?php } ?>
													</div>
												</div>
												<span class="<?php echo($i % 2 == 0 ? "ps-sp-top" : "ps-sp-bot"); ?>"><?php echo($respuestaConsulta[$i]["CveWorkflow"]); ?></span>
											</li>
									<?php } ?>
								</ol>
							</div>
						</section><?php

						// Muestra una capa de bloque del workflow en caso de que no se haya creado
						if($Id_Activo != null && $NombreTabla != null && $workflowIniciado == true) {
							?><div class="text-right"><input type="button" class="btn btn-default" data-id-tabla="<?php echo($NombreTabla); ?>" data-id-activo="<?php echo($Id_Activo); ?>" <?php if($Id_Activo_Reubicacion != null) { ?>data-id-activo-reubicacion="<?php echo $Id_Activo_Reubicacion; ?>"<?php } ?> value="Actualizar proceso" onclick="cargarWokflow(this);" /></div><?php
						}
						else {
							?>
								<div style="width: 100%; height: 100%; position: absolute; top: 0; left: 0; background: rgba(240, 240, 240, 0.7);">
									<div class="tablaAnchoAltoFull">
										<div class="pseudoTR">
											<div class="pseudoTdCentradoVertical h-100">
												<div style="background: rgba(255, 255, 255, 1); border: #CCC solid 2px; padding: 2em; display: table; margin: 0 auto; border-radius: 5px;">
													<h4 class="text-center">No se ha iniciado el proceso de seguimiento del Activo</h4>
													<?php if($Id_Activo != null && 1 == 1) { ?>
														<hr />
														<p class="text-center"><button class="btn btn-default chs" data-id-tabla="<?php echo($NombreTabla); ?>" data-id-activo="<?php echo($Id_Activo); ?>" <?php if($Id_Activo_Reubicacion != null) { ?>data-id-activo-reubicacion="<?php echo $Id_Activo_Reubicacion; ?>"<?php } ?> onclick="mostrarAlertConfirm(() => { iniciarWorkflow(this); }, 'Está seguro de activar el proceso de seguimiento de este Activo?');">Iniciar manualmente el proceso</button></p>
													<?php } ?>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php
						}
					}
					else {
						// Ha ocurrido un error en la consulta del workflow
						?><h4 class="text-center"><?php echo($respuestaConsulta[0]["Descripcion"]); ?></h4><?php
					}
				}
				else {
					?><h4 class="text-center">No se ha encontrado información del Workflow</h4><?php
				}
			?>
		</div>
	</div>
</div>