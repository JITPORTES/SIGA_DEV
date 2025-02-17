<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_motivo_servicio/Siga_cat_motivo_servicioDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_cat_motivo_servicio/Siga_cat_motivo_servicioController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_cat_motivo_servicioFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_motivo_servicio($Siga_cat_motivo_servicioDto){
$Siga_cat_motivo_servicioDto->setId_Motivo_Servicio(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_motivo_servicioDto->getId_Motivo_Servicio(),"utf8"):strtoupper($Siga_cat_motivo_servicioDto->getId_Motivo_Servicio()))))));
if($this->esFecha($Siga_cat_motivo_servicioDto->getId_Motivo_Servicio())){
$Siga_cat_motivo_servicioDto->setId_Motivo_Servicio($this->fechaMysql($Siga_cat_motivo_servicioDto->getId_Motivo_Servicio()));
}
$Siga_cat_motivo_servicioDto->setId_Area(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_motivo_servicioDto->getId_Area(),"utf8"):strtoupper($Siga_cat_motivo_servicioDto->getId_Area()))))));
if($this->esFecha($Siga_cat_motivo_servicioDto->getId_Area())){
$Siga_cat_motivo_servicioDto->setId_Area($this->fechaMysql($Siga_cat_motivo_servicioDto->getId_Area()));
}
$Siga_cat_motivo_servicioDto->setDesc_Motivo_Servicio(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_motivo_servicioDto->getDesc_Motivo_Servicio(),"utf8"):strtoupper($Siga_cat_motivo_servicioDto->getDesc_Motivo_Servicio()))))));
if($this->esFecha($Siga_cat_motivo_servicioDto->getDesc_Motivo_Servicio())){
$Siga_cat_motivo_servicioDto->setDesc_Motivo_Servicio($this->fechaMysql($Siga_cat_motivo_servicioDto->getDesc_Motivo_Servicio()));
}
$Siga_cat_motivo_servicioDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_motivo_servicioDto->getFech_Inser(),"utf8"):strtoupper($Siga_cat_motivo_servicioDto->getFech_Inser()))))));
if($this->esFecha($Siga_cat_motivo_servicioDto->getFech_Inser())){
$Siga_cat_motivo_servicioDto->setFech_Inser($this->fechaMysql($Siga_cat_motivo_servicioDto->getFech_Inser()));
}
$Siga_cat_motivo_servicioDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_motivo_servicioDto->getUsr_Inser(),"utf8"):strtoupper($Siga_cat_motivo_servicioDto->getUsr_Inser()))))));
if($this->esFecha($Siga_cat_motivo_servicioDto->getUsr_Inser())){
$Siga_cat_motivo_servicioDto->setUsr_Inser($this->fechaMysql($Siga_cat_motivo_servicioDto->getUsr_Inser()));
}
$Siga_cat_motivo_servicioDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_motivo_servicioDto->getFech_Mod(),"utf8"):strtoupper($Siga_cat_motivo_servicioDto->getFech_Mod()))))));
if($this->esFecha($Siga_cat_motivo_servicioDto->getFech_Mod())){
$Siga_cat_motivo_servicioDto->setFech_Mod($this->fechaMysql($Siga_cat_motivo_servicioDto->getFech_Mod()));
}
$Siga_cat_motivo_servicioDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_motivo_servicioDto->getUsr_Mod(),"utf8"):strtoupper($Siga_cat_motivo_servicioDto->getUsr_Mod()))))));
if($this->esFecha($Siga_cat_motivo_servicioDto->getUsr_Mod())){
$Siga_cat_motivo_servicioDto->setUsr_Mod($this->fechaMysql($Siga_cat_motivo_servicioDto->getUsr_Mod()));
}
$Siga_cat_motivo_servicioDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_motivo_servicioDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_cat_motivo_servicioDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_cat_motivo_servicioDto->getEstatus_Reg())){
$Siga_cat_motivo_servicioDto->setEstatus_Reg($this->fechaMysql($Siga_cat_motivo_servicioDto->getEstatus_Reg()));
}
return $Siga_cat_motivo_servicioDto;
}
public function selectSiga_cat_motivo_servicio($Siga_cat_motivo_servicioDto){
$Siga_cat_motivo_servicioDto=$this->validarSiga_cat_motivo_servicio($Siga_cat_motivo_servicioDto);
$Siga_cat_motivo_servicioController = new Siga_cat_motivo_servicioController();
$Siga_cat_motivo_servicioDto = $Siga_cat_motivo_servicioController->selectSiga_cat_motivo_servicio($Siga_cat_motivo_servicioDto);
if($Siga_cat_motivo_servicioDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_motivo_servicioDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_cat_motivo_servicio($Siga_cat_motivo_servicioDto){
//$Siga_cat_motivo_servicioDto=$this->validarSiga_cat_motivo_servicio($Siga_cat_motivo_servicioDto);
$Siga_cat_motivo_servicioController = new Siga_cat_motivo_servicioController();
$Siga_cat_motivo_servicioDto = $Siga_cat_motivo_servicioController->insertSiga_cat_motivo_servicio($Siga_cat_motivo_servicioDto);
if($Siga_cat_motivo_servicioDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_motivo_servicioDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_cat_motivo_servicio($Siga_cat_motivo_servicioDto){
//$Siga_cat_motivo_servicioDto=$this->validarSiga_cat_motivo_servicio($Siga_cat_motivo_servicioDto);
$Siga_cat_motivo_servicioController = new Siga_cat_motivo_servicioController();
$Siga_cat_motivo_servicioDto = $Siga_cat_motivo_servicioController->updateSiga_cat_motivo_servicio($Siga_cat_motivo_servicioDto);
if($Siga_cat_motivo_servicioDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_motivo_servicioDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_cat_motivo_servicio($Siga_cat_motivo_servicioDto){
//$Siga_cat_motivo_servicioDto=$this->validarSiga_cat_motivo_servicio($Siga_cat_motivo_servicioDto);
$Siga_cat_motivo_servicioController = new Siga_cat_motivo_servicioController();
$Siga_cat_motivo_servicioDto = $Siga_cat_motivo_servicioController->deleteSiga_cat_motivo_servicio($Siga_cat_motivo_servicioDto);
if($Siga_cat_motivo_servicioDto==true){
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



@$Id_Motivo_Servicio=$_POST["Id_Motivo_Servicio"];
@$Id_Area=$_POST["Id_Area"];
@$Desc_Motivo_Servicio=$_POST["Desc_Motivo_Servicio"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];

$siga_cat_motivo_servicioFacade = new Siga_cat_motivo_servicioFacade();
$siga_cat_motivo_servicioDto = new Siga_cat_motivo_servicioDTO();

$siga_cat_motivo_servicioDto->setId_Motivo_Servicio($Id_Motivo_Servicio);
$siga_cat_motivo_servicioDto->setId_Area($Id_Area);
$siga_cat_motivo_servicioDto->setDesc_Motivo_Servicio($Desc_Motivo_Servicio);
$siga_cat_motivo_servicioDto->setFech_Inser($Fech_Inser);
$siga_cat_motivo_servicioDto->setUsr_Inser($Usr_Inser);
$siga_cat_motivo_servicioDto->setFech_Mod($Fech_Mod);
$siga_cat_motivo_servicioDto->setUsr_Mod($Usr_Mod);
$siga_cat_motivo_servicioDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_Motivo_Servicio=="") ){
$siga_cat_motivo_servicioDto=$siga_cat_motivo_servicioFacade->insertSiga_cat_motivo_servicio($siga_cat_motivo_servicioDto);
echo $siga_cat_motivo_servicioDto;
} else if(($accion=="guardar") && ($Id_Motivo_Servicio!="")){
$siga_cat_motivo_servicioDto=$siga_cat_motivo_servicioFacade->updateSiga_cat_motivo_servicio($siga_cat_motivo_servicioDto);
echo $siga_cat_motivo_servicioDto;
} else if($accion=="consultar"){
$siga_cat_motivo_servicioDto=$siga_cat_motivo_servicioFacade->selectSiga_cat_motivo_servicio($siga_cat_motivo_servicioDto);
echo $siga_cat_motivo_servicioDto;
} else if( ($accion=="baja") && ($Id_Motivo_Servicio!="") ){
$siga_cat_motivo_servicioDto=$siga_cat_motivo_servicioFacade->deleteSiga_cat_motivo_servicio($siga_cat_motivo_servicioDto);
echo $siga_cat_motivo_servicioDto;
} else if( ($accion=="seleccionar") && ($Id_Motivo_Servicio!="") ){
$siga_cat_motivo_servicioDto=$siga_cat_motivo_servicioFacade->selectSiga_cat_motivo_servicio($siga_cat_motivo_servicioDto);
echo $siga_cat_motivo_servicioDto;
}


?>