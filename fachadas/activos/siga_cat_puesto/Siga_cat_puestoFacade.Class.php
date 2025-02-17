<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_puesto/Siga_cat_puestoDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_cat_puesto/Siga_cat_puestoController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_cat_puestoFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_puesto($Siga_cat_puestoDto){
$Siga_cat_puestoDto->setId_Puesto(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_puestoDto->getId_Puesto(),"utf8"):strtoupper($Siga_cat_puestoDto->getId_Puesto()))))));
if($this->esFecha($Siga_cat_puestoDto->getId_Puesto())){
$Siga_cat_puestoDto->setId_Puesto($this->fechaMysql($Siga_cat_puestoDto->getId_Puesto()));
}
$Siga_cat_puestoDto->setId_Area(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_puestoDto->getId_Area(),"utf8"):strtoupper($Siga_cat_puestoDto->getId_Area()))))));
if($this->esFecha($Siga_cat_puestoDto->getId_Area())){
$Siga_cat_puestoDto->setId_Area($this->fechaMysql($Siga_cat_puestoDto->getId_Area()));
}
$Siga_cat_puestoDto->setDesc_Puesto(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_puestoDto->getDesc_Puesto(),"utf8"):strtoupper($Siga_cat_puestoDto->getDesc_Puesto()))))));
if($this->esFecha($Siga_cat_puestoDto->getDesc_Puesto())){
$Siga_cat_puestoDto->setDesc_Puesto($this->fechaMysql($Siga_cat_puestoDto->getDesc_Puesto()));
}
$Siga_cat_puestoDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_puestoDto->getFech_Inser(),"utf8"):strtoupper($Siga_cat_puestoDto->getFech_Inser()))))));
if($this->esFecha($Siga_cat_puestoDto->getFech_Inser())){
$Siga_cat_puestoDto->setFech_Inser($this->fechaMysql($Siga_cat_puestoDto->getFech_Inser()));
}
$Siga_cat_puestoDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_puestoDto->getUsr_Inser(),"utf8"):strtoupper($Siga_cat_puestoDto->getUsr_Inser()))))));
if($this->esFecha($Siga_cat_puestoDto->getUsr_Inser())){
$Siga_cat_puestoDto->setUsr_Inser($this->fechaMysql($Siga_cat_puestoDto->getUsr_Inser()));
}
$Siga_cat_puestoDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_puestoDto->getFech_Mod(),"utf8"):strtoupper($Siga_cat_puestoDto->getFech_Mod()))))));
if($this->esFecha($Siga_cat_puestoDto->getFech_Mod())){
$Siga_cat_puestoDto->setFech_Mod($this->fechaMysql($Siga_cat_puestoDto->getFech_Mod()));
}
$Siga_cat_puestoDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_puestoDto->getUsr_Mod(),"utf8"):strtoupper($Siga_cat_puestoDto->getUsr_Mod()))))));
if($this->esFecha($Siga_cat_puestoDto->getUsr_Mod())){
$Siga_cat_puestoDto->setUsr_Mod($this->fechaMysql($Siga_cat_puestoDto->getUsr_Mod()));
}
$Siga_cat_puestoDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_puestoDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_cat_puestoDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_cat_puestoDto->getEstatus_Reg())){
$Siga_cat_puestoDto->setEstatus_Reg($this->fechaMysql($Siga_cat_puestoDto->getEstatus_Reg()));
}
return $Siga_cat_puestoDto;
}
public function selectSiga_cat_puesto($Siga_cat_puestoDto){
$Siga_cat_puestoDto=$this->validarSiga_cat_puesto($Siga_cat_puestoDto);
$Siga_cat_puestoController = new Siga_cat_puestoController();
$Siga_cat_puestoDto = $Siga_cat_puestoController->selectSiga_cat_puesto($Siga_cat_puestoDto);
if($Siga_cat_puestoDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_puestoDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_cat_puesto($Siga_cat_puestoDto){
//$Siga_cat_puestoDto=$this->validarSiga_cat_puesto($Siga_cat_puestoDto);
$Siga_cat_puestoController = new Siga_cat_puestoController();
$Siga_cat_puestoDto = $Siga_cat_puestoController->insertSiga_cat_puesto($Siga_cat_puestoDto);
if($Siga_cat_puestoDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_puestoDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_cat_puesto($Siga_cat_puestoDto){
//$Siga_cat_puestoDto=$this->validarSiga_cat_puesto($Siga_cat_puestoDto);
$Siga_cat_puestoController = new Siga_cat_puestoController();
$Siga_cat_puestoDto = $Siga_cat_puestoController->updateSiga_cat_puesto($Siga_cat_puestoDto);
if($Siga_cat_puestoDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_puestoDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_cat_puesto($Siga_cat_puestoDto){
//$Siga_cat_puestoDto=$this->validarSiga_cat_puesto($Siga_cat_puestoDto);
$Siga_cat_puestoController = new Siga_cat_puestoController();
$Siga_cat_puestoDto = $Siga_cat_puestoController->deleteSiga_cat_puesto($Siga_cat_puestoDto);
if($Siga_cat_puestoDto==true){
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



@$Id_Puesto=$_POST["Id_Puesto"];
@$Id_Area=$_POST["Id_Area"];
@$Desc_Puesto=$_POST["Desc_Puesto"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];

$siga_cat_puestoFacade = new Siga_cat_puestoFacade();
$siga_cat_puestoDto = new Siga_cat_puestoDTO();

$siga_cat_puestoDto->setId_Puesto($Id_Puesto);
$siga_cat_puestoDto->setId_Area($Id_Area);
$siga_cat_puestoDto->setDesc_Puesto($Desc_Puesto);
$siga_cat_puestoDto->setFech_Inser($Fech_Inser);
$siga_cat_puestoDto->setUsr_Inser($Usr_Inser);
$siga_cat_puestoDto->setFech_Mod($Fech_Mod);
$siga_cat_puestoDto->setUsr_Mod($Usr_Mod);
$siga_cat_puestoDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_Puesto=="") ){
$siga_cat_puestoDto=$siga_cat_puestoFacade->insertSiga_cat_puesto($siga_cat_puestoDto);
echo $siga_cat_puestoDto;
} else if(($accion=="guardar") && ($Id_Puesto!="")){
$siga_cat_puestoDto=$siga_cat_puestoFacade->updateSiga_cat_puesto($siga_cat_puestoDto);
echo $siga_cat_puestoDto;
} else if($accion=="consultar"){
$siga_cat_puestoDto=$siga_cat_puestoFacade->selectSiga_cat_puesto($siga_cat_puestoDto);
echo $siga_cat_puestoDto;
} else if( ($accion=="baja") && ($Id_Puesto!="") ){
$siga_cat_puestoDto=$siga_cat_puestoFacade->deleteSiga_cat_puesto($siga_cat_puestoDto);
echo $siga_cat_puestoDto;
} else if( ($accion=="seleccionar") && ($Id_Puesto!="") ){
$siga_cat_puestoDto=$siga_cat_puestoFacade->selectSiga_cat_puesto($siga_cat_puestoDto);
echo $siga_cat_puestoDto;
}


?>