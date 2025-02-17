<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_ubic_prim/Siga_cat_ubic_primDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_cat_ubic_prim/Siga_cat_ubic_primController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_cat_ubic_primFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_ubic_prim($Siga_cat_ubic_primDto){
$Siga_cat_ubic_primDto->setId_Ubic_Prim(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_ubic_primDto->getId_Ubic_Prim(),"utf8"):strtoupper($Siga_cat_ubic_primDto->getId_Ubic_Prim()))))));
if($this->esFecha($Siga_cat_ubic_primDto->getId_Ubic_Prim())){
$Siga_cat_ubic_primDto->setId_Ubic_Prim($this->fechaMysql($Siga_cat_ubic_primDto->getId_Ubic_Prim()));
}
$Siga_cat_ubic_primDto->setId_Area(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_ubic_primDto->getId_Area(),"utf8"):strtoupper($Siga_cat_ubic_primDto->getId_Area()))))));
if($this->esFecha($Siga_cat_ubic_primDto->getId_Area())){
$Siga_cat_ubic_primDto->setId_Area($this->fechaMysql($Siga_cat_ubic_primDto->getId_Area()));
}
$Siga_cat_ubic_primDto->setDesc_Ubic_Prim(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_ubic_primDto->getDesc_Ubic_Prim(),"utf8"):strtoupper($Siga_cat_ubic_primDto->getDesc_Ubic_Prim()))))));
if($this->esFecha($Siga_cat_ubic_primDto->getDesc_Ubic_Prim())){
$Siga_cat_ubic_primDto->setDesc_Ubic_Prim($this->fechaMysql($Siga_cat_ubic_primDto->getDesc_Ubic_Prim()));
}
$Siga_cat_ubic_primDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_ubic_primDto->getFech_Inser(),"utf8"):strtoupper($Siga_cat_ubic_primDto->getFech_Inser()))))));
if($this->esFecha($Siga_cat_ubic_primDto->getFech_Inser())){
$Siga_cat_ubic_primDto->setFech_Inser($this->fechaMysql($Siga_cat_ubic_primDto->getFech_Inser()));
}
$Siga_cat_ubic_primDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_ubic_primDto->getUsr_Inser(),"utf8"):strtoupper($Siga_cat_ubic_primDto->getUsr_Inser()))))));
if($this->esFecha($Siga_cat_ubic_primDto->getUsr_Inser())){
$Siga_cat_ubic_primDto->setUsr_Inser($this->fechaMysql($Siga_cat_ubic_primDto->getUsr_Inser()));
}
$Siga_cat_ubic_primDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_ubic_primDto->getFech_Mod(),"utf8"):strtoupper($Siga_cat_ubic_primDto->getFech_Mod()))))));
if($this->esFecha($Siga_cat_ubic_primDto->getFech_Mod())){
$Siga_cat_ubic_primDto->setFech_Mod($this->fechaMysql($Siga_cat_ubic_primDto->getFech_Mod()));
}
$Siga_cat_ubic_primDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_ubic_primDto->getUsr_Mod(),"utf8"):strtoupper($Siga_cat_ubic_primDto->getUsr_Mod()))))));
if($this->esFecha($Siga_cat_ubic_primDto->getUsr_Mod())){
$Siga_cat_ubic_primDto->setUsr_Mod($this->fechaMysql($Siga_cat_ubic_primDto->getUsr_Mod()));
}
$Siga_cat_ubic_primDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_ubic_primDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_cat_ubic_primDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_cat_ubic_primDto->getEstatus_Reg())){
$Siga_cat_ubic_primDto->setEstatus_Reg($this->fechaMysql($Siga_cat_ubic_primDto->getEstatus_Reg()));
}
return $Siga_cat_ubic_primDto;
}
public function selectSiga_cat_ubic_prim($Siga_cat_ubic_primDto){
$Siga_cat_ubic_primDto=$this->validarSiga_cat_ubic_prim($Siga_cat_ubic_primDto);
$Siga_cat_ubic_primController = new Siga_cat_ubic_primController();
$Siga_cat_ubic_primDto = $Siga_cat_ubic_primController->selectSiga_cat_ubic_prim($Siga_cat_ubic_primDto);
if($Siga_cat_ubic_primDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_ubic_primDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_cat_ubic_prim($Siga_cat_ubic_primDto){
//$Siga_cat_ubic_primDto=$this->validarSiga_cat_ubic_prim($Siga_cat_ubic_primDto);
$Siga_cat_ubic_primController = new Siga_cat_ubic_primController();
$Siga_cat_ubic_primDto = $Siga_cat_ubic_primController->insertSiga_cat_ubic_prim($Siga_cat_ubic_primDto);
if($Siga_cat_ubic_primDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_ubic_primDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_cat_ubic_prim($Siga_cat_ubic_primDto){
//$Siga_cat_ubic_primDto=$this->validarSiga_cat_ubic_prim($Siga_cat_ubic_primDto);
$Siga_cat_ubic_primController = new Siga_cat_ubic_primController();
$Siga_cat_ubic_primDto = $Siga_cat_ubic_primController->updateSiga_cat_ubic_prim($Siga_cat_ubic_primDto);
if($Siga_cat_ubic_primDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_ubic_primDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_cat_ubic_prim($Siga_cat_ubic_primDto){
//$Siga_cat_ubic_primDto=$this->validarSiga_cat_ubic_prim($Siga_cat_ubic_primDto);
$Siga_cat_ubic_primController = new Siga_cat_ubic_primController();
$Siga_cat_ubic_primDto = $Siga_cat_ubic_primController->deleteSiga_cat_ubic_prim($Siga_cat_ubic_primDto);
if($Siga_cat_ubic_primDto==true){
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



@$Id_Ubic_Prim=$_POST["Id_Ubic_Prim"];
@$Id_Area=$_POST["Id_Area"];
@$Desc_Ubic_Prim=$_POST["Desc_Ubic_Prim"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];

$siga_cat_ubic_primFacade = new Siga_cat_ubic_primFacade();
$siga_cat_ubic_primDto = new Siga_cat_ubic_primDTO();

$siga_cat_ubic_primDto->setId_Ubic_Prim($Id_Ubic_Prim);
$siga_cat_ubic_primDto->setId_Area($Id_Area);
$siga_cat_ubic_primDto->setDesc_Ubic_Prim($Desc_Ubic_Prim);
$siga_cat_ubic_primDto->setFech_Inser($Fech_Inser);
$siga_cat_ubic_primDto->setUsr_Inser($Usr_Inser);
$siga_cat_ubic_primDto->setFech_Mod($Fech_Mod);
$siga_cat_ubic_primDto->setUsr_Mod($Usr_Mod);
$siga_cat_ubic_primDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_Ubic_Prim=="") ){
$siga_cat_ubic_primDto=$siga_cat_ubic_primFacade->insertSiga_cat_ubic_prim($siga_cat_ubic_primDto);
echo $siga_cat_ubic_primDto;
} else if(($accion=="guardar") && ($Id_Ubic_Prim!="")){
$siga_cat_ubic_primDto=$siga_cat_ubic_primFacade->updateSiga_cat_ubic_prim($siga_cat_ubic_primDto);
echo $siga_cat_ubic_primDto;
} else if($accion=="consultar"){
$siga_cat_ubic_primDto=$siga_cat_ubic_primFacade->selectSiga_cat_ubic_prim($siga_cat_ubic_primDto);
echo $siga_cat_ubic_primDto;
} else if( ($accion=="baja") && ($Id_Ubic_Prim!="") ){
$siga_cat_ubic_primDto=$siga_cat_ubic_primFacade->deleteSiga_cat_ubic_prim($siga_cat_ubic_primDto);
echo $siga_cat_ubic_primDto;
} else if( ($accion=="seleccionar") && ($Id_Ubic_Prim!="") ){
$siga_cat_ubic_primDto=$siga_cat_ubic_primFacade->selectSiga_cat_ubic_prim($siga_cat_ubic_primDto);
echo $siga_cat_ubic_primDto;
}


?>