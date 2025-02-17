<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_area_de_poliza/Siga_cat_area_de_polizaDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_cat_area_de_poliza/Siga_cat_area_de_polizaController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_cat_area_de_polizaFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_area_de_poliza($Siga_cat_area_de_polizaDto){
$Siga_cat_area_de_polizaDto->setId_Area_de_poliza(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_area_de_polizaDto->getId_Area_de_poliza(),"utf8"):strtoupper($Siga_cat_area_de_polizaDto->getId_Area_de_poliza()))))));
if($this->esFecha($Siga_cat_area_de_polizaDto->getId_Area_de_poliza())){
$Siga_cat_area_de_polizaDto->setId_Area_de_poliza($this->fechaMysql($Siga_cat_area_de_polizaDto->getId_Area_de_poliza()));
}
$Siga_cat_area_de_polizaDto->setId_Area(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_area_de_polizaDto->getId_Area(),"utf8"):strtoupper($Siga_cat_area_de_polizaDto->getId_Area()))))));
if($this->esFecha($Siga_cat_area_de_polizaDto->getId_Area())){
$Siga_cat_area_de_polizaDto->setId_Area($this->fechaMysql($Siga_cat_area_de_polizaDto->getId_Area()));
}
$Siga_cat_area_de_polizaDto->setDesc_Area_de_poliza(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_area_de_polizaDto->getDesc_Area_de_poliza(),"utf8"):strtoupper($Siga_cat_area_de_polizaDto->getDesc_Area_de_poliza()))))));
if($this->esFecha($Siga_cat_area_de_polizaDto->getDesc_Area_de_poliza())){
$Siga_cat_area_de_polizaDto->setDesc_Area_de_poliza($this->fechaMysql($Siga_cat_area_de_polizaDto->getDesc_Area_de_poliza()));
}
$Siga_cat_area_de_polizaDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_area_de_polizaDto->getFech_Inser(),"utf8"):strtoupper($Siga_cat_area_de_polizaDto->getFech_Inser()))))));
if($this->esFecha($Siga_cat_area_de_polizaDto->getFech_Inser())){
$Siga_cat_area_de_polizaDto->setFech_Inser($this->fechaMysql($Siga_cat_area_de_polizaDto->getFech_Inser()));
}
$Siga_cat_area_de_polizaDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_area_de_polizaDto->getUsr_Inser(),"utf8"):strtoupper($Siga_cat_area_de_polizaDto->getUsr_Inser()))))));
if($this->esFecha($Siga_cat_area_de_polizaDto->getUsr_Inser())){
$Siga_cat_area_de_polizaDto->setUsr_Inser($this->fechaMysql($Siga_cat_area_de_polizaDto->getUsr_Inser()));
}
$Siga_cat_area_de_polizaDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_area_de_polizaDto->getFech_Mod(),"utf8"):strtoupper($Siga_cat_area_de_polizaDto->getFech_Mod()))))));
if($this->esFecha($Siga_cat_area_de_polizaDto->getFech_Mod())){
$Siga_cat_area_de_polizaDto->setFech_Mod($this->fechaMysql($Siga_cat_area_de_polizaDto->getFech_Mod()));
}
$Siga_cat_area_de_polizaDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_area_de_polizaDto->getUsr_Mod(),"utf8"):strtoupper($Siga_cat_area_de_polizaDto->getUsr_Mod()))))));
if($this->esFecha($Siga_cat_area_de_polizaDto->getUsr_Mod())){
$Siga_cat_area_de_polizaDto->setUsr_Mod($this->fechaMysql($Siga_cat_area_de_polizaDto->getUsr_Mod()));
}
$Siga_cat_area_de_polizaDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_area_de_polizaDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_cat_area_de_polizaDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_cat_area_de_polizaDto->getEstatus_Reg())){
$Siga_cat_area_de_polizaDto->setEstatus_Reg($this->fechaMysql($Siga_cat_area_de_polizaDto->getEstatus_Reg()));
}
return $Siga_cat_area_de_polizaDto;
}
public function selectSiga_cat_area_de_poliza($Siga_cat_area_de_polizaDto){
$Siga_cat_area_de_polizaDto=$this->validarSiga_cat_area_de_poliza($Siga_cat_area_de_polizaDto);
$Siga_cat_area_de_polizaController = new Siga_cat_area_de_polizaController();
$Siga_cat_area_de_polizaDto = $Siga_cat_area_de_polizaController->selectSiga_cat_area_de_poliza($Siga_cat_area_de_polizaDto);
if($Siga_cat_area_de_polizaDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_area_de_polizaDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_cat_area_de_poliza($Siga_cat_area_de_polizaDto){
//$Siga_cat_area_de_polizaDto=$this->validarSiga_cat_area_de_poliza($Siga_cat_area_de_polizaDto);
$Siga_cat_area_de_polizaController = new Siga_cat_area_de_polizaController();
$Siga_cat_area_de_polizaDto = $Siga_cat_area_de_polizaController->insertSiga_cat_area_de_poliza($Siga_cat_area_de_polizaDto);
if($Siga_cat_area_de_polizaDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_area_de_polizaDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_cat_area_de_poliza($Siga_cat_area_de_polizaDto){
//$Siga_cat_area_de_polizaDto=$this->validarSiga_cat_area_de_poliza($Siga_cat_area_de_polizaDto);
$Siga_cat_area_de_polizaController = new Siga_cat_area_de_polizaController();
$Siga_cat_area_de_polizaDto = $Siga_cat_area_de_polizaController->updateSiga_cat_area_de_poliza($Siga_cat_area_de_polizaDto);
if($Siga_cat_area_de_polizaDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_area_de_polizaDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_cat_area_de_poliza($Siga_cat_area_de_polizaDto){
//$Siga_cat_area_de_polizaDto=$this->validarSiga_cat_area_de_poliza($Siga_cat_area_de_polizaDto);
$Siga_cat_area_de_polizaController = new Siga_cat_area_de_polizaController();
$Siga_cat_area_de_polizaDto = $Siga_cat_area_de_polizaController->deleteSiga_cat_area_de_poliza($Siga_cat_area_de_polizaDto);
if($Siga_cat_area_de_polizaDto==true){
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



@$Id_Area_de_poliza=$_POST["Id_Area_de_poliza"];
@$Id_Area=$_POST["Id_Area"];
@$Desc_Area_de_poliza=$_POST["Desc_Area_de_poliza"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];

$siga_cat_area_de_polizaFacade = new Siga_cat_area_de_polizaFacade();
$siga_cat_area_de_polizaDto = new Siga_cat_area_de_polizaDTO();

$siga_cat_area_de_polizaDto->setId_Area_de_poliza($Id_Area_de_poliza);
$siga_cat_area_de_polizaDto->setId_Area($Id_Area);
$siga_cat_area_de_polizaDto->setDesc_Area_de_poliza($Desc_Area_de_poliza);
$siga_cat_area_de_polizaDto->setFech_Inser($Fech_Inser);
$siga_cat_area_de_polizaDto->setUsr_Inser($Usr_Inser);
$siga_cat_area_de_polizaDto->setFech_Mod($Fech_Mod);
$siga_cat_area_de_polizaDto->setUsr_Mod($Usr_Mod);
$siga_cat_area_de_polizaDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_Area_de_poliza=="") ){
$siga_cat_area_de_polizaDto=$siga_cat_area_de_polizaFacade->insertSiga_cat_area_de_poliza($siga_cat_area_de_polizaDto);
echo $siga_cat_area_de_polizaDto;
} else if(($accion=="guardar") && ($Id_Area_de_poliza!="")){
$siga_cat_area_de_polizaDto=$siga_cat_area_de_polizaFacade->updateSiga_cat_area_de_poliza($siga_cat_area_de_polizaDto);
echo $siga_cat_area_de_polizaDto;
} else if($accion=="consultar"){
$siga_cat_area_de_polizaDto=$siga_cat_area_de_polizaFacade->selectSiga_cat_area_de_poliza($siga_cat_area_de_polizaDto);
echo $siga_cat_area_de_polizaDto;
} else if( ($accion=="baja") && ($Id_Area_de_poliza!="") ){
$siga_cat_area_de_polizaDto=$siga_cat_area_de_polizaFacade->deleteSiga_cat_area_de_poliza($siga_cat_area_de_polizaDto);
echo $siga_cat_area_de_polizaDto;
} else if( ($accion=="seleccionar") && ($Id_Area_de_poliza!="") ){
$siga_cat_area_de_polizaDto=$siga_cat_area_de_polizaFacade->selectSiga_cat_area_de_poliza($siga_cat_area_de_polizaDto);
echo $siga_cat_area_de_polizaDto;
}


?>