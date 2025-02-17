<?php
	//echo ("<!--");
	include_once(dirname(__FILE__) . "/../../vistas/include_parametros_comunes.php");
	include_once(dirname(__FILE__) . "/../../datos/connect/Proveedor.Class.php");
	include_once(dirname(__FILE__) . "/../../modelos/simple_mvc/ActivoAccesorioConsumibleModel.Class.php");
	include_once(dirname(__FILE__) . "/../../modelos/simple_mvc/ActivoModel.Class.php");
	include_once(dirname(__FILE__) . "/../../vistas/CURL.php");
	//echo ("-->");
	

	class ActivoAccesorioConsumibleController {
		private $urlSitio;

		public function __construct($urlSitio)
		{
			//echo ("<!--");
			$this->urlSitio = $urlSitio;

			// Determina que acción(método) ha de ejecutarse
			if (isset($_POST['accion'])) {
				// Obtiene la información los consumibles y los accesorios
				if($_POST['accion'] == "AccesorioConsumibleGet") {
					$this->AccesorioConsumibleGet();
				}
				// Agrega/Midifica los accesorios y consumibles que están ligados al Activo
				else if($_POST['accion'] == "AccesorioConsumibleAddEdit") {
					$this->AccesorioConsumibleAddEdit();
				}
				// Agrega los accesorios y consumibles que están ligados al Activo
				else if($_POST['accion'] == "AccesorioConsumibleDel") {
					$this->AccesorioConsumibleDel();
				}
				// Obtiene el administrador de Accesorios/Consumibles
				else if($_POST['accion'] == "AccesorioConsumibleAdminGet") {
					$this->AccesorioConsumibleAdminGet();
				}
			}
			//echo ("-->");
		}


		// Métodos para el controlador
		// <summary>Obtiene la lista de accesorios y consumibles ligados a un Activo</summary>
		public function AccesorioConsumibleGet() {
			try {
				$file = '../../vistas/activos/activo-accesorio-consumible-lista.php';
				if (file_exists($file)) {
					// Obtiene la información de los accesorios y consumibles ligados a un Activo
					$parametrosConsulta = new ActivoAccesorioConsumibleModel();
					if(isset($_POST['Id_Activo'])) { $parametrosConsulta->Id_Activo = $_POST["Id_Activo"]; }
					if(isset($_POST['Id_Accesorio_Consumible'])) { $parametrosConsulta->Id_Accesorio_Consumible = $_POST["Id_Accesorio_Consumible"]; }
					// Ejecución de la consulta
					$respuestaConsulta = $parametrosConsulta->ActivoAccesorioConsumibleGet($parametrosConsulta);
					// Llamada a la vista que se renderizará
					require $file;
				}
				else {
					throw new Exception('Template not found!');
				}
			}
			catch (\Exception $e) {
				echo $e->getMessage();
			}
		}


		// <summary>Agrega una lista de accesorios/consumibles ligados a un Activo</summary>
		public function AccesorioConsumibleAddEdit() {
			// Objeto a devolver
			$resultadoGeneral = new ResultadoModel();
			$resultadoGeneral->intResultado = 0;
			$resultadoGeneral->strMensaje = "Por el momento no se han agregado o modificado accesorios/consumibles al Activo.";
			// Lista con los consumibles que están ligados al activo para enviar una notificación al Departamento de Compras
			$listaConsumiblesLigados = [];

			// Agrega los Accesorios ligados al Activo
			if(isset($_POST["listaAccesorios"])) {
				$listaAccesorios = $_POST["listaAccesorios"];
				for($filaCamposActual = 0; $filaCamposActual < count($listaAccesorios); $filaCamposActual++) {
					// Obtiene el array con los campos dentro
					$valoresFila = $listaAccesorios[$filaCamposActual];
					// Genera el Objeto que será almacenado
					$parametrosConsulta = new ActivoAccesorioConsumibleModel();
					$parametrosConsulta->Sku = $valoresFila["accesorioConsumibleSKU"];
					$parametrosConsulta->Descripcion = $valoresFila["accesorioConsumibleDescripcion"];
					$parametrosConsulta->Marca = $valoresFila["accesorioConsumibleMarca"];
					$parametrosConsulta->Modelo = $valoresFila["accesorioConsumibleModelo"];
					$parametrosConsulta->Id_Accesorio_Consumible = $valoresFila["accesorioConsumibleId"];
					if(isset($_POST['Id_Usuario'])) { $parametrosConsulta->Id_Usuario = $_POST["Id_Usuario"]; }
					if(isset($_POST['Id_Activo'])) { $parametrosConsulta->Id_Activo = $_POST["Id_Activo"]; }
					// El tipo 1 define que se trata de un Accesorio
					$parametrosConsulta->Tipo = 1;

					// Actualiza o guarda nueva información
					if($parametrosConsulta->Id_Accesorio_Consumible > 0) {
						// Guarda la información del Accesorio ligado al Activo
						$respuestaAccesorio = $parametrosConsulta->ActivoAccesorioConsumibleEdit($parametrosConsulta);
					}
					else { 
						// Guarda la información del Accesorio ligado al Activo
						$respuestaAccesorio = $parametrosConsulta->ActivoAccesorioConsumibleAdd($parametrosConsulta);
					}
					$resultadoGeneral->intResultado = $respuestaAccesorio->intResultado;
					$resultadoGeneral->strMensaje = $respuestaAccesorio->strMensaje;
					//$resultadoGeneral->strParametrosExtra = $respuestaAccesorio->strParametrosExtra;
				}
			}

			// Agrega los Consumibles ligados al Activo
			if(isset($_POST["listaConsumibles"])) {
				$listaConsumibles = $_POST["listaConsumibles"];
				$enviaCorreoNotificacion = false;

				for($filaCamposActual = 0; $filaCamposActual < count($listaConsumibles); $filaCamposActual++) {
					// Obtiene el array con los campos dentro
					$valoresFila = $listaConsumibles[$filaCamposActual];
					// Genera el Objeto que será almacenado
					$parametrosConsulta = new ActivoAccesorioConsumibleModel();
					$parametrosConsulta->Sku = $valoresFila["accesorioConsumibleSKU"];
					$parametrosConsulta->Descripcion = $valoresFila["accesorioConsumibleDescripcion"];
					$parametrosConsulta->Marca = $valoresFila["accesorioConsumibleMarca"];
					$parametrosConsulta->Modelo = $valoresFila["accesorioConsumibleModelo"];
					$parametrosConsulta->Id_Accesorio_Consumible = $valoresFila["accesorioConsumibleId"];
					if(isset($_POST['Id_Usuario'])) { $parametrosConsulta->Id_Usuario = $_POST["Id_Usuario"]; }
					if(isset($_POST['Id_Activo'])) { $parametrosConsulta->Id_Activo = $_POST["Id_Activo"]; }
					// El tipo 2 define que se trata de un Consumible
					$parametrosConsulta->Tipo = 2;

					// Actualiza o guarda nueva información
					if($parametrosConsulta->Id_Accesorio_Consumible > 0) {
						// Guarda la información del Consumible ligado al Activo
						$respuestaConsumible = $parametrosConsulta->ActivoAccesorioConsumibleEdit($parametrosConsulta);
						if($respuestaConsumible->strParametrosExtra == 1) { $enviaCorreoNotificacion = true; }
					}
					else { 
						// Guarda la información del Consumible ligado al Activo
						$respuestaConsumible = $parametrosConsulta->ActivoAccesorioConsumibleAdd($parametrosConsulta);
						$enviaCorreoNotificacion = true;
					}
					$resultadoGeneral->intResultado = $respuestaConsumible->intResultado;
					$resultadoGeneral->strMensaje = $respuestaConsumible->strMensaje;
					//$resultadoGeneral->strParametrosExtra = $respuestaConsumible->strParametrosExtra;

					// Agrega el consumible nuevo o editado
					if($respuestaConsumible->intResultado > 0) {
						array_push($listaConsumiblesLigados, array(
							"consumibleSku" => $valoresFila["accesorioConsumibleSKU"],
							"consumibleDescripcion" => $valoresFila["accesorioConsumibleDescripcion"],
							"consumibleMarca" => $valoresFila["accesorioConsumibleMarca"],
							"consumibleModelo" => $valoresFila["accesorioConsumibleModelo"],
							"consumibleYaRegistrado" => $parametrosConsulta->Id_Accesorio_Consumible > 0 ? true : false,
							"consumibleActualizado" => $respuestaConsumible->strParametrosExtra
						));
					}
				}

				// Envía lo notificación al Departamento de Compras
				// Solo envía las notificaciones cuando se agregaron nuevos consumibles o cuando haya cambiado por lo menos un consumible
				if(count($listaConsumiblesLigados) && $enviaCorreoNotificacion) {
					// Obtiene la información del Activo
					$parametrosConsulta = new ActivoModel();
					if(isset($_POST['Id_Activo'])) { $parametrosConsulta->Id_Activo = $_POST["Id_Activo"]; }
					$datosActivo = $parametrosConsulta->ActivosGet($parametrosConsulta);

					// Verifica que el Activo exista
					if($datosActivo) {
						// Array con el codigo html para generar el cuerpo del correo
						$cuerpoCorreo = [];
						// Datos del Activo
						$infoActivoActual = '<div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
												<table width="100%" border="0" cellspacing="0" cellpadding="0">
													<tbody>
														<tr>
															<td style="padding: 20px;">
																<table width="100%" border="0" cellspacing="0" cellpadding="0">
																	<tbody>
																		<tr>
																			<td colspan="3" align="center"><h4 style="margin: 0; border-bottom: #F0F0F0 solid 1px;">' . $datosActivo[0]->AF_BC . " " . $datosActivo[0]->Nombre_Activo . '</h4></td>
																		</tr>
																		<tr>
																			<td class="specbundle" valign="middle" width="142" align="center">
																				<div class="contentEditableContainer contentImageEditable">
																					<div class="contentEditable">
																						<img src="' . $this->urlSitio . ($datosActivo[0]->Foto != null ? "/Archivos/Archivos-Activos/" . $datosActivo[0]->Foto : "/dist/img/no-camera.png") . '" alt="side image" width="142" data-default="placeholder" border="0">
																					</div>
																				</div>
																			</td>
																			<td width="20" valign="top" class="spechide"></td>
																			<td valign="top" class="specbundle">
																				<table width="100%" cellpadding="0" cellspacing="0" align="center">
																					<tr>
																						<td height="15"></td>
																					</tr>
																					<tr>
																						<td>
																							<div class="contentEditableContainer contentTextEditable">
																								<div class="contentEditable" style="text-align: justify;">
																									<table border="0" width="100%" style="border-left: #F0F0F0 solid 1px; border-top: #F0F0F0 solid 1px;" cellpadding="5" cellspacing="0">
																										<thead>
																											<tr>
																												<th style="background: #414F69; color: #FFF; border-bottom: #F0F0F0 solid 1px; border-right: #F0F0F0 solid 1px; font-size: 11pt;">Marca</th>
																												<th style="background: #414F69; color: #FFF; border-bottom: #F0F0F0 solid 1px; border-right: #F0F0F0 solid 1px; font-size: 11pt;">Modelo</th>
																											</tr>
																										</thead>
																										<tbody>
																											<tr>
																												<td align="center" style="border-bottom: #F0F0F0 solid 1px; border-right: #F0F0F0 solid 1px; font-size: 11pt;">' . $datosActivo[0]->Marca . '</td>
																												<td align="center" style="border-bottom: #F0F0F0 solid 1px; border-right: #F0F0F0 solid 1px; font-size: 11pt;">' . $datosActivo[0]->Modelo .'</td>
																											</tr>
																										</tbody>
																										<thead>
																											<tr>
																												<th style="background: #414F69; color: #FFF; border-bottom: #F0F0F0 solid 1px; border-right: #F0F0F0 solid 1px; font-size: 11pt;">Número de Serie</th>
																												<th style="background: #414F69; color: #FFF; border-bottom: #F0F0F0 solid 1px; border-right: #F0F0F0 solid 1px; font-size: 11pt;">Monto del Activo</th>
																											</tr>
																										</thead>
																										<tbody>
																											<tr>
																												<td align="center" style="border-bottom: #F0F0F0 solid 1px; border-right: #F0F0F0 solid 1px; font-size: 11pt;">' . $datosActivo[0]->NumSerie . '</td>
																												<td align="center" style="border-bottom: #F0F0F0 solid 1px; border-right: #F0F0F0 solid 1px; font-size: 11pt;">' . ($datosActivo[0]->MontoFactura != null ? "MXN " . number_format($datosActivo[0]->MontoFactura, 2, '.', ',') : "-- No definido --") .'</td>
																											</tr>
																										</tbody>
																									</table>
																								</div>
																							</div>
																						</td>
																					</tr>
																				</table>
																			</td>
																		</tr>
																	</tbody>
																</table>
															</td>
														</tr>
													</tbody>
												</table>
											</div>';
						array_push($cuerpoCorreo, $infoActivoActual);

						// Agrega la tabla contenedora de consumibles
						$contenedorConsumibles = '<div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
													<table width="100%" border="0" cellspacing="0" cellpadding="0">
														<tbody>
															<tr>
																<td style="padding: 20px;">
																	<table width="100%" border="0" cellspacing="0" cellpadding="5">
																		<thead>
																			<tr>
																				<td colspan="5" align="center"><h4 style="margin: 0; border-bottom: #F0F0F0 solid 1px;">Lista de consumibles que necesita el Activo</h4></td>
																			</tr>
																			<tr>
																				<th style="background: #414F69; color: #FFF; border-bottom: #F0F0F0 solid 1px; border-right: #F0F0F0 solid 1px; font-size: 11pt;">SKU / REF / CAT</th>
																				<th style="background: #414F69; color: #FFF; border-bottom: #F0F0F0 solid 1px; border-right: #F0F0F0 solid 1px; font-size: 11pt;">Descripción</th>
																				<th style="background: #414F69; color: #FFF; border-bottom: #F0F0F0 solid 1px; border-right: #F0F0F0 solid 1px; font-size: 11pt;">Marca</th>
																				<th style="background: #414F69; color: #FFF; border-bottom: #F0F0F0 solid 1px; border-right: #F0F0F0 solid 1px; font-size: 11pt;">Modelo</th>
																				<th style="background: #414F69; color: #FFF; border-bottom: #F0F0F0 solid 1px; border-right: #F0F0F0 solid 1px; font-size: 11pt;">&nbsp;</th>
																			</tr>
																		</thead>
																		<tbody>';
						array_push($cuerpoCorreo, $contenedorConsumibles);

						// Agrega la lista de consumibles nuevos
						// https://stackoverflow.com/questions/5897745/sorting-an-associative-array-by-boolean-field
						usort($listaConsumiblesLigados, function ($left, $right) { return strnatcmp($left['consumibleYaRegistrado'], $right['consumibleYaRegistrado']); });
						for($i = 0; $i < count($listaConsumiblesLigados); $i++) {
												array_push($cuerpoCorreo, "<tr>" .
																				"<td style='border-bottom: #F0F0F0 solid 1px; border-right: #F0F0F0 solid 1px; font-size: 11pt;'>" . $listaConsumiblesLigados[$i]["consumibleSku"] . "</td>" .
																				"<td style='border-bottom: #F0F0F0 solid 1px; border-right: #F0F0F0 solid 1px; font-size: 11pt;'>" . $listaConsumiblesLigados[$i]["consumibleDescripcion"] . "</td>" .
																				"<td style='border-bottom: #F0F0F0 solid 1px; border-right: #F0F0F0 solid 1px; font-size: 11pt;'>" . $listaConsumiblesLigados[$i]["consumibleMarca"] . "</td>" .
																				"<td style='border-bottom: #F0F0F0 solid 1px; border-right: #F0F0F0 solid 1px; font-size: 11pt;'>" . $listaConsumiblesLigados[$i]["consumibleModelo"] . "</td>" .
																				"<td align='center' style='border-bottom: #F0F0F0 solid 1px; border-right: #F0F0F0 solid 1px; font-size: 11pt;'>" . ($listaConsumiblesLigados[$i]["consumibleYaRegistrado"] == true ? ($listaConsumiblesLigados[$i]["consumibleActualizado"] == 1 ? "Editado" : "Sin cambios") : "<b>Nuevo</b>") . "</td>" .
																			"</tr>");
						}

						// Cierra la tabla contenedora de consumibles
						$contenedorConsumibles = 						'</tbody>
																	</table>
																</td>
															</tr>
														</tbody>
													</table>
												</div>';
						array_push($cuerpoCorreo, $contenedorConsumibles);
						// Texto final
						array_push($cuerpoCorreo, (
														$parametrosConsulta->Id_Area == 1 ?
														'<div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;"> 
															<div style="padding: 20px; border: #FFF solid 1px;">
																<p style="text-align: justify; font-size: 11pt;">En caso de alguna eventualidad favor de comunicarse con el personal de Ingeniería Biomédica al 5089.1410 Ext.2222 / 2169.</p>
															</div>
														</div>'
														:
														''
												) .
												(
													strrpos($this->urlSitio, "pruebas") ?
														'<div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;"> 
															<div style="padding: 20px; border: #FFF solid 1px;">
																<h3 style="color: red; text-align: center;">Este es un correo de Prueba. Favor de no tomar en cuenta.</h3>
															</div>
														</div>'
														:
														""
												)
											);

						// Genera el cuerpo completo del correo
						$url = $this->urlSitio . '/vistas/activos/activo-correo-estructura.php';
						$content = file_get_contents($url);
						$cuerpoCorreoCompleto = str_replace('{{AccionCorreo}}', '<h2 style="color: #555555; margin: 0;">Consumibles ligados al Activo</h2><p>Han ocurrido actualizaciones en los consumibles del Activo</p>', $content);
						$cuerpoCorreoCompleto = str_replace('{{CuerpoCentralCorreo}}', implode("", $cuerpoCorreo), $cuerpoCorreoCompleto);
						
						// Envía el correo
						$obj = new CURL();
						$url = "http://207.249.133.119:8080/envio_correo_externo/send_external_email.asp";
						// Correos para compras, planeación y farmacia
						$correosNotificacion = "tnuno@hospitalsatelite.com; cbenitez@hospitalsatelite.com; mmontoya@hospitalsatelite.com; ";
						if($parametrosConsulta->Id_Area == 1) { $correosNotificacion .= "srodriguez@hospitalsatelite.com; biomedica@hospitalsatelite.com"; }
						// Correo en caso del sitio de Pruebas
						if(strrpos($this->urlSitio, "pruebas")) { $correosNotificacion = 'jrivera@hospitalsatelite.com'; }
						// Envío de correo
						$data = array('strPassword'=>'C68H17S49', 'strSubject'=>'SIGA: Solicitud Alta de Consumibles', 'strTo'=>$correosNotificacion, 'strHTMLBody'=>$cuerpoCorreoCompleto);
						$correoASP = $obj->curlData($url, $data);
					}
				}
			}
			echo json_encode($resultadoGeneral);
		}


		// <summary>Elimina un accesorio y/o consumible ligados a un Activo</summary>
		public function AccesorioConsumibleDel() {
			$parametrosConsulta = new ActivoAccesorioConsumibleModel();
			if(isset($_POST['Id_Activo'])) { $parametrosConsulta->Id_Activo = $_POST["Id_Activo"]; }
			if(isset($_POST['Id_Accesorio_Consumible'])) { $parametrosConsulta->Id_Accesorio_Consumible = $_POST["Id_Accesorio_Consumible"]; }
			// Ejecución de la consulta
			echo json_encode($parametrosConsulta->ActivoAccesorioConsumibleDel($parametrosConsulta));
		}


		// <summary>Obtiene la lista de accesorios y consumibles ligados a un Activo</summary>
		public function AccesorioConsumibleAdminGet() {
			try {
				$file = '../../vistas/activos/activo-accesorio-consumible-admin.php';
				if (file_exists($file)) {
					// Obtiene la información de los accesorios y consumibles ligados a un Activo
					$parametrosConsulta = new ActivoAccesorioConsumibleModel();
					if(isset($_POST['Id_Activo'])) { $parametrosConsulta->Id_Activo = $_POST["Id_Activo"]; }
					if(isset($_POST['Id_Accesorio_Consumible'])) { $parametrosConsulta->Id_Accesorio_Consumible = $_POST["Id_Accesorio_Consumible"]; }
					// Ejecución de la consulta
					$respuestaConsulta = $parametrosConsulta->ActivoAccesorioConsumibleGet($parametrosConsulta);
					// Llamada a la vista que se renderizará
					require $file;
				}
				else {
					throw new Exception('Template not found!');
				}
			}
			catch (\Exception $e) {
				echo $e->getMessage();
			}
		}
	}

	// Creación del objeto controlador y al crearse, se ejecuta el método
	$llamarMetodo = new ActivoAccesorioConsumibleController($urlSitio);
?>