<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_motivo_cance/Siga_cat_motivo_canceDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_cat_motivo_cance/Siga_cat_motivo_canceController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_cat_motivo_canceFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_motivo_cance($Siga_cat_motivo_canceDto){
$Siga_cat_motivo_canceDto->setId_Mot_Cancelacion(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_motivo_canceDto->getId_Mot_Cancelacion(),"utf8"):strtoupper($Siga_cat_motivo_canceDto->getId_Mot_Cancelacion()))))));
if($this->esFecha($Siga_cat_motivo_canceDto->getId_Mot_Cancelacion())){
$Siga_cat_motivo_canceDto->setId_Mot_Cancelacion($this->fechaMysql($Siga_cat_motivo_canceDto->getId_Mot_Cancelacion()));
}
$Siga_cat_motivo_canceDto->setId_Area(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_motivo_canceDto->getId_Area(),"utf8"):strtoupper($Siga_cat_motivo_canceDto->getId_Area()))))));
if($this->esFecha($Siga_cat_motivo_canceDto->getId_Area())){
$Siga_cat_motivo_canceDto->setId_Area($this->fechaMysql($Siga_cat_motivo_canceDto->getId_Area()));
}
$Siga_cat_motivo_canceDto->setDesc_Motivo_Cancel(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_motivo_canceDto->getDesc_Motivo_Cancel(),"utf8"):strtoupper($Siga_cat_motivo_canceDto->getDesc_Motivo_Cancel()))))));
if($this->esFecha($Siga_cat_motivo_canceDto->getDesc_Motivo_Cancel())){
$Siga_cat_motivo_canceDto->setDesc_Motivo_Cancel($this->fechaMysql($Siga_cat_motivo_canceDto->getDesc_Motivo_Cancel()));
}
$Siga_cat_motivo_canceDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_motivo_canceDto->getFech_Inser(),"utf8"):strtoupper($Siga_cat_motivo_canceDto->getFech_Inser()))))));
if($this->esFecha($Siga_cat_motivo_canceDto->getFech_Inser())){
$Siga_cat_motivo_canceDto->setFech_Inser($this->fechaMysql($Siga_cat_motivo_canceDto->getFech_Inser()));
}
$Siga_cat_motivo_canceDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_motivo_canceDto->getUsr_Inser(),"utf8"):strtoupper($Siga_cat_motivo_canceDto->getUsr_Inser()))))));
if($this->esFecha($Siga_cat_motivo_canceDto->getUsr_Inser())){
$Siga_cat_motivo_canceDto->setUsr_Inser($this->fechaMysql($Siga_cat_motivo_canceDto->getUsr_Inser()));
}
$Siga_cat_motivo_canceDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_motivo_canceDto->getFech_Mod(),"utf8"):strtoupper($Siga_cat_motivo_canceDto->getFech_Mod()))))));
if($this->esFecha($Siga_cat_motivo_canceDto->getFech_Mod())){
$Siga_cat_motivo_canceDto->setFech_Mod($this->fechaMysql($Siga_cat_motivo_canceDto->getFech_Mod()));
}
$Siga_cat_motivo_canceDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_motivo_canceDto->getUsr_Mod(),"utf8"):strtoupper($Siga_cat_motivo_canceDto->getUsr_Mod()))))));
if($this->esFecha($Siga_cat_motivo_canceDto->getUsr_Mod())){
$Siga_cat_motivo_canceDto->setUsr_Mod($this->fechaMysql($Siga_cat_motivo_canceDto->getUsr_Mod()));
}
$Siga_cat_motivo_canceDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_motivo_canceDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_cat_motivo_canceDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_cat_motivo_canceDto->getEstatus_Reg())){
$Siga_cat_motivo_canceDto->setEstatus_Reg($this->fechaMysql($Siga_cat_motivo_canceDto->getEstatus_Reg()));
}
return $Siga_cat_motivo_canceDto;
}
public function selectSiga_cat_motivo_cance($Siga_cat_motivo_canceDto){
$Siga_cat_motivo_canceDto=$this->validarSiga_cat_motivo_cance($Siga_cat_motivo_canceDto);
$Siga_cat_motivo_canceController = new Siga_cat_motivo_canceController();
$Siga_cat_motivo_canceDto = $Siga_cat_motivo_canceController->selectSiga_cat_motivo_cance($Siga_cat_motivo_canceDto);
if($Siga_cat_motivo_canceDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_motivo_canceDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_cat_motivo_cance($Siga_cat_motivo_canceDto){
//$Siga_cat_motivo_canceDto=$this->validarSiga_cat_motivo_cance($Siga_cat_motivo_canceDto);
$Siga_cat_motivo_canceController = new Siga_cat_motivo_canceController();
$Siga_cat_motivo_canceDto = $Siga_cat_motivo_canceController->insertSiga_cat_motivo_cance($Siga_cat_motivo_canceDto);
if($Siga_cat_motivo_canceDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_motivo_canceDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_cat_motivo_cance($Siga_cat_motivo_canceDto){
//$Siga_cat_motivo_canceDto=$this->validarSiga_cat_motivo_cance($Siga_cat_motivo_canceDto);
$Siga_cat_motivo_canceController = new Siga_cat_motivo_canceController();
$Siga_cat_motivo_canceDto = $Siga_cat_motivo_canceController->updateSiga_cat_motivo_cance($Siga_cat_motivo_canceDto);
if($Siga_cat_motivo_canceDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_motivo_canceDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_cat_motivo_cance($Siga_cat_motivo_canceDto){
$Siga_cat_motivo_canceDto=$this->validarSiga_cat_motivo_cance($Siga_cat_motivo_canceDto);
$Siga_cat_motivo_canceController = new Siga_cat_motivo_canceController();
$Siga_cat_motivo_canceDto = $Siga_cat_motivo_canceController->deleteSiga_cat_motivo_cance($Siga_cat_motivo_canceDto);
if($Siga_cat_motivo_canceDto==true){
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



@$Id_Mot_Cancelacion=$_POST["Id_Mot_Cancelacion"];
@$Id_Area=$_POST["Id_Area"];
@$Desc_Motivo_Cancel=$_POST["Desc_Motivo_Cancel"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];

$siga_cat_motivo_canceFacade = new Siga_cat_motivo_canceFacade();
$siga_cat_motivo_canceDto = new Siga_cat_motivo_canceDTO();

$siga_cat_motivo_canceDto->setId_Mot_Cancelacion($Id_Mot_Cancelacion);
$siga_cat_motivo_canceDto->setId_Area($Id_Area);
$siga_cat_motivo_canceDto->setDesc_Motivo_Cancel($Desc_Motivo_Cancel);
$siga_cat_motivo_canceDto->setFech_Inser($Fech_Inser);
$siga_cat_motivo_canceDto->setUsr_Inser($Usr_Inser);
$siga_cat_motivo_canceDto->setFech_Mod($Fech_Mod);
$siga_cat_motivo_canceDto->setUsr_Mod($Usr_Mod);
$siga_cat_motivo_canceDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_Mot_Cancelacion=="") ){
$siga_cat_motivo_canceDto=$siga_cat_motivo_canceFacade->insertSiga_cat_motivo_cance($siga_cat_motivo_canceDto);
echo $siga_cat_motivo_canceDto;
} else if(($accion=="guardar") && ($Id_Mot_Cancelacion!="")){
$siga_cat_motivo_canceDto=$siga_cat_motivo_canceFacade->updateSiga_cat_motivo_cance($siga_cat_motivo_canceDto);
echo $siga_cat_motivo_canceDto;
} else if($accion=="consultar"){
$siga_cat_motivo_canceDto=$siga_cat_motivo_canceFacade->selectSiga_cat_motivo_cance($siga_cat_motivo_canceDto);
echo $siga_cat_motivo_canceDto;
} else if( ($accion=="baja") && ($Id_Mot_Cancelacion!="") ){
$siga_cat_motivo_canceDto=$siga_cat_motivo_canceFacade->deleteSiga_cat_motivo_cance($siga_cat_motivo_canceDto);
echo $siga_cat_motivo_canceDto;
} else if( ($accion=="seleccionar") && ($Id_Mot_Cancelacion!="") ){
$siga_cat_motivo_canceDto=$siga_cat_motivo_canceFacade->selectSiga_cat_motivo_cance($siga_cat_motivo_canceDto);
echo $siga_cat_motivo_canceDto;
}


?>