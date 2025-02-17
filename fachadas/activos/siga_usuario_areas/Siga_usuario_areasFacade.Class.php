<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_usuario_areas/Siga_usuario_areasDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_usuario_areas/Siga_usuario_areasController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_usuario_areasFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_usuario_areas($Siga_usuario_areasDto){
$Siga_usuario_areasDto->setId_Usuario_Area(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_usuario_areasDto->getId_Usuario_Area(),"utf8"):strtoupper($Siga_usuario_areasDto->getId_Usuario_Area()))))));
if($this->esFecha($Siga_usuario_areasDto->getId_Usuario_Area())){
$Siga_usuario_areasDto->setId_Usuario_Area($this->fechaMysql($Siga_usuario_areasDto->getId_Usuario_Area()));
}
$Siga_usuario_areasDto->setId_Usuario(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_usuario_areasDto->getId_Usuario(),"utf8"):strtoupper($Siga_usuario_areasDto->getId_Usuario()))))));
if($this->esFecha($Siga_usuario_areasDto->getId_Usuario())){
$Siga_usuario_areasDto->setId_Usuario($this->fechaMysql($Siga_usuario_areasDto->getId_Usuario()));
}
$Siga_usuario_areasDto->setId_Area(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_usuario_areasDto->getId_Area(),"utf8"):strtoupper($Siga_usuario_areasDto->getId_Area()))))));
if($this->esFecha($Siga_usuario_areasDto->getId_Area())){
$Siga_usuario_areasDto->setId_Area($this->fechaMysql($Siga_usuario_areasDto->getId_Area()));
}
$Siga_usuario_areasDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_usuario_areasDto->getFech_Inser(),"utf8"):strtoupper($Siga_usuario_areasDto->getFech_Inser()))))));
if($this->esFecha($Siga_usuario_areasDto->getFech_Inser())){
$Siga_usuario_areasDto->setFech_Inser($this->fechaMysql($Siga_usuario_areasDto->getFech_Inser()));
}
$Siga_usuario_areasDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_usuario_areasDto->getUsr_Inser(),"utf8"):strtoupper($Siga_usuario_areasDto->getUsr_Inser()))))));
if($this->esFecha($Siga_usuario_areasDto->getUsr_Inser())){
$Siga_usuario_areasDto->setUsr_Inser($this->fechaMysql($Siga_usuario_areasDto->getUsr_Inser()));
}
$Siga_usuario_areasDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_usuario_areasDto->getFech_Mod(),"utf8"):strtoupper($Siga_usuario_areasDto->getFech_Mod()))))));
if($this->esFecha($Siga_usuario_areasDto->getFech_Mod())){
$Siga_usuario_areasDto->setFech_Mod($this->fechaMysql($Siga_usuario_areasDto->getFech_Mod()));
}
$Siga_usuario_areasDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_usuario_areasDto->getUsr_Mod(),"utf8"):strtoupper($Siga_usuario_areasDto->getUsr_Mod()))))));
if($this->esFecha($Siga_usuario_areasDto->getUsr_Mod())){
$Siga_usuario_areasDto->setUsr_Mod($this->fechaMysql($Siga_usuario_areasDto->getUsr_Mod()));
}
$Siga_usuario_areasDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_usuario_areasDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_usuario_areasDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_usuario_areasDto->getEstatus_Reg())){
$Siga_usuario_areasDto->setEstatus_Reg($this->fechaMysql($Siga_usuario_areasDto->getEstatus_Reg()));
}
return $Siga_usuario_areasDto;
}
public function selectSiga_usuario_areas($Siga_usuario_areasDto){
$Siga_usuario_areasDto=$this->validarSiga_usuario_areas($Siga_usuario_areasDto);
$Siga_usuario_areasController = new Siga_usuario_areasController();
$Siga_usuario_areasDto = $Siga_usuario_areasController->selectSiga_usuario_areas($Siga_usuario_areasDto);
if($Siga_usuario_areasDto!=""){
$dtoToJson = new DtoToJson($Siga_usuario_areasDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}

public function selectSiga_catareas($Siga_usuario_areasDto){
$Siga_usuario_areasDto=$this->validarSiga_usuario_areas($Siga_usuario_areasDto);
$Siga_usuario_areasController = new Siga_usuario_areasController();
$Siga_usuario_areasDto = $Siga_usuario_areasController->selectSiga_catareas($Siga_usuario_areasDto);
if($Siga_usuario_areasDto!=""){
$dtoToJson = new DtoToJson($Siga_usuario_areasDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_usuario_areas($Siga_usuario_areasDto){
//$Siga_usuario_areasDto=$this->validarSiga_usuario_areas($Siga_usuario_areasDto);
$Siga_usuario_areasController = new Siga_usuario_areasController();
$Siga_usuario_areasDto = $Siga_usuario_areasController->insertSiga_usuario_areas($Siga_usuario_areasDto);
if($Siga_usuario_areasDto!=""){
$dtoToJson = new DtoToJson($Siga_usuario_areasDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_usuario_areas($Siga_usuario_areasDto){
//$Siga_usuario_areasDto=$this->validarSiga_usuario_areas($Siga_usuario_areasDto);
$Siga_usuario_areasController = new Siga_usuario_areasController();
$Siga_usuario_areasDto = $Siga_usuario_areasController->updateSiga_usuario_areas($Siga_usuario_areasDto);
if($Siga_usuario_areasDto!=""){
$dtoToJson = new DtoToJson($Siga_usuario_areasDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_usuario_areas($Siga_usuario_areasDto){
//$Siga_usuario_areasDto=$this->validarSiga_usuario_areas($Siga_usuario_areasDto);
$Siga_usuario_areasController = new Siga_usuario_areasController();
$Siga_usuario_areasDto = $Siga_usuario_areasController->deleteSiga_usuario_areas($Siga_usuario_areasDto);
if($Siga_usuario_areasDto==true){
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



@$Id_Usuario_Area=$_POST["Id_Usuario_Area"];
@$Id_Usuario=$_POST["Id_Usuario"];
@$Id_Area=$_POST["Id_Area"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];

$siga_usuario_areasFacade = new Siga_usuario_areasFacade();
$siga_usuario_areasDto = new Siga_usuario_areasDTO();

$siga_usuario_areasDto->setId_Usuario_Area($Id_Usuario_Area);
$siga_usuario_areasDto->setId_Usuario($Id_Usuario);
$siga_usuario_areasDto->setId_Area($Id_Area);
$siga_usuario_areasDto->setFech_Inser($Fech_Inser);
$siga_usuario_areasDto->setUsr_Inser($Usr_Inser);
$siga_usuario_areasDto->setFech_Mod($Fech_Mod);
$siga_usuario_areasDto->setUsr_Mod($Usr_Mod);
$siga_usuario_areasDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_Usuario_Area=="") ){
$siga_usuario_areasDto=$siga_usuario_areasFacade->insertSiga_usuario_areas($siga_usuario_areasDto);
echo $siga_usuario_areasDto;
} else if(($accion=="guardar") && ($Id_Usuario_Area!="")){
$siga_usuario_areasDto=$siga_usuario_areasFacade->updateSiga_usuario_areas($siga_usuario_areasDto);
echo $siga_usuario_areasDto;
} else if($accion=="consultar"){
$siga_usuario_areasDto=$siga_usuario_areasFacade->selectSiga_usuario_areas($siga_usuario_areasDto);
echo $siga_usuario_areasDto;
}else if($accion=="consultarareas"){
$siga_usuario_areasDto=$siga_usuario_areasFacade->selectSiga_catareas($siga_usuario_areasDto);
echo $siga_usuario_areasDto;
} else if( ($accion=="baja") && ($Id_Usuario_Area!="") ){
$siga_usuario_areasDto=$siga_usuario_areasFacade->deleteSiga_usuario_areas($siga_usuario_areasDto);
echo $siga_usuario_areasDto;
} else if( ($accion=="seleccionar") && ($Id_Usuario_Area!="") ){
$siga_usuario_areasDto=$siga_usuario_areasFacade->selectSiga_usuario_areas($siga_usuario_areasDto);
echo $siga_usuario_areasDto;
}


?>