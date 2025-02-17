<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cast_motivo_reubicacion/Siga_cast_motivo_reubicacionDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_cast_motivo_reubicacion/Siga_cast_motivo_reubicacionController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_cast_motivo_reubicacionFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_cast_motivo_reubicacion($Siga_cast_motivo_reubicacionDto){
$Siga_cast_motivo_reubicacionDto->setId_Motivo_reubicacion(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cast_motivo_reubicacionDto->getId_Motivo_reubicacion(),"utf8"):strtoupper($Siga_cast_motivo_reubicacionDto->getId_Motivo_reubicacion()))))));
if($this->esFecha($Siga_cast_motivo_reubicacionDto->getId_Motivo_reubicacion())){
$Siga_cast_motivo_reubicacionDto->setId_Motivo_reubicacion($this->fechaMysql($Siga_cast_motivo_reubicacionDto->getId_Motivo_reubicacion()));
}
$Siga_cast_motivo_reubicacionDto->setId_Area(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cast_motivo_reubicacionDto->getId_Area(),"utf8"):strtoupper($Siga_cast_motivo_reubicacionDto->getId_Area()))))));
if($this->esFecha($Siga_cast_motivo_reubicacionDto->getId_Area())){
$Siga_cast_motivo_reubicacionDto->setId_Area($this->fechaMysql($Siga_cast_motivo_reubicacionDto->getId_Area()));
}
$Siga_cast_motivo_reubicacionDto->setDesc_Motivo_reubicacion(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cast_motivo_reubicacionDto->getDesc_Motivo_reubicacion(),"utf8"):strtoupper($Siga_cast_motivo_reubicacionDto->getDesc_Motivo_reubicacion()))))));
if($this->esFecha($Siga_cast_motivo_reubicacionDto->getDesc_Motivo_reubicacion())){
$Siga_cast_motivo_reubicacionDto->setDesc_Motivo_reubicacion($this->fechaMysql($Siga_cast_motivo_reubicacionDto->getDesc_Motivo_reubicacion()));
}
$Siga_cast_motivo_reubicacionDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cast_motivo_reubicacionDto->getFech_Inser(),"utf8"):strtoupper($Siga_cast_motivo_reubicacionDto->getFech_Inser()))))));
if($this->esFecha($Siga_cast_motivo_reubicacionDto->getFech_Inser())){
$Siga_cast_motivo_reubicacionDto->setFech_Inser($this->fechaMysql($Siga_cast_motivo_reubicacionDto->getFech_Inser()));
}
$Siga_cast_motivo_reubicacionDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cast_motivo_reubicacionDto->getUsr_Inser(),"utf8"):strtoupper($Siga_cast_motivo_reubicacionDto->getUsr_Inser()))))));
if($this->esFecha($Siga_cast_motivo_reubicacionDto->getUsr_Inser())){
$Siga_cast_motivo_reubicacionDto->setUsr_Inser($this->fechaMysql($Siga_cast_motivo_reubicacionDto->getUsr_Inser()));
}
$Siga_cast_motivo_reubicacionDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cast_motivo_reubicacionDto->getFech_Mod(),"utf8"):strtoupper($Siga_cast_motivo_reubicacionDto->getFech_Mod()))))));
if($this->esFecha($Siga_cast_motivo_reubicacionDto->getFech_Mod())){
$Siga_cast_motivo_reubicacionDto->setFech_Mod($this->fechaMysql($Siga_cast_motivo_reubicacionDto->getFech_Mod()));
}
$Siga_cast_motivo_reubicacionDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cast_motivo_reubicacionDto->getUsr_Mod(),"utf8"):strtoupper($Siga_cast_motivo_reubicacionDto->getUsr_Mod()))))));
if($this->esFecha($Siga_cast_motivo_reubicacionDto->getUsr_Mod())){
$Siga_cast_motivo_reubicacionDto->setUsr_Mod($this->fechaMysql($Siga_cast_motivo_reubicacionDto->getUsr_Mod()));
}
$Siga_cast_motivo_reubicacionDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cast_motivo_reubicacionDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_cast_motivo_reubicacionDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_cast_motivo_reubicacionDto->getEstatus_Reg())){
$Siga_cast_motivo_reubicacionDto->setEstatus_Reg($this->fechaMysql($Siga_cast_motivo_reubicacionDto->getEstatus_Reg()));
}
return $Siga_cast_motivo_reubicacionDto;
}
public function selectSiga_cast_motivo_reubicacion($Siga_cast_motivo_reubicacionDto){
$Siga_cast_motivo_reubicacionDto=$this->validarSiga_cast_motivo_reubicacion($Siga_cast_motivo_reubicacionDto);
$Siga_cast_motivo_reubicacionController = new Siga_cast_motivo_reubicacionController();
$Siga_cast_motivo_reubicacionDto = $Siga_cast_motivo_reubicacionController->selectSiga_cast_motivo_reubicacion($Siga_cast_motivo_reubicacionDto);
if($Siga_cast_motivo_reubicacionDto!=""){
$dtoToJson = new DtoToJson($Siga_cast_motivo_reubicacionDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_cast_motivo_reubicacion($Siga_cast_motivo_reubicacionDto){
//$Siga_cast_motivo_reubicacionDto=$this->validarSiga_cast_motivo_reubicacion($Siga_cast_motivo_reubicacionDto);
$Siga_cast_motivo_reubicacionController = new Siga_cast_motivo_reubicacionController();
$Siga_cast_motivo_reubicacionDto = $Siga_cast_motivo_reubicacionController->insertSiga_cast_motivo_reubicacion($Siga_cast_motivo_reubicacionDto);
if($Siga_cast_motivo_reubicacionDto!=""){
$dtoToJson = new DtoToJson($Siga_cast_motivo_reubicacionDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_cast_motivo_reubicacion($Siga_cast_motivo_reubicacionDto){
//$Siga_cast_motivo_reubicacionDto=$this->validarSiga_cast_motivo_reubicacion($Siga_cast_motivo_reubicacionDto);
$Siga_cast_motivo_reubicacionController = new Siga_cast_motivo_reubicacionController();
$Siga_cast_motivo_reubicacionDto = $Siga_cast_motivo_reubicacionController->updateSiga_cast_motivo_reubicacion($Siga_cast_motivo_reubicacionDto);
if($Siga_cast_motivo_reubicacionDto!=""){
$dtoToJson = new DtoToJson($Siga_cast_motivo_reubicacionDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_cast_motivo_reubicacion($Siga_cast_motivo_reubicacionDto){
//$Siga_cast_motivo_reubicacionDto=$this->validarSiga_cast_motivo_reubicacion($Siga_cast_motivo_reubicacionDto);
$Siga_cast_motivo_reubicacionController = new Siga_cast_motivo_reubicacionController();
$Siga_cast_motivo_reubicacionDto = $Siga_cast_motivo_reubicacionController->deleteSiga_cast_motivo_reubicacion($Siga_cast_motivo_reubicacionDto);
if($Siga_cast_motivo_reubicacionDto==true){
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



@$Id_Motivo_reubicacion=$_POST["Id_Motivo_reubicacion"];
@$Id_Area=$_POST["Id_Area"];
@$Desc_Motivo_reubicacion=$_POST["Desc_Motivo_reubicacion"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];

$siga_cast_motivo_reubicacionFacade = new Siga_cast_motivo_reubicacionFacade();
$siga_cast_motivo_reubicacionDto = new Siga_cast_motivo_reubicacionDTO();

$siga_cast_motivo_reubicacionDto->setId_Motivo_reubicacion($Id_Motivo_reubicacion);
$siga_cast_motivo_reubicacionDto->setId_Area($Id_Area);
$siga_cast_motivo_reubicacionDto->setDesc_Motivo_reubicacion($Desc_Motivo_reubicacion);
$siga_cast_motivo_reubicacionDto->setFech_Inser($Fech_Inser);
$siga_cast_motivo_reubicacionDto->setUsr_Inser($Usr_Inser);
$siga_cast_motivo_reubicacionDto->setFech_Mod($Fech_Mod);
$siga_cast_motivo_reubicacionDto->setUsr_Mod($Usr_Mod);
$siga_cast_motivo_reubicacionDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_Motivo_reubicacion=="") ){
$siga_cast_motivo_reubicacionDto=$siga_cast_motivo_reubicacionFacade->insertSiga_cast_motivo_reubicacion($siga_cast_motivo_reubicacionDto);
echo $siga_cast_motivo_reubicacionDto;
} else if(($accion=="guardar") && ($Id_Motivo_reubicacion!="")){
$siga_cast_motivo_reubicacionDto=$siga_cast_motivo_reubicacionFacade->updateSiga_cast_motivo_reubicacion($siga_cast_motivo_reubicacionDto);
echo $siga_cast_motivo_reubicacionDto;
} else if($accion=="consultar"){
$siga_cast_motivo_reubicacionDto=$siga_cast_motivo_reubicacionFacade->selectSiga_cast_motivo_reubicacion($siga_cast_motivo_reubicacionDto);
echo $siga_cast_motivo_reubicacionDto;
} else if( ($accion=="baja") && ($Id_Motivo_reubicacion!="") ){
$siga_cast_motivo_reubicacionDto=$siga_cast_motivo_reubicacionFacade->deleteSiga_cast_motivo_reubicacion($siga_cast_motivo_reubicacionDto);
echo $siga_cast_motivo_reubicacionDto;
} else if( ($accion=="seleccionar") && ($Id_Motivo_reubicacion!="") ){
$siga_cast_motivo_reubicacionDto=$siga_cast_motivo_reubicacionFacade->selectSiga_cast_motivo_reubicacion($siga_cast_motivo_reubicacionDto);
echo $siga_cast_motivo_reubicacionDto;
}


?>