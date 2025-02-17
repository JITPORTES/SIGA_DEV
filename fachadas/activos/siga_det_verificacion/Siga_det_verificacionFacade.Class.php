<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_det_verificacion/Siga_det_verificacionDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_det_verificacion/Siga_det_verificacionController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_det_verificacionFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_det_verificacion($Siga_det_verificacionDto){
$Siga_det_verificacionDto->setId_Det_Verficacion(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_verificacionDto->getId_Det_Verficacion(),"utf8"):strtoupper($Siga_det_verificacionDto->getId_Det_Verficacion()))))));
if($this->esFecha($Siga_det_verificacionDto->getId_Det_Verficacion())){
$Siga_det_verificacionDto->setId_Det_Verficacion($this->fechaMysql($Siga_det_verificacionDto->getId_Det_Verficacion()));
}
$Siga_det_verificacionDto->setId_Verificacion(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_verificacionDto->getId_Verificacion(),"utf8"):strtoupper($Siga_det_verificacionDto->getId_Verificacion()))))));
if($this->esFecha($Siga_det_verificacionDto->getId_Verificacion())){
$Siga_det_verificacionDto->setId_Verificacion($this->fechaMysql($Siga_det_verificacionDto->getId_Verificacion()));
}
$Siga_det_verificacionDto->setId_Activo(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_verificacionDto->getId_Activo(),"utf8"):strtoupper($Siga_det_verificacionDto->getId_Activo()))))));
if($this->esFecha($Siga_det_verificacionDto->getId_Activo())){
$Siga_det_verificacionDto->setId_Activo($this->fechaMysql($Siga_det_verificacionDto->getId_Activo()));
}
$Siga_det_verificacionDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_verificacionDto->getFech_Inser(),"utf8"):strtoupper($Siga_det_verificacionDto->getFech_Inser()))))));
if($this->esFecha($Siga_det_verificacionDto->getFech_Inser())){
$Siga_det_verificacionDto->setFech_Inser($this->fechaMysql($Siga_det_verificacionDto->getFech_Inser()));
}
$Siga_det_verificacionDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_verificacionDto->getUsr_Inser(),"utf8"):strtoupper($Siga_det_verificacionDto->getUsr_Inser()))))));
if($this->esFecha($Siga_det_verificacionDto->getUsr_Inser())){
$Siga_det_verificacionDto->setUsr_Inser($this->fechaMysql($Siga_det_verificacionDto->getUsr_Inser()));
}
$Siga_det_verificacionDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_verificacionDto->getFech_Mod(),"utf8"):strtoupper($Siga_det_verificacionDto->getFech_Mod()))))));
if($this->esFecha($Siga_det_verificacionDto->getFech_Mod())){
$Siga_det_verificacionDto->setFech_Mod($this->fechaMysql($Siga_det_verificacionDto->getFech_Mod()));
}
$Siga_det_verificacionDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_verificacionDto->getUsr_Mod(),"utf8"):strtoupper($Siga_det_verificacionDto->getUsr_Mod()))))));
if($this->esFecha($Siga_det_verificacionDto->getUsr_Mod())){
$Siga_det_verificacionDto->setUsr_Mod($this->fechaMysql($Siga_det_verificacionDto->getUsr_Mod()));
}
$Siga_det_verificacionDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_verificacionDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_det_verificacionDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_det_verificacionDto->getEstatus_Reg())){
$Siga_det_verificacionDto->setEstatus_Reg($this->fechaMysql($Siga_det_verificacionDto->getEstatus_Reg()));
}
return $Siga_det_verificacionDto;
}
public function selectSiga_det_verificacion($Siga_det_verificacionDto){
$Siga_det_verificacionDto=$this->validarSiga_det_verificacion($Siga_det_verificacionDto);
$Siga_det_verificacionController = new Siga_det_verificacionController();
$Siga_det_verificacionDto = $Siga_det_verificacionController->selectSiga_det_verificacion($Siga_det_verificacionDto);
if($Siga_det_verificacionDto!=""){
$dtoToJson = new DtoToJson($Siga_det_verificacionDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_det_verificacion($Siga_det_verificacionDto){
//$Siga_det_verificacionDto=$this->validarSiga_det_verificacion($Siga_det_verificacionDto);
$Siga_det_verificacionController = new Siga_det_verificacionController();
$Siga_det_verificacionDto = $Siga_det_verificacionController->insertSiga_det_verificacion($Siga_det_verificacionDto);
if($Siga_det_verificacionDto!=""){
$dtoToJson = new DtoToJson($Siga_det_verificacionDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_det_verificacion($Siga_det_verificacionDto){
//$Siga_det_verificacionDto=$this->validarSiga_det_verificacion($Siga_det_verificacionDto);
$Siga_det_verificacionController = new Siga_det_verificacionController();
$Siga_det_verificacionDto = $Siga_det_verificacionController->updateSiga_det_verificacion($Siga_det_verificacionDto);
if($Siga_det_verificacionDto!=""){
$dtoToJson = new DtoToJson($Siga_det_verificacionDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_det_verificacion($Siga_det_verificacionDto){
//$Siga_det_verificacionDto=$this->validarSiga_det_verificacion($Siga_det_verificacionDto);
$Siga_det_verificacionController = new Siga_det_verificacionController();
$Siga_det_verificacionDto = $Siga_det_verificacionController->deleteSiga_det_verificacion($Siga_det_verificacionDto);
if($Siga_det_verificacionDto==true){
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



@$Id_Det_Verficacion=$_POST["Id_Det_Verficacion"];
@$Id_Verificacion=$_POST["Id_Verificacion"];
@$Id_Activo=$_POST["Id_Activo"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];

$siga_det_verificacionFacade = new Siga_det_verificacionFacade();
$siga_det_verificacionDto = new Siga_det_verificacionDTO();

$siga_det_verificacionDto->setId_Det_Verficacion($Id_Det_Verficacion);
$siga_det_verificacionDto->setId_Verificacion($Id_Verificacion);
$siga_det_verificacionDto->setId_Activo($Id_Activo);
$siga_det_verificacionDto->setFech_Inser($Fech_Inser);
$siga_det_verificacionDto->setUsr_Inser($Usr_Inser);
$siga_det_verificacionDto->setFech_Mod($Fech_Mod);
$siga_det_verificacionDto->setUsr_Mod($Usr_Mod);
$siga_det_verificacionDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_Det_Verficacion=="") ){
$siga_det_verificacionDto=$siga_det_verificacionFacade->insertSiga_det_verificacion($siga_det_verificacionDto);
echo $siga_det_verificacionDto;
} else if(($accion=="guardar") && ($Id_Det_Verficacion!="")){
$siga_det_verificacionDto=$siga_det_verificacionFacade->updateSiga_det_verificacion($siga_det_verificacionDto);
echo $siga_det_verificacionDto;
} else if($accion=="consultar"){
$siga_det_verificacionDto=$siga_det_verificacionFacade->selectSiga_det_verificacion($siga_det_verificacionDto);
echo $siga_det_verificacionDto;
} else if( ($accion=="baja") && ($Id_Det_Verficacion!="") ){
$siga_det_verificacionDto=$siga_det_verificacionFacade->deleteSiga_det_verificacion($siga_det_verificacionDto);
echo $siga_det_verificacionDto;
} else if( ($accion=="seleccionar") && ($Id_Det_Verficacion!="") ){
$siga_det_verificacionDto=$siga_det_verificacionFacade->selectSiga_det_verificacion($siga_det_verificacionDto);
echo $siga_det_verificacionDto;
}


?>