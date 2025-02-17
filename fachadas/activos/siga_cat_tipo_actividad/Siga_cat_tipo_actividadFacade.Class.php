<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_tipo_actividad/Siga_cat_tipo_actividadDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_cat_tipo_actividad/Siga_cat_tipo_actividadController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_cat_tipo_actividadFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_tipo_actividad($Siga_cat_tipo_actividadDto){
$Siga_cat_tipo_actividadDto->setId_Tipo_Actividad(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_tipo_actividadDto->getId_Tipo_Actividad(),"utf8"):strtoupper($Siga_cat_tipo_actividadDto->getId_Tipo_Actividad()))))));
if($this->esFecha($Siga_cat_tipo_actividadDto->getId_Tipo_Actividad())){
$Siga_cat_tipo_actividadDto->setId_Tipo_Actividad($this->fechaMysql($Siga_cat_tipo_actividadDto->getId_Tipo_Actividad()));
}
$Siga_cat_tipo_actividadDto->setId_Area(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_tipo_actividadDto->getId_Area(),"utf8"):strtoupper($Siga_cat_tipo_actividadDto->getId_Area()))))));
if($this->esFecha($Siga_cat_tipo_actividadDto->getId_Area())){
$Siga_cat_tipo_actividadDto->setId_Area($this->fechaMysql($Siga_cat_tipo_actividadDto->getId_Area()));
}
$Siga_cat_tipo_actividadDto->setDesc_Tipo_Actividad(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_tipo_actividadDto->getDesc_Tipo_Actividad(),"utf8"):strtoupper($Siga_cat_tipo_actividadDto->getDesc_Tipo_Actividad()))))));
if($this->esFecha($Siga_cat_tipo_actividadDto->getDesc_Tipo_Actividad())){
$Siga_cat_tipo_actividadDto->setDesc_Tipo_Actividad($this->fechaMysql($Siga_cat_tipo_actividadDto->getDesc_Tipo_Actividad()));
}
$Siga_cat_tipo_actividadDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_tipo_actividadDto->getFech_Inser(),"utf8"):strtoupper($Siga_cat_tipo_actividadDto->getFech_Inser()))))));
if($this->esFecha($Siga_cat_tipo_actividadDto->getFech_Inser())){
$Siga_cat_tipo_actividadDto->setFech_Inser($this->fechaMysql($Siga_cat_tipo_actividadDto->getFech_Inser()));
}
$Siga_cat_tipo_actividadDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_tipo_actividadDto->getUsr_Inser(),"utf8"):strtoupper($Siga_cat_tipo_actividadDto->getUsr_Inser()))))));
if($this->esFecha($Siga_cat_tipo_actividadDto->getUsr_Inser())){
$Siga_cat_tipo_actividadDto->setUsr_Inser($this->fechaMysql($Siga_cat_tipo_actividadDto->getUsr_Inser()));
}
$Siga_cat_tipo_actividadDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_tipo_actividadDto->getFech_Mod(),"utf8"):strtoupper($Siga_cat_tipo_actividadDto->getFech_Mod()))))));
if($this->esFecha($Siga_cat_tipo_actividadDto->getFech_Mod())){
$Siga_cat_tipo_actividadDto->setFech_Mod($this->fechaMysql($Siga_cat_tipo_actividadDto->getFech_Mod()));
}
$Siga_cat_tipo_actividadDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_tipo_actividadDto->getUsr_Mod(),"utf8"):strtoupper($Siga_cat_tipo_actividadDto->getUsr_Mod()))))));
if($this->esFecha($Siga_cat_tipo_actividadDto->getUsr_Mod())){
$Siga_cat_tipo_actividadDto->setUsr_Mod($this->fechaMysql($Siga_cat_tipo_actividadDto->getUsr_Mod()));
}
$Siga_cat_tipo_actividadDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_tipo_actividadDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_cat_tipo_actividadDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_cat_tipo_actividadDto->getEstatus_Reg())){
$Siga_cat_tipo_actividadDto->setEstatus_Reg($this->fechaMysql($Siga_cat_tipo_actividadDto->getEstatus_Reg()));
}
return $Siga_cat_tipo_actividadDto;
}
public function selectSiga_cat_tipo_actividad($Siga_cat_tipo_actividadDto){
$Siga_cat_tipo_actividadDto=$this->validarSiga_cat_tipo_actividad($Siga_cat_tipo_actividadDto);
$Siga_cat_tipo_actividadController = new Siga_cat_tipo_actividadController();
$Siga_cat_tipo_actividadDto = $Siga_cat_tipo_actividadController->selectSiga_cat_tipo_actividad($Siga_cat_tipo_actividadDto);
if($Siga_cat_tipo_actividadDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_tipo_actividadDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_cat_tipo_actividad($Siga_cat_tipo_actividadDto){
//$Siga_cat_tipo_actividadDto=$this->validarSiga_cat_tipo_actividad($Siga_cat_tipo_actividadDto);
$Siga_cat_tipo_actividadController = new Siga_cat_tipo_actividadController();
$Siga_cat_tipo_actividadDto = $Siga_cat_tipo_actividadController->insertSiga_cat_tipo_actividad($Siga_cat_tipo_actividadDto);
if($Siga_cat_tipo_actividadDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_tipo_actividadDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_cat_tipo_actividad($Siga_cat_tipo_actividadDto){
//$Siga_cat_tipo_actividadDto=$this->validarSiga_cat_tipo_actividad($Siga_cat_tipo_actividadDto);
$Siga_cat_tipo_actividadController = new Siga_cat_tipo_actividadController();
$Siga_cat_tipo_actividadDto = $Siga_cat_tipo_actividadController->updateSiga_cat_tipo_actividad($Siga_cat_tipo_actividadDto);
if($Siga_cat_tipo_actividadDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_tipo_actividadDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_cat_tipo_actividad($Siga_cat_tipo_actividadDto){
//$Siga_cat_tipo_actividadDto=$this->validarSiga_cat_tipo_actividad($Siga_cat_tipo_actividadDto);
$Siga_cat_tipo_actividadController = new Siga_cat_tipo_actividadController();
$Siga_cat_tipo_actividadDto = $Siga_cat_tipo_actividadController->deleteSiga_cat_tipo_actividad($Siga_cat_tipo_actividadDto);
if($Siga_cat_tipo_actividadDto==true){
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



@$Id_Tipo_Actividad=$_POST["Id_Tipo_Actividad"];
@$Id_Area=$_POST["Id_Area"];
@$Desc_Tipo_Actividad=$_POST["Desc_Tipo_Actividad"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];

$siga_cat_tipo_actividadFacade = new Siga_cat_tipo_actividadFacade();
$siga_cat_tipo_actividadDto = new Siga_cat_tipo_actividadDTO();

$siga_cat_tipo_actividadDto->setId_Tipo_Actividad($Id_Tipo_Actividad);
$siga_cat_tipo_actividadDto->setId_Area($Id_Area);
$siga_cat_tipo_actividadDto->setDesc_Tipo_Actividad($Desc_Tipo_Actividad);
$siga_cat_tipo_actividadDto->setFech_Inser($Fech_Inser);
$siga_cat_tipo_actividadDto->setUsr_Inser($Usr_Inser);
$siga_cat_tipo_actividadDto->setFech_Mod($Fech_Mod);
$siga_cat_tipo_actividadDto->setUsr_Mod($Usr_Mod);
$siga_cat_tipo_actividadDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_Tipo_Actividad=="") ){
$siga_cat_tipo_actividadDto=$siga_cat_tipo_actividadFacade->insertSiga_cat_tipo_actividad($siga_cat_tipo_actividadDto);
echo $siga_cat_tipo_actividadDto;
} else if(($accion=="guardar") && ($Id_Tipo_Actividad!="")){
$siga_cat_tipo_actividadDto=$siga_cat_tipo_actividadFacade->updateSiga_cat_tipo_actividad($siga_cat_tipo_actividadDto);
echo $siga_cat_tipo_actividadDto;
} else if($accion=="consultar"){
$siga_cat_tipo_actividadDto=$siga_cat_tipo_actividadFacade->selectSiga_cat_tipo_actividad($siga_cat_tipo_actividadDto);
echo $siga_cat_tipo_actividadDto;
} else if( ($accion=="baja") && ($Id_Tipo_Actividad!="") ){
$siga_cat_tipo_actividadDto=$siga_cat_tipo_actividadFacade->deleteSiga_cat_tipo_actividad($siga_cat_tipo_actividadDto);
echo $siga_cat_tipo_actividadDto;
} else if( ($accion=="seleccionar") && ($Id_Tipo_Actividad!="") ){
$siga_cat_tipo_actividadDto=$siga_cat_tipo_actividadFacade->selectSiga_cat_tipo_actividad($siga_cat_tipo_actividadDto);
echo $siga_cat_tipo_actividadDto;
}


?>