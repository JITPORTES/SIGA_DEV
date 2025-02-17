<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_actividades_calificacion/Siga_actividades_calificacionDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_actividades_calificacion/Siga_actividades_calificacionController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_actividades_calificacionFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_actividades_calificacion($Siga_actividades_calificacionDto){
$Siga_actividades_calificacionDto->setId_Calificacion(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_actividades_calificacionDto->getId_Calificacion(),"utf8"):strtoupper($Siga_actividades_calificacionDto->getId_Calificacion()))))));
if($this->esFecha($Siga_actividades_calificacionDto->getId_Calificacion())){
$Siga_actividades_calificacionDto->setId_Calificacion($this->fechaMysql($Siga_actividades_calificacionDto->getId_Calificacion()));
}
$Siga_actividades_calificacionDto->setId_Actividad(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_actividades_calificacionDto->getId_Actividad(),"utf8"):strtoupper($Siga_actividades_calificacionDto->getId_Actividad()))))));
if($this->esFecha($Siga_actividades_calificacionDto->getId_Actividad())){
$Siga_actividades_calificacionDto->setId_Actividad($this->fechaMysql($Siga_actividades_calificacionDto->getId_Actividad()));
}
$Siga_actividades_calificacionDto->setCal_Sol_Ofrecida(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_actividades_calificacionDto->getCal_Sol_Ofrecida(),"utf8"):strtoupper($Siga_actividades_calificacionDto->getCal_Sol_Ofrecida()))))));
if($this->esFecha($Siga_actividades_calificacionDto->getCal_Sol_Ofrecida())){
$Siga_actividades_calificacionDto->setCal_Sol_Ofrecida($this->fechaMysql($Siga_actividades_calificacionDto->getCal_Sol_Ofrecida()));
}
$Siga_actividades_calificacionDto->setComen_Sol_Ofrecida(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_actividades_calificacionDto->getComen_Sol_Ofrecida(),"utf8"):strtoupper($Siga_actividades_calificacionDto->getComen_Sol_Ofrecida()))))));
if($this->esFecha($Siga_actividades_calificacionDto->getComen_Sol_Ofrecida())){
$Siga_actividades_calificacionDto->setComen_Sol_Ofrecida($this->fechaMysql($Siga_actividades_calificacionDto->getComen_Sol_Ofrecida()));
}
$Siga_actividades_calificacionDto->setCal_Act_Servicio(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_actividades_calificacionDto->getCal_Act_Servicio(),"utf8"):strtoupper($Siga_actividades_calificacionDto->getCal_Act_Servicio()))))));
if($this->esFecha($Siga_actividades_calificacionDto->getCal_Act_Servicio())){
$Siga_actividades_calificacionDto->setCal_Act_Servicio($this->fechaMysql($Siga_actividades_calificacionDto->getCal_Act_Servicio()));
}
$Siga_actividades_calificacionDto->setComen_Act_Servicio(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_actividades_calificacionDto->getComen_Act_Servicio(),"utf8"):strtoupper($Siga_actividades_calificacionDto->getComen_Act_Servicio()))))));
if($this->esFecha($Siga_actividades_calificacionDto->getComen_Act_Servicio())){
$Siga_actividades_calificacionDto->setComen_Act_Servicio($this->fechaMysql($Siga_actividades_calificacionDto->getComen_Act_Servicio()));
}
$Siga_actividades_calificacionDto->setCal_Tiem_Respusta(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_actividades_calificacionDto->getCal_Tiem_Respusta(),"utf8"):strtoupper($Siga_actividades_calificacionDto->getCal_Tiem_Respusta()))))));
if($this->esFecha($Siga_actividades_calificacionDto->getCal_Tiem_Respusta())){
$Siga_actividades_calificacionDto->setCal_Tiem_Respusta($this->fechaMysql($Siga_actividades_calificacionDto->getCal_Tiem_Respusta()));
}
$Siga_actividades_calificacionDto->setComen_Tiem_Respuesta(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_actividades_calificacionDto->getComen_Tiem_Respuesta(),"utf8"):strtoupper($Siga_actividades_calificacionDto->getComen_Tiem_Respuesta()))))));
if($this->esFecha($Siga_actividades_calificacionDto->getComen_Tiem_Respuesta())){
$Siga_actividades_calificacionDto->setComen_Tiem_Respuesta($this->fechaMysql($Siga_actividades_calificacionDto->getComen_Tiem_Respuesta()));
}
$Siga_actividades_calificacionDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_actividades_calificacionDto->getFech_Inser(),"utf8"):strtoupper($Siga_actividades_calificacionDto->getFech_Inser()))))));
if($this->esFecha($Siga_actividades_calificacionDto->getFech_Inser())){
$Siga_actividades_calificacionDto->setFech_Inser($this->fechaMysql($Siga_actividades_calificacionDto->getFech_Inser()));
}
$Siga_actividades_calificacionDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_actividades_calificacionDto->getUsr_Inser(),"utf8"):strtoupper($Siga_actividades_calificacionDto->getUsr_Inser()))))));
if($this->esFecha($Siga_actividades_calificacionDto->getUsr_Inser())){
$Siga_actividades_calificacionDto->setUsr_Inser($this->fechaMysql($Siga_actividades_calificacionDto->getUsr_Inser()));
}
$Siga_actividades_calificacionDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_actividades_calificacionDto->getFech_Mod(),"utf8"):strtoupper($Siga_actividades_calificacionDto->getFech_Mod()))))));
if($this->esFecha($Siga_actividades_calificacionDto->getFech_Mod())){
$Siga_actividades_calificacionDto->setFech_Mod($this->fechaMysql($Siga_actividades_calificacionDto->getFech_Mod()));
}
$Siga_actividades_calificacionDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_actividades_calificacionDto->getUsr_Mod(),"utf8"):strtoupper($Siga_actividades_calificacionDto->getUsr_Mod()))))));
if($this->esFecha($Siga_actividades_calificacionDto->getUsr_Mod())){
$Siga_actividades_calificacionDto->setUsr_Mod($this->fechaMysql($Siga_actividades_calificacionDto->getUsr_Mod()));
}
$Siga_actividades_calificacionDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_actividades_calificacionDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_actividades_calificacionDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_actividades_calificacionDto->getEstatus_Reg())){
$Siga_actividades_calificacionDto->setEstatus_Reg($this->fechaMysql($Siga_actividades_calificacionDto->getEstatus_Reg()));
}
return $Siga_actividades_calificacionDto;
}
public function selectSiga_actividades_calificacion($Siga_actividades_calificacionDto){
$Siga_actividades_calificacionDto=$this->validarSiga_actividades_calificacion($Siga_actividades_calificacionDto);
$Siga_actividades_calificacionController = new Siga_actividades_calificacionController();
$Siga_actividades_calificacionDto = $Siga_actividades_calificacionController->selectSiga_actividades_calificacion($Siga_actividades_calificacionDto);
if($Siga_actividades_calificacionDto!=""){
$dtoToJson = new DtoToJson($Siga_actividades_calificacionDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_actividades_calificacion($Siga_actividades_calificacionDto){
//$Siga_actividades_calificacionDto=$this->validarSiga_actividades_calificacion($Siga_actividades_calificacionDto);
$Siga_actividades_calificacionController = new Siga_actividades_calificacionController();
$Siga_actividades_calificacionDto = $Siga_actividades_calificacionController->insertSiga_actividades_calificacion($Siga_actividades_calificacionDto);
if($Siga_actividades_calificacionDto!=""){
$dtoToJson = new DtoToJson($Siga_actividades_calificacionDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_actividades_calificacion($Siga_actividades_calificacionDto){
//$Siga_actividades_calificacionDto=$this->validarSiga_actividades_calificacion($Siga_actividades_calificacionDto);
$Siga_actividades_calificacionController = new Siga_actividades_calificacionController();
$Siga_actividades_calificacionDto = $Siga_actividades_calificacionController->updateSiga_actividades_calificacion($Siga_actividades_calificacionDto);
if($Siga_actividades_calificacionDto!=""){
$dtoToJson = new DtoToJson($Siga_actividades_calificacionDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_actividades_calificacion($Siga_actividades_calificacionDto){
//$Siga_actividades_calificacionDto=$this->validarSiga_actividades_calificacion($Siga_actividades_calificacionDto);
$Siga_actividades_calificacionController = new Siga_actividades_calificacionController();
$Siga_actividades_calificacionDto = $Siga_actividades_calificacionController->deleteSiga_actividades_calificacion($Siga_actividades_calificacionDto);
if($Siga_actividades_calificacionDto==true){
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



@$Id_Calificacion=$_POST["Id_Calificacion"];
@$Id_Actividad=$_POST["Id_Actividad"];
@$Cal_Sol_Ofrecida=$_POST["Cal_Sol_Ofrecida"];
@$Comen_Sol_Ofrecida=$_POST["Comen_Sol_Ofrecida"];
@$Cal_Act_Servicio=$_POST["Cal_Act_Servicio"];
@$Comen_Act_Servicio=$_POST["Comen_Act_Servicio"];
@$Cal_Tiem_Respusta=$_POST["Cal_Tiem_Respusta"];
@$Comen_Tiem_Respuesta=$_POST["Comen_Tiem_Respuesta"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];

$siga_actividades_calificacionFacade = new Siga_actividades_calificacionFacade();
$siga_actividades_calificacionDto = new Siga_actividades_calificacionDTO();

$siga_actividades_calificacionDto->setId_Calificacion($Id_Calificacion);
$siga_actividades_calificacionDto->setId_Actividad($Id_Actividad);
$siga_actividades_calificacionDto->setCal_Sol_Ofrecida($Cal_Sol_Ofrecida);
$siga_actividades_calificacionDto->setComen_Sol_Ofrecida($Comen_Sol_Ofrecida);
$siga_actividades_calificacionDto->setCal_Act_Servicio($Cal_Act_Servicio);
$siga_actividades_calificacionDto->setComen_Act_Servicio($Comen_Act_Servicio);
$siga_actividades_calificacionDto->setCal_Tiem_Respusta($Cal_Tiem_Respusta);
$siga_actividades_calificacionDto->setComen_Tiem_Respuesta($Comen_Tiem_Respuesta);
$siga_actividades_calificacionDto->setFech_Inser($Fech_Inser);
$siga_actividades_calificacionDto->setUsr_Inser($Usr_Inser);
$siga_actividades_calificacionDto->setFech_Mod($Fech_Mod);
$siga_actividades_calificacionDto->setUsr_Mod($Usr_Mod);
$siga_actividades_calificacionDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_Calificacion=="") ){
$siga_actividades_calificacionDto=$siga_actividades_calificacionFacade->insertSiga_actividades_calificacion($siga_actividades_calificacionDto);
echo $siga_actividades_calificacionDto;
} else if(($accion=="guardar") && ($Id_Calificacion!="")){
$siga_actividades_calificacionDto=$siga_actividades_calificacionFacade->updateSiga_actividades_calificacion($siga_actividades_calificacionDto);
echo $siga_actividades_calificacionDto;
} else if($accion=="consultar"){
$siga_actividades_calificacionDto=$siga_actividades_calificacionFacade->selectSiga_actividades_calificacion($siga_actividades_calificacionDto);
echo $siga_actividades_calificacionDto;
} else if( ($accion=="baja") && ($Id_Calificacion!="") ){
$siga_actividades_calificacionDto=$siga_actividades_calificacionFacade->deleteSiga_actividades_calificacion($siga_actividades_calificacionDto);
echo $siga_actividades_calificacionDto;
} else if( ($accion=="seleccionar") && ($Id_Calificacion!="") ){
$siga_actividades_calificacionDto=$siga_actividades_calificacionFacade->selectSiga_actividades_calificacion($siga_actividades_calificacionDto);
echo $siga_actividades_calificacionDto;
}


?>