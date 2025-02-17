<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_clase/Siga_cat_claseDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_cat_clase/Siga_cat_claseController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_cat_claseFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_clase($Siga_cat_claseDto){
$Siga_cat_claseDto->setId_Clase(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_claseDto->getId_Clase(),"utf8"):strtoupper($Siga_cat_claseDto->getId_Clase()))))));
if($this->esFecha($Siga_cat_claseDto->getId_Clase())){
$Siga_cat_claseDto->setId_Clase($this->fechaMysql($Siga_cat_claseDto->getId_Clase()));
}
$Siga_cat_claseDto->setId_Area(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_claseDto->getId_Area(),"utf8"):strtoupper($Siga_cat_claseDto->getId_Area()))))));
if($this->esFecha($Siga_cat_claseDto->getId_Area())){
$Siga_cat_claseDto->setId_Area($this->fechaMysql($Siga_cat_claseDto->getId_Area()));
}
$Siga_cat_claseDto->setDesc_Clase(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_claseDto->getDesc_Clase(),"utf8"):strtoupper($Siga_cat_claseDto->getDesc_Clase()))))));
if($this->esFecha($Siga_cat_claseDto->getDesc_Clase())){
$Siga_cat_claseDto->setDesc_Clase($this->fechaMysql($Siga_cat_claseDto->getDesc_Clase()));
}
$Siga_cat_claseDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_claseDto->getFech_Inser(),"utf8"):strtoupper($Siga_cat_claseDto->getFech_Inser()))))));
if($this->esFecha($Siga_cat_claseDto->getFech_Inser())){
$Siga_cat_claseDto->setFech_Inser($this->fechaMysql($Siga_cat_claseDto->getFech_Inser()));
}
$Siga_cat_claseDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_claseDto->getUsr_Inser(),"utf8"):strtoupper($Siga_cat_claseDto->getUsr_Inser()))))));
if($this->esFecha($Siga_cat_claseDto->getUsr_Inser())){
$Siga_cat_claseDto->setUsr_Inser($this->fechaMysql($Siga_cat_claseDto->getUsr_Inser()));
}
$Siga_cat_claseDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_claseDto->getFech_Mod(),"utf8"):strtoupper($Siga_cat_claseDto->getFech_Mod()))))));
if($this->esFecha($Siga_cat_claseDto->getFech_Mod())){
$Siga_cat_claseDto->setFech_Mod($this->fechaMysql($Siga_cat_claseDto->getFech_Mod()));
}
$Siga_cat_claseDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_claseDto->getUsr_Mod(),"utf8"):strtoupper($Siga_cat_claseDto->getUsr_Mod()))))));
if($this->esFecha($Siga_cat_claseDto->getUsr_Mod())){
$Siga_cat_claseDto->setUsr_Mod($this->fechaMysql($Siga_cat_claseDto->getUsr_Mod()));
}
$Siga_cat_claseDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_claseDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_cat_claseDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_cat_claseDto->getEstatus_Reg())){
$Siga_cat_claseDto->setEstatus_Reg($this->fechaMysql($Siga_cat_claseDto->getEstatus_Reg()));
}
return $Siga_cat_claseDto;
}
public function selectSiga_cat_clase($Siga_cat_claseDto){
$Siga_cat_claseDto=$this->validarSiga_cat_clase($Siga_cat_claseDto);
$Siga_cat_claseController = new Siga_cat_claseController();
$Siga_cat_claseDto = $Siga_cat_claseController->selectSiga_cat_clase($Siga_cat_claseDto);
if($Siga_cat_claseDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_claseDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_cat_clase($Siga_cat_claseDto){
//$Siga_cat_claseDto=$this->validarSiga_cat_clase($Siga_cat_claseDto);
$Siga_cat_claseController = new Siga_cat_claseController();
$Siga_cat_claseDto = $Siga_cat_claseController->insertSiga_cat_clase($Siga_cat_claseDto);
if($Siga_cat_claseDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_claseDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_cat_clase($Siga_cat_claseDto){
//$Siga_cat_claseDto=$this->validarSiga_cat_clase($Siga_cat_claseDto);
$Siga_cat_claseController = new Siga_cat_claseController();
$Siga_cat_claseDto = $Siga_cat_claseController->updateSiga_cat_clase($Siga_cat_claseDto);
if($Siga_cat_claseDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_claseDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_cat_clase($Siga_cat_claseDto){
//$Siga_cat_claseDto=$this->validarSiga_cat_clase($Siga_cat_claseDto);
$Siga_cat_claseController = new Siga_cat_claseController();
$Siga_cat_claseDto = $Siga_cat_claseController->deleteSiga_cat_clase($Siga_cat_claseDto);
if($Siga_cat_claseDto==true){
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



@$Id_Clase=$_POST["Id_Clase"];
@$Id_Area=$_POST["Id_Area"];
@$Desc_Clase=$_POST["Desc_Clase"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];

$siga_cat_claseFacade = new Siga_cat_claseFacade();
$siga_cat_claseDto = new Siga_cat_claseDTO();

$siga_cat_claseDto->setId_Clase($Id_Clase);
$siga_cat_claseDto->setId_Area($Id_Area);
$siga_cat_claseDto->setDesc_Clase($Desc_Clase);
$siga_cat_claseDto->setFech_Inser($Fech_Inser);
$siga_cat_claseDto->setUsr_Inser($Usr_Inser);
$siga_cat_claseDto->setFech_Mod($Fech_Mod);
$siga_cat_claseDto->setUsr_Mod($Usr_Mod);
$siga_cat_claseDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_Clase=="") ){
$siga_cat_claseDto=$siga_cat_claseFacade->insertSiga_cat_clase($siga_cat_claseDto);
echo $siga_cat_claseDto;
} else if(($accion=="guardar") && ($Id_Clase!="")){
$siga_cat_claseDto=$siga_cat_claseFacade->updateSiga_cat_clase($siga_cat_claseDto);
echo $siga_cat_claseDto;
} else if($accion=="consultar"){
$siga_cat_claseDto=$siga_cat_claseFacade->selectSiga_cat_clase($siga_cat_claseDto);
echo $siga_cat_claseDto;
} else if( ($accion=="baja") && ($Id_Clase!="") ){
$siga_cat_claseDto=$siga_cat_claseFacade->deleteSiga_cat_clase($siga_cat_claseDto);
echo $siga_cat_claseDto;
} else if( ($accion=="seleccionar") && ($Id_Clase!="") ){
$siga_cat_claseDto=$siga_cat_claseFacade->selectSiga_cat_clase($siga_cat_claseDto);
echo $siga_cat_claseDto;
}


?>