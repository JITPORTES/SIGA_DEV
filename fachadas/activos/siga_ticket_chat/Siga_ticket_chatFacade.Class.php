<?php

//session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_ticket_chat/Siga_ticket_chatDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_ticket_chat/Siga_ticket_chatController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Max-Age: 1000");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
header("Access-Control-Allow-Methods: PUT, POST, GET, OPTIONS, DELETE");

class Siga_ticket_chatFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_ticket_chat($Siga_ticket_chatDto){
$Siga_ticket_chatDto->setId_Chat(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_ticket_chatDto->getId_Chat(),"utf8"):strtoupper($Siga_ticket_chatDto->getId_Chat()))))));
if($this->esFecha($Siga_ticket_chatDto->getId_Chat())){
$Siga_ticket_chatDto->setId_Chat($this->fechaMysql($Siga_ticket_chatDto->getId_Chat()));
}
$Siga_ticket_chatDto->setId_Solicitud(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_ticket_chatDto->getId_Solicitud(),"utf8"):strtoupper($Siga_ticket_chatDto->getId_Solicitud()))))));
if($this->esFecha($Siga_ticket_chatDto->getId_Solicitud())){
$Siga_ticket_chatDto->setId_Solicitud($this->fechaMysql($Siga_ticket_chatDto->getId_Solicitud()));
}
$Siga_ticket_chatDto->setId_UsuarioGestor(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_ticket_chatDto->getId_UsuarioGestor(),"utf8"):strtoupper($Siga_ticket_chatDto->getId_UsuarioGestor()))))));
if($this->esFecha($Siga_ticket_chatDto->getId_UsuarioGestor())){
$Siga_ticket_chatDto->setId_UsuarioGestor($this->fechaMysql($Siga_ticket_chatDto->getId_UsuarioGestor()));
}
$Siga_ticket_chatDto->setId_Usuario(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_ticket_chatDto->getId_Usuario(),"utf8"):strtoupper($Siga_ticket_chatDto->getId_Usuario()))))));
if($this->esFecha($Siga_ticket_chatDto->getId_Usuario())){
$Siga_ticket_chatDto->setId_Usuario($this->fechaMysql($Siga_ticket_chatDto->getId_Usuario()));
}
$Siga_ticket_chatDto->setNombre_Gestor(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_ticket_chatDto->getNombre_Gestor(),"utf8"):strtoupper($Siga_ticket_chatDto->getNombre_Gestor()))))));
if($this->esFecha($Siga_ticket_chatDto->getNombre_Gestor())){
$Siga_ticket_chatDto->setNombre_Gestor($this->fechaMysql($Siga_ticket_chatDto->getNombre_Gestor()));
}
$Siga_ticket_chatDto->setNombre_Usuario(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_ticket_chatDto->getNombre_Usuario(),"utf8"):strtoupper($Siga_ticket_chatDto->getNombre_Usuario()))))));
if($this->esFecha($Siga_ticket_chatDto->getNombre_Usuario())){
$Siga_ticket_chatDto->setNombre_Usuario($this->fechaMysql($Siga_ticket_chatDto->getNombre_Usuario()));
}
$Siga_ticket_chatDto->setFecha_Alta(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_ticket_chatDto->getFecha_Alta(),"utf8"):strtoupper($Siga_ticket_chatDto->getFecha_Alta()))))));
if($this->esFecha($Siga_ticket_chatDto->getFecha_Alta())){
$Siga_ticket_chatDto->setFecha_Alta($this->fechaMysql($Siga_ticket_chatDto->getFecha_Alta()));
}
$Siga_ticket_chatDto->setMensaje(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_ticket_chatDto->getMensaje(),"utf8"):strtoupper($Siga_ticket_chatDto->getMensaje()))))));
if($this->esFecha($Siga_ticket_chatDto->getMensaje())){
$Siga_ticket_chatDto->setMensaje($this->fechaMysql($Siga_ticket_chatDto->getMensaje()));
}
$Siga_ticket_chatDto->setId_Estatus_Proceso(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_ticket_chatDto->getId_Estatus_Proceso(),"utf8"):strtoupper($Siga_ticket_chatDto->getId_Estatus_Proceso()))))));
if($this->esFecha($Siga_ticket_chatDto->getId_Estatus_Proceso())){
$Siga_ticket_chatDto->setId_Estatus_Proceso($this->fechaMysql($Siga_ticket_chatDto->getId_Estatus_Proceso()));
}
return $Siga_ticket_chatDto;
}
public function selectSiga_ticket_chat($Siga_ticket_chatDto){
$Siga_ticket_chatDto=$this->validarSiga_ticket_chat($Siga_ticket_chatDto);
$Siga_ticket_chatController = new Siga_ticket_chatController();
$Siga_ticket_chatDto = $Siga_ticket_chatController->selectSiga_ticket_chat($Siga_ticket_chatDto);
if($Siga_ticket_chatDto!=""){
$dtoToJson = new DtoToJson($Siga_ticket_chatDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_ticket_chat($Siga_ticket_chatDto, $Url_Adjunto){
//$Siga_ticket_chatDto=$this->validarSiga_ticket_chat($Siga_ticket_chatDto);
$Siga_ticket_chatController = new Siga_ticket_chatController();
$Siga_ticket_chatDto = $Siga_ticket_chatController->insertSiga_ticket_chat($Siga_ticket_chatDto, $Url_Adjunto);
if($Siga_ticket_chatDto!=""){
$dtoToJson = new DtoToJson($Siga_ticket_chatDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_ticket_chat($Siga_ticket_chatDto){
//$Siga_ticket_chatDto=$this->validarSiga_ticket_chat($Siga_ticket_chatDto);
$Siga_ticket_chatController = new Siga_ticket_chatController();
$Siga_ticket_chatDto = $Siga_ticket_chatController->updateSiga_ticket_chat($Siga_ticket_chatDto);
if($Siga_ticket_chatDto!=""){
$dtoToJson = new DtoToJson($Siga_ticket_chatDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_ticket_chat($Siga_ticket_chatDto){
//$Siga_ticket_chatDto=$this->validarSiga_ticket_chat($Siga_ticket_chatDto);
$Siga_ticket_chatController = new Siga_ticket_chatController();
$Siga_ticket_chatDto = $Siga_ticket_chatController->deleteSiga_ticket_chat($Siga_ticket_chatDto);
if($Siga_ticket_chatDto==true){
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



@$Id_Chat=$_POST["Id_Chat"];
@$Id_Solicitud=$_POST["Id_Solicitud"];
@$Id_UsuarioGestor=$_POST["Id_UsuarioGestor"];
@$Id_Estatus_Proceso=$_POST["Id_Estatus_Proceso"];
@$Id_Usuario=$_POST["Id_Usuario"];
@$Nombre_Gestor=$_POST["Nombre_Gestor"];
@$Nombre_Usuario=$_POST["Nombre_Usuario"];
@$Fecha_Alta=$_POST["Fecha_Alta"];
@$Mensaje=$_POST["Mensaje"];
@$accion=$_POST["accion"];
////////////////////////////////
@$Url_Adjunto=$_POST["Url_Adjunto"];



$siga_ticket_chatFacade = new Siga_ticket_chatFacade();
$siga_ticket_chatDto = new Siga_ticket_chatDTO();

$siga_ticket_chatDto->setId_Chat($Id_Chat);
$siga_ticket_chatDto->setId_Solicitud($Id_Solicitud);
$siga_ticket_chatDto->setId_UsuarioGestor($Id_UsuarioGestor);
$siga_ticket_chatDto->setId_Estatus_Proceso($Id_Estatus_Proceso);
$siga_ticket_chatDto->setId_Usuario($Id_Usuario);
$siga_ticket_chatDto->setNombre_Gestor($Nombre_Gestor);
$siga_ticket_chatDto->setNombre_Usuario($Nombre_Usuario);
$siga_ticket_chatDto->setFecha_Alta($Fecha_Alta);
$siga_ticket_chatDto->setMensaje($Mensaje);

if( ($accion=="guardar") && ($Id_Chat=="") ){
$siga_ticket_chatDto=$siga_ticket_chatFacade->insertSiga_ticket_chat($siga_ticket_chatDto, $Url_Adjunto);
echo $siga_ticket_chatDto;
} else if(($accion=="guardar") && ($Id_Chat!="")){
$siga_ticket_chatDto=$siga_ticket_chatFacade->updateSiga_ticket_chat($siga_ticket_chatDto);
echo $siga_ticket_chatDto;
} else if($accion=="consultar"){
$siga_ticket_chatDto=$siga_ticket_chatFacade->selectSiga_ticket_chat($siga_ticket_chatDto);
echo $siga_ticket_chatDto;
} else if( ($accion=="baja") && ($Id_Chat!="") ){
$siga_ticket_chatDto=$siga_ticket_chatFacade->deleteSiga_ticket_chat($siga_ticket_chatDto);
echo $siga_ticket_chatDto;
} else if( ($accion=="seleccionar") && ($Id_Chat!="") ){
$siga_ticket_chatDto=$siga_ticket_chatFacade->selectSiga_ticket_chat($siga_ticket_chatDto);
echo $siga_ticket_chatDto;
}


?>