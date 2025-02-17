<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	include_once(dirname(__FILE__) . "/../../../modelos/simple_mvc/ActivoBajaArchivosModel.Class.php");
	include_once(dirname(__FILE__) . "/../../../Archivos/borrar_archivo.php");


	class Siga_baja_activo_archivosController {
		public function __construct() {
			$metodo = isset($_POST["accion"]) ? $_POST["accion"] : null;
			switch($metodo) {
				case "consultar":
					// Agrega el registro de un archivo a un Activo que esta siendo dado de baja
					$this->obtenerArchivoBaja();
					break;

				case "agregar":
					// Agrega el registro de un archivo a un Activo que esta siendo dado de baja
					$this->agregarArchivoBaja();
					break;

				case "eliminar":
					// Elimina el registro de un archivo a un Activo que esta siendo dado de baja
					$this->eliminarArchivoBaja();
					break;

				default:
					// Método sin definición
					$resultado = new ResultadoModel();
					$resultado->intResultado = -1;
					$resultado->strMensaje = 'Metodo no especificado';
					echo json_encode($resultado);
					break;
			}
		}


		// <summary>
		// Obtiene la lista de Archivos que están ligados a un Activo dado de baja o en Proceso
		// </summary>
		public function obtenerArchivoBaja()
		{
			// Crea el método que será el encargado de realizar la inserción
			$listaArchivos = new ActivoBajaArchivosModel();
			// Recupera la información
			$listaArchivos->Id_Activo = isset($_POST["Id_Activo"]) ? $_POST["Id_Activo"] : null;
			// Retorna el objeto Json con la respuesta de la ejecución
			echo json_encode($listaArchivos->ActivoBajaArchivosGet($listaArchivos));
		}



		// <summary>
		// Registra el archivo que se adjunta a la Baja del Activo
		// Devuelve un objeto Resultado con el detalle de la ejecución
		// </summary>
		public function agregarArchivoBaja()
		{
			// Crea el método que será el encargado de realizar la inserción
			$listaArchivos = new ActivoBajaArchivosModel();
			// Recupera la información
			$listaArchivos->Id_Activo = isset($_POST["Id_Activo"]) ? $_POST["Id_Activo"] : null;
			$listaArchivos->Id_Usuario = isset($_POST["Id_Usuario"]) ? $_POST["Id_Usuario"] : null;
			$listaArchivos->Url_Adjunto = isset($_POST["Url_Adjunto"]) ? $_POST["Url_Adjunto"] : null;
			// Inserta el registro
			$insertarRegistro = $listaArchivos->ActivoBajaArchivosAdd($listaArchivos);
			if($insertarRegistro->intResultado <= 0) {
				// En caso de que no pueda registrarse el archivo, lo elimina fisicamente
				$eliminarArchivo = new borrar_archivo();
				$eliminarArchivo->delete_file('../../../Archivos/Archivos-Activos-Bajas/' . $listaArchivos->Id_Adjunto . '/' . $listaArchivos->Url_Adjunto);
			}
			// Retorna el objeto Json con la respuesta de la ejecución
			echo json_encode($insertarRegistro);
		}


		// <summary>
		// Elimina el archivo que se adjunta a la Baja del Activo
		// </summary>
		public function eliminarArchivoBaja()
		{
			// Crea el método que será el encargado de realizar la inserción
			$listaArchivos = new ActivoBajaArchivosModel();
			// Recupera la información
			$listaArchivos->Id_Adjunto = isset($_POST["Id_Adjunto"]) ? $_POST["Id_Adjunto"] : null;
			$listaArchivos->Id_Usuario = isset($_POST["Id_Usuario"]) ? $_POST["Id_Usuario"] : null;
			
			// Recupera la respuesta al momento de eliminar el registro
			// El procedimiento almacenado, devuelve el nombre del archivo y el Id del Activo
			$respuestaBorrado = $listaArchivos->ActivoBajaArchivosDel($listaArchivos);
			if($respuestaBorrado->intResultado > 0) {
				// Elimina el archivo fisicamente
				$eliminarArchivo = new borrar_archivo();
				$respuestaEliminarArchivo = json_decode($eliminarArchivo->delete_file('../../../Archivos/Archivos-Activos-Bajas/' . $respuestaBorrado->intResultado . '/' . $respuestaBorrado->strParametrosExtra));

				// Ha ocurrido un error al eliminar el archivo fisicamente
				if($respuestaEliminarArchivo->totalCount <= 0) {
					$respuestaBorrado->strMensaje .= "\nArchivo ligado: " . $respuestaEliminarArchivo->text;
				}
			}
			// Retorna el objeto Json con la respuesta de la ejecución
			echo json_encode($respuestaBorrado);
		}
	}


	// Ejecución del Constructor para identificar el método a ejecutar
	$Baja = new Siga_baja_activo_archivosController();
?>