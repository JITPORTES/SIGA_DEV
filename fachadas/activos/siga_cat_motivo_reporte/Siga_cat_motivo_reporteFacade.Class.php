<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_motivo_reporte/Siga_cat_motivo_reporteDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_cat_motivo_reporte/Siga_cat_motivo_reporteController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_cat_motivo_reporteFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_motivo_reporte($Siga_cat_motivo_reporteDto){
$Siga_cat_motivo_reporteDto->setId_Motivo(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_motivo_reporteDto->getId_Motivo(),"utf8"):strtoupper($Siga_cat_motivo_reporteDto->getId_Motivo()))))));
if($this->esFecha($Siga_cat_motivo_reporteDto->getId_Motivo())){
$Siga_cat_motivo_reporteDto->setId_Motivo($this->fechaMysql($Siga_cat_motivo_reporteDto->getId_Motivo()));
}
$Siga_cat_motivo_reporteDto->setId_Area(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_motivo_reporteDto->getId_Area(),"utf8"):strtoupper($Siga_cat_motivo_reporteDto->getId_Area()))))));
if($this->esFecha($Siga_cat_motivo_reporteDto->getId_Area())){
$Siga_cat_motivo_reporteDto->setId_Area($this->fechaMysql($Siga_cat_motivo_reporteDto->getId_Area()));
}
$Siga_cat_motivo_reporteDto->setDesc_Motivo(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_motivo_reporteDto->getDesc_Motivo(),"utf8"):strtoupper($Siga_cat_motivo_reporteDto->getDesc_Motivo()))))));
if($this->esFecha($Siga_cat_motivo_reporteDto->getDesc_Motivo())){
$Siga_cat_motivo_reporteDto->setDesc_Motivo($this->fechaMysql($Siga_cat_motivo_reporteDto->getDesc_Motivo()));
}
$Siga_cat_motivo_reporteDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_motivo_reporteDto->getFech_Inser(),"utf8"):strtoupper($Siga_cat_motivo_reporteDto->getFech_Inser()))))));
if($this->esFecha($Siga_cat_motivo_reporteDto->getFech_Inser())){
$Siga_cat_motivo_reporteDto->setFech_Inser($this->fechaMysql($Siga_cat_motivo_reporteDto->getFech_Inser()));
}
$Siga_cat_motivo_reporteDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_motivo_reporteDto->getUsr_Inser(),"utf8"):strtoupper($Siga_cat_motivo_reporteDto->getUsr_Inser()))))));
if($this->esFecha($Siga_cat_motivo_reporteDto->getUsr_Inser())){
$Siga_cat_motivo_reporteDto->setUsr_Inser($this->fechaMysql($Siga_cat_motivo_reporteDto->getUsr_Inser()));
}
$Siga_cat_motivo_reporteDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_motivo_reporteDto->getFech_Mod(),"utf8"):strtoupper($Siga_cat_motivo_reporteDto->getFech_Mod()))))));
if($this->esFecha($Siga_cat_motivo_reporteDto->getFech_Mod())){
$Siga_cat_motivo_reporteDto->setFech_Mod($this->fechaMysql($Siga_cat_motivo_reporteDto->getFech_Mod()));
}
$Siga_cat_motivo_reporteDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_motivo_reporteDto->getUsr_Mod(),"utf8"):strtoupper($Siga_cat_motivo_reporteDto->getUsr_Mod()))))));
if($this->esFecha($Siga_cat_motivo_reporteDto->getUsr_Mod())){
$Siga_cat_motivo_reporteDto->setUsr_Mod($this->fechaMysql($Siga_cat_motivo_reporteDto->getUsr_Mod()));
}
$Siga_cat_motivo_reporteDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_motivo_reporteDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_cat_motivo_reporteDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_cat_motivo_reporteDto->getEstatus_Reg())){
$Siga_cat_motivo_reporteDto->setEstatus_Reg($this->fechaMysql($Siga_cat_motivo_reporteDto->getEstatus_Reg()));
}
return $Siga_cat_motivo_reporteDto;
}
public function selectSiga_cat_motivo_reporte($Siga_cat_motivo_reporteDto){
$Siga_cat_motivo_reporteDto=$this->validarSiga_cat_motivo_reporte($Siga_cat_motivo_reporteDto);
$Siga_cat_motivo_reporteController = new Siga_cat_motivo_reporteController();
$Siga_cat_motivo_reporteDto = $Siga_cat_motivo_reporteController->selectSiga_cat_motivo_reporte($Siga_cat_motivo_reporteDto);
if($Siga_cat_motivo_reporteDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_motivo_reporteDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_cat_motivo_reporte($Siga_cat_motivo_reporteDto){
//$Siga_cat_motivo_reporteDto=$this->validarSiga_cat_motivo_reporte($Siga_cat_motivo_reporteDto);
$Siga_cat_motivo_reporteController = new Siga_cat_motivo_reporteController();
$Siga_cat_motivo_reporteDto = $Siga_cat_motivo_reporteController->insertSiga_cat_motivo_reporte($Siga_cat_motivo_reporteDto);
if($Siga_cat_motivo_reporteDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_motivo_reporteDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_cat_motivo_reporte($Siga_cat_motivo_reporteDto){
//$Siga_cat_motivo_reporteDto=$this->validarSiga_cat_motivo_reporte($Siga_cat_motivo_reporteDto);
$Siga_cat_motivo_reporteController = new Siga_cat_motivo_reporteController();
$Siga_cat_motivo_reporteDto = $Siga_cat_motivo_reporteController->updateSiga_cat_motivo_reporte($Siga_cat_motivo_reporteDto);
if($Siga_cat_motivo_reporteDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_motivo_reporteDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_cat_motivo_reporte($Siga_cat_motivo_reporteDto){
//$Siga_cat_motivo_reporteDto=$this->validarSiga_cat_motivo_reporte($Siga_cat_motivo_reporteDto);
$Siga_cat_motivo_reporteController = new Siga_cat_motivo_reporteController();
$Siga_cat_motivo_reporteDto = $Siga_cat_motivo_reporteController->deleteSiga_cat_motivo_reporte($Siga_cat_motivo_reporteDto);
if($Siga_cat_motivo_reporteDto==true){
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



@$Id_Motivo=$_POST["Id_Motivo"];
@$Id_Area=$_POST["Id_Area"];
@$Desc_Motivo=$_POST["Desc_Motivo"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];

$siga_cat_motivo_reporteFacade = new Siga_cat_motivo_reporteFacade();
$siga_cat_motivo_reporteDto = new Siga_cat_motivo_reporteDTO();

$siga_cat_motivo_reporteDto->setId_Motivo($Id_Motivo);
$siga_cat_motivo_reporteDto->setId_Area($Id_Area);
$siga_cat_motivo_reporteDto->setDesc_Motivo($Desc_Motivo);
$siga_cat_motivo_reporteDto->setFech_Inser($Fech_Inser);
$siga_cat_motivo_reporteDto->setUsr_Inser($Usr_Inser);
$siga_cat_motivo_reporteDto->setFech_Mod($Fech_Mod);
$siga_cat_motivo_reporteDto->setUsr_Mod($Usr_Mod);
$siga_cat_motivo_reporteDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_Motivo=="") ){
$siga_cat_motivo_reporteDto=$siga_cat_motivo_reporteFacade->insertSiga_cat_motivo_reporte($siga_cat_motivo_reporteDto);
echo $siga_cat_motivo_reporteDto;
} else if(($accion=="guardar") && ($Id_Motivo!="")){
$siga_cat_motivo_reporteDto=$siga_cat_motivo_reporteFacade->updateSiga_cat_motivo_reporte($siga_cat_motivo_reporteDto);
echo $siga_cat_motivo_reporteDto;
} else if($accion=="consultar"){
$siga_cat_motivo_reporteDto=$siga_cat_motivo_reporteFacade->selectSiga_cat_motivo_reporte($siga_cat_motivo_reporteDto);
echo $siga_cat_motivo_reporteDto;
} else if( ($accion=="baja") && ($Id_Motivo!="") ){
$siga_cat_motivo_reporteDto=$siga_cat_motivo_reporteFacade->deleteSiga_cat_motivo_reporte($siga_cat_motivo_reporteDto);
echo $siga_cat_motivo_reporteDto;
} else if( ($accion=="seleccionar") && ($Id_Motivo!="") ){
$siga_cat_motivo_reporteDto=$siga_cat_motivo_reporteFacade->selectSiga_cat_motivo_reporte($siga_cat_motivo_reporteDto);
echo $siga_cat_motivo_reporteDto;
}


?>