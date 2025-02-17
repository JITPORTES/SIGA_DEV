<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_prestamo_proceso/Siga_cat_prestamo_procesoDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_cat_prestamo_proceso/Siga_cat_prestamo_procesoController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_cat_prestamo_procesoFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_prestamo_proceso($Siga_cat_prestamo_procesoDto){
$Siga_cat_prestamo_procesoDto->setId_Estatus_Proceso(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_prestamo_procesoDto->getId_Estatus_Proceso(),"utf8"):strtoupper($Siga_cat_prestamo_procesoDto->getId_Estatus_Proceso()))))));
if($this->esFecha($Siga_cat_prestamo_procesoDto->getId_Estatus_Proceso())){
$Siga_cat_prestamo_procesoDto->setId_Estatus_Proceso($this->fechaMysql($Siga_cat_prestamo_procesoDto->getId_Estatus_Proceso()));
}
$Siga_cat_prestamo_procesoDto->setDesc_Proceso(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_prestamo_procesoDto->getDesc_Proceso(),"utf8"):strtoupper($Siga_cat_prestamo_procesoDto->getDesc_Proceso()))))));
if($this->esFecha($Siga_cat_prestamo_procesoDto->getDesc_Proceso())){
$Siga_cat_prestamo_procesoDto->setDesc_Proceso($this->fechaMysql($Siga_cat_prestamo_procesoDto->getDesc_Proceso()));
}
return $Siga_cat_prestamo_procesoDto;
}
public function selectSiga_cat_prestamo_proceso($Siga_cat_prestamo_procesoDto){
$Siga_cat_prestamo_procesoDto=$this->validarSiga_cat_prestamo_proceso($Siga_cat_prestamo_procesoDto);
$Siga_cat_prestamo_procesoController = new Siga_cat_prestamo_procesoController();
$Siga_cat_prestamo_procesoDto = $Siga_cat_prestamo_procesoController->selectSiga_cat_prestamo_proceso($Siga_cat_prestamo_procesoDto);
if($Siga_cat_prestamo_procesoDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_prestamo_procesoDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_cat_prestamo_proceso($Siga_cat_prestamo_procesoDto){
//$Siga_cat_prestamo_procesoDto=$this->validarSiga_cat_prestamo_proceso($Siga_cat_prestamo_procesoDto);
$Siga_cat_prestamo_procesoController = new Siga_cat_prestamo_procesoController();
$Siga_cat_prestamo_procesoDto = $Siga_cat_prestamo_procesoController->insertSiga_cat_prestamo_proceso($Siga_cat_prestamo_procesoDto);
if($Siga_cat_prestamo_procesoDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_prestamo_procesoDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_cat_prestamo_proceso($Siga_cat_prestamo_procesoDto){
//$Siga_cat_prestamo_procesoDto=$this->validarSiga_cat_prestamo_proceso($Siga_cat_prestamo_procesoDto);
$Siga_cat_prestamo_procesoController = new Siga_cat_prestamo_procesoController();
$Siga_cat_prestamo_procesoDto = $Siga_cat_prestamo_procesoController->updateSiga_cat_prestamo_proceso($Siga_cat_prestamo_procesoDto);
if($Siga_cat_prestamo_procesoDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_prestamo_procesoDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_cat_prestamo_proceso($Siga_cat_prestamo_procesoDto){
//$Siga_cat_prestamo_procesoDto=$this->validarSiga_cat_prestamo_proceso($Siga_cat_prestamo_procesoDto);
$Siga_cat_prestamo_procesoController = new Siga_cat_prestamo_procesoController();
$Siga_cat_prestamo_procesoDto = $Siga_cat_prestamo_procesoController->deleteSiga_cat_prestamo_proceso($Siga_cat_prestamo_procesoDto);
if($Siga_cat_prestamo_procesoDto==true){
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



@$Id_Estatus_Proceso=$_POST["Id_Estatus_Proceso"];
@$Desc_Proceso=$_POST["Desc_Proceso"];
@$accion=$_POST["accion"];

$siga_cat_prestamo_procesoFacade = new Siga_cat_prestamo_procesoFacade();
$siga_cat_prestamo_procesoDto = new Siga_cat_prestamo_procesoDTO();

$siga_cat_prestamo_procesoDto->setId_Estatus_Proceso($Id_Estatus_Proceso);
$siga_cat_prestamo_procesoDto->setDesc_Proceso($Desc_Proceso);

if( ($accion=="guardar") && ($Id_Estatus_Proceso=="") ){
$siga_cat_prestamo_procesoDto=$siga_cat_prestamo_procesoFacade->insertSiga_cat_prestamo_proceso($siga_cat_prestamo_procesoDto);
echo $siga_cat_prestamo_procesoDto;
} else if(($accion=="guardar") && ($Id_Estatus_Proceso!="")){
$siga_cat_prestamo_procesoDto=$siga_cat_prestamo_procesoFacade->updateSiga_cat_prestamo_proceso($siga_cat_prestamo_procesoDto);
echo $siga_cat_prestamo_procesoDto;
} else if($accion=="consultar"){
$siga_cat_prestamo_procesoDto=$siga_cat_prestamo_procesoFacade->selectSiga_cat_prestamo_proceso($siga_cat_prestamo_procesoDto);
echo $siga_cat_prestamo_procesoDto;
} else if( ($accion=="baja") && ($Id_Estatus_Proceso!="") ){
$siga_cat_prestamo_procesoDto=$siga_cat_prestamo_procesoFacade->deleteSiga_cat_prestamo_proceso($siga_cat_prestamo_procesoDto);
echo $siga_cat_prestamo_procesoDto;
} else if( ($accion=="seleccionar") && ($Id_Estatus_Proceso!="") ){
$siga_cat_prestamo_procesoDto=$siga_cat_prestamo_procesoFacade->selectSiga_cat_prestamo_proceso($siga_cat_prestamo_procesoDto);
echo $siga_cat_prestamo_procesoDto;
}


?>