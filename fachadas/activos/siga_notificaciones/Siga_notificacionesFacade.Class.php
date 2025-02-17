<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_notificaciones/Siga_notificacionesDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_notificaciones/Siga_notificacionesController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_notificacionesFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_notificaciones($Siga_notificacionesDto){
$Siga_notificacionesDto->setId_Notificacion(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_notificacionesDto->getId_Notificacion(),"utf8"):strtoupper($Siga_notificacionesDto->getId_Notificacion()))))));
if($this->esFecha($Siga_notificacionesDto->getId_Notificacion())){
$Siga_notificacionesDto->setId_Notificacion($this->fechaMysql($Siga_notificacionesDto->getId_Notificacion()));
}
$Siga_notificacionesDto->setId_Usuario_Envia(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_notificacionesDto->getId_Usuario_Envia(),"utf8"):strtoupper($Siga_notificacionesDto->getId_Usuario_Envia()))))));
if($this->esFecha($Siga_notificacionesDto->getId_Usuario_Envia())){
$Siga_notificacionesDto->setId_Usuario_Envia($this->fechaMysql($Siga_notificacionesDto->getId_Usuario_Envia()));
}
$Siga_notificacionesDto->setId_Usuario_Recibe(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_notificacionesDto->getId_Usuario_Recibe(),"utf8"):strtoupper($Siga_notificacionesDto->getId_Usuario_Recibe()))))));
if($this->esFecha($Siga_notificacionesDto->getId_Usuario_Recibe())){
$Siga_notificacionesDto->setId_Usuario_Recibe($this->fechaMysql($Siga_notificacionesDto->getId_Usuario_Recibe()));
}
$Siga_notificacionesDto->setMensaje_Largo(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_notificacionesDto->getMensaje_Largo(),"utf8"):strtoupper($Siga_notificacionesDto->getMensaje_Largo()))))));
if($this->esFecha($Siga_notificacionesDto->getMensaje_Largo())){
$Siga_notificacionesDto->setMensaje_Largo($this->fechaMysql($Siga_notificacionesDto->getMensaje_Largo()));
}
$Siga_notificacionesDto->setMensaje_Corto(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_notificacionesDto->getMensaje_Corto(),"utf8"):strtoupper($Siga_notificacionesDto->getMensaje_Corto()))))));
if($this->esFecha($Siga_notificacionesDto->getMensaje_Corto())){
$Siga_notificacionesDto->setMensaje_Corto($this->fechaMysql($Siga_notificacionesDto->getMensaje_Corto()));
}
$Siga_notificacionesDto->setEstatus_Leido(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_notificacionesDto->getEstatus_Leido(),"utf8"):strtoupper($Siga_notificacionesDto->getEstatus_Leido()))))));
if($this->esFecha($Siga_notificacionesDto->getEstatus_Leido())){
$Siga_notificacionesDto->setEstatus_Leido($this->fechaMysql($Siga_notificacionesDto->getEstatus_Leido()));
}
$Siga_notificacionesDto->setEstatus_Eliminado(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_notificacionesDto->getEstatus_Eliminado(),"utf8"):strtoupper($Siga_notificacionesDto->getEstatus_Eliminado()))))));
if($this->esFecha($Siga_notificacionesDto->getEstatus_Eliminado())){
$Siga_notificacionesDto->setEstatus_Eliminado($this->fechaMysql($Siga_notificacionesDto->getEstatus_Eliminado()));
}
$Siga_notificacionesDto->setUrl_Archivho_Enviado(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_notificacionesDto->getUrl_Archivho_Enviado(),"utf8"):strtoupper($Siga_notificacionesDto->getUrl_Archivho_Enviado()))))));
if($this->esFecha($Siga_notificacionesDto->getUrl_Archivho_Enviado())){
$Siga_notificacionesDto->setUrl_Archivho_Enviado($this->fechaMysql($Siga_notificacionesDto->getUrl_Archivho_Enviado()));
}
$Siga_notificacionesDto->setId_Aplicacion(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_notificacionesDto->getId_Aplicacion(),"utf8"):strtoupper($Siga_notificacionesDto->getId_Aplicacion()))))));
if($this->esFecha($Siga_notificacionesDto->getId_Aplicacion())){
$Siga_notificacionesDto->setId_Aplicacion($this->fechaMysql($Siga_notificacionesDto->getId_Aplicacion()));
}
$Siga_notificacionesDto->setId_Area(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_notificacionesDto->getId_Area(),"utf8"):strtoupper($Siga_notificacionesDto->getId_Area()))))));
if($this->esFecha($Siga_notificacionesDto->getId_Area())){
$Siga_notificacionesDto->setId_Area($this->fechaMysql($Siga_notificacionesDto->getId_Area()));
}
$Siga_notificacionesDto->setId_Menu(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_notificacionesDto->getId_Menu(),"utf8"):strtoupper($Siga_notificacionesDto->getId_Menu()))))));
if($this->esFecha($Siga_notificacionesDto->getId_Menu())){
$Siga_notificacionesDto->setId_Menu($this->fechaMysql($Siga_notificacionesDto->getId_Menu()));
}
$Siga_notificacionesDto->setId_Submenu(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_notificacionesDto->getId_Submenu(),"utf8"):strtoupper($Siga_notificacionesDto->getId_Submenu()))))));
if($this->esFecha($Siga_notificacionesDto->getId_Submenu())){
$Siga_notificacionesDto->setId_Submenu($this->fechaMysql($Siga_notificacionesDto->getId_Submenu()));
}
$Siga_notificacionesDto->setFecha_Envio(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_notificacionesDto->getFecha_Envio(),"utf8"):strtoupper($Siga_notificacionesDto->getFecha_Envio()))))));
if($this->esFecha($Siga_notificacionesDto->getFecha_Envio())){
$Siga_notificacionesDto->setFecha_Envio($this->fechaMysql($Siga_notificacionesDto->getFecha_Envio()));
}
return $Siga_notificacionesDto;
}
public function selectSiga_notificaciones($Siga_notificacionesDto){
$Siga_notificacionesDto=$this->validarSiga_notificaciones($Siga_notificacionesDto);
$Siga_notificacionesController = new Siga_notificacionesController();
$Siga_notificacionesDto = $Siga_notificacionesController->selectSiga_notificaciones($Siga_notificacionesDto);
if($Siga_notificacionesDto!=""){
$dtoToJson = new DtoToJson($Siga_notificacionesDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}

public function selectNotificaciones_Usuario($Siga_notificacionesDto){
	$Siga_notificacionesController = new Siga_notificacionesController();
	$Siga_notificacionesDto = $Siga_notificacionesController->selectNotificaciones_Usuario($Siga_notificacionesDto);

	$jsonDto = new Encode_JSON();
	return $jsonDto->encode($Siga_notificacionesDto);
}

public function insertSiga_notificaciones($Siga_notificacionesDto){
//$Siga_notificacionesDto=$this->validarSiga_notificaciones($Siga_notificacionesDto);
$Siga_notificacionesController = new Siga_notificacionesController();
$Siga_notificacionesDto = $Siga_notificacionesController->insertSiga_notificaciones($Siga_notificacionesDto);
if($Siga_notificacionesDto!=""){
$dtoToJson = new DtoToJson($Siga_notificacionesDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}

public function notificacion_vale_resguardo($Siga_notificacionesDto,$Id_Vale_Resguardo,$Nombre_Solicitante, $Num_Empl_Solicitante,$Nombre_Jefe_Area,$Num_Empl_Resp_Area, $Autorizado_por){
$Siga_notificacionesController = new Siga_notificacionesController();
$Siga_notificacionesDto = $Siga_notificacionesController->notificacion_vale_resguardo($Siga_notificacionesDto,$Siga_notificacionesDto,$Id_Vale_Resguardo,$Nombre_Solicitante, $Num_Empl_Solicitante,$Nombre_Jefe_Area,$Num_Empl_Resp_Area, $Autorizado_por);

$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_notificacionesDto);
}

public function updateSiga_notificaciones($Siga_notificacionesDto){
//$Siga_notificacionesDto=$this->validarSiga_notificaciones($Siga_notificacionesDto);
$Siga_notificacionesController = new Siga_notificacionesController();
$Siga_notificacionesDto = $Siga_notificacionesController->updateSiga_notificaciones($Siga_notificacionesDto);
if($Siga_notificacionesDto!=""){
$dtoToJson = new DtoToJson($Siga_notificacionesDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_notificaciones($Siga_notificacionesDto){
//$Siga_notificacionesDto=$this->validarSiga_notificaciones($Siga_notificacionesDto);
$Siga_notificacionesController = new Siga_notificacionesController();
$Siga_notificacionesDto = $Siga_notificacionesController->deleteSiga_notificaciones($Siga_notificacionesDto);
if($Siga_notificacionesDto==true){
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



@$Id_Notificacion=$_POST["Id_Notificacion"];
@$Id_Usuario_Envia=$_POST["Id_Usuario_Envia"];
@$Id_Usuario_Recibe=$_POST["Id_Usuario_Recibe"];
@$Mensaje_Largo=$_POST["Mensaje_Largo"];
@$Mensaje_Corto=$_POST["Mensaje_Corto"];
@$Estatus_Leido=$_POST["Estatus_Leido"];
@$Estatus_Eliminado=$_POST["Estatus_Eliminado"];
@$Url_Archivho_Enviado=$_POST["Url_Archivho_Enviado"];
@$Id_Aplicacion=$_POST["Id_Aplicacion"];
@$Id_Area=$_POST["Id_Area"];
@$Id_Menu=$_POST["Id_Menu"];
@$Id_Submenu=$_POST["Id_Submenu"];
@$Fecha_Envio=$_POST["Fecha_Envio"];
@$accion=$_POST["accion"];
//Variables Notificaciones Vale de Resguardo
@$Id_Vale_Resguardo=$_POST["Id_Vale_Resguardo"];
@$Nombre_Solicitante=$_POST["Nombre_Solicitante"];
@$Num_Empl_Solicitante=$_POST["Num_Empl_Solicitante"];
//Variables jefe de area
@$Nombre_Jefe_Area=$_POST["Nombre_Jefe_Area"];
@$Num_Empl_Resp_Area=$_POST["Num_Empl_Resp_Area"];
//Primero se envia al solicitante, despues se envia al responsable del area
@$Autorizado_por=$_POST["Autorizado_por"];
/////////////////////////////////////////////
$siga_notificacionesFacade = new Siga_notificacionesFacade();
$siga_notificacionesDto = new Siga_notificacionesDTO();

$siga_notificacionesDto->setId_Notificacion($Id_Notificacion);
$siga_notificacionesDto->setId_Usuario_Envia($Id_Usuario_Envia);
$siga_notificacionesDto->setId_Usuario_Recibe($Id_Usuario_Recibe);
$siga_notificacionesDto->setMensaje_Largo($Mensaje_Largo);
$siga_notificacionesDto->setMensaje_Corto($Mensaje_Corto);
$siga_notificacionesDto->setEstatus_Leido($Estatus_Leido);
$siga_notificacionesDto->setEstatus_Eliminado($Estatus_Eliminado);
$siga_notificacionesDto->setUrl_Archivho_Enviado($Url_Archivho_Enviado);
$siga_notificacionesDto->setId_Aplicacion($Id_Aplicacion);
$siga_notificacionesDto->setId_Area($Id_Area);
$siga_notificacionesDto->setId_Menu($Id_Menu);
$siga_notificacionesDto->setId_Submenu($Id_Submenu);
$siga_notificacionesDto->setFecha_Envio($Fecha_Envio);

if( ($accion=="guardar") && ($Id_Notificacion=="") ){
$siga_notificacionesDto=$siga_notificacionesFacade->insertSiga_notificaciones($siga_notificacionesDto);
echo $siga_notificacionesDto;
} else if(($accion=="guardar") && ($Id_Notificacion!="")){
$siga_notificacionesDto=$siga_notificacionesFacade->updateSiga_notificaciones($siga_notificacionesDto);
echo $siga_notificacionesDto;
}else if(($accion=="notificacion_vale_resguardo") && ($Id_Notificacion=="") ){
$siga_notificacionesDto=$siga_notificacionesFacade->notificacion_vale_resguardo($siga_notificacionesDto,$Id_Vale_Resguardo,$Nombre_Solicitante, $Num_Empl_Solicitante,$Nombre_Jefe_Area,$Num_Empl_Resp_Area, $Autorizado_por);
echo $siga_notificacionesDto;
}else if($accion=="consultar"){
$siga_notificacionesDto=$siga_notificacionesFacade->selectSiga_notificaciones($siga_notificacionesDto);
echo $siga_notificacionesDto;
}else if($accion=="notificaciones_usuario"){
$siga_notificacionesDto=$siga_notificacionesFacade->selectNotificaciones_Usuario($siga_notificacionesDto);
echo $siga_notificacionesDto;
} else if( ($accion=="baja") && ($Id_Notificacion!="") ){
$siga_notificacionesDto=$siga_notificacionesFacade->deleteSiga_notificaciones($siga_notificacionesDto);
echo $siga_notificacionesDto;
} else if( ($accion=="seleccionar") && ($Id_Notificacion!="") ){
$siga_notificacionesDto=$siga_notificacionesFacade->selectSiga_notificaciones($siga_notificacionesDto);
echo $siga_notificacionesDto;

}


?>