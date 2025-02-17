<?php
	include_once(dirname(__FILE__) . "/../../datos/connect/Proveedor.Class.php");
	include_once(dirname(__FILE__) . "/ResultadoModel.Class.php");

	class ActivoBajaArchivosModel {
		// Propiedades de la Clase
		protected $_proveedor;
		public $Id_Adjunto;
		public $Id_Activo;
		public $Url_Adjunto;
		public $Id_Usuario;


		// Métodos del modelo
		// Obtiene la lista de Archivos ligados a un Activo dado/proceso de Baja
		public function ActivoBajaArchivosGet(ActivoBajaArchivosModel $ActivoBajaArchivosModel)
		{
			$listaElementos = [];
			$_proveedor = new Proveedor('SQLSERVER', 'activos');
			$conn = $_proveedor->connect();

			try {
				// Recupera la lista de productos destacados
				$cadsql = 'EXEC sp_siga_baja_activo_archivos_get ';
				if($ActivoBajaArchivosModel->Id_Activo != null) { $cadsql .= "@Id_Activo=" . $ActivoBajaArchivosModel->Id_Activo; }

				// Ejecución de la cadena
				$reader = $conn->execute($cadsql);
				// Recorre los registros encontrados
				while($elemento = $_proveedor->fetch_array($reader, 0)) {
					// Crea un obejeto para ser rellenado con la información encontrada
					$objetoTmp = new ActivoBajaArchivosModel();
					$objetoTmp->Id_Adjunto = $elemento["Id_Adjunto"];
					$objetoTmp->Id_Activo = $elemento["Id_Activo"];
					$objetoTmp->Url_Adjunto = $elemento["Url_Adjunto"];
					$objetoTmp->Id_Usuario = $elemento["Usr_Insert"];
					// Agrega el objeto a la lista
					array_push($listaElementos, $objetoTmp);
				}
			}
			catch (\Exception $e) {
				// Ha ocurrido un error con la conexión y debe especificarse el error
				array_push($listaElementos,
					new ActivoBajaArchivosModel(
						$this->Id_Adjunto = -1,
						$this->Url_Adjunto = $e->getMessage()
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



		// Agrega el registro del Archivo ligados a un Activo dado/proceso de Baja
		public function ActivoBajaArchivosAdd(ActivoBajaArchivosModel $ActivoBajaArchivosModel)
		{
			$resultado = new ResultadoModel();
			$_proveedor = new Proveedor('SQLSERVER', 'activos');
			$conn = $_proveedor->connect();

			try {
				$arrayParametros = [];
				if($ActivoBajaArchivosModel->Id_Activo != null) { array_push($arrayParametros, "@Id_Activo=" . $ActivoBajaArchivosModel->Id_Activo); }
				if($ActivoBajaArchivosModel->Url_Adjunto != null) { array_push($arrayParametros, "@Url_Adjunto='" . $ActivoBajaArchivosModel->Url_Adjunto . "'"); }
				if($ActivoBajaArchivosModel->Id_Usuario != null) { array_push($arrayParametros, "@Id_Usuario=" . $ActivoBajaArchivosModel->Id_Usuario); }
				$cadsql = "EXEC sp_siga_baja_activo_archivos_add " . implode(",", $arrayParametros);

				// Ejecución de la cadena
				$reader = $conn->execute($cadsql);
				// Recorre los registros encontrados
				while($elemento = $_proveedor->fetch_array($reader, 0)) {
					$resultado->intResultado = $elemento["Resultado"];
					$resultado->strMensaje = $elemento["Mensaje"];
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



		// Agrega el registro del Archivo ligados a un Activo dado/proceso de Baja
		public function ActivoBajaArchivosDel(ActivoBajaArchivosModel $ActivoBajaArchivosModel)
		{
			$resultado = new ResultadoModel();
			$_proveedor = new Proveedor('SQLSERVER', 'activos');
			$conn = $_proveedor->connect();

			try {
				// Recupera la lista de productos destacados
				$arrayParametros = [];
				if($ActivoBajaArchivosModel->Id_Adjunto != null) { array_push($arrayParametros, "@Id_Adjunto=" . $ActivoBajaArchivosModel->Id_Adjunto); }
				if($ActivoBajaArchivosModel->Id_Usuario != null) { array_push($arrayParametros, "@Id_Usuario=" . $ActivoBajaArchivosModel->Id_Usuario); }
				$cadsql = "EXEC sp_siga_baja_activo_archivos_del " . implode(",", $arrayParametros);

				// Ejecución de la cadena
				$reader = $conn->execute($cadsql);
				// Recorre los registros encontrados
				while($elemento = $_proveedor->fetch_array($reader, 0)) {
					$resultado->intResultado = $elemento["Resultado"];
					$resultado->strMensaje = $elemento["Mensaje"];
					$resultado->strParametrosExtra = $elemento["Url_Adjunto"];
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