<?php
	include_once(dirname(__FILE__) . "/../../datos/connect/Proveedor.Class.php");
	include_once(dirname(__FILE__) . "/ResultadoModel.Class.php");

	class ActivoFijoInventarioReportesModel {
		// Propiedades de la Clase
		protected $_proveedor;
		public $Id_Columna;
		public $Nom_Columna;
		public $Descripcion_Columna;
		public $AplicaTablaActivos;
		public $AplicaTablaBajas;
		public $AplicaTablaReubicacion;
		
		public $Id_Reporte_Version;
		public $Id_Columna_Detalle;
		public $Id_Columna_Version;
		public $Id_Area;
		public $NombreVersion;
		public $NombreTabla;
		public $Aplica;
		public $Id_Usuario;
		public $Orden;
		public $AplicaFiltro;


		// Métodos del modelo
		// Obtiene la lista de Archivos ligados a un Activo dado/proceso de Baja
		public function ActivoFilasColumnasCatalogoGet()
		{
			$listaElementos = [];
			$_proveedor = new Proveedor('SQLSERVER', 'activos');
			$conn = $_proveedor->connect();

			try {
				// Recupera la lista de productos destacados
				$cadsql = 'EXEC sp_siga_activo_fijo_inventario_columnas_catalogo_get';

				// Ejecución de la cadena
				$reader = $conn->execute($cadsql);
				if($reader) {
					// Recorre los registros encontrados
					while($elemento = $_proveedor->fetch_array($reader, 0)) {
						// Crea un objeto para ser rellenado con la información encontrada
						$objetoTmp = new ActivoFijoInventarioReportesModel();
						$objetoTmp->Id_Columna = $elemento["Id_Columna"];
						$objetoTmp->Nom_Columna = $elemento["Nom_Columna"];
						$objetoTmp->Descripcion_Columna = $elemento["Descripcion_Columna"];
						$objetoTmp->AplicaTablaActivos = $elemento["AplicaTablaActivos"];
						$objetoTmp->AplicaTablaBajas = $elemento["AplicaTablaBajas"];
						$objetoTmp->AplicaTablaReubicacion = $elemento["AplicaTablaReubicacion"];
						// Agrega el objeto a la lista
						array_push($listaElementos, $objetoTmp);
					}
				}
				else {
					// Ha ocurrido un error de ejecución del procedimiento almacenado
					$objetoTmp = new ActivoFijoInventarioReportesModel();
					$objetoTmp->Id_Columna = abs($conn->_errorNo()) * -1;
					$objetoTmp->Descripcion_Columna = $conn->_errorDescripcion()[2];
					// Agrega el objeto a la lista
					array_push($listaElementos, $objetoTmp);
				}
			}
			catch (\Exception $e) {
				// Ha ocurrido un error con la conexión y debe especificarse el error
				array_push($listaElementos,
					new ActivoFijoInventarioReportesModel(
						$this->Id_Columna = -1,
						$this->Descripcion_Columna = $e->getMessage()
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


		
		// VISTAS/VERSIONES DE REPORTES
		// Obtiene las versiones de los reportes que han sido guardados previamente
		public function ActivoFijoVersionesReportesGet(ActivoFijoInventarioReportesModel $parametrosActivo)
		{
			$listaElementos = [];
			$_proveedor = new Proveedor('SQLSERVER', 'activos');
			$conn = $_proveedor->connect();

			try {
				// Recupera la lista de versiones para el reporte
				$arrayParametros = [];
				if($parametrosActivo->Id_Area != null) { array_push($arrayParametros, "@Id_Area=" . $parametrosActivo->Id_Area); }
				if($parametrosActivo->NombreTabla != null) { array_push($arrayParametros, "@NombreTabla='" . $parametrosActivo->NombreTabla . "'"); }
				$cadsql = 'EXEC sp_siga_activo_fijo_inventario_versiones_reporte_get ' . implode("," , $arrayParametros);
				//echo $cadsql . "<br />";

				// Ejecución de la cadena
				$reader = $conn->execute($cadsql);
				if($reader) {
					// Recorre los registros encontrados
					while($elemento = $_proveedor->fetch_array($reader, 0)) {
						// Crea un obejeto para ser rellenado con la información encontrada
						$objetoTmp = new ActivoFijoInventarioReportesModel();
						$objetoTmp->Id_Reporte_Version = $elemento["Id_Reporte_Version"];
						$objetoTmp->Id_Area = $elemento["Id_Area"];
						$objetoTmp->NombreVersion = $elemento["NombreVersion"];
						$objetoTmp->NombreTabla = $elemento["NombreTabla"];
						$objetoTmp->Aplica = $elemento["Aplica"];
						// Agrega el objeto a la lista
						array_push($listaElementos, $objetoTmp);
					}
				}
				else {
					// Ha ocurrido un error de ejecución del procedimiento almacenado
					$objetoTmp = new ActivoFijoInventarioReportesModel();
					$objetoTmp->Id_Columna = abs($conn->_errorNo()) * -1;
					$objetoTmp->Descripcion_Columna = $conn->_errorDescripcion()[2];
					// Agrega el objeto a la lista
					array_push($listaElementos, $objetoTmp);
				}
			}
			catch (\Exception $e) {
				// Ha ocurrido un error con la conexión y debe especificarse el error
				array_push($listaElementos,
					new ActivoFijoInventarioReportesModel(
						$this->Id_Reporte_Version = -1,
						$this->Descripcion_Columna = $e->getMessage()
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

		// Guarda una versión del reporte pasado como parámetro
		public function ActivoFijoVersionesReportesAdd(ActivoFijoInventarioReportesModel $parametrosActivo)
		{
			$resultado = new ResultadoModel();
			$_proveedor = new Proveedor('SQLSERVER', 'activos');
			$conn = $_proveedor->connect();

			try {
				// Recupera la lista de versiones para el reporte
				$arrayParametros = [];
				if($parametrosActivo->Id_Area != null) { array_push($arrayParametros, "@Id_Area=" . $parametrosActivo->Id_Area); }
				if($parametrosActivo->NombreTabla != null) { array_push($arrayParametros, "@NombreTabla='" . $parametrosActivo->NombreTabla . "'"); }
				if($parametrosActivo->NombreVersion != null) { array_push($arrayParametros, "@NombreVersion='" . $parametrosActivo->NombreVersion . "'"); }
				if($parametrosActivo->Aplica != null) { array_push($arrayParametros, "@Aplica=" . $parametrosActivo->Aplica); }
				if($parametrosActivo->Id_Usuario != null) { array_push($arrayParametros, "@Id_Usuario=" . $parametrosActivo->Id_Usuario); }
				$cadsql = 'EXEC sp_siga_activo_fijo_inventario_versiones_reporte_add ' . implode("," , $arrayParametros);
				//echo $cadsql . "<br />";

				// Ejecución de la cadena
				$reader = $conn->execute($cadsql);
				if($reader) {
					// Recorre los registros encontrados
					while($elemento = $_proveedor->fetch_array($reader, 0)) {
						// Crea un obejeto para ser rellenado con la información encontrada
						$resultado->intResultado = $elemento["Resultado"];
						$resultado->strMensaje = $elemento["Mensaje"];
					}
				}
				else {
					// Ha ocurrido un error de ejecución del procedimiento almacenado
					$resultado->intResultado = abs($conn->_errorNo()) * -1;
					$resultado->strMensaje = $conn->_errorDescripcion()[2];
				}
			}
			catch (\Exception $e) {
				// Ha ocurrido un error con la conexión y debe especificarse el error
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

		// Actualiza la información de la versión del reporte pasado como parámetro
		public function ActivoFijoVersionesReportesEdit(ActivoFijoInventarioReportesModel $parametrosActivo)
		{
			$resultado = new ResultadoModel();
			$_proveedor = new Proveedor('SQLSERVER', 'activos');
			$conn = $_proveedor->connect();

			try {
				// Recupera la lista de versiones para el reporte
				$arrayParametros = [];
				if($parametrosActivo->Id_Reporte_Version != null) { array_push($arrayParametros, "@Id_Reporte_Version=" . $parametrosActivo->Id_Reporte_Version); }
				if($parametrosActivo->NombreVersion != null) { array_push($arrayParametros, "@NombreVersion='" . $parametrosActivo->NombreVersion . "'"); }
				if($parametrosActivo->Id_Area != null) { array_push($arrayParametros, "@Id_Area='" . $parametrosActivo->Id_Area . "'"); }
				if($parametrosActivo->Aplica != null) { array_push($arrayParametros, "@Aplica=" . $parametrosActivo->Aplica); }
				if($parametrosActivo->Id_Usuario != null) { array_push($arrayParametros, "@Id_Usuario=" . $parametrosActivo->Id_Usuario); }
				$cadsql = 'EXEC sp_siga_activo_fijo_inventario_versiones_reporte_edit ' . implode("," , $arrayParametros);
				//$resultado->strParametrosExtra = $cadsql;

				// Ejecución de la cadena
				$reader = $conn->execute($cadsql);
				if($reader) {
					// Recorre los registros encontrados
					while($elemento = $_proveedor->fetch_array($reader, 0)) {
						// Crea un obejeto para ser rellenado con la información encontrada
						$resultado->intResultado = $elemento["Resultado"];
						$resultado->strMensaje = $elemento["Mensaje"];
					}
				}
				else {
					// Ha ocurrido un error de ejecución del procedimiento almacenado
					$resultado->intResultado = abs($conn->_errorNo()) * -1;
					$resultado->strMensaje = $conn->_errorDescripcion()[2];
				}
			}
			catch (\Exception $e) {
				// Ha ocurrido un error con la conexión y debe especificarse el error
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

		// Elimina la información de la versión del reporte pasado como parámetro
		public function ActivoFijoVersionesReportesDel(ActivoFijoInventarioReportesModel $parametrosActivo)
		{
			$resultado = new ResultadoModel();
			$_proveedor = new Proveedor('SQLSERVER', 'activos');
			$conn = $_proveedor->connect();

			try {
				// Recupera la lista de versiones para el reporte
				$arrayParametros = [];
				if($parametrosActivo->Id_Area != null) { array_push($arrayParametros, "@Id_Area=" . $parametrosActivo->Id_Area); }
				if($parametrosActivo->Id_Reporte_Version != null) { array_push($arrayParametros, "@Id_Reporte_Version=" . $parametrosActivo->Id_Reporte_Version); }
				$cadsql = 'EXEC sp_siga_activo_fijo_inventario_versiones_reporte_del ' . implode("," , $arrayParametros);
				//echo $cadsql . "<br />";

				// Ejecución de la cadena
				$reader = $conn->execute($cadsql);
				if($reader) {
					// Recorre los registros encontrados
					while($elemento = $_proveedor->fetch_array($reader, 0)) {
						// Crea un obejeto para ser rellenado con la información encontrada
						$resultado->intResultado = $elemento["Resultado"];
						$resultado->strMensaje = $elemento["Mensaje"];
					}
				}
				else {
					// Ha ocurrido un error de ejecución del procedimiento almacenado
					$resultado->intResultado = abs($conn->_errorNo()) * -1;
					$resultado->strMensaje = $conn->_errorDescripcion()[2];
				}
			}
			catch (\Exception $e) {
				// Ha ocurrido un error con la conexión y debe especificarse el error
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



		// DETALLE DE COLUMNAS QUE COMPONEN UNA VERSION
		// Obtiene la lista de columnas que componen la versión/vista del reporte pasado como parámetro
		public function ActivoFijoReportesDetalleColumnasGet(ActivoFijoInventarioReportesModel $parametrosActivo)
		{
			$listaElementos = [];
			$_proveedor = new Proveedor('SQLSERVER', 'activos');
			$conn = $_proveedor->connect();

			try {
				// Recupera la lista de versiones para el reporte
				$arrayParametros = [];
				if($parametrosActivo->Id_Area != null) { array_push($arrayParametros, "@Id_Area=" . $parametrosActivo->Id_Area); }
				if($parametrosActivo->Id_Reporte_Version != null) { array_push($arrayParametros, "@Id_Reporte_Version=" . $parametrosActivo->Id_Reporte_Version); }
				if($parametrosActivo->NombreTabla != null) { array_push($arrayParametros, "@NombreTabla='" . $parametrosActivo->NombreTabla . "'"); }
				$cadsql = 'EXEC sp_siga_activo_fijo_inventario_versiones_columnas_detalle_get ' . implode("," , $arrayParametros);
				//echo $cadsql . "<br />";

				// Ejecución de la cadena
				$reader = $conn->execute($cadsql);
				if($reader) {
					// Recorre los registros encontrados
					while($elemento = $_proveedor->fetch_array($reader, 0)) {
						// Crea un obejeto para ser rellenado con la información encontrada
						$objetoTmp = new ActivoFijoInventarioReportesModel();
						$objetoTmp->Id_Reporte_Version = $elemento["Id_Reporte_Version"];
						$objetoTmp->Id_Columna_Detalle = $elemento["Id_Columna_Detalle"];
						$objetoTmp->Id_Area = $elemento["Id_Area"];
						$objetoTmp->Aplica = $elemento["Aplica"];
						$objetoTmp->NombreVersion = $elemento["NombreVersion"];
						$objetoTmp->Id_Columna = $elemento["Id_Columna"];
						$objetoTmp->Nom_Columna = $elemento["Nom_Columna"];
						$objetoTmp->Descripcion_Columna = $elemento["Descripcion_Columna"];
						$objetoTmp->Visible = $elemento["Visible"];
						$objetoTmp->Orden = $elemento["Orden"];
						$objetoTmp->AplicaFiltro = $elemento["AplicaFiltro"];
						// Agrega el objeto a la lista
						array_push($listaElementos, $objetoTmp);
					}
				}
				else {
					// Ha ocurrido un error de ejecución del procedimiento almacenado
					$objetoTmp = new ActivoFijoInventarioReportesModel();
					$objetoTmp->Id_Reporte_Version = abs($conn->_errorNo()) * -1;
					$objetoTmp->Descripcion_Columna = $conn->_errorDescripcion()[2];
					// Agrega el objeto a la lista
					array_push($listaElementos, $objetoTmp);
				}
			}
			catch (\Exception $e) {
				// Ha ocurrido un error con la conexión y debe especificarse el error
				array_push($listaElementos,
					new ActivoFijoInventarioReportesModel(
						$this->Id_Reporte_Version = -1,
						$this->Descripcion_Columna = $e->getMessage()
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

		// Agrega una columna a la versión del reporte pasado como parámetro
		public function ActivoFijoReportesDetalleColumnasAdd(ActivoFijoInventarioReportesModel $parametrosActivo)
		{
			$resultado = new ResultadoModel();
			$_proveedor = new Proveedor('SQLSERVER', 'activos');
			$conn = $_proveedor->connect();

			try {
				// Recupera la lista de versiones para el reporte
				$arrayParametros = [];
				if($parametrosActivo->Id_Area != null) { array_push($arrayParametros, "@Id_Area=" . $parametrosActivo->Id_Area); }
				if($parametrosActivo->Id_Reporte_Version != null) { array_push($arrayParametros, "@Id_Reporte_Version=" . $parametrosActivo->Id_Reporte_Version); }
				if($parametrosActivo->Id_Columna != null) { array_push($arrayParametros, "@Id_Columna=" . $parametrosActivo->Id_Columna); }
				if($parametrosActivo->Id_Usuario != null) { array_push($arrayParametros, "@Id_Usuario=" . $parametrosActivo->Id_Usuario); }
				$cadsql = 'EXEC sp_siga_activo_fijo_inventario_versiones_columnas_detalle_add ' . implode("," , $arrayParametros);
				//$resultado->strParametrosExtra = $cadsql;

				// Ejecución de la cadena
				$reader = $conn->execute($cadsql);
				if($reader) {
					// Recorre los registros encontrados
					while($elemento = $_proveedor->fetch_array($reader, 0)) {
						// Crea un obejeto para ser rellenado con la información encontrada
						$resultado->intResultado = $elemento["Resultado"];
						$resultado->strMensaje = $elemento["Mensaje"];
					}
				}
				else {
					// Ha ocurrido un error de ejecución del procedimiento almacenado
					$resultado->intResultado = abs($conn->_errorNo()) * -1;
					$resultado->strMensaje = $conn->_errorDescripcion()[2];
				}
			}
			catch (\Exception $e) {
				// Ha ocurrido un error con la conexión y debe especificarse el error
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

		// Edita una columna a la versión del reporte pasado como parámetro
		public function ActivoFijoReportesDetalleColumnasEdit(ActivoFijoInventarioReportesModel $parametrosActivo)
		{
			$resultado = new ResultadoModel();
			$_proveedor = new Proveedor('SQLSERVER', 'activos');
			$conn = $_proveedor->connect();

			try {
				// Recupera la lista de versiones para el reporte
				$arrayParametros = [];
				if($parametrosActivo->Id_Reporte_Version != null) { array_push($arrayParametros, "@Id_Reporte_Version=" . $parametrosActivo->Id_Reporte_Version); }
				if($parametrosActivo->Id_Columna_Detalle != null) { array_push($arrayParametros, "@Id_Columna_Detalle=" . $parametrosActivo->Id_Columna_Detalle); }
				if($parametrosActivo->Id_Usuario != null) { array_push($arrayParametros, "@Id_Usuario=" . $parametrosActivo->Id_Usuario); }
				if($parametrosActivo->Orden != null) { array_push($arrayParametros, "@Orden=" . $parametrosActivo->Orden); }
				$cadsql = 'EXEC sp_siga_activo_fijo_inventario_versiones_columnas_detalle_edit ' . implode("," , $arrayParametros);
				$resultado->strParametrosExtra = $cadsql;

				// Ejecución de la cadena
				$reader = $conn->execute($cadsql);
				if($reader) {
					// Recorre los registros encontrados
					while($elemento = $_proveedor->fetch_array($reader, 0)) {
						// Crea un obejeto para ser rellenado con la información encontrada
						$resultado->intResultado = $elemento["Resultado"];
						$resultado->strMensaje = $elemento["Mensaje"];
					}
				}
				else {
					// Ha ocurrido un error de ejecución del procedimiento almacenado
					$resultado->intResultado = abs($conn->_errorNo()) * -1;
					$resultado->strMensaje = $conn->_errorDescripcion()[2];
				}
			}
			catch (\Exception $e) {
				// Ha ocurrido un error con la conexión y debe especificarse el error
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

		// Elimina una columna a la versión del reporte pasado como parámetro
		public function ActivoFijoReportesDetalleColumnasDel(ActivoFijoInventarioReportesModel $parametrosActivo)
		{
			$resultado = new ResultadoModel();
			$_proveedor = new Proveedor('SQLSERVER', 'activos');
			$conn = $_proveedor->connect();

			try {
				// Recupera la lista de versiones para el reporte
				$arrayParametros = [];
				if($parametrosActivo->Id_Reporte_Version != null) { array_push($arrayParametros, "@Id_Reporte_Version=" . $parametrosActivo->Id_Reporte_Version); }
				if($parametrosActivo->Id_Columna_Detalle != null) { array_push($arrayParametros, "@Id_Columna_Detalle=" . $parametrosActivo->Id_Columna_Detalle); }
				$cadsql = 'EXEC sp_siga_activo_fijo_inventario_versiones_columnas_detalle_del ' . implode("," , $arrayParametros);
				$resultado->strParametrosExtra = $cadsql;

				// Ejecución de la cadena
				$reader = $conn->execute($cadsql);
				if($reader) {
					// Recorre los registros encontrados
					while($elemento = $_proveedor->fetch_array($reader, 0)) {
						// Crea un obejeto para ser rellenado con la información encontrada
						$resultado->intResultado = $elemento["Resultado"];
						$resultado->strMensaje = $elemento["Mensaje"];
					}
				}
				else {
					// Ha ocurrido un error de ejecución del procedimiento almacenado
					$resultado->intResultado = abs($conn->_errorNo()) * -1;
					$resultado->strMensaje = $conn->_errorDescripcion()[2];
				}
			}
			catch (\Exception $e) {
				// Ha ocurrido un error con la conexión y debe especificarse el error
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
	}
?>