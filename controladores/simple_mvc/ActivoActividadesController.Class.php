<?php
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	ini_set('display_startup_errors', '1');
		
	include_once(dirname(__FILE__)."/../../datos/connect/Proveedor.Class.php");
	include_once(dirname(__FILE__)."/../../modelos/simple_mvc/MantenimientoPreventivoModel.Class.php");

	class ActivoActividadesController {
		public function __construct()
		{
			// Determina que acción(método) ha de ejecutarse
			if (isset($_POST['accion'])) {
				$this->obtenerMantenimientoPreventivoActual();
			}
		}


		// Métodos para el controlador
		// <summary>Obtiene la lista de mantenimientos preventivos que se muestran en un reporte basico</summary>
		public function obtenerMantenimientoPreventivoActual() {
			try {
				$file = '../../vistas/mantenimientos/mantenimiento-preventivo-mes.php';
				if (file_exists($file)) {
					// Obtiene la información de los mantenimientos
					$parametrosConsulta = new MantenimientoPreventivoModel();
					if(isset($_POST['Id_Area'])) { $parametrosConsulta->Id_Area = $_POST["Id_Area"]; }
					if(isset($_POST['Modo_Opcion'])) { $parametrosConsulta->Modo_Opcion = $_POST["Modo_Opcion"]; }
					$parametrosConsulta->PeriodoTiempoInicio = $_POST["PeriodoTiempoInicio"];
					$parametrosConsulta->PeriodoTiempoFinal = $_POST["PeriodoTiempoFinal"];
			
					// Filtros
					if(isset($_POST['Id_Ubic_Prim'])) { $parametrosConsulta->Id_Ubic_Prim = $_POST["Id_Ubic_Prim"]; }
					if(isset($_POST['Id_Ubic_Sec'])) { $parametrosConsulta->Id_Ubic_Sec = $_POST["Id_Ubic_Sec"]; }
					if(isset($_POST['Id_Clase'])) { $parametrosConsulta->Id_Clase = $_POST["Id_Clase"]; }
					if(isset($_POST['Id_Clasificacion'])) { $parametrosConsulta->Id_Clasificacion = $_POST["Id_Clasificacion"]; }
					if(isset($_POST['Id_Familia'])) { $parametrosConsulta->Id_Familia = $_POST["Id_Familia"]; }
					if(isset($_POST['Id_Subfamilia'])) { $parametrosConsulta->Id_Subfamilia = $_POST["Id_Subfamilia"]; }
					if(isset($_POST['Id_Activo'])) { $parametrosConsulta->Id_Activo = $_POST["Id_Activo"]; }

					// Ejecución de la consulta
					$respuestaConsulta = $parametrosConsulta->MantenimientoPreventivoGet($parametrosConsulta);
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
	$llamarMetodo = new ActivoActividadesController();
