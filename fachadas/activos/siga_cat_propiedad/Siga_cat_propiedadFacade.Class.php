<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_propiedad/Siga_cat_propiedadDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_cat_propiedad/Siga_cat_propiedadController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_cat_propiedadFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_propiedad($Siga_cat_propiedadDto){
$Siga_cat_propiedadDto->setId_Propiedad(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_propiedadDto->getId_Propiedad(),"utf8"):strtoupper($Siga_cat_propiedadDto->getId_Propiedad()))))));
if($this->esFecha($Siga_cat_propiedadDto->getId_Propiedad())){
$Siga_cat_propiedadDto->setId_Propiedad($this->fechaMysql($Siga_cat_propiedadDto->getId_Propiedad()));
}
$Siga_cat_propiedadDto->setId_Area(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_propiedadDto->getId_Area(),"utf8"):strtoupper($Siga_cat_propiedadDto->getId_Area()))))));
if($this->esFecha($Siga_cat_propiedadDto->getId_Area())){
$Siga_cat_propiedadDto->setId_Area($this->fechaMysql($Siga_cat_propiedadDto->getId_Area()));
}
$Siga_cat_propiedadDto->setDesc_Propiedad(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_propiedadDto->getDesc_Propiedad(),"utf8"):strtoupper($Siga_cat_propiedadDto->getDesc_Propiedad()))))));
if($this->esFecha($Siga_cat_propiedadDto->getDesc_Propiedad())){
$Siga_cat_propiedadDto->setDesc_Propiedad($this->fechaMysql($Siga_cat_propiedadDto->getDesc_Propiedad()));
}
$Siga_cat_propiedadDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_propiedadDto->getFech_Inser(),"utf8"):strtoupper($Siga_cat_propiedadDto->getFech_Inser()))))));
if($this->esFecha($Siga_cat_propiedadDto->getFech_Inser())){
$Siga_cat_propiedadDto->setFech_Inser($this->fechaMysql($Siga_cat_propiedadDto->getFech_Inser()));
}
$Siga_cat_propiedadDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_propiedadDto->getUsr_Inser(),"utf8"):strtoupper($Siga_cat_propiedadDto->getUsr_Inser()))))));
if($this->esFecha($Siga_cat_propiedadDto->getUsr_Inser())){
$Siga_cat_propiedadDto->setUsr_Inser($this->fechaMysql($Siga_cat_propiedadDto->getUsr_Inser()));
}
$Siga_cat_propiedadDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_propiedadDto->getFech_Mod(),"utf8"):strtoupper($Siga_cat_propiedadDto->getFech_Mod()))))));
if($this->esFecha($Siga_cat_propiedadDto->getFech_Mod())){
$Siga_cat_propiedadDto->setFech_Mod($this->fechaMysql($Siga_cat_propiedadDto->getFech_Mod()));
}
$Siga_cat_propiedadDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_propiedadDto->getUsr_Mod(),"utf8"):strtoupper($Siga_cat_propiedadDto->getUsr_Mod()))))));
if($this->esFecha($Siga_cat_propiedadDto->getUsr_Mod())){
$Siga_cat_propiedadDto->setUsr_Mod($this->fechaMysql($Siga_cat_propiedadDto->getUsr_Mod()));
}
$Siga_cat_propiedadDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_propiedadDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_cat_propiedadDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_cat_propiedadDto->getEstatus_Reg())){
$Siga_cat_propiedadDto->setEstatus_Reg($this->fechaMysql($Siga_cat_propiedadDto->getEstatus_Reg()));
}
return $Siga_cat_propiedadDto;
}
public function selectSiga_cat_propiedad($Siga_cat_propiedadDto){
$Siga_cat_propiedadDto=$this->validarSiga_cat_propiedad($Siga_cat_propiedadDto);
$Siga_cat_propiedadController = new Siga_cat_propiedadController();
$Siga_cat_propiedadDto = $Siga_cat_propiedadController->selectSiga_cat_propiedad($Siga_cat_propiedadDto);
if($Siga_cat_propiedadDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_propiedadDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_cat_propiedad($Siga_cat_propiedadDto){
//$Siga_cat_propiedadDto=$this->validarSiga_cat_propiedad($Siga_cat_propiedadDto);
$Siga_cat_propiedadController = new Siga_cat_propiedadController();
$Siga_cat_propiedadDto = $Siga_cat_propiedadController->insertSiga_cat_propiedad($Siga_cat_propiedadDto);
if($Siga_cat_propiedadDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_propiedadDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_cat_propiedad($Siga_cat_propiedadDto){
//$Siga_cat_propiedadDto=$this->validarSiga_cat_propiedad($Siga_cat_propiedadDto);
$Siga_cat_propiedadController = new Siga_cat_propiedadController();
$Siga_cat_propiedadDto = $Siga_cat_propiedadController->updateSiga_cat_propiedad($Siga_cat_propiedadDto);
if($Siga_cat_propiedadDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_propiedadDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_cat_propiedad($Siga_cat_propiedadDto){
//$Siga_cat_propiedadDto=$this->validarSiga_cat_propiedad($Siga_cat_propiedadDto);
$Siga_cat_propiedadController = new Siga_cat_propiedadController();
$Siga_cat_propiedadDto = $Siga_cat_propiedadController->deleteSiga_cat_propiedad($Siga_cat_propiedadDto);
if($Siga_cat_propiedadDto==true){
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



@$Id_Propiedad=$_POST["Id_Propiedad"];
@$Id_Area=$_POST["Id_Area"];
@$Desc_Propiedad=$_POST["Desc_Propiedad"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];

$siga_cat_propiedadFacade = new Siga_cat_propiedadFacade();
$siga_cat_propiedadDto = new Siga_cat_propiedadDTO();

$siga_cat_propiedadDto->setId_Propiedad($Id_Propiedad);
$siga_cat_propiedadDto->setId_Area($Id_Area);
$siga_cat_propiedadDto->setDesc_Propiedad($Desc_Propiedad);
$siga_cat_propiedadDto->setFech_Inser($Fech_Inser);
$siga_cat_propiedadDto->setUsr_Inser($Usr_Inser);
$siga_cat_propiedadDto->setFech_Mod($Fech_Mod);
$siga_cat_propiedadDto->setUsr_Mod($Usr_Mod);
$siga_cat_propiedadDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_Propiedad=="") ){
$siga_cat_propiedadDto=$siga_cat_propiedadFacade->insertSiga_cat_propiedad($siga_cat_propiedadDto);
echo $siga_cat_propiedadDto;
} else if(($accion=="guardar") && ($Id_Propiedad!="")){
$siga_cat_propiedadDto=$siga_cat_propiedadFacade->updateSiga_cat_propiedad($siga_cat_propiedadDto);
echo $siga_cat_propiedadDto;
} else if($accion=="consultar"){
$siga_cat_propiedadDto=$siga_cat_propiedadFacade->selectSiga_cat_propiedad($siga_cat_propiedadDto);
echo $siga_cat_propiedadDto;
} else if( ($accion=="baja") && ($Id_Propiedad!="") ){
$siga_cat_propiedadDto=$siga_cat_propiedadFacade->deleteSiga_cat_propiedad($siga_cat_propiedadDto);
echo $siga_cat_propiedadDto;
} else if( ($accion=="seleccionar") && ($Id_Propiedad!="") ){
$siga_cat_propiedadDto=$siga_cat_propiedadFacade->selectSiga_cat_propiedad($siga_cat_propiedadDto);
echo $siga_cat_propiedadDto;
}


?>