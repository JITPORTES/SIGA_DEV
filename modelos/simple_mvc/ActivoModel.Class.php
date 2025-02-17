<?php
	include_once(dirname(__FILE__) . "/../../datos/connect/Proveedor.Class.php");
	include_once(dirname(__FILE__) . "/ResultadoModel.Class.php");
	

	class ActivoModel {
		// Propiedades de la Clase
		protected $_proveedor;
		public $Id_Activo;
		public $Id_Area;
		public $AF_BC;
		public $Nombre_Activo;
		public $Foto;
		public $Marca;
		public $Modelo;
		public $NumSerie;
		public $Id_Ubic_Prim;
		public $Desc_Ubic_Prim;
		public $Id_Ubic_Sec;
		public $Desc_Ubic_Sec;
		public $UsuarioResponsable;
		public $Num_Empleado;
		public $FotoEmpleado;
		public $Puesto;
		public $SoloConActivos;
		public $ComentarioReasignacion;
		public $Usr_Mod;
		public $Cad_Id_Activo;
		public $Id_Propiedad;
		public $Ubic_Especifica;
		public $Jefe_Area;
		public $Centro_Costos;
		public $MontoFactura;
		public $Fecha_Alta;
		public $Desc_Propiedad;
		public $SoloInventarioUsable;

		public $NombreTabla;
		public $Id_WorkflowActivo;
		public $Confirmacion;
		public $FirmaElectronica;
		public $CveWorkflow;
		public $IdUsuario;
		public $Comentario;
		public $MostrarFirmaElectronica;
		public $Id_Activo_Reubicacion;


		// Métodos del modelo
		// Obtiene la lista de Activos
		public function ActivosGet(ActivoModel $parametrosActivo)
		{
			$listaElementos = [];
			$_proveedor = new Proveedor('SQLSERVER', 'activos');
			$conn = $_proveedor->connect();

			try {
				// Recupera la lista de usuarios que tienen asignados activos
				$arrayParametros = [];
				if($parametrosActivo->Id_Area != null) { array_push($arrayParametros, "@Id_Area=" . $parametrosActivo->Id_Area); }
				if($parametrosActivo->Id_Activo != null) { array_push($arrayParametros, "@Id_Activo='" . $parametrosActivo->Id_Activo . "'"); }
				if($parametrosActivo->Num_Empleado != null) { array_push($arrayParametros, "@Num_Empleado=" . $parametrosActivo->Num_Empleado); }
				if($parametrosActivo->Id_Ubic_Prim != null) { array_push($arrayParametros, "@Id_Ubic_Prim=" . $parametrosActivo->Id_Ubic_Prim); }
				if($parametrosActivo->Id_Ubic_Sec != null) { array_push($arrayParametros, "@Id_Ubic_Sec=" . $parametrosActivo->Id_Ubic_Sec); }
				if($parametrosActivo->Marca != null) { array_push($arrayParametros, "@Marca='" . $parametrosActivo->Marca . "'"); }
				if($parametrosActivo->Modelo != null) { array_push($arrayParametros, "@Modelo='" . $parametrosActivo->Modelo . "'"); }
				if($parametrosActivo->Cad_Id_Activo != null) { array_push($arrayParametros, "@Cad_Id_Activo='" . $parametrosActivo->Cad_Id_Activo . "'"); }
				if($parametrosActivo->Id_Propiedad != null) { array_push($arrayParametros, "@Id_Propiedad=" . $parametrosActivo->Id_Propiedad); }
				if($parametrosActivo->SoloInventarioUsable != null) { array_push($arrayParametros, "@SoloInventarioUsable=" . $parametrosActivo->SoloInventarioUsable); }
				$cadsql = 'EXEC sp_siga_activo_get ' . implode("," , $arrayParametros);
				//echo $cadsql . "<br>";

				// Ejecución de la cadena
				$reader = $conn->execute($cadsql);
				// Recorre los registros encontrados
				while($elemento = $_proveedor->fetch_array($reader, 0)) {
					// Crea un obejeto para ser rellenado con la información encontrada
					$objetoTmp = new ActivoModel();
					$objetoTmp->Id_Activo = $elemento["Id_Activo"];
					$objetoTmp->AF_BC = trim($elemento["AF_BC"]);
					$objetoTmp->Nombre_Activo = trim($elemento["Nombre_Activo"]);
					$objetoTmp->Foto = $elemento["Foto"];
					$objetoTmp->Marca = $elemento["Marca"];
					$objetoTmp->Modelo = $elemento["Modelo"];
					$objetoTmp->NumSerie = $elemento["NumSerie"];
					$objetoTmp->Desc_Ubic_Prim = $elemento["Desc_Ubic_Prim"];
					$objetoTmp->Desc_Ubic_Sec = $elemento["Desc_Ubic_Sec"];
					$objetoTmp->Num_Empleado = $elemento["Num_Empleado"];
					$objetoTmp->UsuarioResponsable = $elemento["UsuarioResponsable"];
					$objetoTmp->Jefe_Area = $elemento["Jefe_Area"];
					$objetoTmp->MontoFactura = $elemento["MontoFactura"];
					$objetoTmp->Ubic_Especifica = $elemento["Especifica"];
					$objetoTmp->Fecha_Alta = $elemento["Fech_Inser"];
					$objetoTmp->Desc_Propiedad = $elemento["Desc_Propiedad"];
					// Agrega el objeto a la lista
					array_push($listaElementos, $objetoTmp);
				}
			}
			catch (\Exception $e) {
				// Ha ocurrido un error con la consulta y debe especificarse el error
				array_push($listaElementos,
					new ActivoModel(
						$this->Id_Activo = -1,
						$this->Nombre_Activo = $e->getMessage()
					)
				);
			}
			finally {
				// Cierra la conexión a la BD y libera el Recordset utilizado
				$_proveedor->free_result($reader);
				$_proveedor->close();
			}
			// Retorna el elemento
			return $listaElementos;
		}



		// Obtiene la lista de Archivos ligados a un Activo dado/proceso de Baja
		public function UsuariosConActivosGet(ActivoModel $parametrosActivo)
		{
			$listaElementos = [];
			$_proveedor = new Proveedor('SQLSERVER', 'activos');
			$conn = $_proveedor->connect();

			try {
				// Recupera la lista de usuarios que tienen asignados activos
				$arrayParametros = [];
				if($parametrosActivo->Id_Area != null) { array_push($arrayParametros, "@Id_Area=" . $parametrosActivo->Id_Area); }
				if($parametrosActivo->Num_Empleado != null) { array_push($arrayParametros, "@Num_Empleado=" . $parametrosActivo->Num_Empleado); }
				if($parametrosActivo->SoloConActivos != null) { array_push($arrayParametros, "@SoloConActivos=" . $parametrosActivo->SoloConActivos); }
				$cadsql = 'EXEC sp_siga_activo_usuario_get ' . implode("," , $arrayParametros);

				// Ejecución de la cadena
				$reader = $conn->execute($cadsql);
				// Recorre los registros encontrados
				while($elemento = $_proveedor->fetch_array($reader, 0)) {
					// Crea un obejeto para ser rellenado con la información encontrada
					$objetoTmp = new ActivoModel();
					$objetoTmp->Num_Empleado = $elemento["Num_Empleado"];
					$objetoTmp->UsuarioResponsable = $elemento["UsuarioResponsable"];
					// Agrega el objeto a la lista
					array_push($listaElementos, $objetoTmp);
				}
			}
			catch (\Exception $e) {
				// Ha ocurrido un error con la consulta y debe especificarse el error
				array_push($listaElementos,
					new ActivoBajaArchivosModel(
						$this->Num_Empleado = -1,
						$this->UsuarioResponsable = $e->getMessage()
					)
				);
			}
			finally {
				// Cierra la conexión a la BD y libera el Recordset utilizado
				$_proveedor->free_result($reader);
				$_proveedor->close();
			}
			// Retorna el elemento
			return $listaElementos;
		}


		/*
		// Obtiene la lista de Activos que un Usuario responsable tiene a su cargo
		public function ActivosXUsuarioGet(ActivoModel $parametrosActivo)
		{
			$listaElementos = [];
			$_proveedor = new Proveedor('SQLSERVER', 'activos');
			$conn = $_proveedor->connect();

			try {
				// Recupera la lista de usuarios que tienen asignados activos
				$arrayParametros = [];
				if($parametrosActivo->Id_Area != null) { array_push($arrayParametros, "@Id_Area=" . $parametrosActivo->Id_Area); }
				if($parametrosActivo->Num_Empleado != null) { array_push($arrayParametros, "@Num_Empleado=" . $parametrosActivo->Num_Empleado); }
				$cadsql = 'EXEC sp_siga_activo_usuario_get ' . implode("," , $arrayParametros);
				//echo $cadsql . "<br />";

				// Ejecución de la cadena
				$reader = $conn->execute($cadsql);
				// Recorre los registros encontrados
				while($elemento = $_proveedor->fetch_array($reader, 0)) {
					// Crea un obejeto para ser rellenado con la información encontrada
					$objetoTmp = new ActivoModel();
					$objetoTmp->Id_Activo = $elemento["Id_Activo"];
					$objetoTmp->AF_BC = $elemento["AF_BC"];
					$objetoTmp->Nombre_Activo = $elemento["Nombre_Activo"];
					$objetoTmp->Foto = $elemento["Foto"];
					$objetoTmp->Marca = $elemento["Marca"];
					$objetoTmp->Modelo = $elemento["Modelo"];
					$objetoTmp->NumSerie = $elemento["NumSerie"];
					$objetoTmp->Desc_Ubic_Prim = $elemento["Desc_Ubic_Prim"];
					$objetoTmp->Desc_Ubic_Sec = $elemento["Desc_Ubic_Sec"];
					$objetoTmp->Num_Empleado = $elemento["Num_Empleado"];
					$objetoTmp->UsuarioResponsable = $elemento["UsuarioResponsable"];
					$objetoTmp->FotoEmpleado = $elemento["FotoEmpleado"];
					$objetoTmp->Puesto = $elemento["Puesto"];
					// Agrega el objeto a la lista
					array_push($listaElementos, $objetoTmp);
				}
			}
			catch (\Exception $e) {
				// Ha ocurrido un error con la consulta y debe especificarse el error
				array_push($listaElementos,
					new ActivoBajaArchivosModel(
						$this->Num_Empleado = -1,
						$this->UsuarioResponsable = $e->getMessage()
					)
				);
			}
			finally {
				// Cierra la conexión a la BD y libera el Recordset utilizado
				$_proveedor->free_result($reader);
				$_proveedor->close();
			}
			// Retorna el elemento
			return $listaElementos;
		}
		*/


		// Actualiza datos de Activos en bloque. Originalmente es para la reasignación de Activos de un Usuario a otro
		public function ActivosReubicacionReasignacionMasiva(ActivoModel $parametrosActivo)
		{
			// Devolverá un array con toda la información de lo ocurrido con la actualización de los activos
			$resultado = new ResultadoModel();
			$_proveedor = new Proveedor('SQLSERVER', 'activos');
			$conn = $_proveedor->connect();

			try {
				$arrayParametros = [];
				if($parametrosActivo->Id_Area != null) { array_push($arrayParametros, "@Id_Area=" . $parametrosActivo->Id_Area); }
				if($parametrosActivo->Num_Empleado != null) { array_push($arrayParametros, "@IdUsuarioReasignacion=" . $parametrosActivo->Num_Empleado); }
				if($parametrosActivo->Id_Ubic_Prim != null) { array_push($arrayParametros, "@Id_Ubic_Prim=" . $parametrosActivo->Id_Ubic_Prim); }
				if($parametrosActivo->Id_Ubic_Sec != null) { array_push($arrayParametros, "@Id_Ubic_Sec=" . $parametrosActivo->Id_Ubic_Sec); }
				if($parametrosActivo->ComentarioReasignacion != null) { array_push($arrayParametros, "@ComentarioReasignacion='" . $parametrosActivo->ComentarioReasignacion . "'"); }
				if($parametrosActivo->Cad_Id_Activos != null) { array_push($arrayParametros, "@Cad_Id_Activos='" . $parametrosActivo->Cad_Id_Activos . "'"); }
				if($parametrosActivo->Usr_Mod != null) { array_push($arrayParametros, "@IdUsuarioActualiza=" . $parametrosActivo->Usr_Mod); }
				if($parametrosActivo->Ubic_Especifica != null) { array_push($arrayParametros, "@Ubic_Especifica='" . $parametrosActivo->Ubic_Especifica . "'"); }
				if($parametrosActivo->Centro_Costos != null) { array_push($arrayParametros, "@Centro_Costos='" . $parametrosActivo->Centro_Costos . "'"); }
				$cadsql = 'EXEC sp_siga_activo_reasignacion_reubicacion_add ' . implode("," , $arrayParametros);
				//echo $cadsql . "<br>";

				// Ejecución de la cadena
				$reader = $conn->execute($cadsql);
				if($reader) {
					// Recorre el primer recordset en donde se encuentra el resultado y el mensaje de la actualización
					while ($elemento = $_proveedor->fetch_array($reader, 0)) {
						$resultado->intResultado = $elemento["Resultado"];
						$resultado->strMensaje = $elemento["Mensaje"];
					}

					// Recorre el segundo recordset con la lista de activos y correos para el envío de las notificaciones
					$datosActivos = [];
					// Se mueve al segundo recordset
					$reader->nextRowset();
					if($reader) {
						// Recorre los registros encontrados en el segundo recordset
						while ($elemento = $_proveedor->fetch_array($reader, 0)) {
							array_push($datosActivos,
								array("Id_Activo" => $elemento["Id_Activo"],
									"AF_BC" => $elemento["AF_BC"],
									"Nombre_Activo" => trim($elemento["Nombre_Activo"]),
									"Marca" => trim($elemento["Marca"]),
									"Modelo" => trim($elemento["Modelo"]),
									"NumSerie" => trim($elemento["NumSerie"]),
									"Foto" => trim($elemento["Foto"]),
									"ImporteSeguros" => trim($elemento["ImporteSeguros"]),
									"Num_Empleado_Origen" => $elemento["Num_Empleado_Origen"],
									"Nombre_Empleado_Origen" => $elemento["Nombre_Empleado_Origen"],
									"Correo_Empleado_Origen" => $elemento["Correo_Empleado_Origen"],
									"Num_Empleado_Destino" => $elemento["Num_Empleado_Destino"],
									"Nombre_Empleado_Destino" => $elemento["Nombre_Empleado_Destino"],
									"Correo_Empleado_Destino" => $elemento["Correo_Empleado_Destino"],
									"Id_Ubic_Prim_Origen" => $elemento["Id_Ubic_Prim_Origen"],
									"Nombre_Ubic_Prim_Origen" => $elemento["Nombre_Ubic_Prim_Origen"],
									"Id_Ubic_Sec_Origen" => $elemento["Id_Ubic_Sec_Origen"],
									"Nombre_Ubic_Sec_Origen" => $elemento["Nombre_Ubic_Sec_Origen"],
									"Id_Ubic_Prim_Destino" => $elemento["Id_Ubic_Prim_Destino"],
									"Nombre_Ubic_Prim_Destino" => $elemento["Nombre_Ubic_Prim_Destino"],
									"Id_Ubic_Sec_Destino" => $elemento["Id_Ubic_Sec_Destino"],
									"Nombre_Ubic_Sec_Destino" => $elemento["Nombre_Ubic_Sec_Destino"],
									"Correo_Jefe_Area" => $elemento["Correo_Jefe_Area"],
									"Correo_Personal_Seguimiento" => $elemento["Correo_Personal_Seguimiento"],
									"Correo_Usuario_Actualiza" => $elemento["Correo_Usuario_Actualiza"],
									"Id_Activo_Reubicacion" => $elemento["Id_Activo_Reubicacion"]
								)
							);
						}
					}
					$resultado->strParametrosExtra = $datosActivos;
				}
				else {
					// Ha ocurrido un error de ejecución del procedimiento almacenado
					$resultado->intResultado = abs($conn->_error()) * -1;
					$resultado->strMensaje = $conn->_errorDescripcion();
				}
			}
			catch (\Exception $e) {
				// Ha ocurrido un error en la ejeción de la rutina y debe especificarse el error
				$resultado->intResultado = -1;
				$resultado->strMensaje = $e->getMessage();
			}
			finally {
				// Cierra la conexión a la BD y libera el Recordset utilizado
				$_proveedor->free_result($reader);
				$_proveedor->close();
			}
			// Retorna el elemento
			return $resultado;
		}



		// WORKFLOW
		// Obtiene la lista de Activos que un Usuario responsable tiene a su cargo
		public function ActivosWorkflowGet(ActivoModel $parametrosActivo)
		{
			$listaElementos = [];
			$_proveedor = new Proveedor('SQLSERVER', 'activos');
			$conn = $_proveedor->connect();

			try {
				// Recupera la lista de usuarios que tienen asignados activos
				$arrayParametros = [];
				if($parametrosActivo->NombreTabla != null) { array_push($arrayParametros, "@NombreTabla='" . $parametrosActivo->NombreTabla . "'"); }
				if($parametrosActivo->Id_Activo != null) { array_push($arrayParametros, "@Id_Activo=" . $parametrosActivo->Id_Activo); }
				if($parametrosActivo->Id_WorkflowActivo != null) { array_push($arrayParametros, "@Id_WorkflowActivo=" . $parametrosActivo->Id_WorkflowActivo); }
				if($parametrosActivo->Id_Area != null) { array_push($arrayParametros, "@Id_Area=" . $parametrosActivo->Id_Area); }
				if($parametrosActivo->MostrarFirmaElectronica != null) { array_push($arrayParametros, "@MostrarFirmaElectronica=" . $parametrosActivo->MostrarFirmaElectronica); }
				if($parametrosActivo->Id_Activo_Reubicacion != null) { array_push($arrayParametros, "@Id_Activo_Reubicacion=" . $parametrosActivo->Id_Activo_Reubicacion); }
				$cadsql = 'EXEC sp_siga_activo_workflow_get ' . implode("," , $arrayParametros);
				//echo $cadsql . "<br />";

				// Ejecución de la cadena
				$reader = $conn->execute($cadsql);
				if($reader) {
					// Recorre los registros encontrados
					while($elemento = $_proveedor->fetch_array($reader, 0)) {
						// Crea un obejeto para ser rellenado con la información encontrada
						array_push($listaElementos,
							array("IdClaveWorkflow" => $elemento["IdClaveWorkflow"],
								"CveWorkflow" => $elemento["CveWorkflow"],
								"Descripcion" => trim($elemento["Descripcion"]),
								"Orden" => $elemento["Orden"],
								"CorreoResponsable" => $elemento["CorreoResponsable"],
								"Id_WorkflowActivo" => $elemento["Id_WorkflowActivo"],
								"Id_Activo" => $elemento["Id_Activo"],
								"Id_Baja" => $elemento["Id_Baja"],
								"Id_Activo_Reubicacion" => $elemento["Id_Activo_Reubicacion"],
								"FechaAlta" => $elemento["FechaAlta"],
								"Correo" => $elemento["Correo"],
								"Aceptado" => $elemento["Aceptado"],
								"Id_Usuario" => $elemento["Id_Usuario"],
								"NumEmpleado" => $elemento["NumEmpleado"],
								"NomEmpleado" => $elemento["NomEmpleado"],
								"FechaAceptado" => $elemento["FechaAceptado"],
								"ProcesoNombre" => $elemento["ProcesoNombre"],
								"Comentario" => $elemento["Comentario"],
								"FirmaElectronica" => $elemento["FirmaElectronica"],
								"TextoInformativo" => $elemento["TextoInformativo"]
							)
						);
					}
				}
				else {
					// Ha ocurrido un error de ejecución del procedimiento almacenado
					array_push($listaElementos,
						array("IdClaveWorkflow" => abs($conn->_errorNo()) * -1,
							"Descripcion" => $conn->_errorDescripcion()[2],
						)
					);
				}
			}
			catch (\Exception $e) {
				// Ha ocurrido un error con la consulta y debe especificarse el error
				array_push($listaElementos,
					array("IdClaveWorkflow" => -1,
						"Descripcion" => $e->getMessage(),
					)
				);
			}
			finally {
				// Cierra la conexión a la BD y libera el Recordset utilizado
				$_proveedor->free_result($reader);
				$_proveedor->close();
			}
			// Retorna el elemento
			return $listaElementos;
		}

		// Actualiza el paso del workflow y/o agrega el siguiente paso en el workflow según corresponda
		public function ActivosWorkflowAdd(ActivoModel $parametrosActivo)
		{
			$listaElementos = [];
			$_proveedor = new Proveedor('SQLSERVER', 'activos');
			$conn = $_proveedor->connect();

			try {
				// Recupera la lista de usuarios que tienen asignados activos
				$arrayParametros = [];
				if($parametrosActivo->Id_Activo != null) { array_push($arrayParametros, "@Id_Activo=" . $parametrosActivo->Id_Activo); }
				if($parametrosActivo->NombreTabla != null) { array_push($arrayParametros, "@NombreTabla='" . $parametrosActivo->NombreTabla . "'"); }
				if($parametrosActivo->Id_WorkflowActivo != null) { array_push($arrayParametros, "@Id_WorkflowActivo=" . $parametrosActivo->Id_WorkflowActivo); }
				if($parametrosActivo->IdUsuario != null) { array_push($arrayParametros, "@IdUsuario=" . $parametrosActivo->IdUsuario); }
				if($parametrosActivo->CveWorkflow != null) { array_push($arrayParametros, "@CveWorkflow=" . $parametrosActivo->CveWorkflow); }
				if($parametrosActivo->Confirmacion != null) { array_push($arrayParametros, "@Confirmacion=" . $parametrosActivo->Confirmacion); }
				if($parametrosActivo->Comentario != null) { array_push($arrayParametros, "@Comentario='" . $parametrosActivo->Comentario . "'"); }
				if($parametrosActivo->FirmaElectronica != null) { array_push($arrayParametros, "@FirmaElectronica='" . $parametrosActivo->FirmaElectronica . "'"); }
				if($parametrosActivo->Id_Activo_Reubicacion != null) { array_push($arrayParametros, "@Id_Activo_Reubicacion=" . $parametrosActivo->Id_Activo_Reubicacion); }
				$cadsql = 'EXEC sp_siga_activo_workflow_add ' . implode("," , $arrayParametros);
				//echo $cadsql . "<br />";

				// Ejecución de la cadena
				$reader = $conn->execute($cadsql);
				if($reader) {
					// Recorre los registros encontrados
					while($elemento = $_proveedor->fetch_array($reader, 0)) {
						array_push($listaElementos,
							array("intResultado" => $elemento["Resultado"],
								"strMensaje" => $elemento["Mensaje"],
								"CorreoEmpleadoProximoPaso" => $elemento["CorreoEmpleadoProximoPaso"],
								"NombreEmpleadoProximoPaso" => $elemento["NombreEmpleadoProximoPaso"],
								"NumEmpleadoProximoPaso" => $elemento["NumEmpleadoProximoPaso"],
								"CveWorkflowProximoPaso" => $elemento["CveWorkflowProximoPaso"],
								"FinWorkflow" => $elemento["FinWorkflow"]
							)
						);
					}
				}
				else {
					array_push($listaElementos,
						array("intResultado" => abs($conn->_errorNo()) * -1,
							"strMensaje" => $conn->_errorDescripcion()[2],
						)
					);
				}
			}
			catch (\Exception $e) {
				// Ha ocurrido un error con la consulta y debe especificarse el error
				array_push($listaElementos,
					array("intResultado" => -1,
						"strMensaje" => $e->getMessage(),
					)
				);
			}
			finally {
				// Cierra la conexión a la BD y libera el Recordset utilizado
				$_proveedor->free_result($reader);
				$_proveedor->close();
			}
			// Retorna el elemento
			return $listaElementos;
		}
	}
?>