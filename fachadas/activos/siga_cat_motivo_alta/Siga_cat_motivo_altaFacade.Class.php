<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_motivo_alta/Siga_cat_motivo_altaDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_cat_motivo_alta/Siga_cat_motivo_altaController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_cat_motivo_altaFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_motivo_alta($Siga_cat_motivo_altaDto){
$Siga_cat_motivo_altaDto->setId_Motivo_Alta(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_motivo_altaDto->getId_Motivo_Alta(),"utf8"):strtoupper($Siga_cat_motivo_altaDto->getId_Motivo_Alta()))))));
if($this->esFecha($Siga_cat_motivo_altaDto->getId_Motivo_Alta())){
$Siga_cat_motivo_altaDto->setId_Motivo_Alta($this->fechaMysql($Siga_cat_motivo_altaDto->getId_Motivo_Alta()));
}
$Siga_cat_motivo_altaDto->setId_Area(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_motivo_altaDto->getId_Area(),"utf8"):strtoupper($Siga_cat_motivo_altaDto->getId_Area()))))));
if($this->esFecha($Siga_cat_motivo_altaDto->getId_Area())){
$Siga_cat_motivo_altaDto->setId_Area($this->fechaMysql($Siga_cat_motivo_altaDto->getId_Area()));
}
$Siga_cat_motivo_altaDto->setDesc_Motivo_Alta(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_motivo_altaDto->getDesc_Motivo_Alta(),"utf8"):strtoupper($Siga_cat_motivo_altaDto->getDesc_Motivo_Alta()))))));
if($this->esFecha($Siga_cat_motivo_altaDto->getDesc_Motivo_Alta())){
$Siga_cat_motivo_altaDto->setDesc_Motivo_Alta($this->fechaMysql($Siga_cat_motivo_altaDto->getDesc_Motivo_Alta()));
}
$Siga_cat_motivo_altaDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_motivo_altaDto->getFech_Inser(),"utf8"):strtoupper($Siga_cat_motivo_altaDto->getFech_Inser()))))));
if($this->esFecha($Siga_cat_motivo_altaDto->getFech_Inser())){
$Siga_cat_motivo_altaDto->setFech_Inser($this->fechaMysql($Siga_cat_motivo_altaDto->getFech_Inser()));
}
$Siga_cat_motivo_altaDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_motivo_altaDto->getUsr_Inser(),"utf8"):strtoupper($Siga_cat_motivo_altaDto->getUsr_Inser()))))));
if($this->esFecha($Siga_cat_motivo_altaDto->getUsr_Inser())){
$Siga_cat_motivo_altaDto->setUsr_Inser($this->fechaMysql($Siga_cat_motivo_altaDto->getUsr_Inser()));
}
$Siga_cat_motivo_altaDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_motivo_altaDto->getFech_Mod(),"utf8"):strtoupper($Siga_cat_motivo_altaDto->getFech_Mod()))))));
if($this->esFecha($Siga_cat_motivo_altaDto->getFech_Mod())){
$Siga_cat_motivo_altaDto->setFech_Mod($this->fechaMysql($Siga_cat_motivo_altaDto->getFech_Mod()));
}
$Siga_cat_motivo_altaDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_motivo_altaDto->getUsr_Mod(),"utf8"):strtoupper($Siga_cat_motivo_altaDto->getUsr_Mod()))))));
if($this->esFecha($Siga_cat_motivo_altaDto->getUsr_Mod())){
$Siga_cat_motivo_altaDto->setUsr_Mod($this->fechaMysql($Siga_cat_motivo_altaDto->getUsr_Mod()));
}
$Siga_cat_motivo_altaDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_motivo_altaDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_cat_motivo_altaDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_cat_motivo_altaDto->getEstatus_Reg())){
$Siga_cat_motivo_altaDto->setEstatus_Reg($this->fechaMysql($Siga_cat_motivo_altaDto->getEstatus_Reg()));
}
return $Siga_cat_motivo_altaDto;
}
public function selectSiga_cat_motivo_alta($Siga_cat_motivo_altaDto){
$Siga_cat_motivo_altaDto=$this->validarSiga_cat_motivo_alta($Siga_cat_motivo_altaDto);
$Siga_cat_motivo_altaController = new Siga_cat_motivo_altaController();
$Siga_cat_motivo_altaDto = $Siga_cat_motivo_altaController->selectSiga_cat_motivo_alta($Siga_cat_motivo_altaDto);
if($Siga_cat_motivo_altaDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_motivo_altaDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_cat_motivo_alta($Siga_cat_motivo_altaDto){
//$Siga_cat_motivo_altaDto=$this->validarSiga_cat_motivo_alta($Siga_cat_motivo_altaDto);
$Siga_cat_motivo_altaController = new Siga_cat_motivo_altaController();
$Siga_cat_motivo_altaDto = $Siga_cat_motivo_altaController->insertSiga_cat_motivo_alta($Siga_cat_motivo_altaDto);
if($Siga_cat_motivo_altaDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_motivo_altaDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_cat_motivo_alta($Siga_cat_motivo_altaDto){
//$Siga_cat_motivo_altaDto=$this->validarSiga_cat_motivo_alta($Siga_cat_motivo_altaDto);
$Siga_cat_motivo_altaController = new Siga_cat_motivo_altaController();
$Siga_cat_motivo_altaDto = $Siga_cat_motivo_altaController->updateSiga_cat_motivo_alta($Siga_cat_motivo_altaDto);
if($Siga_cat_motivo_altaDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_motivo_altaDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_cat_motivo_alta($Siga_cat_motivo_altaDto){
//$Siga_cat_motivo_altaDto=$this->validarSiga_cat_motivo_alta($Siga_cat_motivo_altaDto);
$Siga_cat_motivo_altaController = new Siga_cat_motivo_altaController();
$Siga_cat_motivo_altaDto = $Siga_cat_motivo_altaController->deleteSiga_cat_motivo_alta($Siga_cat_motivo_altaDto);
if($Siga_cat_motivo_altaDto==true){
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



@$Id_Motivo_Alta=$_POST["Id_Motivo_Alta"];
@$Id_Area=$_POST["Id_Area"];
@$Desc_Motivo_Alta=$_POST["Desc_Motivo_Alta"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];

$siga_cat_motivo_altaFacade = new Siga_cat_motivo_altaFacade();
$siga_cat_motivo_altaDto = new Siga_cat_motivo_altaDTO();

$siga_cat_motivo_altaDto->setId_Motivo_Alta($Id_Motivo_Alta);
$siga_cat_motivo_altaDto->setId_Area($Id_Area);
$siga_cat_motivo_altaDto->setDesc_Motivo_Alta($Desc_Motivo_Alta);
$siga_cat_motivo_altaDto->setFech_Inser($Fech_Inser);
$siga_cat_motivo_altaDto->setUsr_Inser($Usr_Inser);
$siga_cat_motivo_altaDto->setFech_Mod($Fech_Mod);
$siga_cat_motivo_altaDto->setUsr_Mod($Usr_Mod);
$siga_cat_motivo_altaDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_Motivo_Alta=="") ){
$siga_cat_motivo_altaDto=$siga_cat_motivo_altaFacade->insertSiga_cat_motivo_alta($siga_cat_motivo_altaDto);
echo $siga_cat_motivo_altaDto;
} else if(($accion=="guardar") && ($Id_Motivo_Alta!="")){
$siga_cat_motivo_altaDto=$siga_cat_motivo_altaFacade->updateSiga_cat_motivo_alta($siga_cat_motivo_altaDto);
echo $siga_cat_motivo_altaDto;
} else if($accion=="consultar"){
$siga_cat_motivo_altaDto=$siga_cat_motivo_altaFacade->selectSiga_cat_motivo_alta($siga_cat_motivo_altaDto);
echo $siga_cat_motivo_altaDto;
} else if( ($accion=="baja") && ($Id_Motivo_Alta!="") ){
$siga_cat_motivo_altaDto=$siga_cat_motivo_altaFacade->deleteSiga_cat_motivo_alta($siga_cat_motivo_altaDto);
echo $siga_cat_motivo_altaDto;
} else if( ($accion=="seleccionar") && ($Id_Motivo_Alta!="") ){
$siga_cat_motivo_altaDto=$siga_cat_motivo_altaFacade->selectSiga_cat_motivo_alta($siga_cat_motivo_altaDto);
echo $siga_cat_motivo_altaDto;
}


?>