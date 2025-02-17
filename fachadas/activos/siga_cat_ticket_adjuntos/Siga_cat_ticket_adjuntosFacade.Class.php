<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_ticket_adjuntos/Siga_cat_ticket_adjuntosDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_cat_ticket_adjuntos/Siga_cat_ticket_adjuntosController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_cat_ticket_adjuntosFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_ticket_adjuntos($Siga_cat_ticket_adjuntosDto){
$Siga_cat_ticket_adjuntosDto->setId_Adjunto(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_ticket_adjuntosDto->getId_Adjunto(),"utf8"):strtoupper($Siga_cat_ticket_adjuntosDto->getId_Adjunto()))))));
if($this->esFecha($Siga_cat_ticket_adjuntosDto->getId_Adjunto())){
$Siga_cat_ticket_adjuntosDto->setId_Adjunto($this->fechaMysql($Siga_cat_ticket_adjuntosDto->getId_Adjunto()));
}
$Siga_cat_ticket_adjuntosDto->setId_Chat(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_ticket_adjuntosDto->getId_Chat(),"utf8"):strtoupper($Siga_cat_ticket_adjuntosDto->getId_Chat()))))));
if($this->esFecha($Siga_cat_ticket_adjuntosDto->getId_Chat())){
$Siga_cat_ticket_adjuntosDto->setId_Chat($this->fechaMysql($Siga_cat_ticket_adjuntosDto->getId_Chat()));
}
$Siga_cat_ticket_adjuntosDto->setUrl_Adjunto(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_ticket_adjuntosDto->getUrl_Adjunto(),"utf8"):strtoupper($Siga_cat_ticket_adjuntosDto->getUrl_Adjunto()))))));
if($this->esFecha($Siga_cat_ticket_adjuntosDto->getUrl_Adjunto())){
$Siga_cat_ticket_adjuntosDto->setUrl_Adjunto($this->fechaMysql($Siga_cat_ticket_adjuntosDto->getUrl_Adjunto()));
}
$Siga_cat_ticket_adjuntosDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_ticket_adjuntosDto->getFech_Inser(),"utf8"):strtoupper($Siga_cat_ticket_adjuntosDto->getFech_Inser()))))));
if($this->esFecha($Siga_cat_ticket_adjuntosDto->getFech_Inser())){
$Siga_cat_ticket_adjuntosDto->setFech_Inser($this->fechaMysql($Siga_cat_ticket_adjuntosDto->getFech_Inser()));
}
$Siga_cat_ticket_adjuntosDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_ticket_adjuntosDto->getUsr_Inser(),"utf8"):strtoupper($Siga_cat_ticket_adjuntosDto->getUsr_Inser()))))));
if($this->esFecha($Siga_cat_ticket_adjuntosDto->getUsr_Inser())){
$Siga_cat_ticket_adjuntosDto->setUsr_Inser($this->fechaMysql($Siga_cat_ticket_adjuntosDto->getUsr_Inser()));
}
$Siga_cat_ticket_adjuntosDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_ticket_adjuntosDto->getFech_Mod(),"utf8"):strtoupper($Siga_cat_ticket_adjuntosDto->getFech_Mod()))))));
if($this->esFecha($Siga_cat_ticket_adjuntosDto->getFech_Mod())){
$Siga_cat_ticket_adjuntosDto->setFech_Mod($this->fechaMysql($Siga_cat_ticket_adjuntosDto->getFech_Mod()));
}
$Siga_cat_ticket_adjuntosDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_ticket_adjuntosDto->getUsr_Mod(),"utf8"):strtoupper($Siga_cat_ticket_adjuntosDto->getUsr_Mod()))))));
if($this->esFecha($Siga_cat_ticket_adjuntosDto->getUsr_Mod())){
$Siga_cat_ticket_adjuntosDto->setUsr_Mod($this->fechaMysql($Siga_cat_ticket_adjuntosDto->getUsr_Mod()));
}
$Siga_cat_ticket_adjuntosDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_ticket_adjuntosDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_cat_ticket_adjuntosDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_cat_ticket_adjuntosDto->getEstatus_Reg())){
$Siga_cat_ticket_adjuntosDto->setEstatus_Reg($this->fechaMysql($Siga_cat_ticket_adjuntosDto->getEstatus_Reg()));
}
return $Siga_cat_ticket_adjuntosDto;
}
public function selectSiga_cat_ticket_adjuntos($Siga_cat_ticket_adjuntosDto){
$Siga_cat_ticket_adjuntosDto=$this->validarSiga_cat_ticket_adjuntos($Siga_cat_ticket_adjuntosDto);
$Siga_cat_ticket_adjuntosController = new Siga_cat_ticket_adjuntosController();
$Siga_cat_ticket_adjuntosDto = $Siga_cat_ticket_adjuntosController->selectSiga_cat_ticket_adjuntos($Siga_cat_ticket_adjuntosDto);
if($Siga_cat_ticket_adjuntosDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_ticket_adjuntosDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_cat_ticket_adjuntos($Siga_cat_ticket_adjuntosDto){
//$Siga_cat_ticket_adjuntosDto=$this->validarSiga_cat_ticket_adjuntos($Siga_cat_ticket_adjuntosDto);
$Siga_cat_ticket_adjuntosController = new Siga_cat_ticket_adjuntosController();
$Siga_cat_ticket_adjuntosDto = $Siga_cat_ticket_adjuntosController->insertSiga_cat_ticket_adjuntos($Siga_cat_ticket_adjuntosDto);
if($Siga_cat_ticket_adjuntosDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_ticket_adjuntosDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_cat_ticket_adjuntos($Siga_cat_ticket_adjuntosDto){
//$Siga_cat_ticket_adjuntosDto=$this->validarSiga_cat_ticket_adjuntos($Siga_cat_ticket_adjuntosDto);
$Siga_cat_ticket_adjuntosController = new Siga_cat_ticket_adjuntosController();
$Siga_cat_ticket_adjuntosDto = $Siga_cat_ticket_adjuntosController->updateSiga_cat_ticket_adjuntos($Siga_cat_ticket_adjuntosDto);
if($Siga_cat_ticket_adjuntosDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_ticket_adjuntosDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_cat_ticket_adjuntos($Siga_cat_ticket_adjuntosDto){
//$Siga_cat_ticket_adjuntosDto=$this->validarSiga_cat_ticket_adjuntos($Siga_cat_ticket_adjuntosDto);
$Siga_cat_ticket_adjuntosController = new Siga_cat_ticket_adjuntosController();
$Siga_cat_ticket_adjuntosDto = $Siga_cat_ticket_adjuntosController->deleteSiga_cat_ticket_adjuntos($Siga_cat_ticket_adjuntosDto);
if($Siga_cat_ticket_adjuntosDto==true){
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



@$Id_Adjunto=$_POST["Id_Adjunto"];
@$Id_Chat=$_POST["Id_Chat"];
@$Url_Adjunto=$_POST["Url_Adjunto"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];

$siga_cat_ticket_adjuntosFacade = new Siga_cat_ticket_adjuntosFacade();
$siga_cat_ticket_adjuntosDto = new Siga_cat_ticket_adjuntosDTO();

$siga_cat_ticket_adjuntosDto->setId_Adjunto($Id_Adjunto);
$siga_cat_ticket_adjuntosDto->setId_Chat($Id_Chat);
$siga_cat_ticket_adjuntosDto->setUrl_Adjunto($Url_Adjunto);
$siga_cat_ticket_adjuntosDto->setFech_Inser($Fech_Inser);
$siga_cat_ticket_adjuntosDto->setUsr_Inser($Usr_Inser);
$siga_cat_ticket_adjuntosDto->setFech_Mod($Fech_Mod);
$siga_cat_ticket_adjuntosDto->setUsr_Mod($Usr_Mod);
$siga_cat_ticket_adjuntosDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_Adjunto=="") ){
$siga_cat_ticket_adjuntosDto=$siga_cat_ticket_adjuntosFacade->insertSiga_cat_ticket_adjuntos($siga_cat_ticket_adjuntosDto);
echo $siga_cat_ticket_adjuntosDto;
} else if(($accion=="guardar") && ($Id_Adjunto!="")){
$siga_cat_ticket_adjuntosDto=$siga_cat_ticket_adjuntosFacade->updateSiga_cat_ticket_adjuntos($siga_cat_ticket_adjuntosDto);
echo $siga_cat_ticket_adjuntosDto;
} else if($accion=="consultar"){
$siga_cat_ticket_adjuntosDto=$siga_cat_ticket_adjuntosFacade->selectSiga_cat_ticket_adjuntos($siga_cat_ticket_adjuntosDto);
echo $siga_cat_ticket_adjuntosDto;
} else if( ($accion=="baja") && ($Id_Adjunto!="") ){
$siga_cat_ticket_adjuntosDto=$siga_cat_ticket_adjuntosFacade->deleteSiga_cat_ticket_adjuntos($siga_cat_ticket_adjuntosDto);
echo $siga_cat_ticket_adjuntosDto;
} else if( ($accion=="seleccionar") && ($Id_Adjunto!="") ){
$siga_cat_ticket_adjuntosDto=$siga_cat_ticket_adjuntosFacade->selectSiga_cat_ticket_adjuntos($siga_cat_ticket_adjuntosDto);
echo $siga_cat_ticket_adjuntosDto;
}


?>