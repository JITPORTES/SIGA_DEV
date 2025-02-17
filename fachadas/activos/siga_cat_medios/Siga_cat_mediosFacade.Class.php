<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_medios/Siga_cat_mediosDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_cat_medios/Siga_cat_mediosController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_cat_mediosFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_medios($Siga_cat_mediosDto){
$Siga_cat_mediosDto->setId_Medio(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_mediosDto->getId_Medio(),"utf8"):strtoupper($Siga_cat_mediosDto->getId_Medio()))))));
if($this->esFecha($Siga_cat_mediosDto->getId_Medio())){
$Siga_cat_mediosDto->setId_Medio($this->fechaMysql($Siga_cat_mediosDto->getId_Medio()));
}
$Siga_cat_mediosDto->setId_Area(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_mediosDto->getId_Area(),"utf8"):strtoupper($Siga_cat_mediosDto->getId_Area()))))));
if($this->esFecha($Siga_cat_mediosDto->getId_Area())){
$Siga_cat_mediosDto->setId_Area($this->fechaMysql($Siga_cat_mediosDto->getId_Area()));
}
$Siga_cat_mediosDto->setDesc_Medio(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_mediosDto->getDesc_Medio(),"utf8"):strtoupper($Siga_cat_mediosDto->getDesc_Medio()))))));
if($this->esFecha($Siga_cat_mediosDto->getDesc_Medio())){
$Siga_cat_mediosDto->setDesc_Medio($this->fechaMysql($Siga_cat_mediosDto->getDesc_Medio()));
}
$Siga_cat_mediosDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_mediosDto->getFech_Inser(),"utf8"):strtoupper($Siga_cat_mediosDto->getFech_Inser()))))));
if($this->esFecha($Siga_cat_mediosDto->getFech_Inser())){
$Siga_cat_mediosDto->setFech_Inser($this->fechaMysql($Siga_cat_mediosDto->getFech_Inser()));
}
$Siga_cat_mediosDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_mediosDto->getUsr_Inser(),"utf8"):strtoupper($Siga_cat_mediosDto->getUsr_Inser()))))));
if($this->esFecha($Siga_cat_mediosDto->getUsr_Inser())){
$Siga_cat_mediosDto->setUsr_Inser($this->fechaMysql($Siga_cat_mediosDto->getUsr_Inser()));
}
$Siga_cat_mediosDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_mediosDto->getFech_Mod(),"utf8"):strtoupper($Siga_cat_mediosDto->getFech_Mod()))))));
if($this->esFecha($Siga_cat_mediosDto->getFech_Mod())){
$Siga_cat_mediosDto->setFech_Mod($this->fechaMysql($Siga_cat_mediosDto->getFech_Mod()));
}
$Siga_cat_mediosDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_mediosDto->getUsr_Mod(),"utf8"):strtoupper($Siga_cat_mediosDto->getUsr_Mod()))))));
if($this->esFecha($Siga_cat_mediosDto->getUsr_Mod())){
$Siga_cat_mediosDto->setUsr_Mod($this->fechaMysql($Siga_cat_mediosDto->getUsr_Mod()));
}
$Siga_cat_mediosDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_mediosDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_cat_mediosDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_cat_mediosDto->getEstatus_Reg())){
$Siga_cat_mediosDto->setEstatus_Reg($this->fechaMysql($Siga_cat_mediosDto->getEstatus_Reg()));
}
return $Siga_cat_mediosDto;
}
public function selectSiga_cat_medios($Siga_cat_mediosDto){
$Siga_cat_mediosDto=$this->validarSiga_cat_medios($Siga_cat_mediosDto);
$Siga_cat_mediosController = new Siga_cat_mediosController();
$Siga_cat_mediosDto = $Siga_cat_mediosController->selectSiga_cat_medios($Siga_cat_mediosDto);
if($Siga_cat_mediosDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_mediosDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_cat_medios($Siga_cat_mediosDto){
//$Siga_cat_mediosDto=$this->validarSiga_cat_medios($Siga_cat_mediosDto);
$Siga_cat_mediosController = new Siga_cat_mediosController();
$Siga_cat_mediosDto = $Siga_cat_mediosController->insertSiga_cat_medios($Siga_cat_mediosDto);
if($Siga_cat_mediosDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_mediosDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_cat_medios($Siga_cat_mediosDto){
//$Siga_cat_mediosDto=$this->validarSiga_cat_medios($Siga_cat_mediosDto);
$Siga_cat_mediosController = new Siga_cat_mediosController();
$Siga_cat_mediosDto = $Siga_cat_mediosController->updateSiga_cat_medios($Siga_cat_mediosDto);
if($Siga_cat_mediosDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_mediosDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_cat_medios($Siga_cat_mediosDto){
//$Siga_cat_mediosDto=$this->validarSiga_cat_medios($Siga_cat_mediosDto);
$Siga_cat_mediosController = new Siga_cat_mediosController();
$Siga_cat_mediosDto = $Siga_cat_mediosController->deleteSiga_cat_medios($Siga_cat_mediosDto);
if($Siga_cat_mediosDto==true){
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



@$Id_Medio=$_POST["Id_Medio"];
@$Id_Area=$_POST["Id_Area"];
@$Desc_Medio=$_POST["Desc_Medio"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];

$siga_cat_mediosFacade = new Siga_cat_mediosFacade();
$siga_cat_mediosDto = new Siga_cat_mediosDTO();

$siga_cat_mediosDto->setId_Medio($Id_Medio);
$siga_cat_mediosDto->setId_Area($Id_Area);
$siga_cat_mediosDto->setDesc_Medio($Desc_Medio);
$siga_cat_mediosDto->setFech_Inser($Fech_Inser);
$siga_cat_mediosDto->setUsr_Inser($Usr_Inser);
$siga_cat_mediosDto->setFech_Mod($Fech_Mod);
$siga_cat_mediosDto->setUsr_Mod($Usr_Mod);
$siga_cat_mediosDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_Medio=="") ){
$siga_cat_mediosDto=$siga_cat_mediosFacade->insertSiga_cat_medios($siga_cat_mediosDto);
echo $siga_cat_mediosDto;
} else if(($accion=="guardar") && ($Id_Medio!="")){
$siga_cat_mediosDto=$siga_cat_mediosFacade->updateSiga_cat_medios($siga_cat_mediosDto);
echo $siga_cat_mediosDto;
} else if($accion=="consultar"){
$siga_cat_mediosDto=$siga_cat_mediosFacade->selectSiga_cat_medios($siga_cat_mediosDto);
echo $siga_cat_mediosDto;
} else if( ($accion=="baja") && ($Id_Medio!="") ){
$siga_cat_mediosDto=$siga_cat_mediosFacade->deleteSiga_cat_medios($siga_cat_mediosDto);
echo $siga_cat_mediosDto;
} else if( ($accion=="seleccionar") && ($Id_Medio!="") ){
$siga_cat_mediosDto=$siga_cat_mediosFacade->selectSiga_cat_medios($siga_cat_mediosDto);
echo $siga_cat_mediosDto;
}


?>