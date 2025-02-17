<?php
	include_once(dirname(__FILE__) . "/../../datos/connect/Proveedor.Class.php");
	include_once(dirname(__FILE__) . "/../../modelos/simple_mvc/ActivoFijoInventarioReportesModel.Class.php");
	include_once(dirname(__FILE__) . "/../../modelos/simple_mvc/ActivoFijoInventarioConsultasModel.Class.php");
	include_once(dirname(__FILE__) . "/../../modelos/simple_mvc/ResultadoModel.Class.php");

	class ActivoFijoInventarioReportesController {
		// Constructor
		public function __construct()
		{
			// Determina que acción(método) ha de ejecutarse
			if (isset($_POST['accion'])) {
				// Obtiene la lista versiones que se han generado para un reporte
				if($_POST['accion'] == "ReportesVersionesGet") {
					$this->ActivoFijoInventarioReportesVersionGet();
				}
				// Agrega una nueva versión a un reporte
				else if($_POST['accion'] == "ReporteVersionAdd") {
					$this->ActivoFijoInventarioReportesVersionAdd();
				}
				// Edita una versión del reporte pasado como parámetro
				else if($_POST['accion'] == "ReporteVersionEdit") {
					$this->ActivoFijoInventarioReportesVersionEdit();
				}
				// Elimina una versión del reporte pasado como parámetro
				else if($_POST['accion'] == "ReporteVersionDel") {
					$this->ActivoFijoInventarioReportesVersionDel();
				}


				// Obtiene la lista de columnas que forman parte de la versión del reporte pasado como parámetro
				else if($_POST['accion'] == "ReportesDetalleColumnasGet") {
					$this->ActivoFijoInventarioReportesDetalleColumnasGet();
				}
				// Agrega una columna a la versión del reporte
				else if($_POST['accion'] == "ReportesDetalleColumnasAdd") {
					$this->ActivoFijoInventarioReportesDetalleColumnasAdd();
				}
				// Edita una columna a la versión del reporte
				else if($_POST['accion'] == "ReportesDetalleColumnasEdit") {
					$this->ActivoFijoInventarioReportesDetalleColumnasEdit();
				}
				// Elimina una columna a la versión del reporte
				else if($_POST['accion'] == "ReportesDetalleColumnasDel") {
					$this->ActivoFijoInventarioReportesDetalleColumnasDel();
				}


				// Obtiene la tabla para ser usada en Inventario
				else if($_POST['accion'] == "ReportesInventarioTablaGet") {
					$this->ActivoFijoInventarioReportesInventarioTablaGet();
				}


				// CONSULTAS PARA REPORTES DE ACTIVO FIJO/INVENTARIO
				else if($_POST['accion'] == "LlenarDataTable") {
					$this->ActivoFijoInventarioLlenarDataTable();
				}
				else if($_POST['accion'] == "FiltroGenerico") {
					$this->ActivoFijoInventarioFiltroGenericoGet();
				}
			}
		}


		// Métodos para el controlador
		// VISTAS/VERSIONES DEL REPORTE
		// <summary>Devuelve una vista con la lista de versiones del reporte que han sido agregados previamente a la consulta</summary>
		public function ActivoFijoInventarioReportesVersionGet() {
			try {
				$file = '../../vistas/activo_fijo_inventario/inventario_reporte_versiones_lista.php';
				if (file_exists($file)) {
					// Obtiene la información de las versiones para un reporte pasado como parámetro
					$parametrosConsulta = new ActivoFijoInventarioReportesModel();
					if(isset($_POST['Id_Area'])) { $parametrosConsulta->Id_Area = $_POST["Id_Area"]; }
					if(isset($_POST['NombreTabla'])) { $parametrosConsulta->NombreTabla = $_POST["NombreTabla"]; }

					// Ejecución de la consulta
					$respuestaConsulta = $parametrosConsulta->ActivoFijoVersionesReportesGet($parametrosConsulta);
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

		// <summary>Agrega una nueva versión al reporta pasado como parámetro</summary>
		public function ActivoFijoInventarioReportesVersionAdd() {
				// Obtiene la información de los activos
				$parametrosConsulta = new ActivoFijoInventarioReportesModel();
				if(isset($_POST['Id_Area'])) { $parametrosConsulta->Id_Area = $_POST["Id_Area"]; }
				if(isset($_POST['NombreTabla'])) { $parametrosConsulta->NombreTabla = $_POST["NombreTabla"]; }
				if(isset($_POST['NombreVersion'])) { $parametrosConsulta->NombreVersion = $_POST["NombreVersion"]; }
				if(isset($_POST['Aplica'])) { $parametrosConsulta->Aplica = $_POST["Aplica"]; }
				if(isset($_POST['Id_Usuario'])) { $parametrosConsulta->Id_Usuario = $_POST["Id_Usuario"]; }

				// Devuelve la respuesta de la inserción
				echo json_encode($parametrosConsulta->ActivoFijoVersionesReportesAdd($parametrosConsulta));
		}

		// <summary>Edita una versión del reporta pasado como parámetro</summary>
		public function ActivoFijoInventarioReportesVersionEdit() {
			// Obtiene la información de los activos
			$parametrosConsulta = new ActivoFijoInventarioReportesModel();
			if(isset($_POST['Id_Reporte_Version'])) { $parametrosConsulta->Id_Reporte_Version = $_POST["Id_Reporte_Version"]; }
			if(isset($_POST['Id_Area'])) { $parametrosConsulta->Id_Area = $_POST["Id_Area"]; }
			if(isset($_POST['NombreVersion'])) { $parametrosConsulta->NombreVersion = $_POST["NombreVersion"]; }
			if(isset($_POST['Aplica'])) { $parametrosConsulta->Aplica = $_POST["Aplica"]; }
			if(isset($_POST['Id_Usuario'])) { $parametrosConsulta->Id_Usuario = $_POST["Id_Usuario"]; }

			// Devuelve la respuesta de la inserción
			echo json_encode($parametrosConsulta->ActivoFijoVersionesReportesEdit($parametrosConsulta));
		}

		// <summary>Elimina una nueva versión al reporta pasado como parámetro</summary>
		public function ActivoFijoInventarioReportesVersionDel() {
			// Obtiene la información de los activos
			$parametrosConsulta = new ActivoFijoInventarioReportesModel();
			if(isset($_POST['Id_Area'])) { $parametrosConsulta->Id_Area = $_POST["Id_Area"]; }
			if(isset($_POST['Id_Reporte_Version'])) { $parametrosConsulta->Id_Reporte_Version = $_POST["Id_Reporte_Version"]; }

			// Devuelve la respuesta de la inserción
			echo json_encode($parametrosConsulta->ActivoFijoVersionesReportesDel($parametrosConsulta));
	}



		// DETALLE DE LAS COLUMNAS
		// <summary>Devuelve la lista de columnas que se agregaron a la versión/vista </summary>
		public function ActivoFijoInventarioReportesDetalleColumnasGet() {
			try {
				$file = '../../vistas/activo_fijo_inventario/inventario_reporte_detalle_columnas_lista.php';
				if (file_exists($file)) {
					// Obtiene la información de los activos
					$parametrosConsulta = new ActivoFijoInventarioReportesModel();
					if(isset($_POST['Id_Area'])) { $parametrosConsulta->Id_Area = $_POST["Id_Area"]; }
					if(isset($_POST['Id_Reporte_Version'])) { $parametrosConsulta->Id_Reporte_Version = $_POST["Id_Reporte_Version"]; }

					// Ejecución de la consulta
					$respuestaConsulta = $parametrosConsulta->ActivoFijoReportesDetalleColumnasGet($parametrosConsulta);
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

		// <summary>Agrega una nueva columna al reporta pasado como parámetro</summary>
		public function ActivoFijoInventarioReportesDetalleColumnasAdd() {
			// Obtiene la información de los activos
			$parametrosConsulta = new ActivoFijoInventarioReportesModel();
			if(isset($_POST['Id_Reporte_Version'])) { $parametrosConsulta->Id_Reporte_Version = $_POST["Id_Reporte_Version"]; }
			if(isset($_POST['Id_Area'])) { $parametrosConsulta->Id_Area = $_POST["Id_Area"]; }
			if(isset($_POST['Id_Columna'])) { $parametrosConsulta->Id_Columna = $_POST["Id_Columna"]; }
			if(isset($_POST['Id_Usuario'])) { $parametrosConsulta->Id_Usuario = $_POST["Id_Usuario"]; }

			// Devuelve la respuesta de la inserción
			echo json_encode($parametrosConsulta->ActivoFijoReportesDetalleColumnasAdd($parametrosConsulta));
		}

		// <summary>Edita una columna al reporte pasado como parámetro</summary>
		public function ActivoFijoInventarioReportesDetalleColumnasEdit() {
			// Obtiene la información de los activos
			$parametrosConsulta = new ActivoFijoInventarioReportesModel();
			if(isset($_POST['Id_Reporte_Version'])) { $parametrosConsulta->Id_Reporte_Version = $_POST["Id_Reporte_Version"]; }
			if(isset($_POST['Id_Columna_Detalle'])) { $parametrosConsulta->Id_Columna_Detalle = $_POST["Id_Columna_Detalle"]; }
			if(isset($_POST['Orden'])) { $parametrosConsulta->Orden = $_POST["Orden"]; }
			if(isset($_POST['Id_Usuario'])) { $parametrosConsulta->Id_Usuario = $_POST["Id_Usuario"]; }

			// Devuelve la respuesta de la inserción
			echo json_encode($parametrosConsulta->ActivoFijoReportesDetalleColumnasEdit($parametrosConsulta));
		}

		// <summary>Elimina una columna al reporte pasado como parámetro</summary>
		public function ActivoFijoInventarioReportesDetalleColumnasDel() {
			// Obtiene la información de los activos
			$parametrosConsulta = new ActivoFijoInventarioReportesModel();
			if(isset($_POST['Id_Reporte_Version'])) { $parametrosConsulta->Id_Reporte_Version = $_POST["Id_Reporte_Version"]; }
			if(isset($_POST['Id_Columna_Detalle'])) { $parametrosConsulta->Id_Columna_Detalle = $_POST["Id_Columna_Detalle"]; }

			// Devuelve la respuesta de la inserción
			echo json_encode($parametrosConsulta->ActivoFijoReportesDetalleColumnasDel($parametrosConsulta));
		}



		// TABLAS DINAMICAS PARA USARSE EN INVENTARIO
		// <summary>Devuelve la tabla html con los encabezados dinamicos que fueron definidos en el administrador ubicado en Activo fijo</summary>
		public function ActivoFijoInventarioReportesInventarioTablaGet() {
			try {
				$file = '../../vistas/activo_fijo_inventario/inventario_reporte_tabla_inventario.php';
				if (file_exists($file)) {
					// Obtiene la información de los activos
					$parametrosConsulta = new ActivoFijoInventarioReportesModel();
					if(isset($_POST['Id_Area'])) { $parametrosConsulta->Id_Area = $_POST["Id_Area"]; }
					if(isset($_POST['NombreTabla'])) { $parametrosConsulta->NombreTabla = $_POST["NombreTabla"]; }
					if(isset($_POST['Id_Reporte_Version'])) { $parametrosConsulta->Id_Reporte_Version = $_POST['Id_Reporte_Version']; }

					// Ejecución de la consulta
					$respuestaConsulta = $parametrosConsulta->ActivoFijoReportesDetalleColumnasGet($parametrosConsulta);
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



		// LLENADO DE LOS DATATABLES
		// <summary>Genera la consulta para el llenado de los Datables de los distintos Inventarios</summary>
		public function ActivoFijoInventarioLlenarDataTable() {
			// https://stackoverflow.com/questions/4064444/returning-json-from-a-php-script
			// remove any string that could create an invalid JSON 
			// such as PHP Notice, Warning, logs...
			ob_clean();
			// this will clean up any previously added headers, to start clean
			//header_remove(); 
			// Set the content type to JSON and charset 
			// (charset can be set to something else)
			header("Content-type: application/json; charset=utf-8");

			// Recuperación de las variables enviadas de la página en un solo objeto para las consultas necesarias
			$parametrosConsulta = new ActivoFijoInventarioConsultasModel();

			// Propiedades de la Clase base de la cual se origina (herencia)
			if(isset($_POST['Id_Area'])) { $parametrosConsulta->setId_Area($_POST['Id_Area']); }
			if(isset($_POST['Num_Empleado'])) { $parametrosConsulta->setNum_Empleado($_POST['Num_Empleado']); }

			// Nombre de la tabla
			if(isset($_POST['NombreTabla'])) { $parametrosConsulta->NombreTabla = $_POST['NombreTabla']; }

			// Propiedades intrinsecas del Datatable
			if(isset($_POST['draw'])) { $parametrosConsulta->draw = $_POST["draw"]; }
			if(isset($_POST['columns'])) { $parametrosConsulta->columns = $_POST["columns"]; }
			if(isset($_POST['order'])) { $parametrosConsulta->order = $_POST["order"]; }
			if(isset($_POST['start'])) { $parametrosConsulta->start = $_POST["start"]; }
			if(isset($_POST['length'])) { $parametrosConsulta->length = $_POST["length"]; }
			if(isset($_POST['search'])) { $parametrosConsulta->search = $_POST["search"]; }
			
			// Parametros enviados a través del JSON (data)
			if(isset($_POST['orden'])) { $parametrosConsulta->orden = $_POST["orden"]; }
			if(isset($_POST['estatus'])) { $parametrosConsulta->estatus = $_POST["estatus"]; }
			if(isset($_POST['perfil'])) { $parametrosConsulta->perfil = $_POST["perfil"]; }
			if(isset($_POST['Fech_Inicial'])) { $parametrosConsulta->Fech_Inicial = $_POST["Fech_Inicial"]; }
			if(isset($_POST['Fech_Final'])) { $parametrosConsulta->Fech_Final = $_POST["Fech_Final"]; }
			if(isset($_POST['Tab'])) { $parametrosConsulta->Tab = $_POST["Tab"]; }

			// Lista de filtros que fueron seleccionados previamente al campo tipo Excel que se va a generar
			if(isset($_POST['listaFiltrosExcel'])) { $parametrosConsulta->lstFiltrosSuperior = $_POST["listaFiltrosExcel"]; }
			// Filtros enviados desde la selección tipo Excel. Construcción de manera dinámica
			if($parametrosConsulta->lstFiltrosSuperior != null) {
				$lstFiltrosSuperior = explode("|", $_POST['listaFiltrosExcel']);
				// Deben coincidir los nombre dinamicos establecidos en el catálogo para identificar cada campo sin que se escriba código para cada uno de manera tradicional
				for($i = 0; $i < count($lstFiltrosSuperior); $i++) {
					$parametrosConsulta->{ "Filtro_" . trim($lstFiltrosSuperior[$i]) } = $_POST["Filtro_" . $lstFiltrosSuperior[$i] . "_DataTable"];
				}
			}

			// Genera la consulta con todos los parametros y filtros enviados
			$respuesta = $parametrosConsulta->ActivoFijoInventarioConsultasReportesDataTableGet($parametrosConsulta);
			// Devuelve la respuesta de la inserción
			echo(str_replace("#cuenta#", $_POST["Filtro_AF_BC_DataTable"], $respuesta));
		}


		// <summary>Obtiene una lista por de elementos de acuerdo al campo pasado como parametro para realizar un filtro y generar reportes</summary>
		public function ActivoFijoInventarioFiltroGenericoGet() { //$Id_Area, $NombreCampo, $NombreTabla, $FiltroSuperior_AFBC = null, $FiltroSuperior_Nombre = null, $FiltroSuperior_Clasificacion = null, $FiltroSuperior_Marca = null, $FiltroSuperior_Modelo = null, $FiltroSuperior_NumSerie = null, $FiltroSuperior_Propiedad = null, $FiltroSuperior_UsuarioResponsable = null, $FiltroSuperior_UbicacionPrimaria = null, $FiltroSuperior_UbicacionSecundaria = null, $FiltroSuperior_Monto_Factura = null, $FiltroSuperior_ImporteSeguros = null, $FiltroSuperior_Estatus = null, $FiltroSuperior_Clase = null, $FiltroSuperior_MotivoBaja = null, $FiltroSuperior_FechaAlta = null, $FiltroSuperior_Descripcion = null, $FiltroSuperior_UbicacionPrimariaOrigen = null, $FiltroSuperior_UbicacionSecundariaOrigen = null, $FiltroSuperior_Baja_Usr_Solicitante = null, $FiltroSuperior_Baja_Usr_DirFinanciera = null, $FiltroSuperior_Baja_Usr_Contabilidad = null, $FiltroSuperior_EstatusWorkflow_Baja = null, $FiltroSuperior_UbicacionEspecifica = null, $proveedor = null) {
			// Objeto para el paso de parámetros
			$parametrosConsulta = new ActivoFijoInventarioConsultasModel();
			// Lista de parametros que definen el Area, el nombre del Campo pivote y el nombre de la tabla
			if(isset($_POST['Id_Area'])) { $parametrosConsulta->Id_Area = $_POST["Id_Area"]; }
			// Nombre de la tabla en la cual se encuentra el filtro tipo Excel
			if(isset($_POST['NombreTabla'])) { $parametrosConsulta->NombreTabla = $_POST["NombreTabla"]; }
			// Campo del cual se van arecuperar los elementos
			if(isset($_POST['NombreCampo'])) { $parametrosConsulta->NombreCampo = $_POST["NombreCampo"]; }
			// Lista de filtros que fueron seleccionados previamente al campo tipo Excel que se va a generar
			if(isset($_POST['lstFiltrosSuperior'])) { $parametrosConsulta->lstFiltrosSuperior = $_POST["lstFiltrosSuperior"]; }

			// Lista de Filtros que fueron seleccionados antes que el campo que se va a recuperar
			// Recupera la variable en donde vienen especificados los campos de manera dinamica
			$lstFiltrosSuperior = [];
			$lstABC = [];
			if(isset($_POST['lstFiltrosSuperior']) != null) {
				$lstFiltrosSuperior = explode("|", $_POST['lstFiltrosSuperior']);
				// Deben coincidir los nombre dinamicos establecidos en el catálogo para identificar cada campo sin que se escriba código para cada uno de manera tradicional
				for($i = 0; $i < count($lstFiltrosSuperior); $i++) {
					$parametrosConsulta->{ "Filtro_" . trim($lstFiltrosSuperior[$i]) } = $_POST["FiltroSuperior_" . $lstFiltrosSuperior[$i]];
					$lstABC[] = "Filtro_" . trim($lstFiltrosSuperior[$i] . " tiene " . $_POST["FiltroSuperior_" . $lstFiltrosSuperior[$i]]);
				}
			}

			// Genera la consulta con todos los parametros base y la lista de filtros que anteceden al filtro a generar
			$respuesta = $parametrosConsulta->FiltroSuperiorGenericoGet($parametrosConsulta);
			// Retorna en el objeto con los valores recuperados de la consulta
			echo(str_replace("#cuenta#", implode("<-->", $lstABC), $respuesta));
			//echo($respuesta);
		}
	}

	// Creación del objeto controlador y al crearse, se ejecuta el método
	$llamarMetodo = new ActivoFijoInventarioReportesController();
?>