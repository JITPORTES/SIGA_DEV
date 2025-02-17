<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_ticket_calificacion/Siga_ticket_calificacionDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_ticket_calificacion/Siga_ticket_calificacionController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_ticket_calificacionFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_ticket_calificacion($Siga_ticket_calificacionDto){
$Siga_ticket_calificacionDto->setId_CalificaTicket(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_ticket_calificacionDto->getId_CalificaTicket(),"utf8"):strtoupper($Siga_ticket_calificacionDto->getId_CalificaTicket()))))));
if($this->esFecha($Siga_ticket_calificacionDto->getId_CalificaTicket())){
$Siga_ticket_calificacionDto->setId_CalificaTicket($this->fechaMysql($Siga_ticket_calificacionDto->getId_CalificaTicket()));
}
$Siga_ticket_calificacionDto->setId_Solicitud(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_ticket_calificacionDto->getId_Solicitud(),"utf8"):strtoupper($Siga_ticket_calificacionDto->getId_Solicitud()))))));
if($this->esFecha($Siga_ticket_calificacionDto->getId_Solicitud())){
$Siga_ticket_calificacionDto->setId_Solicitud($this->fechaMysql($Siga_ticket_calificacionDto->getId_Solicitud()));
}
$Siga_ticket_calificacionDto->setId_Pregunta1(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_ticket_calificacionDto->getId_Pregunta1(),"utf8"):strtoupper($Siga_ticket_calificacionDto->getId_Pregunta1()))))));
if($this->esFecha($Siga_ticket_calificacionDto->getId_Pregunta1())){
$Siga_ticket_calificacionDto->setId_Pregunta1($this->fechaMysql($Siga_ticket_calificacionDto->getId_Pregunta1()));
}
$Siga_ticket_calificacionDto->setId_Respuesta1(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_ticket_calificacionDto->getId_Respuesta1(),"utf8"):strtoupper($Siga_ticket_calificacionDto->getId_Respuesta1()))))));
if($this->esFecha($Siga_ticket_calificacionDto->getId_Respuesta1())){
$Siga_ticket_calificacionDto->setId_Respuesta1($this->fechaMysql($Siga_ticket_calificacionDto->getId_Respuesta1()));
}
$Siga_ticket_calificacionDto->setDesc_Comentario1(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_ticket_calificacionDto->getDesc_Comentario1(),"utf8"):strtoupper($Siga_ticket_calificacionDto->getDesc_Comentario1()))))));
if($this->esFecha($Siga_ticket_calificacionDto->getDesc_Comentario1())){
$Siga_ticket_calificacionDto->setDesc_Comentario1($this->fechaMysql($Siga_ticket_calificacionDto->getDesc_Comentario1()));
}
$Siga_ticket_calificacionDto->setId_Pregunta2(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_ticket_calificacionDto->getId_Pregunta2(),"utf8"):strtoupper($Siga_ticket_calificacionDto->getId_Pregunta2()))))));
if($this->esFecha($Siga_ticket_calificacionDto->getId_Pregunta2())){
$Siga_ticket_calificacionDto->setId_Pregunta2($this->fechaMysql($Siga_ticket_calificacionDto->getId_Pregunta2()));
}
$Siga_ticket_calificacionDto->setId_Respuesta2(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_ticket_calificacionDto->getId_Respuesta2(),"utf8"):strtoupper($Siga_ticket_calificacionDto->getId_Respuesta2()))))));
if($this->esFecha($Siga_ticket_calificacionDto->getId_Respuesta2())){
$Siga_ticket_calificacionDto->setId_Respuesta2($this->fechaMysql($Siga_ticket_calificacionDto->getId_Respuesta2()));
}
$Siga_ticket_calificacionDto->setDesc_Comentario2(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_ticket_calificacionDto->getDesc_Comentario2(),"utf8"):strtoupper($Siga_ticket_calificacionDto->getDesc_Comentario2()))))));
if($this->esFecha($Siga_ticket_calificacionDto->getDesc_Comentario2())){
$Siga_ticket_calificacionDto->setDesc_Comentario2($this->fechaMysql($Siga_ticket_calificacionDto->getDesc_Comentario2()));
}
$Siga_ticket_calificacionDto->setId_Pregunta3(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_ticket_calificacionDto->getId_Pregunta3(),"utf8"):strtoupper($Siga_ticket_calificacionDto->getId_Pregunta3()))))));
if($this->esFecha($Siga_ticket_calificacionDto->getId_Pregunta3())){
$Siga_ticket_calificacionDto->setId_Pregunta3($this->fechaMysql($Siga_ticket_calificacionDto->getId_Pregunta3()));
}
$Siga_ticket_calificacionDto->setId_Respuesta3(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_ticket_calificacionDto->getId_Respuesta3(),"utf8"):strtoupper($Siga_ticket_calificacionDto->getId_Respuesta3()))))));
if($this->esFecha($Siga_ticket_calificacionDto->getId_Respuesta3())){
$Siga_ticket_calificacionDto->setId_Respuesta3($this->fechaMysql($Siga_ticket_calificacionDto->getId_Respuesta3()));
}
$Siga_ticket_calificacionDto->setDesc_Comentario3(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_ticket_calificacionDto->getDesc_Comentario3(),"utf8"):strtoupper($Siga_ticket_calificacionDto->getDesc_Comentario3()))))));
if($this->esFecha($Siga_ticket_calificacionDto->getDesc_Comentario3())){
$Siga_ticket_calificacionDto->setDesc_Comentario3($this->fechaMysql($Siga_ticket_calificacionDto->getDesc_Comentario3()));
}
$Siga_ticket_calificacionDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_ticket_calificacionDto->getFech_Inser(),"utf8"):strtoupper($Siga_ticket_calificacionDto->getFech_Inser()))))));
if($this->esFecha($Siga_ticket_calificacionDto->getFech_Inser())){
$Siga_ticket_calificacionDto->setFech_Inser($this->fechaMysql($Siga_ticket_calificacionDto->getFech_Inser()));
}
$Siga_ticket_calificacionDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_ticket_calificacionDto->getUsr_Inser(),"utf8"):strtoupper($Siga_ticket_calificacionDto->getUsr_Inser()))))));
if($this->esFecha($Siga_ticket_calificacionDto->getUsr_Inser())){
$Siga_ticket_calificacionDto->setUsr_Inser($this->fechaMysql($Siga_ticket_calificacionDto->getUsr_Inser()));
}
$Siga_ticket_calificacionDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_ticket_calificacionDto->getFech_Mod(),"utf8"):strtoupper($Siga_ticket_calificacionDto->getFech_Mod()))))));
if($this->esFecha($Siga_ticket_calificacionDto->getFech_Mod())){
$Siga_ticket_calificacionDto->setFech_Mod($this->fechaMysql($Siga_ticket_calificacionDto->getFech_Mod()));
}
$Siga_ticket_calificacionDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_ticket_calificacionDto->getUsr_Mod(),"utf8"):strtoupper($Siga_ticket_calificacionDto->getUsr_Mod()))))));
if($this->esFecha($Siga_ticket_calificacionDto->getUsr_Mod())){
$Siga_ticket_calificacionDto->setUsr_Mod($this->fechaMysql($Siga_ticket_calificacionDto->getUsr_Mod()));
}
$Siga_ticket_calificacionDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_ticket_calificacionDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_ticket_calificacionDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_ticket_calificacionDto->getEstatus_Reg())){
$Siga_ticket_calificacionDto->setEstatus_Reg($this->fechaMysql($Siga_ticket_calificacionDto->getEstatus_Reg()));
}
return $Siga_ticket_calificacionDto;
}
public function selectSiga_ticket_calificacion($Siga_ticket_calificacionDto){
$Siga_ticket_calificacionDto=$this->validarSiga_ticket_calificacion($Siga_ticket_calificacionDto);
$Siga_ticket_calificacionController = new Siga_ticket_calificacionController();
$Siga_ticket_calificacionDto = $Siga_ticket_calificacionController->selectSiga_ticket_calificacion($Siga_ticket_calificacionDto);
if($Siga_ticket_calificacionDto!=""){
$dtoToJson = new DtoToJson($Siga_ticket_calificacionDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_ticket_calificacion($Siga_ticket_calificacionDto, $Id_Cirugia){
//$Siga_ticket_calificacionDto=$this->validarSiga_ticket_calificacion($Siga_ticket_calificacionDto);
$Siga_ticket_calificacionController = new Siga_ticket_calificacionController();
$Siga_ticket_calificacionDto = $Siga_ticket_calificacionController->insertSiga_ticket_calificacion($Siga_ticket_calificacionDto, $Id_Cirugia);
if($Siga_ticket_calificacionDto!=""){
$dtoToJson = new DtoToJson($Siga_ticket_calificacionDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_ticket_calificacion($Siga_ticket_calificacionDto){
//$Siga_ticket_calificacionDto=$this->validarSiga_ticket_calificacion($Siga_ticket_calificacionDto);
$Siga_ticket_calificacionController = new Siga_ticket_calificacionController();
$Siga_ticket_calificacionDto = $Siga_ticket_calificacionController->updateSiga_ticket_calificacion($Siga_ticket_calificacionDto);
if($Siga_ticket_calificacionDto!=""){
$dtoToJson = new DtoToJson($Siga_ticket_calificacionDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_ticket_calificacion($Siga_ticket_calificacionDto){
//$Siga_ticket_calificacionDto=$this->validarSiga_ticket_calificacion($Siga_ticket_calificacionDto);
$Siga_ticket_calificacionController = new Siga_ticket_calificacionController();
$Siga_ticket_calificacionDto = $Siga_ticket_calificacionController->deleteSiga_ticket_calificacion($Siga_ticket_calificacionDto);
if($Siga_ticket_calificacionDto==true){
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



@$Id_CalificaTicket=$_POST["Id_CalificaTicket"];
@$Id_Solicitud=$_POST["Id_Solicitud"];
@$Id_Cirugia=$_POST["Id_Cirugia"];
@$Id_Pregunta1=$_POST["Id_Pregunta1"];
@$Id_Respuesta1=$_POST["Id_Respuesta1"];
@$Desc_Comentario1=$_POST["Desc_Comentario1"];
@$Id_Pregunta2=$_POST["Id_Pregunta2"];
@$Id_Respuesta2=$_POST["Id_Respuesta2"];
@$Desc_Comentario2=$_POST["Desc_Comentario2"];
@$Id_Pregunta3=$_POST["Id_Pregunta3"];
@$Id_Respuesta3=$_POST["Id_Respuesta3"];
@$Desc_Comentario3=$_POST["Desc_Comentario3"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];
@$Archivo_Binario=$_POST["Firma"];

$siga_ticket_calificacionFacade = new Siga_ticket_calificacionFacade();
$siga_ticket_calificacionDto = new Siga_ticket_calificacionDTO();

$siga_ticket_calificacionDto->setId_CalificaTicket($Id_CalificaTicket);
$siga_ticket_calificacionDto->setId_Solicitud($Id_Solicitud);
$siga_ticket_calificacionDto->setId_Pregunta1($Id_Pregunta1);
$siga_ticket_calificacionDto->setId_Respuesta1($Id_Respuesta1);
$siga_ticket_calificacionDto->setDesc_Comentario1($Desc_Comentario1);
$siga_ticket_calificacionDto->setId_Pregunta2($Id_Pregunta2);
$siga_ticket_calificacionDto->setId_Respuesta2($Id_Respuesta2);
$siga_ticket_calificacionDto->setDesc_Comentario2($Desc_Comentario2);
$siga_ticket_calificacionDto->setId_Pregunta3($Id_Pregunta3);
$siga_ticket_calificacionDto->setId_Respuesta3($Id_Respuesta3);
$siga_ticket_calificacionDto->setDesc_Comentario3($Desc_Comentario3);
$siga_ticket_calificacionDto->setFech_Inser($Fech_Inser);
$siga_ticket_calificacionDto->setUsr_Inser($Usr_Inser);
$siga_ticket_calificacionDto->setFech_Mod($Fech_Mod);
$siga_ticket_calificacionDto->setUsr_Mod($Usr_Mod);
$siga_ticket_calificacionDto->setEstatus_Reg($Estatus_Reg);
$siga_ticket_calificacionDto->setArchivo_Binario($Archivo_Binario);

if( ($accion=="guardar") && ($Id_CalificaTicket=="") ){
$siga_ticket_calificacionDto=$siga_ticket_calificacionFacade->insertSiga_ticket_calificacion($siga_ticket_calificacionDto, $Id_Cirugia);
echo $siga_ticket_calificacionDto;
} else if(($accion=="guardar") && ($Id_CalificaTicket!="")){
$siga_ticket_calificacionDto=$siga_ticket_calificacionFacade->updateSiga_ticket_calificacion($siga_ticket_calificacionDto);
echo $siga_ticket_calificacionDto;
} else if($accion=="consultar"){
$siga_ticket_calificacionDto=$siga_ticket_calificacionFacade->selectSiga_ticket_calificacion($siga_ticket_calificacionDto);
echo $siga_ticket_calificacionDto;
} else if( ($accion=="baja") && ($Id_CalificaTicket!="") ){
$siga_ticket_calificacionDto=$siga_ticket_calificacionFacade->deleteSiga_ticket_calificacion($siga_ticket_calificacionDto);
echo $siga_ticket_calificacionDto;
} else if( ($accion=="seleccionar") && ($Id_CalificaTicket!="") ){
$siga_ticket_calificacionDto=$siga_ticket_calificacionFacade->selectSiga_ticket_calificacion($siga_ticket_calificacionDto);
echo $siga_ticket_calificacionDto;
}


?>