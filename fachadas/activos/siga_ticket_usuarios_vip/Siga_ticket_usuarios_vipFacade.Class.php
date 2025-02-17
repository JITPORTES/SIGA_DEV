<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_ticket_usuarios_vip/Siga_ticket_usuarios_vipDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_ticket_usuarios_vip/Siga_ticket_usuarios_vipController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_ticket_usuarios_vipFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_ticket_usuarios_vip($Siga_ticket_usuarios_vipDto){
$Siga_ticket_usuarios_vipDto->setId_Usuario_Vip(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_ticket_usuarios_vipDto->getId_Usuario_Vip(),"utf8"):strtoupper($Siga_ticket_usuarios_vipDto->getId_Usuario_Vip()))))));
if($this->esFecha($Siga_ticket_usuarios_vipDto->getId_Usuario_Vip())){
$Siga_ticket_usuarios_vipDto->setId_Usuario_Vip($this->fechaMysql($Siga_ticket_usuarios_vipDto->getId_Usuario_Vip()));
}
$Siga_ticket_usuarios_vipDto->setId_Usuario(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_ticket_usuarios_vipDto->getId_Usuario(),"utf8"):strtoupper($Siga_ticket_usuarios_vipDto->getId_Usuario()))))));
if($this->esFecha($Siga_ticket_usuarios_vipDto->getId_Usuario())){
$Siga_ticket_usuarios_vipDto->setId_Usuario($this->fechaMysql($Siga_ticket_usuarios_vipDto->getId_Usuario()));
}
$Siga_ticket_usuarios_vipDto->setNo_Empleado(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_ticket_usuarios_vipDto->getNo_Empleado(),"utf8"):strtoupper($Siga_ticket_usuarios_vipDto->getNo_Empleado()))))));
if($this->esFecha($Siga_ticket_usuarios_vipDto->getNo_Empleado())){
$Siga_ticket_usuarios_vipDto->setNo_Empleado($this->fechaMysql($Siga_ticket_usuarios_vipDto->getNo_Empleado()));
}
$Siga_ticket_usuarios_vipDto->setNombre_Usuario(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_ticket_usuarios_vipDto->getNombre_Usuario(),"utf8"):strtoupper($Siga_ticket_usuarios_vipDto->getNombre_Usuario()))))));
if($this->esFecha($Siga_ticket_usuarios_vipDto->getNombre_Usuario())){
$Siga_ticket_usuarios_vipDto->setNombre_Usuario($this->fechaMysql($Siga_ticket_usuarios_vipDto->getNombre_Usuario()));
}
$Siga_ticket_usuarios_vipDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_ticket_usuarios_vipDto->getFech_Inser(),"utf8"):strtoupper($Siga_ticket_usuarios_vipDto->getFech_Inser()))))));
if($this->esFecha($Siga_ticket_usuarios_vipDto->getFech_Inser())){
$Siga_ticket_usuarios_vipDto->setFech_Inser($this->fechaMysql($Siga_ticket_usuarios_vipDto->getFech_Inser()));
}
$Siga_ticket_usuarios_vipDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_ticket_usuarios_vipDto->getUsr_Inser(),"utf8"):strtoupper($Siga_ticket_usuarios_vipDto->getUsr_Inser()))))));
if($this->esFecha($Siga_ticket_usuarios_vipDto->getUsr_Inser())){
$Siga_ticket_usuarios_vipDto->setUsr_Inser($this->fechaMysql($Siga_ticket_usuarios_vipDto->getUsr_Inser()));
}
$Siga_ticket_usuarios_vipDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_ticket_usuarios_vipDto->getFech_Mod(),"utf8"):strtoupper($Siga_ticket_usuarios_vipDto->getFech_Mod()))))));
if($this->esFecha($Siga_ticket_usuarios_vipDto->getFech_Mod())){
$Siga_ticket_usuarios_vipDto->setFech_Mod($this->fechaMysql($Siga_ticket_usuarios_vipDto->getFech_Mod()));
}
$Siga_ticket_usuarios_vipDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_ticket_usuarios_vipDto->getUsr_Mod(),"utf8"):strtoupper($Siga_ticket_usuarios_vipDto->getUsr_Mod()))))));
if($this->esFecha($Siga_ticket_usuarios_vipDto->getUsr_Mod())){
$Siga_ticket_usuarios_vipDto->setUsr_Mod($this->fechaMysql($Siga_ticket_usuarios_vipDto->getUsr_Mod()));
}
$Siga_ticket_usuarios_vipDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_ticket_usuarios_vipDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_ticket_usuarios_vipDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_ticket_usuarios_vipDto->getEstatus_Reg())){
$Siga_ticket_usuarios_vipDto->setEstatus_Reg($this->fechaMysql($Siga_ticket_usuarios_vipDto->getEstatus_Reg()));
}
return $Siga_ticket_usuarios_vipDto;
}
public function selectSiga_ticket_usuarios_vip($Siga_ticket_usuarios_vipDto){
$Siga_ticket_usuarios_vipDto=$this->validarSiga_ticket_usuarios_vip($Siga_ticket_usuarios_vipDto);
$Siga_ticket_usuarios_vipController = new Siga_ticket_usuarios_vipController();
$Siga_ticket_usuarios_vipDto = $Siga_ticket_usuarios_vipController->selectSiga_ticket_usuarios_vip($Siga_ticket_usuarios_vipDto);
if($Siga_ticket_usuarios_vipDto!=""){
$dtoToJson = new DtoToJson($Siga_ticket_usuarios_vipDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_ticket_usuarios_vip($Siga_ticket_usuarios_vipDto){
//$Siga_ticket_usuarios_vipDto=$this->validarSiga_ticket_usuarios_vip($Siga_ticket_usuarios_vipDto);
$Siga_ticket_usuarios_vipController = new Siga_ticket_usuarios_vipController();
$Siga_ticket_usuarios_vipDto = $Siga_ticket_usuarios_vipController->insertSiga_ticket_usuarios_vip($Siga_ticket_usuarios_vipDto);
if($Siga_ticket_usuarios_vipDto!=""){
$dtoToJson = new DtoToJson($Siga_ticket_usuarios_vipDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_ticket_usuarios_vip($Siga_ticket_usuarios_vipDto){
//$Siga_ticket_usuarios_vipDto=$this->validarSiga_ticket_usuarios_vip($Siga_ticket_usuarios_vipDto);
$Siga_ticket_usuarios_vipController = new Siga_ticket_usuarios_vipController();
$Siga_ticket_usuarios_vipDto = $Siga_ticket_usuarios_vipController->updateSiga_ticket_usuarios_vip($Siga_ticket_usuarios_vipDto);
if($Siga_ticket_usuarios_vipDto!=""){
$dtoToJson = new DtoToJson($Siga_ticket_usuarios_vipDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_ticket_usuarios_vip($Siga_ticket_usuarios_vipDto){
//$Siga_ticket_usuarios_vipDto=$this->validarSiga_ticket_usuarios_vip($Siga_ticket_usuarios_vipDto);
$Siga_ticket_usuarios_vipController = new Siga_ticket_usuarios_vipController();
$Siga_ticket_usuarios_vipDto = $Siga_ticket_usuarios_vipController->deleteSiga_ticket_usuarios_vip($Siga_ticket_usuarios_vipDto);
if($Siga_ticket_usuarios_vipDto==true){
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



@$Id_Usuario_Vip=$_POST["Id_Usuario_Vip"];
@$Id_Usuario=$_POST["Id_Usuario"];
@$No_Empleado=$_POST["No_Empleado"];
@$Nombre_Usuario=$_POST["Nombre_Usuario"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];

$siga_ticket_usuarios_vipFacade = new Siga_ticket_usuarios_vipFacade();
$siga_ticket_usuarios_vipDto = new Siga_ticket_usuarios_vipDTO();

$siga_ticket_usuarios_vipDto->setId_Usuario_Vip($Id_Usuario_Vip);
$siga_ticket_usuarios_vipDto->setId_Usuario($Id_Usuario);
$siga_ticket_usuarios_vipDto->setNo_Empleado($No_Empleado);
$siga_ticket_usuarios_vipDto->setNombre_Usuario($Nombre_Usuario);
$siga_ticket_usuarios_vipDto->setFech_Inser($Fech_Inser);
$siga_ticket_usuarios_vipDto->setUsr_Inser($Usr_Inser);
$siga_ticket_usuarios_vipDto->setFech_Mod($Fech_Mod);
$siga_ticket_usuarios_vipDto->setUsr_Mod($Usr_Mod);
$siga_ticket_usuarios_vipDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_Usuario_Vip=="") ){
$siga_ticket_usuarios_vipDto=$siga_ticket_usuarios_vipFacade->insertSiga_ticket_usuarios_vip($siga_ticket_usuarios_vipDto);
echo $siga_ticket_usuarios_vipDto;
} else if(($accion=="guardar") && ($Id_Usuario_Vip!="")){
$siga_ticket_usuarios_vipDto=$siga_ticket_usuarios_vipFacade->updateSiga_ticket_usuarios_vip($siga_ticket_usuarios_vipDto);
echo $siga_ticket_usuarios_vipDto;
} else if($accion=="consultar"){
$siga_ticket_usuarios_vipDto=$siga_ticket_usuarios_vipFacade->selectSiga_ticket_usuarios_vip($siga_ticket_usuarios_vipDto);
echo $siga_ticket_usuarios_vipDto;
} else if( ($accion=="baja") && ($Id_Usuario_Vip!="") ){
$siga_ticket_usuarios_vipDto=$siga_ticket_usuarios_vipFacade->deleteSiga_ticket_usuarios_vip($siga_ticket_usuarios_vipDto);
echo $siga_ticket_usuarios_vipDto;
} else if( ($accion=="seleccionar") && ($Id_Usuario_Vip!="") ){
$siga_ticket_usuarios_vipDto=$siga_ticket_usuarios_vipFacade->selectSiga_ticket_usuarios_vip($siga_ticket_usuarios_vipDto);
echo $siga_ticket_usuarios_vipDto;
}


?>