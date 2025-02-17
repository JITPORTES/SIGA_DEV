<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_formulas_dep/Siga_cat_formulas_depDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_cat_formulas_dep/Siga_cat_formulas_depController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_cat_formulas_depFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_formulas_dep($Siga_cat_formulas_depDto){
$Siga_cat_formulas_depDto->setId_Formulas_Dep(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_formulas_depDto->getId_Formulas_Dep(),"utf8"):strtoupper($Siga_cat_formulas_depDto->getId_Formulas_Dep()))))));
if($this->esFecha($Siga_cat_formulas_depDto->getId_Formulas_Dep())){
$Siga_cat_formulas_depDto->setId_Formulas_Dep($this->fechaMysql($Siga_cat_formulas_depDto->getId_Formulas_Dep()));
}
$Siga_cat_formulas_depDto->setId_Area(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_formulas_depDto->getId_Area(),"utf8"):strtoupper($Siga_cat_formulas_depDto->getId_Area()))))));
if($this->esFecha($Siga_cat_formulas_depDto->getId_Area())){
$Siga_cat_formulas_depDto->setId_Area($this->fechaMysql($Siga_cat_formulas_depDto->getId_Area()));
}
$Siga_cat_formulas_depDto->setDesc_Formulas_Dep(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_formulas_depDto->getDesc_Formulas_Dep(),"utf8"):strtoupper($Siga_cat_formulas_depDto->getDesc_Formulas_Dep()))))));
if($this->esFecha($Siga_cat_formulas_depDto->getDesc_Formulas_Dep())){
$Siga_cat_formulas_depDto->setDesc_Formulas_Dep($this->fechaMysql($Siga_cat_formulas_depDto->getDesc_Formulas_Dep()));
}
$Siga_cat_formulas_depDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_formulas_depDto->getFech_Inser(),"utf8"):strtoupper($Siga_cat_formulas_depDto->getFech_Inser()))))));
if($this->esFecha($Siga_cat_formulas_depDto->getFech_Inser())){
$Siga_cat_formulas_depDto->setFech_Inser($this->fechaMysql($Siga_cat_formulas_depDto->getFech_Inser()));
}
$Siga_cat_formulas_depDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_formulas_depDto->getUsr_Inser(),"utf8"):strtoupper($Siga_cat_formulas_depDto->getUsr_Inser()))))));
if($this->esFecha($Siga_cat_formulas_depDto->getUsr_Inser())){
$Siga_cat_formulas_depDto->setUsr_Inser($this->fechaMysql($Siga_cat_formulas_depDto->getUsr_Inser()));
}
$Siga_cat_formulas_depDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_formulas_depDto->getFech_Mod(),"utf8"):strtoupper($Siga_cat_formulas_depDto->getFech_Mod()))))));
if($this->esFecha($Siga_cat_formulas_depDto->getFech_Mod())){
$Siga_cat_formulas_depDto->setFech_Mod($this->fechaMysql($Siga_cat_formulas_depDto->getFech_Mod()));
}
$Siga_cat_formulas_depDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_formulas_depDto->getUsr_Mod(),"utf8"):strtoupper($Siga_cat_formulas_depDto->getUsr_Mod()))))));
if($this->esFecha($Siga_cat_formulas_depDto->getUsr_Mod())){
$Siga_cat_formulas_depDto->setUsr_Mod($this->fechaMysql($Siga_cat_formulas_depDto->getUsr_Mod()));
}
$Siga_cat_formulas_depDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_formulas_depDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_cat_formulas_depDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_cat_formulas_depDto->getEstatus_Reg())){
$Siga_cat_formulas_depDto->setEstatus_Reg($this->fechaMysql($Siga_cat_formulas_depDto->getEstatus_Reg()));
}
return $Siga_cat_formulas_depDto;
}
public function selectSiga_cat_formulas_dep($Siga_cat_formulas_depDto){
$Siga_cat_formulas_depDto=$this->validarSiga_cat_formulas_dep($Siga_cat_formulas_depDto);
$Siga_cat_formulas_depController = new Siga_cat_formulas_depController();
$Siga_cat_formulas_depDto = $Siga_cat_formulas_depController->selectSiga_cat_formulas_dep($Siga_cat_formulas_depDto);
if($Siga_cat_formulas_depDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_formulas_depDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_cat_formulas_dep($Siga_cat_formulas_depDto){
//$Siga_cat_formulas_depDto=$this->validarSiga_cat_formulas_dep($Siga_cat_formulas_depDto);
$Siga_cat_formulas_depController = new Siga_cat_formulas_depController();
$Siga_cat_formulas_depDto = $Siga_cat_formulas_depController->insertSiga_cat_formulas_dep($Siga_cat_formulas_depDto);
if($Siga_cat_formulas_depDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_formulas_depDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_cat_formulas_dep($Siga_cat_formulas_depDto){
//$Siga_cat_formulas_depDto=$this->validarSiga_cat_formulas_dep($Siga_cat_formulas_depDto);
$Siga_cat_formulas_depController = new Siga_cat_formulas_depController();
$Siga_cat_formulas_depDto = $Siga_cat_formulas_depController->updateSiga_cat_formulas_dep($Siga_cat_formulas_depDto);
if($Siga_cat_formulas_depDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_formulas_depDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_cat_formulas_dep($Siga_cat_formulas_depDto){
//$Siga_cat_formulas_depDto=$this->validarSiga_cat_formulas_dep($Siga_cat_formulas_depDto);
$Siga_cat_formulas_depController = new Siga_cat_formulas_depController();
$Siga_cat_formulas_depDto = $Siga_cat_formulas_depController->deleteSiga_cat_formulas_dep($Siga_cat_formulas_depDto);
if($Siga_cat_formulas_depDto==true){
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



@$Id_Formulas_Dep=$_POST["Id_Formulas_Dep"];
@$Id_Area=$_POST["Id_Area"];
@$Desc_Formulas_Dep=$_POST["Desc_Formulas_Dep"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];

$siga_cat_formulas_depFacade = new Siga_cat_formulas_depFacade();
$siga_cat_formulas_depDto = new Siga_cat_formulas_depDTO();

$siga_cat_formulas_depDto->setId_Formulas_Dep($Id_Formulas_Dep);
$siga_cat_formulas_depDto->setId_Area($Id_Area);
$siga_cat_formulas_depDto->setDesc_Formulas_Dep($Desc_Formulas_Dep);
$siga_cat_formulas_depDto->setFech_Inser($Fech_Inser);
$siga_cat_formulas_depDto->setUsr_Inser($Usr_Inser);
$siga_cat_formulas_depDto->setFech_Mod($Fech_Mod);
$siga_cat_formulas_depDto->setUsr_Mod($Usr_Mod);
$siga_cat_formulas_depDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_Formulas_Dep=="") ){
$siga_cat_formulas_depDto=$siga_cat_formulas_depFacade->insertSiga_cat_formulas_dep($siga_cat_formulas_depDto);
echo $siga_cat_formulas_depDto;
} else if(($accion=="guardar") && ($Id_Formulas_Dep!="")){
$siga_cat_formulas_depDto=$siga_cat_formulas_depFacade->updateSiga_cat_formulas_dep($siga_cat_formulas_depDto);
echo $siga_cat_formulas_depDto;
} else if($accion=="consultar"){
$siga_cat_formulas_depDto=$siga_cat_formulas_depFacade->selectSiga_cat_formulas_dep($siga_cat_formulas_depDto);
echo $siga_cat_formulas_depDto;
} else if( ($accion=="baja") && ($Id_Formulas_Dep!="") ){
$siga_cat_formulas_depDto=$siga_cat_formulas_depFacade->deleteSiga_cat_formulas_dep($siga_cat_formulas_depDto);
echo $siga_cat_formulas_depDto;
} else if( ($accion=="seleccionar") && ($Id_Formulas_Dep!="") ){
$siga_cat_formulas_depDto=$siga_cat_formulas_depFacade->selectSiga_cat_formulas_dep($siga_cat_formulas_depDto);
echo $siga_cat_formulas_depDto;
}


?>