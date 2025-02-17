<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_ubic_sec/Siga_cat_ubic_secDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_cat_ubic_sec/Siga_cat_ubic_secController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_cat_ubic_secFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_ubic_sec($Siga_cat_ubic_secDto){
$Siga_cat_ubic_secDto->setId_Ubic_Sec(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_ubic_secDto->getId_Ubic_Sec(),"utf8"):strtoupper($Siga_cat_ubic_secDto->getId_Ubic_Sec()))))));
if($this->esFecha($Siga_cat_ubic_secDto->getId_Ubic_Sec())){
$Siga_cat_ubic_secDto->setId_Ubic_Sec($this->fechaMysql($Siga_cat_ubic_secDto->getId_Ubic_Sec()));
}
$Siga_cat_ubic_secDto->setId_Ubic_Prim(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_ubic_secDto->getId_Ubic_Prim(),"utf8"):strtoupper($Siga_cat_ubic_secDto->getId_Ubic_Prim()))))));
if($this->esFecha($Siga_cat_ubic_secDto->getId_Ubic_Prim())){
$Siga_cat_ubic_secDto->setId_Ubic_Prim($this->fechaMysql($Siga_cat_ubic_secDto->getId_Ubic_Prim()));
}
$Siga_cat_ubic_secDto->setDesc_Ubic_Sec(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_ubic_secDto->getDesc_Ubic_Sec(),"utf8"):strtoupper($Siga_cat_ubic_secDto->getDesc_Ubic_Sec()))))));
if($this->esFecha($Siga_cat_ubic_secDto->getDesc_Ubic_Sec())){
$Siga_cat_ubic_secDto->setDesc_Ubic_Sec($this->fechaMysql($Siga_cat_ubic_secDto->getDesc_Ubic_Sec()));
}
$Siga_cat_ubic_secDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_ubic_secDto->getFech_Inser(),"utf8"):strtoupper($Siga_cat_ubic_secDto->getFech_Inser()))))));
if($this->esFecha($Siga_cat_ubic_secDto->getFech_Inser())){
$Siga_cat_ubic_secDto->setFech_Inser($this->fechaMysql($Siga_cat_ubic_secDto->getFech_Inser()));
}
$Siga_cat_ubic_secDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_ubic_secDto->getUsr_Inser(),"utf8"):strtoupper($Siga_cat_ubic_secDto->getUsr_Inser()))))));
if($this->esFecha($Siga_cat_ubic_secDto->getUsr_Inser())){
$Siga_cat_ubic_secDto->setUsr_Inser($this->fechaMysql($Siga_cat_ubic_secDto->getUsr_Inser()));
}
$Siga_cat_ubic_secDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_ubic_secDto->getFech_Mod(),"utf8"):strtoupper($Siga_cat_ubic_secDto->getFech_Mod()))))));
if($this->esFecha($Siga_cat_ubic_secDto->getFech_Mod())){
$Siga_cat_ubic_secDto->setFech_Mod($this->fechaMysql($Siga_cat_ubic_secDto->getFech_Mod()));
}
$Siga_cat_ubic_secDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_ubic_secDto->getUsr_Mod(),"utf8"):strtoupper($Siga_cat_ubic_secDto->getUsr_Mod()))))));
if($this->esFecha($Siga_cat_ubic_secDto->getUsr_Mod())){
$Siga_cat_ubic_secDto->setUsr_Mod($this->fechaMysql($Siga_cat_ubic_secDto->getUsr_Mod()));
}
$Siga_cat_ubic_secDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_ubic_secDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_cat_ubic_secDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_cat_ubic_secDto->getEstatus_Reg())){
$Siga_cat_ubic_secDto->setEstatus_Reg($this->fechaMysql($Siga_cat_ubic_secDto->getEstatus_Reg()));
}
return $Siga_cat_ubic_secDto;
}
public function selectSiga_cat_ubic_sec($Siga_cat_ubic_secDto){
$Siga_cat_ubic_secDto=$this->validarSiga_cat_ubic_sec($Siga_cat_ubic_secDto);
$Siga_cat_ubic_secController = new Siga_cat_ubic_secController();
$Siga_cat_ubic_secDto = $Siga_cat_ubic_secController->selectSiga_cat_ubic_sec($Siga_cat_ubic_secDto);
if($Siga_cat_ubic_secDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_ubic_secDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_cat_ubic_sec($Siga_cat_ubic_secDto){
//$Siga_cat_ubic_secDto=$this->validarSiga_cat_ubic_sec($Siga_cat_ubic_secDto);
$Siga_cat_ubic_secController = new Siga_cat_ubic_secController();
$Siga_cat_ubic_secDto = $Siga_cat_ubic_secController->insertSiga_cat_ubic_sec($Siga_cat_ubic_secDto);
if($Siga_cat_ubic_secDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_ubic_secDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_cat_ubic_sec($Siga_cat_ubic_secDto){
//$Siga_cat_ubic_secDto=$this->validarSiga_cat_ubic_sec($Siga_cat_ubic_secDto);
$Siga_cat_ubic_secController = new Siga_cat_ubic_secController();
$Siga_cat_ubic_secDto = $Siga_cat_ubic_secController->updateSiga_cat_ubic_sec($Siga_cat_ubic_secDto);
if($Siga_cat_ubic_secDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_ubic_secDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_cat_ubic_sec($Siga_cat_ubic_secDto){
//$Siga_cat_ubic_secDto=$this->validarSiga_cat_ubic_sec($Siga_cat_ubic_secDto);
$Siga_cat_ubic_secController = new Siga_cat_ubic_secController();
$Siga_cat_ubic_secDto = $Siga_cat_ubic_secController->deleteSiga_cat_ubic_sec($Siga_cat_ubic_secDto);
if($Siga_cat_ubic_secDto==true){
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



@$Id_Ubic_Sec=$_POST["Id_Ubic_Sec"];
@$Id_Ubic_Prim=$_POST["Id_Ubic_Prim"];
@$Desc_Ubic_Sec=$_POST["Desc_Ubic_Sec"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];

$siga_cat_ubic_secFacade = new Siga_cat_ubic_secFacade();
$siga_cat_ubic_secDto = new Siga_cat_ubic_secDTO();

$siga_cat_ubic_secDto->setId_Ubic_Sec($Id_Ubic_Sec);
$siga_cat_ubic_secDto->setId_Ubic_Prim($Id_Ubic_Prim);
$siga_cat_ubic_secDto->setDesc_Ubic_Sec($Desc_Ubic_Sec);
$siga_cat_ubic_secDto->setFech_Inser($Fech_Inser);
$siga_cat_ubic_secDto->setUsr_Inser($Usr_Inser);
$siga_cat_ubic_secDto->setFech_Mod($Fech_Mod);
$siga_cat_ubic_secDto->setUsr_Mod($Usr_Mod);
$siga_cat_ubic_secDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_Ubic_Sec=="") ){
$siga_cat_ubic_secDto=$siga_cat_ubic_secFacade->insertSiga_cat_ubic_sec($siga_cat_ubic_secDto);
echo $siga_cat_ubic_secDto;
} else if(($accion=="guardar") && ($Id_Ubic_Sec!="")){
$siga_cat_ubic_secDto=$siga_cat_ubic_secFacade->updateSiga_cat_ubic_sec($siga_cat_ubic_secDto);
echo $siga_cat_ubic_secDto;
} else if($accion=="consultar"){
$siga_cat_ubic_secDto=$siga_cat_ubic_secFacade->selectSiga_cat_ubic_sec($siga_cat_ubic_secDto);
echo $siga_cat_ubic_secDto;
} else if( ($accion=="baja") && ($Id_Ubic_Sec!="") ){
$siga_cat_ubic_secDto=$siga_cat_ubic_secFacade->deleteSiga_cat_ubic_sec($siga_cat_ubic_secDto);
echo $siga_cat_ubic_secDto;
} else if( ($accion=="seleccionar") && ($Id_Ubic_Sec!="") ){
$siga_cat_ubic_secDto=$siga_cat_ubic_secFacade->selectSiga_cat_ubic_sec($siga_cat_ubic_secDto);
echo $siga_cat_ubic_secDto;
}


?>