<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_ticket_subseccion/Siga_cat_ticket_subseccionDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_cat_ticket_subseccion/Siga_cat_ticket_subseccionController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_cat_ticket_subseccionFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_ticket_subseccion($Siga_cat_ticket_subseccionDto){
$Siga_cat_ticket_subseccionDto->setId_Subseccion(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_ticket_subseccionDto->getId_Subseccion(),"utf8"):strtoupper($Siga_cat_ticket_subseccionDto->getId_Subseccion()))))));
if($this->esFecha($Siga_cat_ticket_subseccionDto->getId_Subseccion())){
$Siga_cat_ticket_subseccionDto->setId_Subseccion($this->fechaMysql($Siga_cat_ticket_subseccionDto->getId_Subseccion()));
}
$Siga_cat_ticket_subseccionDto->setDesc_Subseccion(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_ticket_subseccionDto->getDesc_Subseccion(),"utf8"):strtoupper($Siga_cat_ticket_subseccionDto->getDesc_Subseccion()))))));
if($this->esFecha($Siga_cat_ticket_subseccionDto->getDesc_Subseccion())){
$Siga_cat_ticket_subseccionDto->setDesc_Subseccion($this->fechaMysql($Siga_cat_ticket_subseccionDto->getDesc_Subseccion()));
}
$Siga_cat_ticket_subseccionDto->setId_Seccion(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_ticket_subseccionDto->getId_Seccion(),"utf8"):strtoupper($Siga_cat_ticket_subseccionDto->getId_Seccion()))))));
if($this->esFecha($Siga_cat_ticket_subseccionDto->getId_Seccion())){
$Siga_cat_ticket_subseccionDto->setId_Seccion($this->fechaMysql($Siga_cat_ticket_subseccionDto->getId_Seccion()));
}
return $Siga_cat_ticket_subseccionDto;
}
public function selectSiga_cat_ticket_subseccion($Siga_cat_ticket_subseccionDto){
$Siga_cat_ticket_subseccionDto=$this->validarSiga_cat_ticket_subseccion($Siga_cat_ticket_subseccionDto);
$Siga_cat_ticket_subseccionController = new Siga_cat_ticket_subseccionController();
$Siga_cat_ticket_subseccionDto = $Siga_cat_ticket_subseccionController->selectSiga_cat_ticket_subseccion($Siga_cat_ticket_subseccionDto);
if($Siga_cat_ticket_subseccionDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_ticket_subseccionDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_cat_ticket_subseccion($Siga_cat_ticket_subseccionDto){
//$Siga_cat_ticket_subseccionDto=$this->validarSiga_cat_ticket_subseccion($Siga_cat_ticket_subseccionDto);
$Siga_cat_ticket_subseccionController = new Siga_cat_ticket_subseccionController();
$Siga_cat_ticket_subseccionDto = $Siga_cat_ticket_subseccionController->insertSiga_cat_ticket_subseccion($Siga_cat_ticket_subseccionDto);
if($Siga_cat_ticket_subseccionDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_ticket_subseccionDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_cat_ticket_subseccion($Siga_cat_ticket_subseccionDto){
//$Siga_cat_ticket_subseccionDto=$this->validarSiga_cat_ticket_subseccion($Siga_cat_ticket_subseccionDto);
$Siga_cat_ticket_subseccionController = new Siga_cat_ticket_subseccionController();
$Siga_cat_ticket_subseccionDto = $Siga_cat_ticket_subseccionController->updateSiga_cat_ticket_subseccion($Siga_cat_ticket_subseccionDto);
if($Siga_cat_ticket_subseccionDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_ticket_subseccionDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_cat_ticket_subseccion($Siga_cat_ticket_subseccionDto){
//$Siga_cat_ticket_subseccionDto=$this->validarSiga_cat_ticket_subseccion($Siga_cat_ticket_subseccionDto);
$Siga_cat_ticket_subseccionController = new Siga_cat_ticket_subseccionController();
$Siga_cat_ticket_subseccionDto = $Siga_cat_ticket_subseccionController->deleteSiga_cat_ticket_subseccion($Siga_cat_ticket_subseccionDto);
if($Siga_cat_ticket_subseccionDto==true){
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



@$Id_Subseccion=$_POST["Id_Subseccion"];
@$Desc_Subseccion=$_POST["Desc_Subseccion"];
@$Id_Seccion=$_POST["Id_Seccion"];
@$accion=$_POST["accion"];

$siga_cat_ticket_subseccionFacade = new Siga_cat_ticket_subseccionFacade();
$siga_cat_ticket_subseccionDto = new Siga_cat_ticket_subseccionDTO();

$siga_cat_ticket_subseccionDto->setId_Subseccion($Id_Subseccion);
$siga_cat_ticket_subseccionDto->setDesc_Subseccion($Desc_Subseccion);
$siga_cat_ticket_subseccionDto->setId_Seccion($Id_Seccion);

if( ($accion=="guardar") && ($Id_Subseccion=="") ){
$siga_cat_ticket_subseccionDto=$siga_cat_ticket_subseccionFacade->insertSiga_cat_ticket_subseccion($siga_cat_ticket_subseccionDto);
echo $siga_cat_ticket_subseccionDto;
} else if(($accion=="guardar") && ($Id_Subseccion!="")){
$siga_cat_ticket_subseccionDto=$siga_cat_ticket_subseccionFacade->updateSiga_cat_ticket_subseccion($siga_cat_ticket_subseccionDto);
echo $siga_cat_ticket_subseccionDto;
} else if($accion=="consultar"){
$siga_cat_ticket_subseccionDto=$siga_cat_ticket_subseccionFacade->selectSiga_cat_ticket_subseccion($siga_cat_ticket_subseccionDto);
echo $siga_cat_ticket_subseccionDto;
} else if( ($accion=="baja") && ($Id_Subseccion!="") ){
$siga_cat_ticket_subseccionDto=$siga_cat_ticket_subseccionFacade->deleteSiga_cat_ticket_subseccion($siga_cat_ticket_subseccionDto);
echo $siga_cat_ticket_subseccionDto;
} else if( ($accion=="seleccionar") && ($Id_Subseccion!="") ){
$siga_cat_ticket_subseccionDto=$siga_cat_ticket_subseccionFacade->selectSiga_cat_ticket_subseccion($siga_cat_ticket_subseccionDto);
echo $siga_cat_ticket_subseccionDto;
}


?>