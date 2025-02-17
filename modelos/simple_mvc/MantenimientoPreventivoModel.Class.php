<?php
	include_once(dirname(__FILE__) . "/../../datos/connect/Proveedor.Class.php");
	include_once(dirname(__FILE__) . "/ResultadoModel.Class.php");

	class MantenimientoPreventivoModel {
		// Propiedades de la Clase
		protected $_proveedor;
		public $Id_Area;
		public $Periodo_Opcion;
		public $Modo_Opcion;
		// Datos basicos del Activo
		public $Id_Activo;
		public $AF_BC;
		public $NumSerie;
		public $Nombre_Activo;
		public $DescCorta;
		public $Modelo;
		public $Id_Ubic_Prim;
		public $Id_Ubic_Sec;
		public $Id_Clase;
		public $Id_Clasificacion;
		public $Id_Familia;
		public $Id_Subfamilia;
		public $Foto;
		// Ubicación Primaria/Secundaria del Activo
		public $Desc_Ubic_Prim;
		public $Desc_Ubic_Sec;
		// Info del Mantenimiento Preventivo
		public $Id_Actividad;
		public $Nombre_Rutina;
		public $Comentarios;
		public $Tipo_Actividad;
		// Detalle del Mantenimiento Preventivo
		public $Id_Det_Actividad;
		public $Num_Actividad;
		public $Fecha_Programada;
		public $Fecha_Realizada;
		public $PeriodoTiempoInicio;
		public $PeriodoTiempoFinal;
		// Liga al ticket
		public $Id_Solicitud;
		public $Color_Semaforo_Mantenimiento;


		// Métodos del modelo
		// Obtiene la lista de Mantenimientos Preventidos registrados
		public function MantenimientoPreventivoGet(MantenimientoPreventivoModel $mantenimientoPreventivoModel)
		{
			$listaElementos = [];
			$_proveedor = new Proveedor('SQLSERVER', 'activos');
			$conn = $_proveedor->connect();

			try {
				$arrayParametros = [];
				if($mantenimientoPreventivoModel->Id_Area != null) { array_push($arrayParametros, "@Id_Area=" . $mantenimientoPreventivoModel->Id_Area); }
				if($mantenimientoPreventivoModel->Modo_Opcion != null) { array_push($arrayParametros, "@ModoOpcion=" . $mantenimientoPreventivoModel->Modo_Opcion); }
				if($mantenimientoPreventivoModel->PeriodoTiempoInicio != null) { array_push($arrayParametros, "@PeriodoTiempoInicio='" . $mantenimientoPreventivoModel->PeriodoTiempoInicio . "'"); }
				if($mantenimientoPreventivoModel->PeriodoTiempoFinal != null) { array_push($arrayParametros, "@PeriodoTiempoFinal='" . $mantenimientoPreventivoModel->PeriodoTiempoFinal . "'"); }
				if($mantenimientoPreventivoModel->Id_Ubic_Prim != null) { array_push($arrayParametros, "@Id_Ubic_Prim=" . $mantenimientoPreventivoModel->Id_Ubic_Prim ); }
				if($mantenimientoPreventivoModel->Id_Ubic_Sec != null) { array_push($arrayParametros, "@Id_Ubic_Sec=" . $mantenimientoPreventivoModel->Id_Ubic_Sec); }
				if($mantenimientoPreventivoModel->Id_Clase != null) { array_push($arrayParametros, "@Id_Clase=" . $mantenimientoPreventivoModel->Id_Clase); }
				if($mantenimientoPreventivoModel->Id_Clasificacion != null) { array_push($arrayParametros, "@Id_Clasificacion=" . $mantenimientoPreventivoModel->Id_Clasificacion); }
				if($mantenimientoPreventivoModel->Id_Familia != null) { array_push($arrayParametros, "@Id_Familia=" . $mantenimientoPreventivoModel->Id_Familia); }
				if($mantenimientoPreventivoModel->Id_Subfamilia != null) { array_push($arrayParametros, "@Id_Subfamilia=" . $mantenimientoPreventivoModel->Id_Subfamilia); }
				if($mantenimientoPreventivoModel->Id_Activo != null) { array_push($arrayParametros, "@Id_Activo=" . $mantenimientoPreventivoModel->Id_Activo); }
				$cadsql = "EXEC sp_siga_mantenimiento_preventivo_lista_get " . implode(", ", $arrayParametros);
				//echo trim($cadsql) . "<br>";

				// Ejecución de la cadena
				$reader = $conn->execute($cadsql);
				// Recorre los registros encontrados
				while($elemento = $_proveedor->fetch_array($reader, 0)) {
					// Crea un obejeto para ser rellenado con la información encontrada
					$objetoTmp = new MantenimientoPreventivoModel();
					$objetoTmp->Id_Activo = $elemento["Id_Activo"];
					$objetoTmp->AF_BC = $elemento["AF_BC"];
					$objetoTmp->NumSerie = $elemento["NumSerie"];
					$objetoTmp->Nombre_Activo = $elemento["Nombre_Activo"];
					$objetoTmp->DescCorta = $elemento["DescCorta"];
					$objetoTmp->Modelo = $elemento["Modelo"];
					$objetoTmp->Id_Ubic_Prim = (int)$elemento["Id_Ubic_Prim"];
					$objetoTmp->Id_Ubic_Sec = (int)$elemento["Id_Ubic_Sec"];
					$objetoTmp->Foto = $elemento["Foto"];
					$objetoTmp->Desc_Ubic_Prim = $elemento["Desc_Ubic_Prim"];
					$objetoTmp->Desc_Ubic_Sec = $elemento["Desc_Ubic_Sec"];
					$objetoTmp->Id_Actividad = $elemento["Id_Actividad"];
					$objetoTmp->Nombre_Rutina = $elemento["Nombre_Rutina"];
					$objetoTmp->Comentarios = $elemento["Comentarios"];
					$objetoTmp->Tipo_Actividad = $elemento["Tipo_Actividad"];
					$objetoTmp->Id_Det_Actividad = $elemento["Id_Det_Actividad"];
					$objetoTmp->Num_Actividad = $elemento["Num_Actividad"];
					$objetoTmp->Fecha_Programada = $elemento["Fecha_Programada"];
					$objetoTmp->Fecha_Realizada = $elemento["Fecha_Realizada"];
					$objetoTmp->Fecha_Programada = $elemento["Fecha_Programada"];				
					$objetoTmp->Color_Semaforo_Mantenimiento = $elemento["Color_Semaforo_Mantenimiento"];
					// Agrega el objeto a la lista
					array_push($listaElementos, $objetoTmp);
				}
			}
			catch (\Exception $e) {
				// Ha ocurrido un error con la conexión y debe especificarse el error
				array_push($listaElementos,
					new MantenimientoPreventivoModel(
						$this->Id_Activo = -1,
						$this->DescCorta = $e->getMessage()
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
