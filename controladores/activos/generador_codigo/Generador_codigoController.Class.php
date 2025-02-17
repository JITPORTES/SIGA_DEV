<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/generador_codigo/Generador_codigoDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/generador_codigo/Generador_codigoDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Generador_codigoController {
private $proveedor;
public function __construct() {
}
public function validarGenerador_codigo($Generador_codigoDto){
$Generador_codigoDto->setnombre_tabla(strtoupper(str_ireplace("'","",trim($Generador_codigoDto->getnombre_tabla()))));
return $Generador_codigoDto;
}
public function selectGenerador_codigo($Generador_codigoDto,$proveedor=null){
	$Generador_codigoDto=$this->validarGenerador_codigo($Generador_codigoDto);
	$Generador_codigoDao = new Generador_codigoDAO();
	$Generador_codigoDto = $Generador_codigoDao->selectGenerador_codigo($Generador_codigoDto,$proveedor);
	$encontrados=false;
	$archivosE = array();
	$archivosEnvia = array();
	$respuesta="";
	$respuesta = array();
	if($Generador_codigoDto!=""){
		//Obtenemos el nombre de las carpetas del directorio fachada
		$directorio = opendir("../"); //ruta actual (fachada/activos/)
		while ($archivo = readdir($directorio)){ //obtenemos un archivo y luego otro sucesivamente
			if (is_dir($archivo)){//verificamos si es o no un directorio
				//echo "[".$archivo . "]<br />"; //de ser un directorio lo envolvemos entre corchetes
			}else{
				//pasamos el nombre del archivo al array
				$archivos[]=$archivo;
			}
		}
		/////////////////////////////////////////////////////////////
		
		if(count($archivos)>0){
			for($i=0;$i<count($Generador_codigoDto);$i++){
				$arraytblbd[]=$Generador_codigoDto[$i]->getnombre_tabla();			
			}
			
			if(count($arraytblbd)>0){
				$archivosbd= array_diff($arraytblbd, $archivos);
				
				if(count($archivosbd)>0)
				{
					foreach($archivosbd as $archivosbd)
					{
						$archivosE = array(
							"nombre_tabla" => $archivosbd
						);
						array_push($archivosEnvia, $archivosE);
						$encontrados=true;
					}
				}else{
					$respuesta = array("totalCount" => "0", "data" => "", "estatus" => "error", "mensaje" => "Ya existen los archivos"); 
				}
			}else{
				$respuesta = array("totalCount" => "0", "data" => "", "estatus" => "error", "mensaje" => "No se encontraron resultados"); 
			}
			
		}else{
			$respuesta = array("totalCount" => "0", "data" => "", "estatus" => "error", "mensaje" => "No existen archivos"); 
		}
	}else{
		$respuesta = array("totalCount" => "0", "data" => "", "estatus" => "error", "mensaje" => "No se encontraron resultados en la base de datos");  
	}

	if($encontrados==true){
		$respuesta = array("totalCount" => count($archivosEnvia), "data" => $archivosEnvia,"estatus" => "ok", "mensaje" => "Tablas Encontradas");      
	}

	return $respuesta;
}
public function insertGenerador_codigo($Generador_codigoDto,$proveedor=null){
$Generador_codigoDto=$this->validarGenerador_codigo($Generador_codigoDto);
$Generador_codigoDao = new Generador_codigoDAO();
$Generador_codigoDto = $Generador_codigoDao->insertGenerador_codigo($Generador_codigoDto,$proveedor);
return $Generador_codigoDto;
}
public function updateGenerador_codigo($Generador_codigoDto,$proveedor=null){
$Generador_codigoDto=$this->validarGenerador_codigo($Generador_codigoDto);
$Generador_codigoDao = new Generador_codigoDAO();
//$tmpDto = new Generador_codigoDTO();
//$tmpDto = $Generador_codigoDao->selectGenerador_codigo($Generador_codigoDto,$proveedor);
//if($tmpDto!=""){//$Generador_codigoDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Generador_codigoDto = $Generador_codigoDao->updateGenerador_codigo($Generador_codigoDto,$proveedor);
return $Generador_codigoDto;
//}
//return "";
}
public function deleteGenerador_codigo($Generador_codigoDto,$proveedor=null){
$Generador_codigoDto=$this->validarGenerador_codigo($Generador_codigoDto);
$Generador_codigoDao = new Generador_codigoDAO();
$Generador_codigoDto = $Generador_codigoDao->deleteGenerador_codigo($Generador_codigoDto,$proveedor);
return $Generador_codigoDto;
}
}
?>