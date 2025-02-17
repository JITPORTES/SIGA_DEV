<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/tblinpc/TblinpcDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/tblinpc/TblinpcController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class TblinpcFacade {
private $proveedor;
public function __construct() {
}
public function validarTblinpc($TblinpcDto){
$TblinpcDto->setId_INPC(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TblinpcDto->getId_INPC(),"utf8"):strtoupper($TblinpcDto->getId_INPC()))))));
if($this->esFecha($TblinpcDto->getId_INPC())){
$TblinpcDto->setId_INPC($this->fechaMysql($TblinpcDto->getId_INPC()));
}
$TblinpcDto->setAnio(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TblinpcDto->getAnio(),"utf8"):strtoupper($TblinpcDto->getAnio()))))));
if($this->esFecha($TblinpcDto->getAnio())){
$TblinpcDto->setAnio($this->fechaMysql($TblinpcDto->getAnio()));
}
$TblinpcDto->setMes(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TblinpcDto->getMes(),"utf8"):strtoupper($TblinpcDto->getMes()))))));
if($this->esFecha($TblinpcDto->getMes())){
$TblinpcDto->setMes($this->fechaMysql($TblinpcDto->getMes()));
}
$TblinpcDto->setValor(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TblinpcDto->getValor(),"utf8"):strtoupper($TblinpcDto->getValor()))))));
if($this->esFecha($TblinpcDto->getValor())){
$TblinpcDto->setValor($this->fechaMysql($TblinpcDto->getValor()));
}
$TblinpcDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TblinpcDto->getFech_Inser(),"utf8"):strtoupper($TblinpcDto->getFech_Inser()))))));
if($this->esFecha($TblinpcDto->getFech_Inser())){
$TblinpcDto->setFech_Inser($this->fechaMysql($TblinpcDto->getFech_Inser()));
}
$TblinpcDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TblinpcDto->getUsr_Inser(),"utf8"):strtoupper($TblinpcDto->getUsr_Inser()))))));
if($this->esFecha($TblinpcDto->getUsr_Inser())){
$TblinpcDto->setUsr_Inser($this->fechaMysql($TblinpcDto->getUsr_Inser()));
}
$TblinpcDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TblinpcDto->getFech_Mod(),"utf8"):strtoupper($TblinpcDto->getFech_Mod()))))));
if($this->esFecha($TblinpcDto->getFech_Mod())){
$TblinpcDto->setFech_Mod($this->fechaMysql($TblinpcDto->getFech_Mod()));
}
$TblinpcDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TblinpcDto->getUsr_Mod(),"utf8"):strtoupper($TblinpcDto->getUsr_Mod()))))));
if($this->esFecha($TblinpcDto->getUsr_Mod())){
$TblinpcDto->setUsr_Mod($this->fechaMysql($TblinpcDto->getUsr_Mod()));
}
$TblinpcDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TblinpcDto->getEstatus_Reg(),"utf8"):strtoupper($TblinpcDto->getEstatus_Reg()))))));
if($this->esFecha($TblinpcDto->getEstatus_Reg())){
$TblinpcDto->setEstatus_Reg($this->fechaMysql($TblinpcDto->getEstatus_Reg()));
}
return $TblinpcDto;
}
public function selectTblinpc($TblinpcDto){
$TblinpcDto=$this->validarTblinpc($TblinpcDto);
$TblinpcController = new TblinpcController();
$TblinpcDto = $TblinpcController->selectTblinpc($TblinpcDto);
if($TblinpcDto!=""){
$dtoToJson = new DtoToJson($TblinpcDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertTblinpc($TblinpcDto){
//$TblinpcDto=$this->validarTblinpc($TblinpcDto);
$TblinpcController = new TblinpcController();
$TblinpcDto = $TblinpcController->insertTblinpc($TblinpcDto);
if($TblinpcDto!=""){
$dtoToJson = new DtoToJson($TblinpcDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateTblinpc($TblinpcDto){
//$TblinpcDto=$this->validarTblinpc($TblinpcDto);
$TblinpcController = new TblinpcController();
$TblinpcDto = $TblinpcController->updateTblinpc($TblinpcDto);
if($TblinpcDto!=""){
$dtoToJson = new DtoToJson($TblinpcDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteTblinpc($TblinpcDto){
//$TblinpcDto=$this->validarTblinpc($TblinpcDto);
$TblinpcController = new TblinpcController();
$TblinpcDto = $TblinpcController->deleteTblinpc($TblinpcDto);
if($TblinpcDto==true){
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



@$Id_INPC=$_POST["Id_INPC"];
@$Anio=$_POST["Anio"];
@$Mes=$_POST["Mes"];
@$Valor=$_POST["Valor"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];

$tblinpcFacade = new TblinpcFacade();
$tblinpcDto = new TblinpcDTO();

$tblinpcDto->setId_INPC($Id_INPC);
$tblinpcDto->setAnio($Anio);
$tblinpcDto->setMes($Mes);
$tblinpcDto->setValor($Valor);
$tblinpcDto->setFech_Inser($Fech_Inser);
$tblinpcDto->setUsr_Inser($Usr_Inser);
$tblinpcDto->setFech_Mod($Fech_Mod);
$tblinpcDto->setUsr_Mod($Usr_Mod);
$tblinpcDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_INPC=="") ){
$tblinpcDto=$tblinpcFacade->insertTblinpc($tblinpcDto);
echo $tblinpcDto;
} else if(($accion=="guardar") && ($Id_INPC!="")){
$tblinpcDto=$tblinpcFacade->updateTblinpc($tblinpcDto);
echo $tblinpcDto;
} else if($accion=="consultar"){
$tblinpcDto=$tblinpcFacade->selectTblinpc($tblinpcDto);
echo $tblinpcDto;
} else if( ($accion=="baja") && ($Id_INPC!="") ){
$tblinpcDto=$tblinpcFacade->deleteTblinpc($tblinpcDto);
echo $tblinpcDto;
} else if( ($accion=="seleccionar") && ($Id_INPC!="") ){
$tblinpcDto=$tblinpcFacade->selectTblinpc($tblinpcDto);
echo $tblinpcDto;
}


?>