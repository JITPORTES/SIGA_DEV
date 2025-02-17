<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_ejecutantes/Siga_cat_ejecutantesDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_cat_ejecutantes/Siga_cat_ejecutantesController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_cat_ejecutantesFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_ejecutantes($Siga_cat_ejecutantesDto){
$Siga_cat_ejecutantesDto->setId_Ejecutante(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_ejecutantesDto->getId_Ejecutante(),"utf8"):strtoupper($Siga_cat_ejecutantesDto->getId_Ejecutante()))))));
if($this->esFecha($Siga_cat_ejecutantesDto->getId_Ejecutante())){
$Siga_cat_ejecutantesDto->setId_Ejecutante($this->fechaMysql($Siga_cat_ejecutantesDto->getId_Ejecutante()));
}
$Siga_cat_ejecutantesDto->setId_Area(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_ejecutantesDto->getId_Area(),"utf8"):strtoupper($Siga_cat_ejecutantesDto->getId_Area()))))));
if($this->esFecha($Siga_cat_ejecutantesDto->getId_Area())){
$Siga_cat_ejecutantesDto->setId_Area($this->fechaMysql($Siga_cat_ejecutantesDto->getId_Area()));
}
$Siga_cat_ejecutantesDto->setNombre_Completo(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_ejecutantesDto->getNombre_Completo(),"utf8"):strtoupper($Siga_cat_ejecutantesDto->getNombre_Completo()))))));
if($this->esFecha($Siga_cat_ejecutantesDto->getNombre_Completo())){
$Siga_cat_ejecutantesDto->setNombre_Completo($this->fechaMysql($Siga_cat_ejecutantesDto->getNombre_Completo()));
}
$Siga_cat_ejecutantesDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_ejecutantesDto->getFech_Inser(),"utf8"):strtoupper($Siga_cat_ejecutantesDto->getFech_Inser()))))));
if($this->esFecha($Siga_cat_ejecutantesDto->getFech_Inser())){
$Siga_cat_ejecutantesDto->setFech_Inser($this->fechaMysql($Siga_cat_ejecutantesDto->getFech_Inser()));
}
$Siga_cat_ejecutantesDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_ejecutantesDto->getUsr_Inser(),"utf8"):strtoupper($Siga_cat_ejecutantesDto->getUsr_Inser()))))));
if($this->esFecha($Siga_cat_ejecutantesDto->getUsr_Inser())){
$Siga_cat_ejecutantesDto->setUsr_Inser($this->fechaMysql($Siga_cat_ejecutantesDto->getUsr_Inser()));
}
$Siga_cat_ejecutantesDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_ejecutantesDto->getFech_Mod(),"utf8"):strtoupper($Siga_cat_ejecutantesDto->getFech_Mod()))))));
if($this->esFecha($Siga_cat_ejecutantesDto->getFech_Mod())){
$Siga_cat_ejecutantesDto->setFech_Mod($this->fechaMysql($Siga_cat_ejecutantesDto->getFech_Mod()));
}
$Siga_cat_ejecutantesDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_ejecutantesDto->getUsr_Mod(),"utf8"):strtoupper($Siga_cat_ejecutantesDto->getUsr_Mod()))))));
if($this->esFecha($Siga_cat_ejecutantesDto->getUsr_Mod())){
$Siga_cat_ejecutantesDto->setUsr_Mod($this->fechaMysql($Siga_cat_ejecutantesDto->getUsr_Mod()));
}
$Siga_cat_ejecutantesDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_ejecutantesDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_cat_ejecutantesDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_cat_ejecutantesDto->getEstatus_Reg())){
$Siga_cat_ejecutantesDto->setEstatus_Reg($this->fechaMysql($Siga_cat_ejecutantesDto->getEstatus_Reg()));
}
return $Siga_cat_ejecutantesDto;
}
public function selectSiga_cat_ejecutantes($Siga_cat_ejecutantesDto){
//$Siga_cat_ejecutantesDto=$this->validarSiga_cat_ejecutantes($Siga_cat_ejecutantesDto);
$Siga_cat_ejecutantesController = new Siga_cat_ejecutantesController();
$Siga_cat_ejecutantesDto = $Siga_cat_ejecutantesController->selectSiga_cat_ejecutantes($Siga_cat_ejecutantesDto);
if($Siga_cat_ejecutantesDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_ejecutantesDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_cat_ejecutantes($Siga_cat_ejecutantesDto){
//$Siga_cat_ejecutantesDto=$this->validarSiga_cat_ejecutantes($Siga_cat_ejecutantesDto);
$Siga_cat_ejecutantesController = new Siga_cat_ejecutantesController();
$Siga_cat_ejecutantesDto = $Siga_cat_ejecutantesController->insertSiga_cat_ejecutantes($Siga_cat_ejecutantesDto);
if($Siga_cat_ejecutantesDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_ejecutantesDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_cat_ejecutantes($Siga_cat_ejecutantesDto){
//$Siga_cat_ejecutantesDto=$this->validarSiga_cat_ejecutantes($Siga_cat_ejecutantesDto);
$Siga_cat_ejecutantesController = new Siga_cat_ejecutantesController();
$Siga_cat_ejecutantesDto = $Siga_cat_ejecutantesController->updateSiga_cat_ejecutantes($Siga_cat_ejecutantesDto);
if($Siga_cat_ejecutantesDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_ejecutantesDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_cat_ejecutantes($Siga_cat_ejecutantesDto){
//$Siga_cat_ejecutantesDto=$this->validarSiga_cat_ejecutantes($Siga_cat_ejecutantesDto);
$Siga_cat_ejecutantesController = new Siga_cat_ejecutantesController();
$Siga_cat_ejecutantesDto = $Siga_cat_ejecutantesController->deleteSiga_cat_ejecutantes($Siga_cat_ejecutantesDto);
if($Siga_cat_ejecutantesDto==true){
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



@$Id_Ejecutante=$_POST["Id_Ejecutante"];
@$Id_Area=$_POST["Id_Area"];
@$Nombre_Completo=$_POST["Nombre_Completo"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];

$siga_cat_ejecutantesFacade = new Siga_cat_ejecutantesFacade();
$siga_cat_ejecutantesDto = new Siga_cat_ejecutantesDTO();

$siga_cat_ejecutantesDto->setId_Ejecutante($Id_Ejecutante);
$siga_cat_ejecutantesDto->setId_Area($Id_Area);
$siga_cat_ejecutantesDto->setNombre_Completo($Nombre_Completo);
$siga_cat_ejecutantesDto->setFech_Inser($Fech_Inser);
$siga_cat_ejecutantesDto->setUsr_Inser($Usr_Inser);
$siga_cat_ejecutantesDto->setFech_Mod($Fech_Mod);
$siga_cat_ejecutantesDto->setUsr_Mod($Usr_Mod);
$siga_cat_ejecutantesDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_Ejecutante=="") ){
$siga_cat_ejecutantesDto=$siga_cat_ejecutantesFacade->insertSiga_cat_ejecutantes($siga_cat_ejecutantesDto);
echo $siga_cat_ejecutantesDto;
} else if(($accion=="guardar") && ($Id_Ejecutante!="")){
$siga_cat_ejecutantesDto=$siga_cat_ejecutantesFacade->updateSiga_cat_ejecutantes($siga_cat_ejecutantesDto);
echo $siga_cat_ejecutantesDto;
} else if($accion=="consultar"){
$siga_cat_ejecutantesDto=$siga_cat_ejecutantesFacade->selectSiga_cat_ejecutantes($siga_cat_ejecutantesDto);
echo $siga_cat_ejecutantesDto;
} else if( ($accion=="baja") && ($Id_Ejecutante!="") ){
$siga_cat_ejecutantesDto=$siga_cat_ejecutantesFacade->deleteSiga_cat_ejecutantes($siga_cat_ejecutantesDto);
echo $siga_cat_ejecutantesDto;
} else if( ($accion=="seleccionar") && ($Id_Ejecutante!="") ){
$siga_cat_ejecutantesDto=$siga_cat_ejecutantesFacade->selectSiga_cat_ejecutantes($siga_cat_ejecutantesDto);
echo $siga_cat_ejecutantesDto;
}


?>