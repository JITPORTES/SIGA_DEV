<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_anios/Siga_cat_aniosDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_cat_anios/Siga_cat_aniosController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_cat_aniosFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_anios($Siga_cat_aniosDto){
$Siga_cat_aniosDto->setId_Anios(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_aniosDto->getId_Anios(),"utf8"):strtoupper($Siga_cat_aniosDto->getId_Anios()))))));
if($this->esFecha($Siga_cat_aniosDto->getId_Anios())){
$Siga_cat_aniosDto->setId_Anios($this->fechaMysql($Siga_cat_aniosDto->getId_Anios()));
}
$Siga_cat_aniosDto->setId_Area(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_aniosDto->getId_Area(),"utf8"):strtoupper($Siga_cat_aniosDto->getId_Area()))))));
if($this->esFecha($Siga_cat_aniosDto->getId_Area())){
$Siga_cat_aniosDto->setId_Area($this->fechaMysql($Siga_cat_aniosDto->getId_Area()));
}
$Siga_cat_aniosDto->setDesc_Anios(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_aniosDto->getDesc_Anios(),"utf8"):strtoupper($Siga_cat_aniosDto->getDesc_Anios()))))));
if($this->esFecha($Siga_cat_aniosDto->getDesc_Anios())){
$Siga_cat_aniosDto->setDesc_Anios($this->fechaMysql($Siga_cat_aniosDto->getDesc_Anios()));
}
$Siga_cat_aniosDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_aniosDto->getFech_Inser(),"utf8"):strtoupper($Siga_cat_aniosDto->getFech_Inser()))))));
if($this->esFecha($Siga_cat_aniosDto->getFech_Inser())){
$Siga_cat_aniosDto->setFech_Inser($this->fechaMysql($Siga_cat_aniosDto->getFech_Inser()));
}
$Siga_cat_aniosDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_aniosDto->getUsr_Inser(),"utf8"):strtoupper($Siga_cat_aniosDto->getUsr_Inser()))))));
if($this->esFecha($Siga_cat_aniosDto->getUsr_Inser())){
$Siga_cat_aniosDto->setUsr_Inser($this->fechaMysql($Siga_cat_aniosDto->getUsr_Inser()));
}
$Siga_cat_aniosDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_aniosDto->getFech_Mod(),"utf8"):strtoupper($Siga_cat_aniosDto->getFech_Mod()))))));
if($this->esFecha($Siga_cat_aniosDto->getFech_Mod())){
$Siga_cat_aniosDto->setFech_Mod($this->fechaMysql($Siga_cat_aniosDto->getFech_Mod()));
}
$Siga_cat_aniosDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_aniosDto->getUsr_Mod(),"utf8"):strtoupper($Siga_cat_aniosDto->getUsr_Mod()))))));
if($this->esFecha($Siga_cat_aniosDto->getUsr_Mod())){
$Siga_cat_aniosDto->setUsr_Mod($this->fechaMysql($Siga_cat_aniosDto->getUsr_Mod()));
}
$Siga_cat_aniosDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_aniosDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_cat_aniosDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_cat_aniosDto->getEstatus_Reg())){
$Siga_cat_aniosDto->setEstatus_Reg($this->fechaMysql($Siga_cat_aniosDto->getEstatus_Reg()));
}
return $Siga_cat_aniosDto;
}
public function selectSiga_cat_anios($Siga_cat_aniosDto){
$Siga_cat_aniosDto=$this->validarSiga_cat_anios($Siga_cat_aniosDto);
$Siga_cat_aniosController = new Siga_cat_aniosController();
$Siga_cat_aniosDto = $Siga_cat_aniosController->selectSiga_cat_anios($Siga_cat_aniosDto);
if($Siga_cat_aniosDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_aniosDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_cat_anios($Siga_cat_aniosDto){
//$Siga_cat_aniosDto=$this->validarSiga_cat_anios($Siga_cat_aniosDto);
$Siga_cat_aniosController = new Siga_cat_aniosController();
$Siga_cat_aniosDto = $Siga_cat_aniosController->insertSiga_cat_anios($Siga_cat_aniosDto);
if($Siga_cat_aniosDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_aniosDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_cat_anios($Siga_cat_aniosDto){
//$Siga_cat_aniosDto=$this->validarSiga_cat_anios($Siga_cat_aniosDto);
$Siga_cat_aniosController = new Siga_cat_aniosController();
$Siga_cat_aniosDto = $Siga_cat_aniosController->updateSiga_cat_anios($Siga_cat_aniosDto);
if($Siga_cat_aniosDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_aniosDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_cat_anios($Siga_cat_aniosDto){
//$Siga_cat_aniosDto=$this->validarSiga_cat_anios($Siga_cat_aniosDto);
$Siga_cat_aniosController = new Siga_cat_aniosController();
$Siga_cat_aniosDto = $Siga_cat_aniosController->deleteSiga_cat_anios($Siga_cat_aniosDto);
if($Siga_cat_aniosDto==true){
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



@$Id_Anios=$_POST["Id_Anios"];
@$Id_Area=$_POST["Id_Area"];
@$Desc_Anios=$_POST["Desc_Anios"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];

$siga_cat_aniosFacade = new Siga_cat_aniosFacade();
$siga_cat_aniosDto = new Siga_cat_aniosDTO();

$siga_cat_aniosDto->setId_Anios($Id_Anios);
$siga_cat_aniosDto->setId_Area($Id_Area);
$siga_cat_aniosDto->setDesc_Anios($Desc_Anios);
$siga_cat_aniosDto->setFech_Inser($Fech_Inser);
$siga_cat_aniosDto->setUsr_Inser($Usr_Inser);
$siga_cat_aniosDto->setFech_Mod($Fech_Mod);
$siga_cat_aniosDto->setUsr_Mod($Usr_Mod);
$siga_cat_aniosDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_Anios=="") ){
$siga_cat_aniosDto=$siga_cat_aniosFacade->insertSiga_cat_anios($siga_cat_aniosDto);
echo $siga_cat_aniosDto;
} else if(($accion=="guardar") && ($Id_Anios!="")){
$siga_cat_aniosDto=$siga_cat_aniosFacade->updateSiga_cat_anios($siga_cat_aniosDto);
echo $siga_cat_aniosDto;
} else if($accion=="consultar"){
$siga_cat_aniosDto=$siga_cat_aniosFacade->selectSiga_cat_anios($siga_cat_aniosDto);
echo $siga_cat_aniosDto;
} else if( ($accion=="baja") && ($Id_Anios!="") ){
$siga_cat_aniosDto=$siga_cat_aniosFacade->deleteSiga_cat_anios($siga_cat_aniosDto);
echo $siga_cat_aniosDto;
} else if( ($accion=="seleccionar") && ($Id_Anios!="") ){
$siga_cat_aniosDto=$siga_cat_aniosFacade->selectSiga_cat_anios($siga_cat_aniosDto);
echo $siga_cat_aniosDto;
}


?>