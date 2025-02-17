<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_cuenta_baja/Siga_cat_cuenta_bajaDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_cat_cuenta_baja/Siga_cat_cuenta_bajaController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_cat_cuenta_bajaFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_cuenta_baja($Siga_cat_cuenta_bajaDto){
$Siga_cat_cuenta_bajaDto->setId_Cuenta_baja(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_cuenta_bajaDto->getId_Cuenta_baja(),"utf8"):strtoupper($Siga_cat_cuenta_bajaDto->getId_Cuenta_baja()))))));
if($this->esFecha($Siga_cat_cuenta_bajaDto->getId_Cuenta_baja())){
$Siga_cat_cuenta_bajaDto->setId_Cuenta_baja($this->fechaMysql($Siga_cat_cuenta_bajaDto->getId_Cuenta_baja()));
}
$Siga_cat_cuenta_bajaDto->setDesc_Cuenta_baja(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_cuenta_bajaDto->getDesc_Cuenta_baja(),"utf8"):strtoupper($Siga_cat_cuenta_bajaDto->getDesc_Cuenta_baja()))))));
if($this->esFecha($Siga_cat_cuenta_bajaDto->getDesc_Cuenta_baja())){
$Siga_cat_cuenta_bajaDto->setDesc_Cuenta_baja($this->fechaMysql($Siga_cat_cuenta_bajaDto->getDesc_Cuenta_baja()));
}
$Siga_cat_cuenta_bajaDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_cuenta_bajaDto->getFech_Inser(),"utf8"):strtoupper($Siga_cat_cuenta_bajaDto->getFech_Inser()))))));
if($this->esFecha($Siga_cat_cuenta_bajaDto->getFech_Inser())){
$Siga_cat_cuenta_bajaDto->setFech_Inser($this->fechaMysql($Siga_cat_cuenta_bajaDto->getFech_Inser()));
}
$Siga_cat_cuenta_bajaDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_cuenta_bajaDto->getUsr_Inser(),"utf8"):strtoupper($Siga_cat_cuenta_bajaDto->getUsr_Inser()))))));
if($this->esFecha($Siga_cat_cuenta_bajaDto->getUsr_Inser())){
$Siga_cat_cuenta_bajaDto->setUsr_Inser($this->fechaMysql($Siga_cat_cuenta_bajaDto->getUsr_Inser()));
}
$Siga_cat_cuenta_bajaDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_cuenta_bajaDto->getFech_Mod(),"utf8"):strtoupper($Siga_cat_cuenta_bajaDto->getFech_Mod()))))));
if($this->esFecha($Siga_cat_cuenta_bajaDto->getFech_Mod())){
$Siga_cat_cuenta_bajaDto->setFech_Mod($this->fechaMysql($Siga_cat_cuenta_bajaDto->getFech_Mod()));
}
$Siga_cat_cuenta_bajaDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_cuenta_bajaDto->getUsr_Mod(),"utf8"):strtoupper($Siga_cat_cuenta_bajaDto->getUsr_Mod()))))));
if($this->esFecha($Siga_cat_cuenta_bajaDto->getUsr_Mod())){
$Siga_cat_cuenta_bajaDto->setUsr_Mod($this->fechaMysql($Siga_cat_cuenta_bajaDto->getUsr_Mod()));
}
$Siga_cat_cuenta_bajaDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_cuenta_bajaDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_cat_cuenta_bajaDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_cat_cuenta_bajaDto->getEstatus_Reg())){
$Siga_cat_cuenta_bajaDto->setEstatus_Reg($this->fechaMysql($Siga_cat_cuenta_bajaDto->getEstatus_Reg()));
}
return $Siga_cat_cuenta_bajaDto;
}
public function selectSiga_cat_cuenta_baja($Siga_cat_cuenta_bajaDto){
$Siga_cat_cuenta_bajaDto=$this->validarSiga_cat_cuenta_baja($Siga_cat_cuenta_bajaDto);
$Siga_cat_cuenta_bajaController = new Siga_cat_cuenta_bajaController();
$Siga_cat_cuenta_bajaDto = $Siga_cat_cuenta_bajaController->selectSiga_cat_cuenta_baja($Siga_cat_cuenta_bajaDto);
if($Siga_cat_cuenta_bajaDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_cuenta_bajaDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_cat_cuenta_baja($Siga_cat_cuenta_bajaDto){
$Siga_cat_cuenta_bajaDto=$this->validarSiga_cat_cuenta_baja($Siga_cat_cuenta_bajaDto);
$Siga_cat_cuenta_bajaController = new Siga_cat_cuenta_bajaController();
$Siga_cat_cuenta_bajaDto = $Siga_cat_cuenta_bajaController->insertSiga_cat_cuenta_baja($Siga_cat_cuenta_bajaDto);
if($Siga_cat_cuenta_bajaDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_cuenta_bajaDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_cat_cuenta_baja($Siga_cat_cuenta_bajaDto){
$Siga_cat_cuenta_bajaDto=$this->validarSiga_cat_cuenta_baja($Siga_cat_cuenta_bajaDto);
$Siga_cat_cuenta_bajaController = new Siga_cat_cuenta_bajaController();
$Siga_cat_cuenta_bajaDto = $Siga_cat_cuenta_bajaController->updateSiga_cat_cuenta_baja($Siga_cat_cuenta_bajaDto);
if($Siga_cat_cuenta_bajaDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_cuenta_bajaDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_cat_cuenta_baja($Siga_cat_cuenta_bajaDto){
$Siga_cat_cuenta_bajaDto=$this->validarSiga_cat_cuenta_baja($Siga_cat_cuenta_bajaDto);
$Siga_cat_cuenta_bajaController = new Siga_cat_cuenta_bajaController();
$Siga_cat_cuenta_bajaDto = $Siga_cat_cuenta_bajaController->deleteSiga_cat_cuenta_baja($Siga_cat_cuenta_bajaDto);
if($Siga_cat_cuenta_bajaDto==true){
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



@$Id_Cuenta_baja=$_POST["Id_Cuenta_baja"];
@$Desc_Cuenta_baja=$_POST["Desc_Cuenta_baja"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];

$siga_cat_cuenta_bajaFacade = new Siga_cat_cuenta_bajaFacade();
$siga_cat_cuenta_bajaDto = new Siga_cat_cuenta_bajaDTO();

$siga_cat_cuenta_bajaDto->setId_Cuenta_baja($Id_Cuenta_baja);
$siga_cat_cuenta_bajaDto->setDesc_Cuenta_baja($Desc_Cuenta_baja);
$siga_cat_cuenta_bajaDto->setFech_Inser($Fech_Inser);
$siga_cat_cuenta_bajaDto->setUsr_Inser($Usr_Inser);
$siga_cat_cuenta_bajaDto->setFech_Mod($Fech_Mod);
$siga_cat_cuenta_bajaDto->setUsr_Mod($Usr_Mod);
$siga_cat_cuenta_bajaDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_Cuenta_baja=="") ){
$siga_cat_cuenta_bajaDto=$siga_cat_cuenta_bajaFacade->insertSiga_cat_cuenta_baja($siga_cat_cuenta_bajaDto);
echo $siga_cat_cuenta_bajaDto;
} else if(($accion=="guardar") && ($Id_Cuenta_baja!="")){
$siga_cat_cuenta_bajaDto=$siga_cat_cuenta_bajaFacade->updateSiga_cat_cuenta_baja($siga_cat_cuenta_bajaDto);
echo $siga_cat_cuenta_bajaDto;
} else if($accion=="consultar"){
$siga_cat_cuenta_bajaDto=$siga_cat_cuenta_bajaFacade->selectSiga_cat_cuenta_baja($siga_cat_cuenta_bajaDto);
echo $siga_cat_cuenta_bajaDto;
} else if( ($accion=="baja") && ($Id_Cuenta_baja!="") ){
$siga_cat_cuenta_bajaDto=$siga_cat_cuenta_bajaFacade->deleteSiga_cat_cuenta_baja($siga_cat_cuenta_bajaDto);
echo $siga_cat_cuenta_bajaDto;
} else if( ($accion=="seleccionar") && ($Id_Cuenta_baja!="") ){
$siga_cat_cuenta_bajaDto=$siga_cat_cuenta_bajaFacade->selectSiga_cat_cuenta_baja($siga_cat_cuenta_bajaDto);
echo $siga_cat_cuenta_bajaDto;
}


?>