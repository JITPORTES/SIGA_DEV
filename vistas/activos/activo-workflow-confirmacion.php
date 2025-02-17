<?php 
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	require_once("../class/SIGA.php");
	require_once("../../controladores/simple_mvc/ActivoController.Class.php");
	require_once("../../datos/mail/correo.php");
	require_once("../../modelos/simple_mvc/ActivoModel.Class.php");
	require_once("../funciones_generales/funciones-despliegue.php");
	include_once("../CURL.php");
	include_once("./../../vistas/include_parametros_comunes.php");


	$obj = new SIGA(); 
	// Activo a validar
	// Se utiliza GET cuando se accede a la página la primera vez. POST cuando se actualiza la Pagina al aceptar/rechazar el paso del Workflow
	$Id_Activo = isset($_GET["Id_Activo"]) != null ? $_GET["Id_Activo"] : (isset($_POST["Id_Activo"]) != null ? $_POST["Id_Activo"] : null);
	// Registro en donde se encuentra la información del workflow
	$Id_WorkflowActivo = isset($_GET["Id_WorkflowActivo"]) != null ? $_GET["Id_WorkflowActivo"] : (isset($_POST["Id_WorkflowActivo"]) != null ? $_POST["Id_WorkflowActivo"] : null);
	// Numero de paso a validar
	$CveWorkflow = isset($_GET["CveWorkflow"]) != null ? $_GET["CveWorkflow"] : (isset($_POST["CveWorkflow"]) != null ? $_POST["CveWorkflow"] : null);
	// Identificador para reubicación
	$Id_Activo_Reubicacion = isset($_GET["Id_Activo_Reubicacion"]) != null ? $_GET["Id_Activo_Reubicacion"] : (isset($_POST["Id_Activo_Reubicacion"]) != null ? $_POST["Id_Activo_Reubicacion"] : null);

	// Determina la acción que debe mostrarse en la pagina
	$workflowEditado = false;
	$respuestaActualizacion = 0;
	$mensajeActualizacion = null;

	// Variables que solo se utilizan al actualizar el workflow
	$accion = isset($_POST["accion"]) != null ? $_POST["accion"] : null;
	$IdUsuario = isset($_POST["IdUsuario"]) != null ? $_POST["IdUsuario"] : null;
	$NumEmpleado = isset($_POST["NumEmpleado"]) != null ? $_POST["NumEmpleado"] : null;
	$txtPassword = isset($_POST["txtPassword"]) != null ? $_POST["txtPassword"] : null;
	$Confirmacion = isset($_POST["Confirmacion"]) != null ? $_POST["Confirmacion"] : null;
	$Comentario = isset($_POST["Comentario"]) != null ? $_POST["Comentario"] : null;


	if($accion == "actualizarWorkflow") {
		// Valida que la clave de la firma electronica sea correcta
		$objUrl = new CURL();
		$url = "https://apps2.hospitalsatelite.com/ws_ved/api/validador/validarpfx";
		$data = array('sistema' => 'SIGA: Workflow de Activos', 'num_emp' => $NumEmpleado, 'password' => $txtPassword);
		$validarPfx = $objUrl->curlData($url, $data);
		
		if($validarPfx["resultado"] > 0) {
			// Llamada al controlador para ejecutar las acciones de actualización
			$WorkflowAdd = new ActivoController($urlSitio);
			// La firma electrónica es válida y por lo tanto, se actualiza/inserta el registro
			$firmaElectronica = $validarPfx["mensaje"];
			// Los parametros fueron pasados internamente al realizar el POST de la propia página
			// Se actualiza el workflow solo y cuando no se haya actualizado anteriormente o cuando se trata de refrescar la página
			$resultadoActualizacion = $WorkflowAdd->WorkflowAddEdit();
			$respuestaActualizacion = $resultadoActualizacion[0]["intResultado"];
			$mensajeActualizacion = $resultadoActualizacion[0]["strMensaje"];
		}
		else {
			// La firma electrónica no es válida y debe mostrarse el formulario de nuevo
			$respuestaActualizacion = $resultadoActualizacion["intResultado"];
			$mensajeActualizacion = $validarPfx["mensaje"];
		}
	}

	// Obtiene la información del Workflow que corresponda en base al Activo y al identificador del Workflow
	$parametrosConsulta = new ActivoModel();
	if($Id_Activo != null) { $parametrosConsulta->Id_Activo = $Id_Activo; }
	if($Id_WorkflowActivo != null) { $parametrosConsulta->Id_WorkflowActivo = $Id_WorkflowActivo; }
	if($Id_Activo_Reubicacion != null) { $parametrosConsulta->Id_Activo_Reubicacion = $Id_Activo_Reubicacion; }
	$consultaInfoWorkflow = $parametrosConsulta->ActivosWorkflowGet($parametrosConsulta);
