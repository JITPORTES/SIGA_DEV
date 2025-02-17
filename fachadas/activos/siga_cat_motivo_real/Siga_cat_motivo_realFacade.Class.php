<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_motivo_real/Siga_cat_motivo_realDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_cat_motivo_real/Siga_cat_motivo_realController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_cat_motivo_realFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_motivo_real($Siga_cat_motivo_realDto){
$Siga_cat_motivo_realDto->setId_Motivo_Real(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_motivo_realDto->getId_Motivo_Real(),"utf8"):strtoupper($Siga_cat_motivo_realDto->getId_Motivo_Real()))))));
if($this->esFecha($Siga_cat_motivo_realDto->getId_Motivo_Real())){
$Siga_cat_motivo_realDto->setId_Motivo_Real($this->fechaMysql($Siga_cat_motivo_realDto->getId_Motivo_Real()));
}
$Siga_cat_motivo_realDto->setId_Area(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_motivo_realDto->getId_Area(),"utf8"):strtoupper($Siga_cat_motivo_realDto->getId_Area()))))));
if($this->esFecha($Siga_cat_motivo_realDto->getId_Area())){
$Siga_cat_motivo_realDto->setId_Area($this->fechaMysql($Siga_cat_motivo_realDto->getId_Area()));
}
$Siga_cat_motivo_realDto->setDesc_Motivo_Real(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_motivo_realDto->getDesc_Motivo_Real(),"utf8"):strtoupper($Siga_cat_motivo_realDto->getDesc_Motivo_Real()))))));
if($this->esFecha($Siga_cat_motivo_realDto->getDesc_Motivo_Real())){
$Siga_cat_motivo_realDto->setDesc_Motivo_Real($this->fechaMysql($Siga_cat_motivo_realDto->getDesc_Motivo_Real()));
}
$Siga_cat_motivo_realDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_motivo_realDto->getFech_Inser(),"utf8"):strtoupper($Siga_cat_motivo_realDto->getFech_Inser()))))));
if($this->esFecha($Siga_cat_motivo_realDto->getFech_Inser())){
$Siga_cat_motivo_realDto->setFech_Inser($this->fechaMysql($Siga_cat_motivo_realDto->getFech_Inser()));
}
$Siga_cat_motivo_realDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_motivo_realDto->getUsr_Inser(),"utf8"):strtoupper($Siga_cat_motivo_realDto->getUsr_Inser()))))));
if($this->esFecha($Siga_cat_motivo_realDto->getUsr_Inser())){
$Siga_cat_motivo_realDto->setUsr_Inser($this->fechaMysql($Siga_cat_motivo_realDto->getUsr_Inser()));
}
$Siga_cat_motivo_realDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_motivo_realDto->getFech_Mod(),"utf8"):strtoupper($Siga_cat_motivo_realDto->getFech_Mod()))))));
if($this->esFecha($Siga_cat_motivo_realDto->getFech_Mod())){
$Siga_cat_motivo_realDto->setFech_Mod($this->fechaMysql($Siga_cat_motivo_realDto->getFech_Mod()));
}
$Siga_cat_motivo_realDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_motivo_realDto->getUsr_Mod(),"utf8"):strtoupper($Siga_cat_motivo_realDto->getUsr_Mod()))))));
if($this->esFecha($Siga_cat_motivo_realDto->getUsr_Mod())){
$Siga_cat_motivo_realDto->setUsr_Mod($this->fechaMysql($Siga_cat_motivo_realDto->getUsr_Mod()));
}
$Siga_cat_motivo_realDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_motivo_realDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_cat_motivo_realDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_cat_motivo_realDto->getEstatus_Reg())){
$Siga_cat_motivo_realDto->setEstatus_Reg($this->fechaMysql($Siga_cat_motivo_realDto->getEstatus_Reg()));
}
return $Siga_cat_motivo_realDto;
}
public function selectSiga_cat_motivo_real($Siga_cat_motivo_realDto){
$Siga_cat_motivo_realDto=$this->validarSiga_cat_motivo_real($Siga_cat_motivo_realDto);
$Siga_cat_motivo_realController = new Siga_cat_motivo_realController();
$Siga_cat_motivo_realDto = $Siga_cat_motivo_realController->selectSiga_cat_motivo_real($Siga_cat_motivo_realDto);
if($Siga_cat_motivo_realDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_motivo_realDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_cat_motivo_real($Siga_cat_motivo_realDto){
//$Siga_cat_motivo_realDto=$this->validarSiga_cat_motivo_real($Siga_cat_motivo_realDto);
$Siga_cat_motivo_realController = new Siga_cat_motivo_realController();
$Siga_cat_motivo_realDto = $Siga_cat_motivo_realController->insertSiga_cat_motivo_real($Siga_cat_motivo_realDto);
if($Siga_cat_motivo_realDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_motivo_realDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_cat_motivo_real($Siga_cat_motivo_realDto){
//$Siga_cat_motivo_realDto=$this->validarSiga_cat_motivo_real($Siga_cat_motivo_realDto);
$Siga_cat_motivo_realController = new Siga_cat_motivo_realController();
$Siga_cat_motivo_realDto = $Siga_cat_motivo_realController->updateSiga_cat_motivo_real($Siga_cat_motivo_realDto);
if($Siga_cat_motivo_realDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_motivo_realDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_cat_motivo_real($Siga_cat_motivo_realDto){
//$Siga_cat_motivo_realDto=$this->validarSiga_cat_motivo_real($Siga_cat_motivo_realDto);
$Siga_cat_motivo_realController = new Siga_cat_motivo_realController();
$Siga_cat_motivo_realDto = $Siga_cat_motivo_realController->deleteSiga_cat_motivo_real($Siga_cat_motivo_realDto);
if($Siga_cat_motivo_realDto==true){
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



@$Id_Motivo_Real=$_POST["Id_Motivo_Real"];
@$Id_Area=$_POST["Id_Area"];
@$Desc_Motivo_Real=$_POST["Desc_Motivo_Real"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];

$siga_cat_motivo_realFacade = new Siga_cat_motivo_realFacade();
$siga_cat_motivo_realDto = new Siga_cat_motivo_realDTO();

$siga_cat_motivo_realDto->setId_Motivo_Real($Id_Motivo_Real);
$siga_cat_motivo_realDto->setId_Area($Id_Area);
$siga_cat_motivo_realDto->setDesc_Motivo_Real($Desc_Motivo_Real);
$siga_cat_motivo_realDto->setFech_Inser($Fech_Inser);
$siga_cat_motivo_realDto->setUsr_Inser($Usr_Inser);
$siga_cat_motivo_realDto->setFech_Mod($Fech_Mod);
$siga_cat_motivo_realDto->setUsr_Mod($Usr_Mod);
$siga_cat_motivo_realDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_Motivo_Real=="") ){
$siga_cat_motivo_realDto=$siga_cat_motivo_realFacade->insertSiga_cat_motivo_real($siga_cat_motivo_realDto);
echo $siga_cat_motivo_realDto;
} else if(($accion=="guardar") && ($Id_Motivo_Real!="")){
$siga_cat_motivo_realDto=$siga_cat_motivo_realFacade->updateSiga_cat_motivo_real($siga_cat_motivo_realDto);
echo $siga_cat_motivo_realDto;
} else if($accion=="consultar"){
$siga_cat_motivo_realDto=$siga_cat_motivo_realFacade->selectSiga_cat_motivo_real($siga_cat_motivo_realDto);
echo $siga_cat_motivo_realDto;
} else if( ($accion=="baja") && ($Id_Motivo_Real!="") ){
$siga_cat_motivo_realDto=$siga_cat_motivo_realFacade->deleteSiga_cat_motivo_real($siga_cat_motivo_realDto);
echo $siga_cat_motivo_realDto;
} else if( ($accion=="seleccionar") && ($Id_Motivo_Real!="") ){
$siga_cat_motivo_realDto=$siga_cat_motivo_realFacade->selectSiga_cat_motivo_real($siga_cat_motivo_realDto);
echo $siga_cat_motivo_realDto;
}


?>