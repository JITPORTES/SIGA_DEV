<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_tipo_activo/Siga_cat_tipo_activoDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_cat_tipo_activo/Siga_cat_tipo_activoController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_cat_tipo_activoFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_tipo_activo($Siga_cat_tipo_activoDto){
$Siga_cat_tipo_activoDto->setId_Tipo_Activo(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_tipo_activoDto->getId_Tipo_Activo(),"utf8"):strtoupper($Siga_cat_tipo_activoDto->getId_Tipo_Activo()))))));
if($this->esFecha($Siga_cat_tipo_activoDto->getId_Tipo_Activo())){
$Siga_cat_tipo_activoDto->setId_Tipo_Activo($this->fechaMysql($Siga_cat_tipo_activoDto->getId_Tipo_Activo()));
}
$Siga_cat_tipo_activoDto->setDesc_Tipo_Activo(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_tipo_activoDto->getDesc_Tipo_Activo(),"utf8"):strtoupper($Siga_cat_tipo_activoDto->getDesc_Tipo_Activo()))))));
if($this->esFecha($Siga_cat_tipo_activoDto->getDesc_Tipo_Activo())){
$Siga_cat_tipo_activoDto->setDesc_Tipo_Activo($this->fechaMysql($Siga_cat_tipo_activoDto->getDesc_Tipo_Activo()));
}
$Siga_cat_tipo_activoDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_tipo_activoDto->getFech_Inser(),"utf8"):strtoupper($Siga_cat_tipo_activoDto->getFech_Inser()))))));
if($this->esFecha($Siga_cat_tipo_activoDto->getFech_Inser())){
$Siga_cat_tipo_activoDto->setFech_Inser($this->fechaMysql($Siga_cat_tipo_activoDto->getFech_Inser()));
}
$Siga_cat_tipo_activoDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_tipo_activoDto->getUsr_Inser(),"utf8"):strtoupper($Siga_cat_tipo_activoDto->getUsr_Inser()))))));
if($this->esFecha($Siga_cat_tipo_activoDto->getUsr_Inser())){
$Siga_cat_tipo_activoDto->setUsr_Inser($this->fechaMysql($Siga_cat_tipo_activoDto->getUsr_Inser()));
}
$Siga_cat_tipo_activoDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_tipo_activoDto->getFech_Mod(),"utf8"):strtoupper($Siga_cat_tipo_activoDto->getFech_Mod()))))));
if($this->esFecha($Siga_cat_tipo_activoDto->getFech_Mod())){
$Siga_cat_tipo_activoDto->setFech_Mod($this->fechaMysql($Siga_cat_tipo_activoDto->getFech_Mod()));
}
$Siga_cat_tipo_activoDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_tipo_activoDto->getUsr_Mod(),"utf8"):strtoupper($Siga_cat_tipo_activoDto->getUsr_Mod()))))));
if($this->esFecha($Siga_cat_tipo_activoDto->getUsr_Mod())){
$Siga_cat_tipo_activoDto->setUsr_Mod($this->fechaMysql($Siga_cat_tipo_activoDto->getUsr_Mod()));
}
$Siga_cat_tipo_activoDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_tipo_activoDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_cat_tipo_activoDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_cat_tipo_activoDto->getEstatus_Reg())){
$Siga_cat_tipo_activoDto->setEstatus_Reg($this->fechaMysql($Siga_cat_tipo_activoDto->getEstatus_Reg()));
}
return $Siga_cat_tipo_activoDto;
}
public function selectSiga_cat_tipo_activo($Siga_cat_tipo_activoDto){
$Siga_cat_tipo_activoDto=$this->validarSiga_cat_tipo_activo($Siga_cat_tipo_activoDto);
$Siga_cat_tipo_activoController = new Siga_cat_tipo_activoController();
$Siga_cat_tipo_activoDto = $Siga_cat_tipo_activoController->selectSiga_cat_tipo_activo($Siga_cat_tipo_activoDto);
if($Siga_cat_tipo_activoDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_tipo_activoDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_cat_tipo_activo($Siga_cat_tipo_activoDto){
//$Siga_cat_tipo_activoDto=$this->validarSiga_cat_tipo_activo($Siga_cat_tipo_activoDto);
$Siga_cat_tipo_activoController = new Siga_cat_tipo_activoController();
$Siga_cat_tipo_activoDto = $Siga_cat_tipo_activoController->insertSiga_cat_tipo_activo($Siga_cat_tipo_activoDto);
if($Siga_cat_tipo_activoDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_tipo_activoDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_cat_tipo_activo($Siga_cat_tipo_activoDto){
//$Siga_cat_tipo_activoDto=$this->validarSiga_cat_tipo_activo($Siga_cat_tipo_activoDto);
$Siga_cat_tipo_activoController = new Siga_cat_tipo_activoController();
$Siga_cat_tipo_activoDto = $Siga_cat_tipo_activoController->updateSiga_cat_tipo_activo($Siga_cat_tipo_activoDto);
if($Siga_cat_tipo_activoDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_tipo_activoDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_cat_tipo_activo($Siga_cat_tipo_activoDto){
//$Siga_cat_tipo_activoDto=$this->validarSiga_cat_tipo_activo($Siga_cat_tipo_activoDto);
$Siga_cat_tipo_activoController = new Siga_cat_tipo_activoController();
$Siga_cat_tipo_activoDto = $Siga_cat_tipo_activoController->deleteSiga_cat_tipo_activo($Siga_cat_tipo_activoDto);
if($Siga_cat_tipo_activoDto==true){
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



@$Id_Tipo_Activo=$_POST["Id_Tipo_Activo"];
@$Desc_Tipo_Activo=$_POST["Desc_Tipo_Activo"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];

$siga_cat_tipo_activoFacade = new Siga_cat_tipo_activoFacade();
$siga_cat_tipo_activoDto = new Siga_cat_tipo_activoDTO();

$siga_cat_tipo_activoDto->setId_Tipo_Activo($Id_Tipo_Activo);
$siga_cat_tipo_activoDto->setDesc_Tipo_Activo($Desc_Tipo_Activo);
$siga_cat_tipo_activoDto->setFech_Inser($Fech_Inser);
$siga_cat_tipo_activoDto->setUsr_Inser($Usr_Inser);
$siga_cat_tipo_activoDto->setFech_Mod($Fech_Mod);
$siga_cat_tipo_activoDto->setUsr_Mod($Usr_Mod);
$siga_cat_tipo_activoDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_Tipo_Activo=="") ){
$siga_cat_tipo_activoDto=$siga_cat_tipo_activoFacade->insertSiga_cat_tipo_activo($siga_cat_tipo_activoDto);
echo $siga_cat_tipo_activoDto;
} else if(($accion=="guardar") && ($Id_Tipo_Activo!="")){
$siga_cat_tipo_activoDto=$siga_cat_tipo_activoFacade->updateSiga_cat_tipo_activo($siga_cat_tipo_activoDto);
echo $siga_cat_tipo_activoDto;
} else if($accion=="consultar"){
$siga_cat_tipo_activoDto=$siga_cat_tipo_activoFacade->selectSiga_cat_tipo_activo($siga_cat_tipo_activoDto);
echo $siga_cat_tipo_activoDto;
} else if( ($accion=="baja") && ($Id_Tipo_Activo!="") ){
$siga_cat_tipo_activoDto=$siga_cat_tipo_activoFacade->deleteSiga_cat_tipo_activo($siga_cat_tipo_activoDto);
echo $siga_cat_tipo_activoDto;
} else if( ($accion=="seleccionar") && ($Id_Tipo_Activo!="") ){
$siga_cat_tipo_activoDto=$siga_cat_tipo_activoFacade->selectSiga_cat_tipo_activo($siga_cat_tipo_activoDto);
echo $siga_cat_tipo_activoDto;
}


?>