?>

	<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<title>CHS | Seguimiento del Proceso</title>
			<!-- Tell the browser to be responsive to screen width -->
			<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
			<!-- Bootstrap 3.3.6 -->
			<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
			<!-- Font Awesome -->
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
			<!-- Ionicons -->
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
			<!-- Theme style -->
			<link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
			
			<!-- jQuery 2.2.3 -->
			<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
			<!-- Bootstrap 3.3.6 -->
			<script src="../../bootstrap/js/bootstrap.min.js"></script>


			<!-- ==== File Input ==== -->
			<link rel="stylesheet" href="../../plugins/fileinput/fileinput.css" />
			<script src="../../plugins/fileinput/fileinput.js"></script>
			<script src="../../plugins/fileinput/fileinput_locale_es.js"></script>
			<script src="../../plugins/fileinput/fileInputFuncionesGenericas.js"></script>
			<link href="../../dist/css/estilosPersonalizados.css" type="text/css" rel="stylesheet" />
			<link href="../../dist/css/jquery-confirm.min.css" type="text/css" rel="stylesheet" />
			<script type="text/javascript" src="../../dist/js/jquery-confirm.min.js"></script>

			<!-- ==== Pnotify ==== -->
			<link href="../../plugins/pnotify/dist/pnotify.css" rel="stylesheet">
			<link href="../../plugins/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
			<link href="../../plugins/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
			<script type="text/javascript" src="../../plugins/pnotify/dist/pnotify.js"></script>
			<script type="text/javascript" src="../../plugins/pnotify/dist/pnotify.buttons.js"></script>
			<script type="text/javascript" src="../../plugins/pnotify/dist/pnotify.nonblock.js"></script>
			<script type="text/javascript" src="../../js/Funciones.js"></script>
			<script type="text/javascript" src="../../js/validator.js"></script>


			<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
			<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
			<!--[if lt IE 9]>
				<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
				<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
			<![endif]-->
		</head>
		
		<body class="hold-transition login-page-fixed">
			<div class="tablaAnchoAltoFull">
				<div class="pseudoTR">
					<div class="pseudoTdCentradoVertical">
						<section class="login-block h-100">
							<div class="container h-100 container-tabla"><?php
								if(count($consultaInfoWorkflow) > 0) { ?>
									<div class="row h-100 row-fila">
										<!-- ==== Validación del paso ==== -->
										<div class="col-md-4 h-100 login-sec col-md-celda" style="border-right: #CCC solid 1px;">
											<div class="tablaAnchoAltoFull">
												<div class="pseudoTR">
													<div class="pseudoTD">
														<div>
															<div class="login-logo"><a href="#"><img src="../../dist/img/logo.png" style="max-width: 140px;" class="img-responsive center-block" alt=""></a></div>
															<div class="text-center" style="background-color: #19294a; border: green solid 1px; margin-bottom: 1em;">
																<img src="../../dist/img/LOGO-SIGA-BLANCO.PNG" style="width: initial; height: 60px; margin: 1.5em; display: inline-block;" alt="User Image">
															</div>
														</div>
													</div>
												</div><?php
												if($consultaInfoWorkflow[0]["Aceptado"] == null) { ?>
													<div class="pseudoTR">
														<div class="pseudoTdCentradoVertical h-100">
															<form name="formaWorkflow" method="post">
																<input type="hidden" name="Id_Activo" value="<?php echo($Id_Activo); ?>" />
																<input type="hidden" name="Id_WorkflowActivo" value="<?php echo($Id_WorkflowActivo); ?>" />
																<input type="hidden" name="CveWorkflow" value="<?php echo($CveWorkflow); ?>" />
																<input type="hidden" name="Id_Baja" value="" />
																<input type="hidden" name="accion" value="actualizarWorkflow" />
																<input type="hidden" name="NombreTabla" value="<?php echo $consultaInfoWorkflow[0]["ProcesoNombre"] ?>" />
																<input type="hidden" id="Confirmacion" name="Confirmacion" />
																<?php if($Id_Activo_Reubicacion != null) { ?><input type="hidden" id="Id_Activo_Reubicacion" name="Id_Activo_Reubicacion" value="<?php echo($Id_Activo_Reubicacion); ?>" /><?php } ?>
																

																<div class="row">
																	<div class="col-md-12">
																		<div class="form-group has-feedback">
																			<label class="text-uppercase">Usuario:</label>
																			<div>
																				<input type="hidden" id="Id_Usuario" name="IdUsuario" value="<?php echo($consultaInfoWorkflow[0]["Id_Usuario"]); ?>" />
																				<input type="hidden" id="NumEmpleado" name="NumEmpleado" value="2831"> <!--value="<?php echo($consultaInfoWorkflow[0]["NumEmpleado"]); ?>" /-->
																				<input type="text" id="txtUsuario" name="txtUsuario" class="form-control" disabled value="<?php echo "(" . $consultaInfoWorkflow[0]["NumEmpleado"] . ") " . $consultaInfoWorkflow[0]["NomEmpleado"] ?>" placeholder="Usuario" />
																			</div>
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col-md-12">
																		<div class="form-group has-feedback">
																			<label class="text-uppercase">Contraseña de la firma electrónica:</label>
																			<div><input type="password" id="txtPassword" name="txtPassword" class="form-control" placeholder="Contraseña" value="Zempoala602" /></div>
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col-md-12">
																		<div class="form-group has-feedback">
																			<label class="text-uppercase">Comentario adicional:</label>
																			<div><textarea placeholder="Motivo" class="form-control" id="Comentario" name="Comentario" rows="4" ></textarea></div>
																		</div>
																	</div>
																</div>
															</form>
														</div>
													</div>
													<div class="pseudoTR">
														<div class="pseudoTD h-100 bnt-envio">
															<?php if($consultaInfoWorkflow[0]["TextoInformativo"] != null) { ?>
																<div class="row">
																	<div class="col-md-12">
																		<hr />
																		<p class="text-justify"><b>Estimad@ <?php echo("(" . $consultaInfoWorkflow[0]["NumEmpleado"] . ") " . $consultaInfoWorkflow[0]["NomEmpleado"]); ?>:</b></p>
																		<?php echo($consultaInfoWorkflow[0]["TextoInformativo"]); ?>
																		<hr />
																	</div>
																</div>
															<?php } ?>
															<div class="row">
																<div class="col-md-12">
																	<input type="button" id="btnActulizarWorkflow" name="btnActulizarWorkflow" class="btn btn-primary btn-block chs" value="Aceptar" onclick="$('#Confirmacion').val(1); validarFormulario();" />
																	<input type="button" id="btnActulizarWorkflow" name="btnActulizarWorkflow" class="btn btn-danger btn-block" value="Cancelar" onclick="$('#Confirmacion').val(0); validarFormulario();" />
																</div>
															</div>
														</div>
													</div><?php
												}
												// Paso ya editado previamente
												else { ?>
													<div class="pseudoTR">
														<div class="pseudoTdCentradoVertical" style="height: calc(100vh - 250px) !important;">
															<h4 class="text-center">
																<?php
																	if($mensajeActualizacion != null) {
																		echo($mensajeActualizacion);
																	}
																	else {
																		echo("El paso en el seguimiento del proceso ya ha sido cubierto con anterioridad.");
																	}
																?>
															</h4>
														</div>
													</div>
												<?php } ?>
											</div>
											<!--div class="copy-text">Created with <i class="fa fa-heart"></i> by <a href="http://grafreez.com">Grafreez.com</a></div-->
										</div>

										<!-- ==== Información del activo ==== -->
										<div class="col-md-8 h-100 col-md-celda" style="background-color: #F0F0F0; padding: 0em;">
											<?php
												//Obtiene la información del activo
												$parametrosConsulta = new ActivoModel();
												if($Id_Activo != null) { $parametrosConsulta->Id_Activo = $Id_Activo; }
												$activo = $parametrosConsulta->ActivosGet($parametrosConsulta);
											?>
											<div class="tablaAnchoAltoFull tabla-contenido-activo">
												<div class="pseudoTR">
													<div class="pseudoTD" style="padding: 0 2em;">
														<h3>Seguimiento del Proceso</h3>
													</div>
												</div>
												<div class="pseudoTR h-100">
													<div class="pseudoTdCentradoVertical">
														<div class="container-fluid">
															<!-- ==== Nombre del Activo ==== -->
															<div class="row">
																<div class="col-md-10 col-md-offset-1" style="background-color: #FFF; background-color: #FFF; border: rgba(0,0,0,0.1) solid 5px; border-bottom: 0px; border-top-left-radius: 10px; border-top-right-radius: 10px;">
																	<h4>Activo: <?php echo($activo[0]->AF_BC . " " . $activo[0]->Nombre_Activo); ?></h4>
																</div>
															</div>
															<!-- ==== Imagen del Activo ==== -->
															<div class="row">
																<div class="col-md-12 text-center" style="background: #bec3cc; padding: 1em;">
																	<div class="file-preview" style="background: #FFF; display: table; width: 50%; margin: 0 auto;">
																		<div class=" file-drop-zone">
																			<div class="file-preview-thumbnails">
																				<div class="file-initial-thumbs">
																					<div class="file-preview-initial">
																						<div class="kv-file-content">
																							<a href="<?php echo($urlSitio . "/controladores/activos/siga_activos/Reporte-Alta.php?Id_Activo=" . $Id_Activo); ?>" style="position: relative;" title="Click para ver la ficha del Activo" target="_blank">
																								<img src="<?php echo("../../" . ($activo[0]->Foto != null ? "/Archivos/Archivos-Activos/" . $activo[0]->Foto : "/dist/img/no-camera.png")); ?>" alt="Imagen del activo" class="center-block" style="max-width: 120px !important;" border="0" />
																								<span style="color: red; font-size: 1.8em; background: #FFF; width: 40px; height: 40px; border: red solid 1px; border-radius: 50%; right: -0.9em; margin-top: -1em; position: absolute;"><i class="fa fa-file-pdf-o"></i></span>
																							</a>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<!-- ==== Ficha técnica del Activo ==== -->
															<div class="row">
																<div class="col-md-10 col-md-offset-1" style="background-color: #FFF; border: rgba(0,0,0,0.1) solid 5px; border-top: 0px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; padding-bottom: 2em;">
																	<ul class="listaCeldas">
																		<li class="celdaCol">
																			<h5>Marca</h5>
																			<p><?php echo($activo[0]->Marca != null ? $activo[0]->Marca : "No definido"); ?></p>
																		</li>
																		<li class="celdaCol">
																			<h5>Modelo</h5>
																			<p><?php echo($activo[0]->Modelo != null ? $activo[0]->Modelo : "No definido"); ?></p>
																		</li>
																		<li class="celdaCol">
																			<h5>Número de Serie</h5>
																			<p><?php echo($activo[0]->NumSerie != null ? $activo[0]->NumSerie : "No definido"); ?></p>
																		</li>
																		<li class="celdaCol">
																			<h5>Monto del Activo</h5>
																			<p><?php echo($activo[0]->MontoFactura != null ? "MXN " . number_format($activo[0]->MontoFactura, 2, '.', ',') : "No definido"); ?></p>
																		</li>
																		<li class="celdaCol w-100">
																			<h5>Ubicación Primaria</h5>
																			<p><?php echo($activo[0]->Desc_Ubic_Prim != null ? $activo[0]->Desc_Ubic_Prim : "No definido"); ?></p>
																		</li>
																		<li class="celdaCol w-100">
																			<h5>Ubicación Secundaria</h5>
																			<p><?php echo($activo[0]->Desc_Ubic_Sec != null ? $activo[0]->Desc_Ubic_Sec : "No definido"); ?></p>
																		</li>
																		<li class="celdaCol">
																			<h5>Ubicación Especifica</h5>
																			<p><?php echo($activo[0]->Ubic_Especifica != null ? $activo[0]->Ubic_Especifica : "No definido"); ?></p>
																		</li>
																		<li class="celdaCol">
																			<h5>Propiedad</h5>
																			<p><?php echo($activo[0]->Desc_Propiedad != null ? $activo[0]->Desc_Propiedad : "No definido"); ?></p>
																		</li>
																	</ul>
																	<style>
																		.listaCeldas { display: table; width: 100%; padding: 1em 0em; list-style: none; margin: 0; padding-top: 1em; }
																			.listaCeldas .celdaCol { display: table-cell; float: left; width: 50%; }
																			.listaCeldas .celdaCol h5 { background: #414F69; color: #FFF; font-weight: bold; text-align: center; padding: 5px; border-bottom: #F0F0F0 solid 1px; border-right: #F0F0F0 solid 1px; margin: 0px; }
																			.listaCeldas .celdaCol p { text-align: center; margin: 0px; margin-bottom: 3px; padding: 0; }
																	</style>
																</div>
															</div>
															<!-- ==== Paso del workflow ==== -->
															<div class="row">
																<div class="col-md-12" style="padding-bottom: 1em;">
																	<section class="ps-timeline-sec">
																		<div class="container" style="width: initial;">
																			<ol class="ps-timeline" style="margin: 0; margin-top: 45px;">
																				<li>
																					<div class="ps-bot" style="margin-top: 15px;">
																						<div class="speech top <?php echo($consultaInfoWorkflow[0]["Aceptado"] != null ? ($consultaInfoWorkflow[0]["Aceptado"] == 1 ? "bg-success" : "bg-danger") : "bg-warning"); ?>">
																							<h5 class="text-center">
																								<b><?php echo($consultaInfoWorkflow[0]["Descripcion"]); ?></b>
																							</h5>
																						</div>
																					</div>
																					<span class="ps-sp-top"><?php echo($consultaInfoWorkflow[0]["CveWorkflow"]); ?></span>
																				</li>
																			</ol>
																			<style>
																				@media screen and (max-width: 767px) {
																					.ps-timeline-sec ol.ps-timeline li .ps-bot { width: 85% !important; }
																				}
																			</style>
																		</div>
																	</section>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div><?php
								}
								else { ?>
									<div class="row h-100">
										<div class="col-md-12 h-100 login-sec">
											<div class="tablaAnchoAltoFull">
												<div class="pseudoTR">
													<div class="pseudoTD">
														<div>
															<div class="login-logo"><a href="#"><img src="../../dist/img/logo.png" style="max-width: 140px;" class="img-responsive center-block" alt=""></a></div>
															<div class="text-center" style="background-color: #19294a; border: green solid 1px; margin-bottom: 1em;">
																<img src="../../dist/img/LOGO-SIGA-BLANCO.PNG" style="width: initial; height: 60px; margin: 1.5em; display: inline-block;" alt="User Image">
															</div>
														</div>
													</div>
												</div>
												<div class="pseudoTR">
													<div class="pseudoTdCentradoVertical h-100">
														<div class="error-content">
															<div class="container-fluid">
																<div class="row">
																	<div class="col-md-12 ">
																		<div class="error-text">
																			<div class="im-sheep">
																				<div class="top">
																					<div class="body"></div>
																					<div class="head">
																						<div class="im-eye one"></div>
																						<div class="im-eye two"></div>
																						<div class="im-ear one"></div>
																						<div class="im-ear two"></div>
																					</div>
																				</div>
																				<div class="im-legs">
																					<div class="im-leg"></div>
																					<div class="im-leg"></div>
																					<div class="im-leg"></div>
																					<div class="im-leg"></div>
																				</div>
																			</div>
																			<?php
																				if($mensajeActualizacion != null) {
																					echo("<h4>" . $mensajeActualizacion . "</h4>");
																				}
																				else { ?>
																					<h4>Oops! Acceso no autorizado a la página</h4>
																					<p>Por el momento no puede ser mostrada correctamente la página.</p><?php
																				} ?>
																				<a href="<?php echo($urlSitio) ?>" class="btn btn-primary btn-round">Ir al Inicio</a>
																		</div>
																	</div>
																</div>
																<style>
																	/* https://bootsnipp.com/snippets/5P0WM */
																	.error-content { padding: 0 0 70px; }
																	.error-text{ text-align: center; }
																	.error { font-size: 180px; font-weight: 100; }
																	@keyframes bob {
																		0% { top: 0; }
																		50% { top: 0.2em; }
																	}
																	.im-sheep { display: inline-block; position: relative; font-size: 1em; margin-bottom: 70px; }
																	.im-sheep * { transition: transform 0.3s; }
																	.im-sheep .top { position: relative; top: 0; animation: bob 1s infinite; }
																	.im-sheep:hover .head { transform: rotate(0deg); }
																	.im-sheep:hover .head .im-eye { width: 1.25em; height: 1.25em; }
																	.im-sheep:hover .head .im-eye:before { right: 30%; }
																	.im-sheep:hover .top { animation-play-state: paused; }
																	.im-sheep .head { display: inline-block; width: 5em; height: 5em; border-radius: 100%; background: #253858; vertical-align: middle; position: relative; top: 1em; transform: rotate(30deg); z-index: 2; }
																	.im-sheep .head:before { content: ''; display: inline-block; width: 80%; height: 50%; background: #253858; position: absolute; bottom: 0; right: -10%; border-radius: 50% 40%; }
																	.im-sheep .head:hover .im-ear.one, .im-sheep .head:hover .im-ear.two { transform: rotate(0deg); }
																	.im-sheep .head .im-eye { display: inline-block; width: 1em; height: 1em; border-radius: 100%; background: white; position: absolute; overflow: hidden; }
																	.im-sheep .head .im-eye:before { content: ''; display: inline-block; background: black; width: 50%; height: 50%; border-radius: 100%; position: absolute; right: 10%; bottom: 10%; transition: all 0.3s; }
																	.im-sheep .head .im-eye.one { right: -2%; top: 1.7em; }
																	.im-sheep .head .im-eye.two { right: 2.5em; top: 1.7em; }
																	.im-sheep .head .im-ear { background: #253858; width: 50%; height: 30%; border-radius: 100%; position: absolute; }
																	.im-sheep .head .im-ear.one { left: -10%; top: 5%; transform: rotate(-30deg); }
																	.im-sheep .head .im-ear.two { top: 2%; right: -5%; transform: rotate(20deg); }
																	.im-sheep .body { display: inline-block; width: 7em; height: 7em; border-radius: 100%; background: #0054D1; position: relative; vertical-align: middle; margin-right: -3em; z-index: 1; }
																	.im-sheep .im-legs { display: inline-block; position: absolute; top: 80%; left: 10%; z-index: 0; }
																	.im-sheep .im-legs .im-leg { display: inline-block; background: #141214; width: 0.5em; height: 2.5em; margin: 0.2em; }
																	.im-sheep::before { left: 0; content: ''; display: inline-block; position: absolute; top: 112%; width: 100%; height: 18%; border-radius: 100%; background: rgba(0, 0, 0, 0.2); }
																</style>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<?php
								} ?>
							</div>
						</section>
						<style>
							/* https://bootsnipp.com/snippets/351Vo */
							.login-block { padding: 2em; }
								.login-block > .container { /*box-shadow: 10px 10px 0px rgba(0,0,0,0.1);*/ border-top: #62A9D2 solid 5px; background: #FFF; }
								.login-sec { padding: 2em; }
								.login-sec h2 { margin-bottom:30px; font-weight:800; font-size:30px; color: #DE6262; }
								.login-sec h2:after { content:" "; width:100px; height:5px; background:#FEB58A; display:block; margin-top:20px; border-radius:3px; margin-left: auto; margin-right: auto; }

							@media (min-width: 768px) {
								.container-tabla { display: table; }
									.container-tabla .row-fila { display: table-row; }
									.container-tabla .col-md-celda { display: table-cell; float: none; }
									.container-tabla .tabla-contenido-activo { position: absolute; top: 0; }
							}
						</style>
						<script type="text/javascript">
							// Acciones que se disparan al presionar el botón para validar la firma electrónica
							// Definción para la validación de la forma
							a_fields = {
								'txtUsuario': { 'l': 'Usuario', 'r': true }, 'txtPassword': { 'l': 'Password', 'r': true }
							};
							o_config = { 'to_disable': ['Submit', 'Reset'], 'alert': 1 };
							// validator constructor call
							var v = new validator('formaWorkflow', this.a_fields, this.o_config);
							// Función solo para validar que la infromación del fomulario este completa y valida para después ejecutar la actualización
							function validarFormulario() {
								// Actualiza la regla de validación para el comentario
								a_fields["Comentario"] = { 'l': 'Comentarios', 'r': ($("#Confirmacion").val() == 0 ? true : false) };

								if(v.exec()) {
									// Pide confirmar la acción
									mostrarAlertConfirm(() => { $(".bnt-envio input[type='button']").css("visibility", "hidden"); $("form").submit(); }, "Está seguro de realizar la acción solicitada?");
								}
							}

							// Acciones que se disparan al cargar la página
							$(document).ready(function() {
								<?php if($respuestaActualizacion > 0) { ?>
									mensajesalerta("Exito", "<?php echo($mensajeActualizacion); ?>", "success", "dark");<?php
								}
								else if($respuestaActualizacion < 0) { ?>
									mensajesalerta("Oh No!", "Ocurrio un error al consultar. <?php echo($mensajeActualizacion); ?>", "error", "dark");
								<?php } ?>
							});
						</script>
					</div>
				</div>
			</div>
		</body>
	</html>