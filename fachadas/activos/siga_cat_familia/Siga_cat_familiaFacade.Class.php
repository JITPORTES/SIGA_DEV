<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_familia/Siga_cat_familiaDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_cat_familia/Siga_cat_familiaController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_cat_familiaFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_familia($Siga_cat_familiaDto){
$Siga_cat_familiaDto->setId_Familia(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_familiaDto->getId_Familia(),"utf8"):strtoupper($Siga_cat_familiaDto->getId_Familia()))))));
if($this->esFecha($Siga_cat_familiaDto->getId_Familia())){
$Siga_cat_familiaDto->setId_Familia($this->fechaMysql($Siga_cat_familiaDto->getId_Familia()));
}
$Siga_cat_familiaDto->setId_Area(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_familiaDto->getId_Area(),"utf8"):strtoupper($Siga_cat_familiaDto->getId_Area()))))));
if($this->esFecha($Siga_cat_familiaDto->getId_Area())){
$Siga_cat_familiaDto->setId_Area($this->fechaMysql($Siga_cat_familiaDto->getId_Area()));
}
$Siga_cat_familiaDto->setDesc_Familia(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_familiaDto->getDesc_Familia(),"utf8"):strtoupper($Siga_cat_familiaDto->getDesc_Familia()))))));
if($this->esFecha($Siga_cat_familiaDto->getDesc_Familia())){
$Siga_cat_familiaDto->setDesc_Familia($this->fechaMysql($Siga_cat_familiaDto->getDesc_Familia()));
}
$Siga_cat_familiaDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_familiaDto->getFech_Inser(),"utf8"):strtoupper($Siga_cat_familiaDto->getFech_Inser()))))));
if($this->esFecha($Siga_cat_familiaDto->getFech_Inser())){
$Siga_cat_familiaDto->setFech_Inser($this->fechaMysql($Siga_cat_familiaDto->getFech_Inser()));
}
$Siga_cat_familiaDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_familiaDto->getUsr_Inser(),"utf8"):strtoupper($Siga_cat_familiaDto->getUsr_Inser()))))));
if($this->esFecha($Siga_cat_familiaDto->getUsr_Inser())){
$Siga_cat_familiaDto->setUsr_Inser($this->fechaMysql($Siga_cat_familiaDto->getUsr_Inser()));
}
$Siga_cat_familiaDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_familiaDto->getFech_Mod(),"utf8"):strtoupper($Siga_cat_familiaDto->getFech_Mod()))))));
if($this->esFecha($Siga_cat_familiaDto->getFech_Mod())){
$Siga_cat_familiaDto->setFech_Mod($this->fechaMysql($Siga_cat_familiaDto->getFech_Mod()));
}
$Siga_cat_familiaDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_familiaDto->getUsr_Mod(),"utf8"):strtoupper($Siga_cat_familiaDto->getUsr_Mod()))))));
if($this->esFecha($Siga_cat_familiaDto->getUsr_Mod())){
$Siga_cat_familiaDto->setUsr_Mod($this->fechaMysql($Siga_cat_familiaDto->getUsr_Mod()));
}
$Siga_cat_familiaDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_familiaDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_cat_familiaDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_cat_familiaDto->getEstatus_Reg())){
$Siga_cat_familiaDto->setEstatus_Reg($this->fechaMysql($Siga_cat_familiaDto->getEstatus_Reg()));
}
return $Siga_cat_familiaDto;
}
public function selectSiga_cat_familia($Siga_cat_familiaDto){
$Siga_cat_familiaDto=$this->validarSiga_cat_familia($Siga_cat_familiaDto);
$Siga_cat_familiaController = new Siga_cat_familiaController();
$Siga_cat_familiaDto = $Siga_cat_familiaController->selectSiga_cat_familia($Siga_cat_familiaDto);
if($Siga_cat_familiaDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_familiaDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_cat_familia($Siga_cat_familiaDto){
//$Siga_cat_familiaDto=$this->validarSiga_cat_familia($Siga_cat_familiaDto);
$Siga_cat_familiaController = new Siga_cat_familiaController();
$Siga_cat_familiaDto = $Siga_cat_familiaController->insertSiga_cat_familia($Siga_cat_familiaDto);
if($Siga_cat_familiaDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_familiaDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_cat_familia($Siga_cat_familiaDto){
//$Siga_cat_familiaDto=$this->validarSiga_cat_familia($Siga_cat_familiaDto);
$Siga_cat_familiaController = new Siga_cat_familiaController();
$Siga_cat_familiaDto = $Siga_cat_familiaController->updateSiga_cat_familia($Siga_cat_familiaDto);
if($Siga_cat_familiaDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_familiaDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_cat_familia($Siga_cat_familiaDto){
//$Siga_cat_familiaDto=$this->validarSiga_cat_familia($Siga_cat_familiaDto);
$Siga_cat_familiaController = new Siga_cat_familiaController();
$Siga_cat_familiaDto = $Siga_cat_familiaController->deleteSiga_cat_familia($Siga_cat_familiaDto);
if($Siga_cat_familiaDto==true){
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



@$Id_Familia=$_POST["Id_Familia"];
@$Id_Area=$_POST["Id_Area"];
@$Desc_Familia=$_POST["Desc_Familia"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];

$siga_cat_familiaFacade = new Siga_cat_familiaFacade();
$siga_cat_familiaDto = new Siga_cat_familiaDTO();

$siga_cat_familiaDto->setId_Familia($Id_Familia);
$siga_cat_familiaDto->setId_Area($Id_Area);
$siga_cat_familiaDto->setDesc_Familia($Desc_Familia);
$siga_cat_familiaDto->setFech_Inser($Fech_Inser);
$siga_cat_familiaDto->setUsr_Inser($Usr_Inser);
$siga_cat_familiaDto->setFech_Mod($Fech_Mod);
$siga_cat_familiaDto->setUsr_Mod($Usr_Mod);
$siga_cat_familiaDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_Familia=="") ){
$siga_cat_familiaDto=$siga_cat_familiaFacade->insertSiga_cat_familia($siga_cat_familiaDto);
echo $siga_cat_familiaDto;
} else if(($accion=="guardar") && ($Id_Familia!="")){
$siga_cat_familiaDto=$siga_cat_familiaFacade->updateSiga_cat_familia($siga_cat_familiaDto);
echo $siga_cat_familiaDto;
} else if($accion=="consultar"){
$siga_cat_familiaDto=$siga_cat_familiaFacade->selectSiga_cat_familia($siga_cat_familiaDto);
echo $siga_cat_familiaDto;
} else if( ($accion=="baja") && ($Id_Familia!="") ){
$siga_cat_familiaDto=$siga_cat_familiaFacade->deleteSiga_cat_familia($siga_cat_familiaDto);
echo $siga_cat_familiaDto;
} else if( ($accion=="seleccionar") && ($Id_Familia!="") ){
$siga_cat_familiaDto=$siga_cat_familiaFacade->selectSiga_cat_familia($siga_cat_familiaDto);
echo $siga_cat_familiaDto;
}


?>