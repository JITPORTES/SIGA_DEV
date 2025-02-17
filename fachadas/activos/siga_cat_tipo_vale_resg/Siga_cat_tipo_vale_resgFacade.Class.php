<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_tipo_vale_resg/Siga_cat_tipo_vale_resgDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_cat_tipo_vale_resg/Siga_cat_tipo_vale_resgController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_cat_tipo_vale_resgFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_tipo_vale_resg($Siga_cat_tipo_vale_resgDto){
$Siga_cat_tipo_vale_resgDto->setId_Tipo_Vale_Resg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_tipo_vale_resgDto->getId_Tipo_Vale_Resg(),"utf8"):strtoupper($Siga_cat_tipo_vale_resgDto->getId_Tipo_Vale_Resg()))))));
if($this->esFecha($Siga_cat_tipo_vale_resgDto->getId_Tipo_Vale_Resg())){
$Siga_cat_tipo_vale_resgDto->setId_Tipo_Vale_Resg($this->fechaMysql($Siga_cat_tipo_vale_resgDto->getId_Tipo_Vale_Resg()));
}
$Siga_cat_tipo_vale_resgDto->setId_Area(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_tipo_vale_resgDto->getId_Area(),"utf8"):strtoupper($Siga_cat_tipo_vale_resgDto->getId_Area()))))));
if($this->esFecha($Siga_cat_tipo_vale_resgDto->getId_Area())){
$Siga_cat_tipo_vale_resgDto->setId_Area($this->fechaMysql($Siga_cat_tipo_vale_resgDto->getId_Area()));
}
$Siga_cat_tipo_vale_resgDto->setDesc_Tipo_Vale_Resg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_tipo_vale_resgDto->getDesc_Tipo_Vale_Resg(),"utf8"):strtoupper($Siga_cat_tipo_vale_resgDto->getDesc_Tipo_Vale_Resg()))))));
if($this->esFecha($Siga_cat_tipo_vale_resgDto->getDesc_Tipo_Vale_Resg())){
$Siga_cat_tipo_vale_resgDto->setDesc_Tipo_Vale_Resg($this->fechaMysql($Siga_cat_tipo_vale_resgDto->getDesc_Tipo_Vale_Resg()));
}
$Siga_cat_tipo_vale_resgDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_tipo_vale_resgDto->getFech_Inser(),"utf8"):strtoupper($Siga_cat_tipo_vale_resgDto->getFech_Inser()))))));
if($this->esFecha($Siga_cat_tipo_vale_resgDto->getFech_Inser())){
$Siga_cat_tipo_vale_resgDto->setFech_Inser($this->fechaMysql($Siga_cat_tipo_vale_resgDto->getFech_Inser()));
}
$Siga_cat_tipo_vale_resgDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_tipo_vale_resgDto->getUsr_Inser(),"utf8"):strtoupper($Siga_cat_tipo_vale_resgDto->getUsr_Inser()))))));
if($this->esFecha($Siga_cat_tipo_vale_resgDto->getUsr_Inser())){
$Siga_cat_tipo_vale_resgDto->setUsr_Inser($this->fechaMysql($Siga_cat_tipo_vale_resgDto->getUsr_Inser()));
}
$Siga_cat_tipo_vale_resgDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_tipo_vale_resgDto->getFech_Mod(),"utf8"):strtoupper($Siga_cat_tipo_vale_resgDto->getFech_Mod()))))));
if($this->esFecha($Siga_cat_tipo_vale_resgDto->getFech_Mod())){
$Siga_cat_tipo_vale_resgDto->setFech_Mod($this->fechaMysql($Siga_cat_tipo_vale_resgDto->getFech_Mod()));
}
$Siga_cat_tipo_vale_resgDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_tipo_vale_resgDto->getUsr_Mod(),"utf8"):strtoupper($Siga_cat_tipo_vale_resgDto->getUsr_Mod()))))));
if($this->esFecha($Siga_cat_tipo_vale_resgDto->getUsr_Mod())){
$Siga_cat_tipo_vale_resgDto->setUsr_Mod($this->fechaMysql($Siga_cat_tipo_vale_resgDto->getUsr_Mod()));
}
$Siga_cat_tipo_vale_resgDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_tipo_vale_resgDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_cat_tipo_vale_resgDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_cat_tipo_vale_resgDto->getEstatus_Reg())){
$Siga_cat_tipo_vale_resgDto->setEstatus_Reg($this->fechaMysql($Siga_cat_tipo_vale_resgDto->getEstatus_Reg()));
}
return $Siga_cat_tipo_vale_resgDto;
}
public function selectSiga_cat_tipo_vale_resg($Siga_cat_tipo_vale_resgDto){
$Siga_cat_tipo_vale_resgDto=$this->validarSiga_cat_tipo_vale_resg($Siga_cat_tipo_vale_resgDto);
$Siga_cat_tipo_vale_resgController = new Siga_cat_tipo_vale_resgController();
$Siga_cat_tipo_vale_resgDto = $Siga_cat_tipo_vale_resgController->selectSiga_cat_tipo_vale_resg($Siga_cat_tipo_vale_resgDto);
if($Siga_cat_tipo_vale_resgDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_tipo_vale_resgDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_cat_tipo_vale_resg($Siga_cat_tipo_vale_resgDto){
//$Siga_cat_tipo_vale_resgDto=$this->validarSiga_cat_tipo_vale_resg($Siga_cat_tipo_vale_resgDto);
$Siga_cat_tipo_vale_resgController = new Siga_cat_tipo_vale_resgController();
$Siga_cat_tipo_vale_resgDto = $Siga_cat_tipo_vale_resgController->insertSiga_cat_tipo_vale_resg($Siga_cat_tipo_vale_resgDto);
if($Siga_cat_tipo_vale_resgDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_tipo_vale_resgDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_cat_tipo_vale_resg($Siga_cat_tipo_vale_resgDto){
//$Siga_cat_tipo_vale_resgDto=$this->validarSiga_cat_tipo_vale_resg($Siga_cat_tipo_vale_resgDto);
$Siga_cat_tipo_vale_resgController = new Siga_cat_tipo_vale_resgController();
$Siga_cat_tipo_vale_resgDto = $Siga_cat_tipo_vale_resgController->updateSiga_cat_tipo_vale_resg($Siga_cat_tipo_vale_resgDto);
if($Siga_cat_tipo_vale_resgDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_tipo_vale_resgDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_cat_tipo_vale_resg($Siga_cat_tipo_vale_resgDto){
//$Siga_cat_tipo_vale_resgDto=$this->validarSiga_cat_tipo_vale_resg($Siga_cat_tipo_vale_resgDto);
$Siga_cat_tipo_vale_resgController = new Siga_cat_tipo_vale_resgController();
$Siga_cat_tipo_vale_resgDto = $Siga_cat_tipo_vale_resgController->deleteSiga_cat_tipo_vale_resg($Siga_cat_tipo_vale_resgDto);
if($Siga_cat_tipo_vale_resgDto==true){
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



@$Id_Tipo_Vale_Resg=$_POST["Id_Tipo_Vale_Resg"];
@$Id_Area=$_POST["Id_Area"];
@$Desc_Tipo_Vale_Resg=$_POST["Desc_Tipo_Vale_Resg"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];

$siga_cat_tipo_vale_resgFacade = new Siga_cat_tipo_vale_resgFacade();
$siga_cat_tipo_vale_resgDto = new Siga_cat_tipo_vale_resgDTO();

$siga_cat_tipo_vale_resgDto->setId_Tipo_Vale_Resg($Id_Tipo_Vale_Resg);
$siga_cat_tipo_vale_resgDto->setId_Area($Id_Area);
$siga_cat_tipo_vale_resgDto->setDesc_Tipo_Vale_Resg($Desc_Tipo_Vale_Resg);
$siga_cat_tipo_vale_resgDto->setFech_Inser($Fech_Inser);
$siga_cat_tipo_vale_resgDto->setUsr_Inser($Usr_Inser);
$siga_cat_tipo_vale_resgDto->setFech_Mod($Fech_Mod);
$siga_cat_tipo_vale_resgDto->setUsr_Mod($Usr_Mod);
$siga_cat_tipo_vale_resgDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_Tipo_Vale_Resg=="") ){
$siga_cat_tipo_vale_resgDto=$siga_cat_tipo_vale_resgFacade->insertSiga_cat_tipo_vale_resg($siga_cat_tipo_vale_resgDto);
echo $siga_cat_tipo_vale_resgDto;
} else if(($accion=="guardar") && ($Id_Tipo_Vale_Resg!="")){
$siga_cat_tipo_vale_resgDto=$siga_cat_tipo_vale_resgFacade->updateSiga_cat_tipo_vale_resg($siga_cat_tipo_vale_resgDto);
echo $siga_cat_tipo_vale_resgDto;
} else if($accion=="consultar"){
$siga_cat_tipo_vale_resgDto=$siga_cat_tipo_vale_resgFacade->selectSiga_cat_tipo_vale_resg($siga_cat_tipo_vale_resgDto);
echo $siga_cat_tipo_vale_resgDto;
} else if( ($accion=="baja") && ($Id_Tipo_Vale_Resg!="") ){
$siga_cat_tipo_vale_resgDto=$siga_cat_tipo_vale_resgFacade->deleteSiga_cat_tipo_vale_resg($siga_cat_tipo_vale_resgDto);
echo $siga_cat_tipo_vale_resgDto;
} else if( ($accion=="seleccionar") && ($Id_Tipo_Vale_Resg!="") ){
$siga_cat_tipo_vale_resgDto=$siga_cat_tipo_vale_resgFacade->selectSiga_cat_tipo_vale_resg($siga_cat_tipo_vale_resgDto);
echo $siga_cat_tipo_vale_resgDto;
}


?>