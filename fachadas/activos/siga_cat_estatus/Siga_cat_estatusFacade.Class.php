<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_estatus/Siga_cat_estatusDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_cat_estatus/Siga_cat_estatusController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_cat_estatusFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_estatus($Siga_cat_estatusDto){
$Siga_cat_estatusDto->setId_Estatus(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_estatusDto->getId_Estatus(),"utf8"):strtoupper($Siga_cat_estatusDto->getId_Estatus()))))));
if($this->esFecha($Siga_cat_estatusDto->getId_Estatus())){
$Siga_cat_estatusDto->setId_Estatus($this->fechaMysql($Siga_cat_estatusDto->getId_Estatus()));
}
$Siga_cat_estatusDto->setId_Area(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_estatusDto->getId_Area(),"utf8"):strtoupper($Siga_cat_estatusDto->getId_Area()))))));
if($this->esFecha($Siga_cat_estatusDto->getId_Area())){
$Siga_cat_estatusDto->setId_Area($this->fechaMysql($Siga_cat_estatusDto->getId_Area()));
}
$Siga_cat_estatusDto->setDesc_Estatus(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_estatusDto->getDesc_Estatus(),"utf8"):strtoupper($Siga_cat_estatusDto->getDesc_Estatus()))))));
if($this->esFecha($Siga_cat_estatusDto->getDesc_Estatus())){
$Siga_cat_estatusDto->setDesc_Estatus($this->fechaMysql($Siga_cat_estatusDto->getDesc_Estatus()));
}
$Siga_cat_estatusDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_estatusDto->getFech_Inser(),"utf8"):strtoupper($Siga_cat_estatusDto->getFech_Inser()))))));
if($this->esFecha($Siga_cat_estatusDto->getFech_Inser())){
$Siga_cat_estatusDto->setFech_Inser($this->fechaMysql($Siga_cat_estatusDto->getFech_Inser()));
}
$Siga_cat_estatusDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_estatusDto->getUsr_Inser(),"utf8"):strtoupper($Siga_cat_estatusDto->getUsr_Inser()))))));
if($this->esFecha($Siga_cat_estatusDto->getUsr_Inser())){
$Siga_cat_estatusDto->setUsr_Inser($this->fechaMysql($Siga_cat_estatusDto->getUsr_Inser()));
}
$Siga_cat_estatusDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_estatusDto->getFech_Mod(),"utf8"):strtoupper($Siga_cat_estatusDto->getFech_Mod()))))));
if($this->esFecha($Siga_cat_estatusDto->getFech_Mod())){
$Siga_cat_estatusDto->setFech_Mod($this->fechaMysql($Siga_cat_estatusDto->getFech_Mod()));
}
$Siga_cat_estatusDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_estatusDto->getUsr_Mod(),"utf8"):strtoupper($Siga_cat_estatusDto->getUsr_Mod()))))));
if($this->esFecha($Siga_cat_estatusDto->getUsr_Mod())){
$Siga_cat_estatusDto->setUsr_Mod($this->fechaMysql($Siga_cat_estatusDto->getUsr_Mod()));
}
$Siga_cat_estatusDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_estatusDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_cat_estatusDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_cat_estatusDto->getEstatus_Reg())){
$Siga_cat_estatusDto->setEstatus_Reg($this->fechaMysql($Siga_cat_estatusDto->getEstatus_Reg()));
}
return $Siga_cat_estatusDto;
}
public function selectSiga_cat_estatus($Siga_cat_estatusDto){
$Siga_cat_estatusDto=$this->validarSiga_cat_estatus($Siga_cat_estatusDto);
$Siga_cat_estatusController = new Siga_cat_estatusController();
$Siga_cat_estatusDto = $Siga_cat_estatusController->selectSiga_cat_estatus($Siga_cat_estatusDto);
if($Siga_cat_estatusDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_estatusDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_cat_estatus($Siga_cat_estatusDto){
//$Siga_cat_estatusDto=$this->validarSiga_cat_estatus($Siga_cat_estatusDto);
$Siga_cat_estatusController = new Siga_cat_estatusController();
$Siga_cat_estatusDto = $Siga_cat_estatusController->insertSiga_cat_estatus($Siga_cat_estatusDto);
if($Siga_cat_estatusDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_estatusDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_cat_estatus($Siga_cat_estatusDto){
//$Siga_cat_estatusDto=$this->validarSiga_cat_estatus($Siga_cat_estatusDto);
$Siga_cat_estatusController = new Siga_cat_estatusController();
$Siga_cat_estatusDto = $Siga_cat_estatusController->updateSiga_cat_estatus($Siga_cat_estatusDto);
if($Siga_cat_estatusDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_estatusDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_cat_estatus($Siga_cat_estatusDto){
//$Siga_cat_estatusDto=$this->validarSiga_cat_estatus($Siga_cat_estatusDto);
$Siga_cat_estatusController = new Siga_cat_estatusController();
$Siga_cat_estatusDto = $Siga_cat_estatusController->deleteSiga_cat_estatus($Siga_cat_estatusDto);
if($Siga_cat_estatusDto==true){
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



@$Id_Estatus=$_POST["Id_Estatus"];
@$Id_Area=$_POST["Id_Area"];
@$Desc_Estatus=$_POST["Desc_Estatus"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$Solo_Juridico=$_POST["Solo_Juridico"];
@$accion=$_POST["accion"];

$siga_cat_estatusFacade = new Siga_cat_estatusFacade();
$siga_cat_estatusDto = new Siga_cat_estatusDTO();

$siga_cat_estatusDto->setId_Estatus($Id_Estatus);
$siga_cat_estatusDto->setId_Area($Id_Area);
$siga_cat_estatusDto->setDesc_Estatus($Desc_Estatus);
$siga_cat_estatusDto->setFech_Inser($Fech_Inser);
$siga_cat_estatusDto->setUsr_Inser($Usr_Inser);
$siga_cat_estatusDto->setFech_Mod($Fech_Mod);
$siga_cat_estatusDto->setUsr_Mod($Usr_Mod);
$siga_cat_estatusDto->setEstatus_Reg($Estatus_Reg);
$siga_cat_estatusDto->setSolo_Juridico($Solo_Juridico);

if( ($accion=="guardar") && ($Id_Estatus=="") ){
$siga_cat_estatusDto=$siga_cat_estatusFacade->insertSiga_cat_estatus($siga_cat_estatusDto);
echo $siga_cat_estatusDto;
} else if(($accion=="guardar") && ($Id_Estatus!="")){
$siga_cat_estatusDto=$siga_cat_estatusFacade->updateSiga_cat_estatus($siga_cat_estatusDto);
echo $siga_cat_estatusDto;
} else if($accion=="consultar"){
$siga_cat_estatusDto=$siga_cat_estatusFacade->selectSiga_cat_estatus($siga_cat_estatusDto);
echo $siga_cat_estatusDto;
} else if( ($accion=="baja") && ($Id_Estatus!="") ){
$siga_cat_estatusDto=$siga_cat_estatusFacade->deleteSiga_cat_estatus($siga_cat_estatusDto);
echo $siga_cat_estatusDto;
} else if( ($accion=="seleccionar") && ($Id_Estatus!="") ){
$siga_cat_estatusDto=$siga_cat_estatusFacade->selectSiga_cat_estatus($siga_cat_estatusDto);
echo $siga_cat_estatusDto;
}


?>