<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_frecuencia/Siga_cat_frecuenciaDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_cat_frecuencia/Siga_cat_frecuenciaController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_cat_frecuenciaFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_frecuencia($Siga_cat_frecuenciaDto){
$Siga_cat_frecuenciaDto->setId_Frecuencia(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_frecuenciaDto->getId_Frecuencia(),"utf8"):strtoupper($Siga_cat_frecuenciaDto->getId_Frecuencia()))))));
if($this->esFecha($Siga_cat_frecuenciaDto->getId_Frecuencia())){
$Siga_cat_frecuenciaDto->setId_Frecuencia($this->fechaMysql($Siga_cat_frecuenciaDto->getId_Frecuencia()));
}
$Siga_cat_frecuenciaDto->setId_Area(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_frecuenciaDto->getId_Area(),"utf8"):strtoupper($Siga_cat_frecuenciaDto->getId_Area()))))));
if($this->esFecha($Siga_cat_frecuenciaDto->getId_Area())){
$Siga_cat_frecuenciaDto->setId_Area($this->fechaMysql($Siga_cat_frecuenciaDto->getId_Area()));
}
$Siga_cat_frecuenciaDto->setDesc_Frecuencia(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_frecuenciaDto->getDesc_Frecuencia(),"utf8"):strtoupper($Siga_cat_frecuenciaDto->getDesc_Frecuencia()))))));
if($this->esFecha($Siga_cat_frecuenciaDto->getDesc_Frecuencia())){
$Siga_cat_frecuenciaDto->setDesc_Frecuencia($this->fechaMysql($Siga_cat_frecuenciaDto->getDesc_Frecuencia()));
}
$Siga_cat_frecuenciaDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_frecuenciaDto->getFech_Inser(),"utf8"):strtoupper($Siga_cat_frecuenciaDto->getFech_Inser()))))));
if($this->esFecha($Siga_cat_frecuenciaDto->getFech_Inser())){
$Siga_cat_frecuenciaDto->setFech_Inser($this->fechaMysql($Siga_cat_frecuenciaDto->getFech_Inser()));
}
$Siga_cat_frecuenciaDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_frecuenciaDto->getUsr_Inser(),"utf8"):strtoupper($Siga_cat_frecuenciaDto->getUsr_Inser()))))));
if($this->esFecha($Siga_cat_frecuenciaDto->getUsr_Inser())){
$Siga_cat_frecuenciaDto->setUsr_Inser($this->fechaMysql($Siga_cat_frecuenciaDto->getUsr_Inser()));
}
$Siga_cat_frecuenciaDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_frecuenciaDto->getFech_Mod(),"utf8"):strtoupper($Siga_cat_frecuenciaDto->getFech_Mod()))))));
if($this->esFecha($Siga_cat_frecuenciaDto->getFech_Mod())){
$Siga_cat_frecuenciaDto->setFech_Mod($this->fechaMysql($Siga_cat_frecuenciaDto->getFech_Mod()));
}
$Siga_cat_frecuenciaDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_frecuenciaDto->getUsr_Mod(),"utf8"):strtoupper($Siga_cat_frecuenciaDto->getUsr_Mod()))))));
if($this->esFecha($Siga_cat_frecuenciaDto->getUsr_Mod())){
$Siga_cat_frecuenciaDto->setUsr_Mod($this->fechaMysql($Siga_cat_frecuenciaDto->getUsr_Mod()));
}
$Siga_cat_frecuenciaDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_frecuenciaDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_cat_frecuenciaDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_cat_frecuenciaDto->getEstatus_Reg())){
$Siga_cat_frecuenciaDto->setEstatus_Reg($this->fechaMysql($Siga_cat_frecuenciaDto->getEstatus_Reg()));
}
return $Siga_cat_frecuenciaDto;
}
public function selectSiga_cat_frecuencia($Siga_cat_frecuenciaDto){
$Siga_cat_frecuenciaDto=$this->validarSiga_cat_frecuencia($Siga_cat_frecuenciaDto);
$Siga_cat_frecuenciaController = new Siga_cat_frecuenciaController();
$Siga_cat_frecuenciaDto = $Siga_cat_frecuenciaController->selectSiga_cat_frecuencia($Siga_cat_frecuenciaDto);
if($Siga_cat_frecuenciaDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_frecuenciaDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_cat_frecuencia($Siga_cat_frecuenciaDto){
//$Siga_cat_frecuenciaDto=$this->validarSiga_cat_frecuencia($Siga_cat_frecuenciaDto);
$Siga_cat_frecuenciaController = new Siga_cat_frecuenciaController();
$Siga_cat_frecuenciaDto = $Siga_cat_frecuenciaController->insertSiga_cat_frecuencia($Siga_cat_frecuenciaDto);
if($Siga_cat_frecuenciaDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_frecuenciaDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_cat_frecuencia($Siga_cat_frecuenciaDto){
//$Siga_cat_frecuenciaDto=$this->validarSiga_cat_frecuencia($Siga_cat_frecuenciaDto);
$Siga_cat_frecuenciaController = new Siga_cat_frecuenciaController();
$Siga_cat_frecuenciaDto = $Siga_cat_frecuenciaController->updateSiga_cat_frecuencia($Siga_cat_frecuenciaDto);
if($Siga_cat_frecuenciaDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_frecuenciaDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_cat_frecuencia($Siga_cat_frecuenciaDto){
//$Siga_cat_frecuenciaDto=$this->validarSiga_cat_frecuencia($Siga_cat_frecuenciaDto);
$Siga_cat_frecuenciaController = new Siga_cat_frecuenciaController();
$Siga_cat_frecuenciaDto = $Siga_cat_frecuenciaController->deleteSiga_cat_frecuencia($Siga_cat_frecuenciaDto);
if($Siga_cat_frecuenciaDto==true){
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



@$Id_Frecuencia=$_POST["Id_Frecuencia"];
@$Id_Area=$_POST["Id_Area"];
@$Desc_Frecuencia=$_POST["Desc_Frecuencia"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];

$siga_cat_frecuenciaFacade = new Siga_cat_frecuenciaFacade();
$siga_cat_frecuenciaDto = new Siga_cat_frecuenciaDTO();

$siga_cat_frecuenciaDto->setId_Frecuencia($Id_Frecuencia);
$siga_cat_frecuenciaDto->setId_Area($Id_Area);
$siga_cat_frecuenciaDto->setDesc_Frecuencia($Desc_Frecuencia);
$siga_cat_frecuenciaDto->setFech_Inser($Fech_Inser);
$siga_cat_frecuenciaDto->setUsr_Inser($Usr_Inser);
$siga_cat_frecuenciaDto->setFech_Mod($Fech_Mod);
$siga_cat_frecuenciaDto->setUsr_Mod($Usr_Mod);
$siga_cat_frecuenciaDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_Frecuencia=="") ){
$siga_cat_frecuenciaDto=$siga_cat_frecuenciaFacade->insertSiga_cat_frecuencia($siga_cat_frecuenciaDto);
echo $siga_cat_frecuenciaDto;
} else if(($accion=="guardar") && ($Id_Frecuencia!="")){
$siga_cat_frecuenciaDto=$siga_cat_frecuenciaFacade->updateSiga_cat_frecuencia($siga_cat_frecuenciaDto);
echo $siga_cat_frecuenciaDto;
} else if($accion=="consultar"){
$siga_cat_frecuenciaDto=$siga_cat_frecuenciaFacade->selectSiga_cat_frecuencia($siga_cat_frecuenciaDto);
echo $siga_cat_frecuenciaDto;
} else if( ($accion=="baja") && ($Id_Frecuencia!="") ){
$siga_cat_frecuenciaDto=$siga_cat_frecuenciaFacade->deleteSiga_cat_frecuencia($siga_cat_frecuenciaDto);
echo $siga_cat_frecuenciaDto;
} else if( ($accion=="seleccionar") && ($Id_Frecuencia!="") ){
$siga_cat_frecuenciaDto=$siga_cat_frecuenciaFacade->selectSiga_cat_frecuencia($siga_cat_frecuenciaDto);
echo $siga_cat_frecuenciaDto;
}


?>