<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_cuenta_reubicacion/Siga_cat_cuenta_reubicacionDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_cat_cuenta_reubicacion/Siga_cat_cuenta_reubicacionController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_cat_cuenta_reubicacionFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_cuenta_reubicacion($Siga_cat_cuenta_reubicacionDto){
$Siga_cat_cuenta_reubicacionDto->setId_Cuenta_reubicacion(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_cuenta_reubicacionDto->getId_Cuenta_reubicacion(),"utf8"):strtoupper($Siga_cat_cuenta_reubicacionDto->getId_Cuenta_reubicacion()))))));
if($this->esFecha($Siga_cat_cuenta_reubicacionDto->getId_Cuenta_reubicacion())){
$Siga_cat_cuenta_reubicacionDto->setId_Cuenta_reubicacion($this->fechaMysql($Siga_cat_cuenta_reubicacionDto->getId_Cuenta_reubicacion()));
}
$Siga_cat_cuenta_reubicacionDto->setDesc_Cuenta_reubicacion(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_cuenta_reubicacionDto->getDesc_Cuenta_reubicacion(),"utf8"):strtoupper($Siga_cat_cuenta_reubicacionDto->getDesc_Cuenta_reubicacion()))))));
if($this->esFecha($Siga_cat_cuenta_reubicacionDto->getDesc_Cuenta_reubicacion())){
$Siga_cat_cuenta_reubicacionDto->setDesc_Cuenta_reubicacion($this->fechaMysql($Siga_cat_cuenta_reubicacionDto->getDesc_Cuenta_reubicacion()));
}
$Siga_cat_cuenta_reubicacionDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_cuenta_reubicacionDto->getFech_Inser(),"utf8"):strtoupper($Siga_cat_cuenta_reubicacionDto->getFech_Inser()))))));
if($this->esFecha($Siga_cat_cuenta_reubicacionDto->getFech_Inser())){
$Siga_cat_cuenta_reubicacionDto->setFech_Inser($this->fechaMysql($Siga_cat_cuenta_reubicacionDto->getFech_Inser()));
}
$Siga_cat_cuenta_reubicacionDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_cuenta_reubicacionDto->getUsr_Inser(),"utf8"):strtoupper($Siga_cat_cuenta_reubicacionDto->getUsr_Inser()))))));
if($this->esFecha($Siga_cat_cuenta_reubicacionDto->getUsr_Inser())){
$Siga_cat_cuenta_reubicacionDto->setUsr_Inser($this->fechaMysql($Siga_cat_cuenta_reubicacionDto->getUsr_Inser()));
}
$Siga_cat_cuenta_reubicacionDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_cuenta_reubicacionDto->getFech_Mod(),"utf8"):strtoupper($Siga_cat_cuenta_reubicacionDto->getFech_Mod()))))));
if($this->esFecha($Siga_cat_cuenta_reubicacionDto->getFech_Mod())){
$Siga_cat_cuenta_reubicacionDto->setFech_Mod($this->fechaMysql($Siga_cat_cuenta_reubicacionDto->getFech_Mod()));
}
$Siga_cat_cuenta_reubicacionDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_cuenta_reubicacionDto->getUsr_Mod(),"utf8"):strtoupper($Siga_cat_cuenta_reubicacionDto->getUsr_Mod()))))));
if($this->esFecha($Siga_cat_cuenta_reubicacionDto->getUsr_Mod())){
$Siga_cat_cuenta_reubicacionDto->setUsr_Mod($this->fechaMysql($Siga_cat_cuenta_reubicacionDto->getUsr_Mod()));
}
$Siga_cat_cuenta_reubicacionDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_cuenta_reubicacionDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_cat_cuenta_reubicacionDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_cat_cuenta_reubicacionDto->getEstatus_Reg())){
$Siga_cat_cuenta_reubicacionDto->setEstatus_Reg($this->fechaMysql($Siga_cat_cuenta_reubicacionDto->getEstatus_Reg()));
}
return $Siga_cat_cuenta_reubicacionDto;
}
public function selectSiga_cat_cuenta_reubicacion($Siga_cat_cuenta_reubicacionDto){
$Siga_cat_cuenta_reubicacionDto=$this->validarSiga_cat_cuenta_reubicacion($Siga_cat_cuenta_reubicacionDto);
$Siga_cat_cuenta_reubicacionController = new Siga_cat_cuenta_reubicacionController();
$Siga_cat_cuenta_reubicacionDto = $Siga_cat_cuenta_reubicacionController->selectSiga_cat_cuenta_reubicacion($Siga_cat_cuenta_reubicacionDto);
if($Siga_cat_cuenta_reubicacionDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_cuenta_reubicacionDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_cat_cuenta_reubicacion($Siga_cat_cuenta_reubicacionDto){
$Siga_cat_cuenta_reubicacionDto=$this->validarSiga_cat_cuenta_reubicacion($Siga_cat_cuenta_reubicacionDto);
$Siga_cat_cuenta_reubicacionController = new Siga_cat_cuenta_reubicacionController();
$Siga_cat_cuenta_reubicacionDto = $Siga_cat_cuenta_reubicacionController->insertSiga_cat_cuenta_reubicacion($Siga_cat_cuenta_reubicacionDto);
if($Siga_cat_cuenta_reubicacionDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_cuenta_reubicacionDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_cat_cuenta_reubicacion($Siga_cat_cuenta_reubicacionDto){
$Siga_cat_cuenta_reubicacionDto=$this->validarSiga_cat_cuenta_reubicacion($Siga_cat_cuenta_reubicacionDto);
$Siga_cat_cuenta_reubicacionController = new Siga_cat_cuenta_reubicacionController();
$Siga_cat_cuenta_reubicacionDto = $Siga_cat_cuenta_reubicacionController->updateSiga_cat_cuenta_reubicacion($Siga_cat_cuenta_reubicacionDto);
if($Siga_cat_cuenta_reubicacionDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_cuenta_reubicacionDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_cat_cuenta_reubicacion($Siga_cat_cuenta_reubicacionDto){
$Siga_cat_cuenta_reubicacionDto=$this->validarSiga_cat_cuenta_reubicacion($Siga_cat_cuenta_reubicacionDto);
$Siga_cat_cuenta_reubicacionController = new Siga_cat_cuenta_reubicacionController();
$Siga_cat_cuenta_reubicacionDto = $Siga_cat_cuenta_reubicacionController->deleteSiga_cat_cuenta_reubicacion($Siga_cat_cuenta_reubicacionDto);
if($Siga_cat_cuenta_reubicacionDto==true){
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



@$Id_Cuenta_reubicacion=$_POST["Id_Cuenta_reubicacion"];
@$Desc_Cuenta_reubicacion=$_POST["Desc_Cuenta_reubicacion"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];

$siga_cat_cuenta_reubicacionFacade = new Siga_cat_cuenta_reubicacionFacade();
$siga_cat_cuenta_reubicacionDto = new Siga_cat_cuenta_reubicacionDTO();

$siga_cat_cuenta_reubicacionDto->setId_Cuenta_reubicacion($Id_Cuenta_reubicacion);
$siga_cat_cuenta_reubicacionDto->setDesc_Cuenta_reubicacion($Desc_Cuenta_reubicacion);
$siga_cat_cuenta_reubicacionDto->setFech_Inser($Fech_Inser);
$siga_cat_cuenta_reubicacionDto->setUsr_Inser($Usr_Inser);
$siga_cat_cuenta_reubicacionDto->setFech_Mod($Fech_Mod);
$siga_cat_cuenta_reubicacionDto->setUsr_Mod($Usr_Mod);
$siga_cat_cuenta_reubicacionDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_Cuenta_reubicacion=="") ){
$siga_cat_cuenta_reubicacionDto=$siga_cat_cuenta_reubicacionFacade->insertSiga_cat_cuenta_reubicacion($siga_cat_cuenta_reubicacionDto);
echo $siga_cat_cuenta_reubicacionDto;
} else if(($accion=="guardar") && ($Id_Cuenta_reubicacion!="")){
$siga_cat_cuenta_reubicacionDto=$siga_cat_cuenta_reubicacionFacade->updateSiga_cat_cuenta_reubicacion($siga_cat_cuenta_reubicacionDto);
echo $siga_cat_cuenta_reubicacionDto;
} else if($accion=="consultar"){
$siga_cat_cuenta_reubicacionDto=$siga_cat_cuenta_reubicacionFacade->selectSiga_cat_cuenta_reubicacion($siga_cat_cuenta_reubicacionDto);
echo $siga_cat_cuenta_reubicacionDto;
} else if( ($accion=="baja") && ($Id_Cuenta_reubicacion!="") ){
$siga_cat_cuenta_reubicacionDto=$siga_cat_cuenta_reubicacionFacade->deleteSiga_cat_cuenta_reubicacion($siga_cat_cuenta_reubicacionDto);
echo $siga_cat_cuenta_reubicacionDto;
} else if( ($accion=="seleccionar") && ($Id_Cuenta_reubicacion!="") ){
$siga_cat_cuenta_reubicacionDto=$siga_cat_cuenta_reubicacionFacade->selectSiga_cat_cuenta_reubicacion($siga_cat_cuenta_reubicacionDto);
echo $siga_cat_cuenta_reubicacionDto;
}


?>