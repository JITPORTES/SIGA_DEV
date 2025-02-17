<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/generador_codigo/Generador_codigoDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/generador_codigo/Generador_codigoController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Generador_codigoFacade {
private $proveedor;
public function __construct() {
}
public function validarGenerador_codigo($Generador_codigoDto){
$Generador_codigoDto->setnombre_tabla(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Generador_codigoDto->getnombre_tabla(),"utf8"):strtoupper($Generador_codigoDto->getnombre_tabla()))))));
if($this->esFecha($Generador_codigoDto->getnombre_tabla())){
$Generador_codigoDto->setnombre_tabla($this->fechaMysql($Generador_codigoDto->getnombre_tabla()));
}
return $Generador_codigoDto;
}
public function selectGenerador_codigo($Generador_codigoDto){
$Generador_codigoDto=$this->validarGenerador_codigo($Generador_codigoDto);
$Generador_codigoController = new Generador_codigoController();
$Generador_codigoDto = $Generador_codigoController->selectGenerador_codigo($Generador_codigoDto);
//if($Generador_codigoDto!=""){
//$dtoToJson = new DtoToJson($Generador_codigoDto);
//return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
//}
//$jsonDto = new Encode_JSON();
//return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
$jsonDto = new Encode_JSON();
return $jsonDto->encode($Generador_codigoDto);
}
public function insertGenerador_codigo($Generador_codigoDto){
$Generador_codigoDto=$this->validarGenerador_codigo($Generador_codigoDto);
$Generador_codigoController = new Generador_codigoController();
$Generador_codigoDto = $Generador_codigoController->insertGenerador_codigo($Generador_codigoDto);
if($Generador_codigoDto!=""){
$dtoToJson = new DtoToJson($Generador_codigoDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateGenerador_codigo($Generador_codigoDto){
$Generador_codigoDto=$this->validarGenerador_codigo($Generador_codigoDto);
$Generador_codigoController = new Generador_codigoController();
$Generador_codigoDto = $Generador_codigoController->updateGenerador_codigo($Generador_codigoDto);
if($Generador_codigoDto!=""){
$dtoToJson = new DtoToJson($Generador_codigoDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteGenerador_codigo($Generador_codigoDto){
$Generador_codigoDto=$this->validarGenerador_codigo($Generador_codigoDto);
$Generador_codigoController = new Generador_codigoController();
$Generador_codigoDto = $Generador_codigoController->deleteGenerador_codigo($Generador_codigoDto);
if($Generador_codigoDto==true){
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"REGISTRO ELIMINADO DE FORMA CORRECTA"));
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL LA BAJA"));
}
private function esFecha($fecha) {
if (preg_match('/^\d{1,2}\/\d{1,2}\/\d{4}$/', $fecha)) {
return true;
}
return false;
}
private function esFechaMysql($fecha) {
if (preg_match('/^\d{4}\-\d{1,2}\-\d{1,2}$/', $fecha)) {
return true;
}
return false;
}
private function fechaMysql($fecha) {
list($dia, $mes, $year) = explode("/", $fecha);
return $year . "-" . $mes . "-" . $dia;
}
private function fechaNormal($fecha) {
list($dia, $mes, $year) = explode("/", $fecha);
return $year . "-" . $mes . "-" . $dia;
}
}



@$nombre_tabla=$_POST["nombre_tabla"];
@$accion=$_POST["accion"];

$generador_codigoFacade = new Generador_codigoFacade();
$generador_codigoDto = new Generador_codigoDTO();

$generador_codigoDto->setNombre_tabla($nombre_tabla);

if( ($accion=="guardar") && ($siga_pruebas=="") ){
$generador_codigoDto=$generador_codigoFacade->insertGenerador_codigo($generador_codigoDto);
echo $generador_codigoDto;
} else if(($accion=="guardar") && ($siga_pruebas!="")){
$generador_codigoDto=$generador_codigoFacade->updateGenerador_codigo($generador_codigoDto);
echo $generador_codigoDto;
} else if($accion=="consultar"){
$generador_codigoDto=$generador_codigoFacade->selectGenerador_codigo($generador_codigoDto);
echo $generador_codigoDto;
} else if( ($accion=="baja") && ($siga_pruebas!="") ){
$generador_codigoDto=$generador_codigoFacade->deleteGenerador_codigo($generador_codigoDto);
echo $generador_codigoDto;
} else if( ($accion=="seleccionar") && ($siga_pruebas!="") ){
$generador_codigoDto=$generador_codigoFacade->selectGenerador_codigo($generador_codigoDto);
echo $generador_codigoDto;
}


?>