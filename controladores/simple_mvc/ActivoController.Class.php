<?php
	include_once(dirname(__FILE__) . "/../../vistas/include_parametros_comunes.php");
	include_once(dirname(__FILE__) . "/../../datos/connect/Proveedor.Class.php");
	include_once(dirname(__FILE__) . "/../../modelos/simple_mvc/ActivoModel.Class.php");
	include_once(dirname(__FILE__) . "/../../modelos/simple_mvc/ResultadoModel.Class.php");
	include_once(dirname(__FILE__) . "/../../vistas/CURL.php");

	class ActivoController {
		private $urlSitio;

		// Constructor
		public function __construct($urlSitio)
		{
			$this->urlSitio = $urlSitio;

			// Determina que acción(método) ha de ejecutarse
			if (isset($_POST['accion'])) {
				if($_POST['accion'] == "ActivosGet") {
					$this->ActivosGet();
				}
				else if($_POST['accion'] == "UsuariosConActivosGet") {
					$this->UsuariosConActivosGet();
				}
				else if($_POST['accion'] == "ActivosXArea") {
					$this->ActivosXArea();
				}
				else if($_POST['accion'] == "ReubicacionReasignacionMasiva") {
					$this->ReubicacionReasignacionMasiva();
				}


				// Workflow Activos
				if($_POST['accion'] == "WorkflowGet") {
					$this->WorkflowGet();
				}
				if($_POST['accion'] == "AddWorkflow") {
					$this->WorkflowAddEdit();
				}
			}
		}


		// Métodos para el controlador
		// <summary>Devuelve una vista con la lista de activos de acuerdo a los fitros pasados como parámetros</summary>
		public function ActivosGet() {
			try {
				$file = '../../vistas/activos/activo-responsable-lista.php';
				if (file_exists($file)) {
					// Obtiene la información de los activos
					$parametrosConsulta = new ActivoModel();
					if(isset($_POST['Id_Area'])) { $parametrosConsulta->Id_Area = $_POST["Id_Area"]; }
					if(isset($_POST['Marca'])) { $parametrosConsulta->Marca = $_POST["Marca"]; }
					if(isset($_POST['Modelo'])) { $parametrosConsulta->Modelo = $_POST["Modelo"]; }
					if(isset($_POST['Num_Empleado'])) { $parametrosConsulta->Num_Empleado = $_POST["Num_Empleado"]; }
					if(isset($_POST['Id_Ubic_Prim'])) { $parametrosConsulta->Id_Ubic_Prim = $_POST["Id_Ubic_Prim"]; }
					if(isset($_POST['Id_Ubic_Sec'])) { $parametrosConsulta->Id_Ubic_Sec = $_POST["Id_Ubic_Sec"]; }
					if(isset($_POST['Id_Propiedad'])) { $parametrosConsulta->Id_Propiedad = $_POST["Id_Propiedad"]; }
					if(isset($_POST['SoloInventarioUsable'])) { $parametrosConsulta->SoloInventarioUsable = $_POST["SoloInventarioUsable"]; }
					
					if(isset($_POST['Id_Activo'])) { $parametrosConsulta->Id_Activo = $_POST["Id_Activo"]; }
					else if(isset($_POST['Cad_Id_Activo'])) { $parametrosConsulta->Id_Activo = $_POST["Cad_Id_Activo"]; }

					// Ejecución de la consulta
					$respuestaConsulta = $parametrosConsulta->ActivosGet($parametrosConsulta);
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


		// <summary>Devuelve una lista de Usuarios que actualmente tienen activos asignados</summary>
		public function UsuariosConActivosGet() {
			// Obtiene la información de los mantenimientos
			$parametrosConsulta = new ActivoModel();
			if(isset($_POST['Id_Area'])) { $parametrosConsulta->Id_Area = $_POST["Id_Area"]; }
			if(isset($_POST['Num_Empleado'])) { $parametrosConsulta->Num_Empleado = $_POST["Num_Empleado"]; }
			//if(isset($_POST['SoloConActivos'])) { $parametrosConsulta->SoloConActivos = $_POST["SoloConActivos"]; }
			echo json_encode($parametrosConsulta->UsuariosConActivosGet($parametrosConsulta));
		}


		// <summary>Devuelve la lista de Activos que hay en un Area en especifico</summary>
		public function ActivosXArea() {
			// Obtiene la información de los mantenimientos
			$parametrosConsulta = new ActivoModel();
			if(isset($_POST['Id_Area'])) { $parametrosConsulta->Id_Area = $_POST["Id_Area"]; }
			echo json_encode($parametrosConsulta->ActivosGet($parametrosConsulta));
		}


		// <summary>Actualiza un grupo de Activos pasados como parámetros</summary>
		public function ReubicacionReasignacionMasiva() {
			// Obtiene la información de los mantenimientos
			$parametrosConsulta = new ActivoModel();
			if(isset($_POST['Cad_Id_Activos'])) { $parametrosConsulta->Cad_Id_Activos = $_POST["Cad_Id_Activos"]; }
			if(isset($_POST['ComentarioReasignacion'])) { $parametrosConsulta->ComentarioReasignacion = $_POST["ComentarioReasignacion"]; }
			if(isset($_POST['IdUsuarioReasignacion'])) { $parametrosConsulta->Num_Empleado = $_POST["IdUsuarioReasignacion"]; }
			if(isset($_POST['Id_Ubic_Prim'])) { $parametrosConsulta->Id_Ubic_Prim = $_POST["Id_Ubic_Prim"]; }
			if(isset($_POST['Id_Ubic_Sec'])) { $parametrosConsulta->Id_Ubic_Sec = $_POST["Id_Ubic_Sec"]; }
			if(isset($_POST['Id_Area'])) { $parametrosConsulta->Id_Area = $_POST["Id_Area"]; }
			if(isset($_POST['Usr_Mod'])) { $parametrosConsulta->Usr_Mod = $_POST["Usr_Mod"]; }
			if(isset($_POST['Ubic_Especifica'])) { $parametrosConsulta->Ubic_Especifica = $_POST["Ubic_Especifica"]; }
			if(isset($_POST['Centro_Costos'])) { $parametrosConsulta->Centro_Costos = $_POST["Centro_Costos"]; }

			// Objeto para guardar la respuesrta de las acciones realizadas
			$respuesta = new ResultadoModel();
			$respuesta = $parametrosConsulta->ActivosReubicacionReasignacionMasiva($parametrosConsulta);
			// La actualización se realizó de manera correcta por lo cual se deberá mandar un mensaje de correo electrónico
			if($respuesta->intResultado > 0) {
				// Arma los correos que deben enviarse
				$NumEmpleadoActual = 0;
				$lstActivos = $respuesta->strParametrosExtra;
				$listaActivosGrupo = [];
				$filaActual = 0;
				$Correo_Empleado_Origen = null;

				while($filaActual < count($lstActivos)) {
					if($lstActivos[$filaActual]["Num_Empleado_Origen"] != $NumEmpleadoActual) {
						// Elimina la información previa cargada en el array de control
						$listaActivosGrupo = [];
						// Agrega el correo del Usuario responsable original
						$Correo_Empleado_Origen = $lstActivos[$filaActual]["Correo_Empleado_Origen"];
					}


					// Imagen del Activo
					$imagenActivo = '<td class="specbundle" valign="middle" width="142" align="center">
										<div class="contentEditableContainer contentImageEditable">
											<div class="contentEditable">
												<img src="' . $this->urlSitio . ($lstActivos[$filaActual]["Foto"] != null ? "/Archivos/Archivos-Activos/" . $lstActivos[$filaActual]["Foto"] : "/dist/img/no-camera.png") . '" alt="side image" width="142" data-default="placeholder" border="0">
											</div>
										</div>
									</td>';
					// Info del Activo
					$infoActivo = '<td valign="top" class="specbundle">
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
																		<td align="center" style="border-bottom: #F0F0F0 solid 1px; border-right: #F0F0F0 solid 1px; font-size: 11pt;">' . $lstActivos[$filaActual]["Marca"] . '</td>
																		<td align="center" style="border-bottom: #F0F0F0 solid 1px; border-right: #F0F0F0 solid 1px; font-size: 11pt;">' . $lstActivos[$filaActual]["Modelo"] .'</td>
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
																		<td align="center" style="border-bottom: #F0F0F0 solid 1px; border-right: #F0F0F0 solid 1px; font-size: 11pt;">' . $lstActivos[$filaActual]["NumSerie"] . '</td>
																		<td align="center" style="border-bottom: #F0F0F0 solid 1px; border-right: #F0F0F0 solid 1px; font-size: 11pt;">' . ($lstActivos[$filaActual]["ImporteSeguros"] != null ? "MXN " . number_format($lstActivos[$filaActual]["ImporteSeguros"], 2, '.', ',') : "-- No definido --") .'</td>
																	</tr>
																</tbody>
																<thead><tr><th colspan="2" style="background: #414F69; color: #FFF; border-bottom: #F0F0F0 solid 1px; border-right: #F0F0F0 solid 1px; font-size: 11pt;">Responsable</th></tr></thead>
																<tbody><tr><td colspan="2" style="border-bottom: #F0F0F0 solid 1px; border-right: #F0F0F0 solid 1px; font-size: 11pt;">' . ($lstActivos[$filaActual]["Num_Empleado_Origen"] !== $lstActivos[$filaActual]["Num_Empleado_Destino"] ? "De <i>" . $lstActivos[$filaActual]["Num_Empleado_Origen"] . " " . $lstActivos[$filaActual]["Nombre_Empleado_Origen"] . "</i> al nuevo responsable " : "") . $lstActivos[$filaActual]["Num_Empleado_Destino"] . " " . $lstActivos[$filaActual]["Nombre_Empleado_Destino"] . '</td></tr></tbody>
																<thead><tr><th colspan="2" style="background: #414F69; color: #FFF; border-bottom: #F0F0F0 solid 1px; border-right: #F0F0F0 solid 1px; font-size: 11pt;">Ubicación primaria</th></tr></thead>
																<tbody><tr><td colspan="2" style="border-bottom: #F0F0F0 solid 1px; border-right: #F0F0F0 solid 1px; font-size: 11pt;">' . ($lstActivos[$filaActual]["Id_Ubic_Prim_Origen"] != $lstActivos[$filaActual]["Id_Ubic_Prim_Destino"] ? "De <i>" . $lstActivos[$filaActual]["Nombre_Ubic_Prim_Origen"]  . "</i> a " : "") . $lstActivos[$filaActual]["Nombre_Ubic_Prim_Destino"] .' </td></tr></tbody>
																<thead><tr><th colspan="2" style="background: #414F69; color: #FFF; border-bottom: #F0F0F0 solid 1px; border-right: #F0F0F0 solid 1px; font-size: 11pt;">Ubicación secundaria</th></tr></thead>
																<tbody><tr><td colspan="2" style="border-bottom: #F0F0F0 solid 1px; border-right: #F0F0F0 solid 1px; font-size: 11pt;">' . ($lstActivos[$filaActual]["Id_Ubic_Sec_Origen"] != $lstActivos[$filaActual]["Id_Ubic_Sec_Destino"] ? "De <i>" . $lstActivos[$filaActual]["Nombre_Ubic_Sec_Origen"]  . "</i> a " : "") . $lstActivos[$filaActual]["Nombre_Ubic_Sec_Destino"] . '</td></tr></tbody>
															</table>
														</div>
													</div>
												</td>
											</tr>
										</table>
									</td>';
					// Agrega la info del Activo
					$infoActivoActual = '<div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tbody>
								<tr>
									<td style="padding: 20px;">
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
											<tbody>
												<tr>
													<td colspan="3" align="center"><h4 style="margin: 0; border-bottom: #F0F0F0 solid 1px;">' . $lstActivos[$filaActual]["AF_BC"] . " " . $lstActivos[$filaActual]["Nombre_Activo"] . '</h4></td>
												</tr>
												<tr>' .
													(count($listaActivosGrupo) % 2 == 0 ? $imagenActivo : $infoActivo) .
													'<td width="20" valign="top" class="spechide"></td>' .
													(count($listaActivosGrupo) % 2 == 0 ? $infoActivo : $imagenActivo) .
												'<tr>
												</tr>
													<td colspan="3" align="center">
														<h4 style="border-bottom: #F0F0F0 solid 1px; margin-top: 10px; padding: 8px 0px;">
															<a href="' . $this->urlSitio . '/controladores/activos/siga_activos/Reporte-Reubicacion.php?Id_Activo_Reubicacion=' . $lstActivos[$filaActual]["Id_Activo_Reubicacion"] . "&Id_Activo=" . $lstActivos[$filaActual]["Id_Activo"] . '" style="color: #069; text-decoration: none;">Click para ver el formato de reubicación</a>
														</h4>
													</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
							</tbody>
						</table>
					</div>';
					array_push($listaActivosGrupo, $infoActivoActual);


					// Lista de correos
					$NumEmpleadoActual = $lstActivos[$filaActual]["Num_Empleado_Origen"];
					$Correo_Empleado_Destino = $lstActivos[$filaActual]["Correo_Empleado_Destino"];
					$Correo_Jefe_Area = $lstActivos[$filaActual]["Correo_Jefe_Area"] .
										($lstActivos[$filaActual]["Correo_Personal_Seguimiento"] != null ? ";" . $lstActivos[$filaActual]["Correo_Personal_Seguimiento"] : "") .
										($lstActivos[$filaActual]["Correo_Usuario_Actualiza"] != null ? ";" . $lstActivos[$filaActual]["Correo_Usuario_Actualiza"] : "");

					// Siguiente fila
					$filaActual++;
					// Revisa si debe enviarse el correo o se agrega un siguiente elemento
					$envioCorreo = false;
					if($filaActual < count($lstActivos)) {
						// El usuario responsable cambia por lo que se trata de un nuevo grupo de elementos
						if($lstActivos[$filaActual]["Num_Empleado_Origen"] != $NumEmpleadoActual) { $envioCorreo = true; }
					}
					else {
						// Fin de los registros y por lo tanto se envía el correo con la información acumulada
						$envioCorreo = true;
					}

					if($envioCorreo) { 
						// Genera el cuerpo completo del correo
						$url = $this->urlSitio . '/vistas/activos/activo-correo-estructura.php';
						$content = file_get_contents($url);
						// Cuerpo del correo a enviar
						$cuerpoCorreo = implode("", $listaActivosGrupo) .
										'<div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">' .
											'<div style="padding: 20px; border: #FFF solid 1px;">
												<h4>Motivo de la actualización</h4>
												<p style="text-align: justify; font-size: 11pt;">' . str_replace(["\r\n", "\r", "\n"], "<br/>", $parametrosConsulta->ComentarioReasignacion) . "</p>
											</div>" .
										'</div>' .
										(
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
										);
						$cuerpoCorreoCompleto = str_replace('{{AccionCorreo}}', '<h2 style="color: #555555; margin: 0;">Cambios en los Activos</h2><p>Han ocurrido actualizaciones en los siguientes Activos.</p>', $content);
						$cuerpoCorreoCompleto = str_replace('{{CuerpoCentralCorreo}}', $cuerpoCorreo, $cuerpoCorreoCompleto);
						
						// Envía el correo
						$obj = new CURL();
						$url = "http://207.249.133.119:8080/envio_correo_externo/send_external_email.asp";
						$correosNotificacion = $Correo_Empleado_Destino . ($Correo_Empleado_Origen != $Correo_Empleado_Destino ? ";" . $Correo_Empleado_Origen : "");
						//$data = array('strPassword' => 'C68H17S49', 'strSubject' => 'SIGA: Reasignacio|n de Activos', 'strTo'=>$correosNotificacion, 'strHTMLBody'=>$cuerpoCorreoCompleto, 'strCc'=> $Correo_Jefe_Area);
						$data = array('strPassword' => 'C68H17S49', 'strSubject' => 'SIGA: Reasignacio|n de Activos', 'strTo'=>$correosNotificacion, 'strHTMLBody'=>$cuerpoCorreoCompleto);
						$correoASP = $obj->curlData($url, $data);
					}
				}
			}

			// Regresa el objeto Json
			$resultado = new ResultadoModel();
			$resultado->intResultado = $respuesta->intResultado;
			$resultado->strMensaje = $respuesta->strMensaje;
			echo json_encode($resultado);
		}




		// WORKFLOW
		// <summary>Devuelve la vista del workflow del Proceso pasado como parámetro</summary>
		function WorkflowGet() {
			try {
				$file = '../../vistas/activos/activo-workflow-administracion.php';
				if (file_exists($file)) {
					// Obtiene la información de los activos
					$parametrosConsulta = new ActivoModel();
					if(isset($_POST['Id_Activo'])) { $parametrosConsulta->Id_Activo = $_POST["Id_Activo"]; }
					if(isset($_POST['NombreTabla'])) { $parametrosConsulta->NombreTabla = $_POST["NombreTabla"]; }
					if(isset($_POST['Id_Area'])) { $parametrosConsulta->Id_Area = $_POST["Id_Area"]; }
					if(isset($_POST['Id_Activo_Reubicacion'])) { $parametrosConsulta->Id_Activo_Reubicacion = $_POST["Id_Activo_Reubicacion"]; }

					// Ejecución de la consulta
					$NombreTabla = isset($_POST['NombreTabla']) != null ? $_POST['NombreTabla'] : null;
					$Id_Activo = isset($_POST['Id_Activo']) != null ? $_POST['Id_Activo'] : null;
					$respuestaConsulta = $parametrosConsulta->ActivosWorkflowGet($parametrosConsulta);
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


		// <summary>Guarda/Actualiza el workflow con los parámetros pasados como parámetros</summary>
		function WorkflowAddEdit() {
			// Indica que esta variable viene del contexto en donde se llamó al controlador
			global $firmaElectronica;
			$Origen = isset($_POST['Origen']) ? $_POST["Origen"] : null;

			// Obtiene la información de los activos
			$parametrosConsulta = new ActivoModel();
			if(isset($_POST['Id_Activo'])) { $parametrosConsulta->Id_Activo = $_POST["Id_Activo"]; }
			if(isset($_POST['Id_WorkflowActivo'])) { $parametrosConsulta->Id_WorkflowActivo = $_POST["Id_WorkflowActivo"]; }
			if(isset($_POST['CveWorkflow'])) { $parametrosConsulta->CveWorkflow = $_POST["CveWorkflow"]; }
			if(isset($_POST['NombreTabla'])) { $parametrosConsulta->NombreTabla = $_POST["NombreTabla"]; }
			if(isset($_POST['IdUsuario'])) { $parametrosConsulta->IdUsuario = $_POST["IdUsuario"]; }
			if(isset($_POST['Confirmacion'])) { $parametrosConsulta->Confirmacion = $_POST["Confirmacion"]; }
			if(isset($_POST['Comentario'])) { $parametrosConsulta->Comentario = $_POST["Comentario"]; }
			if(isset($_POST['Id_Activo_Reubicacion'])) { $parametrosConsulta->Id_Activo_Reubicacion = $_POST["Id_Activo_Reubicacion"]; }
			if($firmaElectronica != null) { $parametrosConsulta->FirmaElectronica = $firmaElectronica; }

			// Ejecución de la consulta
			$resultadoUpdateWorkflow = $parametrosConsulta->ActivosWorkflowAdd($parametrosConsulta);
			if($resultadoUpdateWorkflow[0]["intResultado"] > 0) {
				// Envía el correo de notificación para mandar el siguiente paso en el workflow en caso de que siga activo
				// Genera el cuerpo completo del correo
				$url = $this->urlSitio . '/vistas/activos/activo-correo-estructura.php';
				$content = file_get_contents($url);

				// Obtiene la información del Activo
				if(isset($_POST['Id_Activo'])) { $parametrosConsulta->Id_Activo = $_POST["Id_Activo"]; }
				// Ejecución de la consulta
				$respuestaConsulta = $parametrosConsulta->ActivosGet($parametrosConsulta);

				// Agrega la info del Activo
				if(count($respuestaConsulta) > 0) {
					// Verifica que el Activo se haya consultado correctamente
					if($respuestaConsulta[0]->Id_Activo > 0) {
						// Almacena la lista de nomres y correos de los Usuarios que participan en el workflow
						$listaUsuariosCorreos = [];
						$listaUsuariosNombres = [];

						// Recupera el workflow para obtener información complementaria para agregarla al cuerpo del correo
						$parametrosConsulta->Id_WorkflowActivo = null;
						$consutaWorkflowCompleto = $parametrosConsulta->ActivosWorkflowGet($parametrosConsulta);
						if($resultadoUpdateWorkflow[0]["FinWorkflow"] || ($parametrosConsulta->Confirmacion == 0 && $parametrosConsulta->Confirmacion != null)) {
							// Fin del workflow o se ha rechazado el paso, se notificará a todos los usuarios
							for($i = 0; $i < count($consutaWorkflowCompleto); $i++) {
								array_push($listaUsuariosCorreos, $consutaWorkflowCompleto[$i]["Correo"]);
								array_push($listaUsuariosNombres, '(' . $consutaWorkflowCompleto[$i]["NumEmpleado"] . ') '. $consutaWorkflowCompleto[$i]["NomEmpleado"]);
							}
						}
						else {
							// Se notifica al Usuario del paso actual
							array_push($listaUsuariosCorreos, $resultadoUpdateWorkflow[0]["CorreoEmpleadoProximoPaso"]);
							array_push($listaUsuariosNombres, '(' . $resultadoUpdateWorkflow[0]["NumEmpleadoProximoPaso"] . ') '. $resultadoUpdateWorkflow[0]["NombreEmpleadoProximoPaso"]);
						}

						// Genera el cuerpo de la notificación vía correo electrónico
						$cuerpoCorreo = '<div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
											<table width="100%" border="0" cellspacing="0" cellpadding="0">
												<tbody>
													<tr>
														<td style="padding: 20px;">
															<table width="100%" border="0" cellspacing="0" cellpadding="0">
																<tbody>
																	<tr>
																		<td colspan="3">
																			<h4>Estimad@ ' . implode(", ", $listaUsuariosNombres) . '</h4>' .
																			(
																				$parametrosConsulta->Confirmacion == 1 || $parametrosConsulta->Confirmacion == null ?
																				'<p style="text-align: justify;">' .
																				(
																					$resultadoUpdateWorkflow[0]["FinWorkflow"] ?
																					"Se ha concluido correctamente el proceso de solicitud de alta con número de inventario <b>" . $respuestaConsulta[0]->AF_BC . " " . $respuestaConsulta[0]->Nombre_Activo . "</b>. Se anexa la información relevante del activo/bien y liga de acceso al Formato de Alta con folio " . $respuestaConsulta[0]->Id_Activo . ", donde se visualiza toda la información disponible del activo/bien."
																					:
																					$resultadoUpdateWorkflow[0]["strMensaje"]
																				) .
																				'</p>'
																				:
																				'<p style="text-align: justify;">Se ha detenido el proceso de alta del activo/bien con número de inventario <b>' . $respuestaConsulta[0]->AF_BC . " " . $respuestaConsulta[0]->Nombre_Activo . '</b> por ' . '(' . $resultadoUpdateWorkflow[0]["NumEmpleadoProximoPaso"] . ') ' . $resultadoUpdateWorkflow[0]["NombreEmpleadoProximoPaso"] . ', debido al motivo descrito más adelante.</p>'
																			) .
																		'</td>
																	</tr>
																	<tr>
																		<td colspan="3" align="center"><h4 style="border-bottom: #F0F0F0 solid 1px; padding-top: 10px;">' . $respuestaConsulta[0]->AF_BC . " " . $respuestaConsulta[0]->Nombre_Activo . '</h4></td>
																	</tr>
																	<tr>
																		<!-- ==== Imagen del Activo ==== -->
																			<td class="specbundle" valign="middle" width="142" align="center">
																				<div class="contentEditableContainer contentImageEditable">
																					<div class="contentEditable">
																						<img src="' . $this->urlSitio . ($respuestaConsulta[0]->Foto != null ? "/Archivos/Archivos-Activos/" . $respuestaConsulta[0]->Foto : "/dist/img/no-camera.png") . '" alt="side image" width="142" data-default="placeholder" border="0">
																					</div>
																				</div>
																			</td>
																		<!-- ==== ==== -->
																			<td width="20" valign="top" class="spechide"></td>
																		<!-- ==== Información del Activo ==== -->
																			<td valign="top" class="specbundle" width="100%">
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
																												<td align="center" style="border-bottom: #F0F0F0 solid 1px; border-right: #F0F0F0 solid 1px; font-size: 11pt;">' . ($respuestaConsulta[0]->Marca != null ? $respuestaConsulta[0]->Marca : "--No definido--") . '</td>
																												<td align="center" style="border-bottom: #F0F0F0 solid 1px; border-right: #F0F0F0 solid 1px; font-size: 11pt;">' . ($respuestaConsulta[0]->Modelo != null ? $respuestaConsulta[0]->Modelo : "--No definido--") .'</td>
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
																												<td align="center" style="border-bottom: #F0F0F0 solid 1px; border-right: #F0F0F0 solid 1px; font-size: 11pt;">' . ($respuestaConsulta[0]->NumSerie != null ? $respuestaConsulta[0]->NumSerie : "--No definido--") . '</td>
																												<td align="center" style="border-bottom: #F0F0F0 solid 1px; border-right: #F0F0F0 solid 1px; font-size: 11pt;">' . ($respuestaConsulta[0]->MontoFactura != null ? "MXN " . number_format($respuestaConsulta[0]->MontoFactura, 2, '.', ',') : "-- No definido --") . '</td>
																											</tr>
																										</tbody>
																										<thead><tr><th colspan="2" style="background: #414F69; color: #FFF; border-bottom: #F0F0F0 solid 1px; border-right: #F0F0F0 solid 1px; font-size: 11pt;">Responsable</th></tr></thead>
																										<tbody><tr><td colspan="2" style="border-bottom: #F0F0F0 solid 1px; border-right: #F0F0F0 solid 1px; font-size: 11pt;">' . ($respuestaConsulta[0]->UsuarioResponsable !== null ? $respuestaConsulta[0]->UsuarioResponsable : "--No definido--") . '</td></tr></tbody>
																										<thead><tr><th colspan="2" style="background: #414F69; color: #FFF; border-bottom: #F0F0F0 solid 1px; border-right: #F0F0F0 solid 1px; font-size: 11pt;">Ubicación primaria</th></tr></thead>
																										<tbody><tr><td colspan="2" style="border-bottom: #F0F0F0 solid 1px; border-right: #F0F0F0 solid 1px; font-size: 11pt;">' . ($respuestaConsulta[0]->Desc_Ubic_Prim !== null ? $respuestaConsulta[0]->Desc_Ubic_Prim : "--No definido--") .' </td></tr></tbody>
																										<thead><tr><th colspan="2" style="background: #414F69; color: #FFF; border-bottom: #F0F0F0 solid 1px; border-right: #F0F0F0 solid 1px; font-size: 11pt;">Ubicación secundaria</th></tr></thead>
																										<tbody><tr><td colspan="2" style="border-bottom: #F0F0F0 solid 1px; border-right: #F0F0F0 solid 1px; font-size: 11pt;">' . ($respuestaConsulta[0]->Desc_Ubic_Sec !== null ? $respuestaConsulta[0]->Desc_Ubic_Sec : "--No definido--") . '</td></tr></tbody>
																									</table>
																								</div>
																							</div>
																						</td>
																					</tr>
																				</table>
																			</td>
																	</tr>
																	<tr>
																		<td colspan="3" align="center">
																			<h4 style="border-bottom: #F0F0F0 solid 1px; margin-top: 10px; padding: 8px 0px;">
																				<a href="' . $this->urlSitio . '/controladores/activos/siga_activos/Reporte-Alta.php?Id_Activo=' . $parametrosConsulta->Id_Activo . '" style="color: #069; text-decoration: none;">Click para ver la ficha del Activo</a>
																			</h4>
																		</td>
																	</tr>' .
																	(
																		$resultadoUpdateWorkflow[0]["FinWorkflow"] == 0 ?
																		'<tr>
																			<td colspan="3" align="center">
																				<h4 style="border-bottom: #F0F0F0 solid 1px; margin-top: 10px; padding: 8px 0px;">
																					<a href="' . $this->urlSitio . '/vistas/activos/activo-workflow-confirmacion.php?Id_Activo=' . $parametrosConsulta->Id_Activo . "&Id_WorkflowActivo=" . $resultadoUpdateWorkflow[0]["intResultado"] . '&CveWorkflow=' . $resultadoUpdateWorkflow[0]["CveWorkflowProximoPaso"] . ($parametrosConsulta->Id_Activo_Reubicacion != null ? '&Id_Activo_Reubicacion=' . $parametrosConsulta->Id_Activo_Reubicacion: '') . '" style="color: #069; text-decoration: none;">Click para ver el detalle del seguimiento</a>
																				</h4>
																			</td>
																		</tr>'
																		:
																		''
																	) .
																'</tbody>
															</table>
														</td>
													</tr>
												</tbody>
											</table>
										</div>'
										.
										(
											$parametrosConsulta->Comentario != null ?
											'<div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
												<div style="padding: 20px; border: #FFF solid 1px;">
													<h4>Comentarios</h4>
													<p style="text-align: justify; font-size: 11pt;">' . str_replace(["\r\n", "\r", "\n"], "<br/>", $parametrosConsulta->Comentario) . '</p>'
													.
													(
														$parametrosConsulta->Confirmacion == 0 ?
														'<hr /><p style="text-align: justify; font-size: 11pt;">Se ha devuelto el proceso a <b>' . $listaUsuariosNombres[0] . '</b> para atender los comentarios de cancelación reiniciando el proceso automáticamente.</p>'
														:
														""
													)
													.
												'</div>
											</div>'
											:
											''
										)
										.
										(
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
										);
						$cuerpoCorreoCompleto = str_replace('{{AccionCorreo}}', '<h2 style="color: #555555; margin: 0;">Seguimiento del Proceso [' . ($parametrosConsulta->NombreTabla == "tablaactivos" ? "Alta" : ($parametrosConsulta->NombreTabla == "tablebajas" ? "Baja" : "Reubicación")) . '] </h2>', $content);
						$cuerpoCorreoCompleto = str_replace('{{CuerpoCentralCorreo}}', $cuerpoCorreo, $cuerpoCorreoCompleto);

						// Envía el correo
						$obj = new CURL();
						$url = "http://207.249.133.119:8080/envio_correo_externo/send_external_email.asp";
						if(strrpos($this->urlSitio, "pruebas")) {
							$data = array('strPassword' => 'C68H17S49', 'strSubject' => 'SIGA: Seguimiento del Proceso', 'strTo'=>'jrivera@hospitalsatelite.com', 'strHTMLBody'=>$cuerpoCorreoCompleto);
						}
						else {
							$data = array('strPassword' => 'C68H17S49', 'strSubject' => 'SIGA: Seguimiento del Proceso', 'strTo'=>implode(";", $listaUsuariosCorreos), 'strHTMLBody'=>$cuerpoCorreoCompleto);
						}
						$correoASP = $obj->curlData($url, $data);
					}
					else {
						// Se actualizó el workflow pero no pudo recuperarse la información del Activo para enviarse la notificación
						// Ha ocurrido un error en la consulta de la información del Activo
						$resultadoUpdateWorkflow[0]["strMensaje"] = $resultadoUpdateWorkflow[0]["strMensaje"] . " sin embargo, no ha se ha enviado la notificación porque " . $respuestaConsulta[0]->Nombre_Activo;
					}
				}
				else {
					// Se actualizó el workflow pero no pudo recuperarse la información del Activo para enviarse la notificación
					// El activo a mostrar no existe
					$resultadoUpdateWorkflow[0]["strMensaje"] = $resultadoUpdateWorkflow[0]["strMensaje"] . " sin embargo, no ha se ha enviado la notificación porque el activo seleccionado no existe.";
				}
			}

			// Retorna el resultado de la actualización
			if($Origen == "WorkflowAjax") {
				// Devuelve el resultado para una llamada Ajax
				echo(json_encode($resultadoUpdateWorkflow));
			}
			else {
				// Devuelve el resultado que forma parte de flujo de código más extenso
				return $resultadoUpdateWorkflow;
			}
		}
	}

	// Creación del objeto controlador y al crearse, se ejecuta el método
	$llamarMetodo = new ActivoController($urlSitio);
?>