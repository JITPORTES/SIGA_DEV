<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_correos/Siga_correosDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_correos/Siga_correosController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_correosFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_correos($Siga_correosDto){
$Siga_correosDto->setCadena_Mail(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_correosDto->getCadena_Mail(),"utf8"):strtoupper($Siga_correosDto->getCadena_Mail()))))));
if($this->esFecha($Siga_correosDto->getCadena_Mail())){
$Siga_correosDto->setCadena_Mail($this->fechaMysql($Siga_correosDto->getCadena_Mail()));
}
$Siga_correosDto->setCadena_Mail_Copia(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_correosDto->getCadena_Mail_Copia(),"utf8"):strtoupper($Siga_correosDto->getCadena_Mail_Copia()))))));
if($this->esFecha($Siga_correosDto->getCadena_Mail_Copia())){
$Siga_correosDto->setCadena_Mail_Copia($this->fechaMysql($Siga_correosDto->getCadena_Mail_Copia()));
}
$Siga_correosDto->setCadena_Mail_Copia_Oculta(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_correosDto->getCadena_Mail_Copia_Oculta(),"utf8"):strtoupper($Siga_correosDto->getCadena_Mail_Copia_Oculta()))))));
if($this->esFecha($Siga_correosDto->getCadena_Mail_Copia_Oculta())){
$Siga_correosDto->setCadena_Mail_Copia_Oculta($this->fechaMysql($Siga_correosDto->getCadena_Mail_Copia_Oculta()));
}
$Siga_correosDto->setCadena_Archivos(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_correosDto->getCadena_Archivos(),"utf8"):strtoupper($Siga_correosDto->getCadena_Archivos()))))));
if($this->esFecha($Siga_correosDto->getCadena_Archivos())){
$Siga_correosDto->setCadena_Archivos($this->fechaMysql($Siga_correosDto->getCadena_Archivos()));
}
$Siga_correosDto->setSubject(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_correosDto->getSubject(),"utf8"):strtoupper($Siga_correosDto->getSubject()))))));
if($this->esFecha($Siga_correosDto->getSubject())){
$Siga_correosDto->setSubject($this->fechaMysql($Siga_correosDto->getSubject()));
}
$Siga_correosDto->setMensaje(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_correosDto->getMensaje(),"utf8"):strtoupper($Siga_correosDto->getMensaje()))))));
if($this->esFecha($Siga_correosDto->getMensaje())){
$Siga_correosDto->setMensaje($this->fechaMysql($Siga_correosDto->getMensaje()));
}
$Siga_correosDto->setCorreo_Envio(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_correosDto->getCorreo_Envio(),"utf8"):strtoupper($Siga_correosDto->getCorreo_Envio()))))));
if($this->esFecha($Siga_correosDto->getCorreo_Envio())){
$Siga_correosDto->setCorreo_Envio($this->fechaMysql($Siga_correosDto->getCorreo_Envio()));
}
$Siga_correosDto->setPass_Correo_Envio(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_correosDto->getPass_Correo_Envio(),"utf8"):strtoupper($Siga_correosDto->getPass_Correo_Envio()))))));
if($this->esFecha($Siga_correosDto->getPass_Correo_Envio())){
$Siga_correosDto->setPass_Correo_Envio($this->fechaMysql($Siga_correosDto->getPass_Correo_Envio()));
}
$Siga_correosDto->setCadena_Archivos_Nombre(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_correosDto->getCadena_Archivos_Nombre(),"utf8"):strtoupper($Siga_correosDto->getCadena_Archivos_Nombre()))))));
if($this->esFecha($Siga_correosDto->getCadena_Archivos_Nombre())){
$Siga_correosDto->setCadena_Archivos_Nombre($this->fechaMysql($Siga_correosDto->getCadena_Archivos_Nombre()));
}
return $Siga_correosDto;
}
public function selectSiga_correos($Siga_correosDto){
$Siga_correosDto=$this->validarSiga_correos($Siga_correosDto);
$Siga_correosController = new Siga_correosController();
$Siga_correosDto = $Siga_correosController->selectSiga_correos($Siga_correosDto);
if($Siga_correosDto!=""){
$dtoToJson = new DtoToJson($Siga_correosDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}

public function envia_correo($siga_correosDto, $Id_Vale_Resguardo, $Nombre_Solicitante, $Num_Empleado, $Nombre_Jefe_Area, $Correo_Jefe_Area, $Num_Empleado_Jefe, $Autorizado_por, $url_solicitante){
	$Siga_correosController = new Siga_correosController();
	$Siga_correosDto = $Siga_correosController->envia_correo($siga_correosDto, $Id_Vale_Resguardo, $Nombre_Solicitante, $Num_Empleado, $Nombre_Jefe_Area, $Correo_Jefe_Area, $Num_Empleado_Jefe, $Autorizado_por, $url_solicitante);
	
	$jsonDto = new Encode_JSON();
	return $jsonDto->encode($Siga_correosDto);
}

public function insertSiga_correos($Siga_correosDto){
//$Siga_correosDto=$this->validarSiga_correos($Siga_correosDto);
$Siga_correosController = new Siga_correosController();
$Siga_correosDto = $Siga_correosController->insertSiga_correos($Siga_correosDto);
if($Siga_correosDto!=""){
$dtoToJson = new DtoToJson($Siga_correosDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_correos($Siga_correosDto){
//$Siga_correosDto=$this->validarSiga_correos($Siga_correosDto);
$Siga_correosController = new Siga_correosController();
$Siga_correosDto = $Siga_correosController->updateSiga_correos($Siga_correosDto);
if($Siga_correosDto!=""){
$dtoToJson = new DtoToJson($Siga_correosDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_correos($Siga_correosDto){
//$Siga_correosDto=$this->validarSiga_correos($Siga_correosDto);
$Siga_correosController = new Siga_correosController();
$Siga_correosDto = $Siga_correosController->deleteSiga_correos($Siga_correosDto);
if($Siga_correosDto==true){
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



@$Cadena_Mail=$_POST["Cadena_Mail"];
@$Cadena_Mail_Copia=$_POST["Cadena_Mail_Copia"];
@$Cadena_Mail_Copia_Oculta=$_POST["Cadena_Mail_Copia_Oculta"];
@$Cadena_Archivos=$_POST["Cadena_Archivos"];
@$Subject=$_POST["Subject"];
@$Mensaje=$_POST["Mensaje"];
@$Correo_Envio=$_POST["Correo_Envio"];
@$Pass_Correo_Envio=$_POST["Pass_Correo_Envio"];
@$Cadena_Archivos_Nombre=$_POST["Cadena_Archivos_Nombre"];
@$accion=$_POST["accion"];
//Vale de Resguardo-Solicitante
@$Id_Vale_Resguardo=$_POST["Id_Vale_Resguardo"];
@$Nombre_Solicitante=$_POST["Nombre_Solicitante"];
@$Num_Empleado=$_POST["Num_Empleado"];
//Vale de Resguardo-Jefe Area
@$Nombre_Jefe_Area=$_POST["Nombre_Jefe_Area"];
@$Correo_Jefe_Area=$_POST["Correo_Jefe_Area"];
@$Num_Empleado_Jefe=$_POST["Num_Empleado_Jefe"];
//Primero se envia al solicitante, despues se envia al responsable del area
@$Autorizado_por=$_POST["Autorizado_por"];
//esta variable solo se envia por correo al solicitante
@$url_solicitante=$_POST["url_solicitante"];
//
$siga_correosFacade = new Siga_correosFacade();
$siga_correosDto = new Siga_correosDTO();

$siga_correosDto->setCadena_Mail($Cadena_Mail);
$siga_correosDto->setCadena_Mail_Copia($Cadena_Mail_Copia);
$siga_correosDto->setCadena_Mail_Copia_Oculta($Cadena_Mail_Copia_Oculta);
$siga_correosDto->setCadena_Archivos($Cadena_Archivos);
$siga_correosDto->setSubject($Subject);
$siga_correosDto->setMensaje($Mensaje);
$siga_correosDto->setCorreo_Envio($Correo_Envio);
$siga_correosDto->setPass_Correo_Envio($Pass_Correo_Envio);
$siga_correosDto->setCadena_Archivos_Nombre($Cadena_Archivos_Nombre);

if( ($accion=="guardar") && ($Cadena_Mail=="") ){
$siga_correosDto=$siga_correosFacade->insertSiga_correos($siga_correosDto);
echo $siga_correosDto;
} else if(($accion=="guardar") && ($Cadena_Mail!="")){
$siga_correosDto=$siga_correosFacade->updateSiga_correos($siga_correosDto);
echo $siga_correosDto;
} else if($accion=="consultar"){
$siga_correosDto=$siga_correosFacade->selectSiga_correos($siga_correosDto);
echo $siga_correosDto;
} else if( ($accion=="baja") && ($Cadena_Mail!="") ){
$siga_correosDto=$siga_correosFacade->deleteSiga_correos($siga_correosDto);
echo $siga_correosDto;
} else if( ($accion=="seleccionar") && ($Cadena_Mail!="") ){
$siga_correosDto=$siga_correosFacade->selectSiga_correos($siga_correosDto);
echo $siga_correosDto;
}else if( ($accion=="envia_correo")){
$siga_correosDto=$siga_correosFacade->envia_correo($siga_correosDto, $Id_Vale_Resguardo, $Nombre_Solicitante, $Num_Empleado, $Nombre_Jefe_Area, $Correo_Jefe_Area, $Num_Empleado_Jefe, $Autorizado_por, $url_solicitante);
echo $siga_correosDto;
}


?>