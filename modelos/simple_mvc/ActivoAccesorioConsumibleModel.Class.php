<?php
	include_once(dirname(__FILE__) . "/../../datos/connect/Proveedor.Class.php");
	include_once(dirname(__FILE__) . "/ResultadoModel.Class.php");

	class ActivoAccesorioConsumibleModel {
		// Propiedades de la Clase
		protected $_proveedor;
		public $Id_Activo;
		public $AF_BC;
		public $Nombre_Activo;
		public $Id_Accesorio_Consumible;
		public $Sku;
		public $Descripcion;
		public $Marca;
		public $Modelo;
		public $Usr_Mod;
		public $Tipo;
		public $Nombre_Tipo;
		public $Id_Usuario;



		// Métodos del modelo
		// Obtiene la lista de Accesorios y Consumibles ligados a un activo
		public function ActivoAccesorioConsumibleGet(ActivoAccesorioConsumibleModel $parametrosAccesorioConsumible)
		{
			$listaElementos = [];
			$_proveedor = new Proveedor('SQLSERVER', 'activos');
			$conn = $_proveedor->connect();

			try {
				// Recupera la lista de usuarios que tienen asignados activos
				$arrayParametros = [];
				if($parametrosAccesorioConsumible->Id_Activo != null) { array_push($arrayParametros, "@Id_Activo='" . $parametrosAccesorioConsumible->Id_Activo . "'"); }
				if($parametrosAccesorioConsumible->Id_Accesorio_Consumible != null) { array_push($arrayParametros, "@Num_Empleado=" . $parametrosAccesorioConsumible->Num_Empleado); }
				$cadsql = 'EXEC sp_siga_activo_accesorio_consumible_get ' . implode("," , $arrayParametros);
				//echo $cadsql . "<br>";

				// Ejecución de la cadena
				$reader = $conn->execute($cadsql);
				// Recorre los registros encontrados
				while($elemento = $_proveedor->fetch_array($reader, 0)) {
					// Crea un obejeto para ser rellenado con la información encontrada
					$objetoTmp = new ActivoAccesorioConsumibleModel();
					$objetoTmp->Id_Accesorio_Consumible = $elemento["Id_Accesorio_Consumible"];
					$objetoTmp->Id_Activo = $elemento["Id_Activo"];
					$objetoTmp->AF_BC = $elemento["AF_BC"];
					$objetoTmp->Sku = trim($elemento["SKU"]);
					$objetoTmp->Nombre_Activo = trim($elemento["Nombre_Activo"]);
					$objetoTmp->Descripcion = $elemento["Descripcion"];
					$objetoTmp->Marca = $elemento["Marca"];
					$objetoTmp->Modelo = $elemento["Modelo"];
					$objetoTmp->Tipo = $elemento["Tipo"];
					$objetoTmp->Nombre_Tipo = $elemento["Nombre_Tipo"];
					// Agrega el objeto a la lista
					array_push($listaElementos, $objetoTmp);
				}
			}
			catch (\Exception $e) {
				// Ha ocurrido un error con la consulta y debe especificarse el error
				array_push($listaElementos,
					new ActivoAccesorioConsumibleModel(
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


		// Agrega un Accesorio/Consumible a un Activo pasado como parámetro
		public function ActivoAccesorioConsumibleAdd(ActivoAccesorioConsumibleModel $parametrosAccesorioConsumible)
		{
			$resultado = new ResultadoModel();
			$_proveedor = new Proveedor('SQLSERVER', 'activos');
			$conn = $_proveedor->connect();

			try {
				// Recupera la lista de usuarios que tienen asignados activos
				$arrayParametros = [];
				if($parametrosAccesorioConsumible->Id_Activo != null) { array_push($arrayParametros, "@Id_Activo='" . $parametrosAccesorioConsumible->Id_Activo . "'"); }
				if($parametrosAccesorioConsumible->Tipo != null) { array_push($arrayParametros, "@Tipo=" . $parametrosAccesorioConsumible->Tipo); }
				if($parametrosAccesorioConsumible->Sku != null) { array_push($arrayParametros, "@SKU='" . $parametrosAccesorioConsumible->Sku . "'"); }
				if($parametrosAccesorioConsumible->Descripcion != null) { array_push($arrayParametros, "@Descripcion='" . trim($parametrosAccesorioConsumible->Descripcion) . "'"); }
				if($parametrosAccesorioConsumible->Marca != null) { array_push($arrayParametros, "@Marca='" . $parametrosAccesorioConsumible->Marca . "'"); }
				if($parametrosAccesorioConsumible->Modelo != null) { array_push($arrayParametros, "@Modelo='" . $parametrosAccesorioConsumible->Modelo . "'"); }
				if($parametrosAccesorioConsumible->Id_Usuario != null) { array_push($arrayParametros, "@Id_Usuario=" . $parametrosAccesorioConsumible->Id_Usuario); }
				$cadsql = 'EXEC sp_siga_activo_accesorio_consumible_add ' . implode("," , $arrayParametros);

				// Ejecución de la cadena
				$reader = $conn->execute($cadsql);
				// Recorre los registros encontrados
				while($elemento = $_proveedor->fetch_array($reader, 0)) {
					$resultado->intResultado = $elemento["Resultado"];
					$resultado->strMensaje = $elemento["Mensaje"];
					$resultado->strParametrosExtra = $cadsql;
				}
			}
			catch (\Exception $e) {
				// Ha ocurrido un error con la consulta y debe especificarse el error
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


		// Modificar un Accesorio/Consumible a un Activo pasado como parámetro
		public function ActivoAccesorioConsumibleEdit(ActivoAccesorioConsumibleModel $parametrosAccesorioConsumible)
		{
			$resultado = new ResultadoModel();
			$_proveedor = new Proveedor('SQLSERVER', 'activos');
			$conn = $_proveedor->connect();

			try {
				// Recupera la lista de usuarios que tienen asignados activos
				$arrayParametros = [];
				if($parametrosAccesorioConsumible->Id_Accesorio_Consumible != null) { array_push($arrayParametros, "@Id_Accesorio_Consumible='" . $parametrosAccesorioConsumible->Id_Accesorio_Consumible . "'"); }
				if($parametrosAccesorioConsumible->Id_Activo != null) { array_push($arrayParametros, "@Id_Activo='" . $parametrosAccesorioConsumible->Id_Activo . "'"); }
				if($parametrosAccesorioConsumible->Sku != null) { array_push($arrayParametros, "@SKU='" . $parametrosAccesorioConsumible->Sku . "'"); }
				if($parametrosAccesorioConsumible->Descripcion != null) { array_push($arrayParametros, "@Descripcion='" . trim($parametrosAccesorioConsumible->Descripcion) . "'"); }
				if($parametrosAccesorioConsumible->Marca != null) { array_push($arrayParametros, "@Marca='" . $parametrosAccesorioConsumible->Marca . "'"); }
				if($parametrosAccesorioConsumible->Modelo != null) { array_push($arrayParametros, "@Modelo='" . $parametrosAccesorioConsumible->Modelo . "'"); }
				if($parametrosAccesorioConsumible->Id_Usuario != null) { array_push($arrayParametros, "@Id_Usuario=" . $parametrosAccesorioConsumible->Id_Usuario); }
				$cadsql = 'EXEC sp_siga_activo_accesorio_consumible_edit ' . implode("," , $arrayParametros);

				// Ejecución de la cadena
				$reader = $conn->execute($cadsql);
				// Recorre los registros encontrados
				while($elemento = $_proveedor->fetch_array($reader, 0)) {
					$resultado->intResultado = $elemento["Resultado"];
					$resultado->strMensaje = $elemento["Mensaje"];
					$resultado->strParametrosExtra = $cadsql;
				}
			}
			catch (\Exception $e) {
				// Ha ocurrido un error con la consulta y debe especificarse el error
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


		// Elimina un Accesorio/Consumible a un Activo pasado como parámetro
		public function ActivoAccesorioConsumibleDel(ActivoAccesorioConsumibleModel $parametrosAccesorioConsumible)
		{
			$resultado = new ResultadoModel();
			$_proveedor = new Proveedor('SQLSERVER', 'activos');
			$conn = $_proveedor->connect();

			try {
				// Recupera la lista de usuarios que tienen asignados activos
				$arrayParametros = [];
				if($parametrosAccesorioConsumible->Id_Accesorio_Consumible != null) { array_push($arrayParametros, "@Id_Accesorio_Consumible=" . $parametrosAccesorioConsumible->Id_Accesorio_Consumible); }
				if($parametrosAccesorioConsumible->Id_Activo != null) { array_push($arrayParametros, "@Id_Activo='" . $parametrosAccesorioConsumible->Id_Activo . "'"); }
				$cadsql = 'EXEC sp_siga_activo_accesorio_consumible_del ' . implode("," , $arrayParametros);
				//echo $cadsql . "<br>";

				// Ejecución de la cadena
				$reader = $conn->execute($cadsql);
				// Recorre los registros encontrados
				while($elemento = $_proveedor->fetch_array($reader, 0)) {
					$resultado->intResultado = $elemento["Resultado"];
					$resultado->strMensaje = $elemento["Mensaje"];
				}
			}
			catch (\Exception $e) {
				// Ha ocurrido un error con la consulta y debe especificarse el error
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